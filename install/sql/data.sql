/*
Navicat MySQL Data Transfer

Source Server         : 43.249.206.212
Source Server Version : 50722
Source Host           : 43.249.206.212:3306
Source Database       : ck_op_center

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2019-01-03 15:25:08
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_admin_log
-- ----------------------------
INSERT INTO `ck_admin_log` VALUES ('1', '1', 'user/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\User [ {{%user}} ]  {{%CREATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>会员ID(id) => 1,<br>会员账号(username) => 8888,<br>会员昵称(nickname) => ,<br>真实姓名(realname) => ,<br>身份证号(id_card) => ,<br>是否实名（0：未实名，1：已实名）(id_card_status) => ,<br>手机号(mobile) => ,<br>微信号(wechat) => ,<br>QQ号(qq) => ,<br>设备ID(deviceid) => 1,<br>注册时IP(ip) => 113.111.115.159,<br>接口令牌(api_token) => ,<br>cookie验证auth_key(auth_key) => k3DGTi3IeNODQXg6EwZGGbGABqR-Oy3U,<br>加密后密码(password_hash) => $2y$13$BcmsNnnFFMg7IVEgoxXHLe/ImBr0ZlyV7putEyM24lvUb2hvul68i,<br>支付密码(password_pay) => ,<br>找回密码token(password_reset_token) => ,<br>用户邮箱(email) => ,<br>用户头像url(avatar) => ,<br>来源(origin) => backend,<br>在线状态(online_status) => ,<br>会员状态(status) => 1,<br>洗码方案(xima_plan_id) => ,<br>所属代理(invite_agent_id) => 1,<br>邀请用户ID(invite_user_id) => ,<br>注册日期(created_at) => 1546482044,<br>最后修改时间(updated_at) => 1546482044', '1546482044', '1546482044');
INSERT INTO `ck_admin_log` VALUES ('2', '1', 'user/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} common\\models\\UserAccount [ {{%user_account}} ]  {{%CREATED%}}  {{%RECORD%}}: <br>会员编号(user_id) => 1,<br>可用余额(¥)(available_amount) => ,<br>冻结金额(¥)(frozen_amount) => ,<br>会员积分(user_point) => ,<br>洗码值(¥)(xima_amount) => ,<br>累计洗码值(¥)(total_xima_amount) => ,<br>未审核取款额度(¥)(frozen_withdraw_amount) => ,<br>更新日期(updated_at) => 1546482044,<br>创建日期(created_at) => 1546482044', '1546482044', '1546482044');
INSERT INTO `ck_admin_log` VALUES ('3', '1', 'user/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} common\\models\\UserStat [ {{%user_stat}} ]  {{%CREATED%}}  {{%RECORD%}}: <br>会员编号(user_id) => 1,<br>最后登录时间(last_login_at) => ,<br>最后登出时间(last_logout_at) => ,<br>登录次数(login_number) => ,<br>关联账号数(relate_number) => ,<br>登录IP(last_login_ip) => ,<br>登录日志ID(log_id) => ,<br>累计在线时长(online_duration) => ,<br>存款次数(deposit_number) => ,<br>存款总额(¥)(deposit_amount) => ,<br>取款次数(withdrawal_number) => ,<br>取款总额(¥)(withdrawal_amount) => ,<br>投注次数(bet_number) => ,<br>投注总额(¥)(bet_amount) => ,<br>Created At(created_at) => 1546482044,<br>Updated At(updated_at) => 1546482044', '1546482044', '1546482044');
INSERT INTO `ck_admin_log` VALUES ('4', '1', 'user/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} common\\models\\Daily [ {{%daily}} ]  {{%CREATED%}}  {{%RECORD%}}: <br>日期(ymd) => 20190103,<br>新增用户(dnu) => 1,<br>活跃用户(dau) => ,<br>首存用户数(ndu) => ,<br>首存额度(¥)(nda) => ,<br>投注用户数(dbu) => ,<br>Dbo(dbo) => ,<br>投注额度(¥)(dba) => ,<br>存款用户数(ddu) => ,<br>存款额度(¥)(dda) => ,<br>取款用户数(dwu) => ,<br>取款额度(¥)(dwa) => ,<br>赢额度(¥)(dpa) => ,<br>输额度(¥)(dla) => ,<br>洗码值(¥)(dxm) => ', '1546482044', '1546482044');
INSERT INTO `ck_admin_log` VALUES ('5', '1', 'user/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} common\\models\\AgentDaily [ {{%agent_daily}} ]  {{%CREATED%}}  {{%RECORD%}}: <br>日期(ymd) => 20190103,<br>代理ID(agent_id) => 1,<br>新增用户(dnu) => 1,<br>活跃用户(dau) => ,<br>首存用户数(ndu) => ,<br>首存额度(¥)(nda) => ,<br>投注用户数(dbu) => ,<br>投注单数(dbo) => ,<br>投注额度(¥)(dba) => ,<br>存款用户数(ddu) => ,<br>存款额度(¥)(dda) => ,<br>取款用户数(dwu) => ,<br>取款额度(¥)(dwa) => ,<br>赢额度(¥)(dpa) => ,<br>输额度(¥)(dla) => ,<br>洗码值(¥)(dxm) => ,<br>新增代理(dna) => ', '1546482044', '1546482044');
INSERT INTO `ck_admin_log` VALUES ('6', '1', 'agent/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Agent [ {{%agent}} ]  {{%CREATED%}} {{%ID%}} 71 {{%RECORD%}}: <br>代理id(id) => 71,<br>代理账号(username) => system,<br>Password Hash(password_hash) => $2y$13$NgewzZN6N5s5fLdnSdBo5err5UTdVfwMj6/TvKKjsLCdJLLLt8zeS,<br>管理员cookie验证auth_key(auth_key) => kWKNhWE9eX7bU-AR3B_XGvMjxrFUr02f,<br>管理员找回密码token(password_reset_token) => ,<br>真实姓名(realname) => ,<br>身份证号(id_card) => ,<br>是否实名（0：未实名，1：已实名）(id_card_status) => ,<br>邮箱(email) => ,<br>手机号码(mobile) => ,<br>微信(wechat) => ,<br>QQ号(qq) => ,<br>头像(avatar) => ,<br>推广码(promo_code) => 12347,<br>上层账号(parent_id) => ,<br>总代账号(top_id) => ,<br>下级代理权限(sub_permission) => ,<br>代理层级(agent_level) => 1,<br>洗码方案(xima_plan_id) => ,<br>返佣方案(rebate_plan_id) => ,<br>预设玩家层级(default_player_level) => ,<br>创建渠道(reg_from) => ,<br>注册IP(reg_ip) => ,<br>状态(status) => 1,<br>备注(memo) => ,<br>注册日期(created_at) => 1546494495,<br>修改日期(updated_at) => 1546494495', '1546494496', '1546494496');
INSERT INTO `ck_admin_log` VALUES ('7', '1', 'agent/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} common\\models\\AgentAccount [ {{%agent_account}} ]  {{%CREATED%}}  {{%RECORD%}}: <br>代理ID(agent_id) => 71,<br>代理账号(agent_name) => ,<br>可用余额(¥)(available_amount) => ,<br>累计收入(¥)(total_amount) => ,<br>冻结金额(¥)(frozen_amount) => ,<br>累计洗码值(¥)(total_xima_amount) => ,<br>洗码值(¥)(xima_amount) => ,<br>Bet Amount(bet_amount) => ,<br>更新日期(updated_at) => ,<br>创建日期(created_at) => ', '1546494496', '1546494496');

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
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '管理员邮箱',
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '管理员头像url',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '管理员状态,10正常',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_admin_user
-- ----------------------------
INSERT INTO `ck_admin_user` VALUES ('1', 'admin', 'zr9mY7lt23oAhj_ZYjydbLJKcbE3FJ19', '$2y$13$Pb3T4p.60G4thpGeHUp1t.YHtFueX6GSrwLTTFh92CpO94TU9xu8q', null, 'admin@feehi.com', 'D:\\www\\ckAdmin/backend/web/admin/uploads/avatar/20181228105627_5c2590dbcdff6.png', '10', '1468288038', '1545965827');
INSERT INTO `ck_admin_user` VALUES ('2', 'caiwu001', 'nA1LwIgfjUloPRIxycPal_8BV38dUew6', '$2y$13$m7jcLc1AXm5ye2psfn0LwOhDkLzlE9wQCzJsGYU6sdilBT3pL9/4W', null, 'caiwu001@onetop.pw', '', '10', '1544782353', '1544782353');
INSERT INTO `ck_admin_user` VALUES ('3', 'caiwu002', 'gPBvw9yh6bFPAXl59CdSrvM0jueWxM2H', '$2y$13$MEvpH1/QLVP9WUq7FX9Duen.f3JhcrIZbUVcHGzZx8wyRmDQhM2Xy', null, 'caiwu002@onetop.pw', '', '10', '1544783685', '1544783685');
INSERT INTO `ck_admin_user` VALUES ('4', 'caiwu003', 'GVmGfFUyLcwohI6FoWPQjbnlJcGokdqh', '$2y$13$1KdrauRajFEr87/1Gr88BuVUAPHAhYqd7/yXP41vmRinFOea0pRH2', null, 'caiwu003@onetop.pw', '', '10', '1544783710', '1544783710');
INSERT INTO `ck_admin_user` VALUES ('5', 'yunying001', 'ZcOD8UOUG1Vw4wUU98o8WnV13eLQ1Cph', '$2y$13$X3DJkZ8Yywv410llLXcXSe4o.TGsj1KS.pcZMuwEmMw6Qfth0f.sa', null, 'yunying001@onetop.pw', '', '10', '1544783754', '1544783754');
INSERT INTO `ck_admin_user` VALUES ('6', 'yunying002', 'RlOUObETKH3PZrNAQwHEu3DR9-not532', '$2y$13$K5n.COcDDzfxtCZulZdPOu3FG0530ufpmAtrG6nUKc7QsXKsyNK9G', null, 'yunying002@onetop.pw', '', '10', '1544783795', '1544783795');
INSERT INTO `ck_admin_user` VALUES ('7', 'yunying003', '5OER_-Ip5VVeCE99hIOgIVzWA0ek5ZMl', '$2y$13$Kq31/iklYy9Kswxx1padHOw8O2p18hZsJt1gj.Nu6KCVfJrheIW4C', null, 'yunying003@onetop.pw', '', '10', '1544783817', '1544783817');

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
  `id_card` varchar(20) DEFAULT NULL COMMENT '身份证号',
  `id_card_status` tinyint(1) DEFAULT '0' COMMENT '是否实名（0：未实名，1：已实名）',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `mobile` varchar(32) DEFAULT NULL COMMENT '手机号码',
  `wechat` varchar(50) DEFAULT NULL COMMENT '微信',
  `qq` varchar(20) DEFAULT NULL COMMENT 'QQ号',
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `promo_code` int(32) unsigned NOT NULL COMMENT '推广码',
  `parent_id` int(11) DEFAULT '0' COMMENT '上层账号',
  `top_id` int(11) DEFAULT '0' COMMENT '总代账号',
  `sub_permission` tinyint(3) unsigned DEFAULT '1' COMMENT '是否允许发展下级代理 1 允许 0 禁止',
  `agent_level` tinyint(3) unsigned DEFAULT NULL COMMENT '代理层级',
  `xima_plan_id` int(10) unsigned DEFAULT NULL COMMENT '洗码方案ID',
  `rebate_plan_id` int(10) unsigned DEFAULT NULL COMMENT '返佣方案ID',
  `default_player_level` tinyint(3) unsigned DEFAULT NULL COMMENT '预设玩家层级',
  `reg_from` varchar(32) DEFAULT NULL COMMENT '创建渠道',
  `reg_ip` varchar(32) DEFAULT NULL COMMENT '注册IP',
  `status` tinyint(4) unsigned DEFAULT '1' COMMENT '状态 1：正常 2：冻结 3：锁定 4：注销',
  `memo` varchar(255) DEFAULT NULL COMMENT '备注',
  `created_at` bigint(20) DEFAULT NULL COMMENT '创建日期',
  `updated_at` bigint(20) DEFAULT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_account` (`username`),
  UNIQUE KEY `idx_promo_code` (`promo_code`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COMMENT='代理表';

-- ----------------------------
-- Records of ck_agent
-- ----------------------------
INSERT INTO `ck_agent` VALUES ('1', 'agent', '$2y$13$V/GLF2Ypa5kmbqxvzh5zdOEBSk.BeIzITZ9hNI.C.UO1MxBAYFi02', 'zr9mY7lt23oAhj_ZYjydbLJKcbE3FJ19', null, '顶级代理', null, '0', null, null, null, null, null, '12346', '0', '1', '1', '1', null, null, null, null, null, '1', null, null, '1546219950');
INSERT INTO `ck_agent` VALUES ('71', 'system', '$2y$13$NgewzZN6N5s5fLdnSdBo5err5UTdVfwMj6/TvKKjsLCdJLLLt8zeS', 'kWKNhWE9eX7bU-AR3B_XGvMjxrFUr02f', null, '', null, '0', null, null, null, null, null, '12347', null, '0', '1', '1', null, null, null, null, null, '1', null, '1546494495', '1546494495');

-- ----------------------------
-- Table structure for `ck_agent_account`
-- ----------------------------
DROP TABLE IF EXISTS `ck_agent_account`;
CREATE TABLE `ck_agent_account` (
  `agent_id` int(10) unsigned NOT NULL COMMENT '代理ID',
  `agent_name` varchar(64) DEFAULT NULL COMMENT '代理账号',
  `available_amount` decimal(19,4) DEFAULT '0.0000' COMMENT '可用余额',
  `total_amount` decimal(19,4) unsigned DEFAULT '0.0000' COMMENT '累计额度',
  `frozen_amount` decimal(19,4) DEFAULT '0.0000' COMMENT '冻结金额',
  `total_xima_amount` decimal(19,4) unsigned DEFAULT '0.0000' COMMENT '累计洗码值',
  `xima_amount` decimal(19,4) DEFAULT '0.0000' COMMENT '可用洗码值',
  `bet_amount` decimal(19,4) unsigned DEFAULT '0.0000' COMMENT '累计用户投注额度',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`agent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_agent_account
-- ----------------------------
INSERT INTO `ck_agent_account` VALUES ('1', null, '769.7000', '440.0000', '500.0000', null, '0.0000', '8800.0000', null, null);
INSERT INTO `ck_agent_account` VALUES ('71', null, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', null, null);

-- ----------------------------
-- Table structure for `ck_agent_account_record`
-- ----------------------------
DROP TABLE IF EXISTS `ck_agent_account_record`;
CREATE TABLE `ck_agent_account_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '代理账户变更记录ID',
  `agent_id` int(10) unsigned NOT NULL COMMENT '代理ID',
  `trade_no` varchar(32) DEFAULT NULL COMMENT '交易编号',
  `trade_type_id` int(10) unsigned DEFAULT '0' COMMENT '交易类型ID',
  `name` varchar(255) DEFAULT NULL COMMENT '变更名称',
  `amount` decimal(19,4) DEFAULT NULL COMMENT '变更额度',
  `switch` tinyint(3) unsigned DEFAULT NULL COMMENT '收支 1 收入 2支出',
  `after_amount` decimal(19,4) DEFAULT NULL COMMENT '变更后余额',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_agent_account_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_agent_bank`
-- ----------------------------
DROP TABLE IF EXISTS `ck_agent_bank`;
CREATE TABLE `ck_agent_bank` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '银行账号ID',
  `agent_id` bigint(20) unsigned NOT NULL COMMENT '代理ID',
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='用户绑定银行账号表';

-- ----------------------------
-- Records of ck_agent_bank
-- ----------------------------
INSERT INTO `ck_agent_bank` VALUES ('1', '1', 'agent', '天涯', '6227001518320153259', '招商银行', '广东', '广州', '天河分行', '1', '1', '1544155964', '1544155964');
INSERT INTO `ck_agent_bank` VALUES ('2', '1', 'agent', '菇凉', '6228001518320165987', '交通银行', '北京', '北京', '王府井分行', '1', '1', '1544169767', '1544169767');
INSERT INTO `ck_agent_bank` VALUES ('3', '1', 'agent', '阿里', '6558001518320178955', '建设银行', '云南', '大理', '大理分行', '1', '1', '1544169852', '1544169852');

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
INSERT INTO `ck_agent_daily` VALUES ('20190103', '1', '2', '1', null, null, null, null, null, null, null, null, null, null, null, null, null);

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
-- Table structure for `ck_agent_withdraw`
-- ----------------------------
DROP TABLE IF EXISTS `ck_agent_withdraw`;
CREATE TABLE `ck_agent_withdraw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '取款单号',
  `agent_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '代理ID',
  `apply_amount` decimal(19,4) NOT NULL COMMENT '申请取款金额',
  `status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '取款状态 1 申请中 2 已完成  0 已取消',
  `transfer_amount` decimal(19,4) DEFAULT NULL COMMENT '实际转账金额',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `audit_by_id` int(11) unsigned DEFAULT NULL COMMENT '处理人员ID',
  `audit_by_username` varchar(64) DEFAULT NULL COMMENT '处理人员',
  `audit_remark` varchar(255) DEFAULT NULL COMMENT '处理备注',
  `audit_at` int(20) unsigned DEFAULT NULL COMMENT '处理时间',
  `agent_bank_id` int(10) unsigned DEFAULT NULL COMMENT '银行账号ID',
  `bank_name` varchar(64) DEFAULT NULL COMMENT '银行开户名',
  `bank_account` varchar(64) DEFAULT NULL COMMENT '银行账号',
  `apply_ip` varchar(64) DEFAULT NULL COMMENT '申请时登陆IP',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户取款记录表';

-- ----------------------------
-- Records of ck_agent_withdraw
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_agent_xima_record`
-- ----------------------------
DROP TABLE IF EXISTS `ck_agent_xima_record`;
CREATE TABLE `ck_agent_xima_record` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '交易ID',
  `agent_id` int(10) unsigned NOT NULL COMMENT '会员ID',
  `user_id` bigint(20) NOT NULL COMMENT '用户ID',
  `platform_id` int(11) NOT NULL COMMENT '平台ID',
  `game_type` varchar(64) NOT NULL COMMENT '游戏类型',
  `bet_id` bigint(20) NOT NULL COMMENT '投注记录ID',
  `record_id` varchar(32) DEFAULT NULL COMMENT '投注单号',
  `for_xm_amount` decimal(19,4) unsigned DEFAULT NULL COMMENT '用于洗码额度',
  `bet_amount` decimal(19,4) unsigned NOT NULL DEFAULT '0.0000' COMMENT '投注金额',
  `profit` decimal(19,4) DEFAULT NULL COMMENT '赢输',
  `xima_type` tinyint(3) unsigned DEFAULT NULL COMMENT '洗码类型 1单边 2双边',
  `xima_rate` decimal(6,4) DEFAULT NULL COMMENT '洗码率',
  `xima_limit` decimal(12,4) unsigned DEFAULT NULL COMMENT '洗码上限',
  `xima_plan_id` int(10) unsigned DEFAULT NULL COMMENT '洗码方案',
  `sub_xima_rate` decimal(6,4) DEFAULT NULL COMMENT '下级洗码率',
  `xima_amount` decimal(12,4) DEFAULT NULL COMMENT '洗码值',
  `real_xima_amount` decimal(12,4) unsigned DEFAULT NULL COMMENT '实得洗码值',
  `sub_xima_amount` decimal(12,4) DEFAULT NULL COMMENT '下级洗码值',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`),
  KEY `user_id` (`agent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户账户变更记录表';

-- ----------------------------
-- Records of ck_agent_xima_record
-- ----------------------------

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
INSERT INTO `ck_auth_assignment` VALUES ('财务管理', '2', '1544782353');
INSERT INTO `ck_auth_assignment` VALUES ('财务管理', '3', '1544783685');
INSERT INTO `ck_auth_assignment` VALUES ('财务管理', '4', '1544783711');
INSERT INTO `ck_auth_assignment` VALUES ('运营管理', '5', '1544783754');
INSERT INTO `ck_auth_assignment` VALUES ('运营管理', '6', '1544783795');
INSERT INTO `ck_auth_assignment` VALUES ('运营管理', '7', '1544783817');

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
INSERT INTO `ck_auth_item` VALUES ('/admin-menu/create:POST', '2', '新增后台菜单', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313233222C2263617465676F7279223A225C75383364635C75353335355C75376261315C7537343036227D223B, '1544781369', '1544781500');
INSERT INTO `ck_auth_item` VALUES ('/admin-menu/delete:POST', '2', '删除后台菜单', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313235222C2263617465676F7279223A225C75383364635C75353335355C75376261315C7537343036227D223B, '1544781549', '1544781549');
INSERT INTO `ck_auth_item` VALUES ('/admin-menu/index:GET', '2', '查看后台菜单', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313232222C2263617465676F7279223A225C75383364635C75353335355C75376261315C7537343036227D223B, '1544781345', '1544781482');
INSERT INTO `ck_auth_item` VALUES ('/admin-menu/update:POST', '2', '编辑后台菜单', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313234222C2263617465676F7279223A225C75383364635C75353335355C75376261315C7537343036227D223B, '1544781526', '1544781526');
INSERT INTO `ck_auth_item` VALUES ('/admin-user/carete:POST', '2', '新增管理员', null, 0x733A39333A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313139222C2263617465676F7279223A225C75376261315C75373430365C75353435385C75376261315C7537343036227D223B, '1544781274', '1544781274');
INSERT INTO `ck_auth_item` VALUES ('/admin-user/delete:POST', '2', '删除管理员', null, 0x733A39333A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313231222C2263617465676F7279223A225C75376261315C75373430365C75353435385C75376261315C7537343036227D223B, '1544781315', '1544781315');
INSERT INTO `ck_auth_item` VALUES ('/admin-user/index:GET', '2', '管理员列表', null, 0x733A39333A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313138222C2263617465676F7279223A225C75376261315C75373430365C75353435385C75376261315C7537343036227D223B, '1544781232', '1544781232');
INSERT INTO `ck_auth_item` VALUES ('/admin-user/update:POST', '2', '编辑管理', null, 0x733A39333A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313230222C2263617465676F7279223A225C75376261315C75373430365C75353435385C75376261315C7537343036227D223B, '1544781294', '1544781294');
INSERT INTO `ck_auth_item` VALUES ('/agent-menu/create:POST', '2', '新增代理菜单', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313237222C2263617465676F7279223A225C75383364635C75353335355C75376261315C7537343036227D223B, '1544781595', '1544781595');
INSERT INTO `ck_auth_item` VALUES ('/agent-menu/delete:POST', '2', '删除代理菜单', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313239222C2263617465676F7279223A225C75383364635C75353335355C75376261315C7537343036227D223B, '1544781645', '1544781645');
INSERT INTO `ck_auth_item` VALUES ('/agent-menu/index:GET', '2', '查看代理菜单', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313236222C2263617465676F7279223A225C75383364635C75353335355C75376261315C7537343036227D223B, '1544781570', '1544781570');
INSERT INTO `ck_auth_item` VALUES ('/agent-menu/update:POST', '2', '编辑代理菜单', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313238222C2263617465676F7279223A225C75383364635C75353335355C75376261315C7537343036227D223B, '1544781626', '1544781626');
INSERT INTO `ck_auth_item` VALUES ('/agent-trade/index:GET', '2', '代理交易记录', null, 0x733A38363A227B2267726F7570223A225C75346565335C75373430365C75376261315C7537343036222C22736F7274223A223235222C2263617465676F7279223A225C75346561345C75363631335C75386262305C7535663535227D223B, '1544776382', '1544776382');
INSERT INTO `ck_auth_item` VALUES ('/agent-withdraw/audit:POST', '2', '审核代理取款申请', null, 0x733A39383A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223638222C2263617465676F7279223A225C75346565335C75373430365C75353364365C75366233655C75373533335C7538626637227D223B, '1544778821', '1544778821');
INSERT INTO `ck_auth_item` VALUES ('/agent-withdraw/index:GET', '2', '代理取款申请列表', null, 0x733A39383A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223636222C2263617465676F7279223A225C75346565335C75373430365C75353364365C75366233655C75373533335C7538626637227D223B, '1544778729', '1544778729');
INSERT INTO `ck_auth_item` VALUES ('/agent-withdraw/view-layer:GET', '2', '查看代理取款申请', null, 0x733A39383A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223637222C2263617465676F7279223A225C75346565335C75373430365C75353364365C75366233655C75373533335C7538626637227D223B, '1544778769', '1544778769');
INSERT INTO `ck_auth_item` VALUES ('/agent/create:POST', '2', '新增代理', null, 0x733A38363A227B2267726F7570223A225C75346565335C75373430365C75376261315C7537343036222C22736F7274223A223231222C2263617465676F7279223A225C75346565335C75373430365C75353231375C7538383638227D223B, '1544776153', '1544776265');
INSERT INTO `ck_auth_item` VALUES ('/agent/index:GET', '2', '代理列表', null, 0x733A38363A227B2267726F7570223A225C75346565335C75373430365C75376261315C7537343036222C22736F7274223A223230222C2263617465676F7279223A225C75346565335C75373430365C75353231375C7538383638227D223B, '1544775736', '1544776263');
INSERT INTO `ck_auth_item` VALUES ('/agent/update:POST', '2', '编辑代理', null, 0x733A38363A227B2267726F7570223A225C75346565335C75373430365C75376261315C7537343036222C22736F7274223A223232222C2263617465676F7279223A225C75346565335C75373430365C75353231375C7538383638227D223B, '1544776200', '1544776267');
INSERT INTO `ck_auth_item` VALUES ('/agent/view-layer:GET', '2', '查看代理', null, 0x733A38363A227B2267726F7570223A225C75346565335C75373430365C75376261315C7537343036222C22736F7274223A223233222C2263617465676F7279223A225C75346565335C75373430365C75353231375C7538383638227D223B, '1544776248', '1544776268');
INSERT INTO `ck_auth_item` VALUES ('/bank/create:POST', '2', '添加银行卡', null, 0x733A39323A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223532222C2263617465676F7279223A225C75393466365C75383834635C75353336315C75376261315C7537343036227D223B, '1544777656', '1544777656');
INSERT INTO `ck_auth_item` VALUES ('/bank/index:GET', '2', '银行卡列表', null, 0x733A39323A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223530222C2263617465676F7279223A225C75393466365C75383834635C75353336315C75376261315C7537343036227D223B, '1544777585', '1544777585');
INSERT INTO `ck_auth_item` VALUES ('/bank/update:POST', '2', '编辑银行卡', null, 0x733A39323A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223533222C2263617465676F7279223A225C75393466365C75383834635C75353336315C75376261315C7537343036227D223B, '1544777692', '1544777700');
INSERT INTO `ck_auth_item` VALUES ('/bank/view-layer:GET', '2', '查看银行卡', null, 0x733A39323A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223531222C2263617465676F7279223A225C75393466365C75383834635C75353336315C75376261315C7537343036227D223B, '1544777628', '1544777628');
INSERT INTO `ck_auth_item` VALUES ('/barcode/create:POST', '2', '新增二维码', null, 0x733A39323A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223536222C2263617465676F7279223A225C75346538635C75376566345C75373830315C75376261315C7537343036227D223B, '1544777959', '1544778071');
INSERT INTO `ck_auth_item` VALUES ('/barcode/delete:POST', '2', '删除二维码', null, 0x733A39323A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223538222C2263617465676F7279223A225C75346538635C75376566345C75373830315C75376261315C7537343036227D223B, '1544778131', '1544778131');
INSERT INTO `ck_auth_item` VALUES ('/barcode/index:GET', '2', '二维码列表', null, 0x733A39323A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223534222C2263617465676F7279223A225C75346538635C75376566345C75373830315C75376261315C7537343036227D223B, '1544777780', '1544777780');
INSERT INTO `ck_auth_item` VALUES ('/barcode/update:POST', '2', '编辑二维码', null, 0x733A39323A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223537222C2263617465676F7279223A225C75346538635C75376566345C75373830315C75376261315C7537343036227D223B, '1544778100', '1544778100');
INSERT INTO `ck_auth_item` VALUES ('/barcode/view-layer:GET', '2', '查看二维码', null, 0x733A39323A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223535222C2263617465676F7279223A225C75346538635C75376566345C75373830315C75376261315C7537343036227D223B, '1544777921', '1544777929');
INSERT INTO `ck_auth_item` VALUES ('/change-amount/audit:POST', '2', '审核上下分申请', null, 0x733A39323A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223730222C2263617465676F7279223A225C75346530615C75346530625C75353230365C75356261315C7536383338227D223B, '1544779103', '1544779103');
INSERT INTO `ck_auth_item` VALUES ('/change-amount/index:GET', '2', '查看上下分记录', null, 0x733A39323A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223639222C2263617465676F7279223A225C75346530615C75346530625C75353230365C75356261315C7536383338227D223B, '1544778896', '1544778904');
INSERT INTO `ck_auth_item` VALUES ('/deposit/audit:POST', '2', '审核存款申请', null, 0x733A38363A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223633222C2263617465676F7279223A225C75356235385C75366233655C75356261315C7536383338227D223B, '1544778471', '1544778488');
INSERT INTO `ck_auth_item` VALUES ('/deposit/index:GET', '2', '存款申请列表', null, 0x733A38363A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223631222C2263617465676F7279223A225C75356235385C75366233655C75356261315C7536383338227D223B, '1544778356', '1544778665');
INSERT INTO `ck_auth_item` VALUES ('/deposit/view-layer:GET', '2', '查看存款申请', null, 0x733A38363A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223632222C2263617465676F7279223A225C75356235385C75366233655C75356261315C7536383338227D223B, '1544778408', '1544778649');
INSERT INTO `ck_auth_item` VALUES ('/game-type/create:POST', '2', '新增游戏类型', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223334222C2263617465676F7279223A225C75366533385C75363230665C75376337625C7535373862227D223B, '1544777030', '1544777030');
INSERT INTO `ck_auth_item` VALUES ('/game-type/delete:POST', '2', '删除游戏类型', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223336222C2263617465676F7279223A225C75366533385C75363230665C75376337625C7535373862227D223B, '1544777087', '1544777087');
INSERT INTO `ck_auth_item` VALUES ('/game-type/index:GET', '2', '游戏类型列表', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223333222C2263617465676F7279223A225C75366533385C75363230665C75376337625C7535373862227D223B, '1544776649', '1544776999');
INSERT INTO `ck_auth_item` VALUES ('/game-type/update:POST', '2', '编辑游戏类型', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223335222C2263617465676F7279223A225C75366533385C75363230665C75376337625C7535373862227D223B, '1544777064', '1544777064');
INSERT INTO `ck_auth_item` VALUES ('/log/delete:POST', '2', '删除日志', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313336222C2263617465676F7279223A225C75363565355C75356664375C75376261315C7537343036227D223B, '1544781914', '1544781914');
INSERT INTO `ck_auth_item` VALUES ('/log/index:GET', '2', '日志列表', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313334222C2263617465676F7279223A225C75363565355C75356664375C75376261315C7537343036227D223B, '1544781855', '1544781855');
INSERT INTO `ck_auth_item` VALUES ('/log/view-layer:GET', '2', '查看日志', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313335222C2263617465676F7279223A225C75363565355C75356664375C75376261315C7537343036227D223B, '1544781874', '1544781874');
INSERT INTO `ck_auth_item` VALUES ('/message/delete:POST', '2', '删除消息', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223430222C2263617465676F7279223A225C75376164395C75353138355C75366438385C7536303666227D223B, '1544777276', '1544777276');
INSERT INTO `ck_auth_item` VALUES ('/message/group:POST', '2', '群发消息', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223338222C2263617465676F7279223A225C75376164395C75353138355C75366438385C7536303666227D223B, '1544777208', '1544777208');
INSERT INTO `ck_auth_item` VALUES ('/message/index:GET', '2', '消息列表', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223337222C2263617465676F7279223A225C75376164395C75353138355C75366438385C7536303666227D223B, '1544777143', '1544777143');
INSERT INTO `ck_auth_item` VALUES ('/message/view-layer:GET', '2', '查看消息', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223339222C2263617465676F7279223A225C75376164395C75353138355C75366438385C7536303666227D223B, '1544777251', '1544777251');
INSERT INTO `ck_auth_item` VALUES ('/notice/create:POST', '2', '发布公告', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223433222C2263617465676F7279223A225C75376366625C75376564665C75353136635C7535343461227D223B, '1544777493', '1544777493');
INSERT INTO `ck_auth_item` VALUES ('/notice/delete:POST', '2', '删除公告', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223434222C2263617465676F7279223A225C75376366625C75376564665C75353136635C7535343461227D223B, '1544777521', '1544777521');
INSERT INTO `ck_auth_item` VALUES ('/notice/index:GET', '2', '公告列表', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223431222C2263617465676F7279223A225C75376366625C75376564665C75353136635C7535343461227D223B, '1544777426', '1544777433');
INSERT INTO `ck_auth_item` VALUES ('/notice/view-layer:GET', '2', '查看公告', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223432222C2263617465676F7279223A225C75376366625C75376564665C75353136635C7535343461227D223B, '1544777470', '1544777470');
INSERT INTO `ck_auth_item` VALUES ('/platform/amount:GET', '2', '平台资金列表', null, 0x733A38363A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223539222C2263617465676F7279223A225C75356537335C75353366305C75386434345C7539316431227D223B, '1544778248', '1544778248');
INSERT INTO `ck_auth_item` VALUES ('/platform/change-amount:POST', '2', '平台资金调整', null, 0x733A38363A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223630222C2263617465676F7279223A225C75356537335C75353366305C75386434345C7539316431227D223B, '1544778305', '1544778305');
INSERT INTO `ck_auth_item` VALUES ('/platform/create:POST', '2', '新增平台', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223331222C2263617465676F7279223A225C75366533385C75363230665C75356537335C7535336630227D223B, '1544776534', '1544776534');
INSERT INTO `ck_auth_item` VALUES ('/platform/index:GET', '2', '游戏平台列表', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223330222C2263617465676F7279223A225C75366533385C75363230665C75356537335C7535336630227D223B, '1544776447', '1544776447');
INSERT INTO `ck_auth_item` VALUES ('/platform/update:POST', '2', '编辑游戏平台', null, 0x733A38363A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A223332222C2263617465676F7279223A225C75366533385C75363230665C75356537335C7535336630227D223B, '1544776571', '1544776571');
INSERT INTO `ck_auth_item` VALUES ('/rbac/permission-create:POST', '2', '创建权限', null, 0x733A39333A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313131222C2263617465676F7279223A225C75376261315C75373430365C75353435385C75376261315C7537343036227D223B, '1544780689', '1544781045');
INSERT INTO `ck_auth_item` VALUES ('/rbac/permission-delete:POST', '2', '删除权限', null, 0x733A39333A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313133222C2263617465676F7279223A225C75376261315C75373430365C75353435385C75376261315C7537343036227D223B, '1544780750', '1544781019');
INSERT INTO `ck_auth_item` VALUES ('/rbac/permission-update:POST', '2', '编辑权限', null, 0x733A39333A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313132222C2263617465676F7279223A225C75376261315C75373430365C75353435385C75376261315C7537343036227D223B, '1544779988', '1544781031');
INSERT INTO `ck_auth_item` VALUES ('/rbac/permissions:GET', '2', '查看权限列表', null, 0x733A39333A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313130222C2263617465676F7279223A225C75376261315C75373430365C75353435385C75376261315C7537343036227D223B, '1544779930', '1544781060');
INSERT INTO `ck_auth_item` VALUES ('/rbac/role-create:POST', '2', '创建角色', null, 0x733A39333A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313135222C2263617465676F7279223A225C75376261315C75373430365C75353435385C75376261315C7537343036227D223B, '1544780828', '1544780992');
INSERT INTO `ck_auth_item` VALUES ('/rbac/role-delete:POST', '2', '删除角色', null, 0x733A39333A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313137222C2263617465676F7279223A225C75376261315C75373430365C75353435385C75376261315C7537343036227D223B, '1544780960', '1544780960');
INSERT INTO `ck_auth_item` VALUES ('/rbac/role-update:POST', '2', '编辑角色', null, 0x733A39333A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313136222C2263617465676F7279223A225C75376261315C75373430365C75353435385C75376261315C7537343036227D223B, '1544780928', '1544780980');
INSERT INTO `ck_auth_item` VALUES ('/rbac/roles:GET', '2', '角色列表', null, 0x733A39333A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313134222C2263617465676F7279223A225C75376261315C75373430365C75353435385C75376261315C7537343036227D223B, '1544780798', '1544781007');
INSERT INTO `ck_auth_item` VALUES ('/rebate/index:GET', '2', '代理佣金记录', null, 0x733A38363A227B2267726F7570223A225C75346565335C75373430365C75376261315C7537343036222C22736F7274223A223234222C2263617465676F7279223A225C75346565335C75373430365C75346636335C7539316431227D223B, '1544776343', '1544776351');
INSERT INTO `ck_auth_item` VALUES ('/report/agent-trade:GET', '2', '代理交易报表', null, 0x733A39383A227B2267726F7570223A225C75376564665C75386261315C75363261355C7538383638222C22736F7274223A223836222C2263617465676F7279223A225C75346565335C75373430365C75346561345C75363631335C75363261355C7538383638227D223B, '1544779352', '1544779352');
INSERT INTO `ck_auth_item` VALUES ('/report/agent-xima:GET', '2', '代理洗码报表', null, 0x733A39383A227B2267726F7570223A225C75376564665C75386261315C75363261355C7538383638222C22736F7274223A223839222C2263617465676F7279223A225C75346565335C75373430365C75366431375C75373830315C75363261355C7538383638227D223B, '1544779454', '1544779454');
INSERT INTO `ck_auth_item` VALUES ('/report/bet:GET', '2', '投注报表', null, 0x733A38363A227B2267726F7570223A225C75376564665C75386261315C75363261355C7538383638222C22736F7274223A223833222C2263617465676F7279223A225C75363239355C75366365385C75363261355C7538383638227D223B, '1544779253', '1544779253');
INSERT INTO `ck_auth_item` VALUES ('/report/platform-trade:GET', '2', '平台交易报表', null, 0x733A39383A227B2267726F7570223A225C75376564665C75386261315C75363261355C7538383638222C22736F7274223A223835222C2263617465676F7279223A225C75356537335C75353366305C75346561345C75363631335C75363261355C7538383638227D223B, '1544779321', '1544779321');
INSERT INTO `ck_auth_item` VALUES ('/report/rebate:GET', '2', '返佣报表', null, 0x733A38363A227B2267726F7570223A225C75376564665C75386261315C75363261355C7538383638222C22736F7274223A223930222C2263617465676F7279223A225C75386664345C75346636335C75363261355C7538383638227D223B, '1544779488', '1544779488');
INSERT INTO `ck_auth_item` VALUES ('/report/system-trade:GET', '2', '系统交易报表', null, 0x733A39383A227B2267726F7570223A225C75376564665C75386261315C75363261355C7538383638222C22736F7274223A223834222C2263617465676F7279223A225C75376366625C75376564665C75346561345C75363631335C75363261355C7538383638227D223B, '1544779290', '1544779290');
INSERT INTO `ck_auth_item` VALUES ('/report/user-trade:GET', '2', '用户交易报表', null, 0x733A39383A227B2267726F7570223A225C75376564665C75386261315C75363261355C7538383638222C22736F7274223A223837222C2263617465676F7279223A225C75373532385C75363233375C75346561345C75363631335C75363261355C7538383638227D223B, '1544779387', '1544779387');
INSERT INTO `ck_auth_item` VALUES ('/report/user-xima:GET', '2', '用户洗码报表', null, 0x733A39383A227B2267726F7570223A225C75376564665C75386261315C75363261355C7538383638222C22736F7274223A223838222C2263617465676F7279223A225C75373532385C75363233375C75366431375C75373830315C75363261355C7538383638227D223B, '1544779420', '1544779420');
INSERT INTO `ck_auth_item` VALUES ('/setting/agent:GET', '2', '查看代理设置', null, 0x733A38373A227B2267726F7570223A225C75356537335C75353366305C75386262655C7537663665222C22736F7274223A22313032222C2263617465676F7279223A225C75346565335C75373430365C75386262655C7537663665227D223B, '1544779657', '1544779657');
INSERT INTO `ck_auth_item` VALUES ('/setting/agent:POST', '2', '变更代理设置', null, 0x733A38373A227B2267726F7570223A225C75356537335C75353366305C75386262655C7537663665222C22736F7274223A22313033222C2263617465676F7279223A225C75346565335C75373430365C75386262655C7537663665227D223B, '1544779682', '1544779682');
INSERT INTO `ck_auth_item` VALUES ('/setting/finance:GET', '2', '查看财务设置', null, 0x733A38373A227B2267726F7570223A225C75356537335C75353366305C75386262655C7537663665222C22736F7274223A22313036222C2263617465676F7279223A225C75386432325C75353261315C75386262655C7537663665227D223B, '1544779763', '1544779763');
INSERT INTO `ck_auth_item` VALUES ('/setting/finance:POST', '2', '变更财务设置', null, 0x733A38373A227B2267726F7570223A225C75356537335C75353366305C75386262655C7537663665222C22736F7274223A22313036222C2263617465676F7279223A225C75386432325C75353261315C75386262655C7537663665227D223B, '1544779800', '1544782128');
INSERT INTO `ck_auth_item` VALUES ('/setting/game:GET', '2', '查看游戏设置', null, 0x733A38373A227B2267726F7570223A225C75356537335C75353366305C75386262655C7537663665222C22736F7274223A22313034222C2263617465676F7279223A225C75366533385C75363230665C75386262655C7537663665227D223B, '1544779705', '1544779705');
INSERT INTO `ck_auth_item` VALUES ('/setting/game:POST', '2', '变更游戏设置', null, 0x733A38373A227B2267726F7570223A225C75356537335C75353366305C75386262655C7537663665222C22736F7274223A22313035222C2263617465676F7279223A225C75366533385C75363230665C75386262655C7537663665227D223B, '1544779730', '1544779730');
INSERT INTO `ck_auth_item` VALUES ('/setting/smtp:GET', '2', '查看邮件设置', null, 0x733A38373A227B2267726F7570223A225C75356537335C75353366305C75386262655C7537663665222C22736F7274223A22313037222C2263617465676F7279223A225C75393061655C75346566365C75386262655C7537663665227D223B, '1544779829', '1544779829');
INSERT INTO `ck_auth_item` VALUES ('/setting/smtp:POST', '2', '变更邮件设置', null, 0x733A38373A227B2267726F7570223A225C75356537335C75353366305C75386262655C7537663665222C22736F7274223A22313038222C2263617465676F7279223A225C75393061655C75346566365C75386262655C7537663665227D223B, '1544779857', '1544779857');
INSERT INTO `ck_auth_item` VALUES ('/setting/website:GET', '2', '查看网址设置', null, 0x733A38373A227B2267726F7570223A225C75356537335C75353366305C75386262655C7537663665222C22736F7274223A22313030222C2263617465676F7279223A225C75376635315C75376164395C75386262655C7537663665227D223B, '1544779553', '1544779553');
INSERT INTO `ck_auth_item` VALUES ('/setting/website:POST', '2', '变更网站设置', null, 0x733A38373A227B2267726F7570223A225C75356537335C75353366305C75386262655C7537663665222C22736F7274223A22313031222C2263617465676F7279223A225C75376635315C75376164395C75386262655C7537663665227D223B, '1544779595', '1544779595');
INSERT INTO `ck_auth_item` VALUES ('/stat/agent:GET', '2', '代理日报', null, 0x733A38363A227B2267726F7570223A225C75376564665C75386261315C75363261355C7538383638222C22736F7274223A223832222C2263617465676F7279223A225C75346565335C75373430365C75363565355C7536326135227D223B, '1544779221', '1544779221');
INSERT INTO `ck_auth_item` VALUES ('/stat/daily:GET', '2', '系统日报', null, 0x733A38363A227B2267726F7570223A225C75376564665C75386261315C75363261355C7538383638222C22736F7274223A223830222C2263617465676F7279223A225C75376366625C75376564665C75363565355C7536326135227D223B, '1544779169', '1544779169');
INSERT INTO `ck_auth_item` VALUES ('/stat/platform:GET', '2', '平台日报', null, 0x733A38363A227B2267726F7570223A225C75376564665C75386261315C75363261355C7538383638222C22736F7274223A223830222C2263617465676F7279223A225C75356537335C75353366305C75363565355C7536326135227D223B, '1544779194', '1544779194');
INSERT INTO `ck_auth_item` VALUES ('/task/create:POST', '2', '新增计划任务', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313331222C2263617465676F7279223A225C75386261315C75353231325C75346566625C7535326131227D223B, '1544781747', '1544781747');
INSERT INTO `ck_auth_item` VALUES ('/task/delete:POST', '2', '删除计划任务', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313333222C2263617465676F7279223A225C75386261315C75353231325C75346566625C7535326131227D223B, '1544781817', '1544781817');
INSERT INTO `ck_auth_item` VALUES ('/task/index:GET', '2', '计划任务列表', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313330222C2263617465676F7279223A225C75386261315C75353231325C75346566625C7535326131227D223B, '1544781710', '1544781710');
INSERT INTO `ck_auth_item` VALUES ('/task/update:POST', '2', '编辑计划任务', null, 0x733A38373A227B2267726F7570223A225C75376366625C75376564665C75376261315C7537343036222C22736F7274223A22313332222C2263617465676F7279223A225C75386261315C75353231325C75346566625C7535326131227D223B, '1544781783', '1544781783');
INSERT INTO `ck_auth_item` VALUES ('/user/bet-list:GET', '2', '会员投注记录', null, 0x733A38353A227B2267726F7570223A225C75346631615C75353435385C75376261315C7537343036222C22736F7274223A2236222C2263617465676F7279223A225C75346631615C75353435385C75353231375C7538383638227D223B, '1543893844', '1544775972');
INSERT INTO `ck_auth_item` VALUES ('/user/change-amout:POST', '2', '会员上下分', null, 0x733A38353A227B2267726F7570223A225C75346631615C75353435385C75376261315C7537343036222C22736F7274223A2235222C2263617465676F7279223A225C75346631615C75353435385C75353231375C7538383638227D223B, '1543891611', '1544775957');
INSERT INTO `ck_auth_item` VALUES ('/user/create:POST', '2', '新增会员', null, 0x733A38353A227B2267726F7570223A225C75346631615C75353435385C75376261315C7537343036222C22736F7274223A2232222C2263617465676F7279223A225C75346631615C75353435385C75353231375C7538383638227D223B, '1543891204', '1544775914');
INSERT INTO `ck_auth_item` VALUES ('/user/deposit-list:GET', '2', '会员存款记录', null, 0x733A38353A227B2267726F7570223A225C75346631615C75353435385C75376261315C7537343036222C22736F7274223A2238222C2263617465676F7279223A225C75346631615C75353435385C75353231375C7538383638227D223B, '1543893999', '1544775995');
INSERT INTO `ck_auth_item` VALUES ('/user/index:GET', '2', '会员列表', null, 0x733A38353A227B2267726F7570223A225C75346631615C75353435385C75376261315C7537343036222C22736F7274223A2231222C2263617465676F7279223A225C75346631615C75353435385C75353231375C7538383638227D223B, '1543891177', '1544775897');
INSERT INTO `ck_auth_item` VALUES ('/user/log-list:GET', '2', '会员登录日志', null, 0x733A38363A227B2267726F7570223A225C75346631615C75353435385C75376261315C7537343036222C22736F7274223A223130222C2263617465676F7279223A225C75346631615C75353435385C75353231375C7538383638227D223B, '1543894354', '1544776016');
INSERT INTO `ck_auth_item` VALUES ('/user/online:GET', '2', '在线会员', null, 0x733A38363A227B2267726F7570223A225C75346631615C75353435385C75376261315C7537343036222C22736F7274223A223133222C2263617465676F7279223A225C75353732385C75376562665C75346631615C7535343538227D223B, '1544775621', '1544776073');
INSERT INTO `ck_auth_item` VALUES ('/user/report:GET', '2', '会员报表', null, 0x733A38353A227B2267726F7570223A225C75346631615C75353435385C75376261315C7537343036222C22736F7274223A2233222C2263617465676F7279223A225C75346631615C75353435385C75353231375C7538383638227D223B, '1543891260', '1544775921');
INSERT INTO `ck_auth_item` VALUES ('/user/send-message:POST', '2', '给会员发消息', null, 0x733A38363A227B2267726F7570223A225C75346631615C75353435385C75376261315C7537343036222C22736F7274223A223131222C2263617465676F7279223A225C75346631615C75353435385C75353231375C7538383638227D223B, '1544775495', '1544776036');
INSERT INTO `ck_auth_item` VALUES ('/user/today:GET', '2', '今日注册会员', null, 0x733A38363A227B2267726F7570223A225C75346631615C75353435385C75376261315C7537343036222C22736F7274223A223132222C2263617465676F7279223A225C75346563615C75363565355C75366365385C7535313863227D223B, '1544775598', '1544776053');
INSERT INTO `ck_auth_item` VALUES ('/user/trade-list:GET', '2', '会员交易记录', null, 0x733A38353A227B2267726F7570223A225C75346631615C75353435385C75376261315C7537343036222C22736F7274223A2237222C2263617465676F7279223A225C75346631615C75353435385C75353231375C7538383638227D223B, '1543893897', '1544775984');
INSERT INTO `ck_auth_item` VALUES ('/user/update:POST', '2', '编辑会员', null, 0x733A38353A227B2267726F7570223A225C75346631615C75353435385C75376261315C7537343036222C22736F7274223A2234222C2263617465676F7279223A225C75346631615C75353435385C75353231375C7538383638227D223B, '1543891349', '1544775948');
INSERT INTO `ck_auth_item` VALUES ('/user/withdraw-list:GET', '2', '会员取款记录', null, 0x733A38353A227B2267726F7570223A225C75346631615C75353435385C75376261315C7537343036222C22736F7274223A2239222C2263617465676F7279223A225C75346631615C75353435385C75353231375C7538383638227D223B, '1543894291', '1544776004');
INSERT INTO `ck_auth_item` VALUES ('/withdraw/index:GET', '2', '取款申请列表', null, 0x733A38363A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223634222C2263617465676F7279223A225C75353364365C75366233655C75356261315C7536383338227D223B, '1544778576', '1544778677');
INSERT INTO `ck_auth_item` VALUES ('/withdraw/view-layer:GET', '2', '查看取款申请', null, 0x733A38363A227B2267726F7570223A225C75386432325C75353261315C75376261315C7537343036222C22736F7274223A223635222C2263617465676F7279223A225C75353364365C75366233655C75356261315C7536383338227D223B, '1544778634', '1544778634');
INSERT INTO `ck_auth_item` VALUES ('财务管理', '1', '负值财务审核和账目管理', null, 0x733A31323A227B22736F7274223A2233227D223B, '1544782310', '1544782310');
INSERT INTO `ck_auth_item` VALUES ('超级管理员', '1', '最高权限管理员', null, 0x733A31323A227B22736F7274223A2239227D223B, '1544781969', '1544783766');
INSERT INTO `ck_auth_item` VALUES ('运营管理', '1', '负责平台运营管理', null, 0x733A31323A227B22736F7274223A2231227D223B, '1544782063', '1544782156');

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
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/admin-menu/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/admin-menu/delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/admin-menu/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/admin-menu/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/admin-user/carete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/admin-user/delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/admin-user/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/admin-user/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/agent-menu/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/agent-menu/delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/agent-menu/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/agent-menu/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/agent-trade/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/agent-trade/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/agent-trade/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/agent-withdraw/audit:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/agent-withdraw/audit:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/agent-withdraw/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/agent-withdraw/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/agent-withdraw/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/agent-withdraw/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/agent/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/agent/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/agent/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/agent/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/agent/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/agent/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/agent/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/agent/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/agent/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/agent/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/agent/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/agent/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/bank/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/bank/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/bank/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/bank/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/bank/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/bank/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/bank/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/bank/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/barcode/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/barcode/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/barcode/delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/barcode/delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/barcode/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/barcode/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/barcode/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/barcode/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/barcode/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/barcode/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/change-amount/audit:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/change-amount/audit:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/change-amount/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/change-amount/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/deposit/audit:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/deposit/audit:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/deposit/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/deposit/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/deposit/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/deposit/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/game-type/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/game-type/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/game-type/delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/game-type/delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/game-type/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/game-type/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/game-type/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/game-type/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/log/delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/log/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/log/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/message/delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/message/delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/message/group:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/message/group:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/message/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/message/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/message/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/message/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/notice/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/notice/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/notice/delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/notice/delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/notice/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/notice/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/notice/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/notice/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/platform/amount:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/platform/amount:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/platform/change-amount:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/platform/change-amount:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/platform/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/platform/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/platform/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/platform/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/platform/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/platform/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/rbac/permission-create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/rbac/permission-delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/rbac/permission-update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/rbac/permissions:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/rbac/role-create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/rbac/role-delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/rbac/role-update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/rbac/roles:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/rebate/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/rebate/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/rebate/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/report/agent-trade:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/report/agent-trade:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/report/agent-trade:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/report/agent-xima:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/report/agent-xima:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/report/agent-xima:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/report/bet:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/report/bet:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/report/bet:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/report/platform-trade:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/report/platform-trade:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/report/platform-trade:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/report/rebate:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/report/rebate:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/report/rebate:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/report/system-trade:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/report/system-trade:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/report/system-trade:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/report/user-trade:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/report/user-trade:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/report/user-trade:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/report/user-xima:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/report/user-xima:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/report/user-xima:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/setting/agent:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/setting/agent:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/setting/agent:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/setting/agent:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/setting/finance:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/setting/finance:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/setting/finance:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/setting/finance:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/setting/finance:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/setting/game:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/setting/game:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/setting/game:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/setting/game:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/setting/smtp:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/setting/smtp:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/setting/smtp:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/setting/smtp:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/setting/smtp:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/setting/website:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/setting/website:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/setting/website:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/setting/website:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/setting/website:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/stat/agent:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/stat/agent:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/stat/agent:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/stat/daily:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/stat/daily:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/stat/daily:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/stat/platform:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/stat/platform:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/stat/platform:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/task/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/task/delete:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/task/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/task/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/user/bet-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/user/bet-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/user/bet-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/user/change-amout:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/user/change-amout:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/user/change-amout:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/user/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/user/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/user/create:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/user/deposit-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/user/deposit-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/user/deposit-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/user/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/user/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/user/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/user/log-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/user/log-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/user/log-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/user/online:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/user/online:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/user/online:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/user/report:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/user/report:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/user/report:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/user/send-message:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/user/send-message:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/user/send-message:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/user/today:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/user/today:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/user/today:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/user/trade-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/user/trade-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/user/trade-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/user/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/user/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/user/update:POST');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/user/withdraw-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/user/withdraw-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('运营管理', '/user/withdraw-list:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/withdraw/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/withdraw/index:GET');
INSERT INTO `ck_auth_item_child` VALUES ('财务管理', '/withdraw/view-layer:GET');
INSERT INTO `ck_auth_item_child` VALUES ('超级管理员', '/withdraw/view-layer:GET');

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
-- Table structure for `ck_bet_list`
-- ----------------------------
DROP TABLE IF EXISTS `ck_bet_list`;
CREATE TABLE `ck_bet_list` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '投注流水ID',
  `record_id` bigint(20) unsigned DEFAULT NULL COMMENT '投注单号',
  `user_id` bigint(20) unsigned NOT NULL COMMENT '用户ID',
  `username` varchar(64) DEFAULT NULL COMMENT '用户名',
  `platform_username` varchar(64) DEFAULT NULL COMMENT '平台用户名',
  `platform_id` int(10) unsigned NOT NULL COMMENT '游戏平台ID',
  `game_type` varchar(64) DEFAULT NULL COMMENT '游戏类型',
  `table_no` varchar(32) DEFAULT NULL COMMENT '桌号',
  `period_boot` varchar(32) DEFAULT NULL COMMENT '靴次',
  `period_round` varchar(32) DEFAULT NULL COMMENT '局次',
  `bet_amount` int(10) unsigned DEFAULT NULL COMMENT '投注金额',
  `bingo_amount` int(10) unsigned DEFAULT NULL COMMENT '押中额度',
  `game_result` varchar(128) DEFAULT NULL COMMENT '开奖结果',
  `bet_record` varchar(255) DEFAULT NULL COMMENT '投注点',
  `profit` int(11) DEFAULT NULL COMMENT '赢输',
  `amount_before` int(10) unsigned DEFAULT NULL COMMENT '投注前余额',
  `amount_after` int(10) unsigned DEFAULT NULL COMMENT '投注后余额',
  `xima_status` tinyint(3) unsigned DEFAULT NULL COMMENT '洗码状态 0 不可见 1可见',
  `xima_type` tinyint(4) DEFAULT NULL COMMENT '洗码类型 1单边2双边',
  `xima_rate` decimal(6,4) unsigned DEFAULT '0.0000' COMMENT '洗码率',
  `xima_limit` decimal(12,4) unsigned DEFAULT NULL COMMENT '洗码上限',
  `xima_plan_id` int(10) unsigned DEFAULT NULL COMMENT '洗码方案',
  `xima` decimal(10,2) unsigned DEFAULT NULL COMMENT '洗码值',
  `state` tinyint(3) unsigned DEFAULT NULL COMMENT '游戏状态',
  `bet_at` int(10) unsigned DEFAULT NULL COMMENT '投注时间',
  `draw_at` int(10) unsigned DEFAULT NULL COMMENT '开奖时间',
  `player_cards` varchar(128) DEFAULT NULL COMMENT '闲家牌面',
  `banker_cards` varchar(128) DEFAULT NULL COMMENT '庄家牌面',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  PRIMARY KEY (`id`),
  KEY `uid` (`user_id`),
  KEY `pid` (`platform_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_bet_list
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_bet_type`
-- ----------------------------
DROP TABLE IF EXISTS `ck_bet_type`;
CREATE TABLE `ck_bet_type` (
  `id` int(10) unsigned NOT NULL COMMENT '投注类型ID',
  `name` varchar(64) NOT NULL COMMENT '投注类型中文名称',
  `name_en` varchar(64) NOT NULL COMMENT '投注类型英文名称',
  `is_double_xima` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否双边洗码',
  `is_single_xima` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否单边洗码',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_bet_type
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_change_amount_record`
-- ----------------------------
DROP TABLE IF EXISTS `ck_change_amount_record`;
CREATE TABLE `ck_change_amount_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL COMMENT '用户ID',
  `switch` tinyint(3) unsigned DEFAULT NULL COMMENT '上下分 1 上分 2 下分',
  `amount` decimal(19,4) DEFAULT NULL COMMENT '额度',
  `after_amount` decimal(19,4) DEFAULT NULL COMMENT '余额',
  `status` tinyint(3) unsigned DEFAULT NULL COMMENT '审核状态 1待审核 1已完成 2 已取消',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `submit_by_id` int(10) unsigned DEFAULT NULL COMMENT '提交者ID',
  `submit_by_name` varchar(64) DEFAULT NULL COMMENT '提交者名称',
  `audit_by_id` int(11) unsigned DEFAULT NULL COMMENT '审核人员ID',
  `audit_by_name` varchar(64) CHARACTER SET utf8 DEFAULT NULL COMMENT '审核人员',
  `audit_remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '审核备注',
  `audit_at` int(20) unsigned DEFAULT NULL COMMENT '审核时间',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='上下分记录表';

-- ----------------------------
-- Records of ck_change_amount_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_company_bank`
-- ----------------------------
DROP TABLE IF EXISTS `ck_company_bank`;
CREATE TABLE `ck_company_bank` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '银行账号ID',
  `bank_username` varchar(64) NOT NULL COMMENT '开户姓名',
  `bank_account` varchar(64) NOT NULL COMMENT '银行账号',
  `bank_name` varchar(64) NOT NULL COMMENT '银行名称',
  `province` varchar(32) DEFAULT NULL COMMENT '开户省份',
  `city` varchar(32) DEFAULT NULL COMMENT '开户城市',
  `branch_name` varchar(128) DEFAULT NULL COMMENT '网点名称',
  `card_type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '银行卡类型 1:借记卡  2：信用卡',
  `status` tinyint(3) unsigned DEFAULT '1' COMMENT '账号状态 1：启用 0：停用 2:删除',
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
  `dxm` decimal(10,2) unsigned DEFAULT NULL COMMENT '日洗码值',
  PRIMARY KEY (`ymd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='统计日报';

-- ----------------------------
-- Records of ck_daily
-- ----------------------------
INSERT INTO `ck_daily` VALUES ('20190103', '2', '1', null, null, null, null, null, null, null, null, null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_game_type
-- ----------------------------
INSERT INTO `ck_game_type` VALUES ('1', '百家乐', 'baccarat', null, null);
INSERT INTO `ck_game_type` VALUES ('2', '龙虎', 'dragon_tiger', null, null);
INSERT INTO `ck_game_type` VALUES ('3', '单挑', 'duel', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_menu
-- ----------------------------
INSERT INTO `ck_menu` VALUES ('1', '0', '0', '平台设置', '', 'fa fa-cogs', '9', '_blank', '0', '1', '1505570067', '1539919792');
INSERT INTO `ck_menu` VALUES ('2', '0', '1', '网站设置', 'setting/website', '', '1', '_blank', '0', '1', '1505570108', '1539867437');
INSERT INTO `ck_menu` VALUES ('3', '0', '1', '代理设置', 'setting/agent', '', '2', '_blank', '0', '1', '1505570155', '1538959820');
INSERT INTO `ck_menu` VALUES ('4', '0', '1', '邮件设置', 'setting/smtp', '', '5', '_blank', '0', '0', '1505570187', '1546124108');
INSERT INTO `ck_menu` VALUES ('5', '0', '48', '菜单管理', '', '', '1', '_blank', '0', '1', '1505570320', '1539937262');
INSERT INTO `ck_menu` VALUES ('6', '0', '5', '后台菜单', 'admin-menu/index', '', '0', '_blank', '0', '1', '1505570366', '1538201502');
INSERT INTO `ck_menu` VALUES ('7', '0', '5', '代理菜单', 'agent-menu/index', '', '0', '_blank', '0', '1', '1505570382', '1538201522');
INSERT INTO `ck_menu` VALUES ('13', '0', '0', '会员管理', '', 'fa fa-users', '1', '_blank', '0', '1', '1505570745', '1539918814');
INSERT INTO `ck_menu` VALUES ('14', '0', '48', '管理员管理', '', 'fa fa-th-large', '0', '_blank', '0', '1', '1505570819', '1539937263');
INSERT INTO `ck_menu` VALUES ('15', '0', '14', '权限管理', 'rbac/permissions', '', '0', '_blank', '0', '1', '1505570862', '1539918906');
INSERT INTO `ck_menu` VALUES ('16', '0', '14', '角色管理', 'rbac/roles', '', '0', '_blank', '0', '1', '1505570882', '1539918920');
INSERT INTO `ck_menu` VALUES ('17', '0', '14', '管理员列表', 'admin-user/index', '', '0', '_blank', '0', '1', '1505570902', '1539918937');
INSERT INTO `ck_menu` VALUES ('22', '0', '48', '日志管理', 'log/index', '', '5', '_blank', '0', '1', '1505571212', '1539938294');
INSERT INTO `ck_menu` VALUES ('23', '0', '0', '首页', 'site/main', 'fa fa-home', '0', '_self', '0', '1', '1505636890', '1539918308');
INSERT INTO `ck_menu` VALUES ('27', '1', '0', '代理', 'agent/index', 'fa fa-ship', '1', '_self', '0', '1', '1505637000', '1541050948');
INSERT INTO `ck_menu` VALUES ('31', '1', '0', '首页', 'site/main', 'fa fa-home', '0', '_blank', '0', '1', '1538277444', '1538277574');
INSERT INTO `ck_menu` VALUES ('33', '1', '13', '用户列表', 'user/index', '', '0', '_blank', '0', '1', '1538279316', '1538279316');
INSERT INTO `ck_menu` VALUES ('34', '1', '13', '今日注册', 'user/today', '', '0', '_blank', '0', '1', '1538279343', '1538279343');
INSERT INTO `ck_menu` VALUES ('36', '1', '27', '返佣记录', 'rebate/index', '', '2', '_blank', '0', '1', '1538279634', '1541060106');
INSERT INTO `ck_menu` VALUES ('42', '1', '0', '会员', 'user/index', 'fa fa-user', '0', '_blank', '0', '1', '1538895037', '1541050933');
INSERT INTO `ck_menu` VALUES ('47', '0', '1', '游戏设置', 'setting/game', '', '3', '_blank', '0', '0', '1539160762', '1546124117');
INSERT INTO `ck_menu` VALUES ('48', '0', '0', '系统管理', '', 'fa fa-cog', '10', '_blank', '0', '1', '1539867193', '1539867227');
INSERT INTO `ck_menu` VALUES ('49', '0', '13', '会员列表', 'user/index', '', '0', '_blank', '0', '1', '1539918991', '1539937504');
INSERT INTO `ck_menu` VALUES ('50', '0', '0', '代理管理', '', 'fa fa-ship', '2', '_blank', '0', '1', '1539919023', '1539919039');
INSERT INTO `ck_menu` VALUES ('51', '0', '0', '财务管理', '', 'fa fa-money', '4', '_blank', '0', '1', '1539919149', '1539919578');
INSERT INTO `ck_menu` VALUES ('52', '0', '0', '统计报表', '', 'fa fa-line-chart', '5', '_blank', '0', '1', '1539919297', '1539919297');
INSERT INTO `ck_menu` VALUES ('53', '0', '0', '运营管理', '', 'fa fa-street-view', '3', '_blank', '0', '1', '1539919537', '1539919580');
INSERT INTO `ck_menu` VALUES ('54', '0', '13', '今日注册', 'user/today', '', '2', '_blank', '0', '1', '1539920006', '1539937534');
INSERT INTO `ck_menu` VALUES ('55', '0', '13', '在线会员', 'user/online', '', '3', '_blank', '0', '1', '1539920023', '1539937552');
INSERT INTO `ck_menu` VALUES ('57', '0', '50', '代理列表', 'agent/index', '', '0', '_blank', '0', '1', '1539920171', '1539920171');
INSERT INTO `ck_menu` VALUES ('58', '0', '50', '代理佣金', 'rebate/index', '', '1', '_blank', '0', '1', '1539920210', '1540904198');
INSERT INTO `ck_menu` VALUES ('59', '0', '50', '交易记录', 'agent-trade/index', '', '2', '_blank', '0', '1', '1539920228', '1540904592');
INSERT INTO `ck_menu` VALUES ('60', '0', '53', '站内消息', 'message/index', '', '5', '_blank', '0', '1', '1539920255', '1545205587');
INSERT INTO `ck_menu` VALUES ('61', '0', '53', '系统公告', 'notice/index', '', '6', '_blank', '0', '1', '1539920271', '1545205588');
INSERT INTO `ck_menu` VALUES ('62', '0', '51', '银行卡管理', 'bank/index', '', '0', '_blank', '0', '1', '1539920304', '1539920304');
INSERT INTO `ck_menu` VALUES ('63', '0', '51', '平台资金', 'platform/amount', '', '3', '_blank', '0', '1', '1539920335', '1546007828');
INSERT INTO `ck_menu` VALUES ('64', '0', '51', '存款审核', 'deposit/index', '', '4', '_blank', '0', '1', '1539920357', '1546007831');
INSERT INTO `ck_menu` VALUES ('65', '0', '51', '取款审核', 'withdraw/index', '', '5', '_blank', '0', '1', '1539920385', '1546007833');
INSERT INTO `ck_menu` VALUES ('66', '0', '52', '用户交易报表', 'report/user-trade', '', '9', '_blank', '0', '1', '1539920496', '1541122428');
INSERT INTO `ck_menu` VALUES ('67', '0', '51', '资金流水', 'bank-money/index', '', '8', '_blank', '0', '0', '1539920521', '1546007844');
INSERT INTO `ck_menu` VALUES ('68', '0', '51', '上下分审核', 'change-amount/index', '', '7', '_blank', '0', '1', '1539920603', '1546007841');
INSERT INTO `ck_menu` VALUES ('70', '0', '53', '游戏平台', 'platform/index', '', '0', '_blank', '0', '1', '1539921125', '1539937638');
INSERT INTO `ck_menu` VALUES ('71', '0', '53', '游戏类型', 'game-type/index', '', '1', '_blank', '0', '1', '1539921263', '1539937699');
INSERT INTO `ck_menu` VALUES ('73', '0', '52', '系统日报', 'stat/daily', '', '0', '_blank', '0', '1', '1539922246', '1541833800');
INSERT INTO `ck_menu` VALUES ('74', '0', '52', '代理日报', 'stat/agent', '', '2', '_blank', '0', '1', '1539922259', '1541833835');
INSERT INTO `ck_menu` VALUES ('75', '0', '52', '平台日报', 'stat/platform', '', '1', '_blank', '0', '1', '1539922437', '1541833821');
INSERT INTO `ck_menu` VALUES ('77', '0', '52', '投注报表', 'report/bet', '', '4', '_blank', '0', '1', '1539922706', '1539938351');
INSERT INTO `ck_menu` VALUES ('78', '0', '51', '盘点记录', 'check/index', '', '9', '_blank', '0', '0', '1539922830', '1546007847');
INSERT INTO `ck_menu` VALUES ('79', '0', '52', '赢输报表', 'report/winloss', '', '5', '_blank', '0', '0', '1539922888', '1541835432');
INSERT INTO `ck_menu` VALUES ('80', '0', '52', '上下分报表', 'report/updown', '', '10', '_blank', '0', '0', '1539922983', '1541843733');
INSERT INTO `ck_menu` VALUES ('81', '0', '52', '代理洗码报表', 'report/agent-xima', '', '12', '_blank', '0', '1', '1539923015', '1544495859');
INSERT INTO `ck_menu` VALUES ('82', '0', '52', '返佣报表', 'report/rebate', '', '13', '_blank', '0', '1', '1539923055', '1544495854');
INSERT INTO `ck_menu` VALUES ('83', '0', '48', '计划任务', 'task/index', '', '4', '_blank', '0', '1', '1539923088', '1542334709');
INSERT INTO `ck_menu` VALUES ('84', '0', '48', '数据管理', '', '', '2', '_blank', '0', '0', '1539923133', '1546124131');
INSERT INTO `ck_menu` VALUES ('85', '0', '84', '数据备份', 'data/backup', '', '0', '_blank', '0', '1', '1539923144', '1539938535');
INSERT INTO `ck_menu` VALUES ('86', '0', '84', '数据恢复', 'data/recover', '', '1', '_blank', '0', '1', '1539923153', '1539938559');
INSERT INTO `ck_menu` VALUES ('87', '0', '1', '财务设置', 'setting/finance', '', '4', '_blank', '0', '1', '1540887404', '1540887435');
INSERT INTO `ck_menu` VALUES ('88', '1', '42', '会员列表', 'user/index', '', '0', '_blank', '0', '1', '1541050982', '1541050982');
INSERT INTO `ck_menu` VALUES ('89', '1', '42', '投注记录', 'user/bet-list', '', '1', '_blank', '0', '1', '1541051004', '1541058967');
INSERT INTO `ck_menu` VALUES ('90', '1', '42', '交易记录', 'user/trade-list', '', '2', '_blank', '0', '1', '1541051031', '1541058977');
INSERT INTO `ck_menu` VALUES ('91', '1', '27', '下级代理', 'agent/index', '', '0', '_blank', '0', '1', '1541051094', '1541051094');
INSERT INTO `ck_menu` VALUES ('92', '1', '27', '交易记录', 'agent-trade/index', '', '1', '_blank', '0', '1', '1541051117', '1541060082');
INSERT INTO `ck_menu` VALUES ('93', '1', '27', '代理设置', 'agent/setting', '', '4', '_blank', '0', '0', '1541051145', '1543559549');
INSERT INTO `ck_menu` VALUES ('94', '1', '42', '会员设置', '', '', '4', '_blank', '0', '0', '1541051158', '1543559547');
INSERT INTO `ck_menu` VALUES ('95', '1', '42', '登陆记录', 'user/log-list', '', '3', '_blank', '0', '1', '1541058229', '1541058958');
INSERT INTO `ck_menu` VALUES ('96', '0', '52', '系统交易报表', 'report/system-trade', '', '6', '_blank', '0', '1', '1541122351', '1541122416');
INSERT INTO `ck_menu` VALUES ('97', '0', '52', '平台交易报表', 'report/platform-trade', '', '7', '_blank', '0', '1', '1541122376', '1541122418');
INSERT INTO `ck_menu` VALUES ('98', '0', '52', '代理交易报表', 'report/agent-trade', '', '8', '_blank', '0', '1', '1541122398', '1541122426');
INSERT INTO `ck_menu` VALUES ('99', '0', '51', '二维码管理', 'barcode/index', '', '2', '_blank', '0', '1', '1544004072', '1546007827');
INSERT INTO `ck_menu` VALUES ('100', '1', '108', '银行卡管理', 'bank/index', '', '4', '_blank', '0', '1', '1544252531', '1545702516');
INSERT INTO `ck_menu` VALUES ('101', '1', '108', '取款申请', 'withdraw/index', '', '6', '_blank', '0', '1', '1544252568', '1545702579');
INSERT INTO `ck_menu` VALUES ('102', '0', '51', '代理取款审核', 'agent-withdraw/index', '', '6', '_blank', '0', '1', '1544260203', '1546007834');
INSERT INTO `ck_menu` VALUES ('103', '0', '52', '用户洗码报表', 'report/user-xima', '', '11', '_blank', '0', '1', '1544495833', '1544495860');
INSERT INTO `ck_menu` VALUES ('104', '1', '27', '洗码记录', 'xima/index', '', '5', '_blank', '0', '1', '1544517122', '1544517122');
INSERT INTO `ck_menu` VALUES ('105', '0', '53', '用户洗码方案', 'xima-plan/user', '', '2', '_blank', '0', '1', '1545205626', '1545205626');
INSERT INTO `ck_menu` VALUES ('106', '0', '53', '代理洗码方案', 'xima-plan/agent', '', '3', '_blank', '0', '1', '1545205658', '1545205668');
INSERT INTO `ck_menu` VALUES ('107', '0', '53', '代理返佣方案', 'rebate-plan/index', '', '4', '_blank', '0', '1', '1545205692', '1545648932');
INSERT INTO `ck_menu` VALUES ('108', '1', '0', '管理', '', 'fa fa-cog', '3', '_blank', '0', '1', '1545702392', '1545702556');
INSERT INTO `ck_menu` VALUES ('109', '1', '108', '用户洗码方案', 'xima-plan/user', '', '0', '_blank', '0', '1', '1545702447', '1545702447');
INSERT INTO `ck_menu` VALUES ('110', '1', '108', '代理洗码方案', 'xima-plan/agent', '', '1', '_blank', '0', '1', '1545702466', '1545702466');
INSERT INTO `ck_menu` VALUES ('111', '1', '108', '代理返佣方案', 'rebate-plan/index', '', '3', '_blank', '0', '1', '1545702488', '1545702488');
INSERT INTO `ck_menu` VALUES ('112', '0', '51', '第三方支付管理', 'third-payment/index', '', '1', '_blank', '0', '1', '1546007937', '1546007937');

-- ----------------------------
-- Table structure for `ck_message`
-- ----------------------------
DROP TABLE IF EXISTS `ck_message`;
CREATE TABLE `ck_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '消息ID',
  `title` varchar(255) NOT NULL COMMENT '消息标题',
  `content` varchar(512) DEFAULT NULL COMMENT '消息内容',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否删除 1 删除 0 否',
  `deleted_at` int(10) unsigned DEFAULT NULL COMMENT '删除时间',
  `level` tinyint(3) unsigned DEFAULT NULL COMMENT '优先级 1 普通 2 高 3 紧急',
  `user_type` tinyint(3) unsigned DEFAULT NULL COMMENT '用户类型 1 会员 2 代理 3 管理员',
  `notify_obj` tinyint(3) unsigned DEFAULT NULL COMMENT '通告对象类型 1单个用户 2 多个用户 3 全部用户 4用户类型',
  `user_group` tinyint(3) unsigned DEFAULT NULL COMMENT '用户组',
  `sender_id` int(10) unsigned DEFAULT '0' COMMENT '发送者ID 0为系统发送',
  `sender_name` varchar(64) DEFAULT NULL COMMENT '发送者名称',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_message
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_message_flag
-- ----------------------------

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
  `user_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '用户类型 0 全体 1 会员 2 代理 3 管理员',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_notice
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO `ck_options` VALUES ('10', '0', 'website_comment', '', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('11', '0', 'website_comment_need_verify', '', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('12', '0', 'website_timezone', 'Asia/Shanghai', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('13', '0', 'website_url', 'http://admin.onetop.pw/agent', '1', '0', '', '0');
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
INSERT INTO `ck_options` VALUES ('30', '0', 'agent_max_rebate', '0.35', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('31', '0', 'agent_default_rebate', '0.3', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('32', '0', 'agent_backend_url', 'http://43.249.206.212/agent', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('33', '0', 'agent_user_reg_url', 'http://m.onetop.pw/reg.html', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('34', '0', 'agent_reg_url', 'http://m.onetop.pw/agent-reg.html', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('35', '0', 'game_min_limit', '10', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('36', '0', 'game_max_limit', '10000', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('37', '0', 'game_dogfall_min_limit', '10', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('38', '0', 'game_dogfall_max_limit', '5000', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('39', '0', 'game_pair_min_limit', '10', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('40', '0', 'game_pair_max_limit', '5000', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('41', '0', 'agent_xima_rate', '0.01', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('42', '0', 'agent_xima_type', '2', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('43', '0', 'agent_xima_status', '1', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('44', '0', 'finance_deposit_max', '500000', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('45', '0', 'finance_deposit_min', '100', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('46', '0', 'finance_withdraw_max', '500000', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('47', '0', 'finance_withdraw_min', '100', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('48', '0', 'finance_add_amount_open_aduit', '0', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('49', '0', 'finance_reduce_amount_open_aduit', '0', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('50', '0', 'finance_add_amount_max', '100000', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('51', '0', 'finance_reduce_amount_max', '100000', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('52', '0', 'agent_default_code', '12346', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('53', '0', 'agent_apk_url', 'http://43.228.76.75:8848/download/1215.apk', '1', '0', '', '0');
INSERT INTO `ck_options` VALUES ('54', '0', 'agent_ios_url', 'itms-services://?action=download-manifest&url=https://raw.githubusercontent.com/onetoppw/onetop/master/app.plist', '1', '1', '', '0');
INSERT INTO `ck_options` VALUES ('55', '0', 'finance_withdraw_rate', '0.3', '1', '0', '', '0');

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
  `other_param` varchar(255) DEFAULT NULL COMMENT '其它参数，json格式',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '平台状态 1 激活 0 停用',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ck_platform
-- ----------------------------
INSERT INTO `ck_platform` VALUES ('1', '皇家国际', 'HJ', '', '', '', '', null, '1', null, null);
INSERT INTO `ck_platform` VALUES ('2', '威尼斯人', 'WNSR', '', '', '', '', null, '0', null, null);
INSERT INTO `ck_platform` VALUES ('3', '机械版百乐', 'JXB', '', '', '', '', null, '1', null, null);
INSERT INTO `ck_platform` VALUES ('4', 'AG旗舰厅', 'AG', '', '', '', '', null, '0', null, null);
INSERT INTO `ck_platform` VALUES ('5', '欧博', 'OB', '', '', '', '', null, '0', null, null);
INSERT INTO `ck_platform` VALUES ('6', '彩票投注', 'CP', '', '', '', '', null, '0', null, null);

-- ----------------------------
-- Table structure for `ck_platform_account`
-- ----------------------------
DROP TABLE IF EXISTS `ck_platform_account`;
CREATE TABLE `ck_platform_account` (
  `platform_id` int(10) unsigned NOT NULL COMMENT '代理ID',
  `available_amount` decimal(19,4) DEFAULT NULL COMMENT '可用余额',
  `frozen_amount` decimal(19,4) DEFAULT NULL COMMENT '冻结金额',
  `alarm_amount` decimal(19,4) unsigned DEFAULT NULL COMMENT '告警额度',
  `bet_amount` decimal(19,4) unsigned DEFAULT NULL COMMENT '平台投注总额',
  `xima_amount` decimal(19,4) unsigned DEFAULT NULL COMMENT '平台洗码总额',
  `profit` decimal(19,4) DEFAULT NULL COMMENT '平台盈利',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`platform_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='游戏平台账户表';

-- ----------------------------
-- Records of ck_platform_account
-- ----------------------------
INSERT INTO `ck_platform_account` VALUES ('1', '5636898.0000', null, null, null, null, null, null, null);
INSERT INTO `ck_platform_account` VALUES ('2', '68635.0000', null, null, null, null, null, null, null);
INSERT INTO `ck_platform_account` VALUES ('3', '850000.0000', null, null, null, null, null, null, null);
INSERT INTO `ck_platform_account` VALUES ('4', '95000.0000', null, null, null, null, null, '1541573783', null);
INSERT INTO `ck_platform_account` VALUES ('5', '79500.0000', null, null, null, null, null, '1541571531', null);
INSERT INTO `ck_platform_account` VALUES ('6', '9200.0000', null, null, null, null, null, '1541571183', null);

-- ----------------------------
-- Table structure for `ck_platform_account_record`
-- ----------------------------
DROP TABLE IF EXISTS `ck_platform_account_record`;
CREATE TABLE `ck_platform_account_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '游戏平台账户变更记录ID',
  `platform_id` int(10) unsigned NOT NULL COMMENT '代理ID',
  `trade_no` varchar(32) DEFAULT NULL COMMENT '交易编号',
  `user_id` bigint(20) unsigned DEFAULT NULL COMMENT '用户ID',
  `name` varchar(255) DEFAULT NULL COMMENT '变更名称',
  `amount` decimal(19,4) DEFAULT NULL COMMENT '变更额度',
  `switch` tinyint(3) unsigned DEFAULT NULL COMMENT '收支 1 收入 2支出',
  `after_amount` decimal(19,4) DEFAULT NULL COMMENT '变更后余额',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='游戏平台额度变更记录表';

-- ----------------------------
-- Records of ck_platform_account_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_platform_daily`
-- ----------------------------
DROP TABLE IF EXISTS `ck_platform_daily`;
CREATE TABLE `ck_platform_daily` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `ymd` (`ymd`,`platform_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_platform_daily
-- ----------------------------
INSERT INTO `ck_platform_daily` VALUES ('1', '20190103', '3', '1', null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `ck_platform_game`
-- ----------------------------
DROP TABLE IF EXISTS `ck_platform_game`;
CREATE TABLE `ck_platform_game` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '平台游戏ID',
  `platform_id` int(10) unsigned NOT NULL COMMENT '平台ID',
  `game_name` varchar(64) NOT NULL COMMENT '游戏名称',
  `game_name_en` varchar(64) NOT NULL COMMENT '游戏英文名称',
  `game_icon_url` varchar(255) DEFAULT NULL COMMENT '游戏图标地址',
  `game_type_id` int(10) unsigned NOT NULL COMMENT '游戏类型ID',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '激活状态 0 禁用，1 启用',
  `bet_amount` decimal(19,4) unsigned DEFAULT NULL COMMENT '投注总额',
  `profit` decimal(19,4) unsigned DEFAULT NULL COMMENT '合计益损',
  `bet_num` int(10) unsigned DEFAULT NULL COMMENT '投注次数',
  `bet_user_num` int(10) unsigned DEFAULT NULL COMMENT '投注用户数',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_platform_game
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_platform_rebate`
-- ----------------------------
DROP TABLE IF EXISTS `ck_platform_rebate`;
CREATE TABLE `ck_platform_rebate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `platform_id` int(11) NOT NULL COMMENT '游戏平台ID',
  `rebate_level_id` int(10) unsigned NOT NULL COMMENT '返佣级别ID',
  `rebate_rate` decimal(6,4) NOT NULL COMMENT '返佣率',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_platform_rebate
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_platform_user`
-- ----------------------------
DROP TABLE IF EXISTS `ck_platform_user`;
CREATE TABLE `ck_platform_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '游戏平台用户ID',
  `platform_id` int(10) unsigned NOT NULL COMMENT '游戏平台ID',
  `platform_code` varchar(32) NOT NULL COMMENT '游戏平台代码',
  `user_id` bigint(20) unsigned NOT NULL COMMENT '用户ID',
  `username` varchar(64) DEFAULT NULL COMMENT '用户名称',
  `game_account_id` varchar(128) DEFAULT NULL COMMENT '游戏平台用户ID',
  `game_account` varchar(255) DEFAULT NULL COMMENT '游戏登陆账号',
  `game_password` varchar(255) DEFAULT NULL COMMENT '游戏登陆密码',
  `auth_data` varchar(255) DEFAULT NULL COMMENT '认证数据',
  `user_status` tinyint(3) unsigned DEFAULT '1' COMMENT '用户状态 1 正常 2 冻结  3 锁定 4 注销',
  `first_login_ip` varchar(64) DEFAULT NULL COMMENT '首次登陆IP',
  `last_login_at` int(10) unsigned DEFAULT NULL COMMENT '最后登陆时间',
  `last_login_ip` varchar(64) DEFAULT NULL COMMENT '最后登陆IP',
  `available_amount` decimal(19,4) unsigned DEFAULT NULL COMMENT '用户余额',
  `frozen_amount` decimal(19,4) unsigned DEFAULT NULL COMMENT '冻结余额',
  `bet_amount` decimal(19,4) unsigned DEFAULT NULL COMMENT '投注金额',
  `xima_amount` decimal(19,4) unsigned DEFAULT NULL COMMENT '洗码额度',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_pu` (`platform_code`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_platform_user
-- ----------------------------
INSERT INTO `ck_platform_user` VALUES ('1', '3', 'jxb', '2', 'wang123', '530376978985910272', 'wang123515', 't3X92mic', null, '1', '113.111.115.159', '1546500043', '112.96.132.164', null, null, null, null, '1546500043', '1546493325');

-- ----------------------------
-- Table structure for `ck_platform_xima`
-- ----------------------------
DROP TABLE IF EXISTS `ck_platform_xima`;
CREATE TABLE `ck_platform_xima` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `platform_id` int(11) NOT NULL COMMENT '游戏平台ID',
  `xima_level_id` int(10) unsigned NOT NULL COMMENT '返佣级别ID',
  `xima_rate` decimal(6,4) NOT NULL COMMENT '洗码率',
  `xima_type` tinyint(3) unsigned DEFAULT '2' COMMENT '洗码类型 1单边 2 双边',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_pl` (`platform_id`,`xima_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_platform_xima
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_rebate`
-- ----------------------------
DROP TABLE IF EXISTS `ck_rebate`;
CREATE TABLE `ck_rebate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '序号',
  `ym` char(7) NOT NULL COMMENT '期数',
  `agent_id` int(10) unsigned NOT NULL COMMENT '代理ID',
  `platform_id` int(10) unsigned NOT NULL COMMENT '平台ID',
  `agent_name` varchar(255) DEFAULT NULL COMMENT '代理账号',
  `agent_level` tinyint(4) DEFAULT NULL COMMENT '代理层级',
  `rebate_rate` decimal(6,4) unsigned DEFAULT NULL COMMENT '占成',
  `rebate_limit` decimal(19,4) unsigned DEFAULT NULL COMMENT '返佣限制',
  `rebate_plan_id` int(10) unsigned DEFAULT NULL COMMENT '返佣方案ID',
  `self_bet_amount` decimal(19,4) DEFAULT '0.0000' COMMENT '自身有效投注',
  `self_profit_loss` decimal(10,3) DEFAULT '0.000' COMMENT '自身会员损益',
  `self_rebate_amount` decimal(10,3) DEFAULT '0.000' COMMENT '自身返佣',
  `self_bet_user_num` int(10) unsigned DEFAULT '0' COMMENT '自身投注用户数',
  `sub_profit_loss` decimal(10,3) DEFAULT '0.000' COMMENT '下级代理会员损益',
  `sub_bet_amount` decimal(19,4) DEFAULT '0.0000' COMMENT '下级有效投注总额',
  `sub_rebate_amount` decimal(10,3) DEFAULT '0.000' COMMENT '下级返佣',
  `sub_bet_user_num` int(10) unsigned DEFAULT '0' COMMENT '下级投注用户数',
  `total_bet_amount` decimal(19,4) unsigned DEFAULT '0.0000' COMMENT '合计投注额度',
  `total_bet_user_num` int(10) unsigned DEFAULT '0' COMMENT '合计投注用户数',
  `total_profit_loss` decimal(19,4) unsigned DEFAULT '0.0000' COMMENT '合计损益',
  `total_rebate_amount` decimal(19,4) DEFAULT '0.0000' COMMENT '合计返佣',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '计佣时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_agent` (`ym`,`agent_id`,`platform_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_rebate
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_rebate_level`
-- ----------------------------
DROP TABLE IF EXISTS `ck_rebate_level`;
CREATE TABLE `ck_rebate_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '返佣层级ID',
  `plan_id` int(10) unsigned NOT NULL COMMENT '返佣方案ID',
  `profit_amount` decimal(19,4) DEFAULT NULL,
  `bet_user_num` int(10) unsigned DEFAULT NULL COMMENT '投注用户数',
  `rebate_limit` decimal(19,4) DEFAULT NULL COMMENT '返佣上限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_rebate_level
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_rebate_plan`
-- ----------------------------
DROP TABLE IF EXISTS `ck_rebate_plan`;
CREATE TABLE `ck_rebate_plan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '返佣方案ID',
  `name` varchar(64) NOT NULL COMMENT '方案名称',
  `agent_id` int(10) unsigned DEFAULT '0' COMMENT '创建代理ID 0 为系统默认',
  `status` tinyint(3) unsigned DEFAULT '1' COMMENT '启用状态 0禁用 1启用',
  `is_default` tinyint(3) unsigned DEFAULT '0' COMMENT '是否为默认方案',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_rebate_plan
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_system_account`
-- ----------------------------
DROP TABLE IF EXISTS `ck_system_account`;
CREATE TABLE `ck_system_account` (
  `id` char(1) NOT NULL DEFAULT 'K' COMMENT '主键',
  `available_amount` decimal(19,4) NOT NULL DEFAULT '0.0000' COMMENT '可用额度',
  `frozen_amount` decimal(19,4) unsigned NOT NULL DEFAULT '0.0000' COMMENT '冻结额度',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='系统账户表';

-- ----------------------------
-- Records of ck_system_account
-- ----------------------------
INSERT INTO `ck_system_account` VALUES ('K', '100000.0000', '0.0000', '1546154645', '1546154645');

-- ----------------------------
-- Table structure for `ck_system_account_record`
-- ----------------------------
DROP TABLE IF EXISTS `ck_system_account_record`;
CREATE TABLE `ck_system_account_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '系统账户变更ID',
  `name` varchar(255) DEFAULT NULL COMMENT '账户变更名称',
  `trade_no` varchar(32) DEFAULT NULL COMMENT '交易编号',
  `amount` decimal(19,2) DEFAULT NULL COMMENT '变更额度',
  `switch` tinyint(3) unsigned DEFAULT NULL COMMENT '收支 1 收入 2 支出',
  `after_amount` decimal(19,2) DEFAULT NULL COMMENT '交易后余额',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `confirm_by_id` int(10) unsigned DEFAULT NULL COMMENT '确认者ID',
  `confirm_by_name` varchar(64) DEFAULT NULL COMMENT '确认者名称',
  `confirm_at` int(11) unsigned DEFAULT NULL COMMENT '确认时间',
  `confirm_remark` varchar(255) DEFAULT NULL COMMENT '确认备注',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='系统账户变更记录表';

-- ----------------------------
-- Records of ck_system_account_record
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
  `updated_at` int(10) unsigned DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_task
-- ----------------------------
INSERT INTO `ck_task` VALUES ('1', '皇家国际投注记录同步', 'sync/hj-betlist', '*/2 * * * *', '1', '1', '11613', '2266', '1546500120', '1546500240', '0', '322', '1546500121', null);
INSERT INTO `ck_task` VALUES ('2', '机械版投注记录同步', 'sync/jxb-betlist', '* * * * *', '1', '0', '12602', '2676', '1546500120', '1546500180', '0', '160', '1546500121', '1543571603');
INSERT INTO `ck_task` VALUES ('3', '用户在线检测', 'online/stat', '* * * * *', '1', '0', '7289', null, '1546500120', '1546500180', '0', '98', '1546500121', '1546052463');
INSERT INTO `ck_task` VALUES ('4', '用户关联检测计算', 'relate/stat', '1 3 * * *', '1', '0', '5', '1', '1546455660', '1546542060', '0', '6717', '1546455668', '1546052669');
INSERT INTO `ck_task` VALUES ('5', '返佣计算', 'rebate/calculate', '0 4 1 * * ', '1', '0', '1', null, '1546286400', '1548964800', '0', '651', '1546286402', '1546054737');
INSERT INTO `ck_task` VALUES ('6', '洗码结算', 'xima/settle', '2 2 * * 2', '1', '0', '1', null, '1546279320', '1546884120', '0', '352', '1546279321', '1546251411');

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
-- Table structure for `ck_third_payment`
-- ----------------------------
DROP TABLE IF EXISTS `ck_third_payment`;
CREATE TABLE `ck_third_payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '英文代码',
  `deposit_min` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '单笔存款下限',
  `deposit_max` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '单笔存款上限',
  `withdraw_min` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '单笔取款上限',
  `withdraw_max` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '单笔存款上限',
  `sort` float unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(3) unsigned DEFAULT '1' COMMENT '账号状态 0：停用 1：启用  2：删除',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='第三方支付管理';

-- ----------------------------
-- Records of ck_third_payment
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_two_bar_code`
-- ----------------------------
DROP TABLE IF EXISTS `ck_two_bar_code`;
CREATE TABLE `ck_two_bar_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'url地址',
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '图标',
  `deposit_min` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '单笔存款下限',
  `deposit_max` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '单笔存款上限',
  `withdraw_min` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '单笔取款上限',
  `withdraw_max` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '单笔取款上限',
  `url_code` text COLLATE utf8_unicode_ci COMMENT 'url数据流',
  `sort` float unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(3) unsigned DEFAULT '1' COMMENT '账号状态 0：停用 1：启用  2：删除',
  `code_type` tinyint(3) unsigned DEFAULT '1' COMMENT '二维码类型 1：通用 2：微信，3：支付宝',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='二维码管理表';

-- ----------------------------
-- Records of ck_two_bar_code
-- ----------------------------
INSERT INTO `ck_two_bar_code` VALUES ('1', '微信支付', '/code/wx', '/admin/uploads/images/20181205/20181205114244.jpg', '0.00', '0.00', '0.00', '0.00', null, '0', '1', '2', '1544002833', '1544002833');
INSERT INTO `ck_two_bar_code` VALUES ('2', '支付宝二维码', '/code/zfb', '/admin/uploads/images/20181205/20181205150437.jpg', '0.00', '0.00', '0.00', '0.00', null, '0', '1', '3', '1544002870', '1544002870');
INSERT INTO `ck_two_bar_code` VALUES ('3', '财务通', '/code/wx', '/admin/uploads/images/20181205/a3.jpg', '0.00', '0.00', '0.00', '0.00', null, '0', '0', '1', '1544002916', '1544002988');

-- ----------------------------
-- Table structure for `ck_upload`
-- ----------------------------
DROP TABLE IF EXISTS `ck_upload`;
CREATE TABLE `ck_upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(255) DEFAULT NULL COMMENT '文件名',
  `size` int(11) DEFAULT NULL COMMENT '大小',
  `type` varchar(255) DEFAULT NULL COMMENT '类型',
  `url` varchar(100) DEFAULT NULL COMMENT '地址',
  `thumb` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `deleteUrl` tinyint(4) DEFAULT '1' COMMENT '1存在，0删除',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文件上传管理';

