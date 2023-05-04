<?php
    include_once('conexao.php');
    session_start();

    $funcionario = mysqli_query($conn, "SELECT * FROM funcionarios WHERE idFuncionario = ". $_SESSION['idFuncionario']);
    $pega_funcionario = mysqli_fetch_assoc($funcionario);

    date_default_timezone_set('America/Sao_Paulo');
    date_default_timezone_get();
    $myvalue = date('Y-m-d H:i:s');
    $datetime = new DateTime($myvalue);
    $data = $datetime->format('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
            echo('
            <form action="proc_disp_hora.php" method="post">
                <label for="funcionarios">Funcionário:</label>
                <input name="funcionarios" list="funcionarios" value="'. $pega_funcionario['nome_funcionario'] .'" readonly>
                    <datalist id="funcionarios">
                    </datalist><br><br>
                    ');
            echo('
                <label for="servico">Serviço:</label>
                <input name="servico" list="servico">
                    <datalist id="servico">
                        ');
                        switch ($pega_funcionario['cargo']) {
                            case 'Veterinário':
                                echo("<option value='Consulta'>
                                    <option value='Cirurgia'>
                                    <option value='Especialidade'>");
                                break;
                            
                            case 'Tosador':
                                echo("<option value='Banho'>
                                    <option value='Tosa'>
                                    <option value='Hotel'>");
                                break;
                            
                            default:
                            echo("<option value='Erro no cargo. Consulte um administrador'>");
                                break;
                        }
                        
                        echo('
                    </datalist><br><br>
        
                <label for="data">Data:</label>
                <input type="date" name="data" id="data" min="'. $data .'"><br><br>
        
                <label for="hora">Hora:</label>
                <input type="time" name="hora" id="hora"><br><br>
                <input type="submit" value="Enviar">
                </form> <br>
            '); 
        
    ?>
    <script>
        function teste() {
            document.getElementById('botao').click();
        }
    </script>
</body>
</html>