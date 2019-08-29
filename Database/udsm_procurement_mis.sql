-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2018 at 12:08 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udsm_procurement_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_categories`
--

CREATE TABLE `business_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_categories`
--

INSERT INTO `business_categories` (`id`, `title`, `body`) VALUES
(8, 'Electrical And Electronics', 'This is among the important information of tender category'),
(9, 'Catering Services', 'This is one among the catering services I have ever seen'),
(10, 'Electronics And Electrical', 'Sometimes it is not fair to let the world control us but we still have the ability to defend our own soul');

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `name`, `description`) VALUES
(8, 'Kilimo kwanza', 'This strategy was established by the fourth President of United Republic of Tanzania'),
(9, 'Nenda kwa usalama', 'This strategy was established by the fourth president of united republic of tanzania '),
(10, 'Operesheni kikwete', 'This strategy was established by the third president of united republic of tanzania '),
(11, 'Mkukuta', 'This strategy was established by the third president of united republic of tanzania '),
(12, 'Mkurabita tz ', 'This strategy was established by the third president of united republic of tanzania');

-- --------------------------------------------------------

--
-- Table structure for table `committee_board_members`
--

CREATE TABLE `committee_board_members` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `passcode` varchar(255) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `designated_id` int(11) NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `addedby_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee_board_members`
--

INSERT INTO `committee_board_members` (`id`, `fname`, `mname`, `lname`, `email`, `phone`, `gender`, `passcode`, `role_name`, `profile`, `designated_id`, `timestamp`, `addedby_id`) VALUES
(1, 'Melanie', 'Cainamist', 'Johnson', 'walterplatnumz@gmail.com', '0757870022', 'M', '11111111', 'committee', 'profile.png', -1, 1530877994, 1),
(3, 'Julieth', 'Nanga', 'Faustine', 'walterplatnumz12@gmail.com', '0757870022', 'M', '11111111', 'committee', 'profile.png', -1, 1530878346, 1),
(4, 'Naiman', 'Mahatma', 'Faustine', 'walterplatnumz32@gmail.com', '0757870022', 'M', '11111111', 'board', 'profile.png', -1, 1530878471, 1),
(5, 'Walter', 'Vita', 'Faustine', 'walterplatnumz1234@gmail.com', '0757870022', 'M', '111111111', 'committee', 'profile.png', -1, 1530878494, 1),
(6, 'Yasinta', 'Pambila', 'Pambila', 'pambilayasinta1@gmail.com', '0757870022', 'F', '1111111111', 'board', 'profile.png', -1, 1530972158, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`) VALUES
(5, 'Computer Science And Engineering', 'Computer Science And Engineering'),
(6, 'Electronics Science', 'Electronics Science'),
(7, 'Telecommunication Engineering', 'Telecommunication Engineering'),
(8, 'UDSM PMU Unit', 'UDSM PMU Unit'),
(9, 'Other', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `identification_cards`
--

CREATE TABLE `identification_cards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identification_cards`
--

INSERT INTO `identification_cards` (`id`, `name`, `description`) VALUES
(1, 'Voters ID Card', 'Voters Identification Card'),
(4, 'National ID', 'Identity Card For Every Tanzanian Who Reached Eighteen years Age'),
(5, 'Employee ID', 'Employee ID');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `body`) VALUES
(1, 'Welcome UDSM PMIS', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus nihil laborum accusantium perferendis aliquam consequatur mollitia, eum recusandae assumenda. Ut, officiis amet ullam quam iusto blanditiis voluptatem eligendi, voluptatibus ipsum distinctio consequatur eum perferendis dolorum fugiat, ');

-- --------------------------------------------------------

--
-- Table structure for table `requirement_forms`
--

CREATE TABLE `requirement_forms` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` bigint(20) NOT NULL,
  `posteruid` int(11) NOT NULL,
  `timestamp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirement_forms`
--

INSERT INTO `requirement_forms` (`id`, `title`, `body`, `filename`, `type`, `size`, `posteruid`, `timestamp`) VALUES
(4, 'List of procedural form number one', 'List of procedural form number one', 'List of Procedural Forms_1.doc', 'application/msword', 22528, 29, 1531484863),
(5, 'Form number one letter of appointment for tb members ', 'Form number one letter of appointment for tb members ', 'FORM NO. 1 LETTER OF APPOINTMENT FOR TB MEMBERS - July 2014.doc', 'application/msword', 28672, 29, 1531484968);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(66, 'Administrator', 'The master mind of the system'),
(73, 'Accounting Officer', 'Chief Executive of the Organization'),
(74, 'UDSM Employee', 'UDSMEMPLOYEE'),
(100, 'Tenderer', 'The applicant for the particular tender of UDSM Procurement MIS'),
(101, 'Not assigned', 'Not assigned'),
(102, 'PMU Officer', 'PMU Officer');

-- --------------------------------------------------------

--
-- Table structure for table `stakeholders`
--

CREATE TABLE `stakeholders` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passcode` varchar(255) NOT NULL,
  `idcard_no` varchar(255) NOT NULL,
  `id_typeid` int(11) NOT NULL,
  `supply_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `prof_img` varchar(255) NOT NULL,
  `verification` varchar(25) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stakeholders`
--

INSERT INTO `stakeholders` (`id`, `fname`, `mname`, `lname`, `email`, `phone`, `gender`, `username`, `passcode`, `idcard_no`, `id_typeid`, `supply_id`, `status`, `token`, `prof_img`, `verification`, `role_id`) VALUES
(54, 'Junior', 'Jumbo', 'Justine', 'tenderer@gmail.com', '(075) 787-0022', 'M', 'cainamist', '$2y$12$9v1e9dETPf09DNrt8aKli.KnCizNreI5V1si94FpSn1.9HTCCBIqK', '9', 0, 9, 'approved', 'c277c973445ee3a7930fc537518c44d1', 'profile.png', 'verified', 100),
(60, 'Melanie', 'Junior', 'Peter', 'melanie@gmail.com', '(075) 787-0022', 'M', 'cainamistiana', '$2y$12$XMlbfJaWotKLE5iLM0YhQePGbhwmFkkqwaFPE68ASqV5KORfdZDIm', '9', 11111111, 9, 'unapproved', '5cf15f2ba3d9d77d4dfdeb023c795bca', 'profile.png', 'unverified', 100),
(61, 'Walter', 'Vigenere', 'Faustine', 'tenderer@gmail.com', '(075) 787-0022', 'M', 'cane', '$2y$12$O0l/NE.KmQSIKAn8P7zat.3vcNY/Ni52Hmg6utqT138KOQWsIdaRm', '8', 11111111, 8, 'approved', 'b38aec0cfb3c955ec7469677b12bbdf2', 'profile.png', 'verified', 100);

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `body`, `status`, `filename`, `type`, `size`) VALUES
(25, 'fsdfsfsdf', 'sdfsdfsf', 'unpublished', 'cainam2.jpg', 'image/jpeg', '460590'),
(29, 'Lorem ', 'Lorem ipsum dolor sit amet', 'unpublished', 'udsm3.jpg', 'image/jpeg', '83564'),
(30, 'Lorem ', 'Lorem ipsum dolor sit amet', 'unpublished', 'udsm4.jpg', 'image/jpeg', '131979'),
(31, 'Lorem', 'Lorem ipsum dolor sit amet', 'unpublished', 'udsm5.jpg', 'image/jpeg', '274291'),
(32, 'Lorem', 'Lorem ipsum dolor sit amet', 'published', 'Quotefancy-21898-3840x2160.jpg', 'image/jpeg', '1852764');

