<?php
    session_start();
    include_once("conexao.php");

    if (isset($_SESSION['idCliente'])) {
        unset($_SESSION['idCliente']);
    }
    if (isset($_SESSION['idFuncionario'])) {
        unset($_SESSION['idFuncionario']);
    }

    // Dados do Login (CPF e Senha)
    $usuario = $_POST['usuario'];
    if (is_numeric($usuario)) {
        $usuario = str_replace('-', '', $usuario);
        $usuario = str_replace('+', '', $usuario);
        $usuario = str_replace('.', '', $usuario);
    }
    $senha = filter_input(INPUT_POST, 'senha');
    $senha = md5($senha);
 
    // Verificação no Banco pelo Funcionário
    $query_funcionario = "SELECT * FROM funcionarios WHERE cpf_funcionario = '$usuario' AND senha_funcionario = '$senha'";
    $result_funcionario = mysqli_query($conn, $query_funcionario);
    $row_funcionario = mysqli_fetch_assoc($result_funcionario);

    if ($row_funcionario > 0) {
        // $_SESSION['msg'] = "<center><span style='color:blue;'>Login Efetuado</span></center>";
        $_SESSION['idFuncionario'] = $row_funcionario['idFuncionario'];
        $_SESSION['cargo'] = $row_funcionario['cargo'];

        switch ($row_funcionario['cargo']) {
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
        // Verificação no Banco
        $query = "SELECT * FROM cliente INNER JOIN cadastro_cliente ON idCliente = id_cliente WHERE cpf = '$usuario' AND senha = '$senha' or email = '$usuario' and senha = '$senha'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    
        // se os inputs(CPF e senha) forem igual ao que está registrado no Banco o usuario será logado
        if($row > 0){
            // $_SESSION['msg'] = "<center><span style='color:blue;'>Login Efetuado</span></center>";
            $_SESSION['idCliente'] = $row['idCliente'];
            header('Location: ../meus_dados.php');
    
        } else {
            $_SESSION['msg'] = "<center><span style='color:red;'>Login ou senha Incorretos</span></center>";
            
            header('Location: ../login.php');
        }
    }
    

?>