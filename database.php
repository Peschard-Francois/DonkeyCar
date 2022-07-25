<?php

// Retourne la connexion à la base de données

function getPdo(): PDO
{

    $pdo = new PDO('mysql:host=localhost;dbname=BD_donkeyCar;charset=utf8', 'root', '', [

        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}

function findallVehicules()
{
    $pdo = getPdo();
    $results = $pdo->query('SELECT * FROM vehicle');
    return $results->fetchAll();
}
