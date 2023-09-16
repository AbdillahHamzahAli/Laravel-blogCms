-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Sep 2023 pada 06.58
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
-- Database: `db_myblog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(60) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `thumbnail`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'HTML', 'html', 'noimage.jpg', 'HTML adalah singkatan dari Hypertext Markup Language', NULL, '2023-06-14 11:08:39', '2023-06-14 11:08:39'),
(2, 'HTML basic', 'html-basic-1', 'noimage.jpg', 'HTML tingkat dasar', 1, '2023-06-14 11:08:39', '2023-06-14 11:08:39'),
(3, 'HTML advanced', 'html-advanced-1', 'noimage.jpg', 'HTML tingkat dasar', 1, '2023-06-14 11:08:39', '2023-06-14 11:08:39'),
(4, 'CSS', 'css', 'noimage.jpg', 'CSS atau Cascading Style Sheets adalah salah satu topik yang harus diketahui dalam pengembangan website.', NULL, '2023-06-14 11:08:39', '2023-06-14 11:08:39'),
(5, 'Javascript', 'javascript', 'noimage.jpg', 'JavaScript adalah salah satu bahasa pemrograman yang sering digunakan oleh website programmer atau website developer.', NULL, '2023-06-14 11:08:39', '2023-06-14 11:08:39'),
(6, 'PHP', 'php', '/storage/photos/1/img/PHP-logo.png', 'Hypertext Preprocessor adalah bahasa skrip yang dapat ditanamkan atau disisipkan ke dalam HTML. PHP dapat digunakan untuk membangun sebuah CMS.', NULL, '2023-06-14 11:08:39', '2023-07-05 12:54:44'),
(7, 'Laravel', 'laravel-6', '/storage/photos/1/img/Laravel_logo.png', 'Framework PHP laravel', 6, '2023-06-14 11:58:57', '2023-06-14 11:58:57'),
(8, 'React JS', 'react-js-5', '/storage/photos/shares/reactJS.png', 'Framework frontend Javascript', 5, '2023-06-16 12:59:37', '2023-06-16 12:59:37'),
(10, 'Codeigniter', 'codeigniter-6', '/storage/photos/1/img/codeigniter.jpg', 'CodeIgniter is an open-source software rapid development web framework, for use in building dynamic web sites with PHP.', 6, '2023-07-05 12:58:24', '2023-07-05 12:58:24'),
(11, 'Laravel 10', 'laravel-10-7', '/storage/photos/1/img/images.png', 'laravel 10', 7, '2023-07-07 13:16:13', '2023-07-07 13:16:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_post`
--

CREATE TABLE `category_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category_post`
--

