/*
Navicat MySQL Data Transfer

Source Server         : 本地mysql
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : vocation

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2016-08-05 18:17:05
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
  `num` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `depart` varchar(50) NOT NULL,
  `historyname` varchar(100) DEFAULT NULL,
  `record` varchar(1000) DEFAULT NULL,
  `nowname` varchar(50) DEFAULT NULL,
  `ctime` varchar(50) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `astime` datetime DEFAULT NULL,
  `aetime` datetime DEFAULT NULL,
  `days` tinyint(10) NOT NULL,
  `reason` text,
  `pic` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of details
-- ----------------------------
INSERT INTO `details` VALUES ('30', '201608010816000096068', '向东川的请假', '完成', '同意', '2016-08-01 08:16:10', '2016-08-01 10:35:19', '14', '向东川', '后端', '周希', '向东川|提交申请|2016-08-01 08:16:10|提交申请;\n周希|审批|2016-08-01 10:35:19|agree|', '', '2时19分', '年假', '2016-08-01 08:15:00', '2016-08-01 18:30:00', '1', '家中有事，需请假一天', '');
INSERT INTO `details` VALUES ('31', '201608011301000205016', '刘耸的请假', '完成', '同意', '2016-08-01 13:01:20', '2016-08-01 15:11:31', '7', '刘耸', '运维', '李然,洪亮', '刘耸|提交申请|2016-08-01 13:01:20|提交申请;\n李然|审批|2016-08-01 14:40:40|agree|;\n洪亮|审批|2016-08-01 15:11:31|agree|', '', '2时10分', '年假', '2016-08-03 09:00:00', '2016-08-03 18:00:00', '1', '纪念日陪老婆。。。', '');
INSERT INTO `details` VALUES ('32', '201608011830000056038', '丁载悦的请假', '完成', '同意', '2016-08-01 18:30:05', '2016-08-01 18:30:36', '29', '丁载悦', '美术', '由龙', '丁载悦|提交申请|2016-08-01 18:30:05|提交申请;\n由龙|审批|2016-08-01 18:30:36|agree|', '', '', '年假', '2016-08-01 10:00:00', '2016-08-01 14:00:00', '1', '身体不舒服', '');
INSERT INTO `details` VALUES ('33', '201608031748000063021', '曹萍的请假', '完成', '同意', '2016-08-03 17:48:07', '2016-08-03 17:48:31', '23', '曹萍', '经营管理部', '洪亮', '曹萍|提交申请|2016-08-03 17:48:07|提交申请;\n洪亮|审批|2016-08-03 17:48:31|agree|', '', '', '年假', '2016-08-04 10:00:00', '2016-08-04 19:00:00', '1', '朋友有事来上海', '');
INSERT INTO `details` VALUES ('34', '201608041130000183587', '周希的请假', '完成', '同意', '2016-08-04 11:30:19', '2016-08-05 00:41:28', '3', '周希', '后端', '李然,洪亮', '周希|提交申请|2016-08-04 11:30:19|提交申请;\n李然|审批|2016-08-04 23:48:09|agree|;\n洪亮|审批|2016-08-05 00:41:28|agree|', '', '13时11分', '年假', '2016-08-05 14:00:00', '2016-08-05 19:00:00', '1', '回老家', '');
INSERT INTO `details` VALUES ('35', '201608041256000288628', '向东川的请假', '完成', '同意', '2016-08-04 12:56:29', '2016-08-04 12:57:37', '14', '向东川', '后端', '周希', '向东川|提交申请|2016-08-04 12:56:29|提交申请;\n周希|审批|2016-08-04 12:57:37|agree|', '', '1分', '年假', '2016-08-04 09:30:00', '2016-08-05 18:55:00', '2', '家中有事，需请假', '');
INSERT INTO `details` VALUES ('36', '201608042004000191251', '陈金金的请假', '完成', '同意', '2016-08-04 20:04:19', '2016-08-05 12:29:33', '24', '陈金金', '运营', '李然,洪亮', '陈金金|提交申请|2016-08-04 20:04:19|提交申请;\n李然|审批|2016-08-05 12:29:16|agree|;\n洪亮|审批|2016-08-05 12:29:33|agree|', '', '16时25分', '年假', '2016-08-02 09:30:00', '2016-08-02 18:30:00', '2', '家中私事', '');

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
INSERT INTO `users` VALUES ('1', '周希', '10');
INSERT INTO `users` VALUES ('2', '张行林', '10');
INSERT INTO `users` VALUES ('3', '梁星', '10');
INSERT INTO `users` VALUES ('4', '洪亮', '10');
INSERT INTO `users` VALUES ('5', '李然', '10');
INSERT INTO `users` VALUES ('6', '乐嘉栋', '10');
INSERT INTO `users` VALUES ('7', '罗赛', '10');
INSERT INTO `users` VALUES ('8', '周嘉伟', '10');
INSERT INTO `users` VALUES ('9', '杨㛃', '10');
INSERT INTO `users` VALUES ('10', '曹萍', '10');
INSERT INTO `users` VALUES ('11', '高继成', '10');
INSERT INTO `users` VALUES ('12', '王悦', '10');
INSERT INTO `users` VALUES ('13', '吴弈', '10');
INSERT INTO `users` VALUES ('14', '谭小明', '10');
INSERT INTO `users` VALUES ('15', '朱翔', '10');
INSERT INTO `users` VALUES ('16', '陈勇男', '10');
INSERT INTO `users` VALUES ('17', '丁载悦', '10');
INSERT INTO `users` VALUES ('18', '林书美', '10');
INSERT INTO `users` VALUES ('19', '卢沪生', '10');
INSERT INTO `users` VALUES ('20', '沈吉', '10');
INSERT INTO `users` VALUES ('21', '翁蓓蓓', '10');
INSERT INTO `users` VALUES ('22', '陈金金', '10');
INSERT INTO `users` VALUES ('23', '钱立', '10');
INSERT INTO `users` VALUES ('24', '孙益维', '10');
INSERT INTO `users` VALUES ('25', '练凤燕', '10');
INSERT INTO `users` VALUES ('26', '由龙', '10');
INSERT INTO `users` VALUES ('27', '向东川', '10');
INSERT INTO `users` VALUES ('28', '刘耸', '10');
