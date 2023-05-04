<?php
    session_start();
    include_once('petshop.php');
    $id = $_SESSION['id'];
    $dados = "SELECT * FROM cliente INNER JOIN endereco ON id_endereco = idEndereco INNER JOIN cadastro_cliente ON idCliente = id_cliente  WHERE idCliente = '$id'";
    $query = mysqli_query($conn, $dados);
    $resultados = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Dados</title>
</head>
<body>  
    <?php
        // Mensagem se os dados foram editados com sucesso ou não
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>

        <form action="proc_edit_cliente.php" method="POST">
            <label for="">Nome: </label>
            <input type="text" name="nome" placeholder="Digite o nome" value="<?php echo $resultados['nome']; ?>" required>
            <br><br>
            <label for="">Sobrenome: </label>
            <input type="text" name="sobrenome" placeholder="Digite o Sobrenome" value="<?php echo $resultados['sobrenome']; ?>" required>
            <br><br>
            <label for="">Email: </label>
            <input type="text" name="email" placeholder="Digite o Email" value="<?php echo $resultados['email']; ?>" required>
            <br><br>
            <label for="">Celular: </label>
            <input type="text" name="celular" placeholder="Digite o Celular" value="<?php echo $resultados['celular']; ?>" required>
            <br><br>
            <label for="">Cpf: </label>
            <input type="text" name="cpf" value="<?php echo $resultados['cpf']; ?>" readonly required>
            <br><br>
            <label for="">Rg: </label>
            <input type="text" name="rg" value="<?php echo $resultados['rg']; ?>" readonly required>
            <br><br>
            <label for="">Data de Nascimento: </label>
            <input type="date" name="data_nasc" value="<?php echo $resultados['data_nasc']; ?>"  required>
            <br><br>
            <label for="">Logradouro: </label>
            <input type="text" name="logradouro" value="<?php echo $resultados['logradouro']; ?>"  required>
            <br><br>
            <label for="">Numero: </label>
            <input type="number" name="numero" value="<?php echo $resultados['numero']; ?>"  required>
            <br><br>
            <label for="">Cep: </label>
            <input type="number" name="cep" value="<?php echo $resultados['cep']; ?>"  required>
            <br><br>
            <label for="">Bairro: </label>
            <input type="text" name="bairro" value="<?php echo $resultados['bairro']; ?>"  required>
            <br><br>
            <label for="">Municipio: </label>
            <input type="text" name="municipio" value="<?php echo $resultados['municipio']; ?>"  required>
            <br><br>
            <label for="">Estado: </label>
            <input type="text" name="estado" value="<?php echo $resultados['estado']; ?>"  required>
            <br><br>
            <input id="btn" type="submit" value="Salvar">
            
            



        </form>



    
</body>
</html>