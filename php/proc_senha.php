<?php 
    session_start();
    include_once("petshop.php");

    // Inputs da Senha Atual, e dois inputs de nova senha
    $senhaAtual = filter_input(INPUT_POST, 'senhaAtual');
    $novaSenha1 = filter_input(INPUT_POST, 'novaSenha1');
    $novaSenha2 = filter_input(INPUT_POST, 'novaSenha2');

    // Id de quando o Usuario Loga
    $id = $_SESSION['id'];

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
                $_SESSION['msg'] = "<p style = 'color:green;'>SENHA EDITADA COM SUCESSO</p>";
                header("Location: editar_senha.php");
            }else {
                $_SESSION['msg'] = 'Senha Incorreta';
                header("Location: editar_senha.php");
            }
        } else{
            $_SESSION['msg'] = 'Senha Incorreta';
            header("Location: editar_senha.php");
        }
    } else {
        $_SESSION['msg'] = 'senha Incorreta';
        header('Location: editar_senha.php');
    }


?>