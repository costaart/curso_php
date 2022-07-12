<?php
/*
- Sempre quando for estabelecer uma conexão entre banco de dados e o php, é preciso criar essas 4 variáveis: HOST, USER, SENHA E BANCO DE DADOS
- Após a criação dessas quatro variáveis, instancia um objeto MYSQLI, passando como parâmetro na ordem HOST, USER, SENHA E BANCO.
- É então, criado um IF para verificar se possui algum erro, caso tenha ACABA A EXECUÇÃO DO CÓDIGO.
*/

$host = "localhost";
$user = "root";
$senha = "";
$banco = "crud_clientes";

$mysqli = new mysqli($host, $user, $senha, $banco);
if($mysqli-> connect_errno) {
    die("Falha na conexão com o Banco de Dados!");
}

function formatarData($data){
   return implode('/', array_reverse(explode('-', $data)));
}

function formatarTelefone($telefone){
    $ddd =  substr($telefone, 0, 2); //Começa no indice 0 e vai ate o indice 2
    $parte1 = substr($telefone, 2, 5); // começa no 2 e tem tamamho 5
    $parte2 = substr($telefone, 7);
    return "($ddd) $parte1-$parte2";
}