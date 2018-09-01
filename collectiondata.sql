SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


INSERT INTO `collection` (`name`, `description`, `year`, `width`, `height`, `quantity`, `album`, `image`, `grade`) VALUES
('testname', 'testdescr', 1990, '79.99', '89.99', 2, 1, 'https://i.pinimg.com/originals/c2/12/74/c212748149ca2f3171669a02778ef46b.png', 'average'),
('testname2', 'testdescr2', 2012, '99.99', '99.99', 1, 1, 'https://www.usps.com/assets/images/stamps/2018/love-flourishes/stamp-love-stamp.png', 'fine'),
('testname3', 'testname3', 2014, '55.55', '58.98', 4, 0, 'https://www.silencershop.com/media/catalog/product/cache/small_image/200x200/beff4985b56e3afdbeabfc89641a4582/t/a/tax_stamp_1_1.png', 'extremely fine'),
('testname4', 'testname4', 1790, '58.98', '67.01', 5, 1, 'http://www.theswedishtiger.com/279B.png', 'very fine'),
('testname5', 'testname5', 1888, '29.56', '56.29', 1, 0, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsvKSwnUN7cSXRR7CvblXbpbCN4wD3Rjp2aIwkuBqNLyP_Ik3M', 'superb');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
