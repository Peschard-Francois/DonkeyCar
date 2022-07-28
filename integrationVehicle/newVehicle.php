<?php
require_once 'Database.php';
$pdo = getPdo();

try{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $brandVehicle = $_POST['brandVehicle'] ;
    $modelsVehicle = $_POST['modelsVehicle'];
    $energyVehicle = $_POST['energyVehicle'];
    $yearVehicle = $_POST['yearVehicle'];
    $nbseatsVehicle = $_POST['nbseatsVehicle'];
    $gearboxVehicle = $_POST['gearboxVehicle'];
    $imgVehicle = $_POST['imgVehicle'];
    $prixLocVehicle = $_POST['prixLocVehicle'];
    $type_idtype = $_POST['type_idtype'];

    //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("
        INSERT INTO Vehicle(brandVehicle,modelsVehicle,energyVehicle,yearVehicle,nbseatsVehicle,gearboxVehicle,imgVehicle,prixLocVehicle,type_idtype)
        VALUES (:brandVehicle, :modelsVehicle, :energyVehicle, :yearVehicle, :nbseatsVehicle, :gearboxVehicle, :imgVehicle, :prixLocVehicle, :type_idtype)
    ");
    $sth->execute(array(
        ':brandVehicle' => $brandVehicle,
        ':modelsVehicle' => $modelsVehicle,
        ':energyVehicle' => $energyVehicle,
        ':yearVehicle' => $yearVehicle,
        ':nbseatsVehicle' => $nbseatsVehicle,
        ':gearboxVehicle' => $gearboxVehicle,
        ':imgVehicle' => $imgVehicle,
        ':prixLocVehicle' => $prixLocVehicle,
        ':type_idtype' => $type_idtype));

    echo "Entrée ajoutée",'<br>', 'Merci';
}

catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}
?>
<html>
<div  class="button">
    <button  type="submit" name="submit"><a href="form_vehicle.php">retour à la liste</a></button>
</div>
</html>