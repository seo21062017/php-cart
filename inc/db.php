<?php

$host = 'localhost';
$db = 'cart_php';
$user = 'cart_php';
$password = 'cart_php';
$charset = 'utf8';



$dsn = "mysql:host=$host;dbname=$db;charset=$charset;";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, $user, $password, $opt);

