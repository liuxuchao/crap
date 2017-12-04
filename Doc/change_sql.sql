/*
* 2017-12-04 sql 修改记录 
*/

SET FOREIGN_KEY_CHECKS=0;

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


/*
* 2017-12-05 sql 修改记录 
*/

