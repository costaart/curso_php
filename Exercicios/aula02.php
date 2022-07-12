<?php
/*
Exercício:
Com base no seguinte array composto pelas notas de uma classe de 30 alunos:
$notas_dos_alunos = ['7.4', '1.7', '8.5', '3.5', '4.4', '8.7', '6.4', '8.4', '1.2', '4.3', '9.8', '0.5', '8.2',
'4.7', '1.1', '3.3', '3.4', '4.8', '8.7', '5.4', '2.2', '3.7', '5.9', '7.4', '4.8', '4.7', '1.5', '8.4', '2.1', '2.7'];
Crie um loop e verifique pra cada item do array se a nota é >= 6 ou não.
Se for >= 6, mostre:
"Aprovado <BR>"
Se for < 6, mostre:
"Reprovado <br>"
No final do loop, mostre também quantos alunos foram reprovados e quantos alunos foram
reprovados.
*/

$notas_dos_alunos = ['7.4', '1.7', '8.5', '3.5', '4.4', '8.7', '6.4', '8.4', '1.2', '4.3', '9.8', '0.5', '8.2',
'4.7', '1.1', '3.3', '3.4', '4.8', '8.7', '5.4', '2.2', '3.7', '5.9', '7.4', '4.8', '4.7', '1.5', '8.4', '2.1', '2.7'];

$aprovados = 0;
$reprovados = 0;

foreach ($notas_dos_alunos as $nota){
    if ($nota >= 6) {
        echo "Aprovado!<br>";
        $aprovados++;
    } else if ($nota < 6) {
        echo "Reprovado!<br>";
        $reprovados++;
    }
}

echo $aprovados . " alunos foram aprovados e " . $reprovados . " foram reprovados.";