-- ----------------------------
-- Records of ck_upload
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_user`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user`;
CREATE TABLE `ck_user` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT COMMENT '自增用户id',
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `nickname` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '昵称',
  `realname` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '真实姓名',
  `id_card` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '身份证号',
  `id_card_status` tinyint(1) DEFAULT '0' COMMENT '是否实名（0：未实名，1：已实名）',
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机号',
  `wechat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '微信',
  `qq` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'QQ号',
  `deviceid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '注册时设备ID',
  `ip` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '注册时IP',
  `api_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '接口令牌',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'cookie验证auth_key',
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '加密后密码',
  `password_pay` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '支付密码',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '找回密码token',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户邮箱',
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '用户头像url',
  `origin` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '来源',
  `online_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '在线状态 0 离线 1 在线',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '会员状态\r\n            1、正常\r\n            2、冻结\r\n            3、锁定\r\n            4、注销',
  `xima_plan_id` int(10) unsigned DEFAULT NULL COMMENT '洗码方案ID',
  `invite_agent_id` int(10) unsigned NOT NULL COMMENT '邀请代理ID',
  `invite_user_id` bigint(20) unsigned DEFAULT NULL COMMENT '邀请用户ID',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ck_user
-- ----------------------------
INSERT INTO `ck_user` VALUES ('1', '8888', null, null, null, '0', null, null, null, '1', '113.111.115.159', null, 'k3DGTi3IeNODQXg6EwZGGbGABqR-Oy3U', '$2y$13$BcmsNnnFFMg7IVEgoxXHLe/ImBr0ZlyV7putEyM24lvUb2hvul68i', null, null, null, '', 'backend', '0', '1', null, '1', null, '1546482044', '1546482044');
INSERT INTO `ck_user` VALUES ('2', 'wang123', null, null, null, '0', null, null, null, '865465034771781', '113.111.115.159', null, 'jyxbQ0rVjV1Q_VEYhOOFoMn9w-vONaod', '$2y$13$6gW1yHrazixHNnZmgqTcL.qgl4yecaTZqsDVsveFQPtt7zl4lYoT6', null, null, null, '', 'Other', '0', '1', null, '1', null, '1546493320', '1546500044');

