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
    <link rel="stylesheet" href="/src/css/index.css">
    <link rel="icon" href="/src/css/assets/donkeycar.png" type="image/x-icon">
    <title>Donkey Car</title>
</head>
<header>
    <?php include('include/header.php') ?>
</header>

<body>
    <section class="showcase">
        <video src="src/css/assets/Sunrise.mp4" muted loop autoplay></video>
        <div class="overlay">
            <h1><span>Donkey</span><span>Car</span></h1>
            <h4 class="slogan">Roulez comme vous êtes</h4>
            <div class="researchZone">

                <div>

                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-5">
                                <select class="form-control" name="type" id="typ">
                                    <option value="">Selectionnez un type de vehicule</option>
                                    <?php foreach ($type as $types) : ?>
                                        <option value="<?= $types['idtype'] ?>"><?= $types['nameType'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col">
                                <input class="form-control" name="depart" id="departure" type="date" placeholder="du">
                            </div>
                            <div class="col">
                                <input class="form-control" name="arrive" id="arrival" type="date">
                            </div>
                            <div class="col">
                                <button class="btn btn-primary" type="submit">Rechercher</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="listeCars">
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        foreach ($searchCars as $searchCar) : ?>
                            <div class="carInfo">
                                <h3 class="titleCarInfo">Vehicule Libre</h3>
                                <?= $searchCar['brandVehicle'] ?> <?= $searchCar['modelsVehicle'] ?>
                            </div>
                            <img class="imgCars" src="<?= $searchCar['imgVehicle'] ?>" alt=" image voiture"><br>
                        <?php endforeach ?>
                    <?php  } ?>
                </div>
            </div>

 <Footer>
    
 </footer>

</body>

</html>