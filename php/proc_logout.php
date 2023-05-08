<?php
    include_once('conexao.php');
    session_start();
    if (isset($_SESSION['idCliente']) || isset($_SESSION['idFuncionario'])) {
        session_destroy();
    }
    header('Location: ../index.html');
?>