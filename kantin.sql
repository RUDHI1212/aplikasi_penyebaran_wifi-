/*
SQLyog Professional
MySQL - 10.1.36-MariaDB : Database - kantin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kantin` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kantin`;

/*Table structure for table `ket_do` */

DROP TABLE IF EXISTS `ket_do`;

CREATE TABLE `ket_do` (
  `Id_KDO` enum('1','2','3','4') NOT NULL,
  `status_DO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_KDO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ket_do` */

insert  into `ket_do`(`Id_KDO`,`status_DO`) values 
('1','Dipending'),
('2','DiProses'),
('3','Selesai'),
('4','Dibatalkan');

/*Table structure for table `ket_kurir` */

DROP TABLE IF EXISTS `ket_kurir`;

CREATE TABLE `ket_kurir` (
  `id` enum('1','2') DEFAULT NULL,
  `kurir` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ket_kurir` */

insert  into `ket_kurir`(`id`,`kurir`) values 
('1','Ada'),
('2','Tidak Ada');

/*Table structure for table `ket_p` */

DROP TABLE IF EXISTS `ket_p`;

CREATE TABLE `ket_p` (
  `Id_P` enum('1','2') NOT NULL,
  `Status_p` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id_P`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ket_p` */

insert  into `ket_p`(`Id_P`,`Status_p`) values 
('1','Tersedia'),
('2','Tidak Tersedia');

/*Table structure for table `tbl_detail_order` */

DROP TABLE IF EXISTS `tbl_detail_order`;

CREATE TABLE `tbl_detail_order` (
  `id_DO` int(5) NOT NULL AUTO_INCREMENT,
  `id` varchar(10) NOT NULL,
  `id_produk` varchar(10) DEFAULT NULL,
  `order_id` int(10) NOT NULL,
  `produk` varchar(25) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `status` enum('1','2','3','4') DEFAULT '1',
  `id_user` int(11) DEFAULT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `tgl_beli` date DEFAULT NULL,
  PRIMARY KEY (`id_DO`),
  KEY `order_id` (`order_id`),
  KEY `status` (`status`),
  KEY `lapak` (`id_user`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `tbl_detail_order_ibfk_1` FOREIGN KEY (`status`) REFERENCES `ket_do` (`Id_KDO`),
  CONSTRAINT `tbl_detail_order_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_detail_order` */

insert  into `tbl_detail_order`(`id_DO`,`id`,`id_produk`,`order_id`,`produk`,`qty`,`harga`,`status`,`id_user`,`id_pembeli`,`tgl_beli`) values 
(109,'D001','P008',64,'Katsu Jomblo',1,'8000','1',8,5,'2019-04-22'),
(110,'D002','P009',65,'Katsu Kuah',1,'10000','1',8,5,'2019-04-22'),
(111,'D003','P008',66,'Katsu Jomblo',1,'8000','1',8,5,'2019-04-22'),
(112,'D004','P008',67,'Katsu Jomblo',1,'8000','1',8,5,'2019-04-22'),
(113,'D005','P010',68,'Katsu nasi',1,'12000','1',8,5,'2019-04-22'),
(114,'D006','P006',69,'Katsu Cocol',1,'7000','1',8,5,'2019-04-22'),
(115,'D006','P008',69,'Katsu Jomblo',1,'8000','1',8,5,'2019-04-22'),
(116,'D006','P009',69,'Katsu Kuah',1,'10000','1',8,5,'2019-04-22'),
(117,'D007','P008',70,'Katsu Jomblo',1,'8000','1',8,5,'2019-04-22');

/*Table structure for table `tbl_order` */

DROP TABLE IF EXISTS `tbl_order`;

CREATE TABLE `tbl_order` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `pelanggan` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_order` */

insert  into `tbl_order`(`id`,`tanggal`,`pelanggan`) values 
(1,'2019-04-03',1),
(2,'2019-04-03',2),
(3,'2019-04-03',3),
(4,'2019-04-03',4),
(5,'2019-04-03',5),
(6,'2019-04-04',6),
(7,'2019-04-05',7),
(8,'2019-04-06',8),
(9,'2019-04-06',9),
(10,'2019-04-06',10),
(11,'2019-04-06',11),
(12,'2019-04-06',12),
(13,'2019-04-07',13),
(14,'2019-04-07',14),
(15,'2019-04-07',15),
(16,'2019-04-07',16),
(17,'2019-04-07',17),
(18,'2019-04-07',18),
(19,'2019-04-07',19),
(20,'2019-04-07',20),
(21,'2019-04-07',21),
(22,'2019-04-07',22),
(23,'2019-04-07',23),
(24,'2019-04-07',24),
(25,'2019-04-07',25),
(26,'2019-04-07',26),
(27,'2019-04-07',27),
(28,'2019-04-07',28),
(29,'2019-04-07',29),
(30,'2019-04-10',30),
(31,'2019-04-11',31),
(32,'2019-04-11',32),
(33,'2019-04-11',33),
(34,'2019-04-11',34),
(35,'2019-04-11',35),
(36,'2019-04-13',36),
(37,'2019-04-13',37),
(38,'2019-04-13',38),
(39,'2019-04-13',39),
(40,'2019-04-14',40),
(41,'2019-04-14',41),
(42,'2019-04-14',42),
(43,'2019-04-14',43),
(44,'2019-04-14',44),
(45,'2019-04-14',45),
(46,'2019-04-14',46),
(47,'2019-04-14',47),
(48,'2019-04-14',48),
(49,'2019-04-14',49),
(50,'2019-04-14',50),
(51,'2019-04-15',51),
(52,'2019-04-15',52),
(53,'2019-04-21',53),
(54,'2019-04-21',54),
(55,'2019-04-22',52),
(56,'2019-04-22',53),
(57,'2019-04-22',54),
(58,'2019-04-22',55),
(59,'2019-04-22',56),
(60,'2019-04-22',57),
(61,'2019-04-22',58),
(62,'2019-04-22',59),
(63,'2019-04-22',60),
(64,'2019-04-22',61),
(65,'2019-04-22',62),
(66,'2019-04-22',67),
(67,'2019-04-22',68),
(68,'2019-04-22',68),
(69,'2019-04-22',69),
(70,'2019-04-22',70),
(71,'2019-04-22',71);

/*Table structure for table `tbl_pelanggan` */

DROP TABLE IF EXISTS `tbl_pelanggan`;

CREATE TABLE `tbl_pelanggan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tbl_pelanggan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pelanggan` */

insert  into `tbl_pelanggan`(`id`,`id_user`,`nama`,`email`,`alamat`,`telp`) values 
(1,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','6285770575'),
(2,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','6285770575'),
(3,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','6285770575'),
(4,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','6285770575'),
(5,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','6285770575'),
(6,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','6285770575'),
(7,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','6285770575'),
(8,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(9,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(10,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(11,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(12,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(13,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(14,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(15,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(16,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(17,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(18,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(19,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(20,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(21,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(22,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(23,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(24,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(25,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(26,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(27,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(28,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(29,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','62857705721'),
(30,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(31,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(32,NULL,NULL,NULL,NULL,NULL),
(33,NULL,NULL,NULL,NULL,NULL),
(34,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(35,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(36,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(37,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(38,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(39,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(40,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(41,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(50,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(51,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(52,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(53,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(54,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(55,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(56,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(57,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(58,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(59,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(60,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(61,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(62,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(66,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(67,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(68,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(69,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626'),
(70,5,'Rama Dwiyantara','fasasasasas@gmail.om','12 RPL 3','08577057626'),
(71,5,'Rama Dwiyantara','ramadwiyantara1@gmail.com','12 RPL 3','08577057626');

/*Table structure for table `tbl_produk` */

DROP TABLE IF EXISTS `tbl_produk`;

CREATE TABLE `tbl_produk` (
  `id_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `kategori` int(10) DEFAULT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `status_k` enum('1','2') DEFAULT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `tbl_produk_ibfk_1` (`kategori`),
  KEY `status` (`status`),
  CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `users` (`id_user`),
  CONSTRAINT `tbl_produk_ibfk_2` FOREIGN KEY (`status`) REFERENCES `ket_p` (`Id_P`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_produk` */

insert  into `tbl_produk`(`id_produk`,`nama_produk`,`deskripsi`,`harga`,`gambar`,`kategori`,`status`,`status_k`) values 
('P006','Katsu Cocol','Enak Kalau di Cocol','7000','Katsu_Cocol.jpg',8,'1',NULL),
('P008','Katsu Jomblo','Buat anda para Jomblo','8000','Katsu_Jomblo.jpg',8,'1',NULL),
('P009','Katsu Kuah','Enak kalu lagi dingin','10000','Katsu_kuah.jpg',8,'1',NULL),
('P010','Katsu nasi','Biar wareg','12000','Katsu_with_rice.jpg',8,'1',NULL),
('P011','Basreng Bunda','Basreng punya bunda','3000','basreng_bunda.jpg',19,'1',NULL),
('P012','Basreng Kering','Krenyes krenyes','4000','basreng_kering.jpg',19,'1',NULL),
('P013','Basreng manis','semanis janji mantan','3000','basreng_manis.jpg',19,'1',NULL),
('P014','Basreng seblak','Basreng + seblak = basreng seblak','6000','basreng_seblak.jpg',19,'1',NULL),
('P015','Seblak Ceker','karena surga ada di ceker ibu','7000','ceker1.jpg',14,'1',NULL),
('P016','Seblak Kurupuk','kerupuk sama keripik beda ya gais','5000','kerupuk1.jpg',14,'1',NULL),
('P017','Seblak mie baso spesial','Lebih spesial dari kamu','9000','seblak-creamy-mie-bakso61.jpg',14,'1',NULL),
('P018','Seblak tulang','tulang impor','12000','tulang1.jpg',14,'1',NULL),
('P019','marimas','banyak variannya','2000','Marimas.jpg',7,'1',NULL),
('P020','Nutrisari','ada varian botolnya','4000','Nutrisari_Jeruk_peras.jpg',7,'1',NULL),
('P021','tea jus','lebih enak dari si teteh','3000','Tea_Jus.jpg',7,'1',NULL),
('P022','L men','Biar kuat nahan rindu','10000','L_men.jpg',7,'1',NULL),
('P023','fruit','buah buahan','2500','Fruit.jpg',7,'1',NULL),
('P024','caprice','Caprice-in aja','4000','caprice.jpg',7,'1',NULL),
('P025','Teh sisri gula batu','ga bikin ceket','2000','Teh_Sisri.jpg',7,'1',NULL),
('P026','bala bala','bala bala keles','3000','Bala_-_Bala.jpg',6,'1',NULL),
('P027','gehu','gehu = gede hulu','2000','Gehu.jpg',6,'1',NULL),
('P028','odading','buat yang suka panjang','4000','odading.jpg',6,'1',NULL),
('P029','pastel','isinya sayur bukan sayang','5000','Pastel.jpg',6,'1',NULL),
('P030','rolade','gulung ajah','4000','Rolade1.jpg',6,'1',NULL),
('P031','Tempe','tempe goreng','5000','Tempe.jpg',6,'1',NULL),
('P032','Batagor Bumbu kacang','Enak buanget','4000','batagor.jpg',13,'1',NULL),
('P033','Batagor Cocol','Enak kalo dicocol','6000','Batagor_cocol.jpg',13,'1',NULL),
('P034','Batagor Kering','Garing kriuk kriuk','5000','Batagor_Kering.jpg',13,'1',NULL),
('P035','Batagor Kuah','Enak kalo dingin','8000','Batagor_Kuah.jpg',13,'1',NULL),
('P036','Batagor Pedas','Lebih Pedas dari omongan mantan','10000','Batagor_Pedas.jpg',13,'1',NULL);

/*Table structure for table `tr_order` */

DROP TABLE IF EXISTS `tr_order`;

CREATE TABLE `tr_order` (
  `id_DO` int(5) NOT NULL AUTO_INCREMENT,
  `id` varchar(10) NOT NULL,
  `id_produk` varchar(10) DEFAULT NULL,
  `order_id` int(10) NOT NULL,
  `produk` varchar(25) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `tgl_beli` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_DO`),
  KEY `order_id` (`order_id`),
  KEY `lapak` (`id_user`),
  KEY `id_produk` (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

/*Data for the table `tr_order` */

insert  into `tr_order`(`id_DO`,`id`,`id_produk`,`order_id`,`produk`,`qty`,`harga`,`id_user`,`id_pembeli`,`tgl_beli`,`status`) values 
(7,'D001','P008',2,'Katsu Jomblo',4,'32000',8,5,'2019-04-14',1),
(12,'D001','P009',2,'Katsu Kuah',10,'100000',8,5,'2019-04-13',1),
(13,'D001','P014',2,'Basreng seblak',4,'24000',19,5,'2019-04-13',3),
(18,'D001','P017',2,'Seblak mie baso spesial',2,'18000',14,5,'2019-04-13',3),
(25,'D001','P022',2,'L men',8,'80000',7,5,'2019-04-13',3),
(31,'D001','P028',2,'odading',7,'28000',6,5,'2019-04-13',1),
(38,'D003','P006',6,'Katsu Cocol',1,'7000',8,5,'2019-04-07',1),
(39,'D004','P019',7,'marimas',991,'1982000',7,5,'2019-04-13',3),
(40,'D005','P006',8,'Katsu Cocol',1,'7000',8,5,'2019-04-07',2),
(42,'D006','P007',9,'makan katsu dengan sayur ',1,'9000',8,5,'2019-04-14',1),
(43,'D007','P006',10,'Katsu Cocol',1,'7000',8,5,'2019-04-07',3),
(46,'D010','P006',13,'Katsu Cocol',1,'7000',8,5,'2019-04-13',3),
(50,'D014','P007',17,'makan katsu dengan sayur ',1,'9000',8,5,'2019-04-14',1),
(56,'D020','P007',23,'makan katsu dengan sayur ',1,'9000',8,5,'2019-04-14',1),
(61,'D025','P006',28,'Katsu Cocol',1,'7000',8,5,'2019-04-13',3),
(63,'D027','P006',30,'Katsu Cocol',1,'7000',8,5,'2019-04-10',4),
(67,'D028','P007',34,'makan katsu dengan sayur ',10,'90000',8,5,'2019-04-14',1),
(68,'D029','P007',35,'makan katsu dengan sayur ',8,'72000',8,5,'2019-04-14',1),
(71,'D030','P006',36,'Katsu Cocol',1,'7000',8,5,'2019-04-13',3),
(72,'D030','P006',37,'Katsu Cocol',1,'7000',8,5,'2019-04-13',4),
(73,'D030','P007',38,'makan katsu dengan sayur ',8,'72000',8,5,'2019-04-13',3),
(75,'D031','P036',40,'Batagor Pedas',14,'140000',13,5,'2019-04-14',4),
(76,'D031','P033',40,'Batagor Cocol',10,'60000',13,5,'2019-04-14',3),
(77,'D031','P034',40,'Batagor Kering',12,'60000',13,5,'2019-04-14',4),
(78,'D031','P032',41,'Batagor Bumbu kacang',1,'4000',13,5,'2019-04-14',3),
(79,'D031','P033',41,'Batagor Cocol',1,'6000',13,5,'2019-04-14',4),
(84,'D035','P006',45,'Katsu Cocol',1,'7000',8,23,'2019-04-14',4),
(90,'D040','P037',50,'bapa',1,'11111',24,5,'2019-04-14',1),
(91,'D027','P006',31,'Katsu Cocol',9,'63000',8,5,'2019-04-14',3),
(92,'D015','P006',18,'Katsu Cocol',1,'7000',8,5,'2019-04-14',1),
(93,'D041','P008',52,'Katsu Jomblo',2,'16000',8,46,'2019-04-16',3),
(94,'D042','P008',53,'Katsu Jomblo',1,'8000',8,46,'2019-04-21',3),
(95,'D043','P006',54,'Katsu Cocol',1,'7000',8,46,'2019-04-21',3),
(96,'D031','P034',41,'Batagor Kering',1,'5000',13,5,'2019-04-22',2),
(97,'D041','P006',52,'Katsu Cocol',1,'7000',8,46,'2019-04-22',2),
(98,'D001','P011',2,'Basreng Bunda',7,'21000',19,5,'2019-04-22',3),
(99,'D001','P010',2,'Katsu nasi',3,'36000',8,5,'2019-04-22',3),
(100,'D001','P012',2,'Basreng Kering',7,'28000',19,5,'2019-04-22',3),
(101,'D001','P015',2,'Seblak Ceker',3,'21000',14,5,'2019-04-22',3),
(102,'',NULL,0,NULL,NULL,NULL,NULL,NULL,'2019-04-22',1),
(103,'D001','P018',2,'Seblak tulang',7,'84000',14,5,'2019-04-22',1),
(104,'D001','P019',2,'marimas',6,'12000',7,5,'2019-04-22',1),
(105,'D001','P016',2,'Seblak Kurupuk',7,'35000',14,5,'2019-04-22',1),
(106,'D001','P020',2,'Nutrisari',8,'32000',7,5,'2019-04-22',1),
(107,'D001','P021',2,'tea jus',9,'27000',7,5,'2019-04-22',1),
(108,'D001','P030',2,'rolade',12,'48000',6,5,'2019-04-22',1),
(109,'D001','P031',2,'Tempe',1,'5000',6,5,'2019-04-22',1),
(110,'D001','P025',2,'Teh sisri gula batu',5,'10000',7,5,'2019-04-22',1),
(111,'D001','P024',2,'caprice',6,'24000',7,5,'2019-04-22',1),
(112,'D001','P023',2,'fruit',7,'17500',7,5,'2019-04-22',1),
(113,'D001','P026',2,'bala bala',3,'9000',6,5,'2019-04-22',1),
(114,'D001','P029',2,'pastel',5,'25000',6,5,'2019-04-22',1),
(115,'D001','P027',2,'gehu',4,'8000',6,5,'2019-04-22',1),
(116,'D002','P036',5,'Batagor Pedas',1,'10000',13,5,'2019-04-22',1),
(117,'D002','P032',5,'Batagor Bumbu kacang',1,'4000',13,5,'2019-04-22',1),
(118,'D002','P034',5,'Batagor Kering',1,'5000',13,5,'2019-04-22',1),
(119,'D005','P011',8,'Basreng Bunda',6,'18000',19,5,'2019-04-22',1),
(120,'D008','P008',11,'Katsu Jomblo',1,'8000',8,5,'2019-04-22',1),
(121,'D009','P006',12,'Katsu Cocol',1,'7000',8,5,'2019-04-22',1),
(122,'D011','P009',14,'Katsu Kuah',1,'10000',8,5,'2019-04-22',1),
(123,'D012','P009',15,'Katsu Kuah',1,'10000',8,5,'2019-04-22',1),
(124,'D013','P006',16,'Katsu Cocol',1,'7000',8,5,'2019-04-22',1),
(125,'D016','P009',19,'Katsu Kuah',1,'10000',8,5,'2019-04-22',1),
(126,'D017','P006',20,'Katsu Cocol',1,'7000',8,5,'2019-04-22',1),
(127,'D018','P011',21,'Basreng Bunda',1,'3000',19,5,'2019-04-22',1),
(128,'D019','P006',22,'Katsu Cocol',1,'7000',8,5,'2019-04-22',1),
(129,'D021','P006',24,'Katsu Cocol',1,'7000',8,5,'2019-04-22',1),
(130,'D022','P006',25,'Katsu Cocol',1,'7000',8,5,'2019-04-22',1),
(131,'D023','P006',26,'Katsu Cocol',1,'7000',8,5,'2019-04-22',1),
(132,'D024','P006',27,'Katsu Cocol',1,'7000',8,5,'2019-04-22',1),
(133,'D026','P006',29,'Katsu Cocol',1,'7000',8,5,'2019-04-22',1),
(134,'D027','P032',31,'Batagor Bumbu kacang',1,'4000',13,5,'2019-04-22',1),
(135,'D027','P034',31,'Batagor Kering',1,'5000',13,5,'2019-04-22',1),
(136,'D028','P006',34,'Katsu Cocol',9,'63000',8,5,'2019-04-22',1),
(137,'D029','P025',35,'Teh sisri gula batu',1,'2000',7,5,'2019-04-22',1),
(138,'D029','P027',35,'gehu',1,'2000',6,5,'2019-04-22',1),
(139,'D030','P008',39,'Katsu Jomblo',1,'8000',8,5,'2019-04-22',1),
(140,'D032','P017',42,'Seblak mie baso spesial',1,'9000',14,23,'2019-04-22',1),
(141,'D033','P006',43,'Katsu Cocol Bacod',1,'7000',8,23,'2019-04-22',3),
(142,'D034','P019',44,'marimas',1,'2000',7,23,'2019-04-22',1),
(143,'D036','P019',46,'marimas',1,'2000',7,23,'2019-04-22',1),
(144,'D037','P015',47,'Seblak Ceker',1,'7000',14,23,'2019-04-22',1),
(145,'D038','P027',48,'gehu',1,'2000',6,23,'2019-04-22',1),
(146,'D038','P034',48,'Batagor Kering',1,'5000',13,23,'2019-04-22',1),
(147,'D039','P009',49,'Katsu Kuah',19,'190000',8,23,'2019-04-22',1),
(148,'D040','P006',51,'Katsu Cocol',1,'7000',8,5,'2019-04-22',1),
(149,'D043','P013',54,'Basreng manis',1,'3000',19,46,'2019-04-22',1),
(150,'D044','P008',55,'Katsu Jomblo',2,'16000',8,5,'2019-04-22',1),
(151,'D045','P009',56,'Katsu Kuah',2,'20000',8,5,'2019-04-22',1),
(152,'D046','P009',57,'Katsu Kuah',2,'20000',8,5,'2019-04-22',1),
(153,'D047','P010',58,'Katsu nasi',1,'12000',8,5,'2019-04-22',1),
(154,'D048','P033',59,'Batagor Cocol',1,'6000',13,5,'2019-04-22',1),
(155,'D049','P032',60,'Batagor Bumbu kacang',1,'4000',13,5,'2019-04-22',1),
(156,'D050','P008',61,'Katsu Jomblo',9,'72000',8,5,'2019-04-22',1),
(157,'D051','P009',62,'Katsu Kuah',2,'20000',8,5,'2019-04-22',1),
(158,'D052','P010',63,'Katsu nasi',1,'12000',8,5,'2019-04-22',1),
(159,'D052','P009',63,'Katsu Kuah',1,'10000',8,5,'2019-04-22',1),
(160,'D052','P008',63,'Katsu Jomblo',1,'8000',8,5,'2019-04-22',1),
(161,'D052','P006',63,'Katsu Cocol',1,'7000',8,5,'2019-04-22',1),
(162,'D008','P032',71,'Batagor Bumbu kacang',1,'4000',13,5,'2019-04-22',3),
(163,'D008','P035',71,'Batagor Kuah',1,'8000',13,5,'2019-04-22',4);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `role` enum('Customer','Administrator','Pelapak','Bank','Guru') NOT NULL DEFAULT 'Customer',
  `name` varchar(35) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `Dompet` varchar(10) DEFAULT '0',
  `email` varchar(35) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `contact` varchar(15) NOT NULL,
  `level` enum('1','2','3','4','5') NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id_user`,`role`,`name`,`username`,`password`,`Dompet`,`email`,`kelas`,`contact`,`level`) values 
(1,'Administrator','Prabu Janwar Alganiy','admin','admin',NULL,'admin@gmail.com','Address 2','9898000000','1'),
(4,'Customer','Farhan Rachmat','1602011526','lord','279000','farhan.rachmat09@gmail.com','12 RPL 3','8521990270','2'),
(5,'Customer','Rama Dwiyantara','1602011615','ashiap','88000','ramadwiyantara1@gmail.com','12 RPL 3','08577057626','2'),
(6,'Pelapak','Ibu Dede','ibudede','a','0','dede@gmail.com','kantin','628577162761','3'),
(7,'Pelapak','Ibu Endang','ibuendang','a','0','endang@gmail.com','kantin','62183781312','3'),
(8,'Pelapak','Ibu Katsu','ibukatsu','a','58000','katsu@gmail.com','kantin','62176386131','3'),
(13,'Pelapak','AA Batagor','aabatagor','huhu','4000','batagor@gmail.co','kantin','6218273888','3'),
(14,'Pelapak','Ibu Pojok','ibupojok','a','21000','ibupojok@gmail.com','kantin','62183712311','3'),
(19,'Pelapak','Ibu basreng','ibubasreng','juju','49000','ibubasreng@gmail.com','kantin','86089234561','3'),
(20,'Bank','BMT','bmt','bmt','14000','bmt@gmail.com','bmt','628960823451','4'),
(21,'Guru','Nadhira Destian','nadhira','nadhira','24000','nadhira21232@gmail.com','guru','621638123112','2'),
(87,'Customer','A. RAFLI SEPTIYADI','1665410721','2001-09-05','0','A. RAFLI SEPTIYADI@gmai.com','XIPM1','8122342751','2'),
(88,'Customer','Aaliya Jasmine','1706710001','2002-02-18','0','Aaliya Jasmine@gmail.com','XMM1','8122342759','2'),
(89,'Customer','ABBY IWARDHANI EMUS','1602011468','2001-03-20','0','ABBY IWARDHANI EMUS@gmai.com','XIMM1','8122342752','2'),
(90,'Customer','ABDILLAH MOCHAMAD SYAFE\'I','1502011260','2000-08-26','0','ABDILLAH MOCHAMAD SYAFE\'I@gmai.com','XIITKJ','2293779552','2'),
(91,'Customer','ABDUL FARUQ SIHABUDIN','1711010001','2002-06-06','0','ABDUL FARUQ SIHABUDIN@gmai.com','XAK1','2293773552','2'),
(92,'Customer','ABDUL GHOFUR HARYANTO','1602011469','2000-11-10','0','ABDUL GHOFUR HARYANTO@gmai.com','XITKJ','85722957277','2'),
(93,'Customer','Abimanyu Muhamad Padjri','1602011470','2001-06-11','0','Abimanyu Muhamad Padjri@gmai.com','XIMM2','82115095584','2'),
(94,'Customer','ABIZAR AZIZ HAKIM AULIANSYAH','1661811060','2000-11-28','0','ABIZAR AZIZ HAKIM AULIANSYAH@gmail.','XIAK2','82115095544','2'),
(95,'Customer','ACEP PERMANA YUSUP','1721109001','2001-10-07','0','ACEP PERMANA YUSUP@gmai.com','XOTKP2_PJJ','82115095584','2'),
(96,'Customer','Achmad Fauzi','1564510918','2000-03-20','0','Achmad Fauzi@gmail.com','XIIAP1','83829873859','2'),
(97,'Customer','Adam Afriana','1561810915','1998-04-06','0','Adam Afriana@gmail.com','XIIAK1','89672783512','2'),
(98,'Customer','ADAM RIZKI','1710810001','2002-07-26','0','ADAM RIZKI@gmail.com','XBDP1','89672783112','2'),
(99,'Customer','Ade Suci Hernawati','1561810916','2000-03-28','0','Ade Suci Hernawati@gmai.com','XIIAK2','89505537413','2'),
(100,'Customer','Adena Musolih','1665410722','2001-03-01','0','Adena Musolih@gmail.com','XIPM1','85220116676','2'),
(101,'Customer','ADHITYA NUR RIFAI','1721109002','2001-12-31','0','ADHITYA NUR RIFAI@gmai.com','XOTKP1_PJJ','85220118676','2'),
(102,'Customer','ADHYKA FAUZIAH RAHMA','1706710002','2002-07-25','0','ADHYKA FAUZIAH RAHMA@gmai.com','XMM2','81286938068','2'),
(103,'Customer','Adi Kurniawan','1502011261','2000-04-06','0','Adi Kurniawan@gmail.com','XIITKJ','81394269388','2'),
(104,'Customer','ADI LUTFI HIDAYANTO','1706610002','2002-02-19','0','ADI LUTFI HIDAYANTO@gmai.com','XTKJ','813942669388','2'),
(105,'Customer','Adi Muhammad Ferdiyansyah','1565410617','2000-02-22','0','Adi Muhammad Ferdiyansyah@gmai.com','XIIPM1','85353485305','2'),
(106,'Customer','adinda ayu rahmadini','1711010002','2001-11-29','0','adinda ayu rahmadini@gmai.com','XAK2','83821483738','2'),
(107,'Pelapak','cobain','cobain','cobain','0','cobain@gmail.com','Pelapak','123123123','3'),
(108,'Bank','ini bank','INIBANK','INIBANK','0','INIBANK@GMAIL.COM','Bank','321321321','4');

/* Trigger structure for table `tbl_detail_order` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `pembatalan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `pembatalan` BEFORE DELETE ON `tbl_detail_order` FOR EACH ROW BEGIN
	INSERT INTO tr_order
	(
	  tr_order.`harga`,
	  tr_order.`id`,
	  tr_order.`id_pembeli`,
	  tr_order.`id_produk`,
	  tr_order.`id_user`,
	  tr_order.`order_id`,
	  tr_order.`produk`,
	  tr_order.`qty`,
	  tr_order.tgl_beli,
	  tr_order.`status`
	)
	VALUES
	(
	  old.harga,
	  old.id,
	  OLD.id_pembeli,
	  OLD.id_produk,
	  OLD.id_user,
	  OLD.order_id,
	  old.produk,
	  OLD.qty,
	  sysdate(),
	  OLD.status
	);
    END */$$


DELIMITER ;

/* Trigger structure for table `tbl_detail_order` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `Hapus_pesanan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `Hapus_pesanan` AFTER DELETE ON `tbl_detail_order` FOR EACH ROW BEGIN
	update users set Dompet = Dompet + old.harga
	where id_user = old.id_pembeli and not old.status = '3';
	
	update users set Dompet = Dompet + old.harga
	WHERE id_user = old.id_user AND old.status = '3';
    END */$$


DELIMITER ;

/*Table structure for table `detail_order` */

DROP TABLE IF EXISTS `detail_order`;

/*!50001 DROP VIEW IF EXISTS `detail_order` */;
/*!50001 DROP TABLE IF EXISTS `detail_order` */;

/*!50001 CREATE TABLE  `detail_order`(
 `id_DO` int(5) ,
 `id` varchar(10) ,
 `order_id` int(10) ,
 `produk` varchar(25) ,
 `qty` int(10) ,
 `harga` varchar(20) ,
 `status` enum('1','2','3','4') ,
 `status_DO` varchar(50) ,
 `id_user` int(10) ,
 `nama` varchar(50) ,
 `alamat` varchar(50) ,
 `email` varchar(50) ,
 `telp` varchar(20) ,
 `kategori` int(11) ,
 `name` varchar(35) ,
 `tgl_beli` date ,
 `gambar` varchar(50) 
)*/;

/*Table structure for table `dompet` */

DROP TABLE IF EXISTS `dompet`;

/*!50001 DROP VIEW IF EXISTS `dompet` */;
/*!50001 DROP TABLE IF EXISTS `dompet` */;

/*!50001 CREATE TABLE  `dompet`(
 `id_user` int(11) ,
 `name` varchar(35) ,
 `username` varchar(20) ,
 `dompet` varchar(10) 
)*/;

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

/*!50001 DROP VIEW IF EXISTS `kategori` */;
/*!50001 DROP TABLE IF EXISTS `kategori` */;

/*!50001 CREATE TABLE  `kategori`(
 `id_user` int(11) ,
 `name` varchar(35) 
)*/;

/*Table structure for table `pelapak` */

DROP TABLE IF EXISTS `pelapak`;

/*!50001 DROP VIEW IF EXISTS `pelapak` */;
/*!50001 DROP TABLE IF EXISTS `pelapak` */;

/*!50001 CREATE TABLE  `pelapak`(
 `id_user` int(11) ,
 `role` enum('Customer','Administrator','Pelapak','Bank','Guru') ,
 `name` varchar(35) ,
 `username` varchar(20) ,
 `password` varchar(256) ,
 `Dompet` varchar(10) ,
 `email` varchar(35) ,
 `kelas` varchar(20) ,
 `contact` varchar(15) ,
 `level` enum('1','2','3','4','5') 
)*/;

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

/*!50001 DROP VIEW IF EXISTS `produk` */;
/*!50001 DROP TABLE IF EXISTS `produk` */;

/*!50001 CREATE TABLE  `produk`(
 `id_produk` varchar(10) ,
 `nama_produk` varchar(50) ,
 `deskripsi` varchar(50) ,
 `harga` varchar(10) ,
 `gambar` varchar(50) ,
 `id_user` int(10) ,
 `status` enum('1','2') ,
 `status_p` varchar(20) ,
 `username` varchar(20) ,
 `name` varchar(35) ,
 `level` enum('1','2','3','4','5') 
)*/;

/*Table structure for table `report` */

DROP TABLE IF EXISTS `report`;

/*!50001 DROP VIEW IF EXISTS `report` */;
/*!50001 DROP TABLE IF EXISTS `report` */;

/*!50001 CREATE TABLE  `report`(
 `harga` varchar(20) ,
 `id` varchar(10) ,
 `id_DO` int(5) ,
 `id_pembeli` int(11) ,
 `id_produk` varchar(10) ,
 `id_user` int(11) ,
 `order_id` int(10) ,
 `produk` varchar(25) ,
 `qty` int(10) ,
 `tgl_beli` date ,
 `name` varchar(35) ,
 `status` int(11) 
)*/;

/*View structure for view detail_order */

/*!50001 DROP TABLE IF EXISTS `detail_order` */;
/*!50001 DROP VIEW IF EXISTS `detail_order` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_order` AS select `tbl_detail_order`.`id_DO` AS `id_DO`,`tbl_detail_order`.`id` AS `id`,`tbl_detail_order`.`order_id` AS `order_id`,`tbl_detail_order`.`produk` AS `produk`,`tbl_detail_order`.`qty` AS `qty`,`tbl_detail_order`.`harga` AS `harga`,`tbl_detail_order`.`status` AS `status`,`ket_do`.`status_DO` AS `status_DO`,`tbl_pelanggan`.`id_user` AS `id_user`,`tbl_pelanggan`.`nama` AS `nama`,`tbl_pelanggan`.`alamat` AS `alamat`,`tbl_pelanggan`.`email` AS `email`,`tbl_pelanggan`.`telp` AS `telp`,`tbl_detail_order`.`id_user` AS `kategori`,`users`.`name` AS `name`,`tbl_detail_order`.`tgl_beli` AS `tgl_beli`,`tbl_produk`.`gambar` AS `gambar` from ((((`tbl_detail_order` join `ket_do` on((`tbl_detail_order`.`status` = `ket_do`.`Id_KDO`))) join `tbl_pelanggan` on((`tbl_detail_order`.`order_id` = `tbl_pelanggan`.`id`))) join `users` on((`users`.`id_user` = `tbl_detail_order`.`id_user`))) join `tbl_produk` on((`tbl_produk`.`id_produk` = `tbl_detail_order`.`id_produk`))) */;

/*View structure for view dompet */

/*!50001 DROP TABLE IF EXISTS `dompet` */;
/*!50001 DROP VIEW IF EXISTS `dompet` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dompet` AS (select `users`.`id_user` AS `id_user`,`users`.`name` AS `name`,`users`.`username` AS `username`,`users`.`Dompet` AS `dompet` from `users` where (`users`.`level` = '2')) */;

/*View structure for view kategori */

/*!50001 DROP TABLE IF EXISTS `kategori` */;
/*!50001 DROP VIEW IF EXISTS `kategori` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kategori` AS select `users`.`id_user` AS `id_user`,`users`.`name` AS `name` from `users` where (`users`.`level` = 3) */;

/*View structure for view pelapak */

/*!50001 DROP TABLE IF EXISTS `pelapak` */;
/*!50001 DROP VIEW IF EXISTS `pelapak` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pelapak` AS (select `users`.`id_user` AS `id_user`,`users`.`role` AS `role`,`users`.`name` AS `name`,`users`.`username` AS `username`,`users`.`password` AS `password`,`users`.`Dompet` AS `Dompet`,`users`.`email` AS `email`,`users`.`kelas` AS `kelas`,`users`.`contact` AS `contact`,`users`.`level` AS `level` from `users` where (`users`.`level` = '3')) */;

/*View structure for view produk */

/*!50001 DROP TABLE IF EXISTS `produk` */;
/*!50001 DROP VIEW IF EXISTS `produk` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `produk` AS select `tbl_produk`.`id_produk` AS `id_produk`,`tbl_produk`.`nama_produk` AS `nama_produk`,`tbl_produk`.`deskripsi` AS `deskripsi`,`tbl_produk`.`harga` AS `harga`,`tbl_produk`.`gambar` AS `gambar`,`tbl_produk`.`kategori` AS `id_user`,`tbl_produk`.`status` AS `status`,`ket_p`.`Status_p` AS `status_p`,`users`.`username` AS `username`,`users`.`name` AS `name`,`users`.`level` AS `level` from ((`tbl_produk` join `ket_p` on((`tbl_produk`.`status` = `ket_p`.`Id_P`))) join `users` on((`tbl_produk`.`kategori` = `users`.`id_user`))) */;

/*View structure for view report */

/*!50001 DROP TABLE IF EXISTS `report` */;
/*!50001 DROP VIEW IF EXISTS `report` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report` AS (select `tr_order`.`harga` AS `harga`,`tr_order`.`id` AS `id`,`tr_order`.`id_DO` AS `id_DO`,`tr_order`.`id_pembeli` AS `id_pembeli`,`tr_order`.`id_produk` AS `id_produk`,`tr_order`.`id_user` AS `id_user`,`tr_order`.`order_id` AS `order_id`,`tr_order`.`produk` AS `produk`,`tr_order`.`qty` AS `qty`,`tr_order`.`tgl_beli` AS `tgl_beli`,`users`.`name` AS `name`,`tr_order`.`status` AS `status` from (`tr_order` join `users`) where (`tr_order`.`id_user` = `users`.`id_user`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
