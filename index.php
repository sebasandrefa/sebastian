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
    <!-- =====================
         MENU DE NAVEGAÇÃO
    ====================== -->
    <header>
        <nav class="navbar">
            <h2 class="logo">Meu Portfólio</h2>

            <ul class="menu">
                <li><a href="#inicio">Início</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#habilidades">Habilidades</a></li>
                <li><a href="#projetos">Projetos</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="inicio" class="inicio">
            
        <div class="inicio-conteudo">

            <p class="saudacao">Olá! Eu sou </p>

            <h1>Sebastián Andrade</h1>

            <h2>Desenvolvedor em formação</h2>

            <p>
                Sou desenvolvedor de sistemas com foco em criar 
                soluções práticas, eficientes e com boa experiência 
                de uso, foco em criação de sites.
            </p>
            <a href="#projetos" class="botao">
                Ver meus projetos
            </a>

        </div>
    </section>

    
    </main>
</body>
</html>
