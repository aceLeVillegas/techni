-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2017 at 08:57 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Techni`
--

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

DROP TABLE IF EXISTS `Client`;
CREATE TABLE IF NOT EXISTS `Client` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nameFirst` varchar(30) NOT NULL,
  `nameLast` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`username`, `password`, `nameFirst`, `nameLast`, `email`, `phone`) VALUES
('bgeiger', 'regiegb117', 'Brian', 'Geiger', 'bgeiger@csumb.edu', '(111) 111-1111'),
('bpeters', 'sretepb17748', 'Bill', 'Peters', 'bpeters@csumb.edu', '(123) 456-7890'),
('fyates', 'setayf111111111', 'Frank', 'Yates', 'fyates@csumb.edu', '(777) 777-7777'),
('goak', 'koag858585', 'Gary', 'Oak', 'goak@csumb.edu', '(999) 999-9999'),
('jdoe', 'eodenaj1234', 'Jane', 'Doe', 'jdoe@csumb.edu', '(222) 222-2222'),
('jodoe', 'eodoj686', 'John', 'Doe', 'jodoe@csumb.edu', '(333) 333-3333'),
('lwaters', 'sretawl2222', 'Lucy', 'Waters', 'lwaters@csumb.edu', '(888) 888-8888'),
('mjohnson', 'nosnhojm876', 'Mike', 'Johnson', 'mjohnson@csumb.edu', '(444) 444-4444'),
('ppark', 'karpp4321', 'Pat', 'Park', 'ppark@csumb.edu', '(666) 666-6666'),
('slue', 'euls57857', 'Suzy', 'Lue', 'slue@csumb.edu', '(555) 555-5555');

-- --------------------------------------------------------

--
-- Table structure for table `Order`
--

DROP TABLE IF EXISTS `Order`;
CREATE TABLE IF NOT EXISTS `Order` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `total` float NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(50) NOT NULL,
  `clientUserName` varchar(30) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Order`
--

INSERT INTO `Order` (`orderID`, `total`, `orderDate`, `address`, `clientUserName`) VALUES
(1, 10000000, '2017-03-27 08:22:19', '861 Whittier Ave. Clovis CA 93611', 'bgeiger'),
(2, 60000000, '2017-03-27 08:42:07', '471 Edna Ct Marina CA 93933', 'bgeiger');

-- --------------------------------------------------------

--
-- Table structure for table `Order Product`
--

DROP TABLE IF EXISTS `Order Product`;
CREATE TABLE IF NOT EXISTS `Order Product` (
  `productID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `deliveryType` varchar(30) NOT NULL,
  PRIMARY KEY (`productID`,`orderID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Order Product`
--

INSERT INTO `Order Product` (`productID`, `orderID`, `quantity`, `deliveryType`) VALUES
(1, 1, 1, 'FedEx 2-Day'),
(2, 2, 1, 'FedEx 2-Day'),
(3, 2, 1, 'FedEx Next-Day');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

DROP TABLE IF EXISTS `Product`;
CREATE TABLE IF NOT EXISTS `Product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productTypeID` int(11) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `weight` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `yearCreated` int(11) NOT NULL,
  `artist` varchar(30) NOT NULL,
  `style` varchar(30) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`productID`, `productTypeID`, `productName`, `description`, `weight`, `volume`, `yearCreated`, `artist`, `style`, `price`) VALUES
