<?php
session_start();
include './include/header.php';
$pdo = require_once './database.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_EMAIL,
    ]);
    $password = $_POST['password'] ?? '';
    $email = $input['email'] ?? '';
    $_SESSION['login'] = trim($_POST['email']);
    if (!$password || !$email) {
        $error = 'ERROR';
    } else {
        $statementUser = getPdo()->prepare('SELECT * FROM user WHERE email=:email');
        $statementUser->bindValue(':email', $email);
        $statementUser->execute();
        $user = $statementUser->fetch();
        if (password_verify($password, $user['password'])) {
            $sessionId = bin2hex(random_bytes(32));
            $statementSession = getPdo()->prepare('INSERT INTO session VALUES (:sessionid, :userid )');
            $statementSession->bindValue(':userid', $user['id']);
            $statementSession->bindValue(':sessionid', $sessionId);
            $statementSession->execute();
            $signature = hash_hmac('sha256', $sessionId, 'We Love Donkeys !');
            setcookie('session', $sessionId, time() + 60 * 60 * 24 * 7, '', '', false, true);
            setcookie('signature', $signature, time() + 60 * 60 * 24 * 7, '', '', false, true);
            header('Location: /useraccount.php');
        } else {
            $error = "MAUVAIS PASSWORD !";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <h1>Connexion</h1>
    <form method="post">
        <div class="mb-3">
            <label for="email">E-mail :</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password">Password :</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <?php if ($error) : ?>
            <h1 style="color: red;"><?= $error ?></h1>
        <?php endif; ?>
        <div class="button">
            <button type="submit" class="btn btn-primary">Connexion</button>
        </div>
    </form>
</body>
</html>