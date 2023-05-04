<?php
    session_start();
    $_SESSION['logado'] = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <?php 
        if (isset($_SESSION['msg'])) {
            echo($_SESSION['msg'] . "<br>");
            unset($_SESSION['msg']);
        }
    ?>

    <div>
        <form action="indexpet.php" method="POST">
            <label for="">Cpf: </label>
            <input name="cpf" type="text" placeholder="CPF">
    
            <label for="">Senha: </label>
            <input name="senha" type="text" placeholder="Senha">

            <button type="submit">Logar</button>
        </form>
    </div>
    
</body>
</html>