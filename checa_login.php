<?php
    include_once('conexao.php');
    session_start();

    if (isset($_SESSION['idCliente'])) {
        header('Location:usuario.html');
    }
    elseif (isset($_SESSION['idFuncionario'])) {
        // Verificação no Banco pelo Funcionário
        $query_funcionario = "SELECT * FROM funcionarios WHERE cpf_funcionario = '$usuario' AND senha_funcionario = '$senha'";
        $result_funcionario = mysqli_query($conn, $query_funcionario);
        $row_funcionario = mysqli_fetch_assoc($result_funcionario);
        switch ($row_funcionario['cargo']) {
            case 'Tosador':
                header('Location: tosa_vet.html');
                break;
            
            case 'Veterinário':
                header('Location: tosa_vet.html');
                break;
            
            case 'Secretária':
                header('Location: secretaria.html');
                break;
            
            case 'Administrador':
                header('Location: admin.html');
                break;
            
            default:
                $_SESSION['msg'] = "<center><span style='color:red;'>Erro no Cargo. Consulte um Administrador.</span></center>";
                header('Location: login.html');
                break;
        }
    }
    else {
        header('Location:login.html');
    }
?>