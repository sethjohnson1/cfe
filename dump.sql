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
  `SessionTypeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `descriptions` (`id`, `created`, `modified`, `name`, `slug`, `meta_title`, `meta_desc`, `description`, `pagetype`, `visible`, `product_id`, `SessionTypeID`) VALUES
(1,	'2016-04-05 22:04:50',	'2016-04-05 22:04:50',	'Horses and Firearms (1730-1790)',	'horses_and_firearms',	'Horses and Firearms',	'',	'horses_and_firearms',	'history',	1,	1039,	NULL),
(2,	'2016-04-05 22:09:27',	'2016-04-21 13:30:07',	'Indian Trade Musket',	'indian_trade_musket',	'Indian Trade Musket',	'The serpentine side plate is an indicator of a firearm made specifically for trade.',	'indian_trade_musket',	'firearm',	1,	1073,	NULL),
(3,	'2016-04-05 22:29:27',	'2016-04-22 02:21:05',	'Lewis & Clark (1804 - 1806)',	'lewis_and_clark_package',	'Lewis & Clark (1804 - 1806)',	'Lewis & Clark shooting package',	'69 caliber flintlock US Model 1795 Springfield rifle and 50 caliber Kentucky flintlock pistol (3 shots on each).  ',	'package',	1,	1073,	8),
(4,	'2016-04-05 23:05:25',	'2016-04-22 02:42:27',	'Mountain Man',	'mountain_man_package',	'Mountain Man shooting package',	'54 caliber Hawken percussion rifle, 50 caliber Kentucky percussion pistol',	'54 caliber Hawken percussion rifle, 50 caliber Kentucky percussion pistol, (3 shots on each).',	'package',	1,	1074,	10),
(5,	'2016-04-07 22:28:27',	'2016-04-22 02:44:06',	'Colt Revolver',	'colt_revolver_package',	'Colt Revolver',	'44 caliber Colt Walker revolver and 36 caliber 1861 Colt Navy Revolver, (5 shots each).',	'44 caliber Colt Walker revolver and 36 caliber 1861 Colt Navy Revolver, (5 shots each).',	'package',	1,	1075,	11),
(6,	'2016-04-21 10:57:32',	'2016-04-22 02:44:16',	'1861 Gatling Gun',	'gatling_gun_package',	'1861 Gatling Gun',	'1861 Gatling Gun package: 45 caliber, (40 shots)  ',	'1861 Gatling Gun package: 45 caliber, (40 shots)',	'package',	1,	1076,	6),
(7,	'2016-04-21 11:15:38',	'2016-04-22 02:44:37',	'Civil War',	'civil_war_package',	'Civil War shooting package',	'58 caliber US Model 1861 Springfield Rifle (2 shots) and 44 caliber Le Mat Revolver (8 shots) and one 20 gauge Lemat shotgun blast  ',	'58 caliber US Model 1861 Springfield Rifle (2 shots) and 44 caliber Le Mat Revolver (8 shots) and one 20 gauge Lemat shotgun blast  ',	'package',	1,	1077,	5),
(8,	'2016-04-21 11:16:32',	'2016-04-22 02:44:47',	'Buffalo Hunter',	'buffalo_hunter_package',	'Buffalo Hunter shooting package',	'45/70 Sharps rifle and the 54 caliber Hawken percussion rifle, (3 shots on each)',	'45/70 Sharps rifle and the 54 caliber Hawken percussion rifle, (3 shots on each)',	'package',	1,	1078,	14),
(9,	'2016-04-21 11:17:15',	'2016-04-22 02:44:58',	'General Custer',	'general_custer_package',	'General Custer shooting package',	'45/70 caliber 1873 Springfield carbine (3 shots) and a 45 caliber 1866\' Winchester (10 shots)',	'45/70 caliber 1873 Springfield carbine (3 shots) and a 45 caliber 1866\' Winchester (10 shots)',	'package',	1,	1079,	18),
(10,	'2016-04-21 11:17:58',	'2016-04-22 02:45:25',	'Cowboys & Outlaws',	'gunfighter_and_outlaw',	'Gunfighter & Outlaw shooting package',	'45 caliber 1892 Winchester Rifle and a 45 caliber 1873 Colt SAA revolver, (10 shots on each) ',	'45 caliber 1892 Winchester Rifle and a 45 caliber 1873 Colt SAA revolver, (10 shots on each) ',	'package',	1,	1080,	13),
(11,	'2016-04-21 11:18:50',	'2016-04-22 02:45:40',	'Buffalo Bill / Annie Oakley',	'buffalo_bill_annie_oakley_package',	'Buffalo Bill / Annie Oakley shooting package',	'45 caliber 1873 Winchester and 1892 Winchester rifles, (10 shots on each) ',	'45 caliber 1873 Winchester and 1892 Winchester rifles, (10 shots on each) ',	'package',	1,	1081,	19),
(12,	'2016-04-21 11:20:01',	'2016-04-22 02:45:52',	'Pick any two Guns',	'pick_two_package',	'Pick any two guns package',	'Pick any two guns, shots and caliber vary based on availability and model.',	'Pick any two guns from our great selection! Shots and caliber vary based on availability and model.',	'package',	1,	1082,	15),
(13,	'2016-04-21 11:21:31',	'2016-04-22 02:46:04',	'Pick any three Guns',	'pick_three_package',	'Pick any three guns package',	'Pick any three guns from the Cody Firearms Experience, shots and caliber vary based on availability and model.',	'Pick any three guns from our great selection! Shots and caliber vary based on availability and model.',	'package',	1,	1083,	9),
(14,	'2016-04-21 11:22:48',	'2016-04-22 02:46:14',	'2 Guns and the Gatling Gun',	'two_guns_and_the_gatling_package',	'2 Guns and the Gatling Gun',	'Pick any two guns and shoot the Gatling Gun with it! Great value for the ultimate experience.',	'Pick any two guns and shoot the Gatling Gun with it! Great value for the ultimate experience.',	'package',	1,	1084,	16),
(16,	'2016-04-21 11:25:22',	'2016-04-22 02:46:25',	'Lane Rental (off-season only)',	'lane_rental',	'Lane Rental (off-season only)',	'Rent our lanes and bring your own gun! Subject to rules and during the slow season.',	'Rent our state-of-the-art lanes.Subject to rules and during the slow season. Add a second shooter for half price!',	'package',	1,	1085,	20),
(17,	'2016-04-21 11:55:57',	'2016-04-21 11:55:57',	'Lewis & Clark (1804 - 1806)',	'lewis_and_clark',	'Lewis & Clark (1804 - 1806)',	'Cody Firearms Experience presents Lewis & Clark (1804 - 1806).',	'lewis_and_clark',	'history',	1,	1050,	NULL),
(18,	'2016-04-21 11:58:24',	'2016-04-21 11:59:07',	'Mountain Men (1825 - 1840)',	'mountain_men',	'Mountain Men (1825 - 1840)',	'The Hawken rifle was the firearm of the mountain men. The Hawken brothers made the first gun in 1823 for William H. Ashley, who along with partner Andrew Henry ',	'mountain_men',	'history',	1,	1051,	NULL),
(19,	'2016-04-21 11:59:57',	'2016-04-21 11:59:57',	'Colt & Walker (1846 - 1847)',	'colt_walker',	'Colt & Walker (1846 - 1847)',	'At the outbreak of the Mexican War, Samuel Walker became a lieutenant colonel of the First Regiment, Texas Mounted Riflemen. He subsequently went to Washington ',	'colt_walker',	'history',	1,	1052,	NULL),
(20,	'2016-04-21 12:00:36',	'2016-04-21 12:00:50',	'Civil War (1861 - 1865)',	'civil_war',	'Civil War (1861 - 1865)',	'Confederate troops marched north out of Texas and into New Mexico. They were headed toward Colorado territory intending to take control not only of the region..',	'civil_war',	'history',	1,	1054,	NULL),
(21,	'2016-04-21 12:06:51',	'2016-04-21 12:06:51',	'Buffalo Hunters (1870\'s)',	'buffalo_bill',	'Buffalo Hunters (1870\'s)',	'William F. Cody carried a Springfield Trapdoor Rifle when he began hunting buffalo for the Kansas Pacific Railroad work crews in 1867',	'buffalo_bill',	'history',	1,	1058,	NULL),
(22,	'2016-04-21 12:09:37',	'2016-04-21 12:09:37',	'Indian Wars (1864 - 1890)',	'indian_wars',	'Indian Wars (1864 - 1890)',	'When Lt. Col. George A. Custer led the 7th Cavalry along Lodge Trail Ridge above the Little Bighorn River on June 25, 1876, he may have thought their training..',	'indian_wars',	'history',	1,	1056,	NULL),
(23,	'2016-04-21 12:11:22',	'2016-04-21 12:11:22',	'Cowboys & Outlaws (1867 - 1890)',	'cowboys_outlaws',	'Cowboys & Outlaws (1867 - 1890)',	'Former Texas Rangers Charles Goodnight and Oliver Loving gathered cattle in Texas in 1866 and headed the herd north on a trail that would take their name. The w',	'cowboys_outlaws',	'history',	1,	1057,	NULL),
(24,	'2016-04-21 12:12:53',	'2016-04-21 12:12:53',	'Wild West (1876 - 1890)',	'wild_west',	'Wild West (1876 - 1890)',	'Buffalo Bill used a smoothbore version of the 1873 Winchester in his Wild West, a traveling extravaganza begun as the Old Glory Blowout in Columbus, Nebraska...',	'wild_west',	'history',	1,	1058,	NULL),
(25,	'2016-04-21 13:45:44',	'2016-04-21 13:45:44',	'US Model 1795 Flintlock Musket',	'1795_musket',	'US Model 1795 Flintlock Musket',	'First military firearm made out of Springfield Armory.',	'First military firearm made out of Springfield Armory.',	'firearm',	1,	1073,	NULL),
(26,	'2016-04-21 13:48:23',	'2016-04-21 13:48:23',	'Half Stock Hawken Rifle',	'half_stock_hawken',	'Half Stock Hawken Rifle',	'This rifle was always handmade, never mass produced.',	'This rifle was always handmade, never mass produced.',	'firearm',	1,	1073,	NULL),
(27,	'2016-04-21 13:51:25',	'2016-04-21 13:51:25',	'Colt Walker Revolver',	'colt_walker_revolver',	'Colt Walker Revolver',	'Samuel Colt collaborated with Captain Samuel Hamilton Walker to produce a powerful side arm for the Texas Rangers — the revolver that saved Colt’s new business.',	'Samuel Colt collaborated with Captain Samuel Hamilton Walker to produce a powerful sidearm for the Texas Rangers — the revolver that saved Colt’s new business.',	'firearm',	1,	1075,	NULL),
(28,	'2016-04-21 13:56:05',	'2016-04-21 13:56:05',	'US Model 1861 Rifled Musket',	'1861_musket',	'US Model 1861 Rifled Musket',	'This rifled musket was the primary infantry arm of the Union Army.',	'This rifled musket was the primary infantry arm of the Union Army.',	'firearm',	1,	1077,	NULL),
(29,	'2016-04-21 13:58:57',	'2016-04-21 13:58:57',	'Sharps Model 1874 Single Shot Rifle',	'1874_sharps',	'Sharps Model 1874 Single Shot Rifle',	'The Sharps Rifle was one of the first successful rifles to transition from black powder to metallic cartridges.',	'The Sharps Rifle was one of the first successful rifles to transition from black powder to metallic cartridges.',	'firearm',	1,	1079,	NULL),
(30,	'2016-04-21 14:01:37',	'2016-04-21 14:01:37',	'US Model 1873 Trapdoor Carbine',	'1873_trapdoor',	'US Model 1873 Trapdoor Carbine',	'First standard military issue breechloading rifle and carbine.',	'First standard military issue breechloading rifle and carbine.',	'firearm',	1,	1079,	NULL),
(31,	'2016-04-21 14:04:34',	'2016-04-21 14:04:34',	'Colt Model 1873 Single Action Army Revolver',	'1873_colt_revolver',	'Colt Model 1873 Single Action Army Revolver',	'This revolver is better known as the Peacemaker — a term given not by the manufacturer but by a distributor.',	'This revolver is better known as the Peacemaker — a term given not by the manufacturer but by a distributor.',	'firearm',	1,	1075,	NULL),
(32,	'2016-04-21 14:10:07',	'2016-04-21 14:10:07',	'Winchester Model 1873 Rifle',	'1873_winchester',	'Winchester Model 1873 Rifle',	'This model was labeled “The Gun that Won the West” in an international Winchester marketing campaign in 1919.',	'This model was labeled “The Gun that Won the West” in an international Winchester marketing campaign in 1919.',	'firearm',	1,	1081,	NULL),
(33,	'2016-04-21 14:14:05',	'2016-04-21 14:14:23',	'1861 Gatling Gun',	'gatling_gun',	'1861 Gatling Gun',	'',	'',	'firearm',	1,	1076,	NULL);

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
(1109,	'2016-04-22 02:41:35',	'2016-04-22 02:41:35',	'Product',	NULL,	'6674354019',	60,	0.04,	10104,	'Add the Gatling Gun',	60,	'Might as well shoot the Gatling Gun while you\'re here.',	'<div>Might as well shoot the Gatling Gun while you\'re here.</div>',	100002,	'Retail',	62.4,	NULL,	NULL,	NULL),
(1110,	'2016-04-22 02:41:35',	'2016-04-22 02:41:35',	'Product',	NULL,	'1631619653',	30,	0.04,	10105,	'Add a Gun',	30,	'When you\'re here, pick any gun to add to your package',	'<div>When you\'re here, pick any gun to add to your package</div>',	100002,	'Retail',	31.2,	NULL,	NULL,	NULL),
(1111,	'2016-04-22 02:41:35',	'2016-04-22 02:41:35',	'Product',	NULL,	'9946165450',	10,	0.04,	10107,	'3-pack of targets',	10,	'Targets make a great souvenir. Lots to choose from when you get here.',	'<div>Targets make a great souvenir. We have a variety from tactical to fun - pick \'em when you get here.</div>',	100002,	'Retail',	10.4,	NULL,	NULL,	NULL),
(1112,	'2016-04-22 02:41:35',	'2016-04-22 02:41:35',	'Double',	NULL,	'5468440586',	39.5,	0.04,	10112,	'Double Gatling',	39.5,	NULL,	'<div>Double your ammo = double your fun!</div>',	32,	'Double',	41.08,	NULL,	NULL,	NULL),
(1113,	'2016-04-22 02:41:35',	'2016-04-22 02:41:35',	'Double',	NULL,	'4707714913',	27,	0.04,	10113,	'Double the Ammo - $27.00',	27,	NULL,	'<div>Double ammo = Double your fun!</div>',	32,	'Double',	28.08,	NULL,	NULL,	NULL),
(1114,	'2016-04-22 02:41:35',	'2016-04-22 02:41:35',	'Double',	NULL,	'5208981677',	24.5,	0.04,	10125,	'Double the Ammo - $24.50',	24.5,	NULL,	'',	32,	'Double',	25.48,	NULL,	NULL,	NULL),
(1115,	'2016-04-22 02:41:35',	'2016-04-22 02:41:35',	'Double',	NULL,	'6863089156',	29.5,	0.04,	10126,	'Double the Ammo - $29.50',	29.5,	NULL,	'',	32,	'Double',	30.68,	NULL,	NULL,	NULL),
(1116,	'2016-04-22 02:41:35',	'2016-04-22 02:41:35',	'Double',	NULL,	'8711514805',	37,	0.04,	10127,	'Double the Ammo - $37.00',	37,	NULL,	'',	32,	'Double',	38.48,	NULL,	NULL,	NULL),
(1117,	'2016-04-22 02:41:35',	'2016-04-22 02:41:35',	'Double',	NULL,	'6843165335',	59.5,	0.04,	10128,	'Double the Ammo - $59.50',	59.5,	NULL,	'',	32,	'Double',	61.88,	NULL,	NULL,	NULL),
(1118,	'2016-04-22 02:41:35',	'2016-04-22 02:41:35',	'Double',	NULL,	'1096174725',	7.5,	0.04,	10156,	'Bring a Friend - $7.50',	7.5,	'Bring a friend with your lane rental (off-season only).',	'',	32,	'Double',	7.8,	NULL,	NULL,	NULL),
(1119,	'2016-04-22 02:41:36',	'2016-04-22 02:41:36',	'Service',	NULL,	'10110',	54,	0.04,	NULL,	'Lewis and Clark',	54,	NULL,	NULL,	10110,	'Service',	56.16,	8,	'Service',	10113),
(1120,	'2016-04-22 02:41:37',	'2016-04-22 02:41:37',	'Service',	NULL,	'10114',	54,	0.04,	NULL,	'Mountain Man',	54,	NULL,	NULL,	10114,	'Service',	56.16,	10,	'Service',	10113),
(1121,	'2016-04-22 02:41:38',	'2016-04-22 02:41:38',	'Service',	NULL,	'10115',	54,	0.04,	NULL,	'Colt Revolver',	54,	NULL,	NULL,	10115,	'Service',	56.16,	11,	'Service',	10113),
(1122,	'2016-04-22 02:41:38',	'2016-04-22 02:41:38',	'Service',	NULL,	'10102',	79,	0.04,	NULL,	'1861 Gatling Gun',	79,	NULL,	NULL,	10102,	'Service',	82.16,	6,	'Service',	10112),
(1123,	'2016-04-22 02:41:39',	'2016-04-22 02:41:39',	'Service',	NULL,	'10130',	54,	0.04,	NULL,	'Civil War',	54,	NULL,	NULL,	10130,	'Service',	56.16,	5,	'Service',	10113),
(1124,	'2016-04-22 02:41:40',	'2016-04-22 02:41:40',	'Service',	NULL,	'10120',	54,	0.04,	NULL,	'Buffalo Hunter',	54,	NULL,	NULL,	10120,	'Service',	56.16,	14,	'Service',	10113),
(1125,	'2016-04-22 02:41:41',	'2016-04-22 02:41:41',	'Service',	NULL,	'10153',	54,	0.04,	NULL,	'General Custer',	54,	NULL,	NULL,	10153,	'Service',	56.16,	18,	'Service',	10113),
(1126,	'2016-04-22 02:41:41',	'2016-04-22 02:41:41',	'Service',	NULL,	'10119',	49,	0.04,	NULL,	'Cowboys & Outlaws',	49,	NULL,	NULL,	10119,	'Service',	50.96,	13,	'Service',	10125),
(1127,	'2016-04-22 02:41:42',	'2016-04-22 02:41:42',	'Service',	NULL,	'10154',	54,	0.04,	NULL,	'Buffalo Bill / Annie Oakley',	54,	NULL,	NULL,	10154,	'Service',	56.16,	19,	'Service',	10113),
(1128,	'2016-04-22 02:41:43',	'2016-04-22 02:41:43',	'Service',	NULL,	'10122',	59,	0.04,	NULL,	'Pick 2 Guns',	59,	NULL,	NULL,	10122,	'Service',	61.36,	15,	'Service',	10126),
(1129,	'2016-04-22 02:41:44',	'2016-04-22 02:41:44',	'Service',	NULL,	'10111',	74,	0.04,	NULL,	'Pick 3 Guns',	74,	NULL,	NULL,	10111,	'Service',	76.96,	9,	'Service',	10127),
(1130,	'2016-04-22 02:41:44',	'2016-04-22 02:41:44',	'Service',	NULL,	'10123',	119,	0.04,	NULL,	'2 Guns and the Gatling Gun',	119,	NULL,	NULL,	10123,	'Service',	123.76,	16,	'Service',	10128),
(1131,	'2016-04-22 02:41:45',	'2016-04-22 02:41:45',	'Service',	NULL,	'10155',	15,	0.04,	NULL,	'Lane Rental',	15,	NULL,	NULL,	10155,	'Service',	15.6,	20,	'Service',	10156);

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


-- 2016-04-22 08:54:52
