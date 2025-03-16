<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha

    // Verifica se o e-mail já está cadastrado
    $stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo "E-mail já cadastrado! Tente outro.";
    } else {
        $stmt = $mysqli->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $senha);
        
        if ($stmt->execute()) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $mysqli->error;
        }
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastre-se</h1>
    <form action="" method="POST">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </p>
        <p>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>
        </p>
        <p>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
        </p>
        <p>
            <button type="submit">Cadastrar</button>
        </p>
    </form>
</body>
</html>
