/*
Navicat MySQL Data Transfer

Source Server         : 本地mysql
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : vocation

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2016-08-05 19:39:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `details`
-- ----------------------------
DROP TABLE IF EXISTS `details`;
CREATE TABLE `details` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `rid` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL,
  `stime` datetime NOT NULL,
  `etime` datetime DEFAULT NULL,
  `num` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `depart` varchar(50) NOT NULL,
  `historyname` varchar(100) DEFAULT NULL,
  `record` varchar(1000) DEFAULT NULL,
  `nowname` varchar(50) DEFAULT NULL,
  `ctime` varchar(50) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `astime` datetime DEFAULT NULL,
  `aetime` datetime DEFAULT NULL,
  `days` float(10,1) NOT NULL,
  `reason` text,
  `pic` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of details
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `year_vocations` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', '周希', '10');
INSERT INTO `users` VALUES ('3', '张行林', '10');
INSERT INTO `users` VALUES ('4', '梁星', '10');
INSERT INTO `users` VALUES ('5', '洪亮', '10');
INSERT INTO `users` VALUES ('6', '李然', '10');
INSERT INTO `users` VALUES ('7', '乐嘉栋', '10');
INSERT INTO `users` VALUES ('8', '罗赛', '10');
INSERT INTO `users` VALUES ('9', '周嘉伟', '10');
INSERT INTO `users` VALUES ('10', '杨㛃', '10');
INSERT INTO `users` VALUES ('11', '曹萍', '10');
INSERT INTO `users` VALUES ('12', '高继成', '10');
INSERT INTO `users` VALUES ('13', '王悦', '10');
INSERT INTO `users` VALUES ('14', '吴弈', '10');
INSERT INTO `users` VALUES ('15', '谭小明', '10');
INSERT INTO `users` VALUES ('16', '朱翔', '10');
INSERT INTO `users` VALUES ('17', '陈勇男', '10');
INSERT INTO `users` VALUES ('18', '丁载悦', '10');
INSERT INTO `users` VALUES ('19', '林书美', '10');
INSERT INTO `users` VALUES ('20', '卢沪生', '10');
INSERT INTO `users` VALUES ('21', '沈吉', '10');
INSERT INTO `users` VALUES ('22', '翁蓓蓓', '10');
INSERT INTO `users` VALUES ('23', '陈金金', '10');
INSERT INTO `users` VALUES ('24', '钱立', '10');
INSERT INTO `users` VALUES ('25', '孙益维', '10');
INSERT INTO `users` VALUES ('26', '练凤燕', '10');
INSERT INTO `users` VALUES ('27', '由龙', '10');
INSERT INTO `users` VALUES ('28', '向东川', '10');
INSERT INTO `users` VALUES ('30', '刘耸', '10');
