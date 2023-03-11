-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2019 at 11:24 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `national`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_main`
--

CREATE TABLE `about_main` (
  `id` int(255) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `title_PT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_PT` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_main`
--

INSERT INTO `about_main` (`id`, `title`, `title_PT`, `icon`, `content`, `content_PT`) VALUES
(1, 'Get everything you need to pick the right Agent', 'احصل على كل ما تحتاجه لاختيار الوكيل المناسب', '1', '', ''),
(2, 'Mission', 'missão', 'fa-building', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500, quando uma impressora desconhecida pegou uma galera do tipo e a mexeu para fazer um livro de espécimes'),
(3, 'vision', 'vissão', 'fa-address-card', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500, quando uma impressora desconhecida pegou uma galera do tipo e a mexeu para fazer um livro de espécimes'),
(4, 'Vales', 'valores', 'fa-building', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500, quando uma impressora desconhecida pegou uma galera do tipo e a mexeu para fazer um livro de espécimes');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `role` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_ar` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `face` text COLLATE utf8mb4_unicode_ci,
  `twit` text COLLATE utf8mb4_unicode_ci,
  `google` text COLLATE utf8mb4_unicode_ci,
  `in` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `name_ar`, `description`, `description_ar`, `image`, `role`, `role_ar`, `face`, `twit`, `google`, `in`) VALUES
(1, 'Mariana Noe', 'ماريان نوح', 'Lorem Ipsum has been the industry\'s standard since the 1600s', 'وكان أبجد هوز مستوى هذه الصناعة منذ 1600s في', '1.jpg', 'Agent Vip', 'عميل VIP', NULL, 'http:\\\\twitter.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(255) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(255) DEFAULT NULL,
  `visits` int(255) UNSIGNED NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title_PT` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdesc_PT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_PT` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `sdesc`, `content`, `category`, `visits`, `date`, `title_PT`, `sdesc_PT`, `content_PT`) VALUES
(9, 'New Blog By Developer.', '9.png', 'Just Try', '<p>Hi This is Trying Editor with Image:<img alt=\"\" src=\"http://127.0.0.1:8000/images/upload/j5iHjZv8j0KYTzIphxz63riFnhy6nryi.jpg\" style=\"height:70px; width:100px\" /></p>\r\n\r\n<p>That&#39;s&nbsp;<span style=\"color:#c0392b\">Funny</span></p>', 7, 26, '2019-03-05 16:59:37', 'Novo blog do desenvolvedor.', 'Apenas tente', '<pre>\r\n<img alt=\"\" src=\"http://localhost:8000/images/upload/vD03Fu7lxL3nbqKoa1GzuO9B8EWeGrjI.png\" style=\"height:100px; width:370px\" />Oi, este &eacute; o Editor do Trying with Image</pre>\r\n\r\n<pre>\r\n\r\n&nbsp;</pre>');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(255) NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `name`) VALUES
(7, 'First Category.');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(255) NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog` int(255) NOT NULL,
  `seen` int(1) NOT NULL,
  `approve` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `name`, `email`, `comment`, `blog`, `seen`, `approve`, `date`) VALUES
(1, 'Ahmed Magdy', 'admin@touch.com', 'Comment 1', 9, 1, 1, '2019-03-05 18:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(255) UNSIGNED NOT NULL,
  `url` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `url`, `image`) VALUES
(1, 'https://www.almarai.com/', '1.jpg'),
(2, 'https://www.7days.com/en', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comp_profile`
--

CREATE TABLE `comp_profile` (
  `id` int(255) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content_ar` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comp_profile`
--

INSERT INTO `comp_profile` (`id`, `title`, `title_ar`, `icon`, `content`, `content_ar`) VALUES
(1, 'We accomplished many prestigious projects in that past and hereunder some reference projects of our works:-', 'لقد أنجزنا العديد من المشاريع المرموقة في ذلك الماضي ، وفيما يلي بعض المشاريع المرجعية لأعمالنا: -', '1', '', ''),
(2, 'Almarai Juice Plant', 'مصنع عصير المراعي', 'fa-building', 'at Alkharj (scope: MV & LV package supply, automation, installation, testing & commissioning).', 'في الخرج (النطاق: العرض والجهد الآلي ، التركيب ، الاختبار والتشغيل).'),
(3, 'Alnakheel Farm', 'مزرعة النخيل', 'fa-magic', '(scope: 33kv UG cable cutout, surge arrestors supply installation, testing & commissioning).', '(نطاق: 33KV UG كابل انقطاع ، وتوريد surge مانعات التثبيت ، والاختبار والتكليف).'),
(4, 'APD Processing Plant PPP2', 'APD Processing Plant PPP2', 'fa-gavel', 'Almarai Company ( Supply , installation , testing and commissioning of extensible ring main units and dry type transformers and battery and battery charger and spare parts).', 'شركة المراعي (توريد وتركيب واختبار وتشغيل وحدات الحلقة الرئيسية القابلة للامتداد ومحولات النوع الجاف وشاحن البطارية والبطارية وقطع الغيار).');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(1) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_PT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `content`, `content_PT`, `map`) VALUES
(1, 'Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis,Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla mollis dapibus nunc, ut rhoncus turpis sodales quis. Integer sit amet mattis quam', 'تواصل معنا الان للحصول على دعم كامل', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100949.24429313939!2d-122.44206553967531!3d37.75102885910819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1472190196783');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `qus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qus_PT` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_PT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(100) NOT NULL,
  `element` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `element`, `value`) VALUES
(1, 'phone', '+01234 5678'),
(2, 'address', 'Nasr City, Cairo'),
(3, 'email', 'info@example.com'),
(4, 'fax', '+12 534894364'),
(5, 'face', 'https://www.facebook.com/'),
(6, 'twit', NULL),
(7, 'youtube', NULL),
(8, 'in', NULL),
(9, 'address_PT', 'مدينة نصر , القاهرة'),
(10, 'logo', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE `health` (
  `id` int(1) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `health`
--

INSERT INTO `health` (`id`, `content`, `content_ar`, `image`) VALUES
(1, 'Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis', 'الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. وثيقة الهوية الوحيدة Ullamcorper الحاضر القبيح', 'hel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(255) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(5) NOT NULL,
  `font` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `content`, `content_ar`, `year`, `font`) VALUES
(1, 'We undertake Electrical and Mechanical Installation works with a leading suppliers including:', 'نقوم بتنفيذ أعمال التركيبات الكهربائية والميكانيكية مع موردين رائدين بما في ذلك:', 1, 'Company History'),
(2, 'slider.jpg', '', 0, 'تاريخ الشركة'),
(3, 'Schneider Electric KSA – MV & LV Switchgears, RMUs, Metering panels, Oil & Dry type transformers, LV Bus ways, SCADA system, UPS’s, Capacitor banks', 'شنايدر إلكتريك المملكة العربية السعودية - MV & LV Switchgears، RMUs، لوحات القياس، محولات الزيت و النوع الجاف، LV Bus bus، SCADA system، UPS\'s، Capacitor banks', 2002, 'fa-bell'),
(5, '33Kv/13.8Kv Electrical Substations- Schneider', '33Kv / 13.8Kv محطات كهربائية فرعية - شنايدر', 2004, 'fa-power-off');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(255) NOT NULL,
  `icon` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `icon`) VALUES
(1, 'fa-address-book'),
(2, 'fa-address-book-o'),
(3, 'fa-address-card'),
(4, 'fa-address-card-o'),
(5, 'fa-adjust'),
(7, 'fa-anchor'),
(8, 'fa-anchor'),
(9, 'fa-archive'),
(10, 'fa-area-chart'),
(11, 'fa-arrows'),
(12, 'fa-arrows-h'),
(13, 'fa-arrows-v'),
(14, 'fa-asl-interpreting'),
(15, 'fa-asterisk'),
(16, 'fa-at'),
(17, 'fa-automobile'),
(18, 'fa-balance-scale'),
(19, 'fa-ban'),
(20, 'fa-bank'),
(21, 'fa-bar-chart'),
(22, 'fa-bars'),
(23, 'fa-bath'),
(24, 'fa-battery-0'),
(25, 'fa-battery-1'),
(26, 'fa-battery-2'),
(27, 'fa-battery-3'),
(28, 'fa-battery-4'),
(29, 'fa-bed'),
(30, 'fa-beer'),
(31, 'fa-bell'),
(32, 'fa-bell-o'),
(33, 'fa-bell-slash'),
(34, 'fa-bicycle'),
(35, 'fa-binoculars'),
(36, 'fa-birthday-cake'),
(37, 'fa-blind'),
(38, 'fa-bolt'),
(39, 'fa-bomb'),
(40, 'fa fa-book'),
(41, 'fa-bookmark'),
(42, 'fa-briefcase'),
(43, 'fa-bug'),
(44, 'fa fa-building'),
(45, 'fa-bullhorn'),
(46, 'fa-bullseye'),
(47, 'fa-bus'),
(48, 'fa-calendar'),
(49, 'fa-camera'),
(50, 'fa-cart-arrow-down'),
(51, 'fa-check'),
(52, 'fa-child'),
(53, 'fa-clock-o'),
(54, 'fa-cloud'),
(55, 'fa-coffee'),
(56, 'fa-cog'),
(57, 'fa-comment'),
(58, 'fa-comments'),
(59, 'fa-credit-card'),
(60, 'fa-credit-card-alt'),
(61, 'fa-crosshairs'),
(62, 'fa-cube'),
(63, 'fa-cutlery'),
(64, 'fa-database'),
(65, 'fa-deaf'),
(66, 'fa-diamond'),
(67, 'fa-drivers-license'),
(68, 'fa-edit'),
(69, 'fa-envelope'),
(70, 'fa-exclamation-circle'),
(71, 'fa-exclamation-triangle'),
(72, 'fa-eye'),
(73, 'fa-female'),
(74, 'fa-folder'),
(75, 'fa-gamepad'),
(76, 'fa-graduation-cap'),
(77, 'fa-handshake-o'),
(78, 'fa-heart'),
(79, 'fa-home'),
(80, 'fa-inbox'),
(81, 'fa-key'),
(82, 'fa-leaf'),
(83, 'fa-line-chart'),
(84, 'a-location-arrow'),
(85, 'fa-lock'),
(86, 'fa-magnet'),
(87, 'fa-map-marker'),
(88, 'fa-money'),
(89, 'fa-motorcycle'),
(90, 'fa-phone'),
(91, 'fa-plane'),
(92, 'fa-compress'),
(93, 'fa-power-off'),
(94, 'fa-server'),
(103, 'fa-share-alt'),
(104, 'fa-shield'),
(105, 'fa-shower'),
(106, 'fa-signal'),
(107, 'fa-sliders'),
(108, 'fa-smile-o'),
(109, 'fa-soccer-ball-o'),
(110, 'fa-snowflake-o'),
(111, 'fa-sticky-note'),
(112, 'fa-suitcase'),
(113, 'fa-tachometer'),
(114, 'fa-thermometer'),
(115, 'fa-thumbs-down'),
(116, 'fa-thumbs-o-up'),
(117, 'fa-ticket'),
(118, 'fa-times-circle'),
(119, 'fa-trash'),
(120, 'fa-tree'),
(121, 'fa-trophy'),
(122, 'fa-umbrella'),
(123, 'fa-unlock'),
(124, 'fa-user-circle'),
(125, 'fa-volume-down'),
(126, 'fa-volume-up'),
(127, 'fa-wheelchair'),
(128, 'fa-wifi'),
(129, 'fa-wrench'),
(130, 'fa-align-center'),
(131, 'fa-align-justify'),
(132, 'fa-align-left'),
(133, 'fa-align-right'),
(134, 'fa-chain'),
(135, 'fa-cc-visa'),
(136, 'fa-stethoscope'),
(137, 'fa-facebook-official'),
(138, 'fa-google-plus-official'),
(139, 'fa-user-secret'),
(140, 'fa-magic'),
(141, 'fa-gavel'),
(142, 'fa-building');

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `id` int(2) NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_PT` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_PT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `background` text COLLATE utf8mb4_unicode_ci,
  `show` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`id`, `title`, `title_PT`, `content`, `content_PT`, `image`, `background`, `show`) VALUES
(1, 'Group national', 'Nacional Gropu', 'is one of the leading electro mechanical contractors in KSA with its established sister company in Egypt', 'is one of the leading electro mechanical contractors in KSA with its established sister company in Egypt', 'Main.jpg', 'banner.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(255) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `link`) VALUES
(1, 'Location City', 'Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis.'),
(2, 'موقع المدينة\r\n', 'الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. وثيقة الهوية الوحيدة Ullamcorper الحاضر القبيح\r\n'),
(3, 'صورة الواقعة', 'https://www.youtube.com/embed/_e7siZf37x4');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `email`, `subject`, `seen`, `message`) VALUES
(1, 'Ahmed Magdy', '+01234 5678', 'h.dabour252@yahoo.com', 'home directory', 1, 'Where is The Developer of this site ?'),
(2, 'Islam', '01450505060', 'islam123123@bla.com', 'new test', 1, 'This My Test');

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

CREATE TABLE `mission` (
  `id` int(1) NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `show` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mission`
--

INSERT INTO `mission` (`id`, `title`, `title_ar`, `content`, `content_ar`, `video`, `show`) VALUES
(1, 'Mission Statement', 'بيان المهمة', 'EBEM deliver state-of-the-art design, installation, testing & commissioning and support to meet all your electro mechanical needs. We provide clients with experience, quality, dedication, and professionalism and as a result have become a leader in providing electro mechanical services to our clients.\r\n<br>\r\nInteger sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis.', 'تقدم شركة EBEM أحدث تصميم وتركيب واختبار وتشغيل ودعم لتلبية جميع احتياجاتك الميكانيكية والكهربائية. نحن نوفر لعملائنا الخبرة والجودة والتفاني والمهنية ، ونتيجة لذلك أصبحنا روادًا في تقديم الخدمات الميكانيكية الكهربائية لعملائنا.\r\n<BR>\r\nعدد صحيح الجلوس امات ماتس quam ، يجلس اميت ultricies velit. Praesent ullamcorper dui turpis.', 'https://www.youtube.com/embed/vQWlNALvbhE?controls=0&amp;start=20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(255) UNSIGNED NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'h.dabour25@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(255) UNSIGNED NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_ar` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el1` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el2` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el3` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el4` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el1ar` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el2ar` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el3ar` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el4ar` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `el1con` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el2con` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el3con` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el4con` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el1conar` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el2conar` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el3conar` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `el4conar` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `by` int(255) UNSIGNED NOT NULL DEFAULT '0',
  `image` text COLLATE utf8mb4_unicode_ci,
  `time` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_ar` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float(20,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `title_ar`, `address`, `address_ar`, `el1`, `el2`, `el3`, `el4`, `el1ar`, `el2ar`, `el3ar`, `el4ar`, `content`, `content_ar`, `el1con`, `el2con`, `el3con`, `el4con`, `el1conar`, `el2conar`, `el3conar`, `el4conar`, `by`, `image`, `time`, `time_ar`, `price`) VALUES
(1, 'Project 1', 'مشروع 1', 'hadayq elmaadi', 'حدائق المعادى', '2 Apartments', '4 Floors', 'Sq Ft:3400', '2 Garages', '2 مبنى', '4 طوابق', 'مساحة : 3400', '2 جراج', 'Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis.', 'الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة. الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. وثيقة الهوية الوحيدة Ullamcorper الحاضر القبيح', 'Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis.', 'Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis.', 'Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis.', 'Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis.', 'الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة.', 'الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة.', 'الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة.', 'الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة.', 0, '1.jpg', '6 years ago', 'منذ 6 اعوام', 150.900);

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` int(1) NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `show` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `title`, `title_ar`, `content`, `content_ar`, `image`, `show`) VALUES
(1, 'This is Our Responsibility To Give Good Property.', 'هذه هي مسؤوليتنا لإعطاء الملكية جيدة.', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla mollis dapibus nunc, ut rhoncus turpis sodales quis.Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis.\r\nInteger sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis.', 'قبل تعيين كرة السلة الأولى من فكي الحزن والرعاية السريرية. لا البروتين لينة الآن، كأعضاء الجزر البرتقالي القبيح quis.Integer والكثير، الكثير ultricies يريد. Ullamcorper دوى الحالي قبيحة.\r\nالجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة.', 'response.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stat`
--

CREATE TABLE `stat` (
  `id` int(255) UNSIGNED NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stat`
--

INSERT INTO `stat` (`id`, `title`, `title_ar`, `num`) VALUES
(1, 'Support', 'الدعم', 1150),
(2, 'Happy Hours', 'ساعات السعادة', 1700),
(3, 'Trusted Agents', 'ثقة العملاء', 11900),
(4, 'Cups of Coffee', 'كؤوس القهوة', 157);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `role` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_ar` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `face` text COLLATE utf8mb4_unicode_ci,
  `twit` text COLLATE utf8mb4_unicode_ci,
  `google` text COLLATE utf8mb4_unicode_ci,
  `in` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `name_ar`, `description`, `description_ar`, `image`, `role`, `role_ar`, `face`, `twit`, `google`, `in`) VALUES
(2, 'Dr. Aly Ahmed Osman', 'د. على احمد عثمان', 'Chairman Board of Directors Energy Bridges for Electro Mechanics', 'رئيس مجلس الإدارة جسور الطاقة لميكانيكا الكهرباء', '2.jpg', 'CEO', 'المدير التنفيذي', 'https://www.facebook.com/', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tistimonials`
--

CREATE TABLE `tistimonials` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_PT` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_PT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_PT` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tistimonials`
--

INSERT INTO `tistimonials` (`id`, `name`, `name_PT`, `image`, `content`, `content_PT`, `company`, `company_PT`) VALUES
(1, 'ADAM STER', 'آدم ستير', '1.jpg', 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod possimus, omnis voluptas.Integer sit amet mattis quam, sit amet ultricies velit', 'لوقت فراغك، وأنها مستقلة بالنسبة لنا هو ما قد نكون قادرين على اختيار غير مقيد، وعندما لا شيء يمنع لم يكن الأمر كذلك، فإن voluptas.Integer كله الجلوس امات ماتيس quam، والجلوس امات ultricies velit', 'Company Name', 'إسم الشركة');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`) VALUES
(1, 'admin@touch.com', '$2y$10$KdW1SQkF8IvcgJQgGKoUmOhrepVvZha1tbDPqS/2HoiJna.RAq4FW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wedo`
--

CREATE TABLE `wedo` (
  `id` int(255) NOT NULL,
  `qus` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qus_PT` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_PT` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wedo`
--

INSERT INTO `wedo` (`id`, `qus`, `qus_PT`, `answer`, `answer_PT`) VALUES
(1, 'Our Featured Service', 'لدينا خدمة مميزة', 'wedo.jpg', ''),
(2, 'For Renters', 'للإيجار', 'Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis.', 'الجلوس الصحيح امات ماتيس quam، والجلوس امات ultricies velit. Ullamcorper دوى الحالي قبيحة.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_main`
--
ALTER TABLE `about_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comp_profile`
--
ALTER TABLE `comp_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stat`
--
ALTER TABLE `stat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tistimonials`
--
ALTER TABLE `tistimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedo`
--
ALTER TABLE `wedo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_main`
--
ALTER TABLE `about_main`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comp_profile`
--
ALTER TABLE `comp_profile`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `health`
--
ALTER TABLE `health`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mission`
--
ALTER TABLE `mission`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stat`
--
ALTER TABLE `stat`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tistimonials`
--
ALTER TABLE `tistimonials`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wedo`
--
ALTER TABLE `wedo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
