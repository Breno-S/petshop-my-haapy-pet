<?php
    session_start();
    include_once('conexao.php');
    $_SESSION['idFuncionario'] = 2;

    date_default_timezone_set('America/Sao_Paulo');
    date_default_timezone_get();
    $myvalue = date('Y-m-d H:i:s');
    $datetime = new DateTime($myvalue);
    $data = $datetime->format('Y-m-d');

    $pega_hora_ant = mysqli_query($conn, "SELECT * FROM horarios_disponiveis WHERE data < '$data' AND id_funcionario =". $_SESSION['idFuncionario'] ." ORDER BY data ASC;");
    $pega_hora_hoj = mysqli_query($conn, "SELECT * FROM horarios_disponiveis WHERE data = '$data' AND id_funcionario =". $_SESSION['idFuncionario'] ." ORDER BY data ASC;");
    $pega_hora_dep = mysqli_query($conn, "SELECT * FROM horarios_disponiveis WHERE data > '$data' AND id_funcionario =". $_SESSION['idFuncionario'] ." ORDER BY data ASC;");

    echo("<h2>Agendamentos Passados:</h2>");
    while ($row_antes = mysqli_fetch_assoc($pega_hora_ant)) {
        $data_antes = date_create($row_antes['data']);
        $data_antes = date_format($data_antes, 'd/m/Y');
        $agendado_ant = mysqli_query($conn, "SELECT * FROM agendamento WHERE id_horario =". $row_antes['idHorario']);
        $agendado_antes = mysqli_fetch_assoc($agendado_ant);
        $pet_agend_ant = mysqli_query($conn, "SELECT * FROM cadastro_pet WHERE idPet =". $agendado_antes['id_animal']);
        $pet_agend_antes = mysqli_fetch_assoc($pet_agend_ant);
        $cliente_agend_ant = mysqli_query($conn, "SELECT * FROM cliente WHERE idCliente =". $agendado_antes['id_cliente']);
        $cliente_agend_antes = mysqli_fetch_assoc($cliente_agend_ant);
        echo("<p>Cliente ".$cliente_agend_antes['nome'] ." agendou " . $row_antes['servico'] ." para ". $pet_agend_antes['nome_pet'] ." em ". $data_antes ." às ". $row_antes['horario'] ."</p>");
    }

    echo("<h2>Agendamentos Hoje:</h2>");
    while ($row_hoje = mysqli_fetch_assoc($pega_hora_hoj)) {
        $data_hoje = date_create($row_hoje['data']);
        $data_hoje = date_format($data_hoje, 'd/m/Y');
        $agendado_hoj = mysqli_query($conn, "SELECT * FROM agendamento WHERE id_horario =". $row_hoje['idHorario']);
        $agendado_hoje = mysqli_fetch_assoc($agendado_hoj);
        $pet_agend_hoj = mysqli_query($conn, "SELECT * FROM cadastro_pet WHERE idPet =". $agendado_hoje['id_animal']);
        $pet_agend_hoje = mysqli_fetch_assoc($pet_agend_hoj);
        $cliente_agend_hoj = mysqli_query($conn, "SELECT * FROM cliente WHERE idCliente =". $agendado_hoje['id_cliente']);
        $cliente_agend_hoje = mysqli_fetch_assoc($cliente_agend_hoj);
        echo("<p>Cliente ".$cliente_agend_hoje['nome'] ." agendou " . $row_hoje['servico'] ." para ". $pet_agend_hoje['nome_pet'] ." em ". $data_hoje ." às ". $row_hoje['horario'] ."</p>");
    }

    echo("<h2>Agendamentos Futuros:</h2>");
    while ($row_depois = mysqli_fetch_assoc($pega_hora_dep)) {
        $data_depois = date_create($row_depois['data']);
        $data_depois = date_format($data_depois, 'd/m/Y');
        $agendado_dep = mysqli_query($conn, "SELECT * FROM agendamento WHERE id_horario =". $row_depois['idHorario']);
        $agendado_depois = mysqli_fetch_assoc($agendado_dep);
        $pet_agend_dep = mysqli_query($conn, "SELECT * FROM cadastro_pet WHERE idPet =". $agendado_depois['id_animal']);
        $pet_agend_depois = mysqli_fetch_assoc($pet_agend_dep);
        $cliente_agend_dep = mysqli_query($conn, "SELECT * FROM cliente WHERE idCliente =". $agendado_depois['id_cliente']);
        $cliente_agend_depois = mysqli_fetch_assoc($cliente_agend_dep);
        echo("<p>Cliente ".$cliente_agend_depois['nome'] ." agendou " . $row_depois['servico'] ." para ". $pet_agend_depois['nome_pet'] ." em ". $data_depois ." às ". $row_depois['horario'] ."</p>");
    }

    

?>