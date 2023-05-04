
<?php
session_start();
include_once("petshop.php");

// Dados dos Inputs
$nome_pet = filter_input(INPUT_POST,'nome_pet',FILTER_SANITIZE_STRING);
$raca = filter_input(INPUT_POST,'raca',FILTER_SANITIZE_STRING);

$cor_pet = filter_input(INPUT_POST,'cor',FILTER_SANITIZE_STRING);
$peso_pet = filter_input(INPUT_POST,'peso');
$nasc_pet = filter_input(INPUT_POST,'nascimento_pet',FILTER_SANITIZE_STRING);

 $peso_pet = str_replace(',', '', $peso_pet);
$id = $_SESSION['idCliente'];
 

 if(is_numeric ($peso_pet )){
    $result_usuario ="INSERT INTO cadastro_pet (id_cliente, nome_pet, raca, cor_pet, data_nasc_pet, peso_pet, data_cad_pet) VALUES ('$id','$nome_pet', '$raca','$cor_pet','$nasc_pet','$peso_pet', NOW())";//quando configuramos o campo  criado como datetime e depois colocamos NOW ele vai trazer a hora que foi modificado ou excluido e vai mostrar no banco 

    $resultado_usuario = mysqli_query($conn, $result_usuario);
 }
// Inserindo os Dados na Tabela


if(mysqli_insert_id($conn)){
    $_SESSION['msg'] ="<p style='color:blue;'>Usuário cadastrado com sucesso</p>";
    header("Location: indexpet.php");
}else{
    $_SESSION['msg'] ="<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
    header("Location: indexpet.php");  

}
?>