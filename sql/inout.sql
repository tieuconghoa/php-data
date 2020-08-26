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

 Date: 26/08/2020 17:16:14
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for action
-- ----------------------------
DROP TABLE IF EXISTS `action`;
CREATE TABLE `action`  (
  `action_id` int(11) NOT NULL,
  `capacity_id` int(11) NOT NULL,
  `action_value` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY USING BTREE (`action_id`, `capacity_id`),
  INDEX `capacity_id` USING BTREE(`capacity_id`),
  INDEX `action_id` USING BTREE(`action_id`)
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
  `capacity_id` int(11) NOT NULL AUTO_INCREMENT,
  `capacity_value` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY USING BTREE (`capacity_id`),
  CONSTRAINT `fk_1` FOREIGN KEY (`capacity_id`) REFERENCES `action` (`action_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = 'InnoDB free: 4096 kB; (`capacity_id`) REFER `inout/action`(`action_id`)' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of capacity
-- ----------------------------
INSERT INTO `capacity` VALUES (1, 'hoc tap tu chu');
INSERT INTO `capacity` VALUES (2, 'nang luc giao tiep');

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class`  (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY USING BTREE (`class_id`)
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES (1, 'DEV1');
INSERT INTO `class` VALUES (2, 'DEV2');
INSERT INTO `class` VALUES (3, 'DEV3');
INSERT INTO `class` VALUES (4, 'DEV4');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `student_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_class_id` int(11) NOT NULL,
  `student_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `student_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY USING BTREE (`student_id`, `student_class_id`),
  INDEX `student_id` USING BTREE(`student_id`),
  INDEX `student_class_id` USING BTREE(`student_class_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (1, 1, 'hoa', 'tieu');
INSERT INTO `student` VALUES (2, 2, 'ASSAS', 'aaa');
INSERT INTO `student` VALUES (3, 3, 'ASSAS', 'Hungyen');

-- ----------------------------
-- Table structure for student_action
-- ----------------------------
DROP TABLE IF EXISTS `student_action`;
CREATE TABLE `student_action`  (
  `student_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `action_point` int(1) NOT NULL,
  PRIMARY KEY USING BTREE (`student_id`, `action_id`),
  INDEX `action_id` USING BTREE(`action_id`)
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of student_action
-- ----------------------------
INSERT INTO `student_action` VALUES (1, 1, 1);
INSERT INTO `student_action` VALUES (1, 2, 1);
INSERT INTO `student_action` VALUES (1, 3, 1);
INSERT INTO `student_action` VALUES (1, 4, 1);
INSERT INTO `student_action` VALUES (1, 5, 2);
INSERT INTO `student_action` VALUES (1, 6, 1);
INSERT INTO `student_action` VALUES (1, 7, 1);
INSERT INTO `student_action` VALUES (1, 8, 1);
INSERT INTO `student_action` VALUES (1, 9, 1);
INSERT INTO `student_action` VALUES (1, 10, 3);
INSERT INTO `student_action` VALUES (1, 11, 1);
INSERT INTO `student_action` VALUES (1, 12, 1);
INSERT INTO `student_action` VALUES (1, 13, 1);
INSERT INTO `student_action` VALUES (1, 14, 1);
INSERT INTO `student_action` VALUES (1, 15, 1);
INSERT INTO `student_action` VALUES (1, 16, 1);
INSERT INTO `student_action` VALUES (1, 17, 1);
INSERT INTO `student_action` VALUES (1, 18, 1);
INSERT INTO `student_action` VALUES (1, 19, 1);
INSERT INTO `student_action` VALUES (2, 1, 1);
INSERT INTO `student_action` VALUES (2, 2, 1);
INSERT INTO `student_action` VALUES (2, 3, 1);
INSERT INTO `student_action` VALUES (2, 4, 1);
INSERT INTO `student_action` VALUES (2, 5, 1);
INSERT INTO `student_action` VALUES (2, 6, 1);
INSERT INTO `student_action` VALUES (2, 7, 1);
INSERT INTO `student_action` VALUES (2, 8, 1);
INSERT INTO `student_action` VALUES (2, 9, 1);
INSERT INTO `student_action` VALUES (2, 10, 1);
INSERT INTO `student_action` VALUES (2, 11, 1);
INSERT INTO `student_action` VALUES (2, 12, 1);
INSERT INTO `student_action` VALUES (2, 13, 1);
INSERT INTO `student_action` VALUES (2, 14, 1);
INSERT INTO `student_action` VALUES (2, 15, 1);
INSERT INTO `student_action` VALUES (2, 16, 1);
INSERT INTO `student_action` VALUES (2, 17, 1);
INSERT INTO `student_action` VALUES (2, 18, 1);
INSERT INTO `student_action` VALUES (2, 19, 1);
INSERT INTO `student_action` VALUES (3, 1, 1);
INSERT INTO `student_action` VALUES (3, 2, 1);
INSERT INTO `student_action` VALUES (3, 3, 1);
INSERT INTO `student_action` VALUES (3, 4, 1);
INSERT INTO `student_action` VALUES (3, 5, 1);
INSERT INTO `student_action` VALUES (3, 6, 1);
INSERT INTO `student_action` VALUES (3, 7, 1);
INSERT INTO `student_action` VALUES (3, 8, 1);
INSERT INTO `student_action` VALUES (3, 9, 1);
INSERT INTO `student_action` VALUES (3, 10, 1);
INSERT INTO `student_action` VALUES (3, 11, 1);
INSERT INTO `student_action` VALUES (3, 12, 1);
INSERT INTO `student_action` VALUES (3, 13, 1);
INSERT INTO `student_action` VALUES (3, 14, 1);
INSERT INTO `student_action` VALUES (3, 15, 1);
INSERT INTO `student_action` VALUES (3, 16, 1);
INSERT INTO `student_action` VALUES (3, 17, 1);
INSERT INTO `student_action` VALUES (3, 18, 1);
INSERT INTO `student_action` VALUES (3, 19, 1);

SET FOREIGN_KEY_CHECKS = 1;
