/*
SQLyog Professional v12.5.1 (32 bit)
MySQL - 10.4.11-MariaDB : Database - db_surat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_surat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_surat`;

/*Table structure for table `tbl_surat_masuk` */

DROP TABLE IF EXISTS `tbl_surat_masuk`;

CREATE TABLE `tbl_surat_masuk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_urut` varchar(40) DEFAULT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `tgl_pengirim` varchar(30) DEFAULT NULL,
  `tgl_terima` varchar(30) DEFAULT NULL,
  `pengirim` varchar(50) DEFAULT NULL,
  `penerima` varchar(50) DEFAULT NULL,
  `unit_pengelola` varchar(50) DEFAULT NULL,
  `perihal` varchar(50) DEFAULT NULL,
  `disposisi` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `nama_file` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_surat_masuk` */

insert  into `tbl_surat_masuk`(`id`,`no_urut`,`no_surat`,`tgl_pengirim`,`tgl_terima`,`pengirim`,`penerima`,`unit_pengelola`,`perihal`,`disposisi`,`keterangan`,`nama_file`) values 
(29,'6','6','65','56','56','56','56','56','56','56',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`) values 
(1,'admin','2db3f233ea970c7b8b3b7b0d0cfbe56f');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
