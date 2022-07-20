<?php
include ('../database.php');
$pdo = getPdo();
$results = $pdo->query('SELECT * FROM type');
$type=$results->fetchAll();

$id = $_POST['type'] ?? '';

$pdo = getPdo();
$results = $pdo->query("SELECT * FROM vehicle INNER JOIN type ON vehicle.type_idtype = type.idtype WHERE type_idtype = '$id' ");
$searchCar=$results->fetchAll();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/DonkeyCar/public/assets/DONcarkey.png" type="image/x-icon">
    <title>Donkey Car</title>
</head>
<header>
    <?php include ('../include/header.php') ?>
</header>
<body>

    <h1>Welcome to Donkey Car Rent Online</h1>
    <div>
        <form action="" method="POST">
            <label>vehicule</label>
            <select name="type" id="typ">
                <option value="">Please choose an option</option>
                <?php foreach ($type as $types) : ?>
                    <option value="<?= $types['idtype'] ?>"><?= $types['nameType'] ?></option>
                <?php endforeach ?>
            </select>
            <label>du</label><input id="departure" type="date">
            <label>au</label><input id="arrival" type="date">
            <button type="submit">Rechercher</button>

        </form>
    </div>


    <div  class="listeCars">
        <?php foreach ($searchCar as $searchCars) : ?>
            <div class="carContainer">
                <img class="imgCars" src="<?= $searchCars['imgVehicle']?>" alt="Image du véhicule">
                <div><?= $searchCars['brandVehicle']?>  <?= $searchCars['modelsVehicle']?></div>
            </div>
        <?php endforeach ?>
    </div>
</body>
</html>
