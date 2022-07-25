<?php

include './include/header.php';
$pdo = require_once './isloggedin.php';
$pdo = getPdo();
$currentUser = isLoggedIn();

if (!$currentUser) {
    header('Location: /login.php');
}
$error = null;
$success = null;

try {
    if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['lastname'], $_POST['firstname'], $_POST['adress'], $_POST['zipcode'], $_POST['city'], $_POST['phone'])) {
        $query = $pdo->prepare('UPDATE user SET username = :username, email = :email, password = :password, lastname = :lastname, firstname = :firstname, adress = :adress, zipcode = :zipcode, city = :city, phone = :phone WHERE id = :id');
        $query->execute([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'lastname' => $_POST['lastname'],
            'firstname' => $_POST['firstname'],
            'adress' => $_POST['adress'],
            'city' => $_POST['city'],
            'zipcode' => $_POST['zipcode'],
            'phone' => $_POST['phone'],
            'id' => $_GET['id'],
        ]);
        $success = 'Modifications enregistrées!';
    }
    $query = getPdo()->prepare('SELECT * FROM user WHERE id = :id');
    $query->execute([
        'id' => $_GET['id']
    ]);
    $user = $query->fetch();
} catch (PDOException $e) {
    $error = $e->getMessage();
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

    <form action="/register.php" method="post">
        <form method="post">
            <div class="mb-3">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email">E-mail :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="lastname">Nom :</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="mb-3">
                <label for="firstname">Prénom :</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="mb-3">
                <label for="adress">Adresse :</label>
                <input type="text" class="form-control" id="adress" name="adress" required>
            </div>
            <div class="mb-3">
                <label for="zipcode">Code Postal :</label>
                <input type="text" class="form-control" id="zipcode" name="zipcode" required>
            </div>
            <div class="mb-3">
                <label for="city">Ville :</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="mb-3">
                <label for="phone">Téléphone :</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="button">
                <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </div>
        </form>

        <!-- <div class="d-flex justify-content-evenly">
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
        </div> -->
</body>

</html>