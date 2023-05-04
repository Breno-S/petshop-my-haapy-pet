<?php
    session_start();
    include_once("petshop.php");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login - Admin </title>
</head>
<body>
    <div>
<form action="login.adm.php" method="POST">

<label for="">CPF:</label><br>
<input type="text" name="cpf" id="cpf" placeholder="CPF">

<label for="">Email:</label>
<input type="text" name="email"  id="email" placeholder="Email"><br>

<label for="">Senha:</label>
<input type="text" name="Senha" id="Senha" placeholder="Senha">

<input type="submit" value="Acessar">


</form>

    </div>
      
</body>
</html>