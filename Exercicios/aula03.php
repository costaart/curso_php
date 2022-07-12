<?php

function calcularPotencia($numero, $potencia){
    $resultado = $numero;
   for ($i = 1; $i < $potencia; $i++ ) {
    $resultado = $resultado * $numero;
    }
    return $resultado;
}

echo calcularPotencia(2,3);

