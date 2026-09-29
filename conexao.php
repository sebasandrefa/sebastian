<?php


$host = "localhost";
$banco = "sebas315";
$usuario = "sebas315";
$senha = "315!@#";

try{

    $pdo = new PDO ("mysql:host=$host;dbname=$banco; chartset=utf8mb4", $usuario, $senha);

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    echo "conectado com sucesso";

} catch (PDOException $erro) {
    echo "Erro ao conectar:".$erro->getMessage();
}