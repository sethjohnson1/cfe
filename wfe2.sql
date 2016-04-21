-- Adminer 3.3.3 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `bookdates`;
CREATE TABLE `bookdates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `bookdate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `bookdates` (`id`, `created`, `modified`, `bookdate`) VALUES
(5,	'2016-01-13 14:32:40',	'2016-01-13 14:32:40',	''),
(6,	'2016-01-13 14:32:40',	'2016-01-13 14:32:40',	'2');

DROP TABLE IF EXISTS `descriptions`;
CREATE TABLE `descriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_title` varchar(60) DEFAULT NULL,
  `meta_desc` varchar(160) DEFAULT NULL,
  `description` text,
  `pagetype` varchar(255) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `descriptions` (`id`, `created`, `modified`, `name`, `slug`, `meta_title`, `meta_desc`, `description`, `pagetype`, `visible`, `product_id`) VALUES
(1,	'2016-04-05 22:04:50',	'2016-04-05 22:04:50',	'Horses and Firearms (1730-1790)',	'horses_and_firearms',	'Horses and Firearms',	'',	'horses_and_firearms',	'history',	1,	1039),
(2,	'2016-04-05 22:09:27',	'2016-04-05 22:09:27',	'Gatling Gun',	'gatling_gun',	'Gatling Gun',	'The gun to end all wars',	'gatling_gun',	'firearm',	1,	1038),
(3,	'2016-04-05 22:29:27',	'2016-04-21 11:06:52',	'Lewis & Clark (1804 - 1806)',	'lewis_and_clark',	'Lewis & Clark (1804 - 1806)',	'Lewis & Clark shooting package',	'69 caliber flintlock US Model 1795 Springfield rifle and 50 caliber Kentucky flintlock pistol (3 shots on each).  ',	'package',	1,	1050),
(4,	'2016-04-05 23:05:25',	'2016-04-21 11:08:56',	'Mountain Man',	'mountain_man_package',	'Mountain Man shooting package',	'54 caliber Hawken percussion rifle, 50 caliber Kentucky percussion pistol',	'54 caliber Hawken percussion rifle, 50 caliber Kentucky percussion pistol, (3 shots on each).',	'package',	1,	1051),
(5,	'2016-04-07 22:28:27',	'2016-04-21 11:09:54',	'Colt Revolver',	'colt_revolver_package',	'Colt Revolver',	'44 caliber Colt Walker revolver and 36 caliber 1861 Colt Navy Revolver, (5 shots each).',	'44 caliber Colt Walker revolver and 36 caliber 1861 Colt Navy Revolver, (5 shots each).',	'package',	1,	1052),
(6,	'2016-04-21 10:57:32',	'2016-04-21 11:10:46',	'1861 Gatling Gun',	'gatling_gun_package',	'1861 Gatling Gun',	'1861 Gatling Gun package: 45 caliber, (40 shots)  ',	'1861 Gatling Gun package: 45 caliber, (40 shots)',	'package',	1,	1053);

