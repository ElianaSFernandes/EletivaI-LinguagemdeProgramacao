<?php

declare (strict_types=1);

$dominio = 'mysql:host=localhost; dbname=banco_reservas';//STRING DE CONEXÃO COM BANCO DE DADOS
$usuario = 'root';
$senha = '';

try {
    $pdo = new PDO($dominio, $usuario, $senha);
    
}catch (PDOException $e) {
    die ("Erro ao conectar com o banco!".$e -> getMessage());
}