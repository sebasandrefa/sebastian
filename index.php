<?php 
    require "conexao.php";
    $sql = "CREATE TABLE IF NOT EXISTS teste (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR (100) NOT NULL, 
    idade INT NOT NULL
    )";

    $pdo->exec($sql);
    ?>
    
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <title>Home</title>
</head>
<body class="pagina-inicio">
    <div class="status-inicio">
        <a>Conectado com sucesso</a>
        <a>Meu sistema está conectado!</a>
        <a>Tabela criada com sucesso</a><br>
    </div>
    <main class="inicio">
        <h1>Bem-vindo!</h1>
        <p>Escolha uma página:</p>
        <nav class="menu-inicio">
            <a href="/projetos/login-basico.php">Faça seu login aqui</a>
            <a href="/projetos/idade.php">Verificador de Idade</a>
            <a href="/projetos/notas.php">Verificador de Notas</a>
            <a href="projetos/phpnotas-GET.php">Verificador de Notas com GET</a>
            <a href="/projetos/login-jogos.php">Cadastro de Jogos</a>
        </nav>
    </main>
</body>
</html>
