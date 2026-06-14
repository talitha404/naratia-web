-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 15 Jun 2026 pada 01.41
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_naratia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `story_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `chapter_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `chapters`
--

INSERT INTO `chapters` (`id`, `story_id`, `title`, `content`, `chapter_number`, `created_at`, `updated_at`, `status`) VALUES
(1, 11, 'Hai', 'Tes', 1, '2026-06-13 05:32:45', '2026-06-13 05:32:45', 'draft'),
(2, 12, 'Tes untuk publikasi', 'halo', 1, '2026-06-13 05:34:28', '2026-06-13 05:34:28', 'published'),
(3, 13, 'Prolog', '\"Apa kamu pernah lihat anak itu sebelumnya [yn]?\"', 1, '2026-06-13 05:40:57', '2026-06-13 05:40:57', 'draft'),
(11, 22, 'Hari terakhir', '**Chapter: Hari Terakhir Cerita**\r\n\r\nLangkah kaki Nishimura dan [yn] bergema di jalanan Tokyo yang mulai lengang. Matahari sore menyorot lembut, seakan tahu ini adalah pertemuan terakhir mereka.  \r\n\r\n“Besok aku berangkat,” ucap Nishimura pelan, menatap ke arah langit.  \r\n[yn] tersenyum getir. “Aku tahu. Tapi rasanya tetap sulit menerima.”  \r\n\r\nMereka berhenti di depan kedai kopi kecil yang sering jadi tempat singgah. Nishimura membuka pintu, aroma kopi hangat menyambut.  \r\n“Ayo, sekali lagi. Untuk kenangan,” katanya.  \r\n\r\n[yn] duduk di kursi dekat jendela, menatap orang-orang yang berlalu. “Tokyo akan terasa berbeda tanpamu.”  \r\nNishimura menyerahkan secangkir latte. “Dan aku akan selalu ingat wajahmu di sini.”  \r\n\r\nHening sejenak, hanya suara sendok beradu dengan gelas.  \r\n“Apa kau menyesal?” tanya [yn].  \r\n“Tidak,” jawab Nishimura mantap. “Aku hanya takut kehilangan bagian dari diriku yang ada di sini—bersamamu.”  \r\n\r\n[yn] menunduk, menahan air mata. “Mungkin perpisahan ini bukan akhir, hanya jeda.”  \r\nNishimura tersenyum. “Kalau begitu, janji kita bertemu lagi. Di Tokyo, atau di mana pun takdir membawa.”  \r\n\r\nMereka saling menatap, membiarkan waktu berhenti sejenak.', 1, '2026-06-13 16:31:07', '2026-06-14 16:21:26', 'published'),
(12, 22, 'Hari terakhir', 'Ketika...', 2, '2026-06-13 16:34:51', '2026-06-13 16:34:51', 'published'),
(30, 41, 'halo', 'bisa nggak ya?', 1, '2026-06-14 01:18:16', '2026-06-14 01:20:27', 'published'),
(32, 44, 'Prolog', 'Di sudut kamar yang remang, [yn] duduk bersandar pada dinding, memandangi bayangan yang jatuh tak beraturan di lantai. Hujan turun perlahan di luar, seolah ikut menemaninya berpikir tentang banyak hal yang belum selesai. Ada perasaan kosong yang sulit dijelaskan—bukan karena kehilangan, tapi karena terlalu banyak yang dipendam.\r\n\r\n[yn] mengingat langkah-langkah yang pernah diambilnya, keputusan-keputusan kecil yang ternyata membawa dampak besar. Ia bertanya dalam hati, apakah semua ini benar-benar pilihan, atau sekadar mengikuti arus tanpa arah. Waktu terasa berjalan cepat, sementara dirinya seperti tertinggal di satu titik yang sama.\r\n\r\nDi tengah keheningan, [yn] menarik napas panjang. Mungkin tidak semua hal harus segera dipahami. Mungkin, ragu dan bingung adalah bagian dari proses. Ia mulai menyadari bahwa tidak apa-apa untuk berhenti sejenak, untuk merasakan, untuk tidak selalu kuat.\r\n\r\nHujan perlahan reda. [yn] berdiri, melangkah ke jendela, dan membuka sedikit tirainya. Udara dingin masuk, membawa aroma tanah yang basah. Untuk pertama kalinya malam itu, ia merasa sedikit lega. Tidak semua jawaban harus ditemukan sekarang—yang penting, ia masih berjalan, meski perlahan.', 1, '2026-06-14 08:00:02', '2026-06-14 08:00:02', 'published'),
(33, 36, 'Prolog', '[yn] menyentuh rak buku berdebu, tiba-tiba sebuah pintu kecil terbuka. Cahaya biru menyilaukan, menariknya masuk.\r\n“Selamat datang, Penjelajah,” suara lembut terdengar.\r\n[yn] menoleh, seorang perempuan berjubah putih berdiri. “Siapa kau?”\r\n“Aku penjaga dunia ini. Kau dipilih.”\r\n\r\n[yn] berjalan melewati hutan bercahaya, pohon-pohon berbisik namanya. Seekor naga kecil mendekat, menunduk hormat.\r\n“Apakah ini nyata?” tanya [yn].\r\n“Nyata bagi mereka yang percaya,” jawab sang penjaga.\r\n\r\nNamun, sebuah bayangan hitam muncul, mengancam dunia magis.\r\n“Kau harus memilih,” kata penjaga. “Tinggal di sini dan melawan, atau kembali ke duniamu.”\r\n[yn] menatap naga kecil yang menunggu. Hatinya bergetar.\r\n“Aku akan bertarung,” jawabnya mantap.', 1, '2026-06-14 16:35:06', '2026-06-14 16:35:06', 'published');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `genres`
--

