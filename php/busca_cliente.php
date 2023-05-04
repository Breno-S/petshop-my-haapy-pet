<?php

    include_once('conexao.php');
    session_start();

    if (isset($_SESSION['buscaCliente'])) {
        if (is_numeric($_SESSION['buscaCliente'])) {
            $cliente = mysqli_query($conn, "SELECT * FROM cliente WHERE cpf = ". intval($_SESSION['buscaCliente']) ." OR rg = ". intval($_SESSION['buscaCliente']));
        }
        else {
            $cliente = mysqli_query($conn, "SELECT * FROM cliente WHERE nome LIKE '%". $_SESSION['buscaCliente'] ."%'");
        }
        unset($_SESSION['buscaCliente']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar </title>
</head>
<body>
    <form action="busca_cliente2.php" method="post">
        <label for="busca_cliente">Cliente:</label>
        <input type="text" name="busca_cliente" id="busca_cliente" placeholder="Nome, RG ou CPF do Cliente"> <br><br>
        <input type="submit" value="pesquisar">
    </form><br>
    <?php
        if (isset($cliente)) {
            while ($row_cliente = mysqli_fetch_assoc($cliente)) {
                $d_cliente = mysqli_query($conn, "SELECT * FROM cadastro_cliente WHERE id_cliente = ". intval($row_cliente['idCliente']) ."");
                $dados_cliente = mysqli_fetch_assoc($d_cliente);
                $d_cliente2 = mysqli_query($conn, "SELECT * FROM endereco WHERE idEndereco = ". intval($row_cliente['id_endereco']) ."");
                $dados_cliente2 = mysqli_fetch_assoc($d_cliente2);
                echo('<div> 
                        <h1 class="nome_cliente">Nome: '. $row_cliente['nome'] .' '. $row_cliente['sobrenome'] .'</h1>
                        <p class="cpf_cliente">CPF: '. $row_cliente['cpf'] .'</p>
                        <p class="rg_cliente">RG: '. $row_cliente['rg'] .'</p>
                        <p class="data_nasc_cliente">Data de Nascimento: '. $row_cliente['data_nasc'] .'</p>
                        <p class="data_cad_cliente>Data de Cadastro: '. $dados_cliente['data_cad'] .'</p>
                        <p class="email_cliente">Email: '. $dados_cliente['email'] .'</p>
                        <p class="cep_cliente">CEP: '. $dados_cliente2['cep'] .'</p>
                        <p class="estado_cliente">Estado: '. $dados_cliente2['estado'] .'</p>
                        <p class="municipio_cliente">Municipio: '. $dados_cliente2['municipio'] .'</p>
                        <p class="bairro_cliente">Bairro: '. $dados_cliente2['bairro'] .'</p>
                        <p class="logradouro_cliente">Logradouro: '. $dados_cliente2['logradouro'] .'</p>
                        <p class="numero_cliente">Número: '. $dados_cliente2['numero'] .'</p>   
                    </div>');
            }
        }
    ?>
    
</body>
</html>