<?php
    session_start();
    include_once('conexao.php');

    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    $cpf = str_replace('-', '', $cpf);
    $cpf = str_replace('+', '', $cpf);
    $cpf = str_replace('.', '', $cpf);

    $cliente = mysqli_query($conn, "SELECT * FROM cliente INNER JOIN cadastro_cliente ON id_cliente = idCliente WHERE cpf = $cpf");
    $pega_cliente = mysqli_fetch_assoc($cliente);

    $animais = mysqli_query($conn, "SELECT COUNT(idPet) AS qt_pets FROM cadastro_pet WHERE id_cliente =". $pega_cliente['idCliente']);
    $qt_pets = mysqli_fetch_assoc($animais);

    $compras = mysqli_query($conn, "SELECT COUNT(idPedido) AS qt_compras FROM pedidos WHERE status_pedido = 'Finalizado' AND id_cliente =". $pega_cliente['idCliente']);
    $qt_compras = mysqli_fetch_assoc($compras);

    $agendamentos = mysqli_query($conn, "SELECT COUNT(idAgendamento) AS qt_agendamentos FROM agendamento INNER JOIN horarios_disponiveis ON id_horario = idHorario WHERE data <= NOW() AND id_cliente =". $pega_cliente['idCliente']);
    $qt_agendamentos = mysqli_fetch_assoc($agendamentos);


    $_SESSION['data_cad'] = date_format(date_create($pega_cliente['data_cad']), 'd/m/Y H:i:s');
    $_SESSION['qt_pets'] = $qt_pets['qt_pets'];
    $_SESSION['qt_comp'] = $qt_compras['qt_compras'];
    $_SESSION['qt_agen'] = $qt_agendamentos['qt_agendamentos'];

    header('Location: ../relatorio_cliente.php');

?>