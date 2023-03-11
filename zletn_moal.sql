-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 11:04 PM
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
-- Database: `zletn_moal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `categories_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_descraption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories_name`, `categories_descraption`, `created_at`, `updated_at`) VALUES
(1, 'Labtops', 'Lappppppppppppppppp', '2018-12-03 00:27:48', '2018-12-03 00:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_01_223159_entrust_setup_tables', 1),
(4, '2018_11_18_024824_create_products_table', 2),
(5, '2018_11_21_154555_add_url_to_products', 2),
(6, '2018_11_17_013043_create_categories_table', 3),
(7, '2018_11_17_160408_create_sections_table', 3),
(8, '2018_11_21_174648_create_product_sections_table', 3),
(9, '2018_11_24_224553_add_user_id_to_products', 4),
(10, '2018_11_21_233220_add_url_to_users', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'role-read', 'Display role listing', 'see only listing of role', '2018-12-01 21:23:03', '2018-12-01 21:23:03'),
(2, 'role-create', 'create role', 'create new role', '2018-12-01 21:23:03', '2018-12-01 21:23:03'),
(3, 'role-delete', 'delete role', 'delete role', '2018-12-01 21:23:03', '2018-12-01 21:23:03'),
(4, 'role-edit', 'edit role', 'edit role', '2018-12-01 21:23:03', '2018-12-01 21:23:03'),
(5, 'product-read', 'Display product listing', 'see only listing of product', '2018-12-01 21:23:03', '2018-12-01 21:23:03'),
(6, 'product-create', 'create product', 'create new product', '2018-12-01 21:23:03', '2018-12-01 21:23:03'),
(7, 'product-delete', 'delete product', 'delete product', '2018-12-01 21:23:03', '2018-12-01 21:23:03'),
(8, 'product-edit', 'edit product', 'edit roproductle', '2018-12-01 21:23:03', '2018-12-01 21:23:03'),
(9, 'user-read', 'Display user listing', 'see only listing of user', '2018-12-01 21:23:03', '2018-12-01 21:23:03'),
(10, 'user-create', 'create product', 'create new user', '2018-12-01 21:23:03', '2018-12-01 21:23:03'),
(11, 'user-delete', 'delete product', 'delete user', '2018-12-01 21:23:03', '2018-12-01 21:23:03'),
(12, 'user-edit', 'edit product', 'edit user', '2018-12-01 21:23:03', '2018-12-01 21:23:03'),
(13, 'Access_admin_panel', 'this make you access the admin url', 'this make you access the admin url', NULL, NULL),
(14, 'Change_Product_Status', 'Change Product Status', 'can change the status from unpublish To Anther Status publish Or Refused', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 4),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(5, 3),
(5, 4),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(9, 3),
(9, 4),
(10, 2),
(11, 2),
(11, 3),
(12, 2),
(12, 3),
(13, 2),
(13, 4),
(14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_descraption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_price` int(11) NOT NULL,
  `products_stock` int(11) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `Status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpublish',
  `visits` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `products_title`, `products_descraption`, `products_color`, `products_price`, `products_stock`, `Category_id`, `created_at`, `updated_at`, `url`, `user_id`, `Status`, `visits`) VALUES
(1, 'phone', 'zzzzzzzzzz', 'Black', 1000, 4, 1, '2018-12-03 00:48:09', '2018-12-03 00:48:09', '1543805289-jpg', 1, 'unpublish', 0),
(2, 'phone', 'sssssssssss', 'Red', 10000, 4, 1, '2018-12-04 01:41:52', '2018-12-04 01:41:52', '1543894912-jpg', 1, 'unpublish', 0),
(3, 'lenovo', 'the phone', 'Red', 10000, 5, 1, '2018-12-08 06:07:39', '2018-12-08 06:07:39', '1544256459-jpg', 1, 'unpublish', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_sections`
--

CREATE TABLE `product_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sections`
--

INSERT INTO `product_sections` (`id`, `product_id`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-12-03 00:48:09', '2018-12-03 00:48:09'),
(2, 2, 1, '2018-12-04 01:41:52', '2018-12-04 01:41:52'),
(3, 2, 2, '2018-12-04 01:41:52', '2018-12-04 01:41:52'),
(4, 3, 1, '2018-12-08 06:07:39', '2018-12-08 06:07:39'),
(5, 3, 2, '2018-12-08 06:07:39', '2018-12-08 06:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'User', 'User', 'who is register from the front_side', '2018-12-02 23:29:13', '2018-12-02 23:29:13'),
(2, 'Admin', 'this is Admin', 'Do not have permission on user', '2018-12-02 22:21:05', '2018-12-02 23:06:59'),
(4, 'employee', 'no any permissions', 'no have any permissions', '2018-12-08 06:08:59', '2018-12-08 06:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 2),
(7, 4),
(8, 3),
(9, 3),
(10, 3),
(11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `sections_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sections_name`, `created_at`, `updated_at`) VALUES
(1, 'woman', '2018-12-03 00:23:05', '2018-12-03 00:23:05'),
(2, 'men', '2018-12-03 00:24:35', '2018-12-03 00:24:35'),
(3, 'childern', '2018-12-03 00:24:45', '2018-12-03 00:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1543894430-jpg',
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `url`, `address`) VALUES
(1, 'shereen', 'shereen.shapaan@gmail.com', '$2y$10$S/UPxH0bneSrI5soW7ByXeECFdlg8qARaCRncINzzMUNEwt.LJGga', 'udk0G6wdwvrXAGo0MjABXSOgxbb2n5R86sxtbTAJAnlaKnfihlO4MyQMvwIN', '2018-12-04 01:33:50', '2018-12-04 01:33:50', '1543894430-jpg', ''),
(7, 'mark', 'markf@gmail.com', '$2y$10$rbHagWver55FkW3sZn8Wy.VAP8GK/P/AcfVW7BFvhmauyj9QLq1pS', '9I5GCNBa34fATV5xZqgekPF8d4tQ4ZNaSOjL49J109lCvC9zuTAl53gaxLt7', '2018-12-08 06:19:42', '2018-12-08 06:19:42', '1544257182-png', ''),
(8, 'magdy', 'magdy@gamil.com', '$2y$10$GL0XyM.MbAFsChDBqKtvzeGKdqDVA8ekhc3zHdIToQy/BlAcQQzQe', NULL, '2018-12-11 00:12:27', '2018-12-11 00:12:27', '1543894430-jpg', ''),
(9, 'magdy mohamed', 'magdymo@gamil.com', '$2y$10$NV2cLz4IeAaiTNYtzB1nL.8OpACRTa91uBpo4usfo9GWwqjl7d3du', NULL, '2018-12-16 18:24:27', '2018-12-16 18:24:27', '1543894430-jpg', ''),
(10, 'Ahmed Salama', 'Ahmaed_salama@yahoo.com', '$2y$10$CBw6RAHwdweAsmHhqCA.i.sxx4yw8qCjztbA56i3D3ZQ0WSpO6UAK', NULL, '2018-12-16 19:46:12', '2018-12-16 19:46:12', '1543894430-jpg', ''),
(11, 'Admin', 'Admin@Zltin-mall.com', '$2y$10$Spo3s69S8CysX8968CjtP.ZTFdabjT8GVbVXjsVXgvAIGPjta5/v.', NULL, '2019-04-04 17:45:14', '2019-04-04 17:45:14', '1554407114-jpg', '23 El-obour_bulding');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sections`
--
ALTER TABLE `product_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_sections`
--
ALTER TABLE `product_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
