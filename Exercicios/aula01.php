<?php

// Programa para calcular IMC de uma pessoa
// IMC = peso / (altura*altura)
/*
Magreza, quando o resultado é menor que 18,5 kg/m2;
Normal, quando o resultado está entre 18,5 e 24,9 kg/m2;
Sobrepeso, quando o resultado está entre 24,9 e 30 kg/m2;
Obesidade, quando o resultado é maior que 30 kg/m2
*/


$altura = 1.70;
$peso = 40;
$imc = $peso / ($altura * $altura);

if ($imc > 30) {
   echo "Você possui um IMC de " . $imc . "e se encontra na faixa de OBESIDADE.";
} else if ($imc >= 24.9  && $imc <=30 ){
    echo "Você possui um IMC de " . $imc . "e se encontra na faixa de SOBREPESO.";
} else if ($imc >= 18.5 && $imc <=24.9){
    echo "Você possui um IMC de " . $imc . "e se encontra na faixa de NORMAL.";
} else {
    echo "Você possui um IMC de " . $imc . " e se encontra na faixa de MAGREZA.";
}

