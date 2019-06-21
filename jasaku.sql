-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Bulan Mei 2019 pada 20.12
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jasaku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$IlqPuq814Qfw4SyUOicX.em0pNUbS5t4wJJ9qudxBkEB0HcBVf/Su', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `book_id`, `product_id`, `user_id`, `day`, `date`, `hour`, `status`, `completed`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '35Z7hCtBiJ3g2aCV5Etf1557762125', 1, 1, 'Tuesday', '14-05-2019', '0.00-1.00', 'Paid', NULL, NULL, '2019-05-13 08:42:05', '2019-05-13 08:42:05'),
(2, '35Z7hCtBiJ3g2aCV5Etf1557762125', 1, 1, 'Tuesday', '14-05-2019', '1.00-2.00', 'Paid', NULL, NULL, '2019-05-13 08:42:05', '2019-05-13 08:42:05'),
(3, '35Z7hCtBiJ3g2aCV5Etf1557762125', 1, 1, 'Tuesday', '14-05-2019', '2.00-3.00', 'Paid', NULL, NULL, '2019-05-13 08:42:05', '2019-05-13 08:42:05'),
(4, 'aqDuILpYUZcyseU81qRL1557770640', 1, 1, 'Tuesday', '14-05-2019', '11.00-12.00', 'Not paid', NULL, NULL, '2019-05-13 11:04:00', '2019-05-13 11:04:00'),
(5, 'aqDuILpYUZcyseU81qRL1557770640', 1, 1, 'Tuesday', '14-05-2019', '12.00-13.00', 'Not paid', NULL, NULL, '2019-05-13 11:04:00', '2019-05-13 11:04:00'),
(6, 'aqDuILpYUZcyseU81qRL1557770640', 1, 1, 'Tuesday', '14-05-2019', '13.00-14.00', 'Not paid', NULL, NULL, '2019-05-13 11:04:00', '2019-05-13 11:04:00'),
(7, 'TAUphvEmHS5V8ZZPzwZd1557770671', 1, 1, 'Monday', '20-05-2019', '0.00-1.00', 'Not paid', NULL, NULL, '2019-05-13 11:04:31', '2019-05-13 11:04:31'),
(8, 'TAUphvEmHS5V8ZZPzwZd1557770671', 1, 1, 'Monday', '20-05-2019', '1.00-2.00', 'Not paid', NULL, NULL, '2019-05-13 11:04:31', '2019-05-13 11:04:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_28_160527_create_products_table', 1),
(4, '2019_03_28_165943_create_admins_table', 1),
(5, '2019_05_02_150405_create_product_operational_hours_table', 1),
(6, '2019_05_11_153654_create_books_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'asd', '12345', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_operational_hours`
--

CREATE TABLE `product_operational_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_operational_hours`
--

INSERT INTO `product_operational_hours` (`id`, `product_id`, `day`, `hour`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '00.00 - 10.00', NULL, NULL),
(2, 1, '2', '00.00 - 14.00', NULL, NULL),
(3, 1, '3', '00.00 - 00.00', NULL, NULL),
(4, 1, '4', '00.00 - 00.00', NULL, NULL),
(5, 1, '5', '00.00 - 00.00', NULL, NULL),
(6, 1, '6', '00.00 - 00.00', NULL, NULL),
(7, 1, '7', '00.00 - 00.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'asd@asd.com', NULL, '$2y$10$BA/vgxwPhnreo.gKyHyWbucs959EHasixWF.hTfljQvepUQw7RewK', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_product_id_foreign` (`product_id`),
  ADD KEY `books_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_operational_hours`
--
ALTER TABLE `product_operational_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_operational_hours_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `product_operational_hours`
--
ALTER TABLE `product_operational_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_operational_hours`
--
ALTER TABLE `product_operational_hours`
  ADD CONSTRAINT `product_operational_hours_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
