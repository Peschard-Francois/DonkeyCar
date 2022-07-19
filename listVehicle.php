<?php
include './include/header.php';
require_once '../DonkeyCar/conDatabase.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DonkeyCar</title>

    </head>
  <body>
    <div>
        <h1>liste des vehicules</h1>
    </div>
    <div>
    <?php
    $pdo = getPdo();
    $rech = ("SELECT * FROM bd_donkeycar.vehicle ORDER BY brandVehicle ASC");
    $resultat = $pdo->prepare($rech);
    $resultat->execute();
    ?>
    </div>
 
  <div>
    <?php
    $pdo=getPdo();
    $rech = ("SELECT * FROM bd_donkeycar.vehicle");
    $resultat = $pdo->prepare($rech);
    $resultat->execute();
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC))
    {
    ?>  
          <div class="conrad">
          <div class="brandVehicle"><?php echo "<strong>Marque :</strong>", $donnees['brandVehicle']; ?></div>
          <div class="modelsVehicle"> <?php echo "<strong>model:</strong>", $donnees['modelsVehicle']; ?></div><br>
</div>
<?php
}
?>  </div>
</form>
  </body>
  </html>