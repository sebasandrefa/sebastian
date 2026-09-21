<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do aluno</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Cadastro do aluno</h1>

    <form method="POST">
        <input type="text" name="nome" placeholder="Digite seu nome" required>
        <input type="number" name="idade" placeholder="Digite sua idade" required>
        <button type="submit">Entrar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];

        echo "<h2>Olá, $nome!</h2>";
        echo "<p>Idade: $idade anos</p>";
    }
    ?>

</body>
</html>
