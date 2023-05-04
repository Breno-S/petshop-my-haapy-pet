<?php
function valida_rg($rg){
    global $rgvalido;
    $rgvalido = true;
    $rgseparado = str_split($rg);
    $seguraconta = 0;
    $seguratotal = 0;
    $digito = 0;


    if (sizeof($rgseparado) == 9) {
        // $rgvalido = "teste"; ok
        for ($i=0; $i < 8; $i++) { 
            if ($i < 8 && !is_numeric($rgseparado[$i])) {
                $rgvalido = false;
                break;
            }
            elseif ($i == 8 && !is_numeric($rgseparado[$i])) {
                if ($rgseparado[$i] != 'X') {
                    $rgvalido = false;
                    break;
                }
            }
            else {
                if ($i < 8) {
                    $seguraconta = $rgseparado[$i] * ($i + 2);
                    $seguratotal += $seguraconta;    
                }
            }
        }
        if ($rgvalido == true) {
            $rgvalido = false;
            $digito = 11 - ($seguratotal % 11);
            if ($digito == 10) {
                $digito = "X";
            }
            elseif ($digito == 11) {
                $digito = 0;
            }
    
            if ($digito == $rgseparado[8]) {
                $rgvalido = true;
            }
        }
    }
    else {
        $rgvalido = false;
    }
}

?>