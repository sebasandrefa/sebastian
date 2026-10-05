<?php
$usuarioCorreto = "sebas";
$senhaCorreta = "1234";
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" || $_SERVER["REQUEST_METHOD"] === "GET") {
    $dados = $_SERVER["REQUEST_METHOD"] === "POST" ? $_POST : $_GET;
    $usuario = $dados["usuario"] ?? "";
    $senha = $dados["senha"] ?? "";

    if ($usuario !== "" || $senha !== "") {
        if ($usuario === $usuarioCorreto && $senha === $senhaCorreta) {
            $mensagem = "Login realizado com sucesso";
        } else {
            $mensagem = "Usuário ou senha incorretos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <title>Login</title>
</head>
<body class="pagina-login">
    <div class="caixa-login">
        <h1>Login</h1>
        <form method="post">
            <label for="usuario">Usuário:</label>
            <input id="usuario" type="text" name="usuario" required>

            <label for="senha">Senha:</label>
            <input id="senha" type="password" name="senha" required>

            <button type="submit">Entrar</button>
            <button type="submit" formmethod="get">Testar com GET</button>
        </form>

        <p><?php echo htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8"); ?></p>
    </div>
</body>
</html>
<?php

?>
