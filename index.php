<?php
include('database.php');
$pdo = getPdo();
$results = $pdo->query('SELECT * FROM type');
$type=$results->fetchAll();

$idPost = $_POST['type'] ?? '';
$departPost = $_POST['depart'] ?? '';
$arrivePost = $_POST['arrive'] ?? '';

$pdo = getPdo();
$results = $pdo->query("SELECT * FROM vehicle INNER JOIN type ON vehicle.type_idtype = type.idtype WHERE type_idtype = '$idPost' ");
$searchCar=$results->fetchAll();



$pdo = getPdo();
$results = $pdo->query("SELECT dateReservationDebut,vehicle_idvehicle,dateReservationFin FROM bd_donkeycar.reservation;");
$dateReservation = $results->fetchAll();


$singleArray = [];
foreach ($dateReservation as $childArray)
{
    foreach ($childArray as $value)
    {
        $singleArray[] = $value;
    }
}
/*var_dump($singleArray);

*/?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/css/style.css">
    <link rel="icon" href=DONcarkey.png" type="image/x-icon">
    <title>Donkey Car</title>
</head>
<header>
    <?php include('include/header.php') ?>
</header>
<body>

<h1><span>Donkey</span><span>Car</span></h1>
    <h4><span>roulez </span><span>comme </span><span>vous </span><span>êtes</span></h4>
    <div class= "researchZone">
        <form action="" method="POST">
            <select name="type" id="typ">
                <option value="">Veuillez choisir un type de vehicule</option>  
                <?php foreach ($type as $types) : ?>
                    <option value="<?= $types['idtype'] ?>"><?= $types['nameType'] ?></option>
                <?php endforeach ?>
            </select>
            <input name="depart" id="departure" type="date" placeholder="du">
            <input name="arrive" id="arrival" type="date">
            <button type="submit">Rechercher</button>

        </form>
    </div>



    <div  class="listeCars">
        <?php foreach ($searchCar as $searchCars) : ?>
            <div class="carContainer">
                <img class="imgCars" src="<?= $searchCars['imgVehicle']?>" alt="Image du véhicule">
                <div class="carInfo"><?= $searchCars['brandVehicle']?>  <?= $searchCars['modelsVehicle']?></div>
            </div>
        <?php endforeach ?>
    </div>

</body>
</html>
