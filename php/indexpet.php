<?php
    session_start();
    include_once("petshop.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="proc_cadastro_pet.php" method="post">
        <?php
        if (isset($_SESSION['msg'])) {
            echo($_SESSION['msg'] . "<br>");
            unset($_SESSION['msg']);
        }
        ?>
        <input type="text" id="nome_pet" name="nome_pet" placeholder="nome do pet">
        <br><br>
        
        <input type="text" id="raca"name="raca" placeholder=" raça do pet">
        <br><br>
       
        <input type="text" id="cor" name="cor" placeholder="cor do pet">
        <br><br>
        <input  type="number" id="peso" name="peso" placeholder="peso do pet" step="any">
        <br><br>
        <input type="date" id="nascimento_pet" name="nascimento_pet" placeholder="nascimento do pet">

        <input type="submit" value="salvar">

    </form>
</body>
</html>