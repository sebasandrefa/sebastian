<?php
$usuarioCorreto = "aluno";
$senhaCorreta = "1234";
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
    $usuario = $_REQUEST["usuario"] ?? "";
    $senha = $_REQUEST["senha"] ?? "";

    if ($usuario != "" || $senha != "") {
        if ($usuario == $usuarioCorreto && $senha == $senhaCorreta) {
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
    <title>Login</title>
    <style>
        body { font-family: Arial; background: #eee; }
        .caixa { width: 300px; margin: 80px auto; padding: 20px; background: white; }
        input, button { width: 100%; padding: 8px; margin: 5px 0; }
    </style>
</head>
<body>
    <div class="caixa">
        <h1>Login</h1>
        <form method="post">
            <label for="usuario">Usuário:</label>
            <input id="usuario" type="text" name="usuario" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>

            <button type="submit">Entrar</button>
            <button type="submit" formmethod="get">Testar com GET</button>
        </form>

        <p><?php echo $mensagem; ?></p>
    </div>
</body>
</html>
<?php
?>
