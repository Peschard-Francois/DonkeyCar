<?php

require_once './database.php';
$pdo = getPdo();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = filter_input_array(INPUT_POST, [
        'username' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
        'lastname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'firstname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'zipcode' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,

    ]);
    $username = $input['username'] ?? '';
    $email = $input['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $lastname = $input['lastname'] ?? '';
    $firstname = $input['firstname'] ?? '';
    $adress = $_POST['adress'] ?? '';
    $zipcode = $input['zipcode'] ?? '';
    $city = $_POST['city'] ?? '';
    $phone = $_POST['phone'] ?? '';






    if (!$username || !$password || !$email || !$lastname || !$firstname || !$adress || !$zipcode || !$city || !$phone) {
        $error = 'ERROR';
    } else {
        $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
        $statement = $pdo->prepare('INSERT INTO user VALUES (
            DEFAULT,
            :email,
            :username,
            :password,
            :lastname,
            :firstname,
            :adress,    
            :zipcode, 
            :city,
            :phone
        )');

        $statement->bindValue(':email', $email);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $hashedPassword);
        $statement->bindValue(':lastname', $lastname);
        $statement->bindValue(':firstname', $firstname);
        $statement->bindValue(':adress', $adress);
        $statement->bindValue(':zipcode', $zipcode);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':phone', $phone);



        $statement->execute();

        header('Location: /login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <?php
    include './include/header.php';
    ?>

    <h1>Créer un compte</h1>

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
                <label for="password">Password :</label>
                <input type="password" class="form-control" id="password" name="password" required>
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


            <?php if ($error) : ?>
                <h1 style="color: red;"><?= $error ?></h1>
            <?php endif; ?>
            <div class="button">
                <button type="submit" class="btn btn-primary">Créer compte</button>
            </div>
        </form>
 <Footer>
    <?php include './include/footer.php'; ?>
 </footer>
</body>

</html>