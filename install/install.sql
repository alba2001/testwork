CREATE TABLE IF NOT EXISTS `vel_testwork_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `vel_testwork_users` (`id`, `email`, `password`) VALUES
(1, 'asd@fgh.id', '12345678');
