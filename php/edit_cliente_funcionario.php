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
    <title>Edit Cliente</title>
</head>
<body>
    <?php
    if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
    }
    ?>
    
    <form action="" method="POST">
        <label for="">Informe o CPF: </label>
        <input type="text" placeholder="Digite o CPF" name="cpf">
    </form>

    <br><br>
    <?php


        if(isset($_POST['cpf'])){
            $cpf = $_POST['cpf'];
            $cpf = str_replace('-', '', $cpf);
            $cpf = str_replace('+', '', $cpf);
            $cpf = str_replace('.', '', $cpf);

            

            $verificacao = "SELECT * FROM cliente WHERE cpf = '$cpf'";
            $query = mysqli_query($conn, $verificacao);
            

            if($result = mysqli_fetch_assoc($query)){

                $resultados = "SELECT * FROM cliente INNER JOIN cadastro_cliente ON idCliente = id_cliente INNER JOIN endereco ON idEndereco = id_endereco WHERE cpf = '$cpf'";
                $query2 = mysqli_query($conn, $resultados);
                $result = mysqli_fetch_assoc($query2);

                //dados cliente:
                $nome = $result['nome'];
                $sobrenome = $result['sobrenome'];
                $email = $result['email'];
                $celular = $result['celular'];
                $nascimento = $result['data_nasc'];
                
                $nascimento2 = date("d/m/Y", strtotime($nascimento));
                $cpf = $result['cpf'];
                $rg = $result['rg'];
                $data_cadastro = $result['data_cad'];
                $data_cadastro2 = date("d/m/Y", strtotime($data_cadastro));
                $cep = $result['cep'];
                $estado = $result['estado'];
                $bairro = $result['bairro'];
                $logradouro = $result['logradouro'];
                $numero = $result['numero'];
                $municipio = $result['municipio'];


                echo "<form action='proc_editcliente_func.php' method='POST'>";
                echo "<label>Nome: </label>";
                echo "<input type='text' name='nome' value='$nome'></input>";
                echo "<br><br>";
                echo "<label>Sobrenome: </label>";
                echo "<input type='text' name='sobrenome' value='$sobrenome'></input>";
                echo "<br><br>";
                echo "<label>Email: </label>";
                echo "<input type='text'  name='email' value='$email'></input>";
                echo "<br><br>";
                echo "<label>Celular: </label>";
                echo "<input type='number'  name='celular' value='$celular'></input>";
                echo "<br><br>";
                echo "<label>Data de Nascimento: </label>";
                echo "<input type='date'  name='nascimento' value='$nascimento'></input>";
                echo "<br><br>";
                echo "<label>CPF: </label>";
                echo "<input type='text' readonly name='cpf' value='$cpf'></input>";
                echo "<br><br>";
                echo "<label>RG: </label>";
                echo "<input type='text' readonly name='rg' value='$rg'></input>";
                echo "<br><br>";
                echo "<label>Data de Cadastro: </label>";
                echo "<input type='date' readonly name='data_cadastro' value='$data_cadastro'></input>";
                echo "<br><br>";
                echo "<label>CEP: </label>";
                echo "<input type='text'  name='cep' value='$cep'></input>";
                echo "<br><br>";
                echo "<label>Logradouro: </label>";
                echo "<input type='text'  name='logradouro' value='$logradouro'></input>";
                echo "<br><br>";
                echo "<label>Número: </label>";
                echo "<input type='text'  name='numero' value='$numero'></input>";
                echo "<br><br>";
                echo "<label>Bairro: </label>";
                echo "<input type='text'  name='bairro' value='$bairro'></input>";
                echo "<br><br>";
                echo "<label>Município: </label>";
                echo "<input type='text' name='municipio' value='$municipio'></input>";
                echo "<br><br>";
                echo "<label>Estado: </label>";
                echo "<input type='text' name='estado' value='$estado'></input>";
                echo "<br><br>";
                echo "<button type='submit'>Editar</button>";
                echo "</form>";
            } else {
                echo "<p style='color: red'>Cliente não Encontrado</p>";
            }


        }

    ?>

    
</body>
</html>