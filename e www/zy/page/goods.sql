/*
Navicat MySQL Data Transfer

Source Server         : 本地服务器
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-09-14 21:15:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(50) NOT NULL DEFAULT '0',
  `goodsimg` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '小米2', '1.jpg');
INSERT INTO `goods` VALUES ('2', '小米3', '3.jpg');
INSERT INTO `goods` VALUES ('3', '小米4', '2.jpg');
INSERT INTO `goods` VALUES ('4', '小米3', '4.jpg');
INSERT INTO `goods` VALUES ('5', '小米43', '5.jpg');
INSERT INTO `goods` VALUES ('6', '小米33', '6.jpg');
INSERT INTO `goods` VALUES ('7', '小米4', '7.jpg');
INSERT INTO `goods` VALUES ('8', '小米3', '8.jpg');
INSERT INTO `goods` VALUES ('9', '小米4', '9.jpg');
INSERT INTO `goods` VALUES ('10', '小米3', '10.jpg');
INSERT INTO `goods` VALUES ('11', '小米6', '9.jpg');
INSERT INTO `goods` VALUES ('12', '小米33', '10.jpg');
INSERT INTO `goods` VALUES ('13', '小米44', '11.jpg');
INSERT INTO `goods` VALUES ('14', '小米3', '12.jpg');
INSERT INTO `goods` VALUES ('15', '小米4', '13.jpg');
INSERT INTO `goods` VALUES ('16', '小米3', '14.jpg');
INSERT INTO `goods` VALUES ('17', '小米6', '15.jpg');
INSERT INTO `goods` VALUES ('18', '小米33', '16.jpg');
INSERT INTO `goods` VALUES ('19', '小米44', '11.jpg');
INSERT INTO `goods` VALUES ('20', '小米3', '14.jpg');
INSERT INTO `goods` VALUES ('21', '小米4', '12.jpg');
INSERT INTO `goods` VALUES ('22', '小米3', '14.jpg');
INSERT INTO `goods` VALUES ('23', '小米6', '12.jpg');
INSERT INTO `goods` VALUES ('24', '小米33', '14.jpg');
INSERT INTO `goods` VALUES ('25', '小米44', '14.jpg');
INSERT INTO `goods` VALUES ('26', '小米3', '11.jpg');
INSERT INTO `goods` VALUES ('27', '小米4', '10.jpg');
INSERT INTO `goods` VALUES ('28', '小米3', '9.jpg');
INSERT INTO `goods` VALUES ('29', '小米7', '12.jpg');
INSERT INTO `goods` VALUES ('30', '小米33', '13.jpg');
INSERT INTO `goods` VALUES ('31', '小米44', '12.jpg');
INSERT INTO `goods` VALUES ('32', '小米3', '12.jpg');
INSERT INTO `goods` VALUES ('33', '小米4', '10.jpg');
INSERT INTO `goods` VALUES ('34', '小米3', '10.jpg');
