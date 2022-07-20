INSERT INTO `type` (nameType)
VALUES
('Citadine'),
('Berline'),
('Suv'),
('Cabriolet'),
('Coupé');

INSERT INTO `user` (nameUser,passwordUser)
VALUES
('Franco','test'),
('Mbappe','test');

INSERT INTO `client` (lastnameClient,firstnameClient,adressClient,cityClient,zipcodeClient,phoneClient,mailClient,user_iduser)
VALUES
('Peschard-Glenard','François','158 Rue de Paris','Les Lilas','93260',0123456789,'francoisd@gmail.com',1),
('Mbappe','Kylian','100 rue de Versailles','Paris','75016',0198765432,'mbapped@gmail.com',2);

INSERT INTO `vehicle` (brandVehicle,modelsVehicle,energyVehicle,yearVehicle,nbseatsVehicle,gearboxVehicle,imgVehicle,type_idtype)
VALUES
('Mercedes','Classe C','Diesel','2021-01-01',5,'Automatique','https://www.caroom.fr/blog/wp-content/uploads/2021/02/20c0673-002lr.jpg',2),
('Audi','A5','Essence','2021-01-01',5,'Automatique','https://images.alphacoders.com/104/thumb-1920-1040802.jpg',2),
('Bwm','Série 5','Hybride','2022-01-01',5,'Automatique','https://www.automobile-magazine.fr/asset/cms/840x394/173354/config/122130/p90389007.jpeg',2),
('Mini','Cooper','Essence','2021-01-01',4,'Manuel','https://www.luxury-club.fr/wp-content/uploads/2020/01/mini-cooper_s_cabriolet-13.jpg',1),
('Buggati','Chiron','Essence','2022-01-01',2,'Automatique','https://www.luxury-club.fr/wp-content/uploads/2020/01/bugatti-chiron-20.jpg',5);


INSERT INTO `reservation` (dateReservation,insuranceReservation,adddriverReservation,babyseatReservation,gpsReservation,vehicle_idvehicle,client_idclient)
VALUES
('2022-10-10','Oui','Non','Non','Oui',1,1),
('2022-10-10','Oui','Non','Non','Oui',5,2);
  
