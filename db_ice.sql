/*
 Navicat Premium Data Transfer

 Source Server         : ICE_PROJECT
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_ice

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 22/09/2024 23:15:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for actividadesespecificas
-- ----------------------------
DROP TABLE IF EXISTS `actividadesespecificas`;
CREATE TABLE `actividadesespecificas`  (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of actividadesespecificas
-- ----------------------------
INSERT INTO `actividadesespecificas` VALUES (1, 'DOCENCIA');
INSERT INTO `actividadesespecificas` VALUES (2, 'YO SI PUEDO');
INSERT INTO `actividadesespecificas` VALUES (3, 'PROYECTO');
INSERT INTO `actividadesespecificas` VALUES (4, '');

-- ----------------------------
-- Table structure for auth_groups_users
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE `auth_groups_users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `group` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `auth_groups_users_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_groups_users
-- ----------------------------
INSERT INTO `auth_groups_users` VALUES (1, 1, 'superadmin', '2024-06-29 02:23:32');
INSERT INTO `auth_groups_users` VALUES (2, 2, 'administrador', '2024-06-29 13:28:50');

-- ----------------------------
-- Table structure for auth_identities
-- ----------------------------
DROP TABLE IF EXISTS `auth_identities`;
CREATE TABLE `auth_identities`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `secret` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `secret2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `expires` datetime NULL DEFAULT NULL,
  `extra` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `force_reset` tinyint(1) NOT NULL DEFAULT 0,
  `last_used_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `type_secret`(`type` ASC, `secret` ASC) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_identities
-- ----------------------------
INSERT INTO `auth_identities` VALUES (1, 1, 'email_password', NULL, 'ice@gmail.com', '$2y$12$TE4OMyxuh8I211TTGsv8qOR.sRs7IQBz61vThoZw0ODh.7DoQdfRC', NULL, NULL, 0, '2024-09-23 00:26:58', '2024-06-29 02:23:32', '2024-09-23 00:26:58');
INSERT INTO `auth_identities` VALUES (2, 2, 'email_password', NULL, 'admin@ice.cu', '$2y$12$G.PrsBiYq7.54IBS/qR49.scCL0Hb0kyjzY6pJbC.2kbNyGNQRWlS', NULL, NULL, 0, NULL, '2024-06-29 13:28:50', '2024-06-29 13:28:50');

-- ----------------------------
-- Table structure for auth_logins
-- ----------------------------
DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE `auth_logins`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `identifier` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int UNSIGNED NULL DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_type_identifier`(`id_type` ASC, `identifier` ASC) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_logins
-- ----------------------------
INSERT INTO `auth_logins` VALUES (1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-15 16:30:52', 1);
INSERT INTO `auth_logins` VALUES (2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'username', 'ice', 1, '2024-09-16 04:26:03', 1);
INSERT INTO `auth_logins` VALUES (3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-16 04:39:10', 1);
INSERT INTO `auth_logins` VALUES (4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-16 04:49:46', 1);
INSERT INTO `auth_logins` VALUES (5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-20 21:30:19', 1);
INSERT INTO `auth_logins` VALUES (6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-20 22:35:40', 1);
INSERT INTO `auth_logins` VALUES (7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:124.0) Gecko/20100101 Firefox/124.0', 'username', 'ice', 1, '2024-09-20 23:52:51', 1);
INSERT INTO `auth_logins` VALUES (8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-20 23:57:33', 1);
INSERT INTO `auth_logins` VALUES (9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-21 00:54:35', 1);
INSERT INTO `auth_logins` VALUES (10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', NULL, '2024-09-21 01:23:22', 0);
INSERT INTO `auth_logins` VALUES (11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-21 01:23:29', 1);
INSERT INTO `auth_logins` VALUES (12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-21 14:11:21', 1);
INSERT INTO `auth_logins` VALUES (13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'username', 'ice', 1, '2024-09-21 14:45:37', 1);
INSERT INTO `auth_logins` VALUES (14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-21 14:46:12', 1);
INSERT INTO `auth_logins` VALUES (15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-21 15:15:36', 1);
INSERT INTO `auth_logins` VALUES (16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-21 15:21:17', 1);
INSERT INTO `auth_logins` VALUES (17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-21 15:27:43', 1);
INSERT INTO `auth_logins` VALUES (18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-21 15:34:21', 1);
INSERT INTO `auth_logins` VALUES (19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-21 15:37:44', 1);
INSERT INTO `auth_logins` VALUES (20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'username', 'ice', 1, '2024-09-21 15:42:11', 1);
INSERT INTO `auth_logins` VALUES (21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', NULL, '2024-09-21 21:04:00', 0);
INSERT INTO `auth_logins` VALUES (22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-21 21:04:07', 1);
INSERT INTO `auth_logins` VALUES (23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-21 21:51:04', 1);
INSERT INTO `auth_logins` VALUES (24, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-22 00:55:14', 1);
INSERT INTO `auth_logins` VALUES (25, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-22 03:14:04', 1);
INSERT INTO `auth_logins` VALUES (26, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-22 08:14:32', 1);
INSERT INTO `auth_logins` VALUES (27, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-22 08:25:01', 1);
INSERT INTO `auth_logins` VALUES (28, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'username', 'ice', 1, '2024-09-22 08:41:32', 1);
INSERT INTO `auth_logins` VALUES (29, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-22 09:06:02', 1);
INSERT INTO `auth_logins` VALUES (30, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-22 23:39:32', 1);
INSERT INTO `auth_logins` VALUES (31, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'username', 'ice', 1, '2024-09-23 00:26:58', 1);

-- ----------------------------
-- Table structure for auth_permissions_users
-- ----------------------------
DROP TABLE IF EXISTS `auth_permissions_users`;
CREATE TABLE `auth_permissions_users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `permission` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `auth_permissions_users_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_permissions_users
-- ----------------------------

-- ----------------------------
-- Table structure for auth_remember_tokens
-- ----------------------------
DROP TABLE IF EXISTS `auth_remember_tokens`;
CREATE TABLE `auth_remember_tokens`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hashedValidator` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `selector`(`selector` ASC) USING BTREE,
  INDEX `auth_remember_tokens_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_remember_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for auth_token_logins
-- ----------------------------
DROP TABLE IF EXISTS `auth_token_logins`;
CREATE TABLE `auth_token_logins`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `identifier` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int UNSIGNED NULL DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_type_identifier`(`id_type` ASC, `identifier` ASC) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_token_logins
-- ----------------------------

-- ----------------------------
-- Table structure for bajas
-- ----------------------------
DROP TABLE IF EXISTS `bajas`;
CREATE TABLE `bajas`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `idcolaborador` bigint UNSIGNED NOT NULL,
  `fechabaja` date NOT NULL,
  `idmotivo` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_bajas_motivosbajas_1`(`idmotivo` ASC) USING BTREE,
  INDEX `fk_bajas_colaboradores_1`(`idcolaborador` ASC) USING BTREE,
  CONSTRAINT `fk_bajas_colaboradores_1` FOREIGN KEY (`idcolaborador`) REFERENCES `colaboradores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bajas_motivosbajas_1` FOREIGN KEY (`idmotivo`) REFERENCES `motivosbajas` (`idmotivobaja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bajas
-- ----------------------------

-- ----------------------------
-- Table structure for cargos
-- ----------------------------
DROP TABLE IF EXISTS `cargos`;
CREATE TABLE `cargos`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cargo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cargos
-- ----------------------------
INSERT INTO `cargos` VALUES (1, 'METODOLOGO');
INSERT INTO `cargos` VALUES (2, 'PROFESOR');
INSERT INTO `cargos` VALUES (3, 'METODOLOGO INSPECTOR');
INSERT INTO `cargos` VALUES (4, 'DIRECTORA');
INSERT INTO `cargos` VALUES (5, 'PROFESORA');
INSERT INTO `cargos` VALUES (6, 'DIRECTORA MUNICIPAL');
INSERT INTO `cargos` VALUES (7, 'METODOLOGA');
INSERT INTO `cargos` VALUES (8, 'INSTRUCTOR DE ARTE');
INSERT INTO `cargos` VALUES (9, 'SECRETARIA DOCENTE');
INSERT INTO `cargos` VALUES (10, 'ESPECIALISTA');
INSERT INTO `cargos` VALUES (11, 'SUBDIRECTOR');
INSERT INTO `cargos` VALUES (12, 'MAESTRO');
INSERT INTO `cargos` VALUES (13, 'DIRECTOR');
INSERT INTO `cargos` VALUES (14, 'JEFE DPTO DE INSPECCION');
INSERT INTO `cargos` VALUES (15, 'JEFE DPTO PRIMARIA');
INSERT INTO `cargos` VALUES (16, 'JEFA NIVEL EDUCATIVO');
INSERT INTO `cargos` VALUES (17, 'PROFESOR DE FRANCÉS');
INSERT INTO `cargos` VALUES (18, 'PROFESOR DE ASIGNATURAS TÉCNICAS');
INSERT INTO `cargos` VALUES (19, 'CHOFER');
INSERT INTO `cargos` VALUES (20, 'SUBDIRECTORA');

-- ----------------------------
-- Table structure for categoriasdocentes
-- ----------------------------
DROP TABLE IF EXISTS `categoriasdocentes`;
CREATE TABLE `categoriasdocentes`  (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoria` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of categoriasdocentes
-- ----------------------------
INSERT INTO `categoriasdocentes` VALUES (1, '-');
INSERT INTO `categoriasdocentes` VALUES (2, 'INSTRUCTOR');
INSERT INTO `categoriasdocentes` VALUES (3, 'ASISTENTE');
INSERT INTO `categoriasdocentes` VALUES (4, 'AUXILIAR');
INSERT INTO `categoriasdocentes` VALUES (5, 'TITULAR');

-- ----------------------------
-- Table structure for causascierrecontratos
-- ----------------------------
DROP TABLE IF EXISTS `causascierrecontratos`;
CREATE TABLE `causascierrecontratos`  (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of causascierrecontratos
-- ----------------------------
INSERT INTO `causascierrecontratos` VALUES (1, 'FIN DE MISION');
INSERT INTO `causascierrecontratos` VALUES (2, 'CIERRE DE MISION');
INSERT INTO `causascierrecontratos` VALUES (3, 'DESERCION');
INSERT INTO `causascierrecontratos` VALUES (4, 'FALLECIMIENTO');
INSERT INTO `causascierrecontratos` VALUES (5, '');
INSERT INTO `causascierrecontratos` VALUES (6, 'CIERRE DE MISION POR ENFERMEDAD');

-- ----------------------------
-- Table structure for centros
-- ----------------------------
DROP TABLE IF EXISTS `centros`;
CREATE TABLE `centros`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `centrotrabajo` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idtipocentro` smallint UNSIGNED NOT NULL,
  `direccioncentro` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idmunicipio` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_centros_tipos_centros_1`(`idtipocentro` ASC) USING BTREE,
  INDEX `fk_centros_municipios_1`(`idmunicipio` ASC) USING BTREE,
  CONSTRAINT `fk_centros_municipios_1` FOREIGN KEY (`idmunicipio`) REFERENCES `municipios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_centros_tipos_centros_1` FOREIGN KEY (`idtipocentro`) REFERENCES `tiposcentros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of centros
-- ----------------------------
INSERT INTO `centros` VALUES (1, 'C/M BENJAMIN PARDO', 1, 'MACEO #150 BARACOA', 82);
INSERT INTO `centros` VALUES (2, 'IPR CPTAN GEONEL RODRIGUEZ', 2, 'BAHIA LARGA GUAMA', 33);
INSERT INTO `centros` VALUES (3, 'EE ERNESTO GUEVARA DE LA SERNA', 1, 'MARTI 161 A', 146);
INSERT INTO `centros` VALUES (4, 'SB 2 DE DICIEMBRE', 1, 'SOL #140 INTERIOR', 23);
INSERT INTO `centros` VALUES (5, 'EE PAQUITO ROSALES BENITEZ', 1, 'SACO #15 ESQ A CESPEDES', 99);
INSERT INTO `centros` VALUES (6, 'EE MANUEL FAJARDO REINOSO', 1, '29 F S/N / 102 Y 104', 109);
INSERT INTO `centros` VALUES (7, 'DIRECCION PROVINCIAL DE EDUCACION', 2, 'CIRCUNVALACION SUR', 109);
INSERT INTO `centros` VALUES (8, 'DIRECCION MUNICIPAL DE EDUCACION', 1, 'LUGAREÑO #311/ MARTÍ Y HNOS AGÜERO', 9);
INSERT INTO `centros` VALUES (9, 'JULIO REYES CAIRO', 1, '102 S/N /107 Y FINAL', 90);
INSERT INTO `centros` VALUES (10, 'DIRECCION MUNICIPAL DE EDUCACION', 1, 'CARRETERA CENTRAL KM 188', 53);
INSERT INTO `centros` VALUES (11, 'EE DARIO GUEVARA CABRERA', 1, 'AVE MARTI', 141);
INSERT INTO `centros` VALUES (12, 'DIRECCION PROVINCIAL DE EDUCACION', 1, 'AVE ESPERANZA S/N EL BATEY', 89);
INSERT INTO `centros` VALUES (13, 'EEIGNACIO AGRAMONTE', 1, '68 / 43 Y 45 PLAYA', 79);
INSERT INTO `centros` VALUES (14, 'ESC PEDAGOGICA JOSE MARTI', 2, 'TRINIDAD AVE DE LOS LIBERTADORES', 65);
INSERT INTO `centros` VALUES (15, 'IPVCE JOSE MACEO GRAJALES', 2, 'CARRETERA A MAYARI KM 4 1/2', 128);
INSERT INTO `centros` VALUES (16, 'DIRECCION MUNICIPAL DE EDUCACION', 1, 'CARRETERA EL GLOBO KM 6 1/2', 35);
INSERT INTO `centros` VALUES (17, 'DIRECCION PROVINCIAL DE EDUCACION', 1, '5TA AVE Y 174 SIBONEY PLAYA', 109);
INSERT INTO `centros` VALUES (18, 'IPU REPUBLICA DE PANAMA', 1, 'SAN IGNACIO HORQUITA ABREUS', 160);
INSERT INTO `centros` VALUES (19, 'DIRECCION PROVINCIAL DE EDUCACION', 1, 'CESPEDES #56', 75);
INSERT INTO `centros` VALUES (20, 'IPVCE CANDIDO GONZALEZ MORALES', 1, 'EL SALVADOR KM 1 1/2', 128);
INSERT INTO `centros` VALUES (21, 'DIRECCION MUNICIPAL DE EDUCACION', 1, 'LOS MACEOS ESQ PINTO', 88);
INSERT INTO `centros` VALUES (22, 'CM FELIX EDEN AGUADA', 1, 'CANEY DE LAS MERCEDES', 128);
INSERT INTO `centros` VALUES (23, 'IPVCE VLADIMIR ILICH LENIN', 1, 'MENEDEZ PELAEZ #100 / RAFAEL TREJO Y NAPOLEON DIEGO', 120);
INSERT INTO `centros` VALUES (24, 'DIRECCION MUNICIPAL DE EDUCACION', 1, 'KM 4 CARRETERA CEBALLOS', 136);
INSERT INTO `centros` VALUES (25, 'ESBU ORLANDO NODARSE VERDE', 1, 'CALLE MACEO', 150);
INSERT INTO `centros` VALUES (26, 'I POLITECNICO JUAN BAUTISTA JIMENEZ', 2, 'PASEO AGRAMONTE', 88);
INSERT INTO `centros` VALUES (27, 'PRIMARIA TANIA LA GUERRILLERA', 2, 'AVE 55 #9002 / 90 Y 92', 142);
INSERT INTO `centros` VALUES (28, 'DIRECCIÓN MUNICIPAL DE EDUCACION', 1, 'CARRETERA A CRUCES', 155);
INSERT INTO `centros` VALUES (29, 'I POLITECNICO RUBEN MARTINEZ VILLENA', 2, 'MACEO / PLACIDO Y LUZ CABALLERO', 119);
INSERT INTO `centros` VALUES (30, 'ESBEC CONMATE DE MANAGUA', 3, 'AVE VAN TROI Y FINAL', 30);
INSERT INTO `centros` VALUES (31, 'DIRECCION MUNICIPAL DE EDUCACION', 1, 'CALLE 1', 137);
INSERT INTO `centros` VALUES (32, 'DIRECCION MUNICIPAL DE EDUCACION', 1, 'CARRETERA CENTRAL. VEGUITAS', 141);
INSERT INTO `centros` VALUES (33, 'DIRECCION MUNICIPAL DE EDUCACION', 1, 'AAAA', 143);
INSERT INTO `centros` VALUES (34, 'DIRECCION MUNICIPAL DE EDUCACION', 1, 'CALLE 1', 138);
INSERT INTO `centros` VALUES (35, 'DIRECCION MUNICIPAL DE EDUCACION', 1, 'CALLE 3RA', 53);

-- ----------------------------
-- Table structure for cierrescontratos
-- ----------------------------
DROP TABLE IF EXISTS `cierrescontratos`;
CREATE TABLE `cierrescontratos`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `idcontrato` bigint UNSIGNED NOT NULL,
  `fechacierre` date NOT NULL,
  `fecharealregreso` date NOT NULL,
  `cierre` tinyint(1) NOT NULL,
  `informe` tinyint(1) NOT NULL,
  `evaluacion` tinyint(1) NOT NULL,
  `idcausa` smallint UNSIGNED NOT NULL,
  `observaciones` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_cierres_contrato_contratos_1`(`idcontrato` ASC) USING BTREE,
  INDEX `fk_cierrescontratos_causascierrecontratos_1`(`idcausa` ASC) USING BTREE,
  CONSTRAINT `fk_cierres_contrato_contratos_1` FOREIGN KEY (`idcontrato`) REFERENCES `contratos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cierrescontratos_causascierrecontratos_1` FOREIGN KEY (`idcausa`) REFERENCES `causascierrecontratos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cierrescontratos
-- ----------------------------
INSERT INTO `cierrescontratos` VALUES (1, 1, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (2, 2, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (3, 3, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (4, 4, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (5, 5, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (6, 6, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (7, 7, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (8, 8, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (9, 9, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (10, 10, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (11, 11, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (12, 12, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (13, 13, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (14, 14, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (15, 15, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (16, 16, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (17, 17, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (18, 18, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (19, 19, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (20, 20, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (21, 21, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (22, 22, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (23, 23, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (24, 24, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (25, 25, '1970-01-01', '2023-07-26', 0, 0, 0, 6, '');
INSERT INTO `cierrescontratos` VALUES (26, 26, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (27, 27, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (28, 28, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (29, 29, '1970-01-01', '2024-03-30', 0, 0, 0, 5, '');
INSERT INTO `cierrescontratos` VALUES (30, 30, '1970-01-01', '1970-01-01', 0, 0, 0, 5, '');

-- ----------------------------
-- Table structure for colaboradores
-- ----------------------------
DROP TABLE IF EXISTS `colaboradores`;
CREATE TABLE `colaboradores`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `carneidentidad` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idsexo` tinyint UNSIGNED NOT NULL,
  `edad` tinyint UNSIGNED NOT NULL,
  `idcolorpiel` tinyint UNSIGNED NOT NULL,
  `telefono` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reparto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idmunicipio` int UNSIGNED NOT NULL,
  `idestadocivil` tinyint UNSIGNED NOT NULL,
  `cantidadhijos` tinyint UNSIGNED NOT NULL,
  `nombrepadre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombremadre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `familiaraavisar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `conyugue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `idcentro` int UNSIGNED NOT NULL,
  `idcargosalir` int UNSIGNED NOT NULL,
  `idespecialidad` int UNSIGNED NOT NULL,
  `telefonolaboral` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cuadro` bit(1) NOT NULL,
  `idgradocientifico` tinyint UNSIGNED NOT NULL,
  `idcategoriadocente` tinyint UNSIGNED NOT NULL,
  `ididioma` smallint UNSIGNED NOT NULL,
  `salario` float UNSIGNED NOT NULL,
  `idmilitancia` tinyint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_colaboradores_cargos_1`(`idcargosalir` ASC) USING BTREE,
  INDEX `fk_colaboradores_categoriasdocentes_1`(`idcategoriadocente` ASC) USING BTREE,
  INDEX `fk_colaboradores_sexos_1`(`idsexo` ASC) USING BTREE,
  INDEX `fk_colaboradores_especialidades_1`(`idespecialidad` ASC) USING BTREE,
  INDEX `fk_colaboradores_municipios_1`(`idmunicipio` ASC) USING BTREE,
  INDEX `fk_colaboradores_militancia_1`(`idmilitancia` ASC) USING BTREE,
  INDEX `fk_colaboradores_estadosciviles_1`(`idestadocivil` ASC) USING BTREE,
  INDEX `fk_colaboradores_colorespiel_1`(`idcolorpiel` ASC) USING BTREE,
  INDEX `fk_colaboradores_centros_1`(`idcentro` ASC) USING BTREE,
  INDEX `fk_colaboradores_gradoscientificos_1`(`idgradocientifico` ASC) USING BTREE,
  INDEX `fk_colaboradores_idiomas_1`(`ididioma` ASC) USING BTREE,
  CONSTRAINT `fk_colaboradores_cargos_1` FOREIGN KEY (`idcargosalir`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaboradores_categoriasdocentes_1` FOREIGN KEY (`idcategoriadocente`) REFERENCES `categoriasdocentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaboradores_centros_1` FOREIGN KEY (`idcentro`) REFERENCES `centros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaboradores_colorespiel_1` FOREIGN KEY (`idcolorpiel`) REFERENCES `colorespiel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaboradores_especialidades_1` FOREIGN KEY (`idespecialidad`) REFERENCES `especialidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaboradores_estadosciviles_1` FOREIGN KEY (`idestadocivil`) REFERENCES `estadosciviles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaboradores_gradoscientificos_1` FOREIGN KEY (`idgradocientifico`) REFERENCES `gradoscientificos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaboradores_idiomas_1` FOREIGN KEY (`ididioma`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaboradores_militancia_1` FOREIGN KEY (`idmilitancia`) REFERENCES `militancia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaboradores_municipios_1` FOREIGN KEY (`idmunicipio`) REFERENCES `municipios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_colaboradores_sexos_1` FOREIGN KEY (`idsexo`) REFERENCES `sexos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of colaboradores
-- ----------------------------
INSERT INTO `colaboradores` VALUES (1, 'LUISA DELGADO CAMINO', '90030147884', 1, 33, 2, '43519895', 'CALLE MACEOS NO336', '', 82, 1, 0, 'ROBERTO', 'AGUSTINA', '', '', 1, 1, 1, '', b'0', 1, 1, 26, 6250, 1);
INSERT INTO `colaboradores` VALUES (2, 'MIGUEL GONZALEZ RODRIGUEZ', '72040727947', 2, 51, 1, '98778694', 'MARTHA ABREU NO 20', '', 33, 2, 1, 'LUIS', 'ASUNCION', '', 'ANA LEYLY', 2, 2, 2, '', b'0', 1, 1, 26, 5535, 2);
INSERT INTO `colaboradores` VALUES (3, 'YOAN PEREZ REYES', '73110503575', 2, 50, 2, '56690268', 'LA PIMIENTA', '', 146, 1, 3, 'CARLOS', 'MARIA VIRGEN', 'LUIS E ARIAS REYES', '', 3, 2, 3, '23591144', b'0', 1, 1, 17, 5120, 2);
INSERT INTO `colaboradores` VALUES (4, 'JULIANA VALDEZ DIAZ', '81010917969', 1, 42, 2, '48562676', 'ALGARROBO #9', '', 23, 1, 3, 'RIGOBERTO', 'MARY LUZ', 'YASMANY DIAZ', '', 4, 3, 4, '47364674', b'0', 1, 1, 26, 5800, 2);
INSERT INTO `colaboradores` VALUES (5, 'MARIELA RODRIGUEZ MONTERO', '73081206292', 1, 50, 1, '33208996', 'JOAQUIN DE AGÜERO / MACEO Y SIMON REFE #110 APTO 3', '', 99, 2, 2, '', 'ROSARIO', 'MARCO HERRERA', 'MARCO HERRERA', 5, 4, 5, '33200674', b'0', 2, 5, 50, 7750, 2);
INSERT INTO `colaboradores` VALUES (6, 'RAFAEL CARBAJAL PEREZ', '84063000182', 1, 39, 1, '32266213', 'ISABEL RUBIO #28 /6 Y RIO', '', 109, 2, 2, '', 'ANA MARTHA', 'ALIAN ARANDA', 'ALIAN JOSÉ', 6, 5, 4, '32262255', b'0', 1, 1, 17, 5160, 1);
INSERT INTO `colaboradores` VALUES (7, 'LOURDES  FERNANDEZ GONZALEZ', '78031601659', 1, 45, 1, '', 'JULIO SANGUILY NO.25 ENTRE 16 Y 17 NORTE', '', 109, 1, 1, 'EDUARDO', 'NILDA', '', '', 7, 6, 6, '32293002', b'1', 2, 1, 17, 7050, 2);
INSERT INTO `colaboradores` VALUES (8, 'MURIEL LOPEZ HERNANDEZ', '83080722104', 1, 40, 1, '48768718', 'JOSE DE SUCRE NO 33', '', 9, 2, 2, 'ANTONIO', 'ANICIA', 'ARIEL CASTRO', 'ARIEL CASTRO', 8, 7, 7, '48752944', b'0', 1, 1, 17, 5810, 2);
INSERT INTO `colaboradores` VALUES (9, 'JOSE ROMAN PERNAS', '76010200505', 2, 47, 1, '53505762', 'CARRETERA VIEJA KM 2 1/2 #85', '', 90, 1, 0, 'OLIDIO LAZARO', 'MABEL', 'MABEL PERNAS', '', 9, 8, 8, '41322244', b'0', 1, 1, 17, 5060, 1);
INSERT INTO `colaboradores` VALUES (10, 'VICTOR ALVAREZ GARCIA', '73110604119', 2, 50, 2, '', '9 NO 15 / 6 Y 8', '', 53, 1, 0, 'ANGEL JOSE', 'ANA JULIA', '', '', 10, 1, 4, '45377644', b'0', 1, 1, 50, 5560, 2);
INSERT INTO `colaboradores` VALUES (11, 'YILIAN GONZALEZ RODRIGUEZ', '80060824882', 1, 43, 2, '52194674', 'MATEO PEREZ NO 56', '', 141, 1, 1, 'JUAN RAMIRO', 'XIOMARA CECILIA', 'YARIANNA GONZALEZ', '', 11, 3, 9, '23582174', b'0', 1, 1, 17, 5211, 2);
INSERT INTO `colaboradores` VALUES (12, 'RENE DIAZ GARCIA', '71011009127', 2, 52, 1, '55407630', 'CONRADO BENITEZ S/N', '', 89, 1, 3, 'FELIX', 'ISABEL MARIA', 'ISABEL MARIA GARCIA', '', 12, 2, 10, '32199652', b'0', 1, 1, 17, 5060, 1);
INSERT INTO `colaboradores` VALUES (13, 'MERCEDES  MARTINEZ REYES', '70062103959', 1, 53, 1, '', 'JOSE MACEO NO 4 /19 DE FEBRERO Y MARIA', '', 79, 1, 1, 'ALEJANDRO', 'ANA SARA', '', '', 13, 9, 11, '57932242', b'0', 1, 5, 17, 5710, 2);
INSERT INTO `colaboradores` VALUES (14, 'LAURA PIREZ VERDE', '73042307718', 1, 50, 1, '42662079', 'SOLIS #20 E/MACEO Y MARTA ABREU', '', 65, 1, 1, 'BENITO JUSTO', 'MARTA ESCOLASTICA', '', 'JORGE V CRUZ LAZO', 14, 10, 12, '42665744', b'0', 1, 1, 26, 7850, 2);
INSERT INTO `colaboradores` VALUES (15, 'LILIAN PEREZ DIAZ', '70112426667', 1, 53, 1, '54090333', 'AVE 60  NO 2529', '', 128, 1, 0, 'RILDER', 'MARIA MAGDALENA', '', '', 15, 5, 13, '24453076', b'0', 1, 1, 17, 4600, 2);
INSERT INTO `colaboradores` VALUES (16, 'ADRIANA HERRERA JIMENEZ', '84101725426', 1, 39, 3, '72671922', 'CALLE 36 NO 3917', '', 35, 1, 1, 'GERARDO', 'IDELIZA', '', 'YISEL VALDES', 16, 5, 5, '72677177', b'0', 1, 1, 17, 5107, 2);
INSERT INTO `colaboradores` VALUES (17, 'PEDRO PEREZ RUIZ', '77110317108', 2, 46, 1, '32256208', 'CARRET NUEVA APTO 4 PISO 3', '', 109, 2, 2, 'VICENTE', 'NORMA', '', '', 17, 11, 5, '32201911', b'1', 2, 1, 17, 7400, 1);
INSERT INTO `colaboradores` VALUES (18, 'RAUL LOPEZ FERNANDEZ', '71012709398', 2, 52, 3, '21386734', 'ROSENDO ARTEAGA  E/ BELLAVISTA Y MARTI', '', 160, 1, 2, 'ROBERTO', 'EVANGELISTA', '', 'MILAGROS SOLER-HERMANA', 18, 12, 14, '21325115', b'0', 1, 1, 17, 5650, 2);
INSERT INTO `colaboradores` VALUES (19, 'MARLENE LOPEZ GONZALEZ', '84031028340', 1, 39, 1, '42491249', 'SAN ANTONIO NO 36', '', 75, 1, 1, 'RAMON', 'LAUDELINA', '', 'MAILEN AGUILAR- HIJA', 19, 13, 11, '48236984', b'0', 1, 1, 17, 6520, 2);
INSERT INTO `colaboradores` VALUES (20, 'RUBEN DE QUESADA PEREZ', '75101817216', 2, 48, 1, '24489886', 'CALLE PRINCIPE ALBERTO NO 36 E/ 3 Y 9', '', 128, 1, 1, 'ADOLFO', 'ELSA', '', 'MARIA DEL ROSARIO HERNANDEZ DIAZ', 20, 14, 6, '24464795', b'1', 2, 1, 17, 6500, 2);
INSERT INTO `colaboradores` VALUES (21, 'ALVARO ARTEGA PEREZ', '73030524833', 2, 50, 3, '41468838', '4TA FINAL NO 58', '', 88, 1, 1, 'EUSEBIO', 'AMPARO', '', 'MAGALIS ARTEAGA -HERMANA', 21, 15, 5, '41461514', b'1', 2, 1, 17, 5853, 2);
INSERT INTO `colaboradores` VALUES (22, 'ONELIA DE LA ROSA MARRERO', '74013007479', 1, 49, 1, '24429526', 'AVE JOSE MARTI INT NO 12', '', 128, 1, 0, 'ROGER', 'INES', '', 'ALEXANDER DE LA ROSA MARRERO-HERMANO', 22, 16, 15, '24423574', b'1', 2, 1, 17, 6319, 2);
INSERT INTO `colaboradores` VALUES (23, 'OSCAR MORALES MENDEZ', '79063015142', 2, 44, 2, '31627504', 'CALLE AHOGADOS NO 25A', '', 120, 1, 1, 'JOSE', 'ANTONIA', '', 'REGINA', 23, 13, 5, '31627225', b'1', 2, 1, 17, 6750, 2);
INSERT INTO `colaboradores` VALUES (24, 'CESAR LAMORU PREVAL', '96112921552', 2, 27, 3, '5227772', 'EDIF MICRO 10 APTO 2', '', 136, 1, 2, 'RAMON', 'VIRGEN LUCIA', '', 'LILIANA LAMORU', 24, 13, 16, '24606614', b'1', 2, 1, 17, 6810, 2);
INSERT INTO `colaboradores` VALUES (25, 'ROSA SANTIESTEBAN DIAZ', '84010323060', 1, 39, 2, '59510803', 'CALLE 3RA', '', 150, 1, 2, 'ANISAJO', 'PETRONILA', '', 'RICARDO LEVEZ', 25, 5, 15, '59510807', b'0', 1, 1, 17, 5500, 1);
INSERT INTO `colaboradores` VALUES (26, 'MATEO JIMÉNEZ SANCHEZ', '73081423195', 2, 50, 1, '', 'CALLE ERNESTO GUEVARA NO 21', '', 88, 1, 0, 'MIGUEL', 'LOURDES', '', '', 26, 17, 17, '58366611', b'0', 1, 1, 26, 6000, 1);
INSERT INTO `colaboradores` VALUES (27, 'LEONARDO MONTES VELÁZQUEZ', '62090300917', 2, 61, 3, '', 'CALLE MAXIMO GOMEZ NO 58', '', 142, 1, 0, 'LUIS', 'MARIA', '', '', 27, 18, 18, '32554415', b'0', 1, 1, 26, 5060, 1);
INSERT INTO `colaboradores` VALUES (28, 'ROBERTO REVILLA LUIS', '81090613333', 2, 42, 2, '58962972', 'CARRET SIBONEY KM 8 1/2 SEVILLA', '', 155, 2, 3, 'CANDIDO', 'IRMA', 'YUDIT BARRERO FERNANDEZ', 'YUDIT BARRERO FERNANDEZ', 28, 19, 19, '22661702', b'0', 1, 1, 17, 2420, 1);
INSERT INTO `colaboradores` VALUES (29, 'LIBER HERNANDEZ RODRIGUEZ', '71051204571', 2, 52, 1, '52098076', 'AVEN. ROBERTO REYES NO. 102 ALT ESQUINA CALLE SENDERO', '', 119, 2, 2, 'DIEGO', 'ALEYDA', '', '', 29, 11, 6, '69469566', b'0', 1, 1, 17, 7150, 1);
INSERT INTO `colaboradores` VALUES (30, 'ANA DOMINGUEZ GOMEZ', '70110400152', 1, 53, 2, '77970038', 'SAN ANTONIO NO 214 FUENTES Y PRINCIPE ALBERTO', '', 30, 2, 2, 'FRANCISCO', 'JUANA MARIA', 'HENRY SANCHEZ STUART', 'ROBERTO LLERENA CASTAÑO', 30, 20, 5, '72062536', b'1', 2, 1, 26, 5885, 2);
INSERT INTO `colaboradores` VALUES (34, 'Aaa', '12342341234', 2, 22, 2, '12211221', 'DDD', '', 142, 1, 2, 'sss', 'sss', 'trt', 'ddfs', 27, 12, 11, NULL, b'1', 1, 1, 17, 6000, 1);
INSERT INTO `colaboradores` VALUES (35, 'Aaarrr', '12342241238', 1, 25, 1, '12211555', 'WEQEQ', '', 141, 4, 0, 'eqcc', 'cccc', 'ewqe', 'ewqe', 11, 5, 8, NULL, b'1', 1, 1, 17, 6000, 1);
INSERT INTO `colaboradores` VALUES (36, 'Qqqqqqq', '44455566678', 1, 56, 2, '222344566', 'DAASD', '', 119, 1, 2, 'dasdas', 'dasdw', 'dadasd', 'dada', 29, 2, 6, NULL, b'1', 1, 1, 17, 6000, 2);
INSERT INTO `colaboradores` VALUES (37, 'sdads', '23123456786', 2, 33, 2, '32133123', 'EQEQ', '', 142, 2, 2, 'eqecx', 'rewrwer', 'adasd', 'dadasd', 27, 12, 5, NULL, b'1', 1, 1, 17, 5555, 1);
INSERT INTO `colaboradores` VALUES (38, 'EDEEEE DSADSADADAS', '54687812321', 2, 28, 3, '56776590', 'CALLE 1', '', 158, 2, 0, 'AQQQQ WWSS', 'FGDGDF FFFD', 'GFGDFGG RR', 'TERTETRT', 28, 2, 13, NULL, b'1', 3, 3, 17, 6000, 4);
INSERT INTO `colaboradores` VALUES (39, 'PAPO PAPA PIPO', '54687812441', 2, 33, 3, '56773591', 'CALLE 9NA', '', 52, 5, 1, 'PAPO PAPA PIPO', 'PAPO PAPA PIPO', 'PAPO PAPA PIPO', '', 35, 15, 1, '22112211', b'1', 3, 3, 17, 6000, 2);
INSERT INTO `colaboradores` VALUES (40, 'ZZZZZ DSSD TEETRET', '12321234789', 1, 54, 1, '5435535443', 'SDAD', '', 116, 3, 2, 'SDAD', 'DSAD', 'ASDASD', 'DADS', 29, 16, 11, '342432543', b'1', 1, 1, 17, 2432, 1);
INSERT INTO `colaboradores` VALUES (41, 'NOMBRE', '12321244789', 1, 54, 1, '5835535443', 'MI_DIRECCION', 'MIREPARTO', 132, 2, 3, 'MIPADRE', 'MIMADRE', 'MIFAMILIAR', 'MICONYUGUE', 15, 10, 3, '56655567', b'1', 2, 5, 17, 10270, 2);

-- ----------------------------
-- Table structure for colorespiel
-- ----------------------------
DROP TABLE IF EXISTS `colorespiel`;
CREATE TABLE `colorespiel`  (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of colorespiel
-- ----------------------------
INSERT INTO `colorespiel` VALUES (1, 'BLANCA');
INSERT INTO `colorespiel` VALUES (2, 'MESTIZA');
INSERT INTO `colorespiel` VALUES (3, 'NEGRA');

-- ----------------------------
-- Table structure for contratos
-- ----------------------------
DROP TABLE IF EXISTS `contratos`;
CREATE TABLE `contratos`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `idcolaborador` bigint UNSIGNED NOT NULL,
  `numerocontrato` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fechacontrato` date NOT NULL,
  `idsalidapor` smallint UNSIGNED NOT NULL,
  `idestado` int UNSIGNED NOT NULL,
  `institucion` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `localizacion` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `funcionrealizar` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fechasalida` date NOT NULL,
  `fecharegreso` date NOT NULL,
  `ingresospt` float UNSIGNED NOT NULL,
  `ingresoaporte` float UNSIGNED NOT NULL,
  `totalingreso` float UNSIGNED NOT NULL,
  `viatico` float UNSIGNED NOT NULL,
  `idactividadespecifica` smallint UNSIGNED NOT NULL,
  `observaciones` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `entradavacaciones` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `visa` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_contratos_actividades_especificas_1`(`idactividadespecifica` ASC) USING BTREE,
  INDEX `fk_contratos_salidas_por_1`(`idsalidapor` ASC) USING BTREE,
  INDEX `fk_contratos_estados_1`(`idestado` ASC) USING BTREE,
  INDEX `fk_contratos_colaboradores_1`(`idcolaborador` ASC) USING BTREE,
  CONSTRAINT `fk_contratos_actividades_especificas_1` FOREIGN KEY (`idactividadespecifica`) REFERENCES `actividadesespecificas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contratos_colaboradores_1` FOREIGN KEY (`idcolaborador`) REFERENCES `colaboradores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contratos_estados_1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contratos_salidas_por_1` FOREIGN KEY (`idsalidapor`) REFERENCES `salidaspor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of contratos
-- ----------------------------
INSERT INTO `contratos` VALUES (1, 1, '4', '2018-01-07', 1, 1, 'DEPARTAMENTO NACIONAL DE EDUCACION BASICA', '', 'ASESORIA', '2018-01-07', '2020-01-07', 500, 0, 12000, 600, 4, '', '', 0);
INSERT INTO `contratos` VALUES (2, 2, '6', '2022-01-11', 1, 2, 'MINISTERIO DE EDUCACION DE BAHAMAS', 'NASSAU, BAHAMAS', 'PROFESOR', '2022-01-11', '2024-01-11', 500, 0, 12000, 550, 4, '', '', 0);
INSERT INTO `contratos` VALUES (3, 3, '36', '2022-04-14', 1, 3, 'MINISTERIO DE EDUCACION Y CIENCIA', '', 'PRPFESOR', '2022-04-14', '2024-04-14', 500, 0, 12000, 500, 4, 'NO PROCEDE LA ENTREGA DE COMPROBANTES DE INGRESOS POR SPT.', '', 0);
INSERT INTO `contratos` VALUES (4, 4, '35', '2022-04-14', 1, 4, 'MINISTERIO DE EDUCACION Y CIENCIA', 'BATA', 'PROFESOR', '2022-04-14', '2024-04-14', 500, 0, 12000, 500, 4, 'NO PROCEDE LA ENTREGA DE COMPROBANTES DE INGRESOS POR SPT.', '', 0);
INSERT INTO `contratos` VALUES (5, 5, '39', '2022-04-14', 1, 5, 'MINISTERIO DE EDUCACION Y CIENCIA', '', 'PROFESORA', '2022-04-14', '2024-04-14', 500, 0, 12000, 500, 4, 'NO PROCEDE LA ENTREGA DE COMPROBANTES DE INGRESOS POR SPT.', '', 0);
INSERT INTO `contratos` VALUES (6, 6, '37', '2022-04-14', 1, 4, 'MINISTERIO DE EDUCACION Y CIENCIA', '', 'PROFESORA', '2022-04-14', '2024-04-14', 500, 0, 12000, 500, 4, 'NO PROCEDE LA ENTREGA DE COMPROBANTES DE INGRESOS POR SPT.', '', 0);
INSERT INTO `contratos` VALUES (7, 7, '30', '2022-05-12', 2, 6, 'FUNDACIÓN UN MUNDO MEJOR ES POSIBLE', '', 'COORDINADORA', '2022-05-12', '2024-05-12', 0, 0, 0, 300, 4, '', '', 0);
INSERT INTO `contratos` VALUES (8, 8, '61', '2022-08-07', 1, 7, 'MINISTERIO DE EDUCACION Y CIENCIA', '', 'PROFESOR', '2022-08-07', '2024-08-07', 500, 0, 12000, 500, 4, 'NO PROCEDE LA ENTREGA DE COMPROBANTES DE INGRESOS POR SPT.', '', 0);
INSERT INTO `contratos` VALUES (9, 9, '56', '2022-08-07', 1, 7, 'MINISTERIO DE EDUCACION Y CIENCIA', '', 'PROFESOR', '2022-08-07', '2024-08-07', 500, 0, 12000, 500, 4, 'NO PROCEDE LA ENTREGA DE COMPROBANTES DE INGRESOS POR SPT.', '', 0);
INSERT INTO `contratos` VALUES (10, 10, '57', '2022-08-07', 1, 7, 'MINISTERIO DE EDUCACION Y CIENCIA', '', 'PROFESOR', '2022-08-07', '2024-08-07', 500, 0, 12000, 500, 4, 'NO PROCEDE LA ENTREGA DE COMPROBANTES DE INGRESOS POR SPT.', '', 0);
INSERT INTO `contratos` VALUES (11, 11, '58', '2022-08-07', 1, 7, 'MINISTERIO DE EDUCACION Y CIENCIA', '', 'PROFESORA', '2022-08-07', '2024-08-07', 500, 0, 12000, 500, 4, 'NO PROCEDE LA ENTREGA DE COMPROBANTES DE INGRESOS POR SPT.', '', 0);
INSERT INTO `contratos` VALUES (12, 12, '59', '2022-08-07', 1, 7, 'MINISTERIO DE EDUCACION Y CIENCIA', '', 'PROFESOR', '2022-08-07', '2024-08-07', 500, 0, 12000, 500, 4, 'NO PROCEDE LA ENTREGA DE COMPROBANTES DE INGRESOS POR SPT.', '', 0);
INSERT INTO `contratos` VALUES (13, 13, '60', '2022-08-07', 1, 7, 'MINISTERIO DE EDUCACION Y CIENCIA', '', 'PROFESOR', '2022-08-07', '2024-08-07', 500, 0, 12000, 500, 4, 'NO PROCEDE LA ENTREGA DE COMPROBANTES DE INGRESOS POR SPT.', '', 0);
INSERT INTO `contratos` VALUES (14, 14, '40', '2022-09-12', 1, 8, 'MINISTERIO DE EDUCACION DE JAMAICA', '', 'PROFESOR', '2022-09-12', '2024-09-12', 500, 0, 12000, 500, 4, '', '', 0);
INSERT INTO `contratos` VALUES (15, 15, '49', '2022-09-18', 1, 9, 'MINISTERIO DE EDUCACION DE LA REPUBLICA ARABE SAHARAUI DEMOCRATICA', '', 'PROFESOR DE PREUNIVERSITARIO', '2022-09-18', '2024-09-18', 0, 0, 0, 100, 4, '', '', 0);
INSERT INTO `contratos` VALUES (16, 16, '66', '2022-11-20', 1, 10, 'SECRETARIA DE ESTADO EN EL DESPACHO DE EDUCACION DE LA REPUBLICA DE CUBA', 'SANTA ROSA DE COPAN', 'ASESOR PROGRAMA YO, SI PUEDO Y YO, SI PUEDO SEGUIR', '2022-11-20', '2025-11-20', 500, 0, 18000, 500, 4, '', '', 0);
INSERT INTO `contratos` VALUES (17, 17, '62', '2022-11-20', 1, 11, 'SECRETARIA DE ESTADO EN EL DESPACHO DE EDUCACION DE LA REPUBLICA DE CUBA', 'TEGUCIGALPA', 'ASESOR PROGRAMA YO, SI PUEDO Y YO, SI PUEDO SEGUIR', '2022-11-20', '2025-11-20', 500, 0, 18000, 500, 4, '', '', 0);
INSERT INTO `contratos` VALUES (18, 18, '51', '2022-11-20', 1, 12, 'SECRETARIA DE ESTADO EN EL DESPACHO DE EDUCACION DE LA REPUBLICA DE CUBA', 'CATACAMAS', 'ASESOR PROGRAMA YO, SI PUEDO Y YO, SI PUEDO SEGUIR', '2022-11-20', '2025-11-20', 500, 0, 18000, 500, 4, '', '', 0);
INSERT INTO `contratos` VALUES (19, 19, '63', '2022-11-20', 1, 13, 'SECRETARIA DE ESTADO EN EL DESPACHO DE EDUCACION DE LA REPUBLICA DE CUBA', 'EL PROGRESO', 'ASESOR PROGRAMA YO, SI PUEDO Y YO, SI PUEDO SEGUIR', '2022-11-20', '2025-11-20', 500, 0, 18000, 500, 4, '', '', 0);
INSERT INTO `contratos` VALUES (20, 20, '31', '2022-11-20', 1, 14, 'SECRETARIA DE ESTADO EN EL DESPACHO DE EDUCACION DE LA REPUBLICA DE CUBA', 'INTIBUCA', 'ASESOR PROGRAMA YO, SI PUEDO Y YO, SI PUEDO SEGUIR', '2022-11-20', '2025-11-20', 500, 0, 18000, 500, 4, '', '', 0);
INSERT INTO `contratos` VALUES (21, 21, '64', '2022-11-20', 1, 15, 'SECRETARIA DE ESTADO EN EL DESPACHO DE EDUCACION DE LA REPUBLICA DE CUBA', 'SANTA BARBARA', 'ASESOR PROGRAMA YO, SI PUEDO Y YO, SI PUEDO SEGUIR', '2022-11-20', '2025-11-20', 500, 0, 18000, 500, 4, '', '', 0);
INSERT INTO `contratos` VALUES (22, 22, '69', '2022-11-20', 1, 11, 'SECRETARIA DE ESTADO EN EL DESPACHO DE EDUCACION DE LA REPUBLICA DE CUBA', 'TEGUCIGALPA', 'ASESOR PROGRAMA YO, SI PUEDO Y YO, SI PUEDO SEGUIR', '2022-11-20', '2025-11-20', 500, 0, 18000, 500, 4, '', '', 0);
INSERT INTO `contratos` VALUES (23, 23, '65', '2022-11-20', 1, 11, 'SECRETARIA DE ESTADO EN EL DESPACHO DE EDUCACION DE LA REPUBLICA DE CUBA', 'DISTRITO CENTRAL', 'ASESOR PROGRAMA YO, SI PUEDO Y YO, SI PUEDO SEGUIR', '2022-11-20', '2025-11-20', 500, 0, 18000, 500, 4, '', '', 0);
INSERT INTO `contratos` VALUES (24, 24, '79', '2022-11-20', 1, 11, 'SECRETARIA DE ESTADO EN EL DESPACHO DE EDUCACION DE LA REPUBLICA DE CUBA', 'TEGUCIGALPA', 'ASESOR PROGRAMA YO, SI PUEDO Y YO, SI PUEDO SEGUIR', '2022-11-20', '2025-11-20', 500, 0, 18000, 500, 4, '', '', 0);
INSERT INTO `contratos` VALUES (25, 25, '136', '2022-12-20', 1, 16, 'SECRETARIA DE ESTADO EN EL DESPACHO DE EDUCACION DE LA REPUBLICA DE CUBA', 'SANTA CRUZ', 'ASESOR PROGRAMA YO, SI PUEDO Y YO, SI PUEDO SEGUIR', '2022-12-20', '2025-12-20', 500, 0, 18000, 500, 4, '', '', 0);
INSERT INTO `contratos` VALUES (26, 26, '47', '2023-08-29', 1, 8, 'MINISTERIO DE EDUCACION DE JAMAICA', '', 'PROFESOR', '2023-08-29', '2025-08-29', 500, 0, 18000, 500, 4, '', '', 0);
INSERT INTO `contratos` VALUES (27, 27, '46', '2023-08-29', 1, 8, 'MINISTERIO DE EDUCACION DE JAMAICA', '', 'PROFESOR', '2023-08-29', '2025-08-29', 500, 0, 18000, 500, 4, '', '', 0);
INSERT INTO `contratos` VALUES (28, 28, '91', '2023-10-11', 1, 17, 'MINISTERIO DEL PODER POPULAR PARA LA EDUCACION', '', 'CHOFER', '2023-10-11', '2025-10-11', 0, 0, 0, 2900, 4, '', '', 0);
INSERT INTO `contratos` VALUES (29, 29, '20', '2024-02-01', 1, 18, 'CENTRO DE DESARROLLO Y SALUD COMUNITARIO (CML)', 'MADRID', 'PASANTIA', '2024-02-01', '2024-03-30', 1000, 0, 1000, 0, 4, '', '', 0);
INSERT INTO `contratos` VALUES (30, 30, '50', '2024-08-19', 1, 14, 'SECRETARIA DE ESTADO EN EL DESPACHO DE EDUCACION DE LA REPUBLICA DE CUBA', 'INTIBUCA', 'CURRICULISTA', '2024-08-19', '2026-08-19', 500, 0, 12000, 500, 4, '', '', 0);

-- ----------------------------
-- Table structure for especialidades
-- ----------------------------
DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE `especialidades`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of especialidades
-- ----------------------------
INSERT INTO `especialidades` VALUES (1, '-');
INSERT INTO `especialidades` VALUES (2, 'AGRONOMIA');
INSERT INTO `especialidades` VALUES (3, 'CIENCIAS EXACTAS');
INSERT INTO `especialidades` VALUES (4, 'BIOLOGIA');
INSERT INTO `especialidades` VALUES (5, 'PRIMARIA');
INSERT INTO `especialidades` VALUES (6, 'GEOGRAFÍA');
INSERT INTO `especialidades` VALUES (7, 'FISICA-ELECTRONICA');
INSERT INTO `especialidades` VALUES (8, 'ARTES PLASTICA');
INSERT INTO `especialidades` VALUES (9, 'CIENCIAS NATURALES');
INSERT INTO `especialidades` VALUES (10, 'AGROPECUARIA');
INSERT INTO `especialidades` VALUES (11, 'MATEMATICA');
INSERT INTO `especialidades` VALUES (12, 'MATEMATICA COMPUTACION');
INSERT INTO `especialidades` VALUES (13, 'INFORMATICA');
INSERT INTO `especialidades` VALUES (14, 'PSICOPEDAGOGIA');
INSERT INTO `especialidades` VALUES (15, 'ESPAÑOL LITERATURA');
INSERT INTO `especialidades` VALUES (16, 'EDUCACION LABORAL Y DIBUJO TECNICA');
INSERT INTO `especialidades` VALUES (17, 'LENGUA INGLESA');
INSERT INTO `especialidades` VALUES (18, 'INGENIERO AGRÓNOMO');
INSERT INTO `especialidades` VALUES (19, 'TECNICO MEDIO MANTENIMIENTO Y REPARACION DE AUTOMO');
INSERT INTO `especialidades` VALUES (20, 'TECNICO MEDIO MANTENIMIENTO Y REPARACION DE AUTOMO');
INSERT INTO `especialidades` VALUES (21, 'quimica');

-- ----------------------------
-- Table structure for estados
-- ----------------------------
DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idpais` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_estados_paises_1`(`idpais` ASC) USING BTREE,
  CONSTRAINT `fk_estados_paises_1` FOREIGN KEY (`idpais`) REFERENCES `paises` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of estados
-- ----------------------------
INSERT INTO `estados` VALUES (1, '', 194);
INSERT INTO `estados` VALUES (2, '', 195);
INSERT INTO `estados` VALUES (3, 'CENTRO SUR', 196);
INSERT INTO `estados` VALUES (4, 'WELE NZAS', 196);
INSERT INTO `estados` VALUES (5, 'BIOKO NORTE', 196);
INSERT INTO `estados` VALUES (6, '', 197);
INSERT INTO `estados` VALUES (7, '', 196);
INSERT INTO `estados` VALUES (8, '', 198);
INSERT INTO `estados` VALUES (9, '', 199);
INSERT INTO `estados` VALUES (10, 'SANTA ROSA DE COPAN', 200);
INSERT INTO `estados` VALUES (11, 'TEGUCIGALPA', 200);
INSERT INTO `estados` VALUES (12, 'OLANCHO', 200);
INSERT INTO `estados` VALUES (13, 'YORO', 200);
INSERT INTO `estados` VALUES (14, 'INTIBUCA', 200);
INSERT INTO `estados` VALUES (15, 'SANTA BÁRBARA', 200);
INSERT INTO `estados` VALUES (16, 'LEMPIRA', 200);
INSERT INTO `estados` VALUES (17, '', 201);
INSERT INTO `estados` VALUES (18, '', 202);

-- ----------------------------
-- Table structure for estadosciviles
-- ----------------------------
DROP TABLE IF EXISTS `estadosciviles`;
CREATE TABLE `estadosciviles`  (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of estadosciviles
-- ----------------------------
INSERT INTO `estadosciviles` VALUES (1, 'SOLTERO(A)');
INSERT INTO `estadosciviles` VALUES (2, 'CASADO(A)');
INSERT INTO `estadosciviles` VALUES (3, 'UNION LIBRE');
INSERT INTO `estadosciviles` VALUES (4, 'SEPARADO(A)');
INSERT INTO `estadosciviles` VALUES (5, 'DIVORCIADO(A)');
INSERT INTO `estadosciviles` VALUES (6, 'VIUDO(A)');

-- ----------------------------
-- Table structure for estadostramites
-- ----------------------------
DROP TABLE IF EXISTS `estadostramites`;
CREATE TABLE `estadostramites`  (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of estadostramites
-- ----------------------------

-- ----------------------------
-- Table structure for expedientes
-- ----------------------------
DROP TABLE IF EXISTS `expedientes`;
CREATE TABLE `expedientes`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `numeroexpediente` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fechanotaverbal` date NOT NULL,
  `solicitadopor` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fechasalida` date NOT NULL,
  `fecharegreso` date NOT NULL,
  `estancia` smallint UNSIGNED NOT NULL,
  `idmotivoviaje` smallint UNSIGNED NOT NULL,
  `idusuariocreador` int UNSIGNED NOT NULL,
  `fechacracion` date NOT NULL,
  `idpasaporterequerido` smallint UNSIGNED NOT NULL,
  `idtipoactividad` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_expedientes_motivos_viaje_1`(`idmotivoviaje` ASC) USING BTREE,
  INDEX `fk_expedientes_tipos_actividad_1`(`idtipoactividad` ASC) USING BTREE,
  INDEX `fk_expedientes_tipos_pasaporte_1`(`idpasaporterequerido` ASC) USING BTREE,
  INDEX `fk_expedientes_users_1`(`idusuariocreador` ASC) USING BTREE,
  CONSTRAINT `fk_expedientes_motivos_viaje_1` FOREIGN KEY (`idmotivoviaje`) REFERENCES `motivosviajes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_expedientes_tipos_actividad_1` FOREIGN KEY (`idtipoactividad`) REFERENCES `tiposactividades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_expedientes_tipos_pasaporte_1` FOREIGN KEY (`idpasaporterequerido`) REFERENCES `tipospasaporte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_expedientes_users_1` FOREIGN KEY (`idusuariocreador`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of expedientes
-- ----------------------------

-- ----------------------------
-- Table structure for gastostramites
-- ----------------------------
DROP TABLE IF EXISTS `gastostramites`;
CREATE TABLE `gastostramites`  (
  `idtramite` bigint UNSIGNED NOT NULL,
  `idgasto` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`idtramite`, `idgasto`) USING BTREE,
  INDEX `fk_gastos_tramites_tipos_gasto_1`(`idgasto` ASC) USING BTREE,
  CONSTRAINT `fk_gastostramites_tiposgastos_1` FOREIGN KEY (`idgasto`) REFERENCES `tiposgastos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_gastostramites_tramitespasaportes_1` FOREIGN KEY (`idtramite`) REFERENCES `tramitespasaportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of gastostramites
-- ----------------------------

-- ----------------------------
-- Table structure for gradoscientificos
-- ----------------------------
DROP TABLE IF EXISTS `gradoscientificos`;
CREATE TABLE `gradoscientificos`  (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `grado` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `abreviatura` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of gradoscientificos
-- ----------------------------
INSERT INTO `gradoscientificos` VALUES (1, '-', '');
INSERT INTO `gradoscientificos` VALUES (2, 'DR', '');
INSERT INTO `gradoscientificos` VALUES (3, 'MSC', '');

-- ----------------------------
-- Table structure for idiomas
-- ----------------------------
DROP TABLE IF EXISTS `idiomas`;
CREATE TABLE `idiomas`  (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `idioma` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 79 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of idiomas
-- ----------------------------
INSERT INTO `idiomas` VALUES (1, 'ALBANES');
INSERT INTO `idiomas` VALUES (2, 'ALEMAN');
INSERT INTO `idiomas` VALUES (3, 'ARABE');
INSERT INTO `idiomas` VALUES (4, 'ARGELINO');
INSERT INTO `idiomas` VALUES (5, 'AZERI');
INSERT INTO `idiomas` VALUES (6, 'BENGALI');
INSERT INTO `idiomas` VALUES (7, 'BIRMANO');
INSERT INTO `idiomas` VALUES (8, 'CANARES');
INSERT INTO `idiomas` VALUES (9, 'CEBUANO');
INSERT INTO `idiomas` VALUES (10, 'CHATISGARI');
INSERT INTO `idiomas` VALUES (11, 'CHECO');
INSERT INTO `idiomas` VALUES (12, 'CHINO');
INSERT INTO `idiomas` VALUES (13, 'CINGALES');
INSERT INTO `idiomas` VALUES (14, 'COREANO');
INSERT INTO `idiomas` VALUES (15, 'CROATA');
INSERT INTO `idiomas` VALUES (16, 'EGIPCIO');
INSERT INTO `idiomas` VALUES (17, 'ESPAÑOL');
INSERT INTO `idiomas` VALUES (18, 'FRANCES');
INSERT INTO `idiomas` VALUES (19, 'GRIEGO');
INSERT INTO `idiomas` VALUES (20, 'GUARANI');
INSERT INTO `idiomas` VALUES (21, 'GUYARATI');
INSERT INTO `idiomas` VALUES (22, 'HAUSA');
INSERT INTO `idiomas` VALUES (23, 'HINDI');
INSERT INTO `idiomas` VALUES (24, 'HUNGARO');
INSERT INTO `idiomas` VALUES (25, 'INDONESIO');
INSERT INTO `idiomas` VALUES (26, 'INGLES');
INSERT INTO `idiomas` VALUES (27, 'ITALIANO');
INSERT INTO `idiomas` VALUES (28, 'JAPONES');
INSERT INTO `idiomas` VALUES (29, 'JAVANES');
INSERT INTO `idiomas` VALUES (30, 'JEMER');
INSERT INTO `idiomas` VALUES (31, 'KAZAJO');
INSERT INTO `idiomas` VALUES (32, 'KIÑARUANDA');
INSERT INTO `idiomas` VALUES (33, 'KIRUNDI');
INSERT INTO `idiomas` VALUES (34, 'KURDO');
INSERT INTO `idiomas` VALUES (35, 'LAHNDA');
INSERT INTO `idiomas` VALUES (36, 'MAGAHI');
INSERT INTO `idiomas` VALUES (37, 'MAITHILI');
INSERT INTO `idiomas` VALUES (38, 'MALABAR');
INSERT INTO `idiomas` VALUES (39, 'MALAYO');
INSERT INTO `idiomas` VALUES (40, 'MARATI');
INSERT INTO `idiomas` VALUES (41, 'MARROQUI');
INSERT INTO `idiomas` VALUES (42, 'MIN DONG');
INSERT INTO `idiomas` VALUES (43, 'NEERLANDES');
INSERT INTO `idiomas` VALUES (44, 'NEPALI');
INSERT INTO `idiomas` VALUES (45, 'ORIYA');
INSERT INTO `idiomas` VALUES (46, 'PANYABI');
INSERT INTO `idiomas` VALUES (47, 'PASTUN');
INSERT INTO `idiomas` VALUES (48, 'PERSA');
INSERT INTO `idiomas` VALUES (49, 'POLACO');
INSERT INTO `idiomas` VALUES (50, 'PORTUGUES');
INSERT INTO `idiomas` VALUES (51, 'QUECHUA');
INSERT INTO `idiomas` VALUES (52, 'RUMANO');
INSERT INTO `idiomas` VALUES (53, 'RUSO');
INSERT INTO `idiomas` VALUES (54, 'SARAIKI');
INSERT INTO `idiomas` VALUES (55, 'SERBIO');
INSERT INTO `idiomas` VALUES (56, 'SESOTO');
INSERT INTO `idiomas` VALUES (57, 'SETSUANA');
INSERT INTO `idiomas` VALUES (58, 'SINDI');
INSERT INTO `idiomas` VALUES (59, 'SOMALI');
INSERT INTO `idiomas` VALUES (60, 'SONDANES');
INSERT INTO `idiomas` VALUES (61, 'SUAJILI');
INSERT INTO `idiomas` VALUES (62, 'SUAZI');
INSERT INTO `idiomas` VALUES (63, 'SUDANES');
INSERT INTO `idiomas` VALUES (64, 'SUECO');
INSERT INTO `idiomas` VALUES (65, 'SYLHETI');
INSERT INTO `idiomas` VALUES (66, 'TAGALO');
INSERT INTO `idiomas` VALUES (67, 'TAILANDES');
INSERT INTO `idiomas` VALUES (68, 'TAMIL');
INSERT INTO `idiomas` VALUES (69, 'TELUGU');
INSERT INTO `idiomas` VALUES (70, 'TUNECINO');
INSERT INTO `idiomas` VALUES (71, 'TURCO');
INSERT INTO `idiomas` VALUES (72, 'UCRANIANO');
INSERT INTO `idiomas` VALUES (73, 'UIGUR');
INSERT INTO `idiomas` VALUES (74, 'URDU');
INSERT INTO `idiomas` VALUES (75, 'UZBEKO');
INSERT INTO `idiomas` VALUES (76, 'VIETNAMITA');
INSERT INTO `idiomas` VALUES (77, 'YORUBA');
INSERT INTO `idiomas` VALUES (78, 'ZULU');

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `iduser` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_logs_users_1`(`iduser` ASC) USING BTREE,
  CONSTRAINT `fk_logs_users_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of logs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for militancia
-- ----------------------------
DROP TABLE IF EXISTS `militancia`;
CREATE TABLE `militancia`  (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `militancia` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of militancia
-- ----------------------------
INSERT INTO `militancia` VALUES (1, '-');
INSERT INTO `militancia` VALUES (2, 'PCC');
INSERT INTO `militancia` VALUES (3, 'IJC');
INSERT INTO `militancia` VALUES (4, 'UJC Y PCC');

-- ----------------------------
-- Table structure for motivosbajas
-- ----------------------------
DROP TABLE IF EXISTS `motivosbajas`;
CREATE TABLE `motivosbajas`  (
  `idmotivobaja` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `motivo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idmotivobaja`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of motivosbajas
-- ----------------------------

-- ----------------------------
-- Table structure for motivosviajes
-- ----------------------------
DROP TABLE IF EXISTS `motivosviajes`;
CREATE TABLE `motivosviajes`  (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `motivo` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of motivosviajes
-- ----------------------------

-- ----------------------------
-- Table structure for municipios
-- ----------------------------
DROP TABLE IF EXISTS `municipios`;
CREATE TABLE `municipios`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idprovincia` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_municipios_provincias_1`(`idprovincia` ASC) USING BTREE,
  CONSTRAINT `fk_municipios_provincias_1` FOREIGN KEY (`idprovincia`) REFERENCES `provincias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 170 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of municipios
-- ----------------------------
INSERT INTO `municipios` VALUES (2, 'SANDINO', 1);
INSERT INTO `municipios` VALUES (3, 'MANTUA', 1);
INSERT INTO `municipios` VALUES (4, 'MINAS DE MATAHAMBRE', 1);
INSERT INTO `municipios` VALUES (5, 'VIÑALES', 1);
INSERT INTO `municipios` VALUES (6, 'LA PALMA', 1);
INSERT INTO `municipios` VALUES (7, 'LOS PALACIOS', 1);
INSERT INTO `municipios` VALUES (8, 'CONSOLACION DEL SUR', 1);
INSERT INTO `municipios` VALUES (9, 'PINAR DEL RIO', 1);
INSERT INTO `municipios` VALUES (10, 'SAN LUIS', 1);
INSERT INTO `municipios` VALUES (11, 'SAN JUAN Y MARTINEZ', 1);
INSERT INTO `municipios` VALUES (12, 'GUANE', 1);
INSERT INTO `municipios` VALUES (13, 'BAHIA HONDA', 2);
INSERT INTO `municipios` VALUES (14, 'MARIEL', 2);
INSERT INTO `municipios` VALUES (15, 'GUANAJAY', 2);
INSERT INTO `municipios` VALUES (16, 'CAIMITO', 2);
INSERT INTO `municipios` VALUES (17, 'BAUTA', 2);
INSERT INTO `municipios` VALUES (18, 'SAN ANTONIO DE LOS BAÑOS', 2);
INSERT INTO `municipios` VALUES (19, 'GÜIRA DE MELENA', 2);
INSERT INTO `municipios` VALUES (20, 'ALQUIZAR', 2);
INSERT INTO `municipios` VALUES (21, 'ARTEMISA', 2);
INSERT INTO `municipios` VALUES (22, 'CANDELARIA', 2);
INSERT INTO `municipios` VALUES (23, 'SAN CRISTOBAL', 2);
INSERT INTO `municipios` VALUES (24, 'PLAYA', 3);
INSERT INTO `municipios` VALUES (25, 'PLAZA DE LA REVOLUCION', 3);
INSERT INTO `municipios` VALUES (26, 'CENTRO HABANA', 3);
INSERT INTO `municipios` VALUES (27, 'HABANA VIEJA', 3);
INSERT INTO `municipios` VALUES (28, 'REGLA', 3);
INSERT INTO `municipios` VALUES (29, 'HABANA DEL ESTE', 3);
INSERT INTO `municipios` VALUES (30, 'GUANABACOA', 3);
INSERT INTO `municipios` VALUES (31, 'SAN MIGUEL DEL PADRON', 3);
INSERT INTO `municipios` VALUES (32, 'DIEZ DE OCTUBRE', 3);
INSERT INTO `municipios` VALUES (33, 'CERRO', 3);
INSERT INTO `municipios` VALUES (34, 'MARIANAO', 3);
INSERT INTO `municipios` VALUES (35, 'LA LISA', 3);
INSERT INTO `municipios` VALUES (36, 'BOYEROS', 3);
INSERT INTO `municipios` VALUES (37, 'ARROYO NARANJO', 3);
INSERT INTO `municipios` VALUES (38, 'COTORRO', 3);
INSERT INTO `municipios` VALUES (39, 'BEJUCAL', 4);
INSERT INTO `municipios` VALUES (40, 'SAN JOSE DE LAS LAJAS', 4);
INSERT INTO `municipios` VALUES (41, 'JARUCO', 4);
INSERT INTO `municipios` VALUES (42, 'SANTA CRUZ DEL NORTE', 4);
INSERT INTO `municipios` VALUES (43, 'MADRUGA', 4);
INSERT INTO `municipios` VALUES (44, 'NUEVA PAZ', 4);
INSERT INTO `municipios` VALUES (45, 'SAN NICOLAS DE BARI', 4);
INSERT INTO `municipios` VALUES (46, 'GÜINES', 4);
INSERT INTO `municipios` VALUES (47, 'MELENA DEL SUR', 4);
INSERT INTO `municipios` VALUES (48, 'BATABANO', 4);
INSERT INTO `municipios` VALUES (49, 'QUIVICAN', 4);
INSERT INTO `municipios` VALUES (50, 'MATANZAS', 5);
INSERT INTO `municipios` VALUES (51, 'CARDENAS', 5);
INSERT INTO `municipios` VALUES (52, 'MARTI', 5);
INSERT INTO `municipios` VALUES (53, 'COLON', 5);
INSERT INTO `municipios` VALUES (54, 'PERICO', 5);
INSERT INTO `municipios` VALUES (55, 'JOVELLANOS', 5);
INSERT INTO `municipios` VALUES (56, 'PEDRO BETANCOURT', 5);
INSERT INTO `municipios` VALUES (57, 'LIMONAR', 5);
INSERT INTO `municipios` VALUES (58, 'UNION DE REYES', 5);
INSERT INTO `municipios` VALUES (59, 'CIENAGA DE ZAPATA', 5);
INSERT INTO `municipios` VALUES (60, 'JAGÜEY GRANDE', 5);
INSERT INTO `municipios` VALUES (61, 'CALIMETE', 5);
INSERT INTO `municipios` VALUES (62, 'LOS ARABOS', 5);
INSERT INTO `municipios` VALUES (63, 'CORRALILLO', 6);
INSERT INTO `municipios` VALUES (64, 'QUEMADO DE GÜINES', 6);
INSERT INTO `municipios` VALUES (65, 'SAGUA LA GRANDE', 6);
INSERT INTO `municipios` VALUES (66, 'ENCRUCIJADA', 6);
INSERT INTO `municipios` VALUES (67, 'CAMAJUANI', 6);
INSERT INTO `municipios` VALUES (68, 'CAIBARIEN', 6);
INSERT INTO `municipios` VALUES (69, 'REMEDIOS', 6);
INSERT INTO `municipios` VALUES (70, 'PLACETAS', 6);
INSERT INTO `municipios` VALUES (71, 'SANTA CLARA', 6);
INSERT INTO `municipios` VALUES (72, 'CIFUENTES', 6);
INSERT INTO `municipios` VALUES (73, 'SANTO DOMINGO', 6);
INSERT INTO `municipios` VALUES (74, 'RANCHUELO', 6);
INSERT INTO `municipios` VALUES (75, 'MANICARAGUA', 6);
INSERT INTO `municipios` VALUES (76, 'AGUADA DE PASAJEROS', 7);
INSERT INTO `municipios` VALUES (77, 'RODAS', 7);
INSERT INTO `municipios` VALUES (78, 'PALMIRA', 7);
INSERT INTO `municipios` VALUES (79, 'LAJAS', 7);
INSERT INTO `municipios` VALUES (80, 'ABREUS', 7);
INSERT INTO `municipios` VALUES (81, 'CUMANAYAGUA', 7);
INSERT INTO `municipios` VALUES (82, 'CIENFUEGOS', 7);
INSERT INTO `municipios` VALUES (83, 'CRUCES', 7);
INSERT INTO `municipios` VALUES (84, 'YAGUAJAY', 8);
INSERT INTO `municipios` VALUES (85, 'JATIBONICO', 8);
INSERT INTO `municipios` VALUES (86, 'TAGUASCO', 8);
INSERT INTO `municipios` VALUES (87, 'CABAIGUAN', 8);
INSERT INTO `municipios` VALUES (88, 'FOMENTO', 8);
INSERT INTO `municipios` VALUES (89, 'TRINIDAD', 8);
INSERT INTO `municipios` VALUES (90, 'SANCTI SPIRITUS', 8);
INSERT INTO `municipios` VALUES (91, 'LA SIERPE', 8);
INSERT INTO `municipios` VALUES (92, 'CHAMBAS', 9);
INSERT INTO `municipios` VALUES (93, 'MORON', 9);
INSERT INTO `municipios` VALUES (94, 'BOLIVIA', 9);
INSERT INTO `municipios` VALUES (95, 'PRIMERO DE ENERO', 9);
INSERT INTO `municipios` VALUES (96, 'CIRO REDONDO', 9);
INSERT INTO `municipios` VALUES (97, 'FLORENCIA', 9);
INSERT INTO `municipios` VALUES (98, 'MAJAGUA', 9);
INSERT INTO `municipios` VALUES (99, 'CIEGO DE AVILA', 9);
INSERT INTO `municipios` VALUES (100, 'VENEZUELA', 9);
INSERT INTO `municipios` VALUES (101, 'BARAGUA', 9);
INSERT INTO `municipios` VALUES (102, 'CARLOS MANUEL DE CESPEDES', 10);
INSERT INTO `municipios` VALUES (103, 'ESMERALDA', 10);
INSERT INTO `municipios` VALUES (104, 'SIERRA DE CUBITAS', 10);
INSERT INTO `municipios` VALUES (105, 'MINAS', 10);
INSERT INTO `municipios` VALUES (106, 'NUEVITAS', 10);
INSERT INTO `municipios` VALUES (107, 'GUAIMARO', 10);
INSERT INTO `municipios` VALUES (108, 'SIBANICU', 10);
INSERT INTO `municipios` VALUES (109, 'CAMAGÜEY', 10);
INSERT INTO `municipios` VALUES (110, 'FLORIDA', 10);
INSERT INTO `municipios` VALUES (111, 'VERTIENTES', 10);
INSERT INTO `municipios` VALUES (112, 'JIMAGUAYU', 10);
INSERT INTO `municipios` VALUES (113, 'NAJASA', 10);
INSERT INTO `municipios` VALUES (114, 'SANTA CRUZ DEL SUR', 10);
INSERT INTO `municipios` VALUES (115, 'MANATI', 11);
INSERT INTO `municipios` VALUES (116, 'PUERTO PADRE', 11);
INSERT INTO `municipios` VALUES (117, 'JESUS MENENDEZ', 11);
INSERT INTO `municipios` VALUES (118, 'MAJIBACOA', 11);
INSERT INTO `municipios` VALUES (119, 'LAS TUNAS', 11);
INSERT INTO `municipios` VALUES (120, 'JOBABO', 11);
INSERT INTO `municipios` VALUES (121, 'COLOMBIA', 11);
INSERT INTO `municipios` VALUES (122, 'AMANCIO', 11);
INSERT INTO `municipios` VALUES (123, 'GIBARA', 12);
INSERT INTO `municipios` VALUES (124, 'RAFAEL FREYRE', 12);
INSERT INTO `municipios` VALUES (125, 'BANES', 12);
INSERT INTO `municipios` VALUES (126, 'ANTILLA', 12);
INSERT INTO `municipios` VALUES (127, 'BAGUANOS', 12);
INSERT INTO `municipios` VALUES (128, 'HOLGUIN', 12);
INSERT INTO `municipios` VALUES (129, 'CALIXTO GARCIA', 12);
INSERT INTO `municipios` VALUES (130, 'CACOCUM', 12);
INSERT INTO `municipios` VALUES (131, 'URBANO NORIS', 12);
INSERT INTO `municipios` VALUES (132, 'CUETO', 12);
INSERT INTO `municipios` VALUES (133, 'MAYARI', 12);
INSERT INTO `municipios` VALUES (134, 'FRANK PAIS', 12);
INSERT INTO `municipios` VALUES (135, 'SAGUA DE TANAMO', 12);
INSERT INTO `municipios` VALUES (136, 'MOA', 12);
INSERT INTO `municipios` VALUES (137, 'RIO CAUTO', 13);
INSERT INTO `municipios` VALUES (138, 'CAUTO CRISTO', 13);
INSERT INTO `municipios` VALUES (139, 'JIGUANI', 13);
INSERT INTO `municipios` VALUES (140, 'BAYAMO', 13);
INSERT INTO `municipios` VALUES (141, 'YARA', 13);
INSERT INTO `municipios` VALUES (142, 'MANZANILLO', 13);
INSERT INTO `municipios` VALUES (143, 'CAMPECHUELA', 13);
INSERT INTO `municipios` VALUES (144, 'MEDIA LUNA', 13);
INSERT INTO `municipios` VALUES (145, 'NIQUERO', 13);
INSERT INTO `municipios` VALUES (146, 'PILON', 13);
INSERT INTO `municipios` VALUES (147, 'BARTOLOME MASO', 13);
INSERT INTO `municipios` VALUES (148, 'BUEY ARRIBA', 13);
INSERT INTO `municipios` VALUES (149, 'GUISA', 13);
INSERT INTO `municipios` VALUES (150, 'CONTRAMAESTRE', 14);
INSERT INTO `municipios` VALUES (151, 'MELLA', 14);
INSERT INTO `municipios` VALUES (152, 'SAN LUIS', 14);
INSERT INTO `municipios` VALUES (153, 'SEGUNDO FRENTE', 14);
INSERT INTO `municipios` VALUES (154, 'SONGO - LA MAYA', 14);
INSERT INTO `municipios` VALUES (155, 'SANTIAGO DE CUBA', 14);
INSERT INTO `municipios` VALUES (156, 'PALMA SORIANO', 14);
INSERT INTO `municipios` VALUES (157, 'TERCER FRENTE', 14);
INSERT INTO `municipios` VALUES (158, 'GUAMA', 14);
INSERT INTO `municipios` VALUES (159, 'EL SALVADOR', 15);
INSERT INTO `municipios` VALUES (160, 'GUANTANAMO', 15);
INSERT INTO `municipios` VALUES (161, 'YATERAS', 15);
INSERT INTO `municipios` VALUES (162, 'BARACOA', 15);
INSERT INTO `municipios` VALUES (163, 'MAISI', 15);
INSERT INTO `municipios` VALUES (164, 'IMIAS', 15);
INSERT INTO `municipios` VALUES (165, 'SAN ANTONIO DEL SUR', 15);
INSERT INTO `municipios` VALUES (166, 'MANUEL TAMES', 15);
INSERT INTO `municipios` VALUES (167, 'CAIMANERA', 15);
INSERT INTO `municipios` VALUES (168, 'NICETO PEREZ', 15);
INSERT INTO `municipios` VALUES (169, 'ISLA DE LA JUVENTUD', 16);

-- ----------------------------
-- Table structure for notas
-- ----------------------------
DROP TABLE IF EXISTS `notas`;
CREATE TABLE `notas`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `idexpediente` bigint UNSIGNED NOT NULL,
  `nota` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fechanota` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_notas_expedientes_1`(`idexpediente` ASC) USING BTREE,
  CONSTRAINT `fk_notas_expedientes_1` FOREIGN KEY (`idexpediente`) REFERENCES `expedientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of notas
-- ----------------------------

-- ----------------------------
-- Table structure for paises
-- ----------------------------
DROP TABLE IF EXISTS `paises`;
CREATE TABLE `paises`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 203 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of paises
-- ----------------------------
INSERT INTO `paises` VALUES (1, ' AFGANISTAN');
INSERT INTO `paises` VALUES (2, ' ALBANIA');
INSERT INTO `paises` VALUES (3, ' ALEMANIA');
INSERT INTO `paises` VALUES (4, ' ANDORRA');
INSERT INTO `paises` VALUES (5, ' ANGOLA');
INSERT INTO `paises` VALUES (6, ' ANTIGUA Y BARBUDA');
INSERT INTO `paises` VALUES (7, ' ARABIA SAUDITA');
INSERT INTO `paises` VALUES (8, ' ARGELIA');
INSERT INTO `paises` VALUES (9, ' ARGENTINA');
INSERT INTO `paises` VALUES (10, ' ARMENIA');
INSERT INTO `paises` VALUES (11, ' AUSTRALIA');
INSERT INTO `paises` VALUES (12, ' AUSTRIA');
INSERT INTO `paises` VALUES (13, ' AZERBAIYAN');
INSERT INTO `paises` VALUES (14, ' BAHAMAS');
INSERT INTO `paises` VALUES (15, ' BANGLADES');
INSERT INTO `paises` VALUES (16, ' BARBADOS');
INSERT INTO `paises` VALUES (17, ' BAREIN');
INSERT INTO `paises` VALUES (18, ' BELGICA');
INSERT INTO `paises` VALUES (19, ' BELICE');
INSERT INTO `paises` VALUES (20, ' BENIN');
INSERT INTO `paises` VALUES (21, ' BIELORRUSIA');
INSERT INTO `paises` VALUES (22, ' BIRMANIA');
INSERT INTO `paises` VALUES (23, ' BOLIVIA');
INSERT INTO `paises` VALUES (24, ' BOSNIA Y HERZEGOVINA');
INSERT INTO `paises` VALUES (25, ' BOTSUANA');
INSERT INTO `paises` VALUES (26, ' BRASIL');
INSERT INTO `paises` VALUES (27, ' BRUNEI');
INSERT INTO `paises` VALUES (28, ' BULGARIA');
INSERT INTO `paises` VALUES (29, ' BURKINA FASO');
INSERT INTO `paises` VALUES (30, ' BURUNDI');
INSERT INTO `paises` VALUES (31, ' BUTAN');
INSERT INTO `paises` VALUES (32, ' CABO VERDE');
INSERT INTO `paises` VALUES (33, ' CAMBOYA');
INSERT INTO `paises` VALUES (34, ' CAMERUN');
INSERT INTO `paises` VALUES (35, ' CANADA');
INSERT INTO `paises` VALUES (36, ' CATAR');
INSERT INTO `paises` VALUES (37, ' CHAD');
INSERT INTO `paises` VALUES (38, ' CHILE');
INSERT INTO `paises` VALUES (39, ' CHINA');
INSERT INTO `paises` VALUES (40, ' CHIPRE');
INSERT INTO `paises` VALUES (41, ' COLOMBIA');
INSERT INTO `paises` VALUES (42, ' COMORAS');
INSERT INTO `paises` VALUES (43, ' COREA DEL NORTE');
INSERT INTO `paises` VALUES (44, ' COREA DEL SUR');
INSERT INTO `paises` VALUES (45, ' COSTA DE MARFIL');
INSERT INTO `paises` VALUES (46, ' COSTA RICA');
INSERT INTO `paises` VALUES (47, ' CROACIA');
INSERT INTO `paises` VALUES (48, ' CUBA');
INSERT INTO `paises` VALUES (49, ' DINAMARCA');
INSERT INTO `paises` VALUES (50, ' DOMINICA');
INSERT INTO `paises` VALUES (51, ' ECUADOR');
INSERT INTO `paises` VALUES (52, ' EGIPTO');
INSERT INTO `paises` VALUES (53, ' EL SALVADOR');
INSERT INTO `paises` VALUES (54, ' EMIRATOS ARABES UNIDOS');
INSERT INTO `paises` VALUES (55, ' ERITREA');
INSERT INTO `paises` VALUES (56, ' ESLOVAQUIA');
INSERT INTO `paises` VALUES (57, ' ESLOVENIA');
INSERT INTO `paises` VALUES (58, ' ESPAÑA');
INSERT INTO `paises` VALUES (59, ' ESTADOS UNIDOS DE AMERICA');
INSERT INTO `paises` VALUES (60, ' ESTONIA');
INSERT INTO `paises` VALUES (61, ' ETIOPIA');
INSERT INTO `paises` VALUES (62, ' FILIPINAS');
INSERT INTO `paises` VALUES (63, ' FINLANDIA');
INSERT INTO `paises` VALUES (64, ' FIYI');
INSERT INTO `paises` VALUES (65, ' FRANCIA');
INSERT INTO `paises` VALUES (66, ' GABON');
INSERT INTO `paises` VALUES (67, ' GAMBIA');
INSERT INTO `paises` VALUES (68, ' GEORGIA');
INSERT INTO `paises` VALUES (69, ' GHANA');
INSERT INTO `paises` VALUES (70, ' GRANADA');
INSERT INTO `paises` VALUES (71, ' GRECIA');
INSERT INTO `paises` VALUES (72, ' GUATEMALA');
INSERT INTO `paises` VALUES (73, ' GUINEA');
INSERT INTO `paises` VALUES (74, ' GUINEA-BISAU');
INSERT INTO `paises` VALUES (75, ' GUINEA ECUATORIAL');
INSERT INTO `paises` VALUES (76, ' GUYANA');
INSERT INTO `paises` VALUES (77, ' HAITI');
INSERT INTO `paises` VALUES (78, ' HONDURAS');
INSERT INTO `paises` VALUES (79, ' HUNGRIA');
INSERT INTO `paises` VALUES (80, ' INDIA');
INSERT INTO `paises` VALUES (81, ' INDONESIA');
INSERT INTO `paises` VALUES (82, ' IRAK');
INSERT INTO `paises` VALUES (83, ' IRAN');
INSERT INTO `paises` VALUES (84, ' IRLANDA');
INSERT INTO `paises` VALUES (85, ' ISLANDIA');
INSERT INTO `paises` VALUES (86, ' ISLAS MARSHALL');
INSERT INTO `paises` VALUES (87, ' ISLAS SALOMON');
INSERT INTO `paises` VALUES (88, ' ISRAEL');
INSERT INTO `paises` VALUES (89, ' ITALIA');
INSERT INTO `paises` VALUES (90, ' JAMAICA');
INSERT INTO `paises` VALUES (91, ' JAPON');
INSERT INTO `paises` VALUES (92, ' JORDANIA');
INSERT INTO `paises` VALUES (93, ' KAZAJISTAN');
INSERT INTO `paises` VALUES (94, ' KENIA');
INSERT INTO `paises` VALUES (95, ' KIRGUISTAN');
INSERT INTO `paises` VALUES (96, ' KIRIBATI');
INSERT INTO `paises` VALUES (97, ' KUWAIT');
INSERT INTO `paises` VALUES (98, ' LAOS');
INSERT INTO `paises` VALUES (99, ' LESOTO');
INSERT INTO `paises` VALUES (100, ' LETONIA');
INSERT INTO `paises` VALUES (101, ' LIBANO');
INSERT INTO `paises` VALUES (102, ' LIBERIA');
INSERT INTO `paises` VALUES (103, ' LIBIA');
INSERT INTO `paises` VALUES (104, ' LIECHTENSTEIN');
INSERT INTO `paises` VALUES (105, ' LITUANIA');
INSERT INTO `paises` VALUES (106, ' LUXEMBURGO');
INSERT INTO `paises` VALUES (107, ' MACEDONIA DEL NORTE');
INSERT INTO `paises` VALUES (108, ' MADAGASCAR');
INSERT INTO `paises` VALUES (109, ' MALASIA');
INSERT INTO `paises` VALUES (110, ' MALAUI');
INSERT INTO `paises` VALUES (111, ' MALDIVAS');
INSERT INTO `paises` VALUES (112, ' MALI');
INSERT INTO `paises` VALUES (113, ' MALTA');
INSERT INTO `paises` VALUES (114, ' MARRUECOS');
INSERT INTO `paises` VALUES (115, ' MAURICIO');
INSERT INTO `paises` VALUES (116, ' MAURITANIA');
INSERT INTO `paises` VALUES (117, ' MEXICO');
INSERT INTO `paises` VALUES (118, ' MICRONESIA');
INSERT INTO `paises` VALUES (119, ' MOLDAVIA');
INSERT INTO `paises` VALUES (120, ' MONACO');
INSERT INTO `paises` VALUES (121, ' MONGOLIA');
INSERT INTO `paises` VALUES (122, ' MONTENEGRO');
INSERT INTO `paises` VALUES (123, ' MOZAMBIQUE');
INSERT INTO `paises` VALUES (124, ' NAMIBIA');
INSERT INTO `paises` VALUES (125, ' NAURU');
INSERT INTO `paises` VALUES (126, ' NEPAL');
INSERT INTO `paises` VALUES (127, ' NICARAGUA');
INSERT INTO `paises` VALUES (128, ' NIGER');
INSERT INTO `paises` VALUES (129, ' NIGERIA');
INSERT INTO `paises` VALUES (130, ' NORUEGA');
INSERT INTO `paises` VALUES (131, ' NUEVA ZELANDA');
INSERT INTO `paises` VALUES (132, ' OMAN');
INSERT INTO `paises` VALUES (133, ' PAISES BAJOS');
INSERT INTO `paises` VALUES (134, ' PAKISTAN');
INSERT INTO `paises` VALUES (135, ' PALAOS');
INSERT INTO `paises` VALUES (136, ' PANAMA');
INSERT INTO `paises` VALUES (137, ' PAPUA NUEVA GUINEA');
INSERT INTO `paises` VALUES (138, ' PARAGUAY');
INSERT INTO `paises` VALUES (139, ' PERU');
INSERT INTO `paises` VALUES (140, ' POLONIA');
INSERT INTO `paises` VALUES (141, ' PORTUGAL');
INSERT INTO `paises` VALUES (142, ' REINO UNIDO');
INSERT INTO `paises` VALUES (143, ' REPUBLICA CENTROAFRICANA');
INSERT INTO `paises` VALUES (144, ' REPUBLICA CHECA');
INSERT INTO `paises` VALUES (145, ' REPUBLICA DEL CONGO');
INSERT INTO `paises` VALUES (146, ' REPUBLICA DEMOCRATICA DEL CONGO');
INSERT INTO `paises` VALUES (147, ' REPUBLICA DOMINICANA');
INSERT INTO `paises` VALUES (148, ' RUANDA');
INSERT INTO `paises` VALUES (149, ' RUMANIA');
INSERT INTO `paises` VALUES (150, ' RUSIA');
INSERT INTO `paises` VALUES (151, ' SAMOA');
INSERT INTO `paises` VALUES (152, ' SAN CRISTOBAL Y NIEVES');
INSERT INTO `paises` VALUES (153, ' SAN MARINO');
INSERT INTO `paises` VALUES (154, ' SAN VICENTE Y LAS GRANADINAS');
INSERT INTO `paises` VALUES (155, ' SANTA LUCIA');
INSERT INTO `paises` VALUES (156, ' SANTO TOME Y PRINCIPE');
INSERT INTO `paises` VALUES (157, ' SENEGAL');
INSERT INTO `paises` VALUES (158, ' SERBIA');
INSERT INTO `paises` VALUES (159, ' SEYCHELLES');
INSERT INTO `paises` VALUES (160, ' SIERRA LEONA');
INSERT INTO `paises` VALUES (161, ' SINGAPUR');
INSERT INTO `paises` VALUES (162, ' SIRIA');
INSERT INTO `paises` VALUES (163, ' SOMALIA');
INSERT INTO `paises` VALUES (164, ' SRI LANKA');
INSERT INTO `paises` VALUES (165, ' SUAZILANDIA');
INSERT INTO `paises` VALUES (166, ' SUDAFRICA');
INSERT INTO `paises` VALUES (167, ' SUDAN');
INSERT INTO `paises` VALUES (168, ' SUDAN DEL SUR');
INSERT INTO `paises` VALUES (169, ' SUECIA');
INSERT INTO `paises` VALUES (170, ' SUIZA');
INSERT INTO `paises` VALUES (171, ' SURINAM');
INSERT INTO `paises` VALUES (172, ' TAILANDIA');
INSERT INTO `paises` VALUES (173, ' TANZANIA');
INSERT INTO `paises` VALUES (174, ' TAYIKISTAN');
INSERT INTO `paises` VALUES (175, ' TIMOR ORIENTAL');
INSERT INTO `paises` VALUES (176, ' TOGO');
INSERT INTO `paises` VALUES (177, ' TONGA');
INSERT INTO `paises` VALUES (178, ' TRINIDAD Y TOBAGO');
INSERT INTO `paises` VALUES (179, ' TUNEZ');
INSERT INTO `paises` VALUES (180, ' TURKMENISTAN');
INSERT INTO `paises` VALUES (181, ' TURQUIA');
INSERT INTO `paises` VALUES (182, ' TUVALU');
INSERT INTO `paises` VALUES (183, ' UCRANIA');
INSERT INTO `paises` VALUES (184, ' UGANDA');
INSERT INTO `paises` VALUES (185, ' URUGUAY');
INSERT INTO `paises` VALUES (186, ' UZBEKISTAN');
INSERT INTO `paises` VALUES (187, ' VANUATU');
INSERT INTO `paises` VALUES (188, ' VENEZUELA');
INSERT INTO `paises` VALUES (189, ' VIETNAM');
INSERT INTO `paises` VALUES (190, ' YEMEN');
INSERT INTO `paises` VALUES (191, ' YIBUTI');
INSERT INTO `paises` VALUES (192, ' ZAMBIA');
INSERT INTO `paises` VALUES (193, ' ZIMBABUE');
INSERT INTO `paises` VALUES (194, 'SUDAFRICA');
INSERT INTO `paises` VALUES (195, 'BAHAMAS');
INSERT INTO `paises` VALUES (196, 'GUINEA ECUATORIAL');
INSERT INTO `paises` VALUES (197, 'ARGENTINA');
INSERT INTO `paises` VALUES (198, 'JAMAICA');
INSERT INTO `paises` VALUES (199, 'REPUBLICA ARABE SAHARAUI');
INSERT INTO `paises` VALUES (200, 'HONDURAS');
INSERT INTO `paises` VALUES (201, 'VENEZUELA');
INSERT INTO `paises` VALUES (202, 'ESPAÑA');

-- ----------------------------
-- Table structure for pasaportes
-- ----------------------------
DROP TABLE IF EXISTS `pasaportes`;
CREATE TABLE `pasaportes`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `idcolaborador` bigint UNSIGNED NOT NULL,
  `idtipopasaporte` smallint UNSIGNED NOT NULL,
  `numeropasaporte` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `numeroarchivo` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechavencimiento` date NOT NULL,
  `idubicacion` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_pasaportes_tipos_pasaporte_1`(`idtipopasaporte` ASC) USING BTREE,
  INDEX `fk_pasaportes_ubicacionespasaportes_1`(`idubicacion` ASC) USING BTREE,
  INDEX `fk_pasaportes_colaboradores_1`(`idcolaborador` ASC) USING BTREE,
  CONSTRAINT `fk_pasaportes_colaboradores_1` FOREIGN KEY (`idcolaborador`) REFERENCES `colaboradores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasaportes_tipos_pasaporte_1` FOREIGN KEY (`idtipopasaporte`) REFERENCES `tipospasaporte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasaportes_ubicacionespasaportes_1` FOREIGN KEY (`idubicacion`) REFERENCES `ubicacionespasaportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pasaportes
-- ----------------------------
INSERT INTO `pasaportes` VALUES (1, 1, 1, 'E377852', '', '2026-12-29', 1);
INSERT INTO `pasaportes` VALUES (2, 2, 1, 'E432856', '', '2029-04-04', 1);
INSERT INTO `pasaportes` VALUES (3, 3, 1, 'E367974', '', '2025-10-25', 1);
INSERT INTO `pasaportes` VALUES (4, 4, 1, 'E478628', '', '2027-08-18', 1);
INSERT INTO `pasaportes` VALUES (5, 5, 1, 'E507796', '', '2027-12-16', 1);
INSERT INTO `pasaportes` VALUES (6, 6, 1, 'E403847', '', '2027-08-07', 1);
INSERT INTO `pasaportes` VALUES (7, 7, 2, 'L406453', '', '2029-04-04', 1);
INSERT INTO `pasaportes` VALUES (8, 8, 1, 'E368227', '', '2028-06-09', 1);
INSERT INTO `pasaportes` VALUES (9, 9, 1, 'E364036', '', '2026-02-24', 1);
INSERT INTO `pasaportes` VALUES (10, 10, 1, 'E366778', '', '2028-06-09', 1);
INSERT INTO `pasaportes` VALUES (11, 11, 1, 'E367245', '', '2028-05-30', 1);
INSERT INTO `pasaportes` VALUES (12, 12, 1, 'E367394', '', '2026-10-09', 1);
INSERT INTO `pasaportes` VALUES (13, 13, 1, 'E367948', '', '2026-11-12', 1);
INSERT INTO `pasaportes` VALUES (14, 14, 1, 'E375741', '', '2024-05-06', 1);
INSERT INTO `pasaportes` VALUES (15, 15, 1, 'E413225', '', '2027-09-01', 1);
INSERT INTO `pasaportes` VALUES (16, 16, 1, 'E353544', '', '2028-11-08', 1);
INSERT INTO `pasaportes` VALUES (17, 17, 1, 'E366785', '', '2028-11-08', 1);
INSERT INTO `pasaportes` VALUES (18, 18, 1, 'E390129', '', '2028-11-08', 1);
INSERT INTO `pasaportes` VALUES (19, 19, 1, 'E457325', '', '2028-11-08', 1);
INSERT INTO `pasaportes` VALUES (20, 20, 1, 'E475854', '', '2028-11-08', 1);
INSERT INTO `pasaportes` VALUES (21, 21, 1, 'E507647', '', '2028-11-08', 1);
INSERT INTO `pasaportes` VALUES (22, 22, 1, 'E375323', '', '2028-11-08', 1);
INSERT INTO `pasaportes` VALUES (23, 23, 1, 'E367542', '', '2028-11-08', 1);
INSERT INTO `pasaportes` VALUES (24, 24, 1, 'E475858', '', '2028-11-08', 1);
INSERT INTO `pasaportes` VALUES (25, 25, 1, 'E372278', '', '2028-11-23', 1);
INSERT INTO `pasaportes` VALUES (26, 26, 1, 'E403838', '', '2029-07-18', 1);
INSERT INTO `pasaportes` VALUES (27, 27, 1, 'E422382', '', '2029-07-18', 1);
INSERT INTO `pasaportes` VALUES (28, 28, 1, 'E377758', '', '2029-04-04', 1);
INSERT INTO `pasaportes` VALUES (29, 29, 1, 'E463669', '', '2029-04-04', 1);
INSERT INTO `pasaportes` VALUES (30, 30, 1, 'E503271', '', '2028-12-03', 1);

-- ----------------------------
-- Table structure for prestamospasaportes
-- ----------------------------
DROP TABLE IF EXISTS `prestamospasaportes`;
CREATE TABLE `prestamospasaportes`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpasaporte` bigint UNSIGNED NOT NULL,
  `fechasolicitud` date NOT NULL,
  `fechaprestamo` date NOT NULL,
  `fechadevolucion` date NULL DEFAULT NULL,
  `fecharegistrado` date NOT NULL,
  `nombreregistra` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `institución` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `motivo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `observacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_prestamospasaportes_pasaportes_1`(`idpasaporte` ASC) USING BTREE,
  CONSTRAINT `fk_prestamospasaportes_pasaportes_1` FOREIGN KEY (`idpasaporte`) REFERENCES `pasaportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of prestamospasaportes
-- ----------------------------

-- ----------------------------
-- Table structure for prorrogas
-- ----------------------------
DROP TABLE IF EXISTS `prorrogas`;
CREATE TABLE `prorrogas`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `idcontrato` bigint UNSIGNED NOT NULL,
  `numerosuplemento` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fechainicial` date NOT NULL,
  `fechafinal` date NOT NULL,
  `fechaprorroga` date NOT NULL,
  `observaciones` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_prorrogas_contratos_1`(`idcontrato` ASC) USING BTREE,
  CONSTRAINT `fk_prorrogas_contratos_1` FOREIGN KEY (`idcontrato`) REFERENCES `contratos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of prorrogas
-- ----------------------------
INSERT INTO `prorrogas` VALUES (1, 1, '1', '2020-01-08', '2021-09-30', '2019-01-11', '');
INSERT INTO `prorrogas` VALUES (2, 2, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (3, 3, '0', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (4, 4, '0', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (5, 5, '0', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (6, 6, '0', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (7, 7, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (8, 8, '0', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (9, 9, '0', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (10, 10, '0', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (11, 11, '0', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (12, 12, '0', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (13, 13, '0', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (14, 14, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (15, 15, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (16, 16, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (17, 17, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (18, 18, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (19, 19, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (20, 20, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (21, 21, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (22, 22, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (23, 23, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (24, 24, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (25, 25, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (26, 26, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (27, 27, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (28, 28, '0', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (29, 29, '', '1970-01-01', '1970-01-01', '1970-01-01', '');
INSERT INTO `prorrogas` VALUES (30, 30, '', '1970-01-01', '1970-01-01', '1970-01-01', '');

-- ----------------------------
-- Table structure for provincias
-- ----------------------------
DROP TABLE IF EXISTS `provincias`;
CREATE TABLE `provincias`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of provincias
-- ----------------------------
INSERT INTO `provincias` VALUES (1, 'PINAR DEL RIO');
INSERT INTO `provincias` VALUES (2, 'ARTEMISA');
INSERT INTO `provincias` VALUES (3, 'LA HABANA');
INSERT INTO `provincias` VALUES (4, 'MAYABEQUE');
INSERT INTO `provincias` VALUES (5, 'MATANZAS');
INSERT INTO `provincias` VALUES (6, 'VILLA CLARA');
INSERT INTO `provincias` VALUES (7, 'CIENFUEGOS');
INSERT INTO `provincias` VALUES (8, 'SANCTI SPIRITUS');
INSERT INTO `provincias` VALUES (9, 'CIEGO DE AVILA');
INSERT INTO `provincias` VALUES (10, 'CAMAGÜEY');
INSERT INTO `provincias` VALUES (11, 'LAS TUNAS');
INSERT INTO `provincias` VALUES (12, 'HOLGUIN');
INSERT INTO `provincias` VALUES (13, 'GRANMA');
INSERT INTO `provincias` VALUES (14, 'SANTIAGO DE CUBA');
INSERT INTO `provincias` VALUES (15, 'GUANTANAMO');
INSERT INTO `provincias` VALUES (16, 'MUNICIPIO ESPECIAL');

-- ----------------------------
-- Table structure for salidaspor
-- ----------------------------
DROP TABLE IF EXISTS `salidaspor`;
CREATE TABLE `salidaspor`  (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of salidaspor
-- ----------------------------
INSERT INTO `salidaspor` VALUES (1, 'MINED');
INSERT INTO `salidaspor` VALUES (2, 'ICCP');
INSERT INTO `salidaspor` VALUES (3, 'ICE');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `type` varchar(31) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'string',
  `context` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of settings
-- ----------------------------

-- ----------------------------
-- Table structure for sexos
-- ----------------------------
DROP TABLE IF EXISTS `sexos`;
CREATE TABLE `sexos`  (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sexo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sexos
-- ----------------------------
INSERT INTO `sexos` VALUES (1, 'FEMENINO');
INSERT INTO `sexos` VALUES (2, 'MASCULINO');

-- ----------------------------
-- Table structure for tiposactividades
-- ----------------------------
DROP TABLE IF EXISTS `tiposactividades`;
CREATE TABLE `tiposactividades`  (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipoactividad` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tiposactividades
-- ----------------------------

-- ----------------------------
-- Table structure for tiposcentros
-- ----------------------------
DROP TABLE IF EXISTS `tiposcentros`;
CREATE TABLE `tiposcentros`  (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipocentro` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tiposcentros
-- ----------------------------
INSERT INTO `tiposcentros` VALUES (1, 'DPE');
INSERT INTO `tiposcentros` VALUES (2, 'N/A');
INSERT INTO `tiposcentros` VALUES (3, 'X');
INSERT INTO `tiposcentros` VALUES (4, 'AAA');
INSERT INTO `tiposcentros` VALUES (5, 'BBB');
INSERT INTO `tiposcentros` VALUES (6, 'aaabbb');

-- ----------------------------
-- Table structure for tiposgastos
-- ----------------------------
DROP TABLE IF EXISTS `tiposgastos`;
CREATE TABLE `tiposgastos`  (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `concepto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `moneda` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `importe` double NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tiposgastos
-- ----------------------------

-- ----------------------------
-- Table structure for tipospasaporte
-- ----------------------------
DROP TABLE IF EXISTS `tipospasaporte`;
CREATE TABLE `tipospasaporte`  (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pasaporte` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tipospasaporte
-- ----------------------------
INSERT INTO `tipospasaporte` VALUES (1, 'OFI');
INSERT INTO `tipospasaporte` VALUES (2, 'ORD');

-- ----------------------------
-- Table structure for tramitespasaportes
-- ----------------------------
DROP TABLE IF EXISTS `tramitespasaportes`;
CREATE TABLE `tramitespasaportes`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `numeroarchivo` varchar(33) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idcolaborador` bigint UNSIGNED NOT NULL,
  `idtipotramite` smallint UNSIGNED NOT NULL,
  `importesello` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idestadotramite` smallint UNSIGNED NOT NULL,
  `idexpediente` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_tramites_pasaporte_estados_tramites_1`(`idestadotramite` ASC) USING BTREE,
  INDEX `fk_tramites_pasaporte_expedientes_1`(`idexpediente` ASC) USING BTREE,
  INDEX `fk_tramites_pasaporte_tipos_pasaporte_1`(`idtipotramite` ASC) USING BTREE,
  INDEX `fk_tramitespasaportes_colaboradores_1`(`idcolaborador` ASC) USING BTREE,
  CONSTRAINT `fk_tramites_pasaporte_estados_tramites_1` FOREIGN KEY (`idestadotramite`) REFERENCES `estadostramites` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tramites_pasaporte_expedientes_1` FOREIGN KEY (`idexpediente`) REFERENCES `expedientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tramites_pasaporte_tipos_pasaporte_1` FOREIGN KEY (`idtipotramite`) REFERENCES `tipospasaporte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tramitespasaportes_colaboradores_1` FOREIGN KEY (`idcolaborador`) REFERENCES `colaboradores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tramitespasaportes
-- ----------------------------

-- ----------------------------
-- Table structure for ubicacionespasaportes
-- ----------------------------
DROP TABLE IF EXISTS `ubicacionespasaportes`;
CREATE TABLE `ubicacionespasaportes`  (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ubicacionespasaportes
-- ----------------------------
INSERT INTO `ubicacionespasaportes` VALUES (1, '');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_message` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `last_active` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'ice', NULL, NULL, 1, '2024-06-29 04:04:01', '2024-06-29 02:23:31', '2024-06-29 02:23:32', NULL);
INSERT INTO `users` VALUES (2, 'admin', NULL, NULL, 0, NULL, '2024-06-29 13:28:50', '2024-06-29 13:28:50', NULL);

-- ----------------------------
-- Table structure for visas
-- ----------------------------
DROP TABLE IF EXISTS `visas`;
CREATE TABLE `visas`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `idpasaporte` bigint UNSIGNED NOT NULL,
  `idpais` int UNSIGNED NOT NULL,
  `fechaexpedicion` date NOT NULL,
  `fechavencimiento` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_visas_paises_1`(`idpais` ASC) USING BTREE,
  INDEX `fk_visas_pasaportes_1`(`idpasaporte` ASC) USING BTREE,
  CONSTRAINT `fk_visas_paises_1` FOREIGN KEY (`idpais`) REFERENCES `paises` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_visas_pasaportes_1` FOREIGN KEY (`idpasaporte`) REFERENCES `pasaportes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of visas
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
