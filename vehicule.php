<?php
include ('database.php');
$pdo = getPdo();
$results = $pdo->query('SELECT * FROM vehicle');
$vehicule=$results->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./src/css/style.css" rel="stylesheet">


        <title>Donkey Car</title>
    </head>
    <header>
       <?php include ('include/header.php') ?>
    </header>
    <body>

        <!--<div class="modal-container">
            <div class="overlay modal-trigger"></div>
            <div class="modal">
                <button class="close-modal modal-trigger">X</button>
                <?php /*foreach ($vehicule as $vehicules) : */?>

                    <h1><?/*= $vehicules['brandVehicle']*/?>  <?/*= $vehicules['modelsVehicle']*/?></h1>
                <?php /*endforeach */?>
            </div>
        </div>-->

        <div  class="listeCars">
            <?php foreach ($vehicule as $vehicules) : ?>
            <div class="carContainer">
                <img class="imgCars" src="<?= $vehicules['imgVehicle']?>" alt="Image du véhicule">


                <div class="carInfo">
                    <div class = "titleCarInfo">
                        <?= "<h3>Louer une "?><?=$vehicules['brandVehicle']?> <?= $vehicules['modelsVehicle']?><?= " à partir de "?><br>
                    </div>
                    <div class="price">
                        <?= "<H4>varPRIX"?>
                    </div>
                    <?= "type : "?><?=$vehicules['rangeVehicle']?> <br> <?= "Places : "?><?= $vehicules['nbseatsVehicle']?><br>
                    <?= "boite de vitesse : "?><?= $vehicules['gearboxVehicle']?><br>
                    <div  class="button">
                    <button  type="submit" name="submit"><a href="">plus de details</a></button>
                    </div>
                </div>
            </div>

            <?php endforeach ?>
        </div>

        <script src="./src/js/script.js"></script>
    </body>
</html>



