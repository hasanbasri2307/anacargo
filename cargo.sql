/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 10.1.21-MariaDB : Database - anacargo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`anacargo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `anacargo`;

/*Table structure for table `cnpibk` */

DROP TABLE IF EXISTS `cnpibk`;

CREATE TABLE `cnpibk` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jns_aju` int(10) unsigned NOT NULL,
  `kd_jns_pibk` int(10) unsigned NOT NULL,
  `no_barang` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kd_kantor` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kd_jns_angkut` int(10) unsigned NOT NULL,
  `nm_pengangkut` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_flight` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kd_pel_muat` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kd_pel_bongkar` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kd_gudang` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_invoice` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kd_negara_asal` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_barang` int(11) DEFAULT NULL,
  `no_bc11` varchar(29) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_bc11` date DEFAULT NULL,
  `no_pos_bc11` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_subpos_bc11` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_subsubpos_bc11` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_master_blawb` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_master_blawb` date DEFAULT NULL,
  `no_house_blawb` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_house_blawb` date DEFAULT NULL,
  `kd_negara_pengirim` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_pengirim` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `al_pengirim` text COLLATE utf8mb4_unicode_ci,
  `jns_id_penerima` int(10) unsigned NOT NULL,
  `customer_id` bigint(20) unsigned NOT NULL,
  `jns_id_pemberitahu` int(10) unsigned NOT NULL,
  `no_id_pemberitahu` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_pemberitahu` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `al_pemberitahu` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_izin_pemberitahu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_izin_pemberitahu` date DEFAULT NULL,
  `kd_valas` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ndpbm` double(9,4) DEFAULT NULL,
  `fob` double(18,2) DEFAULT NULL,
  `asuransi` double(14,2) DEFAULT NULL,
  `freight` double(16,2) DEFAULT NULL,
  `cif` double(18,2) DEFAULT NULL,
  `netto` double(18,4) DEFAULT NULL,
  `bruto` double(18,4) DEFAULT NULL,
  `tot_dibayar` double(15,2) DEFAULT NULL,
  `npwp_billing` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_billing` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe_dokumen` enum('cn','pibk') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cnpibk_jns_aju_index` (`jns_aju`),
  KEY `cnpibk_kd_jns_pibk_index` (`kd_jns_pibk`),
  KEY `cnpibk_no_barang_index` (`no_barang`),
  KEY `cnpibk_kd_jns_angkut_index` (`kd_jns_angkut`),
  KEY `cnpibk_no_bc11_index` (`no_bc11`),
  KEY `cnpibk_tgl_bc11_index` (`tgl_bc11`),
  KEY `cnpibk_no_master_blawb_index` (`no_master_blawb`),
  KEY `cnpibk_tgl_house_blawb_index` (`tgl_house_blawb`),
  KEY `cnpibk_tgl_izin_pemberitahu_index` (`tgl_izin_pemberitahu`),
  KEY `cnpibk_no_izin_pemberitahu_index` (`no_izin_pemberitahu`),
  KEY `cnpibk_customer_id_index` (`customer_id`),
  KEY `cnpibk_jns_id_penerima_foreign` (`jns_id_penerima`),
  KEY `cnpibk_jns_id_pemberitahu_foreign` (`jns_id_pemberitahu`),
  CONSTRAINT `cnpibk_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `cnpibk_jns_aju_foreign` FOREIGN KEY (`jns_aju`) REFERENCES `jenis_aju` (`id`),
  CONSTRAINT `cnpibk_jns_id_pemberitahu_foreign` FOREIGN KEY (`jns_id_pemberitahu`) REFERENCES `jenis_id` (`id`),
  CONSTRAINT `cnpibk_jns_id_penerima_foreign` FOREIGN KEY (`jns_id_penerima`) REFERENCES `jenis_id` (`id`),
  CONSTRAINT `cnpibk_kd_jns_angkut_foreign` FOREIGN KEY (`kd_jns_angkut`) REFERENCES `jenis_pibk` (`id`),
  CONSTRAINT `cnpibk_kd_jns_pibk_foreign` FOREIGN KEY (`kd_jns_pibk`) REFERENCES `jenis_pibk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cnpibk` */

insert  into `cnpibk`(`id`,`jns_aju`,`kd_jns_pibk`,`no_barang`,`kd_kantor`,`kd_jns_angkut`,`nm_pengangkut`,`no_flight`,`kd_pel_muat`,`kd_pel_bongkar`,`kd_gudang`,`no_invoice`,`kd_negara_asal`,`jml_barang`,`no_bc11`,`tgl_bc11`,`no_pos_bc11`,`no_subpos_bc11`,`no_subsubpos_bc11`,`no_master_blawb`,`tgl_master_blawb`,`no_house_blawb`,`tgl_house_blawb`,`kd_negara_pengirim`,`nm_pengirim`,`al_pengirim`,`jns_id_penerima`,`customer_id`,`jns_id_pemberitahu`,`no_id_pemberitahu`,`nm_pemberitahu`,`al_pemberitahu`,`no_izin_pemberitahu`,`tgl_izin_pemberitahu`,`kd_valas`,`ndpbm`,`fob`,`asuransi`,`freight`,`cif`,`netto`,`bruto`,`tot_dibayar`,`npwp_billing`,`nama_billing`,`status`,`tipe_dokumen`,`deleted_at`,`created_at`,`updated_at`) values 
(3,1,1,'BRG001',NULL,4,'PT Arjuna','FLG0909','PLB09','PLB12','GDG0',NULL,'ID',150,'bc01','2017-03-22','pos0','po11','po12','gb','2017-03-29','09kff','2017-03-29','ID','Hasan','Rawamangun',5,1,1,'033466301077000','PT.Sayap Biru Ekspres','JL. PEJOMPONGAN III NO 7 BENDUNGAN HILIR, JAKARTA, INDONESIA','S3692','2016-07-12','IDR',NULL,NULL,NULL,NULL,50000.00,12000.0000,1200.0000,5000.00,'0912321g','Ha','0','cn',NULL,'2017-03-30 18:20:48','2017-03-30 18:20:48');

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone_1` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `customers` */

