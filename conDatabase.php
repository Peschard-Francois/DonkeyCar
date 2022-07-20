<?php
function getPdo():PDO {
    $pdo = new PDO('mysql:host=localhost;dbname=bd_donkeycar;charset=utf8', 'root', 'Bouyah1a93290', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}