-- --------------------------------------------------------

--
-- Table structure for table `systemusers`
--

CREATE TABLE `systemusers` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passcode` varchar(255) NOT NULL,
  `dept_id` varchar(20) NOT NULL,
  `role_id` varchar(10) NOT NULL DEFAULT '-1',
  `status` varchar(255) NOT NULL,
  `token` varchar(256) NOT NULL,
  `user_desc` text NOT NULL,
  `prof_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systemusers`
--

INSERT INTO `systemusers` (`id`, `fname`, `mname`, `lname`, `email`, `phone`, `gender`, `username`, `passcode`, `dept_id`, `role_id`, `status`, `token`, `user_desc`, `prof_img`) VALUES
(27, 'Charles', 'Leonald', 'Temba', 'admin@gmail.com', '0757870022', 'M', 'admin', '$2y$12$jEYlc7oWdEbCPBFFTrakZOLKpyEF4zwo9ZVsyQfvYdKCY8LYOu8bi', '5', '66', 'verified', 'a668829a09f6709e39f716a1df0db9c7', 'admin', 'profile.png'),
(28, 'Kimaro', 'J', 'Boniface', 'pmuofficer@gmail.com', '0757870022', 'M', 'pmuofficer', '$2y$12$gY.Y8As/nbd8vgngE8xZ/.FSez8MOCe9PF.XxGuoQUJA1N338YWxm', '8', '102', 'verified', 'b8678a561b4167fff15c4ef182d921a4', 'pmuofficer', 'profile.png'),
(29, 'Walter', 'V', 'Faustine', 'udsmemployee@gmail.com', '0757870022', 'M', 'udsmemployee', '$2y$12$p/uY2itTaYl0CJJke57hEeAs2n5HdbCLLNZ6Bj/e7iZX1ztOnKwwS', '9', '74', 'verified', '3c840d4c41c70bbb04c84b26ed74c4dc', 'udsmemployee', 'profile.png'),
(30, 'Tommy', 'Junior', 'Igans', 'accofficer@gmail.com', '0757870022', 'M', 'accofficer', '$2y$12$5Gs7N3Yo/FAOwiYApT7tHuP2DrtRCiPk5aV.BDnuvF15pJD9HR19K', '9', '73', 'verified', 'a374b258e221288fc8f0c35349461907', 'accofficer', 'profile.png'),
(32, 'Juma', 'Ndezi', 'Jungula', 'cainemba@gmail.com', '0757870022', 'F', 'cainam', '$2y$12$dNrAQ./nQV9VhE/EzsVQwuF3LzKw5/vgvwgc/L6XtNXhk6YZuBPA2', '5', '102', 'unverified', 'bd8431309ea7105e4644a52b7af21b82', '12121212', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `tenderboards`
--

CREATE TABLE `tenderboards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenderboards`
--

INSERT INTO `tenderboards` (`id`, `name`, `description`) VALUES
(8, 'Mkurabita TZ', 'This Strategy was established by the Third President of United Republic of Tanzania'),
(9, 'Mkukuta', 'This Strategy was established by the Third President of United Republic of Tanzania'),
(10, 'Operesheni Sangara', 'This Strategy was established by the Third President of United Republic of Tanzania		\r\n'),
(11, 'Operesheni Kikwete', 'This Strategy was established by the Third President of United Republic of Tanzania'),
(12, 'Nenda Kwa Usalama', 'This Strategy was established by the Third President of United Republic of Tanzania');

-- --------------------------------------------------------

--
-- Table structure for table `tenderlist`
--

CREATE TABLE `tenderlist` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `body` varchar(255) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `posteruid` int(11) NOT NULL,
  `requesteruid` int(11) NOT NULL,
  `requirementid` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` bigint(20) NOT NULL,
  `committeeid` int(11) NOT NULL DEFAULT '-1',
  `boardid` int(11) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenderlist`
--

INSERT INTO `tenderlist` (`id`, `title`, `body`, `categoryid`, `posteruid`, `requesteruid`, `requirementid`, `status`, `timestamp`, `filename`, `type`, `size`, `committeeid`, `boardid`) VALUES
(3, 'Tender Prepared For The Catering Service At UDSM Mlimani Campus', 'Tender Prepared For The Catering Service At UDSM Mlimani Campus', 9, 28, 29, 39, 'unapproved', 1531572102, 'CNTAR.pdf', 'application/pdf', 237071, -1, -1),
(4, 'Tender Application For The Garden Maintainer At UDSM CoICT', 'Tender Application For The Garden Maintainer At UDSM CoICT', 9, 28, 29, 39, 'ongoing', 1531572146, 'CNTAR2.pdf', 'application/pdf', 39967, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tender_applications`
--

