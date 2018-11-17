SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `baralhos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `publico` tinyint(1) NOT NULL DEFAULT '0',
  `revisao_facil` int(10) unsigned NOT NULL DEFAULT '604800' COMMENT '604800 seg = 7 dias',
  `revisao_bom` int(10) unsigned NOT NULL DEFAULT '259200' COMMENT '259200 seg = 3 dias',
  `revisao_errei` int(10) unsigned NOT NULL DEFAULT '86400' COMMENT '86400 seg = 1 dia',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `tema_id` (`tema_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `baralhos` (`id`, `usuario_id`, `tema_id`, `nome`, `descricao`, `publico`, `revisao_facil`, `revisao_bom`, `revisao_errei`, `created`, `updated`) VALUES
(1, 1, 1, 'Expressões Matemáticas Simples', 'Baralho para estudo de expressões matemáticas simples.', 1, 604800, 259200, 86400, '2018-11-13 21:05:00', NULL);

CREATE TABLE IF NOT EXISTS `cartas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `baralho_id` int(10) unsigned NOT NULL,
  `frente` text NOT NULL,
  `verso` text NOT NULL,
  `data_revisao` datetime DEFAULT NULL,
  `data_prox_revisao` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `baralho_id` (`baralho_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `cartas` (`id`, `baralho_id`, `frente`, `verso`, `data_revisao`, `data_prox_revisao`, `created`, `updated`) VALUES
(1, 1, '10 + 8 = ?', '18', NULL, NULL, '2018-11-13 21:08:00', NULL),
(2, 1, '25 / 5 = ?', '5', NULL, NULL, '2018-11-13 21:08:00', NULL),
(3, 1, '32 - 9 = ?', '23', NULL, NULL, '2018-11-13 21:08:00', NULL),
(4, 1, '10 * 4 = ?', '40', NULL, NULL, '2018-11-13 21:08:00', NULL),
(5, 1, '12 + 53 = ?', '65', NULL, NULL, '2018-11-13 21:08:00', NULL);

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0ps3vfvuvbqr0cvpr042o4gnski2v6kf', '::1', 1542417114, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323431373030383b),
('7fshnd4u999ikj71oa7ul433e0hqfgcn', '::1', 1542419502, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323431393432323b),
('bf7ip0ied7hro0g8gmv8octp9r21qm3q', '::1', 1542418830, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323431383537393b),
('bldc0o2hhk6smce2p5kt0726d24umps0', '::1', 1542418966, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323431383936363b),
('fmbs3n9s5c53tal5lj685akn8ii3aaet', '::1', 1542418575, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323431383237353b),
('hpl65nrhfmmij60prmh68h05arashc6b', '::1', 1542417978, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323431373836383b);

CREATE TABLE IF NOT EXISTS `temas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `temas` (`id`, `nome`) VALUES
(1, 'Matemática'),
(2, 'Inglês');

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `created`, `updated`) VALUES
(1, 'Éderson Fernandes', 'edersonluis.rf@gmail.com', '12345', '2018-11-13 20:55:00', NULL);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
