<?php
function validacao($cpfv){
    // VALIDAÇÃO DO CPF
    $n1 = 10;
    $n2 = 11;
    $soma1 = 0;
    $soma2 = 0;
    $validacao_cpf = false;
    
    if (strlen($cpfv) == 11 && ctype_digit($cpfv)){
    
        // Primeiro digito    
        //-------------------------------------------
        for($x = 0; $x <= 8; $x++){
            $soma1 = $soma1 + ($cpfv[$x] * $n1);
            $n1--;
        }
    
        $resto1 = $soma1 % 11;
    
        if ((11 - $resto1) >= 10){
            $digito1 = 0;
        }
        else{
            $digito1 = 11 - $resto1;
        }
    
        //Digito 1 funcionando
        
        //-------------------------------------------
    
        // Segundo digito
        //-------------------------------------------   
        for($x = 0; $x <= 9; $x++){
            $soma2 = $soma2 + ($cpfv[$x] * $n2);
            $n2--;
        }
    
        $resto2 = $soma2 % 11;
    
        if ((11 - $resto2) >= 10){
            $digito2 = 0;
        }
        else{
            $digito2 = 11 - $resto2;
        }
    
        //Digito 1 funcionando
    
        //-------------------------------------------
    
        if ($cpfv !== "00000000000" && $cpfv !== "11111111111" && $cpfv !== "22222222222" && $cpfv !== "33333333333" && $cpfv !== "44444444444" && $cpfv !== "55555555555" && $cpfv !== "66666666666" && $cpfv !== "77777777777" && $cpfv !== "88888888888" && $cpfv !== "99999999999"){
            if ($digito1 == $cpfv[9] && $digito2 == $cpfv[10]){
                $validacao_cpf = true;
                
                
            }else{
                $validacao_cpf = false;
            }
        }else{
            $validacao_cpf = false;
        }
    }else{
        $validacao_cpf = false;
    
    }

    return $validacao_cpf;

}
?>
