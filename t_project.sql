-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 03:25 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `t_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin`, `pass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `time_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `service_type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `pay_type` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `service_id`, `customer_id`, `staff_id`, `booking_date`, `time_id`, `price`, `service_type`, `status`, `pay_type`, `created_at`) VALUES
(26, 34, 4, 1, '2020-12-01', 6, 3000, 1, 0, 0, '2020-11-30 12:20:50'),
(27, 27, 4, 9, '2020-12-03', 1, 1200, 2, 0, 0, '2020-11-30 12:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `quentity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `customer_id`, `session_id`, `quentity`, `price`) VALUES
(121, 7, 4, '3rl2h69o20kpcf135q1pmdj71p', 1, 1000),
(122, 2, 4, '3rl2h69o20kpcf135q1pmdj71p', 1, 600);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(2, 'tamim', 'tamim@mail.com', 'tamim', 'this is mail'),
(3, 'tamim', 'tamim@mail.com', 'tamim', 'this is mail');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(244) NOT NULL,
  `phone` varchar(244) NOT NULL,
  `address` text NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `email`, `phone`, `address`, `pass`) VALUES
(3, 'tamim hasan', 'hasan@mail.com', '34334545345', 'dhaka', '202cb962ac59075b964b07152d234b70'),
(4, 'tamim', 'tamim@mail.com', '2322343434', 'asfs sdsdf sdk', '202cb962ac59075b964b07152d234b70'),
(5, 'tamim', 'tamim@fk.com', '4454545', 'dhaka', '202cb962ac59075b964b07152d234b70'),
(6, 'tamim2', 'tamim2@mail.com', '0334345', 'dhaka', '202cb962ac59075b964b07152d234b70'),
(7, 'tamim3', 'tamim3@mail.com', '2343234', 'dhaka', '202cb962ac59075b964b07152d234b70'),
(8, 'tamim22', 'tamim11@mail.com', '3434343', 'Dhaka', '202cb962ac59075b964b07152d234b70'),
(9, 'Express', 'xdlinksads@gmail.com', '457855', '45555', 'f42c7f9c8aeab0fc412031e192e2119d');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `feedback_type` int(11) NOT NULL,
  `staff_or_product_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `customer_id`, `feedback_type`, `staff_or_product_id`, `details`, `rating`, `created_at`, `status`) VALUES
(1, 5, 1, 1, 'Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Cupiditate, odit molestias quod, perspiciatis explicabo dolores dolorum. Doloribus, nam, nemo. Assumenda nulla, adipisci laudantium accusamus reiciendis harum qui consequuntur mollitia nemo.', 3, '2020-11-08 11:55:15', 0),
(2, 5, 1, 1, 'Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Cupiditate, odit molestias quod, perspiciatis explicabo dolores dolorum. Doloribus, nam, nemo. Assumenda nulla, adipisci laudantium accusamus reiciendis harum qui consequuntur mollitia nemo.', 4, '2020-11-08 11:55:48', 0),
(3, 5, 2, 10, 'this is test message', 5, '2020-11-08 13:18:41', 0),
(4, 5, 2, 10, 'this is testing', 1, '2020-11-08 13:25:15', 0),
(5, 4, 2, 4, 'this is good product', 3, '2020-11-15 14:27:24', 0),
(6, 8, 2, 10, 'good service', 5, '2020-11-15 17:23:29', 0),
(7, 8, 2, 9, 'awesome prodcut', 4, '2020-11-15 17:23:51', 0),
(8, 8, 1, 12, 'awesome recommended to every one', 2, '2020-11-15 17:24:53', 0),
(9, 4, 2, 10, 'This is With Rating', 4, '2020-11-19 02:16:36', 0),
(10, 4, 2, 10, 'This is With Rating', 4, '2020-11-19 02:18:57', 0),
(11, 4, 2, 10, 'this is another test', 4, '2020-11-19 03:02:10', 0),
(12, 4, 2, 10, 'this is 5 star', 5, '2020-11-19 03:02:40', 0),
(13, 4, 2, 10, 'this is 5 star', 5, '2020-11-19 03:03:11', 0),
(14, 4, 2, 10, 'this is 5 star', 5, '2020-11-19 03:03:13', 0),
(15, 4, 1, 1, 'Rating for good Review', 2, '2020-11-19 03:55:48', 0),
(16, 4, 1, 9, 'hi this is first ', 4, '2020-11-19 07:11:43', 0),
(17, 4, 1, 9, 'hi this is first ', 4, '2020-11-19 07:13:01', 0),
(18, 4, 1, 9, 'hi this is first ', 4, '2020-11-19 07:13:05', 0),
(19, 4, 1, 9, 'hi this is first ', 4, '2020-11-19 07:13:38', 0),
(20, 4, 1, 9, 'hi this is first ', 4, '2020-11-19 07:14:53', 0),
(21, 4, 1, 9, 'hi this is first ', 4, '2020-11-19 07:15:06', 0),
(22, 4, 1, 9, 'hi this is first ', 4, '2020-11-19 07:15:54', 0),
(23, 4, 1, 9, 'hi this is first ', 4, '2020-11-19 07:16:53', 0),
(24, 4, 1, 9, 'This is new', 5, '2020-11-19 07:17:13', 0),
(25, 4, 1, 9, 'This is new', 5, '2020-11-19 07:18:34', 0),
(26, 4, 1, 9, 'This is new', 5, '2020-11-19 07:19:28', 0),
(27, 4, 1, 9, 'This is new', 5, '2020-11-19 07:52:29', 0),
(28, 4, 1, 9, 'This is new', 5, '2020-11-19 07:55:36', 0),
(29, 4, 1, 9, 'This is new', 5, '2020-11-19 07:56:41', 0),
(30, 4, 1, 9, 'This is new', 5, '2020-11-19 08:04:32', 0),
(31, 4, 1, 9, 'This is new', 5, '2020-11-19 08:04:52', 0),
(32, 4, 1, 9, 'This is new', 5, '2020-11-19 08:05:05', 0),
(33, 4, 1, 9, 'This is new', 5, '2020-11-19 08:06:31', 0),
(34, 4, 1, 9, 'This is new', 5, '2020-11-19 08:07:07', 0),
(35, 4, 1, 9, 'This is new', 5, '2020-11-19 08:12:12', 0),
(36, 4, 1, 9, 'This is new', 5, '2020-11-19 08:14:33', 0),
(37, 3, 2, 1, 'Wow This is fantastic Product, I ever seen.', 4, '2020-11-21 12:45:54', 0),
(38, 3, 2, 2, 'Good Product', 5, '2020-11-21 12:54:41', 0),
(39, 3, 2, 3, 'This is recent rating for product', 5, '2020-11-22 05:29:36', 0),
(40, 4, 1, 13, 'wow. He is Fantastic at Service', 5, '2020-11-22 05:40:50', 0),
(41, 4, 2, 33, 'WOW product', 5, '2020-11-30 09:44:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quentity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `product_id`, `customer_id`, `quentity`, `price`, `status`, `created_at`) VALUES
(31, 9, 4, 1, 120, 2, '2020-11-15 16:23:32'),
(32, 8, 4, 1, 170, 2, '2020-11-15 16:23:32'),
(33, 10, 3, 1, 130, 2, '2020-11-15 16:24:16'),
(34, 9, 3, 1, 120, 2, '2020-11-15 16:24:16'),
(35, 8, 3, 1, 170, 2, '2020-11-15 16:24:16'),
(36, 9, 4, 1, 120, 2, '2020-11-15 17:07:54'),
(37, 8, 4, 1, 170, 1, '2020-11-15 17:07:54'),
(38, 10, 4, 1, 130, 1, '2020-11-15 17:07:54'),
(39, 8, 4, 1, 170, 1, '2020-11-15 17:07:54'),
(40, 9, 4, 1, 120, 1, '2020-11-15 17:08:32'),
(41, 8, 4, 1, 170, 1, '2020-11-15 17:08:32'),
(42, 10, 4, 1, 130, 1, '2020-11-15 17:08:32'),
(43, 8, 4, 1, 170, 1, '2020-11-15 17:08:32'),
(44, 10, 4, 1, 130, 1, '2020-11-15 17:08:32'),
(45, 9, 4, 1, 120, 1, '2020-11-15 17:08:32'),
(46, 9, 4, 1, 120, 1, '2020-11-15 17:09:10'),
(47, 8, 4, 1, 170, 2, '2020-11-15 17:09:10'),
(48, 4, 4, 1, 200, 2, '2020-11-15 17:09:10'),
(49, 10, 8, 1, 130, 2, '2020-11-15 17:20:17'),
(50, 9, 8, 1, 120, 1, '2020-11-15 17:20:17'),
(51, 10, 8, 1, 130, 1, '2020-11-15 17:21:00'),
(52, 9, 8, 1, 120, 1, '2020-11-15 17:21:00'),
(53, 10, 8, 1, 130, 1, '2020-11-15 17:21:00'),
(54, 9, 8, 1, 120, 1, '2020-11-15 17:21:00'),
(55, 8, 8, 1, 170, 2, '2020-11-15 17:21:01'),
(56, 2, 3, 1, 150, 1, '2020-11-21 05:04:10'),
(57, 2, 3, 1, 150, 2, '2020-11-21 05:05:32'),
(58, 2, 3, 1, 150, 1, '2020-11-21 05:24:06'),
(59, 2, 3, 1, 150, 1, '2020-11-21 05:25:14'),
(60, 2, 3, 1, 150, 1, '2020-11-21 05:25:37'),
(61, 2, 3, 1, 150, 1, '2020-11-21 05:26:18'),
(62, 2, 3, 1, 150, 1, '2020-11-21 05:30:34'),
(63, 2, 3, 1, 150, 1, '2020-11-21 05:31:03'),
(64, 4, 3, 1, 200, 1, '2020-11-21 05:31:03'),
(65, 2, 3, 1, 150, 1, '2020-11-21 05:33:37'),
(66, 4, 3, 1, 200, 1, '2020-11-21 05:33:37'),
(67, 2, 3, 1, 150, 1, '2020-11-21 05:34:29'),
(68, 4, 3, 1, 200, 1, '2020-11-21 05:34:29'),
(69, 2, 3, 1, 150, 2, '2020-11-21 05:34:51'),
(70, 4, 3, 1, 200, 2, '2020-11-21 05:34:51'),
(71, 2, 3, 1, 150, 2, '2020-11-21 05:35:10'),
(72, 4, 3, 1, 200, 1, '2020-11-21 05:35:10'),
(73, 2, 3, 1, 150, 1, '2020-11-21 05:37:16'),
(74, 4, 3, 1, 200, 1, '2020-11-21 05:37:16'),
(75, 2, 3, 1, 150, 1, '2020-11-21 05:38:57'),
(76, 4, 3, 1, 200, 1, '2020-11-21 05:38:57'),
(77, 2, 3, 1, 150, 1, '2020-11-21 06:15:45'),
(78, 4, 3, 1, 200, 1, '2020-11-21 06:15:45'),
(79, 2, 3, 1, 150, 1, '2020-11-21 06:24:00'),
(80, 4, 3, 1, 200, 1, '2020-11-21 06:24:00'),
(81, 2, 3, 3, 450, 1, '2020-11-21 06:33:59'),
(82, 3, 3, 3, 360, 1, '2020-11-21 06:36:23'),
(83, 1, 3, 1, 50, 1, '2020-11-21 12:45:05'),
(84, 33, 4, 1, 500, 1, '2020-11-30 09:43:44'),
(85, 3, 4, 2, 700, 1, '2020-11-30 09:58:28'),
(86, 1, 4, 2, 400, 1, '2020-11-30 10:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `quentity` int(11) NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `details`, `price`, `image`, `type`, `quentity`, `updated_time`) VALUES
(1, 'w7 Banana Dreams Loose Powder', 'Sleek design great for travel or on the go.\r\n  Tested by our team of expert makeup professionals for the best quality.\r\n    Why overpay when you can get the same quality for less.', '200', 'uploads/0ece2f99e9.png', 1, 9, '2020-10-30 08:51:02'),
(2, 'Jordana Sweet Cream Matte Liquid Lip', 'Give your lips some sugar, sweetie! Sweet Cream Matte Liquid Lip Color starts off as a liquid and melts into a velvety matte finish. Indulge in a light, creamy-whipped feel and dessert-rich shades like Cherry Cobbler and Red Velvet Cake. Infused with a drop of vitamin Aï¿½Sweet Cream Matte Liquid Lip Color keeps lips comfortable and never dry. Each tempting shade stays fresh on your lips for up to 16 hours. You just got one step closer to yum!', '600', 'uploads/fbf2deefb1.jpg', 1, 60, '2020-10-30 08:54:37'),
(3, 'Skin Cafe Sunscreen SPF 50 PA+++', 'All skin types\r\n    Light and mattifying\r\n    Non-comedogenic\r\n    UVB-UVA protection\r\n    Preventive anti-mark effect', '350', 'uploads/d12865e9c8.png', 1, 40, '2020-10-30 08:56:44'),
(4, 'The Body Shop Vitamin C Glow Boosting Moisturizer', 'The Body Shop Vitamin C Glow Boosting Moisturizer helps to increase shine on skin and remove many complexity & tiredness of skin. To get the best result you have to use this moisturizer on cleaning face.\r\n \r\nMade in UK', '200', 'uploads/8912d27245.jpg', 1, 60, '2020-10-30 09:00:30'),
(7, 'Breathe Easy Combo', '1. Ultrasonic Mesh Nebulizer\r\n2. LILAC Hand Sanitizer (3pcs)', '1000', 'uploads/af11c9c461.jpg', 1, 50, '2020-10-30 09:05:43'),
(8, 'Skin Cafe 100% Natural Essential Oil ï¿½ Lavender', 'Lavender oil of Skin cafe is a hundred percent natural essential oil taken out from the flowers of the lavender plant. Traditionally, it was used to make perfume. However, now Lavender essential oil is used in numerous ways such as aromatherapy oil, in gels, infusions, lotions, and soaps.\r\n\r\n    Stops hair loss.\r\n    Reduces joint pains.\r\n    Solves insomnia problem.\r\n    Diminishes hypertension and stress because of having linalool in the oil.\r\n    Solves eczema problem.\r\n    Apply on the skin like chest, back and neck for the remedy of the diseases such as cold and cough.\r\n\r\nProduct Origin: USA', '570', 'uploads/1665b017ad.jpg', 1, 20, '2020-10-30 09:07:06'),
(9, 'Missha All Around Safe Block', 'Strengthened with SPF50+ PA+++ that blocks both UVA and UVB rays, this sunscreen comes in a lightweight, non-sticky formulation that feels refreshing on skin. Contains Myrciaria dubia fruit extracts to brighten skin, plus a Natural Barrier Complex and thanaka extract for further protection against environmental stressors as well as extra hydration. Apply regularly.\r\n\r\n    Double Layer UV Blocking System Holds Up to Water and Sweat New Double Layer UV Blocking System provides long-lasting and impenetrable UV protection, even as the humidity rises.\r\n    Silky Porous Powder Creates a Smooth Base Silky Porous Powder stabilized in a low viscosity fluid provides for lightweight, smooth application; no discomfort, even when layered.\r\n    Corrects Skinï¿½s Natural Tone and Texture Mild skin tone correcting effect; skin looks radiant and feels fresh, not oily.', '800', 'uploads/4ea73f50f7.jpg', 1, 30, '2020-10-30 09:08:16'),
(10, 'SOME BY MI Yuja Niacin', 'Yuja Niacin 30 Days Brightening Starter kit Contains : Yuja toner(30ml) + Yuja serum(10ml) + Yuja gel cream(30ml) + Yuja sleeping mask(20g)\r\n\r\n    A dual functional set products: Whitening + Anti-wrinkle.\r\n    Brightens up skin with Glutathione and Arbutin.\r\n\r\n \r\nToner:\r\n\r\n    Contains 90% of Yuja Extract to nourish and moisturise skin.\r\n    Revitalises irritated skin with 12 kinds of Vitamins and Lotus Flower Extract.\r\n\r\n \r\nSerum:\r\n\r\n    Contains 82% of Yuja Extract for brightening and moisturising.\r\n    With lightweight texture let skin absorb easily and leaves skin without sticky feeling.\r\n\r\n \r\nGel Cream:\r\n\r\n    Contains 90% of Yuja Extract to nourish and moisturise skin.\r\n    Revitalises skin with 10 kinds of vitamins and cools down skin with Glacial Water.\r\n\r\n \r\nSleeping Mask:\r\n\r\n    Contains 70% of Yuja Extract to nourish and moisturise skin.\r\n    Hydrates skin with Aquaxyl and Fructanï¿½ and vitalises skin with 10 kinds of vitamins.', '250', 'uploads/1d5755d7e8.jpg', 1, 80, '2020-10-30 09:09:49'),
(23, 'Mehendi', 'Phasellus feugiat sem dictum neque rutrum, eu fermentum libero tempor. Quisque pharetra mi elit, nec mollis elit volutpat ut. Etiam consequat hendrerit sapien, sit amet rhoncus augue convallis eu. Maecenas aliquet lectus sed justo molestie, nec sollicitudin dolor commodo. Donec scelerisque justo ut nibh gravida pretium. Aliquam luctus tincidunt dignissim. Nullam quis aliquet ipsum. Praesent at eleifend tortor, non convallis nisl. Donec sed pulvinar sem. Mauris mattis a purus sit amet vestibulum.', '1050', 'uploads/91f677f440.jpg', 2, 10, '2020-10-30 11:29:13'),
(24, 'Eylash Setting', 'Phasellus feugiat sem dictum neque rutrum, eu fermentum libero tempor. Quisque pharetra mi elit, nec mollis elit volutpat ut. Etiam consequat hendrerit sapien, sit amet rhoncus augue convallis eu. Maecenas aliquet lectus sed justo molestie, nec sollicitudin dolor commodo. Donec scelerisque justo ut nibh gravida pretium. Aliquam luctus tincidunt dignissim. Nullam quis aliquet ipsum. Praesent at eleifend tortor, non convallis nisl. Donec sed pulvinar sem. Mauris mattis a purus sit amet vestibulum.', '600', 'uploads/33baf7302b.jpg', 2, 10, '2020-10-30 11:30:57'),
(25, 'Hair Treatment ', 'Phasellus feugiat sem dictum neque rutrum, eu fermentum libero tempor. Quisque pharetra mi elit, nec mollis elit volutpat ut. Etiam consequat hendrerit sapien, sit amet rhoncus augue convallis eu. Maecenas aliquet lectus sed justo molestie, nec sollicitudin dolor commodo. Donec scelerisque justo ut nibh gravida pretium. Aliquam luctus tincidunt dignissim. Nullam quis aliquet ipsum. Praesent at eleifend tortor, non convallis nisl. Donec sed pulvinar sem. Mauris mattis a purus sit amet vestibulum.', '5000', 'uploads/733655e1a1.jpg', 2, 10, '2020-10-30 11:31:44'),
(26, 'Special Party Make Over', 'Phasellus feugiat sem dictum neque rutrum, eu fermentum libero tempor. Quisque pharetra mi elit, nec mollis elit volutpat ut. Etiam consequat hendrerit sapien, sit amet rhoncus augue convallis eu. Maecenas aliquet lectus sed justo molestie, nec sollicitudin dolor commodo. Donec scelerisque justo ut nibh gravida pretium. Aliquam luctus tincidunt dignissim. Nullam quis aliquet ipsum. Praesent at eleifend tortor, non convallis nisl. Donec sed pulvinar sem. Mauris mattis a purus sit amet vestibulum.', '4500', 'uploads/73cf8837a0.jpg', 2, 10, '2020-10-30 11:33:56'),
(27, 'Exclusive Base Makeup', 'Phasellus feugiat sem dictum neque rutrum, eu fermentum libero tempor. Quisque pharetra mi elit, nec mollis elit volutpat ut. Etiam consequat hendrerit sapien, sit amet rhoncus augue convallis eu. Maecenas aliquet lectus sed justo molestie, nec sollicitudin dolor commodo. Donec scelerisque justo ut nibh gravida pretium. Aliquam luctus tincidunt dignissim. Nullam quis aliquet ipsum. Praesent at eleifend tortor, non convallis nisl. Donec sed pulvinar sem. Mauris mattis a purus sit amet vestibulum.', '1200', 'uploads/f1f30ccf80.jpg', 2, 10, '2020-10-30 11:34:54'),
(28, 'Celebrity Party Makeup', 'Phasellus feugiat sem dictum neque rutrum, eu fermentum libero tempor. Quisque pharetra mi elit, nec mollis elit volutpat ut. Etiam consequat hendrerit sapien, sit amet rhoncus augue convallis eu. Maecenas aliquet lectus sed justo molestie, nec sollicitudin dolor commodo. Donec scelerisque justo ut nibh gravida pretium. Aliquam luctus tincidunt dignissim. Nullam quis aliquet ipsum. Praesent at eleifend tortor, non convallis nisl. Donec sed pulvinar sem. Mauris mattis a purus sit amet vestibulum.', '5000', 'uploads/39186e1437.jpg', 2, 10, '2020-10-30 11:35:42'),
(33, 'Quinoa protein', 'Quinoa protein isn\'t just for your salad! It repairs &amp; strengthens your hair, too.', '500', 'uploads/937dacda42.jpg', 1, 19, '2020-11-29 22:47:36'),
(34, 'Hair Color', 'The right hair color can give confidence, enhance your mood, and make you feel sexy again. I donâ€™t have scientific proof, but I know people feel better when they get up from my chair.', '3000', 'uploads/07f8c31f93.jpg', 2, 100, '2020-11-30 15:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchess`
--

