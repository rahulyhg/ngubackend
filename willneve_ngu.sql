-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2016 at 10:57 AM
-- Server version: 5.5.49-MariaDB
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `willneve_ngu`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Operator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `emailer`
--

CREATE TABLE IF NOT EXISTS `emailer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emailer`
--

INSERT INTO `emailer` (`id`, `username`, `password`) VALUES
(1, 'jaywohlig', 'wohlig123');

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE IF NOT EXISTS `logintype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(2, 'Contact', '', '', 'site/viewcontact', 1, 0, 1, 2, 'icon-dashboard'),
(3, 'Subscribe', '', '', 'site/viewsubscribe', 1, 0, 1, 3, 'icon-dashboard'),
(4, 'Client', '', '', 'site/viewclient', 1, 0, 1, 4, 'icon-dashboard'),
(5, 'Testimonials', '', '', 'site/viewtestimonial', 1, 0, 1, 5, 'icon-dashboard'),
(6, 'Media', '', '', 'site/viewmedia', 1, 0, 1, 0, 'icon-dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `menu1`
--

CREATE TABLE IF NOT EXISTS `menu1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `linktype` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `menu1`
--

INSERT INTO `menu1` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Pooja', '', '', 'site/viewpooja', '1', 0, 1, 1, 'icon-dashboard'),
(2, 'Jagruti', '', '', 'site/viewjagruti', '1', 0, 1, 1, 'icon-dashboard'),
(3, 'Review', '', '', 'site/viewreview', '1', 0, 1, 1, 'icon-dashboard'),
(4, 'Review', '', '', 'site/viewreview', '1', 0, 1, 1, 'icon-dashboard'),
(5, 'Contact', '', '', 'site/viewcontact', '1', 0, 1, 1, 'icon-dashboard'),
(6, 'Subscribe', '', '', 'site/viewsubscribe', '1', 0, 1, 1, 'icon-dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ngubackend_contact`
--

CREATE TABLE IF NOT EXISTS `ngubackend_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `query` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `ngubackend_contact`
--

INSERT INTO `ngubackend_contact` (`id`, `name`, `email`, `phone`, `organization`, `query`) VALUES
(27, 'Poonam', '', '7718828664', 'HR Reflections', 'Hi,\n\nWe are an Executive search firm and we have few international startup -highly funded clients who require Employee Engagement Services, so we would like to give inquire about your services so that we can introduce you with our clients. You can contact'),
(28, 'Bharat', '', '9986072242', 'Mast Global', 'Kindly get in touch if you have any employee engagement services'),
(29, 'Pinakin Korde', '', '9920425032', 'Korden Engineers', 'Hi, I have a cross functional experience of 6 yrs in IT/Engg industry as an analyst, BD and product management. I am now willing to work in the area of my interest which happens to be employee engagement. Kindly let know if you have any opening. \n\nRegards'),
(30, 'sunil valavalkar', '', '9820531733', 'All India Pickleball Association- AIPA', 'Under the aegis of AIPA we play  and promote a new sport called  Pickleball which is good tool to energize working professionals.\npl visit www.aipa.co.in or www,usapa.org\nIn case you find this sport useful for employee engagement , we will collaborate wit'),
(31, 'Dinesh Gupta', '', '807179747', 'csc center', 'can i attend your session?'),
(32, 'Shubha S', '', '8879288989', 'Essel Infraprojects', 'Would like to explore the option of partnering for internal communications.');

-- --------------------------------------------------------

--
-- Table structure for table `ngubackend_subscribe`
--

CREATE TABLE IF NOT EXISTS `ngubackend_subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `ngubackend_subscribe`
--

INSERT INTO `ngubackend_subscribe` (`id`, `email`) VALUES
(3, 'abhishek@willnevergrowup.com'),
(4, 'asif@willnevergrowup.com'),
(5, 'sohan@wohlig.com'),
(6, 'amit.wohlig@gmail.com'),
(8, 'sdhatingan@gmail.com'),
(11, 'pooja.wohlig@gmail.com'),
(12, 'vikramv575@gmail.com'),
(13, 'gayatri@willnevergrowup.com'),
(14, 'mariamtaqui@outlook.com'),
(15, 'pg124.92@gmail.com'),
(16, 'poonam@hrreflections.com'),
(17, 'rajesh2.sharma@citi.com'),
(18, 'emceeshikha@gmail.com'),
(19, 'srinath2593@gmail.com'),
(20, 'kratikapoor@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ngu_client`
--

CREATE TABLE IF NOT EXISTS `ngu_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `ngu_client`
--

INSERT INTO `ngu_client` (`id`, `order`, `name`, `image`) VALUES
(1, 1, 'Tata-Sky', 'Tata-Sky.png'),
(2, 2, 'DHLGlobalForwarding', 'DHLGlobalForwarding.png'),
(3, 3, 'ABFSG', 'ABFSG.png'),
(4, 4, 'Loreal-India', 'Loreal-India.png'),
(5, 5, 'Aditya-Birla-Nuvo', 'Aditya-Birla-Nuvo.png'),
(6, 6, 'Housing', 'Housing.png'),
(7, 7, 'Flipkart', 'Flipkart.png'),
(8, 8, 'Shoppers Stop', 'Shoppers-Stop.png'),
(9, 9, 'Maxus', 'Maxus.png'),
(10, 10, 'Reliance-Brands-Limited', 'Reliance-Brands-Limited.png'),
(11, 11, 'Indus-Towers', 'Indus-Towers.png'),
(15, 12, 'Accenture', 'Accenture.png'),
(16, 13, 'Star-Plus', 'Star-Plus.png'),
(17, 14, 'HDFC-Home-Loans', 'HDFC-Home-Loans.png'),
(18, 15, 'Reliance', 'Reliance.png'),
(19, 16, 'ICICI-Prudential', 'ICICI-Prudential.png'),
(20, 17, 'Max-Bupa', 'Max-Bupa.png'),
(21, 18, 'DHL', 'DHL.png'),
(22, 19, 'EMC2', 'EMC2.png'),
(23, 20, 'Timberland', 'Timberland.png'),
(24, 21, 'Groupm', 'Groupm.png'),
(25, 22, 'Hamleys', 'Hamleys.png'),
(26, 23, 'Minda', 'Minda.png'),
(27, 24, 'Barclays', 'Barclays.png'),
(28, 25, 'Cogitate', 'Cogitate.png'),
(29, 26, 'Hypercity', 'Hypercity.png'),
(30, 27, 'CWD', 'CWD.png'),
(31, 28, 'Novo-Nordisk', 'Novo-Nordisk.png'),
(32, 29, 'Infradebt', 'Infradebt.png'),
(33, 30, 'ARM', 'ARM.png'),
(34, 31, 'IMT', 'IMT.png'),
(35, 32, 'Godrej-Properties', 'Godrej-Properties.png'),
(36, 33, 'TRAAIN', 'TRAAIN.png'),
(37, 34, 'JP-Morgan', 'JP-Morgan.png'),
(38, 35, 'Marsh', 'Marsh.png'),
(39, 36, 'PepsiCo', 'PepsiCo.png'),
(40, 37, 'KPMG', 'KPMG.png'),
(41, 38, 'Oracle', 'Oracle.png'),
(42, 39, 'NAB', 'NAB.png'),
(43, 40, 'Quintiles', 'Quintiles.png'),
(44, 41, 'RGA', 'RGA.png'),
(45, 42, 'VVF', 'VVF.png'),
(46, 43, 'Ingram-Micro', 'Ingram-Micro.png'),
(47, 44, 'Pantaloons', 'Pantaloons.png'),
(48, 45, 'Tata-Teleservices-Limited', 'Tata-Teleservices-Limited.png'),
(49, 46, 'Tata-Docomo', 'Tata-Docomo.png'),
(50, 47, 'Phoenix-ARC', 'Phoenix-ARC.png'),
(51, 48, 'SBI-Life-Insurance', 'SBI-Life-Insurance.png'),
(52, 49, 'DHFL_Brand_Logo', 'DHFL_Brand_Logo.png'),
(53, 50, 'NISOS', 'NISOS.png'),
(54, 51, 'JumboKing', 'JumboKing.png'),
(55, 52, 'Raymonds', 'Raymonds.png'),
(56, 53, 'Castrol', 'Castrol.png'),
(57, 54, 'Shemaroo', 'Shemaroo.png'),
(58, 55, 'ESPN', 'ESPN.png'),
(59, 56, 'IndiaFirst', 'IndiaFirst.png'),
(60, 57, 'RBL-bank', 'RBL-bank.png'),
(61, 58, 'Grand Resource Factory', 'grp.png'),
(68, 59, 'Practo', 'practo.png'),
(69, 60, 'Times Group', 'Times-Group-Logo-140x140.jpg'),
(70, 61, 'ATOM', 'Atom_Logo.jpg'),
(71, 62, 'HiCare', 'HiCare.jpg'),
(72, 63, 'Nodd', 'Nodd1.jpg'),
(73, 64, 'Bajaj Allianz', 'Bajaj_Allianz.jpg'),
(74, 65, 'Pfizer', 'Pfizer1.jpg'),
(75, 66, 'SUD Life Insurance', 'SUD_Life_Insurance.jpg'),
(76, 67, 'Kotak Life Insurance', 'Kotak_Life_Insurance.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ngu_media`
--

CREATE TABLE IF NOT EXISTS `ngu_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `ngu_media`
--

INSERT INTO `ngu_media` (`id`, `order`, `name`, `image`) VALUES
(1, 1, 'economic', 'economic.png'),
(2, 2, 'people-matters', 'people-matters.png'),
(4, 3, 'shrmLogo', 'shrmLogo.png'),
(5, 4, 'hr-com-logo', 'hr-com-logo.png'),
(6, 5, 'outlook', 'outlook.png'),
(7, 6, 'timesjobs', 'timesjobs.png'),
(8, 7, 'YourStory', 'YourStory.png'),
(9, 8, 'business-standard-logo', 'business-standard-logo.png'),
(10, 9, 'indian-express', 'indain-express.png'),
(11, 10, 'social-samosa', 'social-samosa.png'),
(12, 11, 'Lokmat', 'Lokmat.png'),
(13, 12, 'midday', 'midday.png'),
(14, 13, 'Entrepreneur', 'Entrepreneur.png');

-- --------------------------------------------------------

--
-- Table structure for table `ngu_testimonial`
--

CREATE TABLE IF NOT EXISTS `ngu_testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `testimonial` text NOT NULL,
  `designation` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ngu_testimonial`
--

INSERT INTO `ngu_testimonial` (`id`, `name`, `testimonial`, `designation`, `company`) VALUES
(1, 'Kartik Sharma,', '<p>The Never Grow Up &reg; team is a highly motivated &amp; a passionate team always willing to go the extra mile to solve problems. They listen to problems very carefully and come up with break through solutions. Maxus has been working with them for more than five years and they are our key partners. What I like about them is their frank opinions &amp; willingness to speak their mind &amp; not hide behind words. They are a big asset to anyone considering working with them. Just go ahead.</p>', 'Managing Director,', 'South Asia, Maxus.'),
(2, 'BVM Rao,', '<p>The team at Never Grow Up &reg; has been associated as Employee Engagement partners with Shoppers Stop for some time now managing a host of activities and initiatives that have helped create a positive impact. We have found their team to be creative, optimistic and dedicated to the task at hand. Key ideas presented and executed by them have also got us recognition in industry forums and have been well appreciated across the company. Would be happy to recommend Never Grow Up and look forward to a long and healthy association.</p>', 'Customer Care Associate & Head,', 'Human Resources, Shoppers Stop Ltd.'),
(3, 'Apoorva Vig', '<p>It''s been an absolute pleasure to have been associated with Never Grow Up &reg;. I''ve had the opportunity to see this team working with various groups in our organisation across levels. Every time, they''ve done something unique, whacky and creative. And the good thing is that everything is linked back to the business/organisation objective in a rather interesting way. All the best and never grow up because that''s your USP.</p>', 'Talent Partner  Digital,', 'Lead-Engagement and Fulfilment, GroupM.'),
(4, 'Rahul Nayar', '<p>Never Grow Up &reg; is an apt brand name. I would say so since the team never grows up! And that is the best part about the entire team. They have such explosive ideas that can wrap your mind into a whirlpool of thoughts that you would be thinking what to choose from and how exciting this would turn out to be for your organization. There have been quite a few programs that we have been doing with Never Grow Up on the employee engagement front, Shoppers Stop I Pledge event &amp; SSL Radio mainly. Great to have them as a business partner.</p>', 'Training Head,', 'Shoppers Stop Limited.'),
(5, 'Anju Jumde', '<p>We were struggling to get all that we wanted in one shot. With no time left in hand to plan, it was only Never Grow Up &reg; who made it possible. Arranging for various activities, training, coaching and workshops all in a day''s offsite for the leadership team. Unbelievable and that too within my budget! Hats off to them and their creativity! You guys rock! I am confident you are on the right track. Top qualities: Great Results, Good Value, On Time.</p>', 'Training Head,', 'Barclays Bank'),
(6, 'Sumeet Khutale', '<p>Never Grow Up &reg; has worked with us more than once and every time have left us delighted &amp; positively surprised! His team is extremely creative and the ideas they generate are unheard of. Their expertise can be evaluated from the fact that they have worked across the spectrum, right from training the Top Management of Investment Bank to organizing an event for Kids and families and delighting the audience from both the segments. I wish them all the best for his successful journey towards creating a new concept in India! Top Qualities: Great Results, Expert &amp; Creative.</p>', 'Vice President,', 'J P Morgan'),
(7, 'Sumita Sahu', '<p>Am falling short of adjectives to describe Never Grow Up &reg;. The word impossible doesn&rsquo;t exist in their dictionary and that&rsquo;s what I like the most about them. Life is sorted when you have them. NGU Rocks!</p>', 'Manager Human Resources,', 'Reliance Capital'),
(8, 'Binny Mathen', '<p>I have known Never Grow Up &reg; since 2010. The team has a bunch of crazy guys who come up with these weird ideas which ultimately become a super hit with employees. A bunch of dedicated team members who work like there is no tomorrow all set to meet their deadlines. It''s a fun organization and it ensures that the organizations that they deal with also have a fun element in their engagement activities. They are the creators of great ideas who ensure that the child in you never dies. I thank God for Never Grow Up!</p>', 'Customer Care Associate & Manager Human Resources,', 'Crossword Bookstores Ltd.'),
(9, 'Seema Padman', '<p>Great fun, kept energy levels despite being the graveyard session (post lunch). It was very well structured with lessons, practice and a competition. I''d be happy to refer you to other organizations.<br /><br /></p>', 'Director HR Asia,', 'ARM');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Disable'),
(2, 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `name`, `logo`) VALUES
(1, 'NGU', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `billingaddress` text NOT NULL,
  `billingcity` varchar(255) NOT NULL,
  `billingstate` varchar(255) NOT NULL,
  `billingcountry` varchar(255) NOT NULL,
  `billingcontact` varchar(255) NOT NULL,
  `billingpincode` varchar(255) NOT NULL,
  `shippingaddress` text NOT NULL,
  `shippingcity` varchar(255) NOT NULL,
  `shippingcountry` varchar(255) NOT NULL,
  `shippingstate` varchar(255) NOT NULL,
  `shippingpincode` varchar(255) NOT NULL,
  `shippingname` varchar(255) NOT NULL,
  `shippingcontact` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `registrationno` varchar(255) NOT NULL,
  `vatnumber` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `firstname`, `lastname`, `phone`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `billingcontact`, `billingpincode`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `shippingname`, `shippingcontact`, `currency`, `credit`, `companyname`, `registrationno`, `vatnumber`, `country`, `fax`, `gender`, `facebook`, `google`, `twitter`, `street`, `address`, `dob`, `city`, `state`, `pincode`) VALUES
(1, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '0000-00-00 00:00:00', 1, 'images_(2)1.jpg', '', '', 'Email', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '0000-00-00', '', '', ''),
(2, 'NGU', '26422c7fbbafc1ee84a6537266ad15d6', 'info@willnevergrowup.com', 1, '2016-03-23 10:23:29', 1, '', '', '', 'Email', '0', 'NGU', 'NGU', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `onuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `status`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
