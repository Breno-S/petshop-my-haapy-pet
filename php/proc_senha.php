<?php 
    session_start();
    include_once("conexao.php");

    // Inputs da Senha Atual, e dois inputs de nova senha
    $senhaAtual = filter_input(INPUT_POST, 'senhaAtual');
    $novaSenha1 = filter_input(INPUT_POST, 'novaSenha1');
    $novaSenha2 = filter_input(INPUT_POST, 'novaSenha2');

    // Id de quando o Usuario Loga
    $id = $_SESSION['idCliente'];

    // Criptografia da Senha Atual para Verificação no Banco
    $senhaAtual = md5($senhaAtual);

    // Verificação se a senha Informada é correta
    $query = "SELECT * FROM cadastro_cliente WHERE idCadastro = '$id' && senha = '$senhaAtual'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($row > 0) {
        if($novaSenha1 == $novaSenha2){
            $novaSenha1 = md5($novaSenha1);
            $query2 = "UPDATE cadastro_cliente SET senha = '$novaSenha1' WHERE idCadastro = '$id'";
            $result2 = mysqli_query($conn, $query2);
            if(mysqli_affected_rows($conn)){
            
                $_SESSION['msg'] = "<p style = 'color:blue;'>SENHA EDITADA COM SUCESSO.</p>";
                header("Location: ../senha_seguranca.php");
            }else {
                $_SESSION['msg'] =  "<p style = 'color:red;'>SENHA INCORRETA.</p>";
                header("Location: ../senha_seguranca.php");
            }
            // if (strlen($novaSenha1) >= 7 && preg_match('/[A-Za-z]/', $novaSenha1) && preg_match('/[!@#$%^&*()\-_=+{};:,<.>§~]/', $novaSenha1) && preg_match('/[0-9]/', $novaSenha1)) {
                
            // }else{
            //     $_SESSION['msg'] = "<p style = 'color:red;'>SENHA NÃO ATENDE OS REQUISITOS MINIMOS.</p>";
            //     header("Location: ../senha_seguranca.php");
            // }
        } else{
            $_SESSION['msg'] =  "<p style = 'color:red;'>NOVA SENHA NÃO CONFERE.</p>";
            header("Location: ../senha_seguranca.php");
        }
    } else {
        $_SESSION['msg'] =  "<p style = 'color:red;'>SENHA INCORRETA.</p>";
        header('Location: ../senha_seguranca.php');
    }


?>

