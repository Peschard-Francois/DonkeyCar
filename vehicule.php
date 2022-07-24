<?php
include ('database.php');
$pdo = getPdo();
$results = $pdo->query('SELECT * FROM vehicle INNER JOIN type ON vehicle.type_idtype = type.idtype;');
$vehicule=$results->fetchAll();
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
                <?php foreach ($vehicule as $vehicules) : ?>
                        <div class="carContainer">
                                <h2><?=$vehicules['brandVehicle']?> <?= $vehicules['modelsVehicle']?></h2>
                                <img class="imgCars" src="<?= $vehicules['imgVehicle']?>" alt="Image du véhicule">
                        <div class="carInfo">
                                <h3><?=$vehicules['brandVehicle']?> <?= $vehicules['modelsVehicle']?></h3><br>
                                <h4> <?= $vehicules['nameType']?></h4>
                                <h4><img alt="" src="./src/css/assets/car-seat-with-seatbelt%20(1).png"> <?= $vehicules['nbseatsVehicle']?></h4>
                                <h4><img alt="" src="./src/css/assets/gearbox.png"> <?= $vehicules['gearboxVehicle']?></h4><br>
                                <H4> à partir de : <?=$vehicules['prixLocVehicle']?> €</h4><br>
                                <a href="location.php?id=<?=$vehicules['idvehicle']?>
                                &marque=<?=$vehicules['brandVehicle']?>
                                &modele=<?= $vehicules['modelsVehicle']?>
                                &type=<?= $vehicules['nameType']?>
                                &energy=<?=$vehicules['energyVehicle']?>
                                &seats=<?= $vehicules['nbseatsVehicle']?>
                                &boiteVitesse=<?= $vehicules['gearboxVehicle']?>"<button>LOUER</button></a>

                        </div>
                        </div>
            <?php endforeach ?>
        </div>
        <script src="./src/js/script.js"></script>
    </body>
</html>




