<?php
function valida($cpf){
    $separado = str_split($cpf);
    $chave = 10;
    $soma = 0;
    $soma2 = 0;
    global $valido;
    $valido = false;
    
    //checa se está no padrão do cpf
    if (count(array_unique($separado)) <= 1 or count($separado) != 11) { 
        $valido = false;
    }
    //se estiver no padrão, separa cada dígito para conta
    else {
        for ($i=0; $i < 11; $i++) { 
            if ($i < 9) {
                $separado2[$i] = intval($separado[$i]) * $chave;
            }
            //os dígitos validadores são separados de outro jeito
            else {
                if ($i == 9) {
                    $digito1 = $separado[$i];
                }
                else {
                    $digito2 = $separado[$i];
                }
            }
            $chave--;
        }
        
        //soma dos dígitos para validação do primeiro dígito validador
        $soma = array_sum($separado2);
        
        
        //checa se o primeiro dígito está correto e faz a conta para validar o segundo
        if (11 - ($soma % 11) == $digito1 or $soma % 11 < 2 && $digito1 == 0) {
            $chave = 11;
            for ($i=0; $i < 10; $i++) { 
                if ($i <= 9) {
                    $separado3[$i] = intval($separado[$i]) * $chave;
                }
                else {
                    $separado3[$i] = $digito1 * $chave;
                }
                $chave--;
            }
            //valida o segundo dígito
            $soma2 = array_sum($separado3);
            
            if (11 - ($soma2 %11) == $digito2 or $soma2 % 11 < 2 && $digito2 == 0) {
                $valido = true;
            }
        }
    }
}
    
?>