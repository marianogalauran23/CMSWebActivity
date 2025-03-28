-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2025 at 03:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websitecmsactivity`
--

-- --------------------------------------------------------

--
-- Table structure for table `design_settings`
--

CREATE TABLE `design_settings` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(100) NOT NULL,
  `setting_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `design_settings`
--

INSERT INTO `design_settings` (`id`, `setting_name`, `setting_value`) VALUES
(1, 'navbar_bg_color', 'transparent'),
(2, 'navbar_scrolled_bg_color', 'black'),
(3, 'navbar_padding', '15px 20px'),
(4, 'hero_text_color', 'white'),
(5, 'hero_text_position', 'center'),
(6, 'info_section_bg_color', '#1e1e1e'),
(7, 'info_box_bg_color', 'black'),
(8, 'info_box_text_color', 'white'),
(9, 'highlight_bg_color', 'white'),
(10, 'highlight_text_color', '#333'),
(11, 'news_section_bg_color', 'white'),
(12, 'news_text_color', '#333'),
(13, 'research_title_bg_color', '#333'),
(14, 'research_title_text_color', 'white'),
(15, 'event_card_bg_color', 'transparent'),
(16, 'event_text_color', '#333'),
(17, 'footer_bg_color', '#333'),
(18, 'footer_text_color', 'white'),
(19, 'link_hover_color', '#f4c542'),
(20, 'border_radius', '8px');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `design_settings`
--
ALTER TABLE `design_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `design_settings`
--
ALTER TABLE `design_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
