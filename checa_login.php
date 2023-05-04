<?php
    include_once('conexao.php');
    session_start();

    if (isset($_SESSION['idCliente'])) {
        header('Location:usuario.html');
    }
    else {
        header('Location:login.html');
    }
?>