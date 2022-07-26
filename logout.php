<?php
session_start();
require_once 'database.php';
$pdo = getPdo();

$sessionId = $_COOKIE['session'] ?? '';
if ($sessionId) {
    $statement = $pdo->prepare('DELETE FROM session WHERE id=:id');
    $statement->bindValue(':id', $sessionId);
    $statement->execute();
    setcookie('session', '', time() - 1);
    header('Location: /login.php');
} else {
    header('Location: /Login.php');

}
// Démarrage ou restauration de la session
session_start();
// Réinitialisation du tableau de session
// On le vide intégralement
$_SESSION = array();
// Destruction de la session
session_destroy();
// Destruction du tableau de session
unset($_SESSION);
header('location: index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
<Footer>
    <?php include './include/footer.php'; ?>
 </footer>
</body>

</html>