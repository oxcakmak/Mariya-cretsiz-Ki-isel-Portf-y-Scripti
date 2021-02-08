-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2021 at 12:07 AM
-- Server version: 10.2.33-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oxcakma1_mariya`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(20) NOT NULL,
  `banner_slug` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `banner_text` char(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_slug`, `banner_text`) VALUES
(5, '0f4481c1ed9ca2b937370ba052b77481', 'Back-End Developer'),
(6, '0a82a3736eb79152dc5c2a7217eaecb4', 'Graphic Desginer'),
(4, '8fb53fd507a6ff3db47e06129c3cef33', 'Web Designer');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(20) NOT NULL,
  `category_slug` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `category_title` char(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_slug`, `category_title`) VALUES
(1, 'tasarim', 'Tasarım');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(20) NOT NULL,
  `contact_hash` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `contact_fullname` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `contact_email` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `contact_subject` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `contact_message` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `contact_address` char(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `contact_date` char(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_hash`, `contact_fullname`, `contact_email`, `contact_subject`, `contact_message`, `contact_address`, `contact_date`) VALUES
(1, '0beff37d841e3bea0fb117c485f99e2a', 'John Doe', 'john@gmail.com', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '::1', '11.01.2021-20:05');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `counter_id` int(20) NOT NULL,
  `counter_slug` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `counter_number` char(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `counter_title` char(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`counter_id`, `counter_slug`, `counter_number`, `counter_title`) VALUES
(1, 'successul-projects', '2500', 'Successul Projects'),
(2, 'happy-customer', '1000', 'Happy Customer');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolio_id` int(20) NOT NULL,
  `portfolio_slug` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `portfolio_thumbnail` char(100) COLLATE utf8_turkish_ci DEFAULT 'assets/index/img/portfolio.jpg',
  `portfolio_title` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `portfolio_category` char(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_slug`, `portfolio_thumbnail`, `portfolio_title`, `portfolio_category`) VALUES
(1, 'lorem', 'assets/index/img/portfolio.jpg', 'Lorem', 'tasarim'),
(3, 'portfoy-2', 'assets/index/img/portfolio.jpg', 'Portföy-2', 'tasarim'),
(4, 'portfoy-3', 'assets/index/img/portfolio.jpg', 'Portföy-3', 'tasarim');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `resume_id` int(20) NOT NULL,
  `resume_slug` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `resume_title` char(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `resume_subtitle` char(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `resume_year` char(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `resume_description` char(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `resume_type` enum('education','experience') COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`resume_id`, `resume_slug`, `resume_title`, `resume_subtitle`, `resume_year`, `resume_description`, `resume_type`) VALUES
(1, 'computer-science', 'Computer science', 'Apple Inc.', '2020', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Enim eveniet incidunt quidem.', 'education'),
(2, 'frontend-developer', 'Frontend-developer', 'Web Agency', '2019 - 202', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Enim eveniet incidunt quidem.', 'experience');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(20) NOT NULL,
  `service_slug` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `service_thumbnail` char(100) COLLATE utf8_turkish_ci DEFAULT 'assets/index/img/733547.svg',
  `service_title` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `service_description` char(250) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_slug`, `service_thumbnail`, `service_title`, `service_description`) VALUES
(1, '18f86d1824e38620183986f639392f86', 'assets/index/img/733547.svg', 'Web Development', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis lectus tortor et congue felis laoreet.');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(20) NOT NULL,
  `setting_meta_title` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_meta_description` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_meta_keyword` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_meta_stuck` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_index_small_title` char(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_index_typewriter_header` char(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_index_typewriter_text` char(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_index_paragraph` char(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_particle_status` enum('0','1') COLLATE utf8_turkish_ci DEFAULT '1',
  `setting_banner` char(100) COLLATE utf8_turkish_ci DEFAULT 'assets/index/img/banner.jpg',
  `setting_about_text` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_about_special_text` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_about_description` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_about_image` char(100) COLLATE utf8_turkish_ci DEFAULT 'assets/index/img/about.jpg',
  `setting_contact_address` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_contact_email` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_contact_phone` char(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_meta_title`, `setting_meta_description`, `setting_meta_keyword`, `setting_meta_stuck`, `setting_index_small_title`, `setting_index_typewriter_header`, `setting_index_typewriter_text`, `setting_index_paragraph`, `setting_particle_status`, `setting_banner`, `setting_about_text`, `setting_about_special_text`, `setting_about_description`, `setting_about_image`, `setting_contact_address`, `setting_contact_email`, `setting_contact_phone`) VALUES
(1, 'Mariya', 'Personal Portfolio Template', 'mariya, oxcakmak', 'Mariya', 'Merhaba!', 'I Am', 'Front-End Developer', 'Profosyonel tek sayfa portföy teması', '1', 'assets/index/img/banner.jpg', 'I am Professional', 'Web Designer', 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'assets/index/img/about.jpg', 'San Francisco, CA', 'info@oxcakmak.com', '+90 262 606 0829');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(20) NOT NULL,
  `testimonial_hash` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `testimonial_picture` char(100) COLLATE utf8_turkish_ci DEFAULT 'assets/index/img/testimonial.jpg',
  `testimonial_fullname` char(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `testimonial_job` char(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `testimonial_content` char(255) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `testimonial_hash`, `testimonial_picture`, `testimonial_fullname`, `testimonial_job`, `testimonial_content`) VALUES
(1, '90f1dcc304a6e43c17065d6cc7831453', 'assets/index/img/testimonial.jpg', 'John DOE', 'CEO', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Enim eveniet incidunt quidem.');

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE `text` (
  `text_id` int(20) NOT NULL,
  `text_hash` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `text_text` char(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `user_username` char(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_password` char(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`) VALUES
(1, 'admin', '3095ee219dea85f67c1e3a87898c1d5f7b712d20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`) USING BTREE;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`counter_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolio_id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`resume_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`text_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `counter_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolio_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `resume_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `text`
--
ALTER TABLE `text`
  MODIFY `text_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
