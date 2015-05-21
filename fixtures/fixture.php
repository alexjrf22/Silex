<?php

require_once "../vendor/autoload.php";
use Alex\Sistema\DB\DB;

$db = new DB("mysql:host=127.0.0.1;charset=utf8", "Silex", "root", "root");
$pdo = $db->getConnection();

$query1 = "DROP DATABASE IF EXISTS Silex";
$drop = $pdo->prepare($query1);
$drop->execute();

echo "Database Excluido -- OK \n";

$query2 = "CREATE DATABASE IF NOT EXISTS Silex";
$createDB = $pdo->prepare($query2);

$createDB->execute();

echo "Novo Database Criado -- OK \n";

$query3 = "USE Silex";
$use = $pdo->prepare($query3);
$use->execute();

$table = $pdo->prepare(
    "CREATE TABLE IF NOT EXISTS `produtos` (
    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(255) NOT NULL,
    `descricao` VARCHAR(255) NOT NULL,
    `valor` TEXT NOT NULL);"
);

$table->execute();

echo "Tabela Criada -- OK \n";
