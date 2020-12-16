-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 16, 2020 at 04:33 AM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvgig`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'qdsIiIOjsO', 'JVAPH1F42Z@gmail.com', 4716922679, 'oTjLTKOTUffQhsqJwK5GWNABtyoAGwXlKQjp8b6mj9dHtlesCo', 'SZl084IPAJuBB3NYbAUa4gRqrdtSCq8MazMLGvpeUDbVxRLHvMd1HPhAI7O5jj6vdqDKwGF7yepWYjnifpMB4oJp2h2JmfjyxiVa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

DROP TABLE IF EXISTS `degrees`;
CREATE TABLE IF NOT EXISTS `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `degrees_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'High School Diploma', NULL, '2020-10-01 03:12:41', '2020-10-01 03:12:41'),
(2, 'GED', NULL, '2020-10-01 03:12:55', '2020-10-01 03:12:55'),
(3, 'Associate of Arts', NULL, '2020-10-01 03:13:09', '2020-10-01 03:13:09'),
(4, 'Associate of Science', NULL, '2020-10-01 03:13:26', '2020-10-01 03:13:26'),
(5, 'Associate of Applied Science', NULL, '2020-10-01 03:13:40', '2020-10-01 03:13:40'),
(6, 'Bachelor of Arts', NULL, '2020-10-01 03:13:53', '2020-10-01 03:13:53'),
(7, 'Bachelor of Science', NULL, '2020-10-01 03:14:09', '2020-10-01 03:14:09'),
(8, 'BBA', NULL, '2020-10-01 03:14:23', '2020-10-01 03:14:23'),
(9, 'Master of Arts', NULL, '2020-10-01 03:14:37', '2020-10-01 03:14:37'),
(10, 'Master of Science', NULL, '2020-10-01 03:14:50', '2020-10-01 03:14:50'),
(11, 'MBA', NULL, '2020-10-01 03:15:00', '2020-10-01 03:15:00'),
(12, 'J.D.', NULL, '2020-10-01 03:15:09', '2020-10-01 03:15:20'),
(13, 'M.D.', NULL, '2020-10-01 03:15:24', '2020-10-01 03:15:24'),
(14, 'Ph.D.', NULL, '2020-10-01 03:15:34', '2020-10-01 03:15:34'),
(15, 'BCA', NULL, '2020-10-01 04:41:20', '2020-10-01 04:41:20'),
(16, 'MCA', NULL, '2020-10-01 04:41:25', '2020-10-01 04:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

DROP TABLE IF EXISTS `letters`;
CREATE TABLE IF NOT EXISTS `letters` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `letters`
--

INSERT INTO `letters` (`id`, `parent_id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'Cover Letter', 'Cover Letter', NULL, '2020-10-08 04:06:45', '2020-10-08 04:06:45'),
(2, 0, 'Thank You Letter', 'Thank You Letter', NULL, '2020-10-08 04:07:05', '2020-10-08 04:07:05'),
(3, 0, 'Business Letter', 'Business Letter', NULL, '2020-10-08 04:07:21', '2020-10-08 04:07:21'),
(4, 1, 'Career Change', 'Career Change', NULL, '2020-10-08 04:45:38', '2020-10-08 04:45:38'),
(5, 1, 'Internship', 'Internship', NULL, '2020-10-08 04:45:56', '2020-10-08 04:45:56'),
(6, 1, 'Letter of Interest', 'Letter of Interest', NULL, '2020-10-08 04:46:11', '2020-10-08 04:46:11'),
(7, 1, 'Military Transition', 'Military Transition', NULL, '2020-10-08 04:46:27', '2020-10-08 04:46:27'),
(8, 1, 'Networking', 'Networking', NULL, '2020-10-08 04:47:00', '2020-10-08 04:47:00'),
(9, 1, 'Recruiter Contact', 'Recruiter Contact', NULL, '2020-10-08 04:47:19', '2020-10-08 04:47:19'),
(10, 1, 'Reference Request', 'Reference Request', NULL, '2020-10-08 04:47:36', '2020-10-08 04:47:36'),
(11, 1, 'Returning to Work Force', 'Returning to Work Force', NULL, '2020-10-08 04:47:52', '2020-10-08 04:47:52'),
(12, 3, 'Job Acceptance', 'Job Acceptance', NULL, '2020-10-08 04:53:25', '2020-10-08 04:53:25'),
(13, 3, 'Rejection Response', 'Rejection Response', NULL, '2020-10-08 04:53:46', '2020-10-08 04:53:46'),
(14, 3, 'Resignation', 'Resignation', NULL, '2020-10-08 04:53:59', '2020-10-08 04:53:59'),
(15, 3, 'Salary Negotiation', 'Salary Negotiation', NULL, '2020-10-08 04:54:17', '2020-10-08 04:54:17'),
(16, 3, 'Salary Requirements', 'Salary Requirements', NULL, '2020-10-08 04:54:36', '2020-10-08 04:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_26_101658_create_templates_table', 1),
(5, '2020_08_26_102155_create_user_resumes_table', 1),
(6, '2020_08_26_102206_create_user_letters_table', 1),
(7, '2020_08_26_102215_create_letters_table', 1),
(8, '2020_08_26_102248_create_prewritten_contents_table', 1),
(9, '2020_08_26_102259_create_contacts_table', 1),
(10, '2020_08_26_102309_create_degrees_table', 1),
(11, '2020_09_28_082341_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reference_id` bigint(20) UNSIGNED NOT NULL,
  `resume_type` enum('resume','letter') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `total_amount` double(8,2) DEFAULT NULL,
  `payment_status` enum('pending','succeed','failed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prewritten_contents`
--

DROP TABLE IF EXISTS `prewritten_contents`;
CREATE TABLE IF NOT EXISTS `prewritten_contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'experience',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prewritten_contents`
--

INSERT INTO `prewritten_contents` (`id`, `type`, `title`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'skills', 'Contract negotiation', 'Contract negotiation', NULL, '2020-10-01 05:20:13', '2020-10-01 05:20:13'),
(2, 'skills', 'Inventory management', 'Inventory management', NULL, '2020-10-01 05:20:31', '2020-10-01 05:20:31'),
(3, 'skills', 'Financial reporting', 'Financial reporting', NULL, '2020-10-01 05:21:04', '2020-10-01 05:21:04'),
(4, 'skills', 'Product demonstration', 'Product demonstration', NULL, '2020-10-01 05:21:25', '2020-10-01 05:21:25'),
(5, 'skills', 'Customer needs assessment', 'Customer needs assessment', NULL, '2020-10-01 05:21:47', '2020-10-01 05:21:47'),
(6, 'skills', 'New customer acquisition', 'New customer acquisition', NULL, '2020-10-01 05:22:02', '2020-10-01 05:22:02'),
(8, 'summary', 'summary first', 'Skilled team player with a strong background in [Type] environments. Works well independently to handle assignments and always ready to go beyond basics assignments. Quick learner with good computer abilities.', NULL, '2020-10-01 06:36:38', '2020-10-01 06:36:38'),
(9, 'experience', 'Recognized and took', 'Recognized and took advantage of opportunities to increase business revenue, including [Type]s and [Type]s.', NULL, '2020-10-02 01:05:59', '2020-10-02 01:05:59'),
(10, 'experience', 'Protected business', 'Protected business from unnecessary liability by carefully following security and safety standards.', NULL, '2020-10-02 01:07:54', '2020-10-02 01:07:54'),
(11, 'experience', 'Filed records', 'Filed records to keep the system efficient and information organized.', NULL, '2020-10-02 01:08:28', '2020-10-02 01:08:28'),
(12, 'experience', 'Kept inventory', 'Kept inventory levels optimized and supplies organized for forecasted demands.', NULL, '2020-10-02 01:08:55', '2020-10-02 01:08:55'),
(13, 'education', 'GPA', 'GPA [number].', NULL, '2020-10-02 02:42:19', '2020-10-02 02:42:19'),
(14, 'education', 'Minor', 'Minor in [Minor].', NULL, '2020-10-02 02:42:43', '2020-10-02 02:42:43'),
(15, 'education', 'Double major in', 'Double major in [Other Major].', NULL, '2020-10-02 02:43:03', '2020-10-02 02:43:03'),
(16, 'education', 'semesters', 'Dean’s List Honoree, [number] semesters.', NULL, '2020-10-02 02:43:40', '2020-10-02 02:43:40'),
(17, 'education', 'Awarded', 'Awarded [Scholarship Name].', NULL, '2020-10-02 02:44:08', '2020-10-02 02:44:08'),
(18, 'education', 'Graduated with distinction.', 'Graduated with distinction.', NULL, '2020-10-02 02:44:24', '2020-10-02 02:44:24'),
(19, 'education', 'Graduated in top [number]% of class.', 'Graduated in top [number]% of the class.', NULL, '2020-10-02 02:44:42', '2020-10-02 02:44:42'),
(20, 'summary', 'Accomplished', 'Accomplished [Type] professional bringing proven expertise in [Industry] operations and practices. Manages activities with a good understanding of current needs and future targets. Offers excellent project management and team leadership abilities.', NULL, '2020-10-02 03:55:00', '2020-10-02 03:55:00'),
(21, 'summary', 'Dependable', 'Dependable [Type] industry worker equipped for fast-paced work and changing daily needs. Serves customers effectively with attention to detail and a hardworking approach. Seeks out opportunities to go beyond basics, improve processes, and increase customer satisfaction.', NULL, '2020-10-02 03:57:00', '2020-10-02 03:57:00'),
(22, 'summary', 'hardworking', 'A hardworking and reliable [Job Title] focused on going above and beyond to support the team and serve customers. Trained in [Task] and offering top-notch [Skill] abilities. Motivated to continue to learn and grow as a [Type] professional.', NULL, '2020-10-02 03:57:40', '2020-10-02 03:57:40'),
(23, 'Community Service', 'Pee Wee Soccer, Coach, 2009-2012', 'Pee Wee Soccer, Coach, 2009-2012', NULL, '2020-10-05 01:33:31', '2020-10-05 01:33:31'),
(24, 'Community Service', 'Volunteer, Grand Rapids Animal Shelter, 2010-Current', 'Volunteer, Grand Rapids Animal Shelter, 2010-Current', NULL, '2020-10-05 01:33:54', '2020-10-05 01:33:54'),
(25, 'Community Service', 'Lunchroom Aide, Warren County Schools, 2002-Present', 'Lunchroom Aide, Warren County Schools, 2002-Present', NULL, '2020-10-05 01:34:07', '2020-10-05 01:34:07'),
(26, 'Community Service', 'Volunteer, Habitat for Humanity, 2009', 'Volunteer, Habitat for Humanity, 2009', NULL, '2020-10-05 01:34:32', '2020-10-05 01:34:32'),
(27, 'Community Service', 'Set Construction, Greencastle Community Theater, 2004-2011', 'Set Construction, Greencastle Community Theater, 2004-2011', NULL, '2020-10-05 01:34:43', '2020-10-05 01:34:43'),
(28, 'Community Service', 'Collection Volunteer, Toys for Tots, March 2007', 'Collection Volunteer, Toys for Tots, March 2007', NULL, '2020-10-05 01:34:55', '2020-10-05 01:34:55'),
(29, 'Community Service', 'Student Tutor, Greenborough Elementary School, 2003-2005', 'Student Tutor, Greenborough Elementary School, 2003-2005', NULL, '2020-10-05 01:35:07', '2020-10-05 01:35:07'),
(30, 'Language', 'Spanish, level of proficiency: conversational', 'Spanish, level of proficiency: conversational', NULL, '2020-10-05 01:36:34', '2020-10-05 01:36:34'),
(31, 'Language', 'Fluent in French', 'Fluent in French', NULL, '2020-10-05 01:37:45', '2020-10-05 01:37:45'),
(32, 'Language', 'Native Japanese speaker', 'Native Japanese speaker', NULL, '2020-10-05 01:38:03', '2020-10-05 01:38:03'),
(33, 'Language', 'German - conversational', 'German - conversational', NULL, '2020-10-05 01:38:11', '2020-10-05 01:38:11'),
(34, 'Language', 'Cantonese, fluent', 'Cantonese, fluent', NULL, '2020-10-05 01:38:23', '2020-10-05 01:38:23'),
(35, 'Affiliations', 'Member, Association of Small Businesses, 2012-Present', 'Member, Association of Small Businesses, 2012-Present', NULL, '2020-10-05 01:39:55', '2020-10-05 01:39:55'),
(36, 'Affiliations', 'Member, Purdue University Alumni Association', 'Member, Purdue University Alumni Association', NULL, '2020-10-05 01:40:04', '2020-10-05 01:40:04'),
(37, 'Affiliations', 'Member, New York State Nurses Association, 2002-Present', 'Member, New York State Nurses Association, 2002-Present', NULL, '2020-10-05 01:40:18', '2020-10-05 01:40:18'),
(38, 'Affiliations', 'Member, Society of Women Engineers, 2007-2013', 'Member, Society of Women Engineers, 2007-2013', NULL, '2020-10-05 01:40:29', '2020-10-05 01:40:29'),
(39, 'Affiliations', 'Member, Society for Marketing Professionals (SMP)', 'Member, Society for Marketing Professionals (SMP)', NULL, '2020-10-05 01:40:39', '2020-10-05 01:40:39'),
(40, 'Affiliations', 'Michigan Association of Certified Public Accountants - MACPA', 'Michigan Association of Certified Public Accountants - MACPA', NULL, '2020-10-05 01:40:51', '2020-10-05 01:40:51'),
(41, 'Affiliations', 'Membership Chair, Alpha Beta Chi Fraternity, 2006-2009', 'Membership Chair, Alpha Beta Chi Fraternity, 2006-2009', NULL, '2020-10-05 01:41:01', '2020-10-05 01:41:01'),
(42, 'Affiliations', 'Member, National Education Association, 1998-Present', 'Member, National Education Association, 1998-Present', NULL, '2020-10-05 01:41:11', '2020-10-05 01:41:11'),
(43, 'Affiliations', 'عضو جمعية التربية الوطنية 1998 حتى الآن', 'عضو جمعية التربية الوطنية 1998 حتى الآن', NULL, '2020-10-05 01:41:24', '2020-10-05 01:41:24'),
(44, 'Awards', 'Honor Roll: Fall 2011', 'Honor Roll: Fall 2011', NULL, '2020-10-05 01:42:44', '2020-10-05 01:42:44'),
(45, 'Awards', 'Student Athlete Award, 2008-2010', 'Student-Athlete Award, 2008-2010', NULL, '2020-10-05 01:42:58', '2020-10-05 01:42:58'),
(46, 'Awards', 'Top Performer, Inside Sales Team, 2007', 'Top Performer, Inside Sales Team, 2007', NULL, '2020-10-05 01:43:09', '2020-10-05 01:43:09'),
(47, 'Awards', '2nd Place, Innovation Award, 2004', '2nd Place, Innovation Award, 2004', NULL, '2020-10-05 01:43:20', '2020-10-05 01:43:20'),
(48, 'Awards', 'Dean\'s List, Fall 2010-Spring 2011', 'Dean\'s List, Fall 2010-Spring 2011', NULL, '2020-10-05 01:43:30', '2020-10-05 01:43:30'),
(49, 'Awards', 'Employee of the Month, Springfield Grocery', 'Employee of the Month, Springfield Grocery', NULL, '2020-10-05 01:43:43', '2020-10-05 01:43:43'),
(50, 'Awards', 'Emerging Leader at CitiBank, May 2006', 'Emerging Leader at CitiBank, May 2006', NULL, '2020-10-05 01:43:53', '2020-10-05 01:43:53'),
(51, 'Awards', 'Outstanding Achievement in Customer Satisfaction, 2013', 'Outstanding Achievement in Customer Satisfaction, 2013', NULL, '2020-10-05 01:44:05', '2020-10-05 01:44:05'),
(52, 'Additional Information', 'Keynote Speaker, Society of Women Engineers, June 2011', 'Keynote Speaker, Society of Women Engineers, June 2011', NULL, '2020-10-05 01:45:05', '2020-10-05 01:45:05'),
(53, 'Additional Information', 'Proficient in Microsoft Word, PowerPoint, Excel, [other programs]', 'Proficient in Microsoft Word, PowerPoint, Excel, [other programs]', NULL, '2020-10-05 01:45:17', '2020-10-05 01:45:17'),
(54, 'Additional Information', 'Certified in First Aid, November 2014', 'Certified in First Aid, November 2014', NULL, '2020-10-05 01:45:30', '2020-10-05 01:45:30'),
(55, 'Additional Information', 'Personal website: www.michael-williams.com', 'Personal website: www.michael-williams.com', NULL, '2020-10-05 01:45:43', '2020-10-05 01:45:43'),
(56, 'Publication', 'Senior Thesis – “The role of proper nutrition in overall health and well-being”', 'Senior Thesis – “The role of proper nutrition in overall health and well-being”', NULL, '2020-10-05 01:47:34', '2020-10-05 01:47:34'),
(57, 'Publication', 'Davis, Cynthia G. \"Topics in Popular Culture: American Television of the 1980s\" Pop Culture Scene 1.3 (2007): 113-122. 0', 'Davis, Cynthia G. \"Topics in Popular Culture: American Television of the 1980s\" Pop Culture Scene 1.3 (2007): 113-122. 0', NULL, '2020-10-05 01:47:50', '2020-10-05 01:47:50'),
(58, 'Publication', 'De Schepper K. \"Issues and Challenges in the Mental Health Care System.\" The National Journal of Medicine. 2005; 34 (5): 82-85', 'De Schepper K. \"Issues and Challenges in the Mental Health Care System.\" The National Journal of Medicine. 2005; 34 (5): 82-85', NULL, '2020-10-05 01:48:25', '2020-10-05 01:48:25'),
(59, 'Publication', 'Janice Lu, \"Mongolia: The Heightened Beauty of the Steppes\" Springfield Gazette, August 29, 2013, 14-15', 'Janice Lu, \"Mongolia: The Heightened Beauty of the Steppes\" Springfield Gazette, August 29, 2013, 14-15', NULL, '2020-10-05 02:00:45', '2020-10-05 02:00:45'),
(60, 'Publication', 'Raphael Mannarino, The Stage is Yours: Mastering the Art of Public Speaking (New York, Imprint Press), 2009', 'Raphael Mannarino, The Stage is Yours: Mastering the Art of Public Speaking (New York, Imprint Press), 2009', NULL, '2020-10-05 02:00:56', '2020-10-05 02:00:56'),
(61, 'Letter Subject', 'RE: Dedicated and Energetic [Job Title]', 'RE: Dedicated and Energetic [Job Title]', NULL, '2020-10-12 00:06:44', '2020-10-12 00:06:44'),
(62, 'Letter Subject', 'RE: Accomplished [Job Title] for hire', 'RE: Accomplished [Job Title] for hire', NULL, '2020-10-12 00:06:57', '2020-10-12 00:06:57'),
(63, 'Letter Subject', 'RE: Your [Date] posting for a new [Job Title]', 'RE: Your [Date] posting for a new [Job Title]', NULL, '2020-10-12 00:07:10', '2020-10-12 00:07:10'),
(64, 'Letter Subject', 'Your posting for [Job Title], [Posting Location], [Date]', 'Your posting for [Job Title], [Posting Location], [Date]', NULL, '2020-10-12 00:07:20', '2020-10-12 00:07:20'),
(65, 'Letter Subject', 'RE: [Job Title] ad, [Date]', 'RE: [Job Title] ad, [Date]', NULL, '2020-10-12 00:07:31', '2020-10-12 00:07:31'),
(66, 'Letter Subject', 'RE: Open [Job Title] Position', 'RE: Open [Job Title] Position', NULL, '2020-10-12 00:07:40', '2020-10-12 00:07:40'),
(67, 'Letter Subject', 'RE: [Job Title][Reference #]', 'RE: [Job Title][Reference #]', NULL, '2020-10-12 00:07:49', '2020-10-12 00:07:49'),
(68, 'Letter Subject', 'RE: Experienced [Industry] Professional for Hire', 'RE: Experienced [Industry] Professional for Hire', NULL, '2020-10-12 00:07:58', '2020-10-12 00:07:58'),
(69, 'Letter Subject', 'RE: [Job Location] [Job Title] posting, [Date]', 'RE: [Job Location] [Job Title] posting, [Date]', NULL, '2020-10-12 00:08:09', '2020-10-12 00:08:09'),
(70, 'Greeting', 'Dear Hiring Manager,', 'Dear Hiring Manager,', NULL, '2020-10-12 00:53:33', '2020-10-12 00:53:33'),
(71, 'Greeting', 'Dear Human Resources Professional,', 'Dear Human Resources Professional,', NULL, '2020-10-12 00:53:44', '2020-10-12 00:53:44'),
(72, 'Greeting', 'Dear Mr. or Ms. [Last Name],', 'Dear Mr. or Ms. [Last Name],', NULL, '2020-10-12 00:53:54', '2020-10-12 00:53:54'),
(73, 'Greeting', 'To Recruiter,', 'To Recruiter,', NULL, '2020-10-12 00:54:08', '2020-10-12 00:54:08'),
(74, 'Greeting', 'To the Search Committee,', 'To the Search Committee,', NULL, '2020-10-12 00:54:18', '2020-10-12 00:54:18'),
(75, 'Greeting', 'To [First Name][Last Name],', 'To [First Name][Last Name],', NULL, '2020-10-12 00:54:29', '2020-10-12 00:54:29'),
(76, 'Greeting', 'To [Title],', 'To [Title],', NULL, '2020-10-12 00:54:39', '2020-10-12 00:54:39'),
(77, 'Greeting', 'Dear [Full Name],', 'Dear [Full Name],', NULL, '2020-10-12 00:54:49', '2020-10-12 00:54:49'),
(78, 'Greeting', 'Dear [Title][Last Name],', 'Dear [Title][Last Name],', NULL, '2020-10-12 00:54:59', '2020-10-12 00:54:59'),
(79, 'Greeting', 'Dear Human Resources Manager,', 'Dear Human Resources Manager,', NULL, '2020-10-12 00:55:07', '2020-10-12 00:55:07'),
(80, 'Opener', 'The enclosed resume fully outlines the value I can provide to your organization. Here is a brief overview:', 'The enclosed resume fully outlines the value I can provide to your organization. Here is a brief overview:', NULL, '2020-10-12 01:08:41', '2020-10-12 01:08:41'),
(81, 'Opener', 'In this economy, you don\'t have time to waste on unskilled or unmotivated workers. I have what you need.', 'In this economy, you don\'t have time to waste on unskilled or unmotivated workers. I have what you need.', NULL, '2020-10-12 01:08:51', '2020-10-12 01:08:51'),
(82, 'Opener', 'Please review my attached resume to see my skills and experience. Highlights of what I offer include:', 'Please review my attached resume to see my skills and experience. Highlights of what I offer include:', NULL, '2020-10-12 01:09:02', '2020-10-12 01:09:02'),
(83, 'Opener', 'My attached resume outlines my in-depth experience and professional development. If you give me a chance in an interview and hire me as your new [Job Title], you will not be disappointed.', 'My attached resume outlines my in-depth experience and professional development. If you give me a chance in an interview and hire me as your new [Job Title], you will not be disappointed.', NULL, '2020-10-12 01:09:16', '2020-10-12 01:09:16'),
(84, 'Opener', 'The enclosed resume details will show you that I have the career history and knowledge vital to success in our industry. I have the experience and qualifications [Company Name] seeks.', 'perience and professional development. If you give me a chance in an interview and hire me as your new [Job Title], you will not be disappointed.', NULL, '2020-10-12 01:09:32', '2020-10-12 01:09:32'),
(85, 'Opener', 'I know that with my extensive experience I can contribute', 'I know that with my extensive experience I can contribute to your position as a leader in the [enter industry] industry. I would welcome the opportunity to ensure [Company Name] maintains its growth and position in the field.', NULL, '2020-10-12 01:40:12', '2020-10-12 01:40:12'),
(86, 'Opener', 'If you are looking to hire a successful and proven', 'If you are looking to hire a successful and proven [Job Title] who can step in and immediately contribute to [Company Name], look no further', NULL, '2020-10-12 01:40:34', '2020-10-12 01:40:34'),
(87, 'Opener', 'I have long admired', 'I have long admired [Company Name], and am thrilled to see that you are hiring for a [Job Title]. I believe I have the qualifications you need and that I would be a great fit for your team.', NULL, '2020-10-12 01:40:46', '2020-10-12 01:40:46'),
(88, 'Opener', 'The enclosed resume will make it clear that I am the top candidate to be your new [Job Title].', 'The enclosed resume will make it clear that I am the top candidate to be your new [Job Title].', NULL, '2020-10-12 01:41:02', '2020-10-12 01:41:02'),
(89, 'Opener', 'I am certain I have the personal qualities that [Company Name] needs and deserves in a [Job Title].', 'I am certain I have the personal qualities that [Company Name] needs and deserves in a [Job Title].', NULL, '2020-10-12 01:41:13', '2020-10-12 01:41:13'),
(90, 'Opener', 'It would be especially thrilling to work', 'It would be especially thrilling to work for your organization! I would be very excited to tell people that I am a member of the [Company Name] team.', NULL, '2020-10-12 01:41:27', '2020-10-12 01:41:27'),
(91, 'Opener', 'Your job posting really spoke to me because I\'m certain that the position', 'Your job posting really spoke to me because I\'m certain that the position you described aligns perfectly with my skills and background, which you will see detailed on my attached resume.', NULL, '2020-10-12 01:41:43', '2020-10-12 01:41:43'),
(92, 'Body', 'With experience', 'With experience as a [Job Title] for [Company Name], I gained valuable expertise in [relevant job skills] while further developing my [additional relevant skills]. I have maintained an excellent track record of success in [job accomplishment] and [job accomplishment] and I am positive I would quickly contribute to the continued success of [Company Name].', NULL, '2020-10-12 01:50:09', '2020-10-12 01:50:09'),
(93, 'Body', 'My enclosed resume', 'My enclosed resume includes additional details on the following qualifications:\r\n[Enter job-related expertise or accomplishment]\r\n[Enter job-related expertise or accomplishment]\r\n[Enter job-related expertise or accomplishment]\r\n[Enter job-related expertise or accomplishment]', NULL, '2020-10-12 01:50:27', '2020-10-12 01:50:27'),
(94, 'Body', 'Highlights of my professional qualifications include:', 'Highlights of my professional qualifications include:\r\n[Enter job-related expertise or accomplishment]\r\n[Enter job-related expertise or accomplishment]\r\n[Enter job-related expertise or accomplishment]\r\n[Enter job-related expertise or accomplishment]', NULL, '2020-10-12 01:50:46', '2020-10-12 01:50:46'),
(95, 'Body', 'My recent experience', 'My recent experience as a [Job Title] at [Company Name] included accomplishments such as [enter major accomplishment] that resulted in [enter results]. I have maintained up-to-date industry knowledge and continued to hone my professional skills. I am committed to guaranteeing that [enter job area of responsibility] is completed with efficiency and accuracy.', NULL, '2020-10-12 01:50:59', '2020-10-12 01:50:59'),
(96, 'Body', 'In my previous role', 'In my previous role as [Job Title] at [Company Name], I was responsible for [areas of job responsibility]. Furthermore, my track record of [major accomplishment] resulted in [type improvement]. I am certain that my qualifications and history of success make me a great fit for your new [Job Title] at [Company Name].', NULL, '2020-10-12 01:51:16', '2020-10-12 01:51:16'),
(97, 'Body', 'My educational qualifications', 'My educational qualifications include my [Degree Title] in [Major] and my most current work experience with [Company Name]. As a successful [Job Title], I [include daily job actions]. In this role, I further developed my [enter skill] and [enter skill] abilities. I believe that my core skills and unique qualifications would make me a valuable addition to your team.', NULL, '2020-10-12 01:51:28', '2020-10-12 01:51:28'),
(98, 'Body', 'With my educational background', 'With my educational background in [Area of Study] I have a strong understanding of [enter industry]. Furthermore, my on-the-job training has given me hands-on knowledge of [enter job areas] and further developed my [enter relevant personal skills]. I look forward to applying my training as [Job Title] for [Company Name].', NULL, '2020-10-12 01:51:43', '2020-10-12 01:51:43'),
(99, 'Body', 'My strong working knowledge', 'My strong working knowledge of the [enter industry] industry makes me uniquely qualified for this position. In my previous role at [Company Name], I [enter major accomplishment] while handling diverse responsibilities including [enter job responsibilities]. I am dedicated to working hard and collaborating with the team to accomplish goals and ensure continued business success.', NULL, '2020-10-12 01:51:57', '2020-10-12 01:51:57'),
(100, 'Body', 'My strong working knowledge', 'My strong working knowledge of the [enter industry] industry makes me uniquely qualified for this position. In my previous role at [Company Name], I [enter major accomplishment] while handling diverse responsibilities including [enter job responsibilities]. I am dedicated to working hard and collaborating with the team to accomplish goals and ensure continued business success.', NULL, '2020-10-12 01:51:57', '2020-10-12 01:51:57'),
(101, 'Body', 'I have completed relevant training and studies', 'I have completed relevant training and studies that match the qualifications needed for your [Job Title] position. With my [enter personal qualities] nature and my educational background I am certain I have much to offer [Company Name]. In addition to my strong communication and interpersonal abilities, I also have a solid understanding of [enter areas of relevant expertise].', NULL, '2020-10-12 01:52:15', '2020-10-12 01:52:15'),
(102, 'call-to-action', 'Please contact me at your convenience. I would be happy to provide additional information about my expertise and professional background.', 'Please contact me at your convenience. I would be happy to provide additional information about my expertise and professional background.', NULL, '2020-10-12 02:55:40', '2020-10-12 02:55:40'),
(103, 'call-to-action', 'Please call me to discuss the position and your needs. I am very interested in meeting face to face at your earliest convenience.', 'Please call me to discuss the position and your needs. I am very interested in meeting face to face at your earliest convenience.', NULL, '2020-10-12 02:55:53', '2020-10-12 02:55:53'),
(104, 'call-to-action', 'I will call you in the next few days to confirm receipt of my resume and arrange an interview time.', 'I will call you in the next few days to confirm receipt of my resume and arrange an interview time.', NULL, '2020-10-12 02:56:04', '2020-10-12 02:56:04'),
(105, 'call-to-action', 'When you are ready, I look forward to meeting to discuss your business needs and how I can contribute to your success.', 'When you are ready, I look forward to meeting to discuss your business needs and how I can contribute to your success.', NULL, '2020-10-12 02:56:15', '2020-10-12 02:56:15'),
(106, 'call-to-action', 'Please call me to set up a personal meeting', 'Please call me to set up a personal meeting where we can discuss how I can contribute to the continued growth and success of [Company Name].', NULL, '2020-10-12 02:56:27', '2020-10-12 02:56:27'),
(107, 'call-to-action', 'I would welcome the opportunity', 'I would welcome the opportunity to discuss the position and how my credentials and experience can add substantial value your company.', NULL, '2020-10-12 02:56:44', '2020-10-12 02:56:44'),
(108, 'call-to-action', 'I will call this week to arrange an interview time.', 'I will call this week to arrange an interview time.', NULL, '2020-10-12 02:56:54', '2020-10-12 02:56:54'),
(109, 'call-to-action', 'I will follow up within the next few days to discuss how I can make a positive contribution to your organization.', 'I will follow up within the next few days to discuss how I can make a positive contribution to your organization.', NULL, '2020-10-12 02:57:07', '2020-10-12 02:57:07'),
(110, 'call-to-action', 'I am available to talk by phone or meet in-person at your earliest convenience.', 'I am available to talk by phone or meet in-person at your earliest convenience.', NULL, '2020-10-12 02:57:14', '2020-10-12 02:57:14'),
(111, 'call-to-action', 'Please review my enclosed resume for additional details regarding my experience and accomplishments. If you agree that my qualifications meet your needs, call me anytime.', 'Please review my enclosed resume for additional details regarding my experience and accomplishments. If you agree that my qualifications meet your needs, call me anytime.', NULL, '2020-10-12 02:57:23', '2020-10-12 02:57:23'),
(112, 'call-to-action', 'If you have any questions about my qualifications please feel free to contact me. I will make myself available for a phone or in-person interview at your convenience.', 'If you have any questions about my qualifications please feel free to contact me. I will make myself available for a phone or in-person interview at your convenience.', NULL, '2020-10-12 02:57:33', '2020-10-12 02:57:33'),
(113, 'call-to-action', 'Please feel free to call or email me at your earliest convenience. I look forward to hearing from you soon.', 'Please feel free to call or email me at your earliest convenience. I look forward to hearing from you soon.', NULL, '2020-10-12 02:57:42', '2020-10-12 02:57:42'),
(114, 'closer', 'Thank you for your time and consideration,', 'Thank you for your time and consideration,', NULL, '2020-10-12 03:00:15', '2020-10-12 03:00:15'),
(115, 'closer', 'Thank you in advance for your time.', 'Thank you in advance for your time.\r\n\r\nBest regards,', NULL, '2020-10-12 03:00:29', '2020-10-12 03:00:29'),
(116, 'closer', 'Until next time,', 'Until next time,', NULL, '2020-10-12 03:00:40', '2020-10-12 03:00:40'),
(117, 'closer', 'Sincerely,', 'Sincerely,', NULL, '2020-10-12 03:00:50', '2020-10-12 03:00:50'),
(118, 'closer', 'Have a great day.  Sincerely,', 'Have a great day.\r\n\r\nSincerely,', NULL, '2020-10-12 03:01:00', '2020-10-12 03:01:00'),
(119, 'closer', 'Regards', 'I am eager to put my expertise and qualifications to work for your team.\r\n\r\nRegards,', NULL, '2020-10-12 03:01:12', '2020-10-12 03:01:12'),
(120, 'closer', 'Thank you for your consideration.', 'Thank you for your consideration.\r\n\r\nBest regards,', NULL, '2020-10-12 03:01:24', '2020-10-12 03:01:24'),
(121, 'closer', 'I look forward to hearing from you soon.', 'I look forward to hearing from you soon.\r\n\r\nSincerely,', NULL, '2020-10-12 03:01:35', '2020-10-12 03:01:35'),
(122, 'closer', 'I\'d appreciate the opportunity to utilize my skills to contribute to your team.', 'I\'d appreciate the opportunity to utilize my skills to contribute to your team.', NULL, '2020-10-12 03:01:46', '2020-10-12 03:01:46'),
(123, 'closer', 'Looking forward to your reply.', 'Looking forward to your reply.\r\n\r\nSincerely,', NULL, '2020-10-12 03:02:00', '2020-10-12 03:02:00'),
(124, 'closer', 'Sincerely,', 'Sincerely,', NULL, '2020-10-12 03:02:10', '2020-10-12 03:02:10'),
(125, 'closer', 'Thank you again for your interest,', 'Thank you again for your interest,', NULL, '2020-10-12 03:02:18', '2020-10-12 03:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
CREATE TABLE IF NOT EXISTS `templates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('resume','letter') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'resume',
  `required_image` tinyint(1) NOT NULL DEFAULT '0',
  `tag` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'simple',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `name`, `description`, `image`, `path`, `type`, `required_image`, `tag`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Kingfish', 'For those who\'ve been there and done that, the big tunas, the white whales: the Kingfish design lets you say a whole lot without saying too much.', 'images/template/1601376110_template.svg', 'tempalte/resume/kingfish', 'resume', 0, 'simple', 1, NULL, '2020-09-29 05:11:50', '2020-09-29 05:49:27'),
(2, 'Blueprint', 'A place for everything and everything in its place. Build your career on a solid foundation with the measured design elements in Blueprint. You\'re a total stud and you\'re sure to nail the interview.', 'images/template/1601377255_template.svg', 'tempalte/resume/blueprint', 'resume', 0, 'simple', 1, NULL, '2020-09-29 05:30:54', '2020-09-29 05:30:55'),
(3, 'Flapjack', 'Friends and family say you are creative. Little do they know that you eat innovation for breakfast. You have just the creative spark an employer is looking for. Show them, with Flapjack.', 'images/template/1601377639_template.svg', 'tempalte/resume/flapjack', 'resume', 0, 'modern', 1, NULL, '2020-09-29 05:37:19', '2020-10-02 23:06:28'),
(4, 'Greetings', 'Well look who\'s coming through the door, I think we\'ve met somewhere before? Say hello to your new job with the fresh, friendly, clean design of Greetings.', 'images/template/1601378193_template.svg', 'tempalte/resume/greetings', 'resume', 0, 'simple', 0, '2020-09-29 05:49:20', '2020-09-29 05:46:33', '2020-09-29 05:49:20'),
(5, 'Greetings', 'Well look who\'s coming through the door, I think we\'ve met somewhere before? Say hello to your new job with the fresh, friendly, clean design of Greetings.', 'images/template/1601378193_template.svg', 'tempalte/resume/greetings', 'resume', 0, 'simple', 1, '2020-09-29 05:50:00', '2020-09-29 05:46:33', '2020-09-29 05:50:00'),
(6, 'Greetings', 'Well look who\'s coming through the door, I think we\'ve met somewhere before? Say hello to your new job with the fresh, friendly, clean design of Greetings.', 'images/template/1601378193_template.svg', 'tempalte/resume/greetings', 'resume', 1, 'creative', 1, NULL, '2020-09-29 05:46:33', '2020-10-02 23:06:18'),
(7, 'Greetings', 'Well look who\'s coming through the door, I think we\'ve met somewhere before? Say hello to your new job with the fresh, friendly, clean design of Greetings.', 'images/template/1601378207_template.svg', 'tempalte/resume/greetings', 'resume', 0, 'simple', 0, '2020-09-29 05:49:06', '2020-09-29 05:46:47', '2020-09-29 05:49:06'),
(8, 'Greetings', 'Well look who\'s coming through the door, I think we\'ve met somewhere before? Say hello to your new job with the fresh, friendly, clean design of Greetings.', 'images/template/1601378207_template.svg', 'tempalte/resume/greetings', 'resume', 0, 'simple', 0, '2020-09-29 05:49:06', '2020-09-29 05:46:47', '2020-09-29 05:49:06'),
(9, 'Empire', 'Soon you\'ll be commanding thousands as supplicants feed you grapes and fan you with palm fronds. It all starts with one opportunity. Start today, build your Empire.', 'images/template/1602045745_template.svg', 'tempalte/resume/empire', 'resume', 0, 'creative', 1, NULL, '2020-10-06 23:10:10', '2020-10-06 23:12:25'),
(10, 'classic', 'classic', 'images/template/1602147130_template.svg', 'tempalte/letter/classic', 'letter', 0, 'simple', 1, NULL, '2020-10-08 03:22:10', '2020-10-08 03:27:59'),
(11, 'executive', 'executive', 'images/template/1602147178_template.svg', 'tempalte/letter/executive', 'letter', 0, 'creative', 1, NULL, '2020-10-08 03:22:58', '2020-10-08 03:27:53'),
(12, 'bold', 'bold', 'images/template/1602147219_template.svg', 'template/letter/bold', 'letter', 0, 'modern', 1, NULL, '2020-10-08 03:23:39', '2020-10-08 03:27:33'),
(13, 'elegant', 'elegant', 'images/template/1602147261_template.svg', 'tempalte/letter/elegant', 'letter', 0, 'modern', 1, NULL, '2020-10-08 03:24:21', '2020-10-08 03:27:25'),
(14, 'contemporary', 'contemporary', 'images/template/1602147289_template.svg', 'contemporary', 'letter', 0, 'creative', 1, NULL, '2020-10-08 03:24:49', '2020-10-08 03:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','user','guest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guest',
  `provider_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'system',
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `provider_id`, `provider`, `profile`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$UaAl7AhnKH9pEIVSr.7QBOHy/Fk2k/xekGlKkZEc7SZmXzU/N56c2', 'admin', NULL, 'system', 'profile.png', 'vjOT2HIhVu4CIsohJlihQMcrFPuOij12GktvX3cF77KpHZ8XGXRfX8XHNpWi', NULL, NULL, NULL),
(2, 'Alex Parker', 'alexparker@gmail.com', NULL, '$2y$10$UaAl7AhnKH9pEIVSr.7QBOHy/Fk2k/xekGlKkZEc7SZmXzU/N56c2', 'user', NULL, 'system', 'profile.png', NULL, NULL, NULL, NULL),
(3, 'Jitendra Prajapati', 'jitendra.technomads@gmail.com', NULL, '$2y$10$DkRX6.dh6H2EAkfUnRjOk.E7v1gNTT1ro43h/YUeECfgAEn6BaCtS', 'user', '114654765703308351875', 'google', 'profile.png', 'mOWktJP0N1TgTCCFXknSddNi3XL0K2RTtPdQYppXFjNpu4Ws0i6kKMMg1mBQ', NULL, '2020-09-29 01:15:18', '2020-10-12 05:40:13'),
(6, 'John Doe', 'john@grr.la', NULL, '$2y$10$XcXi65DZ9cMbzkvM8SPbIOIYCNuZzs/CGYGDoU5u06FS1mxh9im4G', 'user', NULL, 'system', 'profile.png', NULL, NULL, '2020-09-29 01:54:33', '2020-09-29 01:54:33'),
(7, 'John Test', 'test@grr.la', NULL, '$2y$10$AeeZL5N8PBwkmYriItFgN.MaqrycfwYnA2IqAicdJrZzbhQMZvO/S', 'user', NULL, 'system', 'profile.png', 'RZqN7XFTwCWjNzjN0Xab1WI86ncZnrDm2DLV6pVrDr3VAhAfw7QxTNvUvlYe', NULL, '2020-09-29 01:58:33', '2020-09-29 01:58:33'),
(8, 'Pranav begade', 'technomadss@gmail.com', NULL, '$2y$10$yfHqKLdGUAgwT90GcQ6VLO0/NIAE1XBmdanrPPojpt9L7fMficMFi', 'user', NULL, 'system', 'profile.png', 'Q0068FLKpPiww4p56J8EZhpexsoplyEkARhq4e8DgTePwZ9PZ5eZUBcudd1J', NULL, '2020-09-29 07:17:57', '2020-09-29 07:17:57'),
(9, 'test', 'test@yahoo.in', NULL, '$2y$10$lLKCtMQ0A1XKYzc.KXwiwOMXXB07TkIqMUqvLWIgDRRTlRgj5XNX2', 'user', NULL, 'system', 'profile.png', 'YKNsuN8RKESAStIHKymb0UEFCXKEUUCmK9WaG5UUgfMQ6k29iV6Y4EmfCsNe', NULL, '2020-09-29 23:34:41', '2020-09-29 23:34:41'),
(10, 'Jiya Rankawat', '13mscit099@gmail.com', NULL, '$2y$10$XxSKXXGNgzXQjJHqw1PdtO9EXqBwtoDT89m5rx.0o/axoAChZyQsi', 'user', '107812724073533446780', 'google', 'profile.png', NULL, NULL, '2020-10-03 03:24:13', '2020-10-03 03:24:13'),
(11, 'John Roe', 'johnr@grr.la', NULL, '$2y$10$5lhT6dc8qj.wgYoq6879F.0XIjmuQSRjekkI4YkAy0K5VSfw0TcW.', 'user', NULL, 'system', 'profile.png', NULL, NULL, '2020-10-09 04:13:33', '2020-10-09 04:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_letters`
--

DROP TABLE IF EXISTS `user_letters`;
CREATE TABLE IF NOT EXISTS `user_letters` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template_id` bigint(20) UNSIGNED NOT NULL,
  `letter_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `letter_subtype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_info` longtext COLLATE utf8mb4_unicode_ci,
  `recipient_info` longtext COLLATE utf8mb4_unicode_ci,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `greeting` longtext COLLATE utf8mb4_unicode_ci,
  `opener` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `call_to_action` longtext COLLATE utf8mb4_unicode_ci,
  `closer` longtext COLLATE utf8mb4_unicode_ci,
  `complete_step` int(11) NOT NULL DEFAULT '0',
  `style_section` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_letters_user_id_foreign` (`user_id`),
  KEY `user_letters_template_id_foreign` (`template_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_letters`
--

INSERT INTO `user_letters` (`id`, `user_id`, `title`, `template_id`, `letter_type`, `letter_subtype`, `contact_info`, `recipient_info`, `subject`, `greeting`, `opener`, `body`, `call_to_action`, `closer`, `complete_step`, `style_section`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Letter 58', 10, 'Cover Letter', 'Career Change', '{\"first_name\":\"Jitendra\",\"last_name\":\"Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"9173527938\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\"}', '{\"first_name\":\"Pranav\",\"last_name\":\"begade\",\"email\":\"pranavbegade@gmail.com\",\"phone\":\"9725789197\",\"address\":\"athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\"}', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, '2020-10-08 06:18:12', '2020-10-08 07:01:28'),
(2, 3, 'My first Letter', 10, 'Cover Letter', 'general', '{\"first_name\":\"Jitendra\",\"last_name\":\"Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"9173527938\",\"address\":\"795 Folsom Ave, Suite 600\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\"}', '{\"first_name\":\"Pranav\",\"last_name\":\"begade\",\"email\":\"pranavbegade@gmail.com\",\"phone\":\"9725789197\",\"address\":\"athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\"}', '<p>RE: Experienced IT Professional for Hire.</p>', '<p>Dear Human Resources Professional,</p>', '<p>In this economy, you don\'t have time to waste on unskilled or unmotivated workers. I have what you need.</p>', '<p>My educational qualifications include my MCA in Navsari and my most current work experience with Technomads. As a successful PHP Developer, I Read client mails and Junior Tasks . In this role, I further developed my Vujes and Laravel abilities. I believe that my core skills and unique qualifications would make me a valuable addition to your team.</p>', '<p>If you have any questions about my qualifications please feel free to contact me. I will make myself available for a phone or in-person interview at your convenience.</p>', '<p>Looking forward to your reply.&nbsp;</p><p>Sincerely,<br>Jitendra Prajapati</p>', 3, '{\"font_family\":\"Bodoni MT\",\"font_size\":\"14\",\"font_weight\":null,\"font_style\":null}', NULL, '2020-10-11 23:49:09', '2020-10-15 05:31:50'),
(3, NULL, 'LOL', 10, 'Thank You Letter', 'general', '{\"first_name\":\"Pranav\",\"last_name\":\"begade\",\"email\":\"pranav@technomads.in\",\"phone\":\"9725789197\",\"address\":\"Surat\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"394210\"}', '{\"first_name\":\"Pranav\",\"last_name\":\"begade\",\"email\":\"kuch@gmail.com\",\"phone\":\"9725798197\",\"address\":\"Surat\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\"}', '<p>RE: [Job Location] [Job Title] posting, [Date]</p><p>RE: [Job Title] ad, [Date]</p>', '<p>Dear [Full Name],</p><p>Dear [Title][Last Name],</p>', '<p>I am certain I have the personal qualities that [Company Name] needs and deserves in a [Job Title].</p>', '<p>Highlights of my professional qualifications include: [Enter job-related expertise or accomplishment] [Enter job-related expertise or accomplishment] [Enter job-related expertise or accomplishment] [Enter job-related expertise or accomplishment]</p><p>Highlights of my professional qualifications include: [Enter job-related expertise or accomplishment] [Enter job-related expertise or accomplishment] [Enter job-related expertise or accomplishment] [Enter job-related expertise or accomplishment]</p>', '<p>I am available to talk by phone or meet in-person at your earliest convenience.</p><p>I am available to talk by phone or meet in-person at your earliest convenience.</p><p>I am available to talk by phone or meet in-person at your earliest convenience.</p>', '<p>Have a great day. Sincerely,</p><p>Have a great day. Sincerely,</p>', 8, '{\"font_family\":\"Roboto\",\"font_size\":\"20\",\"line_height\":\"1\",\"side_padding\":\"5\",\"top_bottom_padding\":\"10\",\"font_weight\":null,\"font_style\":null}', NULL, '2020-10-12 07:28:46', '2020-10-12 07:30:24'),
(4, 3, 'Letter 36', 10, 'Thank You Letter', 'general', '{\"first_name\":\"Jitendra\",\"last_name\":\"Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"123456789\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, '2020-10-13 23:58:57', '2020-10-14 00:29:59'),
(5, NULL, 'Letter 28', 1, 'Cover Letter', 'Career Change', '{\"first_name\":\"Jitendra\",\"last_name\":\"Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"9173527938\",\"address\":\"795 Folsom Ave, Suite 600\",\"country\":\"India\",\"city\":\"San Francisco\",\"state\":\"Gujarat\",\"zipcode\":\"94107\"}', NULL, '<p>RE: [Job Location] [Job Title] posting, [Date]</p>', '<p>Dear Human Resources Professional,</p>', '<p>Please review my attached resume to see my skills and experience. Highlights of what I offer include:</p>', '<p>Highlights of my professional qualifications include: [Enter job-related expertise or accomplishment] [Enter job-related expertise or accomplishment] [Enter job-related expertise or accomplishment] [Enter job-related expertise or accomplishment]</p>', '<p>I am available to talk by phone or meet in-person at your earliest convenience.</p>', '<p>Have a great day. Sincerely,</p>', 8, NULL, NULL, '2020-10-14 03:15:13', '2020-10-14 04:09:24'),
(6, NULL, 'Letter 48', 10, 'Cover Letter', 'Internship', '{\"first_name\":\"Jitendra\",\"last_name\":\"Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"123456789\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\"}', '{\"first_name\":\"Pranav\",\"last_name\":\"begade\",\"email\":\"pranavbegade@gmail.com\",\"phone\":\"9725789197\",\"address\":\"athwagate, Surat\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\"}', '<p>RE: [Job Location] [Job Title] posting, [Date]</p>', '<p>RE: [Job Title] ad, [Date]</p>', '<p>In this economy, you don\'t have time to waste on unskilled or unmotivated workers. I have what you need.</p>', '<p>Highlights of my professional qualifications include: [Enter job-related expertise or accomplishment] [Enter job-related expertise or accomplishment] [Enter job-related expertise or accomplishment] [Enter job-related expertise or accomplishment]</p>', '<p>I would welcome the opportunity to discuss the position and how my credentials and experience can add substantial value your company.</p>', '<p>I\'d appreciate the opportunity to utilize my skills to contribute to your team.</p>', 1, NULL, NULL, '2020-10-15 05:38:10', '2020-10-15 05:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_resumes`
--

DROP TABLE IF EXISTS `user_resumes`;
CREATE TABLE IF NOT EXISTS `user_resumes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `template_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_info` longtext COLLATE utf8mb4_unicode_ci,
  `experience_info` longtext COLLATE utf8mb4_unicode_ci,
  `education` longtext COLLATE utf8mb4_unicode_ci,
  `skills` longtext COLLATE utf8mb4_unicode_ci,
  `summary` longtext COLLATE utf8mb4_unicode_ci,
  `extra_section` longtext COLLATE utf8mb4_unicode_ci,
  `style_section` text COLLATE utf8mb4_unicode_ci,
  `complete_step` int(11) NOT NULL DEFAULT '0',
  `upload_file` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_resumes_user_id_foreign` (`user_id`),
  KEY `user_resumes_template_id_foreign` (`template_id`)
) ENGINE=MyISAM AUTO_INCREMENT=357 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_resumes`
--

INSERT INTO `user_resumes` (`id`, `user_id`, `template_id`, `title`, `contact_info`, `experience_info`, `education`, `skills`, `summary`, `extra_section`, `style_section`, `complete_step`, `upload_file`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"1234567899\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\"}', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2020-10-01 22:33:15', '2020-10-01 22:33:15'),
(2, NULL, 1, '', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"1234567899\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\"}', NULL, NULL, NULL, NULL, NULL, '{\"font_size\":\"13\",\"font_family\":\"Georgia\",\"font_weight\":null,\"font_style\":null}', 1, NULL, NULL, '2020-10-01 22:46:52', '2020-10-12 04:45:04'),
(3, NULL, 1, '', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"1234567899\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\"}', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2020-10-01 22:52:13', '2020-10-01 22:52:13'),
(4, 1, 1, 'Resume 1', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"1234567899\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\"}', '[{\"employer\":\"Varshaa Weblabs\",\"job_title\":\"PHP Developer\",\"address\":\"Nanpura\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2018\",\"end_month\":\"Apr\",\"end_year\":\"2020\",\"id\":\"0\",\"job_description\":\"<ul>\\r\\n\\t<li>Filed records to keep the system efficient and information organized.<\\/li>\\r\\n\\t<li>Kept inventory levels optimized and supplies organized for forecasted demands.<\\/li>\\r\\n<\\/ul>\"},{\"employer\":\"Technomads\",\"job_title\":\"PHP Developer\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\",\"start_month\":\"Jun\",\"start_year\":\"2020\",\"end_month\":\"Oct\",\"end_year\":\"2020\",\"is_present\":\"true\",\"id\":\"1\",\"job_description\":\"<ul>\\r\\n\\t<li>Filed records to keep the system efficient and information organized.<\\/li>\\r\\n\\t<li>Recognized and took advantage of opportunities to increase business revenue, including [Type]s and [Type]s.<\\/li>\\r\\n<\\/ul>\"},{\"employer\":\"Technomads\",\"job_title\":\"PHP Developer\",\"address\":\"Nanpura\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2020\",\"end_month\":\"Jan\",\"end_year\":\"2020\",\"is_present\":\"true\",\"id\":\"2\",\"job_description\":\"<ul>\\r\\n\\t<li>Filed records to keep the system efficient and information organized.<\\/li>\\r\\n\\t<li>Kept inventory levels optimized and supplies organized for forecasted demands.<\\/li>\\r\\n<\\/ul>\"}]', '[{\"school_name\":\"NaranLala College\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"degree\":\"BCA\",\"field\":\"IT\",\"month\":\"Jan\",\"year\":\"2014\",\"id\":0,\"description\":\"Graduated with distinction.\"},{\"school_name\":\"Madharesha Highschool\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"degree\":\"High School Diploma\",\"field\":\"Commerce\",\"month\":\"Jan\",\"year\":\"2020\",\"id\":1,\"description\":\"Graduated with distinction.<br \\/>\\r\\n&nbsp;\"},{\"school_name\":\"Madharesha Highschool\",\"country\":\"India\",\"city\":\"San Francisco\",\"state\":\"Gujarat\",\"degree\":\"MBA\",\"field\":\"Bussiness\",\"month\":\"Oct\",\"year\":\"2009\",\"id\":\"2\",\"description\":\"Awarded [Scholarship Name].<br \\/>\\r\\n&nbsp;\"}]', '<ul>\r\n	<li>Contract negotiation</li>\r\n	<li>Customer needs assessment</li>\r\n	<li>Financial reporting</li>\r\n</ul>', '<ul>\r\n	<li>Skilled team player with a strong background in [Type] environments. Works well independently to handle assignments and always ready to go beyond basics assignments. Quick learner with good computer abilities.</li>\r\n</ul>', NULL, NULL, 1, NULL, NULL, '2020-10-01 22:58:02', '2020-10-02 06:58:21'),
(5, 1, 1, 'Resume 50', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"1234567997\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\"}', '[{\"employer\":\"Technomads\",\"job_title\":\"PHP Developer\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2011\",\"end_month\":\"Jan\",\"end_year\":\"2012\",\"id\":\"0\",\"job_description\":\"Filed records to keep the system efficient and information organized.<br \\/>\\r\\nFiled records to keep the system efficient and information organized.<br \\/>\\r\\n&nbsp;\"}]', '[{\"school_name\":\"Madharesha Highschool\",\"country\":\"India\",\"city\":\"NAVSARI\",\"state\":\"GUJARAT\",\"degree\":\"High School Diploma\",\"field\":\"Commerce\",\"month\":\"Jan\",\"year\":\"2020\",\"id\":\"0\",\"description\":\"Awarded Madharesh Highschool.<br \\/>\\r\\n&nbsp;\"}]', '<ul>\r\n	<li>Contract negotiation</li>\r\n	<li>Customer needs assessment</li>\r\n</ul>', 'Accomplished [Type] professional bringing proven expertise in [Industry] operations and practices. Manages activities with a good understanding of current needs and future targets. Offers excellent project management and team leadership abilities.<br />\r\n&nbsp;', NULL, NULL, 1, NULL, NULL, '2020-10-03 01:20:57', '2020-10-03 03:13:17'),
(6, 1, 1, 'Resume update', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"1234567899\",\"address\":\"athwagate\",\"country\":\"India\",\"city\":\"San Francisco\",\"state\":\"Gujarat\",\"zipcode\":\"941076\"}', '[{\"employer\":\"Technomads\",\"job_title\":\"PHP Developer\",\"address\":\"athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2020\",\"end_month\":\"Jun\",\"end_year\":\"2020\",\"is_present\":\"true\",\"id\":0,\"job_description\":\"Filed records to keep the system efficient and information organized.<br \\/>\\r\\n&nbsp;\"}]', '[{\"school_name\":\"Madharesha Highschool\",\"country\":\"India\",\"city\":\"NAVSARI\",\"state\":\"GUJARAT\",\"degree\":\"High School Diploma\",\"field\":\"Commerce\",\"month\":\"Jan\",\"year\":\"2012\",\"id\":\"0\",\"description\":\"Awarded [Scholarship Name].<br \\/>\\r\\n&nbsp;\"}]', 'Contract negotiation<br />\r\nCustomer needs assessment<br />\r\n&nbsp;', 'Accomplished [Type] professional bringing proven expertise in [Industry] operations and practices. Manages activities with a good understanding of current needs and future targets. Offers excellent project management and team leadership abilities.<br />\r\n&nbsp;', NULL, NULL, 1, NULL, NULL, '2020-10-03 04:45:45', '2020-10-03 05:15:19'),
(7, 10, 1, 'Resume 78', '{\"name\":\"Sun Yellow\",\"email\":\"payalzinal@gmail.com\",\"phone\":\"8865658556\",\"address\":\"45454654654\",\"country\":\"india\",\"city\":\"surat\",\"state\":\"gujarat\",\"zipcode\":\"395001\"}', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2020-10-03 05:30:22', '2020-10-03 05:30:22'),
(8, NULL, 1, 'Resume 98', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"1234567898\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\"}', '[{\"employer\":\"Technomads\",\"job_title\":\"PHP Developer\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2020\",\"end_month\":\"Aug\",\"end_year\":\"2020\",\"id\":0,\"job_description\":\"Filed records to keep the system efficient and information organized.<br \\/>\\r\\n&nbsp;\"}]', '[{\"school_name\":\"Madharesha Highschool\",\"country\":\"India\",\"city\":\"NAVSARI\",\"state\":\"GUJARAT\",\"degree\":\"High School Diploma\",\"field\":\"Commerce\",\"month\":\"Jan\",\"year\":\"2020\",\"id\":0,\"description\":\"Double major in [Other Major].<br \\/>\\r\\n&nbsp;\"}]', 'Contract negotiation<br />\r\n&nbsp;', 'Accomplished [Type] professional bringing proven expertise in [Industry] operations and practices. Manages activities with a good understanding of current needs and future targets. Offers excellent project management and team leadership abilities.<br />\r\n&nbsp;', NULL, NULL, 1, NULL, NULL, '2020-10-03 05:32:09', '2020-10-03 05:36:19'),
(9, 3, 1, 'Resume 06-10-2020', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"1234567899\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\"}', '[{\"employer\":\"Technomads\",\"job_title\":\"PHP Developer\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2020\",\"end_month\":\"Oct\",\"end_year\":\"2020\",\"id\":\"0\",\"job_description\":\"<ul><li>Filed records to keep the system efficient and information organized.<\\/li><li>Kept inventory levels optimized and supplies organized for forecasted demands.<\\/li><\\/ul>\"},{\"employer\":\"Varshaa Weblabs\",\"job_title\":\"PHP Developer\",\"address\":\"Nanpura\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2018\",\"end_month\":\"Apr\",\"end_year\":\"2020\",\"id\":1,\"job_description\":\"<ul>\\r\\n\\t<li>Filed records to keep the system efficient and information organized.<\\/li>\\r\\n\\t<li>Kept inventory levels optimized and supplies organized for forecasted demands.<br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n<\\/ul>\"},{\"employer\":\"OptimumBew\",\"job_title\":\"PHP Backend Developer\",\"address\":\"305\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2017\",\"end_month\":\"Dec\",\"end_year\":\"2017\",\"id\":\"2\",\"job_description\":\"<p>Filed records to keep the system efficient and information organized.<\\/p><p>Kept inventory levels optimized and supplies organized for forecasted demands.<\\/p>\"}]', '[{\"school_name\":\"Madharesha Highschool\",\"country\":\"India\",\"city\":\"NAVSARI\",\"state\":\"GUJARAT\",\"degree\":\"High School Diploma\",\"field\":\"IT\",\"month\":\"Jan\",\"year\":\"2011\",\"id\":\"0\",\"description\":\"<ul><li>Awarded Madharesha high school.<\\/li><\\/ul>\"},{\"school_name\":\"NaranLala College\",\"country\":\"India\",\"city\":\"NAVSARI\",\"state\":\"GUJARAT\",\"degree\":\"BCA\",\"field\":\"IT\",\"month\":\"Jan\",\"year\":\"2014\",\"id\":\"1\",\"description\":\"<p>Awarded [Scholarship Name].<\\/p>\"}]', '<ul>\r\n	<li>New customer acquisition</li>\r\n	<li>Inventory management</li>\r\n	<li>New customer acquisition</li>\r\n</ul>', '<ul><li>Accomplished [Type] professional bringing proven expertise in [Industry] operations and practices. Manages activities with a good understanding of current needs and future targets. Offers excellent project management and team leadership abilities.</li></ul>', '{\"Community Service\":\"<ul>\\r\\n\\t<li>Collection Volunteer, Toys for Tots, March 2007\\u200b\\u200b\\u200b\\u200b\\u200b\\u200b<\\/li>\\r\\n\\t<li>Lunchroom Aide, Warren County Schools, 2002-Present<br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n<\\/ul>\",\"Language\":\"<ul>\\r\\n\\t<li>Spanish, level of proficiency: conversational<\\/li>\\r\\n\\t<li>Fluent in French<\\/li>\\r\\n\\t<li>German - conversational<br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n<\\/ul>\",\"Affiliations\":\"\\u0639\\u0636\\u0648 \\u062c\\u0645\\u0639\\u064a\\u0629 \\u0627\\u0644\\u062a\\u0631\\u0628\\u064a\\u0629 \\u0627\\u0644\\u0648\\u0637\\u0646\\u064a\\u0629 1998 \\u062d\\u062a\\u0649 \\u0627\\u0644\\u0622\\u0646<br \\/>\\r\\n&nbsp;\",\"Awards\":\"2nd Place, Innovation Award, 2004<br \\/>\\r\\nDean&#39;s List, Fall 2010-Spring 2011<br \\/>\\r\\n&nbsp;\",\"Additional Information\":\"Certified in First Aid, November 2014<br \\/>\\r\\n&nbsp;\",\"Publication\":\"Davis, Cynthia G. &quot;Topics in Popular Culture: American Television of the 1980s&quot; Pop Culture Scene 1.3 (2007): 113-122. 0<br \\/>\\r\\n&nbsp;\",\"other\":\"this is other section here\"}', '{\"color\":\"#436975\",\"font\":\"arial\",\"font_size\":\"19\",\"font_family\":\"Verdana\",\"line_height\":\"0.4\",\"paragraph_height\":\"1.6\",\"font_weight\":\"bold\",\"font_style\":null,\"side_padding\":\"10\",\"top_bottom_padding\":\"10\",\"paragraph_indent\":\"25\"}', 5, NULL, NULL, '2020-10-04 22:29:17', '2020-10-15 22:44:03'),
(10, 3, 1, 'Resume 93', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"1234567898\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\"}', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2020-10-06 02:02:36', '2020-10-06 02:02:36'),
(11, 3, 1, 'Resume 64', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"91735279384566566666\",\"address\":\"athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"94107123\"}', '[{\"employer\":\"Technomads\",\"job_title\":\"PHP Developer\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2020\",\"end_month\":\"Oct\",\"end_year\":\"2020\",\"id\":0,\"job_description\":\"<ul><li>Filed records to keep the system efficient and information organized.<\\/li><li>Kept inventory levels optimized and supplies organized for forecasted demands.<\\/li><li>Protected business from unnecessary liability by carefully following security and safety standards.<\\/li><li>Recognized and took advantage of opportunities to increase business revenue, including [Type]s and [Type]s.<\\/li><\\/ul>\"}]', '[{\"school_name\":\"Madharesha Highschool\",\"country\":\"India\",\"city\":\"NAVSARI\",\"state\":\"GUJARAT\",\"degree\":\"High School Diploma\",\"field\":\"Commerce\",\"month\":\"Jan\",\"year\":\"2011\",\"id\":0,\"description\":\"<ul><li>Graduated with distinction.<\\/li><li>Graduated with distinction.<\\/li><\\/ul>\"}]', '<ul><li>Contract negotiation</li><li>Customer needs assessment</li><li>Financial reporting</li></ul>', '<p>Dependable [Type] industry worker equipped for fast-paced work and changing daily needs. Serves customers effectively with attention to detail and a hardworking approach. Seeks out opportunities to go beyond basics, improve processes, and increase customer satisfaction.</p>', '{\"Community Service\":\"<ul><li>Collection Volunteer, Toys for Tots, March 2007<\\/li><li>Lunchroom Aide, Warren County Schools, 2002-Present<\\/li><\\/ul>\"}', NULL, 6, NULL, NULL, '2020-10-08 23:06:32', '2020-10-09 03:48:55'),
(12, 3, 1, 'Resume 1', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"123456789\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\"}', '[{\"employer\":\"Technomads\",\"job_title\":\"PHP Developer\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2020\",\"end_month\":\"Oct\",\"end_year\":\"2020\",\"id\":0,\"job_description\":\"<p>Filed records to keep the system efficient and information organized.<\\/p>\"}]', '[{\"school_name\":\"Madharesha Highschool\",\"country\":\"India\",\"city\":\"San Francisco\",\"state\":\"Gujarat\",\"degree\":\"High School Diploma\",\"field\":\"Commerce\",\"month\":\"Jan\",\"year\":\"2019\",\"id\":0,\"description\":\"<p>Graduated with distinction.<\\/p>\"}]', '<ul><li>Contract negotiation</li><li>Customer needs assessment</li><li>Financial reporting</li></ul>', '<p>Dependable [Type] industry worker equipped for fast-paced work and changing daily needs. Serves customers effectively with attention to detail and a hardworking approach. Seeks out opportunities to go beyond basics, improve processes, and increase customer satisfaction.</p>', NULL, '{\"color\":\"#305fec\",\"font_family\":\"Bodoni MT\",\"paragraph_indent\":\"0\"}', 5, NULL, NULL, '2020-10-09 04:19:37', '2020-10-09 04:49:54'),
(63, NULL, 1, 'Resume 85', '{\"name\":\"Pranav\",\"email\":\"begeade@gmail.com\",\"phone\":\"91515112212000\",\"address\":\"surt\",\"country\":\"india\",\"city\":\"Surat\",\"state\":\"gujarat\",\"zipcode\":\"445522\"}', '[{\"employer\":\"Technomads\",\"job_title\":\"FOunder\",\"address\":\"Surat\",\"country\":\"India\",\"city\":\"surat\",\"state\":\"gujarat\",\"zipcode\":\"394210\",\"start_month\":\"Oct\",\"start_year\":\"2010\",\"end_month\":\"Jan\",\"end_year\":\"2012\",\"id\":0,\"job_description\":\"<ul><li>Filed records to keep the system efficient and information organized.<\\/li><li>Kept inventory levels optimized and supplies organized for forecasted demands.<\\/li><li>Protected business from unnecessary liability by carefully following security and safety standards.<\\/li><li>Protected business from unnecessary liability by carefully following security and safety standards.<\\/li><\\/ul>\"}]', '[{\"school_name\":\"nothing\",\"country\":\"india\",\"city\":\"surat\",\"state\":\"gujarat\",\"degree\":\"Associate of Applied Science\",\"field\":\"hjb\",\"month\":\"Jan\",\"year\":\"2020\",\"id\":0,\"description\":\"<p>Awarded [Scholarship Name].<\\/p><p>Double major in [Other Major].<\\/p>\"}]', '<p>Contract negotiation</p><p>Contract negotiation</p><p>Contract negotiation</p><p>Contract negotiation</p><p>Contract negotiation</p><p>Contract negotiation</p>', '<p>Accomplished [Type] professional bringing proven expertise in [Industry] operations and practices. Manages activities with a good understanding of current needs and future targets. Offers excellent project management and team leadership abilities.</p><p>Dependable [Type] industry worker equipped for fast-paced work and changing daily needs. Serves customers effectively with attention to detail and a hardworking approach. Seeks out opportunities to go beyond basics, improve processes, and increase customer satisfaction.</p>', NULL, NULL, 5, NULL, NULL, '2020-10-12 07:07:15', '2020-10-12 07:11:07'),
(356, 3, 1, 'Resume 12', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"123456789\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\"}', '[{\"employer\":\"Technomads\",\"job_title\":\"PHP Developer\",\"address\":\"athwagate, Surat\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\",\"id\":\"0\",\"job_description\":\"<p>Kept inventory levels optimized and supplies organized for forecasted demands.<\\/p><p>Protected business from unnecessary liability by carefully following security and safety standards.<\\/p>\"}]', '[{\"school_name\":\"Madharesha Highschool\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"month\":\"Jan\",\"id\":0,\"description\":\"<p>Graduated with distinction.<\\/p>\"}]', '<p>Contract negotiation</p><p>Customer needs assessment</p><p>Financial reporting</p><p>Inventory management</p><p>New customer acquisition</p>', '<p>Accomplished [Type] professional bringing proven expertise in [Industry] operations and practices. Manages activities with a good understanding of current needs and future targets. Offers excellent project management and team leadership abilities.</p><p>Accomplished [Type] professional bringing proven expertise in [Industry] operations and practices. Manages activities with a good understanding of current needs and future targets. Offers excellent project management and team leadership abilities.</p>', '{\"Community Service\":\"<ul><li>Collection Volunteer, Toys for Tots, March 2007<\\/li><li>Lunchroom Aide, Warren County Schools, 2002-Present<\\/li><\\/ul>\"}', '{\"color\":\"#000000\"}', 6, NULL, NULL, '2020-10-15 05:48:20', '2020-10-15 06:12:07'),
(354, 3, 1, 'Resume 9', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"09173527938\",\"address\":\"795 Folsom Ave, Suite 600\",\"country\":\"India\",\"city\":\"San Francisco\",\"state\":\"Gujarat\",\"zipcode\":\"94107\"}', '[{\"employer\":\"Technomads\",\"job_title\":\"PHP Developer\",\"address\":\"athwagate, Surat\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2020\",\"end_month\":\"Oct\",\"end_year\":\"2020\",\"job_description\":\"<p>Filed records to keep the system efficient and information organized.<\\/p>\"},{\"employer\":\"OptimumBew\",\"job_title\":\"PHP Developer\",\"address\":\"athwagate, Surat\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2018\",\"end_month\":\"Jul\",\"end_year\":\"2018\",\"id\":\"1\",\"job_description\":\"<p>Filed records to keep the system efficient and information organized.<\\/p>\"}]', '[{\"school_name\":\"Madharesha Highschool\",\"country\":\"India\",\"city\":\"San Francisco\",\"state\":\"Gujarat\",\"degree\":\"High School Diploma\",\"field\":\"Commerce\",\"month\":\"Jan\",\"year\":\"2020\",\"description\":\"<p>Graduated with distinction.<\\/p>\",\"id\":0},{\"school_name\":\"NaranLala College\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"degree\":\"MBA\",\"field\":\"Commerce\",\"month\":\"Jan\",\"year\":\"2014\",\"id\":1}]', '<p>Contract negotiation</p>', '<p>Dependable [Type] industry worker equipped for fast-paced work and changing daily needs. Serves customers effectively with attention to detail and a hardworking approach. Seeks out opportunities to go beyond basics, improve processes, and increase customer satisfaction.</p>', '{\"Community Service\":\"<p>Collection Volunteer, Toys for Tots, March 2007<\\/p>\"}', '{\"color\":\"#000000\"}', 5, NULL, NULL, '2020-10-14 00:43:18', '2020-10-14 02:52:16'),
(355, 3, 1, 'Resume 5 updat', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"123456789\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\"}', '[{\"employer\":\"Technomads\",\"job_title\":\"PHP Developer\",\"address\":\"Athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"GJ\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2020\",\"is_present\":\"true\",\"job_description\":\"<ul><li>Filed records to keep the system efficient and information organized.<\\/li><li>Kept inventory levels optimized and supplies organized for forecasted demands.<\\/li><\\/ul>\"}]', NULL, '<ul><li>Contract negotiation</li><li>Customer needs assessment</li></ul>', '<ul><li>Accomplished [Type] professional bringing proven expertise in [Industry] operations and practices. Manages activities with a good understanding of current needs and future targets. Offers excellent project management and team leadership abilities update.</li></ul>', '{\"Awards\":\"<p>Top Performer, Inside Sales Team, 2007<\\/p><p>Top Performer, Inside Sales Team, 2007<\\/p>\",\"Additional Information\":\"<p>Certified in First Aid, November 2014<\\/p>\",\"Community Service\":\"<p>Collection Volunteer, Toys for Tots, March 2007<\\/p>\",\"Language\":\"<ul><li>Cantonese, fluent<\\/li><li>Fluent in French<\\/li><\\/ul>\",\"Affiliations\":\"<ul><li>Member, Association of Small Businesses, 2012-Present<\\/li><li>Member, National Education Association, 1998-Present<\\/li><\\/ul>\",\"Publication\":\"<ol><li>Davis, Cynthia G. \\\"Topics in Popular Culture: American Television of the 1980s\\\" Pop Culture Scene 1.3 (2007): 113-122. 0<\\/li><li>De Schepper K. \\\"Issues and Challenges in the Mental Health Care System.\\\" The National Journal of Medicine. 2005; 34 (5): 82-85<\\/li><\\/ol>\",\"Accomplishments\":\"<ul><li>This is accomplishments<\\/li><li>This is accomplishments<\\/li><\\/ul>\",\"other\":\"<ul><li>Describe your other section<\\/li><\\/ul>\"}', '{\"color\":\"#dc3545\"}', 2, NULL, NULL, '2020-10-14 03:27:15', '2020-10-14 06:19:53'),
(352, NULL, 1, 'Resume 34', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"09173527938\",\"address\":\"795 Folsom Ave, Suite 600\",\"country\":\"India\",\"city\":\"San Francisco\",\"state\":\"Gujarat\",\"zipcode\":\"94107\"}', '[{\"employer\":\"Technomads\",\"job_title\":\"PHP Developer\",\"address\":\"athwagate\",\"country\":\"India\",\"city\":\"Surat\",\"state\":\"Gujarat\",\"zipcode\":\"395001\",\"start_month\":\"Jan\",\"start_year\":\"2005\",\"end_month\":\"Sep\",\"end_year\":\"2015\",\"job_description\":\"<p>Filed records to keep the system efficient and information organized.<\\/p>\"},{\"id\":\"1\"},{\"id\":\"2\"}]', NULL, NULL, NULL, NULL, '{\"color\":\"#7ebca3\"}', 3, NULL, NULL, '2020-10-13 22:38:02', '2020-10-14 00:28:04'),
(353, 3, 1, 'Resume 31', '{\"name\":\"Jitendra Prajapati\",\"email\":\"jitendra.technomads@gmail.com\",\"phone\":\"09173527938\",\"address\":\"795 Folsom Ave, Suite 600\",\"country\":\"India\",\"city\":\"San Francisco\",\"state\":\"Gujarat\",\"zipcode\":\"94107\"}', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2020-10-14 00:34:56', '2020-10-14 00:38:01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
