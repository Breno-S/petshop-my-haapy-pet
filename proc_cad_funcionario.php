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
 

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///// validação de dados
    // checa se já está cadastrado
    $chec_cadastrado = "SELECT COUNT(idFuncionario) AS cadastros FROM funcionarios WHERE cpf_funcionario = '$cpf';";
    $checa_cadastrado = mysqli_query($conn, $chec_cadastrado);
    $cadastro_func = mysqli_fetch_assoc($checa_cadastrado);

    // caso tudo esteja válido, cadastra
    if (validacao($cpf) && $cadastro_func['cadastros'] == 0 ) {
     
        // inserção dados cliente
        $result_cadastro_funcionario = "INSERT INTO funcionarios(cpf_funcionario, nome_funcionario, senha_funcionario, cargo) VALUES ('$cpf', '$nome', '$senhaCrip', '$cargo');";
        $resultado_cadastro_funcionario = mysqli_query($conn, $result_cadastro_funcionario);

        // pega id do cliente cadastrado
        $pega_funcionario = mysqli_query($conn, "SELECT * FROM funcionarios WHERE cpf_funcionario = '$cpf';");
        $pega_id_funcionario = mysqli_fetch_assoc($pega_funcionario);
        $id_funcionario = $pega_id_funcionario['idFuncionario'];
        $_SESSION['msg'] = "<center><span style='color:blue;'>Cadastro realizado com sucesso!</span></center>";

    }
    else {
        if (validacao($cpf) == false) {
            $_SESSION['msg'] = "<center><span style='color:red;'>CPF inválido. Insira os dados novamente</span></center>";
        }
        else if($cadastro_func['cadastros'] != 0){
            $_SESSION['msg'] = "<center><span style='color:red;'>Usuário já cadastrado.</span></center>";
        }
        else {
            $_SESSION['msg'] = "<center><span style='color:red;'>Formato não suportado.</span></center>";         
        }
    }
    header('Location: cadastro_funcionario.php');
?>
