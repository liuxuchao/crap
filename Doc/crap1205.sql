/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 100119
Source Host           : localhost:3306
Source Database       : crap

Target Server Type    : MYSQL
Target Server Version : 100119
File Encoding         : 65001

Date: 2017-12-05 22:54:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for crap_admin_users
-- ----------------------------
DROP TABLE IF EXISTS `crap_admin_users`;
CREATE TABLE `crap_admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `name` char(64) NOT NULL DEFAULT '' COMMENT '登陆账号',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `nickname` char(16) NOT NULL DEFAULT '' COMMENT '昵称',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理后台用户，管理员。';

-- ----------------------------
-- Records of crap_admin_users
-- ----------------------------
INSERT INTO `crap_admin_users` VALUES ('2', '0', 'admin', '2e88327de2f97110f6c5f97be61a25b8', 'admin', '1505445740', '0');
INSERT INTO `crap_admin_users` VALUES ('3', '0', 'liuxuchao', 'd85137cca3bebb2b1804aaf61157515b', 'xuchao', '1505455740', '0');
INSERT INTO `crap_admin_users` VALUES ('4', '0', 'liuxuyang', 'd85137cca3bebb2b1804aaf61157515b', 'xuyang', '1505460881', '0');

-- ----------------------------
-- Table structure for crap_attribute
-- ----------------------------
DROP TABLE IF EXISTS `crap_attribute`;
CREATE TABLE `crap_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_name` varchar(64) DEFAULT NULL COMMENT '属性名称',
  `goods_id` int(10) DEFAULT NULL COMMENT '商品id',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crap_attribute
-- ----------------------------

-- ----------------------------
-- Table structure for crap_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `crap_auth_group`;
CREATE TABLE `crap_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crap_auth_group
-- ----------------------------

-- ----------------------------
-- Table structure for crap_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `crap_auth_group_access`;
CREATE TABLE `crap_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crap_auth_group_access
-- ----------------------------

-- ----------------------------
-- Table structure for crap_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `crap_auth_rule`;
CREATE TABLE `crap_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crap_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for crap_brand
-- ----------------------------
DROP TABLE IF EXISTS `crap_brand`;
CREATE TABLE `crap_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(64) DEFAULT NULL COMMENT '品牌名称',
  `supplier_id` int(10) DEFAULT NULL COMMENT '供应商id',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crap_brand
-- ----------------------------

-- ----------------------------
-- Table structure for crap_category
-- ----------------------------
DROP TABLE IF EXISTS `crap_category`;
CREATE TABLE `crap_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(64) DEFAULT NULL COMMENT '分类名称',
  `goods_id` int(10) DEFAULT NULL COMMENT '商品id',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crap_category
-- ----------------------------

-- ----------------------------
-- Table structure for crap_goods
-- ----------------------------
DROP TABLE IF EXISTS `crap_goods`;
CREATE TABLE `crap_goods` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `goods_id` varchar(15) NOT NULL,
  `supplier_id` int(15) NOT NULL COMMENT '供应商ID',
  `attribute_id` int(15) NOT NULL COMMENT '属性表',
  `category_id` int(15) NOT NULL COMMENT '分类ID',
  `brand_id` int(15) NOT NULL COMMENT '品牌ID',
  `name` varchar(128) NOT NULL COMMENT '商品名称',
  `alias_name` varchar(128) NOT NULL COMMENT '商品别名',
  `goods_range` varchar(128) DEFAULT NULL COMMENT '产品范围',
  `recharge_limit` decimal(10,2) NOT NULL COMMENT '充值限制',
  `operator` varchar(255) NOT NULL COMMENT '运营商',
  `bag_size` int(10) NOT NULL COMMENT '包体大小',
  `use_cycle` varchar(255) NOT NULL COMMENT '使用周期',
  `flow_type` varchar(255) NOT NULL COMMENT '流量使用类型',
  `order_type` varchar(255) NOT NULL COMMENT '订购类型',
  `discription` varchar(255) NOT NULL COMMENT '商品描述',
  `price` decimal(10,2) unsigned zerofill NOT NULL COMMENT '商城价格',
  `discount_price` decimal(10,2) NOT NULL COMMENT '折扣价',
  `status` tinyint(1) NOT NULL COMMENT '0=>下架(默认)  1=>上架 ',
  `create_time` int(11) NOT NULL,
  `shelves_time` int(11) NOT NULL COMMENT '上架时间',
  `offshelf_time` int(11) NOT NULL COMMENT '下架时间',
  `create_ip` varchar(16) NOT NULL COMMENT '创建IP',
  `update_ip` varchar(16) NOT NULL COMMENT '修改IP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crap_goods
