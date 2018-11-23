SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `baralhos`;
CREATE TABLE IF NOT EXISTS `baralhos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `publico` tinyint(1) NOT NULL DEFAULT '0',
  `revisao_facil` int(10) UNSIGNED NOT NULL DEFAULT '604800' COMMENT '604800 seg = 7 dias',
  `revisao_bom` int(10) UNSIGNED NOT NULL DEFAULT '259200' COMMENT '259200 seg = 3 dias',
  `revisao_errei` int(10) UNSIGNED NOT NULL DEFAULT '86400' COMMENT '86400 seg = 1 dia',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `tema_id` (`tema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `baralhos` (`id`, `usuario_id`, `tema_id`, `nome`, `descricao`, `publico`, `revisao_facil`, `revisao_bom`, `revisao_errei`, `created`, `updated`) VALUES
(1, 5, 1, 'Expressões Matemáticas Simples', 'Baralho para estudo de expressões matemáticas simples.', 1, 604800, 259200, 86400, NULL, NULL),
(2, 5, 2, 'Verb To Be', 'Baralho para finalmente estudar e aprender o \"Verb To Be\".', 1, 604800, 259200, 86400, NULL, NULL),
(3, 5, 3, 'Tonicidade', 'Baralho para aprender a diferenciar as oxítonas, paroxítonas e proparoxítonas.', 1, 604800, 259200, 86400, NULL, NULL),
(4, 5, 3, 'Tonicidade', 'Baralho para aprender a diferenciar as oxítonas, paroxítonas e proparoxítonas.', 1, 604800, 259200, 86400, NULL, NULL);

DROP TABLE IF EXISTS `cartas`;
CREATE TABLE IF NOT EXISTS `cartas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `baralho_id` int(10) UNSIGNED NOT NULL,
  `frente` text NOT NULL,
  `verso` text NOT NULL,
  `data_revisao` datetime DEFAULT NULL,
  `data_prox_revisao` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `baralho_id` (`baralho_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `cartas` (`id`, `baralho_id`, `frente`, `verso`, `data_revisao`, `data_prox_revisao`, `created`, `updated`) VALUES
(1, 1, '10 + 8 = ?', '18', NULL, NULL, NULL, NULL),
(2, 1, '25 / 5 = ?', '5', NULL, NULL, NULL, NULL),
(3, 1, '32 - 9 = ?', '23', NULL, NULL, NULL, NULL),
(4, 1, '10 * 4 = ?', '40', NULL, NULL, NULL, NULL),
(5, 1, '12 + 53 = ?', '65', NULL, NULL, NULL, NULL),
(6, 3, 'Jacaré', 'Ja-ca-ré<br>Oxítona', NULL, NULL, NULL, NULL),
(7, 3, 'Caráter', 'Ca-rá-ter<br>Paroxítona', NULL, NULL, NULL, NULL),
(8, 3, 'Máquina', 'Má-qui-na<br>Proparoxítona', NULL, NULL, NULL, NULL),
(9, 2, 'I am', 'Eu sou / estou', NULL, NULL, NULL, NULL),
(10, 2, 'You are', 'Você é / está', NULL, NULL, NULL, NULL),
(11, 2, 'He is', 'Ele é / está', NULL, NULL, NULL, NULL),
(12, 2, 'She is', 'Ela é / está', NULL, NULL, NULL, NULL),
(13, 2, 'It is', 'Ele(a) é / está', NULL, NULL, NULL, NULL),
(14, 2, 'We are', 'Nós somos / estamos', NULL, NULL, NULL, NULL),
(15, 2, 'You are', 'Vocês são / estão', NULL, NULL, NULL, NULL),
(16, 2, 'They are', 'Eles são / estão', NULL, NULL, NULL, NULL);

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0m188dt75ha7sq4tn9ffsr5j88dnbkk6', '::1', 1542934216, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323933343039333b),
('2rajup42dun0tj8o78jhrk2agcdd1p0s', '::1', 1542933666, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323933333430323b),
('418f20mo9g24sjajvehis88c1vuq60ph', '::1', 1542937525, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323933373532323b),
('42ae2b6663oqr78vicqifgim66md3cr6', '::1', 1542931369, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323933313234363b),
('4hjvl3lls6t1sequ3re7o99edt4nf0uq', '::1', 1542932506, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323933323233373b),
('6lfkklfj0ao7cu7qbg9anevm96nrtobo', '::1', 1542931606, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323933313536363b),
('bv4psa4rhbadrmicog5ounp72ft0bof1', '::1', 1542932840, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323933323633333b),
('fou9mj3oefm55rebhl3gg9certjlscth', '::1', 1542933378, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323933333039353b),
('ikohihvv4fip5edl3fvhi9jvphv0tdts', '::1', 1542934029, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323933333734313b),
('tjq88gs4f5hvlliu2up9lm9np6n7ker5', '::1', 1542932235, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534323933313933353b);

DROP TABLE IF EXISTS `temas`;
CREATE TABLE IF NOT EXISTS `temas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `bg_color` varchar(50) NOT NULL DEFAULT '#000000',
  `icon` varchar(50) NOT NULL DEFAULT 'icon-tema',
  `ordem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `temas` (`id`, `nome`, `bg_color`, `icon`, `ordem`) VALUES
(1, 'Matemática', '#d9edf7', 'icon-tema-mat', 2),
(2, 'Inglês', '#fcf8e3', 'icon-tema-ing', 3),
(3, 'Português', '#f2dede', 'icon-tema-port', 4),
(4, 'História', '#000000', 'icon-tema', 5),
(5, 'Tecnologia', '#000000', 'icon-tema', 1),
(6, 'Diversos', '#000000', 'icon-tema', 6);

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `created`, `updated`) VALUES
(4, 'Éderson Luís dos Reis Fernandes', 'edersonluis.rf@gmail.com', '$2y$10$6RdcxVA.DuMnbXlLnNt2zeVCt/Vz1rfmpDItbjUk7BN6xZ9pChPJe', NULL, NULL),
(5, 'João', 'joao@joao.com', '$2y$10$No6qiTVZBcCQU1.od3zk0O2YOAcih1SYyKaBc8KPO6sJqpbvNL4tq', NULL, NULL),
(6, 'José', 'jose@jose.com', '$2y$10$88vC4NK2UrOcHcZNk62paOeDS27qXcuXLlFrlk0H2HZQCQaaU3awm', NULL, NULL);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
