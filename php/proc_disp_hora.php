<?php
    include_once('conexao.php');
    session_start();

    $id_func = $_SESSION['idFunc'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $servico = $_POST['servico'];

    $cad_horario = mysqli_query($conn, "INSERT INTO horarios_disponiveis (id_funcionario, data, horario, reservado, servico) VALUES ($id_func, '$data', '$hora', 0, '$servico')");

    unset($_SESSION['id_func']);
    header('Location: disp_hora.php');
?>