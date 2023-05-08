<?php
    
    include_once('conexao.php');
    session_start();

    
    $id_animal = intval(filter_input(INPUT_POST, 'animal', FILTER_SANITIZE_NUMBER_INT));
    $id_horario = intval(filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_NUMBER_INT));

    $reserva_horario = mysqli_query($conn, "INSERT INTO agendamento (id_cliente, id_animal, id_horario) VALUES (". $_SESSION['idCliente'] .", $id_animal, $id_horario);");
    $horario_reservado = mysqli_query($conn, "UPDATE horarios_disponiveis SET reservado = 1 WHERE idHorario = $id_horario");
    header('Location:../agendamento.php');
?>
