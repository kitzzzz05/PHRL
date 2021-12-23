

CREATE TABLE `adminschedule` (
  `scheduleId` int(10) NOT NULL AUTO_INCREMENT,
  `scheduleDate` date NOT NULL,
  `scheduleDay` varchar(250) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `bookAvail` char(250) NOT NULL,
  PRIMARY KEY (`scheduleId`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

INSERT INTO adminschedule VALUES("61","2021-12-22","Wednesday","08:30:00","11:30:00","notAvail");
INSERT INTO adminschedule VALUES("62","2021-12-30","Thursday","11:11:00","12:12:00","notavail");
INSERT INTO adminschedule VALUES("63","2021-12-23","Thursday","09:00:00","13:00:00","notAvail");



CREATE TABLE `appointment` (
  `appId` int(10) NOT NULL AUTO_INCREMENT,
  `userIc` int(10) NOT NULL,
  `scheduleId` int(10) NOT NULL,
  `services` varchar(250) NOT NULL,
  `appComment` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `color` varchar(200) NOT NULL,
  `payment` varchar(250) NOT NULL,
  PRIMARY KEY (`appId`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;

INSERT INTO appointment VALUES("54","17","61","HEADSET CLEARING","","Processing","2021-12-22 08:30:00","2021-12-22 11:30:00","#0071c5","");
INSERT INTO appointment VALUES("55","17","62","DarienKim","tete","Pending for Approval","2021-12-30 11:11:00","2021-12-30 12:12:00","","upload/prof disc_1640059218.jpg");
INSERT INTO appointment VALUES("56","17","63","Janley Services","","Processing","2021-12-23 09:00:00","2021-12-23 13:00:00","#FF8C00","");



CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO category VALUES("11","Tires");
INSERT INTO category VALUES("12","Handle bar");



CREATE TABLE `customer` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO customer VALUES("17","Kitz Suizo","Blk 98 Lot 11 Bayanan Bacoor Cavite","09070685375","123@gmail.com","202cb962ac59075b964b07152d234b70","1995-02-21");



CREATE TABLE `dummy_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `barcode_id` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

INSERT INTO dummy_cart VALUES("40","49","X Tires","500","1","");



CREATE TABLE `inventory` (
  `inventoryid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `inventory_date` datetime NOT NULL,
  PRIMARY KEY (`inventoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

INSERT INTO inventory VALUES("64","1","Add Product","49","0","2021-12-13 21:18:59");
INSERT INTO inventory VALUES("65","1","Update Stock","49","60","2021-12-13 21:19:33");
INSERT INTO inventory VALUES("66","1","Add Product","50","0","2021-12-21 10:53:04");



CREATE TABLE `post` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `post_title` text DEFAULT NULL,
  `post_description` text DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `post_image` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO post VALUES("1","test","test","test","2021-12-21 09:02:58","");



CREATE TABLE `product` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) NOT NULL,
  `barcode_id` varchar(25) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` double NOT NULL,
  `price` int(10) NOT NULL,
  `product_qty` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `supplierid` int(11) NOT NULL,
  `date` date NOT NULL,
  `about` varchar(250) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

INSERT INTO product VALUES("49","11","6477128698","X Tires","500","400","60","","5","2021-12-13","New Tires Soft and Comfy");
INSERT INTO product VALUES("50","12","","Test","1","0","0","","5","2021-12-21","1");



CREATE TABLE `purchase` (
  `purcase_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `subtotal` int(25) NOT NULL,
  `purchase_quantity` int(11) NOT NULL,
  PRIMARY KEY (`purcase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

INSERT INTO purchase VALUES("59","49","2021-12-21","2000","5");



CREATE TABLE `purchase_final` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_purchase` int(11) NOT NULL,
  `quantity_purchase` int(11) NOT NULL,
  `date` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO purchase_final VALUES("2","58","49","24000","60","2021-12-13","5");



CREATE TABLE `sales` (
  `salesid` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `sales_total` double NOT NULL,
  `sales_date` datetime NOT NULL,
  `sales_type` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  PRIMARY KEY (`salesid`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;




CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `services` varchar(250) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO services VALUES("2","DarienKim","1235");
INSERT INTO services VALUES("3","Janley Services","1000");



CREATE TABLE `supplier` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(150) NOT NULL,
  `contact` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO supplier VALUES("5","New Tires Corp.","Blk 98 lot 11 bayanan bacoor Cavite","09650620136");



CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` int(1) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `contact` bigint(15) NOT NULL,
  `address` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("1","admin","21232f297a57a5a743894a0e4a801fc3","1","","0","","");

