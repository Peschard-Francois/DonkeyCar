
<?php

include('database.php');
require_once 'isloggedin.php';


$currentUser = isLoggedIn();
$iduser = $currentUser['id'];

$pdo = getPdo();


$idvehicleGet = $_GET['id'] ?? '';
$marqueGet = $_GET['marque'] ?? '';
$modeleGet = $_GET['modele'] ?? '';
$typeGet = $_GET['type'] ?? '';
$energyGet = $_GET['energy'] ?? '';
$seatsGet = $_GET['seats'] ?? '';
$boiteVitesseGet = $_GET['boiteVitesse'] ?? '';
$datedepartGet = trim($_GET['datedepart'] ?? '');
$datefinGet = $_GET['datefin'] ?? '';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idvehiculePost = $_POST['idvehicule'] ?? '';
    $date1Post = $_POST['date1'] ?? '';
    $date2Post = $_POST['date2'] ?? '';
    $option1Post = $_POST['option1'] ?? '';
    $option2Post = $_POST['option2'] ?? '';
    $option3Post = $_POST['option3'] ?? '';
    $option4Post = $_POST['option4'] ?? '';


/*    var_dump($idvehiculePost);
    var_dump($iduser);
die();*/



    $statement =  $pdo->prepare("INSERT INTO `reservation` (dateReservationDebut,dateReservationFin,insuranceReservation,adddriverReservation,babyseatReservation,gpsReservation,vehicle_idvehicle,user_id)
VALUES(:date1Post,:date2Post,:option1Post,:option2Post,:option3Post,:option4Post,'$idvehiculePost','$iduser');");
    $statement->bindValue(':date1Post', $date1Post, PDO::PARAM_STR);
    $statement->bindValue(':date2Post', $date2Post, PDO::PARAM_STR);
    $statement->bindValue(':option1Post', $option1Post, PDO::PARAM_STR);
    $statement->bindValue(':option2Post', $option2Post, PDO::PARAM_STR);
    $statement->bindValue(':option3Post', $option3Post, PDO::PARAM_STR);
    $statement->bindValue(':option4Post', $option4Post, PDO::PARAM_STR);

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
    <link rel="stylesheet" href="/src/css/location.css">
    <title>Location de véhicule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<header>
    <?php include './include/header.php'; ?>
</header>

<body>
    <div class="d-flex justify-content-center">
        <h1>Louer un véhicule</h1>
    </div>
    <!-- ACTION A AJOUTER -->
    <form action="" method="post">
        <div class="mb-3">

            <input type="number" value="<?= $idvehicleGet?>" class="form-control" id="idvehicule" name="idvehicule" hidden>
        </div> <br>
        <div class="mb-3">
            <label for="brand">Marque :</label>
            <input type="text" value="<?= $marqueGet?>" class="form-control" id="brand" name="brand" required disabled="disabled">
        </div> <br>
        <div class="mb-3">
            <label for="model">Modèle :</label>
            <input type="text" value="<?= $modeleGet?>" class="form-control" id="model" name="model" required disabled="disabled">
        </div> <br>
        <div class="mb-3">
            <label for="range">Type :</label>
            <input type="text" value="<?= $typeGet?>" class="form-control" id="range" name="range" required disabled="disabled">
        </div> <br>
        <div class="mb-3">
            <label for="energy">Energie :</label>
            <input type="text" value="<?= $energyGet?>" class="form-control" id="energy" name="energy" required disabled="disabled">
        </div> <br>
        <div class="mb-3">
            <label for="seats">Places :</label>
            <input type="text" value="<?= $seatsGet?>" class="form-control" id="seats" name="seats" required disabled="disabled">
        </div> <br>
        <div class="mb-3">
            <label for="gearbox">Boite de vitesse :</label>
            <input type="text" value="<?= $boiteVitesseGet?>" class="form-control" id="gearbox" name="gearbox" required disabled="disabled">
        </div> <br>

        <div class="mb-3">
            <label for="date1">Au :</label>
            <input type="date" value="<?=$datedepartGet?>" class="form-control" id="date1" name="date1" required>
        </div>
        <div class="mb-3">
            <label for="date2">Au :</label>
            <input type="date" value="<?=$datefinGet?>" class="form-control" id="date2" name="date2" required>
        </div>
        <div class="mb-3">
            <label for="option1">Assurance </label>
            <input type="checkbox" id="option1" name="option1">
        </div>
        <div class="mb-3">
            <label for="option2">Conducteur supplémentaire </label>
            <input type="checkbox" id="option2" name="option2">
        </div>
        <div class="mb-3">
            <label for="option3">Siège bébé </label>
            <input type="checkbox" id="option3" name="option3">
        </div>
        <div class="mb-3">
            <label for="option4">GPS </label>
            <input type="checkbox" id="option4" name="option4">
        </div>
        <div class="button">
            <button type="submit" class="btn btn-primary">Louer</button>
        </div>
    </form>
</body>

</html>