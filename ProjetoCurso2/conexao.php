<?php

$host = "localhost";
$banco = "carros";
$user = "root";
$senha = "";

$mysqli = new mysqli($host, $user, $senha, $banco);
if ($mysqli->connect_errno){
    die("Falha no banco de dados!");
}