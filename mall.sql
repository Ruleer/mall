-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 年 02 月 24 日 15:13
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `mall`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `adminname` varchar(45) NOT NULL COMMENT '管理员姓名',
  `password` varchar(45) NOT NULL COMMENT '设置密码',
  `password2` varchar(45) NOT NULL COMMENT '确认密码',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`admin_id`, `adminname`, `password`, `password2`) VALUES
(1, '尼古拉斯', 'f379eaf3c831b04de153469d1bec345e', 'f379eaf3c831b04de153469d1bec345e'),
(2, '小仙女', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e'),
(3, '琳达Linda', 'be13b093d53644bc3b88dc76f278d574', 'be13b093d53644bc3b88dc76f278d574'),
(4, '曹操', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `productname` varchar(60) NOT NULL COMMENT '商品名称',
  `introduction` varchar(60) NOT NULL COMMENT '商品简介',
  `price` float(12,2) NOT NULL COMMENT '价格',
  `sort_id` int(10) NOT NULL,
  `image` varchar(60) NOT NULL COMMENT '图片路径',
  PRIMARY KEY (`product_id`),
  KEY `sort_id` (`sort_id`),
  KEY `productname` (`productname`),
  KEY `price` (`price`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`product_id`, `productname`, `introduction`, `price`, `sort_id`, `image`) VALUES
(2, '格子少女连帽羽绒服', '春季连帽新款,值得这个价！', 30000.98, 1, '格子连帽羽绒服.jpg'),
(3, '镂空宽松针织衫', '春季新款', 200.00, 1, '镂空宽松针织衫.jpg'),
(4, '米色中长裙', '春季新款', 300.00, 1, '米色中长裙.jpg'),
(5, '复古短袖连衣裙', '亚麻褶皱，灰常显瘦', 400.00, 1, '复古短袖连衣裙.jpg'),
(6, '白色纯棉男士T恤', '适合男士内搭', 100.00, 1, '白色纯棉男士T恤.jpg'),
(7, '飞行员夹克', '加厚棉衣，正品潮牌，还是情侣款哦', 300.00, 1, '飞行员夹克.jpg'),
(8, '经典皮夹克', '进口羊皮，经典品质', 1500.00, 1, '经典皮夹克.jpg'),
(9, '双面羊绒大衣', '帅气青年的选择', 800.00, 1, '双面羊绒大衣.jpg'),
(11, '长筒系带靴', '不过膝盖的平底长筒骑士靴', 200.00, 2, '长筒系带靴.jpg'),
(14, '红色拉杆箱', '复古防刮，旅行必备', 300.00, 2, '红色拉杆箱.jpg'),
(16, '棕色宽松休闲长袖衬衣外套', '潮流青年的选择', 15000.77, 1, '棕色宽松休闲长袖衬衣外套.jpg'),
(17, '自由呼吸2019新款运动服套装女春秋宽松韩版坠感阔腿裤卫衣两件套 粉末蓝 L(女)', '一起享受自由生活', 234.00, 1, '2e4270421560d706.jpg'),
(18, '一米阳光很仙的小个子打底连衣裙女2018新款韩版气质大摆红色长裙 枣红色 M', '生机新春热情似火', 3432.00, 1, 'd03876644bef4727.jpg'),
(19, '自由呼吸运动服套装女春秋季2019新款韩版连帽阔腿裤休闲装两件套 红色 L', '为了让美丽优雅的你喜欢，简单纯粹也能张扬个性', 3432.00, 1, '1f8d4849358b4021.jpg'),
(20, '牛津大学箱包旗舰店 小学生书包', '镇店爆款 减负护脊防水', 199.00, 2, '360截图168409278813790.jpg'),
(21, 'UNIVERSITY OF OXFORD多功能多层笔袋铅笔收纳袋 文具盒 X5621 深蓝', '千锤百炼，都拆不散我和你的上学时光', 50.00, 2, '8ba3672fbe104be4.jpg'),
(22, '安特丽五色箱包 20英寸', '闪耀品质，时尚五色，轻盈耐用', 399.00, 2, '360截图165405286911496.jpg'),
(23, '佐卡伊白18K金钻石吊坠', '手工制作的贵金属材质，可定制', 522678.09, 3, '佐卡伊白18K金钻石吊坠.png');

-- --------------------------------------------------------

--
-- 表的结构 `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `password2` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `username_2` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `register`
--

INSERT INTO `register` (`id`, `username`, `gender`, `email`, `password`, `password2`) VALUES
(3, '尼古拉斯', '男', '666666@qq.com', 'f379eaf3c831b04de153469d1bec345e', 'f379eaf3c831b04de153469d1bec345e'),
(4, '小仙女', '女', '123456@qq.com', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e'),
(5, '小飞龙', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e'),
(6, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e'),
(7, '小飞龙', '男', '123', '202cb962ac59075b964b07152d234b70', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(8, '阿江', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e'),
(9, '阿江', '女', '393848733@qq.com', '202cb962ac59075b964b07152d234b70', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(10, '胡铁花', '男', '4646464@163.com', 'edee198e26c06ab8134917781cb55ca7', '1c44feda75820f0dc6673915a4d27644'),
(11, '花蝴蝶', '男', '4646464@163.com', 'edee198e26c06ab8134917781cb55ca7', 'edee198e26c06ab8134917781cb55ca7'),
(12, '琳达Linda', '女', '123456777@qq.com', 'be13b093d53644bc3b88dc76f278d574', 'be13b093d53644bc3b88dc76f278d574'),
(13, '曹操', '男', '123@qq.com', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70'),
(14, '狗蛋', '男', '123456@qq.com', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e'),
(15, '小明同学', '男', 'xxxxxx@qq.com', 'dad3a37aa9d50688b5157698acfd7aee', 'dad3a37aa9d50688b5157698acfd7aee'),
(16, '石头', '男', 'xxxxxx@qq.com', 'dad3a37aa9d50688b5157698acfd7aee', 'dad3a37aa9d50688b5157698acfd7aee'),
(17, 'GG江', 'female', '393848733@qq.com', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b'),
(18, '阿江二号', 'female', '123456@qq.com', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `shoppingcart`
--

CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车明细id',
  `product_id` int(11) NOT NULL COMMENT '商品id',
  `unitprice` float(12,2) NOT NULL COMMENT '单价',
  `count` int(45) NOT NULL COMMENT '数量',
  `username` varchar(45) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `unitprice` (`unitprice`),
  KEY `product_id` (`product_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `shoppingcart`
--

INSERT INTO `shoppingcart` (`cart_id`, `product_id`, `unitprice`, `count`, `username`) VALUES
(5, 5, 400.00, 5, '尼古拉斯'),
(9, 2, 30000.98, 1, '尼古拉斯'),
(10, 3, 200.00, 1, '尼古拉斯'),
(11, 4, 300.00, 2, '尼古拉斯'),
(12, 21, 50.00, 1, 'GG江'),
(13, 20, 199.00, 6, '尼古拉斯'),
(14, 21, 50.00, 5, '尼古拉斯'),
(15, 11, 200.00, 10, '尼古拉斯'),
(16, 23, 522678.09, 6, '尼古拉斯');

-- --------------------------------------------------------

--
-- 表的结构 `sort`
--

CREATE TABLE IF NOT EXISTS `sort` (
  `sort_id` int(10) NOT NULL AUTO_INCREMENT,
  `sortname` varchar(45) NOT NULL,
  PRIMARY KEY (`sort_id`),
  KEY `sort_id` (`sort_id`),
  KEY `sortname` (`sortname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `sort`
--

INSERT INTO `sort` (`sort_id`, `sortname`) VALUES
(6, '图书音像'),
(4, '家用电器'),
(3, '珠宝手表'),
(5, '生鲜水果'),
(1, '男装女装'),
(2, '鞋靴箱包');

--
-- 限制导出的表
--

--
-- 限制表 `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`sort_id`) REFERENCES `sort` (`sort_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `shoppingcart_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shoppingcart_ibfk_5` FOREIGN KEY (`unitprice`) REFERENCES `product` (`price`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shoppingcart_ibfk_6` FOREIGN KEY (`username`) REFERENCES `register` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
