<?php
include('conexao.php');

if(isset($_POST['email']) || isset ($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu email";
    } else if (strlen($_POST['email']) == 0) {
        echo "Preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        
        $sql_code = "SELECT * FROM usuaríos WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do COD SQL:" . $mysqli->error);
        
        $quantidade = $sql_query->num_rows;

        //echo 
        "quantidade: <br>" . $quantidade;

        if ($quantidade == 1 ) {

            $usuario = $sql_query->fetch_assoc();
            if(!isset($_SESSION)) { // Faltou arrumar aqui
                session_start();
            }

            $_SESSION['id'] = $usuario['id']; // FALTOU arrumar aqui
            $_SESSION['nome'] = $usuario['nome']; // FALTOU arrumar aqui

            header("Location: painel.php");

        } else { 
            echo "Email ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Acesse sua conta</hl>
    <form action= "" method="POST">
        <p>
        <lable>E-mail</label>
        <Input type="text" name="email">
</p>
<p>
        <lable>Senha</label>
        <Input type="password" name="senha">
</p>
<p>
    <button type="submit">Entrar</button> 

    <a href="cadastro.php">
    <button type="button">Cadastrar</button>
</a>
    </form> 
</body>
</html>