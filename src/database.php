<?php

 class Database
 {
     // Retourne la connexion à la base de données
     public static function getPdo(): PDO
     {
         return new PDO('mysql:host=localhost;dbname=BD_donkeyCar;charset=utf8', 'root', '2007Sql2022!', [
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
         ]);
     }


 }








