<?php
include('conexao.php');

// Iniciar a sessão logo no início do código
session_start();

if (isset($_POST['email']) && isset($_POST['senha'])) {

    // Verificar se os campos não estão vazios
    if (empty($_POST['email'])) {
        echo "Preencha seu email";
    } elseif (empty($_POST['senha'])) {
        echo "Preencha sua senha";
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Preparar a consulta SQL
        $stmt = $mysqli->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $nome, $senha_db);
            $stmt->fetch();

            // Comparar senha diretamente (caso não esteja criptografada)
            if ($senha === $senha_db) {
                $_SESSION['id'] = $id;
                $_SESSION['nome'] = $nome;

                // Redirecionar para a página do painel
                header("Location: painel.php");
                exit();
            } else {
                echo "Senha incorreta!";
            }
        } else {
            echo "Email não encontrado!";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Acesse sua conta</h1>
    <form action="" method="POST">
        <p>
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email">
        </p>
        <p>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
        </p>
        <p>
            <button type="submit">Entrar</button> 
        </p>
        <a href="cadastro.php">
            <button type="button">Cadastrar</button>
        </a>
    </form> 
</body>
</html>