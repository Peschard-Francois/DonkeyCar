<?php
$pdo = require_once './database.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = filter_input_array(INPUT_POST, [
        'username' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
    ]);
    $username = $input['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $input['email'] ?? '';

    if (!$username || !$password || !$email) {
        $error = 'ERROR';
    } else {
        $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
        $statement = $pdo->prepare('INSERT INTO user VALUES (
            DEFAULT,
            :email,
            :username,
            :password
        )');

        $statement->bindValue(':email', $email);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $hashedPassword);

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
                <input type="email" class="form-control" id="email" name="user_mail" required>
            </div>
            <div class="mb-3">
                <label for="password">Password :</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <?php if ($error) : ?>
                <h1 style="color: red;"><?= $error ?></h1>
            <?php endif; ?>
            <div class="button">
                <button type="submit" class="btn btn-primary">Créer compte</button>
            </div>
        </form>

</body>

</html>