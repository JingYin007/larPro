/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : lar_pro

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-08-23 17:52:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lar_articles`
-- ----------------------------
DROP TABLE IF EXISTS `lar_articles`;
CREATE TABLE `lar_articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lar_articles
-- ----------------------------
INSERT INTO `lar_articles` VALUES ('2', 'Title 1', 'Body 1', '1', '2017-08-22 03:55:36', '2017-08-22 03:55:36');
INSERT INTO `lar_articles` VALUES ('3', 'Title 2', 'Body 2', '1', '2017-08-22 03:55:36', '2017-08-22 03:55:36');
INSERT INTO `lar_articles` VALUES ('4', 'Title 3', 'Body 3', '1', '2017-08-22 03:55:36', '2017-08-22 03:55:36');
INSERT INTO `lar_articles` VALUES ('6', 'Title 5', 'Body 5', '1', '2017-08-22 03:55:36', '2017-08-22 03:55:36');
INSERT INTO `lar_articles` VALUES ('7', 'Title 6', 'Body 6', '1', '2017-08-22 03:55:37', '2017-08-22 03:55:37');
INSERT INTO `lar_articles` VALUES ('8', 'Title 7777777777', 'Body 77777777', '1', '2017-08-22 03:55:37', '2017-08-22 18:03:02');
INSERT INTO `lar_articles` VALUES ('9', 'Title 8', 'Body 8', '1', '2017-08-22 03:55:37', '2017-08-22 03:55:37');
INSERT INTO `lar_articles` VALUES ('11', '你是那个妖精', '要你管啊！！！', '1', '2017-08-22 17:46:37', '2017-08-22 17:46:37');
INSERT INTO `lar_articles` VALUES ('12', '我是谁', '我怎么知道你是谁！爱谁谁。。。', '1', '2017-08-22 17:47:55', '2017-08-22 17:47:55');

-- ----------------------------
-- Table structure for `lar_baby`
-- ----------------------------
DROP TABLE IF EXISTS `lar_baby`;
CREATE TABLE `lar_baby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lar_baby
-- ----------------------------
INSERT INTO `lar_baby` VALUES ('5', 'Feaa', '41');
INSERT INTO `lar_baby` VALUES ('6', 'Feaa', '41');
INSERT INTO `lar_baby` VALUES ('7', '赵云', '48');

-- ----------------------------
-- Table structure for `lar_comments`
-- ----------------------------
DROP TABLE IF EXISTS `lar_comments`;
CREATE TABLE `lar_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `article_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lar_comments
-- ----------------------------
INSERT INTO `lar_comments` VALUES ('1', 'bababa', '18831605741@163.com', 'www', '这倒是个有意思的问题................', '2', '2017-08-23 09:17:23', '2017-08-23 09:17:23');
INSERT INTO `lar_comments` VALUES ('2', 'A', 'qinminghui1230@163.com', 'dsdsds', '@bababa sdsadasdasdasdasdas', '2', '2017-08-23 09:18:31', '2017-08-23 09:18:31');

-- ----------------------------
-- Table structure for `lar_users`
-- ----------------------------
DROP TABLE IF EXISTS `lar_users`;
CREATE TABLE `lar_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lar_users
-- ----------------------------
INSERT INTO `lar_users` VALUES ('1', 'mutou', '930959695@qq.com', '$2y$10$oCJd.UkBNqfFNg6ovF/4/OVr2FX0wHxg6E3fraNKczqBy4cr5EcCS', 'xmA7XxXz9gps6fv6l9prY3zWlcRWQb9qPEcDqH2GT3J2sq8Pfs76iQhzVnf3', '2017-08-22 02:59:23', '2017-08-22 17:10:40');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2017_08_22_034937_create_article_table', '2');
INSERT INTO `migrations` VALUES ('2017_08_23_090921_create_comments_table', '3');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`email`),
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
