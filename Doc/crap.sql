/*
Navicat MySQL Data Transfer

Source Server         : vmware-centos
Source Server Version : 50638
Source Host           : 192.168.254.132:3306
Source Database       : crap

Target Server Type    : MYSQL
Target Server Version : 50638
File Encoding         : 65001

Date: 2017-11-25 21:56:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `crap_admin_users`
-- ----------------------------
DROP TABLE IF EXISTS `crap_admin_users`;
CREATE TABLE `crap_admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
INSERT INTO `crap_admin_users` VALUES ('2', 'admin', '2e88327de2f97110f6c5f97be61a25b8', 'admin', '1505445740', '0');
INSERT INTO `crap_admin_users` VALUES ('3', 'liuxuchao', 'd85137cca3bebb2b1804aaf61157515b', 'xuchao', '1505455740', '0');
INSERT INTO `crap_admin_users` VALUES ('4', 'liuxuyang', 'd85137cca3bebb2b1804aaf61157515b', 'xuyang', '1505460881', '0');

-- ----------------------------
-- Table structure for `crap_auth_group`
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
-- Table structure for `crap_auth_group_access`
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
-- Table structure for `crap_auth_rule`
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
-- Table structure for `crap_role`
-- ----------------------------
DROP TABLE IF EXISTS `crap_role`;
CREATE TABLE `crap_role` (
  `id` int(11) DEFAULT NULL,
  `role_name` varchar(32) DEFAULT '' COMMENT '角色名称',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crap_role
-- ----------------------------

-- ----------------------------
-- Table structure for `crap_system_config`
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
-- Table structure for `crap_users`
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of crap_users
-- ----------------------------
