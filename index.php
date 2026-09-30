<?php 
    require "conexao.php";
    echo "<br>Meu sistema está conectado!"; 


    $sql = "CREATE TABLE IF NOT EXISTS teste (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR (100) NOT NULL, 
    idade INT NOT NULL
    )";

    $pdo->exec($sql);


    echo "<br>tabela criada com sucesso";
    ?>
    
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Home</title>
</head>
<body>
    <main class="inicio">
        <h1>Bem-vindo!</h1>
        <p>Escolha uma página:</p>
        <nav class="menu-inicio">
            <a href="idade.php">Verificador de Idade</a>
            <a href="notas.php">Verificador de Notas</a>
            <a href="notas-GET.php">Verificador de Notas com GET</a>
            <a href="jogos.php">Cadastro de Jogos</a>
            <a href="login-basico.php">Página de Login</a>
        </nav>
    </main>
</body>
</html>