INSERT INTO `category_post` (`id`, `category_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2023-06-14 12:04:52', '2023-06-14 12:04:52'),
(2, 7, 1, '2023-06-14 12:04:52', '2023-06-14 12:04:52'),
(3, 5, 2, '2023-06-19 12:03:21', '2023-06-19 12:03:21'),
(4, 8, 2, '2023-06-22 10:36:26', '2023-06-22 10:36:26'),
(8, 6, 6, '2023-07-03 04:18:06', '2023-07-03 04:18:06'),
(9, 5, 7, '2023-07-09 03:27:38', '2023-07-09 03:27:38'),
(10, 8, 7, '2023-07-09 03:27:38', '2023-07-09 03:27:38');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_04_202343_create_categories_table', 1),
(7, '2023_05_21_101652_create_tags_table', 1),
(8, '2023_05_26_201653_create_posts_table', 1),
(9, '2023_05_26_202317_create_category_post_table', 1),
(10, '2023_05_26_202326_create_tag_post_table', 1),
(11, '2023_06_06_112223_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'post_show', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(2, 'post_create', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(3, 'post_update', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(4, 'post_detail', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(5, 'post_delete', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(6, 'category_show', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(7, 'category_create', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(8, 'category_update', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(9, 'category_detail', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(10, 'category_delete', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(11, 'tag_show', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(12, 'tag_create', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(13, 'tag_update', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(14, 'tag_delete', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(15, 'role_show', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(16, 'role_create', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(17, 'role_update', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(18, 'role_detail', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(19, 'role_delete', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(20, 'user_show', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(21, 'user_create', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(22, 'user_update', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(23, 'user_detail', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(24, 'user_delete', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(60) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `description` varchar(240) NOT NULL,
  `content` text NOT NULL,
  `status` enum('publish','draft') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `thumbnail`, `description`, `content`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'LARAVEL 10', 'laravel-10', '/storage/photos/1/img/images.png', 'Laravel adalah salah satu framework pengembangan web berbasis PHP yang populer.', '<h1>LARAVEL 10</h1>\r\n<p><img src=\"http://localhost:8000/storage/photos/1/img/Laravel_logo.png\" alt=\"\" width=\"211\" height=\"74\" /></p>\r\n<h2 id=\"meet-laravel\">Meet Laravel</h2>\r\n<p>Laravel is a web application framework with expressive, elegant syntax. A web framework provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while we sweat the details.</p>\r\n<p>Laravel strives to provide an amazing developer experience while providing powerful features such as thorough dependency injection, an expressive database abstraction layer, queues and scheduled jobs, unit and integration testing, and more.</p>\r\n<p>Whether you are new to PHP web frameworks or have years of experience, Laravel is a framework that can grow with you. We\'ll help you take your first steps as a web developer or give you a boost as you take your expertise to the next level. We can\'t wait to see what you build.</p>', 'publish', '2023-06-14 12:04:52', '2023-07-03 01:41:09', 1),
(2, 'What is Next JS', 'what-is-next-js', '/storage/photos/1/img/nextjs.png', 'To effectively use Next.js, it helps to be familiar with JavaScript, React, and related web development concepts. But JavaScript and React are vast topics. How do you know when you’re ready to learn Next.js?', '<p id=\"bfe8\" class=\"pw-post-body-paragraph mj mk ev ml b ft mm mn mo fw mp mq mr ms mt mu mv mw mx my mz na nb nc nd ne eo bj\" data-selectable-paragraph=\"\"><strong class=\"ml ew\">Next.js</strong>&nbsp;is a JavaScript framework created by&nbsp;<a class=\"af mi\" href=\"https://zeit.co/\" target=\"_blank\" rel=\"noopener ugc nofollow\">Zeit</a>. It lets you build server-side rendering and static web applications using React. It&rsquo;s a great tool to build your next website. It has many great features and advantages, which can make Nextjs your first option for building your next web application.</p>\r\n<p class=\"pw-post-body-paragraph mj mk ev ml b ft mm mn mo fw mp mq mr ms mt mu mv mw mx my mz na nb nc nd ne eo bj\" data-selectable-paragraph=\"\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost:8000/storage/photos/1/img/nextjs.png\" alt=\"\" width=\"434\" height=\"227\" /></p>\r\n<p id=\"9187\" class=\"pw-post-body-paragraph mj mk ev ml b ft mm mn mo fw mp mq mr ms mt mu mv mw mx my mz na nb nc nd ne eo bj\" data-selectable-paragraph=\"\">You don&rsquo;t need any configuration of webpack or similar to start using Next.js. It comes with its configuration. All you need is to run&nbsp;<code class=\"cw nf ng nh ni b\">npm run dev</code>&nbsp;and start building your application 😃.</p>\r\n<p class=\"pw-post-body-paragraph mj mk ev ml b ft mm mn mo fw mp mq mr ms mt mu mv mw mx my mz na nb nc nd ne eo bj\" data-selectable-paragraph=\"\">&nbsp;</p>\r\n<p id=\"ee0d\" class=\"pw-post-body-paragraph mj mk ev ml b ft mm mn mo fw mp mq mr ms mt mu mv mw mx my mz na nb nc nd ne eo bj\" data-selectable-paragraph=\"\">In this article, we are going to explore the great features and tricks of Next.js, and how to start building your next website with it.</p>\r\n<p class=\"pw-post-body-paragraph mj mk ev ml b ft mm mn mo fw mp mq mr ms mt mu mv mw mx my mz na nb nc nd ne eo bj\" data-selectable-paragraph=\"\">&nbsp;</p>\r\n<p id=\"cb07\" class=\"pw-post-body-paragraph mj mk ev ml b ft mm mn mo fw mp mq mr ms mt mu mv mw mx my mz na nb nc nd ne eo bj\" data-selectable-paragraph=\"\"><strong class=\"ml ew\">This post assumes that you have some basic knowledge of React and JavaScript.</strong></p>\r\n<p class=\"pw-post-body-paragraph mj mk ev ml b ft mm mn mo fw mp mq mr ms mt mu mv mw mx my mz na nb nc nd ne eo bj\" data-selectable-paragraph=\"\">&nbsp;</p>\r\n<p id=\"5b0d\" class=\"pw-post-body-paragraph mj mk ev ml b ft mm mn mo fw mp mq mr ms mt mu mv mw mx my mz na nb nc nd ne eo bj\" data-selectable-paragraph=\"\">Here are some great websites built with Next.js:</p>\r\n<ul class=\"\" style=\"list-style-type: square;\">\r\n<li id=\"3d28\" class=\"mj mk ev ml b ft mm mn mo fw mp mq mr nj mt mu mv nk mx my mz nl nb nc nd ne nm nn no bj\" data-selectable-paragraph=\"\"><a class=\"af mi\" href=\"https://syntax.fm/\" target=\"_blank\" rel=\"noopener ugc nofollow\">Syntaxt.fm</a></li>\r\n<li id=\"9479\" class=\"mj mk ev ml b ft np mn mo fw nq mq mr nj nr mu mv nk ns my mz nl nt nc nd ne nm nn no bj\" data-selectable-paragraph=\"\"><a class=\"af mi\" href=\"https://www.npmjs.com/\" target=\"_blank\" rel=\"noopener ugc nofollow\">npmjs</a></li>\r\n<li id=\"2baa\" class=\"mj mk ev ml b ft np mn mo fw nq mq mr nj nr mu mv nk ns my mz nl nt nc nd ne nm nn no bj\" data-selectable-paragraph=\"\"><a class=\"af mi\" href=\"https://material-ui.com/\" target=\"_blank\" rel=\"noopener ugc nofollow\">material-ui.io</a></li>\r\n<li id=\"d943\" class=\"mj mk ev ml b ft np mn mo fw nq mq mr nj nr mu mv nk ns my mz nl nt nc nd ne nm nn no bj\" data-selectable-paragraph=\"\"><a class=\"af mi\" href=\"https://expo.io/\" target=\"_blank\" rel=\"noopener ugc nofollow\">expo.io</a></li>\r\n<li id=\"cc54\" class=\"mj mk ev ml b ft np mn mo fw nq mq mr nj nr mu mv nk ns my mz nl nt nc nd ne nm nn no bj\" data-selectable-paragraph=\"\"><a class=\"af mi\" href=\"https://www.codementor.io/\" target=\"_blank\" rel=\"noopener ugc nofollow\">codemenitor.io</a></li>\r\n</ul>', 'publish', '2023-06-19 12:03:21', '2023-09-16 03:10:01', 1),
(6, 'Apa itu PHP', 'apa-itu-php', '/storage/photos/1/img/PHP-logo.png', 'PHP (Hypertext Preprocessor) adalah bahasa pemrograman server-side yang sering digunakan untuk mengembangkan aplikasi web dinamis dan ketika dipadukan dengan kode HTML, mampu menghasilkan konten web yang dinamis dan interaktif.', '<p>PHP (Hypertext Preprocessor) adalah bahasa pemrograman server-side yang sering digunakan untuk mengembangkan aplikasi web dinamis. PHP berfungsi sebagai pengolah skrip yang berjalan di sisi server, dan ketika dipadukan dengan kode HTML, mampu menghasilkan konten web yang dinamis dan interaktif. PHP memiliki sintaks yang mirip dengan bahasa C dan dilengkapi dengan berbagai fungsi dan fitur yang kuat untuk berinteraksi dengan basis data, berkomunikasi dengan server, serta melakukan manipulasi data dan file. Berkat kemudahan penggunaannya dan dukungan yang luas, PHP menjadi salah satu bahasa pemrograman paling populer di dunia untuk mengembangkan situs web, aplikasi e-commerce, forum, blog, dan berbagai jenis aplikasi web lainnya.</p>', 'publish', '2023-07-03 04:18:06', '2023-07-09 03:31:52', 1),
(7, 'React js Tutorial Untuk Pemula', 'react-js-tutorial-untuk-pemula', '/storage/photos/1/img/react-light.png', 'React js adalah sebuah library javascript untuk membuat tampilan website yang cepat dan interaktif.', '<p id=\"de3c\" class=\"pw-post-body-paragraph lq lr ev ls b lt lu lv lw lx ly lz ma mb mc md me mf mg mh mi mj mk ml mm mn eo bj\" data-selectable-paragraph=\"\">React js adalah sebuah library javascript untuk membuat tampilan website yang cepat dan interaktif.</p>\r\n<p id=\"9dbb\" class=\"pw-post-body-paragraph lq lr ev ls b lt lu lv lw lx ly lz ma mb mc md me mf mg mh mi mj mk ml mm mn eo bj\" data-selectable-paragraph=\"\">React js di kembangkan oleh facebook di tahun 2011, dan resmi menjadi open source tahun 2013.</p>\r\n<p id=\"f78f\" class=\"pw-post-body-paragraph lq lr ev ls b lt lu lv lw lx ly lz ma mb mc md me mf mg mh mi mj mk ml mm mn eo bj\" data-selectable-paragraph=\"\">Beberapa orang mungkin sering menyebut react sebagai framework karna kemampuan yang hampir menyamai sebuah framework.</p>\r\n<p id=\"7a12\" class=\"pw-post-body-paragraph lq lr ev ls b lt lu lv lw lx ly lz ma mb mc md me mf mg mh mi mj mk ml mm mn eo bj\" data-selectable-paragraph=\"\">Tapi sebenarnya react js adalah sebuah library.</p>\r\n<p id=\"98a6\" class=\"pw-post-body-paragraph lq lr ev ls b lt lu lv lw lx ly lz ma mb mc md me mf mg mh mi mj mk ml mm mn eo bj\" data-selectable-paragraph=\"\">O iya, sebelum belajar react js kamu harus paham beberapa fitur modern javascript yang sering digunakan.</p>\r\n<p class=\"pw-post-body-paragraph lq lr ev ls b lt lu lv lw lx ly lz ma mb mc md me mf mg mh mi mj mk ml mm mn eo bj\" data-selectable-paragraph=\"\">&nbsp;</p>', 'publish', '2023-07-09 03:27:38', '2023-07-09 03:28:58', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2023-06-14 12:04:52', '2023-06-14 12:04:52'),
(2, 1, 1, '2023-06-14 12:04:52', '2023-06-14 12:04:52'),
(3, 2, 5, '2023-06-19 12:03:21', '2023-06-19 12:03:21'),
(4, 2, 1, '2023-06-19 12:03:21', '2023-06-19 12:03:21'),
(5, 2, 7, '2023-06-22 10:08:01', '2023-06-22 10:08:01'),
(9, 6, 5, '2023-07-03 04:18:06', '2023-07-03 04:18:06'),
(10, 7, 5, '2023-07-09 03:27:38', '2023-07-09 03:27:38'),
(11, 7, 1, '2023-07-09 03:27:38', '2023-07-09 03:27:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(2, 'Admin', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(3, 'Editor', 'web', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(4, 'Role Test', 'web', '2023-06-15 14:08:30', '2023-06-15 14:08:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 4),
(7, 1),
(7, 2),
(7, 4),
(8, 1),
(8, 2),
(8, 4),
(9, 1),
(9, 2),
(9, 4),
(10, 1),
(10, 2),
(10, 4),
(11, 1),
(11, 2),
(11, 4),
(12, 1),
(12, 2),
(12, 4),
(13, 1),
(13, 2),
(13, 4),
(14, 1),
(14, 2),
(14, 4),
(15, 1),
(15, 4),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(20, 4),
(21, 1),
(21, 4),
(22, 1),
(22, 4),
(23, 1),
(23, 4),
(24, 1),
(24, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(25) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tutorial', 'tutorial', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(2, 'HTML', 'html', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(3, 'CSS', 'css', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(4, 'Javascript', 'javascript', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(5, 'Pemrograman', 'pemrograman', '2023-06-14 11:08:40', '2023-06-14 11:08:40'),
(7, 'React JS', 'react-js', '2023-06-16 13:06:02', '2023-06-16 13:06:02'),
(8, 'Laravel', 'laravel', '2023-06-16 13:06:13', '2023-06-16 13:06:13'),
(9, 'HTML Dasar', 'html-dasar', '2023-06-22 10:09:13', '2023-06-22 10:09:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin@mail.test', '2023-06-14 11:08:39', '$2y$10$eWgFXW5I.asK/SH3ScPOQuv41nS07gT1FwJFmClNj8cigwRcu3xLa', 'QMJe5ziCNJ5XTkwTZfzuPBarxxpqNJQIaCvDmVIlHwLlGVRbGX7qe9Fh3dH3', '2023-06-14 11:08:39', '2023-06-14 11:08:39'),
(2, 'JOJO', 'jojo@gmail.com', NULL, '$2y$10$fqLf5U0JaOXhOFa3hhHtfemJW5MK19PMwha8HU2zLFkD/NPkYljoC', NULL, '2023-06-14 11:34:12', '2023-06-14 11:34:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indeks untuk tabel `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_post_category_id_foreign` (`category_id`),
  ADD KEY `category_post_post_id_foreign` (`post_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

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
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `category_post`
--
ALTER TABLE `category_post`
  ADD CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