INSERT INTO `genres` (`id`, `genre_name`, `created_at`, `updated_at`) VALUES
(1, 'Fantasi', '2026-06-12 20:08:26', '2026-06-12 20:08:26'),
(2, 'Fiksi Ilmiah', '2026-06-12 20:08:26', '2026-06-12 20:08:26'),
(3, 'Romantis', '2026-06-12 20:08:26', '2026-06-12 20:08:26'),
(4, 'Misteri', '2026-06-12 20:08:26', '2026-06-12 20:08:26'),
(5, 'Thrilller', '2026-06-12 20:08:26', '2026-06-12 20:08:26'),
(6, 'Horor', '2026-06-12 20:08:26', '2026-06-12 20:08:26'),
(7, 'Sejarah', '2026-06-12 20:08:26', '2026-06-12 20:08:26'),
(8, 'Komedi', '2026-06-12 20:08:26', '2026-06-12 20:08:26'),
(9, 'Drama', '2026-06-12 20:08:26', '2026-06-12 20:08:26'),
(10, 'Aksi', '2026-06-12 20:08:26', '2026-06-12 20:08:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `libraries`
--

CREATE TABLE `libraries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `likes`
--

CREATE TABLE `likes` (
  `story_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_26_073943_add_role_to_users_table', 1),
(5, '2026_06_11_060128_create_stories_table', 1),
(6, '2026_06_11_065024_create_chapters_table', 1),
(7, '2026_06_11_074331_create_libraries_table', 1),
(8, '2026_06_11_083836_create_reading_histories_table', 1),
(9, '2026_06_11_130005_create_genres_table', 1),
(10, '2026_06_11_130238_add_genre_id_to_stories_table', 1),
(11, '2026_06_11_132450_create_likes_table', 1),
(12, '2026_06_11_132503_remove_genre_from_stories_table', 1),
(13, '2026_06_12_021730_create_story_views_table', 1),
(14, '2026_06_12_022239_add_timestamps_to_likes_table', 1),
(15, '2026_06_12_024455_drop_story_contents_table', 1),
(16, '2026_06_12_101728_add_synopsis_to_stories_table', 1),
(17, '2026_06_13_110154_add_status_to_chapters_table', 2),
(18, '2026_06_14_231002_add_columns_to_reading_histories_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reading_histories`
--

CREATE TABLE `reading_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `story_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5p9fxzC1Mgi16yA1UJOtJX24fGnQBE1Bayr9eWbK', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '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', 1781480262),
('nhUSnrxqkzbIfj0vl64fZuaF0MPXn9NDAcdsKdxL', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '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', 1781480224),
('WTH4TzINMyQcFwxqDKaNX2iQsvQbTajbF0uIrVjV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiTFFjeG1RMzRjMzhWY0ZFMnpCTzBScndZMGVSWHBVVzNJcUI3MnRKayI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYXN1ayI7czo1OiJyb3V0ZSI7czoxMDoibG9naW4ucGFnZSI7fX0=', 1781480387);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stories`
--

CREATE TABLE `stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stories`
--

INSERT INTO `stories` (`id`, `genre_id`, `user_id`, `title`, `description`, `cover_image`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 'hi', 'ho', NULL, '2026-06-12 22:30:57', '2026-06-12 22:30:57'),
(2, 1, 1, 'moka', 'moka', NULL, '2026-06-12 22:35:56', '2026-06-12 22:35:56'),
(3, 1, 1, 'Lily', 'lily', NULL, '2026-06-12 23:05:12', '2026-06-12 23:05:12'),
(4, 9, 3, 'Senja Biru', 'Terima kasih, kamulah senja yang selalu kurindukan.', NULL, '2026-06-12 23:07:59', '2026-06-12 23:07:59'),
(5, 3, 4, 'Kusuma Wijaya', 'Kusuma ing ratri mung sawaiji, kinanthi mematri sajroning ati.', NULL, '2026-06-12 23:23:25', '2026-06-12 23:23:25'),
(6, 5, 4, 'Misteri Malam', 'Malam yang tenang itu telah merenggut banyak nyawa. Apa yang ada dibaliknya?', NULL, '2026-06-12 23:32:46', '2026-06-12 23:32:46'),
(7, 4, 4, 'Misteri Malam', 'Malam yang tenang itu telah merenggut banyak nyawa. Apa yang ada dibaliknya?', NULL, '2026-06-12 23:37:58', '2026-06-12 23:37:58'),
(9, 1, 4, 'Just Say I\'m Yours', 'Can I be yours so you will be mine?', NULL, '2026-06-13 03:34:15', '2026-06-13 03:34:15'),
(10, 1, 4, 'Duh! Ketemu Lagi!', 'Lisa x reader', NULL, '2026-06-13 04:09:17', '2026-06-13 04:09:17'),
(11, 4, 4, 'Misteri Rumah Tua', 'Kamu yakin tidak ada apapun di rumah itu?', NULL, '2026-06-13 04:50:59', '2026-06-13 04:50:59'),
(12, 2, 4, 'Bulan Bintang', 'Hanya ada kegelaapan', NULL, '2026-06-13 05:34:12', '2026-06-13 05:34:12'),
(13, 8, 5, 'Pagi Cinta!', 'Hari yang cerah untuk bersenang-senang?', NULL, '2026-06-13 05:39:28', '2026-06-13 05:39:28'),
(14, 1, 5, 'Kucing Ajaib', 'Miauww', NULL, '2026-06-13 07:12:42', '2026-06-13 07:12:42'),
(20, 9, 5, 'Hello Blooms!', 'What are u looking for?', NULL, '2026-06-13 15:34:24', '2026-06-13 15:34:24'),
(22, 1, 5, 'Goodbye Tokyo!', 'Thanks', NULL, '2026-06-13 16:30:47', '2026-06-13 16:30:47'),
(35, 2, 6, 'halo', 'tes?', NULL, '2026-06-14 00:00:49', '2026-06-14 00:00:49'),
(36, 1, 6, 'Perpustakaan Tua', '[yn] menemukan pintu rahasia di perpustakaan tua yang membawanya ke dunia penuh sihir. Di sana, ia harus memilih antara kembali ke kehidupan nyata atau menjadi bagian dari dunia magis yang penuh misteri, bahaya, dan keajaiban yang tak pernah ia bayangkan sebelumnya.', NULL, '2026-06-14 00:02:34', '2026-06-14 16:36:05'),
(41, 3, 7, 'kenapa?', 'kita', NULL, '2026-06-14 01:15:17', '2026-06-14 01:15:17'),
(43, 1, 7, 'Cinta Terindah', 'Wahh', NULL, '2026-06-14 03:26:53', '2026-06-14 03:26:53'),
(44, 2, 5, 'Tarantula Nebula', 'Perhatikan malam yang gelap itu', NULL, '2026-06-14 07:56:18', '2026-06-14 07:56:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `story_views`
--

CREATE TABLE `story_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `story_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `character_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'reader'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `character_name`, `email`, `bio`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Iroha', 'Iroha', 'iroha@gmail.cpm', NULL, NULL, NULL, '$2y$12$mh7usQzJN6Gh859r.pcYMuoxs0rHJIRKTyeR7i54IKw1UhUTRz2UC', NULL, '2026-06-12 20:10:29', '2026-06-12 20:10:29', 'reader'),
(2, 'Wonhee', 'WonheeHyung', 'wonhee@gmail.com', NULL, NULL, NULL, '$2y$12$3UuBF8CRJtMrmaVy.CyV7uhwydQIOiIhuTo4xIMrXxExbwurWG1cW', NULL, '2026-06-12 20:11:59', '2026-06-13 22:05:12', 'penulis'),
(3, 'Moka', 'Moka', 'moka@gmail.com', NULL, NULL, NULL, '$2y$12$goVdhGt3i64EFh8e7n/LGebaANzRcY7PWV4SyPgO4hv6ycISDT3uq', NULL, '2026-06-12 22:35:23', '2026-06-12 22:35:23', 'reader'),
(4, 'Minju', 'Minju', 'minju@gmail.com', NULL, NULL, NULL, '$2y$12$IqwAC9PLZMViE5lpb/rT3u7fHAmVU0oywyl9sLhK62JIPd1EmKOne', NULL, '2026-06-12 23:20:55', '2026-06-13 05:37:27', 'penulis'),
(5, 'lily', 'lily', 'lily@gmail.com', NULL, NULL, NULL, '$2y$12$NLI8bgxXKb6iBDR1u0Rghe4Mx2Peb6KIlvVQe543ngnBRo5rFccNe', NULL, '2026-06-13 05:38:09', '2026-06-14 16:15:34', 'penulis'),
(6, 'lia', 'lia', 'lia@gmail.com', NULL, NULL, NULL, '$2y$12$R8HbwZRdOD1I7OEAMgh8puIjmpo5.cpXhY81ITHtP1YSPNba8xffm', NULL, '2026-06-13 23:59:54', '2026-06-14 00:00:25', 'penulis'),
(7, 'rea', 'rea', 'rinita@gmail.com', NULL, NULL, NULL, '$2y$12$ApHV1Fa8Q6megcV..fVGhOCThC2ciK96.t/rdl5pNE5M/0B9cKbni', NULL, '2026-06-14 01:10:20', '2026-06-14 01:35:28', 'penulis');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapters_story_id_foreign` (`story_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`story_id`,`user_id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `reading_histories`
--
ALTER TABLE `reading_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reading_histories_user_id_foreign` (`user_id`),
  ADD KEY `reading_histories_story_id_foreign` (`story_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stories_user_id_foreign` (`user_id`),
  ADD KEY `stories_genre_id_foreign` (`genre_id`);

--
-- Indeks untuk tabel `story_views`
--
ALTER TABLE `story_views`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `story_views_story_id_user_id_unique` (`story_id`,`user_id`),
  ADD KEY `story_views_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `reading_histories`
--
ALTER TABLE `reading_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stories`
--
ALTER TABLE `stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `story_views`
--
ALTER TABLE `story_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_story_id_foreign` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_story_id_foreign` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reading_histories`
--
ALTER TABLE `reading_histories`
  ADD CONSTRAINT `reading_histories_story_id_foreign` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reading_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stories`
--
ALTER TABLE `stories`
  ADD CONSTRAINT `stories_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `stories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `story_views`
--
ALTER TABLE `story_views`
  ADD CONSTRAINT `story_views_story_id_foreign` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `story_views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
