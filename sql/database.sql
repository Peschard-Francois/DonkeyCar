INSERT INTO `type` (nameType)
VALUES
('Citadine'),
('Berline'),
('Suv'),
('Cabriolet'),
('Coupé');


INSERT INTO `user` (email,username,password,lastname,firstname,adress,city,zipcode,phone)
VALUES
('francoisd@gmail.com','franco','123','Peschard-Glenard','François','158 Rue de Paris','Les Lilas','93260',0123456789),
('mbapped@gmail.com','mb','123','Mbappe','Kylian','100 rue de Versailles','Paris','75016',0198765432),
('jrobert@gmail.com','jr','123','Robert','Jean','16 avenue de monQ','Paris','75019',0132659874);

INSERT INTO `vehicle` (brandVehicle,modelsVehicle,energyVehicle,yearVehicle,nbseatsVehicle,gearboxVehicle,imgVehicle,prixLocVehicle,type_idtype)
VALUES
('Mercedes','Classe C','Diesel','2021-01-01',5,'Automatique','https://www.caroom.fr/blog/wp-content/uploads/2021/02/20c0673-002lr.jpg',150,2),
('Audi','A5','Essence','2021-01-01',5,'Automatique','https://images.alphacoders.com/104/thumb-1920-1040802.jpg',180,2),
('Bwm','Série 5','Hybride','2022-01-01',5,'Automatique','https://www.automobile-magazine.fr/asset/cms/840x394/173354/config/122130/p90389007.jpeg',120,2),
('Mini','Cooper','Essence','2021-01-01',4,'Manuelle','https://www.luxury-club.fr/wp-content/uploads/2020/01/mini-cooper_s_cabriolet-13.jpg',80,1),
('Buggati','Chiron','Essence','2022-01-01',2,'Automatique','https://www.luxury-club.fr/wp-content/uploads/2020/01/bugatti-chiron-20.jpg',600,5),
('Telsa','Model 3','Electrique','2022-01-01',5,'Automatique','https://www.luxury-club.fr/wp-content/uploads/2021/03/tesla-model-3.jpg',300,2),
('Alpine','A110 S','Essence','2022-01-01',5,'Manuelle','https://www.luxury-club.fr/wp-content/uploads/2022/04/alpine-a110_s-avant.jpg',400,5),
('Peugeot','208','Essence','2022-01-01',5,'Manuelle','https://www.automobile-magazine.fr/asset/cms/169280/config/118091/peugeot-208-testdrive-0919tc-23.jpg',60,1),
('Fiat','500','Essence','2022-01-01',5,'Manuelle','https://sf1.auto-moto.com/wp-content/uploads/sites/9/2014/12/EG1C6264-750x410.jpg',50,1);


INSERT INTO `reservation` (dateReservationDebut,dateReservationFin,insuranceReservation,adddriverReservation,babyseatReservation,gpsReservation,vehicle_idvehicle,user_id)
VALUES
('2022-10-10','2022-10-20','Oui','Non','Non','Oui',1,1),
('2022-12-10','2022-12-25','Oui','Non','Non','Oui',3,3),
('2022-11-10','2022-11-17','Oui','Non','Non','Oui',7,1),
('2022-09-10','2022-09-22','Oui','Non','Non','Oui',9,2);


  
