-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2012 at 11:38 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employ`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency_setup`
--

CREATE TABLE IF NOT EXISTS `currency_setup` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `inuse` int(1) NOT NULL,
  `currency` varchar(150) NOT NULL,
  `currency_abbrev` varchar(10) NOT NULL,
  `currency_abbrev_position` varchar(10) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `symbol_position` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `currency_setup`
--

INSERT INTO `currency_setup` (`id`, `inuse`, `currency`, `currency_abbrev`, `currency_abbrev_position`, `symbol`, `symbol_position`) VALUES
(17, 1, 'United States Dollar', 'USD', '1', '$', '1'),
(18, 0, 'Uganda Shillings', 'Ugx', '1', '/=', '2');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_rates`
--

CREATE TABLE IF NOT EXISTS `exchange_rates` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `fromid` int(15) NOT NULL,
  `toid` int(15) NOT NULL,
  `yearid` int(15) NOT NULL,
  `monthid` int(2) NOT NULL,
  `amount` int(10) NOT NULL,
  `date_posted` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `exchange_rates`
--

INSERT INTO `exchange_rates` (`id`, `fromid`, `toid`, `yearid`, `monthid`, `amount`, `date_posted`) VALUES
(6, 17, 18, 16, 3, 2560, '1332384234');

-- --------------------------------------------------------

--
-- Table structure for table `featured_lists`
--

CREATE TABLE IF NOT EXISTS `featured_lists` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `hrid` int(15) NOT NULL,
  `policeid` int(15) NOT NULL,
  `starttime` int(15) NOT NULL,
  `endtime` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `featured_lists`
--

INSERT INTO `featured_lists` (`id`, `hrid`, `policeid`, `starttime`, `endtime`) VALUES
(50, 3, 0, 1334090566, 1334102400),
(54, 0, 5, 1334091645, 1334102400),
(55, 0, 5, 1334091676, 1334102400),
(56, 0, 5, 1334091750, 1334102400),
(57, 0, 5, 1334091904, 1334102400),
(58, 0, 5, 1334092151, 1334102400),
(59, 0, 5, 1334092154, 1334102400),
(60, 0, 5, 1334092215, 1334102400);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE IF NOT EXISTS `months` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `names` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `names`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `payment_durations`
--

CREATE TABLE IF NOT EXISTS `payment_durations` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `names` varchar(100) NOT NULL,
  `duration` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment_durations`
--

INSERT INTO `payment_durations` (`id`, `names`, `duration`) VALUES
(1, '1 month', 1),
(2, '3 Months', 3),
(3, '6 Months', 6),
(4, '9 Months', 9),
(5, '1 Year', 12);

-- --------------------------------------------------------

--
-- Table structure for table `payment_rates`
--

CREATE TABLE IF NOT EXISTS `payment_rates` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `durationid` int(15) NOT NULL,
  `paymentrate` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `payment_rates`
--

INSERT INTO `payment_rates` (`id`, `durationid`, `paymentrate`) VALUES
(1, 1, '1000'),
(2, 2, '3000'),
(3, 3, '6000'),
(4, 4, '9000');

-- --------------------------------------------------------

--
-- Table structure for table `persons_list`
--

CREATE TABLE IF NOT EXISTS `persons_list` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `userid` int(15) NOT NULL,
  `origin` int(1) NOT NULL,
  `randomid` varchar(10) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `alias1` varchar(200) NOT NULL,
  `alias2` varchar(200) NOT NULL,
  `alias3` varchar(200) NOT NULL,
  `phoneno` varchar(14) NOT NULL,
  `gender` int(1) NOT NULL,
  `race` varchar(20) NOT NULL,
  `tribe` varchar(100) NOT NULL,
  `pheight` varchar(20) NOT NULL,
  `haircolor` varchar(20) NOT NULL,
  `eyecolor` varchar(20) NOT NULL,
  `dateofbirth` varchar(20) NOT NULL,
  `maritalstatus` int(1) NOT NULL,
  `spousename` varchar(200) NOT NULL,
  `fathername` varchar(200) NOT NULL,
  `mothername` varchar(200) NOT NULL,
  `parentsresidence` varchar(100) NOT NULL,
  `countryofbirth` varchar(20) NOT NULL,
  `placeofbirth` varchar(150) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `passportno` varchar(20) NOT NULL,
  `idcard` varchar(20) NOT NULL,
  `drivingpermit` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `streetaddress` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `parish` varchar(150) NOT NULL,
  `village` varchar(150) NOT NULL,
  `zone` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `university` text NOT NULL,
  `secondaryschool` text NOT NULL,
  `primaryschool` text NOT NULL,
  `specialcourse` text NOT NULL,
  `hrcomment` text NOT NULL,
  `status` int(1) NOT NULL,
  `date_posted` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `persons_list`
--

