<?php 
//echo time(); //imprime o timestamp atual

//echo strtotime("2022-04-01"); //transforma uma data em ingles para o timestamp

//date("tabeladeformatos", "timestamp"); //formata o timestamp para o que voce precisar (tem uma tabela indicando todas possiveis consegue ver o dia da semana e usado principalmente para converter data gringa para formato br
/*Utilizações!!!!!*/

//Mostrar a data atual em timestamp
echo "<p>Data atual em timestamp: " . time() ."</p>";

//Transformar timestamp em data atual
echo "<p>Timestamp em data atual: " . date("d/m/Y", time()) ."</p>";

//Transformar data atual em timestamp
echo "<p>Data atual em timestamp: " . strtotime("2022-04-02") ."</p>";

//Somar 10 dias em uma data
$dataUm = "2021-11-20";
$novadataUm = strtotime($dataUm) + (86400*10); //86400segundos da um dia em timestamp, então é só x10!

echo "<p>Data atual após somar 10 dias: " . date("d/m/Y", $novadataUm) ."</p>";

//Subtrair 10 dias em uma data
$dataDois = "2021-11-20";
$novadataDois = strtotime($dataDois) - (86400*10); //86400segundos da um dia em timestamp, então é só x10!


echo "<p>Data atual após subtrair 10 dias: " . date("d/m/Y", $novadataDois) ."</p>";

//Convertendo o timestamp pro banco de dados
echo "<p>Convertendo o timestamp pro banco de dados: " . date("Y-m-d H:i:s", time()) ."</p>";

//Descobrir dia da semana de uma data
echo "<p>Descobrir dia da semana de uma data: " . date("D", time()) ."</p>";