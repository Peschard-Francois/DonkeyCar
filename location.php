<?php

include './include/header.php';

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

<body>
    <div class="d-flex justify-content-center">
        <h1>Recherche d'un véhicule à louer</h1>
    </div>
    <!-- ACTION A AJOUTER -->
    <form action="" method="post">
        <div class="mb-3">
            <label for="adress">Adresse :</label>
            <input type="text" class="form-control" id="adress" name="adress" autofocus>
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
            <label for="option1">Option 1 </label>
            <input type="checkbox" id="option1" name="option1" required>
        </div>
        <div class="mb-3">
            <label for="option2">Option 2 </label>
            <input type="checkbox" id="option2" name="option2" required>
        </div>
        <div class="mb-3">
            <label for="option3">Option 3 </label>
            <input type="checkbox" id="option3" name="option3" required>
        </div>
        <div class="mb-3">
            <label for="option4">Option 4 </label>
            <input type="checkbox" id="option4" name="option4" required>
        </div>
        <div class="button">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </div>
    </form>
</body>

</html>