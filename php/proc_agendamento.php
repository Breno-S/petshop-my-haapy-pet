<?php
    
    include_once('conexao.php');
    session_start();

    $id_cliente = intval($_SESSION['idCliente']);
    $id_horario = intval(filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_NUMBER_INT));

    if (isset($_SESSION["transporte"])) {
        $transporte = true;
    } else {
        $transporte = false;
    }
    
    // obter os animais selecionados
    $pets = array_slice($_POST, 7);   
    $array_id_pets = array_values($pets);

    // criar registro de agendamento
    $reserva_horario = mysqli_query($conn, "INSERT INTO agendamento (id_cliente, id_horario) VALUES ($id_cliente, $id_horario);");

    if (mysqli_insert_id($conn)) {
        $id_agendamento = mysqli_insert_id($conn);

        for ($i=0; $i < count($array_id_pets); $i++) { 
            $id_animal = $array_id_pets[$i];
            mysqli_query($conn, "INSERT INTO rel_agendamento (fk_agendamento, fk_animal) VALUES ($id_agendamento, $id_animal)");
        }

        $horario_reservado = mysqli_query($conn, "UPDATE horarios_disponiveis SET reservado = 1 WHERE idHorario = $id_horario");

    }

    header('Location:../agendamento.php');
?>
