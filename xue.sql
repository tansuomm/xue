-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-09 16:08:08
-- 服务器版本： 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xue`
--

-- --------------------------------------------------------

--
-- 表的结构 `organ`
--

CREATE TABLE IF NOT EXISTS `organ` (
  `id` int(11) NOT NULL,
  `oid` char(3) NOT NULL COMMENT '执行码',
  `oname` varchar(40) NOT NULL,
  `contact` int(11) NOT NULL,
  `info` text NOT NULL,
  `pre1` int(11) NOT NULL,
  `pre2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='机构信息表';

-- --------------------------------------------------------

--
-- 表的结构 `stuent`
--

CREATE TABLE IF NOT EXISTS `stuent` (
  `id` int(11) NOT NULL COMMENT '主键自增',
  `name` varchar(10) NOT NULL COMMENT '姓名',
  `id_num` char(18) DEFAULT NULL COMMENT '身份证号',
  `tel` char(11) NOT NULL COMMENT '电话',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `father` varchar(10) DEFAULT NULL COMMENT '父亲',
  `father_tel` char(11) DEFAULT NULL COMMENT '父亲手机',
  `mother` varchar(10) DEFAULT NULL COMMENT '母亲',
  `mother_tel` char(11) DEFAULT NULL COMMENT '母亲手机',
  `educate_degree` varchar(1) DEFAULT NULL COMMENT '教育程度',
  `pic_fore` varchar(300) DEFAULT NULL COMMENT '证件正面图',
  `pic_back` varchar(300) DEFAULT NULL COMMENT '证件背面图',
  `pic_hand` varchar(300) DEFAULT NULL COMMENT '手持证件图',
  `pic_protocol` varchar(300) DEFAULT NULL COMMENT '培训协议图',
  `card_num` varchar(30) DEFAULT NULL COMMENT '电子银行卡号',
  `marriage` varchar(1) DEFAULT NULL COMMENT '婚姻状况',
  `resident` varchar(100) DEFAULT NULL COMMENT '现居住地',
  `postage` varchar(10) DEFAULT NULL COMMENT '邮编',
  `college` varchar(50) DEFAULT NULL COMMENT '就读院校',
  `profession` varchar(50) DEFAULT NULL COMMENT '所读专业',
  `time_start` date DEFAULT NULL COMMENT '入学时间',
  `time_end` date DEFAULT NULL COMMENT '毕业时间',
  `openid` varchar(200) NOT NULL COMMENT '微信号标识',
  `time_register` datetime DEFAULT NULL COMMENT '注册时间',
  `pre_one` varchar(500) DEFAULT NULL COMMENT '预留字段1',
  `pre_two` varchar(500) DEFAULT NULL COMMENT '预留字段2',
  `pre_three` varchar(500) DEFAULT NULL COMMENT '预留字段3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生信息表';

-- --------------------------------------------------------

--
-- 表的结构 `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `test`
--

INSERT INTO `test` (`id`, `title`, `name`) VALUES
(7, 'aaa', 'bbb'),
(8, 'aaa', 'bbb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organ`
--
ALTER TABLE `organ`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuent`
--
ALTER TABLE `stuent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `openid_2` (`openid`),
  ADD UNIQUE KEY `tel_2` (`tel`),
  ADD KEY `openid` (`openid`),
  ADD KEY `tel` (`tel`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stuent`
--
ALTER TABLE `stuent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键自增';
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
