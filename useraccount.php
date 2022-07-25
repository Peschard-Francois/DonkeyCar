<?php

include './include/header.php';
$pdo = require_once './isloggedin.php';

$currentUser = isLoggedIn();

if (!$currentUser) {
    header('Location: /login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <h1>Menu Profil</h1>

    <h2>Bonjour <?= $currentUser['username'] ?></h2>
    <div class="d-flex justify-content-evenly">
        <button type="button" class="btn btn-primary btn-lg">Commandes en cours</button>
        <button type="button" class="btn btn-secondary btn-lg">Commandes précédentes</button>
    </div>
    <div class="row d-flex justify-content-evenly">
        <div class="card col-sm-6" style="width: 18rem;">
            <img src="/donkeycar.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Location 1</h5>
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam vel id mollitia a ut saepe amet explicabo totam? Quisquam eligendi nulla quis amet explicabo? Quo accusamus eveniet corrupti excepturi iste!</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Option 1</li>
                <li class="list-group-item">Option 2</li>
                <li class="list-group-item">Option 3</li>
                <li class="list-group-item">Option 4</li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Détails</a>
                <a href="#" class="card-link">Réclammation</a>
            </div>
        </div>
        <div class="card col-sm-6" style="width: 18rem;">
            <img src="/donkeycar.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Location 2</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus ipsa assumenda placeat laborum similique eius, id, ullam qui modi incidunt dolor repellendus facere culpa voluptates amet. Nulla ab placeat possimus?</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Option 1</li>
                <li class="list-group-item">Option 2</li>
                <li class="list-group-item">Option 3</li>
                <li class="list-group-item">Option 4</li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Détails</a>
                <a href="#" class="card-link">Réclammation</a>
            </div>
        </div>
</body>

</html>