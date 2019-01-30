-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `author` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `article` (`id`, `title`, `content`, `author`) VALUES
(1,	'Anthony Davis trades: What should Celtics, Lakers, Knicks do now?',	'Anthony Davis has requested a trade from the New Orleans Pelicans that could shake up the NBA. So, what\'s next?  Our experts answer the big questions for New Orleans and potential suitors heading into the 2019 NBA trade deadline on Feb. 7.',	1),
(2,	'NBA scores, highlights: Paul George leads Thunder past Bucks',	' To start the day, the Cavaliers beat the Bulls in a game that both teams probably would have preferred to lose, while the Clippers secured a nice victory over the Kings.  Then, we got to the day\'s marquee game, as Paul George led the Thunder past Giannis Antetokounmpo and the Bucks with some clutch buckets down the stretch.',	1),
(3,	'Pistons\' Griffin: Anthony Davis\' trade request is sign of times',	'Auburn Hills - The news of Pelicans forward Anthony Davis requesting a trade shook the NBA news cycle on Monday. Although his contract extends through next season, Davis — through his agent, Rich Paul — put the Pelicans and the league on notice that he didn’t want the supermax deal for five years and $240 million and wanted to be with a contending team.  It’s a power flex for a superstar to force his way out of a team that’s invested heavily in him but hasn’t had the results or the players around him to have much playoff success. It’s the direction the league is going, with super teams building and star players leaving small-market teams for greener pastures.',	2),
(5,	'Hey',	'Hello World !        ',	2),
(6,	'test',	'        coucou',	2),
(7,	'test',	'        coucou',	2),
(8,	'Mon premier formulaire',	'        Bonsoir',	3),
(9,	'test',	'test        ',	3),
(10,	'Hello',	'sunnyday        ',	1),
(11,	'mp',	'        hey',	3),
(12,	'1st post',	'        J\'Ã©cris mon premier post',	15);

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `article` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article` (`article`),
  CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`article`) REFERENCES `article` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1,	'Eudz',	'99df381572c472f68ae2dd32a77c2161ecf721bd'),
(2,	'Eb',	'97a02664f35ad0c9cbf2121dceebca2d7373e34a'),
(3,	'root',	'dc76e9f0c0006e8f919e0c515c66dbba3982f785'),
(13,	'dam',	'$argon2i$v=19$m=1024,t=2,p=2$Q2YxQUNDY3dNOXdRZElqLg$IzXwfl3933gmoJv9Vhwn8a9GxZ3KnwGvyNcqMwQF8Bs'),
(14,	'rot',	'$argon2i$v=19$m=1024,t=2,p=2$TDlKeHdiQU5tYkV6ankyUg$rYBmBi/wy25/nTOHqE3g4ChkC9LgW74j//LCf++mu7Y'),
(15,	'care',	'ec1deb95d610f97b2e9fd3d7246c133ad07b26cf');

-- 2019-01-30 22:50:47