-- ----------------------------
-- Table structure for `ck_user_account`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_account`;
CREATE TABLE `ck_user_account` (
  `user_id` bigint(20) NOT NULL COMMENT '会员编号',
  `available_amount` decimal(19,4) NOT NULL DEFAULT '0.0000' COMMENT '可用余额',
  `frozen_amount` decimal(19,4) NOT NULL DEFAULT '0.0000' COMMENT '冻结金额',
  `user_point` int(11) NOT NULL DEFAULT '0' COMMENT '会员积分',
  `xima_amount` decimal(19,4) NOT NULL DEFAULT '0.0000' COMMENT '可用洗码值',
  `total_xima_amount` decimal(19,4) unsigned NOT NULL DEFAULT '0.0000' COMMENT '累计洗码值',
  `frozen_withdraw_amount` decimal(19,4) unsigned NOT NULL DEFAULT '0.0000' COMMENT '未审核取款申请额度',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员账户表';

-- ----------------------------
-- Records of ck_user_account
-- ----------------------------
INSERT INTO `ck_user_account` VALUES ('1', '0.0000', '0.0000', '0', '0.0000', '0.0000', '0.0000', '1546482044', '1546482044');
INSERT INTO `ck_user_account` VALUES ('2', '0.0000', '0.0000', '0', '0.0000', '0.0000', '0.0000', '1546493320', '1546493320');

-- ----------------------------
-- Table structure for `ck_user_account_record`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_account_record`;
CREATE TABLE `ck_user_account_record` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '交易ID',
  `user_id` bigint(20) unsigned NOT NULL COMMENT '会员ID',
  `switch` tinyint(3) unsigned NOT NULL COMMENT '收支类型 1收入 2支出',
  `trade_no` varchar(32) DEFAULT NULL COMMENT '交易单号',
  `trade_type_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '交易类型ID',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `amount` decimal(19,4) NOT NULL COMMENT '收支金额',
  `after_amount` decimal(19,4) NOT NULL COMMENT '交易后余额',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户账户变更记录表';

-- ----------------------------
-- Records of ck_user_account_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_user_bank`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_bank`;
CREATE TABLE `ck_user_bank` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '银行账号ID',
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
  `apply_amount` decimal(19,4) NOT NULL COMMENT '申请存款金额',
  `status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '存款状态 1 申请中 2 已存入 0 已取消',
  `confirm_amount` decimal(19,4) unsigned DEFAULT NULL COMMENT '确认金额',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `audit_by_id` int(11) unsigned DEFAULT NULL COMMENT '处理人员ID',
  `audit_by_username` varchar(64) DEFAULT NULL COMMENT '处理人员',
  `audit_remark` varchar(255) DEFAULT NULL COMMENT '处理备注',
  `audit_at` int(20) unsigned DEFAULT NULL COMMENT '处理时间',
  `pay_channel` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '支付渠道 1 银行转账 2 支付宝 3 微信 4线上存款（第三方支付）',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户存款记录表';

