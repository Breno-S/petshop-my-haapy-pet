<?php
    session_start();
    include_once("conexao.php");
    require "valida.php";

    if(!isset($_SESSION['idFuncionario']) && $_SESSION['cargo'] != 'Administrador'){
        header('Location: ../login.php');
    }

    // dados pessoais
    $nomeinp = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $array = explode(" ", $nomeinp);
    for($i=0;$i < count($array); $i++){
        $nome[$i] = ucfirst(strtolower($array[$i]));	
    }
    $nome_completo = implode(" ", $nome);

    // retira formatação e valida cpf
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    $cpf = str_replace('-', '', $cpf);
    $cpf = str_replace('+', '', $cpf);
    $cpf = str_replace('.', '', $cpf);
    valida($cpf);
   

    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $senhaCrip = md5($senha);

    $cargo = filter_input(INPUT_POST,'cargo', FILTER_SANITIZE_STRING);

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///// validação de dados
    // checa se já está cadastrado
    $chec_cadastrado = "SELECT COUNT(idFuncionario) AS cadastros FROM funcionarios WHERE cpf_funcionario = '$cpf';";
    $checa_cadastrado = mysqli_query($conn, $chec_cadastrado);
    $cadastro_func = mysqli_fetch_assoc($checa_cadastrado);

    // caso tudo esteja válido, cadastra
    if ($valido && $cadastro_func['cadastros'] == 0) {
     
        // inserção dados cliente
        $result_cadastro_funcionario = "INSERT INTO funcionarios(cpf_funcionario, nome_funcionario, senha_funcionario, cargo) VALUES ('$cpf', '$nome_completo', '$senhaCrip', '$cargo');";
        $resultado_cadastro_funcionario = mysqli_query($conn, $result_cadastro_funcionario);

        // pega id do funcionario cadastrado
        $pega_funcionario = mysqli_query($conn, "SELECT * FROM funcionarios WHERE cpf_funcionario = '$cpf';");
        $pega_id_funcionario = mysqli_fetch_assoc($pega_funcionario);
        $id_funcionario = $pega_id_funcionario['idFuncionario'];

        $_SESSION['msg_cad_func'] = "<center><span style='color:blue;'>Cadastro realizado com sucesso!</span></center>";

        ///// inserção da imagem do funcionario
        if (isset($_FILES['imagefunc'])) {
            // seleção do diretório
            $dir = "../images/imgFuncionarios/";
            $dirbcd = "images/imgFuncionarios/";
            // pega dados da imagem (nome, nome temporário, tipo do arquivo)
            $image = $_FILES['imagefunc'];
            $tmp_name = $image['tmp_name'];
            $name = basename($image["name"]);
            $fileType = strtolower(pathinfo($name, PATHINFO_EXTENSION)); 
            // cria um id único pro arquivo (evita arquivos com nome repetido se substituirem) e cria o caminho onde vai armazenar o arquivo
            $name = uniqid();
            $path = $dir . $name . "." . $fileType;
            $pathbcd = $dirbcd . $name . "." . $fileType;
            // caso seja png, jpg ou jpeg, move o arquivo para a pasta images/imgCliente com o nome dele
            $allowTypes = array('jpg','png','jpeg');

            if(in_array($fileType, $allowTypes) && $image['size'] <= 2097152){
                
                //upload do caminho da imagem no banco upload da imagem em um diretório
                move_uploaded_file($tmp_name, $path);
                $insereImagem = mysqli_query($conn, "INSERT INTO imagem_func(id_funcionario, dir_img_funcionario, criado) VALUES ($id_funcionario, '$pathbcd', NOW());");
                // inserção de imagem por @zerobugs-tutorial em https://youtu.be/ae83c8Zpoxo (acesso em 13/04/2023)

                $_SESSION['msg_cad_func'] = "<center><span style='color:blue;'>Cadastro realizado com sucesso!</span></center>";
            }
            else{
                if($image['size'] > 2097152){
                    $_SESSION['msg_cad_func'] = "<center><span style='color:blue;'>Cadastro realizado com sucesso. Tamanho de imagem não aceita. Máx 2MB.</span></center>";
                }
                else{
                    $_SESSION['msg_cad_func'] = "<center><span style='color:blue;'>Cadastro realizado com sucesso. Nenhuma imagem foi salvada.</span></center>";
                }
            }


        }


    }
    else {
        if ($valido == false) {
            $_SESSION['msg_cad_func'] = "<center><span style='color:red;'>CPF inválido. Insira os dados novamente</span></center>";
        }
        else{
            $_SESSION['msg_cad_func'] = "<center><span style='color:red;'>Falha ao cadastrar. Funcionário já cadastrado.</span></center>";
        }
    }
    header('Location: ../cadastro_funcionario.php');
?>