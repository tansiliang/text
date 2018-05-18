-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 05 月 15 日 23:27
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `gdgxjx`
--

-- --------------------------------------------------------

--
-- 表的结构 `gx_admin_user`
--

CREATE TABLE IF NOT EXISTS `gx_admin_user` (
  `ad_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '����id',
  `ad_username` varchar(100) NOT NULL COMMENT '�û���',
  `ad_userpass` varchar(32) NOT NULL COMMENT 'md5����',
  `ad_mail` varchar(32) DEFAULT NULL COMMENT '��������',
  `ad_salt` varchar(10) DEFAULT NULL,
  `ad_addtime` int(11) NOT NULL COMMENT '����ʱ��',
  `ad_lastlogn` int(11) NOT NULL COMMENT '����¼ʱ��',
  `ad_lastip` varchar(15) NOT NULL COMMENT '��ȡ��¼��ip',
  `ad_actionlist` text,
  `ad_navlist` text COMMENT '����ԱȨ��',
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `gx_admin_user`
--

INSERT INTO `gx_admin_user` (`ad_id`, `ad_username`, `ad_userpass`, `ad_mail`, `ad_salt`, `ad_addtime`, `ad_lastlogn`, `ad_lastip`, `ad_actionlist`, `ad_navlist`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1398599250@qq.com', '104', 1522812043, 1526028246, '127.0.0.1', NULL, NULL),
(35, 'root', '63a9f0ea7bb98050796b649e85481845', '123456789@qq.com', '8858', 1524877364, 1524877364, '127.0.0.1', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `gx_foot_info`
--

CREATE TABLE IF NOT EXISTS `gx_foot_info` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '页脚id',
  `info_copy` varchar(50) DEFAULT NULL COMMENT '版权所有',
  `info_url` varchar(50) DEFAULT NULL COMMENT '首页URL',
  `info_icp` varchar(20) DEFAULT NULL COMMENT '备案号',
  `info_icp_url` varchar(50) DEFAULT NULL COMMENT '备案号的URL地址',
  `info_qq` varchar(10) DEFAULT NULL COMMENT '官方QQ',
  `info_wx` varchar(20) DEFAULT NULL COMMENT '官方微信',
  `info_wb` varchar(30) DEFAULT NULL COMMENT '新浪官方微博',
  `info_wb_url` varchar(50) DEFAULT NULL COMMENT '新浪微博URL地址',
  `info_dz` text COMMENT '地址',
  `info_email` varchar(10) DEFAULT NULL COMMENT '邮编',
  `info_phone` varchar(50) DEFAULT NULL COMMENT '电话',
  `info_show` int(11) DEFAULT '0' COMMENT '是否显示',
  PRIMARY KEY (`info_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `gx_foot_info`
--

INSERT INTO `gx_foot_info` (`info_id`, `info_copy`, `info_url`, `info_icp`, `info_icp_url`, `info_qq`, `info_wx`, `info_wb`, `info_wb_url`, `info_dz`, `info_email`, `info_phone`, `info_show`) VALUES
(1, '高新教育集团 ', 'http://www.gdgxjx.com', '粤ICP备09013763号', 'https://www.miitbeian.gov.cn', '1125308563', 'gdsgxjx', '@广东省高新技术技工学校', 'https://weibo.com', '广州市花都区芙蓉大道旗岭段新花路6号', '510860', '020-86984488、86993836、86991911', 1);

-- --------------------------------------------------------

--
-- 表的结构 `gx_friend_link`
--

CREATE TABLE IF NOT EXISTS `gx_friend_link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '链接id',
  `link_name` text NOT NULL COMMENT '链接名称',
  `link_url` varchar(100) NOT NULL COMMENT '链接URL地址',
  `link_show` int(11) DEFAULT '0' COMMENT '是否显示',
  `show_order` int(11) DEFAULT NULL COMMENT '调整顺序',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `gx_friend_link`
--

INSERT INTO `gx_friend_link` (`link_id`, `link_name`, `link_url`, `link_show`, `show_order`) VALUES
(1, '高新教育集团', 'http://www.gaoxinjy.com', 1, 1),
(2, '广州市高新医药与食品技工学校', 'http://www.gzgxysjx.com', 1, 3),
(4, '百度', 'https://www.baidu.com', 0, 9),
(5, '腾讯', 'https://www.qq.com', 0, 5);

-- --------------------------------------------------------

--
-- 表的结构 `gx_navigation_foot`
--

CREATE TABLE IF NOT EXISTS `gx_navigation_foot` (
  `foot_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `foot_name` text NOT NULL COMMENT '导航栏名称',
  `foot_url` varchar(100) NOT NULL COMMENT '导航栏的链接地址',
  `foot_show` int(11) DEFAULT '0' COMMENT '是否显示',
  `foot_order` int(11) DEFAULT NULL COMMENT '显示顺序',
  PRIMARY KEY (`foot_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `gx_navigation_foot`
--

INSERT INTO `gx_navigation_foot` (`foot_id`, `foot_name`, `foot_url`, `foot_show`, `foot_order`) VALUES
(12, '入学须知', 'www.gdgxjx.com', 1, 4),
(9, '校园风光', 'www.gdgxjx.com', 1, 1),
(10, '人才招聘', 'www.gdgxjx.com', 1, 2),
(11, '报名指南', 'www.gdgxjx.com', 1, 3),
(13, '乘车路线', 'www.gdgxjx.com', 1, 5),
(14, '学校内网', 'https://oa.gdgxjx.cn', 1, 10);

-- --------------------------------------------------------

--
-- 表的结构 `gx_naviga_top`
--

CREATE TABLE IF NOT EXISTS `gx_naviga_top` (
  `naviga_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '导航id',
  `naviga_name` varchar(20) NOT NULL COMMENT '导航名',
  `naviga_url` varchar(100) NOT NULL COMMENT '导航地址',
  `naviga_bar` int(11) NOT NULL DEFAULT '0' COMMENT '是否在导航栏上显示',
  `naviga_order` int(11) NOT NULL DEFAULT '1' COMMENT '调整顺序',
  `naviga_parent` int(11) NOT NULL COMMENT '父类id',
  PRIMARY KEY (`naviga_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `gx_naviga_top`
--

INSERT INTO `gx_naviga_top` (`naviga_id`, `naviga_name`, `naviga_url`, `naviga_bar`, `naviga_order`, `naviga_parent`) VALUES
(22, '学校概况', 'index.php?p=font&c=Index&a=presslist', 1, 2, 0),
(23, '院系设置', 'index.php?p=font&c=Index&a=presslist', 1, 3, 0),
(24, '学历教育', 'index.php?p=font&c=Index&a=presslist', 1, 4, 0),
(25, '招生就业', 'index.php?p=font&c=Index&a=presslist', 1, 5, 0),
(26, '培训鉴定', 'index.php?p=font&c=Index&a=presslist', 1, 6, 0),
(27, '合作交流', 'index.php?p=font&c=Index&a=presslist', 0, 7, 0),
(28, '联系我们', 'index.php?p=font&c=Index&a=presslist', 1, 8, 0),
(29, '学校简介', 'index.php?p=font&c=Index&a=presslist', 0, 1, 22),
(30, '组织机构', 'index.php?p=font&c=Index&a=presslist', 1, 2, 22),
(31, '学校动态', 'index.php?p=font&c=Index&a=presslist', 1, 3, 22),
(32, '计算机系', 'index.php?p=font&c=Index&a=presslist', 1, 1, 23),
(33, '机电工程系', 'index.php?p=font&c=Index&a=presslist', 1, 2, 23),
(34, '经贸系', 'index.php?p=font&c=Index&a=presslist', 1, 3, 23),
(35, '艺术系', 'index.php?p=font&c=Index&a=presslist', 1, 5, 23),
(36, '汽车工程系', 'index.php?p=font&c=Index&a=presslist', 1, 6, 23),
(37, '后台', 'index.php?p=admin&c=Admin&a=login', 1, 9, 0);

-- --------------------------------------------------------

--
-- 表的结构 `gx_press`
--

CREATE TABLE IF NOT EXISTS `gx_press` (
  `press_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '新闻id',
  `press_title` text COMMENT '新闻标题',
  `press_author` varchar(50) DEFAULT NULL COMMENT '来源',
  `press_releaseTime` int(11) DEFAULT NULL COMMENT '发布时间',
  `press_updateTime` int(11) DEFAULT NULL COMMENT '更新时间',
  `press_content` text COMMENT '新闻内容',
  `press_keyword` varchar(200) DEFAULT NULL COMMENT '新闻关键字',
  `press_click` int(11) DEFAULT '0' COMMENT '点击次数',
  `press_hot` int(11) DEFAULT '0' COMMENT '热门，1是显示热门',
  `press_order` int(11) DEFAULT '0' COMMENT '顺序,置顶填0',
  `press_file` varchar(50) DEFAULT NULL COMMENT '上传图片',
  `press_show` int(11) DEFAULT '0' COMMENT '发布/撤回,为1发布',
  `press_categoryid` int(11) DEFAULT NULL COMMENT '新闻类别',
  PRIMARY KEY (`press_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `gx_press`
--

INSERT INTO `gx_press` (`press_id`, `press_title`, `press_author`, `press_releaseTime`, `press_updateTime`, `press_content`, `press_keyword`, `press_click`, `press_hot`, `press_order`, `press_file`, `press_show`, `press_categoryid`) VALUES
(1, '第三季《中国新歌声》全国校园海选赛在广东省高新技术技工学校举行', '行政办', 1523435921, 1523601306, '<p style="text-align:center;">\r\n	<span style="font-family:SimSun;font-size:16px;background-color:#FFFFFF;"><br />\r\n</span> \r\n</p>\r\n<p style="text-align:left;">\r\n	<span style="font-family:SimSun;font-size:16px;background-color:#FFFFFF;"> &nbsp;&nbsp;3月31日，第三季《中国新歌声》全国校园海选赛在广东省高新技术技工学校举行。</span> \r\n</p>\r\n<p style="text-align:left;">\r\n	<img src="/app/view/admin/js/kindeditor/attached/image/20180413/20180413062951_83265.jpg" alt="" /> \r\n</p>\r\n<p style="text-align:left;">\r\n	<br />\r\n</p>\r\n<p style="text-align:left;font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<span style="font-family:SimSun;font-size:16px;">&nbsp; &nbsp;随着主持人宣布“第三季《中国新歌声》正式开始”，本次活动拉开了帷幕。</span> \r\n</p>\r\n<p style="text-align:left;font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<span style="font-family:SimSun;font-size:16px;"> 选手依次走上舞台，倾情演唱，歌声动人，比赛时赛场上不时传来同学们的掌声、喝彩声。</span> \r\n</p>\r\n<img src="/app/view/admin/js/kindeditor/attached/image/20180413/20180413063009_26831.jpg" alt="" /><img src="/app/view/admin/js/kindeditor/attached/image/20180413/20180413063016_10991.jpg" alt="" /><img src="/app/view/admin/js/kindeditor/attached/image/20180413/20180413063024_60575.jpg" alt="" /> \r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:left;">\r\n	<span style="font-family:SimSun;font-size:16px;background-color:#FFFFFF;"> 当主持人说道，“请24号选手谭怡蓉上台演唱“时，观众席迎来了最热烈的掌声！怡蓉演唱的歌曲是《那么骄傲》，那娓娓动听的歌声传到评委们的耳朵，获得了评委们的一致好评，三位评委不约而同举起通过牌。</span> \r\n</p>\r\n<p style="text-align:left;">\r\n	<img src="/app/view/admin/js/kindeditor/attached/image/20180413/20180413063109_15973.jpg" alt="" /> \r\n</p>\r\n<p style="text-align:left;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;text-align:justify;">\r\n	<span style="font-family:SimSun;font-size:16px;"> 本次比赛中，每位选手的最终得分不仅取决于现场评审团，还取决于网络上大众评审。随着比赛逐渐接近尾声。经过紧张而激烈的现场评比，有四位选手直接晋级，分别是程俊、陈恬、罗子晴、谭怡蓉；通过网络投票评审，有九位同学获得晋级卡，</span><span style="font-family:SimSun;font-size:16px;">还评选出了本次网络投票的人气王。</span><span style="font-family:SimSun;font-size:16px;">三位评委依次上台为晋级的选手颁发晋级卡。</span> \r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;text-align:justify;">\r\n	<span style="font-family:SimSun;font-size:16px;"> 此次“中国新歌声”全国校园海选赛赛出了高新学子们的精神风貌！</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<div style="text-align:center;">\r\n	<div style="text-align:left;">\r\n	</div>\r\n</div>', '', 0, 1, 0, 'Press/Press_5ad04ed83070a.jpg', 1, 1),
(2, '高新社团风云|满屏的颜值和才华，他们怎么看着有点眼熟？', '行政办', 1523441454, 1523540360, '', '高新', 10, 0, 5, 'Press/Press_5acde631c0b3a.JPG', 1, 1),
(5, '高新社团风云|街舞协会演绎网红舞蹈《bboom bboom》，还有清晰的教学版哦', '', 1523521090, 1523584129, '', '大多数的', 0, 1, 0, '', 1, 1),
(3, '【喜讯】冲向国际，高新学校“面具人团队”这回厉害了！', '行政办', 1523520993, 1523520993, '', '大多数的', 0, 0, 5, NULL, 1, 0),
(4, '汇德教育-高新教育集团MBA高级研修课程花都教学点力促地方中高端人才培养', '项目组', 1523521059, 1523521059, '', '大多数的', 0, 1, 8, NULL, 1, 0),
(6, '手绘图解新十年的办学思路“学校产业化，专业企业化”', '项目组', 1523521147, 1523521147, '', '大多数的', 0, 1, 45, NULL, 1, 0),
(7, '人物|黄炜耀：四海之内，镜头之外', '项目组', 1523521177, 1523522065, '', '校庆', 0, 1, 53, '', 1, 0),
(8, '清明放假', '教务处', 1523589454, 1523590582, '<div style="text-align:center;">\r\n	发顺丰水电费水电费水电费水电费水电费水电费水电费水电费\r\n</div>', '放假', 0, 0, 150, 'Press/Press_5ad0214ecd458.png', 1, 6);

-- --------------------------------------------------------

--
-- 表的结构 `gx_press_class`
--

CREATE TABLE IF NOT EXISTS `gx_press_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '新闻分类id',
  `class_name` varchar(20) DEFAULT NULL COMMENT '分类名',
  `class_order` int(4) DEFAULT NULL COMMENT '排序',
  `class_parent` int(11) DEFAULT NULL COMMENT '父类id',
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `gx_press_class`
--

INSERT INTO `gx_press_class` (`class_id`, `class_name`, `class_order`, `class_parent`) VALUES
(1, '最新新闻', 5, 0),
(2, '热门新闻', 3, 0),
(3, '公告新闻', 6, 1),
(4, '简介', 7, 0),
(6, '通知公告', 4, 0);

-- --------------------------------------------------------

--
-- 表的结构 `gx_session`
--

CREATE TABLE IF NOT EXISTS `gx_session` (
  `sess_name` varchar(32) NOT NULL,
  `sess_data` text COMMENT '入库信息',
  `expact` int(11) DEFAULT NULL COMMENT '获得入库的时间戳',
  PRIMARY KEY (`sess_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `gx_session`
--

INSERT INTO `gx_session` (`sess_name`, `sess_data`, `expact`) VALUES
('rqep3bkpri84u4p2p38hujt7b5', 'is_captcha|s:4:"S2GY";is_name|s:3:"yes";', 1526028889);

-- --------------------------------------------------------

--
-- 表的结构 `gx_webset`
--

CREATE TABLE IF NOT EXISTS `gx_webset` (
  `web_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `web_name` varchar(20) DEFAULT NULL COMMENT '网站名称',
  `web_title` varchar(100) DEFAULT NULL COMMENT '标题',
  `web_title_ico` varchar(50) DEFAULT NULL COMMENT '标题图标',
  `web_seo` text COMMENT 'seo关键字',
  `web_bewrite` text COMMENT '描述',
  `web_show` int(11) DEFAULT '0' COMMENT '是否显示',
  PRIMARY KEY (`web_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `gx_webset`
--

INSERT INTO `gx_webset` (`web_id`, `web_name`, `web_title`, `web_title_ico`, `web_seo`, `web_bewrite`, `web_show`) VALUES
(17, '高新d', '大高新', 'Webset/20180414/webset_5ad1c8217fd62.jpg', 'dfs', 'fsdf', 0),
(15, '广东省高新技术技工学校', '广东省高新技术技工学校--网站', 'Webset/webset_5acec4f2b71af.png', '给第三方技工学校,广东技校,广东省技工学校,高级技工学校,职业技术学校,广东省高新技术技工学校,高新技工', '广东省高新技术技工学校，是一所培养中、高级技能人才的省属全日制省重点技工学校，\r\n高新建有高标准的教学大楼、宿舍、食堂、足球场、篮球场、图书馆及文体活动场所等设备设施，\r\n配套完善、功能先进，是广东省职业教育规模较大、发展较快、发展潜力较大的中级技工和高级技工院校。\r\n现已有全日制在校学生1万余人、教职工330余人。', 1);

-- --------------------------------------------------------

--
-- 表的结构 `gx_works`
--

CREATE TABLE IF NOT EXISTS `gx_works` (
  `works_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `works_title` text COMMENT '文章名称',
  `works_releaseTime` int(11) DEFAULT NULL COMMENT '发布时间',
  `works_updateTime` int(11) DEFAULT NULL COMMENT '更新时间',
  `works_content` text COMMENT '文章内容',
  `works_hot` int(11) DEFAULT '0' COMMENT '热门，1是显示热门',
  `works_order` int(11) DEFAULT '0' COMMENT '顺序,置顶填0',
  `works_file` varchar(50) DEFAULT NULL COMMENT '上传图片',
  `works_show` int(11) DEFAULT '0' COMMENT '发布/撤回,为1发布',
  `works_categoryid` int(11) DEFAULT NULL COMMENT '文章类别',
  PRIMARY KEY (`works_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `gx_works`
--

INSERT INTO `gx_works` (`works_id`, `works_title`, `works_releaseTime`, `works_updateTime`, `works_content`, `works_hot`, `works_order`, `works_file`, `works_show`, `works_categoryid`) VALUES
(3, '学校简介', 1523539578, 1523591516, '<p style="text-align:center;text-indent:2em;">\r\n	<br />\r\n</p>\r\n<h2 style="font-size:18px;text-align:center;font-family:宋体;background-color:#FFFFFF;text-indent:2em;">\r\n	服务企业 成就学生 办人民满意的职业教育\r\n</h2>\r\n<p style="text-indent:2em;">\r\n	<span id="con_show" style="font-size:14px;line-height:25px;font-family:宋体;background-color:#FFFFFF;"> </span> \r\n</p>\r\n<p style="text-align:center;text-indent:2em;">\r\n	<b><span style="font-size:16pt;">——<span style="font-size:14px;">广东省高新技术技工学校简介</span></span></b> \r\n</p>\r\n<p style="text-indent:2em;">\r\n	<br />\r\n</p>\r\n<p style="text-indent:2em;">\r\n	<br />\r\n</p>\r\n<p style="text-indent:2em;">\r\n	<br />\r\n</p>\r\n<p style="text-indent:2em;">\r\n	<span></span> \r\n</p>\r\n<p>\r\n	<img src="/app/view/admin/js/kindeditor/attached/image/20180413/20180413034755_59191.jpg" alt="" /> \r\n</p>\r\n<p style="text-indent:2em;">\r\n	<span style="font-family:宋体;font-size:14px;background-color:#FFFFFF;"></span> \r\n</p>\r\n<p style="text-align:left;text-indent:2em;">\r\n	<span style="font-size:16px;">广东省高新技术技工学校成立于</span><span style="font-family:NSimSun;font-size:16px;">2008年，是一所培养中、高级技能人才的省属全日制省重点技工学校。学校坐落在广州新机场经济圈内，毗邻花都空港经济区、</span><span style="font-family:NSimSun;font-size:16px;">广</span><span style="font-family:NSimSun;font-size:16px;">州万达文化旅游城</span><span style="font-family:NSimSun;font-size:16px;">、</span><span style="font-family:NSimSun;font-size:16px;">花都汽车城、花都珠宝城、狮岭国际皮具城等大型工、商业园区，交通便利，环境优越，企业云集，可为学子提供良好的实习就业平台。</span> \r\n</p>\r\n<p style="text-indent:2em;">\r\n	<span style="font-family:宋体;font-size:14px;background-color:#FFFFFF;"> </span> \r\n</p>\r\n<p style="text-indent:2em;">\r\n	<span style="font-family:NSimSun;font-size:16px;"><br />\r\n</span> \r\n</p>\r\n<p style="text-indent:2em;">\r\n	<span style="font-family:宋体;font-size:14px;background-color:#FFFFFF;"> </span>\r\n</p>\r\n<p>\r\n	<span style="font-family:NSimSun;font-size:16px;">&nbsp; &nbsp;学校占地</span><span style="font-family:NSimSun;font-size:16px;">300多亩，校园校舍建筑10多万平方米。有独立的实训大楼，设有</span><span style="font-family:NSimSun;font-size:16px;">机器人、数控、模具、机电、制冷、汽修、钢琴、舞蹈、珠宝、玉雕、</span><span style="font-family:NSimSun;font-size:16px;">物流、摄影、计算机、茶艺等</span><span style="font-family:NSimSun;font-size:16px;">46个实训室，校内实训场地达1万多平方米；学校建有高标准的教学大楼、学生宿舍、食堂、足球场、图书馆等设施及文体活动场所，并配备语音室、</span><span style="font-family:NSimSun;font-size:16px;">录播室</span><span style="font-family:NSimSun;font-size:16px;">、多媒体室等现代化教学设施，配套完善、功能先进，是广东省</span><span style="font-family:NSimSun;font-size:16px;">技工</span><span style="font-family:NSimSun;font-size:16px;">教育中规模较大、发展较快、最具发展潜力的技工院校之一。</span> \r\n</p>\r\n<p>\r\n	<span style="font-family:NSimSun;font-size:16px;"><br />\r\n</span> \r\n</p>\r\n<span style="font-family:宋体;font-size:14px;background-color:#FFFFFF;"> \r\n<p>\r\n	<span style="font-family:NSimSun;font-size:16px;">&nbsp; 学校现设有计算机系、艺术系、经贸系、机电工程系和汽车工程系五大教学系部，开设市场营销、电子商务等</span><span style="font-family:NSimSun;font-size:16px;">20多个热门专业，全日制在校学生1万余人，教职工330余人。</span> \r\n</p>\r\n<p>\r\n	<span style="font-family:NSimSun;font-size:16px;"><br />\r\n</span> \r\n</p>\r\n</span><span style="font-family:宋体;font-size:14px;background-color:#FFFFFF;"> \r\n<p>\r\n	<span style="font-family:NSimSun;font-size:16px;">&nbsp; &nbsp;学校突出办学特色，注重内涵发展。坚持以珠三角发展先进制造业、高新技术产业、现代服务业的需要为重点，以花都当地经济为依托，结合自身的办学条件，不断优化专业设置，逐渐形成了以现代物流、汽车维修等重点专业，和翡翠玉石设计与雕刻特色专业相结合的专业发展方向。这些专业在人才培养模式、教学改革、人才培养质量等方面逐步形成自身特色优势。特色化办学助推学校发展，学校办学优势更加明显，办学活力进一步增强，受到社会各界的认可和好评。</span> \r\n</p>\r\n<p>\r\n	<span style="font-family:NSimSun;font-size:16px;"><br />\r\n</span> \r\n</p>\r\n</span><span style="font-family:宋体;font-size:14px;background-color:#FFFFFF;"> \r\n<p>\r\n	<span style="font-family:NSimSun;font-size:16px;">&nbsp; &nbsp;学校秉承</span><span style="font-family:NSimSun;font-size:16px;">“服务令学生满意、管理令家长放心、技能令企业信赖、教育令社会赞誉”的办学宗旨，坚持以企业用人需求为导向，注重提升学生的综合职业能力，着力培养高素质、技能娴熟的</span><span style="font-family:NSimSun;font-size:16px;">高技能</span><span style="font-family:NSimSun;font-size:16px;">技术人才。学校加快与行业、企业的合作，教学上采用一体化教学模式，努力实现</span><span style="font-family:NSimSun;font-size:16px;">“学校即企业、教室即车间、教师即师傅、学生即员工”的办学模式。目前，与200多家企业合作办学，每个专业都建立校外实践基地与顶岗实习点，让学生在学习一定的基础知识后，直接到合作企业实践，实现无缝对接，从而全力打造走出校园即可上岗的实战型技术人才。学校设有就业指导中心专门负责学生的就业指导和毕业生工作，建有完善的毕业生实习就业网络系统。由于培养目标明确，教学质量不断提高，毕业生就业率连续多年达98%以上。</span> \r\n</p>\r\n<p>\r\n	<span style="font-family:NSimSun;font-size:16px;"><br />\r\n</span> \r\n</p>\r\n</span><span style="font-family:宋体;font-size:14px;background-color:#FFFFFF;"> \r\n<p>\r\n	<span style="font-family:NSimSun;font-size:16px;">&nbsp; &nbsp;学校本着</span><span style="font-family:NSimSun;font-size:16px;">“为学生服务一生，让学生终身受益”的服务理念，依托高校资源优势创办丰富的学历教育，先后与华南理工大学、广东外语外贸大学多所院校合作办学，努力为学生搭建继续发展的平台，既突出高技教育的操作技能训练，又强化高等教育的系统理论学习，让学生无论在校，还是在职，都能享受终身教育服务。现开设专科层次15个专业，</span><span style="font-family:NSimSun;font-size:16px;">学员已达</span><span style="font-family:NSimSun;font-size:16px;">6500余人，其中毕业生1500人</span><span style="font-family:NSimSun;font-size:16px;">。学校重视社会服务与品牌形象，大力开展职业培训、职业技能鉴定及职业资格认证工作，设有国家职业技能鉴定所，承担人力资源师等</span><span style="font-family:NSimSun;font-size:16px;">5个工种鉴定考核工作，年均培训人数3000多人次。学校是“广东省范增平茶文化发展中心”，平均每年为社会培训近千名的茶艺工作人员。与此同时，学校也将茶艺师课程开设为学生的公共课，进一步提升学校的文化底蕴，深化弘扬以德育为首的教育理念。</span> \r\n</p>\r\n<p>\r\n	<span style="font-family:NSimSun;font-size:16px;"><br />\r\n</span> \r\n</p>\r\n</span><span style="font-family:宋体;font-size:14px;background-color:#FFFFFF;"> \r\n<p>\r\n	<span style="font-family:NSimSun;font-size:16px;">&nbsp; &nbsp;学校办学成绩显著。在历年的技能大赛中，师生在全省乃至全国均获得较好的成绩。如：</span><span style="font-family:NSimSun;font-size:16px;">2011年</span><span style="font-family:NSimSun;font-size:16px;">，</span><span style="font-family:NSimSun;font-size:16px;">广东省第一届职业英语大赛中，我校</span><span style="font-family:NSimSun;font-size:16px;">8人参赛，7人获奖，其中，朱淑锦以全省第一名的优异成绩，获得国家奖励，经贸系罗有娣荣获优秀教练奖；</span><span style="font-family:NSimSun;font-size:16px;">2012年</span><span style="font-family:NSimSun;font-size:16px;">，第二届职业英语大赛中，</span><span style="font-family:NSimSun;font-size:16px;">10商英冯美红获二等奖、11商英邓琼姣、10商英林燕娟荣获三等奖；</span><span style="font-family:NSimSun;font-size:16px;">2013年</span><span style="font-family:NSimSun;font-size:16px;">，叶锡雄在北大青鸟</span><span style="font-family:NSimSun;font-size:16px;">“DIY年历”比赛中获得全国一等奖；在北大青鸟“平面设计”大赛中陈雪、蔡如恩获得广东省二等奖，学校幼儿教育专业学生在中艺星光杯“中国梦”全国艺术人才教育成果展活动中荣获“青年A组”组别“舞蹈”项目“金奖”；</span><span style="font-family:NSimSun;font-size:16px;"> </span><span style="font-family:NSimSun;font-size:16px;">麦文婷</span><span style="font-family:NSimSun;font-size:16px;">2012青鸟杯职教先锋优秀教师；省厅英语教师教学设计大赛中，罗有娣荣获二等奖；省厅德育教学设计大赛，李春蕾老师荣获二等奖、陈韵辉荣获优秀奖；</span><span style="font-family:NSimSun;font-size:16px;">2014年</span><span style="font-family:NSimSun;font-size:16px;">，第六届亚洲大洋洲国际少儿艺术节广东省赛区决赛中，李文意、黄晓纯荣获少年组器乐类金奖。</span><span style="font-family:NSimSun;font-size:16px;">2015年</span><span style="font-family:NSimSun;font-size:16px;">，卢珊珊老师在第一届班主任专业大赛中荣获二等奖；</span><span style="font-family:NSimSun;font-size:16px;">2016年</span><span style="font-family:NSimSun;font-size:16px;">，在省厅组织的师生专业技能比赛中，我校黎晓恩等</span><span style="font-family:NSimSun;font-size:16px;">7名老师分别荣获二等奖、三等奖，15级汽修学生陈昌云荣获全省第四名。除此之外，学校教师多次荣获</span><span style="font-family:NSimSun;font-size:16px;">省厅优秀教学成果奖，如徐思平、陈韵辉、潘秀琼等，</span><span style="font-family:NSimSun;font-size:16px;">出版教材</span><span style="font-family:NSimSun;font-size:16px;">30余种</span><span style="font-family:NSimSun;font-size:16px;">；</span><span style="font-family:NSimSun;font-size:16px;">在全省专项资金竞争中，学校以雄厚的办学实力和良好的社会形象在众多的学校中脱颖而出，从</span><span style="font-family:NSimSun;font-size:16px;">2012年起，连续获得共660万政府专项资金扶持。</span> \r\n</p>\r\n<p>\r\n	<span style="font-family:NSimSun;font-size:16px;"><br />\r\n</span> \r\n</p>\r\n</span><span style="font-family:宋体;font-size:14px;background-color:#FFFFFF;"> \r\n<p>\r\n	<span style="font-family:NSimSun;font-size:16px;">&nbsp; &nbsp;学校坚持以特色创品牌，以质量上层次，以培养高素质的技能型人才为目标，以立德树人为根本，以企业需求为导向，以服务学生为宗旨，深化产教融合、校企合作，走有特色的中高等职业教育发展之路，努力办成人民满意的职业教育，建设一个特色鲜明、人才辈出的职业技术学校，为经济社会发展创造更大的人才红利。</span> \r\n</p>\r\n<div>\r\n	<span style="font-family:NSimSun;font-size:16px;"><br />\r\n</span> \r\n</div>\r\n</span><span></span> \r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-indent:2em;">\r\n	<br />\r\n</p>', 0, 1, 'Works/works_5acf5e7abd4a8.jpg', 1, 22),
(4, '组织机构', 1523540165, 1523592571, '<p style="font-size:18px;text-align:center;font-family:宋体;background-color:#FFFFFF;">\r\n	<strong>学校组织架构</strong> \r\n</p>\r\n<p style="font-size:18px;text-align:center;font-family:宋体;background-color:#FFFFFF;">\r\n	<strong><img src="/app/view/admin/js/kindeditor/attached/image/20180413/20180413040929_60924.jpg" alt="" /><br />\r\n</strong>\r\n</p>\r\n<p style="font-size:18px;text-align:center;font-family:宋体;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	主要工作职责\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	一、行政办公室\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	1、起草学校报告、决议、规划、规章制度、工作 计划和总结，起草或审核以学校名义上报、下发的文件，向全校发布通告、通知。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	2、负责人事管理和劳动工资、劳动保障等工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	3、做好评审和聘任的事务性工作。按照“高学历、高职称、高水平”的要求，做好人员的储备、招聘和调配程序，并办理有关手续。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	4、执行教职工的考勤请假制度、工资管理制度，做好医疗保险、社保、福利等工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	5、贯彻执行学校干部考核制度，会同有关部门做好干部考察和鉴定工作，办理干部任免手续。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	6、收发有关文件、信函、电报等；办理公文的介记编号、签发、分送工作；催办上级和学校限期办理的事项。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	7、完成学校交办的其他工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	二、教务处工作职责\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	1、拟定学校教学工作计划，制定教学规章制度，研究并提出学校发展规划、教学体制改革等方面的意见，并组织实施。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	2、组织制定各专业系教学实习和实训计划，协助各专业系做好校内实训基地的合理使用、调配及建设工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	3、负责全校教材的预定和补订、印刷、保管及供应等工作（各专业系提供相关教材名字）。组织教材及教学参考书编写的规划、审定工作。负责各专业系学生教材费的计算。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	4、全面管理各项日常教学业务。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	5、组织全校的教学改革研究工作，组织实施重大教改项目。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	6、办理入学、注册、编班等工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	7、完成学校领导交办的其它工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<span style="line-height:1.5;">三、总务处岗位职责</span> \r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<span style="line-height:1.5;"><br />\r\n</span> \r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	1、负责全校房屋、办公用品的计划、采购、配备、维修和管理。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	2、负责教职工宿舍的管理、调整工作；协助宿管办管理学生宿舍。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	3、负责学校的土地、道路、围墙、运动场地、临时设施以及各种管道的管理和维修工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	4、负责学校照明和生活线路、闭路电视、校园网等线路以及各种电源、电器设备等的管理和维修。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	5、负责校园建设和保护工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	6、负责学校物资的计划、申报、采购、保管、分配与供应工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	7、负责全校师生员工的卫生保健和疾病防治工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	8、完成学校领导交办的其它工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<span style="line-height:1.5;">四、财务处工作职责</span> \r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<span style="line-height:1.5;"><br />\r\n</span> \r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	1、合理安排和正确使用学校经费，坚持原则，抵制各种违反财务制度的行为。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	2、审核每笔收支原始凭证，及时结算记账，发现问题及时查实和向有关领导汇报。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	3、按照国家财务制度的规定，做好学校经费的开支、审核、计算、财务处理工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	4、负责做好每学期学生收费情况的核对及代管费的收支统计和结算工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	5、定期与物资管理员核对学校固定资产账目，做到账实相符。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	6、完成学校交办的其他工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	五、校工会工作职责\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	1、组织召开教职工代表大会和工会会员大会，参与学校行政管理，维护教职工的合法权益。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	2、督促行政办好职工福利，关心教职工生活，改善教职工工作条件和生活条件。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	3、积极开展有益教职工身心健康的文娱、体育活动，管理工会俱乐部；维护女职工的合法权益，做好女工保护工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	4、加强工会的组织建设，接收会员，健全会员的组织生活，加强对工会小组的领导。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	5、完成学校交办的其他工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	六、党支部工作职责\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	1、负责学校领导班子的思想、作风建设，参与学校重大问题决策。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	2、领导教职工思想政治工作和学校精神文明建设，加强和改进学生德育工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	3、支持和监督校长依法行使职权，协调学校内部关系，调动各方面积极性，共同办好学校。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	4、加强党组织自身建设，发挥党支部的战斗堡垒作用和党员先锋模范作用。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	5、领导工会、共青团等群众组织，支持他们根据各自的章程独立自主地开展工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	6、领导教代会工作，做好统一战线工作，发挥老同志的积极作用，做好关心下一代工作。\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:宋体;font-size:14px;background-color:#FFFFFF;">\r\n	7、完成学校交办的其他工作。\r\n</p>', 0, 2, '', 1, 30),
(5, '学校动态', 1523540201, 1526028500, '', 1, 3, '', 0, 31),
(6, '院系简介', 1523592930, 1523593096, '<h2 style="font-size:18px;text-align:center;font-family:宋体;background-color:#FFFFFF;">\r\n	计算机系简介\r\n</h2>\r\n<span id="con_show" style="font-size:14px;line-height:25px;font-family:宋体;background-color:#FFFFFF;"> \r\n<p style="text-indent:24pt;">\r\n	<span style="font-family:SimSun;line-height:18.75pt;">计算机系是培养具有计算机、电子商务应用型专门人才的重点部门。目前设有计算机网络应用、电子商务等专业。近年来，计算机系发展迅速，至今已建成</span><span style="font-family:SimSun;line-height:18.75pt;">26</span><span style="font-family:SimSun;line-height:18.75pt;">个教学实训室，完善的教学平台及实训基地，拥有在校学生</span><span style="font-family:SimSun;line-height:18.75pt;">2000</span><span style="font-family:SimSun;line-height:18.75pt;">多人，专业职教师</span><span style="font-family:SimSun;line-height:18.75pt;">30</span><span style="font-family:SimSun;line-height:18.75pt;">余人，培养适合互联</span><span style="font-family:SimSun;line-height:18.75pt;">+</span><span style="font-family:SimSun;line-height:18.75pt;">时代的中高型技能人才。</span> \r\n</p>\r\n<span style="font-family:SimSun;"></span> \r\n<p style="text-indent:24pt;">\r\n	<span style="font-family:SimSun;">计算机系的课程设置针对市场需求，紧跟时代步伐、实践能力强，教学环节按照具体岗位让学生分角色模拟，这样不仅培养了学生的动手能力，还培养了他们发现问题，解决问题的能力以及沟通、团队协作能力。在学校领导和专业系老师孜孜不倦的建设和教诲下，近年来计算机系的学生在校内外的各种比赛中捷报频传，近年来，校外竞赛累计获奖<span>29</span>次。求实求新，善教善导，计算机设计未来，电商丰富人生，理想由计算系录入，成功在高新显示。</span> \r\n</p>\r\n<p style="text-indent:24pt;">\r\n	<span style="font-family:SimSun;"><img src="/app/view/admin/js/kindeditor/attached/image/20180413/20180413041436_34076.jpg" alt="" /><br />\r\n</span> \r\n</p>\r\n<p style="text-indent:24pt;">\r\n	<span style="font-family:SimSun;"><img src="/app/view/admin/js/kindeditor/attached/image/20180413/20180413041524_38561.jpg" alt="" /><br />\r\n</span> \r\n</p>\r\n</span>', 0, 0, '', 0, 23),
(7, '经贸系', 1523593019, 1523593019, '<h2 style="font-size:18px;text-align:center;font-family:宋体;background-color:#FFFFFF;">\r\n	经贸系简介\r\n</h2>\r\n<span id="con_show" style="font-size:14px;line-height:25px;font-family:宋体;background-color:#FFFFFF;">\r\n<p style="text-indent:24pt;">\r\n	<span style="font-size:small;"><span style="font-family:Tahoma;">经贸系是我校班级较多的系部，由市场营销、现代物流、工商企业管理、会计、商务英语五个专业构成，共有学生一千余人。系部在进行全校经管类课程教学工作的同时，重点开展市场营销、现代物流、会计、商务英语四个专业的专业教学和建设工作。其中，着力打造市场营销、会计为我系重点专业，学生就业优势明显。<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 经贸系现有一支教学经验丰富、专业基础扎实、综合素质较高的师资队伍。此外，我系还聘有外籍教师、企业专家等专业人士多名。我系根据近年来社会对应用型人才的迫切需求，着重培养既懂专业又掌握实操能力的毕业生。在夯实专业，加强德育的办学理念下，贯彻实施“教学与实训相结合”的教学原则，着重开发和培养学生“一专多能”的能力，特别注重学生的思维训练和实际工作技能的培养。围绕专业特色和技能特点，结合社会需求，结合工作实际对学生进行项目化教学，实行一体化教学，并且系部也积极组织和开展有专业特色的第二课堂活动，如“商业一条街——营销技能比赛”，“物流技能大赛”，“职业形象大赛”，“英语手抄报比赛”，“英语配音大赛”，“会计点钞、珠算大赛”等，丰富了学生的课余生活，锻炼了学生的胆量、口才、组织能力，促进了学生综合能力的发展。另外还针对各专业的特殊性，以就业为导向，将课堂教学与社会实践有机结合，先后建立了物流实训室、会计实训室、语音室，并与广州航空邮件处理中心，步步高教育电子有限公司，广州芙蓉会议中心进行校企合作，为学生学习、实训和就业奠定了良好的基础。在学校领导和专业系老师孜孜不倦的教诲下，近年来经贸系的学生在各种比赛中取得优异成绩。<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2011年12月10日，我系学生在广东省首届职业英语大赛总决赛中取得优异成绩，8名学生参赛，共有7名学生获奖，其中朱淑锦以755的高分取得本次比赛全省第一名，获得一等奖，我校荣获最佳成绩奖、最佳组织奖；2012年12月15日，我系学生在广东省第二届职业英语大赛总决赛中再创佳绩，冯美红获得二等奖，林燕娟和邓琼娇获得三等奖。2013年12月27日，我系学生刘光星、冯思晓在广东省技工院校职业生涯规划大赛决赛中取得优异成绩，获得优秀奖。2013学年度我系学生陈伟明在广东省技工院校“校园之星”评比中脱颖而出，获得广东省技工院校“校园之星”称号。2014年我系学生<span style="font-family:宋体;font-size:12pt;">敖子琪、黄家怡参加广东省职业技术教研室举办的职业英语能力竞赛，获得二等奖。</span></span></span>\r\n</p>\r\n<p style="text-indent:24pt;">\r\n	<span style="font-size:small;"><span style="font-family:Tahoma;">在全系师生的不断努力下，经贸系正在蓬勃发展，积极进取，相信这里今天风华正茂，明天桃李芬芳！</span></span>\r\n</p>\r\n</span>', 0, 0, NULL, 1, 34),
(8, '计算机系简介', 1523593111, 1523593111, '<h2 style="font-size:18px;text-align:center;font-family:宋体;background-color:#FFFFFF;">\r\n	计算机系简介\r\n</h2>\r\n<span id="con_show" style="font-size:14px;line-height:25px;font-family:宋体;background-color:#FFFFFF;">\r\n<p style="text-indent:24pt;">\r\n	<span style="font-family:SimSun;line-height:18.75pt;">计算机系是培养具有计算机、电子商务应用型专门人才的重点部门。目前设有计算机网络应用、电子商务等专业。近年来，计算机系发展迅速，至今已建成</span><span style="font-family:SimSun;line-height:18.75pt;">26</span><span style="font-family:SimSun;line-height:18.75pt;">个教学实训室，完善的教学平台及实训基地，拥有在校学生</span><span style="font-family:SimSun;line-height:18.75pt;">2000</span><span style="font-family:SimSun;line-height:18.75pt;">多人，专业职教师</span><span style="font-family:SimSun;line-height:18.75pt;">30</span><span style="font-family:SimSun;line-height:18.75pt;">余人，培养适合互联</span><span style="font-family:SimSun;line-height:18.75pt;">+</span><span style="font-family:SimSun;line-height:18.75pt;">时代的中高型技能人才。</span>\r\n</p>\r\n<span style="font-family:SimSun;"></span>\r\n<p style="text-indent:24pt;">\r\n	<span style="font-family:SimSun;">计算机系的课程设置针对市场需求，紧跟时代步伐、实践能力强，教学环节按照具体岗位让学生分角色模拟，这样不仅培养了学生的动手能力，还培养了他们发现问题，解决问题的能力以及沟通、团队协作能力。在学校领导和专业系老师孜孜不倦的建设和教诲下，近年来计算机系的学生在校内外的各种比赛中捷报频传，近年来，校外竞赛累计获奖29次。求实求新，善教善导，计算机设计未来，电商丰富人生，理想由计算系录入，成功在高新显示。</span>\r\n</p>\r\n<p style="text-indent:24pt;">\r\n	<span style="font-family:SimSun;"><img src="http://www.gdgxjx.com/app/view/admin/js/kindeditor/attached/image/20180413/20180413041436_34076.jpg" alt="" /><br />\r\n</span>\r\n</p>\r\n<p style="text-indent:24pt;">\r\n	<span style="font-family:SimSun;"><img src="http://www.gdgxjx.com/app/view/admin/js/kindeditor/attached/image/20180413/20180413041524_38561.jpg" alt="" /></span>\r\n</p>\r\n</span>', 0, 1, NULL, 1, 32),
(9, '机电工程系简介', 1523593220, 1523593220, '<h2 style="font-size:18px;text-align:center;font-family:宋体;background-color:#FFFFFF;">\r\n	广东省高新技术技工学校机电工程系简介\r\n</h2>\r\n<span id="con_show" style="font-size:14px;line-height:25px;font-family:宋体;background-color:#FFFFFF;">\r\n<p class="MsoNormal" style="text-indent:21pt;text-align:justify;">\r\n	<span style="font-size:14pt;">广东省高新技术技工学校机电工程系前身为理工系，创办于2008年，2015年正式划分为机电工程系和汽修系。我校机电工程系共设机电一体化、数控、模具制造和制冷设备制造安装与维修4个专业，现有专业授课教师20余人，</span><span style="font-size:14pt;">中技班14个，高技班2个，</span><span style="font-size:14pt;">在校学生约1500人。</span><span style="font-size:14pt;"></span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21pt;text-align:justify;">\r\n	<span style="font-size:14pt;">模具制造培养全面掌握机械加工、工业产品设计、模具设计与制造、模具特种加工（电火花、线切割机）的专业技能人才。主要课程有机械制图、金属材料与热处理、极限配合与技术测量、模具设计、模具制造技术、Pro/E模具设计、CAD计算机辅助设计等，技能考证有计算机应用基础中级、CAD计算机辅助设计中级等。</span><span style="font-size:14pt;"></span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21pt;text-align:justify;">\r\n	<span style="font-size:14pt;">制冷设备制造安装与维修专业培养从事电子产品和制冷设备的安装、测试和检修的高级技能人才，主要课程有机械制图、电工电子、钳工工艺、电子线路CAD、电冰箱及空调器原理与维修、中央空调与冷库、PLC及其应用、电工仪表与测量等，技能考证有计算机应用基础中级、维修电工上岗证、制冷设备维修工中级等。</span><span style="font-size:14pt;"></span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21pt;text-align:justify;">\r\n	<span style="font-size:14pt;">机电一体化专业培养从事电气自动化设备安装、编程、调试与维修的技能人才。主要课程有机械制图/CAD、电工基础、电子技术基础、机械基础、工厂供电、电机与变压器、PLC及其应用、电力拖动与自动控制、电工仪表与测量等，技能考证有计算机应用基础中级、维修电工上岗证、维修电工中级证等。</span><span style="font-size:14pt;"></span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21pt;text-align:justify;">\r\n	<span style="font-size:14pt;">数控专业</span><span style="font-size:14pt;">培养掌握数控原理、</span><a href="http://baike.haosou.com/doc/5389225.html"><span style="font-size:14pt;">数控编程</span></a><span style="font-size:14pt;">和数控加工等方面的专业知识及操作技能，从事数控程序编制、数控设备的操作、调试、维修和技术管理的高级技术应用性专门人才。</span><span style="font-size:14pt;">主要课程有</span><span style="font-size:14pt;">机械制图</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">机械设计基础</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">机械制造基础</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">电工电子技术</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">数控原理与系统</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">数控加工工艺与编程</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">机械加工工艺与装备</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">机床故障诊断与维修</span><span style="font-size:14pt;">、Ｍａｓｔｅｒｃａｍ、</span><span style="font-size:14pt;">钳工</span><span style="font-size:14pt;">工艺、</span><span style="font-size:14pt;">Pro/E模具设计等</span><span style="font-size:14pt;">。</span><span style="font-size:14pt;">技能考证有</span><span style="font-size:14pt;">计算机应用基础中级、</span><span style="font-size:14pt;">组合机床操作工中级、数控加工中心操作工中级</span><span style="font-size:14pt;">等。</span><span style="font-size:14pt;"></span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21pt;text-align:justify;">\r\n	<span style="font-size:14pt;">我系师资力量雄厚，现有制冷实训室３间，电工电子实训室３间，ＣＡＤ／ＣＡＭ、数控、机加工、模具实训室各１间，拥有工作台、电气柜、空调器、电冰箱、</span><span style="font-size:14pt;">万能平面磨&nbsp;M250-YHAS</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">普通车床&nbsp;CDE6140</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">线切割机床&nbsp;DK7740HE</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">电火花机床&nbsp;ZNC-435</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">普通铣床&nbsp;X6228B</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">冲压机&nbsp;J21-10T</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">注塑机&nbsp;&nbsp;（100&nbsp;g）</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">工具磨床&nbsp;M6025C</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">数控车床&nbsp;SK36</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">数控铣床&nbsp;CK7136C</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">加工中心&nbsp;VMC650E</span><span style="font-size:14pt;">、</span><span style="font-size:14pt;">雕刻机&nbsp;VMC-650</span><span style="font-size:14pt;">及一大批电脑设备等。</span><span style="font-size:14pt;"></span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21pt;text-align:justify;">\r\n	<span style="font-size:14pt;">在学生管理方面，我系十分注重学生的全面发展，成立第二课堂、组建学生干部队伍、定期开展丰富的课后活动如辩论赛、篮球赛等，使学生在高新得到培养，收获成长。</span><span style="font-size:14pt;"></span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21pt;text-align:justify;">\r\n	<span style="font-size:14pt;">展望未来，我系将不断完善教学设备设施，提高办学水平，为社会打造一大批技能型人才。</span>\r\n</p>\r\n</span>', 1, 2, NULL, 1, 33),
(10, '汽车工程系', 1523593310, 1523593310, '<h2 style="font-size:18px;text-align:center;font-family:宋体;background-color:#FFFFFF;">\r\n	广东省高新技术技工学校汽车工程系\r\n</h2>\r\n<span id="con_show" style="font-size:14px;line-height:25px;font-family:宋体;background-color:#FFFFFF;">\r\n<p class="MsoNormal" style="text-indent:28pt;">\r\n	<span style="font-family:仿宋_GB2312;font-size:14pt;"><span style="font-family:&quot;">我校汽车工程系的前身是<span>2008</span>年理工系开设的汽车检测与维修专业。<span>2015</span>年，汽修专业正式升格为系。近年来，汽车工程系发展迅猛，至今已建成了教学大楼、实训大楼各一幢，拥有整车车间、底盘车间、发动机车间、电器设备车间等完善的实训场室及操作设备<span>,2015</span>年底还将计划添设汽车美容等<span>11</span>个全新的实训车间。<span>2015</span>年，汽车工程系拥有<span>25</span>个班、学生<span>1300</span>余人，专职教师<span>20</span>余位<span>,</span>其中中级职称以上<span>4</span>人<span>,</span>技师以上<span>8</span>人<span>,</span>高级技师<span>4</span>人<span>,</span>本科以上学历的教师<span>14</span>人<span>,</span>研究生<span>1</span>人；可培养从事汽车维修、前台接待、售后服务和汽车销售等工作的中技、“高技<span>+</span>成人大专”二个层次的高技能应用型人才。汽车工程系已成为了我校乃至广州的重点汽车教学单位。</span></span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:28.1pt;">\r\n	<span style="font-family:&quot;"><b><span style="font-family:仿宋_GB2312;font-size:14pt;">一、汽车工程系的专业特色<span></span></span></b></span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:28pt;">\r\n	<span style="font-family:仿宋_GB2312;font-size:14pt;"><span style="font-family:&quot;">汽车工程系的专业特色是一体化教学，理论与实操相结合授课，就业面广，就业基础好。在校期间会安排汽修中级维修工、汽修中级维修电工两项考证活动。汽车工程系现有汽车文化协会、汽车美容保养协会、汽车机修协会三个第二课堂兴趣组织，第二课堂是正常教学课程的有效补充和延伸，目的是帮助学生开拓视野，发展兴趣，学以致用。<span></span></span></span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:28.1pt;">\r\n	<span style="font-family:&quot;"><b><span style="font-family:仿宋_GB2312;font-size:14pt;">二、汽车工程系就业前景<span></span></span></b></span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:28pt;">\r\n	<span style="font-family:仿宋_GB2312;font-size:14pt;"><span style="font-family:&quot;">汽车工程系就业前景广阔，可以从事四大方向的岗位。一、汽车生产与制造。二、汽车检测与维修，包括机修、快修、改装、精品加装、汽车电路电器维修。三、汽车商务，包括汽车销售、二手车评估、配件管理、汽车保险与勘察、接车诊断等。四、汽车美容与创业。汽车美容作为较易创业的行业深受学生欢迎。迄今为止，在汽车工程系的安排下，许多毕业生已在广汽传琪（国企）、东风日产（花都）汽车制造厂、花都公交公司（国企）、佛山鸿运公交、广州众合力集团、南升集团、中山合众集团、米其林公司、丰力轮胎（华南轮胎厂）、<span style="font-family:仿宋_GB2312, sans-serif;font-size:14pt;">广东通达汽车贸易有限公司（中大型国企）、广州昊城汽车集团</span><span style="font-size:14pt;">(</span><span style="font-family:仿宋_GB2312, sans-serif;font-size:14pt;">比亚迪指定经销商</span><span style="font-size:14pt;">)</span><span style="font-family:仿宋_GB2312, sans-serif;font-size:14pt;">、广州世祥汽车销售有限公司（沃尔沃广州地区指定经销商）、花都公共交通公司、广东宝轩宝马奔驰汽车维修有限公司、佛山市南海顺铃汽车销售有限公司、佛山市汇展英致汽车有限公司、广州市盛大汽车服务有限公司、广州市德晟机械有限公司、东莞市宝昌汽车销售服务有限公司、广州实德汽配部、特莱斯汽车服务公司等</span><span style="font-family:仿宋;font-size:16pt;">数十家</span>著名的汽车企业实习和工作。</span></span>\r\n</p>\r\n</span>', 1, 1, NULL, 1, 36);
INSERT INTO `gx_works` (`works_id`, `works_title`, `works_releaseTime`, `works_updateTime`, `works_content`, `works_hot`, `works_order`, `works_file`, `works_show`, `works_categoryid`) VALUES
(11, '艺术系', 1523593351, 1523593351, '<h2 style="font-size:18px;text-align:center;font-family:宋体;background-color:#FFFFFF;">\r\n	艺术系简介\r\n</h2>\r\n<span id="con_show" style="font-size:14px;line-height:25px;font-family:宋体;background-color:#FFFFFF;">\r\n<p class="MsoNormal" style="text-indent:21.75pt;">\r\n	<span style="font-size:12pt;">艺术系是我校培养艺术类应用型人才的教学教研机构，艺术系的师生人才济济，多才多艺。艺术系目前设有室内设计、计算机广告制作、幼儿教育、珠宝首饰设计与制作和工程监理五个专业，分为幼儿教育、珠宝玉雕、艺术设计三个教研组，共<span>48</span>位专职教师，在校学生达<span>1700</span>多人。<span></span></span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21.75pt;">\r\n	<span style="font-size:12pt;">艺术系拥有与各专业教学相配套的钢琴实训室<span>4</span>间、舞蹈实训室<span>4</span>间、珠宝实训室<span>1</span>间、玉雕实训室<span>2</span>间、绘画室<span>1</span>间、摄影室<span>1</span>间。实训室宽敞明亮，设备比较先进，完全能满足教学需要。<span></span></span>\r\n</p>\r\n<p>\r\n	<span style="font-size:12pt;">近年来艺术系师生在各种比赛中取得不少优异成绩。<span>2014</span>年<span>6</span>月，我系组织幼儿教育专业学生参加“第<span>6</span>届亚洲大洋洲国际少儿艺术节广东省决赛”比赛，荣获“少年<span>B</span>组器乐类”金奖两名，银奖一名。<span>2014</span>年<span>11</span>月，合唱《玫瑰，红红的玫瑰》荣获“花都区第三届民营企业文艺汇演”三等奖。<span>2014</span>年<span>12</span>月，在“广东省技工院校学生舞蹈大赛”中，《傣韵》荣获优秀奖。<span>2016</span>年<span>10</span>月，艺术系老师在参加第二届广东省技工院校教研会教师职业能力竞赛幼儿教育专业竞赛中，黎晓恩老师荣获音乐方向二等奖，李冬燕老师荣获美术方向二等奖，刘荣荣老师荣获舞蹈方向三等奖，艺术系荣获团队二等奖的可喜成绩。<span>2016</span>年<span>11</span>月，艺术系周礼平老师在第二届广东省技工院校教研会（广告设计专业）教师职业能力竞赛中荣获三等奖。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">专业介绍<span></span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">幼儿教育<span></span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">培养目标：培养从事中高端幼儿园教师、幼儿培训机构辅导老师的高技能人才。<span></span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">主要课程：声乐、钢琴、舞蹈、美术绘画、心理学、教育学、保育学、教师口语、幼儿英语、幼儿园班级管理、幼儿活动实践、艺术教育、普通话等。<span></span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">技能考证：保育员（高级）<span></span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">选考：普通话证书、钢琴或舞蹈考级<span></span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">&nbsp;</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">幼儿教育（双语早教与育婴）<span></span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">培养目标：培养从事早教及育婴护理、教育相关岗位或幼儿园教师、早教机构管理人员的综合性技能人才。<span></span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">主要课程：幼儿卫生学、保育学、声乐、钢琴、舞蹈、美术绘画、心理学、教育学、教师口语、幼儿英语、幼儿园班级管理、幼儿活动实践、艺术教育等。<span></span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">技能考证：保育员（高级）<span></span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">选考：高级育婴师、普通话等级证、钢琴或舞蹈考级<span></span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">&nbsp;</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">室内设计<span></span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">培养目标：培养从事室内外环境设计、营销和施工管理工作的高级技能人才。<span></span></span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:12pt;">主要课程：室内空间设计、模型制作、<span>3DSMAX</span>、<span>AUTOCAD</span>、工程制图、工程预算、手绘图表现、中外建筑史、<span>PHOTOSHOP</span>、<span>CORELDRAW</span>、草图大师、室内项目实训等。<span></span></span>\r\n</p>\r\n<p>\r\n	<span style="font-size:12pt;">技能考证：<span>&nbsp;PHOTOSHOP</span>图形图像处理高级、<span>CAD</span>高级绘图员。</span>\r\n</p>\r\n</span>', 1, 1, NULL, 1, 35),
(12, '学历教育', 1523593444, 1523593444, '<p class="MsoNormal" style="font-family:宋体;font-size:14px;background-color:#FFFFFF;text-align:justify;text-indent:28pt;">\r\n	<span style="font-size:14pt;">\r\n	<h2 style="font-size:18px;text-align:center;font-family:宋体;background-color:#FFFFFF;">\r\n		我校上千学子参加成考奔赴梦想\r\n	</h2>\r\n</span>\r\n</p>\r\n<p class="MsoNormal" style="font-family:宋体;font-size:14px;background-color:#FFFFFF;text-align:justify;text-indent:28pt;">\r\n	<span style="font-size:14pt;">10</span><span style="font-size:14pt;">月<span>25</span>日</span><span style="font-size:14pt;">，我校<span>1200</span>余名学生奔赴花都区<span>7</span>所学校的数百间考场，开始了他们人生中重要的一场考试——全国成人高考。<span></span></span>\r\n</p>\r\n<p class="MsoNormal" style="font-family:宋体;font-size:14px;background-color:#FFFFFF;text-align:justify;text-indent:28pt;">\r\n	<span style="font-size:14pt;">为确保成考工作顺利进行，我校</span><span style="font-size:14pt;color:#333333;">租用了<span>20</span>辆大客车专门接送学生，每辆车都安排<span>1</span>名负责人全面负责，精心组织，细心落实，确保参考学子一个都不能少。<span></span></span>\r\n</p>\r\n<p class="MsoNormal" style="font-family:宋体;font-size:14px;background-color:#FFFFFF;text-align:justify;text-indent:28pt;">\r\n	<span style="font-size:14pt;color:#333333;">为保证学生顺利通过成人高考，考取心仪大学，我校从上学期就开始对参加成人高考的学生进行语、数、英三门课的专门辅导。辅导老师认真备课，广泛查阅资料，丰富讲课内容，耐心进行讲解，反复组织练习，使学生成绩不断提高，为成人高考的有效进行做好了充分的准备。<span></span></span>\r\n</p>\r\n<p class="MsoNormal" style="font-family:宋体;font-size:14px;background-color:#FFFFFF;text-align:justify;text-indent:28pt;">\r\n	<span style="font-size:14pt;">我校本着“为学生服务一生，让学生终身受益”的服务理念，依托高校资源优势创办丰富的学历教育，努力为学生搭建继续发展的平台。现开设专科层次<span>15</span>个专业，学制<span>3</span>年。</span><span style="font-size:14pt;color:#333333;">目前已与广东外语外贸大学、岭南学院、广东省社会科学大学、韩山师范学院等多所院校建立合作关系，基本满足我校所有专业学生的对口提升的需求。</span><span style="font-size:14pt;">（教务处胡文鹏 黄金凤 供稿）</span>\r\n</p>', 1, 0, NULL, 1, 24),
(13, '招生就业', 1523593758, 1523593758, '<h2 style="font-size:18px;text-align:center;font-family:宋体;background-color:#FFFFFF;">\r\n	2018年秋季招生计划\r\n</h2>\r\n<p>\r\n	<img src="/app/view/admin/js/kindeditor/attached/image/20180413/20180413042841_87288.jpg" alt="" />\r\n</p>\r\n<p>\r\n	<img src="/app/view/admin/js/kindeditor/attached/image/20180413/20180413042902_81512.jpg" alt="" />\r\n</p>\r\n<p>\r\n	<img src="/app/view/admin/js/kindeditor/attached/image/20180413/20180413042914_35515.jpg" alt="" />\r\n</p>', 1, 0, NULL, 1, 25),
(16, '培训中心简介', 1526028651, 1526028695, '<span id="con_show" style="font-size:14px;line-height:25px;font-family:宋体;background-color:#FFFFFF;"> \r\n<p class="MsoNormal" style="text-indent:21pt;">\r\n	<span style="font-size:small;"><span style="font-family:SimSun;font-size:14px;">\r\n	<h2 style="font-size:18px;text-align:center;font-family:宋体;background-color:#FFFFFF;">\r\n		培训中心简介\r\n	</h2>\r\n</span></span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21pt;">\r\n	<span style="font-size:small;"><span style="font-family:SimSun;font-size:14px;">培训中心主要负责非学历教育的各种短期培训工作、农村劳动力转移就业技能培训、校内学生考证培训、企业培训、特殊工种培训等相关业务。</span></span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:21pt;">\r\n	<span style="font-size:small;"><span><span style="font-family:;"><span style="font-family:SimSun;font-size:14px;">2008</span></span></span><span style="font-family:SimSun;font-size:14px;">年被广东省人力资源和社会保障厅授予“广东省农村劳动力转移就业项定点培训机构”；加强农村劳动力素质培训、技能培训，提高农民的就业技能和整体素质，是实现农村劳动力转移的基本保证，也是解决“三农”问题的核心之一，更是增加农民收入的主要途径之一。</span></span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:21pt;">\r\n	<span style="font-size:small;"><span style="font-family:SimSun;font-size:14px;">根据广东省人事和社会保障厅有关培训规划和文件，我中心在全省范围内招农村劳动力技能培训学员，实行免费专业技能培训。使受训人员掌握一门专业技能，帮助农民就业，增加农民收入，加快脱贫致富。</span></span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:21pt;">\r\n	<span style="font-size:small;"><span style="font-family:SimSun;font-size:14px;">学校凭借良好的服务、雄厚的实力和高质量的培训，获得了社会各界人士的支持和信任。</span></span> \r\n</p>\r\n</span>', 1, 10, '', 1, 26),
(17, '联系我们', 1526028888, 1526028888, '<span style="color:#333333;font-family:宋体;font-size:14px;background-color:#FFFFFF;">学校地址：广州市花都区芙蓉大道（旗岭）&nbsp;</span><br />\r\n<span style="color:#333333;font-family:宋体;font-size:14px;background-color:#FFFFFF;">网 址：http://www.gdgxgj.com&nbsp;</span><br />\r\n<span style="color:#333333;font-family:宋体;font-size:14px;background-color:#FFFFFF;">电 话：020-86993836 / &nbsp;86984488&nbsp;</span><br />\r\n<span style="color:#333333;font-family:宋体;font-size:14px;background-color:#FFFFFF;">传 真：020-86991911&nbsp;</span><br />\r\n<span style="color:#333333;font-family:宋体;font-size:14px;background-color:#FFFFFF;">联 系 人：13539727762（陈老师）、13710787765（林老师）、&nbsp;18002216201（陈老师）、13926267655（莫老师）&nbsp;</span><br />\r\n<span style="color:#333333;font-family:宋体;font-size:14px;background-color:#FFFFFF;">QQ咨询：1125308563 &nbsp;&nbsp;2942323548</span>', 0, 1, NULL, 1, 28);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
