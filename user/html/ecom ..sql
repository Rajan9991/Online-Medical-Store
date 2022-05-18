-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 04:51 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(2, 'Nikita ', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(1, 'Covid Essential', 1),
(2, 'Beauty', 1),
(4, 'Eye Wear', 1),
(6, 'Vitamin', 1),
(7, 'Diabetes', 1),
(8, 'Fitness', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(6, 'Nikita Sharma', 'nikitasharma82856@gmail.com', '6205486748', 'bnbhbh', '2021-08-28 03:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `Name`, `phone`, `address`, `State`, `pincode`, `locality`, `district`, `payment_type`, `payment_status`, `order_status`, `added_on`, `total_price`) VALUES
(2, 3, 'Nikita Sharma', 2147483647, 'Patnq\r\nKurji', 'Bihar', 800010, 'mahua', 'haj', 'payu', 'pending', 3, '2021-08-28 04:11:30', 90),
(3, 3, 'Nikita Sharma', 2147483647, 'Patnq\r\nKurji', 'Bihar', 800010, 'mahua', 'vaishali', 'payu', 'pending', 1, '2021-08-29 11:00:00', 90),
(4, 3, 'Nikita Sharma', 62056755, 'Patnq\r\nKurji', 'Bihar', 800010, 'mahua', 'haj', 'payu', 'pending', 1, '2021-08-29 11:45:44', 7020),
(5, 3, 'Nikita Sharma', 62056755, 'Patnq\r\nKurji', 'Bihar', 800010, 'goa', 'vaishali', 'COD', 'pending', 1, '2021-08-29 04:04:41', 90),
(6, 3, '', 0, '', '', 0, '', '', 'payu', 'pending', 1, '2021-08-29 04:06:39', 90),
(7, 3, 'Nikita Sharma', 62056755, 'Patnq\r\nKurji', 'Bihar', 800010, 'goa', 'hajipur', 'payu', 'pending', 1, '2021-09-01 08:47:05', 90),
(8, 3, 'Nikita Sharma', 62056755, 'Patnq\r\nKurji', 'Bihar', 800010, '', '', 'payu', 'pending', 1, '2021-09-01 08:48:18', 90),
(9, 3, 'Nikita Sharma', 2147483647, 'Patnq\r\nKurji', 'Bihar', 800010, 'mahua', 'vaishali', 'payu', 'pending', 1, '2021-09-01 08:49:08', 90),
(10, 3, 'Nikita Sharma', 2147483647, 'Patnq\r\nKurji', 'Bihar', 800010, 'mahua', 'vaishali', 'payu', 'pending', 1, '2021-09-01 08:50:47', 90);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `best_seller` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `best_seller`, `status`) VALUES
(10, 4, 'Biotrue Multi Purpose Solution 300 ml', 560, 515.2, 2, 'biotrue_multi_purpose_solution_300_ml_0.jpg', 'Biotrue multi-purpose solution today - and experience advanced lens care inspired by the biology of your eyes. Biotrue was developed following intensive study on how the eye works naturally to clean, hydrate and keep itself healthy.', 'Biotrue multi-purpose solution today - and experience advanced lens care inspired by the biology of your eyes. Biotrue was developed following intensive study on how the eye works naturally to clean, hydrate and keep itself healthy.\r\n\r\nBiotrue provides exceptional disinfection and is the only solution that brings together three bio-inspired innovations:\r\n\r\nMatches the pH of healthy tears\r\nUtilises lubricant found naturally in the eyes\r\nKeeps certain beneficial tear proteins active', 1, 1),
(11, 4, 'Renu Fresh Multi Purpose Solution 120 ml', 240, 220.8, 19, 'renu_fresh_multi_purpose_solution_355_ml_0_1.jpg', 'Renu Fresh multi-purpose solution is specially formulated to work with your natural tears. Experience the feeling of wearing a fresh pair of lenses cushioned in moisture. Cleans loosens and removes accumulations of film, protein, other deposits, and debris from soft contact lenses. Removes protein most effectively when used daily.', 'Renu Fresh multi-purpose solution is specially formulated to work with your natural tears. Experience the feeling of wearing a fresh pair of lenses cushioned in moisture. Cleans loosens and removes accumulations of film, protein, other deposits, and debris from soft contact lenses. Removes protein most effectively when used daily. Destroys harmful micro-organisms on the surface of the lens. Rinses, stores, and wets lenses before insertion.', 1, 1),
(12, 4, '3M Opticlude Orthoptic Eye Patches (1539) 20\'s', 550, 357.5, 10, '3m_opticlude_orthoptic_eye_patches_1539_20s_0_1.jpg', '3M Opticlude orthoptic eye patches are used for treating childhood strabismus (lazy eye syndrome) and amblyopia.', '3M Opticlude orthoptic eye patches are used for treating childhood strabismus (lazy eye syndrome) and amblyopia. Worn over the preferred eye, the eye patch encourages the weaker eye to function.', 0, 1),
(13, 4, 'Biotrue Multi Purpose Solution 120 ml', 305, 285.6, 5, 'biotrue_multi_purpose_solution_300_ml_0.jpg', 'Biotrue multi-purpose solution today - and experience advanced lens care inspired by the biology of your eyes. Biotrue was developed following intensive study on how the eye works naturally to clean, hydrate and keep itself healthy.', 'Biotrue multi-purpose solution today - and experience advanced lens care inspired by the biology of your eyes. Biotrue was developed following intensive study on how the eye works naturally to clean, hydrate and keep itself healthy.\r\n\r\nBiotrue provides exceptional disinfection and is the only solution that brings together three bio-inspired innovations:\r\n\r\nMatches the pH of healthy tears\r\nUtilises lubricant found naturally in the eyes\r\nKeeps certain beneficial tear proteins active', 0, 1),
(14, 4, 'Purecon Puresoft for Sensitive Eyes Solution 60 ml', 100, 90, 4, 'purecon_puresoft_for_sensitive_eyes_solution_60_ml_0.jpg', 'Purecon-puresoft Multi-Purpose Solution is a sterile buffered isotonic solution that contains purified water, HPMC, CMC, EDTA, Borax in Sodium Chloride Base. This solution is extensively used to clean the contact lenses very safely. It works very well on high-value lenses and cleans smudges and stains very easily.', 'Purecon-puresoft Multi-Purpose Solution is a sterile buffered isotonic solution that contains purified water, HPMC, CMC, EDTA, Borax in Sodium Chloride Base. This solution is extensively used to clean the contact lenses very safely. It works very well on high-value lenses and cleans smudges and stains very easily.', 0, 1),
(15, 2, 'Bioderma Sensibio H2O Micellar Solution 250 ml', 1000, 990, 7, 'bioderma_sensibio_h2o_micellar_solution_250_ml_0.jpg', '', '', 1, 1),
(16, 2, 'Ahaglow Face Wash Gel 100gm', 434, 327, 4, 'ahaglow_face_wash_gel_100gm_0.jpg', 'AHAGLOW contains Aloe Vera, Glycolic Acid and Tocopheryl (Vitamin E)', 'AHAGLOW contains Aloe Vera, Glycolic Acid and Tocopheryl (Vitamin E)', 0, 1),
(17, 2, 'Cetaphil Oily Skin Cleanser 125ml', 400, 400, 5, 'cetaphil_oily_skin_cleanser_125ml_0_0.jpg', 'The contents of this website are for informational purposes only and not intended to be a substitute for professional medical advice, diagnosis, or treatment. Please seek the advice of a physician or other qualified health provider with any questions you may have regarding a medical condition. Do not disregard professional medical advice or delay in seeking it because of something you have read on this website.', 'The contents of this website are for informational purposes only and not intended to be a substitute for professional medical advice, diagnosis, or treatment. Please seek the advice of a physician or other qualified health provider with any questions you may have regarding a medical condition. Do not disregard professional medical advice or delay in seeking it because of something you have read on this website.', 1, 1),
(18, 1, 'Mahalaxmi Enterprises 3 Ply Face Mask 100\'s', 1600, 400, 5, 'mahalaxmi_enterprises_3_ply_face_mask_100s_0_0.jpg', 'The contents of this website are for informational purposes only and not intended to be a substitute for professional medical advice, diagnosis, or treatment. Please seek the advice of a physician or other qualified health provider with any questions you may have regarding a medical condition. Do not disregard professional medical advice or delay in seeking it because of something you have read on this website.', 'The contents of this website are for informational purposes only and not intended to be a substitute for professional medical advice, diagnosis, or treatment. Please seek the advice of a physician or other qualified health provider with any questions you may have regarding a medical condition. Do not disregard professional medical advice or delay in seeking it because of something you have read on this website.', 0, 1),
(19, 1, 'Ciphands Antiseptic Hand Sanitizer 100 ml', 80, 50, 8, 'ciphands_antiseptic_hand_sanitizer_100_ml_0_1.jpg', '', '', 1, 1),
(20, 6, 'Vitamin A Chew Tablet 10\'S', 7.84, 6.27, 8, 'vitamin_a_chew_tablet_10s_0_1.jpg', 'The contents of this website are for informational purposes only and not intended to be a substitute for professional medical advice, diagnosis, or treatment. Please seek the advice of a physician or other qualified health provider with any questions you may have regarding a medical condition. Do not disregard professional medical advice or delay in seeking it because of something you have read on this website.', 'The contents of this website are for informational purposes only and not intended to be a substitute for professional medical advice, diagnosis, or treatment. Please seek the advice of a physician or other qualified health provider with any questions you may have regarding a medical condition. Do not disregard professional medical advice or delay in seeking it because of something you have read on this website.', 1, 1),
(21, 6, 'Vitamin C Injection 1.5ml', 3.08, 2.46, 12, 'vitamin_c_injection_1_5ml_0_0.jpg', 'The contents of this website are for informational purposes only and not intended to be a substitute for professional medical advice, diagnosis, or treatment. Please seek the advice of a physician or other qualified health provider with any questions you may have regarding a medical condition. Do not disregard professional medical advice or delay in seeking it because of something you have read on this website.', 'The contents of this website are for informational purposes only and not intended to be a substitute for professional medical advice, diagnosis, or treatment. Please seek the advice of a physician or other qualified health provider with any questions you may have regarding a medical condition. Do not disregard professional medical advice or delay in seeking it because of something you have read on this website.', 1, 1),
(22, 7, 'D Protin Chocolate Powder 500 gm', 578, 496, 5, 'd_protin_chocolate_powder_500_gm_0.jpg', 'D Protin Chocolate Powder 500 gm\r\nOffers Salary Week Mega Saving5.0  3 Ratings & 3 Reviews', 'D Protin Chocolate Powder 500 gm\r\nOffers Salary Week Mega Saving5.0  3 Ratings & 3 Reviews', 1, 1),
(23, 7, 'Fresubin Vanilla Powder 400gm', 596, 476.8, 10, 'fresubin_vanilla_powder_400gm_0_1.jpg', '', '', 0, 1),
(24, 8, 'PediaCare Super Immuno Gummies', 245, 196, 10, 'pediacare_super_immuno_gummies_amla_vitamin_c_25s_0_4.jpg', 'Getting your kids to eat healthily is a challenging job. It is an uphill battle for you to make them eat vegetables, fruits, lentils and chapati leaving nutritional gaps that compromise your child’s immunity. But keeping them safe and healthy is on the top of your priority list. Now, put all your concerns away and get your child PediaCare Super Immuno Amla and Vitamin C Gummies. These immunity strengthening Gummies are made keeping in mind your kid’s joy of savouring the taste of delicious Gummies, making your job of giving kids required immunity nutrients so much easier. So, treat your child with tasty PediaCare Gummies and help them develop a stronger immune system against cough, cold, fever, and other viral and bacterial infections.', 'Getting your kids to eat healthily is a challenging job. It is an uphill battle for you to make them eat vegetables, fruits, lentils and chapati leaving nutritional gaps that compromise your child’s immunity. But keeping them safe and healthy is on the top of your priority list. Now, put all your concerns away and get your child PediaCare Super Immuno Amla and Vitamin C Gummies. These immunity strengthening Gummies are made keeping in mind your kid’s joy of savouring the taste of delicious Gummies, making your job of giving kids required immunity nutrients so much easier. So, treat your child with tasty PediaCare Gummies and help them develop a stronger immune system against cough, cold, fever, and other viral and bacterial infections.', 1, 1),
(25, 8, 'Supradyn Tablet 15\'s', 33.14, 271.15, 5, 'supradyn_tablet_15s_0_2.jpg', 'IngredientASCORBIC ACID(VIT C) 150 mg+Calcium Pantothenate 16.25 MG+Cholecalciferol(Vit D3) 1000 IU+COPPER SULPHATE 3.5 MG+Ferrous Sulphate 32 MG+Pyridoxine Hydrochloride(Vit B6) 3 MG+RIBOFLAVIN 10 mg+Thiamine Hydrochloride(Vit B1) 10 MG+VITAMIN A 10000 IU+ZINC SULPHATE 2.2 MG', 'IngredientASCORBIC ACID(VIT C) 150 mg+Calcium Pantothenate 16.25 MG+Cholecalciferol(Vit D3) 1000 IU+COPPER SULPHATE 3.5 MG+Ferrous Sulphate 32 MG+Pyridoxine Hydrochloride(Vit B6) 3 MG+RIBOFLAVIN 10 mg+Thiamine Hydrochloride(Vit B1) 10 MG+VITAMIN A 10000 IU+ZINC SULPHATE 2.2 MG', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(2, 3, 10, 1, 90),
(3, 4, 10, 78, 90),
(4, 5, 10, 1, 90),
(5, 6, 10, 1, 90),
(6, 7, 10, 1, 90),
(7, 8, 10, 1, 90),
(8, 9, 10, 1, 90),
(9, 10, 10, 1, 90);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_rating` int(11) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(6, 'John Smith', 4, 'Nice Product, Value for money', 1621935691),
(7, 'Peter Parker', 5, 'Nice Product with Good Feature.', 1621939888),
(8, 'Donna Hubber', 1, 'Worst Product, lost my money.', 1621940010);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `added_on`) VALUES
(2, 3, 6, '2021-08-28 04:53:46'),
(3, 3, 6, '2021-08-28 07:42:39'),
(7, 3, 14, '2021-09-01 11:15:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
