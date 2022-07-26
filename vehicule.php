<?php
include ('database.php');
$pdo = getPdo();
$results = $pdo->query('SELECT * FROM vehicle INNER JOIN type ON vehicle.type_idtype = type.idtype;');
$vehicules=$results->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./src/css/vehicle.css" rel="stylesheet">


        <title>Donkey Car</title>
    </head>
    <header>
       <?php include ('include/header.php') ?>
    </header>
    <body>
        <h1>PRESENTATION DES VEHICULES </h1>
        <div  class="listeCars">
                <?php foreach ($vehicules as $vehicule) : ?>
                        <div class="carContainer">
                                <h2><?=$vehicule['brandVehicle']?> <?= $vehicule['modelsVehicle']?></h2>
                                <img class="imgCars" src="<?= $vehicule['imgVehicle']?>" alt="Image du véhicule">
                        <div class="carInfo">
                                <h3><?=$vehicule['brandVehicle']?> <?= $vehicule['modelsVehicle']?></h3><br>
                                <h4> <?= $vehicule['nameType']?></h4>
                                <h4><img alt="" src="./src/css/assets/car-seat-with-seatbelt%20(1).png"> <?= $vehicule['nbseatsVehicle']?></h4>
                                <h4><img alt="" src="./src/css/assets/gearbox.png"> <?= $vehicule['gearboxVehicle']?></h4><br>
                                <H4> à partir de : <?=$vehicule['prixLocVehicle']?> €</h4><br>


                        </div>
                        </div>
            <?php endforeach ?>
        </div>
        <script src="./src/js/script.js"></script>
    </body>
</html>




