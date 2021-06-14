/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1 3306
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : webtix

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 13/06/2021 20:57:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bioskop
-- ----------------------------
DROP TABLE IF EXISTS `bioskop`;
CREATE TABLE `bioskop`  (
  `IDBioskop` int NOT NULL AUTO_INCREMENT,
  `NamaBioskop` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Alamat` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `JumlahRuang` int NOT NULL,
  PRIMARY KEY (`IDBioskop`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1003 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bioskop
-- ----------------------------
INSERT INTO `bioskop` VALUES (1, 'Bioskop 21', 'Banda Aceh', 5);
INSERT INTO `bioskop` VALUES (2, 'Bioskop XXI', 'Botani Square', 3);

-- ----------------------------
-- Table structure for film
-- ----------------------------
DROP TABLE IF EXISTS `film`;
CREATE TABLE `film`  (
  `IDFilm` int NOT NULL AUTO_INCREMENT,
  `NamaFilm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Durasi` int NOT NULL,
  `RatingUmur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Sinopsis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `poster` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IDFilm`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of film
-- ----------------------------
INSERT INTO `film` VALUES (1, 'Parasite', 132, '17 Tahun Keatas', 'Keluarga Ki-taek beranggotakan empat orang pengangguran dengan masa depan suram menanti mereka. Suatu hari Ki-woo anak laki-laki tertua direkomendasikan oleh sahabatnya yang merupakan seorang mahasiswa dari universitas bergengsi agar Ki-woo menjadi guru les yang dibayar mahal dan membuka secercah harapan penghasilan tetap. Dengan penuh restu serta harapan besar dari keluarga, Ki-woo menuju ke rumah keluarga Park untuk wawancara. Setibanya di rumah Mr. Park pemilik perusahaan IT global, Ki-woo bertemu dengan Yeon-kyo, wanita muda yang cantik di rumah itu. Setelah pertemuan itu, serangkaian kejadian dimulai.', 'a.jpg');
INSERT INTO `film` VALUES (2, 'Avenger Endgame', 130, 'Semua Umur', 'Film Seru udah nonton aja', '91KArYP03YL._AC_SY741_.jpg');

-- ----------------------------
-- Table structure for jadwal
-- ----------------------------
DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE `jadwal`  (
  `IDJadwal` int NOT NULL AUTO_INCREMENT,
  `IDBioskop` int NOT NULL,
  `IDFilm` int NOT NULL,
  `Ruangan` int NOT NULL,
  `Tanggal` date NOT NULL,
  PRIMARY KEY (`IDJadwal`) USING BTREE,
  INDEX `jadwal_ibfk_1`(`IDBioskop`) USING BTREE,
  INDEX `IDFilm`(`IDFilm`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jadwal
-- ----------------------------
INSERT INTO `jadwal` VALUES (1, 2, 1, 1, '2021-06-13');
INSERT INTO `jadwal` VALUES (2, 2, 2, 2, '2021-06-13');

-- ----------------------------
-- Table structure for laporan
-- ----------------------------
DROP TABLE IF EXISTS `laporan`;
CREATE TABLE `laporan`  (
  `IDLaporan` int NOT NULL AUTO_INCREMENT,
  `IDFilm` int NOT NULL,
  `JumlahPenonton` int NOT NULL,
  PRIMARY KEY (`IDLaporan`) USING BTREE,
  INDEX `IDFilm`(`IDFilm`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laporan
-- ----------------------------

-- ----------------------------
-- Table structure for manager
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager`  (
  `IDManager` int NOT NULL AUTO_INCREMENT,
  `IDUser` int NOT NULL,
  PRIMARY KEY (`IDManager`) USING BTREE,
  INDEX `IDUser`(`IDUser`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of manager
-- ----------------------------

-- ----------------------------
-- Table structure for pemesanan
-- ----------------------------
DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE `pemesanan`  (
  `IDOrder` int NOT NULL AUTO_INCREMENT,
  `IDUser` int NOT NULL,
  `IDFilm` int NOT NULL,
  `IDJadwal` int NOT NULL,
  `Status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TipePembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`IDOrder`) USING BTREE,
  INDEX `pemesanan_ibfk_1`(`IDFilm`) USING BTREE,
  INDEX `pemesanan_ibfk_2`(`IDUser`) USING BTREE,
  INDEX `IDJadwal`(`IDJadwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemesanan
-- ----------------------------
INSERT INTO `pemesanan` VALUES (1, 2, 1, 1, 'Pembayaran selesai di-verifikasi', 'Virtual Account BCA');
INSERT INTO `pemesanan` VALUES (3, 2, 2, 1, 'Pembayaran selesai di-verifikasi', 'Virtual Account BCA');

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff`  (
  `IDStaff` int NOT NULL AUTO_INCREMENT,
  `IDUser` int NOT NULL,
  `username` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IDStaff`) USING BTREE,
  INDEX `IDUser`(`IDUser`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `IDUser` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `HP` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TipeUser` enum('staff','manager','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  PRIMARY KEY (`IDUser`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin1', 'admin1', 'Pieter Edward Riwu', 'pieterbaik@gmail.com', '025247596345', 'staff', '2020-12-20');
INSERT INTO `user` VALUES (2, 'admin2', 'admin2', 'Hauzan Botak', 'HauzanBotak@gmail.com', 'nomorhp', 'user', '1998-08-17');
INSERT INTO `user` VALUES (3, 'admin3', 'admin3', 'Dimas Kanjeng', 'DimasKanjeng@gmail.com', 'nomorhp', 'manager', '2004-03-04');
INSERT INTO `user` VALUES (4, 'admin4', 'admin4', 'M T Razaq', 'MTRazaq@gmail.com', 'nomorhp', 'staff', '2004-03-14');
INSERT INTO `user` VALUES (5, 'admin5', 'admin5', 'Christian Prasetyo', 'ChristianP@gmail.com', '082249562522', 'staff', '2002-03-13');
INSERT INTO `user` VALUES (39, 'test', 'test', 'test', 'test@email.com', '0', 'user', '2000-05-05');

SET FOREIGN_KEY_CHECKS = 1;
