-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2019 at 08:36 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mylibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_books`
--

CREATE TABLE `tb_books` (
  `books_id` int(11) NOT NULL,
  `books_name` varchar(100) NOT NULL,
  `books_author` varchar(100) NOT NULL,
  `books_category` varchar(50) NOT NULL,
  `books_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_books`
--

INSERT INTO `tb_books` (`books_id`, `books_name`, `books_author`, `books_category`, `books_qty`) VALUES
(13, 'Gold medal', 'Ladu Jain', 'Novel', 100),
(14, 'ff', 'fff', 'fff', 232);

-- --------------------------------------------------------

--
-- Table structure for table `tb_borrow_books`
--

CREATE TABLE `tb_borrow_books` (
  `borrow_books_id` int(11) NOT NULL,
  `borrow_books_user_id` varchar(100) NOT NULL,
  `borrow_books_book_id` varchar(100) NOT NULL,
  `borrow_books_date` date NOT NULL,
  `borrow_books_issued` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_borrow_books`
--

INSERT INTO `tb_borrow_books` (`borrow_books_id`, `borrow_books_user_id`, `borrow_books_book_id`, `borrow_books_date`, `borrow_books_issued`) VALUES
(1, 'sdfsf', 'sdfsf', '2019-06-04', 0),
(2, 'rr2r23', '23r2r2', '2019-06-27', 0),
(3, 'cadvadv', 'avsa', '2019-06-04', 0),
(4, 'asfasfafa', 'fasfasfasfasfasfa', '2019-06-05', 0),
(5, '25', '13', '2019-06-29', 0),
(6, '25', '13', '2019-06-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_issue_books`
--

CREATE TABLE `tb_issue_books` (
  `issue_books_id` int(11) NOT NULL,
  `issue_books_user_id` varchar(100) NOT NULL,
  `issue_books_borrow_id` varchar(100) NOT NULL,
  `issue_books_book_id` varchar(100) NOT NULL,
  `issue_books_issued_date` date NOT NULL,
  `issued_books_return_date` date NOT NULL,
  `issue_books_returned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_issue_books`
--

INSERT INTO `tb_issue_books` (`issue_books_id`, `issue_books_user_id`, `issue_books_borrow_id`, `issue_books_book_id`, `issue_books_issued_date`, `issued_books_return_date`, `issue_books_returned`) VALUES
(3, '25', 'NewBorrow', '13', '2019-06-26', '2019-05-25', 0),
(4, '25', 'ABC', 'CDE', '2019-06-26', '2019-07-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_librarian`
--

CREATE TABLE `tb_librarian` (
  `librarian_id` int(10) NOT NULL,
  `librarian_f_name` varchar(50) NOT NULL,
  `librarian_l_name` varchar(50) NOT NULL,
  `librarian_tel` varchar(12) NOT NULL,
  `librarian_address` varchar(200) NOT NULL,
  `librarian_mail` varchar(150) NOT NULL,
  `librarian_last_login` datetime NOT NULL,
  `librarian_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_librarian`
--

INSERT INTO `tb_librarian` (`librarian_id`, `librarian_f_name`, `librarian_l_name`, `librarian_tel`, `librarian_address`, `librarian_mail`, `librarian_last_login`, `librarian_password`) VALUES
(1, 'Jayashanka', 'Anushan', '0774561343', 'No.33, Walikadahena, Polgahawela.', 'jmaxut@gmail.com', '2019-06-18 04:21:08', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_panalty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_payment`
--

INSERT INTO `tb_payment` (`payment_id`, `payment_panalty`) VALUES
(1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(100) NOT NULL,
  `user_f_name` varchar(50) NOT NULL,
  `user_l_name` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_uni_id` varchar(50) NOT NULL,
  `user_tel` varchar(12) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_mail` varchar(100) NOT NULL,
  `user_last_login` datetime NOT NULL,
  `user_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_f_name`, `user_l_name`, `user_type`, `user_uni_id`, `user_tel`, `user_address`, `user_mail`, `user_last_login`, `user_password`) VALUES
(21, 'StudentFirstName', 'StudentLastName', 'Student', '125gh43', '0774561343', 'Student-Polgahawela', 's@gmail.com', '2019-06-21 12:16:59', 's@gmail.com'),
(25, 'ProfessorFirstName', 'ProfessorLastName', 'Professor', '123456789', '0000000002', 'Professor-Polgahawela', 'p@gmail.com', '2019-06-28 12:46:34', 'p@gmail.com'),
(26, 'Jayashanka', 'Anushan', 'Student', '12212', '121212', 'Polgahawela.', 'test@123', '2019-06-28 14:19:08', 'test@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_books`
--
ALTER TABLE `tb_books`
  ADD PRIMARY KEY (`books_id`);

--
-- Indexes for table `tb_borrow_books`
--
ALTER TABLE `tb_borrow_books`
  ADD PRIMARY KEY (`borrow_books_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_issue_books`
--
ALTER TABLE `tb_issue_books`
  ADD PRIMARY KEY (`issue_books_id`);

--
-- Indexes for table `tb_librarian`
--
ALTER TABLE `tb_librarian`
  ADD PRIMARY KEY (`librarian_id`);

--
-- Indexes for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_books`
--
ALTER TABLE `tb_books`
  MODIFY `books_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_borrow_books`
--
ALTER TABLE `tb_borrow_books`
  MODIFY `borrow_books_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_issue_books`
--
ALTER TABLE `tb_issue_books`
  MODIFY `issue_books_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_librarian`
--
ALTER TABLE `tb_librarian`
  MODIFY `librarian_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_payment`
--
ALTER TABLE `tb_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
