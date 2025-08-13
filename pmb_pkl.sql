-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Agu 2025 pada 11.42
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmb_pkl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` int(11) NOT NULL,
  `bagian_id` int(11) DEFAULT NULL,
  `no_wbs` varchar(50) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `bagian_id`, `no_wbs`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'WBS001', 'Setup Server', NULL, NULL, NULL),
(2, 2, 'WBS002', 'Pengolahan Laporan', NULL, NULL, NULL),
(3, 3, 'WBS003', 'Desain Poster', NULL, NULL, NULL),
(4, 4, 'WBS004', 'Rekrutmen Karyawan', NULL, NULL, NULL),
(5, 5, 'WBS005', 'Produksi Barang', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'IT Support', NULL, NULL),
(2, 'Finance', NULL, NULL),
(3, 'Marketing', NULL, NULL),
(4, 'HRD', NULL, NULL),
(5, 'Produksi', NULL, NULL),
(6, 'Helper', NULL, NULL),
(7, 'Helper2', '2025-08-12 01:31:09', NULL),
(8, 'Helper3', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-lighthouse:query:0ceb8bee1fc69fadcd4814b0a736bfe637c6b6d070bdf7bef9d143fb0510ff7c', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:42;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:5;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:5:\"query\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:5;s:3:\"end\";i:6;s:4:\"line\";i:1;s:6:\"column\";i:6;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:9;s:3:\"end\";i:18;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:9:\"allBagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:19;s:3:\"end\";i:20;s:4:\"line\";i:2;s:6:\"column\";i:13;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:25;s:3:\"end\";i:27;s:4:\"line\";i:3;s:6:\"column\";i:5;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:32;s:3:\"end\";i:36;s:4:\"line\";i:4;s:6:\"column\";i:5;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:39;s:3:\"end\";i:40;s:4:\"line\";i:5;s:6:\"column\";i:3;s:5:\"value\";N;s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:41;s:3:\"end\";i:42;s:4:\"line\";i:6;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:42;s:3:\"end\";i:42;s:4:\"line\";i:6;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";N;}}}}}}}}}}s:8:\"endToken\";r:77;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:42:\"query{\n  allBagian {\n    id\n    nama\n  }\n}\";s:6:\"length\";i:42;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:42;s:10:\"startToken\";r:13;s:8:\"endToken\";r:69;s:6:\"source\";r:87;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:5:\"query\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:5;s:3:\"end\";i:42;s:10:\"startToken\";r:21;s:8:\"endToken\";r:69;s:6:\"source\";r:87;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:40;s:10:\"startToken\";r:29;s:8:\"endToken\";r:61;s:6:\"source\";r:87;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:18;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:87;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:9:\"allBagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:19;s:3:\"end\";i:40;s:10:\"startToken\";r:37;s:8:\"endToken\";r:61;s:6:\"source\";r:87;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:2:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:25;s:3:\"end\";i:27;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:87;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:25;s:3:\"end\";i:27;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:87;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:1;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:32;s:3:\"end\";i:36;s:10:\"startToken\";r:53;s:8:\"endToken\";r:53;s:6:\"source\";r:87;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:32;s:3:\"end\";i:36;s:10:\"startToken\";r:53;s:8:\"endToken\";r:53;s:6:\"source\";r:87;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}}}}}', 1755048208),
('laravel-cache-lighthouse:query:0e4efdc51fe8fd66c14d2c486ace7944e6f4eea2ca0ac111b692657a149da992', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:69;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:5;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:5:\"query\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:5;s:3:\"end\";i:6;s:4:\"line\";i:1;s:6:\"column\";i:6;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:9;s:3:\"end\";i:21;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:12:\"createBagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"(\";s:5:\"start\";i:21;s:3:\"end\";i:22;s:4:\"line\";i:2;s:6:\"column\";i:15;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:22;s:3:\"end\";i:27;s:4:\"line\";i:2;s:6:\"column\";i:16;s:5:\"value\";s:5:\"input\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:27;s:3:\"end\";i:28;s:4:\"line\";i:2;s:6:\"column\";i:21;s:5:\"value\";N;s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:29;s:3:\"end\";i:30;s:4:\"line\";i:2;s:6:\"column\";i:23;s:5:\"value\";N;s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:30;s:3:\"end\";i:34;s:4:\"line\";i:2;s:6:\"column\";i:24;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:34;s:3:\"end\";i:35;s:4:\"line\";i:2;s:6:\"column\";i:28;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:6:\"String\";s:5:\"start\";i:36;s:3:\"end\";i:44;s:4:\"line\";i:2;s:6:\"column\";i:30;s:5:\"value\";s:6:\"Helper\";s:4:\"prev\";r:77;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:44;s:3:\"end\";i:45;s:4:\"line\";i:2;s:6:\"column\";i:38;s:5:\"value\";N;s:4:\"prev\";r:85;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\")\";s:5:\"start\";i:45;s:3:\"end\";i:46;s:4:\"line\";i:2;s:6:\"column\";i:39;s:5:\"value\";N;s:4:\"prev\";r:93;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:46;s:3:\"end\";i:47;s:4:\"line\";i:2;s:6:\"column\";i:40;s:5:\"value\";N;s:4:\"prev\";r:101;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:52;s:3:\"end\";i:54;s:4:\"line\";i:3;s:6:\"column\";i:5;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:109;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:59;s:3:\"end\";i:63;s:4:\"line\";i:4;s:6:\"column\";i:5;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:117;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:66;s:3:\"end\";i:67;s:4:\"line\";i:5;s:6:\"column\";i:3;s:5:\"value\";N;s:4:\"prev\";r:125;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:68;s:3:\"end\";i:69;s:4:\"line\";i:6;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:133;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:69;s:3:\"end\";i:69;s:4:\"line\";i:6;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:141;s:4:\"next\";N;}}}}}}}}}}}}}}}}}}}s:8:\"endToken\";r:149;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:69:\"query{\n  createBagian(input: {nama: \"Helper\"}){\n    id\n    nama\n  }\n}\";s:6:\"length\";i:69;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:69;s:10:\"startToken\";r:13;s:8:\"endToken\";r:141;s:6:\"source\";r:159;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:5:\"query\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:5;s:3:\"end\";i:69;s:10:\"startToken\";r:21;s:8:\"endToken\";r:141;s:6:\"source\";r:159;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:67;s:10:\"startToken\";r:29;s:8:\"endToken\";r:133;s:6:\"source\";r:159;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:21;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:159;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:12:\"createBagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:33:\"GraphQL\\Language\\AST\\ArgumentNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:22;s:3:\"end\";i:45;s:10:\"startToken\";r:45;s:8:\"endToken\";r:93;s:6:\"source\";r:159;}s:4:\"kind\";s:8:\"Argument\";s:5:\"value\";O:36:\"GraphQL\\Language\\AST\\ObjectValueNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:29;s:3:\"end\";i:45;s:10:\"startToken\";r:61;s:8:\"endToken\";r:93;s:6:\"source\";r:159;}s:4:\"kind\";s:11:\"ObjectValue\";s:6:\"fields\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:36:\"GraphQL\\Language\\AST\\ObjectFieldNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:30;s:3:\"end\";i:44;s:10:\"startToken\";r:69;s:8:\"endToken\";r:85;s:6:\"source\";r:159;}s:4:\"kind\";s:11:\"ObjectField\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:30;s:3:\"end\";i:34;s:10:\"startToken\";r:69;s:8:\"endToken\";r:69;s:6:\"source\";r:159;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"value\";O:36:\"GraphQL\\Language\\AST\\StringValueNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:36;s:3:\"end\";i:44;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:159;}s:4:\"kind\";s:11:\"StringValue\";s:5:\"value\";s:6:\"Helper\";s:5:\"block\";b:0;}}}}}s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:22;s:3:\"end\";i:27;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:159;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:5:\"input\";}}}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:46;s:3:\"end\";i:67;s:10:\"startToken\";r:109;s:8:\"endToken\";r:133;s:6:\"source\";r:159;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:2:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:52;s:3:\"end\";i:54;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:159;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:52;s:3:\"end\";i:54;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:159;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:1;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:59;s:3:\"end\";i:63;s:10:\"startToken\";r:125;s:8:\"endToken\";r:125;s:6:\"source\";r:159;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:59;s:3:\"end\";i:63;s:10:\"startToken\";r:125;s:8:\"endToken\";r:125;s:6:\"source\";r:159;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}}}}}', 1755048583),
('laravel-cache-lighthouse:query:570a2b1dd9c28ace7f60d622cb4bfb1dd3d40f69b4ec3ca431df92c3e34d3ed5', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:88;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:8;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:8:\"mutation\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:8;s:3:\"end\";i:9;s:4:\"line\";i:1;s:6:\"column\";i:9;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:12;s:3:\"end\";i:24;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:12:\"createBagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"(\";s:5:\"start\";i:24;s:3:\"end\";i:25;s:4:\"line\";i:2;s:6:\"column\";i:15;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:25;s:3:\"end\";i:30;s:4:\"line\";i:2;s:6:\"column\";i:16;s:5:\"value\";s:5:\"input\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:30;s:3:\"end\";i:31;s:4:\"line\";i:2;s:6:\"column\";i:21;s:5:\"value\";N;s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:32;s:3:\"end\";i:33;s:4:\"line\";i:2;s:6:\"column\";i:23;s:5:\"value\";N;s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:33;s:3:\"end\";i:37;s:4:\"line\";i:2;s:6:\"column\";i:24;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:37;s:3:\"end\";i:38;s:4:\"line\";i:2;s:6:\"column\";i:28;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:6:\"String\";s:5:\"start\";i:39;s:3:\"end\";i:48;s:4:\"line\";i:2;s:6:\"column\";i:30;s:5:\"value\";s:7:\"Helper2\";s:4:\"prev\";r:77;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:48;s:3:\"end\";i:49;s:4:\"line\";i:2;s:6:\"column\";i:39;s:5:\"value\";N;s:4:\"prev\";r:85;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\")\";s:5:\"start\";i:49;s:3:\"end\";i:50;s:4:\"line\";i:2;s:6:\"column\";i:40;s:5:\"value\";N;s:4:\"prev\";r:93;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:50;s:3:\"end\";i:51;s:4:\"line\";i:2;s:6:\"column\";i:41;s:5:\"value\";N;s:4:\"prev\";r:101;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:56;s:3:\"end\";i:58;s:4:\"line\";i:3;s:6:\"column\";i:5;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:109;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:63;s:3:\"end\";i:67;s:4:\"line\";i:4;s:6:\"column\";i:5;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:117;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:72;s:3:\"end\";i:82;s:4:\"line\";i:5;s:6:\"column\";i:5;s:5:\"value\";s:10:\"created_at\";s:4:\"prev\";r:125;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:85;s:3:\"end\";i:86;s:4:\"line\";i:6;s:6:\"column\";i:3;s:5:\"value\";N;s:4:\"prev\";r:133;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:87;s:3:\"end\";i:88;s:4:\"line\";i:7;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:141;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:88;s:3:\"end\";i:88;s:4:\"line\";i:7;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:149;s:4:\"next\";N;}}}}}}}}}}}}}}}}}}}}s:8:\"endToken\";r:157;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:88:\"mutation{\n  createBagian(input: {nama: \"Helper2\"}){\n    id\n    nama\n    created_at\n  }\n}\";s:6:\"length\";i:88;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:88;s:10:\"startToken\";r:13;s:8:\"endToken\";r:149;s:6:\"source\";r:167;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:8:\"mutation\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:8;s:3:\"end\";i:88;s:10:\"startToken\";r:21;s:8:\"endToken\";r:149;s:6:\"source\";r:167;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:12;s:3:\"end\";i:86;s:10:\"startToken\";r:29;s:8:\"endToken\";r:141;s:6:\"source\";r:167;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:12;s:3:\"end\";i:24;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:167;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:12:\"createBagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:33:\"GraphQL\\Language\\AST\\ArgumentNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:25;s:3:\"end\";i:49;s:10:\"startToken\";r:45;s:8:\"endToken\";r:93;s:6:\"source\";r:167;}s:4:\"kind\";s:8:\"Argument\";s:5:\"value\";O:36:\"GraphQL\\Language\\AST\\ObjectValueNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:32;s:3:\"end\";i:49;s:10:\"startToken\";r:61;s:8:\"endToken\";r:93;s:6:\"source\";r:167;}s:4:\"kind\";s:11:\"ObjectValue\";s:6:\"fields\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:36:\"GraphQL\\Language\\AST\\ObjectFieldNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:33;s:3:\"end\";i:48;s:10:\"startToken\";r:69;s:8:\"endToken\";r:85;s:6:\"source\";r:167;}s:4:\"kind\";s:11:\"ObjectField\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:33;s:3:\"end\";i:37;s:10:\"startToken\";r:69;s:8:\"endToken\";r:69;s:6:\"source\";r:167;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"value\";O:36:\"GraphQL\\Language\\AST\\StringValueNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:39;s:3:\"end\";i:48;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:167;}s:4:\"kind\";s:11:\"StringValue\";s:5:\"value\";s:7:\"Helper2\";s:5:\"block\";b:0;}}}}}s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:25;s:3:\"end\";i:30;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:167;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:5:\"input\";}}}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:50;s:3:\"end\";i:86;s:10:\"startToken\";r:109;s:8:\"endToken\";r:141;s:6:\"source\";r:167;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:3:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:56;s:3:\"end\";i:58;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:167;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:56;s:3:\"end\";i:58;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:167;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:1;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:63;s:3:\"end\";i:67;s:10:\"startToken\";r:125;s:8:\"endToken\";r:125;s:6:\"source\";r:167;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:63;s:3:\"end\";i:67;s:10:\"startToken\";r:125;s:8:\"endToken\";r:125;s:6:\"source\";r:167;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:2;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:72;s:3:\"end\";i:82;s:10:\"startToken\";r:133;s:8:\"endToken\";r:133;s:6:\"source\";r:167;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:72;s:3:\"end\";i:82;s:10:\"startToken\";r:133;s:8:\"endToken\";r:133;s:6:\"source\";r:167;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:10:\"created_at\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}}}}}', 1755048669),
('laravel-cache-lighthouse:query:749ed367367f2901942f5d6c62b49b2a8193fff2a5e4efb8707c1987da98af0b', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:61;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:5;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:5:\"query\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:5;s:3:\"end\";i:6;s:4:\"line\";i:1;s:6:\"column\";i:6;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:9;s:3:\"end\";i:15;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:6:\"bagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"(\";s:5:\"start\";i:15;s:3:\"end\";i:16;s:4:\"line\";i:2;s:6:\"column\";i:9;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:16;s:3:\"end\";i:18;s:4:\"line\";i:2;s:6:\"column\";i:10;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:18;s:3:\"end\";i:19;s:4:\"line\";i:2;s:6:\"column\";i:12;s:5:\"value\";N;s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:3:\"Int\";s:5:\"start\";i:20;s:3:\"end\";i:21;s:4:\"line\";i:2;s:6:\"column\";i:14;s:5:\"value\";s:1:\"1\";s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\")\";s:5:\"start\";i:21;s:3:\"end\";i:22;s:4:\"line\";i:2;s:6:\"column\";i:15;s:5:\"value\";N;s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:23;s:3:\"end\";i:24;s:4:\"line\";i:2;s:6:\"column\";i:17;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:29;s:3:\"end\";i:31;s:4:\"line\";i:3;s:6:\"column\";i:5;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:77;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:36;s:3:\"end\";i:40;s:4:\"line\";i:4;s:6:\"column\";i:5;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:85;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:45;s:3:\"end\";i:55;s:4:\"line\";i:5;s:6:\"column\";i:5;s:5:\"value\";s:10:\"created_at\";s:4:\"prev\";r:93;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:58;s:3:\"end\";i:59;s:4:\"line\";i:6;s:6:\"column\";i:3;s:5:\"value\";N;s:4:\"prev\";r:101;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:60;s:3:\"end\";i:61;s:4:\"line\";i:7;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:109;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:61;s:3:\"end\";i:61;s:4:\"line\";i:7;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:117;s:4:\"next\";N;}}}}}}}}}}}}}}}}s:8:\"endToken\";r:125;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:61:\"query{\n  bagian(id: 1) {\n    id\n    nama\n    created_at\n  }\n}\";s:6:\"length\";i:61;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:61;s:10:\"startToken\";r:13;s:8:\"endToken\";r:117;s:6:\"source\";r:135;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:5:\"query\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:5;s:3:\"end\";i:61;s:10:\"startToken\";r:21;s:8:\"endToken\";r:117;s:6:\"source\";r:135;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:59;s:10:\"startToken\";r:29;s:8:\"endToken\";r:109;s:6:\"source\";r:135;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:15;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:135;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:6:\"bagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:33:\"GraphQL\\Language\\AST\\ArgumentNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:16;s:3:\"end\";i:21;s:10:\"startToken\";r:45;s:8:\"endToken\";r:61;s:6:\"source\";r:135;}s:4:\"kind\";s:8:\"Argument\";s:5:\"value\";O:33:\"GraphQL\\Language\\AST\\IntValueNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:20;s:3:\"end\";i:21;s:10:\"startToken\";r:61;s:8:\"endToken\";r:61;s:6:\"source\";r:135;}s:4:\"kind\";s:8:\"IntValue\";s:5:\"value\";s:1:\"1\";}s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:16;s:3:\"end\";i:18;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:135;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}}}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:23;s:3:\"end\";i:59;s:10:\"startToken\";r:77;s:8:\"endToken\";r:109;s:6:\"source\";r:135;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:3:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:29;s:3:\"end\";i:31;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:135;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:29;s:3:\"end\";i:31;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:135;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:1;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:36;s:3:\"end\";i:40;s:10:\"startToken\";r:93;s:8:\"endToken\";r:93;s:6:\"source\";r:135;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:36;s:3:\"end\";i:40;s:10:\"startToken\";r:93;s:8:\"endToken\";r:93;s:6:\"source\";r:135;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:2;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:45;s:3:\"end\";i:55;s:10:\"startToken\";r:101;s:8:\"endToken\";r:101;s:6:\"source\";r:135;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:45;s:3:\"end\";i:55;s:10:\"startToken\";r:101;s:8:\"endToken\";r:101;s:6:\"source\";r:135;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:10:\"created_at\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}}}}}', 1755048491),
('laravel-cache-lighthouse:query:7911a61cde5b0a4abd46fe85d0cc35cebf04c155e1dd0ffa3d3327421859aceb', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:91;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:5;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:5:\"query\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:5;s:3:\"end\";i:6;s:4:\"line\";i:1;s:6:\"column\";i:6;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:9;s:3:\"end\";i:15;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:6:\"Bagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"(\";s:5:\"start\";i:15;s:3:\"end\";i:16;s:4:\"line\";i:2;s:6:\"column\";i:9;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:16;s:3:\"end\";i:18;s:4:\"line\";i:2;s:6:\"column\";i:10;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:18;s:3:\"end\";i:19;s:4:\"line\";i:2;s:6:\"column\";i:12;s:5:\"value\";N;s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:3:\"Int\";s:5:\"start\";i:20;s:3:\"end\";i:21;s:4:\"line\";i:2;s:6:\"column\";i:14;s:5:\"value\";s:1:\"1\";s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\")\";s:5:\"start\";i:21;s:3:\"end\";i:22;s:4:\"line\";i:2;s:6:\"column\";i:15;s:5:\"value\";N;s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:23;s:3:\"end\";i:24;s:4:\"line\";i:2;s:6:\"column\";i:17;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:29;s:3:\"end\";i:31;s:4:\"line\";i:3;s:6:\"column\";i:5;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:77;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:36;s:3:\"end\";i:40;s:4:\"line\";i:4;s:6:\"column\";i:5;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:85;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:45;s:3:\"end\";i:55;s:4:\"line\";i:5;s:6:\"column\";i:5;s:5:\"value\";s:10:\"created_at\";s:4:\"prev\";r:93;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:60;s:3:\"end\";i:70;s:4:\"line\";i:6;s:6:\"column\";i:5;s:5:\"value\";s:10:\"updated_at\";s:4:\"prev\";r:101;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:75;s:3:\"end\";i:85;s:4:\"line\";i:7;s:6:\"column\";i:5;s:5:\"value\";s:10:\"deleted_at\";s:4:\"prev\";r:109;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:88;s:3:\"end\";i:89;s:4:\"line\";i:8;s:6:\"column\";i:3;s:5:\"value\";N;s:4:\"prev\";r:117;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:90;s:3:\"end\";i:91;s:4:\"line\";i:9;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:125;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:91;s:3:\"end\";i:91;s:4:\"line\";i:9;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:133;s:4:\"next\";N;}}}}}}}}}}}}}}}}}}s:8:\"endToken\";r:141;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:91:\"query{\n  Bagian(id: 1) {\n    id\n    nama\n    created_at\n    updated_at\n    deleted_at\n  }\n}\";s:6:\"length\";i:91;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:91;s:10:\"startToken\";r:13;s:8:\"endToken\";r:133;s:6:\"source\";r:151;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:5:\"query\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:5;s:3:\"end\";i:91;s:10:\"startToken\";r:21;s:8:\"endToken\";r:133;s:6:\"source\";r:151;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:89;s:10:\"startToken\";r:29;s:8:\"endToken\";r:125;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:15;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:6:\"Bagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:33:\"GraphQL\\Language\\AST\\ArgumentNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:16;s:3:\"end\";i:21;s:10:\"startToken\";r:45;s:8:\"endToken\";r:61;s:6:\"source\";r:151;}s:4:\"kind\";s:8:\"Argument\";s:5:\"value\";O:33:\"GraphQL\\Language\\AST\\IntValueNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:20;s:3:\"end\";i:21;s:10:\"startToken\";r:61;s:8:\"endToken\";r:61;s:6:\"source\";r:151;}s:4:\"kind\";s:8:\"IntValue\";s:5:\"value\";s:1:\"1\";}s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:16;s:3:\"end\";i:18;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}}}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:23;s:3:\"end\";i:89;s:10:\"startToken\";r:77;s:8:\"endToken\";r:125;s:6:\"source\";r:151;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:5:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:29;s:3:\"end\";i:31;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:29;s:3:\"end\";i:31;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:1;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:36;s:3:\"end\";i:40;s:10:\"startToken\";r:93;s:8:\"endToken\";r:93;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:36;s:3:\"end\";i:40;s:10:\"startToken\";r:93;s:8:\"endToken\";r:93;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:2;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:45;s:3:\"end\";i:55;s:10:\"startToken\";r:101;s:8:\"endToken\";r:101;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:45;s:3:\"end\";i:55;s:10:\"startToken\";r:101;s:8:\"endToken\";r:101;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:10:\"created_at\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:3;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:60;s:3:\"end\";i:70;s:10:\"startToken\";r:109;s:8:\"endToken\";r:109;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:60;s:3:\"end\";i:70;s:10:\"startToken\";r:109;s:8:\"endToken\";r:109;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:10:\"updated_at\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:4;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:75;s:3:\"end\";i:85;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:75;s:3:\"end\";i:85;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:10:\"deleted_at\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}}}}}', 1755048476);
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-lighthouse:query:7cf52ce9afb706dda926af0d2df1e13ce14f27fb0d410ed3d4d0847752990cb0', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:42;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:5;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:5:\"query\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:6;s:3:\"end\";i:7;s:4:\"line\";i:1;s:6:\"column\";i:7;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:10;s:3:\"end\";i:19;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:9:\"allBagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:19;s:3:\"end\";i:20;s:4:\"line\";i:2;s:6:\"column\";i:12;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:25;s:3:\"end\";i:27;s:4:\"line\";i:3;s:6:\"column\";i:5;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:32;s:3:\"end\";i:36;s:4:\"line\";i:4;s:6:\"column\";i:5;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:39;s:3:\"end\";i:40;s:4:\"line\";i:5;s:6:\"column\";i:3;s:5:\"value\";N;s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:41;s:3:\"end\";i:42;s:4:\"line\";i:6;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:42;s:3:\"end\";i:42;s:4:\"line\";i:6;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";N;}}}}}}}}}}s:8:\"endToken\";r:77;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:42:\"query {\n  allBagian{\n    id\n    nama\n  }\n}\";s:6:\"length\";i:42;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:42;s:10:\"startToken\";r:13;s:8:\"endToken\";r:69;s:6:\"source\";r:87;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:5:\"query\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:6;s:3:\"end\";i:42;s:10:\"startToken\";r:21;s:8:\"endToken\";r:69;s:6:\"source\";r:87;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:10;s:3:\"end\";i:40;s:10:\"startToken\";r:29;s:8:\"endToken\";r:61;s:6:\"source\";r:87;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:10;s:3:\"end\";i:19;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:87;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:9:\"allBagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:19;s:3:\"end\";i:40;s:10:\"startToken\";r:37;s:8:\"endToken\";r:61;s:6:\"source\";r:87;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:2:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:25;s:3:\"end\";i:27;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:87;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:25;s:3:\"end\";i:27;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:87;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:1;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:32;s:3:\"end\";i:36;s:10:\"startToken\";r:53;s:8:\"endToken\";r:53;s:6:\"source\";r:87;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:32;s:3:\"end\";i:36;s:10:\"startToken\";r:53;s:8:\"endToken\";r:53;s:6:\"source\";r:87;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}}}}}', 1755049101),
('laravel-cache-lighthouse:query:8e59d3880dbd2735c6488623a778c52a8e3f4dac80dd89d3a3bfc1bd44df261f', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:57;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:5;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:5:\"query\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:6;s:3:\"end\";i:7;s:4:\"line\";i:1;s:6:\"column\";i:7;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:10;s:3:\"end\";i:19;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:9:\"allBagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:19;s:3:\"end\";i:20;s:4:\"line\";i:2;s:6:\"column\";i:12;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:25;s:3:\"end\";i:27;s:4:\"line\";i:3;s:6:\"column\";i:5;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:32;s:3:\"end\";i:36;s:4:\"line\";i:4;s:6:\"column\";i:5;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:41;s:3:\"end\";i:51;s:4:\"line\";i:5;s:6:\"column\";i:5;s:5:\"value\";s:10:\"created_at\";s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:54;s:3:\"end\";i:55;s:4:\"line\";i:6;s:6:\"column\";i:3;s:5:\"value\";N;s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:56;s:3:\"end\";i:57;s:4:\"line\";i:7;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:57;s:3:\"end\";i:57;s:4:\"line\";i:7;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:77;s:4:\"next\";N;}}}}}}}}}}}s:8:\"endToken\";r:85;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:57:\"query {\n  allBagian{\n    id\n    nama\n    created_at\n  }\n}\";s:6:\"length\";i:57;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:57;s:10:\"startToken\";r:13;s:8:\"endToken\";r:77;s:6:\"source\";r:95;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:5:\"query\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:6;s:3:\"end\";i:57;s:10:\"startToken\";r:21;s:8:\"endToken\";r:77;s:6:\"source\";r:95;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:10;s:3:\"end\";i:55;s:10:\"startToken\";r:29;s:8:\"endToken\";r:69;s:6:\"source\";r:95;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:10;s:3:\"end\";i:19;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:95;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:9:\"allBagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:19;s:3:\"end\";i:55;s:10:\"startToken\";r:37;s:8:\"endToken\";r:69;s:6:\"source\";r:95;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:3:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:25;s:3:\"end\";i:27;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:95;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:25;s:3:\"end\";i:27;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:95;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:1;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:32;s:3:\"end\";i:36;s:10:\"startToken\";r:53;s:8:\"endToken\";r:53;s:6:\"source\";r:95;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:32;s:3:\"end\";i:36;s:10:\"startToken\";r:53;s:8:\"endToken\";r:53;s:6:\"source\";r:95;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:2;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:41;s:3:\"end\";i:51;s:10:\"startToken\";r:61;s:8:\"endToken\";r:61;s:6:\"source\";r:95;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:41;s:3:\"end\";i:51;s:10:\"startToken\";r:61;s:8:\"endToken\";r:61;s:6:\"source\";r:95;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:10:\"created_at\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}}}}}', 1755049109),
('laravel-cache-lighthouse:query:9560b3c205043670e4bb232345e10dd2668136c626f98db2b8fe2ab41a577a59', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:48;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:5;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:5:\"query\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:5;s:3:\"end\";i:6;s:4:\"line\";i:1;s:6:\"column\";i:6;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:9;s:3:\"end\";i:21;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:12:\"createBagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"(\";s:5:\"start\";i:21;s:3:\"end\";i:22;s:4:\"line\";i:2;s:6:\"column\";i:15;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:22;s:3:\"end\";i:27;s:4:\"line\";i:2;s:6:\"column\";i:16;s:5:\"value\";s:5:\"input\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:27;s:3:\"end\";i:28;s:4:\"line\";i:2;s:6:\"column\";i:21;s:5:\"value\";N;s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:29;s:3:\"end\";i:30;s:4:\"line\";i:2;s:6:\"column\";i:23;s:5:\"value\";N;s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:30;s:3:\"end\";i:34;s:4:\"line\";i:2;s:6:\"column\";i:24;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:34;s:3:\"end\";i:35;s:4:\"line\";i:2;s:6:\"column\";i:28;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:6:\"String\";s:5:\"start\";i:36;s:3:\"end\";i:44;s:4:\"line\";i:2;s:6:\"column\";i:30;s:5:\"value\";s:6:\"Helper\";s:4:\"prev\";r:77;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:44;s:3:\"end\";i:45;s:4:\"line\";i:2;s:6:\"column\";i:38;s:5:\"value\";N;s:4:\"prev\";r:85;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\")\";s:5:\"start\";i:45;s:3:\"end\";i:46;s:4:\"line\";i:2;s:6:\"column\";i:39;s:5:\"value\";N;s:4:\"prev\";r:93;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:47;s:3:\"end\";i:48;s:4:\"line\";i:3;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:101;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:48;s:3:\"end\";i:48;s:4:\"line\";i:3;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:109;s:4:\"next\";N;}}}}}}}}}}}}}}}s:8:\"endToken\";r:117;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:48:\"query{\n  createBagian(input: {nama: \"Helper\"})\n}\";s:6:\"length\";i:48;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:48;s:10:\"startToken\";r:13;s:8:\"endToken\";r:109;s:6:\"source\";r:127;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:5:\"query\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:5;s:3:\"end\";i:48;s:10:\"startToken\";r:21;s:8:\"endToken\";r:109;s:6:\"source\";r:127;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:46;s:10:\"startToken\";r:29;s:8:\"endToken\";r:101;s:6:\"source\";r:127;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:21;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:127;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:12:\"createBagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:33:\"GraphQL\\Language\\AST\\ArgumentNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:22;s:3:\"end\";i:45;s:10:\"startToken\";r:45;s:8:\"endToken\";r:93;s:6:\"source\";r:127;}s:4:\"kind\";s:8:\"Argument\";s:5:\"value\";O:36:\"GraphQL\\Language\\AST\\ObjectValueNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:29;s:3:\"end\";i:45;s:10:\"startToken\";r:61;s:8:\"endToken\";r:93;s:6:\"source\";r:127;}s:4:\"kind\";s:11:\"ObjectValue\";s:6:\"fields\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:36:\"GraphQL\\Language\\AST\\ObjectFieldNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:30;s:3:\"end\";i:44;s:10:\"startToken\";r:69;s:8:\"endToken\";r:85;s:6:\"source\";r:127;}s:4:\"kind\";s:11:\"ObjectField\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:30;s:3:\"end\";i:34;s:10:\"startToken\";r:69;s:8:\"endToken\";r:69;s:6:\"source\";r:127;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"value\";O:36:\"GraphQL\\Language\\AST\\StringValueNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:36;s:3:\"end\";i:44;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:127;}s:4:\"kind\";s:11:\"StringValue\";s:5:\"value\";s:6:\"Helper\";s:5:\"block\";b:0;}}}}}s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:22;s:3:\"end\";i:27;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:127;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:5:\"input\";}}}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}', 1755048564),
('laravel-cache-lighthouse:query:9ff0b35e8b67a4d6e8402644e6033cccf0abe75401d79ed0314ff358a7a39a58', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:61;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:5;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:5:\"query\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:5;s:3:\"end\";i:6;s:4:\"line\";i:1;s:6:\"column\";i:6;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:9;s:3:\"end\";i:18;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:9:\"allBagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"(\";s:5:\"start\";i:18;s:3:\"end\";i:19;s:4:\"line\";i:2;s:6:\"column\";i:12;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:19;s:3:\"end\";i:23;s:4:\"line\";i:2;s:6:\"column\";i:13;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:23;s:3:\"end\";i:24;s:4:\"line\";i:2;s:6:\"column\";i:17;s:5:\"value\";N;s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:6:\"String\";s:5:\"start\";i:25;s:3:\"end\";i:36;s:4:\"line\";i:2;s:6:\"column\";i:19;s:5:\"value\";s:9:\"%support%\";s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\")\";s:5:\"start\";i:36;s:3:\"end\";i:37;s:4:\"line\";i:2;s:6:\"column\";i:30;s:5:\"value\";N;s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:38;s:3:\"end\";i:39;s:4:\"line\";i:2;s:6:\"column\";i:32;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:44;s:3:\"end\";i:46;s:4:\"line\";i:3;s:6:\"column\";i:5;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:77;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:51;s:3:\"end\";i:55;s:4:\"line\";i:4;s:6:\"column\";i:5;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:85;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:58;s:3:\"end\";i:59;s:4:\"line\";i:5;s:6:\"column\";i:3;s:5:\"value\";N;s:4:\"prev\";r:93;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:60;s:3:\"end\";i:61;s:4:\"line\";i:6;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:101;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:61;s:3:\"end\";i:61;s:4:\"line\";i:6;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:109;s:4:\"next\";N;}}}}}}}}}}}}}}}s:8:\"endToken\";r:117;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:61:\"query{\n  allBagian(nama: \"%support%\") {\n    id\n    nama\n  }\n}\";s:6:\"length\";i:61;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:61;s:10:\"startToken\";r:13;s:8:\"endToken\";r:109;s:6:\"source\";r:127;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:5:\"query\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:5;s:3:\"end\";i:61;s:10:\"startToken\";r:21;s:8:\"endToken\";r:109;s:6:\"source\";r:127;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:59;s:10:\"startToken\";r:29;s:8:\"endToken\";r:101;s:6:\"source\";r:127;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:18;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:127;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:9:\"allBagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:33:\"GraphQL\\Language\\AST\\ArgumentNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:19;s:3:\"end\";i:36;s:10:\"startToken\";r:45;s:8:\"endToken\";r:61;s:6:\"source\";r:127;}s:4:\"kind\";s:8:\"Argument\";s:5:\"value\";O:36:\"GraphQL\\Language\\AST\\StringValueNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:25;s:3:\"end\";i:36;s:10:\"startToken\";r:61;s:8:\"endToken\";r:61;s:6:\"source\";r:127;}s:4:\"kind\";s:11:\"StringValue\";s:5:\"value\";s:9:\"%support%\";s:5:\"block\";b:0;}s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:19;s:3:\"end\";i:23;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:127;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}}}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:38;s:3:\"end\";i:59;s:10:\"startToken\";r:77;s:8:\"endToken\";r:101;s:6:\"source\";r:127;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:2:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:44;s:3:\"end\";i:46;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:127;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:44;s:3:\"end\";i:46;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:127;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:1;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:51;s:3:\"end\";i:55;s:10:\"startToken\";r:93;s:8:\"endToken\";r:93;s:6:\"source\";r:127;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:51;s:3:\"end\";i:55;s:10:\"startToken\";r:93;s:8:\"endToken\";r:93;s:6:\"source\";r:127;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}}}}}', 1755048278),
('laravel-cache-lighthouse:query:deeb1787dec3964b44fa244698334aa374258d5b011590a5c1f9dcac3a390667', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:49;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:5;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:5:\"query\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:5;s:3:\"end\";i:6;s:4:\"line\";i:1;s:6:\"column\";i:6;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:9;s:3:\"end\";i:18;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:9:\"allBagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"(\";s:5:\"start\";i:18;s:3:\"end\";i:19;s:4:\"line\";i:2;s:6:\"column\";i:12;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:19;s:3:\"end\";i:21;s:4:\"line\";i:2;s:6:\"column\";i:13;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:21;s:3:\"end\";i:22;s:4:\"line\";i:2;s:6:\"column\";i:15;s:5:\"value\";N;s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:3:\"Int\";s:5:\"start\";i:23;s:3:\"end\";i:24;s:4:\"line\";i:2;s:6:\"column\";i:17;s:5:\"value\";s:1:\"1\";s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\")\";s:5:\"start\";i:24;s:3:\"end\";i:25;s:4:\"line\";i:2;s:6:\"column\";i:18;s:5:\"value\";N;s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:26;s:3:\"end\";i:27;s:4:\"line\";i:2;s:6:\"column\";i:20;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:32;s:3:\"end\";i:34;s:4:\"line\";i:3;s:6:\"column\";i:5;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:77;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:39;s:3:\"end\";i:43;s:4:\"line\";i:4;s:6:\"column\";i:5;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:85;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:46;s:3:\"end\";i:47;s:4:\"line\";i:5;s:6:\"column\";i:3;s:5:\"value\";N;s:4:\"prev\";r:93;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:48;s:3:\"end\";i:49;s:4:\"line\";i:6;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:101;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:49;s:3:\"end\";i:49;s:4:\"line\";i:6;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:109;s:4:\"next\";N;}}}}}}}}}}}}}}}s:8:\"endToken\";r:117;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:49:\"query{\n  allBagian(id: 1) {\n    id\n    nama\n  }\n}\";s:6:\"length\";i:49;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:49;s:10:\"startToken\";r:13;s:8:\"endToken\";r:109;s:6:\"source\";r:127;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:5:\"query\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:5;s:3:\"end\";i:49;s:10:\"startToken\";r:21;s:8:\"endToken\";r:109;s:6:\"source\";r:127;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:47;s:10:\"startToken\";r:29;s:8:\"endToken\";r:101;s:6:\"source\";r:127;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:18;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:127;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:9:\"allBagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:33:\"GraphQL\\Language\\AST\\ArgumentNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:19;s:3:\"end\";i:24;s:10:\"startToken\";r:45;s:8:\"endToken\";r:61;s:6:\"source\";r:127;}s:4:\"kind\";s:8:\"Argument\";s:5:\"value\";O:33:\"GraphQL\\Language\\AST\\IntValueNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:23;s:3:\"end\";i:24;s:10:\"startToken\";r:61;s:8:\"endToken\";r:61;s:6:\"source\";r:127;}s:4:\"kind\";s:8:\"IntValue\";s:5:\"value\";s:1:\"1\";}s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:19;s:3:\"end\";i:21;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:127;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}}}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:26;s:3:\"end\";i:47;s:10:\"startToken\";r:77;s:8:\"endToken\";r:101;s:6:\"source\";r:127;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:2:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:32;s:3:\"end\";i:34;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:127;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:32;s:3:\"end\";i:34;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:127;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:1;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:39;s:3:\"end\";i:43;s:10:\"startToken\";r:93;s:8:\"endToken\";r:93;s:6:\"source\";r:127;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:39;s:3:\"end\";i:43;s:10:\"startToken\";r:93;s:8:\"endToken\";r:93;s:6:\"source\";r:127;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}}}}}', 1755048431),
('laravel-cache-lighthouse:query:e38b9df3c9b844e4cd917747a85c047070714d82272deeb237d76950d5c4fe02', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:91;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:5;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:5:\"query\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:5;s:3:\"end\";i:6;s:4:\"line\";i:1;s:6:\"column\";i:6;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:9;s:3:\"end\";i:15;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:6:\"bagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"(\";s:5:\"start\";i:15;s:3:\"end\";i:16;s:4:\"line\";i:2;s:6:\"column\";i:9;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:16;s:3:\"end\";i:18;s:4:\"line\";i:2;s:6:\"column\";i:10;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:18;s:3:\"end\";i:19;s:4:\"line\";i:2;s:6:\"column\";i:12;s:5:\"value\";N;s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:3:\"Int\";s:5:\"start\";i:20;s:3:\"end\";i:21;s:4:\"line\";i:2;s:6:\"column\";i:14;s:5:\"value\";s:1:\"1\";s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\")\";s:5:\"start\";i:21;s:3:\"end\";i:22;s:4:\"line\";i:2;s:6:\"column\";i:15;s:5:\"value\";N;s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:23;s:3:\"end\";i:24;s:4:\"line\";i:2;s:6:\"column\";i:17;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:29;s:3:\"end\";i:31;s:4:\"line\";i:3;s:6:\"column\";i:5;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:77;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:36;s:3:\"end\";i:40;s:4:\"line\";i:4;s:6:\"column\";i:5;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:85;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:45;s:3:\"end\";i:55;s:4:\"line\";i:5;s:6:\"column\";i:5;s:5:\"value\";s:10:\"created_at\";s:4:\"prev\";r:93;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:60;s:3:\"end\";i:70;s:4:\"line\";i:6;s:6:\"column\";i:5;s:5:\"value\";s:10:\"updated_at\";s:4:\"prev\";r:101;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:75;s:3:\"end\";i:85;s:4:\"line\";i:7;s:6:\"column\";i:5;s:5:\"value\";s:10:\"deleted_at\";s:4:\"prev\";r:109;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:88;s:3:\"end\";i:89;s:4:\"line\";i:8;s:6:\"column\";i:3;s:5:\"value\";N;s:4:\"prev\";r:117;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:90;s:3:\"end\";i:91;s:4:\"line\";i:9;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:125;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:91;s:3:\"end\";i:91;s:4:\"line\";i:9;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:133;s:4:\"next\";N;}}}}}}}}}}}}}}}}}}s:8:\"endToken\";r:141;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:91:\"query{\n  bagian(id: 1) {\n    id\n    nama\n    created_at\n    updated_at\n    deleted_at\n  }\n}\";s:6:\"length\";i:91;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:91;s:10:\"startToken\";r:13;s:8:\"endToken\";r:133;s:6:\"source\";r:151;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:5:\"query\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:5;s:3:\"end\";i:91;s:10:\"startToken\";r:21;s:8:\"endToken\";r:133;s:6:\"source\";r:151;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:89;s:10:\"startToken\";r:29;s:8:\"endToken\";r:125;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:15;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:6:\"bagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:33:\"GraphQL\\Language\\AST\\ArgumentNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:16;s:3:\"end\";i:21;s:10:\"startToken\";r:45;s:8:\"endToken\";r:61;s:6:\"source\";r:151;}s:4:\"kind\";s:8:\"Argument\";s:5:\"value\";O:33:\"GraphQL\\Language\\AST\\IntValueNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:20;s:3:\"end\";i:21;s:10:\"startToken\";r:61;s:8:\"endToken\";r:61;s:6:\"source\";r:151;}s:4:\"kind\";s:8:\"IntValue\";s:5:\"value\";s:1:\"1\";}s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:16;s:3:\"end\";i:18;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}}}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:23;s:3:\"end\";i:89;s:10:\"startToken\";r:77;s:8:\"endToken\";r:125;s:6:\"source\";r:151;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:5:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:29;s:3:\"end\";i:31;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:29;s:3:\"end\";i:31;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:1;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:36;s:3:\"end\";i:40;s:10:\"startToken\";r:93;s:8:\"endToken\";r:93;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:36;s:3:\"end\";i:40;s:10:\"startToken\";r:93;s:8:\"endToken\";r:93;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:2;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:45;s:3:\"end\";i:55;s:10:\"startToken\";r:101;s:8:\"endToken\";r:101;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:45;s:3:\"end\";i:55;s:10:\"startToken\";r:101;s:8:\"endToken\";r:101;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:10:\"created_at\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:3;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:60;s:3:\"end\";i:70;s:10:\"startToken\";r:109;s:8:\"endToken\";r:109;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:60;s:3:\"end\";i:70;s:10:\"startToken\";r:109;s:8:\"endToken\";r:109;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:10:\"updated_at\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:4;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:75;s:3:\"end\";i:85;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:75;s:3:\"end\";i:85;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:10:\"deleted_at\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}}}}}', 1755048483);
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-lighthouse:query:e401c80a404ca1a4e51fc455ab604983c70912dfbe4c279bd7bc2b4b7111d7e8', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:94;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:5;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:5:\"query\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:5;s:3:\"end\";i:6;s:4:\"line\";i:1;s:6:\"column\";i:6;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:9;s:3:\"end\";i:18;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:9:\"allBagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"(\";s:5:\"start\";i:18;s:3:\"end\";i:19;s:4:\"line\";i:2;s:6:\"column\";i:12;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:19;s:3:\"end\";i:21;s:4:\"line\";i:2;s:6:\"column\";i:13;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:21;s:3:\"end\";i:22;s:4:\"line\";i:2;s:6:\"column\";i:15;s:5:\"value\";N;s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:3:\"Int\";s:5:\"start\";i:23;s:3:\"end\";i:24;s:4:\"line\";i:2;s:6:\"column\";i:17;s:5:\"value\";s:1:\"1\";s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\")\";s:5:\"start\";i:24;s:3:\"end\";i:25;s:4:\"line\";i:2;s:6:\"column\";i:18;s:5:\"value\";N;s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:26;s:3:\"end\";i:27;s:4:\"line\";i:2;s:6:\"column\";i:20;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:32;s:3:\"end\";i:34;s:4:\"line\";i:3;s:6:\"column\";i:5;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:77;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:39;s:3:\"end\";i:43;s:4:\"line\";i:4;s:6:\"column\";i:5;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:85;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:48;s:3:\"end\";i:58;s:4:\"line\";i:5;s:6:\"column\";i:5;s:5:\"value\";s:10:\"created_at\";s:4:\"prev\";r:93;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:63;s:3:\"end\";i:73;s:4:\"line\";i:6;s:6:\"column\";i:5;s:5:\"value\";s:10:\"updated_at\";s:4:\"prev\";r:101;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:78;s:3:\"end\";i:88;s:4:\"line\";i:7;s:6:\"column\";i:5;s:5:\"value\";s:10:\"deleted_at\";s:4:\"prev\";r:109;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:91;s:3:\"end\";i:92;s:4:\"line\";i:8;s:6:\"column\";i:3;s:5:\"value\";N;s:4:\"prev\";r:117;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:93;s:3:\"end\";i:94;s:4:\"line\";i:9;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:125;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:94;s:3:\"end\";i:94;s:4:\"line\";i:9;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:133;s:4:\"next\";N;}}}}}}}}}}}}}}}}}}s:8:\"endToken\";r:141;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:94:\"query{\n  allBagian(id: 1) {\n    id\n    nama\n    created_at\n    updated_at\n    deleted_at\n  }\n}\";s:6:\"length\";i:94;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:94;s:10:\"startToken\";r:13;s:8:\"endToken\";r:133;s:6:\"source\";r:151;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:5:\"query\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:5;s:3:\"end\";i:94;s:10:\"startToken\";r:21;s:8:\"endToken\";r:133;s:6:\"source\";r:151;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:92;s:10:\"startToken\";r:29;s:8:\"endToken\";r:125;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:9;s:3:\"end\";i:18;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:9:\"allBagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:33:\"GraphQL\\Language\\AST\\ArgumentNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:19;s:3:\"end\";i:24;s:10:\"startToken\";r:45;s:8:\"endToken\";r:61;s:6:\"source\";r:151;}s:4:\"kind\";s:8:\"Argument\";s:5:\"value\";O:33:\"GraphQL\\Language\\AST\\IntValueNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:23;s:3:\"end\";i:24;s:10:\"startToken\";r:61;s:8:\"endToken\";r:61;s:6:\"source\";r:151;}s:4:\"kind\";s:8:\"IntValue\";s:5:\"value\";s:1:\"1\";}s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:19;s:3:\"end\";i:21;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}}}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:26;s:3:\"end\";i:92;s:10:\"startToken\";r:77;s:8:\"endToken\";r:125;s:6:\"source\";r:151;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:5:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:32;s:3:\"end\";i:34;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:32;s:3:\"end\";i:34;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:1;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:39;s:3:\"end\";i:43;s:10:\"startToken\";r:93;s:8:\"endToken\";r:93;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:39;s:3:\"end\";i:43;s:10:\"startToken\";r:93;s:8:\"endToken\";r:93;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:2;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:48;s:3:\"end\";i:58;s:10:\"startToken\";r:101;s:8:\"endToken\";r:101;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:48;s:3:\"end\";i:58;s:10:\"startToken\";r:101;s:8:\"endToken\";r:101;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:10:\"created_at\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:3;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:63;s:3:\"end\";i:73;s:10:\"startToken\";r:109;s:8:\"endToken\";r:109;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:63;s:3:\"end\";i:73;s:10:\"startToken\";r:109;s:8:\"endToken\";r:109;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:10:\"updated_at\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:4;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:78;s:3:\"end\";i:88;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:151;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:78;s:3:\"end\";i:88;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:151;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:10:\"deleted_at\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}}}}}', 1755048464),
('laravel-cache-lighthouse:query:e621d0d1e3a719d4343a4994f975704316c2a9f4ba82ffe8f06aa27662d4ceb6', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:88;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:8;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:8:\"mutation\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:8;s:3:\"end\";i:9;s:4:\"line\";i:1;s:6:\"column\";i:9;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:12;s:3:\"end\";i:24;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:12:\"createBagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"(\";s:5:\"start\";i:24;s:3:\"end\";i:25;s:4:\"line\";i:2;s:6:\"column\";i:15;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:25;s:3:\"end\";i:30;s:4:\"line\";i:2;s:6:\"column\";i:16;s:5:\"value\";s:5:\"input\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:30;s:3:\"end\";i:31;s:4:\"line\";i:2;s:6:\"column\";i:21;s:5:\"value\";N;s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:32;s:3:\"end\";i:33;s:4:\"line\";i:2;s:6:\"column\";i:23;s:5:\"value\";N;s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:33;s:3:\"end\";i:37;s:4:\"line\";i:2;s:6:\"column\";i:24;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:37;s:3:\"end\";i:38;s:4:\"line\";i:2;s:6:\"column\";i:28;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:6:\"String\";s:5:\"start\";i:39;s:3:\"end\";i:48;s:4:\"line\";i:2;s:6:\"column\";i:30;s:5:\"value\";s:7:\"Helper3\";s:4:\"prev\";r:77;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:48;s:3:\"end\";i:49;s:4:\"line\";i:2;s:6:\"column\";i:39;s:5:\"value\";N;s:4:\"prev\";r:85;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\")\";s:5:\"start\";i:49;s:3:\"end\";i:50;s:4:\"line\";i:2;s:6:\"column\";i:40;s:5:\"value\";N;s:4:\"prev\";r:93;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:50;s:3:\"end\";i:51;s:4:\"line\";i:2;s:6:\"column\";i:41;s:5:\"value\";N;s:4:\"prev\";r:101;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:56;s:3:\"end\";i:58;s:4:\"line\";i:3;s:6:\"column\";i:5;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:109;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:63;s:3:\"end\";i:67;s:4:\"line\";i:4;s:6:\"column\";i:5;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:117;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:72;s:3:\"end\";i:82;s:4:\"line\";i:5;s:6:\"column\";i:5;s:5:\"value\";s:10:\"created_at\";s:4:\"prev\";r:125;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:85;s:3:\"end\";i:86;s:4:\"line\";i:6;s:6:\"column\";i:3;s:5:\"value\";N;s:4:\"prev\";r:133;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:87;s:3:\"end\";i:88;s:4:\"line\";i:7;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:141;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:88;s:3:\"end\";i:88;s:4:\"line\";i:7;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:149;s:4:\"next\";N;}}}}}}}}}}}}}}}}}}}}s:8:\"endToken\";r:157;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:88:\"mutation{\n  createBagian(input: {nama: \"Helper3\"}){\n    id\n    nama\n    created_at\n  }\n}\";s:6:\"length\";i:88;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:88;s:10:\"startToken\";r:13;s:8:\"endToken\";r:149;s:6:\"source\";r:167;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:8:\"mutation\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:8;s:3:\"end\";i:88;s:10:\"startToken\";r:21;s:8:\"endToken\";r:149;s:6:\"source\";r:167;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:12;s:3:\"end\";i:86;s:10:\"startToken\";r:29;s:8:\"endToken\";r:141;s:6:\"source\";r:167;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:12;s:3:\"end\";i:24;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:167;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:12:\"createBagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:33:\"GraphQL\\Language\\AST\\ArgumentNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:25;s:3:\"end\";i:49;s:10:\"startToken\";r:45;s:8:\"endToken\";r:93;s:6:\"source\";r:167;}s:4:\"kind\";s:8:\"Argument\";s:5:\"value\";O:36:\"GraphQL\\Language\\AST\\ObjectValueNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:32;s:3:\"end\";i:49;s:10:\"startToken\";r:61;s:8:\"endToken\";r:93;s:6:\"source\";r:167;}s:4:\"kind\";s:11:\"ObjectValue\";s:6:\"fields\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:36:\"GraphQL\\Language\\AST\\ObjectFieldNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:33;s:3:\"end\";i:48;s:10:\"startToken\";r:69;s:8:\"endToken\";r:85;s:6:\"source\";r:167;}s:4:\"kind\";s:11:\"ObjectField\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:33;s:3:\"end\";i:37;s:10:\"startToken\";r:69;s:8:\"endToken\";r:69;s:6:\"source\";r:167;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"value\";O:36:\"GraphQL\\Language\\AST\\StringValueNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:39;s:3:\"end\";i:48;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:167;}s:4:\"kind\";s:11:\"StringValue\";s:5:\"value\";s:7:\"Helper3\";s:5:\"block\";b:0;}}}}}s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:25;s:3:\"end\";i:30;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:167;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:5:\"input\";}}}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:50;s:3:\"end\";i:86;s:10:\"startToken\";r:109;s:8:\"endToken\";r:141;s:6:\"source\";r:167;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:3:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:56;s:3:\"end\";i:58;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:167;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:56;s:3:\"end\";i:58;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:167;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:1;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:63;s:3:\"end\";i:67;s:10:\"startToken\";r:125;s:8:\"endToken\";r:125;s:6:\"source\";r:167;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:63;s:3:\"end\";i:67;s:10:\"startToken\";r:125;s:8:\"endToken\";r:125;s:6:\"source\";r:167;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:2;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:72;s:3:\"end\";i:82;s:10:\"startToken\";r:133;s:8:\"endToken\";r:133;s:6:\"source\";r:167;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:72;s:3:\"end\";i:82;s:10:\"startToken\";r:133;s:8:\"endToken\";r:133;s:6:\"source\";r:167;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:10:\"created_at\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}}}}}', 1755048688),
('laravel-cache-lighthouse:query:faf58e9f0200a8795f367d0d4c1f67b48488671a6a236de9014a13b27304f19b', 'O:33:\"GraphQL\\Language\\AST\\DocumentNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:72;s:10:\"startToken\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<SOF>\";s:5:\"start\";i:0;s:3:\"end\";i:0;s:4:\"line\";i:0;s:6:\"column\";i:0;s:5:\"value\";N;s:4:\"prev\";N;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:0;s:3:\"end\";i:8;s:4:\"line\";i:1;s:6:\"column\";i:1;s:5:\"value\";s:8:\"mutation\";s:4:\"prev\";r:5;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:8;s:3:\"end\";i:9;s:4:\"line\";i:1;s:6:\"column\";i:9;s:5:\"value\";N;s:4:\"prev\";r:13;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:12;s:3:\"end\";i:24;s:4:\"line\";i:2;s:6:\"column\";i:3;s:5:\"value\";s:12:\"createBagian\";s:4:\"prev\";r:21;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"(\";s:5:\"start\";i:24;s:3:\"end\";i:25;s:4:\"line\";i:2;s:6:\"column\";i:15;s:5:\"value\";N;s:4:\"prev\";r:29;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:25;s:3:\"end\";i:30;s:4:\"line\";i:2;s:6:\"column\";i:16;s:5:\"value\";s:5:\"input\";s:4:\"prev\";r:37;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:30;s:3:\"end\";i:31;s:4:\"line\";i:2;s:6:\"column\";i:21;s:5:\"value\";N;s:4:\"prev\";r:45;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:32;s:3:\"end\";i:33;s:4:\"line\";i:2;s:6:\"column\";i:23;s:5:\"value\";N;s:4:\"prev\";r:53;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:33;s:3:\"end\";i:37;s:4:\"line\";i:2;s:6:\"column\";i:24;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:61;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\":\";s:5:\"start\";i:37;s:3:\"end\";i:38;s:4:\"line\";i:2;s:6:\"column\";i:28;s:5:\"value\";N;s:4:\"prev\";r:69;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:6:\"String\";s:5:\"start\";i:39;s:3:\"end\";i:47;s:4:\"line\";i:2;s:6:\"column\";i:30;s:5:\"value\";s:6:\"Helper\";s:4:\"prev\";r:77;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:47;s:3:\"end\";i:48;s:4:\"line\";i:2;s:6:\"column\";i:38;s:5:\"value\";N;s:4:\"prev\";r:85;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\")\";s:5:\"start\";i:48;s:3:\"end\";i:49;s:4:\"line\";i:2;s:6:\"column\";i:39;s:5:\"value\";N;s:4:\"prev\";r:93;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"{\";s:5:\"start\";i:49;s:3:\"end\";i:50;s:4:\"line\";i:2;s:6:\"column\";i:40;s:5:\"value\";N;s:4:\"prev\";r:101;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:55;s:3:\"end\";i:57;s:4:\"line\";i:3;s:6:\"column\";i:5;s:5:\"value\";s:2:\"id\";s:4:\"prev\";r:109;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:4:\"Name\";s:5:\"start\";i:62;s:3:\"end\";i:66;s:4:\"line\";i:4;s:6:\"column\";i:5;s:5:\"value\";s:4:\"nama\";s:4:\"prev\";r:117;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:69;s:3:\"end\";i:70;s:4:\"line\";i:5;s:6:\"column\";i:3;s:5:\"value\";N;s:4:\"prev\";r:125;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:1:\"}\";s:5:\"start\";i:71;s:3:\"end\";i:72;s:4:\"line\";i:6;s:6:\"column\";i:1;s:5:\"value\";N;s:4:\"prev\";r:133;s:4:\"next\";O:22:\"GraphQL\\Language\\Token\":8:{s:4:\"kind\";s:5:\"<EOF>\";s:5:\"start\";i:72;s:3:\"end\";i:72;s:4:\"line\";i:6;s:6:\"column\";i:2;s:5:\"value\";N;s:4:\"prev\";r:141;s:4:\"next\";N;}}}}}}}}}}}}}}}}}}}s:8:\"endToken\";r:149;s:6:\"source\";O:23:\"GraphQL\\Language\\Source\":4:{s:4:\"body\";s:72:\"mutation{\n  createBagian(input: {nama: \"Helper\"}){\n    id\n    nama\n  }\n}\";s:6:\"length\";i:72;s:4:\"name\";s:15:\"GraphQL request\";s:14:\"locationOffset\";O:31:\"GraphQL\\Language\\SourceLocation\":2:{s:4:\"line\";i:1;s:6:\"column\";i:1;}}}s:4:\"kind\";s:8:\"Document\";s:11:\"definitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:44:\"GraphQL\\Language\\AST\\OperationDefinitionNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:0;s:3:\"end\";i:72;s:10:\"startToken\";r:13;s:8:\"endToken\";r:141;s:6:\"source\";r:159;}s:4:\"kind\";s:19:\"OperationDefinition\";s:4:\"name\";N;s:9:\"operation\";s:8:\"mutation\";s:19:\"variableDefinitions\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:8;s:3:\"end\";i:72;s:10:\"startToken\";r:21;s:8:\"endToken\";r:141;s:6:\"source\";r:159;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:12;s:3:\"end\";i:70;s:10:\"startToken\";r:29;s:8:\"endToken\";r:133;s:6:\"source\";r:159;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:12;s:3:\"end\";i:24;s:10:\"startToken\";r:29;s:8:\"endToken\";r:29;s:6:\"source\";r:159;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:12:\"createBagian\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:33:\"GraphQL\\Language\\AST\\ArgumentNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:25;s:3:\"end\";i:48;s:10:\"startToken\";r:45;s:8:\"endToken\";r:93;s:6:\"source\";r:159;}s:4:\"kind\";s:8:\"Argument\";s:5:\"value\";O:36:\"GraphQL\\Language\\AST\\ObjectValueNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:32;s:3:\"end\";i:48;s:10:\"startToken\";r:61;s:8:\"endToken\";r:93;s:6:\"source\";r:159;}s:4:\"kind\";s:11:\"ObjectValue\";s:6:\"fields\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:1:{i:0;O:36:\"GraphQL\\Language\\AST\\ObjectFieldNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:33;s:3:\"end\";i:47;s:10:\"startToken\";r:69;s:8:\"endToken\";r:85;s:6:\"source\";r:159;}s:4:\"kind\";s:11:\"ObjectField\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:33;s:3:\"end\";i:37;s:10:\"startToken\";r:69;s:8:\"endToken\";r:69;s:6:\"source\";r:159;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"value\";O:36:\"GraphQL\\Language\\AST\\StringValueNode\":4:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:39;s:3:\"end\";i:47;s:10:\"startToken\";r:85;s:8:\"endToken\";r:85;s:6:\"source\";r:159;}s:4:\"kind\";s:11:\"StringValue\";s:5:\"value\";s:6:\"Helper\";s:5:\"block\";b:0;}}}}}s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:25;s:3:\"end\";i:30;s:10:\"startToken\";r:45;s:8:\"endToken\";r:45;s:6:\"source\";r:159;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:5:\"input\";}}}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";O:37:\"GraphQL\\Language\\AST\\SelectionSetNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:49;s:3:\"end\";i:70;s:10:\"startToken\";r:109;s:8:\"endToken\";r:133;s:6:\"source\";r:159;}s:4:\"kind\";s:12:\"SelectionSet\";s:10:\"selections\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:2:{i:0;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:55;s:3:\"end\";i:57;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:159;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:55;s:3:\"end\";i:57;s:10:\"startToken\";r:117;s:8:\"endToken\";r:117;s:6:\"source\";r:159;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:2:\"id\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}i:1;O:30:\"GraphQL\\Language\\AST\\FieldNode\":7:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:62;s:3:\"end\";i:66;s:10:\"startToken\";r:125;s:8:\"endToken\";r:125;s:6:\"source\";r:159;}s:4:\"kind\";s:5:\"Field\";s:4:\"name\";O:29:\"GraphQL\\Language\\AST\\NameNode\":3:{s:3:\"loc\";O:29:\"GraphQL\\Language\\AST\\Location\":5:{s:5:\"start\";i:62;s:3:\"end\";i:66;s:10:\"startToken\";r:125;s:8:\"endToken\";r:125;s:6:\"source\";r:159;}s:4:\"kind\";s:4:\"Name\";s:5:\"value\";s:4:\"nama\";}s:5:\"alias\";N;s:9:\"arguments\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:10:\"directives\";O:29:\"GraphQL\\Language\\AST\\NodeList\":1:{s:36:\"\0GraphQL\\Language\\AST\\NodeList\0nodes\";a:0:{}}s:12:\"selectionSet\";N;}}}}}}}}}}}}', 1755048607);

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
-- Struktur dari tabel `jam_kerja`
--

CREATE TABLE `jam_kerja` (
  `id` int(11) NOT NULL,
  `users_profile_id` int(11) DEFAULT NULL,
  `no_wbs` varchar(50) DEFAULT NULL,
  `kode_proyek` varchar(50) DEFAULT NULL,
  `proyek_id` int(11) DEFAULT NULL,
  `aktivitas_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah_jam` decimal(5,2) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `mode_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jam_kerja`
--

INSERT INTO `jam_kerja` (`id`, `users_profile_id`, `no_wbs`, `kode_proyek`, `proyek_id`, `aktivitas_id`, `tanggal`, `jumlah_jam`, `keterangan`, `status_id`, `mode_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'WBS001', 'PR001', 1, 1, '2025-08-01', 8.00, NULL, 1, 1, NULL, NULL, NULL),
(2, 2, 'WBS002', 'PR002', 2, 2, '2025-08-02', 7.50, NULL, 4, 2, NULL, NULL, NULL),
(3, 3, 'WBS003', 'PR003', 3, 3, '2025-08-03', 6.00, NULL, 3, 3, NULL, NULL, NULL),
(4, 4, 'WBS004', 'PR004', 4, 4, '2025-08-04', 5.50, NULL, 1, 4, NULL, NULL, NULL),
(5, 5, 'WBS005', 'PR005', 5, 5, '2025-08-05', 8.00, NULL, 2, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_per_tanggal`
--

CREATE TABLE `jam_per_tanggal` (
  `id` int(11) NOT NULL,
  `users_profile_id` int(11) DEFAULT NULL,
  `proyek_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jam_per_tanggal`
--

INSERT INTO `jam_per_tanggal` (`id`, `users_profile_id`, `proyek_id`, `tanggal`, `jam`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2025-08-01', 8.00, NULL, NULL, NULL),
(2, 2, 2, '2025-08-02', 7.50, NULL, NULL, NULL),
(3, 3, 3, '2025-08-03', 6.00, NULL, NULL, NULL),
(4, 4, 4, '2025-08-04', 5.50, NULL, NULL, NULL),
(5, 5, 5, '2025-08-05', 8.00, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pesan`
--

CREATE TABLE `jenis_pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_pesan`
--

INSERT INTO `jenis_pesan` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pesan Internal', NULL, NULL, NULL),
(2, 'Pesan Eksternal', NULL, NULL, NULL),
(3, 'Notifikasi', NULL, NULL, NULL),
(4, 'Pengumuman', NULL, NULL, NULL),
(5, 'Broadcast', NULL, NULL, NULL);

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
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `id` int(11) NOT NULL,
  `bagian_id` int(11) DEFAULT NULL,
  `proyek_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keterangan`
--

INSERT INTO `keterangan` (`id`, `bagian_id`, `proyek_id`, `tanggal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2025-08-01', NULL, NULL, NULL),
(2, 2, 2, '2025-08-02', NULL, NULL, NULL),
(3, 3, 3, '2025-08-03', NULL, NULL, NULL),
(4, 4, 4, '2025-08-04', NULL, NULL, NULL),
(5, 5, 5, '2025-08-05', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembur`
--

CREATE TABLE `lembur` (
  `id` int(11) NOT NULL,
  `users_profile_id` int(11) DEFAULT NULL,
  `proyek_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lembur`
--

INSERT INTO `lembur` (`id`, `users_profile_id`, `proyek_id`, `tanggal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2025-08-01', NULL, NULL, NULL),
(2, 2, 2, '2025-08-02', NULL, NULL, NULL),
(3, 3, 3, '2025-08-03', NULL, NULL, NULL),
(4, 4, 4, '2025-08-04', NULL, NULL, NULL),
(5, 5, 5, '2025-08-05', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'Manager', NULL, NULL, NULL),
(3, 'Staff', NULL, NULL, NULL),
(4, 'Supervisor', NULL, NULL, NULL),
(5, 'Intern', NULL, NULL, NULL);

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
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mode_jam_kerja`
--

CREATE TABLE `mode_jam_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mode_jam_kerja`
--

INSERT INTO `mode_jam_kerja` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Onsite', NULL, NULL, NULL),
(2, 'Remote', NULL, NULL, NULL),
(3, 'Hybrid', NULL, NULL, NULL),
(4, 'Training', NULL, NULL, NULL),
(5, 'Meeting', NULL, NULL, NULL);

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
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `pengirim` varchar(100) DEFAULT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `tgl_pesan` datetime DEFAULT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `pengirim`, `penerima`, `isi`, `parent_id`, `tgl_pesan`, `jenis_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Budi', 'Siti', 'Halo, ada update proyek?', NULL, NULL, 1, NULL, NULL, NULL),
(2, 'Siti', 'Budi', 'Ya, sudah saya kirim.', NULL, NULL, 1, NULL, NULL, NULL),
(3, 'Andi', 'Rina', 'Besok meeting jam 9.', NULL, NULL, 3, NULL, NULL, NULL),
(4, 'Rina', 'Andi', 'Oke, siap.', NULL, NULL, 3, NULL, NULL, NULL),
(5, 'Agus', 'Budi', 'Laporan sudah selesai.', NULL, NULL, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nama_sekolah` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id`, `kode`, `nama`, `tanggal`, `nama_sekolah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PR001', 'Sistem Informasi Sekolah', '2025-01-10', 'SMKN 1', NULL, NULL, NULL),
(2, 'PR002', 'Aplikasi Keuangan', '2025-02-15', 'SMA 2', NULL, NULL, NULL),
(3, 'PR003', 'Website Marketing', '2025-03-05', 'SMKN 3', NULL, NULL, NULL),
(4, 'PR004', 'Sistem HRD', '2025-04-01', 'SMA 4', NULL, NULL, NULL),
(5, 'PR005', 'ERP Pabrik', '2025-05-12', 'SMKN 5', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek_user`
--

CREATE TABLE `proyek_user` (
  `id` int(11) NOT NULL,
  `proyek_id` int(11) DEFAULT NULL,
  `users_profile_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `proyek_user`
--

INSERT INTO `proyek_user` (`id`, `proyek_id`, `users_profile_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL),
(3, 3, 3, NULL, NULL, NULL),
(4, 4, 4, NULL, NULL, NULL),
(5, 5, 5, NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `statuses`
--

INSERT INTO `statuses` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aktif', NULL, NULL, NULL),
(2, 'Non-Aktif', NULL, NULL, NULL),
(3, 'Cuti', NULL, NULL, NULL),
(4, 'Resign', NULL, NULL, NULL),
(5, 'Pending', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_jam_kerja`
--

CREATE TABLE `status_jam_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_jam_kerja`
--

INSERT INTO `status_jam_kerja` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Approved', NULL, NULL, NULL),
(2, 'Pending', NULL, NULL, NULL),
(3, 'Rejected', NULL, NULL, NULL),
(4, 'Telat', NULL, NULL, NULL),
(5, 'In Review', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Budi Santoso', 'budi@example.com', NULL, 'pass1', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', 'siti@example.com', NULL, 'pass2', NULL, NULL, NULL, NULL),
(3, 'Andi Wijaya', 'andi@example.com', NULL, 'pass3', NULL, NULL, NULL, NULL),
(4, 'Rina Kusuma', 'rina@example.com', NULL, 'pass4', NULL, NULL, NULL, NULL),
(5, 'Agus Saputra', 'agus@example.com', NULL, 'pass5', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_profile`
--

CREATE TABLE `users_profile` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nrp` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `bagian_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users_profile`
--

INSERT INTO `users_profile` (`id`, `user_id`, `nama_lengkap`, `nrp`, `alamat`, `foto`, `bagian_id`, `level_id`, `status_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Budi Santoso', 'NRP001', 'Jl. Mawar 1', 'foto1.jpg', 1, 1, 1, NULL, NULL, NULL),
(2, 2, 'Siti Aminah', 'NRP002', 'Jl. Melati 2', 'foto2.jpg', 2, 2, 1, NULL, NULL, NULL),
(3, 3, 'Andi Wijaya', 'NRP003', 'Jl. Kenanga 3', 'foto3.jpg', 3, 3, 1, NULL, NULL, NULL),
(4, 4, 'Rina Kusuma', 'NRP004', 'Jl. Dahlia 4', 'foto4.jpg', 4, 4, 2, NULL, NULL, NULL),
(5, 5, 'Agus Saputra', 'NRP005', 'Jl. Anggrek 5', 'foto5.jpg', 5, 5, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aktivitas_bagian` (`bagian_id`);

--
-- Indeks untuk tabel `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jam_kerja`
--
ALTER TABLE `jam_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jk_users_profile` (`users_profile_id`),
  ADD KEY `fk_jk_proyek` (`proyek_id`),
  ADD KEY `fk_jk_aktivitas` (`aktivitas_id`),
  ADD KEY `fk_jk_status` (`status_id`),
  ADD KEY `fk_jk_mode` (`mode_id`);

--
-- Indeks untuk tabel `jam_per_tanggal`
--
ALTER TABLE `jam_per_tanggal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jpt_users_profile` (`users_profile_id`),
  ADD KEY `fk_jpt_proyek` (`proyek_id`);

--
-- Indeks untuk tabel `jenis_pesan`
--
ALTER TABLE `jenis_pesan`
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
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_keterangan_bagian` (`bagian_id`),
  ADD KEY `fk_keterangan_proyek` (`proyek_id`);

--
-- Indeks untuk tabel `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lembur_users_profile` (`users_profile_id`),
  ADD KEY `fk_lembur_proyek` (`proyek_id`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mode_jam_kerja`
--
ALTER TABLE `mode_jam_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pesan_jenis` (`jenis_id`),
  ADD KEY `fk_pesan_parent` (`parent_id`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proyek_user`
--
ALTER TABLE `proyek_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proyek_user_proyek` (`proyek_id`),
  ADD KEY `fk_proyek_user_users_profile` (`users_profile_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_jam_kerja`
--
ALTER TABLE `status_jam_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_up_user` (`user_id`),
  ADD KEY `fk_up_bagian` (`bagian_id`),
  ADD KEY `fk_up_level` (`level_id`),
  ADD KEY `fk_up_status` (`status_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jam_kerja`
--
ALTER TABLE `jam_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jam_per_tanggal`
--
ALTER TABLE `jam_per_tanggal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis_pesan`
--
ALTER TABLE `jenis_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lembur`
--
ALTER TABLE `lembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mode_jam_kerja`
--
ALTER TABLE `mode_jam_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `proyek_user`
--
ALTER TABLE `proyek_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `status_jam_kerja`
--
ALTER TABLE `status_jam_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD CONSTRAINT `fk_aktivitas_bagian` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`id`);

--
-- Ketidakleluasaan untuk tabel `jam_kerja`
--
ALTER TABLE `jam_kerja`
  ADD CONSTRAINT `fk_jk_aktivitas` FOREIGN KEY (`aktivitas_id`) REFERENCES `aktivitas` (`id`),
  ADD CONSTRAINT `fk_jk_mode` FOREIGN KEY (`mode_id`) REFERENCES `mode_jam_kerja` (`id`),
  ADD CONSTRAINT `fk_jk_proyek` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`id`),
  ADD CONSTRAINT `fk_jk_status` FOREIGN KEY (`status_id`) REFERENCES `status_jam_kerja` (`id`),
  ADD CONSTRAINT `fk_jk_users_profile` FOREIGN KEY (`users_profile_id`) REFERENCES `users_profile` (`id`);

--
-- Ketidakleluasaan untuk tabel `jam_per_tanggal`
--
ALTER TABLE `jam_per_tanggal`
  ADD CONSTRAINT `fk_jpt_proyek` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`id`),
  ADD CONSTRAINT `fk_jpt_users_profile` FOREIGN KEY (`users_profile_id`) REFERENCES `users_profile` (`id`);

--
-- Ketidakleluasaan untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD CONSTRAINT `fk_keterangan_bagian` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`id`),
  ADD CONSTRAINT `fk_keterangan_proyek` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`id`);

--
-- Ketidakleluasaan untuk tabel `lembur`
--
ALTER TABLE `lembur`
  ADD CONSTRAINT `fk_lembur_proyek` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`id`),
  ADD CONSTRAINT `fk_lembur_users_profile` FOREIGN KEY (`users_profile_id`) REFERENCES `users_profile` (`id`);

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `fk_pesan_jenis` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_pesan` (`id`),
  ADD CONSTRAINT `fk_pesan_parent` FOREIGN KEY (`parent_id`) REFERENCES `pesan` (`id`);

--
-- Ketidakleluasaan untuk tabel `proyek_user`
--
ALTER TABLE `proyek_user`
  ADD CONSTRAINT `fk_proyek_user_proyek` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`id`),
  ADD CONSTRAINT `fk_proyek_user_users_profile` FOREIGN KEY (`users_profile_id`) REFERENCES `users_profile` (`id`);

--
-- Ketidakleluasaan untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  ADD CONSTRAINT `fk_up_bagian` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`id`),
  ADD CONSTRAINT `fk_up_level` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `fk_up_status` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `fk_up_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
