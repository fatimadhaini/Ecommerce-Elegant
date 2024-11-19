-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 10:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(2552) NOT NULL,
  `paragraph` varchar(255) NOT NULL,
  `about_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `title`, `paragraph`, `about_img`) VALUES
(1, 'Elevate Your Home ', 'Elegant Furniture offers a curated collection of high-quality pieces that blend timeless elegance with modern functionality. With exceptional service and personalized shopping experiences, we aim to transform your home into a stylish sanctuary.', 'about-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(10) UNSIGNED NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `href`) VALUES
(57, 'Living Room Furniture ', 'livingsec'),
(58, 'Bedroom Furniture', 'bedroom'),
(59, 'Dining Room Furniture', ''),
(61, 'Outdoor Furniture', ''),
(62, 'Office Furniture', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) UNSIGNED NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `website` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `address`, `email`, `phone`, `website`, `map`) VALUES
(1, '123 Street Tyre,Lebanon', 'elegant@gmail.com', '+96176850791', 'www.elegant.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v16942596');

-- --------------------------------------------------------

--
-- Table structure for table `couponcode`
--

CREATE TABLE `couponcode` (
  `code_id` int(10) UNSIGNED NOT NULL,
  `code_name` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `limits` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `used_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `couponcode`
--

INSERT INTO `couponcode` (`code_id`, `code_name`, `expiry_date`, `limits`, `percentage`, `used_by`) VALUES
(1, 'fatima', '2024-08-15', 5, 10, '/4/4/6/2/7'),
(4, 'BLACKFRIDAY', '2024-08-30', 18, 20, '/7/8');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customers_id` int(10) UNSIGNED NOT NULL,
  `customers_password` varchar(255) NOT NULL,
  `customers_first_name` varchar(255) NOT NULL,
  `customers_last_name` varchar(255) NOT NULL,
  `customers_address` varchar(255) NOT NULL,
  `customers_email` varchar(255) NOT NULL,
  `customers_telephone` int(11) NOT NULL,
  `customers_created_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customers_id`, `customers_password`, `customers_first_name`, `customers_last_name`, `customers_address`, `customers_email`, `customers_telephone`, `customers_created_time`) VALUES
(2, '$2y$10$FQec2OyTySKg4Jh.AW5p7eHRdEkvMVTT.pRFmeoNCVeVJcKk1rEqa', 'nour', 'dhaini', 'xyxy', 'nourdhaini17@gmail.com', 70076398, '2024-07-24 13:14:43'),
(3, '$2y$10$peE7y44nb7SBVpgAcBk5lesHssvFADDcfmugrX7AQVJi3Rx24tPDu', 'rim', 'dhaini', 'tyre', 'rim@gmail.com', 81833521, '2024-07-25 07:08:01'),
(4, '$2y$10$ntphzOQFqzoBj6mi9.WI6.2Drk6aImnZhEzVHFxPrLxYPQDihfSbO', 'fatima', 'dhaini', 'leb', '72230114@students.liu.edu.lb', 13333313, '2024-07-25 07:16:15'),
(5, '$2y$10$ohk5vdi05ZeodiPUKpZUQu4FTQSunQizfD5XkQerqQ05pVbBCcYeu', 'Shwarma', 'ff', 'xyxy', 'agyqsygwg@gmail.com', 77112357, '2024-07-25 19:27:15'),
(6, '$2y$10$7UCgRICP3m3jT3freR3PQ.zN6ydopV6M515ZFOt/1wU3JpQ4HVNvC', 'asil', 'dhaini', 'Tyre jabal amal', 'asil@gmail.com', 171616611, '2024-07-31 09:34:00'),
(7, '$2y$10$cE8CnkjiE5UXzkTFJ0My9ebEzbJ0jDiPxPlvRvhz63FemNfNXbqc2', 'Mariam', 'Nasrallah', 'Tyre', 'mariam@gmail.com', 81721661, '2024-08-03 10:26:25'),
(8, '$2y$10$vvp4FXL4APAa.cwH7u6KrOwkdzeSCRo.JCszSBPV6nazGuQWlsdee', 'Nisrin', 'Jalal', 'Borj rahal', 'nisrin3011@gmail.com', 81163811, '2024-08-07 18:58:43'),
(9, '$2y$10$.8UHXQ8rifkkzg6T2hqUk.Q8YlJPvPK07Qv.Hw5ht3EVOTlcksqAe', 'rawan', 'Nasrallah', '123 Street Tyre,Lebanon', 'rawan@gmail.com', 71234543, '2024-08-08 06:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(10) UNSIGNED NOT NULL,
  `s1_img` varchar(255) NOT NULL,
  `s2_img` varchar(255) NOT NULL,
  `s1_h4` varchar(255) NOT NULL,
  `s1_h2` varchar(255) NOT NULL,
  `s1_h2b` varchar(255) NOT NULL,
  `s2_h4` varchar(255) NOT NULL,
  `s2_h2` varchar(255) NOT NULL,
  `s2_h2b` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`home_id`, `s1_img`, `s2_img`, `s1_h4`, `s1_h2`, `s1_h2b`, `s2_h4`, `s2_h2`, `s2_h2b`) VALUES
(1, 'hero-slider-1-3.jpg', 'hero-slider-2-0-0.jpg', 'New collection', 'Cosmos Comfort Sofa', 'Gold Award', 'New collection', 'Luxy Chairs', 'Design Award');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(10) UNSIGNED NOT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dateorder` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `shipping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `customers_id`, `country`, `city`, `zipcode`, `address`, `dateorder`, `name`, `email`, `phone`, `total`, `status`, `discount`, `shipping`) VALUES
(4, 4, 'Lebanon', 'hellosir', '918822', 'leb', '2024-07-31 07:30:03', 'fatima dhaini', '72230114@students.liu.edu.lb', 13333313, '1810', 'Delivered', 0, 10),
(5, 4, 'Lebanon', 'hello', '1233', 'leb', '2024-07-28 09:19:55', 'fatima dhaini', '72230114@students.liu.edu.lb', 13333313, '1810', 'In proggress', 0, 10),
(6, 4, 'Lebanon', 'Tyre', '1234', 'leb', '2024-07-29 17:06:06', 'fatima dhaini', '72230114@students.liu.edu.lb', 13333313, '1899.00', 'In proggress', 10, 10),
(7, 6, 'Lebanon', 'xoxo', '0000', 'Tyre jabal amal', '2024-07-31 09:37:27', 'asil dhaini', 'asil@gmail.com', 171616611, '1924.20', 'Shipped', 10, 10),
(8, 2, 'Lebanon', 'borj rahal', '12345', 'xyxy', '2024-07-31 14:42:04', 'nour dhaini', 'nourdhaini17@gmail.com', 70076398, '1359.00', 'Shipped', 10, 10),
(9, 7, 'Lebanon', 'Tyre', '12928', 'Tyre', '2024-08-03 10:32:26', 'Mariam Nasrallah', 'mariam@gmail.com', 81721661, '1359.00', 'Shipped', 10, 10),
(10, 4, 'Lebanon', 'ok', '112', 'leb', '2024-08-05 14:14:50', 'fatima dhaini', '72230114@students.liu.edu.lb', 13333313, '1510', 'In proggress', 0, 10),
(11, 7, 'Lebanon', 'Tyre jal al baher', '7171', 'Tyre', '2024-08-07 08:12:15', 'Mariam Nasrallah', 'mariam@gmail.com', 81721661, '2486.40', 'In proggress', 20, 10),
(12, 8, 'Lebanon', 'jsijsi', '16161', 'Borj rahal', '2024-08-07 19:04:32', 'Nisrin Jalal', 'nisrin3011@gmail.com', 81163811, '2709', 'Shipped', 0, 10),
(13, 8, 'Lebanon', 'Tyre', '1234', 'Borj rahal', '2024-08-08 05:53:54', 'Nisrin Jalal', 'nisrin3011@gmail.com', 81163811, '1887.20', 'In proggress', 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `orders_details_id` int(10) UNSIGNED NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `price` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `orders_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`orders_details_id`, `products_id`, `price`, `sub_total`, `name`, `orders_id`, `quantity`) VALUES
(7, 61, '600.00', '600.00', 'Loveseat', 4, 1),
(8, 60, '1,200.00', '1,200.00', 'Sectional Sofa', 4, 1),
(9, 60, '1,200.00', '1,200.00', 'Sectional Sofa', 5, 1),
(10, 61, '600.00', '600.00', 'Loveseat', 5, 1),
(11, 62, '900.00', '900.00', 'Sleeper sofa', 6, 1),
(12, 63, '1,200.00', '1,200.00', 'Reclining Sofa', 6, 1),
(13, 71, '799.00', '799.00', 'Queen Bed Frame', 7, 1),
(14, 70, '129.00', '129.00', 'Floor Lamp', 7, 1),
(15, 61, '600.00', '600.00', 'Loveseat', 8, 1),
(16, 62, '900.00', '900.00', 'Sleeper sofa', 8, 1),
(17, 61, '600.00', '600.00', 'Loveseat', 9, 1),
(18, 62, '900.00', '900.00', 'Sleeper sofa', 9, 1),
(19, 61, '600.00', '600.00', 'Loveseat', 10, 1),
(20, 62, '900.00', '900.00', 'Sleeper sofa', 10, 1),
(21, 80, '1,199.00', '1,199.00', 'Pottery Barn Farmhouse Bed', 11, 1),
(22, 81, '600.00', '600.00', 'West Elm Mid-Century Bed', 11, 1),
(23, 83, '1,299.00', '1,299.00', 'West Elm Reclaimed Wood Dining Table', 11, 1),
(24, 61, '600.00', '600.00', 'Loveseat', 12, 1),
(25, 62, '900.00', '900.00', 'Sleeper sofa', 12, 1),
(26, 80, '1,199.00', '1,199.00', 'Pottery Barn Farmhouse Bed', 12, 1),
(27, 81, '600.00', '600.00', 'Mid-Century Bed', 13, 1),
(28, 82, '349.00', '349.00', 'IKEA  Dresser', 13, 1),
(29, 86, '1,400.00', '1,400.00', 'Rect Dining Set', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(10) UNSIGNED NOT NULL,
  `products_name` varchar(255) NOT NULL,
  `products_price` int(11) NOT NULL,
  `categories_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `products_price`, `categories_id`, `description`, `quantity`) VALUES
(60, 'Sectional Sofa', 1200, 57, 'A spacious seating option that can accommodate several people, perfect for large living rooms', 0),
(61, 'Loveseat', 600, 57, 'A smaller sofa for two people, ideal for compact spaces or as a complement to larger sofas', 2),
(62, 'Sleeper sofa', 900, 57, 'Doubles as a bed, great for guest rooms or small apartments', 4),
(63, 'Reclining Sofa', 1200, 57, 'Offers adjustable backrests and footrests for maximum comfort', 19),
(68, 'Oceanside seats', 900, 57, 'Offers adjustable backrests and footrests for maximum comfort.', 29),
(69, 'Sofa Set', 1499, 57, 'A luxurious and comfortable 3-piece sofa set upholstered in soft velvet fabric, featuring deep cushions and a sturdy hardwood frame. Perfect for entertaining guests or relaxing after a long day', 19),
(70, 'Floor Lamp', 129, 57, 'An elegant floor lamp with an adjustable arched design and a linen drum shade, providing ambient lighting while adding a touch of sophistication to your living room.', 29),
(71, 'Queen Bed Frame', 799, 58, 'A solid wood queen-sized bed frame with a tufted fabric headboard and sturdy slat support system, combining durability with timeless style.', 19),
(72, 'Harmony Recliner Chair', 599, 57, 'Enjoy ultimate relaxation with this ergonomic recliner, offering multiple positions and plush cushioning. Perfect for unwinding after a long day.', 10),
(73, 'Modern TV Stand', 399, 57, 'This contemporary TV stand boasts ample storage and a clean design. It’s an excellent addition for organizing your entertainment area.', 10),
(76, 'Elegant chair', 200, 57, 'The Aeron Chair is an iconic ergonomic office chair known for its mesh fabric and advanced support features. It adjusts to fit various body types and postures, with lumbar support, adjustable armrests, and a highly flexible design. It’s renowned for its c', 0),
(77, 'Steelcase Leap Chair', 300, 57, 'The Leap Chair by Steelcase is designed with an emphasis on ergonomic support and customization. It features an adjustable lumbar support system, seat depth adjustment, and a unique LiveBack technology that allows the chair’s back to move with the user. I', 10),
(78, 'Eames Lounge Chair', 350, 57, 'A mid-century modern classic with luxurious leather and molded plywood. Known for its exceptional comfort and timeless style.', 0),
(79, 'Relief Beyond', 500, 57, 'A minimalist design with an upholstered seat and versatile base options. Its simplicity and elegance make it suitable for various settings.', 0),
(80, 'Pottery Barn Farmhouse Bed', 1199, 58, 'A rustic wooden bed frame with a farmhouse style, featuring a sturdy construction and classic design elements.', 0),
(81, 'Mid-Century Bed', 600, 58, 'A bed with a mid-century modern design, including a low profile and angled legs, crafted from solid wood.', 2),
(82, 'IKEA  Dresser', 349, 58, 'A sleek, minimalist dresser with six spacious drawers, perfect for organizing bedroom essentials in a modern design.', 4),
(83, 'Wood Dining', 1299, 59, 'A rustic dining table made from reclaimed wood, providing a unique and environmentally friendly piece for any dining space.', 6),
(84, 'Bench Dining Table', 1600, 59, 'Featuring a rugged design with a distressed finish, this table offers ample space and a charming farmhouse look.', 12),
(85, 'IKEA Table', 1200, 59, 'A versatile dining table with an extendable design, perfect for accommodating extra guests with ease.', 12),
(86, 'Rect Dining Set', 1400, 59, 'Includes a table and matching chairs with a classic design, offering both style and functionality for everyday dining.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products_img`
--

CREATE TABLE `products_img` (
  `products_img_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_img`
--

INSERT INTO `products_img` (`products_img_id`, `url`, `products_id`) VALUES
(76, 'cat1pro2!.jpg', 61),
(78, 'cat1pro1!!.jpg', 60),
(80, 'cat1pro3!.png', 62),
(81, 'cat1pro3.jpg', 62),
(82, 'cat1pro2.jpg', 61),
(83, 'cat1pro4-0.jpg', 63),
(84, 'catpro4!-0.jpg', 63),
(91, 'cat1pro1.jpg', 60),
(99, 'cat1pro5!!!!-0.jpg', 68),
(100, 'cat1pro5!!!-0.jpg', 68),
(101, 'cat1pro5!!-0.jpg', 68),
(103, 'cat1pro5-0.jpg', 68),
(104, 'cat1pro6!!!-0.jpg', 69),
(105, 'cat1pro6!!-0.jpg', 69),
(106, 'cat1pro6!-0.jpg', 69),
(107, 'cat1pro6-0.jpg', 69),
(108, 'cat1pro7!!-0.jpg', 70),
(109, 'cat1pro7!-0.jpg', 70),
(110, 'cat1pro7-0.jpg', 70),
(111, 'cat2pro1!!-0.jpg', 71),
(112, 'cat2pro1!-0.jpg', 71),
(113, 'cat2pro1-0.jpg', 71),
(114, 'cat1pro8!!-0.jpg', 72),
(115, 'cat1pro8!-0.jpg', 72),
(116, 'cat1pro8-0.jpg', 72),
(117, 'cat1pro9!!!!-0.jpg', 73),
(118, 'cat1pro9!!!-0.jpg', 73),
(119, 'cat1pro9!!-0.jpg', 73),
(120, 'cat1pro9!-0.jpg', 73),
(121, 'cat1pro9-0.jpg', 73),
(123, 'bgorange.png', 76),
(126, 'juice1-0.png', 76),
(127, 'bgplumb-0.png', 77),
(130, 'juice2.png', 77),
(131, 'bgkiwi.png', 78),
(137, 'juice3.png', 78),
(138, 'bgstrawberry-2.png', 79),
(142, 'juice4.png', 79),
(143, 'cat2pro2!!-0.jpg', 80),
(144, 'cat2pro3!-0.jpg', 81),
(145, 'cat2pro3-0.jpg', 81),
(146, 'cat2pro4!!-0.jpg', 82),
(147, 'cat2pro4!-0.jpg', 82),
(148, 'cat2pro4-0.jpg', 82),
(149, 'cat3pro1!-0.jpg', 83),
(150, 'cat3pro1-0.jpg', 83),
(151, 'cat3pro2!-0.jpg', 84),
(152, 'cat3pro2-0.jpg', 84),
(153, 'cat3pro3!!-0.jpg', 85),
(154, 'cat3pro3!-0.jpg', 85),
(155, 'cat3pro3-0.jpg', 85),
(156, 'cat3pro4-0.jpg', 86);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(10) UNSIGNED NOT NULL,
  `1name` varchar(255) NOT NULL,
  `1des` varchar(400) NOT NULL,
  `1photo` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `1name`, `1des`, `1photo`) VALUES
(1, 'Lea Cruis', 'Developer', 'team1-0.jpg'),
(2, 'Lina Edward', 'Product Manager', 'team2.jpg'),
(3, 'Tiana lona', 'Digital Marketing Specialist', 'team3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trending`
--

CREATE TABLE `trending` (
  `pro1` varchar(255) NOT NULL,
  `pro2` varchar(255) NOT NULL,
  `pro3` varchar(255) NOT NULL,
  `pro4` varchar(255) NOT NULL,
  `pro1des` varchar(255) NOT NULL,
  `pro2des` varchar(255) NOT NULL,
  `pro3des` varchar(255) NOT NULL,
  `pro4des` varchar(255) NOT NULL,
  `pro1img` varchar(255) NOT NULL,
  `pro2img` varchar(255) NOT NULL,
  `pro3img` varchar(255) NOT NULL,
  `pro4img` varchar(255) NOT NULL,
  `pro1img2` varchar(255) NOT NULL,
  `pro2img2` varchar(255) NOT NULL,
  `pro3img2` varchar(255) NOT NULL,
  `pro4img2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trending`
--

INSERT INTO `trending` (`pro1`, `pro2`, `pro3`, `pro4`, `pro1des`, `pro2des`, `pro3des`, `pro4des`, `pro1img`, `pro2img`, `pro3img`, `pro4img`, `pro1img2`, `pro2img2`, `pro3img2`, `pro4img2`) VALUES
('Elegant chair', 'Steelcase Leap Chair', 'Eames Lounge Chair', 'Relief Beyond', 'The Aeron Chair is an iconic ergonomic office chair known for its mesh fabric and advanced support features. It adjusts to fit various body types and postures, with lumbar support, adjustable armrests, and a highly flexible design.', 'The Leap Chair by Steelcase is designed with an emphasis on ergonomic support and customization. It features an adjustable lumbar support system, seat depth adjustment, and a unique LiveBack technology that allows the chair’s back to move with the user.', 'A mid-century modern classic with luxurious leather and molded plywood. Known for its exceptional comfort and timeless style.', 'A minimalist design with an upholstered seat and versatile base options. Its simplicity and elegance make it suitable for various settings.', 'juice1.png', 'juice2.png', 'juice3.png', 'juice4.png', 'bgorange.png', 'bgplumb.png', 'bgkiwi.png', 'bgstrawberry.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `username`, `password`, `user_type`, `image`) VALUES
(6, 'admin', '$2y$10$AVNnedI9zf10cqX7kgVVR.bX5Ug/Cgi5EaOkQaCyEWvMH1zh9PcGa', 'admin', 'team3-0.jpg'),
(7, 'admin2', '$2y$10$HAsLpFxz2MF7R.TqijVV2eqmB.BKvL4EWnBF6VTWFFifPu/yDj0de', 'admin', 'team3.jpg'),
(8, 'fatima', '$2y$10$XVo0WkTBMgYl1W9MPwLnSOji0TYeEDnmuK1ZrnspeYmGbXtF8QNaW', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `couponcode`
--
ALTER TABLE `couponcode`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customers_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `rlt` (`customers_id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`orders_details_id`),
  ADD KEY `relation1` (`orders_id`),
  ADD KEY `relation2` (`products_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `rlt2` (`categories_id`);

--
-- Indexes for table `products_img`
--
ALTER TABLE `products_img`
  ADD PRIMARY KEY (`products_img_id`),
  ADD KEY `relation` (`products_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `couponcode`
--
ALTER TABLE `couponcode`
  MODIFY `code_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customers_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `orders_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `products_img`
--
ALTER TABLE `products_img`
  MODIFY `products_img_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `rlt` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`customers_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `relation1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation2` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `rlt2` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`categories_id`);

--
-- Constraints for table `products_img`
--
ALTER TABLE `products_img`
  ADD CONSTRAINT `relation` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
