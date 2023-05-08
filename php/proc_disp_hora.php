<?php
    include_once('conexao.php');
    session_start();

    $pega_id = explode(" ", $_POST['funcionarios']);
    $id_func = $pega_id[1];
    $data = $_POST['data'];
    $hora = $_POST['horario'];
    $servico = $_POST['servico'];

    $cad_horario = mysqli_query($conn, "INSERT INTO horarios_disponiveis (id_funcionario, data, horario, reservado, servico) VALUES ($id_func, '$data', '$hora', 0, '$servico')");

    // unset($_SESSION['id_func']);
    header('Location: ../horario.php');
?>