
<?php
    session_start();
    include_once("petshop.php");
    if (isset($_SESSION['msg'])) {
        echo($_SESSION['msg'] . "<br>");
        unset($_SESSION['msg']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Animal</title>
</head>
<body>
    <h1>Relatório Animal</h1>
    <form action="proc_relatorio_animal.php" method="post">
        <label for="">Nome do Pet</label>
        <input type="text" name="nome" id="nome" placeholder="Nome do Pet" required>
        <br>
        <br>
        <label for="">CPF do Dono</label>
        <input type="number" required id="cpf" name="cpf" placeholder="CPF do Dono">
        <br>
        <br>
        <input type="submit">
    </form>
  
    
</body>
</html>