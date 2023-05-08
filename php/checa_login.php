<?php
    include_once('conexao.php');
    session_start();

    if (isset($_SESSION['idCliente'])) {
        header('Location:../meus_dados.php');
    }
    elseif (isset($_SESSION['idFuncionario'])) {
        switch ($_SESSION['cargo']) {
            case 'Tosador':
                header('Location: ../horario.php');
                break;
            
            case 'Veterinário':
                header('Location: ../horario.php');
                break;
            
            case 'Secretária':
                header('Location: ../relatorio.php');
                break;
            
            case 'Administrador':
                header('Location: ../relatorio.php');
                break;
            
            default:
                $_SESSION['msg'] = "<center><span style='color:red;'>Erro no Cargo. Consulte um Administrador.</span></center>";
                header('Location: ../login.php');
                break;
        }
    }
    else {
        header('Location: ../login.php');
    }
?>