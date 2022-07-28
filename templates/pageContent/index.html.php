<section class="showcase">
    <video src="src/css/assets/Sunrise.mp4" muted loop autoplay></video>
    <div class="overlay">
        <h1><span>Donkey</span><span>Car</span></h1>
        <h4 class="slogan">Roulez comme vous êtes</h4>
        <div class="researchZone">
            <div>
                <form action="index.php?controller=vehicle&task=index" method="POST">
                    <div class="row">
                        <div class="col-5">
                            <label for="type">Type de Véhicule</label><select class="form-control" name="type" id="type" required>
                                <option value="">Selectionnez un type de vehicule</option>
                                <?php foreach ($type as $types) : ?>
                                    <option value="<?= $types['idtype'] ?>"><?= $types['nameType'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="departure">Date Début</label>
                            <input class="form-control" name="depart" id="departure"  min="<?=$today?>" type="date" required>
                        </div>
                        <div class="col">
                            <label for="arrival">Date Fin</label>
                            <input class="form-control" name="arrive" id="arrival" type="date" required>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary index-btn-search" type="submit">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="listeCars">
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    foreach ($searchCars as $searchCar) : ?>
                        <div class="carInfo-index">
                            <h3><?= $searchCar['brandVehicle'] ?>  <?= $searchCar['modelsVehicle'] ?></h3>
                            <h4 class="titleCarInfo">Vehicule Libre</h4>
                            <?php if (empty($_SESSION)){ ?>
                                <a class="a-index" href="index.php?controller=session&task=login"><button class="index-btn-loc">LOUER</button></a>
                            <?php }else{ ?>
                                <a class="a-index" href="index.php?controller=reservation&task=insertForm&id=<?=$searchCar['idvehicle']?>&marque=<?=$searchCar['brandVehicle']?>&modele=<?= $searchCar['modelsVehicle']?>&type=<?= $searchCar['nameType']?>&energy=<?=$searchCar['energyVehicle']?>&seats=<?= $searchCar['nbseatsVehicle']?>&boiteVitesse=<?= $searchCar['gearboxVehicle']?>&datedepart=<?=$departPost?>&datefin=<?=$arrivePost?>&prix=<?=$searchCar['prixLocVehicle']?>&nbjour=<?=$nbJours?>"><button class="index-btn-loc">LOUER</button></a>
                            <?php  } ?>
                        </div>
                        <img class="imgCars" src="<?= $searchCar['imgVehicle'] ?>" alt=" image voiture" ><br>
                    <?php endforeach ?>
                <?php  }?>
            </div>
        </div>
    </div>
</section>