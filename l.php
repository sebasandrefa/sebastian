<?php
$usuario = "";
$senha = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Login</h1>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>

    <?php if ($usuario == "aluno" && $senha == "123") { ?>
        <a href="idade.php">Idade</a>
        <a href="notas.php">Notas</a>
        <a href="notas-desafio.php">Desafio notas</a>
    <?php } ?>

</body>
</html>
