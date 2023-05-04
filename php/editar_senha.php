<?php
    session_start();
    $logado = $_SESSION['logado'];
    if($logado == false){
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar senha</title>
</head>
<body>


    <div>
        <h1>Alterar Senha</h1>
        <?php 
        if (isset($_SESSION['msg'])) {
            echo($_SESSION['msg'] . "<br>");
            unset($_SESSION['msg']);
        }

        echo $_SESSION['id'];
        ?>

        <form action="proc_senha.php" method="POST">
            <label for="">Senha Atual</label>
            <input type="text" name="senhaAtual">

            <label for="">Nova Senha</label>
            <input type="text" name="novaSenha1">

            <label for="">Digite Novamente a nova senha</label>
            <input type="text" name="novaSenha2">

            <button type="submit">Editar</button>

        </form>

    </div>


    
</body>
</html>