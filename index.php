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

       <!-- --><?php /*var_dump($singleArray[0]);

        */?>
            <?php foreach ($searchCar as $searchCars) : ?>
                     <?php foreach ($dateReservation as $dateReservations) : ?>
                            <?php if ($departPost < $dateReservations['dateReservationDebut']  AND $departPost > $dateReservations['dateReservationFin'] AND $dateReservations['vehicle_idvehicle'] === $searchCars['idvehicle'] ) :?>
                             <h3>Vehicule Libre</h3><?= $searchCars['idvehicle']?> <?= $searchCars['brandVehicle']?>


                    <?php endif ?>
                <?php endforeach ?>
            <?php endforeach ?>




    <?= $arrivePost?>
    </div>
</body>
</html>
