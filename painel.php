<?php 

include('protect.php');

if(!isset($_SESSION)) {
    session_start();
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    Bem vindo ao painel, <?php echo !empty($_SESSION['nome']) ? $_SESSION['nome'] : "nome";['']; ?>
</body>
</html>