INSERT INTO `persons_list` (`id`, `userid`, `origin`, `randomid`, `picture`, `fname`, `mname`, `lname`, `alias1`, `alias2`, `alias3`, `phoneno`, `gender`, `race`, `tribe`, `pheight`, `haircolor`, `eyecolor`, `dateofbirth`, `maritalstatus`, `spousename`, `fathername`, `mothername`, `parentsresidence`, `countryofbirth`, `placeofbirth`, `nationality`, `passportno`, `idcard`, `drivingpermit`, `address`, `streetaddress`, `city`, `parish`, `village`, `zone`, `occupation`, `qualification`, `university`, `secondaryschool`, `primaryschool`, `specialcourse`, `hrcomment`, `status`, `date_posted`) VALUES
(3, 20, 1, '195998', '1333769143picture1.jpg', 'Simon', 'Peter', 'Opolot', 'Quib', '', '', '0782151413', 2, 'African', 'Itesot', '178m', 'Black', 'Brown', '06082011', 1, 'Barbra Alibo', 'Deo Eyou', 'Grace Eyou', 'Entebbe', 'Uganda', 'Tororo', 'Ugandan', '1234567', 'abcdefg', 'rstuvwxyz', 'Stanbic Bank Uganda,\n\nP.O. Box 455,\n\nEntebbe - Uganda', 'Airport Road', 'Entebbe', 'Kitoro', 'Village A', 'Zone B', 'Banker', 'Bcon', 'MUST', 'St. Peter''s College Tororo', 'Rockview Primary School', 'Testing', 'Simon misappropriated Ugx 500 million ', 1, '1333764050'),
(5, 18, 2, '567530', '1333781217picture1.jpg', 'Sarah', '', 'Amajo', 'honourable', '', '', '0772445444', 1, 'African', 'Kumam', '160m', 'Black', 'Brown', '04102012', 5, '', 'Opit', 'Grace', 'Soroti', 'Uganda', 'Mbale', 'Ugandan', '43', '44', '45', 'Soroti', '', 'Soroti', 'Senior Quarters', 'Nakatunya', 'Zone B', 'Student', 'MUK', 'MUK', 'Soroti SS', 'Nakatunya', '', 'Police Case File: 04/u/4534/EVE', 1, '1333781088');

-- --------------------------------------------------------

--
-- Table structure for table `running_list`
--

CREATE TABLE IF NOT EXISTS `running_list` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `userid` int(15) NOT NULL,
  `paymentid` int(15) NOT NULL,
  `personid` int(11) NOT NULL,
  `startdate` varchar(20) NOT NULL,
  `enddate` varchar(20) NOT NULL,
  `date_posted` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `running_list`
--

INSERT INTO `running_list` (`id`, `userid`, `paymentid`, `personid`, `startdate`, `enddate`, `date_posted`) VALUES
(14, 20, 35, 3, '1334016000', '1336608000', '1334089982'),
(15, 18, 0, 5, '1334016000', '1349827200', '1334092148');

-- --------------------------------------------------------

--
-- Table structure for table `site_payments`
--

CREATE TABLE IF NOT EXISTS `site_payments` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `userid` int(15) NOT NULL,
  `durationid` int(15) NOT NULL,
  `refno` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `inuse` int(1) NOT NULL,
  `date_posted` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `site_payments`
--

INSERT INTO `site_payments` (`id`, `userid`, `durationid`, `refno`, `status`, `inuse`, `date_posted`) VALUES
(35, 20, 1, 'DEM/2012-130721', 2, 1, '1333328664'),
(36, 20, 2, 'DEM/2012-759770', 2, 0, '1333775131');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `usern` varchar(20) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `urights` varchar(3) NOT NULL,
  `ustatus` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usern`, `passwd`, `urights`, `ustatus`) VALUES
(13, 'root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '800', 1),
(15, 'ronald', '9d270ca213048cc46f762591f54b6a0d59390996', '600', 1),
(18, 'sopolot', '6db92c8b6654687b5601a80f73c5a4cd7217e00c', '700', 1),
(20, 'carolyn', 'bd8e5bb6f9a76b6ad22c4395032382453fde0f17', '600', 1),
(22, 'gapolot', 'fe0d1f48401e2ce08ba7cbc76dc623e0ee82ddc6', '700', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts_companies`
--

CREATE TABLE IF NOT EXISTS `user_accounts_companies` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `userid` int(15) NOT NULL,
  `companynames` varchar(200) NOT NULL,
  `contactnames` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `emailid` varchar(150) NOT NULL,
  `date_joined` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_accounts_companies`
--

INSERT INTO `user_accounts_companies` (`id`, `userid`, `companynames`, `contactnames`, `address`, `phoneno`, `emailid`, `date_joined`) VALUES
(2, 15, 'MTN Uganda', 'Ronald Eyit', 'MTN Towers,\n\nKampala - Uganda', '0414333247', 'ronald.eyit@mtn.co.ug', '1331372875'),
(4, 20, 'UMEME', 'Carolyn Atuhaire', 'UMEME', '0414232342', 'carolyn@umeme.co.ug', '1331487025');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts_police`
--

CREATE TABLE IF NOT EXISTS `user_accounts_police` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `userid` int(15) NOT NULL,
  `names` varchar(200) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `date_joined` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_accounts_police`
--

INSERT INTO `user_accounts_police` (`id`, `userid`, `names`, `phoneno`, `date_joined`) VALUES
(1, 18, 'Pte. Simon Opolot', '0753453453', '1331379995'),
(3, 22, 'Grace Apolot', '0792122132', '1333756742');

-- --------------------------------------------------------

--
-- Table structure for table `website_pages`
--

CREATE TABLE IF NOT EXISTS `website_pages` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `location` varchar(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `website_pages`
--

INSERT INTO `website_pages` (`id`, `location`, `title`, `content`) VALUES
(41, 'home', '', 'Home page'),
(42, 'best', '', 'What We Do Best'),
(43, 'services', '', 'Our Services'),
(44, 'terms', '', 'Terms and Conditions'),
(45, 'privacy', '', 'Privacy Policy'),
(46, 'contact', '', 'Contact Us'),
(47, 'howtopay', '', 'How To Pay'),
(48, 'faqs', 'ask me', 'Ask me too');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `activeyear` int(1) NOT NULL,
  `names` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`id`, `activeyear`, `names`) VALUES
(15, 0, '2011'),
(16, 1, '2012');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
