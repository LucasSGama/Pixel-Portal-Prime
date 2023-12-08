<?php
// Credenciais do banco de dados
$hostname= "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "pixel-portal";

// Criar conexão
$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
// Verificar a conexão
if ($mysqli->connect_errno) {
    echo "Falha na conexão: (" . $mysqli->connect_error . ") " . $mysqli->connect_error;
}

?>