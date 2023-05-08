<?php
    session_start();
    include_once("conexao.php");

    if(isset($_SESSION['idCliente'])){
        $id_cliente = $_SESSION['idCliente'];
    }
    else{
        header('Location: ../login.php');
    }

    $nomeinp = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $array = explode(" ", $nomeinp);
    for($i=0;$i < count($array); $i++){
        $nome[$i] = ucfirst(strtolower($array[$i]));	
    }
    $nome_completo = implode(" ", $nome);

    $especie = filter_input(INPUT_POST, 'especie', FILTER_SANITIZE_STRING);
  
    $cor = filter_input(INPUT_POST,'cor', FILTER_SANITIZE_STRING);
    
    $peso = filter_input(INPUT_POST,'peso', FILTER_SANITIZE_NUMBER_FLOAT);
    
    $nascimento = filter_input(INPUT_POST, 'nascimento');
    
    date_default_timezone_set('America/Sao_Paulo');
    date_default_timezone_get();
    $myvalue = date('Y-m-d H:i:s');
    $datetime = new DateTime($myvalue);
    
    $sexo = filter_input(INPUT_POST,'sexo', FILTER_SANITIZE_STRING);

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///// validação de dados
    // checa se já está cadastrado
    $chec_cadastrado = "SELECT * FROM cadastro_pet WHERE id_cliente = '$id_cliente' AND nome_pet ='$nome_completo';";
    $checa_cadastrado = mysqli_query($conn, $chec_cadastrado);
    $cadastro_pet = mysqli_fetch_assoc($checa_cadastrado);

    // caso tudo esteja válido, cadastra
    if ($cadastro_pet['nome_pet'] == 0) {
     
        // inserção dados do pet
        $result_cadastro_pet = "INSERT INTO cadastro_pet(id_cliente, nome_pet, raca, sexo_pet, cor_pet, data_nasc_pet, peso_pet, data_cad_pet) VALUES ('$id_cliente', '$nome_completo', '$especie', '$sexo', '$cor', '$nascimento', '$peso', NOW());";
        $resultado_cadastro_pet = mysqli_query($conn, $result_cadastro_pet);

        // pega id do pet cadastrado
        $pegar_pet = mysqli_query($conn, "SELECT * FROM cadastro_pet WHERE nome_pet = '$nome_completo';");
        $pegar_id_pet = mysqli_fetch_assoc($pegar_pet);
        $idPet = $pegar_id_pet['idPet'];

        $_SESSION['msg_cad_pet'] = "<center><span style='color:blue;'>Pet cadastrado com sucesso!</span></center>";
            ///// inserção da imagem do pet
        if (isset($_FILES['foto'])) {
            // seleção do diretório
            $dir = "../images/imgPet/";
            $dirbcd = "images/imgPet/";
            // pega dados da imagem (nome, nome temporário, tipo do arquivo)
            $image = $_FILES['foto'];
            $tmp_name = $image['tmp_name'];
            $name = basename($image["name"]);
            $fileType = strtolower(pathinfo($name, PATHINFO_EXTENSION)); 
            // cria um id único pro arquivo (evita arquivos com nome repetido se substituirem) e cria o caminho onde vai armazenar o arquivo
            $name = uniqid();
            $path = $dir . $name . "." . $fileType;
            $pathbcd = $dirbcd . $name . "." . $fileType;
            // caso seja png, jpg ou jpeg, move o arquivo para a pasta images/imgCliente com o nome dele
            $allowTypes = array('jpg','png','jpeg');


            if(in_array($fileType, $allowTypes) && $image['size'] <= 2097152){

                //upload do caminho da imagem no banco upload da imagem em um diretório
                move_uploaded_file($tmp_name, $path);
                $result_imagem =  "INSERT INTO imagem_pet(id_pet, dir_img_pet, criado) VALUES ($idPet, '$pathbcd', NOW());";
                $insereImagem = mysqli_query($conn, $result_imagem);  
                // inserção de imagem por @zerobugs-tutorial em https://youtu.be/ae83c8Zpoxo (acesso em 13/04/2023)

                $_SESSION['msg_cad_pet'] = "<center><span style='color:blue;'>Pet cadastrado com sucesso!</span></center>";
            }
            else{
                if($image['size'] > 2097152){
                    $_SESSION['msg_cad_pet'] = "<center><span style='color:blue;'>Pet cadastrado. Tamanho de imagem não aceita. Máx 2MB.</span></center>";
                } 
                else {
                    $_SESSION['msg_cad_pet'] = "<center><span style='color:blue;'>Pet cadastrado. Nenhuma imagem foi salvada.</span></center>";         
                }

            }
        }
    
        header('Location: ../meus_pet.php');
    }
    else {       
        $_SESSION['msg_cad_pet'] = "<center><span style='color:red;'>Falha ao cadastrar. Pet já cadastrado.</span></center>";
        header('Location: ../cadastropet.php');
    }
?>