insert  into `customers`(`id`,`client_code`,`name`,`address`,`phone_1`,`phone_2`,`fax`,`email`,`npwp`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'125000555','PT Maju Terus','fdafdasfkalsfk;daf',NULL,NULL,NULL,NULL,'0700151255','2017-03-28 19:23:44','2017-03-28 19:23:44',NULL),
(2,'125000666','PT Cipta Terus','adfdflaksdlfkda;lfsd',NULL,NULL,NULL,NULL,'0800112875','2017-03-28 19:23:44','2017-03-28 19:23:44',NULL);

/*Table structure for table `detail_barang` */

DROP TABLE IF EXISTS `detail_barang`;

CREATE TABLE `detail_barang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cnpibk_id` bigint(20) unsigned NOT NULL,
  `seri_brg` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hs_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ur_brg` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_neg_asal` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_kms` int(11) NOT NULL,
  `jns_kms` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cif` double(18,2) NOT NULL,
  `kd_sat_hrg` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_sat_hrg` double(8,2) NOT NULL,
  `fl_bebas` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_skep` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_skep` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_barang_cnpibk_id_index` (`cnpibk_id`),
  CONSTRAINT `detail_barang_cnpibk_id_foreign` FOREIGN KEY (`cnpibk_id`) REFERENCES `cnpibk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_barang` */

insert  into `detail_barang`(`id`,`cnpibk_id`,`seri_brg`,`hs_code`,`ur_brg`,`kd_neg_asal`,`jml_kms`,`jns_kms`,`cif`,`kd_sat_hrg`,`jml_sat_hrg`,`fl_bebas`,`no_skep`,`tgl_skep`,`created_at`,`updated_at`) values 
(5,3,'br01','hs01','br 01','ID',120,'lk',500.00,'lk',5000.00,'1','skep01','2017-03-27','2017-03-30 18:20:48','2017-03-30 18:20:48'),
(6,3,'br02','hs02','br 01','ID',150,'ff',200.00,'as',5000.00,'0','skep02','2017-03-28','2017-03-30 18:20:48','2017-03-30 18:20:48');

/*Table structure for table `detail_pungutan` */

DROP TABLE IF EXISTS `detail_pungutan`;

