<?php
    session_start();
    include_once('conexao.php');
    include_once('valida.php');
    include_once('valida_rg.php');
    // funções de validação reescritas de atividades anteriores em python
    $valido2 = true;


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///// entrada de dados
    // dados local
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
    $cep = str_replace('-', '', $cep);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $municipio = filter_input(INPUT_POST, 'municipio', FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);

    // dados pessoais
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $array = explode(' ', $nome, 2);
    $nome = $array[0];
    // checa se tem um sobrenome (evita mensagem de erro)
    if (sizeof($array) == 2) {
        $sobrenome = $array[1];
    }
    else {
        $sobrenome = "";
    }
    // retira formatação e valida cpf
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    $cpf = str_replace('-', '', $cpf);
    $cpf = str_replace('+', '', $cpf);
    $cpf = str_replace('.', '', $cpf);
    valida($cpf);
    // retira formatação e valida rg
    $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_NUMBER_INT);
    $rg = str_replace('-', '', $rg);
    $rg = str_replace('+', '', $rg);
    $rg = str_replace('.', '', $rg);
    valida_rg($rg);
    // pega data nascimento
    $data_nasc = filter_input(INPUT_POST, 'data_nasc');

    // dados cadastro
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
    $celular = str_replace('(', '', $celular);
    $celular = str_replace(')', '', $celular);
    $celular = str_replace('+', '', $celular);
    $celular = str_replace('-', '', $celular);
    $senha = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $senhaCrip = md5($senha);
    date_default_timezone_set('America/Sao_Paulo');
    date_default_timezone_get();
    $myvalue = date('Y-m-d H:i:s');
    $datetime = new DateTime($myvalue);
    $data_cad = $datetime->format('Y-m-d');


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///// validação de dados
    // checa se já está cadastrado
    $chec_cadastrado = "SELECT COUNT(idCliente) AS cadastros FROM cliente WHERE cpf = '$cpf';";
    $checa_cadastrado = mysqli_query($conn, $chec_cadastrado);
    $cadastros = mysqli_fetch_assoc($checa_cadastrado);

    // checa se endereço já está cadastrado
    $chec_cadastrado_end = "SELECT COUNT(idEndereco) AS cadastros FROM endereco WHERE logradouro = '$logradouro' AND numero = ". intval($numero) ." AND cep = '$cep';";
    $checa_cadastrado_end = mysqli_query($conn, $chec_cadastrado_end);
    $cadastros_end = mysqli_fetch_assoc($checa_cadastrado_end);

    // se algum desses estiver errado, cadastro inválido
    if (strlen($cep) != 8 || strlen($numero) > 5  || strlen($celular) > 11) {
        echo(strlen($cep) . "<br>");
        echo(strlen($numero). "<br>");
        echo(strlen($celular));
        $valido2 = false;
    }

    // caso tudo esteja válido, cadastra
    if ($valido && $valido2 && $rgvalido && $cadastros['cadastros'] == 0) {

        // inserção dados endereço (caso não exista o mesmo cadastrado)
        if ($cadastros_end['cadastros'] == 0) {
            $result_cadastro_end = "INSERT INTO endereco (cep, estado, municipio, bairro, logradouro, numero) VALUES ('$cep', '$estado', '$municipio', '$bairro', '$logradouro', ". intval($numero) .");";
            $resultado_cadastro_end = mysqli_query($conn, $result_cadastro_end);
        }
    
        // pega id do endereço cadastrado
        $pega_endereco = mysqli_query($conn, "SELECT * FROM endereco WHERE numero = $numero AND cep = '$cep';");
        $pega_id_end = mysqli_fetch_assoc($pega_endereco);
        $id_end = $pega_id_end['idEndereco'];
        
        // inserção dados cliente
        $result_cadastro_cliente = "INSERT INTO cliente (nome, sobrenome, cpf, rg, data_nasc, id_endereco) VALUES ('$nome', '$sobrenome', '$cpf', '$rg', '$data_nasc', $id_end);";
        $resultado_cadastro_cliente = mysqli_query($conn, $result_cadastro_cliente);
    
        // pega id do cliente cadastrado
        $pega_usuario = mysqli_query($conn, "SELECT * FROM cliente WHERE cpf = '$cpf';");
        $pega_id_cliente = mysqli_fetch_assoc($pega_usuario);
        $id_cliente = $pega_id_cliente['idCliente'];
    
        // inserção dados cadastro
        $result_cadastro_cad = "INSERT INTO cadastro_cliente (id_cliente, data_cad, email, celular, senha) VALUES ($id_cliente, '$data_cad', '$email', '$celular', '$senhaCrip');";
        $resultado_cadastro_cad = mysqli_query($conn, $result_cadastro_cad);

        // pega id do cadastro do cliente
        $pega_cad = mysqli_query($conn, "SELECT * FROM cadastro_cliente WHERE id_cliente = '$id_cliente';");
        $pega_id_cad = mysqli_fetch_assoc($pega_cad);
        $id_cad = $pega_id_cad['idCadastro'];


        $_SESSION['msg'] = "Cadastrado com Sucesso";
        ///// inserção da imagem do cliente
        if (isset($_FILES['image'])) {
            // seleção do diretório
            $dir = "images/imgCliente/";
            // pega dados da imagem (nome, nome temporário, tipo do arquivo)
            $image = $_FILES['image'];
            $tmp_name = $image['tmp_name'];
            $name = basename($image["name"]);
            $fileType = strtolower(pathinfo($name, PATHINFO_EXTENSION)); 
            // cria um id único pro arquivo (evita arquivos com nome repetido se substituirem) e cria o caminho onde vai armazenar o arquivo
            $name = uniqid();
            $path = $dir . $name . "." . $fileType;
            // caso seja png, jpg ou jpeg, move o arquivo para a pasta images/imgCliente com o nome dele
            $allowTypes = array('jpg','png','jpeg'); 
            if(in_array($fileType, $allowTypes) && ($image['size'] / 1024) <= 2048){ 
                move_uploaded_file($tmp_name, "$path");
                $insereImagem = mysqli_query($conn, "INSERT INTO imagem_cliente (id_cadastro, dir_img_cliente, criado) VALUES ($id_cad, '$path', NOW());");
                $guarda_caminho = mysqli_query($conn, "INSERT INTO imagem_cliente (id_cadastro, dir_img_cliente, criado) VALUES ($id_cad, '$path', '$data_cad')");
            }
            else {
                $_SESSION['msg'] = "Formato não suportado. Escolha uma imagem png, jpg ou jpeg.";
            }
            // inserção de imagem por @zerobugs-tutorial em https://youtu.be/ae83c8Zpoxo (acesso em 13/04/2023)
        }

    }
    else {
        if (!$valido || !$valido2 || !$rgvalido) {
            $_SESSION['msg'] = "Dados Inválidos";
            // header('Location: cadastro.html');
        }
        else {
            $_SESSION['msg'] = "Usuário já cadastrado";
            // header('Location: cadastro.html');
        }
    }
    echo($_SESSION['msg']);
    
?>