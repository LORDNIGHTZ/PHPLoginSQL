<?php

$usuario = 'root'; 
$senha = 'd14n4m14';
$database = 'login';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar com o DB:" . $mysqli->error);





    
}   

//conexão com db feito pelo chatgpt
$host = "localhost";  // Servidor do banco de dados
$usuario = "root";    // Usuário do banco
$senha = "d14n4m14";          // Senha do banco
$banco = "login";  // Nome do banco

$mysqli = new mysqli($host, $usuario, $senha, $banco);

// Verifica conexão
if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}