DROP TABLE IF EXISTS `firearms`;
CREATE TABLE `firearms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `setting_value` text,
  `setting_date_value` datetime DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `firearms` (`id`, `created`, `modified`, `name`, `description`, `setting_value`, `setting_date_value`, `amount`) VALUES
(1584,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'Sunday',	NULL,	'1',	'0000-00-00 00:00:00',	NULL),
(1585,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'Monday',	NULL,	'1',	'0000-00-00 00:00:00',	NULL),
(1586,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'Tuesday',	NULL,	'1',	'0000-00-00 00:00:00',	NULL),
(1587,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'Wednesday',	NULL,	'1',	'0000-00-00 00:00:00',	NULL),
(1588,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'Thursday',	NULL,	'1',	'0000-00-00 00:00:00',	NULL),
(1589,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'Friday',	NULL,	'1',	'0000-00-00 00:00:00',	NULL),
(1590,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'Saturday',	NULL,	'1',	'0000-00-00 00:00:00',	NULL),
(1591,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'maxBookableDays',	NULL,	'60',	'0000-00-00 00:00:00',	NULL),
(1592,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'bookingInterval',	NULL,	'1800',	'0000-00-00 00:00:00',	NULL),
(1593,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'closedDays',	NULL,	'2016-11-24,2016-12-25,2016-01-20,2016-01-30',	'0000-00-00 00:00:00',	NULL),
(1594,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'appointmentSessionIDs',	NULL,	'8,10,11,6,5,14,18,13,19,15,9,16,20',	'0008-10-11 06:05:14',	NULL),
(1595,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'doubleSessionIDs',	NULL,	'10113,10113,10113,10112,10113,10113,10113,10125,10113,10126,10127,10128,10156',	'0000-00-00 00:00:00',	NULL),
(1596,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'retailCategoryID',	NULL,	'100002',	'2010-00-02 00:00:00',	NULL),
(1597,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'doubleCategoryID',	NULL,	'32',	'0000-00-00 00:00:00',	NULL),
(1598,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'discount',	'Bounty Card - $5 off',	'BOUNTY',	NULL,	5),
(1599,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'discount',	'Active or retired US Military - $10 off',	'MILITARY',	NULL,	10),
(1600,	'2016-04-21 10:23:30',	'2016-04-21 10:23:30',	'discount',	'Senior (age 65 or older) - $5 off',	'SENIOR',	NULL,	5);

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `prodtype` varchar(255) DEFAULT NULL,
  `img` varchar(40) DEFAULT NULL,
  `barcodeID` varchar(255) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `TaxRate` float DEFAULT NULL,
  `GroupID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `OnlinePrice` float DEFAULT NULL,
  `ShortDesc` text,
  `LongDesc` text,
  `CategoryID` int(11) DEFAULT NULL,
  `CategoryName` varchar(255) DEFAULT NULL,
  `ExtendedPrice` float DEFAULT NULL,
  `SessionTypeID` int(11) DEFAULT NULL,
  `SessionTypeName` varchar(300) DEFAULT NULL,
  `DoubleTypeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `products` (`id`, `created`, `modified`, `prodtype`, `img`, `barcodeID`, `Price`, `TaxRate`, `GroupID`, `Name`, `OnlinePrice`, `ShortDesc`, `LongDesc`, `CategoryID`, `CategoryName`, `ExtendedPrice`, `SessionTypeID`, `SessionTypeName`, `DoubleTypeID`) VALUES
(1040,	'2016-04-21 10:23:34',	'2016-04-21 10:23:34',	'Product',	NULL,	'6674354019',	60,	0.04,	10104,	'Add the Gatling Gun',	60,	'Might as well shoot the Gatling Gun while you\'re here.',	'<div>Might as well shoot the Gatling Gun while you\'re here.</div>',	100002,	'Retail',	62.4,	NULL,	NULL,	NULL),
(1041,	'2016-04-21 10:23:34',	'2016-04-21 10:23:34',	'Product',	NULL,	'1631619653',	30,	0.04,	10105,	'Add a Gun',	30,	'When you\'re here, pick any gun to add to your package (max?)',	'<div>When you\'re here, pick any gun to add to your package (max?)</div>',	100002,	'Retail',	31.2,	NULL,	NULL,	NULL),
(1042,	'2016-04-21 10:23:34',	'2016-04-21 10:23:34',	'Product',	NULL,	'9946165450',	10,	0.04,	10107,	'3-pack of targets',	10,	'Targets make a great souvenir. Lots to choose from when you get here. Zombie cow',	'<div>Targets make a great souvenir. We have a variety from tactical to fun - pick \'em when you get here.</div>',	100002,	'Retail',	10.4,	NULL,	NULL,	NULL),
(1043,	'2016-04-21 10:23:34',	'2016-04-21 10:23:34',	'Double',	NULL,	'5468440586',	39.5,	0.04,	10112,	'Double Gatling',	39.5,	NULL,	'<div>Double your ammo = double your fun!</div>',	32,	'Double',	41.08,	NULL,	NULL,	NULL),
(1044,	'2016-04-21 10:23:34',	'2016-04-21 10:23:34',	'Double',	NULL,	'4707714913',	27,	0.04,	10113,	'Double the Ammo - $27.00',	27,	NULL,	'<div>Double ammo = Double your fun!</div>',	32,	'Double',	28.08,	NULL,	NULL,	NULL),
(1045,	'2016-04-21 10:23:34',	'2016-04-21 10:23:34',	'Double',	NULL,	'5208981677',	24.5,	0.04,	10125,	'Double the Ammo - $24.50',	24.5,	NULL,	'',	32,	'Double',	25.48,	NULL,	NULL,	NULL),
(1046,	'2016-04-21 10:23:34',	'2016-04-21 10:23:34',	'Double',	NULL,	'6863089156',	29.5,	0.04,	10126,	'Double the Ammo - $29.50',	29.5,	NULL,	'',	32,	'Double',	30.68,	NULL,	NULL,	NULL),
(1047,	'2016-04-21 10:23:34',	'2016-04-21 10:23:34',	'Double',	NULL,	'8711514805',	37,	0.04,	10127,	'Double the Ammo - $37.00',	37,	NULL,	'',	32,	'Double',	38.48,	NULL,	NULL,	NULL),
(1048,	'2016-04-21 10:23:34',	'2016-04-21 10:23:34',	'Double',	NULL,	'6843165335',	59.5,	0.04,	10128,	'Double the Ammo - $59.50',	59.5,	NULL,	'',	32,	'Double',	61.88,	NULL,	NULL,	NULL),
(1049,	'2016-04-21 10:23:34',	'2016-04-21 10:23:34',	'Double',	NULL,	'1096174725',	7.5,	0.04,	10156,	'Bring a Friend - $7.50',	7.5,	'Bring a friend with your lane rental (off-season only).',	'',	32,	'Double',	7.8,	NULL,	NULL,	NULL),
(1050,	'2016-04-21 10:23:35',	'2016-04-21 10:23:35',	'Service',	NULL,	'10110',	54,	0.04,	NULL,	'Lewis and Clark',	54,	NULL,	NULL,	10110,	'Service',	56.16,	8,	'Service',	10113),
(1051,	'2016-04-21 10:23:36',	'2016-04-21 10:23:36',	'Service',	NULL,	'10114',	54,	0.04,	NULL,	'Mountain Man',	54,	NULL,	NULL,	10114,	'Service',	56.16,	10,	'Service',	10113),
(1052,	'2016-04-21 10:23:37',	'2016-04-21 10:23:37',	'Service',	NULL,	'10115',	54,	0.04,	NULL,	'Colt Revolver',	54,	NULL,	NULL,	10115,	'Service',	56.16,	11,	'Service',	10113),
(1053,	'2016-04-21 10:23:38',	'2016-04-21 10:23:38',	'Service',	NULL,	'10102',	79,	0.04,	NULL,	'1861 Gatling Gun',	79,	NULL,	NULL,	10102,	'Service',	82.16,	6,	'Service',	10112),
(1054,	'2016-04-21 10:23:39',	'2016-04-21 10:23:39',	'Service',	NULL,	'10130',	54,	0.04,	NULL,	'Civil War',	54,	NULL,	NULL,	10130,	'Service',	56.16,	5,	'Service',	10113),
(1055,	'2016-04-21 10:23:40',	'2016-04-21 10:23:40',	'Service',	NULL,	'10120',	54,	0.04,	NULL,	'Buffalo Hunter',	54,	NULL,	NULL,	10120,	'Service',	56.16,	14,	'Service',	10113),
(1056,	'2016-04-21 10:23:40',	'2016-04-21 10:23:40',	'Service',	NULL,	'10153',	54,	0.04,	NULL,	'General Custer',	54,	NULL,	NULL,	10153,	'Service',	56.16,	18,	'Service',	10113),
(1057,	'2016-04-21 10:23:41',	'2016-04-21 10:23:41',	'Service',	NULL,	'10119',	49,	0.04,	NULL,	'Gunfighter & Outlaw',	49,	NULL,	NULL,	10119,	'Service',	50.96,	13,	'Service',	10125),
(1058,	'2016-04-21 10:23:42',	'2016-04-21 10:23:42',	'Service',	NULL,	'10154',	54,	0.04,	NULL,	'Buffalo Bill / Annie Oakley',	54,	NULL,	NULL,	10154,	'Service',	56.16,	19,	'Service',	10113),
(1059,	'2016-04-21 10:23:43',	'2016-04-21 10:23:43',	'Service',	NULL,	'10122',	59,	0.04,	NULL,	'Pick 2 Guns',	59,	NULL,	NULL,	10122,	'Service',	61.36,	15,	'Service',	10126),
(1060,	'2016-04-21 10:23:44',	'2016-04-21 10:23:44',	'Service',	NULL,	'10111',	74,	0.04,	NULL,	'Pick 3 Guns',	74,	NULL,	NULL,	10111,	'Service',	76.96,	9,	'Service',	10127),
(1061,	'2016-04-21 10:23:45',	'2016-04-21 10:23:45',	'Service',	NULL,	'10123',	119,	0.04,	NULL,	'2 Guns and the Gatling Gun',	119,	NULL,	NULL,	10123,	'Service',	123.76,	16,	'Service',	10128),
(1062,	'2016-04-21 10:23:45',	'2016-04-21 10:23:45',	'Service',	NULL,	'10155',	15,	0.04,	NULL,	'Lane Rental',	15,	NULL,	NULL,	10155,	'Service',	15.6,	20,	'Service',	10156);

DROP TABLE IF EXISTS `webpages`;
CREATE TABLE `webpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `slug` varchar(40) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `img` varchar(40) DEFAULT NULL,
  `metatitle` varchar(200) DEFAULT NULL,
  `metadescription` varchar(200) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2016-04-21 17:11:44
