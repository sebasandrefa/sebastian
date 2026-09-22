<?php
$nome = "";
$idade = "";
$nota1 = "";
$nota2 = "";
$nota3 = "";
$nota4 = "";
$nota5 = "";
$media = "";
$resultado = "";
$erro = "";


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["nome"])) {
    $nome = $_GET["nome"];
    $idade = $_GET["idade"];
    $nota1 = $_GET["nota1"];
    $nota2 = $_GET["nota2"];
    $nota3 = $_GET["nota3"];
    $nota4 = $_GET["nota4"];
    $nota5 = $_GET["nota5"];


    if ($nota1 < 0 || $nota1 > 10 || $nota2 < 0 || $nota2 > 10 || $nota3 < 0 || $nota3 > 10 || $nota4 < 0 || $nota4 > 10 || $nota5 < 0 || $nota5 > 10) {
        $erro = "As notas devem estar entre 0 e 10.";
    } elseif ($idade <= 0) {
        $erro = "A idade deve ser maior que zero.";
    } else {
        $media = ($nota1 * 2 + $nota2 * 3 + $nota3 + $nota4 + $nota5 * 3) / 10;

        if ($media >= 7) {
            $resultado = "APROVADO";
        } elseif ($media >= 5) {
            $resultado = "RECUPERAÇÃO";
        } else {
            $resultado = "REPROVADO";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Desafio notas</title>
</head>
<body class="pagina-notas">
    <h1>Cadastro de aluno</h1>

    <form method="GET" class="formulario-notas">
        <input type="text" name="nome" placeholder="Digite seu nome" required>
        <br><br>
        <input type="number" name="idade" placeholder="Digite sua idade" required>
        <br><br>
        <input type="number" name="nota1" placeholder="Nota 1" step="0.1" required>
        <br><br>
        <input type="number" name="nota2" placeholder="Nota 2" step="0.1" required>
        <br><br>
        <input type="number" name="nota3" placeholder="Nota 3" step="0.1" required>
        <br><br>
        <input type="number" name="nota4" placeholder="Nota 4" step="0.1" required>
        <br><br>
        <input type="number" name="nota5" placeholder="Nota 5" step="0.1" required>
        <br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php if ($erro != "") { ?>
        <p><?= $erro ?></p>
    <?php } ?>

    <?php if ($resultado != "") { ?>
        <h2>Resultado</h2>
        <p>Nome: <?= $nome ?></p>
        <p>Idade: <?= $idade ?> anos</p>
        <p>Média: <?= number_format($media, 2, ",", ".") ?></p>
        <p>Situação: <?= $resultado ?></p>
    <?php } ?>
</body>
</html>
