<?php

    include_once('conexao.php');
    session_start();

    if (isset($_SESSION['nomePet'])) {
        $pets = mysqli_query($conn, "SELECT * FROM cadastro_pet WHERE nome_pet LIKE '%". $_SESSION['nomePet'] ."%'");
        unset($_SESSION['nomePet']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Pet</title>
</head>
<body>
    <form action="busca_animal2.php" method="post">
        <label for="nome_animal">Nome do Animal</label>
        <input type="text" name="nome_animal" id="nome_animal"> <br><br>
        <input type="submit" value="pesquisar">
    </form><br>
    <?php
        if (isset($pets)) {
            while ($row_pet = mysqli_fetch_assoc($pets)) {
                $pega_dono = mysqli_query($conn, "SELECT * FROM cliente WHERE idCliente = ". $row_pet['id_cliente']);
                $dono = mysqli_fetch_assoc($pega_dono);
                echo('<div> 
                        <h1 class="dono_pet">Dono: '. $dono['nome'] .' '. $dono['sobrenome'] .'</h1>
                        <p class="nome_pet">Nome: '. $row_pet['nome_pet'] .'</p>
                        <p id="raca_pet">Tipo: '. $row_pet['raca'] .'</p>
                        <p id="sexo_pet">Sexo: '. $row_pet['sexo_pet'] .'</p>
                        <p id="cor_pet">Cor: '. $row_pet['cor_pet'] .'</p>
                        <p id="data_nasc_pet">Data de Nascimento: '. $row_pet['data_nasc_pet'] .'</p>
                        <p id="peso_pet">Peso: '. $row_pet['peso_pet'] .'</p>
                        <p id="data_cad_pet">Data de Cadastro: '. $row_pet['data_cad_pet'] .'</p>
                    </div>');
            }
        }
    ?>
    
</body>
</html>