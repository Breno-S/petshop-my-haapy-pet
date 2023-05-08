<?php

    include_once('conexao.php');
    session_start();

    $_SESSION['nomePet'] = $_POST['nome_animal'];

    header('Location: ../busca_animal.php');
?>
