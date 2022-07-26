<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bibliotheque</title>
</head>
<body>
<form  action="newVehicle.php" method="post">

    <div>
        <h1>nouvelle entrée Vehicule</h1>
    </div>
    <div>
        <?php
        require_once 'database.php';
        $pdo = getPdo();
        $rech = ("SELECT * FROM bd_donkeycar.type ORDER BY 'idtype' ASC");
        $resultat = $pdo->prepare($rech);
        $resultat->execute();
        ?>
    
    <fieldset>
    <legend>type de Vehicule:</legend>

    <div>
      <input type="radio" id="citadine" name="type_idtype" value="1"
             checked>
      <label for="citadine">citadine</label>
    </div>

    <div>
      <input type="radio" id="berline" name="type_idtype" value="2">
      <label for="berline">berline</label>
    </div>

    <div>
      <input type="radio" id="SUV" name="type_idtype" value="3">
      <label for="SUV">SUV</label>
    </div>

    <div>
      <input type="radio" id="cabriolet" name="type_idtype" value="4">
      <label for="cabriolet">cabriolet</label>
    </div>

    <div>
      <input type="radio" id="coupé" name="type_idtype" value="5">
      <label for="coupé">coupé</label>
    </div>

</fieldset>
  </div>
    </div>
    <br>
    <div>
        <label for="brandVehicle">Marque:</label><br>
        <input type="text"  id="brandVehicle"  name="brandVehicle">
    </div>
    <br>
    <div>
        <label for="modelsVehicle">Model :</label><br>
        <input type="text"  id="modelsVehicle"  name="modelsVehicle">
    </div>
    <br>
    <fieldset>
    <legend>type d'energie':</legend>

    <div>
      <input type="radio" id="essence" name="energyVehicle" value="essence"
             checked>
      <label for="essence">essence</label>
    </div>

    <div>
      <input type="radio" id="berline" name="energyVehicle" value="electrique">
      <label for="electrique">electrique</label>
    </div>
</fieldset>

    <br>
    <div>
        <label  for="yearVehicle">Année:</label><br>
        <input  type="Int"  id="yearVehicle"  name="yearVehicle">
    </div>
    <br>
    <div>
        <label  for="nbseatsVehicle">nombre de siege :</label><br>
        <input  type="int"  id="nbseatsVehicle"  name="nbseatsVehicle">
    </div>
    <br>
    <fieldset>
    <legend>boite de vitesse :</legend>

    <div>
      <input type="radio" id="Automatique" name="gearboxVehicle" value="Automatique"
             checked>
      <label for="Automatique">Automatique</label>
    </div>

    <div>
      <input type="radio" id="Manuelle" name="gearboxVehicle" value="Manuelle">
      <label for="Manuelle">Manuelle</label>
    </div>
</fieldset>

    <br>
    <div>
        <label  for="imgVehicle">Lien URL de l'image :</label><br>
        <input  type="text"  id="imgVehicle"  name="imgVehicle">
    </div>
    <br>
    <div>
        <label  for="prixLocVehicle">PRIX :</label><br>
        <input  type="int"  id="prixLocVehicle"  name="prixLocVehicle">
    </div>

    <br>
    <br>
    <br>
    <div  class="button">
        <button  type="submit" name="submit">Valider</button>
    </div>
</form>
</body>
</html>
