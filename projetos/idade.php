<?php

$nome = "";

$idade = 0;

$mostrar = "";

if ($_SERVER ["REQUEST_METHOD"] == "POST"){
    
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    
    if ($idade >=18){
        $mostrar = " De Maior";
    }
    else {
        $mostrar = "De Menor";
    }
}
?>

<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/idade.css">
    
    <title>Verificador de idade</title>
</head>
<body class="pagina-idade">
<h1>Verificador de idade</h1>

<form method="POST" class="formulario-idade">

    <input type="text" id="nome" name="nome" placeholder="Digite seu Nome" required>

    <input type="number" id="idade"  name="idade" placeholder="Digite sua idade" required>

    <input type="submit" value="Enviar">
    </form>

    <?php if ($nome != "") { ?>
    <div class="card">

        
        <h1>Mostrando Nome, Idade</h1><br>
        
    
    <?php if ($mostrar != "") { ?>
        
        <h2>O <?= htmlspecialchars($nome, ENT_QUOTES, "UTF-8") ?> é <?= $mostrar ?></h2>
        
        <?php } ?>
        
        <p>Idade: <?= (int) $idade ?> anos</p>
        <p>De acordo com a idade, eu sou <?= $mostrar ?></p><br>

    </div>
    <?php } ?>
    <p><a href="index.php">Voltar ao início</a></p>
    </body>
    </html>
