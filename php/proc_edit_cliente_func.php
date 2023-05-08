<?php 
    session_start();
    include_once("conexao.php"); //ESTÁ LINKANDO O ARQUIVO COM O BANCO

    // funções de validação reescritas de atividades anteriores em python
    $valido2 = true;

    // ID do cliente
    $id = $_POST['idCliente'];

     // dados pessoais
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $array = explode(' ', $nome, 2);
    $nome = $array[0];
 
     // checa se tem um sobrenome (evita mensagem de erro)
    if (sizeof($array) == 2) {
         $sobrenome = $array[1];
    }else {
         $sobrenome = "";
    }
  
    $logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
    $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $municipio = filter_input(INPUT_POST, 'municipio', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);

    // Pegando o id(chave estrangeira) da Tabela Endereço
    $result = "SELECT * from cliente WHERE idCliente = '$id'";
    $query = mysqli_query($conn, $result);
    $resultado = mysqli_fetch_assoc($query);

    $id_endereco = $resultado['id_endereco'];

    // se algum desses estiver errado, cadastro inválido
    if (strlen($cep) != 8 || strlen($estado) != 2 ||  strlen($numero) > 5  || strlen($celular) != 11) {
        $valido2 = false;
    }

    if($valido2){

        // Inserindo dados na tabela CLIENTE
        $insert1 = "UPDATE cliente SET nome = '$nome', sobrenome = '$sobrenome' WHERE idCliente = '$id'";
        $query1 = mysqli_query($conn, $insert1);
        if(mysqli_affected_rows($conn)){
            $v1 = 1;
        }else {
            $v1 = 0;
        }

        
        // Inserindo dados na tabela Endereco
        $inser2 = "UPDATE endereco SET estado = '$estado', municipio = '$municipio', bairro = '$bairro', logradouro = '$logradouro', numero = '$numero', cep = '$cep' WHERE idEndereco = '$id_endereco'";
        $query2 = mysqli_query($conn, $inser2);
        if(mysqli_affected_rows($conn)){
            $v2 = 1;
        }else {
            $v2 = 0;
        }

        // Inserindo dados na tabela Cadastro_cliente
        $inser3 = "UPDATE cadastro_cliente SET email = '$email', celular = '$celular' WHERE id_cliente = '$id'";
        $query3 = mysqli_query($conn, $inser3);
        if(mysqli_affected_rows($conn)){
            $v3 = 1;
        }else {
            $v3 = 0;
        }

        if(($v1 + $v2 + $v3) >= 1){
            $_SESSION["msg"] = "<p style='color: blue;'>Usuário Editado com sucesso.</p>";
            header("Location: ../edit_cliente_func.php");
        }else {
            $_SESSION["msg"] = "<p style='color: red;'>Usuário não foi editado com sucesso.</p>";
            header("Location: ../edit_cliente_func.php");
        }

    }else {
        $_SESSION["msg"] = "<p style='color: red;'>Usuário não foi editado com sucesso</p>";
        header("Location: ../edit_cliente_func.php");
    }

    

?>
