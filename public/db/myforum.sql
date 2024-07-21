-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2024 at 05:46 PM
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
(1, 2, 3, 'bài viết hay và bổ ích', NULL, '2024-07-19 02:33:28', '2024-07-19 02:33:28'),
(2, 2, 3, 'Khá hay', 1, '2024-07-19 02:46:23', '2024-07-19 02:46:23'),
(3, 2, 3, 'cmt lần 3', NULL, '2024-07-19 03:13:54', '2024-07-19 03:13:54'),
(4, 1, 3, 'sad', NULL, '2024-07-19 04:03:54', '2024-07-19 04:03:54'),
(5, 2, 3, 'cmt bên trong lần 3', 3, '2024-07-19 04:12:44', '2024-07-19 04:12:44'),
(6, 2, 3, 'lần nữa', 3, '2024-07-19 04:13:34', '2024-07-19 04:13:34'),
(7, 1, 3, 'bài viết hay và bổ ích', 4, '2024-07-19 11:11:50', '2024-07-19 11:11:50'),
(8, 1, 3, 'test', NULL, '2024-07-20 01:10:21', '2024-07-20 01:10:21'),
(9, 1, 3, 'Khá hay', NULL, '2024-07-20 01:15:10', '2024-07-20 01:15:10'),
(10, 8, 3, 'test cmt', NULL, '2024-07-20 02:47:58', '2024-07-20 02:47:58'),
(11, 2, 3, 'dưới lẫn nữa', 3, '2024-07-20 05:53:56', '2024-07-20 05:53:56'),
(12, 2, 3, 'sau cùng', NULL, '2024-07-20 05:54:43', '2024-07-20 05:54:43'),
(13, 10, 16, '1', NULL, '2024-07-20 10:44:54', '2024-07-20 10:44:54'),
(17, 10, 16, '2', 13, '2024-07-20 10:47:57', '2024-07-20 10:47:57'),
(19, 10, 16, '3', 17, '2024-07-20 11:11:12', '2024-07-20 11:11:12'),
(20, 10, 16, '234', 17, '2024-07-20 11:23:06', '2024-07-20 11:23:06'),
(21, 10, 16, '12', 13, '2024-07-20 11:23:30', '2024-07-20 11:23:30'),
(22, 2, 16, '2', 6, '2024-07-20 12:20:38', '2024-07-20 12:20:38'),
(23, 10, 3, 'trả lời 3', 19, '2024-07-20 13:30:51', '2024-07-20 13:30:51'),
(24, 10, 3, '2', NULL, '2024-07-20 15:01:13', '2024-07-20 15:01:13');

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
(2, 'CSS', 'css', NULL, NULL);

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

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `like`, `user_id`, `question_id`, `created_at`, `updated_at`) VALUES
(7, 1, 3, 2, '2024-07-19 10:40:01', '2024-07-19 10:40:01'),
(15, 1, 4, 1, '2024-07-19 13:14:59', '2024-07-19 13:14:59'),
(16, 1, 15, 1, '2024-07-19 15:01:52', '2024-07-19 15:01:52'),
(26, 1, 3, 1, '2024-07-20 08:02:14', '2024-07-20 08:02:14');

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
(1, 'HTML là gì?', 'HTML là một ngôn ngữ đánh dấu được thiết kế ra để tạo nên các trang web trên World Wide Web. Nó có thể được trợ giúp bởi các công nghệ như CSS và các ngôn ngữ kịch bản giống như JavaScript có đúng không?', 149, 1, 1, 0, NULL, 0, 0, '2024-07-20 01:10:21', '2024-07-21 04:42:02', 'html-la-gi', 1),
(2, 'CSS là gì', 'Trong tin học, các tập tin định kiểu theo tầng – dịch từ tiếng Anh là Cascading Style Sheets – được dùng để miêu tả cách trình bày các tài liệu viết bằng ngôn ngữ HTML và XHTML. Ngoài ra ngôn ngữ định kiểu theo tầng cũng có thể dùng cho XML, SVG, XUL có phải không?', 281, 2, 1, 0, NULL, 0, 0, '2024-07-18 00:00:03', '2024-07-20 13:04:13', 'css-la-gi', 1),
(6, 'PHP là gì?', 'PHP: Hypertext Preprocessor, thường được viết tắt thành PHP là một ngôn ngữ lập trình kịch bản hay một loại mã lệnh chủ yếu được dùng để phát triển các ứng dụng viết cho máy chủ, mã nguồn mở, dùng cho mục đích tổng quát. Nó rất thích hợp với web và có thể dễ dàng nhúng vào trang HTML có phải không?', 13, 1, 1, 0, NULL, 0, 0, '2024-07-18 00:40:12', '2024-07-20 06:06:16', 'php-la-gi', 1),
(8, 'SASS là gì?', '<p style=\"margin-left:0px; margin-right:0px\"><strong>SASS </strong>(<em>Syntactically Awesome Style Sheets</em>)&nbsp;là một tiện ích mở rộng của CSS. Các ngôn ngữ style sheet kiểm soát vị trí và cách thức văn bản hiển thị trên webpage, từ kích thước và màu sắc khung cho đến vị trí của menu.</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><strong>CSS</strong> được sử dụng trên hầu hết các trang web, thiết kế để giúp các developer viết lệnh hiển thị văn bản trên màn hình. CSS không được xây dựng để làm việc với các biến số hay thực hiện nhiều tác vụ phức tạp. SASS/SCSS chính là giải pháp giải quyết những khuyết điểm của CSS, giúp các developer tiết kiệm thời gian và công sức cho những dự án của mình.</p>', 21, 2, 3, 0, NULL, 0, 0, '2024-07-19 01:12:39', '2024-07-20 14:58:32', 'sass-la-gi', 2),
(9, 'User 3 test đăng bài', '<p><em><strong>Tôi là user 3</strong></em></p>\r\n\r\n<p><em><strong><img alt=\"\" src=\"https://hoanghamobile.com/tin-tuc/wp-content/uploads/2024/01/anh-nen-cute.jpg\" style=\"height:628px; width:1200px\" />hehehe!!!</strong></em></p>', 31, 2, 11, 0, NULL, 0, 0, '2024-07-20 08:22:16', '2024-07-21 01:21:55', 'user-3-test-dang-bai', 1),
(10, 'User 3 lần 2', '<p>ảnh đẹp nè mn!!</p>\r\n\r\n<p><img alt=\"\" src=\"https://png.pngtree.com/thumb_back/fh260/background/20230613/pngtree-an-image-of-a-forest-in-the-clear-water-with-rocks-image_2908357.jpg\" /></p>', 97, 2, 11, 0, NULL, 0, 0, '2024-07-20 08:36:12', '2024-07-21 04:41:51', 'user-3-lan-2', 3),
(11, 'css 1', '<p>sasddsa</p>', 0, 2, 3, 0, NULL, 0, 0, '2024-07-21 01:42:54', '2024-07-21 01:42:54', 'css-1', 1),
(12, 'css2', '<p>a</p>', 0, 2, 3, 0, NULL, 0, 0, '2024-07-21 01:43:23', '2024-07-21 01:43:23', 'css2', 1),
(13, 'HTML là gì', '<p>test slug bị trùng</p>', 2, 1, 3, 0, NULL, 0, 0, '2024-07-21 02:08:40', '2024-07-21 04:41:56', 'html-la-gi-AuGiN', 1);

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
(1, 'Admin Y', 'admin1', 'admin@gmail.com', '123456', '0822293069', 1, '2002-04-17', 1, NULL, NULL, NULL, 0),
(3, 'Minh Ý edit2', 'user1', 'user1edit@gmail.com', '$2y$12$TsonjCS1YbqD0b0j/2wyVuUPwzF8iG6ojChP.6aK3nYRECkQr2e0m', '0822293069', 0, '2002-12-04', 0, NULL, '2024-07-18 13:03:12', '2024-07-20 14:01:57', 0),
(4, 'User Ý 2', 'user2', 'user2@gmail.com', '$2y$12$Ft2LJz.U/.r6stofBfxwVur40ZcdjfGa3AsFNS8U2iWI2Dug8CmWu', '01202652218', 1, '2002-12-04', 0, NULL, '2024-07-18 13:04:24', '2024-07-19 13:03:58', 2),
(11, 'User Ý 3', 'user3', 'user3@gmail.com', '$2y$12$FZLklrcK4T6VCQSx60NHxObtR8D7PrdDLoOsldhfcNAd7cdyRu5Ka', '010101010', 1, '2002-11-11', 0, NULL, '2024-07-19 14:37:31', '2024-07-19 14:37:31', 0),
(12, 'User Ý 4', 'user4', 'user4@gmail.com', '$2y$12$WMKsMx/0dHz8KE8uy0KBkOS/y.Lkzl6S/vr43vaUA1R56tYvMkR/e', '010010101', 1, '2000-11-11', 0, NULL, '2024-07-19 14:51:13', '2024-07-19 14:51:13', 0),
(15, 'User Ý 5', 'user5', 'user5@gmail.com', '$2y$12$kexP4gI0nmtM2eXvAKj3TO0VSV/01F2SMjWtMR43WwS3OQDQis0.u', '0822293069', 1, '2000-11-11', 0, NULL, '2024-07-19 15:01:23', '2024-07-19 15:01:23', 0),
(16, 'My Duyen', 'myduyen', 'duyen@gmail.com', '$2y$12$4XiwqVshVbXKzlYYArC1uOQqhKiIg7A40vnYa/D12y6yOM8/lx1iG', '0100010101', 0, '2002-02-01', 0, NULL, '2024-07-20 09:35:37', '2024-07-20 09:35:37', 0),
(17, 'Mỹ Duyên', 'duyen', 'asd@gmail.com', '$2y$12$33flcWAe5v2XTJBxbC1xFeOWUe0Ck8CewAK5pnp/jAv/2TNTgDyte', '0822293069a', 1, '1111-11-11', 0, NULL, '2024-07-21 02:23:07', '2024-07-21 02:23:07', 0),
(19, 'Mỹ Duyên 2', 'duyen2', 'shyneddy2002@gmail.com', '$2y$12$4965QwA5MbWwedPfV2t9le83vHC6gNze3uyd4szrsR038xe7Nuz1e', '0822293069', 0, '2002-02-01', 0, NULL, '2024-07-21 06:16:27', '2024-07-21 06:16:27', 0);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
