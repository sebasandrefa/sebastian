<?php
require "conexao.php";

$pdo->exec("CREATE TABLE IF NOT EXISTS jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    genero VARCHAR(50),
    nota INT
)");

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $nota = (int) $_POST["nota"];

    $nome = $pdo->quote($nome);
    $genero = $pdo->quote($genero);

    $sql = "INSERT INTO jogos (nome, genero, nota)
            VALUES ($nome, $genero, $nota)";

    $pdo->exec($sql);
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
        <label for="nome">Nome do jogo</label>
        <input id="nome" type="text" name="nome" maxlength="100" required>

        <label for="genero">Gênero</label>
        <input id="genero" type="text" name="genero" maxlength="50" required>

        <label for="nota">Nota</label>
        <input id="nota" type="number" name="nota" min="0" max="10" required>

        <button type="submit">Cadastrar</button>
    </form>

    <?php if ($mensagem !== "") { ?>
        <p><?php echo htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8"); ?></p>
    <?php } ?>

    <p><a href="index.php">Voltar ao início</a></p>
</body>
</html>
