<?php

session_start();
$base = 'http://localhost/Agenda';

$db_name = 'agenda';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

try {
    $pdo = new PDO("mysql:dbname=".$db_name."; host=".$db_host, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conecxão falhou: '.$e->getMessage();
}

