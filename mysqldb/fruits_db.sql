SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `fruit` (
  `id` int NOT NULL AUTO_INCREMENT, 
  `fruitname` varchar(20) NOT NULL,
  `qty` float NOT NULL,
  `distributor` varchar(20),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `fruit_price` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fruit_id` varchar(20) NOT NULL,
  `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,-- `date` datetime NOT NULL DEFAULT CURDATE(),
  `price` float NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`fruit_id`) REFERENCES fruit(`fruitname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Sample data
--


INSERT INTO `fruit` (`fruitname`, `qty`, `distributor`) VALUES
('apple', 5, 'SM'),
('pineapple', 10, 'Puregold'),
('starapple', 15, 'Royal'),
('orange', 55, 'SM'),
('avocado', 51, 'Sulyaw'),
('grapes', 53, 'SM'),
('chico', 35, 'SM');


INSERT INTO `fruit_price` (`fruit_id`,`price`) VALUES
('apple', 25.00),
('pineapple', 20.00),
('starapple', 30.00),
('orange',35.50),
('grapes', 36.50),
('chico',65.50),
('avocado', 24.00);


INSERT INTO `fruit_price` (`fruit_id`, `date`,`price`) VALUES
('apple', '01-01-2015 10:45:27', 25.00),
('apple', '02-01-2015 10:45:27', 28.00),
('apple', '03-01-2015 10:45:27', 24.00),
('pineapple', '05-01-2015 10:45:27', 24.00),
('pineapple', '04-01-2015 10:45:27', 20.00),
('pineapple', '04-05-2015 10:45:27', 32.00),
('starapple', '03-01-2015 10:45:27', 24.00),
('starapple', '02-05-2015 10:45:27', 30.00),
('avocado', '03-01-2015 10:45:27', 24.00);
