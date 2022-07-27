<?php
include './include/header.php';
$currentUser = isLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="/src/css/style.css">
</head>
<body>
    <div class="d-flex justify-content-center">
        <h1>Restons en contact</h1>
    </div>
    <form action="formresult.php" method="post">
        <div class="mb-3">
            <label for="lname">Nom :</label>
            <input type="text" class="form-control" id="lname" name="user_lname" autofocus>
        </div> <br>
        <div class="mb-3">
            <label for="name">Prénom :</label>
            <input type="text" class="form-control" id="name" name="user_name" required>
        </div> <br>
        <div class="mb-3">
            <label for="email">Votre e-mail :</label>
            <input type="email" class="form-control" id="email" name="user_mail" required>
        </div> <br>
        <div class="mb-3">
            <label for="tel">Telephone :</label>
            <input type="tel" class="form-control" id="tel" name="user_tel" required>
        </div> <br>
        <div class="mb-3">
            <label for="message">Message :</label>
            <textarea class="form-control" id="message" name="user_message" required></textarea>
        </div> <br>
        <div class="button">
            <button type="submit" class="btn btn-primary">Envoyer votre message</button>
        </div>
    </form>
</body>
</html>