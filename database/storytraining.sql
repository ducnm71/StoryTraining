-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 12, 2023 lúc 01:35 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `storytraining`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `audio`
--

CREATE TABLE `audio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `audio`
--

INSERT INTO `audio` (`id`, `text_id`, `file`, `created_at`, `updated_at`) VALUES
(26, 27, 'C:\\fakepath\\boy.mp3', '2023-09-12 08:54:44', '2023-09-12 08:54:44'),
(27, 28, 'C:\\fakepath\\spoon.mp3', '2023-09-12 09:39:36', '2023-09-12 09:39:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_09_144128_create_story', 1),
(6, '2023_08_09_152436_create_page', 1),
(7, '2023_08_09_163452_create_text', 1),
(8, '2023_08_09_165146_create_audio', 1),
(9, '2023_08_10_143032_create_text_config', 1),
(10, '2023_08_11_084112_create_touch', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page`
--

CREATE TABLE `page` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_number` int(11) NOT NULL,
  `background` varchar(255) NOT NULL,
  `story_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `page`
--

INSERT INTO `page` (`id`, `page_number`, `background`, `story_id`, `created_at`, `updated_at`) VALUES
(2, 1, 'page1.png', 1, '2023-08-30 09:07:09', '2023-08-30 09:07:09'),
(3, 2, 'page2.png', 1, '2023-08-30 09:07:25', '2023-08-30 09:07:25'),
(4, 3, 'page3.png', 1, '2023-08-30 09:07:36', '2023-08-30 09:07:36'),
(5, 4, 'page4.png', 1, '2023-08-30 09:07:43', '2023-08-30 09:07:43'),
(6, 5, 'page5.png', 1, '2023-08-30 09:07:51', '2023-08-30 09:07:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `story`
--

CREATE TABLE `story` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `story`
--

INSERT INTO `story` (`id`, `name`, `thumbnail`, `author`, `isRead`, `created_at`, `updated_at`) VALUES
(1, 'Vermouth', 'Vermouth.png', 'Chris Vineyard', 0, '2023-08-30 09:06:48', '2023-08-30 09:06:48'),
(9, 'Let make a salad bowl', 'C:\\fakepath\\thumbnail.png', 'Minh Duc', 0, '2023-09-06 04:50:06', '2023-09-06 04:50:06'),
(10, 'Gin', 'C:\\fakepath\\thumbnail.png', 'Minh Duc', 0, '2023-09-06 04:51:17', '2023-09-06 04:51:17'),
(12, 'Vodka', 'C:\\fakepath\\thumbnail.png', 'minh duc', 0, '2023-09-06 04:59:02', '2023-09-06 04:59:02'),
(13, 'Bourbon', 'C:\\fakepath\\thumbnail.png', 'Minh Duc', 0, '2023-09-06 09:32:01', '2023-09-06 09:32:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `text`
--

CREATE TABLE `text` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `text`
--

INSERT INTO `text` (`id`, `text`, `created_at`, `updated_at`) VALUES
(27, 'boy', '2023-09-12 08:54:44', '2023-09-12 08:54:44'),
(28, 'spoon', '2023-09-12 09:39:36', '2023-09-12 09:39:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `text_config`
--

CREATE TABLE `text_config` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `point_x` bigint(20) NOT NULL,
  `point_y` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `text_config`
--

INSERT INTO `text_config` (`id`, `text_id`, `page_id`, `point_x`, `point_y`, `created_at`, `updated_at`) VALUES
(27, 27, 2, 717, 787, '2023-09-12 08:54:44', '2023-09-12 08:54:44'),
(28, 27, 2, 1322, 786, '2023-09-12 08:55:12', '2023-09-12 08:55:12'),
(29, 28, 2, 1111, 429, '2023-09-12 09:39:36', '2023-09-12 09:39:36'),
(30, 28, 2, 850, 431, '2023-09-12 09:48:52', '2023-09-12 09:48:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `touch`
--

CREATE TABLE `touch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `touch`
--

INSERT INTO `touch` (`id`, `text_id`, `page_id`, `data`, `created_at`, `updated_at`) VALUES
(31, 27, 2, '{\"x1\":573.0347137451172,\"y1\":580.4514007568359,\"x2\":860.0347137451172,\"y2\":993.4514007568359}', '2023-09-12 08:54:44', '2023-09-12 08:54:44'),
(32, 27, 2, '{\"x1\":1146.0347137451172,\"y1\":575.6736145019531,\"x2\":1498.0347137451172,\"y2\":995.6736145019531}', '2023-09-12 08:55:12', '2023-09-12 08:55:12'),
(33, 28, 2, '{\"x1\":1021.0347137451172,\"y1\":402.3402786254883,\"x2\":1201.0347137451172,\"y2\":456.3402786254883}', '2023-09-12 09:39:36', '2023-09-12 09:39:36'),
(34, 28, 2, '{\"x1\":758.0347137451172,\"y1\":381.4513854980469,\"x2\":941.0347137451172,\"y2\":480.4513854980469}', '2023-09-12 09:48:52', '2023-09-12 09:48:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Duc', 'duc@gmail.com', NULL, '$2y$10$Vyy4rE2YYKeG4DuramzHwO5cWXS8aJ6mcy7TDteHJy1yFjiZTkbju', NULL, '2023-09-05 01:35:06', '2023-09-05 01:35:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audio_text_id_foreign` (`text_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_story_id_foreign` (`story_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `text_config`
--
ALTER TABLE `text_config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `text_config_text_id_foreign` (`text_id`),
  ADD KEY `text_config_page_id_foreign` (`page_id`);

--
-- Chỉ mục cho bảng `touch`
--
ALTER TABLE `touch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `touch_text_id_foreign` (`text_id`),
  ADD KEY `touch_page_id_foreign` (`page_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `audio`
--
ALTER TABLE `audio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `page`
--
ALTER TABLE `page`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `story`
--
ALTER TABLE `story`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `text`
--
ALTER TABLE `text`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `text_config`
--
ALTER TABLE `text_config`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `touch`
--
ALTER TABLE `touch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `audio`
--
ALTER TABLE `audio`
  ADD CONSTRAINT `audio_text_id_foreign` FOREIGN KEY (`text_id`) REFERENCES `text` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_story_id_foreign` FOREIGN KEY (`story_id`) REFERENCES `story` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `text_config`
--
ALTER TABLE `text_config`
  ADD CONSTRAINT `text_config_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `text_config_text_id_foreign` FOREIGN KEY (`text_id`) REFERENCES `text` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `touch`
--
ALTER TABLE `touch`
  ADD CONSTRAINT `touch_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `touch_text_id_foreign` FOREIGN KEY (`text_id`) REFERENCES `text` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
