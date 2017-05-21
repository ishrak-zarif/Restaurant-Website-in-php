-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2015 at 05:53 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bigbun_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `res_categories`
--

CREATE TABLE IF NOT EXISTS `res_categories` (
`id` int(11) NOT NULL,
  `menu_id` smallint(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `res_categories`
--

INSERT INTO `res_categories` (`id`, `menu_id`, `title`, `short_description`, `sequence`) VALUES
(1, 1, 'Breakfast', '', 1),
(3, 1, 'Drinks', '&lt;p&gt;\r\n	All Soft Drinks&lt;/p&gt;\r\n', 2),
(4, 2, 'Main Dish', '&lt;p&gt;\r\n	BEST LUNCH&lt;/p&gt;\r\n', 1),
(6, 3, 'Set Menu', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `res_customers`
--

CREATE TABLE IF NOT EXISTS `res_customers` (
`id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_eamil` varchar(255) NOT NULL,
  `customer_username` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `res_customers`
--

INSERT INTO `res_customers` (`id`, `customer_name`, `customer_phone`, `customer_eamil`, `customer_username`, `customer_password`) VALUES
(1, 'ABC', '123', 'test@test.com', 'test', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `res_foods`
--

CREATE TABLE IF NOT EXISTS `res_foods` (
`id` int(11) NOT NULL,
  `menu_id` smallint(6) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_file` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `price` smallint(6) NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `res_foods`
--

INSERT INTO `res_foods` (`id`, `menu_id`, `category_id`, `title`, `image_file`, `short_description`, `price`, `sequence`) VALUES
(2, 1, 1, 'Egg &amp; Cheese', '1324046352_Nature_Wallpapers-040.jpg', '&lt;p&gt;\r\n	Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram,&lt;/p&gt;\r\n', 100, 2),
(3, 1, 1, 'Becon &amp; Cheese', '1324060700_Nature_Wallpapers-035.jpg', '&lt;p&gt;\r\n	Breakfast with becon and cheese&lt;/p&gt;\r\n', 80, 3),
(4, 1, 3, 'Soft drink', '1450457525_sd.jpg', '&lt;p&gt;\r\n	asbdjaslkkkkkkkkk cklawjedhnasjkh kjh ljfdsk;l jl;ksjdfl;kj jlj pokpokpofdkgokfdgokdfgo.&lt;/p&gt;\r\n', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `res_menus`
--

CREATE TABLE IF NOT EXISTS `res_menus` (
`id` smallint(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sequence` smallint(6) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `res_menus`
--

INSERT INTO `res_menus` (`id`, `title`, `sequence`) VALUES
(1, 'Breakfast Menu', 1),
(2, 'Launch Menu', 2),
(3, 'Dinner Menu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `res_pages`
--

CREATE TABLE IF NOT EXISTS `res_pages` (
`id` tinyint(4) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `res_pages`
--

INSERT INTO `res_pages` (`id`, `content`) VALUES
(1, '&lt;p&gt;\r\n	Get a taste of our highest quality steak from Bangladesh, the most delicious and exclusive beef on earth. An exclusive Bangladeshi fast food restaurant, we only use the best quality meat selected from Bangladesh.&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;em&gt;&lt;strong&gt;BIG BUN&lt;/strong&gt;&lt;/em&gt; offers you original Bangladeshi Steak and Italian Pizza &amp;amp; Pasta as well as an extensive array of Fish Item prepared by chefs who possesses over 20 years of experience.&lt;/p&gt;\r\n&lt;p&gt;\r\n	We in &lt;em&gt;&lt;strong&gt;BIG BUN&lt;/strong&gt;&lt;/em&gt; are devoted in providing a unique dining experience with excellent quality of food coupled with warm and friendly atmosphere.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Mexican, Italian Buffet Lunch served every day.&lt;/p&gt;\r\n'),
(2, '&lt;p align=&quot;center&quot;&gt;\r\n	&lt;strong&gt;&lt;em&gt;EL TORO&lt;/em&gt;&lt;/strong&gt; is located in the center of London at Hammersmith, a minutes&amp;#39; walk from Kensington Olympia.&lt;/p&gt;\r\n&lt;p align=&quot;center&quot;&gt;\r\n	87 Hammersmith Road&lt;br /&gt;\r\n	London, W14 0QH&lt;/p&gt;\r\n&lt;div align=&quot;right&quot; style=&quot;width:156px; margin:auto; margin-top:-15px;&quot;&gt;\r\n	Tel: 02076025161 07814467814&lt;/div&gt;\r\n&lt;br /&gt;\r\n&lt;p align=&quot;center&quot;&gt;\r\n	Opening Hours:&lt;/p&gt;\r\n&lt;p align=&quot;center&quot;&gt;\r\n	7 days a week&lt;/p&gt;\r\n&lt;div align=&quot;center&quot;&gt;\r\n	Lunch 11:30 am to 3:00 pm&lt;/div&gt;\r\n&lt;div align=&quot;center&quot; style=&quot;margin-top:10px;&quot;&gt;\r\n	Dinner 5:00 pm to 11:00 pm&lt;/div&gt;\r\n&lt;p align=&quot;center&quot;&gt;\r\n	&lt;br /&gt;\r\n	For reservations please call.&lt;/p&gt;\r\n&lt;p align=&quot;center&quot;&gt;\r\n	You can also email us at &lt;a href=&quot;mailto:contact@eltorosteak.co.uk&quot;&gt;contact@eltorosteak.co.uk&lt;/a&gt;&lt;/p&gt;\r\n'),
(3, '&lt;p&gt;\r\n	Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.&lt;/p&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `res_reservations`
--

CREATE TABLE IF NOT EXISTS `res_reservations` (
`id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reservation_name` varchar(255) NOT NULL,
  `reservation_date` varchar(50) NOT NULL,
  `reservation_date_timestemp` varchar(50) NOT NULL,
  `no_of_tables` smallint(6) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `res_reservations`
--

INSERT INTO `res_reservations` (`id`, `customer_id`, `reservation_name`, `reservation_date`, `reservation_date_timestemp`, `no_of_tables`, `message`) VALUES
(1, 1, 'reserv name test', '31 December, 2015', '1451516400', 1, 'This is test.');

-- --------------------------------------------------------

--
-- Table structure for table `res_users`
--

CREATE TABLE IF NOT EXISTS `res_users` (
`id` smallint(6) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `res_users`
--

INSERT INTO `res_users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`) VALUES
(1, 'Ishrak', 'Islam', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `res_categories`
--
ALTER TABLE `res_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_customers`
--
ALTER TABLE `res_customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_foods`
--
ALTER TABLE `res_foods`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_menus`
--
ALTER TABLE `res_menus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_pages`
--
ALTER TABLE `res_pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_reservations`
--
ALTER TABLE `res_reservations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_users`
--
ALTER TABLE `res_users`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `res_categories`
--
ALTER TABLE `res_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `res_customers`
--
ALTER TABLE `res_customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `res_foods`
--
ALTER TABLE `res_foods`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `res_menus`
--
ALTER TABLE `res_menus`
MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `res_pages`
--
ALTER TABLE `res_pages`
MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `res_reservations`
--
ALTER TABLE `res_reservations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `res_users`
--
ALTER TABLE `res_users`
MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
