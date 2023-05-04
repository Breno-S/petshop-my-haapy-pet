<?php
    include_once('conexao.php');
    session_start();
    if (isset($_SESSION['idCliente'])) {
        unset($_SESSION['idCliente']);
    }
    if (isset($_SESSION['idFuncionario'])) {
        unset($_SESSION['idFuncionario']);
    }
    header('Location: index.html');
?>