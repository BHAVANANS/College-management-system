-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 08:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imperial_college`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_result`
--

CREATE TABLE `class_result` (
  `class_result_id` int(11) NOT NULL,
  `roll_no` varchar(30) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `subject_title` varchar(50) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `total_marks` varchar(11) NOT NULL,
  `obtain_marks` varchar(11) NOT NULL,
  `result_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_result`
--

INSERT INTO `class_result` 
(`class_result_id`, `roll_no`, `course_code`, `subject_code`, `subject_title`,`semester`, `total_marks`, `obtain_marks`, `result_date`) VALUES
(1, '1BY20CS041', 'CSE', '18CS32', 'DSA', '3', '100', '94', '10-06-2022'),
(2, '1BY20CS041', 'CSE', '18CS34', 'CO', '3','100', '83', '10-06-2022'),
(3, '1BY20CS041', 'CSE', '18CS42', 'DAA', '4','100', '90', '16-11-2022'),
(4, '1BY20CS041', 'CSE', '18CS53', 'DBMS', '5','100', '86', '28-04-2023'),
(5, '1BY20AI056', 'AIML', '18AI55', 'PAI', '5','100', '84', '28-04-2023'),
(6, '1BY20AI056', 'AIML', '18AI56', 'MML', '5','100', '93', '28-04-2023'),
(7, '1BY20EC179', 'ECE', '18EC32', 'Network Theory', '4','100', '90', '16-11-2022'),
(8, '1BY20CS041', 'ECE', '18EC42', 'Analog Circuits', '4','100', '96', '16-11-2022');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `no_of_semesters` varchar(10) NOT NULL,
  `no_of_years` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `no_of_semesters`, `no_of_years`) VALUES
('AIML', 'Artificial Intelligence and Machine Learning', 8, 4),
('CSE', 'Computer Science and Engineering', 8, 4),
('ISE', 'Information Science and Engineering', 8, 4),
('ECE', 'Electronics and Communication Engineering', 8, 4),
('EEE', 'Electrical and Electronics Engineering', 8, 4),
('ETE', 'Electronics and Telecommunication Engineering',8,4),
('ME', 'Mechanical Engineering',8,4),
('CIV', 'Civil Engineering',8,4),
('B.Arch', 'Bachelor of Architecture', 10, 5),
('M.Tech CSE', 'M.Tech in Computer Science and Engineering', 4, 2),
('M.Tech Security', 'M.Tech in Cyber Security', 4, 2),
('MBA', 'Master of Business Administration', 4, 2),
('MCA', 'Master of Computer Applications', 4, 2);


-- --------------------------------------------------------

--
-- Table structure for table `course_subjects`
--

CREATE TABLE `course_subjects` (
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `credit_points` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_subjects`
--

INSERT INTO `course_subjects` (`subject_code`, `subject_name`, `course_code`, `semester`, `credit_points`) VALUES
('18AI55', 'Principles of Artificial Intelligence', 'AIML', 5, 3),
('18AI56', 'Mathematics for Machine Learning', 'AIML', 5, 3),
('18CS32', 'Data Structures and Applications', 'CSE', 3, 4),
('18CS34', 'Computer Organization and Architecture', 'CSE', 3, 3),
('18CS42', 'Design and Analysis of Algorithms', 'CSE', 5, 4),
('18CS53', 'Database Management System', 'CSE', 2, 3),
('18EC32', 'Network Theory', 'ECE', 3, 4),
('18EC42', 'Analog Circuits', 'ECE', 4, 4),
('18ME42', 'Applied Thermodynamics', 'ME', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `account` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `user_id`, `Password`, `Role`, `account`) VALUES
(1, 'admin@gmail.com', 'admin123*', 'Admin', 'Activate');
-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--
-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `attendance_id` int(5) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `semester` int(5) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `attendance` int(20) NOT NULL,
  `attendance_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`attendance_id`, `course_code`, `subject_code`, `semester`, `student_id`, `attendance`, `attendance_date`) VALUES
