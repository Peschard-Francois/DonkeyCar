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
$userProfile = $currentUser['username'];

$query = $pdo->query("SELECT * FROM user WHERE username = '$userProfile'");
$username = $query->fetchAll();




try {
    if (isset($_POST['username'], $_POST['email'], $_POST['lastname'], $_POST['firstname'], $_POST['adress'], $_POST['zipcode'], $_POST['city'], $_POST['phone'])) {
        $query = $pdo->prepare("UPDATE user SET username = :username, email = :email, lastname = :lastname, firstname = :firstname, adress = :adress, zipcode = :zipcode, city = :city, phone = :phone WHERE id = :id");


        $query->bindValue(':username', $_POST['username']);
        $query->bindValue(':email', $_POST['email']);
        $query->bindValue(':lastname', $_POST['lastname']);
        $query->bindValue(':firstname', $_POST['firstname']);
        $query->bindValue(':adress', $_POST['adress']);
        $query->bindValue(':city', $_POST['city']);
        $query->bindValue(':zipcode', $_POST['zipcode']);
        $query->bindValue(':phone', $_POST['phone']);
        $query->bindValue(':id', $_POST['id']);


        $query->execute();

        $success = 'Modifications enregistrées!';
        header('Location: useraccount.php');
    }
    $query = getPdo()->prepare('SELECT * FROM user WHERE id = :id');
    $query->execute([
        'id' => $currentUser['id']
    ]);
    $user = $query->fetch();
} catch (PDOException $e) {
    $error = $e->getMessage();
}


$query = $pdo->prepare("SELECT * FROM vehicle INNER JOIN reservation ON vehicle.idvehicle = reservation.vehicle_idvehicle INNER JOIN user ON user.id = reservation.user_id WHERE user.username = '$userProfile';");
$query->execute();
$reservationalls = $query->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte Utilisateur</title>
    <link rel="stylesheet" href="/src/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <h1>Menu Profil</h1>

    <h2>Bonjour <?= $currentUser['username'] ?></h2>

    <form method="post">
        <div class="col-md-2">
            <label for="id">id d'utilisateur :</label>
            <input type="text" value="<?= $username[0]['id'] ?>" class="form-control" id="id" name="id" required>
        </div>
        <div class="row">
            <div class="col-md">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" value="<?= $username[0]['username'] ?>" class="form-control" id="username" name="username" required>
            </div>

            <div class="col-md">
                <label for="email">E-mail :</label>
                <input type="email" value="<?= $username[0]['email'] ?>" class="form-control" id="email" name="email" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <label for="lastname">Nom :</label>
                <input type="text" value="<?= $username[0]['lastname'] ?>" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="col-md">
                <label for="firstname">Prénom :</label>
                <input type="text" value="<?= $username[0]['firstname'] ?>" class="form-control" id="firstname" name="firstname" required>
            </div>
        </div>
        <div class="form-group">
            <label for="adress">Adresse :</label>
            <input type="text" value="<?= $username[0]['adress'] ?>" class="form-control" id="adress" name="adress" required>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="zipcode">Code Postal :</label>
                <input type="text" value="<?= $username[0]['zipcode'] ?>" class="form-control" id="zipcode" name="zipcode" required>
            </div>
            <div class="col-md-3">
                <label for="city">Ville :</label>
                <input type="text" value="<?= $username[0]['city'] ?>" class="form-control" id="city" name="city" required>
            </div>
        </div>
        <div class="col-md-2">
            <label for="phone">Téléphone :</label>
            <input type="text" value="<?= $username[0]['phone'] ?>" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="button">
            <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </div>
    </form>




    <div>

        <?php foreach ($reservationalls as $reservationall) : ?>
            <h2><?= $reservationall['brandVehicle'] ?> <?= $reservationall['modelsVehicle'] ?></h2>
            <img class="imgCars" src="<?= $reservationall['imgVehicle'] ?>" alt="Image du véhicule">
            <h3><?= $reservationall['dateReservationDebut'] ?> <?= $reservationall['dateReservationFin'] ?></h3>


        <?php endforeach ?>
    </div>

</body>

</html>