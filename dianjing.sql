/*
 Navicat Premium Data Transfer

 Source Server         : xampp
 Source Server Type    : MySQL
 Source Server Version : 100119
 Source Host           : localhost:3306
 Source Schema         : dianjing

 Target Server Type    : MySQL
 Target Server Version : 100119
 File Encoding         : 65001

 Date: 29/08/2018 16:51:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dj_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `dj_admin_menu`;
CREATE TABLE `dj_admin_menu`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父菜单id',
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '菜单类型;1:有界面可访问菜单,2:无界面可访问菜单,0:只作为菜单',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '状态;1:显示,0:不显示',
  `list_order` float NOT NULL DEFAULT 10000 COMMENT '排序',
  `app` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '应用名',
  `controller` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '控制器名',
  `action` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '操作名称',
  `param` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '额外参数',
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单名称',
  `icon` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '菜单图标',
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '备注',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `status`(`status`) USING BTREE,
  INDEX `parent_id`(`parent_id`) USING BTREE,
  INDEX `controller`(`controller`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 221 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '后台菜单表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_admin_menu
-- ----------------------------
INSERT INTO `dj_admin_menu` VALUES (1, 0, 0, 0, 20, 'admin', 'Plugin', 'default', '', '插件中心', 'cloud', '插件中心');
INSERT INTO `dj_admin_menu` VALUES (2, 1, 1, 1, 10000, 'admin', 'Hook', 'index', '', '钩子管理', '', '钩子管理');
INSERT INTO `dj_admin_menu` VALUES (3, 2, 1, 0, 10000, 'admin', 'Hook', 'plugins', '', '钩子插件管理', '', '钩子插件管理');
INSERT INTO `dj_admin_menu` VALUES (4, 2, 2, 0, 10000, 'admin', 'Hook', 'pluginListOrder', '', '钩子插件排序', '', '钩子插件排序');
INSERT INTO `dj_admin_menu` VALUES (5, 2, 1, 0, 10000, 'admin', 'Hook', 'sync', '', '同步钩子', '', '同步钩子');
INSERT INTO `dj_admin_menu` VALUES (6, 0, 0, 1, 0, 'admin', 'Setting', 'default', '', '设置', 'cogs', '系统设置入口');
INSERT INTO `dj_admin_menu` VALUES (7, 6, 1, 1, 50, 'admin', 'Link', 'index', '', '友情链接', '', '友情链接管理');
INSERT INTO `dj_admin_menu` VALUES (8, 7, 1, 0, 10000, 'admin', 'Link', 'add', '', '添加友情链接', '', '添加友情链接');
INSERT INTO `dj_admin_menu` VALUES (9, 7, 2, 0, 10000, 'admin', 'Link', 'addPost', '', '添加友情链接提交保存', '', '添加友情链接提交保存');
INSERT INTO `dj_admin_menu` VALUES (10, 7, 1, 0, 10000, 'admin', 'Link', 'edit', '', '编辑友情链接', '', '编辑友情链接');
INSERT INTO `dj_admin_menu` VALUES (11, 7, 2, 0, 10000, 'admin', 'Link', 'editPost', '', '编辑友情链接提交保存', '', '编辑友情链接提交保存');
INSERT INTO `dj_admin_menu` VALUES (12, 7, 2, 0, 10000, 'admin', 'Link', 'delete', '', '删除友情链接', '', '删除友情链接');
INSERT INTO `dj_admin_menu` VALUES (13, 7, 2, 0, 10000, 'admin', 'Link', 'listOrder', '', '友情链接排序', '', '友情链接排序');
INSERT INTO `dj_admin_menu` VALUES (14, 7, 2, 0, 10000, 'admin', 'Link', 'toggle', '', '友情链接显示隐藏', '', '友情链接显示隐藏');
INSERT INTO `dj_admin_menu` VALUES (15, 6, 1, 1, 10, 'admin', 'Mailer', 'index', '', '邮箱配置', '', '邮箱配置');
INSERT INTO `dj_admin_menu` VALUES (16, 15, 2, 0, 10000, 'admin', 'Mailer', 'indexPost', '', '邮箱配置提交保存', '', '邮箱配置提交保存');
INSERT INTO `dj_admin_menu` VALUES (17, 15, 1, 0, 10000, 'admin', 'Mailer', 'template', '', '邮件模板', '', '邮件模板');
INSERT INTO `dj_admin_menu` VALUES (18, 15, 2, 0, 10000, 'admin', 'Mailer', 'templatePost', '', '邮件模板提交', '', '邮件模板提交');
INSERT INTO `dj_admin_menu` VALUES (19, 15, 1, 0, 10000, 'admin', 'Mailer', 'test', '', '邮件发送测试', '', '邮件发送测试');
INSERT INTO `dj_admin_menu` VALUES (20, 6, 1, 0, 10000, 'admin', 'Menu', 'index', '', '后台菜单', '', '后台菜单管理');
INSERT INTO `dj_admin_menu` VALUES (21, 20, 1, 0, 10000, 'admin', 'Menu', 'lists', '', '所有菜单', '', '后台所有菜单列表');
INSERT INTO `dj_admin_menu` VALUES (22, 20, 1, 0, 10000, 'admin', 'Menu', 'add', '', '后台菜单添加', '', '后台菜单添加');
INSERT INTO `dj_admin_menu` VALUES (23, 20, 2, 0, 10000, 'admin', 'Menu', 'addPost', '', '后台菜单添加提交保存', '', '后台菜单添加提交保存');
INSERT INTO `dj_admin_menu` VALUES (24, 20, 1, 0, 10000, 'admin', 'Menu', 'edit', '', '后台菜单编辑', '', '后台菜单编辑');
INSERT INTO `dj_admin_menu` VALUES (25, 20, 2, 0, 10000, 'admin', 'Menu', 'editPost', '', '后台菜单编辑提交保存', '', '后台菜单编辑提交保存');
INSERT INTO `dj_admin_menu` VALUES (26, 20, 2, 0, 10000, 'admin', 'Menu', 'delete', '', '后台菜单删除', '', '后台菜单删除');
INSERT INTO `dj_admin_menu` VALUES (27, 20, 2, 0, 10000, 'admin', 'Menu', 'listOrder', '', '后台菜单排序', '', '后台菜单排序');
INSERT INTO `dj_admin_menu` VALUES (28, 20, 1, 0, 10000, 'admin', 'Menu', 'getActions', '', '导入新后台菜单', '', '导入新后台菜单');
INSERT INTO `dj_admin_menu` VALUES (29, 6, 1, 1, 30, 'admin', 'Nav', 'index', '', '导航管理', '', '导航管理');
INSERT INTO `dj_admin_menu` VALUES (30, 29, 1, 0, 10000, 'admin', 'Nav', 'add', '', '添加导航', '', '添加导航');
INSERT INTO `dj_admin_menu` VALUES (31, 29, 2, 0, 10000, 'admin', 'Nav', 'addPost', '', '添加导航提交保存', '', '添加导航提交保存');
INSERT INTO `dj_admin_menu` VALUES (32, 29, 1, 0, 10000, 'admin', 'Nav', 'edit', '', '编辑导航', '', '编辑导航');
INSERT INTO `dj_admin_menu` VALUES (33, 29, 2, 0, 10000, 'admin', 'Nav', 'editPost', '', '编辑导航提交保存', '', '编辑导航提交保存');
INSERT INTO `dj_admin_menu` VALUES (34, 29, 2, 0, 10000, 'admin', 'Nav', 'delete', '', '删除导航', '', '删除导航');
INSERT INTO `dj_admin_menu` VALUES (35, 29, 1, 0, 10000, 'admin', 'NavMenu', 'index', '', '导航菜单', '', '导航菜单');
INSERT INTO `dj_admin_menu` VALUES (36, 35, 1, 0, 10000, 'admin', 'NavMenu', 'add', '', '添加导航菜单', '', '添加导航菜单');
INSERT INTO `dj_admin_menu` VALUES (37, 35, 2, 0, 10000, 'admin', 'NavMenu', 'addPost', '', '添加导航菜单提交保存', '', '添加导航菜单提交保存');
INSERT INTO `dj_admin_menu` VALUES (38, 35, 1, 0, 10000, 'admin', 'NavMenu', 'edit', '', '编辑导航菜单', '', '编辑导航菜单');
INSERT INTO `dj_admin_menu` VALUES (39, 35, 2, 0, 10000, 'admin', 'NavMenu', 'editPost', '', '编辑导航菜单提交保存', '', '编辑导航菜单提交保存');
INSERT INTO `dj_admin_menu` VALUES (40, 35, 2, 0, 10000, 'admin', 'NavMenu', 'delete', '', '删除导航菜单', '', '删除导航菜单');
INSERT INTO `dj_admin_menu` VALUES (41, 35, 2, 0, 10000, 'admin', 'NavMenu', 'listOrder', '', '导航菜单排序', '', '导航菜单排序');
INSERT INTO `dj_admin_menu` VALUES (42, 1, 1, 1, 10000, 'admin', 'Plugin', 'index', '', '插件列表', '', '插件列表');
INSERT INTO `dj_admin_menu` VALUES (43, 42, 2, 0, 10000, 'admin', 'Plugin', 'toggle', '', '插件启用禁用', '', '插件启用禁用');
INSERT INTO `dj_admin_menu` VALUES (44, 42, 1, 0, 10000, 'admin', 'Plugin', 'setting', '', '插件设置', '', '插件设置');
INSERT INTO `dj_admin_menu` VALUES (45, 42, 2, 0, 10000, 'admin', 'Plugin', 'settingPost', '', '插件设置提交', '', '插件设置提交');
INSERT INTO `dj_admin_menu` VALUES (46, 42, 2, 0, 10000, 'admin', 'Plugin', 'install', '', '插件安装', '', '插件安装');
INSERT INTO `dj_admin_menu` VALUES (47, 42, 2, 0, 10000, 'admin', 'Plugin', 'update', '', '插件更新', '', '插件更新');
INSERT INTO `dj_admin_menu` VALUES (48, 42, 2, 0, 10000, 'admin', 'Plugin', 'uninstall', '', '卸载插件', '', '卸载插件');
INSERT INTO `dj_admin_menu` VALUES (49, 109, 0, 1, 10000, 'admin', 'User', 'default', '', '管理组', '', '管理组');
INSERT INTO `dj_admin_menu` VALUES (50, 49, 1, 1, 10000, 'admin', 'Rbac', 'index', '', '角色管理', '', '角色管理');
INSERT INTO `dj_admin_menu` VALUES (51, 50, 1, 0, 10000, 'admin', 'Rbac', 'roleAdd', '', '添加角色', '', '添加角色');
INSERT INTO `dj_admin_menu` VALUES (52, 50, 2, 0, 10000, 'admin', 'Rbac', 'roleAddPost', '', '添加角色提交', '', '添加角色提交');
INSERT INTO `dj_admin_menu` VALUES (53, 50, 1, 0, 10000, 'admin', 'Rbac', 'roleEdit', '', '编辑角色', '', '编辑角色');
INSERT INTO `dj_admin_menu` VALUES (54, 50, 2, 0, 10000, 'admin', 'Rbac', 'roleEditPost', '', '编辑角色提交', '', '编辑角色提交');
INSERT INTO `dj_admin_menu` VALUES (55, 50, 2, 0, 10000, 'admin', 'Rbac', 'roleDelete', '', '删除角色', '', '删除角色');
INSERT INTO `dj_admin_menu` VALUES (56, 50, 1, 0, 10000, 'admin', 'Rbac', 'authorize', '', '设置角色权限', '', '设置角色权限');
INSERT INTO `dj_admin_menu` VALUES (57, 50, 2, 0, 10000, 'admin', 'Rbac', 'authorizePost', '', '角色授权提交', '', '角色授权提交');
INSERT INTO `dj_admin_menu` VALUES (58, 0, 1, 1, 10000, 'admin', 'RecycleBin', 'index', '', '回收站', 'recycle', '回收站');
INSERT INTO `dj_admin_menu` VALUES (59, 58, 2, 0, 10000, 'admin', 'RecycleBin', 'restore', '', '回收站还原', '', '回收站还原');
INSERT INTO `dj_admin_menu` VALUES (60, 58, 2, 0, 10000, 'admin', 'RecycleBin', 'delete', '', '回收站彻底删除', '', '回收站彻底删除');
INSERT INTO `dj_admin_menu` VALUES (61, 6, 1, 1, 10000, 'admin', 'Route', 'index', '', 'URL美化', '', 'URL规则管理');
INSERT INTO `dj_admin_menu` VALUES (62, 61, 1, 0, 10000, 'admin', 'Route', 'add', '', '添加路由规则', '', '添加路由规则');
INSERT INTO `dj_admin_menu` VALUES (63, 61, 2, 0, 10000, 'admin', 'Route', 'addPost', '', '添加路由规则提交', '', '添加路由规则提交');
INSERT INTO `dj_admin_menu` VALUES (64, 61, 1, 0, 10000, 'admin', 'Route', 'edit', '', '路由规则编辑', '', '路由规则编辑');
INSERT INTO `dj_admin_menu` VALUES (65, 61, 2, 0, 10000, 'admin', 'Route', 'editPost', '', '路由规则编辑提交', '', '路由规则编辑提交');
INSERT INTO `dj_admin_menu` VALUES (66, 61, 2, 0, 10000, 'admin', 'Route', 'delete', '', '路由规则删除', '', '路由规则删除');
INSERT INTO `dj_admin_menu` VALUES (67, 61, 2, 0, 10000, 'admin', 'Route', 'ban', '', '路由规则禁用', '', '路由规则禁用');
INSERT INTO `dj_admin_menu` VALUES (68, 61, 2, 0, 10000, 'admin', 'Route', 'open', '', '路由规则启用', '', '路由规则启用');
INSERT INTO `dj_admin_menu` VALUES (69, 61, 2, 0, 10000, 'admin', 'Route', 'listOrder', '', '路由规则排序', '', '路由规则排序');
INSERT INTO `dj_admin_menu` VALUES (70, 61, 1, 0, 10000, 'admin', 'Route', 'select', '', '选择URL', '', '选择URL');
INSERT INTO `dj_admin_menu` VALUES (71, 6, 1, 1, 0, 'admin', 'Setting', 'site', '', '网站信息', '', '网站信息');
INSERT INTO `dj_admin_menu` VALUES (72, 71, 2, 0, 10000, 'admin', 'Setting', 'sitePost', '', '网站信息设置提交', '', '网站信息设置提交');
INSERT INTO `dj_admin_menu` VALUES (73, 6, 1, 0, 10000, 'admin', 'Setting', 'password', '', '密码修改', '', '密码修改');
INSERT INTO `dj_admin_menu` VALUES (74, 73, 2, 0, 10000, 'admin', 'Setting', 'passwordPost', '', '密码修改提交', '', '密码修改提交');
INSERT INTO `dj_admin_menu` VALUES (75, 6, 1, 1, 10000, 'admin', 'Setting', 'upload', '', '上传设置', '', '上传设置');
INSERT INTO `dj_admin_menu` VALUES (76, 75, 2, 0, 10000, 'admin', 'Setting', 'uploadPost', '', '上传设置提交', '', '上传设置提交');
INSERT INTO `dj_admin_menu` VALUES (77, 6, 1, 0, 10000, 'admin', 'Setting', 'clearCache', '', '清除缓存', '', '清除缓存');
INSERT INTO `dj_admin_menu` VALUES (78, 6, 1, 1, 40, 'admin', 'Slide', 'index', '', '幻灯片管理', '', '幻灯片管理');
INSERT INTO `dj_admin_menu` VALUES (79, 78, 1, 0, 10000, 'admin', 'Slide', 'add', '', '添加幻灯片', '', '添加幻灯片');
INSERT INTO `dj_admin_menu` VALUES (80, 78, 2, 0, 10000, 'admin', 'Slide', 'addPost', '', '添加幻灯片提交', '', '添加幻灯片提交');
INSERT INTO `dj_admin_menu` VALUES (81, 78, 1, 0, 10000, 'admin', 'Slide', 'edit', '', '编辑幻灯片', '', '编辑幻灯片');
INSERT INTO `dj_admin_menu` VALUES (82, 78, 2, 0, 10000, 'admin', 'Slide', 'editPost', '', '编辑幻灯片提交', '', '编辑幻灯片提交');
INSERT INTO `dj_admin_menu` VALUES (83, 78, 2, 0, 10000, 'admin', 'Slide', 'delete', '', '删除幻灯片', '', '删除幻灯片');
INSERT INTO `dj_admin_menu` VALUES (84, 78, 1, 0, 10000, 'admin', 'SlideItem', 'index', '', '幻灯片页面列表', '', '幻灯片页面列表');
INSERT INTO `dj_admin_menu` VALUES (85, 84, 1, 0, 10000, 'admin', 'SlideItem', 'add', '', '幻灯片页面添加', '', '幻灯片页面添加');
INSERT INTO `dj_admin_menu` VALUES (86, 84, 2, 0, 10000, 'admin', 'SlideItem', 'addPost', '', '幻灯片页面添加提交', '', '幻灯片页面添加提交');
INSERT INTO `dj_admin_menu` VALUES (87, 84, 1, 0, 10000, 'admin', 'SlideItem', 'edit', '', '幻灯片页面编辑', '', '幻灯片页面编辑');
INSERT INTO `dj_admin_menu` VALUES (88, 84, 2, 0, 10000, 'admin', 'SlideItem', 'editPost', '', '幻灯片页面编辑提交', '', '幻灯片页面编辑提交');
INSERT INTO `dj_admin_menu` VALUES (89, 84, 2, 0, 10000, 'admin', 'SlideItem', 'delete', '', '幻灯片页面删除', '', '幻灯片页面删除');
INSERT INTO `dj_admin_menu` VALUES (90, 84, 2, 0, 10000, 'admin', 'SlideItem', 'ban', '', '幻灯片页面隐藏', '', '幻灯片页面隐藏');
INSERT INTO `dj_admin_menu` VALUES (91, 84, 2, 0, 10000, 'admin', 'SlideItem', 'cancelBan', '', '幻灯片页面显示', '', '幻灯片页面显示');
INSERT INTO `dj_admin_menu` VALUES (92, 84, 2, 0, 10000, 'admin', 'SlideItem', 'listOrder', '', '幻灯片页面排序', '', '幻灯片页面排序');
INSERT INTO `dj_admin_menu` VALUES (93, 6, 1, 1, 10000, 'admin', 'Storage', 'index', '', '文件存储', '', '文件存储');
INSERT INTO `dj_admin_menu` VALUES (94, 93, 2, 0, 10000, 'admin', 'Storage', 'settingPost', '', '文件存储设置提交', '', '文件存储设置提交');
INSERT INTO `dj_admin_menu` VALUES (95, 6, 1, 1, 20, 'admin', 'Theme', 'index', '', '模板管理', '', '模板管理');
INSERT INTO `dj_admin_menu` VALUES (96, 95, 1, 0, 10000, 'admin', 'Theme', 'install', '', '安装模板', '', '安装模板');
INSERT INTO `dj_admin_menu` VALUES (97, 95, 2, 0, 10000, 'admin', 'Theme', 'uninstall', '', '卸载模板', '', '卸载模板');
INSERT INTO `dj_admin_menu` VALUES (98, 95, 2, 0, 10000, 'admin', 'Theme', 'installTheme', '', '模板安装', '', '模板安装');
INSERT INTO `dj_admin_menu` VALUES (99, 95, 2, 0, 10000, 'admin', 'Theme', 'update', '', '模板更新', '', '模板更新');
INSERT INTO `dj_admin_menu` VALUES (100, 95, 2, 0, 10000, 'admin', 'Theme', 'active', '', '启用模板', '', '启用模板');
INSERT INTO `dj_admin_menu` VALUES (101, 95, 1, 0, 10000, 'admin', 'Theme', 'files', '', '模板文件列表', '', '启用模板');
INSERT INTO `dj_admin_menu` VALUES (102, 95, 1, 0, 10000, 'admin', 'Theme', 'fileSetting', '', '模板文件设置', '', '模板文件设置');
INSERT INTO `dj_admin_menu` VALUES (103, 95, 1, 0, 10000, 'admin', 'Theme', 'fileArrayData', '', '模板文件数组数据列表', '', '模板文件数组数据列表');
INSERT INTO `dj_admin_menu` VALUES (104, 95, 2, 0, 10000, 'admin', 'Theme', 'fileArrayDataEdit', '', '模板文件数组数据添加编辑', '', '模板文件数组数据添加编辑');
INSERT INTO `dj_admin_menu` VALUES (105, 95, 2, 0, 10000, 'admin', 'Theme', 'fileArrayDataEditPost', '', '模板文件数组数据添加编辑提交保存', '', '模板文件数组数据添加编辑提交保存');
INSERT INTO `dj_admin_menu` VALUES (106, 95, 2, 0, 10000, 'admin', 'Theme', 'fileArrayDataDelete', '', '模板文件数组数据删除', '', '模板文件数组数据删除');
INSERT INTO `dj_admin_menu` VALUES (107, 95, 2, 0, 10000, 'admin', 'Theme', 'settingPost', '', '模板文件编辑提交保存', '', '模板文件编辑提交保存');
INSERT INTO `dj_admin_menu` VALUES (108, 95, 1, 0, 10000, 'admin', 'Theme', 'dataSource', '', '模板文件设置数据源', '', '模板文件设置数据源');
INSERT INTO `dj_admin_menu` VALUES (109, 0, 0, 1, 10, 'user', 'AdminIndex', 'default', '', '用户管理', 'group', '用户管理');
INSERT INTO `dj_admin_menu` VALUES (110, 49, 1, 1, 10000, 'admin', 'User', 'index', '', '管理员', '', '管理员管理');
INSERT INTO `dj_admin_menu` VALUES (111, 110, 1, 0, 10000, 'admin', 'User', 'add', '', '管理员添加', '', '管理员添加');
INSERT INTO `dj_admin_menu` VALUES (112, 110, 2, 0, 10000, 'admin', 'User', 'addPost', '', '管理员添加提交', '', '管理员添加提交');
INSERT INTO `dj_admin_menu` VALUES (113, 110, 1, 0, 10000, 'admin', 'User', 'edit', '', '管理员编辑', '', '管理员编辑');
INSERT INTO `dj_admin_menu` VALUES (114, 110, 2, 0, 10000, 'admin', 'User', 'editPost', '', '管理员编辑提交', '', '管理员编辑提交');
INSERT INTO `dj_admin_menu` VALUES (115, 110, 1, 0, 10000, 'admin', 'User', 'userInfo', '', '个人信息', '', '管理员个人信息修改');
INSERT INTO `dj_admin_menu` VALUES (116, 110, 2, 0, 10000, 'admin', 'User', 'userInfoPost', '', '管理员个人信息修改提交', '', '管理员个人信息修改提交');
INSERT INTO `dj_admin_menu` VALUES (117, 110, 2, 0, 10000, 'admin', 'User', 'delete', '', '管理员删除', '', '管理员删除');
INSERT INTO `dj_admin_menu` VALUES (118, 110, 2, 0, 10000, 'admin', 'User', 'ban', '', '停用管理员', '', '停用管理员');
INSERT INTO `dj_admin_menu` VALUES (119, 110, 2, 0, 10000, 'admin', 'User', 'cancelBan', '', '启用管理员', '', '启用管理员');
INSERT INTO `dj_admin_menu` VALUES (120, 0, 0, 0, 30, 'portal', 'AdminIndex', 'default', '', '门户管理', 'th', '门户管理');
INSERT INTO `dj_admin_menu` VALUES (121, 120, 1, 1, 10000, 'portal', 'AdminArticle', 'index', '', '文章管理', '', '文章列表');
INSERT INTO `dj_admin_menu` VALUES (122, 121, 1, 0, 10000, 'portal', 'AdminArticle', 'add', '', '添加文章', '', '添加文章');
INSERT INTO `dj_admin_menu` VALUES (123, 121, 2, 0, 10000, 'portal', 'AdminArticle', 'addPost', '', '添加文章提交', '', '添加文章提交');
INSERT INTO `dj_admin_menu` VALUES (124, 121, 1, 0, 10000, 'portal', 'AdminArticle', 'edit', '', '编辑文章', '', '编辑文章');
INSERT INTO `dj_admin_menu` VALUES (125, 121, 2, 0, 10000, 'portal', 'AdminArticle', 'editPost', '', '编辑文章提交', '', '编辑文章提交');
INSERT INTO `dj_admin_menu` VALUES (126, 121, 2, 0, 10000, 'portal', 'AdminArticle', 'delete', '', '文章删除', '', '文章删除');
INSERT INTO `dj_admin_menu` VALUES (127, 121, 2, 0, 10000, 'portal', 'AdminArticle', 'publish', '', '文章发布', '', '文章发布');
INSERT INTO `dj_admin_menu` VALUES (128, 121, 2, 0, 10000, 'portal', 'AdminArticle', 'top', '', '文章置顶', '', '文章置顶');
INSERT INTO `dj_admin_menu` VALUES (129, 121, 2, 0, 10000, 'portal', 'AdminArticle', 'recommend', '', '文章推荐', '', '文章推荐');
INSERT INTO `dj_admin_menu` VALUES (130, 121, 2, 0, 10000, 'portal', 'AdminArticle', 'listOrder', '', '文章排序', '', '文章排序');
INSERT INTO `dj_admin_menu` VALUES (131, 120, 1, 1, 10000, 'portal', 'AdminCategory', 'index', '', '分类管理', '', '文章分类列表');
INSERT INTO `dj_admin_menu` VALUES (132, 131, 1, 0, 10000, 'portal', 'AdminCategory', 'add', '', '添加文章分类', '', '添加文章分类');
INSERT INTO `dj_admin_menu` VALUES (133, 131, 2, 0, 10000, 'portal', 'AdminCategory', 'addPost', '', '添加文章分类提交', '', '添加文章分类提交');
INSERT INTO `dj_admin_menu` VALUES (134, 131, 1, 0, 10000, 'portal', 'AdminCategory', 'edit', '', '编辑文章分类', '', '编辑文章分类');
INSERT INTO `dj_admin_menu` VALUES (135, 131, 2, 0, 10000, 'portal', 'AdminCategory', 'editPost', '', '编辑文章分类提交', '', '编辑文章分类提交');
INSERT INTO `dj_admin_menu` VALUES (136, 131, 1, 0, 10000, 'portal', 'AdminCategory', 'select', '', '文章分类选择对话框', '', '文章分类选择对话框');
INSERT INTO `dj_admin_menu` VALUES (137, 131, 2, 0, 10000, 'portal', 'AdminCategory', 'listOrder', '', '文章分类排序', '', '文章分类排序');
INSERT INTO `dj_admin_menu` VALUES (138, 131, 2, 0, 10000, 'portal', 'AdminCategory', 'delete', '', '删除文章分类', '', '删除文章分类');
INSERT INTO `dj_admin_menu` VALUES (139, 120, 1, 1, 10000, 'portal', 'AdminPage', 'index', '', '页面管理', '', '页面管理');
INSERT INTO `dj_admin_menu` VALUES (140, 139, 1, 0, 10000, 'portal', 'AdminPage', 'add', '', '添加页面', '', '添加页面');
INSERT INTO `dj_admin_menu` VALUES (141, 139, 2, 0, 10000, 'portal', 'AdminPage', 'addPost', '', '添加页面提交', '', '添加页面提交');
INSERT INTO `dj_admin_menu` VALUES (142, 139, 1, 0, 10000, 'portal', 'AdminPage', 'edit', '', '编辑页面', '', '编辑页面');
INSERT INTO `dj_admin_menu` VALUES (143, 139, 2, 0, 10000, 'portal', 'AdminPage', 'editPost', '', '编辑页面提交', '', '编辑页面提交');
INSERT INTO `dj_admin_menu` VALUES (144, 139, 2, 0, 10000, 'portal', 'AdminPage', 'delete', '', '删除页面', '', '删除页面');
INSERT INTO `dj_admin_menu` VALUES (145, 120, 1, 1, 10000, 'portal', 'AdminTag', 'index', '', '文章标签', '', '文章标签');
INSERT INTO `dj_admin_menu` VALUES (146, 145, 1, 0, 10000, 'portal', 'AdminTag', 'add', '', '添加文章标签', '', '添加文章标签');
INSERT INTO `dj_admin_menu` VALUES (147, 145, 2, 0, 10000, 'portal', 'AdminTag', 'addPost', '', '添加文章标签提交', '', '添加文章标签提交');
INSERT INTO `dj_admin_menu` VALUES (148, 145, 2, 0, 10000, 'portal', 'AdminTag', 'upStatus', '', '更新标签状态', '', '更新标签状态');
INSERT INTO `dj_admin_menu` VALUES (149, 145, 2, 0, 10000, 'portal', 'AdminTag', 'delete', '', '删除文章标签', '', '删除文章标签');
INSERT INTO `dj_admin_menu` VALUES (150, 0, 1, 0, 10000, 'user', 'AdminAsset', 'index', '', '资源管理', 'file', '资源管理列表');
INSERT INTO `dj_admin_menu` VALUES (151, 150, 2, 0, 10000, 'user', 'AdminAsset', 'delete', '', '删除文件', '', '删除文件');
INSERT INTO `dj_admin_menu` VALUES (152, 109, 0, 1, 10000, 'user', 'AdminIndex', 'default1', '', '用户组', '', '用户组');
INSERT INTO `dj_admin_menu` VALUES (153, 152, 1, 1, 10000, 'user', 'AdminIndex', 'index', '', '本站用户', '', '本站用户');
INSERT INTO `dj_admin_menu` VALUES (154, 153, 2, 0, 10000, 'user', 'AdminIndex', 'ban', '', '本站用户拉黑', '', '本站用户拉黑');
INSERT INTO `dj_admin_menu` VALUES (155, 153, 2, 0, 10000, 'user', 'AdminIndex', 'cancelBan', '', '本站用户启用', '', '本站用户启用');
INSERT INTO `dj_admin_menu` VALUES (156, 152, 1, 1, 10000, 'user', 'AdminOauth', 'index', '', '第三方用户', '', '第三方用户');
INSERT INTO `dj_admin_menu` VALUES (157, 156, 2, 0, 10000, 'user', 'AdminOauth', 'delete', '', '删除第三方用户绑定', '', '删除第三方用户绑定');
INSERT INTO `dj_admin_menu` VALUES (158, 6, 1, 1, 10000, 'user', 'AdminUserAction', 'index', '', '用户操作管理', '', '用户操作管理');
INSERT INTO `dj_admin_menu` VALUES (159, 158, 1, 0, 10000, 'user', 'AdminUserAction', 'edit', '', '编辑用户操作', '', '编辑用户操作');
INSERT INTO `dj_admin_menu` VALUES (160, 158, 2, 0, 10000, 'user', 'AdminUserAction', 'editPost', '', '编辑用户操作提交', '', '编辑用户操作提交');
INSERT INTO `dj_admin_menu` VALUES (161, 158, 1, 0, 10000, 'user', 'AdminUserAction', 'sync', '', '同步用户操作', '', '同步用户操作');
INSERT INTO `dj_admin_menu` VALUES (162, 0, 1, 1, 10000, 'admin', 'Currency', 'default', '', '虚拟币', 'money', '');
INSERT INTO `dj_admin_menu` VALUES (163, 162, 1, 1, 10000, 'admin', 'currency', 'index', '', '币值列表', '', '');
INSERT INTO `dj_admin_menu` VALUES (164, 163, 1, 0, 10000, 'admin', 'Currency', 'add', '', '添加虚拟币', '', '添加虚拟币');
INSERT INTO `dj_admin_menu` VALUES (165, 163, 2, 0, 10000, 'admin', 'Currency', 'addPost', '', '添加虚拟币保存', '', '添加虚拟币保存');
INSERT INTO `dj_admin_menu` VALUES (166, 163, 2, 0, 10000, 'admin', 'Currency', 'update', '', '停用启用虚拟币', '', '停用启用虚拟币');
INSERT INTO `dj_admin_menu` VALUES (167, 163, 2, 0, 10000, 'admin', 'Currency', 'delete', '', '删除虚拟币', '', '删除虚拟币');
INSERT INTO `dj_admin_menu` VALUES (168, 163, 1, 0, 10000, 'admin', 'Currency', 'edit', '', '编辑虚拟币', '', '编辑虚拟币');
INSERT INTO `dj_admin_menu` VALUES (169, 163, 2, 0, 10000, 'admin', 'Currency', 'editPost', '', '编辑虚拟币提交保存', '', '编辑虚拟币提交保存');
INSERT INTO `dj_admin_menu` VALUES (170, 0, 1, 1, 10000, 'admin', 'goods', 'default', '', '商品', 'shopping-cart', '');
INSERT INTO `dj_admin_menu` VALUES (171, 170, 1, 1, 10000, 'admin', 'goods', 'index', '', '商品列表', '', '');
INSERT INTO `dj_admin_menu` VALUES (172, 171, 1, 0, 10000, 'admin', 'Goods', 'add', '', '添加商品', '', '添加商品');
INSERT INTO `dj_admin_menu` VALUES (173, 171, 2, 0, 10000, 'admin', 'Goods', 'addPost', '', '添加商品保存', '', '添加商品保存');
INSERT INTO `dj_admin_menu` VALUES (174, 171, 2, 0, 10000, 'admin', 'Goods', 'update', '', '停用启用商品', '', '停用启用商品');
INSERT INTO `dj_admin_menu` VALUES (175, 171, 2, 0, 10000, 'admin', 'Goods', 'delete', '', '删除商品', '', '删除商品');
INSERT INTO `dj_admin_menu` VALUES (176, 171, 1, 0, 10000, 'admin', 'Goods', 'edit', '', '编辑商品', '', '编辑商品');
INSERT INTO `dj_admin_menu` VALUES (177, 171, 2, 0, 10000, 'admin', 'Goods', 'editPost', '', '编辑商品提交保存', '', '编辑商品提交保存');
INSERT INTO `dj_admin_menu` VALUES (178, 0, 1, 1, 10000, 'admin', 'Match', 'default', '', '比赛', 'gamepad', '');
INSERT INTO `dj_admin_menu` VALUES (179, 178, 1, 1, 10000, 'admin', 'Match', 'index', '', '赛事管理', '', '');
INSERT INTO `dj_admin_menu` VALUES (180, 178, 1, 1, 10000, 'admin', 'Classify', 'default', '', '各种分类', '', '');
INSERT INTO `dj_admin_menu` VALUES (181, 192, 2, 0, 10000, 'admin', 'Classify', 'addPost', '', '添加赛事保存', '', '添加赛事保存');
INSERT INTO `dj_admin_menu` VALUES (182, 192, 2, 0, 10000, 'admin', 'Classify', 'update', '', '停用启用赛事', '', '停用启用赛事');
INSERT INTO `dj_admin_menu` VALUES (183, 192, 2, 0, 10000, 'admin', 'Classify', 'delete', '', '删除赛事', '', '删除赛事');
INSERT INTO `dj_admin_menu` VALUES (184, 192, 2, 0, 10000, 'admin', 'Classify', 'editPost', '', '编辑赛事保存', '', '编辑赛事保存');
INSERT INTO `dj_admin_menu` VALUES (190, 178, 1, 1, 10000, 'admin', 'WarTeam', 'index', '', '战队列表', '', '战队列表');
INSERT INTO `dj_admin_menu` VALUES (192, 180, 1, 1, 10000, 'admin', 'Classify', 'index', '', '赛事分类', '', '分类列表');
INSERT INTO `dj_admin_menu` VALUES (193, 180, 1, 1, 10000, 'admin', 'MatchDisc', 'index', '', '盘分类', '', '盘分类');
INSERT INTO `dj_admin_menu` VALUES (194, 193, 2, 0, 10000, 'admin', 'MatchDisc', 'addPost', '', '添加盘分类保存', '', '添加盘分类保存');
INSERT INTO `dj_admin_menu` VALUES (195, 193, 2, 0, 10000, 'admin', 'MatchDisc', 'update', '', '停用启用盘分类', '', '停用启用盘分类');
INSERT INTO `dj_admin_menu` VALUES (196, 193, 2, 0, 10000, 'admin', 'MatchDisc', 'delete', '', '删除盘分类', '', '删除盘分类');
INSERT INTO `dj_admin_menu` VALUES (197, 193, 2, 0, 10000, 'admin', 'MatchDisc', 'editPost', '', '编辑盘分类保存', '', '编辑盘分类保存');
INSERT INTO `dj_admin_menu` VALUES (198, 180, 1, 1, 10000, 'admin', 'MatchBureau', 'index', '', '局名称', '', '局名称');
INSERT INTO `dj_admin_menu` VALUES (199, 198, 2, 0, 10000, 'admin', 'MatchBureau', 'addPost', '', '添加局名称保存', '', '添加局名称保存');
INSERT INTO `dj_admin_menu` VALUES (200, 198, 2, 0, 10000, 'admin', 'MatchBureau', 'update', '', '停用启用局名称', '', '停用启用局名称');
INSERT INTO `dj_admin_menu` VALUES (201, 198, 2, 0, 10000, 'admin', 'MatchBureau', 'delete', '', '删除局名称', '', '删除局名称');
INSERT INTO `dj_admin_menu` VALUES (202, 198, 2, 0, 10000, 'admin', 'MatchBureau', 'editPost', '', '编辑局名称保存', '', '编辑盘分类保存');
INSERT INTO `dj_admin_menu` VALUES (203, 180, 1, 1, 10000, 'admin', 'ChoiceName', 'index', '', '竞猜名称', '', '竞猜名称');
INSERT INTO `dj_admin_menu` VALUES (204, 203, 2, 0, 10000, 'admin', 'ChoiceName', 'addPost', '', '添加竞猜名称保存', '', '添加竞猜名称保存');
INSERT INTO `dj_admin_menu` VALUES (205, 203, 2, 0, 10000, 'admin', 'ChoiceName', 'update', '', '停用启用竞猜名称', '', '停用启用竞猜名称');
INSERT INTO `dj_admin_menu` VALUES (206, 203, 2, 0, 10000, 'admin', 'ChoiceName', 'delete', '', '删除竞猜名称', '', '删除竞猜名称');
INSERT INTO `dj_admin_menu` VALUES (207, 203, 2, 0, 10000, 'admin', 'ChoiceName', 'editPost', '', '编辑竞猜名称保存', '', '编辑竞猜名称保存');
INSERT INTO `dj_admin_menu` VALUES (208, 179, 1, 0, 10000, 'admin', 'Match', 'add', '', '添加战队', '', '添加战队');
INSERT INTO `dj_admin_menu` VALUES (209, 179, 2, 0, 10000, 'admin', 'Match', 'addPost', '', '添加战队保存', '', '添加战队保存');
INSERT INTO `dj_admin_menu` VALUES (210, 179, 2, 0, 10000, 'admin', 'Match', 'update', '', '停用启用战队', '', '停用启用战队');
INSERT INTO `dj_admin_menu` VALUES (211, 179, 2, 0, 10000, 'admin', 'Match', 'delete', '', '删除战队', '', '删除战队');
INSERT INTO `dj_admin_menu` VALUES (212, 179, 1, 0, 10000, 'admin', 'Match', 'edit', '', '编辑商品', '', '编辑商品');
INSERT INTO `dj_admin_menu` VALUES (213, 179, 2, 0, 10000, 'admin', 'Match', 'editPost', '', '编辑战队保存', '', '编辑战队保存');
INSERT INTO `dj_admin_menu` VALUES (214, 190, 1, 0, 10000, 'admin', 'WarTeam', 'add', '', '添加战队', '', '添加战队');
INSERT INTO `dj_admin_menu` VALUES (215, 190, 2, 0, 10000, 'admin', 'WarTeam', 'addPost', '', '添加战队保存', '', '添加战队保存');
INSERT INTO `dj_admin_menu` VALUES (216, 190, 2, 0, 10000, 'admin', 'WarTeam', 'update', '', '停用启用战队', '', '停用启用战队');
INSERT INTO `dj_admin_menu` VALUES (217, 190, 2, 0, 10000, 'admin', 'WarTeam', 'delete', '', '删除战队', '', '删除战队');
INSERT INTO `dj_admin_menu` VALUES (218, 190, 1, 0, 10000, 'admin', 'WarTeam', 'edit', '', '编辑商品', '', '编辑商品');
INSERT INTO `dj_admin_menu` VALUES (219, 190, 2, 0, 10000, 'admin', 'WarTeam', 'editPost', '', '编辑战队保存', '', '编辑战队保存');
INSERT INTO `dj_admin_menu` VALUES (220, 178, 1, 1, 10000, 'admin', 'MatchChoice', 'index', '', '竞猜列表', '', '');

-- ----------------------------
-- Table structure for dj_asset
-- ----------------------------
DROP TABLE IF EXISTS `dj_asset`;
CREATE TABLE `dj_asset`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  `file_size` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '文件大小,单位B',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '上传时间',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态;1:可用,0:不可用',
  `download_times` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '下载次数',
  `file_key` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件惟一码',
  `filename` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '文件名',
  `file_path` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件路径,相对于upload目录,可以为url',
  `file_md5` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件md5值',
  `file_sha1` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `suffix` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '文件后缀名,不包括点',
  `more` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '其它详细信息,JSON格式',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '资源表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_auth_access
-- ----------------------------
DROP TABLE IF EXISTS `dj_auth_access`;
CREATE TABLE `dj_auth_access`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL COMMENT '角色',
  `rule_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '规则唯一英文标识,全小写',
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '权限规则分类,请加应用前缀,如admin_',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `role_id`(`role_id`) USING BTREE,
  INDEX `rule_name`(`rule_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '权限授权表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `dj_auth_rule`;
CREATE TABLE `dj_auth_rule`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '是否有效(0:无效,1:有效)',
  `app` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '规则所属app',
  `type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '权限规则分类，请加应用前缀,如admin_',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '规则唯一英文标识,全小写',
  `param` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '额外url参数',
  `title` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '规则描述',
  `condition` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '规则附加条件',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE,
  INDEX `module`(`app`, `status`, `type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 220 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '权限规则表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_auth_rule
-- ----------------------------
INSERT INTO `dj_auth_rule` VALUES (1, 1, 'admin', 'admin_url', 'admin/Hook/index', '', '钩子管理', '');
INSERT INTO `dj_auth_rule` VALUES (2, 1, 'admin', 'admin_url', 'admin/Hook/plugins', '', '钩子插件管理', '');
INSERT INTO `dj_auth_rule` VALUES (3, 1, 'admin', 'admin_url', 'admin/Hook/pluginListOrder', '', '钩子插件排序', '');
INSERT INTO `dj_auth_rule` VALUES (4, 1, 'admin', 'admin_url', 'admin/Hook/sync', '', '同步钩子', '');
INSERT INTO `dj_auth_rule` VALUES (5, 1, 'admin', 'admin_url', 'admin/Link/index', '', '友情链接', '');
INSERT INTO `dj_auth_rule` VALUES (6, 1, 'admin', 'admin_url', 'admin/Link/add', '', '添加友情链接', '');
INSERT INTO `dj_auth_rule` VALUES (7, 1, 'admin', 'admin_url', 'admin/Link/addPost', '', '添加友情链接提交保存', '');
INSERT INTO `dj_auth_rule` VALUES (8, 1, 'admin', 'admin_url', 'admin/Link/edit', '', '编辑友情链接', '');
INSERT INTO `dj_auth_rule` VALUES (9, 1, 'admin', 'admin_url', 'admin/Link/editPost', '', '编辑友情链接提交保存', '');
INSERT INTO `dj_auth_rule` VALUES (10, 1, 'admin', 'admin_url', 'admin/Link/delete', '', '删除友情链接', '');
INSERT INTO `dj_auth_rule` VALUES (11, 1, 'admin', 'admin_url', 'admin/Link/listOrder', '', '友情链接排序', '');
INSERT INTO `dj_auth_rule` VALUES (12, 1, 'admin', 'admin_url', 'admin/Link/toggle', '', '友情链接显示隐藏', '');
INSERT INTO `dj_auth_rule` VALUES (13, 1, 'admin', 'admin_url', 'admin/Mailer/index', '', '邮箱配置', '');
INSERT INTO `dj_auth_rule` VALUES (14, 1, 'admin', 'admin_url', 'admin/Mailer/indexPost', '', '邮箱配置提交保存', '');
INSERT INTO `dj_auth_rule` VALUES (15, 1, 'admin', 'admin_url', 'admin/Mailer/template', '', '邮件模板', '');
INSERT INTO `dj_auth_rule` VALUES (16, 1, 'admin', 'admin_url', 'admin/Mailer/templatePost', '', '邮件模板提交', '');
INSERT INTO `dj_auth_rule` VALUES (17, 1, 'admin', 'admin_url', 'admin/Mailer/test', '', '邮件发送测试', '');
INSERT INTO `dj_auth_rule` VALUES (18, 1, 'admin', 'admin_url', 'admin/Menu/index', '', '后台菜单', '');
INSERT INTO `dj_auth_rule` VALUES (19, 1, 'admin', 'admin_url', 'admin/Menu/lists', '', '所有菜单', '');
INSERT INTO `dj_auth_rule` VALUES (20, 1, 'admin', 'admin_url', 'admin/Menu/add', '', '后台菜单添加', '');
INSERT INTO `dj_auth_rule` VALUES (21, 1, 'admin', 'admin_url', 'admin/Menu/addPost', '', '后台菜单添加提交保存', '');
INSERT INTO `dj_auth_rule` VALUES (22, 1, 'admin', 'admin_url', 'admin/Menu/edit', '', '后台菜单编辑', '');
INSERT INTO `dj_auth_rule` VALUES (23, 1, 'admin', 'admin_url', 'admin/Menu/editPost', '', '后台菜单编辑提交保存', '');
INSERT INTO `dj_auth_rule` VALUES (24, 1, 'admin', 'admin_url', 'admin/Menu/delete', '', '后台菜单删除', '');
INSERT INTO `dj_auth_rule` VALUES (25, 1, 'admin', 'admin_url', 'admin/Menu/listOrder', '', '后台菜单排序', '');
INSERT INTO `dj_auth_rule` VALUES (26, 1, 'admin', 'admin_url', 'admin/Menu/getActions', '', '导入新后台菜单', '');
INSERT INTO `dj_auth_rule` VALUES (27, 1, 'admin', 'admin_url', 'admin/Nav/index', '', '导航管理', '');
INSERT INTO `dj_auth_rule` VALUES (28, 1, 'admin', 'admin_url', 'admin/Nav/add', '', '添加导航', '');
INSERT INTO `dj_auth_rule` VALUES (29, 1, 'admin', 'admin_url', 'admin/Nav/addPost', '', '添加导航提交保存', '');
INSERT INTO `dj_auth_rule` VALUES (30, 1, 'admin', 'admin_url', 'admin/Nav/edit', '', '编辑导航', '');
INSERT INTO `dj_auth_rule` VALUES (31, 1, 'admin', 'admin_url', 'admin/Nav/editPost', '', '编辑导航提交保存', '');
INSERT INTO `dj_auth_rule` VALUES (32, 1, 'admin', 'admin_url', 'admin/Nav/delete', '', '删除导航', '');
INSERT INTO `dj_auth_rule` VALUES (33, 1, 'admin', 'admin_url', 'admin/NavMenu/index', '', '导航菜单', '');
INSERT INTO `dj_auth_rule` VALUES (34, 1, 'admin', 'admin_url', 'admin/NavMenu/add', '', '添加导航菜单', '');
INSERT INTO `dj_auth_rule` VALUES (35, 1, 'admin', 'admin_url', 'admin/NavMenu/addPost', '', '添加导航菜单提交保存', '');
INSERT INTO `dj_auth_rule` VALUES (36, 1, 'admin', 'admin_url', 'admin/NavMenu/edit', '', '编辑导航菜单', '');
INSERT INTO `dj_auth_rule` VALUES (37, 1, 'admin', 'admin_url', 'admin/NavMenu/editPost', '', '编辑导航菜单提交保存', '');
INSERT INTO `dj_auth_rule` VALUES (38, 1, 'admin', 'admin_url', 'admin/NavMenu/delete', '', '删除导航菜单', '');
INSERT INTO `dj_auth_rule` VALUES (39, 1, 'admin', 'admin_url', 'admin/NavMenu/listOrder', '', '导航菜单排序', '');
INSERT INTO `dj_auth_rule` VALUES (40, 1, 'admin', 'admin_url', 'admin/Plugin/default', '', '插件中心', '');
INSERT INTO `dj_auth_rule` VALUES (41, 1, 'admin', 'admin_url', 'admin/Plugin/index', '', '插件列表', '');
INSERT INTO `dj_auth_rule` VALUES (42, 1, 'admin', 'admin_url', 'admin/Plugin/toggle', '', '插件启用禁用', '');
INSERT INTO `dj_auth_rule` VALUES (43, 1, 'admin', 'admin_url', 'admin/Plugin/setting', '', '插件设置', '');
INSERT INTO `dj_auth_rule` VALUES (44, 1, 'admin', 'admin_url', 'admin/Plugin/settingPost', '', '插件设置提交', '');
INSERT INTO `dj_auth_rule` VALUES (45, 1, 'admin', 'admin_url', 'admin/Plugin/install', '', '插件安装', '');
INSERT INTO `dj_auth_rule` VALUES (46, 1, 'admin', 'admin_url', 'admin/Plugin/update', '', '插件更新', '');
INSERT INTO `dj_auth_rule` VALUES (47, 1, 'admin', 'admin_url', 'admin/Plugin/uninstall', '', '卸载插件', '');
INSERT INTO `dj_auth_rule` VALUES (48, 1, 'admin', 'admin_url', 'admin/Rbac/index', '', '角色管理', '');
INSERT INTO `dj_auth_rule` VALUES (49, 1, 'admin', 'admin_url', 'admin/Rbac/roleAdd', '', '添加角色', '');
INSERT INTO `dj_auth_rule` VALUES (50, 1, 'admin', 'admin_url', 'admin/Rbac/roleAddPost', '', '添加角色提交', '');
INSERT INTO `dj_auth_rule` VALUES (51, 1, 'admin', 'admin_url', 'admin/Rbac/roleEdit', '', '编辑角色', '');
INSERT INTO `dj_auth_rule` VALUES (52, 1, 'admin', 'admin_url', 'admin/Rbac/roleEditPost', '', '编辑角色提交', '');
INSERT INTO `dj_auth_rule` VALUES (53, 1, 'admin', 'admin_url', 'admin/Rbac/roleDelete', '', '删除角色', '');
INSERT INTO `dj_auth_rule` VALUES (54, 1, 'admin', 'admin_url', 'admin/Rbac/authorize', '', '设置角色权限', '');
INSERT INTO `dj_auth_rule` VALUES (55, 1, 'admin', 'admin_url', 'admin/Rbac/authorizePost', '', '角色授权提交', '');
INSERT INTO `dj_auth_rule` VALUES (56, 1, 'admin', 'admin_url', 'admin/RecycleBin/index', '', '回收站', '');
INSERT INTO `dj_auth_rule` VALUES (57, 1, 'admin', 'admin_url', 'admin/RecycleBin/restore', '', '回收站还原', '');
INSERT INTO `dj_auth_rule` VALUES (58, 1, 'admin', 'admin_url', 'admin/RecycleBin/delete', '', '回收站彻底删除', '');
INSERT INTO `dj_auth_rule` VALUES (59, 1, 'admin', 'admin_url', 'admin/Route/index', '', 'URL美化', '');
INSERT INTO `dj_auth_rule` VALUES (60, 1, 'admin', 'admin_url', 'admin/Route/add', '', '添加路由规则', '');
INSERT INTO `dj_auth_rule` VALUES (61, 1, 'admin', 'admin_url', 'admin/Route/addPost', '', '添加路由规则提交', '');
INSERT INTO `dj_auth_rule` VALUES (62, 1, 'admin', 'admin_url', 'admin/Route/edit', '', '路由规则编辑', '');
INSERT INTO `dj_auth_rule` VALUES (63, 1, 'admin', 'admin_url', 'admin/Route/editPost', '', '路由规则编辑提交', '');
INSERT INTO `dj_auth_rule` VALUES (64, 1, 'admin', 'admin_url', 'admin/Route/delete', '', '路由规则删除', '');
INSERT INTO `dj_auth_rule` VALUES (65, 1, 'admin', 'admin_url', 'admin/Route/ban', '', '路由规则禁用', '');
INSERT INTO `dj_auth_rule` VALUES (66, 1, 'admin', 'admin_url', 'admin/Route/open', '', '路由规则启用', '');
INSERT INTO `dj_auth_rule` VALUES (67, 1, 'admin', 'admin_url', 'admin/Route/listOrder', '', '路由规则排序', '');
INSERT INTO `dj_auth_rule` VALUES (68, 1, 'admin', 'admin_url', 'admin/Route/select', '', '选择URL', '');
INSERT INTO `dj_auth_rule` VALUES (69, 1, 'admin', 'admin_url', 'admin/Setting/default', '', '设置', '');
INSERT INTO `dj_auth_rule` VALUES (70, 1, 'admin', 'admin_url', 'admin/Setting/site', '', '网站信息', '');
INSERT INTO `dj_auth_rule` VALUES (71, 1, 'admin', 'admin_url', 'admin/Setting/sitePost', '', '网站信息设置提交', '');
INSERT INTO `dj_auth_rule` VALUES (72, 1, 'admin', 'admin_url', 'admin/Setting/password', '', '密码修改', '');
INSERT INTO `dj_auth_rule` VALUES (73, 1, 'admin', 'admin_url', 'admin/Setting/passwordPost', '', '密码修改提交', '');
INSERT INTO `dj_auth_rule` VALUES (74, 1, 'admin', 'admin_url', 'admin/Setting/upload', '', '上传设置', '');
INSERT INTO `dj_auth_rule` VALUES (75, 1, 'admin', 'admin_url', 'admin/Setting/uploadPost', '', '上传设置提交', '');
INSERT INTO `dj_auth_rule` VALUES (76, 1, 'admin', 'admin_url', 'admin/Setting/clearCache', '', '清除缓存', '');
INSERT INTO `dj_auth_rule` VALUES (77, 1, 'admin', 'admin_url', 'admin/Slide/index', '', '幻灯片管理', '');
INSERT INTO `dj_auth_rule` VALUES (78, 1, 'admin', 'admin_url', 'admin/Slide/add', '', '添加幻灯片', '');
INSERT INTO `dj_auth_rule` VALUES (79, 1, 'admin', 'admin_url', 'admin/Slide/addPost', '', '添加幻灯片提交', '');
INSERT INTO `dj_auth_rule` VALUES (80, 1, 'admin', 'admin_url', 'admin/Slide/edit', '', '编辑幻灯片', '');
INSERT INTO `dj_auth_rule` VALUES (81, 1, 'admin', 'admin_url', 'admin/Slide/editPost', '', '编辑幻灯片提交', '');
INSERT INTO `dj_auth_rule` VALUES (82, 1, 'admin', 'admin_url', 'admin/Slide/delete', '', '删除幻灯片', '');
INSERT INTO `dj_auth_rule` VALUES (83, 1, 'admin', 'admin_url', 'admin/SlideItem/index', '', '幻灯片页面列表', '');
INSERT INTO `dj_auth_rule` VALUES (84, 1, 'admin', 'admin_url', 'admin/SlideItem/add', '', '幻灯片页面添加', '');
INSERT INTO `dj_auth_rule` VALUES (85, 1, 'admin', 'admin_url', 'admin/SlideItem/addPost', '', '幻灯片页面添加提交', '');
INSERT INTO `dj_auth_rule` VALUES (86, 1, 'admin', 'admin_url', 'admin/SlideItem/edit', '', '幻灯片页面编辑', '');
INSERT INTO `dj_auth_rule` VALUES (87, 1, 'admin', 'admin_url', 'admin/SlideItem/editPost', '', '幻灯片页面编辑提交', '');
INSERT INTO `dj_auth_rule` VALUES (88, 1, 'admin', 'admin_url', 'admin/SlideItem/delete', '', '幻灯片页面删除', '');
INSERT INTO `dj_auth_rule` VALUES (89, 1, 'admin', 'admin_url', 'admin/SlideItem/ban', '', '幻灯片页面隐藏', '');
INSERT INTO `dj_auth_rule` VALUES (90, 1, 'admin', 'admin_url', 'admin/SlideItem/cancelBan', '', '幻灯片页面显示', '');
INSERT INTO `dj_auth_rule` VALUES (91, 1, 'admin', 'admin_url', 'admin/SlideItem/listOrder', '', '幻灯片页面排序', '');
INSERT INTO `dj_auth_rule` VALUES (92, 1, 'admin', 'admin_url', 'admin/Storage/index', '', '文件存储', '');
INSERT INTO `dj_auth_rule` VALUES (93, 1, 'admin', 'admin_url', 'admin/Storage/settingPost', '', '文件存储设置提交', '');
INSERT INTO `dj_auth_rule` VALUES (94, 1, 'admin', 'admin_url', 'admin/Theme/index', '', '模板管理', '');
INSERT INTO `dj_auth_rule` VALUES (95, 1, 'admin', 'admin_url', 'admin/Theme/install', '', '安装模板', '');
INSERT INTO `dj_auth_rule` VALUES (96, 1, 'admin', 'admin_url', 'admin/Theme/uninstall', '', '卸载模板', '');
INSERT INTO `dj_auth_rule` VALUES (97, 1, 'admin', 'admin_url', 'admin/Theme/installTheme', '', '模板安装', '');
INSERT INTO `dj_auth_rule` VALUES (98, 1, 'admin', 'admin_url', 'admin/Theme/update', '', '模板更新', '');
INSERT INTO `dj_auth_rule` VALUES (99, 1, 'admin', 'admin_url', 'admin/Theme/active', '', '启用模板', '');
INSERT INTO `dj_auth_rule` VALUES (100, 1, 'admin', 'admin_url', 'admin/Theme/files', '', '模板文件列表', '');
INSERT INTO `dj_auth_rule` VALUES (101, 1, 'admin', 'admin_url', 'admin/Theme/fileSetting', '', '模板文件设置', '');
INSERT INTO `dj_auth_rule` VALUES (102, 1, 'admin', 'admin_url', 'admin/Theme/fileArrayData', '', '模板文件数组数据列表', '');
INSERT INTO `dj_auth_rule` VALUES (103, 1, 'admin', 'admin_url', 'admin/Theme/fileArrayDataEdit', '', '模板文件数组数据添加编辑', '');
INSERT INTO `dj_auth_rule` VALUES (104, 1, 'admin', 'admin_url', 'admin/Theme/fileArrayDataEditPost', '', '模板文件数组数据添加编辑提交保存', '');
INSERT INTO `dj_auth_rule` VALUES (105, 1, 'admin', 'admin_url', 'admin/Theme/fileArrayDataDelete', '', '模板文件数组数据删除', '');
INSERT INTO `dj_auth_rule` VALUES (106, 1, 'admin', 'admin_url', 'admin/Theme/settingPost', '', '模板文件编辑提交保存', '');
INSERT INTO `dj_auth_rule` VALUES (107, 1, 'admin', 'admin_url', 'admin/Theme/dataSource', '', '模板文件设置数据源', '');
INSERT INTO `dj_auth_rule` VALUES (108, 1, 'admin', 'admin_url', 'admin/User/default', '', '管理组', '');
INSERT INTO `dj_auth_rule` VALUES (109, 1, 'admin', 'admin_url', 'admin/User/index', '', '管理员', '');
INSERT INTO `dj_auth_rule` VALUES (110, 1, 'admin', 'admin_url', 'admin/User/add', '', '管理员添加', '');
INSERT INTO `dj_auth_rule` VALUES (111, 1, 'admin', 'admin_url', 'admin/User/addPost', '', '管理员添加提交', '');
INSERT INTO `dj_auth_rule` VALUES (112, 1, 'admin', 'admin_url', 'admin/User/edit', '', '管理员编辑', '');
INSERT INTO `dj_auth_rule` VALUES (113, 1, 'admin', 'admin_url', 'admin/User/editPost', '', '管理员编辑提交', '');
INSERT INTO `dj_auth_rule` VALUES (114, 1, 'admin', 'admin_url', 'admin/User/userInfo', '', '个人信息', '');
INSERT INTO `dj_auth_rule` VALUES (115, 1, 'admin', 'admin_url', 'admin/User/userInfoPost', '', '管理员个人信息修改提交', '');
INSERT INTO `dj_auth_rule` VALUES (116, 1, 'admin', 'admin_url', 'admin/User/delete', '', '管理员删除', '');
INSERT INTO `dj_auth_rule` VALUES (117, 1, 'admin', 'admin_url', 'admin/User/ban', '', '停用管理员', '');
INSERT INTO `dj_auth_rule` VALUES (118, 1, 'admin', 'admin_url', 'admin/User/cancelBan', '', '启用管理员', '');
INSERT INTO `dj_auth_rule` VALUES (119, 1, 'portal', 'admin_url', 'portal/AdminArticle/index', '', '文章管理', '');
INSERT INTO `dj_auth_rule` VALUES (120, 1, 'portal', 'admin_url', 'portal/AdminArticle/add', '', '添加文章', '');
INSERT INTO `dj_auth_rule` VALUES (121, 1, 'portal', 'admin_url', 'portal/AdminArticle/addPost', '', '添加文章提交', '');
INSERT INTO `dj_auth_rule` VALUES (122, 1, 'portal', 'admin_url', 'portal/AdminArticle/edit', '', '编辑文章', '');
INSERT INTO `dj_auth_rule` VALUES (123, 1, 'portal', 'admin_url', 'portal/AdminArticle/editPost', '', '编辑文章提交', '');
INSERT INTO `dj_auth_rule` VALUES (124, 1, 'portal', 'admin_url', 'portal/AdminArticle/delete', '', '文章删除', '');
INSERT INTO `dj_auth_rule` VALUES (125, 1, 'portal', 'admin_url', 'portal/AdminArticle/publish', '', '文章发布', '');
INSERT INTO `dj_auth_rule` VALUES (126, 1, 'portal', 'admin_url', 'portal/AdminArticle/top', '', '文章置顶', '');
INSERT INTO `dj_auth_rule` VALUES (127, 1, 'portal', 'admin_url', 'portal/AdminArticle/recommend', '', '文章推荐', '');
INSERT INTO `dj_auth_rule` VALUES (128, 1, 'portal', 'admin_url', 'portal/AdminArticle/listOrder', '', '文章排序', '');
INSERT INTO `dj_auth_rule` VALUES (129, 1, 'portal', 'admin_url', 'portal/AdminCategory/index', '', '分类管理', '');
INSERT INTO `dj_auth_rule` VALUES (130, 1, 'portal', 'admin_url', 'portal/AdminCategory/add', '', '添加文章分类', '');
INSERT INTO `dj_auth_rule` VALUES (131, 1, 'portal', 'admin_url', 'portal/AdminCategory/addPost', '', '添加文章分类提交', '');
INSERT INTO `dj_auth_rule` VALUES (132, 1, 'portal', 'admin_url', 'portal/AdminCategory/edit', '', '编辑文章分类', '');
INSERT INTO `dj_auth_rule` VALUES (133, 1, 'portal', 'admin_url', 'portal/AdminCategory/editPost', '', '编辑文章分类提交', '');
INSERT INTO `dj_auth_rule` VALUES (134, 1, 'portal', 'admin_url', 'portal/AdminCategory/select', '', '文章分类选择对话框', '');
INSERT INTO `dj_auth_rule` VALUES (135, 1, 'portal', 'admin_url', 'portal/AdminCategory/listOrder', '', '文章分类排序', '');
INSERT INTO `dj_auth_rule` VALUES (136, 1, 'portal', 'admin_url', 'portal/AdminCategory/delete', '', '删除文章分类', '');
INSERT INTO `dj_auth_rule` VALUES (137, 1, 'portal', 'admin_url', 'portal/AdminIndex/default', '', '门户管理', '');
INSERT INTO `dj_auth_rule` VALUES (138, 1, 'portal', 'admin_url', 'portal/AdminPage/index', '', '页面管理', '');
INSERT INTO `dj_auth_rule` VALUES (139, 1, 'portal', 'admin_url', 'portal/AdminPage/add', '', '添加页面', '');
INSERT INTO `dj_auth_rule` VALUES (140, 1, 'portal', 'admin_url', 'portal/AdminPage/addPost', '', '添加页面提交', '');
INSERT INTO `dj_auth_rule` VALUES (141, 1, 'portal', 'admin_url', 'portal/AdminPage/edit', '', '编辑页面', '');
INSERT INTO `dj_auth_rule` VALUES (142, 1, 'portal', 'admin_url', 'portal/AdminPage/editPost', '', '编辑页面提交', '');
INSERT INTO `dj_auth_rule` VALUES (143, 1, 'portal', 'admin_url', 'portal/AdminPage/delete', '', '删除页面', '');
INSERT INTO `dj_auth_rule` VALUES (144, 1, 'portal', 'admin_url', 'portal/AdminTag/index', '', '文章标签', '');
INSERT INTO `dj_auth_rule` VALUES (145, 1, 'portal', 'admin_url', 'portal/AdminTag/add', '', '添加文章标签', '');
INSERT INTO `dj_auth_rule` VALUES (146, 1, 'portal', 'admin_url', 'portal/AdminTag/addPost', '', '添加文章标签提交', '');
INSERT INTO `dj_auth_rule` VALUES (147, 1, 'portal', 'admin_url', 'portal/AdminTag/upStatus', '', '更新标签状态', '');
INSERT INTO `dj_auth_rule` VALUES (148, 1, 'portal', 'admin_url', 'portal/AdminTag/delete', '', '删除文章标签', '');
INSERT INTO `dj_auth_rule` VALUES (149, 1, 'user', 'admin_url', 'user/AdminAsset/index', '', '资源管理', '');
INSERT INTO `dj_auth_rule` VALUES (150, 1, 'user', 'admin_url', 'user/AdminAsset/delete', '', '删除文件', '');
INSERT INTO `dj_auth_rule` VALUES (151, 1, 'user', 'admin_url', 'user/AdminIndex/default', '', '用户管理', '');
INSERT INTO `dj_auth_rule` VALUES (152, 1, 'user', 'admin_url', 'user/AdminIndex/default1', '', '用户组', '');
INSERT INTO `dj_auth_rule` VALUES (153, 1, 'user', 'admin_url', 'user/AdminIndex/index', '', '本站用户', '');
INSERT INTO `dj_auth_rule` VALUES (154, 1, 'user', 'admin_url', 'user/AdminIndex/ban', '', '本站用户拉黑', '');
INSERT INTO `dj_auth_rule` VALUES (155, 1, 'user', 'admin_url', 'user/AdminIndex/cancelBan', '', '本站用户启用', '');
INSERT INTO `dj_auth_rule` VALUES (156, 1, 'user', 'admin_url', 'user/AdminOauth/index', '', '第三方用户', '');
INSERT INTO `dj_auth_rule` VALUES (157, 1, 'user', 'admin_url', 'user/AdminOauth/delete', '', '删除第三方用户绑定', '');
INSERT INTO `dj_auth_rule` VALUES (158, 1, 'user', 'admin_url', 'user/AdminUserAction/index', '', '用户操作管理', '');
INSERT INTO `dj_auth_rule` VALUES (159, 1, 'user', 'admin_url', 'user/AdminUserAction/edit', '', '编辑用户操作', '');
INSERT INTO `dj_auth_rule` VALUES (160, 1, 'user', 'admin_url', 'user/AdminUserAction/editPost', '', '编辑用户操作提交', '');
INSERT INTO `dj_auth_rule` VALUES (161, 1, 'user', 'admin_url', 'user/AdminUserAction/sync', '', '同步用户操作', '');
INSERT INTO `dj_auth_rule` VALUES (162, 1, 'admin', 'admin_url', 'admin/Currency/default', '', '虚拟币', '');
INSERT INTO `dj_auth_rule` VALUES (163, 1, 'admin', 'admin_url', 'admin/currency/index', '', '币值列表', '');
INSERT INTO `dj_auth_rule` VALUES (164, 1, 'admin', 'admin_url', 'admin/Currency/add', '', '添加虚拟币', '');
INSERT INTO `dj_auth_rule` VALUES (165, 1, 'admin', 'admin_url', 'admin/Currency/addPost', '', '添加虚拟币保存', '');
INSERT INTO `dj_auth_rule` VALUES (166, 1, 'admin', 'admin_url', 'admin/Currency/update', '', '停用启用虚拟币', '');
INSERT INTO `dj_auth_rule` VALUES (167, 1, 'admin', 'admin_url', 'admin/Currency/delete', '', '删除虚拟币', '');
INSERT INTO `dj_auth_rule` VALUES (168, 1, 'admin', 'admin_url', 'admin/Currency/edit', '', '编辑虚拟币', '');
INSERT INTO `dj_auth_rule` VALUES (169, 1, 'admin', 'admin_url', 'admin/Currency/editPost', '', '编辑虚拟币提交保存', '');
INSERT INTO `dj_auth_rule` VALUES (170, 1, 'admin', 'admin_url', 'admin/goods/default', '', '商品', '');
INSERT INTO `dj_auth_rule` VALUES (171, 1, 'admin', 'admin_url', 'admin/goods/index', '', '商品列表', '');
INSERT INTO `dj_auth_rule` VALUES (172, 1, 'admin', 'admin_url', 'admin/Goods/add', '', '添加商品', '');
INSERT INTO `dj_auth_rule` VALUES (173, 1, 'admin', 'admin_url', 'admin/Goods/addPost', '', '添加商品保存', '');
INSERT INTO `dj_auth_rule` VALUES (174, 1, 'admin', 'admin_url', 'admin/Goods/update', '', '停用启用商品', '');
INSERT INTO `dj_auth_rule` VALUES (175, 1, 'admin', 'admin_url', 'admin/Goods/delete', '', '删除商品', '');
INSERT INTO `dj_auth_rule` VALUES (176, 1, 'admin', 'admin_url', 'admin/Goods/edit', '', '编辑商品', '');
INSERT INTO `dj_auth_rule` VALUES (177, 1, 'admin', 'admin_url', 'admin/Goods/editPost', '', '编辑商品提交保存', '');
INSERT INTO `dj_auth_rule` VALUES (178, 1, 'admin', 'admin_url', 'admin/Match/default', '', '比赛', '');
INSERT INTO `dj_auth_rule` VALUES (179, 1, 'admin', 'admin_url', 'admin/Match/index', '', '赛事管理', '');
INSERT INTO `dj_auth_rule` VALUES (180, 1, 'admin', 'admin_url', 'admin/Classify/default', '', '各种分类', '');
INSERT INTO `dj_auth_rule` VALUES (181, 1, 'admin', 'admin_url', 'admin/Classify/addPost', '', '添加赛事保存', '');
INSERT INTO `dj_auth_rule` VALUES (182, 1, 'admin', 'admin_url', 'admin/Classify/update', '', '停用启用赛事', '');
INSERT INTO `dj_auth_rule` VALUES (183, 1, 'admin', 'admin_url', 'admin/Classify/delete', '', '删除赛事', '');
INSERT INTO `dj_auth_rule` VALUES (184, 1, 'admin', 'admin_url', 'admin/Classify/editPost', '', '编辑赛事保存', '');
INSERT INTO `dj_auth_rule` VALUES (185, 1, 'admin', 'admin_url', 'admin/Game/index', '', '游戏列表', '');
INSERT INTO `dj_auth_rule` VALUES (186, 1, 'admin', 'admin_url', 'admin/Game/addPost', '', '添加游戏保存', '');
INSERT INTO `dj_auth_rule` VALUES (187, 1, 'admin', 'admin_url', 'admin/Game/update', '', '停用启用游戏', '');
INSERT INTO `dj_auth_rule` VALUES (188, 1, 'admin', 'admin_url', 'admin/Game/delete', '', '删除游戏', '');
INSERT INTO `dj_auth_rule` VALUES (189, 1, 'admin', 'admin_url', 'admin/Game/editPost', '', '编辑游戏保存', '');
INSERT INTO `dj_auth_rule` VALUES (190, 1, 'admin', 'admin_url', 'admin/WarTeam/index', '', '战队列表', '');
INSERT INTO `dj_auth_rule` VALUES (191, 1, 'admin', 'admin_url', 'admin/Classify/index', '', '赛事分类', '');
INSERT INTO `dj_auth_rule` VALUES (192, 1, 'admin', 'admin_url', 'admin/MatchDisc/index', '', '盘分类', '');
INSERT INTO `dj_auth_rule` VALUES (193, 1, 'admin', 'admin_url', 'admin/MatchDisc/addPost', '', '添加盘分类保存', '');
INSERT INTO `dj_auth_rule` VALUES (194, 1, 'admin', 'admin_url', 'admin/MatchDisc/update', '', '停用启用盘分类', '');
INSERT INTO `dj_auth_rule` VALUES (195, 1, 'admin', 'admin_url', 'admin/MatchDisc/delete', '', '删除盘分类', '');
INSERT INTO `dj_auth_rule` VALUES (196, 1, 'admin', 'admin_url', 'admin/MatchDisc/editPost', '', '编辑盘分类保存', '');
INSERT INTO `dj_auth_rule` VALUES (197, 1, 'admin', 'admin_url', 'admin/MatchBureau/index', '', '局名称', '');
INSERT INTO `dj_auth_rule` VALUES (198, 1, 'admin', 'admin_url', 'admin/MatchBureau/addPost', '', '添加局名称保存', '');
INSERT INTO `dj_auth_rule` VALUES (199, 1, 'admin', 'admin_url', 'admin/MatchBureau/update', '', '停用启用局名称', '');
INSERT INTO `dj_auth_rule` VALUES (200, 1, 'admin', 'admin_url', 'admin/MatchBureau/delete', '', '删除局名称', '');
INSERT INTO `dj_auth_rule` VALUES (201, 1, 'admin', 'admin_url', 'admin/MatchBureau/editPost', '', '编辑局名称保存', '');
INSERT INTO `dj_auth_rule` VALUES (202, 1, 'admin', 'admin_url', 'admin/ChoiceName/index', '', '竞猜名称', '');
INSERT INTO `dj_auth_rule` VALUES (203, 1, 'admin', 'admin_url', 'admin/ChoiceName/addPost', '', '添加竞猜名称保存', '');
INSERT INTO `dj_auth_rule` VALUES (204, 1, 'admin', 'admin_url', 'admin/ChoiceName/update', '', '停用启用竞猜名称', '');
INSERT INTO `dj_auth_rule` VALUES (205, 1, 'admin', 'admin_url', 'admin/ChoiceName/delete', '', '删除竞猜名称', '');
INSERT INTO `dj_auth_rule` VALUES (206, 1, 'admin', 'admin_url', 'admin/ChoiceName/editPost', '', '编辑竞猜名称保存', '');
INSERT INTO `dj_auth_rule` VALUES (207, 1, 'admin', 'admin_url', 'admin/Match/add', '', '添加战队', '');
INSERT INTO `dj_auth_rule` VALUES (208, 1, 'admin', 'admin_url', 'admin/Match/addPost', '', '添加战队保存', '');
INSERT INTO `dj_auth_rule` VALUES (209, 1, 'admin', 'admin_url', 'admin/Match/update', '', '停用启用战队', '');
INSERT INTO `dj_auth_rule` VALUES (210, 1, 'admin', 'admin_url', 'admin/Match/delete', '', '删除战队', '');
INSERT INTO `dj_auth_rule` VALUES (211, 1, 'admin', 'admin_url', 'admin/Match/edit', '', '编辑商品', '');
INSERT INTO `dj_auth_rule` VALUES (212, 1, 'admin', 'admin_url', 'admin/Match/editPost', '', '编辑战队保存', '');
INSERT INTO `dj_auth_rule` VALUES (213, 1, 'admin', 'admin_url', 'admin/WarTeam/add', '', '添加战队', '');
INSERT INTO `dj_auth_rule` VALUES (214, 1, 'admin', 'admin_url', 'admin/WarTeam/addPost', '', '添加战队保存', '');
INSERT INTO `dj_auth_rule` VALUES (215, 1, 'admin', 'admin_url', 'admin/WarTeam/update', '', '停用启用战队', '');
INSERT INTO `dj_auth_rule` VALUES (216, 1, 'admin', 'admin_url', 'admin/WarTeam/delete', '', '删除战队', '');
INSERT INTO `dj_auth_rule` VALUES (217, 1, 'admin', 'admin_url', 'admin/WarTeam/edit', '', '编辑商品', '');
INSERT INTO `dj_auth_rule` VALUES (218, 1, 'admin', 'admin_url', 'admin/WarTeam/editPost', '', '编辑战队保存', '');
INSERT INTO `dj_auth_rule` VALUES (219, 1, 'admin', 'admin_url', 'admin/MatchChoice/index', '', '竞猜列表', '');

-- ----------------------------
-- Table structure for dj_choice_name
-- ----------------------------
DROP TABLE IF EXISTS `dj_choice_name`;
CREATE TABLE `dj_choice_name`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父id',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '名称',
  `list_order` float NOT NULL DEFAULT 1000 COMMENT '排序',
  `time` bigint(15) UNSIGNED NOT NULL COMMENT '时间',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态 1:启用;2:停用;',
  `deletetime` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '删除表示 1:正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '竞猜分组和名称' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dj_choice_name
-- ----------------------------
INSERT INTO `dj_choice_name` VALUES (1, 0, '比赛获胜', 1000, 1535437531, 1, 1);
INSERT INTO `dj_choice_name` VALUES (2, 1, '甲方', 1000, 1535437562, 1, 1);
INSERT INTO `dj_choice_name` VALUES (3, 1, '乙方', 1000, 1535437572, 1, 1);
INSERT INTO `dj_choice_name` VALUES (4, 0, '让局', 1000, 1535450580, 1, 1);
INSERT INTO `dj_choice_name` VALUES (5, 4, '甲方', 1000, 1535450593, 1, 1);
INSERT INTO `dj_choice_name` VALUES (6, 4, '乙方', 1000, 1535450603, 1, 1);

-- ----------------------------
-- Table structure for dj_classify
-- ----------------------------
DROP TABLE IF EXISTS `dj_classify`;
CREATE TABLE `dj_classify`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父id',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '名称',
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '图标',
  `list_order` float NOT NULL DEFAULT 1000 COMMENT '排序',
  `time` bigint(12) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态 1:启用;2:停用;',
  `deletetime` bigint(12) UNSIGNED NOT NULL DEFAULT 1 COMMENT '删除表示 1:正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '赛事分类' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dj_classify
-- ----------------------------
INSERT INTO `dj_classify` VALUES (1, 0, '英雄联盟', 'http://egame.leidata.com/wechat/Public/Esports/img/lol_new@.png', 1000, 1534761654, 1, 1);
INSERT INTO `dj_classify` VALUES (2, 1, 'Turkish Champions League', 'http://egame.leidata.com/wechat/Public/Esports/img/game-logo/lol@.png', 1000, 1534761791, 1, 1);

-- ----------------------------
-- Table structure for dj_comment
-- ----------------------------
DROP TABLE IF EXISTS `dj_comment`;
CREATE TABLE `dj_comment`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '被回复的评论id',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '发表评论的用户id',
  `to_user_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '被评论的用户id',
  `object_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '评论内容 id',
  `like_count` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '点赞数',
  `dislike_count` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '不喜欢数',
  `floor` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '楼层数',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '评论时间',
  `delete_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '删除时间',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态,1:已审核,0:未审核',
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '评论类型；1实名评论',
  `table_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '评论内容所在表，不带表前缀',
  `full_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '评论者昵称',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '评论者邮箱',
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '层级关系',
  `url` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '原文地址',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '评论内容',
  `more` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '扩展属性',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `table_id_status`(`table_name`, `object_id`, `status`) USING BTREE,
  INDEX `object_id`(`object_id`) USING BTREE,
  INDEX `status`(`status`) USING BTREE,
  INDEX `parent_id`(`parent_id`) USING BTREE,
  INDEX `create_time`(`create_time`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '评论表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_currency
-- ----------------------------
DROP TABLE IF EXISTS `dj_currency`;
CREATE TABLE `dj_currency`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '名称',
  `icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '图标',
  `grade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '6,10,30,50,100,200,1000' COMMENT '兑换等级',
  `ratio` tinyint(3) UNSIGNED NOT NULL DEFAULT 100 COMMENT '换算比例',
  `ratio_id` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '换算对象 0:人民币',
  `time` bigint(12) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态: 1.正常,2.停用',
  `deletetime` bigint(12) UNSIGNED NOT NULL DEFAULT 1 COMMENT '删除表示 1: 正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '虚拟币' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dj_currency
-- ----------------------------
INSERT INTO `dj_currency` VALUES (1, '砖石', 'http://egame.leidata.com/wechat/Public/Esports/img/diamond.png', '6,10,30,50,100,200,1000', 10, 0, 1534406642, 1, 1);
INSERT INTO `dj_currency` VALUES (2, '金币', 'http://egame.leidata.com/wechat/Public/Esports/img/gold.png', '6,10,30,50,100,200,1000', 1, 1, 1534410365, 1, 1);

-- ----------------------------
-- Table structure for dj_goods
-- ----------------------------
DROP TABLE IF EXISTS `dj_goods`;
CREATE TABLE `dj_goods`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '名称',
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '图片',
  `currency_id` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '币值',
  `price` decimal(15, 0) UNSIGNED NOT NULL COMMENT '价格',
  `stock` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '库存',
  `convert` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '兑换人数',
  `time` bigint(12) UNSIGNED NOT NULL COMMENT '创建时间',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态 1:启用2:禁用',
  `deletetime` bigint(12) UNSIGNED NOT NULL DEFAULT 1 COMMENT '删除标识 1:正常;',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '兑换商品' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_goods
-- ----------------------------
INSERT INTO `dj_goods` VALUES (1, 'WRA格斗大赛Ganker机器人', 'http://h5.leidata.com:8079/web/sporttery/ld_manage/Public/Uploads/5ad4486ad2957.png', 2, 3216000, 0, 0, 1534415911, 1, 1);

-- ----------------------------
-- Table structure for dj_hook
-- ----------------------------
DROP TABLE IF EXISTS `dj_hook`;
CREATE TABLE `dj_hook`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '钩子类型(1:系统钩子;2:应用钩子;3:模板钩子;4:后台模板钩子)',
  `once` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否只允许一个插件运行(0:多个;1:一个)',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '钩子名称',
  `hook` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '钩子',
  `app` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '应用名(只有应用钩子才用)',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '描述',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '系统钩子表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_hook
-- ----------------------------
INSERT INTO `dj_hook` VALUES (1, 1, 0, '应用初始化', 'app_init', 'cmf', '应用初始化');
INSERT INTO `dj_hook` VALUES (2, 1, 0, '应用开始', 'app_begin', 'cmf', '应用开始');
INSERT INTO `dj_hook` VALUES (3, 1, 0, '模块初始化', 'module_init', 'cmf', '模块初始化');
INSERT INTO `dj_hook` VALUES (4, 1, 0, '控制器开始', 'action_begin', 'cmf', '控制器开始');
INSERT INTO `dj_hook` VALUES (5, 1, 0, '视图输出过滤', 'view_filter', 'cmf', '视图输出过滤');
INSERT INTO `dj_hook` VALUES (6, 1, 0, '应用结束', 'app_end', 'cmf', '应用结束');
INSERT INTO `dj_hook` VALUES (7, 1, 0, '日志write方法', 'log_write', 'cmf', '日志write方法');
INSERT INTO `dj_hook` VALUES (8, 1, 0, '输出结束', 'response_end', 'cmf', '输出结束');
INSERT INTO `dj_hook` VALUES (9, 1, 0, '后台控制器初始化', 'admin_init', 'cmf', '后台控制器初始化');
INSERT INTO `dj_hook` VALUES (10, 1, 0, '前台控制器初始化', 'home_init', 'cmf', '前台控制器初始化');
INSERT INTO `dj_hook` VALUES (11, 1, 1, '发送手机验证码', 'send_mobile_verification_code', 'cmf', '发送手机验证码');
INSERT INTO `dj_hook` VALUES (12, 3, 0, '模板 body标签开始', 'body_start', '', '模板 body标签开始');
INSERT INTO `dj_hook` VALUES (13, 3, 0, '模板 head标签结束前', 'before_head_end', '', '模板 head标签结束前');
INSERT INTO `dj_hook` VALUES (14, 3, 0, '模板底部开始', 'footer_start', '', '模板底部开始');
INSERT INTO `dj_hook` VALUES (15, 3, 0, '模板底部开始之前', 'before_footer', '', '模板底部开始之前');
INSERT INTO `dj_hook` VALUES (16, 3, 0, '模板底部结束之前', 'before_footer_end', '', '模板底部结束之前');
INSERT INTO `dj_hook` VALUES (17, 3, 0, '模板 body 标签结束之前', 'before_body_end', '', '模板 body 标签结束之前');
INSERT INTO `dj_hook` VALUES (18, 3, 0, '模板左边栏开始', 'left_sidebar_start', '', '模板左边栏开始');
INSERT INTO `dj_hook` VALUES (19, 3, 0, '模板左边栏结束之前', 'before_left_sidebar_end', '', '模板左边栏结束之前');
INSERT INTO `dj_hook` VALUES (20, 3, 0, '模板右边栏开始', 'right_sidebar_start', '', '模板右边栏开始');
INSERT INTO `dj_hook` VALUES (21, 3, 0, '模板右边栏结束之前', 'before_right_sidebar_end', '', '模板右边栏结束之前');
INSERT INTO `dj_hook` VALUES (22, 3, 1, '评论区', 'comment', '', '评论区');
INSERT INTO `dj_hook` VALUES (23, 3, 1, '留言区', 'guestbook', '', '留言区');
INSERT INTO `dj_hook` VALUES (24, 2, 0, '后台首页仪表盘', 'admin_dashboard', 'admin', '后台首页仪表盘');
INSERT INTO `dj_hook` VALUES (25, 4, 0, '后台模板 head标签结束前', 'admin_before_head_end', '', '后台模板 head标签结束前');
INSERT INTO `dj_hook` VALUES (26, 4, 0, '后台模板 body 标签结束之前', 'admin_before_body_end', '', '后台模板 body 标签结束之前');
INSERT INTO `dj_hook` VALUES (27, 2, 0, '后台登录页面', 'admin_login', 'admin', '后台登录页面');
INSERT INTO `dj_hook` VALUES (28, 1, 1, '前台模板切换', 'switch_theme', 'cmf', '前台模板切换');
INSERT INTO `dj_hook` VALUES (29, 3, 0, '主要内容之后', 'after_content', '', '主要内容之后');
INSERT INTO `dj_hook` VALUES (30, 2, 0, '文章显示之前', 'portal_before_assign_article', 'portal', '文章显示之前');
INSERT INTO `dj_hook` VALUES (31, 2, 0, '后台文章保存之后', 'portal_admin_after_save_article', 'portal', '后台文章保存之后');
INSERT INTO `dj_hook` VALUES (32, 2, 1, '获取上传界面', 'fetch_upload_view', 'user', '获取上传界面');
INSERT INTO `dj_hook` VALUES (33, 3, 0, '主要内容之前', 'before_content', 'cmf', '主要内容之前');
INSERT INTO `dj_hook` VALUES (34, 1, 0, '日志写入完成', 'log_write_done', 'cmf', '日志写入完成');
INSERT INTO `dj_hook` VALUES (35, 1, 1, '后台模板切换', 'switch_admin_theme', 'cmf', '后台模板切换');

-- ----------------------------
-- Table structure for dj_hook_plugin
-- ----------------------------
DROP TABLE IF EXISTS `dj_hook_plugin`;
CREATE TABLE `dj_hook_plugin`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `list_order` float NOT NULL DEFAULT 10000 COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '状态(0:禁用,1:启用)',
  `hook` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '钩子名',
  `plugin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '插件',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '系统钩子插件表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_hook_plugin
-- ----------------------------
INSERT INTO `dj_hook_plugin` VALUES (1, 10000, 1, 'send_mobile_verification_code', 'MobileCodeDemo');

-- ----------------------------
-- Table structure for dj_link
-- ----------------------------
DROP TABLE IF EXISTS `dj_link`;
CREATE TABLE `dj_link`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态;1:显示;0:不显示',
  `rating` int(11) NOT NULL DEFAULT 0 COMMENT '友情链接评级',
  `list_order` float NOT NULL DEFAULT 10000 COMMENT '排序',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '友情链接描述',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '友情链接地址',
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '友情链接名称',
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '友情链接图标',
  `target` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '友情链接打开方式',
  `rel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '链接与网站的关系',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `status`(`status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '友情链接表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_link
-- ----------------------------
INSERT INTO `dj_link` VALUES (1, 0, 1, 8, 'thinkcmf官网', 'http://www.thinkcmf.com', 'ThinkCMF', '', '_blank', '');

-- ----------------------------
-- Table structure for dj_match
-- ----------------------------
DROP TABLE IF EXISTS `dj_match`;
CREATE TABLE `dj_match`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `match_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '比赛序号',
  `classify_id` int(20) UNSIGNED NOT NULL COMMENT '赛事类型id',
  `disc_id` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '盘id',
  `warA` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '战队甲方id',
  `warB` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '战队乙方id',
  `startTime` bigint(15) UNSIGNED NOT NULL DEFAULT 0 COMMENT '开赛时间',
  `is_live` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '开赛状态 1:未开赛;2:开赛',
  `bet_num` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '开放状态  1:未开放;2:开放;',
  `url_status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '直播状态 1:不可直播;2:可以直播;',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '状态  0:不可竞猜;1:可竞猜;2:停止竞猜;3.已经结束',
  `time` bigint(15) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `deletetime` bigint(12) UNSIGNED NOT NULL DEFAULT 1 COMMENT '删除表示 1:正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '赛事列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dj_match
-- ----------------------------
INSERT INTO `dj_match` VALUES (1, '20180824143510153509251046906', 2, 1, 3, 1, 1534847160, 1, 2, 1, 1, 1534847217, 1);

-- ----------------------------
-- Table structure for dj_match_bureau
-- ----------------------------
DROP TABLE IF EXISTS `dj_match_bureau`;
CREATE TABLE `dj_match_bureau`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '名称',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态 1:启用;2:停用;',
  `time` bigint(12) UNSIGNED NOT NULL DEFAULT 0 COMMENT '时间',
  `deletetime` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '删除标识 1:正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '局名称' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dj_match_bureau
-- ----------------------------
INSERT INTO `dj_match_bureau` VALUES (1, '全场', 1, 1534587835, 1);
INSERT INTO `dj_match_bureau` VALUES (2, '第一局', 1, 1535444358, 1);
INSERT INTO `dj_match_bureau` VALUES (3, '第二局', 1, 1535444369, 1);
INSERT INTO `dj_match_bureau` VALUES (4, '第三局', 1, 1535444380, 1);

-- ----------------------------
-- Table structure for dj_match_choice
-- ----------------------------
DROP TABLE IF EXISTS `dj_match_choice`;
CREATE TABLE `dj_match_choice`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '名称',
  `match_id` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '比赛id',
  `bureau_id` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '局id',
  `choice_id` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '竞猜选项id',
  `odds` float(10, 2) UNSIGNED NOT NULL DEFAULT 1.00 COMMENT '赔率',
  `choice` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '结果 1:未知;2:中;3:未中;',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态 1:启用;2:停用;',
  `time` bigint(15) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `deletetime` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '删除标识 1:正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '赔率列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dj_match_choice
-- ----------------------------
INSERT INTO `dj_match_choice` VALUES (1, 'Royal Bandits', 1, 1, 2, 2.22, 1, 1, 1535181080, 1);
INSERT INTO `dj_match_choice` VALUES (2, 'AGO', 1, 1, 3, 5.01, 1, 1, 1535442387, 1);
INSERT INTO `dj_match_choice` VALUES (3, 'Royal Bandits', 1, 2, 5, 3.11, 1, 1, 1535450642, 1);
INSERT INTO `dj_match_choice` VALUES (4, 'AGO', 1, 2, 6, 6.01, 1, 1, 1535450663, 1);

-- ----------------------------
-- Table structure for dj_match_disc
-- ----------------------------
DROP TABLE IF EXISTS `dj_match_disc`;
CREATE TABLE `dj_match_disc`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '名称',
  `time` bigint(12) UNSIGNED NOT NULL COMMENT '创建时间',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态 1:启用;2:停用;',
  `deletetime` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '删除标识 1: 正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '盘分类' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dj_match_disc
-- ----------------------------
INSERT INTO `dj_match_disc` VALUES (1, '滚球盘', 1534586502, 1, 1);

-- ----------------------------
-- Table structure for dj_match_user
-- ----------------------------
DROP TABLE IF EXISTS `dj_match_user`;
CREATE TABLE `dj_match_user`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(20) UNSIGNED NOT NULL COMMENT '用户id',
  `choice_id` int(20) UNSIGNED NOT NULL COMMENT '选择id',
  `number` decimal(10, 2) UNSIGNED NOT NULL COMMENT '金额',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态 1:未开奖;2:猜中;3:未中;',
  `time` bigint(15) UNSIGNED NOT NULL DEFAULT 0 COMMENT '时间',
  `deletime` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '删除标识 1:正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户竞猜数据' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_match_user
-- ----------------------------
INSERT INTO `dj_match_user` VALUES (1, 2, 1, 20.00, 1, 1534586502, 1);
INSERT INTO `dj_match_user` VALUES (2, 2, 2, 20.00, 1, 1535510306, 1);
INSERT INTO `dj_match_user` VALUES (3, 2, 2, 0.00, 1, 1535510442, 1);

-- ----------------------------
-- Table structure for dj_nav
-- ----------------------------
DROP TABLE IF EXISTS `dj_nav`;
CREATE TABLE `dj_nav`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `is_main` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '是否为主导航;1:是;0:不是',
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '导航位置名称',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '备注',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '前台导航位置表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_nav
-- ----------------------------
INSERT INTO `dj_nav` VALUES (1, 1, '主导航', '主导航');
INSERT INTO `dj_nav` VALUES (2, 0, '底部导航', '');

-- ----------------------------
-- Table structure for dj_nav_menu
-- ----------------------------
DROP TABLE IF EXISTS `dj_nav_menu`;
CREATE TABLE `dj_nav_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_id` int(11) NOT NULL COMMENT '导航 id',
  `parent_id` int(11) NOT NULL COMMENT '父 id',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态;1:显示;0:隐藏',
  `list_order` float NOT NULL DEFAULT 10000 COMMENT '排序',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单名称',
  `target` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '打开方式',
  `href` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '链接',
  `icon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '图标',
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '层级关系',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '前台导航菜单表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_nav_menu
-- ----------------------------
INSERT INTO `dj_nav_menu` VALUES (1, 1, 0, 1, 0, '首页', '', 'home', '', '0-1');

-- ----------------------------
-- Table structure for dj_option
-- ----------------------------
DROP TABLE IF EXISTS `dj_option`;
CREATE TABLE `dj_option`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `autoload` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '是否自动加载;1:自动加载;0:不自动加载',
  `option_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '配置名',
  `option_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '配置值',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `option_name`(`option_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '全站配置表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_option
-- ----------------------------
INSERT INTO `dj_option` VALUES (1, 1, 'site_info', '{\"site_name\":\"\\u7535\\u7ade\",\"site_seo_title\":\"ThinkCMF\\u5185\\u5bb9\\u7ba1\\u7406\\u6846\\u67b6\",\"site_seo_keywords\":\"ThinkCMF,php,\\u5185\\u5bb9\\u7ba1\\u7406\\u6846\\u67b6,cmf,cms,\\u7b80\\u7ea6\\u98ce, simplewind,framework\",\"site_seo_description\":\"ThinkCMF\\u662f\\u7b80\\u7ea6\\u98ce\\u7f51\\u7edc\\u79d1\\u6280\\u53d1\\u5e03\\u7684\\u4e00\\u6b3e\\u7528\\u4e8e\\u5feb\\u901f\\u5f00\\u53d1\\u7684\\u5185\\u5bb9\\u7ba1\\u7406\\u6846\\u67b6\",\"site_icp\":\"\",\"site_gwa\":\"\",\"site_admin_email\":\"\",\"site_analytics\":\"\"}');
INSERT INTO `dj_option` VALUES (2, 1, 'cmf_settings', '{\"open_registration\":\"0\",\"banned_usernames\":\"\"}');
INSERT INTO `dj_option` VALUES (3, 1, 'cdn_settings', '{\"cdn_static_root\":\"\"}');
INSERT INTO `dj_option` VALUES (4, 1, 'admin_settings', '{\"admin_password\":\"dianjing\",\"admin_style\":\"flatadmin\"}');
INSERT INTO `dj_option` VALUES (5, 1, 'smtp_setting', '{\"from_name\":\"xiexinlei\",\"from\":\"18380425296@163.com\",\"host\":\"smtp.163.com\",\"smtp_secure\":\"\",\"port\":\"25\",\"username\":\"18380425296@163.com\",\"password\":\"q697194w\"}');
INSERT INTO `dj_option` VALUES (6, 1, 'admin_dashboard_widgets', '[{\"name\":\"CmfDocuments\",\"is_system\":1},{\"name\":\"Custom1\",\"is_system\":1},{\"name\":\"MainContributors\",\"is_system\":1},{\"name\":\"Custom5\",\"is_system\":1},{\"name\":\"Contributors\",\"is_system\":1},{\"name\":\"Custom2\",\"is_system\":1},{\"name\":\"Custom3\",\"is_system\":1},{\"name\":\"Custom4\",\"is_system\":1},{\"name\":\"CmfHub\",\"is_system\":1}]');

-- ----------------------------
-- Table structure for dj_order
-- ----------------------------
DROP TABLE IF EXISTS `dj_order`;
CREATE TABLE `dj_order`  (
  `id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '订单号',
  `user_id` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  `goods_id` int(20) UNSIGNED NOT NULL COMMENT '商品id',
  `number` int(20) UNSIGNED NOT NULL COMMENT '数量',
  `all_price` decimal(15, 0) UNSIGNED NOT NULL COMMENT '总价',
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '电话号码',
  `qq` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'qq号码',
  `time` bigint(15) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态 0:审核未通过|取消;1:申请,2:审核通过;3:发货中;4:用户已签收;',
  `deletetime` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '删除标识 1:正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '订单表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_order
-- ----------------------------
INSERT INTO `dj_order` VALUES ('20180824143510153509251046906', 2, 1, 1, 3216000, '4561234546', '5645645', 1535083114, 1, 1);

-- ----------------------------
-- Table structure for dj_plugin
-- ----------------------------
DROP TABLE IF EXISTS `dj_plugin`;
CREATE TABLE `dj_plugin`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '插件类型;1:网站;8:微信',
  `has_admin` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否有后台管理,0:没有;1:有',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态;1:开启;0:禁用',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '插件安装时间',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '插件标识名,英文字母(惟一)',
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '插件名称',
  `demo_url` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '演示地址，带协议',
  `hooks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '实现的钩子;以“,”分隔',
  `author` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '插件作者',
  `author_url` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '作者网站链接',
  `version` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '插件版本号',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '插件描述',
  `config` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '插件配置',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '插件表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_plugin
-- ----------------------------
INSERT INTO `dj_plugin` VALUES (1, 1, 0, 1, 0, 'MobileCodeDemo', '手机验证码演示插件', '', '', 'ThinkCMF', '', '1.0', '手机验证码演示插件', '{\"account_sid\":\"\",\"auth_token\":\"\",\"app_id\":\"\",\"template_id\":\"\",\"expire_minute\":\"30\"}');

-- ----------------------------
-- Table structure for dj_portal_category
-- ----------------------------
DROP TABLE IF EXISTS `dj_portal_category`;
CREATE TABLE `dj_portal_category`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '分类父id',
  `post_count` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '分类文章数',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态,1:发布,0:不发布',
  `delete_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '删除时间',
  `list_order` float NOT NULL DEFAULT 10000 COMMENT '排序',
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '分类名称',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '分类描述',
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '分类层级关系路径',
  `seo_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `seo_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `seo_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `list_tpl` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '分类列表模板',
  `one_tpl` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '分类文章页模板',
  `more` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '扩展属性',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'portal应用 文章分类表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_portal_category_post
-- ----------------------------
DROP TABLE IF EXISTS `dj_portal_category_post`;
CREATE TABLE `dj_portal_category_post`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '文章id',
  `category_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '分类id',
  `list_order` float NOT NULL DEFAULT 10000 COMMENT '排序',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态,1:发布;0:不发布',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `term_taxonomy_id`(`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'portal应用 分类文章对应表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_portal_post
-- ----------------------------
DROP TABLE IF EXISTS `dj_portal_post`;
CREATE TABLE `dj_portal_post`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父级id',
  `post_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '类型,1:文章;2:页面',
  `post_format` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '内容格式;1:html;2:md',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '发表者用户id',
  `post_status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态;1:已发布;0:未发布;',
  `comment_status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '评论状态;1:允许;0:不允许',
  `is_top` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否置顶;1:置顶;0:不置顶',
  `recommended` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否推荐;1:推荐;0:不推荐',
  `post_hits` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '查看数',
  `post_favorites` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '收藏数',
  `post_like` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '点赞数',
  `comment_count` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '评论数',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `published_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '发布时间',
  `delete_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '删除时间',
  `post_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'post标题',
  `post_keywords` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'seo keywords',
  `post_excerpt` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'post摘要',
  `post_source` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '转载文章的来源',
  `thumbnail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '缩略图',
  `post_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '文章内容',
  `post_content_filtered` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '处理过的文章内容',
  `more` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '扩展属性,如缩略图;格式为json',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type_status_date`(`post_type`, `post_status`, `create_time`, `id`) USING BTREE,
  INDEX `parent_id`(`parent_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `create_time`(`create_time`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'portal应用 文章表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_portal_tag
-- ----------------------------
DROP TABLE IF EXISTS `dj_portal_tag`;
CREATE TABLE `dj_portal_tag`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态,1:发布,0:不发布',
  `recommended` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否推荐;1:推荐;0:不推荐',
  `post_count` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '标签文章数',
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '标签名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'portal应用 文章标签表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_portal_tag_post
-- ----------------------------
DROP TABLE IF EXISTS `dj_portal_tag_post`;
CREATE TABLE `dj_portal_tag_post`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tag_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '标签 id',
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '文章 id',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态,1:发布;0:不发布',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `post_id`(`post_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'portal应用 标签文章对应表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_recycle_bin
-- ----------------------------
DROP TABLE IF EXISTS `dj_recycle_bin`;
CREATE TABLE `dj_recycle_bin`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT 0 COMMENT '删除内容 id',
  `create_time` int(10) UNSIGNED DEFAULT 0 COMMENT '创建时间',
  `table_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '删除内容所在表名',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '删除内容名称',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = ' 回收站' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_role
-- ----------------------------
DROP TABLE IF EXISTS `dj_role`;
CREATE TABLE `dj_role`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父角色ID',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '状态;0:禁用;1:正常',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `list_order` float NOT NULL DEFAULT 0 COMMENT '排序',
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '角色名称',
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '备注',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `parent_id`(`parent_id`) USING BTREE,
  INDEX `status`(`status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '角色表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_role
-- ----------------------------
INSERT INTO `dj_role` VALUES (1, 0, 1, 1329633709, 1329633709, 0, '超级管理员', '拥有网站最高管理员权限！');
INSERT INTO `dj_role` VALUES (2, 0, 1, 1329633709, 1329633709, 0, '普通管理员', '权限由最高管理员分配！');

-- ----------------------------
-- Table structure for dj_role_user
-- ----------------------------
DROP TABLE IF EXISTS `dj_role_user`;
CREATE TABLE `dj_role_user`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '角色 id',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `role_id`(`role_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户角色对应表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_route
-- ----------------------------
DROP TABLE IF EXISTS `dj_route`;
CREATE TABLE `dj_route`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '路由id',
  `list_order` float NOT NULL DEFAULT 10000 COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '状态;1:启用,0:不启用',
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'URL规则类型;1:用户自定义;2:别名添加',
  `full_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '完整url',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '实际显示的url',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'url路由表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_route
-- ----------------------------
INSERT INTO `dj_route` VALUES (1, 5000, 1, 2, 'admin/Index/index', 'dianjing$');

-- ----------------------------
-- Table structure for dj_slide
-- ----------------------------
DROP TABLE IF EXISTS `dj_slide`;
CREATE TABLE `dj_slide`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态,1:显示,0不显示',
  `delete_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '删除时间',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '幻灯片分类',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '分类备注',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '幻灯片表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_slide_item
-- ----------------------------
DROP TABLE IF EXISTS `dj_slide_item`;
CREATE TABLE `dj_slide_item`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slide_id` int(11) NOT NULL DEFAULT 0 COMMENT '幻灯片id',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态,1:显示;0:隐藏',
  `list_order` float NOT NULL DEFAULT 10000 COMMENT '排序',
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '幻灯片名称',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '幻灯片图片',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '幻灯片链接',
  `target` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '友情链接打开方式',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '幻灯片描述',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '幻灯片内容',
  `more` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '链接打开方式',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `slide_id`(`slide_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '幻灯片子项表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_theme
-- ----------------------------
DROP TABLE IF EXISTS `dj_theme`;
CREATE TABLE `dj_theme`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '安装时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最后升级时间',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '模板状态,1:正在使用;0:未使用',
  `is_compiled` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否为已编译模板',
  `theme` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '主题目录名，用于主题的维一标识',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '主题名称',
  `version` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '主题版本号',
  `demo_url` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '演示地址，带协议',
  `thumbnail` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '缩略图',
  `author` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '主题作者',
  `author_url` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '作者网站链接',
  `lang` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '支持语言',
  `keywords` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '主题关键字',
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '主题描述',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_theme
-- ----------------------------
INSERT INTO `dj_theme` VALUES (1, 0, 0, 0, 0, 'simpleboot3', 'simpleboot3', '1.0.2', 'http://demo.thinkcmf.com', '', 'ThinkCMF', 'http://www.thinkcmf.com', 'zh-cn', 'ThinkCMF模板', 'ThinkCMF默认模板');

-- ----------------------------
-- Table structure for dj_theme_file
-- ----------------------------
DROP TABLE IF EXISTS `dj_theme_file`;
CREATE TABLE `dj_theme_file`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_public` tinyint(4) NOT NULL DEFAULT 0 COMMENT '是否公共的模板文件',
  `list_order` float NOT NULL DEFAULT 10000 COMMENT '排序',
  `theme` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '模板名称',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '模板文件名',
  `action` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '操作',
  `file` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '模板文件，相对于模板根目录，如Portal/index.html',
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '模板文件描述',
  `more` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '模板更多配置,用户自己后台设置的',
  `config_more` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '模板更多配置,来源模板的配置文件',
  `draft_more` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '模板更多配置,用户临时保存的配置',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_theme_file
-- ----------------------------
INSERT INTO `dj_theme_file` VALUES (7, 1, 0, 'simpleboot3', '模板全局配置', 'public/Config', 'public/config', '模板全局配置文件', '{\"vars\":{\"enable_mobile\":{\"title\":\"\\u624b\\u673a\\u6ce8\\u518c\",\"value\":1,\"type\":\"select\",\"options\":{\"1\":\"\\u5f00\\u542f\",\"0\":\"\\u5173\\u95ed\"},\"tip\":\"\"}}}', '{\"vars\":{\"enable_mobile\":{\"title\":\"\\u624b\\u673a\\u6ce8\\u518c\",\"value\":1,\"type\":\"select\",\"options\":{\"1\":\"\\u5f00\\u542f\",\"0\":\"\\u5173\\u95ed\"},\"tip\":\"\"}}}', NULL);
INSERT INTO `dj_theme_file` VALUES (8, 1, 1, 'simpleboot3', '导航条', 'public/Nav', 'public/nav', '导航条模板文件', '{\"vars\":{\"company_name\":{\"title\":\"\\u516c\\u53f8\\u540d\\u79f0\",\"name\":\"company_name\",\"value\":\"dianjing\",\"type\":\"text\",\"tip\":\"\",\"rule\":[]}}}', '{\"vars\":{\"company_name\":{\"title\":\"\\u516c\\u53f8\\u540d\\u79f0\",\"name\":\"company_name\",\"value\":\"ThinkCMF\",\"type\":\"text\",\"tip\":\"\",\"rule\":[]}}}', NULL);

-- ----------------------------
-- Table structure for dj_third_party_user
-- ----------------------------
DROP TABLE IF EXISTS `dj_third_party_user`;
CREATE TABLE `dj_third_party_user`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '本站用户id',
  `last_login_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最后登录时间',
  `expire_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'access_token过期时间',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '绑定时间',
  `login_times` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '登录次数',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态;1:正常;0:禁用',
  `nickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户昵称',
  `third_party` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '第三方惟一码',
  `app_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '第三方应用 id',
  `last_login_ip` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `access_token` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '第三方授权码',
  `openid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '第三方用户id',
  `union_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '第三方用户多个产品中的惟一 id,(如:微信平台)',
  `more` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '扩展信息',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '第三方用户表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_user
-- ----------------------------
DROP TABLE IF EXISTS `dj_user`;
CREATE TABLE `dj_user`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '用户类型;1:admin;2:会员',
  `sex` tinyint(2) NOT NULL DEFAULT 0 COMMENT '性别;0:保密,1:男,2:女',
  `birthday` int(11) NOT NULL DEFAULT 0 COMMENT '生日',
  `last_login_time` int(11) NOT NULL DEFAULT 0 COMMENT '最后登录时间',
  `score` int(11) NOT NULL DEFAULT 0 COMMENT '用户积分',
  `coin` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '金币',
  `balance` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '余额',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '注册时间',
  `user_status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '用户状态;0:禁用,1:正常,2:未验证',
  `user_login` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '登录密码;cmf_password加密',
  `user_nickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '用户昵称',
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户登录邮箱',
  `user_url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户个人网址',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户头像',
  `signature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '个性签名',
  `last_login_ip` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `user_activation_key` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '激活码',
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '中国手机不带国家代码，国际手机号格式为：国家代码-手机号',
  `more` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '扩展属性',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_login`(`user_login`) USING BTREE,
  INDEX `user_nickname`(`user_nickname`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_user
-- ----------------------------
INSERT INTO `dj_user` VALUES (1, 1, 0, -28800, 1535508796, 0, 0, 0.00, 1534385538, 1, 'admin', '###8d900c2deab8b6630ac19285294b21ec', '小谢', '2470588931@qq.com', '', '', '', '127.0.0.1', '', '', NULL);
INSERT INTO `dj_user` VALUES (2, 2, 0, 0, 1535530573, 2, 2, 0.00, 1534910393, 1, 'zhangsan', '###8d900c2deab8b6630ac19285294b21ec', '张三', '123456@qq.com', '', '', '', '127.0.0.1', '', '13532637539', NULL);

-- ----------------------------
-- Table structure for dj_user_action
-- ----------------------------
DROP TABLE IF EXISTS `dj_user_action`;
CREATE TABLE `dj_user_action`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score` int(11) NOT NULL DEFAULT 0 COMMENT '更改积分，可以为负',
  `coin` int(11) NOT NULL DEFAULT 0 COMMENT '更改金币，可以为负',
  `reward_number` int(11) NOT NULL DEFAULT 0 COMMENT '奖励次数',
  `cycle_type` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '周期类型;0:不限;1:按天;2:按小时;3:永久',
  `cycle_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '周期时间值',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户操作名称',
  `action` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户操作名称',
  `app` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '操作所在应用名或插件名等',
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '执行操作的url',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户操作表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_user_action
-- ----------------------------
INSERT INTO `dj_user_action` VALUES (1, 1, 1, 1, 2, 1, '用户登录', 'login', 'user', '');

-- ----------------------------
-- Table structure for dj_user_action_log
-- ----------------------------
DROP TABLE IF EXISTS `dj_user_action_log`;
CREATE TABLE `dj_user_action_log`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  `count` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '访问次数',
  `last_visit_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最后访问时间',
  `object` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '访问对象的id,格式:不带前缀的表名+id;如posts1表示xx_posts表里id为1的记录',
  `action` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '操作名称;格式:应用名+控制器+操作名,也可自己定义格式只要不发生冲突且惟一;',
  `ip` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户ip',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_object_action`(`user_id`, `object`, `action`) USING BTREE,
  INDEX `user_object_action_ip`(`user_id`, `object`, `action`, `ip`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '访问记录表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_user_balance_log
-- ----------------------------
DROP TABLE IF EXISTS `dj_user_balance_log`;
CREATE TABLE `dj_user_balance_log`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT 0 COMMENT '用户 id',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `change` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '更改余额',
  `balance` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '更改后余额',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '描述',
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '备注',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户余额变更日志表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_user_currency
-- ----------------------------
DROP TABLE IF EXISTS `dj_user_currency`;
CREATE TABLE `dj_user_currency`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(20) UNSIGNED NOT NULL COMMENT '用户id',
  `currency_id` int(20) UNSIGNED NOT NULL COMMENT '虚拟币id',
  `number` int(20) UNSIGNED NOT NULL COMMENT '数量',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态 1:正常2:被冻结',
  `time` bigint(15) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `deletetime` tinyint(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '删除标识 1:正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户虚拟币持有数目' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_user_favorite
-- ----------------------------
DROP TABLE IF EXISTS `dj_user_favorite`;
CREATE TABLE `dj_user_favorite`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户 id',
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '收藏内容的标题',
  `thumbnail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '缩略图',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '收藏内容的原文地址，JSON格式',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '收藏内容的描述',
  `table_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '收藏实体以前所在表,不带前缀',
  `object_id` int(10) UNSIGNED DEFAULT 0 COMMENT '收藏内容原来的主键id',
  `create_time` int(10) UNSIGNED DEFAULT 0 COMMENT '收藏时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `uid`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户收藏表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_user_like
-- ----------------------------
DROP TABLE IF EXISTS `dj_user_like`;
CREATE TABLE `dj_user_like`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户 id',
  `object_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '内容原来的主键id',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `table_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '内容以前所在表,不带前缀',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '内容的原文地址，不带域名',
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '内容的标题',
  `thumbnail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '缩略图',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '内容的描述',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `uid`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户点赞表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_user_login_attempt
-- ----------------------------
DROP TABLE IF EXISTS `dj_user_login_attempt`;
CREATE TABLE `dj_user_login_attempt`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login_attempts` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '尝试次数',
  `attempt_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '尝试登录时间',
  `locked_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '锁定时间',
  `ip` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户 ip',
  `account` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户账号,手机号,邮箱或用户名',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户登录尝试表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_user_money
-- ----------------------------
DROP TABLE IF EXISTS `dj_user_money`;
CREATE TABLE `dj_user_money`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  `currency_id` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户持有的虚拟币id',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '类型 1:添加;2:减少;',
  `number` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '交易数量',
  `balance` int(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '余额',
  `test` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '摘要',
  `time` bigint(15) UNSIGNED NOT NULL DEFAULT 0 COMMENT '交易时间',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态 1:交易成功;2:;',
  `deletetime` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '删除标识 1:正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '账号交易记录' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dj_user_score_log
-- ----------------------------
DROP TABLE IF EXISTS `dj_user_score_log`;
CREATE TABLE `dj_user_score_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT 0 COMMENT '用户 id',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `action` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户操作名称',
  `score` int(11) NOT NULL DEFAULT 0 COMMENT '更改积分，可以为负',
  `coin` int(11) NOT NULL DEFAULT 0 COMMENT '更改金币，可以为负',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户操作积分等奖励日志表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_user_score_log
-- ----------------------------
INSERT INTO `dj_user_score_log` VALUES (1, 2, 1535513128, 'login', 1, 1);
INSERT INTO `dj_user_score_log` VALUES (2, 2, 1535530573, 'login', 1, 1);

-- ----------------------------
-- Table structure for dj_user_token
-- ----------------------------
DROP TABLE IF EXISTS `dj_user_token`;
CREATE TABLE `dj_user_token`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT 0 COMMENT '用户id',
  `expire_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT ' 过期时间',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'token',
  `device_type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '设备类型;mobile,android,iphone,ipad,web,pc,mac,wxapp',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户客户端登录 token 表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_user_token
-- ----------------------------
INSERT INTO `dj_user_token` VALUES (1, 1, 1549937554, 1534385554, 'd4498bcda043bcb6c59107e76e0b30b6d4498bcda043bcb6c59107e76e0b30b6', 'web');
INSERT INTO `dj_user_token` VALUES (2, 2, 1551065128, 1535513128, 'a607f7a7f3398a99bdbf8133f3226010a607f7a7f3398a99bdbf8133f3226010', 'web');

-- ----------------------------
-- Table structure for dj_verification_code
-- ----------------------------
DROP TABLE IF EXISTS `dj_verification_code`;
CREATE TABLE `dj_verification_code`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '表id',
  `count` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '当天已经发送成功的次数',
  `send_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最后发送成功时间',
  `expire_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '验证码过期时间',
  `code` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '最后发送成功的验证码',
  `account` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '手机号或者邮箱',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '手机邮箱数字验证码表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dj_verification_code
-- ----------------------------
INSERT INTO `dj_verification_code` VALUES (1, 1, 1534391898, 1534393698, '298880', '18380425296');

-- ----------------------------
-- Table structure for dj_war_team
-- ----------------------------
DROP TABLE IF EXISTS `dj_war_team`;
CREATE TABLE `dj_war_team`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '战队名称',
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '战队图标',
  `classify_id` int(20) NOT NULL COMMENT '赛事类型id',
  `openid` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '第三方用户id',
  `union_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '第三方用户多个产品中的惟一 id,',
  `app_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '第三方应用 id',
  `time` bigint(15) NOT NULL COMMENT '创建时间',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态: 1正常',
  `deletetime` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '删除标识 1:正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '战队列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dj_war_team
-- ----------------------------
INSERT INTO `dj_war_team` VALUES (1, 'AGO', 'http://egame.leidata.com/wechat/Public/Esports/img/team_logo/156133.png', 1, '', '', '', 1534748214, 1, 1);
INSERT INTO `dj_war_team` VALUES (2, '3DMAX', 'http://egame.leidata.com/wechat/Public/Esports/img/team_logo/leida.png', 1, '', '', '', 1534750448, 1, 1);
INSERT INTO `dj_war_team` VALUES (3, 'Royal Bandits', 'http://egame.leidata.com/wechat/Public/Esports/img/team_logo/156717.png', 1, '', '', '', 1534750611, 1, 1);

SET FOREIGN_KEY_CHECKS = 1;
