<body class="body-vehicle">
    <h1>PRESENTATION DES VEHICULES </h1>
    <div  class="listeCars">
        <?php foreach ($vehicules as $vehicule) : ?>
            <div class="carContainer">
                <h2><?=$vehicule['brandVehicle']?> <?= $vehicule['modelsVehicle']?></h2>
                <img class="imgCars-vehicule" src="<?= $vehicule['imgVehicle']?>" alt="Image du véhicule">
                <div class="carInfo">
                    <h3><?=$vehicule['brandVehicle']?> <?= $vehicule['modelsVehicle']?></h3><br>
                    <h4> <?= $vehicule['nameType']?></h4>
                    <h4><img alt="" src="./src/css/assets/car-seat-with-seatbelt%20(1).png">  <?= $vehicule['nbseatsVehicle']?></h4>
                    <h4><img alt="" src="./src/css/assets/gearbox.png"> <?= $vehicule['gearboxVehicle']?></h4><br>
                    <H4> à partir de : <?=$vehicule['prixLocVehicle']?> € / Jour</h4><br>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<script src="./src/js/script.js"></script>
</body>
