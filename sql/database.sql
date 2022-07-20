

INSERT INTO `vehicle` (brandVehicle,modelsVehicle,rangeVehicle,energyVehicle,yearVehicle,nbseatsVehicle,gearboxVehicle,imgVehicle)
VALUES
('Mercedes','Classe C','Berline','Diesel','2021-01-01',5,'Automatique','https://www.caroom.fr/blog/wp-content/uploads/2021/02/20c0673-002lr.jpg'),
('Audi','A5','Berline','Essence','2021-01-01',5,'Automatique','https://images.alphacoders.com/104/thumb-1920-1040802.jpg'),
('Bwm','Série 5','Berline','Hybride','2022-01-01',5,'Automatique','https://www.automobile-magazine.fr/asset/cms/840x394/173354/config/122130/p90389007.jpeg'),
('Mini','Cooper','Citadine','Essence','2021-01-01',4,'Manuel','https://www.luxury-club.fr/wp-content/uploads/2020/01/mini-cooper_s_cabriolet-13.jpg'),
('Buggati','Chiron','Coupé','Essence','2022-01-01',2,'Automatique','https://www.luxury-club.fr/wp-content/uploads/2020/01/bugatti-chiron-20.jpg');


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
  
