
<?php



$idvehicleGet = $_GET['id'] ?? '';
$marqueGet = $_GET['marque'] ?? '';
$modeleGet = $_GET['modele'] ?? '';
$typeGet = $_GET['type'] ?? '';
$energyGet = $_GET['energy'] ?? '';
$seatsGet = $_GET['seats'] ?? '';
$boiteVitesseGet = $_GET['boiteVitesse'] ?? '';








?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <label for="date1">Du :</label>
            <input type="date" class="form-control" id="date1" name="date1" required>
        </div> <br>
        <div class="mb-3">
            <label for="date2">Au :</label>
            <input type="date" class="form-control" id="date2" name="date2" required>
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