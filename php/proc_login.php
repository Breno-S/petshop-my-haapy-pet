<?php
    session_start();
    include_once("conexao.php");

    $_SESSION['logado'] = false;

    // Dados do Login (CPF e Senha)
    $usuario = $_POST['usuario'];
    $senha = filter_input(INPUT_POST, 'senha' );
    $senha = md5($senha);

    // Verificação no Banco
    $query = "SELECT * FROM cliente INNER JOIN cadastro_cliente ON idCliente = id_cliente WHERE cpf = '$usuario' AND senha = '$senha' or email = '$usuario' and senha = '$senha'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // se os inputs(CPF e senha) forem igual ao que está registrado no Banco o usuario será logado
    if($row > 0){
        $_SESSION['msg'] = "<center><span style='color:blue;'>Login Efetuado</span></center>";
        $_SESSION['id'] = $row['idCliente'];
        $_SESSION['logado'] = true;
        header('Location: ../login.php');

    } else {
        $_SESSION['msg'] = "<center><span style='color:red;'>Login ou senha Incorretos</span></center>";
        $_SESSION['logado'] = false;
        header('Location: ../login.php');
    }

?>