<?php

    include_once('conexao.php');
    session_start();

    $_SESSION['buscaCliente'] = $_POST['busca_cliente'];

    header('Location: ../busca_cliente.php');
?>
