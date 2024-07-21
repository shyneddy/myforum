-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 01:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `user_id`, `content`, `parent_id`, `created_at`, `updated_at`) VALUES
(26, 17, 3, 'bài viết hay', NULL, '2024-07-21 09:20:24', '2024-07-21 09:20:24'),
(27, 17, 4, 'like', 26, '2024-07-21 09:21:43', '2024-07-21 09:21:43'),
(28, 17, 4, 'hay', NULL, '2024-07-21 09:21:55', '2024-07-21 09:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `viewcount` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'HTML', 'html', NULL, NULL),
(2, 'CSS', 'css', NULL, NULL),
(3, 'Ngôn ngữ lập trình', 'ngon-ngu-lap-trinh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE `hashtags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hashtags`
--

INSERT INTO `hashtags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Thảo luận', NULL, NULL),
(2, 'Tin tức', NULL, NULL),
(3, 'Đánh giá', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `like` tinyint(1) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_17_185043_create_questions_table', 1),
(6, '2024_07_17_185103_create_categories_table', 1),
(7, '2024_07_17_185126_create_contacts_table', 1),
(8, '2024_07_17_185151_create_blogs_table', 1),
(9, '2024_07_17_185203_create_answers_table', 1),
(10, '2024_07_17_190947_update_questions_table', 2),
(11, '2024_07_17_191237_update_blogs_table', 2),
(12, '2024_07_17_191417_update_answers_table', 2),
(13, '2024_07_19_130336_create_hashtag_table', 3),
(14, '2024_07_19_131912_update_question_hashtag_table', 4),
(15, '2024_07_19_152828_create_likes_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `viewcount` int(11) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `issolved` tinyint(1) NOT NULL DEFAULT 0,
  `rate` double(8,2) DEFAULT NULL,
  `likecount` int(11) NOT NULL DEFAULT 0,
  `dislikecount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `hashtag_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `content`, `viewcount`, `category_id`, `user_id`, `issolved`, `rate`, `likecount`, `dislikecount`, `created_at`, `updated_at`, `slug`, `hashtag_id`) VALUES
(8, 'SASS là gì?', '<p style=\"margin-left:0px; margin-right:0px\"><strong>SASS </strong>(<em>Syntactically Awesome Style Sheets</em>)&nbsp;là một tiện ích mở rộng của CSS. Các ngôn ngữ style sheet kiểm soát vị trí và cách thức văn bản hiển thị trên webpage, từ kích thước và màu sắc khung cho đến vị trí của menu.</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><strong>CSS</strong> được sử dụng trên hầu hết các trang web, thiết kế để giúp các developer viết lệnh hiển thị văn bản trên màn hình. CSS không được xây dựng để làm việc với các biến số hay thực hiện nhiều tác vụ phức tạp. SASS/SCSS chính là giải pháp giải quyết những khuyết điểm của CSS, giúp các developer tiết kiệm thời gian và công sức cho những dự án của mình.</p>', 22, 2, 3, 0, NULL, 0, 0, '2024-07-19 01:12:39', '2024-07-21 09:11:35', 'sass-la-gi', 2),
(14, 'CSS là gì?', '<p><span style=\"color:rgb(77, 81, 86); font-family:arial,sans-serif; font-size:14px\">Trong tin học, các tập tin định kiểu theo tầng – dịch từ tiếng Anh là Cascading Style Sheets – được dùng để miêu tả cách trình bày các tài liệu viết bằng ngôn ngữ HTML và XHTML. Ngoài ra ngôn ngữ định kiểu theo tầng cũng có thể dùng cho XML, SVG, XUL có phải không?</span></p>', 0, 2, 3, 0, NULL, 0, 0, '2024-07-21 09:12:22', '2024-07-21 09:12:22', 'css-la-gi', 1),
(15, 'HTML là gì?', '<p><span style=\"color:rgb(77, 81, 86); font-family:arial,sans-serif; font-size:14px\">HTML là một ngôn ngữ đánh dấu được thiết kế ra để tạo nên các trang web trên World Wide Web. </span></p>\r\n\r\n<p><span style=\"color:rgb(77, 81, 86); font-family:arial,sans-serif; font-size:14px\"><img alt=\"\" src=\"https://laptop88.vn/media/news/2402_HTML-la-gi-thong-tin-tong-quat-ve-HTML-03.jpg\" /></span></p>\r\n\r\n<p><span style=\"color:rgb(77, 81, 86); font-family:arial,sans-serif; font-size:14px\">Nó có thể được trợ giúp bởi các công nghệ như CSS và các ngôn ngữ kịch bản giống như JavaScript có phải không</span></p>', 1, 1, 3, 0, NULL, 0, 0, '2024-07-21 09:13:24', '2024-07-21 10:04:47', 'html-la-gi', 1),
(17, 'Ngôn ngữ PHP', '<p>PHP (PHP: Hypertext Preprocessor) là một ngôn ngữ lập trình kịch bản phổ biến và được sử dụng rộng rãi, đặc biệt trong lập trình web. Dưới đây là một số đánh giá về ngôn ngữ lập trình PHP:</p>\r\n\r\n<p><img alt=\"\" src=\"https://d3hi6wehcrq5by.cloudfront.net/itnavi-blog/2020/05/uu-diem-va-nhuoc-diem-cua-php.jpg\" style=\"height:329px; width:500px\" /></p>\r\n\r\n<ul>\r\n	<li>Dễ học và thân thiện với người dùng:</li>\r\n</ul>\r\n\r\n<p>PHP được thiết kế để dễ học và sử dụng, đặc biệt đối với những lập trình viên mới bắt đầu.<br />\r\nCú pháp của PHP tương đối đơn giản và dễ hiểu, giúp người dùng nhanh chóng làm quen.</p>\r\n\r\n<ul>\r\n	<li>Phù hợp cho lập trình web:</li>\r\n</ul>\r\n\r\n<p>PHP được thiết kế chủ yếu để xây dựng các ứng dụng web, từ trang web đơn giản đến các ứng dụng web phức tạp.<br />\r\nVới sự hỗ trợ mạnh mẽ từ các framework như Laravel, Symfony, CodeIgniter, ... PHP trở thành một lựa chọn tuyệt vời cho lập trình web.</p>\r\n\r\n<ul>\r\n	<li>Đa nền tảng và tích hợp tốt:</li>\r\n</ul>\r\n\r\n<p>PHP chạy được trên nhiều nền tảng khác nhau như Windows, Linux, macOS.<br />\r\nPHP có thể tích hợp dễ dàng với các công nghệ web khác như HTML, CSS, JavaScript, SQL, v.v.</p>\r\n\r\n<ul>\r\n	<li>Cộng đồng và hệ sinh thái phong phú:</li>\r\n</ul>\r\n\r\n<p>PHP có một cộng đồng lập trình viên rất lớn và hoạt động sôi nổi, cung cấp nhiều tài nguyên, thư viện và công cụ hữu ích.<br />\r\nCó nhiều framework, CMS (WordPress, Drupal, Joomla) và các ứng dụng được xây dựng bằng PHP.</p>\r\n\r\n<ul>\r\n	<li>Hiệu suất và tốc độ:</li>\r\n</ul>\r\n\r\n<p>PHP có hiệu suất tương đối tốt, đặc biệt khi sử dụng các framework và công cụ cải thiện hiệu năng.<br />\r\nTuy nhiên, so với một số ngôn ngữ lập trình khác như Java hoặc Go, PHP vẫn còn chậm hơn về tốc độ xử lý.</p>', 5, 3, 3, 0, NULL, 0, 0, '2024-07-21 09:19:58', '2024-07-21 09:21:55', 'ngon-ngu-php', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `point` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `phonenumber`, `gender`, `birthday`, `isadmin`, `remember_token`, `created_at`, `updated_at`, `point`) VALUES
(3, 'Minh Ý', 'user1', 'user1@gmail.com', '$2y$12$PRL.uy/kY/sGj/Fo5sFNtO48UbD4xIUnAhcltr8wwCrW9DZgwjoK2', '0822293069', 1, '2002-12-04', 0, NULL, '2024-07-18 13:03:12', '2024-07-21 09:20:56', 0),
(4, 'Nguyễn Minh Ý', 'user2', 'user2@gmail.com', '$2y$12$bRIRQm3.FhOUq36X/1ZhFOMxwi3qbj.dlGkU8080dyFf/EzED/T3e', '01202652218', 1, '2002-12-04', 0, NULL, '2024-07-18 13:04:24', '2024-07-21 09:21:19', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_user_id_foreign` (`user_id`),
  ADD KEY `answers_question_id_foreign` (`question_id`),
  ADD KEY `answers_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_question_id_foreign` (`question_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_user_id_foreign` (`user_id`),
  ADD KEY `questions_category_id_foreign` (`category_id`),
  ADD KEY `questions_hashtag_id_foreign` (`hashtag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hashtags`
--
ALTER TABLE `hashtags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_hashtag_id_foreign` FOREIGN KEY (`hashtag_id`) REFERENCES `hashtags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
