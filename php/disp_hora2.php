<?php
    include_once('conexao.php');
    session_start();

    $funcionarios = mysqli_query($conn, "SELECT * FROM funcionarios");
    $pega_funcionarios = mysqli_fetch_assoc($funcionarios);
    $_SESSION['func'] = $_GET['funcionarios'];

    // faz query usando esse nome, pra pegar o cargo do funcionário
    $cargo = mysqli_query($conn, "SELECT * FROM funcionarios WHERE nome_funcionario = '". $_SESSION['func'] ."'");
    // e dependendo do cargo, disponibiliza diferentes opções de serviços
    $pega_cargo = mysqli_fetch_assoc($cargo);
    $_SESSION['idFunc'] = $pega_cargo['idFuncionario'];
    if ($pega_cargo['cargo'] == "Veterinário") {
        $_SESSION['servicos'] = "<option value='Consulta'>
                    <option value='Cirurgia'>
                    <option value='Especialidade'>";
                }
    elseif ($pega_cargo['cargo'] == "Tosador") {
        $_SESSION['servicos'] = "<option value='Banho'>
                    <option value='Tosa'>
                    <option value='Hotel'>";
    }
    // etc
    header('Location: disp_hora.php')
?>