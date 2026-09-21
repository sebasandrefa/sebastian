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
    <link rel="stylesheet" href="index.css">
    <a href="arquivo.php">Atividade x</a>
    <title>bla bla sla</title>
</head>
<body>


<form method="POST">

    <input type="text" id="nome" name="nome" placeholder="Digite seu Nome">

    <input type="number" id="idade"  name="idade" placeholder="Digite sua idade">

    <input type="submit" value="Enviar">
    </form>

    <div class="card">

        
        <h1>Mostrando Nome, Idade e resultado</h1>
        
    
    <?php if ($mostrar != "") { ?>
        
        <h2>
            o <?= $nome ?> é <?= $mostrar ?> .
        </h2>
        
        <?php } ?>
        
        <h1>O meu nome é <?=  $nome?> </h1>
        <h2>Minha idade é <?=  $idade?> </h2>
        <p>De acordo com a idade, eu sou <?= $mostrar ?></p>

    </div>
        
    </body>
    </html>