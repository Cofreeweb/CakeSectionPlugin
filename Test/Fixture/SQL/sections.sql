-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-04-2014 a las 23:16:08
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `alfonsotest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` tinyint(3) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_menu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `level` int(3) NOT NULL,
  `lft` int(9) NOT NULL,
  `rght` int(9) NOT NULL,
  `body_class` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT '0',
  `cover_children_id` int(11) DEFAULT NULL,
  `plugin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `external_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access_key` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `target_blank` tinyint(1) DEFAULT NULL,
  `menu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `insert_menu` tinyint(1) DEFAULT NULL,
  `childrens_table_bool` tinyint(1) DEFAULT NULL,
  `ssl` tinyint(1) DEFAULT '0',
  `restricted` tinyint(1) DEFAULT '0',
  `webmap` tinyint(1) DEFAULT '1',
  `legacy_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`),
  KEY `parent_id` (`parent_id`),
  KEY `lft` (`lft`),
  KEY `rght` (`rght`),
  KEY `site_id` (`site_id`),
  KEY `hidden` (`hidden`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `sections`
--

INSERT INTO `sections` (`id`, `site_id`, `slug`, `title`, `title_menu`, `parent_id`, `level`, `lft`, `rght`, `body_class`, `hidden`, `cover_children_id`, `plugin`, `external_url`, `access_key`, `target_blank`, `menu`, `insert_menu`, `childrens_table_bool`, `ssl`, `restricted`, `webmap`, `legacy_url`, `settings`, `created`, `modified`) VALUES
(2, NULL, 'ellos', 'Ellas', NULL, 0, 0, 1, 2, NULL, 0, NULL, 'Entry', '', '', NULL, 'main', NULL, NULL, 0, 0, 1, NULL, NULL, '2014-03-16 18:06:04', '2014-03-16 18:06:04'),
(3, NULL, 'nosotros', 'Nosotros', NULL, 0, 0, 3, 4, NULL, 0, NULL, 'Entry', '', '', NULL, 'main', NULL, NULL, 0, 0, 1, NULL, NULL, '2014-03-25 09:44:32', '2014-03-25 09:44:32'),
(4, NULL, 'noticias', 'Noticias', NULL, 0, 0, 5, 6, NULL, 0, NULL, 'Blog', '', '', NULL, 'main', NULL, NULL, 0, 0, 1, NULL, NULL, '2014-03-25 10:06:09', '2014-03-25 10:06:09'),
(5, NULL, 'dos-de-abril', 'Dos de abril', NULL, 0, 0, 7, 8, NULL, 0, NULL, 'Entry', '', '', NULL, 'main', NULL, NULL, 0, 0, 1, NULL, NULL, '2014-04-02 12:58:51', '2014-04-02 12:58:51');
