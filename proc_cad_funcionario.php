<?php
    session_start();
    include_once("conexao.php");
    require "validacpf.php";

    // dados pessoais
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

    // retira formatação e valida cpf
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    $cpf = str_replace('-', '', $cpf);
    $cpf = str_replace('+', '', $cpf);
    $cpf = str_replace('.', '', $cpf);
   

    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $senhaCrip = md5($senha);

    $cargo = filter_input(INPUT_POST,'cargo', FILTER_SANITIZE_STRING);

    ///// inserção da imagem do funcionario
    if (isset($_FILES['imagefunc'])) {
        // seleção do diretório
        $dir = "images/imgFuncionarios/";
        // pega dados da imagem (nome, nome temporário, tipo do arquivo)
        $image = $_FILES['imagefunc'];
        $tmp_name = $image['tmp_name'];
        $name = basename($image["name"]);
        $fileType = strtolower(pathinfo($name, PATHINFO_EXTENSION)); 
        // cria um id único pro arquivo (evita arquivos com nome repetido se substituirem) e cria o caminho onde vai armazenar o arquivo
        $name = uniqid();
        $path = $dir . $name . "." . $fileType;
        // caso seja png, jpg ou jpeg, move o arquivo para a pasta images/imgCliente com o nome dele
        $allowTypes = array('jpg','png','jpeg');
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///// validação de dados
    // checa se já está cadastrado
    $chec_cadastrado = "SELECT COUNT(idFuncionario) AS cadastros FROM funcionarios WHERE cpf_funcionario = '$cpf';";
    $checa_cadastrado = mysqli_query($conn, $chec_cadastrado);
    $cadastro_func = mysqli_fetch_assoc($checa_cadastrado);

    // caso tudo esteja válido, cadastra
    if (validacao($cpf) && $cadastro_func['cadastros'] == 0 && in_array($fileType, $allowTypes) && $image['size'] <= 2097152) {
     
        // inserção dados cliente
        $result_cadastro_funcionario = "INSERT INTO funcionarios(cpf_funcionario, nome_funcionario, senha_funcionario, cargo) VALUES ('$cpf', '$nome', '$senhaCrip', '$cargo');";
        $resultado_cadastro_funcionario = mysqli_query($conn, $result_cadastro_funcionario);

        // pega id do cliente cadastrado
        $pega_funcionario = mysqli_query($conn, "SELECT * FROM funcionarios WHERE cpf_funcionario = '$cpf';");
        $pega_id_funcionario = mysqli_fetch_assoc($pega_funcionario);
        $id_funcionario = $pega_id_funcionario['idFuncionario'];

        //upload do caminho da imagem no banco upload da imagem em um diretório
        move_uploaded_file($tmp_name, $path);
        $insereImagem = mysqli_query($conn, "INSERT INTO imagem_func(id_funcionario, dir_img_funcionario, criado) VALUES ($id_funcionario, '$path', NOW());");
        // inserção de imagem por @zerobugs-tutorial em https://youtu.be/ae83c8Zpoxo (acesso em 13/04/2023)
    
        $_SESSION['msg'] = "<center><span style='color:blue;'>Cadastro realizado com sucesso!</span></center>";

    }
    else {
        if (validacao($cpf) == false) {
            $_SESSION['msg'] = "<center><span style='color:red;'>CPF inválido. Insira os dados novamente</span></center>";
        }
        else if($cadastro_func['cadastros'] != 0){
            $_SESSION['msg'] = "<center><span style='color:red;'>Usuário já cadastrado.</span></center>";
        }
        else if($image['size'] > 2097152){
            $_SESSION['msg'] = "<center><span style='color:red;'>Formato não suportado. O arquivo deve ter no máximo 2MB!</span></center>";         
        }
        else {
            $_SESSION['msg'] = "<center><span style='color:red;'>Formato de arquivo não suportado. Escolha uma imagem png, jpg ou jpeg.</span></center>";         
        }
    }
    header('Location: cadastro_funcionario.php');
?>