-- ----------------------------
INSERT INTO `crap_goods` VALUES ('3', '', '0', '0', '0', '0', '商品1234', 'goods1', '不知道', '0.00', '不知道', '0', '不知道', '不知道', '不知道', 'sfsfs', '00000000.00', '0.00', '1', '1512482184', '0', '0', '127.0.0.1', '');

-- ----------------------------
-- Table structure for crap_power
-- ----------------------------
DROP TABLE IF EXISTS `crap_power`;
CREATE TABLE `crap_power` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `power_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL COMMENT '权限描述',
  `create_time` varchar(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` varchar(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crap_power
-- ----------------------------

-- ----------------------------
-- Table structure for crap_role
-- ----------------------------
DROP TABLE IF EXISTS `crap_role`;
CREATE TABLE `crap_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `role_name` varchar(64) NOT NULL,
  `description` varchar(64) DEFAULT NULL COMMENT '角色描述',
  `create_time` varchar(11) NOT NULL COMMENT '角色创建时间',
  `update_time` varchar(11) NOT NULL COMMENT '角色修改时间',
  `disable` tinyint(1) DEFAULT NULL COMMENT '角色状态(1=>启用,0=>停用)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crap_role
-- ----------------------------

-- ----------------------------
-- Table structure for crap_supplier
-- ----------------------------
DROP TABLE IF EXISTS `crap_supplier`;
CREATE TABLE `crap_supplier` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(12) DEFAULT NULL COMMENT '供应商ID',
  `supplier_name` varchar(255) DEFAULT NULL COMMENT '供应商名称',
  `supplier_address` varchar(255) DEFAULT NULL COMMENT '供应商地址',
  `supplier_moblie` varchar(255) DEFAULT NULL COMMENT '供应商手机',
  `supplier_createtime` varchar(11) DEFAULT NULL COMMENT '供应商创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplier_id` (`supplier_id`) USING BTREE,
  KEY `supplier_name` (`supplier_name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='供应商表：存储供应商信息';

-- ----------------------------
-- Records of crap_supplier
-- ----------------------------

-- ----------------------------
-- Table structure for crap_system_config
-- ----------------------------
DROP TABLE IF EXISTS `crap_system_config`;
CREATE TABLE `crap_system_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(16) NOT NULL COMMENT '配置名称',
  `content` varchar(2048) NOT NULL DEFAULT '' COMMENT '配置详情，json数据',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='UU推荐一些系统配置';

-- ----------------------------
-- Records of crap_system_config
-- ----------------------------

-- ----------------------------
-- Table structure for crap_users
-- ----------------------------
DROP TABLE IF EXISTS `crap_users`;
CREATE TABLE `crap_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mobile` bigint(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户登录账号，手机号。',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '用户登录密码',
  `real_name` char(16) NOT NULL DEFAULT '' COMMENT '用户真实姓名',
  `gender` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '性别。1:男；2:女；0:未知。',
  `job` char(16) NOT NULL DEFAULT '' COMMENT '职位',
  `icon_url` char(128) NOT NULL DEFAULT '' COMMENT '用户头像URL',
  `channel_id` int(11) NOT NULL DEFAULT '0' COMMENT '使用中的渠道账号-关联uu_channel表主键ID',
  `company_name` char(16) NOT NULL DEFAULT '' COMMENT '用户所在公司名称',
  `shortname` char(32) NOT NULL DEFAULT '' COMMENT '公司简称',
  `company_size` char(32) NOT NULL DEFAULT '' COMMENT '公司规模',
  `company_nature` char(64) NOT NULL DEFAULT '' COMMENT '公司性质',
  `company_trade` char(64) NOT NULL DEFAULT '' COMMENT '所属行业',
  `company_address` char(255) NOT NULL DEFAULT '' COMMENT '公司地址',
  `balance` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '账号余额',
  `register_type` tinyint(1) DEFAULT '1' COMMENT '注册类型，1：普通，2：分享注册',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '数据添加时间，注册时间。',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '数据修改时间。',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of crap_users
-- ----------------------------