-- ----------------------------
-- Records of ck_user_deposit
-- ----------------------------

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
-- Table structure for `ck_user_login_log`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_login_log`;
CREATE TABLE `ck_user_login_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录编号',
  `user_id` bigint(20) DEFAULT NULL COMMENT '会员编号',
  `username` varchar(64) DEFAULT NULL COMMENT '会员名称',
  `login_ip` varchar(50) DEFAULT NULL COMMENT '登录IP',
  `device_type` varchar(64) DEFAULT NULL COMMENT '设备类型',
  `client_type` varchar(64) DEFAULT NULL COMMENT '登录客户端类型\r\n',
  `client_version` varchar(255) DEFAULT NULL COMMENT '客户端版本号',
  `deviceid` varchar(255) DEFAULT NULL COMMENT '设备ID',
  `user_agent` varchar(255) DEFAULT NULL COMMENT '浏览器信息',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='会员登录日志';

-- ----------------------------
-- Records of ck_user_login_log
-- ----------------------------
INSERT INTO `ck_user_login_log` VALUES ('1', '2', 'wang123', '113.111.115.159', 'Other', 'Other', 'okhttp/3.11.0', '865465034771781', 'okhttp/3.11.0', '1546493321', '1546493321');
INSERT INTO `ck_user_login_log` VALUES ('2', '2', 'wang123', '112.96.132.164', 'Android', 'App', 'Chrome51.0.2074.203', '865465034771781', 'Mozilla/5.0 (Linux; Android 7.0; M5 Note Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/51.0.2074.203 Mobile Safari/537.36', '1546499992', '1546499992');

