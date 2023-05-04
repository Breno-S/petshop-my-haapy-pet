<?php
    session_start();
    include_once("petshop.php");


    // Dados do login do Admin
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $senha = md5($senha);

    // Verificação de Dados no Banco de Dados
    $query = "SELECT * FROM cliente INNER JOIN cadastro_cliente ON idCliente = id_cliente WHERE cpf = '$cpf' AND senha = '$senha' or email = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Verifificar ser os dados estão corretos que foi digitado. 
    if($row > 0){
        $_SESSION['msg'] = "<center><span style='color:blue;'>Login Efetuado com Sucesso</span></center>";
        $_SESSION['id'] = $row['idCliente'];
        $_SESSION['logado'] = true;
        header('Location: login.adm.php');

    } else {
        $_SESSION['msg'] = "<center><span style='color:red;'>Login ou senha Incorretos</span></center>";
        $_SESSION['logado'] = false;
        header('Location: login.adm.php');
    }

?>