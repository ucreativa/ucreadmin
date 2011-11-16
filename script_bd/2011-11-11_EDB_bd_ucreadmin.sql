-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-11-2011 a las 09:34:53
-- Versión del servidor: 5.1.58
-- Versión de PHP: 5.3.6-13ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_ucreadmin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sites`
--

DROP TABLE IF EXISTS `tbl_sites`;
CREATE TABLE IF NOT EXISTS `tbl_sites` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(32) NOT NULL,
  `site_url` varchar(128) NOT NULL,
  `site_icon` varchar(64) DEFAULT 'unknow.jpg',
  `site_info` varchar(128) DEFAULT NULL,
  `site_host` varchar(32) NOT NULL,
  `site_dbname` varchar(32) NOT NULL,
  `site_port` varchar(4) NOT NULL,
  `site_dbuser` varchar(32) NOT NULL,
  `site_dbpass` varchar(32) NOT NULL,
  `site_status` varchar(1) NOT NULL,
  `site_created` date NOT NULL,
  `site_modified` date NOT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_group_fk` int(11) NOT NULL,
  `user_info` varchar(128) DEFAULT NULL,
  `user_status` varchar(1) NOT NULL,
  `user_created` date NOT NULL,
  `user_modified` date NOT NULL,
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `user_group_fk` (`user_group_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users_groups`
--

DROP TABLE IF EXISTS `tbl_users_groups`;
CREATE TABLE IF NOT EXISTS `tbl_users_groups` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(32) NOT NULL,
  `user_group_acces` varchar(128) NOT NULL,
  `user_group_info` varchar(128) NOT NULL,
  `user_group_status` varchar(1) NOT NULL DEFAULT '1',
  `user_group_created` date NOT NULL,
  `user_group_modified` date NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users_sites`
--

DROP TABLE IF EXISTS `tbl_users_sites`;
CREATE TABLE IF NOT EXISTS `tbl_users_sites` (
  `user_site_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_fk` bigint(20) NOT NULL,
  `site_fk` int(11) NOT NULL,
  UNIQUE KEY `user_site_id` (`user_site_id`),
  KEY `user_fk` (`user_fk`),
  KEY `site_fk` (`site_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`user_group_fk`) REFERENCES `tbl_users_groups` (`user_group_id`);

--
-- Filtros para la tabla `tbl_users_sites`
--
ALTER TABLE `tbl_users_sites`
  ADD CONSTRAINT `tbl_users_sites_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_users_sites_ibfk_2` FOREIGN KEY (`site_fk`) REFERENCES `tbl_sites` (`site_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
