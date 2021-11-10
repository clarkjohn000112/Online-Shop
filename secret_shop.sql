-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 09:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secret_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(11, 'clark john casin', 'casinco', '0d0aed4d1fde0ad95dcbaf072a54f79d'),
(14, 'Mark John Magsino', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(15, 'Mary Jones', 'Jones', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `user_id`, `user_name`, `password`, `date`) VALUES
(2, 84413, 'john', '123123', '2021-10-27 05:17:23'),
(6, 3252888861322347, 'casin', '098', '2021-11-08 09:15:25'),
(7, 350795520241, 'opaco', '456', '2021-11-08 09:17:23'),
(9, 80162536443, 'avelino', '123123', '2021-11-08 09:18:56'),
(13, 93146, 'reynaldo', '890', '2021-11-08 09:39:41'),
(14, 275163717, 'reyes', '123123', '2021-11-08 09:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `images_name` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `images_name`, `title`, `featured`, `active`) VALUES
(14, '../images/tp_1636454087.png', 'TEAM PAYAMAN', 'Yes', 'Yes'),
(15, '../images/bs_1636476695.png', 'BUCKET SQUAD', 'Yes', 'Yes'),
(17, '../images/sumptuous_1636476719.png', 'SUMPTUOUS', 'Yes', 'Yes'),
(18, '../images/enimal_1636476933_1636511056.png', 'ENIMAL', 'Yes', 'Yes'),
(19, '../images/dbtk_1636476960.png', 'DBTK', 'Yes', 'Yes'),
(20, '../images/daily_1636476979.png', 'DAILY GRIND', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `item_name` varchar(150) NOT NULL,
  `qty` int(10) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(80) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `prize` decimal(10,0) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `customer_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `date`, `item_name`, `qty`, `total`, `status`, `customer_name`, `customer_contact`, `customer_address`, `size`, `prize`, `item_description`, `customer_email`) VALUES
(57, '2021-11-10 08:48:00', 'UM STRIKE DOORMAT – BLACK/RED', 1, '1500', 'Ordered', 'John Ashley Capistrano', '09286541258', 'Brgy. Mamatid Cabuyao Next Door Men', '1', '1500', '', 'capistranoja@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `images_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `title`, `description`, `price`, `brand_id`, `featured`, `active`, `images_name`) VALUES
(4, 'UM STRIKE DOORMAT – BLACK/RED', 'A home goods essential or even a collector’s item.', '1500', 19, 'Yes', 'Yes', '../images/db1_1636571203.png'),
(5, 'GANG HOODIE – BLACK', 'A person can only do so much, but if you’re surrounded with your constants in life.', '2800', 19, 'Yes', 'Yes', '../images/db3_1636571274.png'),
(6, 'UM STRIKE – GREY TIE DYE', 'Ultraman strikes out on new paths to become a beacon of courage in today’s generation.', '950', 19, 'Yes', 'Yes', '../images/db5_1636571298.png'),
(7, 'UM OG L/S – WHITE', 'Features OG Ultras present from the ULTRAMAN series.', '950', 19, 'Yes', 'Yes', '../images/db4_1636571393.png'),
(8, 'WEAVER SHORTS – BLACK', 'The weaver designs on the shorts are fully embroidered.', '1350', 19, 'Yes', 'Yes', '../images/db6_1636571377.png'),
(9, 'ROTATION CUBAN POLO BLACK', 'A compilation of all the designs of DBTK logos used in the Prime Rotation collection.', '1800', 19, 'Yes', 'Yes', '../images/db7_1636571413.png'),
(10, 'ENEMY SPOTTED BLACK', 'The design is a homage to one of the famous 90’s game enjoyed by the Kids back then.', '850', 19, 'Yes', 'Yes', '../images/db8_1636571446.png'),
(11, '\"YBYR\" - Off-white', 'It reminds the people around you that “Your Body Your Rules”', '649', 17, 'Yes', 'Yes', '../images/s1_1636571571.png'),
(12, '	\"OG MANTRA\" (Hoodie) - Choco Brown', 'This is the OG MANTARA with know your worth text at the back.', '899', 17, 'Yes', 'Yes', '../images/s2_1636571617.png'),
(13, 'RUNKERS TEE - WHITE (Enimal x Sumptuous)', 'Runners and a Bikers tee collaboration with Enimal WorldWide', '749', 17, 'Yes', 'Yes', '../images/s3_1636571646.png'),
(14, '\"KNOW YOUR WORLD\" (Black) - Sumptuous x Clouds', '“KNOW YOUR WORLD” tee a Sumptuous and Clouds collaboration.', '649', 17, 'Yes', 'Yes', '../images/s4_1636571676.png'),
(15, '\"KNOW YOUR WORLD\" Mesh Shorts (Black) - Sumptuous x Clouds', '“KNOW YOUR WORLD” mesh shorts a Sumptuous and Clouds collaboration.', '699', 17, 'Yes', 'Yes', '../images/s5_1636571699.png'),
(16, '\"STAY HOME\" - White', '“STAY HOME TEE” telling us to stay home due to the pandemic', '649', 17, 'Yes', 'Yes', '../images/s6_1636571754.png'),
(17, '\"NCARCH\" - Hat (Navy)', 'A corduroy five panel hat with Sumptuous OG logo', '649', 17, 'Yes', 'Yes', '../images/s7_1636571852.png'),
(18, 'Shatter (Maroon)', 'Simple daily grind shattered box tee logo.', '789', 20, 'Yes', 'Yes', '../images/d1_1636571875.png'),
(19, 'DG AlLeycat (Navy Blue)', 'Bone Breaker Tee', '795', 20, 'Yes', 'Yes', '../images/d2_1636571892.png'),
(20, 'Scratch (Black)', 'A daily grind originals with vinyl player design', '795', 20, 'Yes', 'Yes', '../images/d3_1636571911.png'),
(24, 'Rid (Black)', 'Daily Grind OG Tee', '795', 20, 'Yes', 'Yes', '../images/d4_1636571993.png'),
(25, 'Sign (White)', 'Daily grind white tee', '695', 20, 'Yes', 'Yes', '../images/d5_1636572017.png'),
(26, 'Reflection (Black)', 'A front and back reflection tee', '795', 14, 'Yes', 'Yes', '../images/d8_1636572048.png'),
(43, 'Enimal HOODIE', 'The design was carefully embroidered, expect nothin but the best, g', '990', 18, 'Yes', 'Yes', '../images/e2_1636572136.png'),
(44, 'Sunset Dye', 'Loved by the folks of the 60s, the DIY fashion movement of dyeing garments carried through the decades. The rainbow dye is one of the most iconic designs in the history of dyeing. Now, we offer our version of the dye using our signature custom hoodie. Mak', '2500', 18, 'Yes', 'Yes', '../images/e7_1636572113.png'),
(45, 'Midnight Ringer', 'Just your classic ringer tee... with a twist. This structure black ringer tee is just pure gnar. A unique apparel experience manufactured to perfection, g.', '850', 18, 'Yes', 'Yes', '../images/e1_1636572168.png'),
(46, 'HUNTER CORDUROY', 'The prime corduroy 5-panel hat choice due to its tough, high-quality material and classic patched logo. Only the gnarliest of the gnar deserves to wear this, g.', '800', 18, 'Yes', 'Yes', '../images/e5_1636572193.png'),
(47, 'CARAMEL CORDUROY', 'This caramel shade is one of our favorite tones and yall know how we take our color game seriously. Comes in VERY limited quantities. You know what to do, g', '850', 18, 'Yes', 'Yes', '../images/e6_1636572207.png'),
(48, 'STRUT BREAKER', 'Top-quality nylon cut in that fit you can only find at Gnarly. And yall know we always go hard on the colors. The wind aint got a chance on this jacket, g.', '2500', 18, 'Yes', 'Yes', '../images/e4_1636572245.png'),
(49, 'CRANBERRY SHORTS', 'With this sweet pair of shorts, It doesnt matter whether youre chilling or working. worrying about what to wear becomes moot. Soft and cool – just the way you like it!', '650', 18, 'Yes', 'Yes', '../images/e3_1636572262.png'),
(50, 'BUCKETSQUAD WORLD TEE', 'BucketSquad World Tee is here for the newest 2K drop!', '1500', 15, 'Yes', 'Yes', '../images/b4_1636572286.jpg'),
(51, 'BUCKETSQUAD STICKER PACK L/S TEE', 'The first BucketSquad release of 2021- The Sticker Pack L/S Tee!', '1300', 15, 'Yes', 'Yes', '../images/b7_1636572307.jpg'),
(52, 'BUCKETSQUAD BACKPACK', 'The BucketSquad Backpack is here, so you can always rep Jesser and BucketSquad!', '2800', 15, 'Yes', 'Yes', '../images/b5_1636572321.jpg'),
(53, 'BUCKETSQUAD CORE HEADBAND', 'BucketSquad 3 Million Subscriber Headband', '1000', 15, 'Yes', 'Yes', '../images/b2_1636572337.jpg'),
(54, 'BUCKETSQUAD SOCKS', 'The BucketSquad Socks is a pair of mid cut crew socks thats perfect for playing basketball or just kicking back and playing 2K.', '900', 15, 'Yes', 'Yes', '../images/b1_1636572348.jpg'),
(55, 'BUCKETSQUAD STICKER PACK TEE', 'The first BucketSquad release of 2021! The Sticker Pack Tee features a bunch of BucketSquad designs all over the front of the tee.', '1800', 15, 'Yes', 'Yes', '../images/b6_1636572375.jpg'),
(62, 'BUCKETSQUAD 3MIL JERSEY', 'Jesser just reached 3 million subscribers, and hes releasing an exclusive jersey just for you! The jersey features an interlocking poly-mesh to keep you cool and dry while wearing this heat! Its only available for 7 days, so get yours now!', '650', 15, 'Yes', 'Yes', '../images/b8_1636572388.jpg'),
(63, 'BUCKETSQUAD ASW L/S TEE', 'Soft & cozy | 100% combed ring-spun cotton making the shirt soft to the touch', '1400', 15, 'Yes', 'Yes', '../images/b3_1636572400.jpg'),
(64, 'Team Payaman x Mr. Men Take Over Black T-Shirt', 'Our first ever collab is here! Celebrating the 50th anniversary year of Mr. Men Little Miss Character take over logo and Sidemen character heat transfer design.', '1000', 14, 'Yes', 'Yes', '../images/t1_1636572427.jpg'),
(65, 'TEAM PAYAMAN SHIRT (cong clothing) KAPITANTANAN SHIRT', '2020 GSM!!!! MAKAPAL NA TELA, QUALITY PA! DI KA NA LUGI MURA PA!!', '350', 14, 'Yes', 'Yes', '../images/t2_1636572451.jpg'),
(66, 'TEAM PAYAMAN LT. BLUE CREWNECK', 'This lightweight crewneck sweatshirt features hidden side-zipper pockets along with 2HYPE going across the chest! Keep it fresh and cozy', '500', 14, 'Yes', 'Yes', '../images/t8_1636572476.jpg'),
(67, 'TEAM PAYAMAN VOLT TEE', 'Cong TV has partnered with Ballislife to bring you the freshest merch!', '600', 14, 'Yes', 'Yes', '../images/t5_1636572505.jpg'),
(68, 'TEAM PAYAMAN LOGO BLUE/BLACK TEE', 'Team Payaman has partnered with Ballislife to bring you the freshest merch! The Team Payaman Logo Blue Tee features the 2HYPE logo on the front chest of the blue tee. ', '650', 14, 'Yes', 'Yes', '../images/t6_1636572527.jpg'),
(69, 'TEAM PAYAMAN MULTICOLOR T-SHIRT', 'Stay fly like Cong, Keng, Junnie Boy, Burong, Beigh, and Yow with their multicolor drop - the Team Payaman Multicolor Collection!', '650', 14, 'Yes', 'Yes', '../images/t4_1636572549.jpg'),
(70, 'TEAM PAYAMAN CHROMED', 'A surefire icon, well be damned if you dont get this one for your collection – its a G! Masterpiece', '800', 14, 'Yes', 'Yes', '../images/t7_1636572568.jpg'),
(71, 'TEAM PAYAMAN ARCTIC PANEL', 'Its that shade of blue that we couldve sworn to make things cooler, or less hot. Its that type of color that goes well with a lot of outfits and most occasions and its a color were very proud of.', '850', 14, 'Yes', 'Yes', '../images/t3_1636572594.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `description`) VALUES
(1, 'Small'),
(2, 'Medium'),
(3, 'Large'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `contact`, `address`, `username`, `password`, `email`) VALUES
(1, 'John Ashley Capistrano', '09286541258', 'Brgy. Mamatid Cabuyao Next Door Men', 'lapido', '600ac960e507e2471bb83380d14ba9d5', 'capistranoja@gmail.com'),
(2, 'Clark John Casin', '09284605028', 'Brgy. Turbina Calamba City Laguna', 'clark000112', '202cb962ac59075b964b07152d234b70', 'clarktoledana01@gmail.com'),
(3, 'John Ashley Capistrano', '09286541258', 'Brgy. Mamatid Cabuyao Next Door Men', 'lapido', '202cb962ac59075b964b07152d234b70', 'capistranoja@gmail.com'),
(4, 'Clark John Casin', '09284605028', 'Brgy. Turbina Calamaba Laguna Purok 3 ', 'Clark', 'ee11cbb19052e40b07aac0ca060c23ee', 'clarktoledana01@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Contact_Number` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `date`, `Name`, `Address`, `Contact_Number`, `Email`) VALUES
(11, 293041077249, 'Ashermanners', 'sean', '2021-11-09 11:21:28', 'John Ashley Capistrano', 'Brgy. Mamatid Cabuyao Likod Extension', 2147483647, 'capistranoja@gmail.com'),
(12, 29256, 'Ashermanners2', 'lodi', '2021-11-09 11:23:53', 'John Ashley Capistrano', 'Brgy. Mamatid Cabuyao Likod Extension', 2147483647, 'capistranoja@gmail.com'),
(13, 67070, 'Ashermanners2', 'lodi', '2021-11-09 11:45:17', 'John Ashley Capistrano', 'Brgy. Mamatid Cabuyao Likod Extension', 2147483647, 'capistranoja@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
