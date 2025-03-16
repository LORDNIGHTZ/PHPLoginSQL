<?php 
include('protect.php'); 

// Inicia a sessão antes de qualquer saída HTML
if (!isset($_SESSION)) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <h1>Bem-vindo ao painel, <?php echo isset($_SESSION['nome']) ? htmlspecialchars($_SESSION['nome']) : "nome"; ?>!</h1>
    <a href="logout.php">Sair</a>
</body>
</html>