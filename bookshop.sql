-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 04:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(12) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `name`, `email`, `password`, `isAdmin`) VALUES
(1, 'Smriti', 'smriti@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'Nikki', 'n@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 0),
(3, 'Aditi', 'a@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0),
(4, 'Kirti', 'k@gmail.com', 'd6a9a933c8aafc51e55ac0662b6e4d4a', 0),
(5, 'aman', 'neo@gmail.com', '8b4cf0258846b23e0a8272bee22c38dd', 0),
(6, 'Smriti', 's@gmail.com', 'd6a9a933c8aafc51e55ac0662b6e4d4a', 0),
(7, 'Trevor Martin', 'ss@gmail.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 0),
(8, 'kirti', 'k@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `adress`
--

CREATE TABLE `adress` (
  `address_id` int(12) NOT NULL,
  `user_id` int(15) NOT NULL,
  `alt_name` varchar(200) NOT NULL,
  `alt_contact` varchar(12) NOT NULL,
  `street` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `house_no` varchar(140) NOT NULL,
  `landmark` varchar(130) NOT NULL,
  `city` varchar(120) NOT NULL,
  `state` varchar(120) NOT NULL,
  `pincode` int(8) NOT NULL,
  `type` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adress`
--

INSERT INTO `adress` (`address_id`, `user_id`, `alt_name`, `alt_contact`, `street`, `area`, `house_no`, `landmark`, `city`, `state`, `pincode`, `type`) VALUES
(3, 1, 'Smriti', '1122334658', 'Madhubani', 'Churi Chowk', 'ww475235', 'near durga mandir', 'Purnia', 'Bihar', 854301, '1'),
(4, 1, 'Miriam Watson', '1345889612', 'Rhea Obrien', 'Roary Franco', '45788igh', 'Kendall Lucas', 'Joy Brock', 'Herrod Summers', 1346863, '0'),
(8, 4, 'Fitzgerald Erickson', 'Felicia Card', 'Nissim Bean', 'Ferris Church', '457954', 'Willow Wright', 'Cheyenne Holloway', 'Yvonne Flores', 1336468, '0');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `no_of_pages` int(30) DEFAULT NULL,
  `isbn` varchar(100) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_of_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` float DEFAULT NULL,
  `discount_price` float DEFAULT NULL,
  `nos` int(12) DEFAULT NULL,
  `cover_image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `no_of_pages`, `isbn`, `category`, `description`, `date_of_created`, `price`, `discount_price`, `nos`, `cover_image`) VALUES
(1, 'ertytuygh', 'fdhgjhjhk', 915, '2147483647', '1', 'tdryfugighiuoiiopiutyrewrtyuhgxcvjhjgfdtyrertyuuffghj', '2023-09-21 02:19:43', 700, 580, 5, 'img1.jpg'),
(2, 'Senior Secondary School Mathematics for Class 11 NEW EDITION Edition  ', 'R S Agrawal', 915, '2147483647', '1', 'Senior Secondary School Mathematics For Class 11 is a textbook of Mathematics for students of Class 11.\r\n\r\nSummary Of The Book\r\n\r\nSenior Secondary School Mathematics For Class 11 is in accordance with the latest syllabus issued by the Central Board Of Secondary Education for students of intermediate classes. ', '2023-09-21 02:20:54', 700, 580, 5, 'img1.jpg'),
(3, 'The Girl in Room 105 ', 'Chetan Bhagat', 340, '9781542040464', '8', 'Hi, I am Keshav, and my life is screwed. I hate my job and my girlfriend left me. Ah, the beautiful Zara. Zara is from Kashmir. She is a Muslim. And did I tell you my family is a bit, well, traditional? Anyway, leave that.\r\n\r\nZara and I broke up four years ago. She moved on in life. I didnt. I drank every night to forget her. I called, messaged, and stalked her on social media. She just ignored me.', '2023-09-21 02:48:11', 500, 250, 7, 'img2.jpg'),
(4, 'NCERT Solutions Mathematics Class 11th', 'Lalit Goel', 340, '9789382111139', '1', 'Key Features * Every chapter starts with Important result included important terms for understanding the concept well. * All formulae and hints are provided in detail. * Exercise and Additional exercise are provided in each chapter with their detailed solutions. ', '2023-09-21 02:54:30', 500, 250, 78, 'img4.jpg'),
(5, 'Organic Chemistry', 'Morrison Boyd & Bhattacharjee', 1472, '9788131704813', '1', 'Organic chemistry is a subdivision of chemistry which deals with the learning of the structure, properties and reactions of organic mixtures and materials. Organic chemistry expresses the concepts and the basics of the topic in reader-friendly language. The book is divided into many sections that talk about the different features of this subdivision.', '2023-09-21 02:57:21', 2000, 910, 7, 'img5.jpg'),
(6, 'Modern Approach to Chemical Calculations Pb ', 'RC Mukerjee', 872, '9788177096415', '1', 'Modern Approach to Chemical Calculations Pb ', '2023-09-21 02:59:11', 500, 250, 87, 'img6.jpg'),
(7, 'Programming in C', 'Reema Thareja', 464, '9780199456147', '7', 'This second edition of Programming in C is designed to serve as a textbook for the undergraduate students of computer science engineering, computer applications, and computer science. It provides a comprehensive coverage of the fundamental concepts of C programming.', '2023-09-21 03:01:25', 500, 250, 78, 'img7.jpg'),
(8, 'New Simplified Physics', 'Arora S. L', 915, '9788177002225', '1', 'Arora S. L New Simplified Physics', '2023-09-21 03:04:02', 2000, 1432, 78, 'Img9.html'),
(9, 'Pointerz 6', 'wwertyu', 340, '9789386284334', '6', 'school book', '2023-09-21 03:05:27', 175, 170, 5, 'img10.jpg'),
(10, 'MARINA PUBLICATIONS REVISED KNOWLEDGE WORLD CLASS 7  (English, Paperback, DR SHIVAJYOTI KUMKHERJEE)', 'DR SHIVAJYOTI KUMKHERJEE', 345, '9789385881275', '6', 'DR SHIVAJYOTI KUMKHERJEE MARINA PUBLICATIONS REVISED KNOWLEDGE WORLD CLASS 7  (English, Paperback, DR SHIVAJYOTI KUMKHERJEE)', '2023-09-21 03:06:58', 700, 580, 78, 'img10.jpg'),
(11, 'Digital Computer Fundamentals', 'Thomas C Bartee', 610, '9780074604007', '7', 'Digital Computer Fundamentals', '2023-09-21 04:16:41', 2000, 580, 5, 'img13.jpg'),
(12, 'Data Structure and Algorithmic Thinking with Python ', 'Karumanchi Narasimha', 460, '9788192107592', '7', 'Narasimha Karumanchis Data Structure and Algorithmic Thinking with Python is designed to help programmers as well as test takers of competitive exams and those looking for jobs by making them more confident with data structures and smarter in finding different solutions to approaches to one problem. ', '2023-09-21 04:18:57', 700, 580, 7, 'img14.jpg'),
(13, 'PRACTICAL GUIDE TO ENGLISH Grammar ', 'KPThakur', 340, '9788177094770', '6', 'Reading books is a kind of enjoyment. Reading books is a good habit. We bring you a different kinds of books. You can carry this book where ever you want. It is easy to carry. It can be an ideal gift to yourself and to your loved ones. Care instruction keep away from fire.', '2023-09-21 04:21:06', 175, 170, 4, 'img15.jpg'),
(14, 'HOW TO WIN FRIENDS AND INFLUENCE PEOPLE ', ' DALE CARNEGIE', 340, '9789386037749', '6', 'HOW TO WIN FRIENDS AND INFLUENCE PEOPLE - The First and Still the Best Book of Its kind on Self-Help ', '2023-09-21 04:23:38', 320, 250, 75, 'img16.jpg'),
(15, 'Introduction to Computer Graphics 1st Edition ', 'Krishnamurthy N', 915, '9780070435360', '7', 'The book deals with the nuts and bolts of Computer Graphics to render a rich and detailed account of the subject. Salient Features : Detailed coverage of mathematical theory underlying computer graphics applications; coverage includes : bezier curves, applications, drawing algorithms, clipping, modelling transformations, Windows, Viewport and image manipulation and 3-D definition schemes; programming', '2023-09-21 04:25:42', 2000, 1432, 7, 'img17.jpg'),
(16, '3 And a Half Murders', 'Salil Desai ', 328, '978-8175994256', '2', 'Two corpses . . . a woman lying dead on her bed, a man hanging from the ceiling fan. A suicide note cum murder confession. And a name . . . Shaunak Sodhi. When the case comes their way, Senior Inspector Saralkar has just been diagnosed with hypertension and PSI Motkar is busy with rehearsals of an amateur play. What appears at first to be a commonplace crime by a debt-ridden, cuckolded husband, who has killed his unfaithful wife and then hung himself, soon begins to unfold as a baffling mystery. As clues point to a seven-year-old unsolved murder in Bangalore and other leads emerge closer home, Saralkar and Motkar find themselves investigating shady secrets, bitter grudges, fishy land deals, carnal desires, the dead woman Anushka Doshis sinister obsession with past life regression and her husbands links to a suspicious, small-time god-man, Rangdev Baba.And then, suddenly, the murderer resurfaces and yet another life is in grave danger . . . Can Saralkar and Motkar get to the bottom of an unimaginably shocking motive and stop the malevolent killer from committing the fourth murder . . .?', '2023-09-25 16:47:52', 200, 179, 7, ''),
(17, 'sfdgfgjhkj', 'R S Agrawal', 915, '9788177096415', '2', 'zxcvbn,.rtyuiope78fghjjoyuio', '2023-09-28 01:43:00', 500, 250, 4, 'img18.jpg'),
(18, 'sdfghjnmklliouggdfzcc', 'wertyui', 340, '9789382111139', '3', 'zxcvbnm,lkjhgfdsaqwertyuioplkjhgfdsazxcvbnmklkjhgfdsaertyuiopoiuyfdfghjkcxcvjk', '2023-09-28 01:44:22', 700, 580, 75, 'img17.jpg'),
(19, 'cxvbvnm', 'dfjk', 340, '9789384761370', '5', 'xcvbnmkjhgfdrtyu', '2023-09-28 01:46:21', 2000, 1432, 75, 'img18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'science'),
(2, 'crime'),
(3, 'biograpy'),
(4, 'comedy'),
(5, 'Romance'),
(6, 'School books'),
(7, 'Computer Science'),
(8, 'Mystery');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(12) NOT NULL,
  `coupon_code` varchar(150) NOT NULL,
  `coupon_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `coupon_amount`) VALUES
(1, 'FIRST500', 500),
(2, 'FIRST50', 50),
(4, 'B1G1', 150);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `is_ordered` tinyint(1) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `coupon_id`, `address_id`, `payment_id`, `is_ordered`, `createdAt`) VALUES
(49, 4, 4, 8, NULL, 1, '2023-10-05 04:26:43'),
(50, 0, NULL, NULL, NULL, 0, '2023-10-05 18:48:01'),
(51, 1, 4, 7, NULL, 1, '2023-10-05 18:48:26'),
(52, 4, 4, 8, NULL, 1, '2023-10-06 03:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `oi_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `is_ordered` tinyint(1) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`oi_id`, `book_id`, `qty`, `is_ordered`, `order_id`) VALUES
(88, 1, 1, 0, 49),
(89, 2, 1, 0, 50),
(94, 2, 1, 0, 51),
(95, 2, 1, 0, 49),
(96, 3, 1, 0, 52);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`oi_id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `adress`
--
ALTER TABLE `adress`
  MODIFY `address_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `oi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