-- ----------------------------
-- Table structure for `ck_user_relate`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_relate`;
CREATE TABLE `ck_user_relate` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '关联ID',
  `user_id` bigint(20) unsigned NOT NULL COMMENT '用户ID',
  `relate_id` bigint(20) unsigned NOT NULL COMMENT '关联账号ID',
  `ip` varchar(64) DEFAULT NULL COMMENT '登录IP',
  `deviceid` varchar(255) DEFAULT NULL COMMENT '设备ID',
  `user_log_id` bigint(20) unsigned DEFAULT NULL COMMENT '用户日志ID',
  `relate_log_id` bigint(20) unsigned DEFAULT NULL COMMENT '关联用户日志ID',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_relate` (`user_id`,`relate_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户关联表';

-- ----------------------------
-- Records of ck_user_relate
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_user_stat`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_stat`;
CREATE TABLE `ck_user_stat` (
  `user_id` bigint(20) NOT NULL COMMENT '会员编号',
  `last_login_at` int(11) unsigned DEFAULT NULL COMMENT '最后登录时间',
  `last_logout_at` int(10) unsigned DEFAULT NULL COMMENT '最后登出时间',
  `login_number` int(10) unsigned DEFAULT NULL COMMENT '登录次数',
  `relate_number` int(10) unsigned DEFAULT '0' COMMENT '关联账号数量',
  `last_login_ip` varchar(64) DEFAULT NULL COMMENT '最后登录IP',
  `log_id` bigint(20) unsigned DEFAULT NULL COMMENT '登录日志ID',
  `online_duration` int(10) unsigned DEFAULT NULL COMMENT '在线时长',
  `deposit_number` int(11) DEFAULT NULL COMMENT '存款次数',
  `deposit_amount` decimal(10,2) DEFAULT NULL COMMENT '存款总额',
  `withdrawal_number` int(11) DEFAULT NULL COMMENT '取款次数',
  `withdrawal_amount` decimal(10,3) DEFAULT NULL COMMENT '取款总额',
  `bet_number` int(10) unsigned DEFAULT NULL COMMENT '投注次数',
  `bet_amount` decimal(10,3) unsigned DEFAULT NULL COMMENT '投注总额',
  `created_at` int(11) unsigned DEFAULT NULL COMMENT '创建日期',
  `updated_at` int(11) unsigned DEFAULT NULL COMMENT '修改日期',
  PRIMARY KEY (`user_id`),
  KEY `idx_log_id` (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员统计表';

-- ----------------------------
-- Records of ck_user_stat
-- ----------------------------
INSERT INTO `ck_user_stat` VALUES ('1', null, null, null, '0', null, null, null, null, null, null, null, null, null, '1546482044', '1546482044');
INSERT INTO `ck_user_stat` VALUES ('2', '1546499992', '1546500044', '2', '0', '112.96.132.164', '2', '613', null, null, null, null, null, null, '1546493320', '1546500044');

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

-- ----------------------------
-- Table structure for `ck_user_withdraw`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_withdraw`;
CREATE TABLE `ck_user_withdraw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '取款单号',
  `user_id` bigint(20) unsigned NOT NULL COMMENT '用户ID',
  `apply_amount` decimal(19,4) NOT NULL COMMENT '申请取款金额',
  `status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '取款状态 1 申请中 2 已完成  0 已取消',
  `free_amount` decimal(19,4) DEFAULT NULL COMMENT '免费额度',
  `withdraw_rate` decimal(6,4) DEFAULT NULL COMMENT '超额扣费率',
  `transfer_amount` decimal(19,4) DEFAULT NULL COMMENT '实际转账金额',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注信息',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户取款记录表';

-- ----------------------------
-- Records of ck_user_withdraw
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_user_xima_record`
-- ----------------------------
DROP TABLE IF EXISTS `ck_user_xima_record`;
CREATE TABLE `ck_user_xima_record` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '交易ID',
  `user_id` bigint(20) unsigned NOT NULL COMMENT '会员ID',
  `platform_id` int(11) NOT NULL COMMENT '平台ID',
  `game_type` varchar(64) NOT NULL COMMENT '游戏类型',
  `record_id` varchar(32) DEFAULT NULL COMMENT '投注单号',
  `bet_id` bigint(20) NOT NULL COMMENT '投注记录ID',
  `bet_amount` decimal(19,4) unsigned NOT NULL DEFAULT '0.0000' COMMENT '投注金额',
  `for_xm_amount` decimal(19,4) unsigned DEFAULT NULL COMMENT '参与洗码额度',
  `profit` decimal(19,4) DEFAULT NULL COMMENT '赢输',
  `xima_type` tinyint(3) unsigned DEFAULT NULL COMMENT '洗码类型 1单边 2双边',
  `xima_rate` decimal(6,4) DEFAULT NULL COMMENT '洗码率',
  `xima_limit` decimal(12,4) unsigned DEFAULT NULL COMMENT '洗码上限',
  `xima_plan_id` int(10) unsigned DEFAULT NULL COMMENT '洗码方案',
  `xima_amount` decimal(12,4) DEFAULT NULL COMMENT '洗码值',
  `real_xima_amount` decimal(12,4) unsigned DEFAULT NULL COMMENT '实得洗码值',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户账户变更记录表';

-- ----------------------------
-- Records of ck_user_xima_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_xima_level`
-- ----------------------------
DROP TABLE IF EXISTS `ck_xima_level`;
CREATE TABLE `ck_xima_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '返佣层级ID',
  `plan_id` int(10) unsigned NOT NULL COMMENT '洗码方案ID',
  `bet_amount` decimal(19,4) DEFAULT NULL COMMENT '有效投注额度',
  `bet_user_num` int(10) unsigned DEFAULT NULL COMMENT '投注用户数',
  `xima_limit` decimal(19,4) DEFAULT NULL COMMENT '返佣上限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_xima_level
-- ----------------------------

-- ----------------------------
-- Table structure for `ck_xima_plan`
-- ----------------------------
DROP TABLE IF EXISTS `ck_xima_plan`;
CREATE TABLE `ck_xima_plan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '代理洗码方案ID',
  `name` varchar(64) NOT NULL COMMENT '方案名称',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '启用状态0 禁用 1启用',
  `type` tinyint(3) unsigned DEFAULT '1' COMMENT '方案类别 1 用户 2代理',
  `agent_id` int(10) unsigned DEFAULT '0' COMMENT '方案创建者ID，0为系统',
  `is_default` tinyint(3) unsigned DEFAULT '0' COMMENT '是否为默认方案',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `created_at` int(10) unsigned DEFAULT NULL COMMENT '创建日期',
  `updated_at` int(10) unsigned DEFAULT NULL COMMENT '更新日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ck_xima_plan
-- ----------------------------
