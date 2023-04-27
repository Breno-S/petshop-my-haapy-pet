<?php
    include_once('conexao.php');
    session_start();

    // temporário
    $_SESSION['idCliente'] = 1;

    $reservas = mysqli_query($conn, "SELECT * FROM agendamento WHERE id_cliente = ". $_SESSION['idCliente']);


    echo("Próximos: <br>");
    while ($row_agendamento = mysqli_fetch_assoc($reservas)) {
        $horario = mysqli_query($conn, "SELECT * FROM horarios_disponiveis WHERE idHorario = ". $row_agendamento['id_horario'] ." AND data >= NOW()");
        $row_horario = mysqli_fetch_assoc($horario);
        if ($row_horario) {
            echo($row_horario['servico'] ." em ". $row_horario['data'] ." às ". $row_horario['horario'] ."<br>");
        }
    }

    $reservas = mysqli_query($conn, "SELECT * FROM agendamento WHERE id_cliente = ". $_SESSION['idCliente']);
    echo("Passados: <br>");
    while ($row_passados = mysqli_fetch_assoc($reservas)) {
        $horario_passado = mysqli_query($conn, "SELECT * FROM horarios_disponiveis WHERE idHorario = ". $row_passados['id_horario'] ." AND data <= NOW()");
        $row_horario_passado = mysqli_fetch_assoc($horario_passado);
        if ($row_horario_passado) {
            echo($row_horario_passado['servico'] ." em ". $row_horario_passado['data'] ." às ". $row_horario_passado['horario'] ."<br>");
        }
    }
?>