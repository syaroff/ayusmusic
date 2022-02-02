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

 Date: 02/02/2022 21:03:21
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
  CONSTRAINT `fk_order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasil
-- ----------------------------
INSERT INTO `hasil` VALUES (20, 20, '2022-01-28', 25000);
INSERT INTO `hasil` VALUES (21, 21, '2022-01-31', 0);
INSERT INTO `hasil` VALUES (22, 22, '2022-02-01', 0);

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
  `kode_order` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_order`) USING BTREE,
  INDEX `fk_tiket`(`id_tiket`) USING BTREE,
  CONSTRAINT `fk_tiket` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES (20, 1, 'Budi', '09876443', 1, 25000, 1, '20DnsiIPmSEBuZqpzWNJoeGC9cFjgUYXK8y0');
INSERT INTO `order` VALUES (21, 1, 'Rizki', '09876443', 1, 25000, 0, '');
INSERT INTO `order` VALUES (22, 1, 'Ray', '098766555431', 2, 50000, 0, '');

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
  `jumlah` int NULL DEFAULT NULL,
  `tempat` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id_tiket`) USING BTREE,
  INDEX `fk_wilayah`(`id_wilayah`) USING BTREE,
  CONSTRAINT `fk_wilayah` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tiket
-- ----------------------------
INSERT INTO `tiket` VALUES (1, 1, 'Sabtu Sambat', 'Galau Band', '2022-01-15', '25000', 129, 'Jl.Taman Ayu No.37 ,Mojokerto');
INSERT INTO `tiket` VALUES (2, 1, 'Ambyar Tenan', 'Gugus Ngarep', '2022-01-14', '15000', 100, 'Jl.Taman Ayu No.37 ,Mojokerto');
INSERT INTO `tiket` VALUES (3, 2, 'Ngerock n Roll', 'New Wings', '2022-01-19', '30000', 130, 'Jl.Taman Ayu No.37 ,Mojokerto');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- ----------------------------
-- Table structure for wilayah
-- ----------------------------
DROP TABLE IF EXISTS `wilayah`;
CREATE TABLE `wilayah`  (
  `id_wilayah` int NOT NULL AUTO_INCREMENT,
  `wilayah` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_wilayah`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wilayah
-- ----------------------------
INSERT INTO `wilayah` VALUES (1, 'Mojokerto');
INSERT INTO `wilayah` VALUES (2, 'Sidoarjo');
INSERT INTO `wilayah` VALUES (3, 'Surabaya');

-- ----------------------------
-- View structure for vwtransaksi
-- ----------------------------
DROP VIEW IF EXISTS `vwtransaksi`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vwtransaksi` AS SELECT
	`order`.id_order, 
	`order`.nama_pemesan, 
	tiket.judul_konser, 
	`order`.no_wa, 
	`order`.jumlah_tiket, 
	tiket.harga, 
	`order`.harga AS hatot, 
	`order`.status_order, 
	tiket.id_tiket, 
	`order`.kode_order, 
	tiket.tanggal, 
	tiket.nama_band, 
	tiket.tempat, 
	wilayah.wilayah
FROM
	`order`
	INNER JOIN
	tiket
	ON 
		`order`.id_tiket = tiket.id_tiket
	INNER JOIN
	wilayah
	ON 
		tiket.id_wilayah = wilayah.id_wilayah ;

SET FOREIGN_KEY_CHECKS = 1;
