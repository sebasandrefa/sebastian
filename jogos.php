<?php
$mensagem = "";
$erro = "";
$jogos = [];

try {
    require "conexao.php";

    $pdo->exec("CREATE TABLE IF NOT EXISTS jogos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100),
        genero VARCHAR(50),
        nota INT,
        ano_lancamento INT
    )");

     $colunas = $pdo->query("SHOW COLUMNS FROM jogos")->fetchAll(PDO::FETCH_COLUMN);
    if (!in_array("ano_lancamento", $colunas, true)) {
        $pdo->exec("ALTER TABLE jogos ADD COLUMN ano_lancamento INT NULL");
    }

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

    $stmt = $pdo->query("SELECT id, nome, genero, nota, ano_lancamento FROM jogos ORDER BY id DESC");
    $jogos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $erroBanco) {
    error_log("Erro em jogos.php: " . $erroBanco->getMessage());
    $erro = "Falha no banco de dados: " . $erroBanco->getMessage();
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
<body class="pagina-jogos">
    <h1>Cadastrar jogo</h1>

    <form method="post" class="formulario-jogos">
        <label>Nome do jogo <input name="nome" maxlength="100" required></label>
        <label>Gênero <input name="genero" maxlength="50" required></label>
        <label>Nota <input type="number" name="nota" min="0" max="10" required></label>
        <label>Ano de lançamento <input type="number" name="ano_lancamento" required></label>
        <button type="submit">Cadastrar</button>
    </form>

    <?php if ($erro !== "") { ?>
        <p role="alert"><?= htmlspecialchars($erro, ENT_QUOTES, "UTF-8") ?></p>
    <?php } ?>
    <?php if ($mensagem) echo "<p>$mensagem</p>"; ?>

    <section class="lista-jogos" aria-labelledby="titulo-jogos">
        <h2 id="titulo-jogos">Jogos cadastrados</h2>
        <?php if (count($jogos) > 0) { ?>
            <div class="tabela-jogos-rolagem">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Gênero</th>
                            <th scope="col">Nota</th>
                            <th scope="col">Ano de lançamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jogos as $jogo) { ?>
                            <tr>
                                <td><?= (int) $jogo["id"] ?></td>
                                <td><?= htmlspecialchars($jogo["nome"], ENT_QUOTES, "UTF-8") ?></td>
                                <td><?= htmlspecialchars($jogo["genero"], ENT_QUOTES, "UTF-8") ?></td>
                                <td><?= htmlspecialchars((string) $jogo["nota"], ENT_QUOTES, "UTF-8") ?></td>
                                <td><?= htmlspecialchars((string) $jogo["ano_lancamento"], ENT_QUOTES, "UTF-8") ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <p>Nenhum jogo cadastrado ainda.</p>
        <?php } ?>
    </section>

    <p><a href="index.php">Voltar ao início</a></p>
</body>
</html>