CREATE TABLE `detail_pungutan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cnpibk_id` bigint(20) unsigned NOT NULL,
  `kd_pungutan` int(10) unsigned NOT NULL,
  `nilai` double(22,2) NOT NULL,
  `kd_tarif` int(10) unsigned NOT NULL,
  `kd_sat_tarif` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_sat` int(11) NOT NULL,
  `tarif` double(18,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_pungutan_kd_pungutan_index` (`kd_pungutan`),
  KEY `detail_pungutan_cnpibk_id_index` (`cnpibk_id`),
  KEY `detail_pungutan_kd_tarif_index` (`kd_tarif`),
  CONSTRAINT `detail_pungutan_cnpibk_id_foreign` FOREIGN KEY (`cnpibk_id`) REFERENCES `cnpibk` (`id`),
  CONSTRAINT `detail_pungutan_kd_pungutan_foreign` FOREIGN KEY (`kd_pungutan`) REFERENCES `jenis_pungutan` (`id`),
  CONSTRAINT `detail_pungutan_kd_tarif_foreign` FOREIGN KEY (`kd_tarif`) REFERENCES `jenis_tarif` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_pungutan` */

insert  into `detail_pungutan`(`id`,`cnpibk_id`,`kd_pungutan`,`nilai`,`kd_tarif`,`kd_sat_tarif`,`jml_sat`,`tarif`,`created_at`,`updated_at`) values 
(1,3,4,500.00,1,'as',15000,50000.00,'2017-03-30 18:20:49','2017-03-30 18:20:49'),
(2,3,1,120.00,2,'gg',29000,10200.00,'2017-03-30 18:20:49','2017-03-30 18:20:49');

/*Table structure for table `header_pungutan` */

DROP TABLE IF EXISTS `header_pungutan`;

CREATE TABLE `header_pungutan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cnpibk_id` bigint(20) unsigned NOT NULL,
  `kd_pungutan` int(10) unsigned NOT NULL,
  `nilai` double(22,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `header_pungutan_kd_pungutan_index` (`kd_pungutan`),
  KEY `header_pungutan_cnpibk_id_index` (`cnpibk_id`),
  CONSTRAINT `header_pungutan_cnpibk_id_foreign` FOREIGN KEY (`cnpibk_id`) REFERENCES `cnpibk` (`id`),
  CONSTRAINT `header_pungutan_kd_pungutan_foreign` FOREIGN KEY (`kd_pungutan`) REFERENCES `jenis_pungutan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `header_pungutan` */

insert  into `header_pungutan`(`id`,`cnpibk_id`,`kd_pungutan`,`nilai`,`created_at`,`updated_at`) values 
(5,3,4,500.00,'2017-03-30 18:20:48','2017-03-30 18:20:48'),
(6,3,1,120.00,'2017-03-30 18:20:48','2017-03-30 18:20:48');

/*Table structure for table `jenis_aju` */

DROP TABLE IF EXISTS `jenis_aju`;

CREATE TABLE `jenis_aju` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_aju` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_aju` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jenis_aju` */

insert  into `jenis_aju`(`id`,`kode_aju`,`nama_aju`,`keterangan`,`created_at`,`updated_at`) values 
(1,'1','CN','Consignment Note','2017-03-28 19:23:54','2017-03-28 19:23:54'),
(2,'2','PIBK','Pemberitahuan Impor Barang Khusus','2017-03-28 19:23:54','2017-03-28 19:23:54'),
(3,'3','BC 1.4','Pemberitahuan Pemindahan Penimbunan Barang Kiriman','2017-03-28 19:23:54','2017-03-28 19:23:54'),
(4,'4','PIB','Pemberitahuan Impor Barang','2017-03-28 19:23:54','2017-03-28 19:23:54');

/*Table structure for table `jenis_angkutan` */

DROP TABLE IF EXISTS `jenis_angkutan`;

CREATE TABLE `jenis_angkutan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_angkutan` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_angkutan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jenis_angkutan` */

insert  into `jenis_angkutan`(`id`,`kode_angkutan`,`nama_angkutan`,`keterangan`,`created_at`,`updated_at`) values 
(1,'1','Laut',NULL,'2017-03-28 19:24:38','2017-03-28 19:24:38'),
(2,'2','Kereta Api',NULL,'2017-03-28 19:24:38','2017-03-28 19:24:38'),
(3,'3','Darat',NULL,'2017-03-28 19:24:38','2017-03-28 19:24:38'),
(4,'4','Udara',NULL,'2017-03-28 19:24:38','2017-03-28 19:24:38'),
(5,'5','Pos',NULL,'2017-03-28 19:24:38','2017-03-28 19:24:38'),
(6,'6','Multi Moda',NULL,'2017-03-28 19:24:38','2017-03-28 19:24:38'),
(7,'7','Instalasi',NULL,'2017-03-28 19:24:38','2017-03-28 19:24:38'),
(8,'8','Perairan',NULL,'2017-03-28 19:24:38','2017-03-28 19:24:38'),
(9,'9','Lainnya',NULL,'2017-03-28 19:24:38','2017-03-28 19:24:38');

/*Table structure for table `jenis_id` */

DROP TABLE IF EXISTS `jenis_id`;

