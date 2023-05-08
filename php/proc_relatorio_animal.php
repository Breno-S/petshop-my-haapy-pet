<?php
    session_start();
    include_once('conexao.php');

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cpf  = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);


    $cpf = str_replace('-', '', $cpf);
    $cpf = str_replace('.', '', $cpf);

    // Pesquisa no Banco 
    $result_usuario = "SELECT * FROM cliente INNER JOIN cadastro_cliente ON idCliente = id_cliente WHERE cpf = '$cpf'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
    $id = $row_usuario['idCliente'];

    if($row_usuario == 0){
        $_SESSION['msg'] = "<p style = 'color:red;'>PET NÃO ENCONTRADO</p>";
                header("Location: relatorio_animal.php");
    }else{
        //busca a data de cadastro do pet
        $result_usuario1 = "SELECT data_cad_pet as cad_pet  FROM cadastro_pet INNER JOIN agendamento on cadastro_pet.id_cliente = agendamento.id_cliente where cadastro_pet.id_cliente = '$id' and nome_pet LIKE '$nome'";
        $resultado_usuario1 = mysqli_query($conn, $result_usuario1);
        $row_usuario1 = mysqli_fetch_assoc($resultado_usuario1);
        

        //conta quantos atendimentos esse animal fez
        $result_usuario2 = "SELECT COUNT(idAgendamento) as quantidade  FROM cadastro_pet INNER JOIN agendamento on cadastro_pet.idPet = agendamento.id_animal where cadastro_pet.id_cliente = '$id' and nome_pet LIKE '$nome'";
        $resultado_usuario2 = mysqli_query($conn, $result_usuario2);
        $row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);

        if($row_usuario1 == 0 or $row_usuario2 == 0 ){
            $_SESSION['msg'] = "<p style = 'color:red;'>Não encontrado</p>";
                
        }else{
            echo "Data de Cadastro do Pet: ".$row_usuario1['cad_pet'];

            echo "<br><br>";

            echo "Atendimentos Totais do Pet: ".$row_usuario2['quantidade'];
            
        }

        $_SESSION['data_cad_pet'] = $row_usuario1['cad_pet'];
        $_SESSION['qt_atendimento'] = $row_usuario2['quantidade'];

        header("Location: ../relatorio_animal.php");

    }
