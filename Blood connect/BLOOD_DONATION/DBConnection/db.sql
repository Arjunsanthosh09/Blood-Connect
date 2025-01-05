/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.5.8-log : Database - blood_bank_
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blood_bank_` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `blood_bank_`;


/*Table structure for table `donor_reg` */

DROP TABLE IF EXISTS `donor_reg`;

CREATE TABLE `donor_reg` (
  `d_id` int(20) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(100) DEFAULT NULL,
  `d_age` varchar(100) DEFAULT NULL,
  `d_address` varchar(100) DEFAULT NULL,
  `d_blood` varchar(100) DEFAULT NULL,
  `d_phone` varchar(100) DEFAULT NULL,
  `d_email` varchar(100) DEFAULT NULL,
  `d_diseases` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'FREE',
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `donor_reg` */

insert  into `donor_reg`(`d_id`,`d_name`,`d_age`,`d_address`,`d_blood`,`d_phone`,`d_email`,`d_diseases`,`status`) 
values (3,'Arjun Santhosh','21','Changanacherry','A+','9909789879','arjun@gmail.com','No Disease','FREE'),
(4,'Abel Saji','21','Changancheryy','A-','9098898790','abel@gmail.com','No Disease','FREE'),
(5,'Gowtham Thulasi','21','Kottayam','B+','8978909876','gowtham@gmail.com','Nothing','FREE'),
(6,'Anu Tiji','21','Payippad','B-','8330065374','anu@gmail.com','Nothing','FREE'),
(7,'Arun S Nair','22','Theghana','AB+','8921090920','arun@gmail.com','Nothing','FREE'),
(8,'Devika B menon','28','Kuruchi','AB-','8075741948','devika@gmail.com','Nothing','FREE'),
(9,'Ashwathy Anoop','20','Perunna','O+','7592810309','ashwathy@gmail.com','Nothing','FREE'),
(10,'Abhishek V gopal','23','Thirunakkara','O-','9656519636','abhishek@gmail.com','Nothing','FREE'),
(11,'Nithin Daniel','21','Vazhappally','A+','9400528164','nithin@gmail.com','Nothing','FREE'),
(12,'Joel Jacob','29','Mannanam','A-','7893162899','joeljacob@gmail.com','Nothing','FREE'),
(13,'Anngela Raichel','21','Kumarakom','B+','9093164529','anngela@gmail.com','Nothing','FREE');


/*Table structure for table `hospital` */

DROP TABLE IF EXISTS `hospital`;

CREATE TABLE `hospital` (
  `h_id` int(20) NOT NULL AUTO_INCREMENT,
  `h_name` varchar(100) DEFAULT NULL,
  `h_address` varchar(100) DEFAULT NULL,
  `h_phone` varchar(100) DEFAULT NULL,
  `h_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `hospital` */

insert  into `hospital`(`h_id`,`h_name`,`h_address`,`h_phone`,`h_email`) values 
(3,'Caritas Hospital','Thellakom','+914812500601','caritas@gmail.com'),
(4,'Kottayam Medical College Hospital','Kottayam','+914812500601','kmc@gmail.com'),
(5,'St. Thomas Hospital','Thekkethil','+914812422341','stthomas@gmail.com'),
(6,'St. Joseph Hospital','Mutholy','+914812410401','stjoseph@gmail.com'),
(7,'Believers Church Hospital','Puthuppally','+914812503000','bcmch@gmail.com'),
(8,'NSS Medical Mission Hospital','Puthuppally','+914812422541','nssmedm@gmail.com');



/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

  CREATE TABLE `login` (
    `l_id` int(20) NOT NULL AUTO_INCREMENT,
    `reg_id` varchar(50) DEFAULT NULL,
    `email` varchar(100) DEFAULT NULL,
    `password` varchar(100) DEFAULT NULL,
    `type` varchar(100) DEFAULT NULL,
    `status` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`l_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`l_id`,`reg_id`,`email`,`password`,`type`,`status`)
 values 
 (1,'0','admin@gmail.com','admin','ADMIN','1'),
 (6,'1','vishnu@gmail.com','123456','USER','1'),
 (7,'3','arjun@gmail.com','arjun','DONOR','1'),
 (8,'3','caritas@gmail.com','caritashs','HOSPITAL','1'),
 (9,'4','abel@gmail.com','abel','DONOR','1'),
 (10,'4','kmc@gmail.com','medicalcollege','HOSPITAL','1'),
 (11,'2','ajay@gmail.com','123456','USER','1'),
 (12,'3','archana@gmail.com','123456','USER','1'),
 (13,'5','gowtham@gmail.com','gowtham','DONOR','1'),
 (14,'5','stthomas@gmail.com','stthomas','HOSPITAL','1'),
 (15,'6','anu@gmail.com','anu','DONOR','1'),
 (16,'7','arun@gmail.com','devika','DONOR','1'),
 (17,'8','devika@gmail.com','devika','DONOR','1'),
 (18,'9','ashwathy@gmail.com','ashwathy','DONOR','1'),
 (19,'10','abhishek@gmail.com','abhishek','DONOR','1'),
 (20,'11','nithin@gmail.com','nithin','DONOR','1'),
 (21,'12','joeljacob@gmail.com','joeljacob','DONOR','1'),
 (22,'13','anngela@gmail.com','anngela','DONOR','1'),
 (23,'6','stjoseph@gmail.com','stjoseph','HOSPITAL','1'),
 (24,'7','bcmch@gmail.com','bcmhss','HOSPITAL','1'),
 (25,'8','nssmedm@gmail.com','nssmedicalmission','HOSPITAL','1');

/*Table structure for table `user_blood_request` */

DROP TABLE IF EXISTS `user_blood_request`;

CREATE TABLE `user_blood_request` (
  `b_rqst_id` int(20) NOT NULL AUTO_INCREMENT,
  `u_id` varchar(50) DEFAULT NULL COMMENT 'user_id',
  `d_id` varchar(50) DEFAULT 'NOT_ASSIGNED' COMMENT 'donor_id',
  `blood` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'PENDING',
  `last_donate` varchar(100) NOT NULL DEFAULT 'NOT UPDATED' COMMENT 'last donated date',
  PRIMARY KEY (`b_rqst_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `user_blood_request` */

insert  into `user_blood_request`(`b_rqst_id`,`u_id`,`d_id`,`blood`,`status`,`last_donate`)
 values (33,'1','3','B-','DONATED','2024-10-20 02:42'),
 (34,'3','5','A+','DONATED','2024-10-20 09:50');

/*Table structure for table `user_reg` */

DROP TABLE IF EXISTS `user_reg`;

CREATE TABLE `user_reg` (
  `u_id` int(20) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(100) DEFAULT NULL,
  `u_age` varchar(100) DEFAULT NULL,
  `u_address` varchar(100) DEFAULT NULL,
  `u_blood` varchar(100) DEFAULT NULL,
  `u_phone` varchar(100) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user_reg` */

insert  into `user_reg`(`u_id`,`u_name`,`u_age`,`u_address`,`u_blood`,`u_phone`,`u_email`)
 values (1,'Vishnu','25','Ernakulam','B+','9865325421','vishnu@gmail.com'),
 (2,'Ajay','24','Calicut','AB+','9878765434','ajay@gmail.com'),
 (3,'Archana','25','Kalamassery','B+','9089787656','archana@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
