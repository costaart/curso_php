<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "senhas";

$mysqli = new mysqli($host, $usuario, $senha, $bancodedados);

if ($mysqli->connect_errno) {
    echo "Conexão falhou!" . $mysqli->connect_error;
    exit();
}