CREATE TABLE `product_purchess` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `shipping_address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_purchess`
--

INSERT INTO `product_purchess` (`id`, `customer_id`, `payment_type`, `account`, `total_cost`, `status`, `order_id`, `shipping_address`, `created_at`) VALUES
(129, 3, 'BKash Mobile Banking', '', 3064, 1, '5fb14d51c4304', '', '2020-11-13 15:46:25'),
(130, 0, 'BKash Mobile Banking', '', 3064, 1, '5fb14d967044e', '', '2020-11-15 15:47:34'),
(131, 3, 'BKash Mobile Banking', '', 3414, 1, '5fb14dbe1736f', '', '2020-11-15 15:48:14'),
(132, 3, 'BKash Mobile Banking', '', 3414, 1, '5fb14dd19d512', '', '2020-11-15 15:48:33'),
(133, 0, 'BKash Mobile Banking', '', 3064, 1, '5fb1509bc152e', '', '2020-11-15 16:00:27'),
(134, 3, 'BKash Mobile Banking', '', 3064, 1, '5fb150d2082d8', '', '2020-11-15 16:01:22'),
(135, 0, 'BKash Mobile Banking', '', 3064, 1, '5fb151618399a', '', '2020-11-15 16:03:45'),
(136, 0, 'BKash Mobile Banking', '', 3064, 1, '5fb151db97174', '', '2020-11-15 16:05:47'),
(137, 4, 'BKash Mobile Banking', '', 2064, 1, '5fb152283b49a', '', '2020-11-15 16:07:04'),
(138, 0, 'BKash Mobile Banking', '', 1120, 1, '5fb1526c10755', '', '2020-11-15 16:08:12'),
(139, 4, 'BKash Mobile Banking', '', 670, 1, '5fb152bf5e521', '', '2020-11-15 16:09:35'),
(140, 4, 'BKash Mobile Banking', '', 990, 1, '5fb152d2d61f1', '', '2020-11-15 16:09:54'),
(141, 0, 'BKash Mobile Banking', '', 370, 1, '5fb15362838d4', '', '2020-11-15 16:12:18'),
(142, 4, 'BKash Mobile Banking', '', 690, 1, '5fb1538cf152a', '', '2020-11-15 16:13:00'),
(143, 4, 'BKash Mobile Banking', '', 440, 1, '5fb153a99a412', '', '2020-11-15 16:13:29'),
(144, 4, 'BKash Mobile Banking', '', 250, 1, '5fb153b969161', '', '2020-11-15 16:13:45'),
(145, 4, 'BKash Mobile Banking', '', 240, 1, '5fb153c8f0c12', '', '2020-11-15 16:14:00'),
(146, 0, 'BKash Mobile Banking', '', 370, 1, '5fb153dc80157', '', '2020-11-15 16:14:20'),
(147, 4, 'BKash Mobile Banking', '', 370, 1, '5fb1540466a07', '', '2020-11-15 16:15:00'),
(148, 4, 'BKash Mobile Banking', '', 420, 2, '5fb15414d450b', '', '2020-11-15 16:15:16'),
(149, 0, 'BKash Mobile Banking', '', 410, 2, '5fb15608ba920', '', '2020-11-15 16:23:36'),
(150, 3, 'BKash Mobile Banking', '', 540, 2, '5fb15634342e0', '', '2020-11-15 16:24:20'),
(151, 0, 'BKash Mobile Banking', '', 420, 1, '5fb1606fad1e6', '', '2020-11-15 17:07:59'),
(152, 4, 'BKash Mobile Banking', '', 370, 1, '5fb1609444c87', '', '2020-11-15 17:08:36'),
(153, 4, 'BKash Mobile Banking', '', 610, 1, '5fb160ba8e901', '', '2020-11-15 17:09:14'),
(154, 0, 'BKash Mobile Banking', '', 370, 2, '5fb1635bce86b', '', '2020-11-15 17:20:27'),
(155, 8, 'BKash Mobile Banking', '', 540, 2, '5fb16380bcfd7', '', '2020-11-15 17:21:04'),
(156, 4, 'BKash Mobile Banking', '', 240, 1, '5fb53af0d3c01', '', '2020-11-18 15:17:04'),
(157, 3, 'Bkash', '01123456789', 410, 1, '2233445666544', '1212, dhaka, bangladesh', '2020-11-20 06:25:29'),
(158, 3, 'Bkash', '01123456789', 410, 1, '2233445666544', '1212, dhaka, bangladesh', '2020-11-20 06:26:08'),
(159, 3, 'Bkash', '345453445', 280, 1, '4534345', 'fdfd sdfgdfdf', '2020-11-21 04:42:44'),
(160, 3, 'Bkash', '455454555', 216, 1, '4545454445', 'jh jk jhk g', '2020-11-21 04:48:42'),
(161, 3, 'Bkash', '56464', 216, 1, '654564', 'f fh  h jhg', '2020-11-21 04:50:41'),
(162, 3, 'Bkash', '34345345', 160, 1, '343455', 'df sf asfsf', '2020-11-21 04:58:22'),
(163, 3, 'Bkash', '34345345', 160, 1, '343455', 'df sf asfsf', '2020-11-21 04:59:33'),
(164, 3, 'Bkash', '34345345', 160, 1, '343455', 'df sf asfsf', '2020-11-21 05:00:15'),
(165, 3, 'Bkash', '34345345', 160, 1, '343455', 'df sf asfsf', '2020-11-21 05:01:00'),
(166, 3, 'Bkash', '4654646', 240, 1, '5646665', 'jh gj  jh', '2020-11-21 05:04:10'),
(167, 3, 'Bkash', '1223234234', 240, 1, '2342342323', 'sdf sdf sf', '2020-11-21 05:05:32'),
(168, 3, 'Bkash', '1223234234', 240, 1, '2342342323', 'sdf sdf sf', '2020-11-21 05:24:06'),
(169, 3, 'Bkash', '1223234234', 240, 1, '2342342323', 'sdf sdf sf', '2020-11-21 05:25:14'),
(170, 3, 'Bkash', '1223234234', 240, 1, '2342342323', 'sdf sdf sf', '2020-11-21 05:25:37'),
(171, 3, 'Bkash', '2323434', 240, 1, '2232323', ' sd asdsd asas ', '2020-11-21 05:26:18'),
(172, 3, 'Bkash', '2323434', 240, 1, '2232323', ' sd asdsd asas ', '2020-11-21 05:30:34'),
(173, 3, 'Bkash', '1212323122', 400, 1, '1231212312', 'sdf sdfsdfasdf ', '2020-11-21 05:31:03'),
(174, 3, 'Bkash', '1212323122', 400, 1, '1231212312', 'sdf sdfsdfasdf ', '2020-11-21 05:33:37'),
(175, 3, 'Bkash', '1212323122', 400, 1, '1231212312', 'sdf sdfsdfasdf ', '2020-11-21 05:34:29'),
(176, 3, 'Bkash', '1212323122', 400, 1, '1231212312', 'sdf sdfsdfasdf ', '2020-11-21 05:34:51'),
(177, 3, 'Bkash', '1212323122', 400, 1, '1231212312', 'sdf sdfsdfasdf ', '2020-11-21 05:35:10'),
(178, 3, 'Bkash', '1212323122', 400, 1, '1231212312', 'sdf sdfsdfasdf ', '2020-11-21 05:37:16'),
(179, 3, 'Bkash', '1212323122', 400, 1, '1231212312', 'sdf sdfsdfasdf ', '2020-11-21 05:38:57'),
(180, 3, 'Bkash', '43243434', 400, 1, '23423434', 'd dfgfd s sdfgsdfg', '2020-11-21 06:15:45'),
(181, 3, 'Roket', '2343434', 400, 1, '2334334', 'addfad dfas ', '2020-11-21 06:24:00'),
(182, 3, 'Bkash', '343434234', 480, 1, '343423423', 'dfdfafdf asdf ', '2020-11-21 06:33:59'),
(183, 3, 'Bkash', '34342343', 408, 1, '23232334', 'df dffsdf sdfdf ', '2020-11-21 06:36:23'),
(184, 3, 'Bkash', '6456456456', 160, 2, '456456456', 't gd f ddf', '2020-11-21 12:45:05'),
(185, 4, 'Bkash', '55757', 520, 2, '7787878', 'Arappur', '2020-11-30 09:43:44'),
(186, 4, 'Roket', '58585', 680, 2, '58585858', 'arappur', '2020-11-30 09:58:28'),
(187, 4, 'Bkash', '141125', 440, 2, '1100000000', 'faridpur.', '2020-11-30 10:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `service_pay`
--

CREATE TABLE `service_pay` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pay_type` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `tr_id` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_pay`
--

INSERT INTO `service_pay` (`id`, `cid`, `pay_type`, `account`, `tr_id`, `amount`, `status`) VALUES
(1, 3, 'Bkash', '334342323', 'sdfadfdfsdfd', 700, 0),
(2, 3, 'Bkash', '3434534534', 'dfsdfsd3434', 1200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `work_status` tinyint(1) NOT NULL DEFAULT 0,
  `pass` varchar(255) NOT NULL,
  `avr_rating` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `phone`, `profile`, `nid`, `work_status`, `pass`, `avr_rating`) VALUES
(1, 'RUPA', 'tamimshahriar85@gmail.com', '112122312', 'uploads/2457e23b39.jpg', '12212121', 1, 'f708f064faaf32a43e4d3c784e6af9ea', 5),
(3, 'Mae( ESTHETICIAN)', 'staff2@mail.com', '2242343458', 'uploads/b8ebe4bb28.jpg', '2323423423', 0, '202cb962ac59075b964b07152d234b70', 0),
(4, 'Hannah (GUEST SERVICE EXPERT)', 'staff3@mail.com', '34232334', 'uploads/01de34b55d.jpg', '11231212', 0, '202cb962ac59075b964b07152d234b70', 0),
(5, 'Allyson (GUEST SERVICE EXPERT)', 'staff4@mail.com', '1222334', 'uploads/7f85966213.jpg', '132323', 0, '202cb962ac59075b964b07152d234b70', 0),
(6, 'Holly (STYLIST COLORIST EXTENSION ARTIST)', 'staff5@mail.com', '234234234', 'uploads/96191eadba.jpg', '12333233', 0, '202cb962ac59075b964b07152d234b70', 0),
(7, 'Jashley (STYLIST COLORIST MAKEUP ARTIST)', 'staff6@mail.com', '34233', 'uploads/beb2532665.jpg', '2233', 0, '202cb962ac59075b964b07152d234b70', 0),
(8, 'JONATHAN (stylist and colorist)', 'staff7@mail.com', '122234', 'uploads/abd656ef18.jpg', '12323', 0, '202cb962ac59075b964b07152d234b70', 0),
(9, 'Lauryn (Master Stylist)', 'tamim@mail.com', '23234342', 'uploads/b23356640a.jpg', '34234234', 1, '202cb962ac59075b964b07152d234b70', 4),
(10, 'Krista (STYLIST  COLORIST  MAKEUP ARTIST)', 'shofiq@mail.com', '334234234', 'uploads/95f411a23b.jpg', '45434345', 1, '202cb962ac59075b964b07152d234b70', 0),
(12, 'Madison (GUEST SERVICE EXPERT)', 'worker11@mail.com', '33343434', 'uploads/a0542fda85.jpg', '3433343', 1, '202cb962ac59075b964b07152d234b70', 0),
(14, 'Stark', 'tamimshahriar85@gmail.com', '245661', 'uploads/87b5e6d998.jpg', '87854555', 1, 'f708f064faaf32a43e4d3c784e6af9ea', 0),
(15, 'Caroline ,ESTHETICIAN SKINCARE EXPERT', 'caroline@mail.com', '2455555', 'uploads/adf4522ed9.jpg', '145245788855', 0, '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_salary`
--

CREATE TABLE `staff_salary` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_salary`
--

INSERT INTO `staff_salary` (`id`, `staff_id`, `salary`, `status`, `created_at`) VALUES
(8, 1, 156, 1, '2020-11-30 05:21:24'),
(9, 1, 1000, 1, '2020-11-30 05:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `working_time`
--

CREATE TABLE `working_time` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `working_time`
--

INSERT INTO `working_time` (`id`, `time`) VALUES
(1, '9:00 AM'),
(2, '10:00 AM '),
(3, '11:00 AM'),
(4, '12:00 PM'),
(5, '1:00 PM'),
(6, '2:00 PM'),
(7, '3:00 AM'),
(8, '4:00 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_purchess`
--
ALTER TABLE `product_purchess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_pay`
--
ALTER TABLE `service_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_salary`
--
ALTER TABLE `staff_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_time`
--
ALTER TABLE `working_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_purchess`
--
ALTER TABLE `product_purchess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `service_pay`
--
ALTER TABLE `service_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff_salary`
--
ALTER TABLE `staff_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `working_time`
--
ALTER TABLE `working_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
