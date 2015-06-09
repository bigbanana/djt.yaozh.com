/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : club

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-05-29 13:44:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yzclub_admin
-- ----------------------------
DROP TABLE IF EXISTS `yzclub_admin`;
CREATE TABLE `yzclub_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text CHARACTER SET latin1 NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` text CHARACTER SET latin1 NOT NULL COMMENT '2次md5加密',
  `last_login_time` int(11) DEFAULT NULL,
  `last_login_ip` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `login_count` int(11) DEFAULT '0',
  `status` enum('0','1') CHARACTER SET latin1 NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzclub_admin
-- ----------------------------
INSERT INTO `yzclub_admin` VALUES ('1', 'administrator', '创始人', 'af11c7c1a4d7c61c574ede14267f6fd2', '1431309182', '127.0.0.1', '358', '1');
INSERT INTO `yzclub_admin` VALUES ('2', 'uper', '周波', 'af11c7c1a4d7c61c574ede14267f6fd2', '1419226599', '127.0.0.1', '16', '1');
INSERT INTO `yzclub_admin` VALUES ('3', 'ch', '陈浩', 'e7064b3bcbfa2d962cc665c032aa9067', null, null, '0', '1');

-- ----------------------------
-- Table structure for yzclub_admin_access
-- ----------------------------
DROP TABLE IF EXISTS `yzclub_admin_access`;
CREATE TABLE `yzclub_admin_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`) USING BTREE,
  KEY `nodeId` (`node_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzclub_admin_access
-- ----------------------------

-- ----------------------------
-- Table structure for yzclub_admin_node
-- ----------------------------
DROP TABLE IF EXISTS `yzclub_admin_node`;
CREATE TABLE `yzclub_admin_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` enum('2','1','0','-1') NOT NULL DEFAULT '0' COMMENT '-1: 不为菜单的操作；0：topmemu；1：module；2：action',
  PRIMARY KEY (`id`),
  KEY `level` (`level`) USING BTREE,
  KEY `pid` (`pid`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzclub_admin_node
-- ----------------------------
INSERT INTO `yzclub_admin_node` VALUES ('1', 'Operate', '运 营', '1', null, '1', '0', '0');
INSERT INTO `yzclub_admin_node` VALUES ('2', 'Site', '网站', '1', null, '0', '1', '1');
INSERT INTO `yzclub_admin_node` VALUES ('3', 'index', '基本配置', '1', null, '0', '2', '2');
INSERT INTO `yzclub_admin_node` VALUES ('4', 'User', '用 户', '1', '', '3', '0', '0');
INSERT INTO `yzclub_admin_node` VALUES ('5', 'User', '用户管理', '1', '', '0', '4', '1');
INSERT INTO `yzclub_admin_node` VALUES ('6', 'index', '会员列表', '1', '', '0', '5', '2');
INSERT INTO `yzclub_admin_node` VALUES ('7', 'add', '新增会员', '1', '', '0', '5', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('8', 'Role', '角色管理', '1', null, '0', '4', '1');
INSERT INTO `yzclub_admin_node` VALUES ('9', 'index', '角色列表', '1', null, '0', '8', '2');
INSERT INTO `yzclub_admin_node` VALUES ('10', 'add', '增加角色', '1', null, '0', '8', '2');
INSERT INTO `yzclub_admin_node` VALUES ('11', 'edit', '编辑角色', '1', null, '0', '8', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('12', 'del', '删除角色', '1', null, '0', '8', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('13', 'System', '系 统', '1', null, '6', '0', '0');
INSERT INTO `yzclub_admin_node` VALUES ('14', 'Content', '内 容', '1', null, '2', '0', '0');
INSERT INTO `yzclub_admin_node` VALUES ('33', 'Admin', '管理员', '1', null, '0', '13', '1');
INSERT INTO `yzclub_admin_node` VALUES ('34', 'AdminRole', '管理组', '1', null, '0', '13', '1');
INSERT INTO `yzclub_admin_node` VALUES ('35', 'index', '管理员列表', '1', null, '0', '33', '2');
INSERT INTO `yzclub_admin_node` VALUES ('36', 'index', '管理组列表', '1', null, '0', '34', '2');
INSERT INTO `yzclub_admin_node` VALUES ('37', 'add', '新增管理员', '1', null, '0', '33', '2');
INSERT INTO `yzclub_admin_node` VALUES ('38', 'add', '新增管理组', '1', null, '0', '34', '2');
INSERT INTO `yzclub_admin_node` VALUES ('133', 'apply', '申请列表', '1', null, '3', '5', '2');
INSERT INTO `yzclub_admin_node` VALUES ('134', 'News', '新闻', '1', null, '1', '14', '1');
INSERT INTO `yzclub_admin_node` VALUES ('135', 'Active', '活动', '1', null, '2', '14', '1');
INSERT INTO `yzclub_admin_node` VALUES ('43', 'AdminNode', '节点', '1', null, '0', '13', '1');
INSERT INTO `yzclub_admin_node` VALUES ('44', 'all', '节点列表', '1', null, '0', '43', '2');
INSERT INTO `yzclub_admin_node` VALUES ('45', 'add', '新增节点', '1', null, '0', '43', '2');
INSERT INTO `yzclub_admin_node` VALUES ('46', 'edit', '编辑节点', '1', null, '0', '43', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('48', 'delete', '删除节点', '1', null, '0', '43', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('49', 'add', '新增配置', '1', null, '0', '2', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('50', 'edit', '编辑配置', '1', null, '0', '2', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('51', 'Nav', '导航', '1', null, '0', '1', '1');
INSERT INTO `yzclub_admin_node` VALUES ('52', 'Adv', '广告', '1', null, '0', '1', '1');
INSERT INTO `yzclub_admin_node` VALUES ('53', 'UGC', 'UGC', '1', null, '5', '0', '0');
INSERT INTO `yzclub_admin_node` VALUES ('136', 'index', '新闻列表', '1', null, '1', '134', '2');
INSERT INTO `yzclub_admin_node` VALUES ('137', 'all', '导航列表', '1', null, '1', '51', '2');
INSERT INTO `yzclub_admin_node` VALUES ('57', 'delete', '删除导航', '1', null, '0', '51', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('62', 'front', '首页配置', '1', null, '0', '2', '2');
INSERT INTO `yzclub_admin_node` VALUES ('138', 'add', '新增导航', '1', null, '2', '51', '2');
INSERT INTO `yzclub_admin_node` VALUES ('139', 'FriendLink', '友情链接', '1', null, '5', '1', '1');
INSERT INTO `yzclub_admin_node` VALUES ('140', 'index', '友情链接列表', '1', null, '1', '139', '2');
INSERT INTO `yzclub_admin_node` VALUES ('141', 'add', '添加友情链接', '1', null, '2', '139', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('142', 'edit', '编辑友情链接', '1', null, '3', '139', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('143', 'delete', '删除友情链接', '1', null, '4', '139', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('146', 'placeAll', '广告位列表', '1', null, '1', '52', '2');
INSERT INTO `yzclub_admin_node` VALUES ('147', 'placeAdd', '添加广告位', '1', null, '2', '52', '2');
INSERT INTO `yzclub_admin_node` VALUES ('148', 'placeEdit', '修改广告位', '1', null, '3', '52', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('149', 'placeDelete', '删除广告位', '1', null, '4', '52', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('150', 'all', '广告列表', '1', null, '1', '52', '2');
INSERT INTO `yzclub_admin_node` VALUES ('151', 'add', '添加广告', '1', null, '2', '52', '2');
INSERT INTO `yzclub_admin_node` VALUES ('152', 'edit', '修改广告', '1', null, '3', '52', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('153', 'delete', '删除广告', '1', null, '4', '52', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('102', 'edit', '编辑管理员', '1', null, '0', '33', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('103', 'delete', '删除管理员', '1', null, '0', '33', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('104', 'edit', '编辑管理组', '1', null, '0', '34', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('105', 'delete', '删除管理组', '1', null, '0', '34', '-1');
INSERT INTO `yzclub_admin_node` VALUES ('107', 'Trash', '回收站', '1', null, '0', '13', '1');

-- ----------------------------
-- Table structure for yzclub_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `yzclub_admin_role`;
CREATE TABLE `yzclub_admin_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`) USING BTREE,
  KEY `status` (`status`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzclub_admin_role
-- ----------------------------
INSERT INTO `yzclub_admin_role` VALUES ('1', '管理员', '0', '1', '');
INSERT INTO `yzclub_admin_role` VALUES ('2', '编辑er', null, '1', null);
INSERT INTO `yzclub_admin_role` VALUES ('3', '运营', null, '1', null);

-- ----------------------------
-- Table structure for yzclub_admin_role_user
-- ----------------------------
DROP TABLE IF EXISTS `yzclub_admin_role_user`;
CREATE TABLE `yzclub_admin_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzclub_admin_role_user
-- ----------------------------
INSERT INTO `yzclub_admin_role_user` VALUES ('1', '1');
INSERT INTO `yzclub_admin_role_user` VALUES ('1', '2');
INSERT INTO `yzclub_admin_role_user` VALUES ('1', '3');

-- ----------------------------
-- Table structure for yzclub_adv
-- ----------------------------
DROP TABLE IF EXISTS `yzclub_adv`;
CREATE TABLE `yzclub_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adv_id` int(11) DEFAULT NULL,
  `pic` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addtime` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yzclub_adv
-- ----------------------------
INSERT INTO `yzclub_adv` VALUES ('1', '1', '/public/home/images/banner1.jpg', null, null, null, null, null, null, '1');
INSERT INTO `yzclub_adv` VALUES ('2', '1', '/public/home/images/4-20-3.jpg', null, null, null, null, null, null, '1');
INSERT INTO `yzclub_adv` VALUES ('3', '1', '/public/home/images/banner1.jpg', null, null, null, null, null, null, '1');
INSERT INTO `yzclub_adv` VALUES ('4', '2', '/public/home/images/banner_1.jpg', null, null, null, null, null, null, '1');
INSERT INTO `yzclub_adv` VALUES ('5', '3', '/public/home/images/banner_1.jpg', null, null, null, null, null, null, '1');
INSERT INTO `yzclub_adv` VALUES ('6', '4', '/public/home/images/4-22.jpg', null, null, null, null, null, null, '1');
INSERT INTO `yzclub_adv` VALUES ('7', '5', '/public/home/images/banner_1.jpg', null, null, null, null, null, null, '1');
INSERT INTO `yzclub_adv` VALUES ('8', '6', '/public/home/images/us_img.jpg', null, null, null, null, null, null, '1');

-- ----------------------------
-- Table structure for yzclub_adv_place
-- ----------------------------
DROP TABLE IF EXISTS `yzclub_adv_place`;
CREATE TABLE `yzclub_adv_place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `width` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `height` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yzclub_adv_place
-- ----------------------------
INSERT INTO `yzclub_adv_place` VALUES ('1', 'index_banner', '首页flash广告', '1800', '550');
INSERT INTO `yzclub_adv_place` VALUES ('2', 'introduction_pic', '俱乐部头部广告', '1200', '300');
INSERT INTO `yzclub_adv_place` VALUES ('3', 'activity_pic', '活动头部广告', '1200', '300');
INSERT INTO `yzclub_adv_place` VALUES ('4', 'news_pic', '新闻头部广告', '1200', '300');
INSERT INTO `yzclub_adv_place` VALUES ('5', 'member_pic', '会员头部广告', '1200', '300');
INSERT INTO `yzclub_adv_place` VALUES ('6', 'contactUs_background', '联系我们背景图片', '2000', '700');

-- ----------------------------
-- Table structure for yzclub_apply
-- ----------------------------
DROP TABLE IF EXISTS `yzclub_apply`;
CREATE TABLE `yzclub_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add_time` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yzclub_apply
-- ----------------------------
INSERT INTO `yzclub_apply` VALUES ('1', 'maple', '测试报名', '职务', '15101116627', '0', '1');
INSERT INTO `yzclub_apply` VALUES ('2', 'sg', 'qrt', '', 'adf', '1430099265', '2');
INSERT INTO `yzclub_apply` VALUES ('3', 'asdf', 'asdf', '', 'adsf', '1430202558', '2');

-- ----------------------------
-- Table structure for yzclub_friendlink
-- ----------------------------
DROP TABLE IF EXISTS `yzclub_friendlink`;
CREATE TABLE `yzclub_friendlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yzclub_friendlink
-- ----------------------------
INSERT INTO `yzclub_friendlink` VALUES ('1', '药智网', 'http://www.yaozh.com', '1', '1');
INSERT INTO `yzclub_friendlink` VALUES ('2', '药智数据库', 'http://db.yaozh.com', '2', '1');
INSERT INTO `yzclub_friendlink` VALUES ('3', '药智商城', 'http://s.yaozh.com', '3', '1');
INSERT INTO `yzclub_friendlink` VALUES ('4', '药智论坛', 'http://bbs.yaozh.com', '4', '1');
INSERT INTO `yzclub_friendlink` VALUES ('5', '35医药网', 'http://www.35yao.com/', '5', '1');

-- ----------------------------
-- Table structure for yzclub_nav
-- ----------------------------
DROP TABLE IF EXISTS `yzclub_nav`;
CREATE TABLE `yzclub_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text,
  `title` text,
  `condition` text,
  `pid` int(11) DEFAULT '0',
  `type` enum('顶部导航','底部导航') DEFAULT '顶部导航',
  `sort` int(11) DEFAULT '500',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzclub_nav
-- ----------------------------
INSERT INTO `yzclub_nav` VALUES ('1', '/', '首页', 'index', '0', '顶部导航', '1');
INSERT INTO `yzclub_nav` VALUES ('2', '/index/introduction.html', '俱乐部', null, '0', '顶部导航', '2');
INSERT INTO `yzclub_nav` VALUES ('3', '/index/active.html', '活动', null, '0', '顶部导航', '3');
INSERT INTO `yzclub_nav` VALUES ('4', '/index/news.html', '新闻', null, '0', '顶部导航', '4');
INSERT INTO `yzclub_nav` VALUES ('5', 'member', '会员', null, '0', '顶部导航', '5');
INSERT INTO `yzclub_nav` VALUES ('6', '/index/contactUs.html', '联系我们', null, '0', '顶部导航', '6');
INSERT INTO `yzclub_nav` VALUES ('7', '/index/introduction.html#hope', '愿景与宗旨', null, '2', '顶部导航', '1');
INSERT INTO `yzclub_nav` VALUES ('8', '/index/introduction.html#introduction', '俱乐部简介', null, '2', '顶部导航', '2');
INSERT INTO `yzclub_nav` VALUES ('9', '/index/introduction.html#structure', '组织架构图', null, '2', '顶部导航', '3');
INSERT INTO `yzclub_nav` VALUES ('10', '/index/introduction.html#member', '理事动态', null, '2', '顶部导航', '4');
INSERT INTO `yzclub_nav` VALUES ('11', '/index/member.html', '入会权益', null, '5', '顶部导航', '1');
INSERT INTO `yzclub_nav` VALUES ('12', '/index/apply.html', '入会流程', null, '5', '顶部导航', '2');
INSERT INTO `yzclub_nav` VALUES ('13', '/index/apy.html', '入会申请', null, '5', '顶部导航', '3');
INSERT INTO `yzclub_nav` VALUES ('14', '/index/constitution.html', '章程', null, '5', '顶部导航', '4');
INSERT INTO `yzclub_nav` VALUES ('15', '/', '首页', null, '0', '底部导航', '1');
INSERT INTO `yzclub_nav` VALUES ('16', '/index/introduction.html', '俱乐部', null, '0', '底部导航', '2');
INSERT INTO `yzclub_nav` VALUES ('17', '/index/active.html', '活动', null, '0', '底部导航', '3');
INSERT INTO `yzclub_nav` VALUES ('18', '/index/news.html', '新闻', null, '0', '底部导航', '4');
INSERT INTO `yzclub_nav` VALUES ('19', '/index/member.html', '会员', null, '0', '底部导航', '5');
INSERT INTO `yzclub_nav` VALUES ('20', '/index/contactUs.html', '联系我们', null, '0', '底部导航', '6');

-- ----------------------------
-- Table structure for yzclub_news
-- ----------------------------
DROP TABLE IF EXISTS `yzclub_news`;
CREATE TABLE `yzclub_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL COMMENT '关联news的id',
  `pic_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `refer_url` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_alt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `create_time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL COMMENT '是否上首页',
  `type` tinyint(1) DEFAULT NULL COMMENT '1. news 2. activity',
  `status` tinyint(1) DEFAULT NULL COMMENT '1.正常 2.禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yzclub_news
-- ----------------------------
INSERT INTO `yzclub_news` VALUES ('1', null, '4631', null, null, null, null, null, null, null, '1404093426', '1', '1', '1');
INSERT INTO `yzclub_news` VALUES ('2', null, '4950', null, null, null, null, null, null, null, '1404093426', '1', '1', '1');
INSERT INTO `yzclub_news` VALUES ('3', null, '4951', null, null, null, null, null, null, null, '1404093426', '1', '1', '1');
INSERT INTO `yzclub_news` VALUES ('4', null, '4952', null, null, null, null, null, null, null, '1404093426', '1', '2', '1');
INSERT INTO `yzclub_news` VALUES ('5', null, '74', null, null, null, null, null, null, null, '1404093426', '1', '2', '1');
INSERT INTO `yzclub_news` VALUES ('6', null, '51', null, null, null, null, null, null, null, '1404093426', '1', '2', '1');
INSERT INTO `yzclub_news` VALUES ('7', null, '52', null, null, null, null, null, null, null, '1404093426', '1', '1', '1');
INSERT INTO `yzclub_news` VALUES ('8', null, '81', null, null, null, null, null, null, null, '1404093426', '1', '1', '1');
INSERT INTO `yzclub_news` VALUES ('9', null, '107', null, null, null, null, null, null, null, '1404093426', '1', '1', '1');

-- ----------------------------
-- Table structure for yzclub_site
-- ----------------------------
DROP TABLE IF EXISTS `yzclub_site`;
CREATE TABLE `yzclub_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` text,
  `description` varchar(255) DEFAULT NULL,
  `value` text,
  `type` enum('textarea','radio','input') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yzclub_site
-- ----------------------------
INSERT INTO `yzclub_site` VALUES ('1', 'title', '网站标题', '网站标题，修改后全站调用标题的地方都会随着改变！', '药智俱乐部-药智网', 'input');
INSERT INTO `yzclub_site` VALUES ('2', 'keywords', '关键词', '网站关键字，多个关键字请用英文逗号分隔。', '药智网,俱乐部', 'input');
INSERT INTO `yzclub_site` VALUES ('3', 'description', '描述', '描述,网站头信息中的description标签的内容。', '药智精英俱乐部是由药智网和高圣生物医药发起组建，由大健康产业的专业技术精英及企业家、银行家组成的非营利性的服务组织。秉承“整合资源，发展事业，共创辉煌”之理念，定期或不定期向俱乐部成员提供：项目路演，学术研讨，政策解读，企业诊断，游学考试，案例分析，项目对接等活动。', 'textarea');
INSERT INTO `yzclub_site` VALUES ('4', 'status', '网站状态', '网站状态: 0=关闭，1=开启', '1', 'radio');
INSERT INTO `yzclub_site` VALUES ('5', 'stop_notice', '关闭公告', '网站关闭时显示在页面上的公告，仅在关闭时生效！', '', 'textarea');
INSERT INTO `yzclub_site` VALUES ('6', 'stat_code', '统计代码', '第三方统计代码，直接到对应统计网站获取。', '', 'textarea');
INSERT INTO `yzclub_site` VALUES ('7', 'copyright', '版权信息', '显示在页面底部的版权信息，html文本格式', '&lt;P&gt;康洲科贸版权所有Copyright Reserved @2009-2013 YAOZH.COM&lt;/P&gt;\r\n        &lt;P&gt;工信部备案号：渝ICP备10200070号&lt;/P&gt;', 'textarea');
