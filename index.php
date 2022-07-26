<?php

include('database.php');
require_once 'isloggedin.php';


$currentUser = isLoggedIn();

$pdo = getPdo();
$results = $pdo->query('SELECT * FROM type');
$type = $results->fetchAll();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    <div class="researchZone">

        <div>

            <form action="" method="POST">
                <select name="type" id="typ">
                    <option value="">Veuillez choisir un type de vehicule</option>
                    <?php foreach ($type as $types) : ?>
                        <option value="<?= $types['idtype'] ?>"><?= $types['nameType'] ?></option>

                    <?php endforeach ?>
                </select>
                <input name="depart" id="departure" type="date"  min="2022-07-25" placeholder="du">
                <input name="arrive" id="arrival" type="date" min="2022-07-25" >
                <button type="submit">Rechercher</button>
            </form>
        </div>
        <div class="listeCars">


            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                foreach ($searchCars as $searchCar) : ?>
                    <h3>Vehicule Libre</h3><?= $searchCar['idvehicle'] ?> <?= $searchCar['brandVehicle'] ?>
                    <a href="location.php?id=<?=$searchCar['idvehicle']?>&marque=<?=$searchCar['brandVehicle']?>&modele=<?= $searchCar['modelsVehicle']?>&type=<?= $searchCar['nameType']?>&energy=<?=$searchCar['energyVehicle']?>&seats=<?= $searchCar['nbseatsVehicle']?>&boiteVitesse=<?= $searchCar['gearboxVehicle']?>&datedepart=<?=$departPost?>&datefin=<?=$arrivePost?>"<button>LOUER</button></a>
                <?php endforeach ?>
          <?php  }?>
        </div>
</body>

</html>