(1, 'CSE', 'M and E', 5, '1BY20CS041', 1, '10-10-2022'),
(2, 'CSE', 'CNS', 5, '1BY20CS041', 1, '11-10-2023'),
(3, 'CSE', 'DBMS', 5, '1BY20CS041', 0, '12-10-2023'),
(4, 'CSE', 'ATC', 5, '1BY20CS041', 1, '13-10-2023'),
(5, 'CSE', 'ADP', 5, '1BY20CS041', 0, '14-10-2023'),
(6, 'CSE', 'UP', 5, '1BY20CS041', 1, '15-10-2023'),
(7, 'CSE', 'EVS',5, '1BY20CS041', 0, '17-10-2023'),
(8, 'CSE', 'CN lab', 5, '1BY20CS041', 1, '18-03-2023'),
(9, 'CSE', 'DBMS lab', 5, '1BY20CS041', 1, '19-03-2023'),
(10, 'CSE', 'M and E', 5, '1BY20CS402', 0, '10-10-2022'),
(11, 'CSE', 'CNS', 5, '1BY20CS402', 0, '11-10-2023'),
(12, 'CSE', 'DBMS', 5, '1BY20CS402', 1, '12-10-2023'),
(13, 'CSE', 'ATC', 5, '1BY20CS402', 1, '13-10-2023'),
(14, 'CSE', 'ADP', 5, '1BY20CS402', 0, '14-10-2023'),
(15, 'CSE', 'UP', 5, '1BY20CS402', 1, '15-10-2023'),
(16, 'CSE', 'EVS',5, '1BY20CS402', 0, '17-10-2023'),
(17, 'CSE', 'CN lab', 5, '1BY20CS402', 1, '18-03-2023'),
(18, 'CSE', 'DBMS lab', 5, '1BY20CS402', 0, '19-03-2023');
-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

CREATE TABLE `student_fee` (
  `fee_id` int(11) NOT NULL,
  `roll_no` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`fee_id`, `roll_no`, `amount`, `posting_date`, `status`) VALUES
(1, '1BY20CS041', 20410, '2020-03-29 11:24:36', 'Paid'),
(2, '1BY20CS042', 20410, '2020-03-30 12:35:39', 'Due'),
(3, '1BY20CS038', 78560, '2020-03-30 12:35:39', 'Paid'),
(4, '1BY20CS029', 82455, '2020-03-30 12:35:39', 'Paid'),
(5, '1BY20CS402', 76440, '2020-03-30 12:35:39', 'Due'),
(6, '1BY20CS405', 75560, '2020-03-30 12:35:39', 'Paid');


-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `roll_no` varchar(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `profile_image` blob NOT NULL,
  `prospectus_issued` varchar(10) NOT NULL,
  `prospectus_amount` varchar(10) NOT NULL,
  
  `applicant_status` varchar(20) NOT NULL,
  `application_status` varchar(20) NOT NULL,
  
  `dob` varchar(10) NOT NULL,
  `other_phone` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `permanent_address` varchar(150) NOT NULL,
  `current_address` varchar(150) NOT NULL,
  `place_of_birth` varchar(150) NOT NULL,
  `matric_complition_date` varchar(20) NOT NULL,
  
  `matric_certificate` blob NOT NULL,
  `fa_complition_date` varchar(20) NOT NULL,
  
  `fa_certificate` blob NOT NULL,
  `aadhar_number` varchar(12) NOT NULL,
  `aadhar_card` blob NOT NULL,


  `total_marks` int(11) NOT NULL,
  `obtain_marks` int(11) NOT NULL,
  `state` varchar(20) NOT NULL,
  `admission_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `attendance_id` int(11) NOT NULL,
  `teacher_id` varchar(30) NOT NULL,
  `attendance` int(11) NOT NULL,
  `attendance_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`attendance_id`, `teacher_id`, `attendance`, `attendance_date`) VALUES
(1, '1', 1, '1-1-2023'),
(2, '1', 0, '2-1-2023'),
(3, '1', 1, '3-1-2023'),
(4, '2', 1, '1-1-2023'),
(5, '2', 1, '2-1-2023'),
(6, '2', 1, '3-1-2023'),
(7, '3', 0, '1-1-2023'),
(8, '3', 1, '2-1-2023'),
(9, '3', 1, '3-1-2023');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_courses`
--

CREATE TABLE `teacher_courses` (
  `sr_no` int(5) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(5) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `assign_date` varchar(20) NOT NULL,
  `total_classes` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_courses`
--

