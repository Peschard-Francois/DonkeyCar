

INSERT INTO `vehicle` (brandVehicle,modelsVehicle,rangeVehicle,energyVehicle,yearVehicle,nbseatsVehicle,gearboxVehicle)
VALUES
('Mercedes','Classe C','Berline','Diesel','2021-01-01',5,'Automatique'),
('Audi','A5','Berline','Essence','2021-01-01',5,'Automatique'),
('Bwm','Série 5','Berline','Hybride','2022-01-01',5,'Automatique'),
('Mini','Cooper','Citadine','Essence','2021-01-01',4,'Manuel'),
('Buggati','Chiron','Coupé','Essence','2022-01-01',2,'Automatique');


INSERT INTO `client` (lastnameClient,firstnameClient,adressClient,cityClient,zipcodeClient,phoneClient,mailClient)
VALUES
('Peschard-Glenard','François','158 Rue de Paris','Les Lilas','93260',0123456789,'francoisd@gmail.com'),
('Mbappe','Kylian','100 rue de Versailles','Paris','75016',0198765432,'mbapped@gmail.com');
  

INSERT INTO `user` (nameUser,passwordUser,client_idclient)
VALUES
('Franco','test',1),
('Mbappe','test',2);

INSERT INTO `reservation` (dateReservation,insuranceReservation,adddriverReservation,babyseatReservation,gpsReservation,
vehicle_idvehicle,client_idclient)
VALUES
('2022-10-10','Oui','Non','Non','Oui',1,1);
  
