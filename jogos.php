<?php
require "conexao.php";

$pdo->exec("CREATE TABLE IF NOT EXISTS jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    genero VARCHAR(50),
    nota INT,
    ano_lancamento INT
)");

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "INSERT INTO jogos (nome, genero, nota, ano_lancamento)
            VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST["nome"],
        $_POST["genero"],
        $_POST["nota"],
        $_POST["ano_lancamento"]
    ]);
    $mensagem = "Jogo cadastrado com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Cadastro de Jogos</title>
</head>
<body class="pagina-notas">
    <h1>Cadastrar jogo</h1>

    <form method="post" class="formulario-notas">
        <label>Nome do jogo <input name="nome" maxlength="100" required></label>
        <label>Gênero <input name="genero" maxlength="50" required></label>
        <label>Nota <input type="number" name="nota" min="0" max="10" required></label>
        <label>Ano de lançamento <input type="number" name="ano_lancamento" required></label>
        <button type="submit">Cadastrar</button>
    </form>

    <?php if ($mensagem) echo "<p>$mensagem</p>"; ?>
    <p><a href="index.php">Voltar ao início</a></p>
</body>
</html>