INSERT INTO `teacher_courses` (`sr_no`, `course_code`, `semester`, `teacher_id`, `subject_code`, `assign_date`, `total_classes`) VALUES
(1, 'CSE', 3, 3, '18CS32', '10-10-2022', 30),
(2, 'CSE', 4, 3, '18CS42', '10-10-2022', 30),
(3, 'CSE', 5, 2, '18CS53', '10-10-2022', 30),
(4, 'CSE', 5, 2, '18CS54', '10-10-2022', 30),
(5, 'CSE', 3, 1, '18CS36', '10-10-2022', 30),
(6, 'CSE', 5, 1, '18CS55', '10-10-2022', 30);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `profile_image` blob NOT NULL,
  `teacher_status` varchar(10) NOT NULL,
  `application_status` varchar(10) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `other_phone` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `matric_complition_date` varchar(15) NOT NULL,
  `matric_certificate` blob NOT NULL,
  `fa_complition_date` varchar(15) NOT NULL,
  `fa_certificate` blob NOT NULL,
  `ba_complition_date` varchar(15) NOT NULL,
  `ba_certificate` blob NOT NULL,
  `ma_complition_date` varchar(15) NOT NULL,
  `ma_certificate` blob NOT NULL,
  `phd_status` varchar(10) NOT NULL,
  `phd_certificate` blob NOT NULL,
  `designation` varchar(30) NOT NULL,
  `specification_area` varchar(50) NOT NULL,
  `hire_date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`teacher_id`, `first_name`, `middle_name`, `last_name`, `father_name`, `email`, `phone_no`, `profile_image`, `teacher_status`, `application_status`, `dob`, `other_phone`, `gender`, `matric_complition_date`, `matric_certificate`, `fa_complition_date`, `fa_certificate`, `ba_complition_date`, `ba_certificate`, `ma_complition_date`,`ma_certificate`,`phd_status`, `phd_certificate`, `designation`, `specification_area`, `hire_date`) VALUES
(1, 'Mr.', 'Jagadish', 'P', 'Somashekhar', 'jaga@gmail.com', '9807367624', 0x696d616765732e706e67, 'Permanent', 'Yes', '17-01-1987', '', 'Male', '', '', '', '', '', '', '', '', '', '', 'Assistant Professor', 'Software Engineering', '18-06-2016'),
(2, 'Dr.', 'HemaMalini', 'B H', 'Reddy', 'mala@gmail.com', '9743766780', 0x696d616765732e706e67, 'Permanent', 'Yes', '05-10-1978', '', 'Female', '', '', '', '', '', '', '', '', '', '', 'Associate Professor', 'Automata Theory', '26-04-2002');
-- --------------------------------------------------------

--
-- Table structure for table `teacher_salary_allowances`
--

-- --------------------------------------------------------

--
-- Table structure for table `teacher_salary_report`
--

CREATE TABLE `teacher_salary_report` (
  `salary_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `paid_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_salary_report`
--

INSERT INTO `teacher_salary_report` (`salary_id`, `teacher_id`, `total_amount`, `status`, `paid_date`) VALUES
(1, 1, 46000, 'Paid', '2020-03-27 11:28:57'),
(2, 2, 67100, 'Paid', '2020-03-27 11:50:13'),
(3, 3, 48590, 'Paid', '2020-03-27 11:55:58'),
(4, 1, 46000, 'Paid', '2020-03-27 12:33:39'),
(6, 2, 67100, 'Paid', '2020-03-28 08:30:46'),
(5, 3, 48590, 'Paid', '2020-03-28 08:26:59');
-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `timing_from` varchar(10) NOT NULL,
  `timing_to` varchar(10) NOT NULL,
  `day` varchar(20) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `course_code`, `semester`, `timing_from`, `timing_to`, `day`, `subject_code`, `room_no`) VALUES
(1, 'CSE', 5, '8:30', '9:30', 'Monday', 'CNS', 104),
(2, 'CSE', 5, '9:30', '10:30', 'Monday', 'DBMS', 104),
(3, 'CSE', 5, '10:50', '12:50', 'Monday', 'CN Lab', 503),
(4, 'CSE', 5, '8:30', '9:30', 'Tuesday', 'ATC', 21),
(5, 'CSE', 5, '9:30', '10:30', 'Tuesday', 'UP', 21),
(6, 'CSE', 5, '10:50', '12:50', 'Tuesday', 'DBMS Lab', 402),
(7, 'CSE', 5, '8:30', '9:30', 'Wednesday', 'ADP', 21),
(8, 'CSE', 5, '9:30', '12:30', 'Wednesday', 'Placement Training', 410),
(9, 'CSE', 5, '8:30', '9:30', 'Thursday', 'M and E', 21),
(10, 'CSE', 5, '9:30', '10:30', 'Thursday', 'EVS', 21),
(11, 'CSE', 5, '10:50', '12:50', 'Thursday', 'Proctor meeting', 511);

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--
--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_result`
--
ALTER TABLE `class_result`
  ADD PRIMARY KEY (`class_result_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `course_subjects`
--
ALTER TABLE `course_subjects`
  ADD PRIMARY KEY (`subject_code`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mytable`
--
-- Indexes for table `sessions`


--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `student_courses`


--
-- Indexes for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD PRIMARY KEY (`fee_id`),
  ADD KEY `roll_no` (`roll_no`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`teacher_id`);


--
-- Indexes for table `teacher_salary_report`
--
ALTER TABLE `teacher_salary_report`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekdays`


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_result`
--
ALTER TABLE `class_result`
  MODIFY `class_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sessions`

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_courses`


--
-- AUTO_INCREMENT for table `student_fee`
--
ALTER TABLE `student_fee`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_info`
--
ALTER TABLE `teacher_info`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_salary_report`
--
ALTER TABLE `teacher_salary_report`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `weekdays`


--
-- Constraints for dumped tables
--

--
-- Constraints for table `teacher_salary_report`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
