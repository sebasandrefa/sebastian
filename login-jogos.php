<?php
session_start();

if (isset($_GET["sair"])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

if (isset($_SESSION["jogos_logado"])) {
    header("Location: jogos.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"] ?? "";
    $senha = $_POST["senha"] ?? "";

    if ($usuario === "sebas" && $senha === "1234") {
        session_regenerate_id(true);
        $_SESSION["jogos_logado"] = true;
        header("Location: jogos.php");
        exit;
    }

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Login para jogos</title>
</head>
<body class="pagina-login">
    <main class="caixa-login">
        <h1>Acessar cadastro de jogos</h1>
        <form method="post">
            <label for="usuario">Usuário</label>
            <input id="usuario" type="text" name="usuario" required>

            <label for="senha">Senha</label>
            <input id="senha" type="password" name="senha" required>

            <button type="submit">Entrar</button>
        </form>
        <p><a href="index.php">Voltar ao início</a></p>
    </main>
</body>
</html>
