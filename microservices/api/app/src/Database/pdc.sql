-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 12:25 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cure`
--

CREATE TABLE IF NOT EXISTS `cure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disease` varchar(256) NOT NULL,
  `medication` varchar(256) NOT NULL,
  `precautions` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cure`
--

INSERT INTO `cure` (`id`, `disease`, `medication`, `precautions`) VALUES
(1, 'fever', 'patacetamol 500mg', 'Avoid Cold Water, Take Warm Baths.'),
(2, 'Malaria', 'Alag Alag Davai', 'Macharo se Door rho bhai'),
(3, 'ulcer', 'pet me jalan ki davai', 'Thoda chill khana kha bhai mere. Kyu mrna hai teko?'),
(4, 'gas', 'Some Davai with awesome Price', 'Kam khaya kr'),
(5, 'food poisoning', 'Antibiotic', 'Bahar ka khaya to samaj lena tu !!!'),
(6, 'tuberculosis', 'Ameero ki davaiya', 'Aur ignore kr khaasi. Amitab Bachan ki advertisement ni dekhi?');

-- --------------------------------------------------------

--
-- Table structure for table `dis`
--

CREATE TABLE IF NOT EXISTS `dis` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `sym` varchar(255) NOT NULL,
  `dise` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dis`
--

INSERT INTO `dis` (`id`, `sym`, `dise`) VALUES
(1, 'headache', 'headache,fever,malaria'),
(2, 'stomach ache', 'alcer,gas,foodposioning'),
(3, 'cough', 'cough,fever,tb');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE IF NOT EXISTS `disease` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `symptom` varchar(256) NOT NULL,
  `disease` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`id`, `symptom`, `disease`) VALUES
(1, 'headache', 'headache,fever,malaria,dengue,yellow fever'),
(2, 'stomach ache', 'stomach ache,ulcer,gas,food poisoning'),
(3, 'cough', 'cough,fever,yellow fever,tuberculosis'),
(4, 'cold', 'cold,fever,tuberculosis'),
(5, 'Fever Low then High', 'malaria,dengue,fellow fever'),
(6, 'body pain', 'body pain,malaria,chikangunia'),
(7, 'itching', 'malaria');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `d_username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `rating` double NOT NULL,
  `patients_treated` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`d_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_username`, `name`, `qualification`, `phone`, `email`, `district`, `pin`, `state`, `country`, `rating`, `patients_treated`, `password`) VALUES
('preetbohra', 'Preet Bohra', 'MBBS', '+919166445750', 'hello@hello.com', 'Jodhpur', 342001, 'Rajasthan', 'India', 5, 1, 'preet@123'),
('test', 'test', 'tset', '89465', 'iusehgof', '', 646, 'iuehgo', 'difjg', 0, 0, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `doc_resp`
--

CREATE TABLE IF NOT EXISTS `doc_resp` (
  `id` int(11) DEFAULT NULL,
  `d_username` varchar(50) NOT NULL,
  `diseases` varchar(255) NOT NULL,
  `precaution` varchar(255) NOT NULL,
  `p_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `p_username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `district` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`p_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_username`, `name`, `age`, `district`, `pin`, `state`, `country`, `phone`, `email`, `password`) VALUES
('gajju', 'hoj', 60, '', 0, 'lkjnnlkn', 'lknlknlk', 'jhbvj', 'kjnklj', 'test'),
('raghavagarwal', 'Raghav Agarwal', 20, 'Jodhpur', 342001, 'Rajasthan', 'India', '+918003215312', 'hello_hi@hello.com', 'raghav@123'),
('skjf', 'osidgo', 87, '', 788, 'ksrgoi', 'psojgpo', '4465465', 'osijgoi', 'ytty');

-- --------------------------------------------------------

--
-- Table structure for table `wait`
--

CREATE TABLE IF NOT EXISTS `wait` (
  `p_username` varchar(50) NOT NULL,
  `symptom` varchar(255) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`p_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wait`
--

INSERT INTO `wait` (`p_username`, `symptom`, `flag`) VALUES
('raghavagarwal', ',headache,cough', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
