<?php
    include_once("conexao.php");
    session_start();

    $data_input = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $data = date_create($data_input);
    $data = date_format($data, 'Y-m-d');

    echo "<h1>Relatório da Data $data</h1>";
    // consulta clientes cadastrados no dia
    $result_usuario = "SELECT COUNT(data_cad) as quantidade FROM cadastro_cliente where data_cad BETWEEN '$data 00:00:00' AND '$data 23:59:59'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);

     //consulta petes cadastrados no dia
    $result_usuario1 = "SELECT COUNT(data_cad_pet) as quantidade_pet FROM cadastro_pet WHERE data_cad_pet BETWEEN '$data 00:00:00' AND '$data 23:59:59'";
     $resultado_usuario1 = mysqli_query($conn, $result_usuario1);
     $row_usuario1 = mysqli_fetch_assoc($resultado_usuario1);

    //consulta quantidades de vendas no dia
    $result_usuario2 = "SELECT COUNT(data_pag) as quantidade_pag FROM pagamento WHERE data_pag BETWEEN '$data 00:00:00' AND '$data 23:59:59'";
    $resultado_usuario2 = mysqli_query($conn, $result_usuario2);
    $row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);

    //consulta quantidades de atendimentos no dia
     $result_usuario3 = "SELECT COUNT(idAgendamento) as quantidade_atendimento FROM agendamento INNER JOIN horarios_disponiveis on idHorario = agendamento.id_horario where data = '$data' ";
     $resultado_usuario3 = mysqli_query($conn,$result_usuario3);
     $row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);

    if($row_usuario == 0 or $row_usuario1 == 0 or $row_usuario2 == 0 or  $row_usuario3 == 3 ){
        $_SESSION['msg'] = "<p style = 'color:red;'>Erro!</p>";
                header("Location: ../relatorio_data.php");
    }else{
        echo "Total de Clientes cadastrados: ".$row_usuario['quantidade'];

        echo "<br><br>";
        echo "Total de Pets cadastrados : ".$row_usuario1['quantidade_pet'];

        echo "<br><br>";
        echo "Quantidade total de vendas : ".$row_usuario2['quantidade_pag'];
        echo "<br><br>";
        echo "Quantidade total de atendimentos : ".$row_usuario3['quantidade_atendimento'];

        
        $_SESSION['qt_cad'] = $row_usuario['quantidade'];
        $_SESSION['qt_pet'] = $row_usuario1['quantidade_pet'];
        $_SESSION['qt_pag'] = $row_usuario2['quantidade_pag'];
        $_SESSION['qt_atendimento'] = $row_usuario3['quantidade_atendimento'];
        header('Location: ../relatorio_data.php');
    }
    



    

    
        

    

    

  

   


?>