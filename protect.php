<?php


if(!isset($_SESSION)) {
    session_start();
    
} // depurar var_dump($_SESSION);


if(!isset($_SESSION['id'])) {
    die("Voce nao esta logado. <p><a href=\"index.php\">Entrar</a></p>");
    
}


if(!isset($_SESSION['nome'])) {
    
}
?>