CREATE TABLE `tender_applications` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `stakeholderid` int(11) NOT NULL,
  `tenderid` int(11) NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `filename` text NOT NULL,
  `type` varchar(60) NOT NULL,
  `size` bigint(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `award` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender_applications`
--

INSERT INTO `tender_applications` (`id`, `comment`, `stakeholderid`, `tenderid`, `timestamp`, `filename`, `type`, `size`, `status`, `award`) VALUES
(12, 'I have Applied For This Tender Because I Have Passion For This Job', 54, 4, 1531576134, 'Walter V. Faustine.pdf', 'application/pdf', 397333, 'false', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `tender_category`
--

CREATE TABLE `tender_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender_category`
--

INSERT INTO `tender_category` (`id`, `title`, `body`) VALUES
(1, 'International Tenders', 'This is among the important information of tender category'),
(2, 'Non Consultancy Tenders', 'This is one among the catering services I have ever seen'),
(8, 'Consultancy Tenders', 'Sometimes it is not fair to let the world control us but we still have the ability to defend our own soul');

-- --------------------------------------------------------

--
-- Table structure for table `tender_progress_update`
--

CREATE TABLE `tender_progress_update` (
  `id` int(11) NOT NULL,
  `stageid` int(11) NOT NULL,
  `tenderid` int(11) NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `updaterid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender_progress_update`
--

INSERT INTO `tender_progress_update` (`id`, `stageid`, `tenderid`, `timestamp`, `updaterid`) VALUES
(12, 4, 1, 1531679964, 28),
(13, 5, 1, 1531680623, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tender_stages`
--

CREATE TABLE `tender_stages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender_stages`
--

INSERT INTO `tender_stages` (`id`, `title`, `description`) VALUES
(4, 'Receiving The Users Needs(Requirements)', 'Receiving The Users Needs(Requirements)'),
(5, 'Invitation Of Tender(Sourcing)', 'Invitation Of Tender(Sourcing)'),
(6, 'Opening(Publicly) Submitted Tender Applications', 'Opening(Publicly) Submitted Tender Applications'),
(7, 'Formation Of Evaluation Team', 'Formation Of Evaluation Team'),
(8, 'Submission Of Evaluation Report ByCommittee', 'Submission Of Evaluation Report ByCommittee'),
(9, 'Receiving Evaluation Report From Committee', 'Receiving Evaluation Report From Committee'),
(10, 'Evaluation Report Submitted To The Tender Board', 'Evaluation Report Submitted To The Tender Board'),
(11, 'Evaluation Report Deliberation  Submitted To Accounting Officer', 'Evaluation Report Deliberation  Submitted To Accounting Officer'),
(12, 'Awarding Letter To All Participated Tenderers By Accounting Officer', 'Awarding Letter To All Participated Tenderers By Accounting Officer'),
(13, 'Letter To Award The Tender Winner', 'Letter To Award The Tender Winner'),
(14, 'Acceptance From The Tenderer', 'Acceptance From The Tenderer'),
(15, 'Signing Tender Contract', 'Signing Tender Contract'),
(16, 'Execution Of The Contract', 'Execution Of The Contract'),
(17, 'Payment Of The Contract', 'Payment Of The Contract'),
(18, 'Closure Of The Contract', 'Closure Of The Contract');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passcode` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `user_desc` varchar(255) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `email`, `passcode`, `city`, `role_id`, `phone`, `username`, `user_desc`, `token`, `status`) VALUES
(1, 'Walter', 'V', 'Faustine', 'walterplatnumz@gmail.com', '000000', 'Dar-es-salaam', 66, '0757870022', 'cainam', 'Awesome', '123456789', 'verified'),
(2, 'Yoga', 'Lenovo', 'China', 'walterplatnumz@gmail.com', '22222222', 'Arusha', 73, '0757870022', 'china', 'Best manufacturer for the mobile phones in china', 'aadasd745da5da45d4ad4a', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `user_requirements`
--

CREATE TABLE `user_requirements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` bigint(20) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `requesterid` int(11) DEFAULT NULL,
  `timestamp` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_requirements`
--

INSERT INTO `user_requirements` (`id`, `title`, `body`, `filename`, `type`, `size`, `status`, `requesterid`, `timestamp`) VALUES
(38, 'The request for ten computer for the labs', 'The request for ten computer for the labs', 'amadeo.pdf', 'application/pdf', 83852, 'unapproved', 29, '1531494817'),
(39, 'The request for the lecture seat luhanga hall', 'The request for the lecture seat luhanga hall', 'amadeo.pdf', 'application/pdf', 83852, 'approved', 29, '1531494817');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_categories`
--
ALTER TABLE `business_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_board_members`
--
ALTER TABLE `committee_board_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identification_cards`
--
ALTER TABLE `identification_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirement_forms`
--
ALTER TABLE `requirement_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stakeholders`
--
ALTER TABLE `stakeholders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemusers`
--
ALTER TABLE `systemusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenderboards`
--
ALTER TABLE `tenderboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenderlist`
--
ALTER TABLE `tenderlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tender_applications`
--
ALTER TABLE `tender_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tender_category`
--
ALTER TABLE `tender_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tender_progress_update`
--
ALTER TABLE `tender_progress_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tender_stages`
--
ALTER TABLE `tender_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_requirements`
--
ALTER TABLE `user_requirements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_categories`
--
ALTER TABLE `business_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `committee_board_members`
--
ALTER TABLE `committee_board_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `identification_cards`
--
ALTER TABLE `identification_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requirement_forms`
--
ALTER TABLE `requirement_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `stakeholders`
--
ALTER TABLE `stakeholders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `systemusers`
--
ALTER TABLE `systemusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tenderboards`
--
ALTER TABLE `tenderboards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tenderlist`
--
ALTER TABLE `tenderlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tender_applications`
--
ALTER TABLE `tender_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tender_category`
--
ALTER TABLE `tender_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tender_progress_update`
--
ALTER TABLE `tender_progress_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tender_stages`
--
ALTER TABLE `tender_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_requirements`
--
ALTER TABLE `user_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
