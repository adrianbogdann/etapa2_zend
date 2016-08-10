-- ----------------------------
-- Table structure for `contacte`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productTitle` varchar(90) NOT NULL,
  `productDesc` text NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productImg` varchar(90) NOT NULL,
  PRIMARY KEY ('productId')
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contacte
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'set pahare', 'set 3 phare cristal', '50', 'image1.jpg');
INSERT INTO `products` VALUES ('2', 'mobila', 'birou+biblioteca lemn', '250', 'image2.jpg');
INSERT INTO `products` VALUES ('2', 'farfurii', 'set 3 farfurii', '100', 'image3.jpg');

