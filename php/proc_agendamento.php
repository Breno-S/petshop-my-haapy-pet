<?php
    
    include_once('conexao.php');
    session_start();

    $arrayFuncionario = array();
    $preco_servico = 0;
    $valor_total = 0;
    
    $query_rel = '';

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
        $taxa_transporte = 0;
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

        $update_valor_total = mysqli_query($conn, "UPDATE agendamento SET valor_total = $valor_total WHERE idAgendamento = $id_agendamento");

        // Muda o horário para reservado
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

        $horario_entrega = date('H:i:s', strtotime($datetime['horario'] . '+1 hour'));
        $horario_busca = date('H:i:s', strtotime($datetime['horario'] . '-1 hour'));
        
        for($i=0; $i < count($arrayFuncionario); $i++) {
            $funcionario = ($arrayFuncionario[$i]['idFuncionario']);
            $query = "SELECT data_transporte, horario_transporte FROM transporte WHERE fk_funcionario = '$funcionario' AND
            data_transporte = '{$datetime['data']}' AND horario_transporte = '{$datetime['horario']}'";
            $query = mysqli_query($conn, $query);
            $resultado_query = mysqli_fetch_assoc($query);

            if (empty($resultado_query)){
                
                // Inserir na tabela de transporte, a busca do animal
                $query = "INSERT INTO transporte VALUES (DEFAULT, '$funcionario', 0, '{$datetime['data']}', '$horario_busca', 'Busca' )";
                $insert_query = mysqli_query($conn, $query);
                $id_transporte = mysqli_insert_id($conn);

                //Inserir na tabela de relacionamento de transporte a busca do animal
                $query_rel = "INSERT INTO rel_transporte (pk_reltransporte, fk_animal, fk_transporte, fk_cliente) VALUES ( DEFAULT, '$id_animal', '$id_transporte', '$id_cliente')";
                $query_rel = mysqli_query($conn, $query_rel);

                //Inserir na tabela de transporte, a entrega do animal
                $query = "INSERT INTO transporte VALUES (DEFAULT, '$funcionario', 0, '{$datetime['data']}', '$horario_entrega', 'Entrega' )";
                $insert_query = mysqli_query($conn, $query);
                $id_transporte = mysqli_insert_id($conn);

                //Inserir na tabela de relacionamento de transporte a entrega do animal
                $query_rel = "INSERT INTO rel_transporte (pk_reltransporte, fk_animal, fk_transporte, fk_cliente) VALUES ( DEFAULT, '$id_animal', '$id_transporte', '$id_cliente')";
                $query_rel = mysqli_query($conn, $query_rel);
                
            }
        }
        

    }

    header('Location:../agendamento.php');
?>