(1, 1, 'Mona Lisa', 'Oil Painting of a girl', 20, 5, 1503, 'Leonardo da Vinci', 'Renaissance', 10000000),
(2, 1, 'The Last Supper', 'Depicts the scene of The Last Supper of Jesus with his disciples.', 40, 7, 1490, 'Leonardo da Vinci', 'Renaissance', 20000000),
(3, 1, 'The Creation Of Adam', 'One of nine scenes from the book of Genesis that are painted on the center of the ceiling of The Sistine Chapel.', 7000, 1000, 1512, 'Michelangelo', 'Renaissance', 40000000),
(4, 1, 'Guernica', 'The most famous painting by Picasso, completed in 1937. The painting was painted in Paris and is Inspired by the bombing of Guernica in Spain during the Spanish Civil War. The painting is on permanent display in Museo Reina Sofía, Madrid, Spain', 20, 7, 1937, 'Pablo Picasso', 'Cubism', 90000000),
(5, 1, 'Starry Night', 'Starry Night is one of the most well known paintings in modern culture. The painting is part of the permanent collection of the Museum of Modern Art in New York. The painting was the inspiration for the song “Vincent” (also known as “starry starry night”) by Don McLean.', 10, 4, 1889, 'Vincent van Gogh', ' Post-Impressionism', 3000000),
(6, 1, 'The Scream', 'The most famous piece by Edvard Munch, painted around 1893. It was painted using oil and pastel on cardboard. This frightening painting is on display at The National Gallery, Oslo, Norway.', 7, 3, 1893, 'Edvard Munch', 'Expressionism', 1234000),
(7, 1, 'The Persistence Of Memory', 'Painted in 1931 by the Spanish artist Salvador Dali, The Persistence of Memory is one of the most recognizable pieces in art history. This work of art is known to make people ponder on their way of life and the way they spend their time, and it is also thought that this wonderful painting was inspired by Albert Einstein’s Theory of Relativity.', 10, 2, 1931, 'Salvador Dali', 'Surrealism', 1306000),
(8, 1, 'Girl With A Pearl Earring', 'Considered by many to be “the Dutch Mona Lisa” or the “Mona Lisa of the North”, this beautiful painting by the Dutch artist Johannes Vermeer features, well… a girl with a pearl earring. The painting was completed around 1665 and is on display in the Mauritshuis Gallery in the Hague, the Netherlands.', 16, 6, 1665, 'Johannes Vermeer', 'Baroque', 100000),
(9, 1, 'The Night Watch', 'Completed in 1642, this famous artwork is on display at the Rijksmuseum in Amsterdam. The painting depicts a city guard moving out, led by Captain Frans Banning Cocq, his lieutenant and the rest of the guard’s armed men', 33, 7, 1642, 'Rembrandt van Rijn', ' Baroque', 2342570),
(10, 1, 'Self-Portrait Without Beard', 'Even though Van Gogh painted many portraits of himself, this one is by far the most famous as it is his last self-portrait and one of the few that depicts him without a beard. It was given by him to his mother as a birthday gift. It is also one of the most expensive paintings of all times, as it was sold for $71.5 million in 1998, and is now part of a private collection.', 12, 5, 1889, 'Vincent Van Gogh', 'Oil Painting', 71500000),
(11, 2, 'Bronze David', 'Made in the 1440’s, by Donatello (1386-1466), Bronze David is one of the most famous sculptures today. It is notable as the first unsupported standing work in bronze cast during the Renaissance period, and the first freestanding nude male sculpture made since antiquity. It depicts the young David with an enigmatic smile, posed with his foot on Goliath’s severed head just after killing the giant. The youth is standing naked, apart from a laurel-topped hat and boots, bearing the sword of Goliath. There is also much speculation as to when it was built. Suggested dates vary from the 1420s to the 1460s, although the exact date is not known.', 300, 60, 1440, 'Donatello', 'Renaissance', 30000),
(12, 2, 'Savannah Bird Girl Statue', 'The sculpture, known as the Bird Girl, was created in 1936, by sculptress Sylvia Shaw Judson (1897-1978) in Lake Forest, Illinois. It achieved fame when it was featured on the cover of the 1994 novel, Midnight in the Garden of Good and Evil. It was sculpted at Ragdale, the summer home of her family. Bird Girl is cast in bronze and stands 50 inches tall. She is the image of a young girl wearing a simple dress and a sad or contemplative expression, with her head tilted to the left. She stands straight, her elbows propped against her waist as she holds up two bowls out from her sides. The bowls are often described by viewers as “bird feeders.”', 400, 11, 1936, 'Sylvia Shaw Judson', 'American', 2002020),
(13, 2, 'The Discus Thrower', 'The Discus Thrower, or the Discobolus, is a famous lost Greek bronze original. The sculpture of it is still unknown. The Discobolus was completed towards the end of the severe period (460-450 BC). It is known through numerous Roman copies, both full-scale ones in marble, such as the first to be recovered, the Palombara Discopolus, or smaller scaled versions in bronze. As always in Greek athletics, the Discus Thrower is completely nude.', 500, 100, -460, 'unknown', 'Greek', 10000),
(14, 2, 'The Kiss', 'The Kiss is an 1889 marble sculpture by the French sculptor, Auguste Rodin (1840-1917). This sculpture has a interesting story to it. it depicts the 13th-century Italian noblewoman immortalized in Dante’s Inferno, who falls in love with her husband, Giovanni Malatesta’s, younger brother Paolo. Having fallen in love while reading the story of Lancelot and Guinevere, the couple are discovered and killed by Francesca’s husband. In the sculpture, the book can be seen in Paolo’s hand. The lover’s lips do not actually touch in the sculpture to suggest that they were interrupted, and met their demise without their lips ever having touched. When critics first saw the sculpture in 1887, they suggested the less specific title Le Baiser (The Kiss).', 4000, 100, 1889, 'Auguste Rodin', 'French', 1234570),
(15, 2, 'Hermes and The Infant Dionysus', 'Hermes and the Infant Dionysus, also known as the Hermes of Praxiteles or the Hermes of Olympus, is an ancient Greek sculpture of Hermes and the infant Dionysus, discovered in 1877, in the ruins of the Temple of Hera at Olympia. It is displayed at the Archaeological Museum of Olympia. It is traditionally attributed to Praxiteles and dated to the 4th century BC, based on a remark by the 2nd century Greek traveler Pausanias, and has made a major contribution to the definition of Praxitelean style. Its attribution is, however, the object of fierce controversy among art historians.\r\nThe sculpture is unlikely to have been one of Praxiteles’ famous works, as no ancient replicas of it have been identified. The documentary evidence associating the work with Praxiteles is based on a passing mention by the second-century AD traveler Pausanias.', 1234, 123, -400, 'Praxiteles', 'Greek', 0),
(16, 2, 'Lady Justice', 'The Lady Justice Sculpture is one of the greatest known sculptures in the world. This statue is not attributed to any one artist, but the fact that it adorns so many courthouses in the world has made it one of the more popular sculptures. This sculpture goes by many names, including Scales of Justice and Blind Justice, but is most commonly known as Lady Justice. The statue dates all the way back to ancient Greek and Roman times as the Goddess of justice and law.', 100, 40, 1500, 'unknown', 'Greek', 100),
(17, 2, 'Pieta', 'Created by Michelangelo (1475-1564), the Pieta depicts the Virgin Mary holding her only son, Jesus Christ, in her arms. Prior to sculpting the Pieta, Michelangelo was not a very known artist. He was only in his early twenties when he was told, in 1498, to do a life sized sculpture of the Virgin Mary holding her son in her arms. In about two years, from a single slab of marble, Michelangelo created one of the most beautiful sculptures ever.', 4434, 23, 1564, 'Michelangelo', 'Renaissance', 1236540),
(18, 2, 'The Thinker', 'Also from Auguste Rodin, is the famous sculpture “The Thinker.” Originally named The Poet, the piece was part of a commission by the Musée des Arts Décoratifs, Paris to create a monumental portal to act as the door of the museum. Rodin based his theme on The Divine Comedy of Dante and entitled the portal The Gates of Hell. Each of the statues in the piece represented one of the main characters in the epic poem. The Thinker was originally meant to depict Dante in front of the Gates of Hell, pondering his great poem. (In the final sculpture, a miniature of the statue sits atop the gates, pondering the hellish fate of those beneath him.) The sculpture is nude, as Rodin wanted a heroic figure in the tradition of Michelangelo, to represent intellect as well as poetry.', 300, 70, 1904, 'Auguste Rodin', 'Philosophy', 4785770),
(19, 2, 'Venus de Milo', 'he Venus de Milo sculpture was created sometime between 100 and 130 B.C. it is believed to depict Aphrodite (Venus to the Romans) the Greek goddess of love and beauty. It is a marble sculpture, slightly larger than life size at 203 cm (6 ft 8 in) high. Its arms and original plinth have been lost. From an inscription that was on its plinth, it is thought to be the work of Alexandros of Antioch; it was earlier mistakenly attributed to the master sculptor Praxiteles. It is at present on display at the Louvre Museum in Paris. Amazingly, the statue was discovered accidentally in a farmer’s field.', 523, 29, -100, 'unknown', 'Greek', 12312400),
(20, 2, 'David', '“David” is a masterpiece of Renaissance sculpture created between 1501 and 1504, by the Italian artist Michelangelo. It is a 5.17 meter (17 feet) marble statue of a standing male nude. The statue represents the Biblical hero David, a favored subject in the art of Florence. Originally commissioned as one of a series to be positioned high up on the facade of Florence Cathedral, the statue was instead placed in a public square, outside the Palazzo Della Signoria, the seat of civic government in Florence, where it was unveiled on 8 September, 1504. Because of the nature of the hero that it represented, it soon came to symbolize the defense of civil liberties embodied in the Florentine Republic, an independent city-state threatened on all sides by more powerful rival states and by the hegemony of the Medici family. The eyes of David, with a warning glare, were turned towards Rome. The statue was moved to the Academia Gallery in Florence in 1873, and later replaced at the original location by a replica.', 100, 30, 1504, 'Michaelangelo', 'Renaissance', 100000000),
(21, 3, 'Sun', 'Beautiful photograph of a sunset ', 5, 1, 2015, 'Lisa Pinettski', 'Modern', 25),
(22, 3, 'Landscape', 'Photograph of a landscape with some trees and mountains', 7, 2, 2017, 'Michael Cervantes', 'Modern', 40),
(23, 4, 'Graduation Card', 'Gift Card for any graduating student. Says "Congratulations" on the inside', 1, 1, 2016, 'Brian Geiger', 'Modern', 3),
(24, 4, 'Birthday Card', 'Gift card for any birthday event. Says "Happy Birthday" on the inside with some balloons on the front.', 1, 1, 2016, 'Brian Geiger', 'Modern', 3),
(25, 6, 'The Sorceror''s Stone', 'First Harry Potter book.', 2, 1, 1997, 'J. K. Rowling', 'Fantasy', 10),
(26, 6, 'The Chamber of Secrets', 'Second harry Potter book.', 2, 2, 1998, 'J. K. Rowling', 'Fantasy', 12),
(27, 6, 'The Prizoner of Azkaban', 'Third Harry Potter book.', 2, 2, 1999, 'J. K. Rowling', 'Fantasy', 13),
(28, 6, 'The Goblet of Fire', 'Fourth Harry Potter book', 2, 2, 2000, 'J. K. Rowling', 'Fantasy', 14),
(29, 6, 'Ender''s Game', 'First Ender series book', 2, 1, 1985, 'Orson Scott Card', 'Science Fiction', 9),
(30, 6, 'Speaker of the Dead', 'Second Ender series book', 2, 2, 1986, 'Orson Scott Card', 'Science Fiction', 12),
(33, 6, 'Xenocide', 'Third Ender Series book', 2, 2, 1991, 'Orson Scott Card', 'Science Fiction', 12),
(34, 6, 'Children of the Mind', 'Fourth Ender Series book', 2, 2, 1996, 'Orson Scott Card', 'Science Fiction', 10),
(35, 7, 'Mona Lisa Print', 'Reprinting of a classic Da Vinci painting', 1, 1, 2017, 'Leonardo da Vinci', 'Renaissance', 10),
(36, 7, 'Lotus Flower Print', 'Reprint of a classic Monet painting', 1, 1, 2017, 'Claude Monet', 'Impressionist', 20),
(37, 7, 'Starry Night Reprint', 'Reprinting of a famous Van Gogh painting', 1, 1, 2017, 'Vincent van Gogh', 'Landscape painting', 13),
(38, 8, 'Sunset Lithograph', 'lithograph of a sunset', 1, 2, 2016, 'Mariah Carey', 'Landscape ', 4),
(39, 7, 'Underwater Lithograph', 'Lithograph of an underwater scene', 1, 1, 2015, 'Spongebob Squarepants', 'Cartoon', 45),
(40, 5, 'Bundle of Sticks', 'A mixed media work of art using sticks and twigs', 2, 5, 2010, 'Stickman Jones', 'stick', 300);

-- --------------------------------------------------------

--
-- Table structure for table `Product Type`
--

DROP TABLE IF EXISTS `Product Type`;
CREATE TABLE IF NOT EXISTS `Product Type` (
  `productTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(30) NOT NULL,
  PRIMARY KEY (`productTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Product Type`
--

INSERT INTO `Product Type` (`productTypeID`, `typeName`) VALUES
(1, 'Original Artwork'),
(2, 'Sculpture'),
(3, 'Photograph'),
(4, 'Gift Card'),
(5, 'Mixed Media'),
(6, 'Book'),
(7, 'Reproduction Print'),
(8, 'Lithograph');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
