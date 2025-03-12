<?php

$usuario = 'root'; 
$senha = 'd14n4m14';
$database = 'login';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar com o DB:" . $mysqli->error);
}   