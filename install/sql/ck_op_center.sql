/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50641
Source Host           : 127.0.0.1:3306
Source Database       : ck_op_center

Target Server Type    : MYSQL
Target Server Version : 50641
File Encoding         : 65001

Date: 2018-10-19 18:12:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ck_admin_log`
-- ----------------------------
DROP TABLE IF EXISTS `ck_admin_log`;
CREATE TABLE `ck_admin_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_id` int(11) unsigned NOT NULL COMMENT '管理员用户id',
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '操作路由',
  `description` text COLLATE utf8_unicode_ci COMMENT '操作描述',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=298 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_admin_log
-- ----------------------------
INSERT INTO `ck_admin_log` VALUES ('1', '1', 'friendly-link/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\FriendlyLink [ {{%friendly_link}} ]  {{%UPDATED%}} {{%ID%}} 4 {{%RECORD%}}: <br>排序(sort) : 0=>1,<br>最后更新(updated_at) : 0=>1538201313', '1538201313', '1538201313');
INSERT INTO `ck_admin_log` VALUES ('2', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 6 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1505570366=>1538201463', '1538201463', '1538201463');
INSERT INTO `ck_admin_log` VALUES ('3', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 6 {{%RECORD%}}: <br>是否显示(is_display) : 0=>1,<br>最后更新(updated_at) : 1538201463=>1538201481', '1538201481', '1538201481');
INSERT INTO `ck_admin_log` VALUES ('4', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 6 {{%RECORD%}}: <br>名称(name) : 前台菜单=>后台菜单,<br>最后更新(updated_at) : 1538201481=>1538201502', '1538201502', '1538201502');
INSERT INTO `ck_admin_log` VALUES ('5', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 7 {{%RECORD%}}: <br>名称(name) : 后台菜单=>代理菜单,<br>最后更新(updated_at) : 1505570382=>1538201522', '1538201522', '1538201522');
INSERT INTO `ck_admin_log` VALUES ('6', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 18 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1512380045=>1538201539', '1538201539', '1538201539');
INSERT INTO `ck_admin_log` VALUES ('7', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 19 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1512380045=>1538201548', '1538201548', '1538201548');
INSERT INTO `ck_admin_log` VALUES ('8', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 27 {{%RECORD%}}: <br>名称(name) : 运营管理=>代理管理,<br>最后更新(updated_at) : 1505637000=>1538201599', '1538201599', '1538201599');
INSERT INTO `ck_admin_log` VALUES ('9', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 13 {{%RECORD%}}: <br>名称(name) : 用户=>用户管理,<br>最后更新(updated_at) : 1512380045=>1538201649', '1538201649', '1538201649');
INSERT INTO `ck_admin_log` VALUES ('10', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 8 {{%RECORD%}}: <br>名称(name) : 内容=>报表查询,<br>最后更新(updated_at) : 1512380045=>1538201671', '1538201671', '1538201671');
INSERT INTO `ck_admin_log` VALUES ('11', '1', 'menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 30 {{%RECORD%}}: <br>序号(id) => 30,<br>类型(type) => ,<br>父分类Id(parent_id) => 0,<br>名称(name) => 账号管理,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538201720,<br>最后更新(updated_at) => 1538201720', '1538201720', '1538201720');
INSERT INTO `ck_admin_log` VALUES ('12', '1', 'menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 31 {{%RECORD%}}: <br>序号(id) => 31,<br>类型(type) => ,<br>父分类Id(parent_id) => 0,<br>名称(name) => 首页,<br>地址(url) => ,<br>图标(icon) => fa fa-home,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538277444,<br>最后更新(updated_at) => 1538277444', '1538277444', '1538277444');
INSERT INTO `ck_admin_log` VALUES ('13', '1', 'menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>排序(sort) : 0=>1,<br>最后更新(updated_at) : 1505570067=>1538277456', '1538277456', '1538277456');
INSERT INTO `ck_admin_log` VALUES ('14', '1', 'menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 30 {{%RECORD%}}: <br>排序(sort) : 0=>1,<br>最后更新(updated_at) : 1538201720=>1538277470', '1538277470', '1538277470');
INSERT INTO `ck_admin_log` VALUES ('15', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1538277456=>1538277486', '1538277486', '1538277486');
INSERT INTO `ck_admin_log` VALUES ('16', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 31 {{%RECORD%}}: <br>地址(url) : =>site/index,<br>最后更新(updated_at) : 1538277444=>1538277574', '1538277574', '1538277574');
INSERT INTO `ck_admin_log` VALUES ('17', '1', 'menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 32 {{%RECORD%}}: <br>序号(id) => 32,<br>类型(type) => ,<br>父分类Id(parent_id) => 30,<br>名称(name) => 子账号管理,<br>地址(url) => account/child,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538279173,<br>最后更新(updated_at) => 1538279173', '1538279173', '1538279173');
INSERT INTO `ck_admin_log` VALUES ('18', '1', 'menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 33 {{%RECORD%}}: <br>序号(id) => 33,<br>类型(type) => ,<br>父分类Id(parent_id) => 13,<br>名称(name) => 用户列表,<br>地址(url) => user/index,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538279316,<br>最后更新(updated_at) => 1538279316', '1538279316', '1538279316');
INSERT INTO `ck_admin_log` VALUES ('19', '1', 'menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 34 {{%RECORD%}}: <br>序号(id) => 34,<br>类型(type) => ,<br>父分类Id(parent_id) => 13,<br>名称(name) => 今日注册,<br>地址(url) => user/today,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538279343,<br>最后更新(updated_at) => 1538279343', '1538279343', '1538279343');
INSERT INTO `ck_admin_log` VALUES ('20', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 28 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1505637000=>1538279468', '1538279468', '1538279468');
INSERT INTO `ck_admin_log` VALUES ('21', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 29 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1505637000=>1538279470', '1538279470', '1538279470');
INSERT INTO `ck_admin_log` VALUES ('22', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 12 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1505570687=>1538279562', '1538279562', '1538279562');
INSERT INTO `ck_admin_log` VALUES ('23', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 11 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1505570707=>1538279574', '1538279574', '1538279574');
INSERT INTO `ck_admin_log` VALUES ('24', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 10 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1505570638=>1538279576', '1538279576', '1538279576');
INSERT INTO `ck_admin_log` VALUES ('25', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 9 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1505570610=>1538279579', '1538279580', '1538279580');
INSERT INTO `ck_admin_log` VALUES ('26', '1', 'menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 35 {{%RECORD%}}: <br>序号(id) => 35,<br>类型(type) => ,<br>父分类Id(parent_id) => 8,<br>名称(name) => 投注记录,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538279590,<br>最后更新(updated_at) => 1538279590', '1538279590', '1538279590');
INSERT INTO `ck_admin_log` VALUES ('27', '1', 'menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 36 {{%RECORD%}}: <br>序号(id) => 36,<br>类型(type) => ,<br>父分类Id(parent_id) => 8,<br>名称(name) => 用户报表,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538279634,<br>最后更新(updated_at) => 1538279634', '1538279634', '1538279634');
INSERT INTO `ck_admin_log` VALUES ('28', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 19 {{%RECORD%}}: <br>是否显示(is_display) : 0=>1,<br>最后更新(updated_at) : 1538201548=>1538881401', '1538881401', '1538881401');
INSERT INTO `ck_admin_log` VALUES ('29', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>是否显示(is_display) : 0=>1,<br>最后更新(updated_at) : 1538277486=>1538881461', '1538881462', '1538881462');
INSERT INTO `ck_admin_log` VALUES ('30', '1', 'setting/website', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingWebsiteForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 5 {{%RECORD%}}: <br>Value(value) : admin@feehi.com=>', '1538881477', '1538881477');
INSERT INTO `ck_admin_log` VALUES ('31', '1', 'setting/website', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingWebsiteForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 13 {{%RECORD%}}: <br>Value(value) : http://agent.onetop.ky=>http://localhost', '1538881477', '1538881477');
INSERT INTO `ck_admin_log` VALUES ('32', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1538881461=>1538884729', '1538884729', '1538884729');
INSERT INTO `ck_admin_log` VALUES ('33', '1', 'menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 5 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1512380045=>1538884737', '1538884737', '1538884737');
INSERT INTO `ck_admin_log` VALUES ('34', '1', 'agent-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 37 {{%RECORD%}}: <br>序号(id) => 37,<br>类型(type) => ,<br>父分类Id(parent_id) => 30,<br>名称(name) => 权限管理,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538893359,<br>最后更新(updated_at) => 1538893359', '1538893359', '1538893359');
INSERT INTO `ck_admin_log` VALUES ('35', '1', 'agent-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 38 {{%RECORD%}}: <br>序号(id) => 38,<br>类型(type) => ,<br>父分类Id(parent_id) => 30,<br>名称(name) => 角色管理,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538893381,<br>最后更新(updated_at) => 1538893381', '1538893381', '1538893381');
INSERT INTO `ck_admin_log` VALUES ('36', '1', 'agent-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 32 {{%RECORD%}}: <br>排序(sort) : 0=>1,<br>最后更新(updated_at) : 1538279173=>1538893436', '1538893436', '1538893436');
INSERT INTO `ck_admin_log` VALUES ('37', '1', 'agent-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 38 {{%RECORD%}}: <br>排序(sort) : 0=>1,<br>最后更新(updated_at) : 1538893381=>1538893442', '1538893442', '1538893442');
INSERT INTO `ck_admin_log` VALUES ('38', '1', 'agent-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 32 {{%RECORD%}}: <br>排序(sort) : 1=>2,<br>最后更新(updated_at) : 1538893436=>1538893446', '1538893446', '1538893446');
INSERT INTO `ck_admin_log` VALUES ('39', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /article/index,<br>请求方式(method) => GET,<br>描述(description) => 文章列表,<br>排序(sort) => 200,<br>组(group) => 内容,<br>分类(category) => 文章', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('40', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /article/create,<br>请求方式(method) => GET,<br>描述(description) => 创建文章(查看),<br>排序(sort) => 201,<br>组(group) => 内容,<br>分类(category) => 文章', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('41', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /article/create,<br>请求方式(method) => POST,<br>描述(description) => 创建文章(确定),<br>排序(sort) => 202,<br>组(group) => 内容,<br>分类(category) => 文章', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('42', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /article/update,<br>请求方式(method) => GET,<br>描述(description) => 修改文章(查看),<br>排序(sort) => 203,<br>组(group) => 内容,<br>分类(category) => 文章', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('43', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /article/update,<br>请求方式(method) => POST,<br>描述(description) => 修改文章(确定),<br>排序(sort) => 204,<br>组(group) => 内容,<br>分类(category) => 文章', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('44', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /article/sort,<br>请求方式(method) => POST,<br>描述(description) => 文章排序,<br>排序(sort) => 205,<br>组(group) => 内容,<br>分类(category) => 文章', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('45', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /article/delete,<br>请求方式(method) => POST,<br>描述(description) => 删除文章,<br>排序(sort) => 206,<br>组(group) => 内容,<br>分类(category) => 文章', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('46', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /article/view-layer,<br>请求方式(method) => GET,<br>描述(description) => 文章详情,<br>排序(sort) => 207,<br>组(group) => 内容,<br>分类(category) => 文章', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('47', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /category/index,<br>请求方式(method) => GET,<br>描述(description) => 分类列表,<br>排序(sort) => 210,<br>组(group) => 内容,<br>分类(category) => 分类', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('48', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /category/create,<br>请求方式(method) => GET,<br>描述(description) => 创建分类(查看),<br>排序(sort) => 211,<br>组(group) => 内容,<br>分类(category) => 分类', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('49', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /category/create,<br>请求方式(method) => POST,<br>描述(description) => 创建分类(确定),<br>排序(sort) => 212,<br>组(group) => 内容,<br>分类(category) => 分类', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('50', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /category/update,<br>请求方式(method) => GET,<br>描述(description) => 修改分类(查看),<br>排序(sort) => 213,<br>组(group) => 内容,<br>分类(category) => 分类', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('51', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /category/update,<br>请求方式(method) => POST,<br>描述(description) => 修改分类(确定),<br>排序(sort) => 214,<br>组(group) => 内容,<br>分类(category) => 分类', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('52', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /category/sort,<br>请求方式(method) => POST,<br>描述(description) => 分类排序,<br>排序(sort) => 215,<br>组(group) => 内容,<br>分类(category) => 分类', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('53', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /category/delete,<br>请求方式(method) => POST,<br>描述(description) => 删除分类,<br>排序(sort) => 216,<br>组(group) => 内容,<br>分类(category) => 分类', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('54', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /category/view-layer,<br>请求方式(method) => GET,<br>描述(description) => 分类详情,<br>排序(sort) => 217,<br>组(group) => 内容,<br>分类(category) => 分类', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('55', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /comment/index,<br>请求方式(method) => GET,<br>描述(description) => 评论列表,<br>排序(sort) => 220,<br>组(group) => 内容,<br>分类(category) => 评论', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('56', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /comment/update,<br>请求方式(method) => GET,<br>描述(description) => 修改评论(查看),<br>排序(sort) => 221,<br>组(group) => 内容,<br>分类(category) => 评论', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('57', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /comment/update,<br>请求方式(method) => POST,<br>描述(description) => 修改评论(确定),<br>排序(sort) => 222,<br>组(group) => 内容,<br>分类(category) => 评论', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('58', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /comment/view-layer,<br>请求方式(method) => GET,<br>描述(description) => 评论详情,<br>排序(sort) => 223,<br>组(group) => 内容,<br>分类(category) => 评论', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('59', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /page/index,<br>请求方式(method) => GET,<br>描述(description) => 单页列表,<br>排序(sort) => 230,<br>组(group) => 内容,<br>分类(category) => 单页', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('60', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /page/create,<br>请求方式(method) => GET,<br>描述(description) => 创建单页(查看),<br>排序(sort) => 231,<br>组(group) => 内容,<br>分类(category) => 单页', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('61', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /page/create,<br>请求方式(method) => POST,<br>描述(description) => 创建单页(确定),<br>排序(sort) => 232,<br>组(group) => 内容,<br>分类(category) => 单页', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('62', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /page/update,<br>请求方式(method) => GET,<br>描述(description) => 修改单页(查看),<br>排序(sort) => 233,<br>组(group) => 内容,<br>分类(category) => 单页', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('63', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /page/update,<br>请求方式(method) => POST,<br>描述(description) => 修改单页(确定),<br>排序(sort) => 234,<br>组(group) => 内容,<br>分类(category) => 单页', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('64', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /page/sort,<br>请求方式(method) => POST,<br>描述(description) => 单页排序,<br>排序(sort) => 235,<br>组(group) => 内容,<br>分类(category) => 单页', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('65', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /page/delete,<br>请求方式(method) => POST,<br>描述(description) => 删除单页,<br>排序(sort) => 236,<br>组(group) => 内容,<br>分类(category) => 单页', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('66', '1', 'rbac/permission-delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\Rbac {{%DELETED%}} {{%RECORD%}}: <br>路由(route) => /page/view-layer,<br>请求方式(method) => GET,<br>描述(description) => 单页详情,<br>排序(sort) => 237,<br>组(group) => 内容,<br>分类(category) => 单页', '1538893497', '1538893497');
INSERT INTO `ck_admin_log` VALUES ('67', '1', 'agent-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 37 {{%RECORD%}}: <br>序号(id) => 37,<br>类型(type) => 1,<br>父分类Id(parent_id) => 30,<br>名称(name) => 权限管理,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538893359,<br>最后更新(updated_at) => 1538893359', '1538893522', '1538893522');
INSERT INTO `ck_admin_log` VALUES ('68', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 18 {{%RECORD%}}: <br>是否显示(is_display) : 0=>1,<br>最后更新(updated_at) : 1538201539=>1538893903', '1538893903', '1538893903');
INSERT INTO `ck_admin_log` VALUES ('69', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 18 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1538893903=>1538893906', '1538893906', '1538893906');
INSERT INTO `ck_admin_log` VALUES ('70', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 39 {{%RECORD%}}: <br>序号(id) => 39,<br>类型(type) => ,<br>父分类Id(parent_id) => 22,<br>名称(name) => 啊啊啊,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538893913,<br>最后更新(updated_at) => 1538893913', '1538893913', '1538893913');
INSERT INTO `ck_admin_log` VALUES ('71', '1', 'admin-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 39 {{%RECORD%}}: <br>序号(id) => 39,<br>类型(type) => 0,<br>父分类Id(parent_id) => 22,<br>名称(name) => 啊啊啊,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538893913,<br>最后更新(updated_at) => 1538893913', '1538893918', '1538893918');
INSERT INTO `ck_admin_log` VALUES ('72', '1', 'agent-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 40 {{%RECORD%}}: <br>序号(id) => 40,<br>类型(type) => ,<br>父分类Id(parent_id) => 0,<br>名称(name) => 玩家管理,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538894031,<br>最后更新(updated_at) => 1538894031', '1538894031', '1538894031');
INSERT INTO `ck_admin_log` VALUES ('73', '1', 'agent-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 41 {{%RECORD%}}: <br>序号(id) => 41,<br>类型(type) => 1,<br>父分类Id(parent_id) => 0,<br>名称(name) => 啊啊啊啊,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538895014,<br>最后更新(updated_at) => 1538895014', '1538895014', '1538895014');
INSERT INTO `ck_admin_log` VALUES ('74', '1', 'agent-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 41 {{%RECORD%}}: <br>序号(id) => 41,<br>类型(type) => 1,<br>父分类Id(parent_id) => 0,<br>名称(name) => 啊啊啊啊,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538895014,<br>最后更新(updated_at) => 1538895014', '1538895023', '1538895023');
INSERT INTO `ck_admin_log` VALUES ('75', '1', 'agent-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 42 {{%RECORD%}}: <br>序号(id) => 42,<br>类型(type) => 1,<br>父分类Id(parent_id) => 0,<br>名称(name) => 玩家管理,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538895037,<br>最后更新(updated_at) => 1538895037', '1538895037', '1538895037');
INSERT INTO `ck_admin_log` VALUES ('76', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 42 {{%RECORD%}}: <br>图标(icon) : =>fa fa-user,<br>最后更新(updated_at) : 1538895037=>1538895056', '1538895056', '1538895056');
INSERT INTO `ck_admin_log` VALUES ('77', '1', 'admin-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 40 {{%RECORD%}}: <br>序号(id) => 40,<br>类型(type) => 0,<br>父分类Id(parent_id) => 0,<br>名称(name) => 玩家管理,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538894031,<br>最后更新(updated_at) => 1538894031', '1538895065', '1538895065');
INSERT INTO `ck_admin_log` VALUES ('78', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 3 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1505570283=>1538959710', '1538959711', '1538959711');
INSERT INTO `ck_admin_log` VALUES ('79', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 4 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1505570187=>1538959714', '1538959714', '1538959714');
INSERT INTO `ck_admin_log` VALUES ('80', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 3 {{%RECORD%}}: <br>是否显示(is_display) : 0=>1,<br>最后更新(updated_at) : 1538959710=>1538959801', '1538959801', '1538959801');
INSERT INTO `ck_admin_log` VALUES ('81', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 3 {{%RECORD%}}: <br>名称(name) : SMTP设置=>代理设置,<br>地址(url) : setting/smtp=>setting/agent,<br>最后更新(updated_at) : 1538959801=>1538959820', '1538959820', '1538959820');
INSERT INTO `ck_admin_log` VALUES ('82', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 2 {{%RECORD%}}: <br>名称(name) : 网站设置=>系统设置,<br>最后更新(updated_at) : 1505570108=>1538959879', '1538959879', '1538959879');
INSERT INTO `ck_admin_log` VALUES ('83', '1', 'setting/website', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingWebsiteForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 3 {{%RECORD%}}: <br>Value(value) : Feehi CMS=>网通国际', '1538960049', '1538960049');
INSERT INTO `ck_admin_log` VALUES ('84', '1', 'setting/website', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingWebsiteForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 7 {{%RECORD%}}: <br>Value(value) : 粤ICP备15018643号=>123456', '1538960049', '1538960049');
INSERT INTO `ck_admin_log` VALUES ('85', '1', 'setting/website', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingWebsiteForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 13 {{%RECORD%}}: <br>Value(value) : http://localhost=>http://www.onetop.pw', '1538960049', '1538960049');
INSERT INTO `ck_admin_log` VALUES ('86', '1', 'setting/website', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingWebsiteForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>Value(value) : 飞嗨,cms,yii2,php,feehi cms=>万通国际 娱乐 博彩 皇家国际 威尼斯人', '1538960049', '1538960049');
INSERT INTO `ck_admin_log` VALUES ('87', '1', 'setting/website', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingWebsiteForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 2 {{%RECORD%}}: <br>Value(value) : Feehi CMS，最好的cms之一=>onetop', '1538960049', '1538960049');
INSERT INTO `ck_admin_log` VALUES ('88', '1', 'setting/website', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingWebsiteForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>Value(value) : 万通国际 娱乐 博彩 皇家国际 威尼斯人=>万通国际 皇家国际 威尼斯人', '1538960118', '1538960118');
INSERT INTO `ck_admin_log` VALUES ('89', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 4 {{%RECORD%}}: <br>排序(sort) : 4=>3,<br>最后更新(updated_at) : 1538959714=>1538960321', '1538960321', '1538960321');
INSERT INTO `ck_admin_log` VALUES ('90', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 4 {{%RECORD%}}: <br>名称(name) : 自定义设置=>邮件设置,<br>地址(url) : setting/custom=>setting/smtp,<br>最后更新(updated_at) : 1538960321=>1538960337', '1538960337', '1538960337');
INSERT INTO `ck_admin_log` VALUES ('91', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 4 {{%RECORD%}}: <br>是否显示(is_display) : 0=>1,<br>最后更新(updated_at) : 1538960337=>1538960350', '1538960350', '1538960350');
INSERT INTO `ck_admin_log` VALUES ('92', '1', 'setting/agent', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingAgentForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 28 {{%RECORD%}}: <br>Value(value) : =>0', '1538975417', '1538975417');
INSERT INTO `ck_admin_log` VALUES ('93', '1', 'setting/agent', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingAgentForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 29 {{%RECORD%}}: <br>Value(value) : =>3', '1538975417', '1538975417');
INSERT INTO `ck_admin_log` VALUES ('94', '1', 'setting/agent', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingAgentForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 30 {{%RECORD%}}: <br>Value(value) : =>35', '1538975417', '1538975417');
INSERT INTO `ck_admin_log` VALUES ('95', '1', 'setting/agent', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingAgentForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 31 {{%RECORD%}}: <br>Value(value) : =>30', '1538975417', '1538975417');
INSERT INTO `ck_admin_log` VALUES ('96', '1', 'setting/agent', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingAgentForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 32 {{%RECORD%}}: <br>Value(value) : =>http://127.0.0.1/admin', '1538975417', '1538975417');
INSERT INTO `ck_admin_log` VALUES ('97', '1', 'setting/agent', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingAgentForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 33 {{%RECORD%}}: <br>Value(value) : =>http://127.0.0.1/mobile/use/signup', '1538975417', '1538975417');
INSERT INTO `ck_admin_log` VALUES ('98', '1', 'setting/agent', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingAgentForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 34 {{%RECORD%}}: <br>Value(value) : =>http://127.0.0.1/mobile/agent/signup', '1538975417', '1538975417');
INSERT INTO `ck_admin_log` VALUES ('99', '1', 'admin-user/update-self', '{{%ADMIN_USER%}} [ agent ] {{%BY%}} backend\\models\\AdminUser [ {{%admin_agent}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>邮箱(email) : admin@feehi.com=>abcd@11111.com,<br>头像(avatar) : =>/admin/uploads/avatar/20181008144356_5bbafcacb90ed.png,<br>最后更新(updated_at) : 1476711945=>1538981036', '1538981036', '1538981036');
INSERT INTO `ck_admin_log` VALUES ('100', '1', 'admin-user/update-self', '{{%ADMIN_USER%}} [ agent ] {{%BY%}} backend\\models\\AdminUser [ {{%admin_agent}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>头像(avatar) : /admin/uploads/avatar/20181008144356_5bbafcacb90ed.png=>/admin/uploads/avatar/20181008144833_5bbafdc1020e1.png,<br>最后更新(updated_at) : 1538981036=>1538981313', '1538981313', '1538981313');
INSERT INTO `ck_admin_log` VALUES ('101', '1', 'admin-user/update-self', '{{%ADMIN_USER%}} [ agent ] {{%BY%}} backend\\models\\AdminUser [ {{%admin_agent}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>头像(avatar) : /admin/uploads/avatar/20181008144833_5bbafdc1020e1.png=>D:\\www\\ckAgent/backend/web/uploads/avatar/20181008153538_5bbb08caa1e36.png,<br>最后更新(updated_at) : 1538981313=>1538984138', '1538984138', '1538984138');
INSERT INTO `ck_admin_log` VALUES ('102', '1', 'admin-user/update-self', '{{%ADMIN_USER%}} [ agent ] {{%BY%}} backend\\models\\AdminUser [ {{%admin_agent}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>头像(avatar) : D:\\www\\ckAgent/backend/web/uploads/avatar/20181008153538_5bbb08caa1e36.png=>D:\\www\\ckAgent/backend/web/uploads/avatar/20181008153725_5bbb093593092.png,<br>最后更新(updated_at) : 1538984138=>1538984245', '1538984245', '1538984245');
INSERT INTO `ck_admin_log` VALUES ('103', '1', 'admin-user/update-self', '{{%ADMIN_USER%}} [ agent ] {{%BY%}} backend\\models\\AdminUser [ {{%admin_agent}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>头像(avatar) : D:\\www\\ckAgent/backend/web/uploads/avatar/20181008153725_5bbb093593092.png=>/uploads/avatar/20181008154119_5bbb0a1f2049f.png,<br>最后更新(updated_at) : 1538984245=>1538984479', '1538984479', '1538984479');
INSERT INTO `ck_admin_log` VALUES ('104', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 42 {{%RECORD%}}: <br>名称(name) : 玩家管理=>会员管理,<br>最后更新(updated_at) : 1538895056=>1538987426', '1538987426', '1538987426');
INSERT INTO `ck_admin_log` VALUES ('105', '1', 'agent-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 43 {{%RECORD%}}: <br>序号(id) => 43,<br>类型(type) => 1,<br>父分类Id(parent_id) => 42,<br>名称(name) => 会员列表,<br>地址(url) => user/index,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538987465,<br>最后更新(updated_at) => 1538987465', '1538987465', '1538987465');
INSERT INTO `ck_admin_log` VALUES ('106', '1', 'agent-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 44 {{%RECORD%}}: <br>序号(id) => 44,<br>类型(type) => 1,<br>父分类Id(parent_id) => 42,<br>名称(name) => 在线会员,<br>地址(url) => user/online,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538987516,<br>最后更新(updated_at) => 1538987516', '1538987516', '1538987516');
INSERT INTO `ck_admin_log` VALUES ('107', '1', 'agent-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 44 {{%RECORD%}}: <br>排序(sort) : 0=>1,<br>最后更新(updated_at) : 1538987516=>1538987566', '1538987566', '1538987566');
INSERT INTO `ck_admin_log` VALUES ('108', '1', 'agent-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 45 {{%RECORD%}}: <br>序号(id) => 45,<br>类型(type) => 1,<br>父分类Id(parent_id) => 42,<br>名称(name) => 今日注册,<br>地址(url) => user/today,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538987585,<br>最后更新(updated_at) => 1538987585', '1538987585', '1538987585');
INSERT INTO `ck_admin_log` VALUES ('109', '1', 'agent-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 45 {{%RECORD%}}: <br>排序(sort) : 0=>2,<br>最后更新(updated_at) : 1538987585=>1538987592', '1538987592', '1538987592');
INSERT INTO `ck_admin_log` VALUES ('110', '1', 'agent-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 46 {{%RECORD%}}: <br>序号(id) => 46,<br>类型(type) => 1,<br>父分类Id(parent_id) => 27,<br>名称(name) => 代理列表,<br>地址(url) => agent/index,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => ,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538987681,<br>最后更新(updated_at) => 1538987681', '1538987681', '1538987681');
INSERT INTO `ck_admin_log` VALUES ('111', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 36 {{%RECORD%}}: <br>名称(name) : 用户报表=>返佣明细,<br>地址(url) : =>report/rebate,<br>最后更新(updated_at) : 1538279634=>1538987911', '1538987911', '1538987911');
INSERT INTO `ck_admin_log` VALUES ('112', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 44 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1538987566=>1538988240', '1538988240', '1538988240');
INSERT INTO `ck_admin_log` VALUES ('113', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 8 {{%RECORD%}}: <br>图标(icon) : fa fa-edit=>fa fa-table,<br>最后更新(updated_at) : 1538201671=>1538988531', '1538988531', '1538988531');
INSERT INTO `ck_admin_log` VALUES ('114', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 27 {{%RECORD%}}: <br>图标(icon) : fa fa-ils=>fa fa-user-circle,<br>最后更新(updated_at) : 1538201599=>1538988851', '1538988851', '1538988851');
INSERT INTO `ck_admin_log` VALUES ('115', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 27 {{%RECORD%}}: <br>图标(icon) : fa fa-user-circle=>fa fa-sitemap,<br>最后更新(updated_at) : 1538988851=>1538988901', '1538988901', '1538988901');
INSERT INTO `ck_admin_log` VALUES ('116', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 30 {{%RECORD%}}: <br>图标(icon) : =>fa fa-card,<br>最后更新(updated_at) : 1538277470=>1539046322', '1539046322', '1539046322');
INSERT INTO `ck_admin_log` VALUES ('117', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 30 {{%RECORD%}}: <br>图标(icon) : fa fa-card=>fa fa-id-card,<br>最后更新(updated_at) : 1539046322=>1539046444', '1539046444', '1539046444');
INSERT INTO `ck_admin_log` VALUES ('118', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 30 {{%RECORD%}}: <br>图标(icon) : fa fa-id-card=>fa fa-vcard,<br>最后更新(updated_at) : 1539046444=>1539046601', '1539046601', '1539046601');
INSERT INTO `ck_admin_log` VALUES ('119', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 30 {{%RECORD%}}: <br>图标(icon) : fa fa-vcard=>fa fa-id-badge,<br>最后更新(updated_at) : 1539046601=>1539046721', '1539046721', '1539046721');
INSERT INTO `ck_admin_log` VALUES ('120', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 30 {{%RECORD%}}: <br>图标(icon) : fa fa-id-badge=>fa fa-group,<br>最后更新(updated_at) : 1539046721=>1539046846', '1539046846', '1539046846');
INSERT INTO `ck_admin_log` VALUES ('121', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 38 {{%RECORD%}}: <br>地址(url) : =>account/role,<br>最后更新(updated_at) : 1538893442=>1539078322', '1539078322', '1539078322');
INSERT INTO `ck_admin_log` VALUES ('122', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 38 {{%RECORD%}}: <br>地址(url) : account/role=>agent-user/role,<br>最后更新(updated_at) : 1539078322=>1539081047', '1539081047', '1539081047');
INSERT INTO `ck_admin_log` VALUES ('123', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 32 {{%RECORD%}}: <br>地址(url) : account/child=>agent-user/index,<br>最后更新(updated_at) : 1538893446=>1539081068', '1539081068', '1539081068');
INSERT INTO `ck_admin_log` VALUES ('124', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 42 {{%RECORD%}}: <br>地址(url) : =>user/index,<br>最后更新(updated_at) : 1538987426=>1539154059', '1539154059', '1539154059');
INSERT INTO `ck_admin_log` VALUES ('125', '1', 'agent-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 43 {{%RECORD%}}: <br>序号(id) => 43,<br>类型(type) => 1,<br>父分类Id(parent_id) => 42,<br>名称(name) => 会员列表,<br>地址(url) => user/index,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538987465,<br>最后更新(updated_at) => 1538987465', '1539154068', '1539154068');
INSERT INTO `ck_admin_log` VALUES ('126', '1', 'agent-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 44 {{%RECORD%}}: <br>序号(id) => 44,<br>类型(type) => 1,<br>父分类Id(parent_id) => 42,<br>名称(name) => 在线会员,<br>地址(url) => user/online,<br>图标(icon) => ,<br>排序(sort) => 1,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 0,<br>创建时间(created_at) => 1538987516,<br>最后更新(updated_at) => 1538988240', '1539154074', '1539154074');
INSERT INTO `ck_admin_log` VALUES ('127', '1', 'agent-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 45 {{%RECORD%}}: <br>序号(id) => 45,<br>类型(type) => 1,<br>父分类Id(parent_id) => 42,<br>名称(name) => 今日注册,<br>地址(url) => user/today,<br>图标(icon) => ,<br>排序(sort) => 2,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538987585,<br>最后更新(updated_at) => 1538987592', '1539154078', '1539154078');
INSERT INTO `ck_admin_log` VALUES ('128', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 27 {{%RECORD%}}: <br>地址(url) : =>agent/index,<br>最后更新(updated_at) : 1538988901=>1539154093', '1539154093', '1539154093');
INSERT INTO `ck_admin_log` VALUES ('129', '1', 'agent-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 46 {{%RECORD%}}: <br>序号(id) => 46,<br>类型(type) => 1,<br>父分类Id(parent_id) => 27,<br>名称(name) => 代理列表,<br>地址(url) => agent/index,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538987681,<br>最后更新(updated_at) => 1538987681', '1539154105', '1539154105');
INSERT INTO `ck_admin_log` VALUES ('130', '1', 'agent-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 38 {{%RECORD%}}: <br>序号(id) => 38,<br>类型(type) => 1,<br>父分类Id(parent_id) => 30,<br>名称(name) => 角色管理,<br>地址(url) => agent-user/role,<br>图标(icon) => ,<br>排序(sort) => 1,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538893381,<br>最后更新(updated_at) => 1539081047', '1539154110', '1539154110');
INSERT INTO `ck_admin_log` VALUES ('131', '1', 'agent-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 32 {{%RECORD%}}: <br>序号(id) => 32,<br>类型(type) => 1,<br>父分类Id(parent_id) => 30,<br>名称(name) => 子账号管理,<br>地址(url) => agent-user/index,<br>图标(icon) => ,<br>排序(sort) => 2,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538279173,<br>最后更新(updated_at) => 1539081068', '1539154115', '1539154115');
INSERT INTO `ck_admin_log` VALUES ('132', '1', 'agent-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 30 {{%RECORD%}}: <br>序号(id) => 30,<br>类型(type) => 1,<br>父分类Id(parent_id) => 0,<br>名称(name) => 账号管理,<br>地址(url) => ,<br>图标(icon) => fa fa-group,<br>排序(sort) => 1,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1538201720,<br>最后更新(updated_at) => 1539046846', '1539154118', '1539154118');
INSERT INTO `ck_admin_log` VALUES ('133', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 42 {{%RECORD%}}: <br>是否显示(is_display) : 1=>0,<br>最后更新(updated_at) : 1539154059=>1539155026', '1539155026', '1539155026');
INSERT INTO `ck_admin_log` VALUES ('134', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 42 {{%RECORD%}}: <br>是否显示(is_display) : 0=>1,<br>最后更新(updated_at) : 1539155026=>1539155034', '1539155034', '1539155034');
INSERT INTO `ck_admin_log` VALUES ('135', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 47 {{%RECORD%}}: <br>序号(id) => 47,<br>类型(type) => 0,<br>父分类Id(parent_id) => 1,<br>名称(name) => 游戏设置,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539160762,<br>最后更新(updated_at) => 1539160762', '1539160762', '1539160762');
INSERT INTO `ck_admin_log` VALUES ('136', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 47 {{%RECORD%}}: <br>地址(url) : =>setting/game,<br>排序(sort) : 0=>2,<br>最后更新(updated_at) : 1539160762=>1539160793', '1539160793', '1539160793');
INSERT INTO `ck_admin_log` VALUES ('137', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 2 {{%RECORD%}}: <br>地址(url) : /setting/website=>setting/website,<br>最后更新(updated_at) : 1538959879=>1539160806', '1539160806', '1539160806');
INSERT INTO `ck_admin_log` VALUES ('138', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 23 {{%RECORD%}}: <br>地址(url) : /site/main=>site/main,<br>最后更新(updated_at) : 1505637024=>1539160818', '1539160818', '1539160818');
INSERT INTO `ck_admin_log` VALUES ('139', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 47 {{%RECORD%}}: <br>排序(sort) : 2=>3,<br>最后更新(updated_at) : 1539160793=>1539160862', '1539160862', '1539160862');
INSERT INTO `ck_admin_log` VALUES ('140', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 4 {{%RECORD%}}: <br>排序(sort) : 3=>4,<br>最后更新(updated_at) : 1538960350=>1539160863', '1539160863', '1539160863');
INSERT INTO `ck_admin_log` VALUES ('141', '1', 'setting/game', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingGameForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 36 {{%RECORD%}}: <br>Value(value) : 5000=>10000', '1539162526', '1539162526');
INSERT INTO `ck_admin_log` VALUES ('142', '1', 'user/create', '{{%ADMIN_USER%}} [ agent ] {{%BY%}} backend\\models\\AdminUser [ {{%user}} ]  {{%CREATED%}} {{%ID%}} 4 {{%RECORD%}}: <br>会员ID(id) => 4,<br>会员账号(username) => aaaaa,<br>会员昵称(nickname) => ,<br>cookie验证auth_key(auth_key) => ,<br>加密后密码(password_hash) => ,<br>支付密码(password_pay) => ,<br>找回密码token(password_reset_token) => ,<br>用户邮箱(email) => ,<br>用户头像url(avatar) => ,<br>会员状态(status) => 1,<br>洗码率(xima_rate) => ,<br>洗码类别(xima_type) => ,<br>查看洗码(xima_status) => ,<br>最小限红(min_limit) => ,<br>最大限红(max_limit) => ,<br>最小和限红(dogfall_min_limit) => ,<br>最大和限红(dogfall_max_limit) => ,<br>最小对限红(pair_min_limit) => ,<br>最大和限红(pair_max_limit) => ,<br>邀请代理ID(invite_agent_id) => ,<br>邀请用户ID(invite_user_id) => ,<br>注册日期(created_at) => 1539173959,<br>最后修改时间(updated_at) => 1539173959', '1539173959', '1539173959');
INSERT INTO `ck_admin_log` VALUES ('143', '1', 'user/create', '{{%ADMIN_USER%}} [ agent ] {{%BY%}} backend\\models\\AdminUser [ {{%user}} ]  {{%CREATED%}} {{%ID%}} 5 {{%RECORD%}}: <br>会员ID(id) => 5,<br>会员账号(username) => 12345,<br>会员昵称(nickname) => ,<br>cookie验证auth_key(auth_key) => hg7FzRlHigQsFtsTDhG3Kwgntp-wzKNO,<br>加密后密码(password_hash) => $2y$13$Ua8FnsVfC8tX/CR1ykQUXO33NkBD0LVPvv6oYtglCmqu1rQsiuV8W,<br>支付密码(password_pay) => ,<br>找回密码token(password_reset_token) => ,<br>用户邮箱(email) => ,<br>用户头像url(avatar) => ,<br>会员状态(status) => 1,<br>洗码率(xima_rate) => 0.900,<br>洗码类别(xima_type) => 2,<br>查看洗码(xima_status) => 1,<br>最小限红(min_limit) => 10,<br>最大限红(max_limit) => 10000,<br>最小和限红(dogfall_min_limit) => 10,<br>最大和限红(dogfall_max_limit) => 5000,<br>最小对限红(pair_min_limit) => 10,<br>最大和限红(pair_max_limit) => ,<br>邀请代理ID(invite_agent_id) => 1,<br>邀请用户ID(invite_user_id) => ,<br>注册日期(created_at) => 1539239742,<br>最后修改时间(updated_at) => 1539239742', '1539239742', '1539239742');
INSERT INTO `ck_admin_log` VALUES ('144', '1', 'user/update', '{{%ADMIN_USER%}} [ agent ] {{%BY%}} backend\\models\\AdminUser [ {{%user}} ]  {{%UPDATED%}} {{%ID%}} 5 {{%RECORD%}}: <br>最大和限红(pair_max_limit) : =>5000,<br>最后修改时间(updated_at) : 1539239742=>1539239858', '1539239858', '1539239858');
INSERT INTO `ck_admin_log` VALUES ('145', '1', 'user/update', '{{%ADMIN_USER%}} [ agent ] {{%BY%}} backend\\models\\AdminUser [ {{%user}} ]  {{%UPDATED%}} {{%ID%}} 5 {{%RECORD%}}: <br>洗码率(xima_rate) : 0.900=>0.008,<br>最后修改时间(updated_at) : 1539239858=>1539240983', '1539240983', '1539240983');
INSERT INTO `ck_admin_log` VALUES ('146', '1', 'agent/create', '{{%ADMIN_USER%}} [ agent ] {{%BY%}} backend\\models\\Agent [ agent ]  {{%CREATED%}} {{%ID%}} 2 {{%RECORD%}}: <br>代理id(id) => 2,<br>代理账号(username) => abcd,<br>Password Hash(password_hash) => $2y$13$8Z7ZYvJophNzhE9fIHuhluh5vFE1K8bDe5Nw19KRrX3bIZIDqJPvS,<br>管理员cookie验证auth_key(auth_key) => l1UmJJ7gZbLyzblGiglnT7ye6HB91FA1,<br>管理员找回密码token(password_reset_token) => ,<br>真实姓名(realname) => ,<br>邮箱(email) => ,<br>手机号码(mobile) => ,<br>头像(avatar) => ,<br>推广码(promo_code) => jaLgnR,<br>上层账号(parent_id) => 1,<br>总代账号(top_id) => 1,<br>代理层级(agent_level) => 2,<br>查看洗码(xima_status) => 1,<br>洗码率(xima_rate) => 0.009,<br>洗码类别(xima_type) => 2,<br>占成(rebate_rate) => 0.350,<br>预设玩家层级(default_player_level) => ,<br>返佣方案(rebate_id) => ,<br>账户余额(available_amount) => ,<br>冻结余额(frozen_amount) => ,<br>返佣总额(rebate_amount) => ,<br>主货币(currency) => ,<br>创建渠道(reg_from) => ,<br>注册IP(reg_ip) => ,<br>状态(status) => 1,<br>备注(memo) => ,<br>创建日期(created_at) => 1539253756,<br>修改日期(updated_at) => 1539253756', '1539253756', '1539253756');
INSERT INTO `ck_admin_log` VALUES ('147', '1', 'agent/create', '{{%ADMIN_USER%}} [ agent ] {{%BY%}} backend\\models\\Agent [ agent ]  {{%CREATED%}} {{%ID%}} 3 {{%RECORD%}}: <br>代理id(id) => 3,<br>代理账号(username) => sentry,<br>Password Hash(password_hash) => $2y$13$wXgEKeiho2xsYdujFhyKCu7Pz9G8LA8BC1KgCj36R48viAuua9cYe,<br>管理员cookie验证auth_key(auth_key) => BQJSUEW_CarL9K8pRZ7jSPGSIv36UZCl,<br>管理员找回密码token(password_reset_token) => ,<br>真实姓名(realname) => ,<br>邮箱(email) => ,<br>手机号码(mobile) => ,<br>头像(avatar) => ,<br>推广码(promo_code) => QQRN1_9X,<br>上层账号(parent_id) => 1,<br>总代账号(top_id) => 1,<br>代理层级(agent_level) => 2,<br>查看洗码(xima_status) => 1,<br>洗码率(xima_rate) => 0.009,<br>洗码类别(xima_type) => 2,<br>占成(rebate_rate) => 0.350,<br>预设玩家层级(default_player_level) => ,<br>返佣方案(rebate_id) => ,<br>账户余额(available_amount) => ,<br>冻结余额(frozen_amount) => ,<br>返佣总额(rebate_amount) => ,<br>主货币(currency) => ,<br>创建渠道(reg_from) => ,<br>注册IP(reg_ip) => ,<br>状态(status) => 1,<br>备注(memo) => ,<br>创建日期(created_at) => 1539254027,<br>修改日期(updated_at) => 1539254027', '1539254027', '1539254027');
INSERT INTO `ck_admin_log` VALUES ('148', '1', 'agent/create', '{{%ADMIN_USER%}} [ agent ] {{%BY%}} backend\\models\\Agent [ agent ]  {{%CREATED%}} {{%ID%}} 4 {{%RECORD%}}: <br>代理id(id) => 4,<br>代理账号(username) => aaaaa,<br>Password Hash(password_hash) => $2y$13$R4iNNIv/HpQPZiHzDlo9Oe6rdnWRABBvQGk1mNMU2LVBx4aZwm3be,<br>管理员cookie验证auth_key(auth_key) => upF5uuqeLAgAvCbCLkyyfVPTYf6YxcrX,<br>管理员找回密码token(password_reset_token) => ,<br>真实姓名(realname) => ,<br>邮箱(email) => ,<br>手机号码(mobile) => ,<br>头像(avatar) => ,<br>推广码(promo_code) => AU8CTP0TWW,<br>上层账号(parent_id) => 1,<br>总代账号(top_id) => 1,<br>代理层级(agent_level) => 2,<br>查看洗码(xima_status) => 1,<br>洗码率(xima_rate) => 0.009,<br>洗码类别(xima_type) => 2,<br>占成(rebate_rate) => 0.350,<br>预设玩家层级(default_player_level) => ,<br>返佣方案(rebate_id) => ,<br>账户余额(available_amount) => ,<br>冻结余额(frozen_amount) => ,<br>返佣总额(rebate_amount) => ,<br>主货币(currency) => ,<br>创建渠道(reg_from) => ,<br>注册IP(reg_ip) => ,<br>状态(status) => 1,<br>备注(memo) => ,<br>创建日期(created_at) => 1539254184,<br>修改日期(updated_at) => 1539254184', '1539254184', '1539254184');
INSERT INTO `ck_admin_log` VALUES ('149', '1', 'agent-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 35 {{%RECORD%}}: <br>地址(url) : =>report/betlist,<br>最后更新(updated_at) : 1538279590=>1539310071', '1539310071', '1539310071');
INSERT INTO `ck_admin_log` VALUES ('150', '3', 'agent/create', '{{%ADMIN_USER%}} [ sentry ] {{%BY%}} backend\\models\\Agent [ agent ]  {{%CREATED%}} {{%ID%}} 5 {{%RECORD%}}: <br>代理id(id) => 5,<br>代理账号(username) => ddddd,<br>Password Hash(password_hash) => $2y$13$Pi1MNeZQgy.URXjdIUwFWeXVP3u22mOVuWlTfNuVROP1L2EWNz9lm,<br>管理员cookie验证auth_key(auth_key) => ytOKSDCJfK3K8zWXUm9-RNteTJJ-nUy9,<br>管理员找回密码token(password_reset_token) => ,<br>真实姓名(realname) => ,<br>邮箱(email) => ,<br>手机号码(mobile) => ,<br>头像(avatar) => ,<br>推广码(promo_code) => TMB8RUO7CR,<br>上层账号(parent_id) => 3,<br>总代账号(top_id) => 1,<br>代理层级(agent_level) => 3,<br>查看洗码(xima_status) => 1,<br>洗码率(xima_rate) => 0.009,<br>洗码类别(xima_type) => 2,<br>占成(rebate_rate) => 0.35,<br>预设玩家层级(default_player_level) => ,<br>返佣方案(rebate_id) => ,<br>账户余额(available_amount) => ,<br>冻结余额(frozen_amount) => ,<br>返佣总额(rebate_amount) => ,<br>主货币(currency) => ,<br>创建渠道(reg_from) => ,<br>注册IP(reg_ip) => ,<br>状态(status) => 1,<br>备注(memo) => ,<br>创建日期(created_at) => 1539334247,<br>修改日期(updated_at) => 1539334247', '1539334247', '1539334247');
INSERT INTO `ck_admin_log` VALUES ('151', '3', 'agent/update', '{{%ADMIN_USER%}} [ sentry ] {{%BY%}} backend\\models\\Agent [ agent ]  {{%UPDATED%}} {{%ID%}} 5 {{%RECORD%}}: <br>真实姓名(realname) : =>测试,<br>洗码率(xima_rate) : 0.009=>0.009,<br>修改日期(updated_at) : 1539334247=>1539334897', '1539334897', '1539334897');
INSERT INTO `ck_admin_log` VALUES ('152', '1', 'admin-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 18 {{%RECORD%}}: <br>序号(id) => 18,<br>类型(type) => 0,<br>父分类Id(parent_id) => 0,<br>名称(name) => 友情链接,<br>地址(url) => friendly-link/index,<br>图标(icon) => fa fa-link,<br>排序(sort) => 6,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 0,<br>创建时间(created_at) => 1505570934,<br>最后更新(updated_at) => 1538893906', '1539660756', '1539660756');
INSERT INTO `ck_admin_log` VALUES ('153', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 48 {{%RECORD%}}: <br>序号(id) => 48,<br>类型(type) => 0,<br>父分类Id(parent_id) => 0,<br>名称(name) => 系统管理,<br>地址(url) => ,<br>图标(icon) => fa fa-cog,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539867193,<br>最后更新(updated_at) => 1539867193', '1539867193', '1539867193');
INSERT INTO `ck_admin_log` VALUES ('154', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>排序(sort) : 1=>10,<br>最后更新(updated_at) : 1538884729=>1539867204', '1539867204', '1539867204');
INSERT INTO `ck_admin_log` VALUES ('155', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 48 {{%RECORD%}}: <br>排序(sort) : 0=>10,<br>最后更新(updated_at) : 1539867193=>1539867227', '1539867227', '1539867227');
INSERT INTO `ck_admin_log` VALUES ('156', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 5 {{%RECORD%}}: <br>父分类Id(parent_id) : 0=>48,<br>最后更新(updated_at) : 1538884737=>1539867239', '1539867239', '1539867239');
INSERT INTO `ck_admin_log` VALUES ('157', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 5 {{%RECORD%}}: <br>名称(name) : 菜单=>菜单管理,<br>图标(icon) : fa fa-th-list=>,<br>排序(sort) : 2=>0,<br>最后更新(updated_at) : 1539867239=>1539867272', '1539867272', '1539867272');
INSERT INTO `ck_admin_log` VALUES ('158', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 19 {{%RECORD%}}: <br>父分类Id(parent_id) : 0=>48,<br>名称(name) : 缓存=>清理缓存,<br>图标(icon) : fa fa-file=>,<br>最后更新(updated_at) : 1538881401=>1539867355', '1539867355', '1539867355');
INSERT INTO `ck_admin_log` VALUES ('159', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>父分类Id(parent_id) : 0=>48,<br>名称(name) : 日志=>日志管理,<br>最后更新(updated_at) : 1512380045=>1539867378', '1539867378', '1539867378');
INSERT INTO `ck_admin_log` VALUES ('160', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>父分类Id(parent_id) : 0=>48,<br>名称(name) : 设置=>系统设置,<br>最后更新(updated_at) : 1539867204=>1539867410', '1539867410', '1539867410');
INSERT INTO `ck_admin_log` VALUES ('161', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 2 {{%RECORD%}}: <br>名称(name) : 系统设置=>网站设置,<br>最后更新(updated_at) : 1539160806=>1539867437', '1539867437', '1539867437');
INSERT INTO `ck_admin_log` VALUES ('162', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>父分类Id(parent_id) : 48=>0,<br>最后更新(updated_at) : 1539867410=>1539911405', '1539911405', '1539911405');
INSERT INTO `ck_admin_log` VALUES ('163', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 23 {{%RECORD%}}: <br>图标(icon) : =>fa fa-home,<br>最后更新(updated_at) : 1539160818=>1539918308', '1539918308', '1539918308');
INSERT INTO `ck_admin_log` VALUES ('164', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 13 {{%RECORD%}}: <br>名称(name) : 用户管理=>会员管理,<br>地址(url) : user/index=>,<br>最后更新(updated_at) : 1538201649=>1539918469', '1539918469', '1539918469');
INSERT INTO `ck_admin_log` VALUES ('165', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 13 {{%RECORD%}}: <br>排序(sort) : 4=>1,<br>最后更新(updated_at) : 1539918469=>1539918814', '1539918814', '1539918814');
INSERT INTO `ck_admin_log` VALUES ('166', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 14 {{%RECORD%}}: <br>父分类Id(parent_id) : 0=>48,<br>名称(name) : 权限管理=>管理员管理,<br>最后更新(updated_at) : 1512380045=>1539918871', '1539918871', '1539918871');
INSERT INTO `ck_admin_log` VALUES ('167', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 14 {{%RECORD%}}: <br>排序(sort) : 5=>1,<br>最后更新(updated_at) : 1539918871=>1539918888', '1539918888', '1539918888');
INSERT INTO `ck_admin_log` VALUES ('168', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 19 {{%RECORD%}}: <br>排序(sort) : 7=>2,<br>最后更新(updated_at) : 1539867355=>1539918890', '1539918890', '1539918890');
INSERT INTO `ck_admin_log` VALUES ('169', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>排序(sort) : 8=>3,<br>最后更新(updated_at) : 1539867378=>1539918894', '1539918894', '1539918894');
INSERT INTO `ck_admin_log` VALUES ('170', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 15 {{%RECORD%}}: <br>名称(name) : 权限=>权限管理,<br>最后更新(updated_at) : 1505570862=>1539918906', '1539918906', '1539918906');
INSERT INTO `ck_admin_log` VALUES ('171', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 16 {{%RECORD%}}: <br>名称(name) : 角色=>角色管理,<br>最后更新(updated_at) : 1505570882=>1539918920', '1539918920', '1539918920');
INSERT INTO `ck_admin_log` VALUES ('172', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 17 {{%RECORD%}}: <br>名称(name) : 管理员=>管理员列表,<br>最后更新(updated_at) : 1505570902=>1539918937', '1539918937', '1539918937');
INSERT INTO `ck_admin_log` VALUES ('173', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 49 {{%RECORD%}}: <br>序号(id) => 49,<br>类型(type) => 0,<br>父分类Id(parent_id) => 13,<br>名称(name) => 会员列表,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539918991,<br>最后更新(updated_at) => 1539918991', '1539918991', '1539918991');
INSERT INTO `ck_admin_log` VALUES ('174', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>排序(sort) : 10=>9,<br>最后更新(updated_at) : 1539911405=>1539919013', '1539919013', '1539919013');
INSERT INTO `ck_admin_log` VALUES ('175', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 50 {{%RECORD%}}: <br>序号(id) => 50,<br>类型(type) => 0,<br>父分类Id(parent_id) => 0,<br>名称(name) => 代理管理,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 2,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539919023,<br>最后更新(updated_at) => 1539919023', '1539919023', '1539919023');
INSERT INTO `ck_admin_log` VALUES ('176', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 50 {{%RECORD%}}: <br>图标(icon) : =>fa fa-ship,<br>最后更新(updated_at) : 1539919023=>1539919039', '1539919039', '1539919039');
INSERT INTO `ck_admin_log` VALUES ('177', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 51 {{%RECORD%}}: <br>序号(id) => 51,<br>类型(type) => 0,<br>父分类Id(parent_id) => 0,<br>名称(name) => 3,<br>地址(url) => 财务管理,<br>图标(icon) => fa fa-money,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539919149,<br>最后更新(updated_at) => 1539919149', '1539919149', '1539919149');
INSERT INTO `ck_admin_log` VALUES ('178', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 51 {{%RECORD%}}: <br>名称(name) : 3=>财务管理,<br>地址(url) : 财务管理=>,<br>排序(sort) : 0=>3,<br>最后更新(updated_at) : 1539919149=>1539919172', '1539919172', '1539919172');
INSERT INTO `ck_admin_log` VALUES ('179', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 52 {{%RECORD%}}: <br>序号(id) => 52,<br>类型(type) => 0,<br>父分类Id(parent_id) => 0,<br>名称(name) => 统计报表,<br>地址(url) => ,<br>图标(icon) => fa fa-line-chart,<br>排序(sort) => 5,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539919297,<br>最后更新(updated_at) => 1539919297', '1539919297', '1539919297');
INSERT INTO `ck_admin_log` VALUES ('180', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 53 {{%RECORD%}}: <br>序号(id) => 53,<br>类型(type) => 0,<br>父分类Id(parent_id) => 0,<br>名称(name) => 运营管理,<br>地址(url) => ,<br>图标(icon) => fa fa-street-view,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539919537,<br>最后更新(updated_at) => 1539919537', '1539919537', '1539919537');
INSERT INTO `ck_admin_log` VALUES ('181', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 53 {{%RECORD%}}: <br>排序(sort) : 0=>4,<br>最后更新(updated_at) : 1539919537=>1539919549', '1539919549', '1539919549');
INSERT INTO `ck_admin_log` VALUES ('182', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 51 {{%RECORD%}}: <br>排序(sort) : 3=>4,<br>最后更新(updated_at) : 1539919172=>1539919578', '1539919578', '1539919578');
INSERT INTO `ck_admin_log` VALUES ('183', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 53 {{%RECORD%}}: <br>排序(sort) : 4=>3,<br>最后更新(updated_at) : 1539919549=>1539919580', '1539919580', '1539919580');
INSERT INTO `ck_admin_log` VALUES ('184', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>名称(name) : 系统设置=>平台设置,<br>最后更新(updated_at) : 1539919013=>1539919792', '1539919792', '1539919792');
INSERT INTO `ck_admin_log` VALUES ('185', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 54 {{%RECORD%}}: <br>序号(id) => 54,<br>类型(type) => 0,<br>父分类Id(parent_id) => 13,<br>名称(name) => 今日注册,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 1,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920006,<br>最后更新(updated_at) => 1539920006', '1539920006', '1539920006');
INSERT INTO `ck_admin_log` VALUES ('186', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 55 {{%RECORD%}}: <br>序号(id) => 55,<br>类型(type) => 0,<br>父分类Id(parent_id) => 13,<br>名称(name) => 在线会员,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 2,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920023,<br>最后更新(updated_at) => 1539920023', '1539920023', '1539920023');
INSERT INTO `ck_admin_log` VALUES ('187', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 56 {{%RECORD%}}: <br>序号(id) => 56,<br>类型(type) => 0,<br>父分类Id(parent_id) => 13,<br>名称(name) => 登陆查询,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 3,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920151,<br>最后更新(updated_at) => 1539920151', '1539920151', '1539920151');
INSERT INTO `ck_admin_log` VALUES ('188', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 57 {{%RECORD%}}: <br>序号(id) => 57,<br>类型(type) => 0,<br>父分类Id(parent_id) => 50,<br>名称(name) => 代理列表,<br>地址(url) => agent/index,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920171,<br>最后更新(updated_at) => 1539920171', '1539920171', '1539920171');
INSERT INTO `ck_admin_log` VALUES ('189', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 58 {{%RECORD%}}: <br>序号(id) => 58,<br>类型(type) => 0,<br>父分类Id(parent_id) => 50,<br>名称(name) => 代理佣金,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 1,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920210,<br>最后更新(updated_at) => 1539920210', '1539920210', '1539920210');
INSERT INTO `ck_admin_log` VALUES ('190', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 59 {{%RECORD%}}: <br>序号(id) => 59,<br>类型(type) => 0,<br>父分类Id(parent_id) => 50,<br>名称(name) => 交易记录,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 2,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920228,<br>最后更新(updated_at) => 1539920228', '1539920228', '1539920228');
INSERT INTO `ck_admin_log` VALUES ('191', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 60 {{%RECORD%}}: <br>序号(id) => 60,<br>类型(type) => 0,<br>父分类Id(parent_id) => 53,<br>名称(name) => 站内消息,<br>地址(url) => message/index,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920255,<br>最后更新(updated_at) => 1539920255', '1539920255', '1539920255');
INSERT INTO `ck_admin_log` VALUES ('192', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 61 {{%RECORD%}}: <br>序号(id) => 61,<br>类型(type) => 0,<br>父分类Id(parent_id) => 53,<br>名称(name) => 系统公告,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 1,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920271,<br>最后更新(updated_at) => 1539920271', '1539920271', '1539920271');
INSERT INTO `ck_admin_log` VALUES ('193', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 62 {{%RECORD%}}: <br>序号(id) => 62,<br>类型(type) => 0,<br>父分类Id(parent_id) => 51,<br>名称(name) => 银行卡管理,<br>地址(url) => bank/index,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920304,<br>最后更新(updated_at) => 1539920304', '1539920304', '1539920304');
INSERT INTO `ck_admin_log` VALUES ('194', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 63 {{%RECORD%}}: <br>序号(id) => 63,<br>类型(type) => 0,<br>父分类Id(parent_id) => 51,<br>名称(name) => 平台资金,<br>地址(url) => platform/amount,<br>图标(icon) => ,<br>排序(sort) => 1,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920335,<br>最后更新(updated_at) => 1539920335', '1539920335', '1539920335');
INSERT INTO `ck_admin_log` VALUES ('195', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 64 {{%RECORD%}}: <br>序号(id) => 64,<br>类型(type) => 0,<br>父分类Id(parent_id) => 51,<br>名称(name) => 充值审核,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 2,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920357,<br>最后更新(updated_at) => 1539920357', '1539920357', '1539920357');
INSERT INTO `ck_admin_log` VALUES ('196', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 64 {{%RECORD%}}: <br>名称(name) : 充值审核=>存款审核,<br>最后更新(updated_at) : 1539920357=>1539920367', '1539920367', '1539920367');
INSERT INTO `ck_admin_log` VALUES ('197', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 65 {{%RECORD%}}: <br>序号(id) => 65,<br>类型(type) => 0,<br>父分类Id(parent_id) => 51,<br>名称(name) => 取款审核,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 4,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920385,<br>最后更新(updated_at) => 1539920385', '1539920385', '1539920385');
INSERT INTO `ck_admin_log` VALUES ('198', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 66 {{%RECORD%}}: <br>序号(id) => 66,<br>类型(type) => 0,<br>父分类Id(parent_id) => 51,<br>名称(name) => 资金交易记录,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 05,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920496,<br>最后更新(updated_at) => 1539920496', '1539920496', '1539920496');
INSERT INTO `ck_admin_log` VALUES ('199', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 67 {{%RECORD%}}: <br>序号(id) => 67,<br>类型(type) => 0,<br>父分类Id(parent_id) => 51,<br>名称(name) => 银行资金明细,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 7,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920521,<br>最后更新(updated_at) => 1539920521', '1539920521', '1539920521');
INSERT INTO `ck_admin_log` VALUES ('200', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 67 {{%RECORD%}}: <br>排序(sort) : 7=>6,<br>最后更新(updated_at) : 1539920521=>1539920527', '1539920527', '1539920527');
INSERT INTO `ck_admin_log` VALUES ('201', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 68 {{%RECORD%}}: <br>序号(id) => 68,<br>类型(type) => 0,<br>父分类Id(parent_id) => 51,<br>名称(name) => 会员额度调整,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920603,<br>最后更新(updated_at) => 1539920603', '1539920603', '1539920603');
INSERT INTO `ck_admin_log` VALUES ('202', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 65 {{%RECORD%}}: <br>排序(sort) : 4=>3,<br>最后更新(updated_at) : 1539920385=>1539920616', '1539920616', '1539920616');
INSERT INTO `ck_admin_log` VALUES ('203', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 68 {{%RECORD%}}: <br>排序(sort) : 0=>4,<br>最后更新(updated_at) : 1539920603=>1539920617', '1539920617', '1539920617');
INSERT INTO `ck_admin_log` VALUES ('204', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 69 {{%RECORD%}}: <br>序号(id) => 69,<br>类型(type) => 0,<br>父分类Id(parent_id) => 51,<br>名称(name) => 盘点稽查,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 5,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920678,<br>最后更新(updated_at) => 1539920678', '1539920678', '1539920678');
INSERT INTO `ck_admin_log` VALUES ('205', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 66 {{%RECORD%}}: <br>排序(sort) : 5=>6,<br>最后更新(updated_at) : 1539920496=>1539920686', '1539920686', '1539920686');
INSERT INTO `ck_admin_log` VALUES ('206', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 67 {{%RECORD%}}: <br>排序(sort) : 6=>7,<br>最后更新(updated_at) : 1539920527=>1539920687', '1539920687', '1539920687');
INSERT INTO `ck_admin_log` VALUES ('207', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 70 {{%RECORD%}}: <br>序号(id) => 70,<br>类型(type) => 0,<br>父分类Id(parent_id) => 53,<br>名称(name) => 游戏平台,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539921125,<br>最后更新(updated_at) => 1539921125', '1539921125', '1539921125');
INSERT INTO `ck_admin_log` VALUES ('208', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 60 {{%RECORD%}}: <br>排序(sort) : 0=>1,<br>最后更新(updated_at) : 1539920255=>1539921132', '1539921132', '1539921132');
INSERT INTO `ck_admin_log` VALUES ('209', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 61 {{%RECORD%}}: <br>排序(sort) : 1=>2,<br>最后更新(updated_at) : 1539920271=>1539921133', '1539921133', '1539921133');
INSERT INTO `ck_admin_log` VALUES ('210', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 70 {{%RECORD%}}: <br>名称(name) : 游戏平台=>游戏平台管理,<br>最后更新(updated_at) : 1539921125=>1539921236', '1539921236', '1539921236');
INSERT INTO `ck_admin_log` VALUES ('211', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 71 {{%RECORD%}}: <br>序号(id) => 71,<br>类型(type) => 0,<br>父分类Id(parent_id) => 53,<br>名称(name) => 游戏类型,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 01,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539921263,<br>最后更新(updated_at) => 1539921263', '1539921263', '1539921263');
INSERT INTO `ck_admin_log` VALUES ('212', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 60 {{%RECORD%}}: <br>排序(sort) : 1=>4,<br>最后更新(updated_at) : 1539921132=>1539921275', '1539921275', '1539921275');
INSERT INTO `ck_admin_log` VALUES ('213', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 61 {{%RECORD%}}: <br>排序(sort) : 2=>5,<br>最后更新(updated_at) : 1539921133=>1539921276', '1539921276', '1539921276');
INSERT INTO `ck_admin_log` VALUES ('214', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 70 {{%RECORD%}}: <br>名称(name) : 游戏平台管理=>游戏平台,<br>最后更新(updated_at) : 1539921236=>1539921287', '1539921287', '1539921287');
INSERT INTO `ck_admin_log` VALUES ('215', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 66 {{%RECORD%}}: <br>排序(sort) : 6=>7,<br>最后更新(updated_at) : 1539920686=>1539921390', '1539921390', '1539921390');
INSERT INTO `ck_admin_log` VALUES ('216', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 67 {{%RECORD%}}: <br>排序(sort) : 7=>8,<br>最后更新(updated_at) : 1539920687=>1539921391', '1539921391', '1539921391');
INSERT INTO `ck_admin_log` VALUES ('217', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 72 {{%RECORD%}}: <br>序号(id) => 72,<br>类型(type) => 0,<br>父分类Id(parent_id) => 51,<br>名称(name) => 上下分明细,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 7,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539921406,<br>最后更新(updated_at) => 1539921406', '1539921406', '1539921406');
INSERT INTO `ck_admin_log` VALUES ('218', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 72 {{%RECORD%}}: <br>排序(sort) : 7=>6,<br>最后更新(updated_at) : 1539921406=>1539921416', '1539921416', '1539921416');
INSERT INTO `ck_admin_log` VALUES ('219', '1', 'admin-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 72 {{%RECORD%}}: <br>序号(id) => 72,<br>类型(type) => 0,<br>父分类Id(parent_id) => 51,<br>名称(name) => 上下分明细,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 6,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539921406,<br>最后更新(updated_at) => 1539921416', '1539921738', '1539921738');
INSERT INTO `ck_admin_log` VALUES ('220', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 69 {{%RECORD%}}: <br>名称(name) : 盘点稽查=>会员额度盘点,<br>最后更新(updated_at) : 1539920678=>1539921796', '1539921796', '1539921796');
INSERT INTO `ck_admin_log` VALUES ('221', '1', 'admin-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 69 {{%RECORD%}}: <br>序号(id) => 69,<br>类型(type) => 0,<br>父分类Id(parent_id) => 51,<br>名称(name) => 会员额度盘点,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 5,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539920678,<br>最后更新(updated_at) => 1539921796', '1539922074', '1539922074');
INSERT INTO `ck_admin_log` VALUES ('222', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 73 {{%RECORD%}}: <br>序号(id) => 73,<br>类型(type) => 0,<br>父分类Id(parent_id) => 52,<br>名称(name) => 用户统计,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539922246,<br>最后更新(updated_at) => 1539922246', '1539922246', '1539922246');
INSERT INTO `ck_admin_log` VALUES ('223', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 74 {{%RECORD%}}: <br>序号(id) => 74,<br>类型(type) => 0,<br>父分类Id(parent_id) => 52,<br>名称(name) => 代理报表,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 01,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539922259,<br>最后更新(updated_at) => 1539922259', '1539922259', '1539922259');
INSERT INTO `ck_admin_log` VALUES ('224', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 73 {{%RECORD%}}: <br>名称(name) : 用户统计=>用户报表,<br>最后更新(updated_at) : 1539922246=>1539922277', '1539922277', '1539922277');
INSERT INTO `ck_admin_log` VALUES ('225', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 75 {{%RECORD%}}: <br>序号(id) => 75,<br>类型(type) => 0,<br>父分类Id(parent_id) => 52,<br>名称(name) => 投注记录,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539922437,<br>最后更新(updated_at) => 1539922437', '1539922437', '1539922437');
INSERT INTO `ck_admin_log` VALUES ('226', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 76 {{%RECORD%}}: <br>序号(id) => 76,<br>类型(type) => 0,<br>父分类Id(parent_id) => 13,<br>名称(name) => 会员报表,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539922562,<br>最后更新(updated_at) => 1539922562', '1539922562', '1539922562');
INSERT INTO `ck_admin_log` VALUES ('227', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 76 {{%RECORD%}}: <br>排序(sort) : 0=>1,<br>最后更新(updated_at) : 1539922562=>1539922576', '1539922576', '1539922576');
INSERT INTO `ck_admin_log` VALUES ('228', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 54 {{%RECORD%}}: <br>排序(sort) : 1=>2,<br>最后更新(updated_at) : 1539920006=>1539922577', '1539922577', '1539922577');
INSERT INTO `ck_admin_log` VALUES ('229', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 55 {{%RECORD%}}: <br>排序(sort) : 2=>3,<br>最后更新(updated_at) : 1539920023=>1539922578', '1539922578', '1539922578');
INSERT INTO `ck_admin_log` VALUES ('230', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 56 {{%RECORD%}}: <br>排序(sort) : 3=>4,<br>最后更新(updated_at) : 1539920151=>1539922579', '1539922579', '1539922579');
INSERT INTO `ck_admin_log` VALUES ('231', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 73 {{%RECORD%}}: <br>名称(name) : 用户报表=>用户统计,<br>最后更新(updated_at) : 1539922277=>1539922637', '1539922637', '1539922637');
INSERT INTO `ck_admin_log` VALUES ('232', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 74 {{%RECORD%}}: <br>名称(name) : 代理报表=>代理统计,<br>最后更新(updated_at) : 1539922259=>1539922661', '1539922661', '1539922661');
INSERT INTO `ck_admin_log` VALUES ('233', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 75 {{%RECORD%}}: <br>排序(sort) : 0=>2,<br>最后更新(updated_at) : 1539922437=>1539922677', '1539922677', '1539922677');
INSERT INTO `ck_admin_log` VALUES ('234', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 75 {{%RECORD%}}: <br>名称(name) : 投注记录=>平台统计,<br>最后更新(updated_at) : 1539922677=>1539922687', '1539922687', '1539922687');
INSERT INTO `ck_admin_log` VALUES ('235', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 77 {{%RECORD%}}: <br>序号(id) => 77,<br>类型(type) => 0,<br>父分类Id(parent_id) => 52,<br>名称(name) => 投注报表,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 4,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539922706,<br>最后更新(updated_at) => 1539922706', '1539922706', '1539922706');
INSERT INTO `ck_admin_log` VALUES ('236', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 66 {{%RECORD%}}: <br>父分类Id(parent_id) : 51=>52,<br>名称(name) : 资金交易记录=>交易报表,<br>最后更新(updated_at) : 1539921390=>1539922778', '1539922778', '1539922778');
INSERT INTO `ck_admin_log` VALUES ('237', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 67 {{%RECORD%}}: <br>排序(sort) : 8=>5,<br>最后更新(updated_at) : 1539921391=>1539922817', '1539922817', '1539922817');
INSERT INTO `ck_admin_log` VALUES ('238', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 78 {{%RECORD%}}: <br>序号(id) => 78,<br>类型(type) => 0,<br>父分类Id(parent_id) => 51,<br>名称(name) => 盘点记录,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 6,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539922830,<br>最后更新(updated_at) => 1539922830', '1539922830', '1539922830');
INSERT INTO `ck_admin_log` VALUES ('239', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 79 {{%RECORD%}}: <br>序号(id) => 79,<br>类型(type) => 0,<br>父分类Id(parent_id) => 52,<br>名称(name) => 赢输报表,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 5,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539922888,<br>最后更新(updated_at) => 1539922888', '1539922888', '1539922888');
INSERT INTO `ck_admin_log` VALUES ('240', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 80 {{%RECORD%}}: <br>序号(id) => 80,<br>类型(type) => 0,<br>父分类Id(parent_id) => 52,<br>名称(name) => 上下分报表,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 7,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539922983,<br>最后更新(updated_at) => 1539922983', '1539922983', '1539922983');
INSERT INTO `ck_admin_log` VALUES ('241', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 81 {{%RECORD%}}: <br>序号(id) => 81,<br>类型(type) => 0,<br>父分类Id(parent_id) => 52,<br>名称(name) => 洗码报表,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 8,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539923015,<br>最后更新(updated_at) => 1539923015', '1539923015', '1539923015');
INSERT INTO `ck_admin_log` VALUES ('242', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 66 {{%RECORD%}}: <br>排序(sort) : 7=>6,<br>最后更新(updated_at) : 1539922778=>1539923023', '1539923023', '1539923023');
INSERT INTO `ck_admin_log` VALUES ('243', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 75 {{%RECORD%}}: <br>排序(sort) : 2=>0,<br>最后更新(updated_at) : 1539922687=>1539923033', '1539923033', '1539923033');
INSERT INTO `ck_admin_log` VALUES ('244', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 73 {{%RECORD%}}: <br>排序(sort) : 0=>2,<br>最后更新(updated_at) : 1539922637=>1539923035', '1539923035', '1539923035');
INSERT INTO `ck_admin_log` VALUES ('245', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 82 {{%RECORD%}}: <br>序号(id) => 82,<br>类型(type) => 0,<br>父分类Id(parent_id) => 52,<br>名称(name) => 返佣报表,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 9,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539923055,<br>最后更新(updated_at) => 1539923055', '1539923055', '1539923055');
INSERT INTO `ck_admin_log` VALUES ('246', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 83 {{%RECORD%}}: <br>序号(id) => 83,<br>类型(type) => 0,<br>父分类Id(parent_id) => 48,<br>名称(name) => 计划任务,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 06,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539923088,<br>最后更新(updated_at) => 1539923088', '1539923088', '1539923088');
INSERT INTO `ck_admin_log` VALUES ('247', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>排序(sort) : 3=>4,<br>最后更新(updated_at) : 1539918894=>1539923100', '1539923100', '1539923100');
INSERT INTO `ck_admin_log` VALUES ('248', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 83 {{%RECORD%}}: <br>排序(sort) : 6=>3,<br>最后更新(updated_at) : 1539923088=>1539923101', '1539923101', '1539923101');
INSERT INTO `ck_admin_log` VALUES ('249', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 84 {{%RECORD%}}: <br>序号(id) => 84,<br>类型(type) => 0,<br>父分类Id(parent_id) => 48,<br>名称(name) => 数据管理,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 5,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539923133,<br>最后更新(updated_at) => 1539923133', '1539923133', '1539923133');
INSERT INTO `ck_admin_log` VALUES ('250', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 85 {{%RECORD%}}: <br>序号(id) => 85,<br>类型(type) => 0,<br>父分类Id(parent_id) => 84,<br>名称(name) => 数据备份,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539923144,<br>最后更新(updated_at) => 1539923144', '1539923144', '1539923144');
INSERT INTO `ck_admin_log` VALUES ('251', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 86 {{%RECORD%}}: <br>序号(id) => 86,<br>类型(type) => 0,<br>父分类Id(parent_id) => 84,<br>名称(name) => 数据恢复,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539923153,<br>最后更新(updated_at) => 1539923153', '1539923154', '1539923154');
INSERT INTO `ck_admin_log` VALUES ('252', '1', 'admin-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 87 {{%RECORD%}}: <br>序号(id) => 87,<br>类型(type) => 0,<br>父分类Id(parent_id) => 48,<br>名称(name) => 平台管理,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 8,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539923204,<br>最后更新(updated_at) => 1539923204', '1539923204', '1539923204');
INSERT INTO `ck_admin_log` VALUES ('253', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 87 {{%RECORD%}}: <br>名称(name) : 平台管理=>关闭平台,<br>最后更新(updated_at) : 1539923204=>1539923248', '1539923248', '1539923248');
INSERT INTO `ck_admin_log` VALUES ('254', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 83 {{%RECORD%}}: <br>排序(sort) : 3=>4,<br>最后更新(updated_at) : 1539923101=>1539923261', '1539923261', '1539923261');
INSERT INTO `ck_admin_log` VALUES ('255', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>排序(sort) : 4=>5,<br>最后更新(updated_at) : 1539923100=>1539923262', '1539923262', '1539923262');
INSERT INTO `ck_admin_log` VALUES ('256', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 84 {{%RECORD%}}: <br>排序(sort) : 5=>3,<br>最后更新(updated_at) : 1539923133=>1539923263', '1539923263', '1539923263');
INSERT INTO `ck_admin_log` VALUES ('257', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 86 {{%RECORD%}}: <br>排序(sort) : 0=>1,<br>最后更新(updated_at) : 1539923153=>1539923268', '1539923268', '1539923268');
INSERT INTO `ck_admin_log` VALUES ('258', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 21 {{%RECORD%}}: <br>排序(sort) : 0=>1,<br>最后更新(updated_at) : 1505570994=>1539923272', '1539923272', '1539923272');
INSERT INTO `ck_admin_log` VALUES ('259', '1', 'admin-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 20 {{%RECORD%}}: <br>序号(id) => 20,<br>类型(type) => 0,<br>父分类Id(parent_id) => 19,<br>名称(name) => 清除前台,<br>地址(url) => clear/frontend,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1505570974,<br>最后更新(updated_at) => 1505570974', '1539923280', '1539923280');
INSERT INTO `ck_admin_log` VALUES ('260', '1', 'admin-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 21 {{%RECORD%}}: <br>序号(id) => 21,<br>类型(type) => 0,<br>父分类Id(parent_id) => 19,<br>名称(name) => 清除后台,<br>地址(url) => clear/backend,<br>图标(icon) => ,<br>排序(sort) => 1,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1505570994,<br>最后更新(updated_at) => 1539923272', '1539923284', '1539923284');
INSERT INTO `ck_admin_log` VALUES ('261', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 84 {{%RECORD%}}: <br>排序(sort) : 3=>2,<br>最后更新(updated_at) : 1539923263=>1539923292', '1539923292', '1539923292');
INSERT INTO `ck_admin_log` VALUES ('262', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 19 {{%RECORD%}}: <br>排序(sort) : 2=>3,<br>最后更新(updated_at) : 1539918890=>1539923293', '1539923293', '1539923293');
INSERT INTO `ck_admin_log` VALUES ('263', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 5 {{%RECORD%}}: <br>排序(sort) : 0=>1,<br>最后更新(updated_at) : 1539867272=>1539937262', '1539937262', '1539937262');
INSERT INTO `ck_admin_log` VALUES ('264', '1', 'admin-menu/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 14 {{%RECORD%}}: <br>排序(sort) : 1=>0,<br>最后更新(updated_at) : 1539918888=>1539937263', '1539937263', '1539937263');
INSERT INTO `ck_admin_log` VALUES ('265', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 49 {{%RECORD%}}: <br>地址(url) : =>user/index,<br>最后更新(updated_at) : 1539918991=>1539937504', '1539937504', '1539937504');
INSERT INTO `ck_admin_log` VALUES ('266', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 76 {{%RECORD%}}: <br>地址(url) : =>user/report,<br>最后更新(updated_at) : 1539922576=>1539937523', '1539937523', '1539937523');
INSERT INTO `ck_admin_log` VALUES ('267', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 54 {{%RECORD%}}: <br>地址(url) : =>user/today,<br>最后更新(updated_at) : 1539922577=>1539937534', '1539937534', '1539937534');
INSERT INTO `ck_admin_log` VALUES ('268', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 55 {{%RECORD%}}: <br>地址(url) : =>user/online,<br>最后更新(updated_at) : 1539922578=>1539937552', '1539937552', '1539937552');
INSERT INTO `ck_admin_log` VALUES ('269', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 56 {{%RECORD%}}: <br>地址(url) : =>user/loging,<br>最后更新(updated_at) : 1539922579=>1539937573', '1539937573', '1539937573');
INSERT INTO `ck_admin_log` VALUES ('270', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 58 {{%RECORD%}}: <br>地址(url) : =>agent/rebate,<br>最后更新(updated_at) : 1539920210=>1539937599', '1539937599', '1539937599');
INSERT INTO `ck_admin_log` VALUES ('271', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 59 {{%RECORD%}}: <br>地址(url) : =>agent/trade,<br>最后更新(updated_at) : 1539920228=>1539937617', '1539937617', '1539937617');
INSERT INTO `ck_admin_log` VALUES ('272', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 70 {{%RECORD%}}: <br>地址(url) : =>platform/index,<br>最后更新(updated_at) : 1539921287=>1539937638', '1539937638', '1539937638');
INSERT INTO `ck_admin_log` VALUES ('273', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 71 {{%RECORD%}}: <br>地址(url) : =>game-type/index,<br>最后更新(updated_at) : 1539921263=>1539937699', '1539937699', '1539937699');
INSERT INTO `ck_admin_log` VALUES ('274', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 61 {{%RECORD%}}: <br>地址(url) : =>notice/index,<br>最后更新(updated_at) : 1539921276=>1539937717', '1539937717', '1539937717');
INSERT INTO `ck_admin_log` VALUES ('275', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 63 {{%RECORD%}}: <br>地址(url) : platform/amount=>platform/fund,<br>最后更新(updated_at) : 1539920335=>1539937772', '1539937772', '1539937772');
INSERT INTO `ck_admin_log` VALUES ('276', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 64 {{%RECORD%}}: <br>地址(url) : =>deposit/index,<br>最后更新(updated_at) : 1539920367=>1539937848', '1539937848', '1539937848');
INSERT INTO `ck_admin_log` VALUES ('277', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 65 {{%RECORD%}}: <br>地址(url) : =>withdraw/index,<br>最后更新(updated_at) : 1539920616=>1539937889', '1539937889', '1539937889');
INSERT INTO `ck_admin_log` VALUES ('278', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 68 {{%RECORD%}}: <br>地址(url) : =>user/change-amount,<br>最后更新(updated_at) : 1539920617=>1539938057', '1539938057', '1539938057');
INSERT INTO `ck_admin_log` VALUES ('279', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 67 {{%RECORD%}}: <br>地址(url) : =>bank-money/index,<br>最后更新(updated_at) : 1539922817=>1539938163', '1539938163', '1539938163');
INSERT INTO `ck_admin_log` VALUES ('280', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 63 {{%RECORD%}}: <br>地址(url) : platform/fund=>platform/amount,<br>最后更新(updated_at) : 1539937772=>1539938190', '1539938190', '1539938190');
INSERT INTO `ck_admin_log` VALUES ('281', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 78 {{%RECORD%}}: <br>地址(url) : =>check/index,<br>最后更新(updated_at) : 1539922830=>1539938229', '1539938229', '1539938229');
INSERT INTO `ck_admin_log` VALUES ('282', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 75 {{%RECORD%}}: <br>地址(url) : =>stat/user,<br>最后更新(updated_at) : 1539923033=>1539938248', '1539938248', '1539938248');
INSERT INTO `ck_admin_log` VALUES ('283', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 74 {{%RECORD%}}: <br>地址(url) : =>stat/agent,<br>最后更新(updated_at) : 1539922661=>1539938262', '1539938262', '1539938262');
INSERT INTO `ck_admin_log` VALUES ('284', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>图标(icon) : fa fa-history=>,<br>最后更新(updated_at) : 1539923262=>1539938294', '1539938294', '1539938294');
INSERT INTO `ck_admin_log` VALUES ('285', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 75 {{%RECORD%}}: <br>地址(url) : stat/user=>stat/platform,<br>最后更新(updated_at) : 1539938248=>1539938311', '1539938311', '1539938311');
INSERT INTO `ck_admin_log` VALUES ('286', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 73 {{%RECORD%}}: <br>地址(url) : =>stat/user,<br>最后更新(updated_at) : 1539923035=>1539938324', '1539938324', '1539938324');
INSERT INTO `ck_admin_log` VALUES ('287', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 77 {{%RECORD%}}: <br>地址(url) : =>report/bet,<br>最后更新(updated_at) : 1539922706=>1539938351', '1539938351', '1539938351');
INSERT INTO `ck_admin_log` VALUES ('288', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 79 {{%RECORD%}}: <br>地址(url) : =>report/winloss,<br>最后更新(updated_at) : 1539922888=>1539938412', '1539938412', '1539938412');
INSERT INTO `ck_admin_log` VALUES ('289', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 66 {{%RECORD%}}: <br>地址(url) : =>report/trade,<br>最后更新(updated_at) : 1539923023=>1539938429', '1539938429', '1539938429');
INSERT INTO `ck_admin_log` VALUES ('290', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 80 {{%RECORD%}}: <br>地址(url) : =>report/updown,<br>最后更新(updated_at) : 1539922983=>1539938449', '1539938449', '1539938449');
INSERT INTO `ck_admin_log` VALUES ('291', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 81 {{%RECORD%}}: <br>地址(url) : =>report/xima,<br>最后更新(updated_at) : 1539923015=>1539938470', '1539938470', '1539938470');
INSERT INTO `ck_admin_log` VALUES ('292', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 82 {{%RECORD%}}: <br>地址(url) : =>report/rebate,<br>最后更新(updated_at) : 1539923055=>1539938496', '1539938496', '1539938496');
INSERT INTO `ck_admin_log` VALUES ('293', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 85 {{%RECORD%}}: <br>地址(url) : =>data/backup,<br>最后更新(updated_at) : 1539923144=>1539938535', '1539938535', '1539938535');
INSERT INTO `ck_admin_log` VALUES ('294', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 86 {{%RECORD%}}: <br>地址(url) : =>data/recover,<br>最后更新(updated_at) : 1539923268=>1539938559', '1539938559', '1539938559');
INSERT INTO `ck_admin_log` VALUES ('295', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 19 {{%RECORD%}}: <br>地址(url) : =>cache/clean,<br>最后更新(updated_at) : 1539923293=>1539938585', '1539938585', '1539938585');
INSERT INTO `ck_admin_log` VALUES ('296', '1', 'admin-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 83 {{%RECORD%}}: <br>地址(url) : =>tast/index,<br>最后更新(updated_at) : 1539923261=>1539938599', '1539938599', '1539938599');
INSERT INTO `ck_admin_log` VALUES ('297', '1', 'admin-menu/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Menu [ {{%menu}} ]  {{%DELETED%}} {{%ID%}} 87 {{%RECORD%}}: <br>序号(id) => 87,<br>类型(type) => 0,<br>父分类Id(parent_id) => 48,<br>名称(name) => 关闭平台,<br>地址(url) => ,<br>图标(icon) => ,<br>排序(sort) => 8,<br>新窗口打开(target) => _blank,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1539923204,<br>最后更新(updated_at) => 1539923248', '1539938630', '1539938630');

-- ----------------------------
-- Table structure for `ck_admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `ck_admin_user`;
CREATE TABLE `ck_admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增管理员用户id',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员用户名',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员cookie验证auth_key',
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员加密密码',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '管理员找回密码token',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员邮箱',
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '管理员头像url',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '管理员状态,10正常',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_admin_user
-- ----------------------------
INSERT INTO `ck_admin_user` VALUES ('1', 'admin', 'zr9mY7lt23oAhj_ZYjydbLJKcbE3FJ19', '$2y$13$8aF72c/7Nqq/atyMivhVTej0bIXS1t8daPJXKtVjFzJUsG68eGgaG', null, 'admin@feehi.com', '', '10', '1468288038', '1476711945');

-- ----------------------------
-- Table structure for `ck_agent`
-- ----------------------------
DROP TABLE IF EXISTS `ck_agent`;
CREATE TABLE `ck_agent` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '代理id',
  `username` varchar(64) NOT NULL COMMENT '代理账号',
  `password_hash` varchar(255) DEFAULT NULL,
  `auth_key` varchar(32) DEFAULT NULL COMMENT '管理员cookie验证auth_key',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '管理员找回密码token',
  `realname` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `mobile` varchar(32) DEFAULT NULL COMMENT '手机号码',
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `promo_code` varchar(32) NOT NULL COMMENT '推广码',
  `parent_id` int(11) DEFAULT NULL COMMENT '上层账号',
  `top_id` int(11) DEFAULT NULL COMMENT '总代账号',
  `agent_level` tinyint(3) unsigned DEFAULT NULL COMMENT '代理层级',
  `xima_status` tinyint(3) unsigned DEFAULT '1' COMMENT '洗码是否可看 0 否 1 是',
  `xima_rate` decimal(4,3) DEFAULT NULL COMMENT '洗码率',
  `xima_type` tinyint(4) DEFAULT NULL COMMENT '洗码类别 1 单边 2 双边',
  `rebate_rate` decimal(4,3) DEFAULT NULL COMMENT '占成',
  `default_player_level` tinyint(3) unsigned DEFAULT NULL COMMENT '预设玩家层级',
  `rebate_id` int(11) unsigned DEFAULT NULL COMMENT '返佣方案',
  `available_amount` decimal(10,3) DEFAULT NULL COMMENT '账户余额',
  `frozen_amount` decimal(10,3) DEFAULT NULL COMMENT '冻结余额',
  `rebate_amount` decimal(10,3) DEFAULT NULL COMMENT '返佣总额',
  `currency` varchar(16) DEFAULT NULL COMMENT '主货币',
  `reg_from` varchar(32) DEFAULT NULL COMMENT '创建渠道',
  `reg_ip` varchar(32) DEFAULT NULL COMMENT '注册IP',
  `status` tinyint(4) unsigned DEFAULT '1' COMMENT '状态 1：正常 2：冻结 3：锁定 4：注销',
  `memo` varchar(255) DEFAULT NULL COMMENT '备注',
  `created_at` bigint(20) DEFAULT NULL COMMENT '创建日期',
  `updated_at` bigint(20) DEFAULT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_account` (`username`),
  UNIQUE KEY `idx_promo_code` (`promo_code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='代理表';

-- ----------------------------
-- Records of ck_agent
-- ----------------------------
INSERT INTO `ck_agent` VALUES ('1', 'agent', '$13$8aF72c/7Nqq/atyMivhVTej0bIXS1t8daPJXKtVjFzJUsG68eGgaG', 'zr9mY7lt23oAhj_ZYjydbLJKcbE3FJ19', null, 'cccc', null, null, null, 'ddd', null, null, '1', '1', '0.009', '2', '0.350', null, null, '3000.000', null, null, null, null, null, '1', null, null, null);
INSERT INTO `ck_agent` VALUES ('2', 'abcd', '$2y$13$8Z7ZYvJophNzhE9fIHuhluh5vFE1K8bDe5Nw19KRrX3bIZIDqJPvS', 'l1UmJJ7gZbLyzblGiglnT7ye6HB91FA1', null, null, null, null, null, 'jaLgnR', '1', '1', '2', '1', '0.009', '2', '0.350', null, null, null, null, null, null, null, null, '1', null, '1539253756', '1539253756');
INSERT INTO `ck_agent` VALUES ('3', 'sentry', '$2y$13$wXgEKeiho2xsYdujFhyKCu7Pz9G8LA8BC1KgCj36R48viAuua9cYe', 'BQJSUEW_CarL9K8pRZ7jSPGSIv36UZCl', null, null, null, null, null, 'QQRN1_9X', '1', '1', '2', '1', '0.009', '2', '0.350', null, null, null, null, null, null, null, null, '1', null, '1539254027', '1539254027');
INSERT INTO `ck_agent` VALUES ('4', 'aaaaa', '$2y$13$R4iNNIv/HpQPZiHzDlo9Oe6rdnWRABBvQGk1mNMU2LVBx4aZwm3be', 'upF5uuqeLAgAvCbCLkyyfVPTYf6YxcrX', null, null, null, null, null, 'AU8CTP0TWW', '1', '1', '2', '1', '0.009', '2', '0.350', null, null, null, null, null, null, null, null, '1', null, '1539254184', '1539254184');
INSERT INTO `ck_agent` VALUES ('5', 'ddddd', '$2y$13$Pi1MNeZQgy.URXjdIUwFWeXVP3u22mOVuWlTfNuVROP1L2EWNz9lm', 'ytOKSDCJfK3K8zWXUm9-RNteTJJ-nUy9', null, '测试', null, null, null, 'TMB8RUO7CR', '3', '1', '3', '1', '0.009', '2', '0.350', null, null, null, null, null, null, null, null, '1', null, '1539334247', '1539334897');

-- ----------------------------
-- Table structure for `ck_agent_account`
-- ----------------------------
DROP TABLE IF EXISTS `ck_agent_account`;
CREATE TABLE `ck_agent_account` (
  `agent_id` int(10) unsigned NOT NULL COMMENT '代理ID',
  `agent_name` varchar(64) DEFAULT NULL COMMENT '代理账号',
  `available_amount` decimal(10,3) DEFAULT NULL COMMENT '可用余额',
  `frozen_amount` decimal(10,3) DEFAULT NULL COMMENT '冻结金额',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`agent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_agent_account
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_agent_daily`
-- ----------------------------
DROP TABLE IF EXISTS `ck_agent_daily`;
CREATE TABLE `ck_agent_daily` (
  `ymd` int(10) unsigned NOT NULL COMMENT '日期',
  `agent_id` int(10) unsigned NOT NULL COMMENT '代理ID',
  `dnu` int(10) unsigned DEFAULT NULL COMMENT '日新增用户',
  `dau` int(10) unsigned DEFAULT NULL COMMENT '日活跃用户',
  `ndu` int(10) unsigned DEFAULT NULL COMMENT '日首存用户数',
  `nda` int(10) unsigned DEFAULT NULL COMMENT '日首存额度',
  `dbu` int(10) unsigned DEFAULT NULL COMMENT '日投注用户数',
  `dbo` int(10) unsigned DEFAULT NULL COMMENT '日投注单数',
  `dba` int(10) unsigned DEFAULT NULL COMMENT '日投注额度',
  `ddu` int(10) unsigned DEFAULT NULL COMMENT '日存款用户数',
  `dda` int(10) unsigned DEFAULT NULL COMMENT '日存款额度',
  `dwu` int(10) unsigned DEFAULT NULL COMMENT '日取款用户数',
  `dwa` int(10) unsigned DEFAULT NULL COMMENT '日取款额度',
  `dpa` int(10) unsigned DEFAULT NULL COMMENT '日赢额度',
  `dla` int(10) unsigned DEFAULT NULL COMMENT '日输额度',
  `dxm` decimal(12,2) unsigned DEFAULT NULL COMMENT '日洗码值',
  `dna` int(10) unsigned DEFAULT NULL COMMENT '日新增代理',
  PRIMARY KEY (`ymd`,`agent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='代理日报表';

-- ----------------------------
-- Records of ck_agent_daily
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_agent_message`
-- ----------------------------
DROP TABLE IF EXISTS `ck_agent_message`;
CREATE TABLE `ck_agent_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '消息ID',
  `title` varchar(255) NOT NULL COMMENT '消息标题',
  `content` varchar(512) DEFAULT NULL COMMENT '消息内容',
  `is_canceled` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否取消 1取消 0 否',
  `canceled_at` int(10) unsigned DEFAULT NULL COMMENT '取消时间',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否删除 1 删除 0 否',
  `deleted_at` int(10) unsigned DEFAULT NULL COMMENT '删除时间',
  `level` tinyint(3) unsigned DEFAULT NULL COMMENT '优先级 1 普通 2 高 3 紧急',
  `notice_type` tinyint(3) unsigned DEFAULT NULL COMMENT '通告对象类型 1单个用户 2 多个用户 3 全部用户 4用户类型',
  `agent_type` tinyint(3) unsigned DEFAULT NULL COMMENT '代理类型',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_agent_message
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_agent_message_flag`
-- ----------------------------
DROP TABLE IF EXISTS `ck_agent_message_flag`;
CREATE TABLE `ck_agent_message_flag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '消息标记ID',
  `message_id` int(10) unsigned NOT NULL COMMENT '消息ID',
  `agent_id` bigint(20) unsigned NOT NULL COMMENT '用户ID',
  `is_read` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否阅读',
  `read_at` int(10) unsigned NOT NULL COMMENT '阅读时间',
  `user_type` tinyint(3) unsigned DEFAULT NULL COMMENT '用户类型',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`),
  UNIQUE KEY `message_id` (`message_id`,`agent_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_agent_message_flag
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_agent_user`
-- ----------------------------
DROP TABLE IF EXISTS `ck_agent_user`;
CREATE TABLE `ck_agent_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增管理员用户id',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员用户名',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员cookie验证auth_key',
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员加密密码',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '管理员找回密码token',
  `agent_id` int(10) unsigned NOT NULL COMMENT '代理ID',
  `is_master` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否为主账号',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员邮箱',
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '管理员头像url',
  `status` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '管理员状态,0禁止 1正常',
  `last_login_at` int(10) unsigned DEFAULT NULL COMMENT '最后登陆时间',
  `last_login_ip` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '最后登陆IP',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_agent_user
-- ----------------------------
INSERT INTO `ck_agent_user` VALUES ('1', 'agent', 'zr9mY7lt23oAhj_ZYjydbLJKcbE3FJ19', '$2y$13$8aF72c/7Nqq/atyMivhVTej0bIXS1t8daPJXKtVjFzJUsG68eGgaG', null, '1', '0', 'abcd@11111.com', '/uploads/avatar/20181008154119_5bbb0a1f2049f.png', '10', null, null, '1468288038', '1538984479');

-- ----------------------------
-- Table structure for `ck_auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `ck_auth_assignment`;
CREATE TABLE `ck_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `ck_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `ck_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_auth_assignment
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `ck_auth_item`;
CREATE TABLE `ck_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `ck_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `ck_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_auth_item
-- ----------------------------
INSERT INTO `ck_auth_item` VALUES ('/ad/create:GET', '2', '创建广告(查看)', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393131222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512383408', '1512722062');
INSERT INTO `ck_auth_item` VALUES ('/ad/create:POST', '2', '创建广告(确定)', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393132222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512383484', '1512722063');
INSERT INTO `ck_auth_item` VALUES ('/ad/delete:POST', '2', '删除广告', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393133222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512386749', '1512722063');
INSERT INTO `ck_auth_item` VALUES ('/ad/index:GET', '2', '广告列表', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393130222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512382866', '1512722062');
INSERT INTO `ck_auth_item` VALUES ('/ad/sort:POST', '2', '广告排序', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393136222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512399382', '1512722063');
INSERT INTO `ck_auth_item` VALUES ('/ad/update:GET', '2', '修改广告(查看)', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393134222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512386694', '1512722063');
INSERT INTO `ck_auth_item` VALUES ('/ad/update:POST', '2', '修改广告(确定)', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393135222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1512386722', '1512722063');
INSERT INTO `ck_auth_item` VALUES ('/ad/view-layer:GET', '2', '广告详情', null, 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393137222C2263617465676F7279223A225C75356537665C7535343461227D223B, '1519972316', '1519972316');
INSERT INTO `ck_auth_item` VALUES ('/admin-user/create:GET', '2', '创建后台用户(查看)', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333132222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, '1505491145', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/admin-user/create:POST', '2', '创建后台用户(确定)', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333133222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, '1505491177', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/admin-user/delete:POST', '2', '删除后台用户', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333136222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, '1505491283', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/admin-user/index:GET', '2', '后台用户列表', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333130222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, '1505491096', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/admin-user/update:GET', '2', '修改后台用户(查看)', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333134222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, '1505491206', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/admin-user/update:POST', '2', '修改后台用户(确定)', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333135222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, '1505491257', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/admin-user/view-layer:GET', '2', '后台用户详情', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333137222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, '1505491177', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/banner/banner-create:GET', '2', '创建banner(查看)', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383131222C2263617465676F7279223A2262616E6E6572227D223B, '1512391883', '1512400103');
INSERT INTO `ck_auth_item` VALUES ('/banner/banner-create:POST', '2', '创建banner(确定)', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383132222C2263617465676F7279223A2262616E6E6572227D223B, '1512391917', '1512400103');
INSERT INTO `ck_auth_item` VALUES ('/banner/banner-delete:POST', '2', '删除banner', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383136222C2263617465676F7279223A2262616E6E6572227D223B, '1512399348', '1512721982');
INSERT INTO `ck_auth_item` VALUES ('/banner/banner-sort:POST', '2', 'banner排序', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383135222C2263617465676F7279223A2262616E6E6572227D223B, '1512399382', '1512400103');
INSERT INTO `ck_auth_item` VALUES ('/banner/banner-update:GET', '2', '修改banner(查看)', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383133222C2263617465676F7279223A2262616E6E6572227D223B, '1512399264', '1512400103');
INSERT INTO `ck_auth_item` VALUES ('/banner/banner-update:POST', '2', '修改banner(确定)', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383134222C2263617465676F7279223A2262616E6E6572227D223B, '1512399300', '1512400103');
INSERT INTO `ck_auth_item` VALUES ('/banner/banners:GET', '2', 'banner列表', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383130222C2263617465676F7279223A2262616E6E6572227D223B, '1512391845', '1512400103');
INSERT INTO `ck_auth_item` VALUES ('/banner/create:GET', '2', '创建banner类型(查看)', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383031222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512383408', '1512400103');
INSERT INTO `ck_auth_item` VALUES ('/banner/create:POST', '2', '创建banner类型(确定)', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383032222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512383484', '1512400103');
INSERT INTO `ck_auth_item` VALUES ('/banner/delete:POST', '2', '删除banner类型', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383033222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512386749', '1512400103');
INSERT INTO `ck_auth_item` VALUES ('/banner/index:GET', '2', 'banner类型列表', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383030222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512382866', '1512400103');
INSERT INTO `ck_auth_item` VALUES ('/banner/sort:POST', '2', 'banner类型排序', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383036222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512399382', '1512721982');
INSERT INTO `ck_auth_item` VALUES ('/banner/update:GET', '2', '修改banner类型(查看)', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383034222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512386694', '1512400103');
INSERT INTO `ck_auth_item` VALUES ('/banner/update:POST', '2', '修改banner类型(确定)', null, 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383035222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, '1512386722', '1512400103');
INSERT INTO `ck_auth_item` VALUES ('/banner/view-layer:GET', '2', 'banner详情', null, 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383137222C2263617465676F7279223A2262616E6E6572227D223B, '1505491177', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/clear/backend:GET', '2', '删除后台缓存', null, 0x733A36333A227B2267726F7570223A225C75376631335C7535623538222C22736F7274223A22363031222C2263617465676F7279223A225C75376631335C7535623538227D223B, '1505491837', '1505626868');
INSERT INTO `ck_auth_item` VALUES ('/clear/frontend:GET', '2', '删除前台缓存', null, 0x733A36333A227B2267726F7570223A225C75376631335C7535623538222C22736F7274223A22363030222C2263617465676F7279223A225C75376631335C7535623538227D223B, '1505491810', '1505626868');
INSERT INTO `ck_auth_item` VALUES ('/friendly-link/create:GET', '2', '创建友情链接(查看)', null, 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353031222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, '1505491474', '1505626848');
INSERT INTO `ck_auth_item` VALUES ('/friendly-link/create:POST', '2', '创建友情链接(确定)', null, 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353032222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, '1505491511', '1505626848');
INSERT INTO `ck_auth_item` VALUES ('/friendly-link/delete:POST', '2', '删除友情链接', null, 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353036222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, '1505491603', '1505627558');
INSERT INTO `ck_auth_item` VALUES ('/friendly-link/index:GET', '2', '友情链接列表', null, 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353030222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, '1505491435', '1505626848');
INSERT INTO `ck_auth_item` VALUES ('/friendly-link/sort:POST', '2', '友情链接排序', null, 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353035222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, '1505627295', '1505627558');
INSERT INTO `ck_auth_item` VALUES ('/friendly-link/update:GET', '2', '修改友情链接(查看)', null, 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353033222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, '1505491547', '1505626848');
INSERT INTO `ck_auth_item` VALUES ('/friendly-link/update:POST', '2', '修改友情链接(确定)', null, 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353034222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, '1505491571', '1505626848');
INSERT INTO `ck_auth_item` VALUES ('/friendly-link/view-layer:GET', '2', '友情链接详情', null, 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353037222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, '1505491177', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/frontend-menu/create:GET', '2', '创建前台菜单(查看)', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313031222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, '1505490500', '1505626149');
INSERT INTO `ck_auth_item` VALUES ('/frontend-menu/create:POST', '2', '创建前台菜单(确定)', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313032222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, '1505490586', '1505626149');
INSERT INTO `ck_auth_item` VALUES ('/frontend-menu/delete:POST', '2', '删除前台菜单', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313036222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, '1505490673', '1505627558');
INSERT INTO `ck_auth_item` VALUES ('/frontend-menu/index:GET', '2', '前台菜单列表', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313030222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, '1505490468', '1505626149');
INSERT INTO `ck_auth_item` VALUES ('/frontend-menu/sort:POST', '2', '前台菜单排序', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313035222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, '1505627002', '1505627558');
INSERT INTO `ck_auth_item` VALUES ('/frontend-menu/update:GET', '2', '修改前台菜单(查看)', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313033222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, '1505490617', '1505626149');
INSERT INTO `ck_auth_item` VALUES ('/frontend-menu/update:POST', '2', '修改前台菜单(确定)', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313034222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, '1505490643', '1505626149');
INSERT INTO `ck_auth_item` VALUES ('/frontend-menu/view-layer:GET', '2', '前台菜单详情', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313037222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, '1505491177', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/log/delete:POST', '2', '删除日志', null, 0x733A36333A227B2267726F7570223A225C75363565355C7535666437222C22736F7274223A22373032222C2263617465676F7279223A225C75363565355C7535666437227D223B, '1505491737', '1505626889');
INSERT INTO `ck_auth_item` VALUES ('/log/index:GET', '2', '日志列表', null, 0x733A36333A227B2267726F7570223A225C75363565355C7535666437222C22736F7274223A22373030222C2263617465676F7279223A225C75363565355C7535666437227D223B, '1505491668', '1505626889');
INSERT INTO `ck_auth_item` VALUES ('/log/view-layer:GET', '2', '查看日志详情', null, 0x733A36333A227B2267726F7570223A225C75363565355C7535666437222C22736F7274223A22373031222C2263617465676F7279223A225C75363565355C7535666437227D223B, '1505491709', '1505626889');
INSERT INTO `ck_auth_item` VALUES ('/menu/create:GET', '2', '创建前台菜单(查看)', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313131222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, '1505490290', '1505626149');
INSERT INTO `ck_auth_item` VALUES ('/menu/create:POST', '2', '创建后台菜单(确定)', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313132222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, '1505490326', '1505626149');
INSERT INTO `ck_auth_item` VALUES ('/menu/delete:POST', '2', '删除后台菜单', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313136222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, '1505490424', '1505627558');
INSERT INTO `ck_auth_item` VALUES ('/menu/index:GET', '2', '后台菜单列表', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313130222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, '1505490244', '1505626149');
INSERT INTO `ck_auth_item` VALUES ('/menu/sort:POST', '2', '后台菜单排序', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313135222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, '1505627029', '1505627558');
INSERT INTO `ck_auth_item` VALUES ('/menu/update:GET', '2', '修改后台菜单(查看)', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313133222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, '1505490360', '1505626149');
INSERT INTO `ck_auth_item` VALUES ('/menu/update:POST', '2', '修改后台菜单(确定)', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313134222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, '1505490388', '1505626149');
INSERT INTO `ck_auth_item` VALUES ('/menu/view-layer:GET', '2', '后台菜单详情', null, 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313137222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, '1505491177', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/rbac/permission-create:GET', '2', '创建权限(查看)', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343031222C2263617465676F7279223A225C75363734335C7539363530227D223B, '1505491973', '1505626728');
INSERT INTO `ck_auth_item` VALUES ('/rbac/permission-create:POST', '2', '创建权限(确定)', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343032222C2263617465676F7279223A225C75363734335C7539363530227D223B, '1505492031', '1505626728');
INSERT INTO `ck_auth_item` VALUES ('/rbac/permission-delete:POST', '2', '删除权限', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343036222C2263617465676F7279223A225C75363734335C7539363530227D223B, '1505492312', '1505627558');
INSERT INTO `ck_auth_item` VALUES ('/rbac/permission-sort:POST', '2', '权限排序', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343035222C2263617465676F7279223A225C75363734335C7539363530227D223B, '1505627221', '1505627558');
INSERT INTO `ck_auth_item` VALUES ('/rbac/permission-update:GET', '2', '修改权限(查看)', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343033222C2263617465676F7279223A225C75363734335C7539363530227D223B, '1505492199', '1505626728');
INSERT INTO `ck_auth_item` VALUES ('/rbac/permission-update:POST', '2', '修改权限(确定)', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343034222C2263617465676F7279223A225C75363734335C7539363530227D223B, '1505492277', '1505626728');
INSERT INTO `ck_auth_item` VALUES ('/rbac/permission-view-layer:GET', '2', '权限详情', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343037222C2263617465676F7279223A225C75363734335C7539363530227D223B, '1505491177', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/rbac/permissions:GET', '2', '权限列表', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343030222C2263617465676F7279223A225C75363734335C7539363530227D223B, '1505491923', '1505626728');
INSERT INTO `ck_auth_item` VALUES ('/rbac/role-create:GET', '2', '创建角色(查看)', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343131222C2263617465676F7279223A225C75383964325C7538323732227D223B, '1505492374', '1505626728');
INSERT INTO `ck_auth_item` VALUES ('/rbac/role-create:POST', '2', '创建角色(确定)', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343132222C2263617465676F7279223A225C75383964325C7538323732227D223B, '1505492408', '1505626728');
INSERT INTO `ck_auth_item` VALUES ('/rbac/role-delete:POST', '2', '删除角色', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343136222C2263617465676F7279223A225C75383964325C7538323732227D223B, '1505492497', '1505627558');
INSERT INTO `ck_auth_item` VALUES ('/rbac/role-update:GET', '2', '修改角色(查看)', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343133222C2263617465676F7279223A225C75383964325C7538323732227D223B, '1505492434', '1505626728');
INSERT INTO `ck_auth_item` VALUES ('/rbac/role-update:POST', '2', '修改角色(确定)', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343134222C2263617465676F7279223A225C75383964325C7538323732227D223B, '1505492463', '1505626728');
INSERT INTO `ck_auth_item` VALUES ('/rbac/role-view-layer:GET', '2', '角色详情', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343137222C2263617465676F7279223A225C75383964325C7538323732227D223B, '1505491177', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/rbac/roles-sort:POST', '2', '角色排序', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343135222C2263617465676F7279223A225C75383964325C7538323732227D223B, '1505627246', '1505627558');
INSERT INTO `ck_auth_item` VALUES ('/rbac/roles:GET', '2', '角色列表', null, 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343130222C2263617465676F7279223A225C75383964325C7538323732227D223B, '1505492339', '1505626728');
INSERT INTO `ck_auth_item` VALUES ('/setting/custom-create:POST', '2', '创建自定义设置项(确定)', null, 0x733A38313A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303135222C2263617465676F7279223A225C75383165615C75356239615C75346534395C75386262655C7537663665227D223B, '1505486899', '1505627612');
INSERT INTO `ck_auth_item` VALUES ('/setting/custom:GET', '2', '自定义设置(查看)', null, 0x733A38313A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303133222C2263617465676F7279223A225C75383165615C75356239615C75346534395C75386262655C7537663665227D223B, '1505486625', '1505627612');
INSERT INTO `ck_auth_item` VALUES ('/setting/custom:POST', '2', '自定义设置(确定)', null, 0x733A38313A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303134222C2263617465676F7279223A225C75383165615C75356239615C75346534395C75386262655C7537663665227D223B, '1505486664', '1505627612');
INSERT INTO `ck_auth_item` VALUES ('/setting/smtp:GET', '2', 'smpt设置(查看)', null, 0x733A36373A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303130222C2263617465676F7279223A22736D74705C75386262655C7537663665227D223B, '1505486510', '1505626085');
INSERT INTO `ck_auth_item` VALUES ('/setting/smtp:POST', '2', 'smtp设置(确定)', null, 0x733A36373A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303131222C2263617465676F7279223A22736D74705C75386262655C7537663665227D223B, '1505486562', '1505626920');
INSERT INTO `ck_auth_item` VALUES ('/setting/test-smtp:POST', '2', '测试smtp设置', null, 0x733A36373A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303132222C2263617465676F7279223A22736D74705C75386262655C7537663665227D223B, '1505492827', '1505626085');
INSERT INTO `ck_auth_item` VALUES ('/setting/website:GET', '2', '网站设置(查看)', null, 0x733A37353A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303030222C2263617465676F7279223A225C75376635315C75376164395C75386262655C7537663665227D223B, '1505486405', '1505626028');
INSERT INTO `ck_auth_item` VALUES ('/setting/website:POST', '2', '网站设置(确定)', null, 0x733A37353A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303031222C2263617465676F7279223A225C75376635315C75376164395C75386262655C7537663665227D223B, '1505486444', '1505626055');
INSERT INTO `ck_auth_item` VALUES ('/user/create:GET', '2', '创建前台用户(查看)', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333031222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, '1505490833', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/user/create:POST', '2', '创建前台用户(确定)', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333032222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, '1505490875', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/user/delete:POST', '2', '删除前台用户', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333035222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, '1505491033', '1505627698');
INSERT INTO `ck_auth_item` VALUES ('/user/index:GET', '2', '前台用户列表', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333030222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, '1505490796', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/user/update:GET', '2', '修改前台用户(查看)', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333033222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, '1505490922', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/user/update:POST', '2', '修改前台用户(确定)', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333034222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, '1505490999', '1505626626');
INSERT INTO `ck_auth_item` VALUES ('/user/view-layer:GET', '2', '前台用户详情', null, 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333036222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, '1505491177', '1505626626');

-- ----------------------------
-- Table structure for `ck_auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `ck_auth_item_child`;
CREATE TABLE `ck_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `ck_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `ck_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ck_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `ck_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_auth_item_child
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `ck_auth_rule`;
CREATE TABLE `ck_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_company_bank`
-- ----------------------------
DROP TABLE IF EXISTS `ck_company_bank`;
CREATE TABLE `ck_company_bank` (
  `id` int(11) NOT NULL DEFAULT '0' COMMENT '银行账号ID',
  `bank_username` varchar(64) NOT NULL COMMENT '开户姓名',
  `bank_account` varchar(64) NOT NULL COMMENT '银行账号',
  `bank_name` varchar(64) NOT NULL COMMENT '银行名称',
  `province` varchar(32) DEFAULT NULL COMMENT '开户省份',
  `city` varchar(32) DEFAULT NULL COMMENT '开户城市',
  `branch_name` varchar(128) DEFAULT NULL COMMENT '网点名称',
  `card_type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '银行卡类型 1:借记卡  2：信用卡',
  `status` tinyint(3) unsigned DEFAULT '1' COMMENT '账号状态 1：启用 0：停用',
  `created_by_id` int(10) unsigned DEFAULT NULL COMMENT '创建者ID',
  `created_by_ip` varchar(64) DEFAULT NULL COMMENT '创建者IP',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户绑定银行账号表';

-- ----------------------------
-- Records of ck_company_bank
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_daily`
-- ----------------------------
DROP TABLE IF EXISTS `ck_daily`;
CREATE TABLE `ck_daily` (
  `ymd` int(8) unsigned NOT NULL COMMENT '日期',
  `dnu` int(10) unsigned DEFAULT NULL COMMENT '日新增用户',
  `dau` int(10) unsigned DEFAULT NULL COMMENT '日活跃用户',
  `ndu` int(10) unsigned DEFAULT NULL COMMENT '日首存用户数',
  `nda` int(10) unsigned DEFAULT NULL COMMENT '日首存额度',
  `dbu` int(10) unsigned DEFAULT NULL COMMENT '日投注用户数',
  `dbo` int(10) unsigned DEFAULT NULL COMMENT '日投注单数',
  `dba` int(10) unsigned DEFAULT NULL COMMENT '日投注额度',
  `ddu` int(10) unsigned DEFAULT NULL COMMENT '日存款用户数',
  `dda` int(10) unsigned DEFAULT NULL COMMENT '日存款额度',
  `dwu` int(10) unsigned DEFAULT NULL COMMENT '日取款用户数',
  `dwa` int(10) unsigned DEFAULT NULL COMMENT '日取款额度',
  `dpa` int(10) unsigned DEFAULT NULL COMMENT '日赢额度',
  `dla` int(10) unsigned DEFAULT NULL COMMENT '日输额度',
  PRIMARY KEY (`ymd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='统计日报';

-- ----------------------------
-- Records of ck_daily
-- ----------------------------
INSERT INTO `ck_daily` VALUES ('20181015', '33', '22', '3', '455', '4', null, '1234', '9', '322', '3', '1223', '565', '666');
INSERT INTO `ck_daily` VALUES ('20181016', '63', '14', '8', '989', '6', null, '885', '12', '8563', '5', '253', '996', '545');

-- ----------------------------
-- Table structure for `ck_game_type`
-- ----------------------------
DROP TABLE IF EXISTS `ck_game_type`;
CREATE TABLE `ck_game_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '游戏类型ID',
  `name` varchar(128) NOT NULL COMMENT '类型名称',
  `name_en` varchar(128) DEFAULT NULL COMMENT '游戏类型英文名',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_game_type
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_menu`
-- ----------------------------
DROP TABLE IF EXISTS `ck_menu`;
CREATE TABLE `ck_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `type` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '菜单类型.0后台,1前台',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级菜单id',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'url地址',
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '图标',
  `sort` float unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '_blank' COMMENT '打开方式._blank新窗口,_self本窗口',
  `is_absolute_url` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '是否绝对地址',
  `is_display` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示.0否,1是',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_menu
-- ----------------------------
INSERT INTO `ck_menu` VALUES ('1', '0', '0', '平台设置', '', 'fa fa-cogs', '9', '_blank', '0', '1', '1505570067', '1539919792');
INSERT INTO `ck_menu` VALUES ('2', '0', '1', '网站设置', 'setting/website', '', '1', '_blank', '0', '1', '1505570108', '1539867437');
INSERT INTO `ck_menu` VALUES ('3', '0', '1', '代理设置', 'setting/agent', '', '2', '_blank', '0', '1', '1505570155', '1538959820');
INSERT INTO `ck_menu` VALUES ('4', '0', '1', '邮件设置', 'setting/smtp', '', '4', '_blank', '0', '1', '1505570187', '1539160863');
INSERT INTO `ck_menu` VALUES ('5', '0', '48', '菜单管理', '', '', '1', '_blank', '0', '1', '1505570320', '1539937262');
INSERT INTO `ck_menu` VALUES ('6', '0', '5', '后台菜单', 'admin-menu/index', '', '0', '_blank', '0', '1', '1505570366', '1538201502');
INSERT INTO `ck_menu` VALUES ('7', '0', '5', '代理菜单', 'agent-menu/index', '', '0', '_blank', '0', '1', '1505570382', '1538201522');
INSERT INTO `ck_menu` VALUES ('8', '1', '0', '报表查询', '', 'fa fa-table', '3', '_blank', '0', '1', '1505570558', '1538988531');
INSERT INTO `ck_menu` VALUES ('9', '0', '8', '文章', 'article/index', '', '0', '_blank', '0', '0', '1505570610', '1538279579');
INSERT INTO `ck_menu` VALUES ('10', '0', '8', '分类', 'category/index', '', '0', '_blank', '0', '0', '1505570638', '1538279576');
INSERT INTO `ck_menu` VALUES ('11', '0', '8', '评论', 'comment/index', '', '0', '_blank', '0', '0', '1505570661', '1538279574');
INSERT INTO `ck_menu` VALUES ('12', '0', '8', '单页', 'page/index', '', '0', '_blank', '0', '0', '1505570687', '1538279562');
INSERT INTO `ck_menu` VALUES ('13', '0', '0', '会员管理', '', 'fa fa-users', '1', '_blank', '0', '1', '1505570745', '1539918814');
INSERT INTO `ck_menu` VALUES ('14', '0', '48', '管理员管理', '', 'fa fa-th-large', '0', '_blank', '0', '1', '1505570819', '1539937263');
INSERT INTO `ck_menu` VALUES ('15', '0', '14', '权限管理', 'rbac/permissions', '', '0', '_blank', '0', '1', '1505570862', '1539918906');
INSERT INTO `ck_menu` VALUES ('16', '0', '14', '角色管理', 'rbac/roles', '', '0', '_blank', '0', '1', '1505570882', '1539918920');
INSERT INTO `ck_menu` VALUES ('17', '0', '14', '管理员列表', 'admin-user/index', '', '0', '_blank', '0', '1', '1505570902', '1539918937');
INSERT INTO `ck_menu` VALUES ('19', '0', '48', '清理缓存', 'cache/clean', '', '3', '_blank', '0', '1', '1505570947', '1539938585');
INSERT INTO `ck_menu` VALUES ('22', '0', '48', '日志管理', 'log/index', '', '5', '_blank', '0', '1', '1505571212', '1539938294');
INSERT INTO `ck_menu` VALUES ('23', '0', '0', '首页', 'site/main', 'fa fa-home', '0', '_self', '0', '1', '1505636890', '1539918308');
INSERT INTO `ck_menu` VALUES ('27', '1', '0', '代理管理', 'agent/index', 'fa fa-sitemap', '1', '_self', '0', '1', '1505637000', '1539154093');
INSERT INTO `ck_menu` VALUES ('28', '0', '27', 'Banner管理', 'banner/index', '', '0', '_self', '0', '0', '1505637000', '1538279468');
INSERT INTO `ck_menu` VALUES ('29', '0', '27', '广告管理', 'ad/index', '', '0', '_self', '0', '0', '1505637000', '1538279470');
INSERT INTO `ck_menu` VALUES ('31', '1', '0', '首页', 'site/main', 'fa fa-home', '0', '_blank', '0', '1', '1538277444', '1538277574');
INSERT INTO `ck_menu` VALUES ('33', '1', '13', '用户列表', 'user/index', '', '0', '_blank', '0', '1', '1538279316', '1538279316');
INSERT INTO `ck_menu` VALUES ('34', '1', '13', '今日注册', 'user/today', '', '0', '_blank', '0', '1', '1538279343', '1538279343');
INSERT INTO `ck_menu` VALUES ('35', '1', '8', '投注记录', 'report/betlist', '', '0', '_blank', '0', '1', '1538279590', '1539310071');
INSERT INTO `ck_menu` VALUES ('36', '1', '8', '返佣明细', 'report/rebate', '', '0', '_blank', '0', '1', '1538279634', '1538987911');
INSERT INTO `ck_menu` VALUES ('42', '1', '0', '会员管理', 'user/index', 'fa fa-user', '0', '_blank', '0', '1', '1538895037', '1539155034');
INSERT INTO `ck_menu` VALUES ('47', '0', '1', '游戏设置', 'setting/game', '', '3', '_blank', '0', '1', '1539160762', '1539160862');
INSERT INTO `ck_menu` VALUES ('48', '0', '0', '系统管理', '', 'fa fa-cog', '10', '_blank', '0', '1', '1539867193', '1539867227');
INSERT INTO `ck_menu` VALUES ('49', '0', '13', '会员列表', 'user/index', '', '0', '_blank', '0', '1', '1539918991', '1539937504');
INSERT INTO `ck_menu` VALUES ('50', '0', '0', '代理管理', '', 'fa fa-ship', '2', '_blank', '0', '1', '1539919023', '1539919039');
INSERT INTO `ck_menu` VALUES ('51', '0', '0', '财务管理', '', 'fa fa-money', '4', '_blank', '0', '1', '1539919149', '1539919578');
INSERT INTO `ck_menu` VALUES ('52', '0', '0', '统计报表', '', 'fa fa-line-chart', '5', '_blank', '0', '1', '1539919297', '1539919297');
INSERT INTO `ck_menu` VALUES ('53', '0', '0', '运营管理', '', 'fa fa-street-view', '3', '_blank', '0', '1', '1539919537', '1539919580');
INSERT INTO `ck_menu` VALUES ('54', '0', '13', '今日注册', 'user/today', '', '2', '_blank', '0', '1', '1539920006', '1539937534');
INSERT INTO `ck_menu` VALUES ('55', '0', '13', '在线会员', 'user/online', '', '3', '_blank', '0', '1', '1539920023', '1539937552');
INSERT INTO `ck_menu` VALUES ('56', '0', '13', '登陆查询', 'user/loging', '', '4', '_blank', '0', '1', '1539920151', '1539937573');
INSERT INTO `ck_menu` VALUES ('57', '0', '50', '代理列表', 'agent/index', '', '0', '_blank', '0', '1', '1539920171', '1539920171');
INSERT INTO `ck_menu` VALUES ('58', '0', '50', '代理佣金', 'agent/rebate', '', '1', '_blank', '0', '1', '1539920210', '1539937599');
INSERT INTO `ck_menu` VALUES ('59', '0', '50', '交易记录', 'agent/trade', '', '2', '_blank', '0', '1', '1539920228', '1539937617');
INSERT INTO `ck_menu` VALUES ('60', '0', '53', '站内消息', 'message/index', '', '4', '_blank', '0', '1', '1539920255', '1539921275');
INSERT INTO `ck_menu` VALUES ('61', '0', '53', '系统公告', 'notice/index', '', '5', '_blank', '0', '1', '1539920271', '1539937717');
INSERT INTO `ck_menu` VALUES ('62', '0', '51', '银行卡管理', 'bank/index', '', '0', '_blank', '0', '1', '1539920304', '1539920304');
INSERT INTO `ck_menu` VALUES ('63', '0', '51', '平台资金', 'platform/amount', '', '1', '_blank', '0', '1', '1539920335', '1539938190');
INSERT INTO `ck_menu` VALUES ('64', '0', '51', '存款审核', 'deposit/index', '', '2', '_blank', '0', '1', '1539920357', '1539937848');
INSERT INTO `ck_menu` VALUES ('65', '0', '51', '取款审核', 'withdraw/index', '', '3', '_blank', '0', '1', '1539920385', '1539937889');
INSERT INTO `ck_menu` VALUES ('66', '0', '52', '交易报表', 'report/trade', '', '6', '_blank', '0', '1', '1539920496', '1539938429');
INSERT INTO `ck_menu` VALUES ('67', '0', '51', '银行资金明细', 'bank-money/index', '', '5', '_blank', '0', '1', '1539920521', '1539938163');
INSERT INTO `ck_menu` VALUES ('68', '0', '51', '会员额度调整', 'user/change-amount', '', '4', '_blank', '0', '1', '1539920603', '1539938057');
INSERT INTO `ck_menu` VALUES ('70', '0', '53', '游戏平台', 'platform/index', '', '0', '_blank', '0', '1', '1539921125', '1539937638');
INSERT INTO `ck_menu` VALUES ('71', '0', '53', '游戏类型', 'game-type/index', '', '1', '_blank', '0', '1', '1539921263', '1539937699');
INSERT INTO `ck_menu` VALUES ('73', '0', '52', '用户统计', 'stat/user', '', '2', '_blank', '0', '1', '1539922246', '1539938324');
INSERT INTO `ck_menu` VALUES ('74', '0', '52', '代理统计', 'stat/agent', '', '1', '_blank', '0', '1', '1539922259', '1539938262');
INSERT INTO `ck_menu` VALUES ('75', '0', '52', '平台统计', 'stat/platform', '', '0', '_blank', '0', '1', '1539922437', '1539938311');
INSERT INTO `ck_menu` VALUES ('76', '0', '13', '会员报表', 'user/report', '', '1', '_blank', '0', '1', '1539922562', '1539937523');
INSERT INTO `ck_menu` VALUES ('77', '0', '52', '投注报表', 'report/bet', '', '4', '_blank', '0', '1', '1539922706', '1539938351');
INSERT INTO `ck_menu` VALUES ('78', '0', '51', '盘点记录', 'check/index', '', '6', '_blank', '0', '1', '1539922830', '1539938229');
INSERT INTO `ck_menu` VALUES ('79', '0', '52', '赢输报表', 'report/winloss', '', '5', '_blank', '0', '1', '1539922888', '1539938412');
INSERT INTO `ck_menu` VALUES ('80', '0', '52', '上下分报表', 'report/updown', '', '7', '_blank', '0', '1', '1539922983', '1539938449');
INSERT INTO `ck_menu` VALUES ('81', '0', '52', '洗码报表', 'report/xima', '', '8', '_blank', '0', '1', '1539923015', '1539938470');
INSERT INTO `ck_menu` VALUES ('82', '0', '52', '返佣报表', 'report/rebate', '', '9', '_blank', '0', '1', '1539923055', '1539938496');
INSERT INTO `ck_menu` VALUES ('83', '0', '48', '计划任务', 'tast/index', '', '4', '_blank', '0', '1', '1539923088', '1539938599');
INSERT INTO `ck_menu` VALUES ('84', '0', '48', '数据管理', '', '', '2', '_blank', '0', '1', '1539923133', '1539923292');
INSERT INTO `ck_menu` VALUES ('85', '0', '84', '数据备份', 'data/backup', '', '0', '_blank', '0', '1', '1539923144', '1539938535');
INSERT INTO `ck_menu` VALUES ('86', '0', '84', '数据恢复', 'data/recover', '', '1', '_blank', '0', '1', '1539923153', '1539938559');

-- ----------------------------
-- Table structure for `ck_message`
-- ----------------------------
DROP TABLE IF EXISTS `ck_message`;
CREATE TABLE `ck_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '消息ID',
  `title` varchar(255) NOT NULL COMMENT '消息标题',
  `content` varchar(512) DEFAULT NULL COMMENT '消息内容',
  `is_canceled` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否取消 1取消 0 否',
  `canceled_at` int(10) unsigned DEFAULT NULL COMMENT '取消时间',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否删除 1 删除 0 否',
  `deleted_at` int(10) unsigned DEFAULT NULL COMMENT '删除时间',
  `level` tinyint(3) unsigned DEFAULT NULL COMMENT '优先级 1 普通 2 高 3 紧急',
  `user_type` tinyint(3) unsigned DEFAULT NULL COMMENT '用户类型 1 会员 2 代理 3 管理员',
  `notify_obj` tinyint(3) unsigned DEFAULT NULL COMMENT '通告对象类型 1单个用户 2 多个用户 3 全部用户 4用户类型',
  `user_group` tinyint(3) unsigned DEFAULT NULL COMMENT '用户组',
  `sender_id` int(10) unsigned DEFAULT NULL COMMENT '发送者ID 0为系统发送',
  `sender_name` varchar(64) DEFAULT NULL COMMENT '发送者名称',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_message
-- ----------------------------
INSERT INTO `ck_message` VALUES ('1', '单个用户消息', '啊啊啊啊给多个用户,发消息给多个用户,给多个用户,给多个用户,给多个用户,给多个用户,给多个用户,给多个用户,', '0', null, '0', null, '1', '3', '1', null, null, null, '1538279574', '1538279574');
INSERT INTO `ck_message` VALUES ('2', '多个用户消息', '<a href=\"#\">给多个用户</a>,发消息给多个用户,给多个用户,给多个用户,给多个用户,给多个用户,给多个用户,给多个用户,<给多个用户,发消息给多个用户,给多个用户,给多个用户,给多个用户,给多个用户,给多个用户,给多个用户,', '0', null, '0', null, '2', '3', '2', null, null, null, '1538279574', '1538279574');
INSERT INTO `ck_message` VALUES ('3', '全部用户消息', '给全部管理员发消息', '0', null, '0', null, '3', '3', '3', null, null, null, '1538279574', '1538279574');

-- ----------------------------
-- Table structure for `ck_message_flag`
-- ----------------------------
DROP TABLE IF EXISTS `ck_message_flag`;
CREATE TABLE `ck_message_flag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '消息标记ID',
  `message_id` int(10) unsigned NOT NULL COMMENT '消息ID',
  `user_id` bigint(20) unsigned NOT NULL COMMENT '用户ID',
  `is_read` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否阅读',
  `read_at` int(10) unsigned DEFAULT NULL COMMENT '阅读时间',
  `is_deleted` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除',
  `deleted_at` int(10) unsigned DEFAULT NULL COMMENT '删除时间',
  `user_type` tinyint(3) unsigned DEFAULT NULL COMMENT '用户类型 1 会员 2 代理 3 管理员',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`),
  UNIQUE KEY `message_id` (`message_id`,`user_id`,`user_type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_message_flag
-- ----------------------------
INSERT INTO `ck_message_flag` VALUES ('1', '1', '1', '0', null, '0', null, '3', '1538279574', '1538279574');
INSERT INTO `ck_message_flag` VALUES ('2', '2', '1', '0', null, '0', null, '3', '1538279574', '1538279574');
INSERT INTO `ck_message_flag` VALUES ('3', '3', '5', '0', null, '0', null, '3', null, null);
INSERT INTO `ck_message_flag` VALUES ('4', '3', '4', '0', null, '0', null, '3', null, null);

-- ----------------------------
-- Table structure for `ck_migration`
-- ----------------------------
DROP TABLE IF EXISTS `ck_migration`;
CREATE TABLE `ck_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_migration
-- ----------------------------
INSERT INTO `ck_migration` VALUES ('m000000_000000_base', '1538187038');
INSERT INTO `ck_migration` VALUES ('m130524_201442_init', '1538187067');
INSERT INTO `ck_migration` VALUES ('m140506_102106_rbac_init', '1538187067');
INSERT INTO `ck_migration` VALUES ('m180225_064210_add_view_detail_permissions', '1538187067');

-- ----------------------------
-- Table structure for `ck_news`
-- ----------------------------
DROP TABLE IF EXISTS `ck_news`;
CREATE TABLE `ck_news` (
  `news_id` bigint(20) NOT NULL COMMENT '公告编号',
  `news_title` varchar(50) DEFAULT NULL COMMENT '公告标题',
  `news_type` tinyint(4) DEFAULT NULL COMMENT '公告类型\r\n            1、系统公告\r\n            2、系统通知\r\n            3、系统提示',
  `news_content` varchar(500) DEFAULT NULL COMMENT '公告内容',
  `create_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `send_time` bigint(20) DEFAULT NULL COMMENT '发布时间',
  `send_by` bigint(20) DEFAULT NULL COMMENT '发布人',
  `news_status` tinyint(4) DEFAULT NULL COMMENT '公告状态\r\n            1、草稿\r\n            2、已创建\r\n            3、已发布\r\n            4、已删除',
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统公告表';

-- ----------------------------
-- Records of ck_news
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_notice`
-- ----------------------------
DROP TABLE IF EXISTS `ck_notice`;
CREATE TABLE `ck_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '公告ID',
  `content` varchar(512) NOT NULL COMMENT '公告内容',
  `notice_obj` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '公告对象 0 全体 1 会员 2 代理 3 管理员',
  `expire_at` int(10) unsigned DEFAULT NULL COMMENT '公告截止日期',
  `set_top` tinyint(3) unsigned DEFAULT '0' COMMENT '是否为置顶公告',
  `is_deleted` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '删除标记 1 删除',
  `deleted_at` int(10) unsigned DEFAULT NULL COMMENT '删除日期',
  `is_cancled` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '取消标记 1 取消',
  `cancled_at` int(10) unsigned DEFAULT NULL COMMENT '取消日期',
  `publish_by` int(10) unsigned DEFAULT NULL COMMENT '发布者ID',
  `publish_name` varchar(64) DEFAULT NULL COMMENT '发布者',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_notice
-- ----------------------------
INSERT INTO `ck_notice` VALUES ('1', '大家请注意，这是一条置顶公告。', '0', '1569240983', '1', '0', null, '0', null, null, null, null, '1539240983');
INSERT INTO `ck_notice` VALUES ('2', '优惠活动，充值1000送1000', '0', '1569240983', '0', '0', null, '0', null, null, null, null, '1539251983');
INSERT INTO `ck_notice` VALUES ('3', '注，注册代理，返佣50%注册代理，返佣50%注册代理，返佣50%注册代理，返佣50%注册代理，返佣50%注册代理，返佣50%册代理，返佣50%', '0', '1569240983', '0', '0', null, '0', null, null, null, null, '1539262983');

-- ----------------------------
-- Table structure for `ck_options`
-- ----------------------------
DROP TABLE IF EXISTS `ck_options`;
CREATE TABLE `ck_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `type` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '类型.0系统,1自定义,2banner,3广告',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '标识符',
  `value` text COLLATE utf8_unicode_ci NOT NULL COMMENT '值',
  `input_type` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '输入框类型',
  `autoload` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '自动加载.0否,1是',
  `tips` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '提示备注信息',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_options
-- ----------------------------
INSERT INTO `ck_options` VALUES ('1', '0', 'seo_keywords', '万通国际 皇家国际 威尼斯人', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('2', '0', 'seo_description', 'onetop', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('3', '0', 'website_title', '网通国际', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('4', '0', 'website_description', 'Based on most popular php framework yii2', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('5', '0', 'website_email', '', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('6', '0', 'website_language', 'zh-CN', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('7', '0', 'website_icp', '123456', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('8', '0', 'website_statics_script', '', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('9', '0', 'website_status', '1', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('10', '0', 'website_comment', '1', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('11', '0', 'website_comment_need_verify', '0', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('12', '0', 'website_timezone', 'Asia/Shanghai', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('13', '0', 'website_url', 'http://127.0.0.1/agent', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('14', '0', 'smtp_host', '', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('15', '0', 'smtp_username', '', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('16', '0', 'smtp_password', '', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('17', '0', 'smtp_port', '', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('18', '0', 'smtp_encryption', '', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('19', '0', 'smtp_nickname', '', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('20', '1', 'weibo', 'http://www.weibo.com/feeppp', '1', '1', '新浪微博', '0');
INSERT INTO `ck_options` VALUES ('21', '1', 'facebook', 'http://www.facebook.com/liufee', '1', '1', 'facebook', '0');
INSERT INTO `ck_options` VALUES ('22', '1', 'wechat', '飞得更高', '1', '1', '微信', '0');
INSERT INTO `ck_options` VALUES ('23', '1', 'qq', '1838889850', '1', '1', 'QQ号码', '0');
INSERT INTO `ck_options` VALUES ('24', '1', 'email', 'admin@feehi.com', '1', '1', '邮箱', '0');
INSERT INTO `ck_options` VALUES ('25', '2', 'index', '[{\"sign\":\"5a251a3013586\",\"img\":\"\\/uploads\\/setting\\/banner\\/5a251a301280d_1.png\",\"target\":\"_blank\",\"link\":\"\\/view\\/11\",\"sort\":\"3\",\"status\":\"1\",\"desc\":\"\"},{\"sign\":\"5a251a4932a52\",\"img\":\"\\/uploads\\/setting\\/banner\\/5a251a4930fc2_2.jpg\",\"target\":\"_blank\",\"link\":\"\\/view\\/15\",\"sort\":\"2\",\"status\":\"1\",\"desc\":\"\"},{\"sign\":\"5a251a5690fe9\",\"img\":\"\\/uploads\\/setting\\/banner\\/5a251a568f966_3.jpg\",\"target\":\"_blank\",\"link\":\"\\/view\\/16\",\"sort\":\"1\",\"status\":\"1\",\"desc\":\"\"}]', '1', '1', '首页banner', '0');
INSERT INTO `ck_options` VALUES ('26', '3', 'sidebar_right_1', '{\"ad\":\"\\/uploads\\/setting\\/ad\\/5a292c0fda836_cms.jpg\",\"link\":\"http://www.feehi.com\",\"target\":\"_blank\",\"desc\":\"FeehiCMS\",\"created_at\":1512641320,\"updated_at\":1512647776}', '1', '1', '网站右侧广告位1', '0');
INSERT INTO `ck_options` VALUES ('27', '3', 'sidebar_right_2', '{\"ad\":\"\\/uploads\\/setting\\/ad\\/5a291f9236479_22.jpg\",\"link\":\"\",\"target\":\"_blank\",\"desc\":\"\\u6700\\u597d\\u7684\\u8fd0\\u52a8\\u624b\\u8868\",\"created_at\":1512644498,\"updated_at\":1512647586}', '1', '1', '网站右侧广告位2', '0');
INSERT INTO `ck_options` VALUES ('28', '0', 'agent_status', '0', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('29', '0', 'agent_max_level', '3', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('30', '0', 'agent_max_rebate', '35', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('31', '0', 'agent_default_rebate', '30', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('32', '0', 'agent_backend_url', 'http://127.0.0.1/admin', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('33', '0', 'agent_user_reg_url', 'http://127.0.0.1/mobile/use/signup', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('34', '0', 'agent_reg_url', 'http://127.0.0.1/mobile/agent/signup', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('35', '0', 'game_min_limit', '10', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('36', '0', 'game_max_limit', '10000', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('37', '0', 'game_dogfall_min_limit', '10', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('38', '0', 'game_dogfall_max_limit', '5000', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('39', '0', 'game_pair_min_limit', '10', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('40', '0', 'game_pair_max_limit', '5000', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('41', '0', 'agent_xima_rate', '1', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('42', '0', 'agent_xima_type', '2', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('43', '0', 'agent_xima_status', '1', '1', '0', '', '0');

-- ----------------------------
-- Table structure for `ck_platform`
-- ----------------------------
DROP TABLE IF EXISTS `ck_platform`;
CREATE TABLE `ck_platform` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '平台ID',
  `name` varchar(64) NOT NULL COMMENT '游戏平台名称',
  `code` varchar(16) NOT NULL COMMENT '平台代码',
  `api_host` varchar(255) DEFAULT NULL COMMENT 'api地址',
  `app_id` varchar(255) DEFAULT NULL COMMENT '应用ID',
  `app_secret` varchar(255) DEFAULT NULL COMMENT 'ap密钥',
  `login_url` varchar(255) DEFAULT NULL COMMENT '登陆地址',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '平台状态 1 激活 0 停用',
  `buy_amount` decimal(19,2) unsigned DEFAULT NULL COMMENT '购买额度',
  `total_amount` decimal(19,2) unsigned DEFAULT NULL COMMENT '累计购买额度',
  `available_amount` decimal(19,2) unsigned DEFAULT NULL COMMENT '平台可用额度',
  `frozen_amount` decimal(19,2) unsigned DEFAULT NULL COMMENT '平台冻结额度',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ck_platform
-- ----------------------------
INSERT INTO `ck_platform` VALUES ('1', 'hj', '皇家国际', null, null, null, null, '1', null, null, '2536201.00', null, null, null);

-- ----------------------------
-- Table structure for `ck_platform_daily`
-- ----------------------------
DROP TABLE IF EXISTS `ck_platform_daily`;
CREATE TABLE `ck_platform_daily` (
  `ymd` int(10) unsigned NOT NULL COMMENT '日期',
  `platform_id` int(10) unsigned NOT NULL COMMENT '平台ID',
  `dnu` int(10) unsigned DEFAULT NULL COMMENT '日新增用户',
  `dau` int(10) unsigned DEFAULT NULL COMMENT '日活跃用户',
  `dua` int(10) unsigned DEFAULT NULL COMMENT '日上分额度',
  `dda` int(10) unsigned DEFAULT NULL COMMENT '日下分额度',
  `dbu` int(10) unsigned DEFAULT NULL COMMENT '日投注人数',
  `dbo` int(10) unsigned DEFAULT NULL COMMENT '日投注单数',
  `dba` int(10) unsigned DEFAULT NULL COMMENT '日投注额度',
  `dpa` int(10) unsigned DEFAULT NULL COMMENT '日赢额度',
  `dla` int(10) unsigned DEFAULT NULL COMMENT '日输额度',
  `dxm` decimal(10,2) unsigned DEFAULT NULL COMMENT '日洗码值',
  PRIMARY KEY (`ymd`,`platform_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_platform_daily
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_platform_user`
-- ----------------------------
DROP TABLE IF EXISTS `ck_platform_user`;
CREATE TABLE `ck_platform_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '游戏平台用户ID',
  `platform_id` int(10) unsigned NOT NULL COMMENT '游戏平台ID',
  `user_id` bigint(20) unsigned NOT NULL COMMENT '用户ID',
  `username` varchar(64) DEFAULT NULL COMMENT '用户名称',
  `game_account` varchar(255) DEFAULT NULL COMMENT '游戏登陆账号',
  `game_password` varchar(255) DEFAULT NULL COMMENT '游戏登陆密码',
  `user_status` tinyint(3) unsigned DEFAULT NULL COMMENT '用户状态 1 正常 2 冻结  3 锁定 4 注销',
  `first_login_ip` varchar(64) DEFAULT NULL COMMENT '首次登陆IP',
  `last_login_at` int(10) unsigned DEFAULT NULL COMMENT '最后登陆事件',
  `last_login_ip` varchar(64) DEFAULT NULL COMMENT '最后登陆IP',
  `available_amount` decimal(19,2) unsigned DEFAULT NULL COMMENT '用户余额',
  `frozen_amount` decimal(19,2) unsigned DEFAULT NULL COMMENT '冻结余额',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_platform_user
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_rebate`
-- ----------------------------
DROP TABLE IF EXISTS `ck_rebate`;
CREATE TABLE `ck_rebate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '序号',
  `ym` char(7) DEFAULT NULL COMMENT '期数',
  `agent_id` int(10) unsigned DEFAULT NULL COMMENT '代理ID',
  `agent_name` varchar(255) DEFAULT NULL COMMENT '代理账号',
  `agent_level` tinyint(4) DEFAULT NULL COMMENT '代理层级',
  `self_bet_amount` decimal(10,3) DEFAULT NULL COMMENT '自身有效投注',
  `sub_bet_amount` decimal(10,3) DEFAULT NULL COMMENT '下级有效投注',
  `self_profit_loss` decimal(10,3) DEFAULT NULL COMMENT '自身会员损益',
  `sub_profit_loss` decimal(10,3) DEFAULT NULL COMMENT '下级代理会员损益',
  `total_sub_amount` decimal(10,3) DEFAULT NULL COMMENT '累计佣金',
  `cur_sub_amount` decimal(10,3) DEFAULT NULL COMMENT '当期佣金',
  `cur_rebate_amount` decimal(10,3) DEFAULT NULL COMMENT '本期返佣',
  `total_rebate_amount` decimal(10,3) DEFAULT NULL COMMENT '累计返佣',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_rebate
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_task`
-- ----------------------------
DROP TABLE IF EXISTS `ck_task`;
CREATE TABLE `ck_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '定时任务名称',
  `route` varchar(50) NOT NULL COMMENT '任务路由',
  `crontab_str` varchar(50) NOT NULL COMMENT 'crontab格式',
  `switch` tinyint(1) NOT NULL DEFAULT '0' COMMENT '任务开关 0关闭 1开启',
  `status` tinyint(1) DEFAULT '0' COMMENT '任务运行状态 0正常 1任务报错',
  `run_times` int(10) unsigned DEFAULT NULL COMMENT '运行次数',
  `error_times` int(10) unsigned DEFAULT NULL COMMENT '任务失败次数',
  `last_run_at` int(11) DEFAULT NULL COMMENT '任务上次运行时间',
  `next_run_at` int(11) DEFAULT NULL COMMENT '任务下次运行时间',
  `exec_mem` int(9) NOT NULL DEFAULT '0' COMMENT '任务执行消耗内存(单位/byte)',
  `exec_time` int(9) NOT NULL DEFAULT '0' COMMENT '任务执行消耗时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_task
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_task_error`
-- ----------------------------
DROP TABLE IF EXISTS `ck_task_error`;
CREATE TABLE `ck_task_error` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '任务失败记录ID',
  `task_id` int(11) DEFAULT NULL,
  `task_start_at` int(10) unsigned DEFAULT NULL COMMENT '任务开始时间',
  `task_end_at` int(10) unsigned DEFAULT NULL COMMENT '任务结束时间',
  `exec_time` int(10) unsigned DEFAULT NULL COMMENT '任务所用时间(ms)',
  `exec_mem` int(10) unsigned DEFAULT NULL COMMENT '任务所消耗内存(byte)',
  `available_mem` int(10) unsigned DEFAULT NULL COMMENT '可用内存',
  `params` varchar(512) DEFAULT NULL COMMENT '任务参数',
  `error_msg` varchar(512) DEFAULT NULL COMMENT '错误信息',
  `retry_times` int(11) DEFAULT NULL COMMENT '重试次数',
  `retry_result` tinyint(3) unsigned DEFAULT NULL COMMENT '重试结果',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_task_error
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_user`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user`;
CREATE TABLE `ck_user` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT COMMENT '自增用户id',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `nickname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '昵称',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'cookie验证auth_key',
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '加密后密码',
  `password_pay` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '支付密码',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '找回密码token',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户邮箱',
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '用户头像url',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '会员状态\r\n            1、正常\r\n            2、冻结\r\n            3、锁定\r\n            4、注销',
  `xima_rate` decimal(4,3) DEFAULT NULL COMMENT '洗码率',
  `xima_type` tinyint(3) unsigned DEFAULT NULL COMMENT '洗码类别 1 单边 2 双边',
  `xima_status` tinyint(3) unsigned DEFAULT NULL COMMENT '查看洗码 0 否 1是',
  `min_limit` int(10) unsigned DEFAULT NULL COMMENT '最小限红',
  `max_limit` int(10) unsigned DEFAULT NULL COMMENT '最大限红',
  `dogfall_min_limit` int(11) unsigned DEFAULT NULL COMMENT '最小和限红',
  `dogfall_max_limit` int(10) unsigned DEFAULT NULL COMMENT '最大和限红',
  `pair_min_limit` int(11) DEFAULT NULL COMMENT '最小对限红',
  `pair_max_limit` int(10) unsigned DEFAULT NULL COMMENT '最大和限红',
  `invite_agent_id` int(10) unsigned DEFAULT NULL COMMENT '邀请代理ID',
  `invite_user_id` bigint(20) unsigned DEFAULT NULL COMMENT '邀请用户ID',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_user
-- ----------------------------
INSERT INTO `ck_user` VALUES ('1', 'sentry', null, '123', '22334', '444', null, '', '', '1', null, null, null, null, null, null, null, null, null, '1', '1', '0', '0');
INSERT INTO `ck_user` VALUES ('3', 'demo', null, '33', '444', '554', null, 'aaa@cc.com', '', '1', null, null, null, null, null, null, null, null, null, '1', '1', '0', '0');
INSERT INTO `ck_user` VALUES ('4', 'aaaaa', null, '', '', null, null, '', '', '1', null, null, null, null, null, null, null, null, null, '1', '1', '1539173959', '1539173959');
INSERT INTO `ck_user` VALUES ('5', '12345', null, 'hg7FzRlHigQsFtsTDhG3Kwgntp-wzKNO', '$2y$13$Ua8FnsVfC8tX/CR1ykQUXO33NkBD0LVPvv6oYtglCmqu1rQsiuV8W', null, null, '', '', '1', '0.008', '2', '1', '10', '10000', '10', '5000', '10', '5000', '1', null, '1539239742', '1539240983');

-- ----------------------------
-- Table structure for `ck_user_account`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_account`;
CREATE TABLE `ck_user_account` (
  `user_id` bigint(20) NOT NULL COMMENT '会员编号',
  `username` varchar(64) DEFAULT NULL COMMENT '会员账号',
  `available_amount` decimal(10,3) DEFAULT NULL COMMENT '可用余额',
  `frozen_amount` decimal(10,3) DEFAULT NULL COMMENT '冻结金额',
  `user_point` int(11) DEFAULT NULL COMMENT '会员积分',
  `xima_account` decimal(19,2) DEFAULT NULL COMMENT '洗码值',
  `xima_rate` decimal(4,2) DEFAULT NULL COMMENT '洗码比',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员账户表';

-- ----------------------------
-- Records of ck_user_account
-- ----------------------------
INSERT INTO `ck_user_account` VALUES ('484020991350013952', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('486579189646884864', null, '33442.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('486910926415462400', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487589032641953792', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487589032654536704', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487590114654945280', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487590385107861504', null, '139811.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487590453785395200', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487590502347046912', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487594592904937472', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487594640942301184', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487594820143939584', null, '17850.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487595362211594240', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487595410316066816', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487596004980293632', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487600131751804928', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487600131814719488', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487600397771341824', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487623482620772352', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487625035440193536', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487671083869143040', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('487676198235668480', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488015450551091200', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488095073217544192', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488095142117376000', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488095209079439360', null, '59820.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488095270349832192', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488337527766253568', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488341274059866112', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488341295064940544', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488341323523293184', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488390573808418816', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488401011694632960', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488423961768493056', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488424191352111104', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488424885190656000', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488427777674969088', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488440492149702656', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488440754801213440', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488442987735416832', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488443026637586432', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488443189997338624', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488443243483103232', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488443259475984384', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488448175107997696', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488448592994893824', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488453397876310016', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488457348398972928', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488459540082196480', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488460267605196800', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488461997571047424', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488633852206514176', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488677956105797632', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488702705854840832', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488706018037989376', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488706471354171392', null, '10000.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488723631480766464', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('488751283566542848', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489011405089931264', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489043280739172352', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489043865056051200', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489076565443870720', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489097921954840576', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489098056436809728', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489105147184545792', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489128615355613184', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489171105295106048', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489406578378670080', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489406613900230656', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489419686866321408', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489421821490233344', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489424429403602944', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489519230996185088', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489533894756925440', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489542532850515968', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489748070393708544', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489757074947833856', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489829931040112640', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489845285363646464', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489863958627352576', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489870298254934016', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489904952836096000', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489923187438518272', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('489923508302774272', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490097028890624000', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490120269164183552', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490120852302462976', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490121015880318976', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490173559298064384', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490174355171442688', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490176563149537280', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490225630680449024', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490451812394991616', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490458948814503936', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490458953600204800', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490459215479963648', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490459593231564800', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('490459774991728640', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('491184697011863552', null, '400800.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('491300336934322176', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('491314180259840000', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('491315200432013312', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('491341138834227200', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('491344839279902720', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('491741297229430784', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('491969472064651264', null, '600.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('492373016747966464', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('493072988229337088', null, '99195.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('493210536314404864', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);
INSERT INTO `ck_user_account` VALUES ('494411311317254144', null, '0.000', '0.000', '0', '0.00', '0.00', null, null);

-- ----------------------------
-- Table structure for `ck_user_bank`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_bank`;
CREATE TABLE `ck_user_bank` (
  `id` int(11) NOT NULL DEFAULT '0' COMMENT '银行账号ID',
  `user_id` bigint(20) unsigned NOT NULL COMMENT '用户ID',
  `username` varchar(64) NOT NULL COMMENT '用户名',
  `bank_username` varchar(64) NOT NULL COMMENT '开户姓名',
  `bank_account` varchar(64) NOT NULL COMMENT '银行账号',
  `bank_name` varchar(64) NOT NULL COMMENT '银行名称',
  `province` varchar(32) DEFAULT NULL COMMENT '开户省份',
  `city` varchar(32) DEFAULT NULL COMMENT '开户城市',
  `branch_name` varchar(128) DEFAULT NULL COMMENT '网点名称',
  `card_type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '银行卡类型 1:借记卡  2：信用卡',
  `status` tinyint(3) unsigned DEFAULT '1' COMMENT '账号状态 1：启用 0：停用',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户绑定银行账号表';

-- ----------------------------
-- Records of ck_user_bank
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_user_deposit`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_deposit`;
CREATE TABLE `ck_user_deposit` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '存款记录ID',
  `user_id` bigint(20) NOT NULL COMMENT '会员ID',
  `username` varchar(255) NOT NULL COMMENT '会员名称',
  `apply_amount` decimal(19,2) NOT NULL COMMENT '申请存款金额',
  `status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '存款状态 1 申请中 2 已存入 0 已取消',
  `confirm_amount` decimal(19,2) unsigned DEFAULT NULL COMMENT '确认金额',
  `audit_by_id` int(11) unsigned DEFAULT NULL COMMENT '处理人员ID',
  `audit_by_username` varchar(64) DEFAULT NULL COMMENT '处理人员',
  `audit_remark` varchar(255) DEFAULT NULL COMMENT '处理备注',
  `audit_at` int(20) unsigned DEFAULT NULL COMMENT '处理时间',
  `pay_channel` tinyint(3) unsigned NOT NULL COMMENT '支付渠道 1 银行转账 2 支付宝 3 微信',
  `pay_username` varchar(255) DEFAULT NULL COMMENT '支付账号',
  `pay_nickname` varchar(255) DEFAULT NULL COMMENT '支付用户昵称',
  `pay_info` varchar(255) DEFAULT NULL COMMENT '支付信息',
  `save_bank_id` int(10) unsigned DEFAULT NULL COMMENT '存入公司账号ID',
  `feedback` tinyint(3) unsigned DEFAULT '0' COMMENT '会员反馈 0 无 1 成功 2 失败',
  `feedback_remark` varchar(255) DEFAULT NULL COMMENT '会员反馈信息',
  `feedback_at` int(10) unsigned DEFAULT NULL COMMENT '反馈时间',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=494631792775528449 DEFAULT CHARSET=utf8 COMMENT='用户存款记录表';

-- ----------------------------
-- Records of ck_user_deposit
-- ----------------------------
INSERT INTO `ck_user_deposit` VALUES ('490225814445490176', '490225630680449024', 'ppp001', '7890.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490227034463666176', '490176563149537280', 'zzz001', '55555.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490573283058515968', '487594640942301184', '006', '8000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490574315285118976', '487594640942301184', '006', '4555.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490574421585559552', '487594640942301184', '006', '4555.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490574575726231552', '487594640942301184', '006', '87563.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490574693678448640', '487594640942301184', '006', '7892444.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490579407627354112', '487594640942301184', '006', '666666.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490580220798042112', '487594640942301184', '006', '666666.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490580230302334976', '487594640942301184', '006', '666666.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490580238753857536', '487594640942301184', '006', '666666.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490580247339597824', '487594640942301184', '006', '666666.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490804573183672320', '487594820143939584', '007', '100.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490804798380048384', '487594820143939584', '007', '200.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490804939296079872', '487594820143939584', '007', '300.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490996255485329408', '487594820143939584', '007', '5555.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490996347365752832', '487594820143939584', '007', '555555.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('490996642221129728', '487594820143939584', '007', '555555.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491261915566178304', '486579189646884864', 'purity', '11.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491263867775614976', '486579189646884864', 'purity', '1122.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491264467967934464', '486579189646884864', 'purity', '111.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491264562008424448', '486579189646884864', 'purity', '111.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491264593465704448', '486579189646884864', 'purity', '111.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491267905401389056', '486579189646884864', 'purity', '111.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491290345439494144', '487594592904937472', '005', '6666.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491296884753694720', '487594592904937472', '005', '52869.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491297345573486592', '490176563149537280', 'zzz001', '456666.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491297695915311104', '487594592904937472', '005', '52869.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491297753943506944', '486579189646884864', 'purity', '11.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491344964219830272', '491344839279902720', 'chenggong', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491526055685783552', '487594820143939584', '007', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491656535462641664', '486910926415462400', 'test', '55588888.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('491974906045530112', '487595410316066816', '009', '325.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492348522197155840', '487625035440193536', 'xjq', '10000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492348729735512064', '487625035440193536', 'xjq', '100000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492348998103859200', '487625035440193536', 'xjq', '1000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492380688083845120', '487594640942301184', '006', '1200.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492380838617415680', '487594640942301184', '006', '1200.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492383589753683968', '487594640942301184', '006', '1200.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492384217720684544', '487594640942301184', '006', '1800.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492694865885265920', '488095209079439360', '110', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492721613083508736', '488095209079439360', '110', '123.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492721939849150464', '488095209079439360', '110', '123.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492721942600613888', '488095209079439360', '110', '123.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492722066529714176', '488095209079439360', '110', '123.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492727721231646720', '488095209079439360', '110', '200.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492730442638688256', '488095209079439360', '110', '150.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492730533143379968', '488095209079439360', '110', '150.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492730607529361408', '488095209079439360', '110', '150.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492730743680663552', '488095209079439360', '110', '150.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492731234141601792', '488095209079439360', '110', '150.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492732287633326080', '488095209079439360', '110', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492732414183866368', '488095209079439360', '110', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492732442101153792', '488095209079439360', '110', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492732475655585792', '488095209079439360', '110', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492732572254601216', '488095209079439360', '110', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492732765981114368', '488095209079439360', '110', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492732791146938368', '488095209079439360', '110', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492744806540247040', '488095209079439360', '110', '1000.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492745228264931328', '488095209079439360', '110', '1000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492745602409431040', '488095209079439360', '110', '1000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492749249159626752', '488095209079439360', '110', '800.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492781168513515520', '488095209079439360', '110', '666.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492781945378308096', '488095209079439360', '110', '666.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492782040471568384', '488095209079439360', '110', '666.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492784187560951808', '488095209079439360', '110', '1000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492785334308831232', '488095209079439360', '110', '1000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492789203881426944', '488095209079439360', '110', '318.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492790800598433792', '488095209079439360', '110', '318.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492791866740178944', '488095209079439360', '110', '318.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('492791940597678080', '488095209079439360', '110', '318.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493036187049525248', '487590502347046912', '004', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493036614931447808', '487590502347046912', '004', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493036681318891520', '487590502347046912', '004', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493036737879080960', '487590502347046912', '004', '500.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493177116486008832', '487594820143939584', '007', '600.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493177370174291968', '487594820143939584', '007', '600.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493177733900140544', '487594820143939584', '007', '600.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493177968256876544', '487594820143939584', '007', '600.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493178035890028544', '487594820143939584', '007', '600.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493178083600236544', '487594820143939584', '007', '600.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493178152609120256', '487594820143939584', '007', '600.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493178227188039680', '487594820143939584', '007', '600.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493178633645457408', '487594820143939584', '007', '500000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493178970825555968', '487594820143939584', '007', '6000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493179042522988544', '487594820143939584', '007', '6000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493179114614685696', '487594820143939584', '007', '6000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493179645387079680', '487594820143939584', '007', '6000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493199829359394816', '487594820143939584', '007', '2000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493200141767933952', '487594820143939584', '007', '2000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493200535051042816', '487594820143939584', '007', '2000.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493202775266557952', '487594640942301184', '006', '1200.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493202868854063104', '487594640942301184', '006', '1200.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493202956540182528', '487594640942301184', '006', '1200.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493203393402109952', '487594640942301184', '006', '1200.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493211292992012288', '493210536314404864', '103z', '100000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('493213533408854016', '487594820143939584', '007', '200000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494133062062309376', '487623482620772352', 'tony', '9999999.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494413019653079040', '494411311317254144', 'wade', '5000000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631155866271744', '488095209079439360', '110', '58000.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631507021791232', '488095209079439360', '110', '58000.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631669622374400', '488095209079439360', '110', '58000.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631670016638976', '488095209079439360', '110', '58000.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631670079553536', '488095209079439360', '110', '58000.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631670868082688', '488095209079439360', '110', '58000.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631671128129536', '488095209079439360', '110', '58000.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631694918221824', '488095209079439360', '110', '58000.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631791596929024', '488095209079439360', '110', '58000.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631791861170176', '488095209079439360', '110', '58000.00', '2', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631791991193600', '488095209079439360', '110', '58000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631792058302464', '488095209079439360', '110', '58000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631792318349312', '488095209079439360', '110', '58000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631792448372736', '488095209079439360', '110', '58000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_deposit` VALUES ('494631792775528448', '488095209079439360', '110', '58000.00', '1', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `ck_user_detail`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_detail`;
CREATE TABLE `ck_user_detail` (
  `user_id` bigint(20) NOT NULL COMMENT '会员编号',
  `user_job` varchar(50) DEFAULT NULL COMMENT '会员职业',
  `card_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '身份证号码',
  `birthday` varchar(50) DEFAULT NULL COMMENT '会员出生日',
  `user_sex` tinyint(4) DEFAULT NULL COMMENT '会员性别\r\n            1、男\r\n            2、女',
  `user_age` int(11) DEFAULT NULL COMMENT '会员年龄',
  `user_head` varchar(200) DEFAULT NULL COMMENT '会员头像',
  `id` bigint(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员详情表';

-- ----------------------------
-- Records of ck_user_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_user_game_platform`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_game_platform`;
CREATE TABLE `ck_user_game_platform` (
  `user_id` bigint(20) NOT NULL,
  `game_platform_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `login_pwd` varchar(100) NOT NULL,
  `first_login` bigint(20) DEFAULT NULL,
  `first_ip` varchar(50) DEFAULT NULL,
  `last_login` bigint(20) DEFAULT NULL,
  `last_ip` varchar(50) DEFAULT NULL,
  `user_status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `online_stauts` tinyint(4) unsigned NOT NULL DEFAULT '2',
  `available_amount` decimal(10,3) unsigned NOT NULL DEFAULT '0.000',
  PRIMARY KEY (`user_id`,`game_platform_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ck_user_game_platform
-- ----------------------------
INSERT INTO `ck_user_game_platform` VALUES ('0', '1', 'HJ113', '123456', '1537336011', '101.89.19.149', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('486579189646884864', '1', 'HJpurity937', '123456', '1537251068', '113.111.183.156', null, null, '1', '2', '725.000');
INSERT INTO `ck_user_game_platform` VALUES ('486910926415462400', '1', 'HJtest785', '123456', '1537346668', '59.41.23.223', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('487590114654945280', '1', '001811', '123456', '1537458010', '222.220.52.246', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('487590385107861504', '1', 'HJ002612', '123456', '1537351521', '117.136.73.205', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('487590453785395200', '1', 'HJ003940', '123456', '1537255659', '222.220.52.102', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('487590502347046912', '1', '004601', '123456', '1537538461', '112.96.194.63', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('487594592904937472', '1', 'HJ005768', '123456', '1537261237', '222.220.19.225', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('487594640942301184', '1', 'HJ006298', '123456', '1537274230', '222.220.19.11', null, null, '1', '2', '300.000');
INSERT INTO `ck_user_game_platform` VALUES ('487594820143939584', '1', 'HJ007432', '123456', '1537204965', '222.220.19.237', null, null, '1', '2', '1100.000');
INSERT INTO `ck_user_game_platform` VALUES ('487595362211594240', '1', 'HJ008926', '123456', '1537231179', '222.220.18.186', null, null, '1', '2', '1400.000');
INSERT INTO `ck_user_game_platform` VALUES ('487595410316066816', '1', 'HJ009642', '123456', '1537337247', '222.220.18.145', null, null, '1', '2', '325.000');
INSERT INTO `ck_user_game_platform` VALUES ('487625035440193536', '1', 'xjq', '123456', '1537428146', '59.41.23.223', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('487676198235668480', '1', 'HJpurity1828', '123456', '1537252187', '113.111.183.156', null, null, '1', '2', '100.000');
INSERT INTO `ck_user_game_platform` VALUES ('488095209079439360', '1', 'HJ110467', '123456', '1537186663', '222.220.19.78', null, null, '1', '2', '200.000');
INSERT INTO `ck_user_game_platform` VALUES ('488095270349832192', '1', 'HJ111741', '123456', '1537255496', '222.220.52.182', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('488706471354171392', '1', 'HJmrhuang316', '123456', '1537336755', '59.41.23.223', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('489098056436809728', '1', 'HJcp001780', '123456', '1537261578', '222.220.52.195', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('489105147184545792', '1', 'HJpurity6754', '123456', '1537336507', '59.41.23.223', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('489171105295106048', '1', 'HJpurity3762', '123456', '1537175216', '113.111.183.156', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('489533894756925440', '1', 'HJxds001785', '123456', '1537255043', '222.220.58.170', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('489748070393708544', '1', 'purity2', '123456', '1537950848', '59.41.21.146', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('490120852302462976', '1', 'HJt723', '123456', '1537181854', '113.111.183.156', null, null, '1', '2', '700.000');
INSERT INTO `ck_user_game_platform` VALUES ('490173559298064384', '1', 'HJ111111109', '123456', '1537237361', '113.111.183.156', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('490225630680449024', '1', 'HJppp001872', '123456', '1537186318', '222.220.59.101', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('491184697011863552', '1', 'A001435', '123456', '1537517727', '14.152.94.185', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('491300336934322176', '1', 'HJgogogo858', '123456', '1537253096', '222.220.59.101', null, null, '1', '2', '5950.000');
INSERT INTO `ck_user_game_platform` VALUES ('491341138834227200', '1', 'HJdashu001311', '123456', '1537186486', '222.220.18.122', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('491344839279902720', '1', 'HJchenggong690', '123456', '1537187412', '222.220.53.120', null, null, '1', '2', '500.000');
INSERT INTO `ck_user_game_platform` VALUES ('491969472064651264', '1', 'HJaabbcc747', '123456', '1537336354', '59.41.23.223', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('492373016747966464', '1', 'wantong001', '123456', '1537432521', '222.220.18.184', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('4865791896468848640', '1', 'HJ646', '123456', '1537256353', '113.111.183.156', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('4869109264154624000', '1', 'HJ841', '123456', '1537321232', '59.41.23.223', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('4875954103160668160', '1', 'HJ774', '123456', '1537262583', '222.220.18.112', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('4876761982356684800', '1', 'HJ408', '123456', '1537259169', '113.111.183.156', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('4890980564368097280', '1', 'HJ391', '123456', '1537272366', '222.220.59.188', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('4891051471845457920', '1', 'HJ242', '123456', '1537335777', '59.41.23.223', null, null, '1', '2', '0.000');
INSERT INTO `ck_user_game_platform` VALUES ('4895338947569254400', '1', 'HJ748', '123456', '1537262443', '222.220.18.112', null, null, '1', '2', '0.000');

-- ----------------------------
-- Table structure for `ck_user_income`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_income`;
CREATE TABLE `ck_user_income` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '会员账户变更日志表',
  `user_id` bigint(20) unsigned NOT NULL COMMENT '会员ID',
  `username` varchar(64) DEFAULT NULL COMMENT '会员名称',
  `income_type` tinyint(3) unsigned NOT NULL COMMENT '收支类型 1收入 2支出',
  `trade_no` varchar(255) DEFAULT NULL COMMENT '交易单号',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `amount` decimal(19,2) NOT NULL COMMENT '收支金额',
  `after_amount` decimal(19,2) NOT NULL COMMENT '剩余金额',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='会员收支明细';

-- ----------------------------
-- Records of ck_user_income
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_user_login_log`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_login_log`;
CREATE TABLE `ck_user_login_log` (
  `id` bigint(20) NOT NULL COMMENT '记录编号',
  `user_id` bigint(20) DEFAULT NULL COMMENT '会员编号',
  `user_name` varchar(50) DEFAULT NULL COMMENT '会员名称',
  `login_time` bigint(20) DEFAULT NULL COMMENT '登录时间',
  `login_ip` varchar(50) DEFAULT NULL COMMENT '登录IP',
  `client_type` tinyint(4) DEFAULT NULL COMMENT '登录客户端类型\r\n            1、手机登录\r\n            2、PC登录\r\n            3、微信登录',
  `client_version` varchar(50) DEFAULT NULL COMMENT '客户端版本号',
  `system_version` varchar(50) DEFAULT NULL COMMENT '系统版本号',
  `phone_brand` varchar(50) DEFAULT NULL COMMENT '手机型号',
  `phone_pixel` varchar(50) DEFAULT NULL COMMENT '手机分辨率',
  `phone_serial_number` varchar(50) DEFAULT NULL COMMENT '手机序列号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员登录日志';

-- ----------------------------
-- Records of ck_user_login_log
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_user_stat`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_stat`;
CREATE TABLE `ck_user_stat` (
  `user_id` bigint(20) NOT NULL COMMENT '会员编号',
  `last_login_at` int(11) unsigned DEFAULT NULL COMMENT '最后登录时间',
  `login_number` int(10) unsigned DEFAULT NULL COMMENT '登录次数',
  `last_login_ip` varchar(64) DEFAULT NULL COMMENT '最后登录IP',
  `oneline_status` tinyint(3) unsigned DEFAULT NULL COMMENT '在线状态 0：离线 1：在线',
  `oneline_duration` int(10) unsigned DEFAULT NULL COMMENT '在线时长',
  `deposit_number` int(11) DEFAULT NULL COMMENT '存款次数',
  `deposit_amount` decimal(10,2) DEFAULT NULL COMMENT '存款总额',
  `withdrawal_number` int(11) DEFAULT NULL COMMENT '取款次数',
  `withdrawal_amount` decimal(10,3) DEFAULT NULL COMMENT '取款总额',
  `bet_number` int(10) unsigned DEFAULT NULL COMMENT '投注次数',
  `bet_amount` decimal(10,3) unsigned DEFAULT NULL COMMENT '投注总额',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员统计表';

-- ----------------------------
-- Records of ck_user_stat
-- ----------------------------
INSERT INTO `ck_user_stat` VALUES ('484020991350013952', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('486579189646884864', '0', null, '1538033772', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('486910926415462400', '0', null, '1538086053', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487589032641953792', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487589032654536704', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487590114654945280', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487590385107861504', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487590453785395200', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487590502347046912', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487594592904937472', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487594640942301184', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487594820143939584', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487595362211594240', '0', null, '1538170049', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487595410316066816', '0', null, '1538210784', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487596004980293632', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487600131751804928', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487600131814719488', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487600397771341824', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487623482620772352', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487625035440193536', '0', null, '1538037178', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487671083869143040', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('487676198235668480', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488015450551091200', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488095073217544192', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488095142117376000', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488095209079439360', '0', null, '1538042515', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488095270349832192', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488337527766253568', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488341274059866112', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488341295064940544', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488341323523293184', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488390573808418816', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488401011694632960', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488423961768493056', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488424191352111104', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488424885190656000', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488427777674969088', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488440492149702656', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488440754801213440', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488442987735416832', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488443026637586432', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488443189997338624', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488443243483103232', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488443259475984384', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488448175107997696', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488448592994893824', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488453397876310016', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488457348398972928', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488459540082196480', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488460267605196800', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488461997571047424', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488633852206514176', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488677956105797632', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488702705854840832', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488706018037989376', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488706471354171392', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488723631480766464', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('488751283566542848', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489011405089931264', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489043280739172352', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489043865056051200', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489076565443870720', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489097921954840576', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489098056436809728', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489105147184545792', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489128615355613184', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489171105295106048', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489406578378670080', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489406613900230656', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489419686866321408', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489421821490233344', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489424429403602944', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489519230996185088', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489533894756925440', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489542532850515968', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489748070393708544', '0', null, '1538089630', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489757074947833856', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489829931040112640', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489845285363646464', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489863958627352576', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489870298254934016', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489904952836096000', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489923187438518272', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('489923508302774272', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490097028890624000', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490120269164183552', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490120852302462976', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490121015880318976', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490173559298064384', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490174355171442688', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490176563149537280', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490225630680449024', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490451812394991616', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490458948814503936', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490458953600204800', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490459215479963648', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490459593231564800', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('490459774991728640', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('491184697011863552', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('491300336934322176', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('491314180259840000', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('491315200432013312', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('491341138834227200', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('491344839279902720', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('491741297229430784', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('491969472064651264', '0', null, '1538263504', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('492373016747966464', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('493072988229337088', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('493210536314404864', '0', null, '1538239068', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('494411311317254144', '0', null, '1538031613', null, null, '0', '0.00', null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('494983835981709312', '0', null, '1538054942947', null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('495659328775127040', '0', null, '1538215993026', null, null, null, null, null, null, null, null);
INSERT INTO `ck_user_stat` VALUES ('495770112943456256', '0', null, '1538242406014', null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `ck_user_token`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_token`;
CREATE TABLE `ck_user_token` (
  `id` bigint(20) NOT NULL COMMENT '记录编号',
  `user_id` bigint(20) DEFAULT NULL COMMENT '会员编号',
  `expire_time` bigint(20) DEFAULT NULL COMMENT 'token过期时间',
  `login_ip` varchar(50) DEFAULT NULL COMMENT '登录ip',
  `login_time` bigint(20) DEFAULT NULL COMMENT '登录时间',
  `login_region` varchar(100) DEFAULT NULL COMMENT '登录区域',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员token表';

-- ----------------------------
-- Records of ck_user_token
-- ----------------------------
INSERT INTO `ck_user_token` VALUES ('486472679193313280', '486472641876590592', '1536284924945', '127.0.0.1', '0', '00');
INSERT INTO `ck_user_token` VALUES ('488096050330992640', '488015450551091200', '1536671966785', '122.226.183.86', '0', '浙江省台州市');
INSERT INTO `ck_user_token` VALUES ('488341565299752960', '488337527766253568', '1536730502115', '119.62.209.10', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('488342350469267456', '488341295064940544', '1536730689314', '222.220.58.186', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('488342939508932608', '488341323523293184', '1536730829752', '222.220.53.248', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('488453470160945152', '488453397876310016', '1536757182313', '222.220.52.225', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('488457400563531776', '488457348398972928', '1536758119394', '222.220.53.248', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('488459622655459328', '488459540082196480', '1536758649182', '112.96.71.55', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('488460433838047232', '488460267605196800', '1536758842583', '222.220.58.226', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('488633925145460736', '488633852206514176', '1536800206134', '222.220.19.2', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('488678045691936768', '488677956105797632', '1536810725292', '222.220.19.2', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('488691428071833600', '488448592994893824', '1536813915900', '222.220.52.231', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('488702773618016256', '488702705854840832', '1536816620889', '222.220.59.132', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('489011836578955264', '489011405089931264', '1536890307241', '59.41.23.179', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('489043390839652352', '489043280739172352', '1536897830363', '222.220.52.59', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('489044077984088064', '489043865056051200', '1536897994191', '222.220.59.215', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('489076623245574144', '489076565443870720', '1536905753586', '222.220.53.89', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('489097988145152000', '489097921954840576', '1536910847375', '222.220.58.48', '0', 'nullnull');
INSERT INTO `ck_user_token` VALUES ('489128670997250048', '489128615355613184', '1536918162737', '222.220.58.234', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('489406659051913216', '489406578378670080', '1536984440254', '222.220.58.234', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('489424486513246208', '489424429403602944', '1536988690652', '222.220.58.79', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('489470064475504640', '487600397771341824', '1536999557285', '222.220.52.204', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('489519294858657792', '489519230996185088', '1537011294723', '222.220.58.79', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('489542596444553216', '489542532850515968', '1537016850254', '222.220.59.25', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('489757105289428992', '489757074947833856', '1537067993148', '59.41.23.179', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('489829985431846912', '489829931040112640', '1537085369128', '222.220.53.6', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('489844537007538176', '488448175107997696', '1537088838494', '59.41.23.179', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('489845339889598464', '489845285363646464', '1537089029916', '112.96.109.253', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('489864018660425728', '489863958627352576', '1537093483282', '222.220.53.100', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('489870383906816000', '489870298254934016', '1537095000875', '222.220.18.40', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('489905016929255424', '489904952836096000', '1537103258031', '112.96.70.159', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('490097114089521152', '490097028890624000', '1537149057563', '222.220.53.100', '0', 'nullnull');
INSERT INTO `ck_user_token` VALUES ('490120309727297536', '490120269164183552', '1537154587834', '59.41.23.179', '0', 'nullnull');
INSERT INTO `ck_user_token` VALUES ('490121052777611264', '490121015880318976', '1537154764991', '59.41.23.179', '0', 'nullnull');
INSERT INTO `ck_user_token` VALUES ('490174406329368576', '490174355171442688', '1537167485469', '59.41.23.179', '0', 'nullnull');
INSERT INTO `ck_user_token` VALUES ('490225699232153600', '490225630680449024', '1537179714650', '222.220.18.127', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('490624636954869760', '487596004980293632', '1537274828815', '222.220.19.11', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('490630635702976512', '489421821490233344', '1537276259028', '112.96.179.193', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('491293102686863360', '489171105295106048', '1537434203465', '113.111.183.156', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('491295661958889472', '490120852302462976', '1537434813643', '59.41.23.223', '0', 'nullnull');
INSERT INTO `ck_user_token` VALUES ('491297277470572544', '490176563149537280', '1537435198811', '222.220.52.182', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('491341224230256640', '491341138834227200', '1537445676535', '222.220.52.102', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('491344900491575296', '491344839279902720', '1537446553024', '112.96.198.85', '0', 'nullnull');
INSERT INTO `ck_user_token` VALUES ('491554620145926144', '490173559298064384', '1537496554086', '59.41.23.223', '0', 'nullnull');
INSERT INTO `ck_user_token` VALUES ('491622636925747200', '489533894756925440', '1537512770550', '222.220.58.132', '0', 'nullnull');
INSERT INTO `ck_user_token` VALUES ('491636453147672576', '489098056436809728', '1537516064594', '222.220.18.29', '0', 'nullnull');
INSERT INTO `ck_user_token` VALUES ('491639306192945152', '484020991350013952', '1537516744813', '59.41.23.223', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('491741552163422208', '491741297229430784', '1537541122152', '222.220.19.194', '0', 'nullnull');
INSERT INTO `ck_user_token` VALUES ('491967424585793536', '489105147184545792', '1537594974334', '59.41.23.223', '0', 'nullnull');
INSERT INTO `ck_user_token` VALUES ('492373104891265024', '492373016747966464', '1537691696056', '222.220.53.45', '0', 'nullnull');
INSERT INTO `ck_user_token` VALUES ('492703365898174464', '488427777674969088', '1537770436416', '59.41.23.230', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('492728185465602048', '491300336934322176', '1537776353862', '222.220.19.194', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('492817538829254656', '487590502347046912', '1537797657364', '222.220.52.69', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('493079377844633600', '487671083869143040', '1537860084650', '112.96.179.229', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('493150370130821120', '487676198235668480', '1537877010530', '59.41.21.146', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('493363986188730368', '487590453785395200', '1537927940567', '222.220.19.151', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('493632358507872256', '487625035440193536', '1537991925514', '183.236.31.222', '0', '广东省东莞市');
INSERT INTO `ck_user_token` VALUES ('493717418653253632', '487594640942301184', '1538012205433', '112.96.179.229', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('493768438817226752', '487594592904937472', '1538024369588', '112.96.179.182', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('493778095438823424', '488095209079439360', '1538026671906', '112.96.179.182', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('493795246669299712', '487595362211594240', '1538030761078', '222.220.19.22', '0', '云南省西双版纳傣族自治州');
INSERT INTO `ck_user_token` VALUES ('494039069622272000', '486910926415462400', '1538088893000', '59.41.21.146', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('494041508534550528', '488706471354171392', '1538089474482', '113.111.180.10', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('494048791536599040', '487623482620772352', '1538091210885', '59.41.21.146', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('494096117529575424', '491184697011863552', '1538102494281', '14.152.94.184', '0', '广东省东莞市');
INSERT INTO `ck_user_token` VALUES ('494101069073219584', '488095270349832192', '1538103674821', '120.239.70.28', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('494160496002334720', '486579189646884864', '1538117843305', '113.111.180.10', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('494412814178320384', '494411311317254144', '1538178000646', '113.111.180.10', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('494417943384293376', '491969472064651264', '1538179223544', '113.111.180.10', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('494439167187484672', '493210536314404864', '1538184283693', '117.136.73.89', '0', '云南省昆明市');
INSERT INTO `ck_user_token` VALUES ('494514247900856320', '487594820143939584', '1538202184330', '112.96.179.182', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('494517804054085632', '487590385107861504', '1538203032183', '117.136.73.22', '0', '云南省昆明市');
INSERT INTO `ck_user_token` VALUES ('494547198000758784', '489748070393708544', '1538210040246', '59.41.21.146', '0', '广东省广州市');
INSERT INTO `ck_user_token` VALUES ('494663353700974592', '489419686866321408', '1538237733923', '117.136.73.70', '0', '云南省昆明市');
INSERT INTO `ck_user_token` VALUES ('494666328880185344', '487590114654945280', '1538238443261', '117.136.73.70', '0', '云南省昆明市');
INSERT INTO `ck_user_token` VALUES ('494819179430412288', '493072988229337088', '1538274885672', '14.152.94.184', '0', '广东省东莞市');
INSERT INTO `ck_user_token` VALUES ('494855135160172544', '487595410316066816', '1538283458186', '112.96.179.182', '0', '广东省广州市');

-- ----------------------------
-- Table structure for `ck_user_withdraw`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_withdraw`;
CREATE TABLE `ck_user_withdraw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '存款单号',
  `user_id` bigint(20) unsigned NOT NULL COMMENT '用户ID',
  `username` varchar(255) NOT NULL COMMENT '用户姓名',
  `apply_amount` decimal(19,2) NOT NULL COMMENT '申请取款金额',
  `status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '取款状态 1 申请中 2 已完成  0 已取消',
  `transfer_amount` decimal(19,2) DEFAULT NULL COMMENT '实际转账金额',
  `audit_by_id` int(11) unsigned DEFAULT NULL COMMENT '处理人员ID',
  `audit_by_username` varchar(64) DEFAULT NULL COMMENT '处理人员',
  `audit_remark` varchar(255) DEFAULT NULL COMMENT '处理备注',
  `audit_at` int(20) unsigned DEFAULT NULL COMMENT '处理时间',
  `user_bank_id` int(10) unsigned DEFAULT NULL COMMENT '银行账号ID',
  `bank_name` varchar(64) DEFAULT NULL COMMENT '银行开户名',
  `bank_account` varchar(64) DEFAULT NULL COMMENT '银行账号',
  `apply_ip` varchar(64) DEFAULT NULL COMMENT '申请时登陆IP',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=494631662022295553 DEFAULT CHARSET=utf8 COMMENT='用户存款记录表';

-- ----------------------------
-- Records of ck_user_withdraw
-- ----------------------------
INSERT INTO `ck_user_withdraw` VALUES ('490570974056415232', '487594640942301184', '006', '444.00', '1', '0.00', '1', null, 'tt', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('490574129360011264', '487594640942301184', '006', '456064.00', '1', '0.00', '1', null, '', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('490574880849264640', '487594640942301184', '006', '4000.00', '1', '0.00', '1', null, '444', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('490580517087870976', '487594640942301184', '006', '666666.00', '1', '0.00', '1', null, '333333333', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('490580611522625536', '487594640942301184', '006', '666666.00', '1', '0.00', '1', null, '333333333', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('490581156916363264', '487594640942301184', '006', '7318451.00', '1', '0.00', '1', null, '444', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('490996986955169792', '487594820143939584', '007', '800000.00', '1', '0.00', '1', null, 'dddddd', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('491278779679768576', '486579189646884864', 'purity', '111.00', '2', '0.00', '1', null, '111', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('491279117778419712', '486579189646884864', 'purity', '333.00', '2', '0.00', '1', null, '2222', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('491289902957199360', '487594592904937472', '005', '9999.00', '1', '0.00', '1', null, '对对对', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('491296203305123840', '487594592904937472', '005', '2000.00', '2', '0.00', '1', null, '天河', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('491298017538736128', '490176563149537280', 'zzz001', '689.00', '2', '0.00', '1', null, '555片', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('491298155309039616', '486579189646884864', 'purity', '10000.00', '2', '0.00', '1', null, '天河', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('491299008036208640', '490176563149537280', 'zzz001', '689.00', '2', '0.00', '1', null, '555片', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('491299187468533760', '490176563149537280', 'zzz001', '689.00', '2', '0.00', '1', null, '555片', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('491299302417629184', '490176563149537280', 'zzz001', '689.00', '1', '0.00', '1', null, '555片', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('491300355267624960', '486579189646884864', 'purity', '11.00', '1', '0.00', '1', null, '中国农行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('491300595735461888', '491300336934322176', 'gogogo', '2222222.00', '1', '0.00', '1', null, '321的', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('491665014155902976', '486910926415462400', 'test', '96666.00', '1', '0.00', '1', null, 'lomomo', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('491920334170095616', '487595410316066816', '009', '1000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492381192054636544', '487594640942301184', '006', '2000.00', '1', '0.00', '1', null, '白日事故', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492383674952581120', '487594640942301184', '006', '2000.00', '1', '0.00', '1', null, '白日事故', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492695538873925632', '488095209079439360', '110', '600.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492730939361722368', '488095209079439360', '110', '50.00', '1', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492730947553198080', '488095209079439360', '110', '50.00', '1', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492731015316373504', '488095209079439360', '110', '50.00', '1', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492731175618478080', '488095209079439360', '110', '50.00', '1', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492732110948270080', '488095209079439360', '110', '699.00', '1', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492732220721594368', '488095209079439360', '110', '699.00', '2', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492732635039137792', '488095209079439360', '110', '699.00', '2', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492732718073774080', '488095209079439360', '110', '699.00', '2', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492745065408495616', '488095209079439360', '110', '800.00', '1', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492745286528008192', '488095209079439360', '110', '800.00', '2', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492745653202452480', '488095209079439360', '110', '800.00', '2', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492746044321300480', '488095209079439360', '110', '800.00', '2', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492747019627003904', '488095209079439360', '110', '800.00', '2', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492749516680724480', '488095209079439360', '110', '600.00', '2', '0.00', '1', null, '中国银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492781531060764672', '488095209079439360', '110', '350.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492782149523472384', '488095209079439360', '110', '350.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492784418314780672', '488095209079439360', '110', '350.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492785625225756672', '488095209079439360', '110', '500.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492786374957596672', '488095209079439360', '110', '500.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492789594081722368', '488095209079439360', '110', '200.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492791331505045504', '488095209079439360', '110', '200.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492791801464225792', '488095209079439360', '110', '200.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492791832858591232', '488095209079439360', '110', '200.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('492792005152210944', '488095209079439360', '110', '200.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493036446177820672', '487590502347046912', '004', '500.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493177048064327680', '487594820143939584', '007', '6000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493177049507168256', '487594820143939584', '007', '6000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493177075197280256', '487594820143939584', '007', '6000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493177145779027968', '487594820143939584', '007', '6000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493177167601991680', '487594820143939584', '007', '6000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493177302541139968', '487594820143939584', '007', '6000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493177468153233408', '487594820143939584', '007', '6000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493177630221139968', '487594820143939584', '007', '6000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493177881816465408', '487594820143939584', '007', '6000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493179445570437120', '487594820143939584', '007', '6000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493180622919958528', '487594820143939584', '007', '6000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493180667354415104', '487594820143939584', '007', '6000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493200054476079104', '487594820143939584', '007', '800.00', '1', '0.00', '1', null, '您把', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493200289222885376', '487594820143939584', '007', '800.00', '2', '0.00', '1', null, '您把', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493200327957282816', '487594820143939584', '007', '800.00', '1', '0.00', '1', null, '您把', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493203535026978816', '487594640942301184', '006', '696.00', '1', '0.00', '1', null, 'DSP', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493217849477693440', '487594820143939584', '007', '179200.00', '1', '0.00', '1', null, '聊聊', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('493237534348804096', '493210536314404864', '103z', '400000.00', '1', '0.00', '1', null, '骨头', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('494631481591726080', '488095209079439360', '110', '5000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('494631490047442944', '488095209079439360', '110', '5000.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('494631491028910080', '488095209079439360', '110', '5000.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('494631491423174656', '488095209079439360', '110', '5000.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('494631492404641792', '488095209079439360', '110', '5000.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('494631492471750656', '488095209079439360', '110', '5000.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('494631493126062080', '488095209079439360', '110', '5000.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('494631493193170944', '488095209079439360', '110', '5000.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('494631493453217792', '488095209079439360', '110', '5000.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('494631494371770368', '488095209079439360', '110', '5000.00', '2', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('494631622696501248', '488095209079439360', '110', '5000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
INSERT INTO `ck_user_withdraw` VALUES ('494631662022295552', '488095209079439360', '110', '5000.00', '1', '0.00', '1', null, '农业银行', '4294967295', null, null, null, null, null, null);
