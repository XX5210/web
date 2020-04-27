DROP TABLE IF EXISTS lm;
CREATE TABLE `lm` (  `id` int(5) NOT NULL auto_increment,  `lm1` varchar(20) NOT NULL,  `lm2` varchar(20) NOT NULL,  `lm3` varchar(20) NOT NULL,  `lmid` tinyint(20) NOT NULL,  PRIMARY KEY  (`id`)) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
INSERT INTO lm VALUES('20','','','文理动态','19');
INSERT INTO lm VALUES('19','','宝鸡新闻','','18');
INSERT INTO lm VALUES('8','中国新闻','','','0');
INSERT INTO lm VALUES('18','陕西新闻','','','0');
INSERT INTO lm VALUES('9','','北京新闻','','8');
INSERT INTO lm VALUES('10','','','五环之歌','9');
INSERT INTO lm VALUES('11','今日美国','','','0');
INSERT INTO lm VALUES('12','','纽约时报','','11');
INSERT INTO lm VALUES('13','','','时代周刊','12');
INSERT INTO lm VALUES('14','地球往事','','','0');
INSERT INTO lm VALUES('15','','黑暗森林','','14');
INSERT INTO lm VALUES('21','火星救援','','','0');
INSERT INTO lm VALUES('17','','','智子','15');
INSERT INTO lm VALUES('22','','提小莫','','21');
INSERT INTO lm VALUES('23','','','德玛西亚','22');
DROP TABLE IF EXISTS news;
CREATE TABLE `news` (  `id` int(4) NOT NULL auto_increment,  `lm1` varchar(20) NOT NULL,  `lm2` varchar(20) NOT NULL,  `lm3` varchar(20) NOT NULL,  `title` varchar(30) NOT NULL,  `content` text NOT NULL,  `time` datetime NOT NULL,  `hit` int(11) NOT NULL,  `adduser` varchar(20) NOT NULL,  PRIMARY KEY  (`id`)) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
INSERT INTO news VALUES('1','18','19','0','宝鸡今天天气很好','宝鸡今天天气很不错。。。。。','2016-01-26 00:00:00','5','路老师');
INSERT INTO news VALUES('3','8','0','0','北京限行私家车','由于雾霾严重，北京将于近期对私家车进行现行','2016-01-26 00:00:00','222','陈小贱');
INSERT INTO news VALUES('15','18','19','0','文理学院突发事件','师生集体罢课 抗寒<br />','2016-01-26 00:00:00','10','');
INSERT INTO news VALUES('16','14','0','0','威摄元年','啦啦啦啦啦三体人','2016-01-26 00:00:00','10','');
INSERT INTO news VALUES('17','14','0','0','曲率航行','飞出银河系','2016-01-26 00:00:00','10','');
INSERT INTO news VALUES('18','14','0','0','物理学','物理学不存在<br />','2016-01-26 00:00:00','10','');
INSERT INTO news VALUES('19','14','0','0','智子干扰','智子是个坏人 <br />','2016-01-26 00:00:00','10','');
INSERT INTO news VALUES('20','14','0','0','黑洞理论','万有引力','2016-01-26 00:00:00','10','');
INSERT INTO news VALUES('21','14','0','0','多维空间','空间二维化 且不断扩张<br />','2016-01-26 00:00:00','10','');
INSERT INTO news VALUES('14','21','22','23','德玛西亚','的撒大苏打上','2016-01-26 00:00:00','10','啦啦啦啦');
INSERT INTO news VALUES('12','21','22','0','兔宝宝','<h2>\r\n	<span style=\"color:#006600;\"><strong><em><u><s>巴拉巴拉巴拉巴拉</s></u></em></strong></span>\r\n</h2>','2016-01-25 00:00:00','10','');
INSERT INTO news VALUES('13','8','9','10','超神了111','实力选222手 哈哈哈啊哈 <br />','2016-01-26 00:00:00','10','');