<?php
session_start();

$erro = "";

if (isset($_GET["sair"])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    // Login de exemplo: usuário aluno e senha 123
    if ($usuario == "aluno" && $senha == "123") {
        $_SESSION["logado"] = true;
    } else {
        $erro = "Usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <main class="caixa">
        <?php if (!isset($_SESSION["logado"])) { ?>
            <h1>Login</h1>
            <p>Acesse os exercícios</p>

            <form method="POST">
                <input type="text" name="usuario" placeholder="Usuário" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit">Entrar</button>
            </form>

            <?php if ($erro != "") { ?>
                <p class="erro"><?= $erro ?></p>
            <?php } ?>

            <small>Usuário: aluno | Senha: 123</small>
        <?php } else { ?>
            <h1>Olá!</h1>
            <p>Escolha um exercício:</p>
            <a href="idade.php">Verificador de idade</a>
            <a href="notas.php">Verificador de notas</a>
            <a class="sair" href="index.php?sair=1">Sair</a>
        <?php } ?>
    </main>
</body>
</html>
