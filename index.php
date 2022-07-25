<?php
include('database.php');
$pdo = getPdo();
$results = $pdo->query('SELECT * FROM type');
$type=$results->fetchAll();

if($_SERVER['REQUEST_METHOD'] === 'POST') {


    $idPost = $_POST['type'] ?? '';
    $departPost = $_POST['depart'] ?? '';
    $arrivePost = $_POST['arrive'] ?? '';


    $statement =  $pdo->prepare("SELECT * FROM vehicle INNER JOIN type ON vehicle.type_idtype = type.idtype WHERE type_idtype = '$idPost' AND vehicle.idvehicle NOT IN (
    SELECT vehicle_idvehicle FROM reservation WHERE :datePost BETWEEN dateReservationDebut AND dateReservationFin AND :arrivePost BETWEEN dateReservationDebut AND reservation.dateReservationFin);");
    $statement->bindValue(':datePost', $departPost, PDO::PARAM_STR);
    $statement->bindValue(':arrivePost', $arrivePost, PDO::PARAM_STR);
    $statement->execute();
    $searchCars = $statement->fetchAll();

}






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href=DONcarkey.png" type="image/x-icon">
    <title>Donkey Car</title>
</head>
<header>
    <?php include('include/header.php') ?>
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
            <label for="departure">du</label>
            <input name="depart" id="departure" type="date">
            <label for="arrival">au</label>
            <input name="arrive" id="arrival" type="date">
            <button type="submit">Rechercher</button>

        </form>
    </div>



    <div  class="listeCars">

        <?php  if($_SERVER['REQUEST_METHOD'] === 'POST') {
             foreach ($searchCars as $searchCar) : ?>
                             <h3>Vehicule Libre</h3><?= $searchCar['idvehicle']?> <?= $searchCar['brandVehicle']?>
            <?php endforeach ?>
      <?php  } ?><?php




    </div>
</body>
</html>
