-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2019 at 04:50 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abasv3`
--

-- --------------------------------------------------------

--
-- Table structure for table `aut_departments`
--

CREATE TABLE `aut_departments` (
  `id` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aut_departments`
--

INSERT INTO `aut_departments` (`id`, `code`, `department`, `page`) VALUES
(1, 'IT', 'IT', 'it'),
(2, 'ACCT', 'Accounting', 'accounting'),
(3, 'HR', 'Human Resource', 'hr');

-- --------------------------------------------------------

--
-- Table structure for table `aut_department_permissions`
--

CREATE TABLE `aut_department_permissions` (
  `id` int(11) NOT NULL,
  `department_code` int(11) NOT NULL,
  `permission_code` int(11) NOT NULL,
  `document_code` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aut_department_users`
--

CREATE TABLE `aut_department_users` (
  `id` int(11) NOT NULL,
  `department_code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `duration_start` date NOT NULL,
  `duration_end` date NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aut_department_users`
--

INSERT INTO `aut_department_users` (`id`, `department_code`, `user_id`, `duration_start`, `duration_end`, `status`) VALUES
(2, 1, 2, '2019-05-01', '2019-05-31', 'Active'),
(13, 2, 1, '2019-05-14', '0000-00-00', 'Active'),
(19, 3, 3, '2019-05-14', '0000-00-00', 'Active'),
(20, 2, 5, '2019-05-14', '0000-00-00', 'Active'),
(21, 2, 8, '2019-05-14', '0000-00-00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `aut_documents`
--

CREATE TABLE `aut_documents` (
  `id` int(11) NOT NULL,
  `document_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aut_documents`
--

INSERT INTO `aut_documents` (`id`, `document_code`, `name`) VALUES
(1, 'PO', 'Purchase Order'),
(2, 'RFP', 'Request for Payment');

-- --------------------------------------------------------

--
-- Table structure for table `aut_locations`
--

CREATE TABLE `aut_locations` (
  `id` int(11) NOT NULL,
  `location` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aut_locations`
--

INSERT INTO `aut_locations` (`id`, `location`) VALUES
(1, 'Makati'),
(2, 'NRA'),
(3, 'Tayud');

-- --------------------------------------------------------

--
-- Table structure for table `aut_permissions`
--

CREATE TABLE `aut_permissions` (
  `id` int(11) NOT NULL,
  `code` bit(4) NOT NULL,
  `permission` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aut_permissions`
--

INSERT INTO `aut_permissions` (`id`, `code`, `permission`) VALUES
(1, b'0001', 'CREATE'),
(2, b'0010', 'READ'),
(3, b'0011', 'CREATE_READ'),
(4, b'0100', 'UPDATE'),
(5, b'0101', 'UPDATE_CREATE'),
(6, b'0110', 'UPDATE_READ'),
(7, b'0111', 'UPDATE_READ_CREATE'),
(8, b'1000', 'DELETE'),
(9, b'1001', 'DELETE_CREATE'),
(10, b'1010', 'DELETE_READ'),
(11, b'1011', 'DELETE_READ_CREATE'),
(12, b'1100', 'DELETE_UPDATE'),
(13, b'1101', 'DELETE_UPDATE_CREATE'),
(14, b'1110', 'DELETE_UPDATE_READ'),
(15, b'1111', 'DELETE_UPDATE_READ_CREATE');

-- --------------------------------------------------------

--
-- Table structure for table `aut_ranks`
--

CREATE TABLE `aut_ranks` (
  `id` int(11) NOT NULL,
  `rank` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aut_ranks`
--

INSERT INTO `aut_ranks` (`id`, `rank`, `description`) VALUES
(1, 'President', 'President'),
(2, 'VP', 'Vice President'),
(3, 'Manager', 'Manager'),
(4, 'Supervisor', 'Supervisor'),
(5, 'Rank and file', 'Rank and file');

-- --------------------------------------------------------

--
-- Table structure for table `aut_roles`
--

CREATE TABLE `aut_roles` (
  `id` int(11) NOT NULL,
  `role_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aut_roles`
--

INSERT INTO `aut_roles` (`id`, `role_code`, `role`) VALUES
(1, 'APPROVE', 'Approver'),
(2, 'RECOMMEND', 'Recommending Approval'),
(3, 'CHECK', 'Checker'),
(4, 'VERIFY', 'Verifier'),
(5, 'REQUEST', 'Requester');

-- --------------------------------------------------------

--
-- Table structure for table `aut_users`
--

CREATE TABLE `aut_users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aut_users`
--

INSERT INTO `aut_users` (`id`, `username`, `last_name`, `first_name`, `middle_name`, `email`, `password`, `status`) VALUES
(1, 'kcamacho', 'Camacho', 'Kenneth', 'F', 'kenneth.camacho@avegabros.com', 'e10adc3949ba59abbe56e057f20f883e', 'Active'),
(2, 'jbcanillo', 'Canillo', 'Julius Brian', '', 'fikrifiver97@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Inactive'),
(3, 'sirjason', 'Sir', 'Jason', '', 'email3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Active'),
(5, 'kentuy17', 'Kenneth Camacho', '', '', 'kentuy17@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Active'),
(8, 'DU30', 'Digong Duterte', '', '', 'Duterte@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'Active'),
(10, 'testuser', 'Lastname', 'Firstname', 'middlename', 'test@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `aut_user_custom_permissions`
--

CREATE TABLE `aut_user_custom_permissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_code` int(11) NOT NULL,
  `role_code` int(11) NOT NULL,
  `document_code` int(11) NOT NULL,
  `permission_code` int(11) NOT NULL,
  `amount_mid` int(11) NOT NULL,
  `amount_max` int(11) NOT NULL,
  `duration_start` date NOT NULL,
  `duration_end` date NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aut_user_locations`
--

CREATE TABLE `aut_user_locations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `duration_start` date NOT NULL,
  `duration_end` date NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aut_user_locations`
--

INSERT INTO `aut_user_locations` (`id`, `user_id`, `location_id`, `duration_start`, `duration_end`, `status`) VALUES
(2, 2, 2, '2019-05-01', '2019-05-31', 'Active'),
(3, 3, 1, '2019-05-01', '2019-05-31', 'Active'),
(4, 1, 3, '2019-05-10', '0000-00-00', ''),
(12, 5, 3, '2019-05-14', '0000-00-00', 'Active'),
(13, 8, 1, '2019-05-14', '0000-00-00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `aut_user_ranks`
--

CREATE TABLE `aut_user_ranks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_start` date NOT NULL,
  `duration_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aut_user_ranks`
--

INSERT INTO `aut_user_ranks` (`id`, `user_id`, `rank_id`, `status`, `duration_start`, `duration_end`) VALUES
(1, 1, 1, 'Active', '2019-04-29', '2020-04-29'),
(2, 2, 3, 'Active', '2019-05-09', '0000-00-00'),
(3, 3, 1, 'Active', '2019-05-16', '0000-00-00'),
(5, 5, 4, '', '2019-05-14', '0000-00-00'),
(6, 8, 3, '', '2019-05-14', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aut_departments`
--
ALTER TABLE `aut_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aut_department_permissions`
--
ALTER TABLE `aut_department_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_dept_permission_dept` (`department_code`),
  ADD KEY `FK_dept_permission_perm` (`permission_code`),
  ADD KEY `FK_dept_permission_doc` (`document_code`);

--
-- Indexes for table `aut_department_users`
--
ALTER TABLE `aut_department_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_dept_users_dept` (`department_code`),
  ADD KEY `FK_dept_users_user` (`user_id`);

--
-- Indexes for table `aut_documents`
--
ALTER TABLE `aut_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aut_locations`
--
ALTER TABLE `aut_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aut_permissions`
--
ALTER TABLE `aut_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aut_ranks`
--
ALTER TABLE `aut_ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aut_roles`
--
ALTER TABLE `aut_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aut_users`
--
ALTER TABLE `aut_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aut_user_custom_permissions`
--
ALTER TABLE `aut_user_custom_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `FK_DeptPermission` (`department_code`),
  ADD KEY `FK_RolePermission` (`role_code`),
  ADD KEY `FK_DocPermission` (`document_code`),
  ADD KEY `FK_PermPermission` (`permission_code`);

--
-- Indexes for table `aut_user_locations`
--
ALTER TABLE `aut_user_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_loc_user` (`user_id`),
  ADD KEY `FK_user_loc_loc` (`location_id`);

--
-- Indexes for table `aut_user_ranks`
--
ALTER TABLE `aut_user_ranks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_user_ranks` (`user_id`),
  ADD KEY `FK_rank_user_ranks` (`rank_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aut_departments`
--
ALTER TABLE `aut_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aut_department_permissions`
--
ALTER TABLE `aut_department_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aut_department_users`
--
ALTER TABLE `aut_department_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `aut_documents`
--
ALTER TABLE `aut_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aut_locations`
--
ALTER TABLE `aut_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aut_permissions`
--
ALTER TABLE `aut_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `aut_ranks`
--
ALTER TABLE `aut_ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aut_roles`
--
ALTER TABLE `aut_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aut_users`
--
ALTER TABLE `aut_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `aut_user_custom_permissions`
--
ALTER TABLE `aut_user_custom_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aut_user_locations`
--
ALTER TABLE `aut_user_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `aut_user_ranks`
--
ALTER TABLE `aut_user_ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aut_department_permissions`
--
ALTER TABLE `aut_department_permissions`
  ADD CONSTRAINT `FK_dept_permission_dept` FOREIGN KEY (`department_code`) REFERENCES `aut_departments` (`id`),
  ADD CONSTRAINT `FK_dept_permission_doc` FOREIGN KEY (`document_code`) REFERENCES `aut_documents` (`id`),
  ADD CONSTRAINT `FK_dept_permission_perm` FOREIGN KEY (`permission_code`) REFERENCES `aut_permissions` (`id`);

--
-- Constraints for table `aut_department_users`
--
ALTER TABLE `aut_department_users`
  ADD CONSTRAINT `FK_dept_users_dept` FOREIGN KEY (`department_code`) REFERENCES `aut_departments` (`id`),
  ADD CONSTRAINT `FK_dept_users_user` FOREIGN KEY (`user_id`) REFERENCES `aut_users` (`id`);

--
-- Constraints for table `aut_user_custom_permissions`
--
ALTER TABLE `aut_user_custom_permissions`
  ADD CONSTRAINT `FK_DeptPermission` FOREIGN KEY (`department_code`) REFERENCES `aut_departments` (`id`),
  ADD CONSTRAINT `FK_DocPermission` FOREIGN KEY (`document_code`) REFERENCES `aut_documents` (`id`),
  ADD CONSTRAINT `FK_PermPermission` FOREIGN KEY (`permission_code`) REFERENCES `aut_permissions` (`id`),
  ADD CONSTRAINT `FK_RolePermission` FOREIGN KEY (`role_code`) REFERENCES `aut_roles` (`id`),
  ADD CONSTRAINT `FK_UserPermission` FOREIGN KEY (`user_id`) REFERENCES `aut_users` (`id`);

--
-- Constraints for table `aut_user_locations`
--
ALTER TABLE `aut_user_locations`
  ADD CONSTRAINT `FK_user_loc_loc` FOREIGN KEY (`location_id`) REFERENCES `aut_locations` (`id`),
  ADD CONSTRAINT `FK_user_loc_user` FOREIGN KEY (`user_id`) REFERENCES `aut_users` (`id`);

--
-- Constraints for table `aut_user_ranks`
--
ALTER TABLE `aut_user_ranks`
  ADD CONSTRAINT `FK_rank_user_ranks` FOREIGN KEY (`rank_id`) REFERENCES `aut_ranks` (`id`),
  ADD CONSTRAINT `FK_user_user_ranks` FOREIGN KEY (`user_id`) REFERENCES `aut_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