CREATE TABLE `jenis_id` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jns_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jenis_id` */

insert  into `jenis_id`(`id`,`jns_id`,`nama`,`created_at`,`updated_at`) values 
(1,'1',NULL,'2017-03-28 19:24:48','2017-03-28 19:24:48'),
(2,'2',NULL,'2017-03-28 19:24:48','2017-03-28 19:24:48'),
(3,'3',NULL,'2017-03-28 19:24:48','2017-03-28 19:24:48'),
(4,'4',NULL,'2017-03-28 19:24:48','2017-03-28 19:24:48'),
(5,'5',NULL,'2017-03-28 19:24:48','2017-03-28 19:24:48'),
(6,'6',NULL,'2017-03-28 19:24:49','2017-03-28 19:24:49'),
(7,'7',NULL,'2017-03-28 19:24:49','2017-03-28 19:24:49'),
(8,'8',NULL,'2017-03-28 19:24:49','2017-03-28 19:24:49'),
(9,'9',NULL,NULL,NULL),
(10,'0',NULL,NULL,NULL);

/*Table structure for table `jenis_pibk` */

DROP TABLE IF EXISTS `jenis_pibk`;

CREATE TABLE `jenis_pibk` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_pibk` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pibk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jenis_pibk` */

insert  into `jenis_pibk`(`id`,`kode_pibk`,`nama_pibk`,`keterangan`,`created_at`,`updated_at`) values 
(1,'1','Barang Pindahan',NULL,'2017-03-28 19:24:54','2017-03-28 19:24:54'),
(2,'2','Barang Kiriman Melalui PJT',NULL,'2017-03-28 19:24:54','2017-03-28 19:24:54'),
(3,'3','Barang Impor Sementara Dibawa Penumpang',NULL,'2017-03-28 19:24:54','2017-03-28 19:24:54'),
(4,'4','Barang Impor Tertentu',NULL,'2017-03-28 19:24:54','2017-03-28 19:24:54'),
(5,'5','Barang Pribadi Penumpang',NULL,'2017-03-28 19:24:54','2017-03-28 19:24:54'),
(6,'9','Lainnya',NULL,'2017-03-28 19:24:54','2017-03-28 19:24:54');

/*Table structure for table `jenis_pungutan` */

DROP TABLE IF EXISTS `jenis_pungutan`;

CREATE TABLE `jenis_pungutan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_pungutan` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pungutan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jenis_pungutan` */

insert  into `jenis_pungutan`(`id`,`kode_pungutan`,`nama_pungutan`,`keterangan`,`created_at`,`updated_at`) values 
(1,'1','BM','Bea Masuk Bayar','2017-03-28 19:25:03','2017-03-28 19:25:03'),
(2,'2','PPH','Pajak Penghasilan Bayar','2017-03-28 19:25:03','2017-03-28 19:25:03'),
(3,'3','PPN','Pajak Pertambahan Nilai Bayar','2017-03-28 19:25:03','2017-03-28 19:25:03'),
(4,'4','PPNBM','Pajak Pertambahan Nilai Bea Masuk Bayar','2017-03-28 19:25:03','2017-03-28 19:25:03');

/*Table structure for table `jenis_tarif` */

DROP TABLE IF EXISTS `jenis_tarif`;

CREATE TABLE `jenis_tarif` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_tarif` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_tarif` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jenis_tarif` */

insert  into `jenis_tarif`(`id`,`kode_tarif`,`nama_tarif`,`keterangan`,`created_at`,`updated_at`) values 
(1,'1','PROSENTASE (ADVALORUM)',NULL,'2017-03-28 19:25:09','2017-03-28 19:25:09'),
(2,'2','SPESIFIKASI',NULL,'2017-03-28 19:25:09','2017-03-28 19:25:09');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2017_03_23_161005_create-table-clients',1),
(4,'2017_03_25_000001_create-table-pibk',1),
(5,'2017_03_25_000002_create-table-aju',1),
(6,'2017_03_25_000003_create-table-pungutan',1),
(7,'2017_03_25_000004_create-table-tarif',1),
(8,'2017_03_25_000005_create-table-angkut',1),
(9,'2017_03_25_000006_create-table-jenisid',1),
(10,'2017_03_25_000007_create-table-cnpibk',1),
(11,'2017_03_25_000008_create-table-headerpungutan',1),
(12,'2017_03_25_000009_create-table-detailbarang',1),
(13,'2017_03_25_000010_create-table-detailpungutan',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('staff','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','suspend','deactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`type`,`status`,`last_login`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Hasan','hasan@gmail.com','$2y$10$1Y/0bF93EsM9sAweelyfUOp.jUKRd4ttTHF1EeS/F7zrsfsyQdeBW','admin','active','2017-03-30 17:35:31',NULL,'2017-03-28 19:25:20','2017-03-30 17:35:31',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
