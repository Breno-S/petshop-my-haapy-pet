<?php
    include_once('conexao.php');
    session_start();

    $funcionarios = mysqli_query($conn, "SELECT * FROM funcionarios");
    $pega_funcionarios = mysqli_fetch_assoc($funcionarios);
    $num_funcionarios = mysqli_query($conn, "SELECT COUNT(idFuncionario) AS qtFunc FROM funcionarios");
    $qt_funcionarios = mysqli_fetch_assoc($num_funcionarios);

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
        if (isset($_SESSION['func'])) {
            echo('
            <form action="proc_disp_hora.php" method="post">
                <label for="funcionarios">Funcionário:</label>
                <input name="funcionarios" list="funcionarios" value="'. $_SESSION['func'] .'" readonly>
                    <datalist id="funcionarios">
                    </datalist><br><br>
                    ');
            echo('
                <label for="servico">Serviço:</label>
                <input name="servico" list="servico">
                    <datalist id="servico">
                        '); echo($_SESSION['servicos']); echo('
                    </datalist><br><br>
        
                <label for="data">Data:</label>
                <input type="date" name="data" id="data" min="'. $data .'"><br><br>
        
                <label for="hora">Hora:</label>
                <input type="time" name="hora" id="hora"><br><br>
                <input type="submit" value="Enviar">
                </form> <br>
                <button onclick="location.reload()">Voltar</button>
            ');
            unset($_SESSION['func']);
        } else {
            echo('
            <form action="disp_hora2.php" method="get">
                <label for="funcionarios">Funcionário:</label>
                <input list="funcionarios" name="funcionarios" oninput="teste()">
                    <datalist id="funcionarios">
                        ');
                            for ($i=1; $i <= $qt_funcionarios['qtFunc']; $i++) { 
                                $funcionario = mysqli_query($conn, "SELECT * FROM funcionarios WHERE idFuncionario = $i AND (cargo = 'veterinario' OR cargo = 'tosador')");
                                $pega_funcionario = mysqli_fetch_assoc($funcionario);
                                if (isset($pega_funcionario['nome_funcionario'])) {
                                    echo("<option value='". $pega_funcionario['nome_funcionario'] ."'>");
                                }
                            } 
                        
            echo('  </datalist><br><br>
                    ');
            echo('
                <label for="servico">Serviço:</label>
                <input list="servico" disabled>
                    <datalist id="servico">

                    </datalist><br><br>
        
                <label for="data">Data:</label>
                <input type="date" name="data" id="data" disabled><br><br>
        
                <label for="hora">Hora:</label>
                <input type="time" name="hora" id="hora" disabled><br><br>
                <input id="botao" type="submit" value="Continuar">
            </form>');
        }
        
    ?>
    <script>
        function teste() {
            document.getElementById('botao').click();
        }
    </script>
</body>
</html>