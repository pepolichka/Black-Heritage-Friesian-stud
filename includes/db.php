<?php

$host = 'sql208.infinityfree.com';
$dbname = 'if0_41851175_blackheritage';
$user = 'if0_41851175';
$password = 'не скажу';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
        ]
    );
} catch (PDOException $exception) {
    $pdo = null;
}