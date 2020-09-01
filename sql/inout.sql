/*
 Navicat Premium Data Transfer

 Source Server         : Mysql-local
 Source Server Type    : MySQL
 Source Server Version : 50045
 Source Host           : localhost:3306
 Source Schema         : inout

 Target Server Type    : MySQL
 Target Server Version : 50045
 File Encoding         : 65001

 Date: 01/09/2020 10:12:02
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES (1, 'admin', 'admin', '1');
INSERT INTO `account` VALUES (2, 'admin1', 'admin1', '2');
INSERT INTO `account` VALUES (3, 'tieuconghoa', '1', '1');

-- ----------------------------
-- Table structure for account_role
-- ----------------------------
DROP TABLE IF EXISTS `account_role`;
CREATE TABLE `account_role`  (
  `id` int(11) NOT NULL DEFAULT '',
  `role` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id`)
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of account_role
-- ----------------------------
INSERT INTO `account_role` VALUES (1, '{\"students\":[\"list\"],\"classes\":[\"list\",\"add\"],\"action\":[\"add\"],\"capacity\":[\"add\"],\"capacity_component\":[\"add\"]}');
INSERT INTO `account_role` VALUES (2, '{\"students\":[\"add\"]}');

-- ----------------------------
-- Table structure for action
-- ----------------------------
DROP TABLE IF EXISTS `action`;
CREATE TABLE `action`  (
  `action_id` int(11) NOT NULL DEFAULT '',
  `capacity_component_id` int(11) NOT NULL DEFAULT '',
  `action_value` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  PRIMARY KEY USING BTREE (`action_id`, `capacity_component_id`),
  INDEX `capacity_id` USING BTREE(`capacity_component_id`),
  INDEX `action_id` USING BTREE(`action_id`)
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of action
-- ----------------------------
INSERT INTO `action` VALUES (1, 1, 'action 1');
INSERT INTO `action` VALUES (2, 1, 'action 2');
INSERT INTO `action` VALUES (3, 1, 'action 3');
INSERT INTO `action` VALUES (4, 1, 'action 4');
INSERT INTO `action` VALUES (5, 1, 'action 5');
INSERT INTO `action` VALUES (6, 1, 'action 6');
INSERT INTO `action` VALUES (7, 1, 'action 7');
INSERT INTO `action` VALUES (8, 1, 'action 8');
INSERT INTO `action` VALUES (9, 1, 'action 9');
INSERT INTO `action` VALUES (10, 1, 'action 10');
INSERT INTO `action` VALUES (11, 2, 'action 11');
INSERT INTO `action` VALUES (12, 2, 'action 12');
INSERT INTO `action` VALUES (13, 2, 'action 13');
INSERT INTO `action` VALUES (14, 2, 'action 14');
INSERT INTO `action` VALUES (15, 2, 'action 15');
INSERT INTO `action` VALUES (16, 2, 'action 16');
INSERT INTO `action` VALUES (17, 2, 'action 17');
INSERT INTO `action` VALUES (18, 2, 'action 18');
INSERT INTO `action` VALUES (19, 2, 'action 19');

-- ----------------------------
-- Table structure for capacity
-- ----------------------------
DROP TABLE IF EXISTS `capacity`;
CREATE TABLE `capacity`  (
  `capacity_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `capacity_value` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY USING BTREE (`capacity_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of capacity
-- ----------------------------
INSERT INTO `capacity` VALUES (1, 'hoc tap tu chu');
INSERT INTO `capacity` VALUES (2, 'nang luc giao tiep');

-- ----------------------------
-- Table structure for capacity_component
-- ----------------------------
DROP TABLE IF EXISTS `capacity_component`;
CREATE TABLE `capacity_component`  (
  `id` int(11) NOT NULL DEFAULT '' AUTO_INCREMENT,
  `capacity_id` int(11) NULL DEFAULT NULL,
  `capacity_component_value` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of capacity_component
-- ----------------------------
INSERT INTO `capacity_component` VALUES (1, 1, 'tu dat muc tieu');
INSERT INTO `capacity_component` VALUES (2, 1, 'danh gia ban than');

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class`  (
  `class_id` int(11) NOT NULL DEFAULT '',
  `class_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY USING BTREE (`class_id`)
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES (1, 'DEV1');
INSERT INTO `class` VALUES (2, 'DEV2');
INSERT INTO `class` VALUES (3, 'DEV3');
INSERT INTO `class` VALUES (4, 'DEV4');
INSERT INTO `class` VALUES (5, 'K61T');
INSERT INTO `class` VALUES (6, 'K61CAC');
INSERT INTO `class` VALUES (7, 'K61CAC');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `student_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_class_id` int(11) NOT NULL DEFAULT '',
  `student_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `student_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `student_birthday` date NULL DEFAULT NULL,
  PRIMARY KEY USING BTREE (`student_id`, `student_class_id`),
  INDEX `student_id` USING BTREE(`student_id`),
  INDEX `student_class_id` USING BTREE(`student_class_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (1, 3, 'Thoa Doan', 'Hungyen', '2020-08-31');
INSERT INTO `student` VALUES (2, 2, 'Thoa Doan', 'Hungyen', '2020-08-31');
INSERT INTO `student` VALUES (3, 3, 'ASSAS', 'aaa', '2020-08-31');
INSERT INTO `student` VALUES (4, 1, 'aaa', 'Hungyen', '2020-08-31');
INSERT INTO `student` VALUES (5, 3, '2020-07-30', 'Hungyen', NULL);
INSERT INTO `student` VALUES (6, 5, 'Thoa Doan', 'Hungyen', NULL);
INSERT INTO `student` VALUES (7, 3, 'Thoa Doan', 'aaa', NULL);
INSERT INTO `student` VALUES (8, 3, 'Thoa Doan', 'Hungyen', '2020-08-26');
INSERT INTO `student` VALUES (9, 3, 'Thoa Doan', 'Hungyen', '2020-08-26');
INSERT INTO `student` VALUES (10, 4, 'Thoa Doan', 'Hungyen', '2016-02-10');
INSERT INTO `student` VALUES (11, 5, 'Thoa Doan', 'Hungyen', '2020-07-29');
INSERT INTO `student` VALUES (12, 5, 'hoa', 'Hai duong', '1998-03-19');
INSERT INTO `student` VALUES (13, 3, 'Thoa Doan', 'Hungyen', '2020-09-25');

-- ----------------------------
-- Table structure for student_action
-- ----------------------------
DROP TABLE IF EXISTS `student_action`;
CREATE TABLE `student_action`  (
  `student_id` int(11) NOT NULL DEFAULT '',
  `action_id` int(11) NOT NULL DEFAULT '',
  `action_point` int(1) NOT NULL DEFAULT '',
  PRIMARY KEY USING BTREE (`student_id`, `action_id`),
  INDEX `action_id` USING BTREE(`action_id`)
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of student_action
-- ----------------------------
INSERT INTO `student_action` VALUES (1, 1, 1);
INSERT INTO `student_action` VALUES (1, 2, 1);
INSERT INTO `student_action` VALUES (1, 3, 1);
INSERT INTO `student_action` VALUES (1, 4, 1);
INSERT INTO `student_action` VALUES (1, 5, 1);
INSERT INTO `student_action` VALUES (1, 6, 1);
INSERT INTO `student_action` VALUES (1, 7, 1);
INSERT INTO `student_action` VALUES (1, 8, 1);
INSERT INTO `student_action` VALUES (1, 9, 1);
INSERT INTO `student_action` VALUES (1, 10, 1);
INSERT INTO `student_action` VALUES (1, 11, 1);
INSERT INTO `student_action` VALUES (1, 12, 1);
INSERT INTO `student_action` VALUES (1, 13, 1);
INSERT INTO `student_action` VALUES (1, 14, 1);
INSERT INTO `student_action` VALUES (1, 15, 1);
INSERT INTO `student_action` VALUES (1, 16, 1);
INSERT INTO `student_action` VALUES (1, 17, 1);
INSERT INTO `student_action` VALUES (1, 18, 1);
INSERT INTO `student_action` VALUES (1, 19, 1);
INSERT INTO `student_action` VALUES (2, 1, 3);
INSERT INTO `student_action` VALUES (2, 2, 3);
INSERT INTO `student_action` VALUES (2, 3, 3);
INSERT INTO `student_action` VALUES (2, 4, 3);
INSERT INTO `student_action` VALUES (2, 5, 3);
INSERT INTO `student_action` VALUES (2, 6, 3);
INSERT INTO `student_action` VALUES (2, 7, 3);
INSERT INTO `student_action` VALUES (2, 8, 3);
INSERT INTO `student_action` VALUES (2, 9, 3);
INSERT INTO `student_action` VALUES (2, 10, 3);
INSERT INTO `student_action` VALUES (2, 11, 1);
INSERT INTO `student_action` VALUES (2, 12, 1);
INSERT INTO `student_action` VALUES (2, 13, 1);
INSERT INTO `student_action` VALUES (2, 14, 1);
INSERT INTO `student_action` VALUES (2, 15, 1);
INSERT INTO `student_action` VALUES (2, 16, 1);
INSERT INTO `student_action` VALUES (2, 17, 1);
INSERT INTO `student_action` VALUES (2, 18, 1);
INSERT INTO `student_action` VALUES (2, 19, 1);
INSERT INTO `student_action` VALUES (3, 1, 5);
INSERT INTO `student_action` VALUES (3, 2, 5);
INSERT INTO `student_action` VALUES (3, 3, 5);
INSERT INTO `student_action` VALUES (3, 4, 5);
INSERT INTO `student_action` VALUES (3, 5, 5);
INSERT INTO `student_action` VALUES (3, 6, 5);
INSERT INTO `student_action` VALUES (3, 7, 5);
INSERT INTO `student_action` VALUES (3, 8, 5);
INSERT INTO `student_action` VALUES (3, 9, 5);
INSERT INTO `student_action` VALUES (3, 10, 5);
INSERT INTO `student_action` VALUES (3, 11, 5);
INSERT INTO `student_action` VALUES (3, 12, 5);
INSERT INTO `student_action` VALUES (3, 13, 5);
INSERT INTO `student_action` VALUES (3, 14, 5);
INSERT INTO `student_action` VALUES (3, 15, 5);
INSERT INTO `student_action` VALUES (3, 16, 5);
INSERT INTO `student_action` VALUES (3, 17, 5);
INSERT INTO `student_action` VALUES (3, 18, 5);
INSERT INTO `student_action` VALUES (3, 19, 5);
INSERT INTO `student_action` VALUES (4, 1, 1);
INSERT INTO `student_action` VALUES (4, 2, 1);
INSERT INTO `student_action` VALUES (4, 3, 1);
INSERT INTO `student_action` VALUES (4, 4, 1);
INSERT INTO `student_action` VALUES (4, 5, 1);
INSERT INTO `student_action` VALUES (4, 6, 1);
INSERT INTO `student_action` VALUES (4, 7, 1);
INSERT INTO `student_action` VALUES (4, 8, 1);
INSERT INTO `student_action` VALUES (4, 9, 1);
INSERT INTO `student_action` VALUES (4, 10, 1);
INSERT INTO `student_action` VALUES (4, 11, 1);
INSERT INTO `student_action` VALUES (4, 12, 1);
INSERT INTO `student_action` VALUES (4, 13, 1);
INSERT INTO `student_action` VALUES (4, 14, 1);
INSERT INTO `student_action` VALUES (4, 15, 1);
INSERT INTO `student_action` VALUES (4, 16, 1);
INSERT INTO `student_action` VALUES (4, 17, 1);
INSERT INTO `student_action` VALUES (4, 18, 1);
INSERT INTO `student_action` VALUES (4, 19, 1);
INSERT INTO `student_action` VALUES (5, 1, 1);
INSERT INTO `student_action` VALUES (5, 2, 1);
INSERT INTO `student_action` VALUES (5, 3, 1);
INSERT INTO `student_action` VALUES (5, 4, 1);
INSERT INTO `student_action` VALUES (5, 5, 1);
INSERT INTO `student_action` VALUES (5, 6, 1);
INSERT INTO `student_action` VALUES (5, 7, 1);
INSERT INTO `student_action` VALUES (5, 8, 1);
INSERT INTO `student_action` VALUES (5, 9, 1);
INSERT INTO `student_action` VALUES (5, 10, 1);
INSERT INTO `student_action` VALUES (5, 11, 1);
INSERT INTO `student_action` VALUES (5, 12, 1);
INSERT INTO `student_action` VALUES (5, 13, 1);
INSERT INTO `student_action` VALUES (5, 14, 1);
INSERT INTO `student_action` VALUES (5, 15, 1);
INSERT INTO `student_action` VALUES (5, 16, 1);
INSERT INTO `student_action` VALUES (5, 17, 1);
INSERT INTO `student_action` VALUES (5, 18, 1);
INSERT INTO `student_action` VALUES (5, 19, 1);
INSERT INTO `student_action` VALUES (6, 1, 5);
INSERT INTO `student_action` VALUES (6, 2, 5);
INSERT INTO `student_action` VALUES (6, 3, 5);
INSERT INTO `student_action` VALUES (6, 4, 5);
INSERT INTO `student_action` VALUES (6, 5, 5);
INSERT INTO `student_action` VALUES (6, 6, 5);
INSERT INTO `student_action` VALUES (6, 7, 5);
INSERT INTO `student_action` VALUES (6, 8, 5);
INSERT INTO `student_action` VALUES (6, 9, 5);
INSERT INTO `student_action` VALUES (6, 10, 5);
INSERT INTO `student_action` VALUES (6, 11, 5);
INSERT INTO `student_action` VALUES (6, 12, 5);
INSERT INTO `student_action` VALUES (6, 13, 5);
INSERT INTO `student_action` VALUES (6, 14, 5);
INSERT INTO `student_action` VALUES (6, 15, 5);
INSERT INTO `student_action` VALUES (6, 16, 5);
INSERT INTO `student_action` VALUES (6, 17, 5);
INSERT INTO `student_action` VALUES (6, 18, 5);
INSERT INTO `student_action` VALUES (6, 19, 5);
INSERT INTO `student_action` VALUES (7, 1, 1);
INSERT INTO `student_action` VALUES (7, 2, 1);
INSERT INTO `student_action` VALUES (7, 3, 1);
INSERT INTO `student_action` VALUES (7, 4, 1);
INSERT INTO `student_action` VALUES (7, 5, 1);
INSERT INTO `student_action` VALUES (7, 6, 1);
INSERT INTO `student_action` VALUES (7, 7, 1);
INSERT INTO `student_action` VALUES (7, 8, 1);
INSERT INTO `student_action` VALUES (7, 9, 1);
INSERT INTO `student_action` VALUES (7, 10, 1);
INSERT INTO `student_action` VALUES (7, 11, 1);
INSERT INTO `student_action` VALUES (7, 12, 1);
INSERT INTO `student_action` VALUES (7, 13, 1);
INSERT INTO `student_action` VALUES (7, 14, 1);
INSERT INTO `student_action` VALUES (7, 15, 1);
INSERT INTO `student_action` VALUES (7, 16, 1);
INSERT INTO `student_action` VALUES (7, 17, 1);
INSERT INTO `student_action` VALUES (7, 18, 1);
INSERT INTO `student_action` VALUES (7, 19, 1);
INSERT INTO `student_action` VALUES (8, 1, 1);
INSERT INTO `student_action` VALUES (8, 2, 1);
INSERT INTO `student_action` VALUES (8, 3, 1);
INSERT INTO `student_action` VALUES (8, 4, 1);
INSERT INTO `student_action` VALUES (8, 5, 1);
INSERT INTO `student_action` VALUES (8, 6, 1);
INSERT INTO `student_action` VALUES (8, 7, 1);
INSERT INTO `student_action` VALUES (8, 8, 1);
INSERT INTO `student_action` VALUES (8, 9, 1);
INSERT INTO `student_action` VALUES (8, 10, 1);
INSERT INTO `student_action` VALUES (8, 11, 1);
INSERT INTO `student_action` VALUES (8, 12, 1);
INSERT INTO `student_action` VALUES (8, 13, 1);
INSERT INTO `student_action` VALUES (8, 14, 1);
INSERT INTO `student_action` VALUES (8, 15, 1);
INSERT INTO `student_action` VALUES (8, 16, 1);
INSERT INTO `student_action` VALUES (8, 17, 1);
INSERT INTO `student_action` VALUES (8, 18, 1);
INSERT INTO `student_action` VALUES (8, 19, 1);
INSERT INTO `student_action` VALUES (10, 1, 1);
INSERT INTO `student_action` VALUES (10, 2, 1);
INSERT INTO `student_action` VALUES (10, 3, 1);
INSERT INTO `student_action` VALUES (10, 4, 1);
INSERT INTO `student_action` VALUES (10, 5, 1);
INSERT INTO `student_action` VALUES (10, 6, 1);
INSERT INTO `student_action` VALUES (10, 7, 1);
INSERT INTO `student_action` VALUES (10, 8, 1);
INSERT INTO `student_action` VALUES (10, 9, 1);
INSERT INTO `student_action` VALUES (10, 10, 1);
INSERT INTO `student_action` VALUES (10, 11, 1);
INSERT INTO `student_action` VALUES (10, 12, 1);
INSERT INTO `student_action` VALUES (10, 13, 1);
INSERT INTO `student_action` VALUES (10, 14, 1);
INSERT INTO `student_action` VALUES (10, 15, 1);
INSERT INTO `student_action` VALUES (10, 16, 1);
INSERT INTO `student_action` VALUES (10, 17, 1);
INSERT INTO `student_action` VALUES (10, 18, 1);
INSERT INTO `student_action` VALUES (10, 19, 1);
INSERT INTO `student_action` VALUES (11, 1, 1);
INSERT INTO `student_action` VALUES (11, 2, 1);
INSERT INTO `student_action` VALUES (11, 3, 1);
INSERT INTO `student_action` VALUES (11, 4, 1);
INSERT INTO `student_action` VALUES (11, 5, 1);
INSERT INTO `student_action` VALUES (11, 6, 1);
INSERT INTO `student_action` VALUES (11, 7, 1);
INSERT INTO `student_action` VALUES (11, 8, 1);
INSERT INTO `student_action` VALUES (11, 9, 1);
INSERT INTO `student_action` VALUES (11, 10, 1);
INSERT INTO `student_action` VALUES (11, 11, 1);
INSERT INTO `student_action` VALUES (11, 12, 1);
INSERT INTO `student_action` VALUES (11, 13, 1);
INSERT INTO `student_action` VALUES (11, 14, 1);
INSERT INTO `student_action` VALUES (11, 15, 1);
INSERT INTO `student_action` VALUES (11, 16, 1);
INSERT INTO `student_action` VALUES (11, 17, 1);
INSERT INTO `student_action` VALUES (11, 18, 1);
INSERT INTO `student_action` VALUES (11, 19, 1);
INSERT INTO `student_action` VALUES (12, 1, 1);
INSERT INTO `student_action` VALUES (12, 2, 1);
INSERT INTO `student_action` VALUES (12, 3, 1);
INSERT INTO `student_action` VALUES (12, 4, 1);
INSERT INTO `student_action` VALUES (12, 5, 1);
INSERT INTO `student_action` VALUES (12, 6, 1);
INSERT INTO `student_action` VALUES (12, 7, 1);
INSERT INTO `student_action` VALUES (12, 8, 1);
INSERT INTO `student_action` VALUES (12, 9, 1);
INSERT INTO `student_action` VALUES (12, 10, 1);
INSERT INTO `student_action` VALUES (12, 11, 1);
INSERT INTO `student_action` VALUES (12, 12, 1);
INSERT INTO `student_action` VALUES (12, 13, 1);
INSERT INTO `student_action` VALUES (12, 14, 1);
INSERT INTO `student_action` VALUES (12, 15, 1);
INSERT INTO `student_action` VALUES (12, 16, 1);
INSERT INTO `student_action` VALUES (12, 17, 1);
INSERT INTO `student_action` VALUES (12, 18, 1);
INSERT INTO `student_action` VALUES (12, 19, 1);
INSERT INTO `student_action` VALUES (13, 1, 3);
INSERT INTO `student_action` VALUES (13, 2, 3);
INSERT INTO `student_action` VALUES (13, 3, 3);
INSERT INTO `student_action` VALUES (13, 4, 3);
INSERT INTO `student_action` VALUES (13, 5, 3);
INSERT INTO `student_action` VALUES (13, 6, 3);
INSERT INTO `student_action` VALUES (13, 7, 3);
INSERT INTO `student_action` VALUES (13, 8, 3);
INSERT INTO `student_action` VALUES (13, 9, 3);
INSERT INTO `student_action` VALUES (13, 10, 3);
INSERT INTO `student_action` VALUES (13, 11, 1);
INSERT INTO `student_action` VALUES (13, 12, 1);
INSERT INTO `student_action` VALUES (13, 13, 1);
INSERT INTO `student_action` VALUES (13, 14, 1);
INSERT INTO `student_action` VALUES (13, 15, 1);
INSERT INTO `student_action` VALUES (13, 16, 1);
INSERT INTO `student_action` VALUES (13, 17, 1);
INSERT INTO `student_action` VALUES (13, 18, 1);
INSERT INTO `student_action` VALUES (13, 19, 1);

SET FOREIGN_KEY_CHECKS = 1;
