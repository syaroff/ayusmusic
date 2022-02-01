/*
 Navicat Premium Data Transfer

 Source Server         : local_konek
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : ayusmusic

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 11/01/2022 16:57:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for hasil
-- ----------------------------
DROP TABLE IF EXISTS `hasil`;
CREATE TABLE `hasil`  (
  `id_hasil` int NOT NULL AUTO_INCREMENT,
  `id_order` int NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `jumlah_total` decimal(40, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_hasil`) USING BTREE,
  INDEX `fk_order`(`id_order`) USING BTREE,
  CONSTRAINT `fk_order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasil
-- ----------------------------

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `id_order` int NOT NULL AUTO_INCREMENT,
  `id_tiket` int NULL DEFAULT NULL,
  `nama_pemesan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_wa` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jumlah_tiket` int NULL DEFAULT NULL,
  `harga` decimal(32, 0) NULL DEFAULT NULL,
  `status_order` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_order`) USING BTREE,
  INDEX `fk_tiket`(`id_tiket`) USING BTREE,
  CONSTRAINT `fk_tiket` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for tiket
-- ----------------------------
DROP TABLE IF EXISTS `tiket`;
CREATE TABLE `tiket`  (
  `id_tiket` int NOT NULL AUTO_INCREMENT,
  `id_wilayah` int NULL DEFAULT NULL,
  `judul_konser` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama_band` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `harga` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jumlah` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tempat` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id_tiket`) USING BTREE,
  INDEX `fk_wilayah`(`id_wilayah`) USING BTREE,
  CONSTRAINT `fk_wilayah` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tiket
-- ----------------------------
INSERT INTO `tiket` VALUES (1, 1, 'Sabtu Sambat', 'Galau Band', '2022-01-15', '25000', '130', 'Jl.Taman Ayu No.37 ,Mojokerto');
INSERT INTO `tiket` VALUES (2, 1, 'Ambyar Tenan', 'Gugus Ngarep', '2022-01-14', '15000', '100', 'Jl.Taman Ayu No.37 ,Mojokerto');
INSERT INTO `tiket` VALUES (3, 2, 'Ngerock n Roll', 'Adidaksa', '2022-01-19', '30000', '130', 'Jl.Taman Ayu No.37 ,Mojokerto');
INSERT INTO `tiket` VALUES (4, 2, 'Viva Lavida Loca', 'Tom Dean', '2022-01-16', '50000', '200', 'Jl.Taman Ayu No.37 ,Mojokerto');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sandi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for wilayah
-- ----------------------------
DROP TABLE IF EXISTS `wilayah`;
CREATE TABLE `wilayah`  (
  `id_wilayah` int NOT NULL AUTO_INCREMENT,
  `wilayah` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_wilayah`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wilayah
-- ----------------------------
INSERT INTO `wilayah` VALUES (1, 'Mojokerto');
INSERT INTO `wilayah` VALUES (2, 'Sidoarjo');
INSERT INTO `wilayah` VALUES (3, 'Surabaya');

SET FOREIGN_KEY_CHECKS = 1;
