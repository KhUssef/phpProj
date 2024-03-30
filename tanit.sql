-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 05:42 PM
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
-- Database: `tanit`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `jobid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `years` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `name`, `years`) VALUES
(1, 'Programming', 1),
(2, 'Programming', 2),
(3, 'Programming', 3),
(4, 'Programming', 4),
(5, 'Programming', 5),
(6, 'Graphic Design', 1),
(7, 'Graphic Design', 2),
(8, 'Graphic Design', 3),
(9, 'Graphic Design', 4),
(10, 'Graphic Design', 5),
(11, 'Writing', 1),
(12, 'Writing', 2),
(13, 'Writing', 3),
(14, 'Writing', 4),
(15, 'Writing', 5),
(16, 'Data Entry', 1),
(17, 'Data Entry', 2),
(18, 'Data Entry', 3),
(19, 'Data Entry', 4),
(20, 'Data Entry', 5),
(21, 'Web Development', 1),
(22, 'Web Development', 2),
(23, 'Web Development', 3),
(24, 'Web Development', 4),
(25, 'Web Development', 5),
(26, 'Translation', 1),
(27, 'Translation', 2),
(28, 'Translation', 3),
(29, 'Translation', 4),
(30, 'Translation', 5),
(31, 'Digital Marketing', 1),
(32, 'Digital Marketing', 2),
(33, 'Digital Marketing', 3),
(34, 'Digital Marketing', 4),
(35, 'Digital Marketing', 5),
(36, 'Illustration', 1),
(37, 'Illustration', 2),
(38, 'Illustration', 3),
(39, 'Illustration', 4),
(40, 'Illustration', 5),
(41, 'Video Editing', 1),
(42, 'Video Editing', 2),
(43, 'Video Editing', 3),
(44, 'Video Editing', 4),
(45, 'Video Editing', 5),
(46, 'Customer Service', 1),
(47, 'Customer Service', 2),
(48, 'Customer Service', 3),
(49, 'Customer Service', 4),
(50, 'Customer Service', 5),
(51, 'Photography', 1),
(52, 'Photography', 2),
(53, 'Photography', 3),
(54, 'Photography', 4),
(55, 'Photography', 5),
(56, 'Social Media Management', 1),
(57, 'Social Media Management', 2),
(58, 'Social Media Management', 3),
(59, 'Social Media Management', 4),
(60, 'Social Media Management', 5),
(61, 'SEO', 1),
(62, 'SEO', 2),
(63, 'SEO', 3),
(64, 'SEO', 4),
(65, 'SEO', 5),
(66, 'UI/UX Design', 1),
(67, 'UI/UX Design', 2),
(68, 'UI/UX Design', 3),
(69, 'UI/UX Design', 4),
(70, 'UI/UX Design', 5),
(71, 'Transcription', 1),
(72, 'Transcription', 2),
(73, 'Transcription', 3),
(74, 'Transcription', 4),
(75, 'Transcription', 5),
(76, 'Content Writing', 1),
(77, 'Content Writing', 2),
(78, 'Content Writing', 3),
(79, 'Content Writing', 4),
(80, 'Content Writing', 5),
(81, 'Animation', 1),
(82, 'Animation', 2),
(83, 'Animation', 3),
(84, 'Animation', 4),
(85, 'Animation', 5),
(86, 'Voice Over', 1),
(87, 'Voice Over', 2),
(88, 'Voice Over', 3),
(89, 'Voice Over', 4),
(90, 'Voice Over', 5),
(91, 'Virtual Assistant', 1),
(92, 'Virtual Assistant', 2),
(93, 'Virtual Assistant', 3),
(94, 'Virtual Assistant', 4),
(95, 'Virtual Assistant', 5),
(96, 'Copywriting', 1),
(97, 'Copywriting', 2),
(98, 'Copywriting', 3),
(99, 'Copywriting', 4),
(100, 'Copywriting', 5);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `req1` int(11) DEFAULT NULL,
  `req2` int(11) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  `master` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `description`, `price`, `req1`, `req2`, `state`, `master`) VALUES
(1, 'Job 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus rutrum, dui ac.', 100.00, 45, 48, 'active', 1),
(3, 'Job 3', 'Integer quis leo at arcu maximus tristique. Nam nec odio nec ligula rhoncus.', 200.00, 20, 6, 'active', 1),
(4, 'Job 4', 'Donec lacinia ullamcorper velit ut rhoncus. Fusce eleifend condimentum libero nec.', 120.00, 65, 78, 'pending', 1),
(5, 'Job 5', 'Nulla facilisi. Sed interdum dui et ligula bibendum, vel consectetur arcu vehicula.', 180.00, 90, 74, 'active', 1),
(6, 'Job 6', 'Sed gravida, justo et aliquet ultricies, mi tortor fermentum justo, ut blandit mi.', 250.00, 30, 32, 'pending', 1),
(7, 'Job 7', 'Suspendisse potenti. Donec tincidunt vestibulum libero, non suscipit nunc pretium vel.', 300.00, 70, 41, 'active', 1),
(8, 'Job 8', 'Nullam vitae eros id risus pellentesque eleifend. Nullam porttitor mi nec ligula vestibulum.', 170.00, 50, 6, 'inactive', 1),
(9, 'Job 9', 'At hendrerit mi ultricies. Sed aliquet ipsum nec arcu pharetra, a placerat tortor fringilla.', 220.00, 85, 8, 'active', 1),
(10, 'Job 10', 'Suspendisse auctor dictum neque ut pharetra.', 130.00, 25, 21, 'pending', 1),
(11, 'Job 11', 'In hac habitasse platea dictumst. Morbi nec nisi a risus cursus ultrices.', 280.00, 60, 83, 'active', 1),
(12, 'Job 12', 'Sed nec nisi eget dolor ultricies tincidunt. Nulla facilisi.', 190.00, 40, 48, 'pending', 1),
(13, 'Job 13', 'Aenean eu ullamcorper magna, in aliquet metus. Sed ut quam non magna tincidunt varius.', 240.00, 95, 92, 'active', 1),
(14, 'Job 14', 'Duis vehicula justo at nulla posuere scelerisque. Suspendisse consectetur nunc id blandit malesuada.', 160.00, 10, 17, 'inactive', 1),
(15, 'Job 15', 'Cras sed nisi gravida, tincidunt mi in, maximus nulla. Pellentesque hendrerit auctor diam, vel bibendum felis.', 170.00, 75, 6, 'active', 1),
(16, 'Job 16', 'Proin quis ligula ut sapien commodo fermentum. Fusce vulputate tristique turpis.', 210.00, 35, 81, 'pending', 1),
(17, 'Job 17', 'Curabitur eget massa ut nulla vehicula dapibus. In sagittis nec magna sit amet eleifend.', 140.00, 55, 85, 'active', 1),
(18, 'Job 18', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 230.00, 15, 80, 'inactive', 1),
(19, 'Job 19', 'Vestibulum malesuada orci et est accumsan, nec tincidunt velit ultricies.', 260.00, 70, 44, 'active', 1),
(20, 'Job 20', 'Aliquam quis eros eu libero feugiat fringilla. Sed id leo fermentum, pharetra magna vitae, mollis ipsum.', 180.00, 25, 82, 'pending', 1),
(21, 'Job 21', 'Phasellus sit amet tortor maximus, tempor orci non, malesuada velit.', 290.00, 65, 78, 'active', 2),
(22, 'Job 22', 'Maecenas non velit at elit varius faucibus. Duis et arcu nunc.', 200.00, 45, 43, 'pending', 2),
(23, 'Job 23', 'Quisque ac lacus ac ex ultricies luctus sit amet sed est.', 150.00, 5, 79, 'active', 2),
(24, 'Job 24', 'Nam nec lectus et nisi facilisis fringilla. Nullam hendrerit, elit in molestie tempor, odio nulla posuere nulla, vel sagittis sapien lacus nec tortor.', 270.00, 80, 67, 'inactive', 2),
(25, 'Job 25', 'Suspendisse potenti. Aliquam aliquet ex id erat auctor, in malesuada urna tristique.', 220.00, 35, 98, 'active', 2),
(26, 'Job 26', 'Vivamus euismod mi et eros malesuada, at dictum nulla tristique.', 300.00, 90, 89, 'pending', 2),
(27, 'Job 27', 'Pellentesque ultricies metus in risus ultrices convallis. Nulla facilisi.', 170.00, 15, 49, 'active', 2),
(28, 'Job 28', 'Duis eget ligula ut mauris euismod ullamcorper ut non lacus.', 250.00, 50, 76, 'pending', 2),
(29, 'Job 29', 'Sed vel tortor nec turpis ultrices dignissim a vitae risus.', 160.00, 75, 35, 'active', 2),
(30, 'Job 30', 'Vestibulum tincidunt lacus eget velit vehicula sodales. Suspendisse nec est vel erat fermentum ultricies.', 130.00, 20, 44, 'pending', 2),
(31, 'Job 31', 'Vestibulum vitae risus tincidunt, laoreet felis nec, convallis ligula. Integer auctor dui at neque egestas, a consectetur enim fermentum.', 280.00, 55, 16, 'active', 2),
(32, 'Job 32', 'Vestibulum sed mi tincidunt, vehicula est non, aliquet risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 190.00, 30, 47, 'pending', 2),
(33, 'Job 33', 'Donec a nibh eu sem ultrices dictum. Nulla facilisi.', 240.00, 65, 89, 'active', 2),
(34, 'Job 34', 'Proin eget lectus sed libero scelerisque facilisis. Integer malesuada dignissim velit sit amet consectetur.', 140.00, 10, 1, 'inactive', 2),
(35, 'Job 35', 'Nullam in elit ut mi accumsan aliquam id non sapien.', 170.00, 85, 37, 'active', 2),
(36, 'Job 36', 'Maecenas gravida augue vel metus tempus, ac ullamcorper velit tincidunt.', 210.00, 40, 80, 'pending', 2),
(37, 'Job 37', 'Duis fermentum felis ac enim tristique bibendum. Phasellus nec congue enim.', 140.00, 75, 91, 'active', 2),
(38, 'Job 38', 'Cras nec enim ullamcorper, fermentum ligula id, aliquam sapien. Ut in consequat ipsum.', 290.00, 20, 16, 'pending', 2),
(39, 'Job 39', 'Vestibulum quis orci at magna vehicula interdum. Duis mattis, ligula ut varius aliquam, orci.', 200.00, 55, 4, 'active', 2),
(40, 'Job 40', 'Nullam convallis elit vitae est eleifend, ac gravida sapien vehicula.', 250.00, 80, 71, 'pending', 2),
(41, 'Job 41', 'In luctus libero vitae nulla volutpat, in lacinia nulla condimentum.', 160.00, 35, 45, 'active', 3),
(42, 'Job 42', 'Phasellus euismod ipsum at tempus efficitur. Nulla facilisi.', 170.00, 60, 9, 'inactive', 3),
(43, 'Job 43', 'Curabitur eget justo sed elit faucibus bibendum. Vivamus mattis lacus nec elit maximus, ac aliquam risus elementum.', 220.00, 25, 10, 'active', 3),
(44, 'Job 44', 'Nam vitae tortor nec risus euismod convallis. Donec nec ex ullamcorper, tincidunt libero ut, dignissim ipsum.', 280.00, 70, 21, 'pending', 3),
(45, 'Job 45', 'Fusce ut nisi a orci tincidunt tempor ut et sapien.', 190.00, 5, 77, 'active', 3),
(46, 'Job 46', 'Cras auctor velit et odio venenatis, eget tempor eros tincidunt.', 240.00, 40, 23, 'pending', 3),
(47, 'Job 47', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 140.00, 85, 80, 'active', 3),
(48, 'Job 48', 'Phasellus pharetra dolor ut tellus luctus, in hendrerit justo bibendum.', 290.00, 20, 32, 'pending', 3),
(49, 'Job 49', 'Nullam mattis enim non tristique mollis. Praesent nec erat tellus.', 200.00, 55, 20, 'active', 3),
(50, 'Job 50', 'Proin sed purus nec elit fermentum egestas. Sed vel nunc ullamcorper, consequat turpis sed, blandit mauris.', 250.00, 80, 3, 'pending', 3),
(51, 'Job 51', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus vitae neque tellus.', 160.00, 35, 55, 'active', 3),
(52, 'Job 52', 'Pellentesque eu magna ac mauris congue fermentum nec et dui.', 170.00, 60, 67, 'inactive', 3),
(53, 'Job 53', 'Donec vitae nunc nec eros finibus laoreet. Integer at nulla sed ex.', 220.00, 25, 67, 'active', 3),
(54, 'Job 54', 'Nunc sit amet eros non nunc malesuada placerat vel sed odio.', 280.00, 70, 34, 'pending', 3),
(55, 'Job 55', 'Maecenas ullamcorper magna eget enim venenatis, vel auctor lacus efficitur.', 190.00, 5, 69, 'active', 3),
(56, 'Job 56', 'Curabitur ultricies sem a ipsum suscipit, et tempor magna venenatis.', 240.00, 40, 44, 'pending', 3),
(57, 'Job 57', 'Praesent et odio in mauris aliquet consequat id vel justo.', 140.00, 85, 12, 'active', 3),
(58, 'Job 58', 'Nullam suscipit tortor ac sapien vehicula, id volutpat tortor sodales.', 290.00, 20, 28, 'pending', 3),
(59, 'Job 59', 'Vivamus placerat leo sit amet purus auctor lacinia. Duis ultricies felis ut arcu euismod, nec dictum velit vehicula.', 200.00, 55, 4, 'active', 3),
(60, 'Job 60', 'Integer a tortor nec lacus scelerisque cursus. Maecenas condimentum nulla sed sapien vulputate, eget commodo nulla efficitur.', 250.00, 80, 36, 'pending', 3),
(61, 'Job 61', 'Suspendisse potenti. Aliquam euismod, dui at ultricies egestas, lectus magna efficitur magna, nec suscipit nulla ligula sit amet arcu.', 160.00, 35, 65, 'active', 4),
(62, 'Job 62', 'Curabitur consectetur sapien quis sapien finibus vestibulum. In hac habitasse platea dictumst.', 170.00, 60, 19, 'inactive', 4),
(63, 'Job 63', 'Pellentesque eget neque vel elit vehicula interdum. Maecenas at est tellus.', 220.00, 25, 97, 'active', 4),
(64, 'Job 64', 'Sed lobortis leo in massa ultricies, nec vestibulum risus aliquam.', 280.00, 70, 27, 'pending', 4),
(65, 'Job 65', 'Phasellus id nunc in enim feugiat condimentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', 190.00, 5, 43, 'active', 4),
(66, 'Job 66', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 240.00, 40, 34, 'pending', 4),
(67, 'Job 67', 'Fusce gravida libero vel turpis vehicula, sed aliquet nisi dapibus.', 140.00, 85, 41, 'active', 4),
(68, 'Job 68', 'Vestibulum vel turpis et elit venenatis elementum. Proin sit amet mauris vel libero ullamcorper tincidunt.', 290.00, 20, 3, 'pending', 4),
(69, 'Job 69', 'In euismod tortor a nibh ultrices, at condimentum felis vehicula.', 200.00, 55, 92, 'active', 4),
(70, 'Job 70', 'Duis feugiat elit sit amet enim fermentum, eu dapibus purus semper.', 250.00, 80, 50, 'pending', 4),
(71, 'Job 71', 'Nam interdum elit sed nisi suscipit, quis tempor nisi tempus.', 160.00, 35, 74, 'active', 4),
(72, 'Job 72', 'Cras vitae nulla sed nisl condimentum scelerisque. Vestibulum at scelerisque elit.', 170.00, 60, 20, 'inactive', 4),
(73, 'Job 73', 'Nulla convallis urna ac nunc fringilla, a lobortis justo tristique.', 220.00, 25, 76, 'active', 4),
(74, 'Job 74', 'Fusce et velit vel nisi congue cursus. Integer euismod pharetra ligula, vel fermentum odio vulputate eu.', 280.00, 70, 21, 'pending', 4),
(75, 'Job 75', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 190.00, 5, 76, 'active', 4),
(76, 'Job 76', 'Vivamus sed metus a ipsum tempor dignissim. Nam consequat arcu a metus euismod, sit amet convallis justo placerat.', 240.00, 40, 15, 'pending', 4),
(77, 'Job 77', 'Cras non lorem consequat, condimentum mi nec, molestie ipsum. Morbi et metus nec mi eleifend suscipit.', 140.00, 85, 46, 'active', 4),
(78, 'Job 78', 'Phasellus et augue in felis tincidunt ultrices. Aenean vitae elit eu turpis fringilla fermentum.', 290.00, 20, 86, 'pending', 4),
(79, 'Job 79', 'Duis dapibus ipsum a ante egestas, vitae sollicitudin eros varius.', 200.00, 55, 93, 'active', 4),
(80, 'Job 80', 'Curabitur ut nunc vel turpis ultrices ultricies non at nunc. Vivamus nec mauris tincidunt, aliquam dui vitae, pellentesque velit.', 250.00, 80, 5, 'pending', 4),
(81, 'Job 81', 'In vestibulum nunc id ex tristique blandit. Praesent vel augue non tortor iaculis consequat.', 160.00, 35, 46, 'active', 5),
(82, 'Job 82', 'Sed aliquam leo sed lacus convallis, at accumsan eros feugiat. Phasellus et lectus velit.', 170.00, 60, 14, 'inactive', 5),
(83, 'Job 83', 'Praesent vestibulum lorem sit amet quam hendrerit, sed gravida risus convallis.', 220.00, 25, 33, 'active', 5),
(84, 'Job 84', 'Vivamus a quam vel turpis efficitur dignissim. Maecenas nec tortor at metus tincidunt interdum.', 280.00, 70, 24, 'pending', 5),
(85, 'Job 85', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 190.00, 5, 18, 'active', 5),
(86, 'Job 86', 'Fusce accumsan sapien eget nulla finibus, vel volutpat tortor vulputate.', 240.00, 40, 16, 'pending', 5),
(87, 'Job 87', 'Suspendisse vel nunc id lectus luctus rutrum. Integer at nulla id sem iaculis faucibus.', 140.00, 85, 28, 'active', 5),
(88, 'Job 88', 'Nullam a elit nec felis tempus sollicitudin. Sed eu odio ac metus rutrum rutrum.', 290.00, 20, 91, 'pending', 5),
(89, 'Job 89', 'Quisque sit amet nisi nec urna dictum varius. In vehicula ullamcorper ipsum a fringilla.', 200.00, 55, 71, 'active', 5),
(90, 'Job 90', 'Sed et purus sit amet est placerat mollis. Maecenas nec urna nec nibh bibendum dignissim.', 250.00, 80, 79, 'pending', 5),
(91, 'Job 91', 'Nulla scelerisque lorem id lectus dictum, nec congue purus egestas. Integer ultrices, ante eu.', 160.00, 35, 85, 'active', 5),
(92, 'Job 92', 'Cras malesuada tortor sed nisi egestas, eu tempor leo facilisis.', 170.00, 60, 85, 'inactive', 5),
(94, 'Job 94', 'Duis id sapien id ipsum tempor fermentum nec in turpis.', 280.00, 70, 3, 'pending', 5),
(95, 'Job 95', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 190.00, 5, 100, 'active', 5),
(96, 'Job 96', 'Vestibulum nec risus quis felis dignissim ultricies. Sed convallis venenatis lacus, ut ultricies orci consequat sit amet.', 240.00, 40, 89, 'pending', 5),
(97, 'Job 97', 'Suspendisse eu urna vitae lorem vestibulum convallis. Nullam nec ipsum sed tortor auctor tempor.', 140.00, 85, 43, 'active', 5),
(98, 'Job 98', 'Nullam at arcu vel mauris elementum fringilla nec vitae dui.', 290.00, 20, 51, 'pending', 5),
(99, 'Job 99', 'Morbi quis justo et urna faucibus eleifend. Sed tincidunt velit vel turpis suscipit, sed egestas enim malesuada.', 200.00, 55, 22, 'active', 5),
(100, 'Job 100', 'Sed sit amet purus accumsan, vehicula sem sed, tempor purus. Aliquam bibendum ultricies odio.', 250.00, 80, 58, 'pending', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `exp1` int(11) NOT NULL,
  `exp2` int(11) NOT NULL,
  `exp3` int(11) NOT NULL,
  `exp4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pwd`, `fullName`, `type`, `exp1`, `exp2`, `exp3`, `exp4`) VALUES
(1, 'idk', 'idc', '', 'lol', 5, 4, 3, 8),
(2, 'khalifayoussef628@gmail.com', 'lol', 'youssef khalifa', 'idk', 3, 32, 75, 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
