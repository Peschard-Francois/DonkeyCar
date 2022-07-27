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
('jrobert@gmail.com','jr','123','Robert','Jean','16 avenue de monQ','Paris','75019',0132659874),
('roberto@gmail.com','michel','123','jean-michel','Jean','"é place de la paix"','Paris','75019',0124242424),
('julien@gmail.com','DN','123','DE-Nauw','Julien','47 avenue des cons','tremblay','93290',0132652632),
('DENOUY@gmail.com','Denouy','123','KHUON','Denis','22 rue de la mienne','tremblay','93290',0132655543),
('bogoss93@gmail.com','CH','123','HABBEDDINE','Chérif','55 avenue des champs','Villepinte','93420',0132659998);


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
('Fiat','500','Essence','2022-01-01',5,'Manuelle','https://sf1.auto-moto.com/wp-content/uploads/sites/9/2014/12/EG1C6264-750x410.jpg',50,1),
('Ferrari','296 GTS','Essence','2022-01-01',2,'Manuelle','https://i.gaw.to/content/photos/52/08/520823-ferrari-296-gts-la-sportive-hybride-perd-son-toit.jpeg',600,4),
('Maserati','MC20','Essence','2022-01-01',2,'Manuelle','https://imageio.forbes.com/specials-images/imageserve/628d58c17bbe8b71ce7857e6/2023-Maserati-MC20-Cielo-Front/960x0.jpg',600,4),
('Lamborghini','Terzo Millennio','Essence','2022-01-01',2,'Manuelle','https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Festival_automobile_international_2018_-_Lamborghini_Terzo_Millennio_-_001.jpg',900,5),
('Aston Martin','Vantage','Essence','2022-01-01',2,'Manuelle','https://www.automobile-magazine.fr/asset/cms/840x394/167770/config/116580/amrvantagesabiroblue006-jpg.jpg',750,5);


INSERT INTO `reservation` (dateReservationDebut,dateReservationFin,insuranceReservation,adddriverReservation,babyseatReservation,gpsReservation,prixTotalReservation,vehicle_idvehicle,user_id)
VALUES
('2022-10-10','2022-10-20','Oui','Non','Non','Oui','600',1,1),
('2022-12-10','2022-12-25','Oui','Non','Non','Oui','700',3,3),
('2022-11-10','2022-11-17','Oui','Non','Non','Oui','1200',7,1),
('2022-09-10','2022-09-22','Oui','Non','Non','Oui','250',9,2);


  
