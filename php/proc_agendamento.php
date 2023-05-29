<?php
    
    include_once('conexao.php');
    session_start();

    $taxa_transporte = 0;
    $preco_servico = 0;
    $valor_total = 0;

    $id_cliente = intval($_SESSION['idCliente']);
    $id_horario = intval(filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_NUMBER_INT));
    $servico = filter_input(INPUT_POST, 'servico');

    // Definir o preco do serviço
    switch ($servico) {
        case 'Banho':
        case 'Tosa':
            $preco_servico = 100;
            break;
        case 'Hotel':
            $preco_servico = 200;
            break;
        case 'Consulta':
            $preco_servico = 400;
            break;
        case 'Cirurgia':
            $preco_servico = 600;
            break;
        case 'Especialidade':
            $preco_servico = 500;
            break;
    }

    if (isset($_SESSION["transporte"])) {
        $transporte = true;
        $taxa_transporte = 80;
    } else {
        $transporte = false;
    }
    
    // Obter os animais selecionados
    $pets = array_slice($_POST, 7);   
    $array_id_pets = array_values($pets);

    // Criar registro de agendamento
    $reserva_horario = mysqli_query($conn, "INSERT INTO agendamento (id_cliente, id_horario) VALUES ($id_cliente, $id_horario);");

    if (mysqli_insert_id($conn)) {
        $id_agendamento = mysqli_insert_id($conn);

        // Calcular valor total
        for ($i=0; $i < count($array_id_pets); $i++) { 
            $id_animal = $array_id_pets[$i];
            mysqli_query($conn, "INSERT INTO rel_agendamento (fk_agendamento, fk_animal) VALUES ($id_agendamento, $id_animal)");
            
            $valor_total += $preco_servico + $taxa_transporte;
        }

        // Muda o horário para reservado
        $horario_reservado = mysqli_query($conn, "UPDATE horarios_disponiveis SET reservado = 1 WHERE idHorario = $id_horario");

        // Salva o valor total do agendamento
        mysqli_query($conn, "UPDATE agendamento SET valor_total = $valor_total WHERE idAgendamento = $id_agendamento");
    }

    header('Location:../agendamento.php');
?>
