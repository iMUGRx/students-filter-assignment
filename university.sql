-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2026 at 10:34 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `student_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_number`, `full_name`, `birth_date`, `phone`, `email`, `department`, `created_at`) VALUES
(1, '20250001', 'أحمد عبدالعزيز العتيبي', '2003-04-12', '0551234567', 'ahmed.ot@gmail.com', 'SW', '2026-01-10 22:33:22'),
(2, '20250002', 'محمد صالح الزهراني', '2002-11-03', '0552345678', 'mo.zahrani@gmail.com', 'IT', '2026-01-10 22:33:22'),
(3, '20250003', 'عبدالرحمن خالد القحطاني', '2003-01-25', '0553456789', 'a.qhtani@gmail.com', 'MIS', '2026-01-10 22:33:22'),
(4, '20250004', 'فهد ناصر الغامدي', '2002-06-18', '0554567890', 'fahd.gh@gmail.com', 'SW', '2026-01-10 22:33:22'),
(5, '20250005', 'يوسف إبراهيم الشهري', '2003-09-09', '0555678901', 'y.alshahri@gmail.com', 'IT', '2026-01-10 22:33:22'),
(6, '20250006', 'عمر فيصل الحربي', '2002-03-30', '0556789012', 'omar.harbi@gmail.com', 'MIS', '2026-01-10 22:33:22'),
(7, '20250007', 'سامي عبدالله المطيري', '2003-12-15', '0557890123', 'sami.mt@gmail.com', 'SW', '2026-01-10 22:33:22'),
(8, '20250008', 'طلال سعد الدوسري', '2002-08-22', '0558901234', 'talal.ds@gmail.com', 'IT', '2026-01-10 22:33:22'),
(9, '20250009', 'نواف حمد السبيعي', '2003-05-07', '0559012345', 'nawaf.sb@gmail.com', 'MIS', '2026-01-10 22:33:22'),
(10, '20250010', 'مازن عبدالملك البلوي', '2002-10-28', '0550123456', 'mazen.bl@gmail.com', 'SW', '2026-01-10 22:33:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_number` (`student_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
