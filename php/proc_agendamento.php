<?php
    
    include_once('conexao.php');
    session_start();

    $arrayFuncionario = array();
    $preco_servico = 0;
    $valor_total = 0;

    $id_cliente = intval($_SESSION['idCliente']);
    $id_horario = intval(filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_NUMBER_INT));
    $servico = filter_input(INPUT_POST, 'servico');

    // definir o preco do serviço
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
        $taxa_transporte = 0;
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
            
            $valor_total += $preco_servico + $taxa_transporte;
        }

        $horario_reservado = mysqli_query($conn, "UPDATE horarios_disponiveis SET reservado = 1 WHERE idHorario = $id_horario");

        $query = "SELECT data, horario FROM horarios_disponiveis WHERE idHorario = $id_horario";
        $query = mysqli_query($conn, $query);   
        $datetime = mysqli_fetch_assoc($query);

        $query = "SELECT idFuncionario FROM funcionarios WHERE cargo='Motorista'";
        $query = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($arrayFuncionario, $row);
        }
        shuffle($arrayFuncionario);

        for($i=0; $i < count($arrayFuncionario); $i++) {
            // print_r($arrayFuncionario[$i]['idFuncionario']); 
            $funcionario = ($arrayFuncionario[$i]['idFuncionario']); 
            $query = 'SELECT data_transporte,horario_transporte FROM transporte WHERE fk_funcionario = "$funcionario",
            data_transporte = $datetime["data"], horario_transporte = $datetime["horario"] ';
        }
        
        // $reserva_transporte = mysqli_query($conn, "INSERT INTO transporte (fk_funcionario,fk_carro, data_transporte, horario_transporte ,tipo) 
        // VALUES ()");

    }

    // header('Location:../agendamento.php');
?>
