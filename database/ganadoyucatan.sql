-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 05:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ganadoyucatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` enum('Guest','Operator') NOT NULL,
  `secret` varchar(255) NOT NULL DEFAULT '',
  `last_seen` datetime NOT NULL,
  `status` enum('Occupied','Waiting','Idle') NOT NULL DEFAULT 'Idle'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `full_name`, `role`, `secret`, `last_seen`, `status`) VALUES
(1, 'ganado@yucatan.com', '$2y$10$thE7hIJF/EJvKjmJy7hd5uH3a/BNgSUepkYoES0q80YEzi7VqWsRG', 'Ganado Yucatan', 'Operator', '$2y$10$FMymA2knaa1HTOqo581Y3eEuLIOtaDMUQbx/sN3JbeYz0LRV8jaBy', '2023-04-05 19:30:51', 'Idle'),
(16, 'alanalcolea@gmail.com', '', 'Alan', 'Guest', '$2y$10$9Vz4.DfVsUaNp4ywgwbFpeTjRfb3H.gocxQPAIRidq/U23hjFYBKO', '2023-03-29 18:03:48', 'Waiting'),
(17, 'dani.yam1097@gmail.com', '', 'DANI', 'Guest', '$2y$10$583KCRJrgdM0z5xMp9x3Te7RvfPtz3AxntBV07EuYVE3/aDVoBU5a', '2023-03-29 18:12:02', 'Occupied');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` bigint(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `portada` varchar(100) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `ruta` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `portada`, `datecreated`, `ruta`, `status`) VALUES
(1, 'Tizimín', 'Yucatán', 'img_2fb581d1fd24d35544b875a817cba1cc.jpg', '2021-08-20 03:04:04', 'tizimin', 1),
(2, 'Mérida', 'Yucatán', 'img_63049a2eeffb53e2d33061632f5f7f25.jpg', '2021-08-21 00:47:10', 'merida', 1),
(3, 'Abalá', 'Abalá, Yucatán', 'img_8727647f90d6d6b8c9a109cecc413eda.jpg', '2022-02-18 10:00:56', 'abala', 1),
(4, 'Acancéh', 'Acancéh, Yucatán', 'img_0fe0803d58d5189f190415c21d35b947.jpg', '2022-02-18 10:06:19', 'acanceh', 1),
(5, 'Akil', 'Akil, Yucatán', 'img_b5cc9f0a7572481dda347ae8cce1a5a8.jpg', '2022-02-18 11:11:05', 'akil', 1),
(6, 'Baca', 'Baca, Yucatán', 'img_d7d7d0930fb66cc98fb91a3fa079641b.jpg', '2022-02-18 11:11:21', 'baca', 1),
(7, 'Bocobá', 'Bocobá, Yucatán', 'img_65b4cc2465765ecd990a75f5a35d84cb.jpg', '2022-02-18 11:11:39', 'bocoba', 1),
(8, 'Buctzotz', 'Buztzotz', 'img_1c4d162c61f2fbed6873f50d6322a2ee.jpg', '2022-02-18 11:18:34', 'buctzotz', 1),
(9, 'Cacalchén', 'Cacalchén,, Yucatán', 'img_56ce6d7975767df8faafc9c7e7647834.jpg', '2022-02-18 11:18:56', 'cacalchen', 1),
(10, 'Calotmul', 'Calotmul, Yucatán', 'img_91afe728d35283ea0deed7b6e46a88a6.jpg', '2022-02-18 11:22:04', 'calotmul', 1),
(11, 'Cansahcab', 'Cansahcab, Yucatán', 'img_d0ed8ee2ec1f700363f6e9a537ef4834.jpg', '2022-02-18 11:25:13', 'cansahcab', 1),
(12, 'Cantamayec', 'Cantamayec, Yucatán', 'img_0349c92001506d75716cecb5f131891a.jpg', '2022-02-18 11:26:03', 'cantamayec', 1),
(13, 'Celestún', 'Celestún, Yucatán', 'img_b75752d3c862fdff2a349d7e93e52c95.jpg', '2022-02-18 11:26:23', 'celestun', 1),
(14, 'Cenotillo', 'Cenotillo, Yucatán', 'img_597d2f5c2074dc393cea2dc8d234a9ec.jpg', '2022-02-18 11:27:47', 'cenotillo', 1),
(15, 'Conkal', 'Conkal, Yucatán', 'img_883f3bdb7610e5476dd631e535a19bcf.jpg', '2022-02-18 11:28:10', 'conkal', 1),
(16, 'Cuncunul', 'Cuncunul, Yucatán', 'img_99b6fc657059dc840841e74950b1973f.jpg', '2022-02-18 11:28:26', 'cuncunul', 1),
(17, 'Cuzamá', 'Cuzamá, Yucatán', 'img_356bbfecec87076e9d5770977cbb8e94.jpg', '2022-02-21 11:47:09', 'cuzama', 1),
(18, 'Dzan', 'Dzan, Yucatán', 'img_d2200c1e8f420b08217ba4b0bbe6f652.jpg', '2022-02-21 11:48:03', 'dzan', 1),
(19, 'Dzemul', 'Dzemul, Yucatán', 'img_f14157f488bd8b936350b0b5c1784c79.jpg', '2022-02-21 11:49:03', 'dzemul', 1),
(20, 'Dzidzantún', 'Dzidzantún, Yucatán', 'img_9a073fd636e28e01d968fee843850a11.jpg', '2022-02-21 11:50:50', 'dzidzantun', 1),
(21, 'Dzilam de Bravo', 'Dzilam de Bravo, Yucatán', 'img_6a274a54569c26b16c3be251c118c97e.jpg', '2022-02-21 11:51:19', 'dzilam-de-bravo', 1),
(22, 'Dzilam González', 'Dzilam González, Yucatán', 'img_12bb9ab4910314dbabe1ec79fa5966f5.jpg', '2022-02-21 11:51:42', 'dzilam-gonzalez', 1),
(23, 'Dzitás', 'Dzitás, Yucatán', 'img_24bdb45aaf0316dfafd43558bd6b6b06.jpg', '2022-02-21 12:02:23', 'dzitas', 1),
(24, 'Dzoncauich', 'Dzoncauich', 'img_81801167ac99de90353d6970a5e89443.jpg', '2022-02-21 12:02:42', 'dzoncauich', 1),
(25, 'Espita', 'Espita, Yucatán', 'img_d59771bc87c3093bfb5738a36e8a06aa.jpg', '2022-02-21 12:03:12', 'espita', 1),
(26, 'Halachó', 'Halachó, Yucatán', 'img_cee387502a981705d601848b2ae65ec3.jpg', '2022-02-21 12:03:32', 'halacho', 1),
(27, 'Hocabá', 'Hocabá, Yucatán', 'img_c75bffb911e15d3f4bb8672999d6fcd0.jpg', '2022-02-21 12:03:46', 'hocaba', 1),
(28, 'Hoctún', 'Hoctún, Yucatán', 'img_57f357373529d4655762ea7a4748ec80.jpg', '2022-02-21 12:04:01', 'hoctun', 1),
(29, 'Homún', 'Homún, Yucatán', 'img_d565f26bcd22383db60a53bf030f6310.jpg', '2022-02-21 12:04:21', 'homun', 1),
(30, 'Huhí', 'Huhí, Yucatán', 'img_34ea1ce1f69a6c998546db3e57ed868e.jpg', '2022-02-21 12:04:35', 'huhi', 1),
(31, 'Hunucmá', 'Hunucmá', 'img_e03c9573670cd0f8c99f0703adeb8ec2.jpg', '2022-02-21 12:04:48', 'hunucma', 1),
(32, 'Ixil', 'Ixil, Yucatán', 'img_0ead39ed8541d0b3f680c91a39e01a22.jpg', '2022-02-21 12:05:06', 'ixil', 1),
(33, 'Izamal', 'Izamal, Yucatán', 'img_e52458b3323a64499ab1295776caa7e0.jpg', '2022-02-21 12:06:45', 'izamal', 1),
(34, 'Kanasín', 'Kanasín, Yucatán', 'img_c5538505c6b64d82457e209b162a0195.jpg', '2022-02-21 12:08:19', 'kanasin', 1),
(35, 'Kantunil', 'Kantunil, Yucatán', 'img_4706df03f830b8b1775efdf1c13fbfef.jpg', '2022-02-21 12:08:44', 'kantunil', 1),
(36, 'Kaua', 'Kaua, Yucatán', 'img_a45cfcf5c73bde177b079042065d51de.jpg', '2022-02-21 12:08:58', 'kaua', 1),
(37, 'Kinchil', 'Kinchil, Yucatán', 'img_3492dfa2c0c40059fedf190c3b48b152.jpg', '2022-02-21 12:09:12', 'kinchil', 1),
(38, 'Kopomá', 'Kopomá, Yucatán', 'img_366624df824f6d5663737ee5f2534209.jpg', '2022-02-21 12:09:27', 'kopoma', 1),
(39, 'Mama', 'Mama, Yucatán', 'img_8da8937f6fce6ce6f7b9be888cb9cf2e.jpg', '2022-02-21 12:09:40', 'mama', 1),
(40, 'Maní', 'Maní, Yucatán', 'img_48fd644a62444c29256b18e61d154870.jpg', '2022-02-21 12:09:53', 'mani', 1),
(41, 'Maxcanú', 'Maxcanú, Yucatán', 'img_57e892814958ed723d07aa41cecef6e2.jpg', '2022-02-21 12:10:19', 'maxcanu', 1),
(42, 'Mayapán', 'Mayapán, Yucatán', 'img_35239d5249948f95dfdd0dc3884f171e.jpg', '2022-02-21 12:10:35', 'mayapan', 1),
(43, 'Mocochá', 'Mocochá, Yucatán', 'img_932f7306bd6f91ea3f5bb23670841fba.jpg', '2022-02-21 12:30:15', 'mococha', 1),
(47, 'Motul', 'Motul, Yucatán', 'img_ab1fe06802fa2463c3dcc932fdc57b89.jpg', '2022-02-21 12:33:37', 'motul', 1),
(48, 'Muna', 'Muna, Yucatán', 'img_cb16451bab7462d01fd894a59e07b4b3.jpg', '2022-02-21 12:33:50', 'muna', 1),
(49, 'Muxupip', 'Muxupip, Yucatán', 'img_9b99404be205bb6561d5e2cc137363d1.jpg', '2022-02-21 12:34:10', 'muxupip', 1),
(50, 'Opichén', 'Opichén, Yucatán', 'img_fec2bd047c60b7edaaf7b33a79a9e3bc.jpg', '2022-02-21 12:40:08', 'opichen', 1),
(51, 'Oxkutzcab', 'Oxkutzcab, Yucatán', 'img_d43cc000c6265f59caa007b8c39ceb49.jpg', '2022-02-21 12:40:30', 'oxkutzcab', 1),
(52, 'Panabá', 'Panabá, Yucatán', 'img_1ae20dd6a616b22458e8db24fcd8906f.jpg', '2022-02-21 12:40:46', 'panaba', 1),
(53, 'Peto', 'Peto, Yucatán', 'img_f5faccd1a3f9329f6168411450e957b1.jpg', '2022-02-21 12:41:05', 'peto', 1),
(54, 'Progreso', 'Progreso, Yucatán', 'img_fe03d248b51deec8170700937cc0e0de.jpg', '2022-02-21 12:41:22', 'progreso', 1),
(55, 'Quintana Roo', 'Quintana Roo, Yucatán', 'img_a1197740debc17111e90fa2594021525.jpg', '2022-02-21 12:41:42', 'quintana-roo', 1),
(56, 'Río Lagartos', 'Río Lagartos, Yucatán', 'img_23fa0c0b999ec85cfa37aedba05f67ef.jpg', '2022-02-21 12:41:59', 'rio-lagartos', 1),
(57, 'Sacalum', 'Sacalum', 'img_71880db0c4358721ef71f88214247e9a.jpg', '2022-02-21 12:42:16', 'sacalum', 1),
(58, 'Samahil', 'Samahil, Yucatán', 'img_c3214dd5f444e7b1478fc4f91143eeb1.jpg', '2022-02-21 12:42:30', 'samahil', 1),
(59, 'San Felipe', 'San Felipe, Yucatán', 'img_57cb12d69a1d72238a62b3ae58da05f9.jpg', '2022-02-21 12:42:44', 'san-felipe', 1),
(60, 'Sanahcat', 'Sanahcat, Yucatán', 'img_19c0323c36f36c9d06e30fb4d0c1d20f.jpg', '2022-02-21 12:43:02', 'sanahcat', 1),
(61, 'Santa Elena', 'Santa Elena, Yucatán', 'img_a52f33072fc320b562e15bcbfe42399a.jpg', '2022-02-21 12:43:24', 'santa-elena', 1),
(62, 'Seyé', 'Seyé, Yucatán', 'img_229d18058c0c17efc19bda89c55940b3.jpg', '2022-02-21 12:43:45', 'seye', 1),
(63, 'Sinanché', 'Sinanché, Yucatán', 'img_1f7c30397fa5f308d15ddd1802418249.jpg', '2022-02-21 12:43:56', 'sinanche', 1),
(64, 'Sotuta', 'Sotuta, Yucatán', 'img_2b5ead8eef220e6e3900e582d4106e2a.jpg', '2022-02-21 12:44:20', 'sotuta', 1),
(65, 'Sucilá', 'Sucilá, Yucatán', 'img_a823fa385658b8df1c30ee17b401c49f.jpg', '2022-02-21 12:44:32', 'sucila', 1),
(66, 'Sudzal', 'Sudzal, Yucatán', 'img_3694ae7b99c6bd8ad7da6e4612fb19b1.jpg', '2022-02-21 12:44:46', 'sudzal', 1),
(67, 'Suma de Hidalgo', 'Suma de Hidalgo, Yucatán', 'img_0dbf44d2dbe811927003b0a75053ef0b.jpg', '2022-02-21 12:45:04', 'suma-de-hidalgo', 1),
(68, 'Tahdziú', 'Tahdziú, Yucatán', 'img_82fe2294b3c476206eb7d36ae72ca5c0.jpg', '2022-02-21 12:45:30', 'tahdziu', 1),
(69, 'Tahmek', 'Tahmke, Yucatán', 'img_aab8559ad531f9aa523a72344e6f73dc.jpg', '2022-02-21 12:45:44', 'tahmek', 1),
(70, 'Teabo', 'Teabo, Yucatán', 'img_f1449ff5f9e3cdbbd06d82cef5cbd77e.jpg', '2022-02-21 12:45:55', 'teabo', 1),
(71, 'Tecóh', 'Tecóh, Yucatán', 'img_1291d2d753c720373e42f710edea4ab7.jpg', '2022-02-21 12:46:08', 'tecoh', 1),
(72, 'Tekal de Venegas', 'Tekal de Venegas, Yucatán', 'img_54da11d23697b62850dc09199806902c.jpg', '2022-02-21 12:46:26', 'tekal-de-venegas', 1),
(73, 'Tekantó', 'Tekantó, Yucatán', 'img_1d3c49b3f7336f9b81e974862ecdf928.jpg', '2022-02-21 12:46:42', 'tekanto', 1),
(74, 'Tekax', 'Tekax, Yucatán', 'img_aa27b0de975a5316fc1430338c260ef4.jpg', '2022-02-21 12:46:57', 'tekax', 1),
(75, 'Tekit', 'Tekit, Yucatán', 'img_9bdad4da963ebe39558b71d0035689c2.jpg', '2022-02-21 12:47:11', 'tekit', 1),
(76, 'Tekom', 'Tekom, Yucatán', 'img_9a52ac9059b12f20477fea473b18dd06.jpg', '2022-02-21 12:47:23', 'tekom', 1),
(77, 'Telchac Pueblo', 'Telchac Puerto', 'img_60fe747dd216d379c7e67b2368ee8030.jpg', '2022-02-21 12:47:44', 'telchac-pueblo', 1),
(78, 'Telchac Puerto', 'Telchac Puerto, Yucatán', 'img_258700cc2e285a6b9d3694f308477b20.jpg', '2022-02-21 12:48:08', 'telchac-puerto', 1),
(79, 'Temax', 'Temax, Yucatán', 'img_06ea6671176a243a823f773a6f93e21f.jpg', '2022-02-21 12:48:31', 'temax', 1),
(80, 'Temozón', 'Temozón, Yucatán', 'img_7ed319d465b68009375f9eb68a2489f2.jpg', '2022-02-21 12:49:02', 'temozon', 1),
(81, 'Tepakán', 'Tepakán, Yucatán', 'img_b444f05272c6af9a2c6598213ced6890.jpg', '2022-02-21 12:49:21', 'tepakan', 1),
(82, 'Tetiz', 'Tetiz, Yucatán', 'img_8a97c040cce9b829fa665a8a69027989.jpg', '2022-02-21 12:49:36', 'tetiz', 1),
(83, 'Teya', 'Teya, Yucatán', 'img_94fd9eac7c3aba1cc55a96e6164bc095.jpg', '2022-02-21 12:50:00', 'teya', 1),
(84, 'Ticul', 'Ticul, Yucatán', 'img_d3004dcb68bf1421055e9723e0e9ca2d.jpg', '2022-02-21 12:50:36', 'ticul', 1),
(85, 'Timucuy', 'Timucuy, Yucatán', 'img_f6ac031d81d5dec4e1c0cc33122202ca.jpg', '2022-02-21 12:51:13', 'timucuy', 1),
(86, 'Timún', 'Timún, Yucatán', 'img_8b6c31625583780df3ddc2a13c80972e.jpg', '2022-03-01 12:21:40', 'timun', 1),
(87, 'Tixcacalcupul', 'Tixcacalcupul, Yucatán', 'img_a4db61c75d6665be0310d888aa426fc0.jpg', '2022-03-01 12:24:37', 'tixcacalcupul', 1),
(88, 'Tixkokob', 'Tixkokob, Yucatán', 'img_3ebe0f23f609e1f9051ec1be82b9a8b6.jpg', '2022-03-01 12:31:41', 'tixkokob', 1),
(89, 'Tixméhuac', 'Tixméhauc, Yucatán', 'img_e637b6e69a8c7b015863f93a107485f0.jpg', '2022-03-01 12:32:06', 'tixmehuac', 1),
(90, 'Tixpéhual', 'Tixpéhual, Yucatán', 'img_3d5a41d57b531b262f798627ba4bf61e.jpg', '2022-03-01 12:32:28', 'tixpehual', 1),
(91, 'Tunkás', 'Tunkás, Yucatán', 'img_3d5f1990e8fa3459d303769dd9e2f713.jpg', '2022-03-01 12:32:52', 'tunkas', 1),
(92, 'Tzucacab', 'Tzucacab, Yucatán', 'img_458c005488ee3609fca43ce0c4ace4e0.jpg', '2022-03-01 12:33:24', 'tzucacab', 1),
(93, 'Uayma', 'Uayma, Yucatán', 'img_d27d58332ded51c4e6fda2b32edf33d0.jpg', '2022-03-01 12:36:30', 'uayma', 1),
(94, 'Ucú', 'Ucú, Yucatán', 'img_be832211288a3e4ebcde0077cf57cf9d.jpg', '2022-03-01 12:38:16', 'ucu', 1),
(95, 'Umán', 'Umán, Yucatán', 'img_42f354c688ae55debe78682ef18890a7.jpg', '2022-03-01 12:40:06', 'uman', 1),
(96, 'Valladolid', 'Valladolid, Yucatán', 'img_89007a37be6e80e17fc75a8d9e15985a.jpg', '2022-03-01 12:40:21', 'valladolid', 1),
(97, 'Xocchel', 'Xocchel, Yucatán', 'img_db58f9f307c334a8877815e86996cb4c.jpg', '2022-03-01 12:43:34', 'xocchel', 1),
(98, 'Yaxcabá', 'Yaxcabá, Yucatán', 'img_3d525c4910fa93ea633bfa2ba42ad69b.jpg', '2022-03-01 12:47:07', 'yaxcaba', 1),
(99, 'Yaxkukul', 'Yaxkukul, Yucatán', 'img_00a00820b1444f14f36768227613b182.jpg', '2022-03-01 12:47:40', 'yaxkukul', 1),
(100, 'Yobaín', 'Yobaín, Yucatán', 'img_42a37e93a326a1ad6ae913bae78c7741.jpg', '2022-03-01 12:47:58', 'yobain', 1),
(101, 'Chacsinkín', 'Chacsinkín, Yucatán', 'portada_categoria.png', '2022-03-01 13:13:06', 'chacsinkin', 1),
(102, 'Chankom', 'Chamkom, Yucatán', 'portada_categoria.png', '2022-03-01 13:14:07', 'chankom', 1),
(103, 'Chapab', 'chapab, Yucatán', 'portada_categoria.png', '2022-03-01 13:51:35', 'chapab', 1),
(104, 'Campeche-Calkiní', 'Calkiní', '', '2022-03-30 08:30:51', '', 1),
(105, 'Campeche-Campeche', 'Campeche-San Francisco de Campeche', '', '2022-03-30 08:36:22', '', 1),
(106, 'Campeche-Carmen', 'Campeche-Ciudad del Carmen', '', '2022-03-30 08:36:22', '', 1),
(107, 'Campeche-Champotón', 'Campeche-Heroica Ciudad de Champotón', '', '2022-03-30 08:36:22', '', 1),
(108, 'Campeche-Hecelchakán', 'Campeche-Hecelchakán', '', '2022-03-30 08:36:22', '', 1),
(109, 'Campeche-Hopelchén', 'Campeche-Hopelchén', '', '2022-03-30 08:36:22', '', 1),
(110, 'Campeche-Palizada', 'Campeche-Palizada', '', '2022-03-30 08:36:22', '', 1),
(111, 'Campeche-Tenabo', 'Campeche-Tenabo', '', '2022-03-30 08:36:22', '', 1),
(112, 'Campeche-Escárcega', 'Campeche-Escárcega', '', '2022-03-30 08:36:22', '', 1),
(113, 'Campeche-Calakmul', 'Campeche-Calakmul', '', '2022-03-30 08:36:22', '', 1),
(114, 'Campeche-Candelaria', 'Campeche-Candelaria', '', '2022-03-30 08:45:37', '', 1),
(115, 'Campeche-Seybaplaya', 'Campeche-Seybaplaya', '', '2022-03-30 08:45:37', '', 1),
(116, 'Campeche-Dzitbalché', 'Campeche-Dzitbalché', '', '2022-03-30 08:45:37', '', 1),
(117, 'Q.R.-Bacalar', 'Q.R.-Bacalar', '', '2022-03-30 09:13:48', '', 1),
(118, 'Q.R.-Cancún', 'Q.R.-Cancún', '', '2022-03-30 09:13:48', '', 1),
(119, 'Q.R.-Cozumel', 'Q.R.-San Miguel de Cozumel', '', '2022-03-30 09:13:48', '', 1),
(120, 'Q.R.-Felipe Carrillo Puerto', 'Q.R.-Felipe Carrillo Puerto', '', '2022-03-30 09:13:48', '', 1),
(121, 'Q.R.-Isla Mujeres', 'Q.R.-Isla Mujeres', '', '2022-03-30 09:13:48', '', 1),
(122, 'Q.R.-José María Morelos', 'Q.R.-José María Morelos', '', '2022-03-30 09:13:48', '', 1),
(123, 'Q.R.-Lázaro Cárdenas', 'Q.R.-Lázaro Cárdenas', '', '2022-03-30 09:13:48', '', 1),
(124, 'Q.R.-Othón P. Blanco', 'Q.R.-Othón P. Blanco', '', '2022-03-30 09:13:48', '', 1),
(125, 'Q.R.-Puerto Morelos', 'Q.R.-Puerto Morelos', '', '2022-03-30 09:13:48', '', 1),
(126, 'Q.R.-Playa Del Carmen', 'Q.R.-Solidaridad', '', '2022-03-30 09:13:48', '', 1),
(127, 'Q.R.-Tulum', 'Q.R.-Tulum', '', '2022-03-30 09:13:48', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_login_details`
--

CREATE TABLE `chat_login_details` (
  `id` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_typing` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `chat_login_details`
--

INSERT INTO `chat_login_details` (`id`, `idpersona`, `last_activity`, `is_typing`) VALUES
(1, 1, '2022-03-02 18:57:39', 'no'),
(2, 1, '2022-03-02 19:03:20', 'no'),
(3, 2, '2022-03-02 19:18:41', 'yes'),
(4, 2, '2022-03-02 19:44:37', 'yes'),
(5, 1, '2022-03-02 19:46:48', 'no'),
(6, 1, '2022-03-02 19:55:30', 'no'),
(7, 1, '2022-03-02 20:39:09', 'no'),
(8, 1, '2022-03-02 21:46:39', 'no'),
(9, 1, '2022-03-02 22:36:12', 'no'),
(10, 1, '2022-03-02 23:04:25', 'no'),
(11, 1, '2022-03-02 23:08:19', 'no'),
(12, 1, '2022-03-04 15:32:13', 'yes'),
(13, 1, '2022-03-04 20:53:52', 'yes'),
(14, 1, '2022-03-15 16:09:05', 'no'),
(15, 1, '2022-03-15 17:54:42', 'no'),
(16, 1, '2022-03-15 17:55:43', 'no'),
(17, 1, '2022-03-15 17:58:37', 'no'),
(18, 1, '2022-03-15 17:59:38', 'no'),
(19, 1, '2022-03-15 18:04:41', 'no'),
(20, 1, '2022-03-15 18:08:25', 'no'),
(21, 1, '2022-03-15 18:08:33', 'no'),
(22, 1, '2022-03-15 18:48:08', 'no'),
(23, 1, '2022-03-15 19:09:19', 'no'),
(24, 1, '2022-03-19 06:23:29', 'yes'),
(25, 2, '2022-03-22 19:36:59', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

CREATE TABLE `chat_users` (
  `idpersona` int(11) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `current_session` int(11) NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `chat_users`
--

INSERT INTO `chat_users` (`idpersona`, `email_user`, `password`, `avatar`, `current_session`, `online`) VALUES
(1, 'Alan', '123456', 'user1.jpg', 2, 1),
(2, 'Dani', '12346', 'user2.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ciudades`
--

CREATE TABLE `ciudades` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ciudades`
--

INSERT INTO `ciudades` (`id`, `estado_id`, `nombre`) VALUES
(1, 1, 'Tizimin'),
(2, 1, 'Merida'),
(3, 1, 'Abala'),
(4, 1, 'Acanceh'),
(5, 1, 'Akil'),
(6, 1, 'Baca'),
(7, 1, 'Bocoba'),
(8, 1, 'Buctzotz'),
(9, 1, 'Cacalchen'),
(10, 1, 'Calotmul'),
(11, 1, 'Cansahcab'),
(12, 1, 'Cantamayec'),
(13, 1, 'Celestun'),
(14, 1, 'Cenotillo'),
(15, 1, 'Conkal'),
(16, 1, 'Cuncunul'),
(17, 1, 'Cuzama'),
(18, 1, 'Dzan'),
(19, 1, 'Dzemul'),
(20, 1, 'Dzidzantun'),
(21, 1, 'Dzilam de Bravo'),
(22, 1, 'Dzilam Gonzalez'),
(23, 1, 'Dzitas'),
(24, 1, 'Dzoncauich'),
(25, 1, 'Espita'),
(26, 1, 'Halacho'),
(27, 1, 'Hocaba'),
(28, 1, 'Hoctun'),
(29, 1, 'Homun'),
(30, 1, 'Huhi'),
(31, 1, 'Hunucma'),
(32, 1, 'Ixil'),
(33, 1, 'Izamal'),
(34, 1, 'Kanasin'),
(35, 1, 'Kantunil'),
(36, 1, 'Kaua'),
(37, 1, 'Kinchil'),
(38, 1, 'Kopoma'),
(39, 1, 'Mama'),
(40, 1, 'Mani'),
(41, 1, 'Maxcanu'),
(42, 1, 'Mayapan'),
(43, 1, 'Mococha'),
(47, 1, 'Motul'),
(48, 1, 'Muna'),
(49, 1, 'Muxupip'),
(50, 1, 'Opichen'),
(51, 1, 'Oxkutzcab'),
(52, 1, 'Panaba'),
(53, 1, 'Peto'),
(54, 1, 'Progreso'),
(55, 1, 'Quintana Roo'),
(56, 1, 'Rio Lagartos'),
(57, 1, 'Sacalum'),
(58, 1, 'Samahil'),
(59, 1, 'San Felipe'),
(60, 1, 'Sanahcat'),
(61, 1, 'Santa Elena'),
(62, 1, 'Seye'),
(63, 1, 'Sinanche'),
(64, 1, 'Sotuta'),
(65, 1, 'Sucila'),
(66, 1, 'Sudzal'),
(67, 1, 'Suma de Hidalgo'),
(68, 1, 'Tahdziu'),
(69, 1, 'Tahmek'),
(70, 1, 'Teabo'),
(71, 1, 'Tecoh'),
(72, 1, 'Tekal de Venegas'),
(73, 1, 'Tekanto'),
(74, 1, 'Tekax'),
(75, 1, 'Tekit'),
(76, 1, 'Tekom'),
(77, 1, 'Telchac Pueblo'),
(78, 1, 'Telchac Puerto'),
(79, 1, 'Temax'),
(80, 1, 'Temozon'),
(81, 1, 'Tepakan'),
(82, 1, 'Tetiz'),
(83, 1, 'Teya'),
(84, 1, 'Ticul'),
(85, 1, 'Timucuy'),
(86, 1, 'Tinum'),
(87, 1, 'Tixcacalcupul'),
(88, 1, 'Tixkokob'),
(89, 1, 'Tixmehuac'),
(90, 1, 'Tixpehual'),
(91, 1, 'Tunkas'),
(92, 1, 'Tzucacab'),
(93, 1, 'Uayma'),
(94, 1, 'Ucu'),
(95, 1, 'Uman'),
(96, 1, 'Valladolid'),
(97, 1, 'Xocchel'),
(98, 1, 'Yaxcaba'),
(99, 1, 'Yaxkukul'),
(100, 1, 'Yobain'),
(101, 1, 'Chacsinkin'),
(102, 1, 'Chankom'),
(103, 1, 'Chapab'),
(104, 2, 'Calkin'),
(105, 2, 'Campeche'),
(106, 2, 'Carmen'),
(107, 2, 'Champoton'),
(108, 2, 'Hecelchakan'),
(109, 2, 'Hopelchen'),
(110, 2, 'Palizada'),
(111, 2, 'Tenabo'),
(112, 2, 'Escarcega'),
(113, 2, 'Calakmul'),
(114, 2, 'Candelaria'),
(115, 2, 'Seybaplaya'),
(116, 2, 'Dzitbalche'),
(117, 3, 'Bacalar'),
(118, 3, 'Cancun'),
(119, 3, 'Cozumel'),
(120, 3, 'Felipe Carrillo'),
(121, 3, 'Isla Mujeres'),
(122, 3, 'Jose Maria Morelos'),
(123, 3, 'Lazaro Cardenas'),
(124, 3, 'Othon P. Blanco'),
(125, 3, 'Puerto Morelos'),
(126, 3, 'Playa Del Carmen'),
(127, 3, 'Tulum'),
(128, 4, 'Acacoyagua'),
(129, 4, 'Acala'),
(130, 4, 'Acapetahua'),
(131, 4, 'Aldama'),
(132, 4, 'Altamirano'),
(133, 4, 'Amatenango de la Frontera'),
(134, 4, 'Amatenango del Valle'),
(135, 4, 'Ángel Albino Corzo'),
(136, 4, 'Arriaga'),
(137, 4, 'Benemérito de las Américas'),
(138, 4, 'Berriozábal'),
(139, 4, 'Bochil'),
(140, 4, 'Cacahoatán'),
(141, 4, 'Capitán Luis Ángel Vidal'),
(142, 4, 'Catazajá'),
(143, 4, 'Chalchihuitán'),
(144, 4, 'Chamula'),
(145, 4, 'Chapultenango'),
(146, 4, 'Chenalhó'),
(147, 4, 'Chiapilla'),
(148, 4, 'Chicomuselo'),
(149, 4, 'Cintalapa'),
(150, 4, 'Comitán de Domínguez'),
(151, 4, 'Copainalá'),
(152, 4, 'Escuintla'),
(153, 4, 'Francisco León'),
(154, 4, 'Frontera Comalapa'),
(155, 4, 'Frontera Hidalgo'),
(156, 4, 'Huehuetán'),
(157, 4, 'Huixtán'),
(158, 4, 'Juárez'),
(159, 4, 'La Concordia'),
(160, 4, 'La Trinitaria'),
(161, 4, 'Larráinzar'),
(162, 4, 'Las Margaritas'),
(163, 4, 'Ocosingo'),
(164, 4, 'Ocotepec'),
(165, 4, 'Ocozocoautla'),
(166, 4, 'Ostuacán'),
(167, 4, 'Palenque'),
(168, 4, 'Pantelhó'),
(169, 4, 'Pantepec'),
(170, 4, 'Pichucalco'),
(171, 4, 'Pijijiapan'),
(172, 4, 'Pueblo Nuevo Solistahuacán'),
(173, 4, 'Rayón'),
(174, 4, 'Reforma'),
(175, 4, 'Rincón Chamula San Pedro'),
(176, 4, 'Salto de Agua'),
(177, 4, 'San Cristóbal de Las Casas'),
(178, 4, 'San Juan Cancuc'),
(179, 4, 'San Lucas'),
(180, 4, 'Siltepec'),
(181, 4, 'Simojovel'),
(182, 4, 'Sitalá'),
(183, 4, 'Solosuchiapa'),
(184, 4, 'Suchiate'),
(185, 4, 'Sunuapa'),
(186, 4, 'Tapachula'),
(187, 4, 'Tecpatán'),
(188, 4, 'Teopisca'),
(189, 4, 'Tonalá'),
(190, 4, 'Tumbalá'),
(191, 4, 'Tuxtla Chico'),
(192, 4, 'Tuxtla Gutiérrez'),
(193, 4, 'Unión Juárez'),
(194, 4, 'Venustiano Carranza'),
(195, 4, 'Villa Comaltitlán'),
(196, 4, 'Villa Corzo'),
(197, 4, 'Villaflores'),
(198, 4, 'Zinacantán'),
(199, 4, 'Yajalón'),
(200, 5, 'Balancán'),
(201, 5, 'Cárdenas '),
(202, 5, 'Centla '),
(203, 5, 'Jonuta'),
(204, 5, 'Macuspana'),
(205, 5, 'Nacajuca'),
(206, 5, 'Paraíso'),
(207, 5, 'Tacotalpa'),
(208, 5, 'Teapa'),
(209, 5, 'Tenosique');

-- --------------------------------------------------------

--
-- Table structure for table `comisarias`
--

CREATE TABLE `comisarias` (
  `id` int(11) NOT NULL,
  `ciudad_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comisarias`
--

INSERT INTO `comisarias` (`id`, `ciudad_id`, `nombre`) VALUES
(1, 1, 'Tizimín'),
(2, 1, 'Colonia Yucatán'),
(3, 1, 'Chan Cenote'),
(4, 1, 'Dzonot Carretero'),
(5, 1, 'Popolnah'),
(6, 1, 'Socopo'),
(7, 1, 'Tixcacanal'),
(8, 1, 'Adolfo López Mateo'),
(9, 1, 'San Enrique'),
(10, 1, 'Felipe Carrilo Puerto No.1'),
(11, 1, 'Felipe Carrilo Puerto No.2'),
(12, 1, 'Cenote Azul'),
(13, 1, 'Luis Echeverría Álvarez'),
(14, 1, 'San Pedro Juárez'),
(15, 1, 'X-Bohom'),
(16, 1, 'X-Kalatmul'),
(17, 1, 'X-Panhatoro'),
(18, 1, 'X-Kalax Dzibalkú'),
(19, 1, 'San Andrés'),
(20, 1, 'San Manuel Km.11'),
(21, 1, 'Santa Rosa Concepción'),
(22, 1, 'Chan Tres Reyes'),
(23, 1, 'Nuevo León'),
(24, 1, 'Dzonot Box'),
(25, 1, 'X-Panbihá'),
(26, 1, 'San Luis Tzuctuk'),
(27, 1, 'La Sierra'),
(28, 1, 'Benito Juaréz'),
(29, 1, 'El Cuyo'),
(30, 1, 'Santa María'),
(31, 1, 'Santa Rosa y Anexas'),
(32, 1, 'Manuel Cepeda Peraza'),
(33, 1, 'Moctezuma'),
(34, 1, 'Kikil'),
(35, 1, 'Santa Ana'),
(36, 1, 'Santa Elena'),
(37, 1, 'Lázaro Cárdenas'),
(38, 1, 'San Juan'),
(39, 1, 'Teapa'),
(40, 1, 'Yaxchekú'),
(41, 1, 'Kabichen'),
(42, 1, 'San Hipólito'),
(43, 1, 'X-Lal'),
(44, 1, 'Trascorral'),
(45, 1, 'San Lorenzo'),
(46, 1, 'San Lorenzo Chiquilá'),
(47, 1, 'Tekal Nuevo'),
(48, 1, 'Santa Clara'),
(49, 1, 'X-Makulan'),
(50, 1, 'San José Montecristo'),
(51, 1, 'Chen Keken'),
(52, 1, 'Dzonot Tigre'),
(53, 1, 'San Isidro Yokdzonot'),
(54, 1, 'Xkalax'),
(55, 1, 'Yokdzonot (San Miguel)'),
(56, 1, 'Tres Marías'),
(57, 1, 'San Arturo'),
(58, 1, 'Dzonot Aké'),
(59, 1, 'El Edén'),
(60, 1, 'Bondzonot'),
(61, 1, 'Luis Rosado Vega'),
(62, 1, 'San José'),
(63, 1, 'San Francisco Yohactún'),
(64, 1, 'Kabichen'),
(65, 1, 'Dzonot Mezo'),
(66, 1, 'Samaría'),
(67, 1, 'Francisco Villa'),
(68, 1, 'San Pedro Bacab'),
(69, 1, 'El Alamo'),
(70, 1, 'Yohactun de Hidalgo'),
(71, 1, 'La Laguna'),
(72, 1, 'Ramonal'),
(73, 1, 'Maderas Blancas'),
(74, 1, 'Tres Bocas'),
(75, 1, 'Nuevo Mundo'),
(76, 1, 'Nuevo Tezoco'),
(77, 1, 'Emiliano Zapata'),
(78, 1, 'Libertad'),
(79, 1, 'Yokdzadz'),
(80, 1, 'Buenaventura'),
(81, 1, 'Santa Cruz'),
(82, 1, 'San Isidro Cancabdzonot'),
(83, 1, 'Santa Julia'),
(84, 1, 'Limonar'),
(85, 1, 'X-Boh'),
(86, 1, 'Buena Esperanza'),
(87, 1, 'Dzadz Mahas'),
(88, 1, 'Chandzubul'),
(89, 2, 'Mérida'),
(90, 2, 'Caucel'),
(91, 2, 'Cosgaya'),
(92, 2, 'Chablekal'),
(93, 2, 'Cholul'),
(94, 2, 'chuburná de hidalgo'),
(95, 2, 'Dzitya'),
(96, 2, 'Dzununcán'),
(97, 2, 'Komchén'),
(98, 2, 'Molas'),
(99, 2, 'San José Tzal'),
(100, 2, 'Sierra papacal'),
(101, 2, 'Sitpach'),
(102, 2, 'san pedro'),
(103, 2, 'chimay'),
(104, 2, 'Texan Cámara'),
(105, 2, 'Xmatkuil'),
(106, 2, 'Santa Cruz Palomeque'),
(107, 2, 'Yaxnic'),
(108, 2, 'Oncan'),
(109, 2, 'Chalmuch'),
(110, 2, 'Susulá'),
(111, 2, 'Cheuman'),
(112, 2, 'San antonio dzikal'),
(113, 2, 'Xcanatun'),
(114, 2, 'Temozon Norte'),
(115, 2, 'Kutz'),
(116, 2, 'Suytunchen'),
(117, 2, 'Kikteil'),
(118, 2, 'Dzidzilche'),
(119, 2, 'San Diego Texan'),
(120, 2, 'Xcunya'),
(121, 2, 'Sac-nicté'),
(122, 3, 'Abalá'),
(123, 3, 'Cacao'),
(124, 3, 'Uayalceh'),
(125, 3, 'Mucuyché'),
(126, 3, 'Peba'),
(127, 3, 'Sihunchén'),
(128, 3, 'Temozón'),
(129, 4, 'Acancéh'),
(130, 4, 'petectunich'),
(131, 4, 'Canicab'),
(132, 4, 'Tepich Carrillo'),
(133, 4, 'Sacchich'),
(134, 4, 'Ticopó'),
(135, 5, 'Akil'),
(136, 5, 'San Diego'),
(137, 5, 'San Martino'),
(138, 5, 'Plan Chác'),
(139, 5, 'Rancho Kitinché'),
(140, 6, 'Baca'),
(141, 6, 'San Isidro Kuxúb'),
(142, 6, 'Tixcuncheil'),
(143, 6, 'San Francisco Kuuché'),
(144, 6, 'Unidad de riego Boxactún'),
(145, 6, 'Rancho Kiiche'),
(146, 6, 'Hacienda Kuxúb'),
(147, 6, 'San Carlos'),
(148, 6, 'San José Novelo'),
(149, 6, 'Santa Cruz Collí'),
(150, 6, 'Santa Maria'),
(151, 6, 'Santo Domingo'),
(152, 7, 'Bocobá'),
(153, 7, 'Mucuyché'),
(154, 7, 'San Antonio Choil'),
(155, 7, 'San Antonio II'),
(156, 8, 'Buctzotz'),
(157, 8, 'X-bec'),
(158, 8, 'Unidad Juarez'),
(159, 8, 'Chuntzalam'),
(160, 8, 'San Francisco'),
(161, 8, 'La gran lucha'),
(162, 8, 'Grano de oro'),
(163, 8, 'Muldzonot'),
(164, 8, 'Santo Domingo'),
(165, 8, 'Dzonot Sábila'),
(166, 9, 'Calcanché'),
(167, 9, 'San Antonio'),
(168, 9, 'Puhá'),
(169, 9, 'Catzín'),
(170, 9, 'Sahcabá'),
(171, 10, 'Calotmul'),
(172, 10, 'Pocobóch'),
(173, 10, 'Táhcabo'),
(174, 10, 'Yokdzonot'),
(175, 11, 'Cansahcab'),
(176, 11, 'Kancabchén'),
(177, 11, 'San Antonio Xiat'),
(178, 11, 'Santa María'),
(179, 11, 'Uchanchá'),
(180, 11, 'Ekbalám'),
(181, 12, 'Cantemayec'),
(182, 12, 'Nenelá'),
(183, 12, 'Cholul'),
(184, 12, 'Chichican'),
(185, 12, 'Dolores'),
(186, 12, 'Talek'),
(187, 12, 'Jesús Man'),
(188, 12, 'Tixcacal Pérez'),
(189, 12, 'San Martín Dzidzilché'),
(190, 12, 'Actún-May'),
(191, 12, 'Múch'),
(192, 12, 'Chacxúl'),
(193, 12, 'Nicté'),
(194, 12, 'Chimay'),
(195, 12, 'Chalanté'),
(196, 12, 'Yuyumal'),
(197, 12, 'Sodzil'),
(198, 12, 'Kojobchaá'),
(199, 12, 'San José Xikó'),
(200, 12, 'Santa Candelaria'),
(201, 12, 'Trinidad'),
(202, 12, 'San Carlos'),
(203, 12, 'Kukulbapop'),
(204, 12, 'Revolución'),
(205, 12, 'Yodzonot'),
(206, 12, 'Chac-Motul'),
(207, 12, 'San Isidro'),
(208, 12, 'San Juan'),
(209, 12, 'San Pedro Bacab'),
(210, 12, 'Chác'),
(211, 12, 'Dzán'),
(212, 12, 'Kambul'),
(213, 13, 'Celestún'),
(214, 13, 'Calan'),
(215, 13, 'Chamúl'),
(216, 13, 'Chín'),
(217, 13, 'Hoyuelos'),
(218, 13, 'Man'),
(219, 13, 'Stal'),
(220, 13, 'Tzate'),
(221, 14, 'Cenotillo'),
(222, 14, 'Tixbacab'),
(223, 14, 'Yodzonot Núm.2'),
(224, 14, 'San Felipe'),
(225, 14, 'San Nicolás'),
(226, 14, 'Mococa'),
(227, 14, 'Pacel'),
(228, 14, 'Muctal'),
(229, 14, 'Palmero'),
(230, 14, 'Cunyá'),
(231, 14, 'San Ruto'),
(232, 14, 'Kaxec'),
(233, 14, 'Kakalhá'),
(234, 14, 'Petil'),
(235, 14, 'Ocal'),
(236, 14, 'Karin'),
(237, 14, 'Sinohal'),
(238, 14, 'San Clara'),
(239, 14, 'Cantún'),
(240, 14, 'Yohman'),
(241, 14, 'Chunyucú'),
(242, 14, 'San Pedro'),
(243, 14, 'Ebtún'),
(244, 14, 'San Antonio'),
(245, 14, 'Santa Cruz'),
(246, 14, 'Tzumbalam'),
(247, 15, 'Conkal'),
(248, 15, 'X-cuyúm'),
(249, 15, 'Kantoyná'),
(250, 15, 'Santa María Rosas'),
(251, 15, 'San Antonio'),
(252, 15, 'San Román'),
(253, 15, 'Los Reyes'),
(254, 16, 'Cuncunul'),
(255, 16, 'Xakabchén'),
(256, 16, 'Chebalám'),
(257, 16, 'San Francisco'),
(258, 16, 'San Diego'),
(259, 16, 'San José'),
(260, 17, 'Cuzamá'),
(261, 17, 'Eknakán'),
(262, 17, 'Nohchakán'),
(263, 17, 'Yaxcucul'),
(264, 101, 'Chacsinkín'),
(265, 101, 'Sisbic'),
(266, 101, 'Mul'),
(267, 101, 'Subacché'),
(268, 101, 'X-Box'),
(269, 101, 'X-Cohil'),
(270, 101, 'Chimay'),
(271, 102, 'Chankom'),
(272, 102, 'Xcalakzonot'),
(273, 102, 'Xkopeteil'),
(274, 102, 'Xkanatún'),
(275, 102, 'Xtohil'),
(276, 102, 'Ticimul'),
(277, 102, 'Nictehá'),
(278, 102, 'X-Cocail'),
(279, 102, 'San Juan'),
(280, 102, 'Muchucuxca'),
(281, 102, 'Xanla'),
(282, 102, 'Xbohon'),
(283, 102, 'Tzukmuc'),
(284, 102, 'San Isidro'),
(285, 102, 'Yacbchem'),
(286, 102, 'Tomku'),
(287, 102, 'X-Pamba'),
(288, 102, 'Santa María Koochilá'),
(289, 102, 'Maykab'),
(290, 102, 'Santa Rosa'),
(291, 102, 'Xhuaymil'),
(292, 102, 'Yochotún'),
(293, 102, 'Chuntabil'),
(294, 102, 'Xtamech'),
(295, 102, 'Sacpasil'),
(296, 103, 'Hunabchén'),
(297, 103, 'Citincabchén'),
(345, 19, 'Dzemul'),
(346, 19, 'San Matías'),
(347, 19, 'Cheneld'),
(348, 19, 'San Pablo'),
(349, 19, 'San Diego'),
(350, 19, 'San Eduardo'),
(351, 19, 'Bocolá'),
(352, 20, 'Dzidzantún'),
(353, 20, 'Osorio'),
(354, 21, 'Dzilam de Bravo'),
(355, 21, 'Santo Tomás'),
(356, 21, 'Constancia'),
(357, 21, 'Santa Clara'),
(358, 21, 'San José'),
(359, 21, 'El Cerrito'),
(360, 21, 'Yalcubul'),
(361, 21, 'San Alfredo'),
(362, 22, 'Dzilam González'),
(363, 22, 'Espoquin Chico'),
(364, 22, 'X-tabán'),
(365, 22, 'Noh-Yaxché'),
(366, 23, 'Diztás'),
(367, 23, 'San Román'),
(368, 23, 'Eugenio Zapata'),
(369, 23, 'Hacienda Escalante'),
(370, 23, 'Xocempich'),
(371, 24, 'Dzoncauich'),
(372, 24, 'Yaxché'),
(373, 24, 'Dzitcacao'),
(374, 24, 'Santa Rosa'),
(375, 24, 'Chacmay'),
(376, 25, 'Espita'),
(377, 25, 'Mario'),
(378, 25, 'San Pedro'),
(379, 25, 'San Matías'),
(380, 25, 'Nacuché'),
(381, 25, 'Paraje Santa Rosa'),
(382, 25, 'Xmahalam'),
(383, 25, 'Pom'),
(384, 25, 'Chensucilá'),
(385, 25, 'San Andrés'),
(386, 25, 'Santa Cruz'),
(387, 25, 'San Vicente'),
(388, 25, 'Xuilub'),
(389, 25, 'Chuc-ac'),
(390, 25, 'Kunché'),
(391, 25, 'Dzonot Balario'),
(392, 25, 'Xhomá'),
(393, 25, 'Pixdón'),
(394, 26, 'Halachó'),
(395, 26, 'X-Huatez'),
(396, 26, 'Tuzik'),
(397, 26, 'Holcá'),
(398, 26, 'Cepeda'),
(399, 26, 'Chucholoch'),
(400, 26, 'Kancabchén'),
(401, 26, 'San Mateo'),
(402, 26, 'Santa María Acú'),
(403, 26, 'Sihó'),
(404, 26, 'Dzidzibachi'),
(405, 26, 'Tanchí'),
(406, 26, 'Hala'),
(407, 27, 'Hocabá'),
(408, 27, 'Xocchel'),
(409, 27, 'Santa Julia'),
(410, 27, 'San José'),
(411, 27, 'Sahcabá'),
(412, 27, 'Jesús'),
(413, 27, 'San Antonio'),
(414, 27, 'Salaactún'),
(415, 28, 'Hoctún'),
(416, 28, 'San Juan Evia'),
(417, 28, 'Temozón'),
(418, 28, 'Buenavista'),
(419, 28, 'Dziuché'),
(420, 28, 'San José Oriente'),
(421, 28, 'San Pedro Cholul'),
(422, 28, 'San Isidro Ochil'),
(423, 28, 'Cholul'),
(424, 28, 'Petenchi Pich'),
(425, 29, 'Homún'),
(426, 29, 'San Miguel'),
(427, 29, 'San Nicolás'),
(428, 29, 'San José Poniente'),
(429, 29, 'Kanún'),
(430, 29, 'Kanpepén'),
(431, 29, 'Polabán'),
(432, 29, 'San Antonio'),
(433, 29, 'Chichi Lagos'),
(434, 29, 'Yalahán'),
(435, 29, 'San Isidro Ochil'),
(436, 29, 'Cho-chich'),
(437, 29, 'Chan Santo'),
(438, 29, 'Sintunil'),
(439, 29, 'Culul'),
(440, 29, 'Kanka-Chen'),
(441, 30, 'Huhí'),
(442, 30, 'Kan Kadzonot'),
(443, 30, 'San Cruz'),
(444, 30, 'Sipchac'),
(445, 30, 'Tixcacal Quintero'),
(446, 30, 'San Miguel'),
(447, 30, 'Guadalupe'),
(448, 31, 'Hunucmá'),
(449, 31, 'Usil'),
(450, 31, 'Yaxché'),
(451, 31, 'Choyoc'),
(452, 31, 'Texán de Palomeque'),
(453, 31, 'Hunkanab'),
(454, 31, 'San Antonio Chél'),
(455, 31, 'Sisal'),
(456, 31, 'Rancho Chico'),
(457, 31, 'Rancho San Joaquín'),
(458, 31, 'Rancho Chen Toro'),
(459, 31, 'Hacienda Santa Cruz'),
(460, 31, 'Hacienda Hulila'),
(461, 32, 'Ixil'),
(462, 32, 'Hacienda Capel'),
(463, 32, 'Hacienda San Miguel'),
(464, 32, 'Rancho San Rafael'),
(465, 32, 'Joaquín'),
(466, 32, 'Saclum'),
(467, 33, 'Izamal'),
(468, 33, 'San José de Ceballos'),
(469, 33, 'Concepción'),
(470, 33, 'X-Luch'),
(471, 33, 'Citilcum'),
(472, 33, 'Kimbilá'),
(473, 33, 'Sitilpech'),
(474, 33, 'Xanabá'),
(475, 33, 'San Luis'),
(476, 33, 'Kauán'),
(477, 33, 'Tebic'),
(478, 33, 'Sacnicté'),
(479, 33, 'Balantún'),
(480, 33, 'Becal'),
(481, 33, 'Chixé'),
(482, 33, 'Sacalá'),
(483, 33, 'Cuahtémoc'),
(484, 33, 'San Pedro Catzín'),
(485, 33, 'Ebulá'),
(486, 33, 'Chichihuá'),
(487, 33, 'Sahaltún'),
(488, 33, 'San Pedro'),
(489, 33, 'Santa María'),
(490, 33, 'Tziló'),
(491, 33, 'San Luis'),
(492, 33, 'San José Tzucacab'),
(493, 33, 'Yokdzonot'),
(494, 33, 'Kanan'),
(495, 33, 'Chan-Kin'),
(496, 33, 'Chichi-Uh'),
(497, 33, 'Choyoh'),
(498, 33, 'Chumul'),
(499, 33, 'Kantoyehen'),
(500, 33, 'Mulsay'),
(501, 33, 'Sac-Nicté'),
(502, 34, 'Kanansin'),
(503, 34, 'Tulinche'),
(504, 34, 'XTohil'),
(505, 34, 'Tecoh'),
(506, 34, 'Mulchechén'),
(507, 34, 'San Antonio Tehuitz'),
(508, 35, 'Kantunil'),
(509, 35, 'San Pedro Nóhpat'),
(510, 35, 'San Antonio Xiol'),
(511, 35, 'Hacienda Habal'),
(512, 35, 'Holcá'),
(513, 35, 'San Diego'),
(514, 35, 'San Dimas'),
(515, 35, 'Santa María'),
(516, 35, 'Guadalupe'),
(517, 36, 'Kaua'),
(518, 36, 'San Pedro'),
(519, 36, 'San Adrián'),
(520, 36, 'Salahtún'),
(521, 36, 'Chan Dzonot'),
(522, 36, 'Dzibiac'),
(523, 36, 'Xuxcab'),
(524, 36, 'San Román'),
(525, 36, 'Tzcal'),
(526, 36, 'Xkoben'),
(527, 36, 'Knoh'),
(528, 36, 'Kankab'),
(529, 37, 'Kinchil'),
(530, 37, 'Haimil'),
(531, 37, 'X\'lapxul'),
(532, 38, 'Kopomá'),
(533, 38, 'San Nicolás'),
(534, 38, 'Bella Flor'),
(535, 38, 'Tamchén'),
(536, 39, 'Mama'),
(537, 39, 'San Bernardo'),
(538, 39, 'Santa Clara'),
(539, 39, 'Concepción'),
(540, 39, 'Chaltubalam'),
(541, 39, 'Limonar'),
(542, 39, 'Moam'),
(543, 39, 'Pisté'),
(544, 39, 'Saca'),
(545, 39, 'Sacalum'),
(546, 39, 'Sacalumchen'),
(547, 39, 'San Agustín'),
(548, 39, 'San Andrés'),
(549, 39, 'Tikinmul'),
(550, 39, 'Took'),
(551, 39, 'San Juan'),
(552, 40, 'Maní'),
(553, 40, 'San Mateo Dos'),
(554, 40, 'Santa Catalina'),
(555, 40, 'San Francisco'),
(556, 40, 'Tipical'),
(557, 40, 'San Román'),
(558, 40, 'Póh Chuu'),
(559, 40, 'San Pedro'),
(560, 40, 'San Simón'),
(561, 40, 'San José'),
(562, 40, 'Santa Rosa'),
(563, 40, 'Santa Úrsula'),
(564, 40, 'Mópila'),
(565, 40, 'Miramar'),
(566, 40, 'Santa Teresa'),
(567, 40, 'Santa Amalia'),
(568, 40, 'Santa Antonio'),
(569, 40, 'San Rafael'),
(570, 41, 'Maxcanú'),
(571, 41, 'San Chakán'),
(572, 41, 'Santa Cruz'),
(573, 41, 'Santa Ana'),
(574, 41, 'Chunchucmil'),
(575, 41, 'Kanachén'),
(576, 41, 'Cochol'),
(577, 41, 'Paraíso'),
(578, 41, 'Santa Rosa'),
(579, 41, 'Santo Domingo'),
(580, 41, 'Simón'),
(581, 41, 'Xlam Riti'),
(582, 41, 'Crucero Cpop'),
(583, 41, 'Ché'),
(584, 41, 'Canzote'),
(585, 41, 'Mamu'),
(586, 41, 'Xamail'),
(587, 41, 'San Rafael'),
(588, 41, 'San Fernando'),
(589, 41, 'Granada'),
(590, 41, 'Chactún'),
(591, 42, 'Mayapán'),
(592, 42, 'Sombrilla'),
(593, 42, 'Chan Chocholá'),
(594, 42, 'Coahuilá'),
(595, 42, 'Ibachil'),
(596, 42, 'Chacchibilá'),
(597, 42, 'Cumax'),
(598, 42, 'Cuzamá'),
(599, 42, 'San Antonio'),
(600, 42, 'San Antonio Techó'),
(601, 42, 'San Ignacio'),
(602, 42, 'San Juan'),
(603, 42, 'San Juan Uc'),
(604, 42, 'San Pedro'),
(605, 42, 'San Simón'),
(606, 42, 'Santa Isabel'),
(607, 42, 'Santa María González'),
(608, 43, 'Mocochá'),
(609, 43, 'Sinchechén'),
(610, 43, 'Xcotzá'),
(611, 43, 'Yaxbacaltún'),
(612, 43, 'Carolina'),
(613, 43, 'Tekat'),
(614, 43, 'Toóh'),
(615, 43, 'Kumán'),
(616, 43, 'San Ignacio'),
(617, 43, 'Santa Isabel'),
(618, 43, 'Xluch'),
(619, 47, 'Motul'),
(620, 47, 'Xbená'),
(621, 47, 'Kinchén'),
(622, 47, 'El Porvenir'),
(623, 47, 'Kaxatáh'),
(624, 47, 'Kiní'),
(625, 47, 'Mesatunich'),
(626, 47, 'Sacapuc'),
(627, 47, 'Timul'),
(628, 47, 'Ucí Muna'),
(629, 47, 'San José Tipceh'),
(630, 47, 'Cenotillo'),
(631, 47, 'Dzununkán'),
(632, 47, 'Kambul'),
(633, 47, 'Kancahal'),
(634, 47, 'Kancabchén'),
(635, 47, 'Komchén Martínez'),
(636, 47, 'Kopté'),
(637, 47, 'Panabá'),
(638, 47, 'Rogelio Chalé'),
(639, 47, 'Sabacnah'),
(640, 47, 'Sakolá'),
(641, 47, 'San Antonio Dzinah'),
(642, 47, 'San Pedro Cámara'),
(643, 47, 'San Pedro Chacabal'),
(644, 47, 'San Rafael'),
(645, 47, 'San Antonio'),
(646, 47, 'San Roque'),
(647, 47, 'Santa Cruz Pachón'),
(648, 47, 'Santa Teresa'),
(649, 47, 'Tunyá'),
(650, 47, 'Telal'),
(651, 47, 'Texán Espejo'),
(652, 47, 'Ticopo Gutiérrez'),
(653, 47, 'Uitzil'),
(654, 48, 'Muna'),
(655, 48, 'Acabah'),
(656, 48, 'Hacienda Marco'),
(657, 48, 'Rancho Kankachá'),
(658, 49, 'Muxupip'),
(659, 49, 'San José Tipceh'),
(660, 49, 'Choyób'),
(661, 49, 'Yaxhá'),
(662, 49, 'San Juan Koop'),
(663, 49, 'San José Cholul'),
(664, 49, 'Catzín'),
(665, 50, 'Opichén'),
(666, 50, 'Sac-Citán'),
(667, 50, 'Hacienda Ixim'),
(668, 50, 'San José Grande'),
(669, 50, 'Calcehtók'),
(670, 50, 'Cok'),
(671, 50, 'Kaukiriche'),
(672, 50, 'Santa Rita'),
(673, 50, 'Mena'),
(674, 50, 'San Esteban'),
(675, 50, 'Santa Rosa'),
(676, 51, 'Oxkutzcab'),
(677, 51, 'San Antonio Siuch'),
(678, 51, 'Ojina'),
(679, 51, 'Rancho Xikim'),
(680, 51, 'Emiliano Zapata'),
(681, 51, 'Xohuayán'),
(682, 51, 'Yaxhachén'),
(683, 51, 'Xúl'),
(684, 51, 'Techoh'),
(685, 52, 'Panabá'),
(686, 52, 'San Anselmo'),
(687, 52, 'Kemic'),
(688, 52, 'Xobenhaltún'),
(689, 52, 'Lolché'),
(690, 52, 'Yalsihom'),
(691, 52, 'Buena Fé'),
(692, 52, 'Santa Rosa Ayala'),
(693, 52, 'Bistal'),
(694, 52, 'San Francisco'),
(695, 52, 'San Benito'),
(696, 52, 'Mooc'),
(697, 52, 'Xmactún'),
(698, 52, 'Monte Cristo'),
(699, 52, 'San José'),
(700, 52, 'Hermanos Gutiérrez'),
(701, 52, 'Santa Rita'),
(702, 52, 'San Juan del Río'),
(703, 53, 'Peto'),
(704, 53, 'Santa Rosa'),
(705, 53, 'Xoy'),
(706, 53, 'Tixhualtún'),
(707, 53, 'Progresito'),
(708, 53, 'Papacal'),
(709, 53, 'Xcabanché'),
(710, 53, 'San Diego'),
(711, 53, 'San Bernabé'),
(712, 53, 'Dzonotchel'),
(713, 53, 'San Mateo'),
(714, 53, 'Petulillo'),
(715, 53, 'Santa Elena'),
(716, 53, 'San Francisco de Asís'),
(717, 53, 'Kambul'),
(718, 53, 'San Dionisio'),
(719, 53, 'Esperanza'),
(720, 53, 'Abal'),
(721, 53, 'X-pechil'),
(722, 53, 'Yaxcopil'),
(723, 53, 'Temozón'),
(724, 53, 'Santa Úrsula'),
(725, 53, 'Yaxché'),
(726, 53, 'Uitzináb'),
(727, 53, 'Tobxilá'),
(728, 53, 'Justicia Social'),
(729, 53, 'Mac-May'),
(730, 53, 'Jaltún Tzubil'),
(731, 53, 'Xkán Teil'),
(732, 53, 'Sisbic'),
(733, 53, 'Pocol'),
(734, 53, 'Jobom Pich'),
(735, 54, 'Progreso'),
(736, 54, 'Chicxulub'),
(737, 54, 'Chelem'),
(738, 54, 'Chuburná'),
(739, 54, 'San Ignacio'),
(740, 55, 'Quintana Roo'),
(741, 55, 'San Juan'),
(742, 55, 'Santa María'),
(743, 55, 'San Antonio'),
(744, 55, 'Santa Inés'),
(745, 55, 'Maxcapixcil'),
(746, 55, 'Carrillo'),
(747, 55, 'Dzulotok'),
(748, 56, 'Río Lagartos'),
(749, 56, 'El Edén'),
(750, 56, 'Paraíso'),
(751, 56, 'San Pablo'),
(752, 56, 'Santa Cruz'),
(753, 56, 'Santa Pilar Trejo'),
(754, 56, 'Zabich'),
(755, 56, 'Santa Rosa'),
(756, 56, 'Tacxahan'),
(757, 56, 'Serrano'),
(758, 57, 'Sacalum'),
(759, 57, 'San Antonio Sodzil'),
(760, 57, 'Yunkú'),
(761, 57, 'Plan Chac'),
(762, 57, 'Chacá'),
(763, 57, 'Yohkat'),
(764, 57, 'San Esteban'),
(765, 57, 'San Antonio Mulix'),
(766, 57, 'San Raúl'),
(767, 57, 'Tepakán'),
(768, 58, 'Samahil'),
(769, 58, 'San Antonio Tedzidz'),
(770, 58, 'Xkapul'),
(771, 58, 'Kuchel'),
(772, 58, 'Dzit'),
(773, 58, 'Katua'),
(774, 58, 'Poot'),
(775, 58, 'Sanahcat'),
(776, 58, 'Tixcacal Leal'),
(777, 59, 'San Felipe'),
(778, 59, 'San Juan'),
(779, 59, 'San Nicolás'),
(780, 59, 'Ebum'),
(781, 59, 'Santa Pilar'),
(782, 59, 'San Ramón'),
(783, 59, 'Xpanhá'),
(784, 59, 'Siracapa'),
(785, 59, 'Xmotoc'),
(786, 59, 'Buena Esperanza'),
(787, 59, 'Santiago'),
(788, 59, 'Santa Librada'),
(789, 59, 'Yokdzonot'),
(790, 59, 'El Ejido Viejo'),
(791, 59, 'San Diego'),
(792, 59, 'Santa Rosa'),
(793, 59, 'Nuevo Loche'),
(794, 59, 'Xquiniéntos'),
(795, 61, 'Santa Elena'),
(796, 61, 'Sacx-axal'),
(797, 61, 'Chetolily'),
(798, 61, 'Uitz'),
(799, 61, 'Chac'),
(800, 61, 'Santa Ana'),
(801, 61, 'Yaxché'),
(802, 61, 'Kabh'),
(803, 61, 'Chimay'),
(804, 61, 'Sabac-há'),
(805, 61, 'San Simón'),
(806, 62, 'Seyé'),
(807, 62, 'Holactún'),
(808, 62, 'Mucchan'),
(809, 62, 'Panabá'),
(810, 62, 'San Bernardino'),
(811, 62, 'San Pedro'),
(812, 62, 'Xukú'),
(813, 62, 'Nohcham'),
(814, 62, 'Santa María'),
(815, 62, 'San Salvador'),
(816, 62, 'Xteché'),
(817, 62, 'Xcehus'),
(818, 62, 'Macal'),
(819, 62, 'Santo Domingo'),
(820, 63, 'Sinanché'),
(821, 63, 'San Crisanto'),
(822, 63, 'Chun Copó'),
(823, 63, 'San Luis'),
(824, 63, 'Santa Cruz'),
(825, 63, 'Santa Úrsula'),
(826, 63, 'Zayate'),
(827, 63, 'Santa Catalina'),
(828, 63, 'Zibagón'),
(829, 64, 'Sotuta'),
(830, 64, 'Tabí'),
(831, 64, 'Tiboló'),
(832, 64, 'Zavala'),
(833, 64, 'Timul'),
(834, 64, 'San Pedro'),
(835, 64, 'San Martín Dzidzilché'),
(836, 64, 'Pepén'),
(837, 64, 'Tzoyoc'),
(838, 64, 'San Isidro'),
(839, 64, 'Chilo'),
(840, 65, 'Sucilá'),
(841, 65, 'Santa Rosa'),
(842, 65, 'San Román'),
(843, 65, 'Yonches'),
(844, 65, 'San Antonio'),
(845, 65, 'San Pedro II'),
(846, 65, 'Santa Teresa'),
(847, 65, 'Xmihuan'),
(848, 65, 'San Miguelito'),
(849, 65, 'Xmabalam'),
(850, 65, 'Tierra Blanca'),
(851, 66, 'Sudzal'),
(852, 66, 'Chalanté'),
(853, 66, 'Dcum'),
(854, 66, 'San Miguel'),
(855, 66, 'Finca Kolax'),
(856, 66, 'Kua Chen'),
(857, 66, 'Tohtol'),
(858, 66, 'Maben'),
(859, 66, 'San José'),
(860, 66, 'Kancachén de Valencia'),
(861, 66, 'Majas'),
(862, 66, 'San Isidro'),
(863, 66, 'Chumbec'),
(864, 66, 'Tzalam'),
(865, 67, 'Suma de Hidalgo'),
(866, 67, 'San Nicolás'),
(867, 67, 'Dzonat'),
(868, 67, 'Kiniché'),
(869, 68, 'Tahdziú'),
(870, 68, 'Timul'),
(871, 68, 'Mocte'),
(872, 68, 'San Isidro Uno'),
(873, 68, 'Santa Margarita'),
(874, 69, 'Tahmek'),
(875, 69, 'Muna'),
(876, 69, 'X-tabay'),
(877, 70, 'Teabo'),
(878, 70, 'San Higinio'),
(879, 70, 'Kulche'),
(880, 71, 'Tecóh'),
(881, 71, 'Oxtapacab'),
(882, 71, 'Itzincab'),
(883, 71, 'Sotuta de Peón'),
(884, 71, 'Lepán'),
(885, 71, 'X-kanchakán'),
(886, 71, 'Santa Rita'),
(887, 71, 'Mahzucil'),
(888, 71, 'Pixyá'),
(889, 71, 'Sabacché'),
(890, 71, 'Chinquilá'),
(891, 72, 'Tekal de Venegas'),
(892, 72, 'Tixcancal'),
(893, 72, 'Santa Cruz'),
(894, 72, 'Skin'),
(895, 72, 'El Ancla'),
(896, 72, 'Chahchac'),
(897, 72, 'Xpichi'),
(898, 72, 'Oxuzua'),
(899, 72, 'Thohobkú'),
(900, 72, 'Kuncheilá'),
(901, 73, 'Tekantó'),
(902, 73, 'X-lanté'),
(903, 73, 'Tixkonchoh'),
(904, 73, 'San Diego'),
(905, 73, 'San Francisco Dzón'),
(906, 73, 'San Latah'),
(907, 74, 'Tekax'),
(908, 74, 'Bacanchén'),
(909, 74, 'Kancab'),
(910, 74, 'Kinil'),
(911, 74, 'Pencuyut'),
(912, 74, 'Ticum'),
(913, 74, 'Xaya'),
(914, 74, 'Chacmultún'),
(915, 74, 'Flor de Pozo'),
(916, 74, 'Manuel Cepeda Peraza'),
(917, 74, 'Jesús'),
(918, 74, 'Candelaria Nohalal'),
(919, 74, 'Nueva Santa Cruz'),
(920, 74, 'Nuevo Mundo'),
(921, 74, 'Canek'),
(922, 74, 'San Alonzo'),
(923, 74, 'San Antonio Knuc'),
(924, 74, 'San Diego Buenavista'),
(925, 74, 'San Diego Tekaax'),
(926, 74, 'San Diego I'),
(927, 74, 'San Diego II'),
(928, 74, 'San Esteban'),
(929, 74, 'San Felipe I'),
(930, 74, 'San Felipe II'),
(931, 74, 'San Francisco'),
(932, 74, 'San Gaspar'),
(933, 74, 'San Isidro'),
(934, 74, 'Mac-Yan'),
(935, 74, 'San José'),
(936, 74, 'San Juan'),
(937, 74, 'San Norberto'),
(938, 74, 'San Cruz'),
(939, 74, 'Santa Rosa'),
(940, 74, 'Tixcuytún'),
(941, 74, 'Tzakeljaltun'),
(942, 74, 'Xkiridz'),
(943, 74, 'Xpakan'),
(944, 74, 'Kiu Xtoquil'),
(945, 74, 'Kantemó'),
(946, 74, 'Alfonso Caso'),
(947, 74, 'Huntochác'),
(948, 74, 'Benito Juárez'),
(949, 75, 'Tekit'),
(950, 75, 'Yaxic'),
(951, 75, 'Chacsiniché'),
(952, 75, 'Dolores Aké'),
(953, 75, 'Jesús'),
(954, 75, 'Kankirisché'),
(955, 75, 'Kinchahua'),
(956, 75, 'San Antonio Ixmequel'),
(957, 75, 'San Isidro'),
(958, 75, 'Chacsuy'),
(959, 75, 'San José'),
(960, 75, 'San Juan de la Mata'),
(961, 75, 'San Nicolás I'),
(962, 75, 'San Nicolás II'),
(963, 75, 'San Rafael'),
(964, 75, 'Wkuim'),
(965, 75, 'Santa Cruz'),
(966, 75, 'Ualchén'),
(967, 75, 'Tomchún'),
(968, 75, 'Tixcacal'),
(969, 75, 'Xconlum'),
(970, 75, 'Xixil'),
(971, 75, 'Xtoquitón'),
(972, 76, 'Tekom'),
(973, 76, 'Muchucuxcáh'),
(974, 76, 'Chibilúb'),
(975, 76, 'Pocbichén'),
(976, 76, 'Xuxcáb'),
(977, 76, 'X-kabchén'),
(978, 76, 'Dzidzilché'),
(979, 77, 'Telchac Pueblo'),
(980, 77, 'Paraje Dzonot'),
(981, 77, 'Santa Cruz'),
(982, 77, 'Santa Rosa'),
(983, 77, 'Boxactún'),
(984, 78, 'Telchac Puerto'),
(985, 78, 'Boxactún'),
(986, 78, 'San Juan'),
(987, 78, 'Santa Elena'),
(988, 78, 'Santa Bárbara'),
(989, 79, 'Temax'),
(990, 79, 'Chicmichén'),
(991, 79, 'Torres Peón'),
(992, 79, 'San Antonio Cámara'),
(993, 79, 'Yaxché'),
(994, 79, 'Hacienda Limbo'),
(995, 79, 'San Felipe'),
(996, 79, 'San Ramón'),
(997, 79, 'Xipich'),
(998, 79, 'San Luis Maní'),
(999, 79, 'Chunicapó'),
(1000, 80, 'Temozón'),
(1001, 80, 'Nahbalám'),
(1002, 80, 'Hunukú'),
(1003, 80, 'Yuch'),
(1004, 80, 'Actuncóh'),
(1005, 80, 'Santa Rita'),
(1006, 80, 'Yokdzonot'),
(1007, 80, 'Chac Joch'),
(1008, 80, 'Chac-Xibitún'),
(1009, 80, 'Chacteil'),
(1010, 80, 'Chan-Progreso'),
(1011, 80, 'Chichén'),
(1012, 80, 'Chich-Luch'),
(1013, 80, 'Chich'),
(1014, 80, 'Cozil'),
(1015, 80, 'Dzalbay'),
(1016, 80, 'Dzibino'),
(1017, 80, 'Dzidilche'),
(1018, 80, 'Florida'),
(1019, 80, 'Hobicú'),
(1020, 80, 'Kamponuché'),
(1021, 80, 'Kancabchan'),
(1022, 80, 'X-Kanchechén'),
(1023, 80, 'Kantó'),
(1024, 80, 'Kaycahum'),
(1025, 80, 'Kiquinchá'),
(1026, 80, 'Kopa'),
(1027, 80, 'Kuxhilá'),
(1028, 80, 'Palomitas'),
(1029, 80, 'Sac Baho'),
(1030, 80, 'Sac-Luc'),
(1031, 80, 'Sacabchen'),
(1032, 80, 'Sac-Cabtunich'),
(1033, 80, 'San-Cen'),
(1034, 80, 'San Andrés'),
(1035, 80, 'San Bartolo'),
(1036, 80, 'San Diego'),
(1037, 80, 'San Fernando'),
(1038, 80, 'San Francisco'),
(1039, 80, 'San Francisco II'),
(1040, 80, 'San Isidro Xcat'),
(1041, 80, 'San José'),
(1042, 80, 'San José Gil'),
(1043, 80, 'San Lorenzo'),
(1044, 80, 'San Manuel'),
(1045, 80, 'San Miguel Uxmal'),
(1046, 80, 'San Pedro Pool'),
(1047, 80, 'San Román'),
(1048, 80, 'San Vicente'),
(1049, 80, 'Santa Elena'),
(1050, 80, 'Santa Fermina'),
(1051, 80, 'Santa María'),
(1052, 80, 'Santa Matilde'),
(1053, 80, 'Santa Rosa'),
(1054, 80, 'Santa Rosaura'),
(1055, 80, 'Santo Domingo'),
(1056, 80, 'Susulá'),
(1057, 80, 'Tekom'),
(1058, 80, 'Tzalam'),
(1059, 80, 'X`cacalchén'),
(1060, 80, 'X`Canacruz'),
(1061, 80, 'X`Canaljaltun'),
(1062, 80, 'Xcatil'),
(1063, 80, 'X`Chamac'),
(1064, 80, 'X`Chaquil'),
(1065, 80, 'X`Chen'),
(1066, 80, 'X`Copoil'),
(1067, 80, 'X`Diobil'),
(1068, 80, 'X`eb'),
(1069, 80, 'Xembudo'),
(1070, 80, 'X`Homa'),
(1071, 80, 'X`Incinchac'),
(1072, 80, 'X`Kail'),
(1073, 80, 'X`Kotol'),
(1074, 80, 'X`Kubuc'),
(1075, 80, 'X`Kumil'),
(1076, 80, 'X`Kuncheil'),
(1077, 80, 'X`Laak aak'),
(1078, 80, 'X`Lunch'),
(1079, 80, 'X`Mactun'),
(1080, 80, 'X-nabatan'),
(1081, 80, 'Xnen-us'),
(1082, 80, 'X`pich'),
(1083, 80, 'Xpoop'),
(1084, 80, 'X`tun'),
(1085, 80, 'X`tut'),
(1086, 80, 'X`cuch'),
(1087, 80, 'Yakancab'),
(1088, 80, 'Yaxdezil'),
(1089, 80, 'Akanchen-Bonoh'),
(1090, 80, 'Cana Cruz'),
(1091, 81, 'Tepakán'),
(1092, 81, 'Kantirix'),
(1093, 81, 'Hacienda Los Reyes'),
(1094, 81, 'Rosario'),
(1095, 81, 'Pochuná'),
(1096, 81, 'Kantunich'),
(1097, 81, 'Jabada'),
(1098, 81, 'Tecate'),
(1099, 81, 'Xemú'),
(1100, 82, 'Tetiz'),
(1101, 82, 'San Antonio'),
(1102, 82, 'Homote'),
(1103, 82, 'Muxupilo'),
(1104, 82, 'Toxix'),
(1105, 82, 'Yulca'),
(1106, 82, 'Kooté'),
(1107, 82, 'San Antonio Viudas'),
(1108, 82, 'San Francisco'),
(1109, 82, 'Nohuayum'),
(1110, 83, 'Teya'),
(1111, 83, 'El Paraje Carlos'),
(1112, 83, 'Hacienda Santa Clara'),
(1113, 83, 'Hacienda Sánchez'),
(1114, 83, 'Hacienda Moni'),
(1115, 84, 'Ticul'),
(1116, 84, 'Pustunich'),
(1117, 84, 'Yotholin'),
(1118, 84, 'Rancho San Enrique'),
(1119, 84, 'Rancho San Cristobal Luna'),
(1120, 84, 'Rancho San Antonio'),
(1121, 84, 'Rancho Santa Marta'),
(1122, 84, 'Xocnacéh'),
(1123, 84, 'Bolantupil'),
(1124, 84, 'Santa Catalina'),
(1125, 84, 'Rancho San Joaquín'),
(1126, 85, 'Timucuy'),
(1127, 85, 'Tekit de Regil'),
(1128, 85, 'Ixtlé'),
(1129, 85, 'Subincacab'),
(1130, 86, 'Timún'),
(1131, 86, 'Pisté'),
(1132, 86, 'Tohopkú'),
(1133, 86, 'San Francisco'),
(1134, 86, 'X-Calakoop'),
(1135, 86, 'San Felipe'),
(1136, 86, 'San Felipe Nuevo'),
(1137, 86, 'Balantún'),
(1138, 86, 'Chichén Itzá'),
(1139, 86, 'San José'),
(1140, 86, 'Santa María'),
(1141, 86, 'San Nicolás'),
(1142, 86, 'Macuchén'),
(1143, 86, 'Chichil'),
(1144, 86, 'Dzulotok'),
(1145, 87, 'Tixcacalcupul'),
(1146, 87, 'Ekpedz'),
(1147, 87, 'San José'),
(1148, 87, 'Poop'),
(1149, 87, 'Mahas'),
(1150, 88, 'Tixkokob'),
(1151, 88, 'Ekmul'),
(1152, 88, 'Euan'),
(1153, 88, 'Nolo'),
(1154, 88, 'Ruinas de Aké'),
(1155, 88, 'Chacil'),
(1156, 88, 'Kankabchen'),
(1157, 88, 'Santa Cruz'),
(1158, 88, 'Katanchel Hubilá'),
(1159, 89, 'Tixméhuac'),
(1160, 89, 'Sisbic'),
(1161, 89, 'Kimbilá'),
(1162, 89, 'Dzutóh'),
(1163, 89, 'Chuchub'),
(1164, 89, 'Ebtún'),
(1165, 89, 'Chican'),
(1166, 89, 'Sabacché'),
(1167, 89, 'Xeo-pil'),
(1168, 90, 'Tixpéhual'),
(1169, 90, 'Chochóh'),
(1170, 90, 'Techóc'),
(1171, 90, 'Kiilinché'),
(1172, 90, 'Cucá'),
(1173, 90, 'Sahé'),
(1174, 91, 'Tunkás'),
(1175, 91, 'San José Pibtuch'),
(1176, 91, 'San Antonio Chuc'),
(1177, 91, 'Chan Kancabchen'),
(1178, 91, 'Xcauil'),
(1179, 91, 'Franz'),
(1180, 91, 'Kancabal'),
(1181, 91, 'San Dimas'),
(1182, 91, 'Yohuas'),
(1183, 91, 'Canasultun'),
(1184, 91, 'Onichén'),
(1185, 91, 'San Román'),
(1186, 91, 'Yaxhá'),
(1187, 91, 'Ebulá'),
(1188, 91, 'Tabichén'),
(1189, 92, 'Tzucacab'),
(1190, 92, 'Xkamlol'),
(1191, 92, 'San Antonio'),
(1192, 92, 'Kaxatuk'),
(1193, 92, 'Kalalmá'),
(1194, 92, 'Ermita'),
(1195, 92, 'Yaxché'),
(1196, 92, 'Catmis'),
(1197, 92, 'Corral'),
(1198, 92, 'El Escondindo'),
(1199, 92, 'X-Cobilacal'),
(1200, 92, 'Noh-Bec'),
(1201, 92, 'Blanca Flor'),
(1202, 92, 'Tigre Grande'),
(1203, 92, 'Sacbecan'),
(1204, 92, 'Dzi'),
(1205, 92, 'Ayim'),
(1206, 92, 'Polvacxil'),
(1207, 93, 'Uayma'),
(1208, 93, 'Santa María Aznar'),
(1209, 93, 'Xkatbé'),
(1210, 93, 'San Lorenzo'),
(1211, 94, 'Ucú'),
(1212, 94, 'Yaxché de Peón'),
(1213, 94, 'Hacienda Gobonyá'),
(1214, 94, 'Hacienda Siach'),
(1215, 94, 'Hacienda Sey'),
(1216, 95, 'Umán'),
(1217, 95, 'Bolón'),
(1218, 95, 'Itzincab'),
(1219, 95, 'Xtepen'),
(1220, 95, 'Poxilá'),
(1221, 95, 'Oxholón'),
(1222, 95, 'Oxcum'),
(1223, 95, 'Dzibikak'),
(1224, 95, 'Teceb'),
(1225, 95, 'Dzununcán'),
(1226, 95, 'Yaxcopoil'),
(1227, 95, 'San Antonio Mulix'),
(1228, 96, 'Valladolid'),
(1229, 96, 'Dzitnúp'),
(1230, 96, 'Pixóy'),
(1231, 96, 'Popolá'),
(1232, 96, 'Tikúch'),
(1233, 96, 'Tixhualactún'),
(1234, 96, 'Xocém'),
(1235, 96, 'Yalcobá'),
(1236, 96, 'Táhmuy'),
(1237, 96, 'Tesoco'),
(1238, 96, 'Yalcón'),
(1239, 96, 'Ebtún'),
(1240, 96, 'Noh-Soytún'),
(1241, 96, 'Chan-chan'),
(1242, 96, 'Kanxoc'),
(1243, 96, 'Kaman'),
(1244, 96, 'Cimil'),
(1245, 96, 'Santa María'),
(1246, 96, 'Santa Cruz'),
(1247, 96, 'Chúc'),
(1248, 96, 'San Miguel'),
(1249, 96, 'Bolmay Homdzonot'),
(1250, 96, 'Usuytun'),
(1251, 96, 'San Francisco'),
(1252, 96, 'San Silvetiro'),
(1253, 96, 'Yaxché Lu'),
(1254, 97, 'Xocchel'),
(1255, 97, 'Yaxquil'),
(1256, 97, 'Much'),
(1257, 97, 'X-lelbé'),
(1258, 97, 'Santa Cruz'),
(1259, 97, 'El Paraíso'),
(1260, 98, 'Yaxcabá'),
(1261, 98, 'Kankabzonot'),
(1262, 98, 'Libre Unión'),
(1263, 98, 'Tahdzibichén'),
(1264, 98, 'Tiholop'),
(1265, 98, 'Tixcacaltuyub'),
(1266, 98, 'Yokdzonot'),
(1267, 98, 'Santa María'),
(1268, 98, 'Yoxunah'),
(1269, 98, 'Canakon'),
(1270, 98, 'Xlapák'),
(1271, 98, 'Popola'),
(1272, 98, 'Chimay'),
(1273, 98, 'Xinchil'),
(1274, 98, 'Tinucáh'),
(1275, 98, 'Cenote'),
(1276, 98, 'Abán'),
(1277, 98, 'San Marcos'),
(1278, 98, 'Xiat'),
(1279, 98, 'Miguel Hidalgo'),
(1280, 98, 'Hunchin'),
(1281, 98, 'Balam'),
(1282, 98, 'Sipché'),
(1283, 98, 'San José'),
(1284, 98, 'Quitana Roo'),
(1285, 98, 'Nicteil'),
(1286, 98, 'Cholul'),
(1287, 98, 'San Pedro'),
(1288, 98, 'Sahcabá'),
(1289, 98, 'X-ochil'),
(1290, 98, 'Rancho Santa Rita'),
(1291, 98, 'Rancho Cola Blanca'),
(1292, 98, 'Rancho Xibitia'),
(1293, 98, 'Rancho San Francisco'),
(1294, 98, 'Rancho Santa Rosa'),
(1295, 98, 'Rancho Chich'),
(1296, 98, 'Rancho San Manuel'),
(1297, 98, 'Rancho San Isidro'),
(1298, 98, 'Rancho San Tomás'),
(1299, 98, 'Acapulco'),
(1300, 98, 'San José I'),
(1301, 98, 'Xuul'),
(1302, 98, 'Sacnité'),
(1303, 98, 'Xochil'),
(1304, 98, 'Teelhú'),
(1305, 98, 'X-tosil'),
(1306, 98, 'Santo Domingo'),
(1307, 98, 'Santa Amelia'),
(1308, 98, 'Tzupich'),
(1309, 98, 'Xolobitancia'),
(1310, 98, 'Xanlá'),
(1311, 98, 'Oxulá'),
(1312, 98, 'Santa María'),
(1313, 98, 'San Arturo'),
(1314, 98, 'San Pedro'),
(1315, 98, 'Santa Eugenia'),
(1316, 98, 'Rancho Paraíso'),
(1317, 98, 'San Juan de los Itzá'),
(1318, 98, 'Tzutzuyub'),
(1319, 98, 'Chunchucmil'),
(1320, 98, 'Chanciteen'),
(1321, 99, 'Yaxkukul'),
(1322, 99, 'San Juan de las Flores'),
(1323, 99, 'Hacienda Chac-Abal'),
(1324, 99, 'San Francisco'),
(1325, 99, 'Santa Cruz Canto'),
(1326, 99, 'Yaxcopoil'),
(1327, 100, 'Yobaín'),
(1328, 100, 'Chabihau'),
(1329, 100, 'Hacienda Tzémul'),
(1330, 100, 'Hacienda Kayac'),
(1331, 100, 'Hacienda Chántul'),
(1332, 100, 'Hacienda Santa Ana'),
(1333, 100, 'Hacienda Santa Úrsula'),
(1338, 107, 'Seybaplaya'),
(1339, 107, 'Felipe Carrillo Puerto'),
(1340, 107, 'Hool'),
(1341, 107, 'Sihochac'),
(1342, 102, 'Escárcega'),
(1343, 102, 'División del Norte'),
(1344, 102, 'La Libertad'),
(1345, 102, 'Matamoro'),
(1346, 114, 'Candelaria'),
(1347, 114, 'Benito Juárez 1'),
(1348, 114, 'El Naranjo'),
(1349, 114, 'Miguel Hidalgo y Costilla'),
(1350, 117, 'Bacalar'),
(1351, 117, 'Limones'),
(1352, 117, 'Maya Balam'),
(1353, 117, 'Pedro Antonio Santos'),
(1354, 120, 'Felipe Carrillo Puerto'),
(1355, 120, 'Tihosuco'),
(1356, 120, 'Chunhuhub'),
(1357, 120, 'Señor'),
(1358, 120, 'Tepich'),
(1359, 120, 'Noh-Bec'),
(1360, 120, 'X-Hazil Sur'),
(1361, 120, 'X-Pichil'),
(1362, 120, 'Polyuc'),
(1363, 120, 'Dzulá'),
(1364, 120, 'Santa Rosa Segundo'),
(1365, 120, 'Presidente Juárez'),
(1366, 122, 'José María Morelos'),
(1367, 122, 'Dziuché'),
(1368, 122, 'Sabán'),
(1369, 122, 'Huay Max'),
(1370, 122, 'La Presumida'),
(1371, 122, 'X-Cabil'),
(1372, 122, 'Kankabchen'),
(1373, 122, 'Sacalaca'),
(1374, 124, 'Chetumal'),
(1375, 124, 'Calderitas'),
(1376, 124, 'Nicolás Bravo'),
(1377, 124, 'Javier Rojo Gómez'),
(1378, 124, 'Álvaro Obregón'),
(1379, 124, 'Sergio Butrón Casas'),
(1380, 124, 'Cacao'),
(1381, 124, 'Xul-Ha'),
(1382, 124, 'Maya Balam'),
(1383, 124, 'Subteniente López'),
(1384, 124, 'Pucté'),
(1385, 124, 'Carlos A. Madrazo'),
(1386, 124, 'Huay-Pix'),
(1387, 124, 'Ucum'),
(1388, 124, 'La Unión'),
(1389, 124, 'Mahahual'),
(1390, 124, 'Tres Garantías'),
(1391, 124, 'Xcalak'),
(1392, 118, 'Cancún'),
(1393, 118, 'Alfredo V. Bonfil'),
(1394, 118, 'Lagos del Sol'),
(1395, 118, 'El Porvenir'),
(1396, 118, 'Colonia Chiapaneca Siglo X'),
(1397, 128, 'Hidalgo'),
(1398, 128, 'Jalapa'),
(1399, 128, 'Los Cacaos'),
(1400, 128, 'Nueva Libertad'),
(1401, 128, 'Los Amates'),
(1402, 128, 'El Castaño'),
(1403, 128, 'Constitución'),
(1404, 128, 'Nueva Reforma'),
(1405, 128, 'Las Golondrinas'),
(1406, 130, 'Soconusco'),
(1407, 130, 'Consuelo Ulapa'),
(1408, 130, 'El Arenal'),
(1409, 130, 'Jiquilpan (Estación Bonanza)'),
(1410, 130, 'Mariano Matamoros'),
(1411, 130, 'Consuelo Ulapa'),
(1412, 130, 'Las Cruces'),
(1413, 130, 'Barrio Nuevo'),
(1414, 130, 'El Madronal'),
(1415, 130, 'Luis Espinoza'),
(1416, 131, 'Revolución Fiu'),
(1417, 131, 'San Pedro Cotzilnam'),
(1418, 131, 'Xuxchén'),
(1419, 132, 'Morelia (Victórico Rodolfo Grajales)'),
(1420, 132, 'La Laguna'),
(1421, 132, 'Luis Espinoza'),
(1422, 132, 'Venustiano Carranza'),
(1423, 132, 'Belisario Domínguez'),
(1424, 132, 'Puerto Rico'),
(1425, 132, 'San Luis Potosí'),
(1426, 132, 'San Francisco'),
(1427, 132, 'Nueva Galilea'),
(1428, 132, 'El Triunfo'),
(1429, 132, 'San Marcos'),
(1430, 132, 'Carmen Rusia'),
(1431, 133, 'El Pacayal'),
(1432, 133, 'Potrerillo'),
(1433, 133, 'Nuevo Amatenango'),
(1434, 133, 'Guadalupe Victoria'),
(1435, 133, 'Nuevo Morelia'),
(1436, 133, 'Veinte de Noviembre'),
(1437, 133, 'Río Guerrero'),
(1438, 133, 'Amatenango de la Frontera'),
(1439, 134, 'Amatenango del Valle'),
(1440, 134, 'El Madronal'),
(1441, 134, 'San Caralampio Chavín'),
(1442, 134, 'San Vicente la Piedra'),
(1443, 134, 'Benito Juárez'),
(1444, 134, 'Rancho Nuevo'),
(1445, 134, 'San Gregorio'),
(1446, 134, 'Unión Buenavista'),
(1447, 134, 'La Merced'),
(1448, 134, 'San Miguel el Alto'),
(1449, 136, '5 de Mayo'),
(1450, 136, 'Arriaga (Cabecera del Municipio)'),
(1451, 136, 'Azteca (La Punta)'),
(1452, 136, 'Emiliano Zapata'),
(1453, 136, 'La Gloria'),
(1454, 136, 'La Línea'),
(1455, 136, 'Las Arenas'),
(1456, 136, 'Lázaro Cárdenas'),
(1457, 136, 'Malpaso'),
(1458, 136, 'Nicolás Bravo (El Hondo)'),
(1459, 136, 'Punta Flor'),
(1460, 136, 'Villa del Mar'),
(1461, 137, 'Benemérito de las Américas'),
(1462, 137, 'Flor de Cacao'),
(1463, 137, 'Arroyo Delicias'),
(1464, 137, 'Nuevo Orizaba'),
(1465, 137, 'Nuevo Veracruz'),
(1466, 137, 'Nuevo Chihuahua'),
(1467, 137, 'Roberto Barrios'),
(1468, 137, 'La Nueva Unión'),
(1469, 138, 'Amendu'),
(1470, 138, 'Benito Juárez'),
(1471, 138, 'Berlín'),
(1472, 138, 'Berriozábal (Cabecera del Municipio)'),
(1473, 138, 'Ciudad Maya'),
(1474, 138, 'Colonia Ejidal'),
(1475, 138, 'Efraín A. Gutiérrez'),
(1476, 138, 'El Sabinito'),
(1477, 138, 'El Sabino'),
(1478, 138, 'Ignacio Zaragoza'),
(1479, 138, 'Independencia'),
(1480, 138, 'La Caridad'),
(1481, 138, 'La Libertad'),
(1482, 138, 'La Nueva Esperanza'),
(1483, 138, 'Las Maravillas'),
(1484, 138, 'Nuevo Montecristo'),
(1485, 138, 'Revolución'),
(1486, 138, 'San Jeronimo (Solidaridad)'),
(1487, 138, 'Santa Inés Buenavista'),
(1488, 138, 'Tierra y Libertad'),
(1489, 138, 'Vistahermosa'),
(1490, 144, 'Arvenza Uno'),
(1491, 144, 'Bautista Chico'),
(1492, 144, 'Bautista Grande'),
(1493, 144, 'Callejón'),
(1494, 144, 'Catishtic'),
(1495, 144, 'Chamula (Cabecera del Municipio)'),
(1496, 144, 'Chicumtantic'),
(1497, 144, 'Chicviltenal'),
(1498, 144, 'Cruztón'),
(1499, 144, 'Cuchulumtic'),
(1500, 144, 'El Pozo'),
(1501, 144, 'Epalchén'),
(1502, 144, 'Jomalho'),
(1503, 144, 'Kotolté'),
(1504, 144, 'Laguna Petej'),
(1505, 144, 'Las Ollas'),
(1506, 144, 'Macvilho'),
(1507, 144, 'Majomut'),
(1508, 144, 'Muquén'),
(1509, 144, 'Nachauc'),
(1510, 144, 'Narváez'),
(1511, 144, 'Nichnamtic'),
(1512, 144, 'Pajaltón Alto'),
(1513, 144, 'Pajaltón Bajo'),
(1514, 144, 'Pugchén Mumuntic'),
(1515, 144, 'Romerillo'),
(1516, 144, 'Saclamantón'),
(1517, 144, 'Tentic'),
(1518, 144, 'Tzajaltetic'),
(1519, 144, 'Tzontehuitz'),
(1520, 144, 'Yaalhichín'),
(1521, 144, 'Yaltem'),
(1522, 144, 'Yitic'),
(1523, 145, 'Buenos Aires'),
(1524, 145, 'Carmen Tonapac'),
(1525, 145, 'Chapultenango'),
(1526, 145, 'Guadalupe Victoria'),
(1527, 145, 'Río Negro'),
(1528, 145, 'San Antonio Acambac'),
(1529, 145, 'San Miguel Buenavista'),
(1530, 146, 'Bajxulum'),
(1531, 146, 'Barrio Esquipulas'),
(1532, 146, 'Belisario Domínguez'),
(1533, 146, 'Caridad San Antonio'),
(1534, 146, 'Centro Nuevo Yibeljoj'),
(1535, 146, 'Chenalhó (Cabecera del Municipio)'),
(1536, 146, 'Chixiltón'),
(1537, 146, 'Cruztón'),
(1538, 146, 'Guayabal'),
(1539, 146, 'La Esperanza'),
(1540, 146, 'Miguel Utrilla (Los Chorros)'),
(1541, 146, 'Natividad'),
(1542, 146, 'Pechiquil'),
(1543, 146, 'Polhó'),
(1544, 146, 'Puebla'),
(1545, 146, 'Tzabalhó'),
(1546, 146, 'Tzeltal'),
(1547, 146, 'Yabteclum (Pueblo Viejo)'),
(1548, 146, 'Yabteclum Fracción Dos'),
(1549, 146, 'Yabteclum Fracción Uno'),
(1550, 146, 'Yaxgemel Unión'),
(1551, 147, 'Chiapilla (Cabecera del Municipio)'),
(1552, 147, 'Doctor Manuel Velasco Suárez'),
(1553, 147, 'El Carmen'),
(1554, 147, 'Lázaro Cárdenas'),
(1555, 148, '20 de Noviembre'),
(1556, 148, 'Benito Juárez'),
(1557, 148, 'Chicomuselo'),
(1558, 148, 'Grecia'),
(1559, 148, 'Josefa Ortiz de Domínguez (La Fortuna)'),
(1560, 148, 'Las Flores'),
(1561, 148, 'La Zacualpa'),
(1562, 148, 'Lázaro Cárdenas'),
(1563, 148, 'Miguel Alemán'),
(1564, 148, 'Monte Sinaí'),
(1565, 148, 'Nueva América'),
(1566, 148, 'Nueva Morelia'),
(1567, 148, 'Pablo L. Sidar'),
(1568, 148, 'Piedra Labrada'),
(1569, 148, 'Unión Buenavista'),
(1570, 149, 'Abelardo L. Rodríguez'),
(1571, 149, 'Adolfo López Mateos'),
(1572, 149, 'Cintalapa de Figueroa (Cabecera del Municipio)'),
(1573, 149, 'Emiliano Zapata'),
(1574, 149, 'Esperanza de los Pobres'),
(1575, 149, 'Francisco I. Madero'),
(1576, 149, 'General Cárdenas'),
(1577, 149, 'Jacinto Tirado'),
(1578, 149, 'La Florida'),
(1579, 149, 'Lázaro Cárdenas'),
(1580, 149, 'Mérida'),
(1581, 149, 'Nuevas Maravillas'),
(1582, 149, 'Nueva Tenochtitlán (Rizo de Oro)'),
(1583, 149, 'Pomposo Castellanos'),
(1584, 149, 'Rosendo Salazar'),
(1585, 149, 'Tehuacán'),
(1586, 149, 'Triunfo de Madero'),
(1587, 149, 'Venustiano Carranza'),
(1588, 149, 'Villamorelos'),
(1589, 149, 'Vista Hermosa'),
(1590, 150, 'Abelardo L. Rodríguez'),
(1591, 150, 'Cajcam'),
(1592, 150, 'Cash'),
(1593, 150, 'Chacaljocom'),
(1594, 150, 'Chichimá Sabinal'),
(1595, 150, 'Comitán de Domínguez (Cabecera del Municipio)'),
(1596, 150, 'Efraín A. Gutiérrez'),
(1597, 150, 'Francisco J. Mújica'),
(1598, 150, 'Francisco Sarabia'),
(1599, 150, 'Guadalupe Palmira'),
(1600, 150, 'Guadalupe Quistaj'),
(1601, 150, 'Jatón Chacaljemel'),
(1602, 150, 'Juznajab la Laguna'),
(1603, 150, 'La Floresta'),
(1604, 150, 'Las Flores'),
(1605, 150, 'Los Riegos'),
(1606, 150, 'Pamala'),
(1607, 150, 'Primero de Mayo'),
(1608, 150, 'Quijá'),
(1609, 150, 'Río Grande'),
(1610, 150, 'San Francisco el Rincón'),
(1611, 150, 'San Isidro Tinajab'),
(1612, 150, 'San José Yocnajab (San José Obrero)'),
(1613, 150, 'San Miguel Tinajab'),
(1614, 150, 'San Rafael Jocom'),
(1615, 150, 'Santa Rosalía'),
(1616, 150, 'Santo Domingo de las Granadas'),
(1617, 150, 'Señor del Pozo'),
(1618, 150, 'Villahermosa Yalumá'),
(1619, 150, 'Yaltzi Tres Lagunas'),
(1620, 150, 'Yocnajab el Rosario'),
(1621, 150, 'Zaragoza la Montaña'),
(1622, 151, 'Ángel Albino Corzo (Guadalupe)'),
(1623, 151, 'Benito Juárez'),
(1624, 151, 'Campeche'),
(1625, 151, 'Copainalá (Cabecera del Municipio)'),
(1626, 151, 'El Rosario'),
(1627, 151, 'Ignacio Zaragoza'),
(1628, 151, 'Julián Grajales (San Antonio)'),
(1629, 151, 'La Nueva'),
(1630, 151, 'Miguel Hidalgo (Zacalapa)'),
(1631, 153, 'San Miguel la Sardina'),
(1632, 153, 'San José Maspac'),
(1633, 153, 'Vicente Guerrero'),
(1634, 153, 'Azapac Amatal'),
(1635, 153, 'Rivera el Viejo Carmen'),
(1636, 154, 'Frontera Comalapa (cabecera)'),
(1637, 154, '2 Paso Hondo'),
(1638, 154, '3 Ciudad Cuauhtémoc'),
(1639, 154, '4 Doctor Rodulfo Figueroa (Tierra Blanca)'),
(1640, 154, '5 Verapaz'),
(1641, 154, '6 Sabinalito'),
(1642, 154, '7 Agua Zarca'),
(1643, 154, '8 Nueva Independencia (Lajerío)'),
(1644, 154, '9 Joaquín Miguel Gutiérrez (Quespala)'),
(1645, 154, '10 San Caralampio'),
(1646, 154, '11 El Triunfo de las Tres Maravillas'),
(1647, 154, '12 Nueva Libertad'),
(1648, 154, '13 Monte Redondo'),
(1649, 154, '14 El Portal'),
(1650, 154, '15 Sinaloa'),
(1651, 154, '16 Veinticuatro de Febrero'),
(1652, 154, '17 Guadalupe Grijalva'),
(1653, 155, 'Cantón Santa Cruz'),
(1654, 155, 'Ejido Francisco I. Madero'),
(1655, 155, 'Frontera Hidalgo (Cabecera municipal)'),
(1656, 155, 'Frontera Hidalgo (Localidad rural)'),
(1657, 155, 'Ignacio Zaragoza'),
(1658, 155, 'Poblado Francisco I. Madero'),
(1659, 155, 'Santa Lucía I'),
(1660, 155, 'Texcaltic'),
(1661, 157, 'Carmen Yalchuch'),
(1662, 157, 'Los Pozos'),
(1663, 157, 'San Pedro Pedernal'),
(1664, 157, 'San Gregorio de las Casas'),
(1665, 157, 'San Andrés Puerto Rico'),
(1666, 157, 'La Libertad'),
(1667, 157, 'Eshpuilho'),
(1668, 157, 'Oquem'),
(1669, 157, 'Lázaro Cárdenas (Chilil)'),
(1670, 157, 'Jocosic'),
(1671, 158, 'Juárez'),
(1672, 158, 'Nuevo Volcán Chichonal'),
(1673, 158, 'El Triunfo 1.ª Sección (Cardona)'),
(1674, 158, 'Pueblo Juárez'),
(1675, 158, 'Doctor Belisario Domínguez'),
(1676, 159, 'Benito Juárez'),
(1677, 159, 'Dolores Jaltenango'),
(1678, 159, 'El Ámbar (El Ámbar de Echeverría)'),
(1679, 159, 'El Diamante de Echeverría'),
(1680, 159, 'El Ramal (Porvenir)'),
(1681, 159, 'El Retiro'),
(1682, 159, 'Guadalupe Maravillas'),
(1683, 159, 'Guadalupe Victoria'),
(1684, 159, 'Ignacio Zaragoza'),
(1685, 159, 'Independencia'),
(1686, 159, 'La Concordia (Cabecera del Municipio)'),
(1687, 159, 'La Tigrilla'),
(1688, 159, 'Monterrey'),
(1689, 159, 'Niños Héroe'),
(1690, 159, 'Nueva Libertad'),
(1691, 159, 'Nuevo Resplandor'),
(1692, 159, 'Plan de Agua Prieta'),
(1693, 159, 'Plan de la Libertad'),
(1694, 159, 'Plan de la Libertad Baja (El Recreo)'),
(1695, 159, 'Reforma'),
(1696, 159, 'Rizo de Oro'),
(1697, 159, 'San Nicolás'),
(1698, 160, 'La Trinitaria'),
(1699, 160, 'Lázaro Cárdenas'),
(1700, 160, 'El Porvenir Agrarista'),
(1701, 160, 'José María Morelos'),
(1702, 160, 'La Esperanza'),
(1703, 160, 'Miguel Hidalgo'),
(1704, 160, 'Rodulfo Figueroa'),
(1705, 160, 'Las Delicias'),
(1706, 160, 'Tziscao'),
(1707, 160, 'Álvaro Obregón'),
(1708, 160, 'La Gloria'),
(1709, 160, 'Santa Rita'),
(1710, 160, 'El Progreso'),
(1711, 161, 'San Andrés Larráinzar'),
(1712, 161, 'Chuchiltón Anexo Potobtic Dos'),
(1713, 161, 'Majoval'),
(1714, 161, 'San Cristobalito'),
(1715, 162, 'Amparo Agua Tinta'),
(1716, 162, 'Aquiles Serdán'),
(1717, 162, 'Bajucú'),
(1718, 162, 'Barrio de Llano Redondo'),
(1719, 162, 'Belisario Domínguez (San Pedro)'),
(1720, 162, 'Benito Juárez'),
(1721, 162, 'Buenavista Bawitz'),
(1722, 162, 'Buenavista Pachán'),
(1723, 162, 'Carmen las Flores'),
(1724, 162, 'Chiapas'),
(1725, 162, 'Cruz del Rosario'),
(1726, 162, 'El Edén'),
(1727, 162, 'El Encanto'),
(1728, 162, 'El Paraíso'),
(1729, 162, 'El Porvenir'),
(1730, 162, 'El Progreso'),
(1731, 162, 'El Vergel'),
(1732, 162, 'Espíritu Santo'),
(1733, 162, 'Francisco I. Madero'),
(1734, 162, 'Francisco Villa'),
(1735, 162, 'Gabino Vázquez'),
(1736, 162, 'Gabriel Leyva Velázquez'),
(1737, 162, 'González de León'),
(1738, 162, 'Guadalupe Tepeyac'),
(1739, 162, 'Ignacio Allende'),
(1740, 162, 'Ignacio Zaragoza'),
(1741, 162, 'Ignacio Zaragoza'),
(1742, 162, 'Jalisco'),
(1743, 162, 'Jerusalén'),
(1744, 162, 'Justo Sierra (San Francisco)'),
(1745, 162, 'La Esperanza'),
(1746, 162, 'La Fortuna'),
(1747, 162, 'La Ilusión'),
(1748, 162, 'La Piedad'),
(1749, 162, 'La Realidad Trinidad'),
(1750, 162, 'Las Margaritas'),
(1751, 162, 'Lomantán'),
(1752, 162, 'Mexiquito'),
(1753, 162, 'Nueva Providencia'),
(1754, 162, 'Nuevo Huixtán'),
(1755, 162, 'Nuevo Matzám'),
(1756, 162, 'Nuevo México'),
(1757, 162, 'Nuevo Momón'),
(1758, 162, 'Nuevo Poza Rica'),
(1759, 162, 'Nuevo Rosario Río Blanco'),
(1760, 162, 'Nuevo San Juan Chamula (El Pacayal)'),
(1761, 162, 'Nuevo Santo Tomás'),
(1762, 162, 'Palma Real'),
(1763, 162, 'Plan de Ayala'),
(1764, 162, 'Plan de Santo Tomás'),
(1765, 162, 'Rafael Ramírez'),
(1766, 162, 'Río Corozal'),
(1767, 162, 'Rosario Bawitz'),
(1768, 162, 'Rosario Buenavista'),
(1769, 162, 'Saltillo'),
(1770, 162, 'San Agustín'),
(1771, 162, 'San Antonio Bawitz'),
(1772, 162, 'San Antonio los Altos'),
(1773, 162, 'San Antonio los Montes'),
(1774, 162, 'San Antonio Venecia'),
(1775, 162, 'San Arturo las Flores'),
(1776, 162, 'San Bartolo (El Puerto)'),
(1777, 162, 'San Caralampio'),
(1778, 162, 'San Francisco el Naranjo'),
(1779, 162, 'San Isidro'),
(1780, 162, 'San José la Nueva Esperanza'),
(1781, 162, 'San José las Palmas'),
(1782, 162, 'San José Zapotal'),
(1783, 162, 'San Juan Bautista'),
(1784, 162, 'San Juan del Pozo'),
(1785, 162, 'San Mateo Zapotal'),
(1786, 162, 'San Pedro Yutniotic'),
(1787, 162, 'Santa Elena'),
(1788, 162, 'Santa Lucía Ojo de Agua'),
(1789, 162, 'Santa Rita Invernadero'),
(1790, 162, 'Santa Rita Sonora'),
(1791, 162, 'Santa Rosa'),
(1792, 162, 'San Vicente el Encanto'),
(1793, 162, 'Veinte de Noviembre'),
(1794, 162, 'Veracruz'),
(1795, 162, 'Vicente Guerrero'),
(1796, 162, 'Yalcoc'),
(1797, 162, 'Yasha'),
(1798, 163, 'Abasolo'),
(1799, 163, 'Ach\'lum Monte Líbano'),
(1800, 163, 'Agua Azul'),
(1801, 163, 'Amador Hernández'),
(1802, 163, 'Arroyo Granizo'),
(1803, 163, 'Betania'),
(1804, 163, 'Busiljá'),
(1805, 163, 'Candelaria'),
(1806, 163, 'Champa San Agustín'),
(1807, 163, 'Cinco de Febrero'),
(1808, 163, 'Cintalapa'),
(1809, 163, 'Cristóbal Colón'),
(1810, 163, 'Cuxuljá'),
(1811, 163, 'Damasco'),
(1812, 163, 'El Calvario'),
(1813, 163, 'El Censo'),
(1814, 163, 'El Diamante'),
(1815, 163, 'El Ixcán'),
(1816, 163, 'El Jardín'),
(1817, 163, 'El Limonar'),
(1818, 163, 'El Prado Pacayal'),
(1819, 163, 'El Rosario'),
(1820, 163, 'El Sibal'),
(1821, 163, 'El Tumbo'),
(1822, 163, 'El Zapotal'),
(1823, 163, 'Emiliano Zapata'),
(1824, 163, 'Emiliano Zapata'),
(1825, 163, 'Francisco Guerrero'),
(1826, 163, 'Frontera Corozal'),
(1827, 163, 'Héctor Albores Cruz'),
(1828, 163, 'La Arena'),
(1829, 163, 'Lacandón'),
(1830, 163, 'Lacanjá Tzeltal'),
(1831, 163, 'La Culebra'),
(1832, 163, 'La Frontera Uno'),
(1833, 163, 'La Reforma'),
(1834, 163, 'La Soledad'),
(1835, 163, 'Las Tazas'),
(1836, 163, 'La Trinidad'),
(1837, 163, 'La Virginia'),
(1838, 163, 'Los Pinos'),
(1839, 163, 'Miguel Hidalgo'),
(1840, 163, 'Nazareth'),
(1841, 163, 'Nueva Esperanza (La Esperanza)'),
(1842, 163, 'Nueva las Tacitas'),
(1843, 163, 'Nueva Palestina'),
(1844, 163, 'Nueva Samaria'),
(1845, 163, 'Nuevo Francisco León'),
(1846, 163, 'Nuevo Jerusalén'),
(1847, 163, 'Nuevo Mariscal'),
(1848, 163, 'Nuevo Paraíso'),
(1849, 163, 'Ocosingo (Cabecera municipal)'),
(1850, 163, 'Palomar 2'),
(1851, 163, 'Patihuitz'),
(1852, 163, 'Patria Nueva (San José el Contento)'),
(1853, 163, 'Peña Chabarico'),
(1854, 163, 'Peña Limonar'),
(1855, 163, 'Perla de Acapulco'),
(1856, 163, 'Pichucalco'),
(1857, 163, 'Plácido Flores'),
(1858, 163, 'Plan de Ayutla'),
(1859, 163, 'Plan de Guadalupe'),
(1860, 163, 'Ramón F. Balboa'),
(1861, 163, 'Río Blanco'),
(1862, 163, 'San Antonio las Delicias (Pamala)'),
(1863, 163, 'San Antonio Samaria'),
(1864, 163, 'San Caralampio'),
(1865, 163, 'San José'),
(1866, 163, 'San Juan Rómulo Calzada'),
(1867, 163, 'San Luis (Guadalupe)'),
(1868, 163, 'San Marcos'),
(1869, 163, 'San Marcos'),
(1870, 163, 'San Miguel'),
(1871, 163, 'San Quintín'),
(1872, 163, 'San Salvador'),
(1873, 163, 'Santa Elena'),
(1874, 163, 'Santa Rita'),
(1875, 163, 'Santo Domingo'),
(1876, 163, 'Santo Tomás'),
(1877, 163, 'Santo Ton'),
(1878, 163, 'Sibaca'),
(1879, 163, 'Taniperla'),
(1880, 163, 'Tenango'),
(1881, 163, 'Tierra Blanca'),
(1882, 163, 'Tzacbatul'),
(1883, 163, 'Ubilio García'),
(1884, 165, 'Ocozocoautla de Espinosa'),
(1885, 165, 'Ocuilapa de Juárez'),
(1886, 165, 'Vicente Guerrero'),
(1887, 165, 'Guadalupe Victoria'),
(1888, 165, 'Ignacio Zaragoza'),
(1889, 165, 'CNC'),
(1890, 165, 'Las Pimientas'),
(1891, 165, 'Espinal de Morelos'),
(1892, 166, 'Ostuacán'),
(1893, 166, 'Plan de Ayala'),
(1894, 166, 'Nuevo Xochimilco'),
(1895, 166, 'Catedral de Chiapas'),
(1896, 166, 'Lindavista'),
(1897, 166, 'Xochimilco (Reymundo Enríquez)'),
(1898, 166, 'Juan del Grijalva14'),
(1899, 167, 'Palenque'),
(1900, 167, 'Río Chancalá'),
(1901, 167, 'Agua Blanca Serranía'),
(1902, 167, 'El Edén'),
(1903, 167, 'Arimatea'),
(1904, 167, 'Doctor Samuel León Brindis'),
(1905, 167, 'Profesor Roberto Barrios'),
(1906, 167, 'San Juan Tulija'),
(1907, 167, 'Bajadas Grandes'),
(1908, 167, 'Babilonia'),
(1909, 169, 'Pantepec'),
(1910, 169, 'San Isidro Las Banderas'),
(1911, 169, 'El Carrizal'),
(1912, 169, 'El Triunfo'),
(1913, 169, 'Julián Grajales'),
(1914, 170, 'Pichucalco'),
(1915, 170, 'Nuevo Nicapa'),
(1916, 170, 'Napana'),
(1917, 170, 'Platanar Abajo 1.ª. Sección (La Crimea)'),
(1918, 170, 'Tectuapan'),
(1919, 171, 'Pijijiapan'),
(1920, 171, 'Las Brisas'),
(1921, 171, 'San Isidro'),
(1922, 171, 'Joaquín Miguel Gutiérrez (Margaritas)'),
(1923, 171, 'Tamaulipas (Joaquín Amaro)'),
(1924, 171, 'El Carmen'),
(1925, 171, 'Hermenegildo Galeana'),
(1926, 171, 'El Palmarcito'),
(1927, 171, 'La Esperanza (El Zapotal)'),
(1928, 171, 'Tutuán'),
(1929, 172, 'Pueblo Nuevo Solistahuacán'),
(1930, 172, 'San José Chapayal'),
(1931, 172, 'Arroyo Grande'),
(1932, 172, 'Sonora'),
(1933, 172, 'Aurora Ermita'),
(1934, 172, 'San Rafael'),
(1935, 172, 'Año de Juárez'),
(1936, 174, 'Reforma'),
(1937, 174, 'El Carmen (El Limón)'),
(1938, 174, 'Rafael Pascacio Gamboa'),
(1939, 174, 'Miguel Hidalgo'),
(1940, 174, 'La Unión'),
(1941, 175, 'La Florida'),
(1942, 175, 'San Felipe'),
(1943, 175, 'Rinconcito Uno'),
(1944, 175, 'El Rinconcito'),
(1945, 175, 'San Isidro Cieneguilla'),
(1946, 175, 'San Antonio los Pinos'),
(1947, 175, 'Vista Hermosa'),
(1948, 177, 'Agua de Pajarito'),
(1949, 177, 'Buenavista'),
(1950, 177, 'Corazón de María'),
(1951, 177, 'El Aguaje (La Albarada)'),
(1952, 177, 'El Pinar'),
(1953, 177, 'La Candelaria'),
(1954, 177, 'La Florecilla'),
(1955, 177, 'La Selva Natividad'),
(1956, 177, 'La Sierra'),
(1957, 177, 'Los Llanos'),
(1958, 177, 'Mitzitón'),
(1959, 177, 'Molino los Arcos'),
(1960, 177, 'Pedernal'),
(1961, 177, 'Predio Santiago'),
(1962, 177, 'Río Arcotete'),
(1963, 177, 'San Antonio del Monte'),
(1964, 177, 'San Cristóbal de las Casas (Cabecera del Municipio)'),
(1965, 177, 'San José Buenavista'),
(1966, 177, 'Vistahermosa Huitepec'),
(1967, 177, 'Yashitinín'),
(1968, 177, 'Zacualpa Ecatepec'),
(1969, 179, 'Francisco Villa'),
(1970, 179, 'Laguna del Carmen'),
(1971, 179, 'San José Buenavista'),
(1972, 179, 'San Lucas (Cabecera del Municipio)'),
(1973, 181, 'Pueblo Nuevo Sitala'),
(1974, 181, 'El Jardín'),
(1975, 181, 'La Pimienta'),
(1976, 181, 'Las Maravillas'),
(1977, 181, 'La Ceiba'),
(1978, 181, 'Constitución'),
(1979, 182, 'Sitalá'),
(1980, 182, 'Golonchán Viejo'),
(1981, 182, 'Santa Cruz la Reforma'),
(1982, 182, 'Insurgente Picoté'),
(1983, 182, 'San Juan de la Montaña'),
(1984, 182, 'La Unión'),
(1985, 182, 'Chabeclumil'),
(1986, 183, 'Solosuchiapa'),
(1987, 183, 'Cerro las Campanas'),
(1988, 183, 'Álvaro Obregón'),
(1989, 183, 'Monte Horeb'),
(1990, 183, 'Agustín Rubio (Santa Fe la Zacualpa)'),
(1991, 183, 'Villaflores'),
(1992, 183, 'Francisco I. Madero'),
(1993, 184, '20 de Noviembre'),
(1994, 184, 'Barra de Cahoacán (El Chical)'),
(1995, 184, 'Benito Juárez (Cosalapa)'),
(1996, 184, 'Ciudad Hidalgo (Cabecera del Municipio)'),
(1997, 184, 'Cuauhtémoc'),
(1998, 184, 'El Campito'),
(1999, 184, 'El Gancho'),
(2000, 184, 'Ignacio López Rayón'),
(2001, 184, 'Jesús'),
(2002, 184, 'La Libertad'),
(2003, 184, 'Miguel Alemán'),
(2004, 184, 'Nuevo Dorado'),
(2005, 184, 'Quince de Abril'),
(2006, 184, 'Suchiate'),
(2007, 184, 'Tierra y Libertad'),
(2008, 185, 'Sunuapa'),
(2009, 185, 'San Pedro'),
(2010, 185, 'La Libertad'),
(2011, 185, 'Santa Cruz 3.ª Sección'),
(2012, 185, 'Esquipulas'),
(2013, 187, 'Tzajalchén'),
(2014, 187, 'Tz Aquiviljok'),
(2015, 187, 'Tenejapa'),
(2016, 187, 'Kotolté'),
(2017, 187, 'Yashanal'),
(2018, 187, 'Matzam'),
(2019, 187, 'Sibaniljá Pocolum'),
(2020, 187, 'Winiktón'),
(2021, 187, 'Chacoma'),
(2022, 187, 'Ococh'),
(2023, 192, 'Córdova Matasanos'),
(2024, 192, 'Once de Abril'),
(2025, 192, 'San Jerónimo'),
(2026, 192, 'San Rafael'),
(2027, 192, 'Santo Domingo'),
(2028, 192, 'Talquián'),
(2029, 192, 'Trinidad'),
(2030, 192, 'Unión Juárez (Cabecera del Municipio)'),
(2031, 192, 'Plan de Ayala'),
(2032, 192, 'Patria Nueva de Sabines'),
(2033, 192, 'Las Granjas'),
(2034, 192, 'Terán'),
(2035, 192, 'San José Terán'),
(2036, 192, 'El Jobo'),
(2037, 192, 'Copoya'),
(2038, 192, 'Emiliano Zapata'),
(2039, 192, 'Francisco I. Madero'),
(2040, 192, 'Cerro Hueco'),
(2041, 194, 'San Francisco Pujiltic'),
(2042, 194, 'Aguacatenango'),
(2043, 194, 'Soyatitán'),
(2044, 194, 'Ricardo Flores Magón'),
(2045, 194, 'Presidente Echeverría (Laja Tendida)'),
(2046, 194, 'San Francisco (El Calvito)'),
(2047, 194, 'Paraíso del Grijalva'),
(2048, 195, 'Hidalgo'),
(2049, 195, 'Lázaro Cárdenas'),
(2050, 195, 'San Carlos');
INSERT INTO `comisarias` (`id`, `ciudad_id`, `nombre`) VALUES
(2051, 195, 'Zacualpa'),
(2052, 195, 'Cantón Santa Cruz la Unión'),
(2053, 195, 'Vicente Guerrero'),
(2054, 195, 'Cantón las Brisas'),
(2055, 195, 'Teziutlán'),
(2056, 195, 'Cantón el Progreso'),
(2057, 196, 'San Pedro Buenavista'),
(2058, 196, 'Revolución Mexicana'),
(2059, 196, 'Nuevo Vicente Guerrero'),
(2060, 196, 'Valle Morelos'),
(2061, 196, 'Primero de Mayo'),
(2062, 196, 'Manuel Ávila Camacho'),
(2063, 196, 'Emiliano Zapata'),
(2064, 197, 'Villaflores'),
(2065, 197, 'Jesús María Garza'),
(2066, 197, 'Cristóbal Obregón'),
(2067, 197, 'Benito Juárez'),
(2068, 197, 'Guadalupe Victoria (Lázaro Cárdenas)'),
(2069, 197, 'Nuevo México'),
(2070, 197, 'Doctor Domingo Chanona'),
(2071, 197, 'Cuauhtémoc'),
(2072, 197, 'Villa Hidalgo'),
(2073, 197, 'Joaquín Miguel Gutiérrez'),
(2074, 198, 'Amado Nervo'),
(2075, 198, 'Lázaro Cárdenas'),
(2076, 198, 'La Ventana'),
(2077, 198, 'Emiliano Zapata'),
(2078, 198, 'El Recreo'),
(2079, 198, 'La Laguna'),
(2080, 199, 'Apaz'),
(2081, 199, 'Bochojbo Alto'),
(2082, 199, 'Chactoj'),
(2083, 199, 'Chiquinivalvo'),
(2084, 199, 'Elambo Alto'),
(2085, 199, 'Elambo Bajo'),
(2086, 199, 'El Pig'),
(2087, 199, 'Jech Chentic'),
(2088, 199, 'Jechtoch'),
(2089, 199, 'Jobchenón (La Granadilla)'),
(2090, 199, 'Nachig'),
(2091, 199, 'Navenchauc'),
(2092, 199, 'Pasté'),
(2093, 199, 'Patosil'),
(2094, 199, 'Potobtic'),
(2095, 199, 'Shulvo'),
(2096, 199, 'Tierra Blanca'),
(2097, 199, 'Yalentay (San Joaquín)'),
(2098, 199, 'Zequentic'),
(2099, 199, 'Zequentic Bajo'),
(2100, 199, 'Zinacantán (Cabecera del Municipio)'),
(2101, 200, 'Adolfo Lopez Mateos'),
(2102, 200, 'Agricultores Del Norte 1a Sección'),
(2103, 200, 'Agricultores del Norte 2a Sección'),
(2104, 200, 'Apatzingán'),
(2105, 200, 'Arenal'),
(2106, 200, 'Arroyo El Triunfo 1a Sección'),
(2107, 200, 'Arroyo el Triunfo 2a Sección'),
(2108, 200, 'Asunción'),
(2109, 200, 'Último Esfuerzo'),
(2110, 200, 'Bajo Nezahualcoyotl'),
(2111, 200, 'Balancan'),
(2112, 200, 'Buena Vista 23'),
(2113, 200, 'Carlos A Madrazo'),
(2114, 200, 'Carlos A. Madrazo'),
(2115, 200, 'Carlos Enrique Abreu'),
(2116, 200, 'Caudillo del Sur'),
(2117, 200, 'Centro Usumacinta'),
(2118, 200, 'Chacavita'),
(2119, 200, 'Chamizal'),
(2120, 200, 'Chancabal'),
(2121, 200, 'Cibal la Cloria'),
(2122, 200, 'Constitución'),
(2123, 200, 'Cuajimalpa'),
(2124, 200, 'Cuauhtémoc'),
(2125, 200, 'Cuba'),
(2126, 200, 'Cuyos de Caoba'),
(2127, 200, 'Del Carmen'),
(2128, 200, 'El Águila'),
(2129, 200, 'El Bari'),
(2130, 200, 'El Capulín'),
(2131, 200, 'El Destino'),
(2132, 200, 'El Limón'),
(2133, 200, 'El Mical'),
(2134, 200, 'El Pichi'),
(2135, 200, 'El Pimiental'),
(2136, 200, 'El Pipila'),
(2137, 200, 'El Pocito'),
(2138, 200, 'El Sibalito'),
(2139, 200, 'El Tigre'),
(2140, 200, 'El Tinto'),
(2141, 200, 'El Triunfo'),
(2142, 200, 'Emiliano Zapata'),
(2143, 200, 'Faustino'),
(2144, 200, 'Francisco I. Madero 1a Sección'),
(2145, 200, 'Francisco I. Madero 2a Sección'),
(2146, 200, 'Francisco Villa'),
(2147, 200, 'Gregorio Méndez'),
(2148, 200, 'Gustavo Diaz Ordaz'),
(2149, 200, 'Isla Misicab'),
(2150, 200, 'Jahuactal'),
(2151, 200, 'Jardines de Balancán'),
(2152, 200, 'Jolochero'),
(2153, 200, 'Josefa Ortiz de Domínguez'),
(2154, 200, 'La 10'),
(2155, 200, 'La 21'),
(2156, 200, 'La Central'),
(2157, 200, 'La Cuchilla'),
(2158, 200, 'La Huleria'),
(2159, 200, 'La Pita'),
(2160, 200, 'La Poza'),
(2161, 200, 'Laguna Colorada'),
(2162, 200, 'Las Flores'),
(2163, 200, 'Las Tablas'),
(2164, 200, 'Lázaro Cárdenas'),
(2165, 200, 'Leona Vicario'),
(2166, 200, 'Los Cenotes'),
(2167, 200, 'Luis Felipe Domínguez'),
(2168, 200, 'Mactun'),
(2169, 200, 'Magisterial'),
(2170, 200, 'Mario Calcania'),
(2171, 200, 'Miguel Hidalgo'),
(2172, 200, 'Miguel Hidalgo Sacaola'),
(2173, 200, 'Misicab'),
(2174, 200, 'Monte Libano'),
(2175, 200, 'Multe'),
(2176, 200, 'Municipal'),
(2177, 200, 'Naranjito'),
(2178, 200, 'Narciso Rovirosa'),
(2179, 200, 'Nezahualcoyotl'),
(2180, 200, 'Nicolás Bravo'),
(2181, 200, 'Nuevo México'),
(2182, 200, 'Ojo de Agua'),
(2183, 200, 'Ototal'),
(2184, 200, 'Pajonal'),
(2185, 200, 'Palenque'),
(2186, 200, 'Pangonal'),
(2187, 200, 'Pdte Adolfo Lopez Mateos'),
(2188, 200, 'Pejelagarto'),
(2189, 200, 'Pejelagarto 2a Secc'),
(2190, 200, 'Pimiental 2da Secc'),
(2191, 200, 'Plan de Guadalupe'),
(2192, 200, 'Provincia'),
(2193, 200, 'Quetzalcoalt'),
(2194, 200, 'Ramonal'),
(2195, 200, 'Rancho Buena Vista'),
(2196, 200, 'Reforma'),
(2197, 200, 'Revancha'),
(2198, 200, 'San Elpidio'),
(2199, 200, 'San Joaquín'),
(2200, 200, 'San José'),
(2201, 200, 'San Juan'),
(2202, 200, 'San Marcos'),
(2203, 200, 'San Pedro'),
(2204, 200, 'Santa Cruz'),
(2205, 200, 'Sunina'),
(2206, 200, 'Tarimas'),
(2207, 200, 'Tierra Blanca'),
(2208, 200, 'Tierra y Libertad'),
(2209, 200, 'Uquina y La Loma'),
(2210, 200, 'Vicenta Lombardo Toledano'),
(2211, 200, 'Vicente Guerrero'),
(2212, 200, 'Zacatecas'),
(2213, 201, 'Villa Y Puerto Andrés Sánchez Magallanes'),
(2214, 201, 'Villa Benito Juárez'),
(2215, 201, 'Villa Ignacio Gutiérrez Gómez (San Felipe)'),
(2216, 201, 'C-11 (General José María Morelos Y Pavón)'),
(2217, 201, 'C-15 (Lic. Adolfo López Mateos)'),
(2218, 201, 'C-21 (Lic. Benito Juárez García)'),
(2219, 201, 'Azucena 2da Sección'),
(2220, 201, 'C-28 (Coronel Gregorio Méndez Magaña)'),
(2221, 201, 'C-16 (General Emiliano Zapata)'),
(2222, 201, 'C-09 (Francisco I. Madero)'),
(2223, 201, 'Cuauhtemoczín'),
(2224, 201, 'C-10 (General Lázaro Cárdenas Del Río)'),
(2225, 201, 'C-23 (General Venustiano Carranza)'),
(2226, 201, 'C-27 (Ingenio Eduardo Chávez Ramírez)'),
(2227, 201, 'C-33 (20 De noviembre)'),
(2228, 201, 'C-29 (General Vicente Guerrero)'),
(2229, 201, 'C-14 (General Plutarco Elías Calles)'),
(2230, 201, 'C-20 (Miguel Hidalgo Y Costilla)'),
(2231, 201, 'Ingenio Presidente Benito Juárez'),
(2232, 201, 'El Parnaso'),
(2233, 201, 'C-22 (Lic. José Mará Pino Suarez)'),
(2234, 201, 'C-17 (Independencia)'),
(2235, 201, 'Celia González De Rovirosa'),
(2236, 201, 'De Los Santos'),
(2237, 201, 'Miguel Hidalgo 2da Sección \"A\" (El Edén)'),
(2238, 201, 'Naranjeño 2da Sección \"B\"'),
(2239, 201, 'Santuario 5ta Sección (Buena Vista)'),
(2240, 201, 'Azucenita 1ra Sección \"B\"'),
(2241, 201, 'Encrucijada 1ra Sección (Rincón Brujo)'),
(2242, 201, 'Juan Escutia'),
(2243, 201, 'Calzada 1ra Sección Sur'),
(2244, 201, 'Calzada 1ra Sección Norte \"B \"'),
(2245, 201, 'Encrucijada 2da Sección (Los García)'),
(2246, 201, 'Río Seco 2da Sección \"A\" (Norte 10)'),
(2247, 201, 'Río Seco 1ra Sección'),
(2248, 201, 'Calzada 1ra Sección Norte \"A\"'),
(2249, 201, 'El Golpe 2da Sección (Los Patos)'),
(2250, 201, 'Las Coloradas La Victoria'),
(2251, 201, 'El Alacrán'),
(2252, 201, 'Arroyo Hondo 1ra Sección (Santa Teresa \"A\")'),
(2253, 201, 'El Bajío 2da Sección'),
(2254, 201, 'El Bronce'),
(2255, 201, 'Buena Vista 1ra Sección'),
(2256, 201, 'Campo Nuevo'),
(2257, 201, 'Cárdenas'),
(2258, 201, 'Chicozapote 1ra Sección'),
(2259, 201, 'Encrucijada 5ta Sección'),
(2260, 201, 'Habanero 1ra Sección (Venustiano Carranza)'),
(2261, 201, 'Miguel Hidalgo 2da Sección \"E\" (La Natividad)'),
(2262, 201, 'Nueva Esperanza'),
(2263, 201, 'Ojoshal'),
(2264, 201, 'Poza Redonda 2da Sección'),
(2265, 201, 'Francisco Trujillo Gurria (San Pedro)'),
(2266, 201, 'Santuario 2da Sección'),
(2267, 201, 'Zapotal 2da Sección'),
(2268, 201, 'Islas Encantadas (El Zapote)'),
(2269, 201, 'Las Coloradas 2da Sección \"B\"'),
(2270, 201, 'El Alacrán Sección Manatinero'),
(2271, 201, 'Azucena 5ta Sección (El Apompal)'),
(2272, 201, 'Azucena 4ta Sección (Torno Alegre)'),
(2273, 201, 'El Zapotal 3ra Sección'),
(2274, 201, 'Buenavista 2da Sección'),
(2275, 201, 'Sinaloa 2da Sección (Arjona)'),
(2276, 201, 'El Carmen'),
(2277, 201, 'El Carrizal'),
(2278, 201, 'Pedro Sánchez Magallanes'),
(2279, 201, 'Ley Federal De La Reforma Agraria (San Ramón)'),
(2280, 201, 'Rubén Jaramillo Lazo'),
(2281, 201, 'El Arrozal'),
(2282, 201, 'Azucena 6ta Sección'),
(2283, 201, 'Azucena 7ma Sección (El Lechugal)'),
(2284, 201, 'Arroyo Hondo 2da Sección (Santa Teresa \"B\")'),
(2285, 201, 'Paso Y Playa'),
(2286, 201, 'Cinco De Mayo'),
(2287, 201, 'La Alianza'),
(2288, 201, 'La Península'),
(2289, 201, 'San Rafael'),
(2290, 201, 'Tío Moncho'),
(2291, 201, 'Las Coloradas 2da Sección (Ampliación Las Aldeas)'),
(2292, 201, 'La Esperanza'),
(2293, 201, 'Sinaloa 1ra Sección'),
(2294, 201, 'Carrizal (Ampliación)'),
(2295, 201, 'El Carrizal (Ampliación Las Palomas)'),
(2296, 201, 'Las Coloradas 1ra Sección'),
(2297, 201, 'Poza Redonda 3ra Sección'),
(2298, 201, 'Julián Montejo Velázquez'),
(2299, 201, 'Poza Redonda 4ta Sección (Rincón Brujo)'),
(2300, 201, 'Arroyo Hondo San Rosendo'),
(2301, 201, 'Sinaloa 3ra Sección'),
(2302, 201, 'Cuauhtemoczín 2da Sección'),
(2303, 201, 'San Pedro'),
(2304, 201, 'Santuario 1rá Sección \"A\"'),
(2305, 201, 'El Capricho'),
(2306, 201, 'Las Flores (La Palma)'),
(2307, 201, 'Paylebot'),
(2308, 201, 'El Porvenir'),
(2309, 201, 'Chicozapote 2da Sección (El Retiro)'),
(2310, 201, 'El Barí 1ra Sección'),
(2311, 201, 'El Jobo (Punta Brava)'),
(2312, 201, 'El Yucateco (Paylebot 2da Sección)'),
(2313, 201, 'Las Palmas'),
(2314, 201, 'El Chocho (Boca Del Río)'),
(2315, 201, 'Las Calzadas'),
(2316, 201, 'Ignacio Zaragoza'),
(2317, 201, 'Reyes Heroles'),
(2318, 202, 'Colonia Francisco Villa'),
(2319, 202, 'Colonia Ulises García'),
(2320, 202, 'Colonia Deportiva'),
(2321, 202, 'Colonia Revolución'),
(2322, 202, 'Colonia Jacobo Nazar'),
(2323, 202, 'Colonia Arroyo Polo 2° Sección'),
(2324, 202, 'Ejido Luis Echeverría Álvarez'),
(2325, 202, 'Ejido Palmar'),
(2326, 202, 'Colonia Leandro Rovirosa Wade'),
(2327, 202, 'Ranchería Arroyo Polo 1ª Sección'),
(2328, 202, 'Colonia San Román'),
(2329, 202, 'Colonia Quinta María'),
(2330, 202, 'Colonia Infonavit'),
(2331, 202, 'Colonia Arroyo Polo 3ra.Sección'),
(2332, 202, 'Fraccionamiento Arenal Frontera'),
(2333, 202, 'Fraccionamiento Grijalva 1-Frontera'),
(2334, 202, 'Fraccionamiento Grijalva 2-Frontera'),
(2335, 202, 'Fraccionamiento Fovisste-Frontera'),
(2336, 202, 'Fraccionamiento Nueva Alianza-Frontera'),
(2337, 202, 'Fraccionamiento Nueva Frontera'),
(2338, 202, 'Sector La Corregidora 0172'),
(2339, 202, 'Sector Santa Eulalia 0175'),
(2340, 202, 'Sector Alberto Correa Zapata'),
(2341, 202, 'Sector Francisco Javier Mina 0178'),
(2342, 202, 'Sector Centro 0173'),
(2343, 202, 'Sector Pravia 169'),
(2344, 202, 'Sector Vicente Guerrero'),
(2345, 202, 'Sector Santos Degollado 0181'),
(2346, 202, 'Sector Independencia Y Grijalva 0177'),
(2347, 202, 'Sector Panteón Nuevo 0170'),
(2348, 202, 'Sector Panteón Nuevo 0170\"A\"'),
(2349, 202, 'Sector León Alejo Torres 0171'),
(2350, 202, 'Sector Carretera Cet-Mar 0168\"A\"'),
(2351, 202, 'Sector Soledad G. Ruiz 0168'),
(2352, 202, 'Sector Siglo XXI 0176\"A\"'),
(2353, 202, 'Sector Ignacio Mejía Y Riva Palacio 169'),
(2354, 202, 'Ejido La Estrella'),
(2355, 202, 'Ejido Nueva Esperanza'),
(2356, 202, 'Ejido Nuevo Centla'),
(2357, 202, 'Colonia Barra de San Pedro'),
(2358, 202, 'Carlos Rovirosa 2da Sección'),
(2359, 202, 'Ejido La Victoria'),
(2360, 202, 'Colonia El Bosque'),
(2361, 202, 'Ejido Carlos Rovirosa 1ra Sección'),
(2362, 202, 'Ejido Tembladera'),
(2363, 202, 'Ejido El Faisán'),
(2364, 202, 'Poblado Francisco I Madero'),
(2365, 202, 'Ejido Libertad de Allende'),
(2366, 202, 'Ranchería Felipe Carrillo Puerto Norte'),
(2367, 202, 'Ejido Francisco I. Madero'),
(2368, 202, 'Ranchería Kilometro 18'),
(2369, 202, 'Ejido Felipe Carrillo Puerto'),
(2370, 202, 'Ranchería Felipe Carrillo Puerto Sur'),
(2371, 202, 'Ejido Concha Linares'),
(2372, 202, 'Fraccionamiento Miramar de Francisco I. Madero'),
(2373, 202, 'Poblado Francisco I Madero'),
(2374, 202, 'Ejido Libertad de Allende'),
(2375, 202, 'Ranchería Felipe Carrillo Puerto Norte'),
(2376, 202, 'Ejido Francisco I. Madero'),
(2377, 202, 'Ranchería Kilometro 18'),
(2378, 202, 'Ejido Felipe Carrillo Puerto'),
(2379, 202, 'Ranchería Felipe Carrillo Puerto Sur'),
(2380, 202, 'Ejido Concha Linares'),
(2381, 202, 'Fraccionamiento Miramar de Francisco I. Madero'),
(2382, 202, 'Vicente Guerrero'),
(2383, 202, 'Ranchería Niños Héroes'),
(2384, 202, 'Ranchería Triunfo'),
(2385, 202, 'Ranchería El Limón de Vicente Guerrero'),
(2386, 202, 'Ranchería Leandro Rovirosa Wade 1ra. Sección'),
(2387, 202, 'Ranchería Gregorio Méndez Magaña'),
(2388, 202, 'Ranchería El Carmen 1ª Sección'),
(2389, 202, 'Ranchería El Carmen 2ª Sección'),
(2390, 202, 'Ranchería El Guajuco'),
(2391, 202, 'Ranchería La Unión'),
(2392, 202, 'Ejido La Pimienta'),
(2393, 202, 'Ranchería El Porvenir'),
(2394, 202, 'Ranchería Francisco Villa'),
(2395, 202, 'Ranchería 27 de Febrero'),
(2396, 202, 'Ejido La Sabana'),
(2397, 202, 'Ranchería Leandro Rovirosa Wade'),
(2398, 202, 'Colonia Gobernador Cruz'),
(2399, 202, 'Ejido Emiliano Zapata de Vicente Guerrero'),
(2400, 202, 'Fraccionamiento Pico de Oro de Vicente Guerrero'),
(2401, 202, 'Villa Cuauhtémoc'),
(2402, 202, 'Colonia Carlos A Madrazo'),
(2403, 202, 'Colonia Emiliano Zapata'),
(2404, 202, 'Ranchería El Guatope'),
(2405, 202, 'Colonia Adolfo López Mateos'),
(2406, 202, 'Colonia El Bellote'),
(2407, 202, 'Colonia Rivera Alta'),
(2408, 202, 'Colonia Lázaro Cárdenas'),
(2409, 202, 'Poblado Ignacio Zaragoza'),
(2410, 202, 'Ranchería Jalapita'),
(2411, 202, 'Ranchería Cañaveral'),
(2412, 202, 'Ejido Francisco Villa (Guano Solo)'),
(2413, 202, 'Ranchería La Montaña'),
(2414, 202, 'Colonia San Juan'),
(2415, 202, 'Sector Paso Nuevo'),
(2416, 202, 'Poblado Simón Sarlat'),
(2417, 202, 'Ranchería Paso de Tabasquillo'),
(2418, 202, 'Ranchería El Limón de Simón Sarlat'),
(2419, 202, 'Ranchería Buena Vista'),
(2420, 202, 'Ranchería Potrerillo'),
(2421, 202, 'Ranchería Tabasquillo 1ª Sección'),
(2422, 202, 'Ranchería Tabasquillo 2ª Sección'),
(2423, 202, 'Ranchería San José de Simón Sarlat'),
(2424, 202, 'Ranchería Colonia Caparroso'),
(2425, 202, 'Ranchería Las Porfías'),
(2426, 202, 'Ejido General Emiliano Zapata de Tabasquillo'),
(2427, 202, 'Ejido El Cerco'),
(2428, 202, 'Poblado Quintín Arauz'),
(2429, 202, 'Ranchería Rivera Alta 3ª Sección'),
(2430, 202, 'Ranchería Las Palmas'),
(2431, 202, 'Ejido Tres Brazos'),
(2432, 202, 'Ranchería Rivera Alta Primera Sección'),
(2433, 202, 'Ejido las Tijeras'),
(2434, 202, 'Colonia Nueva Esperanza de Quintín Arauz'),
(2435, 202, 'Ranchería San Juanito De Tres Brazos'),
(2436, 202, 'Ranchería Boca De Pantoja'),
(2437, 202, 'Ejido Hablan Los Hechos'),
(2438, 202, 'Ejido Rivera Alta Salsipuedes'),
(2439, 202, 'Ejido Lázaro Cárdenas'),
(2440, 202, 'Ranchería Chichicastle 1ª Sección'),
(2441, 202, 'Ranchería Chichicastle 2ª Sección'),
(2442, 202, 'Ranchería Chichicastle 3ª Sección'),
(2443, 202, 'Ejido Rivera Alta de Quintín Arauz 3ª Sección'),
(2444, 202, 'Ejido el Porvenir de Quintín Arauz'),
(2445, 202, 'Sector Ensenada Margen Derecha. De Rivera Alta 1ª Sección'),
(2446, 202, 'Sector Punta de Manglar'),
(2447, 202, 'Ranchería Boca de Chilapa'),
(2448, 202, 'Ranchería Los Ídolos Margen Izquierda'),
(2449, 202, 'Ranchería Chilapa 2ª Sección Margen Derecha'),
(2450, 202, 'Ranchería Chilapa 1ª Sección Margen Derecha'),
(2451, 202, 'Ranchería Miguel Hidalgo'),
(2452, 202, 'Ejido José María Morelos y Pavón (Tintalillo)'),
(2453, 202, 'Ranchería Mixteca 2ª Sección'),
(2454, 202, 'Ranchería San Roque'),
(2455, 202, 'Ranchería Mixteca 3ª Sección'),
(2456, 202, 'Ranchería Mixteca 1ª Sección'),
(2457, 202, 'Ranchería Tasajera'),
(2458, 202, 'Ranchería Cañaveral Corcovado'),
(2459, 202, 'Ranchería Boca Grande 1ª Sección'),
(2460, 202, 'Ranchería Escoba'),
(2461, 202, 'Ranchería Chilapa Sección Margen Izquierda'),
(2462, 202, 'Ejido Josefa Ortiz de Domínguez'),
(2463, 202, 'Ejido María del Rosario Gutiérrez Eskildsen'),
(2464, 202, 'Ranchería Los Ídolos Margen Derecha'),
(2465, 202, 'Ejido Chilapa Afuera'),
(2466, 202, 'Ejido Laguna del Campo'),
(2467, 202, 'Ejido Profesor Nicolás Toache Díaz'),
(2468, 202, 'Ejido Plutarco Elías Calles'),
(2469, 202, 'Ejido Augusto Gómez Villanueva'),
(2470, 202, 'Ejido Profesor Rómulo Chachon Ponce'),
(2471, 202, 'Miguel Hidalgo de Chilapa'),
(2472, 202, 'Ejido el Desecho'),
(2473, 202, 'San Antonio Chilapa Afuera'),
(2474, 202, 'Sector Cañaveralito de Chilapa'),
(2475, 202, 'Sector Hormiguero de Chilapa'),
(2476, 202, 'Sector Boca Grande 2ª Sección');

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mensaje` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `dispositivo` varchar(25) NOT NULL,
  `useragent` text NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `email`, `mensaje`, `ip`, `dispositivo`, `useragent`, `datecreated`) VALUES
(2, 'Dani', 'dani.yam1097@gmail.com', 'hola, soy Dani y quiero vender una vaca', '187.184.166.115', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.80 Safari/537.36 Edg/98.0.1108.50', '2022-02-16 09:43:51'),
(3, 'Dani', 'alanalcolea@gmail.com', 'kjlk', '187.184.166.115', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.80 Safari/537.36 Edg/98.0.1108.50', '2022-02-16 12:09:11'),
(4, 'Prueba', 'prueba@prueba.com', 'paquete', '187.184.166.115', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.80 Safari/537.36 Edg/98.0.1108.50', '2022-02-16 13:52:05'),
(5, 'Asd', '99999999@alan.com', 'hola', '187.184.165.51', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', '2022-03-04 11:26:41'),
(6, 'Asd', 'alanalcolea@gmail.com', 'asdasd', '187.184.165.51', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', '2022-03-04 11:49:45'),
(7, 'Asdasd', 'alanalcolea@gmail.com', 'asdassad', '187.184.165.51', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:97.0) Gecko/20100101 Firefox/97.0', '2022-03-04 12:28:41'),
(8, 'Juan Rivas', 'juanrivas_tierra@outlook.com', 'premium', '187.184.164.179', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', '2022-03-11 10:46:07'),
(9, 'Alan', '9991114934', 'asdsad', '189.172.0.12', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', '2022-03-13 23:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_closed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `user_id`, `admin_id`, `is_closed`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, '2023-09-15 13:00:24', '2023-09-15 13:00:24'),
(2, 2, 1, 0, '2023-09-15 13:02:38', '2023-09-15 13:02:38'),
(3, 2, 1, 0, '2023-09-15 13:03:22', '2023-09-15 13:03:22'),
(4, 2, 1, 0, '2023-09-15 13:30:03', '2023-09-15 13:30:03'),
(5, 2, 1, 0, '2023-09-15 13:34:24', '2023-09-15 13:34:24'),
(6, 2, 1, 0, '2023-09-15 13:40:42', '2023-09-15 13:40:42'),
(7, 2, 1, 0, '2023-09-15 13:40:59', '2023-09-15 13:40:59'),
(8, 2, 1, 0, '2023-09-15 13:42:40', '2023-09-15 13:42:40'),
(9, 2, 1, 0, '2023-09-15 13:44:30', '2023-09-15 13:44:30'),
(10, 2, 1, 0, '2023-09-15 13:49:07', '2023-09-15 13:49:07'),
(11, 2, 1, 0, '2023-09-15 14:00:32', '2023-09-15 14:00:32'),
(12, 2, 1, 0, '2023-09-15 14:02:42', '2023-09-15 14:02:42'),
(13, 2, 1, 0, '2023-09-15 14:02:52', '2023-09-15 14:02:52'),
(14, 2, 1, 0, '2023-09-15 14:02:54', '2023-09-15 14:02:54'),
(15, 2, 1, 0, '2023-09-15 14:04:22', '2023-09-15 14:04:22'),
(16, 2, 1, 0, '2023-09-15 14:13:52', '2023-09-15 14:13:52'),
(17, 2, 1, 0, '2023-09-15 14:41:53', '2023-09-15 14:41:53'),
(18, 2, 1, 0, '2023-09-15 14:41:56', '2023-09-15 14:41:56'),
(19, 2, 1, 0, '2023-09-15 14:42:16', '2023-09-15 14:42:16'),
(20, 2, 1, 0, '2023-09-15 14:42:20', '2023-09-15 14:42:20'),
(21, 2, 1, 0, '2023-09-15 14:42:31', '2023-09-15 14:42:31'),
(22, 2, 1, 0, '2023-09-15 14:44:20', '2023-09-15 14:44:20'),
(23, 2, 1, 0, '2023-09-15 14:44:27', '2023-09-15 14:44:27'),
(24, 2, 1, 0, '2023-09-15 14:45:03', '2023-09-15 14:45:03'),
(25, 2, 1, 0, '2023-09-15 14:45:11', '2023-09-15 14:45:11'),
(26, 2, 1, 0, '2023-09-15 14:46:04', '2023-09-15 14:46:04'),
(27, 2, 1, 0, '2023-09-15 14:47:35', '2023-09-15 14:47:35'),
(28, 2, 1, 0, '2023-09-15 14:47:37', '2023-09-15 14:47:37'),
(29, 2, 1, 0, '2023-09-15 14:47:54', '2023-09-15 14:47:54'),
(30, 2, 1, 0, '2023-09-15 14:47:57', '2023-09-15 14:47:57'),
(31, 2, 1, 0, '2023-09-15 14:47:58', '2023-09-15 14:47:58'),
(32, 2, 1, 0, '2023-09-15 14:48:01', '2023-09-15 14:48:01'),
(33, 2, 1, 0, '2023-09-15 14:54:34', '2023-09-15 14:54:34'),
(34, 2, 1, 0, '2023-09-15 14:54:35', '2023-09-15 14:54:35'),
(35, 2, 1, 0, '2023-09-15 14:54:38', '2023-09-15 14:54:38'),
(36, 2, 1, 0, '2023-09-15 14:58:45', '2023-09-15 14:58:45'),
(37, 2, 1, 0, '2023-09-15 14:58:48', '2023-09-15 14:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`id`, `nombre`) VALUES
(1, 'Yucatan'),
(2, 'Campeche'),
(3, 'Quintana Roo'),
(4, 'Chiapas'),
(5, 'Tabasco');

-- --------------------------------------------------------

--
-- Table structure for table `expo`
--

CREATE TABLE `expo` (
  `idproducto` bigint(20) NOT NULL,
  `categoriaid` bigint(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `ruta` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `rancho` varchar(50) DEFAULT NULL,
  `peso` int(4) DEFAULT NULL,
  `vendedorid` varchar(500) DEFAULT NULL,
  `comisariaid` bigint(20) DEFAULT NULL,
  `raza` varchar(255) DEFAULT NULL,
  `vacunado` varchar(255) DEFAULT NULL,
  `arete` varchar(255) DEFAULT NULL,
  `certificado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

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
-- Table structure for table `fiesta`
--

CREATE TABLE `fiesta` (
  `idfiesta` bigint(20) NOT NULL,
  `categoriaid` bigint(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `date` datetime NOT NULL,
  `datefinal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `fiesta`
--

INSERT INTO `fiesta` (`idfiesta`, `categoriaid`, `nombre`, `descripcion`, `imagen`, `datecreated`, `date`, `datefinal`) VALUES
(1, 1, 'Fiesta 1', 'Fiesta :D', NULL, '2022-06-14 12:01:14', '2022-06-30 14:00:50', '2022-07-31 14:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `imagen`
--

CREATE TABLE `imagen` (
  `id` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `imagen`
--

INSERT INTO `imagen` (`id`, `productoid`, `img`) VALUES
(590, 246, '48-GY-0828-IHnZ'),
(591, 246, '49-GY-0828-IHnZ'),
(592, 247, '50-GY-0828-IHnZ'),
(593, 247, '51-GY-0828-IHnZ'),
(594, 247, '52-GY-0828-IHnZ'),
(595, 248, '53-GY-0828-IHnZ'),
(596, 248, '54-GY-0828-IHnZ'),
(597, 251, '5-GY-1015-fdGL'),
(598, 251, '3-GY-1015-fdGL'),
(599, 251, '4-GY-1015-fdGL');

-- --------------------------------------------------------

--
-- Table structure for table `imagene`
--

CREATE TABLE `imagene` (
  `id` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imagenf`
--

CREATE TABLE `imagenf` (
  `id` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `imagenf`
--

INSERT INTO `imagenf` (`id`, `productoid`, `img`) VALUES
(1, 1, 'pro_1018ac4efefe93878b7468ce72c630a3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `imagenr`
--

CREATE TABLE `imagenr` (
  `id` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `imagenr`
--

INSERT INTO `imagenr` (`id`, `productoid`, `img`) VALUES
(36, 18, 'pro_ebd3be34f007ecf9918ad744fd90c23b.jpg'),
(38, 18, 'pro_95604eac56103176d1fbe8deb4f7fb36.jpg'),
(39, 18, 'pro_4d3122ea6b0fbb45be825448d739abfa.jpg'),
(40, 22, 'pro_9525460f0c850a575f845dd8008de9ef.jpg'),
(41, 22, 'pro_792c839ef58a20eceae696aea5158649.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `imagens`
--

CREATE TABLE `imagens` (
  `id` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `imagens`
--

INSERT INTO `imagens` (`id`, `productoid`, `img`) VALUES
(1, 13, '15-GYS-0916-hG9C'),
(2, 13, '16-GYS-0916-hG9C'),
(3, 13, '17-GYS-0916-hG9C'),
(4, 14, '0-GYS-0920-25eA'),
(5, 14, '1-GYS-0920-25eA'),
(6, 15, '4-GYS-0920-25eA'),
(7, 15, '2-GYS-0920-25eA'),
(8, 15, '3-GYS-0920-25eA'),
(9, 16, '4-GYS-0920-25eA'),
(10, 16, '2-GYS-0920-25eA'),
(11, 16, '3-GYS-0920-25eA'),
(12, 17, '4-GYS-0920-25eA'),
(13, 17, '2-GYS-0920-25eA'),
(14, 17, '3-GYS-0920-25eA'),
(15, 18, '4-GYS-0920-25eA'),
(16, 18, '2-GYS-0920-25eA'),
(17, 18, '3-GYS-0920-25eA'),
(18, 19, '0-GYS-0922-6vxq'),
(19, 19, '1-GYS-0922-6vxq'),
(20, 19, '2-GYS-0922-6vxq'),
(21, 20, '3-GYS-0922-6vxq'),
(22, 20, '4-GYS-0922-6vxq'),
(23, 21, '2-GYS-0923-pcEk'),
(24, 21, '3-GYS-0923-pcEk'),
(25, 21, '4-GYS-0923-pcEk'),
(26, 22, '0-GYS-0928-WfQ2'),
(27, 22, '1-GYS-0928-WfQ2'),
(28, 23, '5-GYS-0928-WfQ2'),
(29, 23, '6-GYS-0928-WfQ2'),
(30, 23, '7-GYS-0928-WfQ2'),
(31, 24, '0-GYS-1004-7UWc'),
(32, 24, '1-GYS-1004-7UWc');

-- --------------------------------------------------------

--
-- Table structure for table `imagent`
--

CREATE TABLE `imagent` (
  `id` bigint(20) NOT NULL,
  `id_producto` bigint(20) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `imagent`
--

INSERT INTO `imagent` (`id`, `id_producto`, `ruta`) VALUES
(6, 61, 'tianguis/61/GYT-1003-BGm.webp'),
(7, 61, 'tianguis/61/GYT-1003-dN7.webp'),
(24, 73, '0-GYC-1009-MAfl'),
(25, 73, '1-GYC-1009-MAfl'),
(26, 74, 'tianguis/74/GYT-1010-h23.webp'),
(27, 74, 'tianguis/74/GYT-1010-mHa.webp'),
(28, 74, 'tianguis/74/GYT-1010-hza.webp'),
(29, 74, 'tianguis/74/GYT-1010-hNn.webp');

-- --------------------------------------------------------

--
-- Table structure for table `mensaje`
--

CREATE TABLE `mensaje` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mensaje` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `dispositivo` varchar(25) NOT NULL,
  `useragent` text NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `vendedorid` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `mensaje`
--

INSERT INTO `mensaje` (`id`, `nombre`, `email`, `mensaje`, `ip`, `dispositivo`, `useragent`, `datecreated`, `vendedorid`, `status`) VALUES
(18, 'Asdasd', '12312', 'Nuevo Mensaje para el producto imagenesss asdas', '127.0.0.1', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/116.0', '2023-08-31 00:00:00', 252, 0),
(19, 'Asdasd', '123', 'Nuevo Mensaje para el producto imagenesss asdas', '127.0.0.1', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/116.0', '2023-08-31 00:00:00', 252, 0),
(20, 'Sadasd', '23123', 'Nuevo Mensaje para el producto imagenesss asdas', '127.0.0.1', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/116.0', '2023-08-31 00:00:00', 252, 0),
(21, 'Alanalcolea', '1231231232', 'Nuevo Mensaje para el producto Producto Nuevo', '127.0.0.1', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.46', '2023-10-16 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'asdsad', NULL, NULL);

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
(1, '0000_00_00_000000_create_websockets_statistics_entries_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_27_091912_create_messages_table', 2),
(7, '2023_08_27_091801_create_conversations_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Usuarios', 'Usuarios del sistema', 1),
(3, 'Clientes', 'Clientes de tienda', 1),
(4, 'Productos', 'Todos los productos', 1),
(5, 'Pedidos', 'Pedidos', 1),
(6, 'Caterogías', 'Caterogías Productos', 1),
(7, 'Suscriptores', 'Suscriptores del sitio web', 1),
(8, 'Contactos', 'Mensajes del formulario contacto', 1),
(9, 'Páginas', 'Páginas del sitio web', 1),
(10, 'Mensajes', 'Mensajes clientes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ofertasub`
--

CREATE TABLE `ofertasub` (
  `id` int(11) NOT NULL,
  `oferta` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `idProducto` int(11) NOT NULL,
  `comprador` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0,
  `m` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`, `m`) VALUES
(287, 1, 1, 1, 1, 1, 1, NULL),
(288, 1, 2, 1, 1, 1, 1, NULL),
(289, 1, 3, 1, 1, 1, 1, NULL),
(290, 1, 4, 1, 1, 1, 1, NULL),
(291, 1, 5, 1, 1, 1, 1, NULL),
(292, 1, 6, 1, 1, 1, 1, NULL),
(293, 1, 7, 1, 1, 1, 1, NULL),
(294, 1, 8, 1, 1, 1, 1, NULL),
(295, 1, 9, 1, 1, 1, 1, NULL),
(296, 1, 10, 1, 1, 1, 1, NULL),
(297, 3, 1, 1, 1, 1, 1, NULL),
(298, 3, 2, 0, 0, 0, 0, NULL),
(299, 3, 3, 0, 0, 0, 0, NULL),
(300, 3, 4, 1, 1, 1, 1, NULL),
(301, 3, 5, 1, 0, 0, 0, NULL),
(302, 3, 6, 0, 0, 0, 0, NULL),
(303, 3, 7, 0, 0, 0, 0, NULL),
(304, 3, 8, 0, 0, 0, 0, NULL),
(305, 3, 9, 0, 0, 0, 0, NULL),
(306, 3, 10, 1, 0, 0, 1, NULL),
(317, 6, 1, 0, 0, 0, 0, NULL),
(318, 6, 2, 0, 0, 0, 0, NULL),
(319, 6, 3, 0, 0, 0, 0, NULL),
(320, 6, 4, 1, 1, 1, 1, NULL),
(321, 6, 5, 0, 0, 0, 0, NULL),
(322, 6, 6, 0, 0, 0, 0, NULL),
(323, 6, 7, 0, 0, 0, 0, NULL),
(324, 6, 8, 0, 0, 0, 0, NULL),
(325, 6, 9, 0, 0, 0, 0, NULL),
(326, 6, 10, 1, 0, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `idpersona` bigint(20) NOT NULL,
  `identificacion` varchar(30) DEFAULT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `email_user` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `nit` varchar(20) DEFAULT NULL,
  `nombrefiscal` varchar(80) DEFAULT NULL,
  `direccionfiscal` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `rolid` bigint(20) DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `ult_vez` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `current_session` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `asociacion` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`idpersona`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `password`, `nit`, `nombrefiscal`, `direccionfiscal`, `token`, `rolid`, `datecreated`, `ult_vez`, `status`, `current_session`, `estado`, `foto`, `asociacion`, `updated_at`) VALUES
(1, '', 'Ganado', 'Yucatán', 9991152218, 'ganadoyucatan', '$2y$10$PY/wRKs3lMNH9fvFHoOhNevjDcRA9FuPoGFIxXcG9zwVSDp.O9XB6', NULL, NULL, NULL, NULL, 1, '2022-04-08 08:32:36', '2023-10-18 12:10:50', 1, 0, 0, '9991152218.webp', NULL, '2023-07-07 00:46:30'),
(2, NULL, 'Juanito', 'Rivassss', 9991114031, '9991114031', '$2y$10$YDeTrowTyAgrdf0Js1xCN.f1ALM.Fwe0W6M7WBAxqwKxwXoSUBeZa', NULL, NULL, NULL, NULL, 6, '2023-07-08 18:52:00', '2023-10-10 21:09:15', 1, NULL, NULL, '9991114031.webp', 'hola', NULL);

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
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idpost` bigint(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `portada` varchar(100) DEFAULT NULL,
  `datecreate` datetime NOT NULL DEFAULT current_timestamp(),
  `ruta` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idpost`, `titulo`, `contenido`, `portada`, `datecreate`, `ruta`, `status`) VALUES
(1, 'Inicio', '<div class=\"p-t-80\"> <h3 class=\"ltext-103 cl5\">Nuestras marcas Hola</h3> </div> <div> <p>Trabajamos con las mejores marcas del mundo ...</p> </div> <div class=\"row\"> <div class=\"col-md-3\"><img src=\"Assets/images/m1.png\" alt=\"Marca 1\" width=\"110\" height=\"110\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/m2.png\" alt=\"Marca 2\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/m3.png\" alt=\"Marca 3\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/m4.png\" alt=\"Marca 4\" /></div> </div>', '', '2021-07-20 02:40:15', 'inicio', 1),
(2, 'Tienda', '<p>Contenido p&aacute;gina!</p>', '', '2021-08-06 01:21:27', 'tienda', 1),
(3, 'Carrito', '<p>Contenido p&aacute;gina!</p>', '', '2021-08-06 01:21:52', 'carrito', 0),
(4, 'Nosotros', '<section class=\"bg100 p-t-25 p-b-120\"> <div class=\"container\"> <div class=\"row p-b-40\"> <div class=\"col-md-7 col-lg-8\"> <div class=\"p-t-7 p-r-85 p-r-15-lg p-r-0-md\"> <h3 class=\"mtext-111 cl2 p-b-16\">Historia</h3> <p class=\"stext-113 cl6 p-b-26\">Somos una empresa creada en el Estado de Yucat&aacute;n y nuestro principal objetivo es impulsar la<br />econom&iacute;a del Estado en el sector ganadero. Hemos desarrollado esta herramienta porque nos<br />dimos cuenta que, con la pandemia, muchos de los ganaderos se quedaron sin exposiciones o<br />ferias, donde nos deleitaban con sus bellos animales.<br />Y es por eso que nace esta plataforma llamada &ldquo;Ganado Yucat&aacute;n&rdquo; donde podr&aacute;n promover su<br />ganado con el fin de encontrar clientes y as&iacute; lograr sus ventas. Y algo incre&iacute;ble, es que en esta<br />plataforma se podr&aacute;n anunciar las fiestas de cada municipio con el fin de que m&aacute;s visitantes<br />lleguen a los bellos pueblos de Yucat&aacute;n.<br />&iexcl;Conoce nuestra plataforma!</p> <h2 class=\"mtext-111 cl2 p-t-25\"><span style=\"color: #236fa1;\">Nuestra Visi&oacute;n:</span></h2> <p class=\"stext-113 cl6 p-b-26\">Queremos ser un corporativo con el portal digital n&uacute;mero 1 en M&eacute;xico que apoye el sector<br />ganadero.</p> </div> </div> <div class=\"col-11 col-md-5 col-lg-4 m-lr-auto\"> <div class=\"how-bor1 \"> <div class=\"hov-img0\"><img src=\"https://cdn.pixabay.com/photo/2022/02/04/10/31/cow-6992475_1280.jpg\" alt=\"IMG\" width=\"540\" height=\"360\" /></div> </div> </div> </div> <div class=\"row\"> <div class=\"order-md-2 col-md-7 col-lg-8 p-b-30\"> <div class=\"p-t-7 p-l-85 p-l-15-lg p-l-0-md\"> <h2 class=\"mtext-111 cl2 p-t-25\"><span style=\"color: #236fa1;\">Nuestra Misi&oacute;n</span></h2> <p class=\"stext-113 cl6 p-b-26\">Nuestra misi&oacute;n es darle un impulso al mercado ganadero de toda la Rep&uacute;blica mexicana,<br />garantiz&aacute;ndole la seguridad y el compromiso de realizar negociaciones entre los estados con el fin<br />de obtener &eacute;xito.</p> </div> </div> <div class=\"order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30\"> <div class=\"how-bor2\"> <div class=\"hov-img0\"><img src=\"https://cdn.pixabay.com/photo/2016/10/04/23/52/cow-1715829_1280.jpg\" alt=\"IMG\" width=\"615\" height=\"410\" /></div> </div> </div> </div> </div> </section>', 'img_2f644b056a9fd3624c7595d24b1d9273.jpg', '2021-08-09 03:09:44', 'nosotros', 1),
(5, 'Contacto', '<div class=\"map\"><iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3830096.780994916!2d-91.12848452835159!3d20.369325119882912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f59e3c0b627dc33%3A0x30ae11a8a469643!2sPen%C3%ADnsula%20de%20Yucat%C3%A1n!5e0!3m2!1ses-419!2smx!4v1649699395496!5m2!1ses-419!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe></div>', 'img_3024f13dc010ffab8c22da05ac6a32b9.jpg', '2021-08-09 03:11:08', 'contacto', 1),
(6, '¡Atención Directa!', '<p><strong>&iexcl;Te ayudamos a subir tus productos! </strong>Si necesitas ayuda/asesor&iacute;a para subir tus productos en nuestro sistema por favor contacta a este n&uacute;mero: <span class=\"_971z\"></span>9992359443<a href=\"https://wa.me/+529992359443\" target=\"_blank\" data-tooltip=\"WhatsApp\"><i class=\"fab fa-whatsapp\" aria-hidden=\"true\"></i></a></p>', '', '2021-08-11 01:24:19', 'preguntas-frecuentes', 1),
(9, 'Not Found', '<h1>Error 404: P&aacute;gina no encontrada</h1> <p>No se encuentra la p&aacute;gina que ha solicitado.</p>', '', '2021-08-12 02:30:49', 'not-found', 1),
(10, 'Categoria', '<p>Prueba</p>', 'img_91e00d5d012536f48dae62851d2671e1.jpg', '2022-02-15 23:13:39', 'prueba', 0),
(13, 'Transporte', '<?php \r\nheaderTienda($data);\r\n$banner = $data[\'page\'][\'portada\'];\r\n$idpagina = $data[\'page\'][\'idpost\'];\r\n\r\n ?>\r\n<script>\r\n    document.querySelector(\'header\').classList.add(\'header-v4\');\r\n </script>\r\n<!-- Title page -->\r\n<!-- <section class=\"bg-img1 txt-center p-lr-15 p-tb-92\" style=\"background-image: url(<?= $banner ?>);\">\r\n    <h2 class=\"ltext-105 cl0 txt-center\">\r\n        Contacto\r\n    </h2>\r\n</section> -->\r\n\r\n<?php\r\n    if(viewPage($idpagina)){    \r\n ?>\r\n<!-- Content page -->\r\n<section class=\"bg0 p-t-104 p-b-116\">\r\n    <div class=\"container\">\r\n        <div class=\"flex-w flex-tr\">\r\n            <div class=\"size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md\">\r\n                <form id=\"frmContacto\">\r\n                    <h4 class=\"mtext-105 cl2 txt-center p-b-30\">\r\n                        Enviar un mensaje\r\n                    </h4>\r\n\r\n                    <div class=\"bor8 m-b-20 how-pos4-parent\">\r\n                        <input class=\"stext-111 cl2 plh3 size-116 p-l-62 p-r-30\" type=\"text\" id=\"nombreContacto\" name=\"nombreContacto\" placeholder=\"Nombre completo\">\r\n                        <img class=\"how-pos4 pointer-none\" src=\"<?= media() ?>/tienda/images/icons/icon-name.png\" alt=\"ICON\" style=\"width: 28px;\">\r\n                    </div>\r\n\r\n                    <div class=\"bor8 m-b-20 how-pos4-parent\">\r\n                        <input class=\"stext-111 cl2 plh3 size-116 p-l-62 p-r-30\" type=\"text\" id=\"emailContacto\" name=\"emailContacto\" placeholder=\"Correo electrónico\">\r\n                        <img class=\"how-pos4 pointer-none\" src=\"<?= media() ?>/tienda/images/icons/icon-email.png\" alt=\"ICON\">\r\n                    </div>\r\n\r\n                    <div class=\"bor8 m-b-30\">\r\n                        <textarea class=\"stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25\" id=\"mensaje\" name=\"mensaje\" placeholder=\"Cual es tu pregunta o mensaje?\"></textarea>\r\n                    </div>\r\n\r\n                    <button class=\"flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer\">\r\n                        Enviar\r\n                    </button>\r\n                </form>\r\n            </div>\r\n\r\n            <div class=\"size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md\">\r\n                <div class=\"flex-w w-full p-b-42\">\r\n                    <span class=\"fs-18 cl5 txt-center size-211\">\r\n                        <span class=\"lnr lnr-map-marker\"></span>\r\n                    </span>\r\n\r\n                    <div class=\"size-212 p-t-2\">\r\n                        <span class=\"mtext-110 cl2\">\r\n                            Dirección\r\n                        </span>\r\n\r\n                        <p class=\"stext-115 cl6 size-213 p-t-18\">\r\n                            <?= DIRECCION ?>\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n\r\n                <div class=\"flex-w w-full p-b-42\">\r\n                    <span class=\"fs-18 cl5 txt-center size-211\">\r\n                        <span class=\"lnr lnr-phone-handset\"></span>\r\n                    </span>\r\n\r\n                    <div class=\"size-212 p-t-2\">\r\n                        <span class=\"mtext-110 cl2\">\r\n                            Teléfono\r\n                        </span>\r\n\r\n                        <p class=\"stext-115 cl1 size-213 p-t-18\">\r\n\r\n                            <a class=\"\" href=\"tel:<?= TELEMPRESA ?>\"><?= TELEMPRESA ?></a>\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n\r\n                <div class=\"flex-w w-full\">\r\n                    <span class=\"fs-18 cl5 txt-center size-211\">\r\n                        <span class=\"lnr lnr-envelope\"></span>\r\n                    </span>\r\n\r\n                    <div class=\"size-212 p-t-2\">\r\n                        <span class=\"mtext-110 cl2\">\r\n                            E-mail\r\n                        </span>\r\n\r\n                        <p class=\"stext-115 cl1 size-213 p-t-18\">\r\n                            <a class=\"\" href=\"mailto:<?= EMAIL_EMPRESA ?>\"><?= EMAIL_EMPRESA ?>\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</section>  \r\n<?php \r\n        echo $data[\'page\'][\'contenido\'];\r\n    }else{\r\n?>\r\n<div>\r\n    <div class=\"container-fluid py-5 text-center\" >\r\n        <img src=\"<?= media() ?>/images/construction.png\" alt=\"En construcción\">\r\n        <h3>Estamos trabajando para usted.</h3>\r\n    </div>\r\n</div>\r\n<?php \r\n    }\r\n    footerTienda($data);\r\n?>', '', '2022-04-11 11:41:33', 'transporte', 1),
(14, 'Exposicion', '<p>contenido</p>', '', '2022-05-23 07:33:01', 'exposicion', 1),
(15, 'TransporteTizimin', '<p>asd</p>', '', '2022-06-03 11:53:58', 'transporte_tizimin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `idproducto` bigint(20) NOT NULL,
  `portada` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `ruta` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `rancho` varchar(50) DEFAULT NULL,
  `peso` int(4) DEFAULT NULL,
  `vendedorid` varchar(500) DEFAULT NULL,
  `carpeta` varchar(20) NOT NULL,
  `raza` varchar(255) DEFAULT NULL,
  `vacunado` varchar(255) DEFAULT NULL,
  `arete` varchar(255) DEFAULT NULL,
  `certificado` varchar(255) DEFAULT NULL,
  `estatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `ciudad` int(11) DEFAULT NULL,
  `comisaria` int(11) DEFAULT NULL,
  `premium` varchar(255) DEFAULT NULL,
  `edad` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`idproducto`, `portada`, `nombre`, `descripcion`, `precio`, `stock`, `tipo`, `datecreated`, `ruta`, `status`, `rancho`, `peso`, `vendedorid`, `carpeta`, `raza`, `vacunado`, `arete`, `certificado`, `estatus`, `link`, `estado`, `ciudad`, `comisaria`, `premium`, `edad`) VALUES
(246, '48-GY-0828-IHnZ', 'imagenesss asdas', 'asdasd', 231.00, 12, 'Toro', '2023-08-28 11:30:48', 'imagenesss-asdas', 1, '12', 121, '2', '2023-08-28', 'Charolesa', 'Vacunado', 'Con Arete', 'Certificado', '1', 'https://www.youtube.com/watch?v=-GhohSAovGo', 1, NULL, NULL, '{\"destacado\":\"on\",\"premium\":\"on\"}', 2131),
(247, '50-GY-0828-IHnZ', 'imagenesss asdas', 'asdasd', 231.00, 12, 'Toro', '2023-08-28 11:31:43', 'imagenesss-asdas', 1, '12', 121, '2', '2023-08-28', 'Brahman rojo', 'Vacunado', 'Con Arete', 'Certificado', '1', 'https://www.youtube.com/watch?v=-GhohSAovGo', 2, 105, NULL, '{\"destacado\":\"on\",\"premium\":\"on\"}', 2131),
(248, '53-GY-0828-IHnZ', 'cambio nombre', 'asdasd12', 231.00, 12, NULL, '2023-08-28 11:32:53', 'imagenesss-asdas', 1, '12', 121, '2', '2023-08-28', NULL, NULL, NULL, NULL, '3', 'https://www.youtube.com/watch?v=-GhohSAovGo', 2, 106, NULL, '{\"destacado\":null,\"premium\":null}', 2131),
(251, '5-GY-1015-fdGL', 'Producto Nuevo2', 'Este es un producto saludos', 123.00, 122, NULL, '2023-10-15 23:59:18', 'producto-nuevo', 2, 'Rancho de Genético', 12, '1', '2023-10-15', NULL, NULL, NULL, NULL, '3', 'https://www.youtube.com/watch?v=yAIxQrAwBlI', 4, 147, 1551, '{\"destacado\":null,\"premium\":null}', 123);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `yt` varchar(255) DEFAULT NULL,
  `carpeta` varchar(255) DEFAULT NULL,
  `portada` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `rancho` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `vacunado` varchar(255) DEFAULT NULL,
  `arete` varchar(255) DEFAULT NULL,
  `certificado` varchar(255) DEFAULT NULL,
  `precioMin` int(11) DEFAULT NULL,
  `precioMax` int(11) DEFAULT NULL,
  `fechaCierre` datetime DEFAULT NULL,
  `fechaCreado` datetime DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `vendedorid` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `yt`, `carpeta`, `portada`, `estado`, `ciudad`, `municipio`, `peso`, `edad`, `precio`, `cantidad`, `rancho`, `tipo`, `vacunado`, `arete`, `certificado`, `precioMin`, `precioMax`, `fechaCierre`, `fechaCreado`, `updated_at`, `created_at`, `vendedorid`, `status`) VALUES
(23, 'Subasta!!!', 'asdasdas', 'enalcne', '2023-09-28', '5-GYS-0928-WfQ2', 1, '15', '247', 1, 2, NULL, 12, 'Rancho subasta', 'Ternero', 'Vacunado', 'Con Arete', 'Certificado', 1, 2, '2023-09-30 12:12:00', '2023-09-28 23:55:47', NULL, NULL, 1, 1),
(24, 'asdasd', 'asdasd', '123', '2023-10-04', '0-GYS-1004-7UWc', 4, '172', '1931', 1, 2, NULL, 1, '1', 'Ternero', 'Vacunado', 'Con Arete', 'Certificado', 1, 2, '2023-10-26 12:12:00', '2023-10-04 19:56:22', NULL, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productot`
--

CREATE TABLE `productot` (
  `idproducto` bigint(20) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `ciudad` int(11) DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `numero` bigint(20) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `ruta` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `rancho` varchar(50) DEFAULT NULL,
  `peso` int(4) DEFAULT NULL,
  `raza` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `vacunado` varchar(255) DEFAULT NULL,
  `arete` varchar(255) DEFAULT NULL,
  `certificado` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `estatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `propietario` varchar(255) DEFAULT NULL,
  `vendedorid` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `productot`
--

INSERT INTO `productot` (`idproducto`, `estado`, `ciudad`, `nombre`, `descripcion`, `precio`, `stock`, `numero`, `imagen`, `datecreated`, `ruta`, `status`, `rancho`, `peso`, `raza`, `vacunado`, `arete`, `certificado`, `tipo`, `estatus`, `link`, `propietario`, `vendedorid`) VALUES
(61, 2, 106, 'prueba gratis', 'asdasdas', 2.00, 2, 9991114034, NULL, '2023-10-03 02:34:15', 'prueba-gratis', 2, 'Rancho', 1, 'raza', 'Vacunado', 'arete', 'Certificado', 'Destetes', NULL, 'asdklasjd', 'mi nombre', 1),
(73, 2, 106, 'Aprob', 'asdasdas', 2.00, 2, 9991114034, NULL, '2023-10-09 22:02:34', 'prueba-gratis', 2, 'Rancho', 1, 'raza', 'Vacunado', 'arete', 'Certificado', 'Destetes', NULL, 'asdklasjd', 'mi nombre', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rancho`
--

CREATE TABLE `rancho` (
  `idproducto` bigint(20) NOT NULL,
  `categoriaid` bigint(20) NOT NULL,
  `hectareas` bigint(30) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `regimen` varchar(255) DEFAULT NULL,
  `precio` decimal(11,2) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `ruta` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `operativo` int(11) NOT NULL DEFAULT 1,
  `vendedorid` bigint(20) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `foto3d` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `rancho`
--

INSERT INTO `rancho` (`idproducto`, `categoriaid`, `hectareas`, `nombre`, `descripcion`, `regimen`, `precio`, `imagen`, `datecreated`, `ruta`, `status`, `operativo`, `vendedorid`, `link`, `foto3d`) VALUES
(18, 65, 24, '¡¡GRAN RANCHO EN SUCILA YUCATÁN!!', '<p>&iexcl;&iexcl;RANCHO CON PLANTIO DE LIMON 24 HECTAREAS SUCILA‼️?</p> <p>‼️Enam&oacute;rate de este ranchito de 24 hect&aacute;reas a 1 km del Pueblo de Sucila Yucat&aacute;n cuenta con: ✅Casa con sistema de c&aacute;maras de vigilancia, llega se&ntilde;al de celular, energ&iacute;a a base de paneles solares, cochera y recibidor, 2 ba&ntilde;os, cocina y 2 cuarto.</p> <p>✅3 corrales y 1 trascorral hechas de mamposter&iacute;a.</p> <p>✅Pozo profundo y pozo artesanal con vena de cenote.</p> <p>✅una hect&aacute;rea de Taiwan zacate de corte con riego.</p> <p>✅3 corrales para carneros con techo de lamina ?Palapa de huano con piso 22 Hect&aacute;reas empastados con 13 cuadros de pasto, &aacute;rea de cultivo de hortalizas, &aacute;rea con riego para arboles frutales limones, aguacates. !!CUENTA CON 40 MATAS DE LIM&Oacute;N PERSA PRIMERA COSECHA CON SISTEMA DE RIEGO!!</p> <p>✅9 Paneles solares, para sistema de riego por aspersi&oacute;n de 1 hect&aacute;rea de taiw&aacute;n, adem&aacute;s abastece el &aacute;rea de hortalizas.</p> <p>✅Documento Certificado Parcelario inscrito ante la Ram</p> <p>✅PRECIO: $2 MILLONES 100 MIL A TRATO</p> <p>ll&aacute;menos al #9861002434 !!TRATO DIRECTO CON EL ULTIMO PRECIO CON EL DUE&Ntilde;O!!</p>', 'certificado Parcelario', 2100000.00, NULL, '2022-06-03 10:30:51', '¡¡gran-rancho-en-sucila-yucatan!!', 1, 1, 73, NULL, NULL),
(21, 1, 200, 'RANCHO SANTA MONICA', '<div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5a/1/16/1f4b0.png\" alt=\"????\" width=\"16\" height=\"16\" /></span><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5a/1/16/1f4b0.png\" alt=\"????\" width=\"16\" height=\"16\" /></span>ESPECTACULAR RANCHO DE 200 HECTAREAS PROPIEDAD PRIVADA EN VENTA EN LA CIUDAD DE TIZIMIN, YUCAT&Aacute;N, SOLO 18 MINUTOS DE LA CABECERA MUNICIPAL<span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5a/1/16/1f4b0.png\" alt=\"????\" width=\"16\" height=\"16\" /></span><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5a/1/16/1f4b0.png\" alt=\"????\" width=\"16\" height=\"16\" /></span></div> <div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1/1/16/1f40e.png\" alt=\"????\" width=\"16\" height=\"16\" /></span>FACIL ACCESO DE POR CAMINO PETROLIZADO Y CAMINO TERRACERO BLANCO EN BUEN ESTADO..</div> <div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1/1/16/1f40e.png\" alt=\"????\" width=\"16\" height=\"16\" /></span>TOTALMENTE CULTIVADO, EMPASTADO 80% DE ZACATE GUINEA, Y 20 % DE ZACATE BRIZANTA, ALTAMENTE PRODUCTIVO..</div> <div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1/1/16/1f40e.png\" alt=\"????\" width=\"16\" height=\"16\" /></span>EL PASTO SOPORTA 350 CABEZAS DE GANADO..</div> <div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1/1/16/1f40e.png\" alt=\"????\" width=\"16\" height=\"16\" /></span>TOTALMENTE CERCADO CON ALAMBRE DE PUAS DE 4 HILOS..</div> <div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1/1/16/1f40e.png\" alt=\"????\" width=\"16\" height=\"16\" /></span>COMEDEROS, BEBEDEROS EMBARCADEROS, BASCULA PARA PESAR GANADO DE 1500 KILOS.</div> <div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1/1/16/1f40e.png\" alt=\"????\" width=\"16\" height=\"16\" /></span>BODEGA Y CASA DE VAQUERO, TANQUE DE 40 MIL LITROS</div> <div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1/1/16/1f40e.png\" alt=\"????\" width=\"16\" height=\"16\" /></span>ES UN RANCHO TOTALMENTE PRODUCTIVO Y LISTO PARA ENGORDAR SUS ANIMALES..</div> <div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1/1/16/1f40e.png\" alt=\"????\" width=\"16\" height=\"16\" /></span>ES PROPIEDAD PRIVADA NO EJIDO..</div> <div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1/1/16/1f40e.png\" alt=\"????\" width=\"16\" height=\"16\" /></span>SE PIDE $21 MILLONES PRECIO FIJO NO NEGOCIABLES, NO INCLUYE ANIMALES, LOS ANIMALES SE TRATA A PARTE, SON GANADOS DE REGISTRO...</div> <div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1/1/16/1f40e.png\" alt=\"????\" width=\"16\" height=\"16\" /></span>EN TIZIM&Iacute;N, CONTAMOS CON UNA SUBASTA GANADERA, QUE LABORA TODOS LOS JUEVES EN EL CUAL USTED PUEDE COMPRAR O VENDER SUS ANIMALES..</div> <div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1/1/16/1f40e.png\" alt=\"????\" width=\"16\" height=\"16\" /></span>TIZIMIN, CIUDAD GANADERA POR EXCELENCIA, FAMOSA POR SU FERIA DE REYES EN EL MES DE ENERO, CIUDAD QUE SE ENCUENTRA A DOS HORAS DE LA CAPITAL M&Eacute;RIDA, SU GENTE MUY TRANQUILA Y TRATABLE, VENGA INVERTIR EN ESTA ZONA GANADERA POR EXCELENCIA, LE ASEGURAMOS QUE RECUPERA SU INVERSI&Oacute;N EN EL MENOR TIEMPO POSIBLE...</div> <div dir=\"auto\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t22/1/16/260e.png\" alt=\"☎\" width=\"16\" height=\"16\" /></span>LL&Aacute;MENOS Y AGENDE UN CITA AL 9861002434</div>', 'PROPIEDAD PRIVADA', 21000000.00, NULL, '2022-06-08 09:37:54', 'rancho-santa-monica', 1, 1, 73, NULL, NULL),
(22, 1, 200, '¡¡RANCHO SANTA MONICA!!', 'DE OPORTUNIDAD', 'certificado', 0.00, NULL, '2022-08-18 10:47:55', '¡¡rancho-santa-monica!!', 1, 1, 116, 'https://www.youtube.com/watch?v=EuVu-HXv8T8', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Administrador', 'Acceso a todo el sistema', 1),
(3, 'Cliente Pro', 'Clientes en general', 1),
(6, 'Cliente Basico', 'Cliente privilegios Pro', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subasta`
--

CREATE TABLE `subasta` (
  `id_subasta` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `tiempo_ini` datetime NOT NULL,
  `tiempo_fin` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `mejorOferta` int(255) DEFAULT NULL,
  `subastador` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `subasta`
--

INSERT INTO `subasta` (`id_subasta`, `min`, `max`, `tiempo_ini`, `tiempo_fin`, `estado`, `mejorOferta`, `subastador`, `id_producto`) VALUES
(4, 1, 2, '2023-09-28 23:55:47', '2023-09-30 12:12:00', 1, NULL, 1, 23),
(5, 1, 2, '2023-10-04 19:56:22', '2023-10-26 12:12:00', 1, NULL, 2, 24);

-- --------------------------------------------------------

--
-- Table structure for table `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `vendedorid` int(11) DEFAULT NULL,
  `idproducto` varchar(255) DEFAULT NULL,
  `type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `visitas`
--

INSERT INTO `visitas` (`id`, `ip`, `fecha`, `vendedorid`, `idproducto`, `type`) VALUES
(32839, '127.0.0.1', '2023-10-15 07:20:39', 2, '248', 'gen'),
(32840, '127.0.0.1', '2023-10-15 07:37:50', 2, '248', 'gen'),
(32841, '127.0.0.1', '2023-10-15 07:38:22', 2, '24', 'sub'),
(32842, '127.0.0.1', '2023-10-15 07:39:23', 2, '76', 'com'),
(32843, '127.0.0.1', '2023-10-15 07:40:25', 1, '73', 'com'),
(32844, '127.0.0.1', '2023-10-15 07:42:45', 2, '246', 'gen'),
(32845, '127.0.0.1', '2023-10-15 07:43:34', 2, '246', 'gen'),
(32846, '127.0.0.1', '2023-10-15 07:45:10', 2, '246', 'gen'),
(32847, '127.0.0.1', '2023-10-15 07:45:21', 2, '246', 'gen'),
(32848, '127.0.0.1', '2023-10-15 07:45:28', 2, '246', 'gen'),
(32849, '127.0.0.1', '2023-10-15 07:47:43', 2, '246', 'gen'),
(32850, '127.0.0.1', '2023-10-15 07:48:05', 2, '246', 'gen'),
(32851, '127.0.0.1', '2023-10-15 07:48:26', 2, '246', 'gen'),
(32852, '127.0.0.1', '2023-10-15 07:49:08', 2, '246', 'gen'),
(32853, '127.0.0.1', '2023-10-15 07:49:15', 2, '246', 'gen'),
(32854, '127.0.0.1', '2023-10-15 07:49:23', 2, '246', 'gen'),
(32855, '127.0.0.1', '2023-10-15 07:51:24', 2, '246', 'gen'),
(32856, '127.0.0.1', '2023-10-15 07:51:37', 2, '246', 'gen'),
(32857, '127.0.0.1', '2023-10-15 11:39:22', 1, '23', 'sub'),
(32858, '127.0.0.1', '2023-10-15 11:43:07', 2, '248', 'gen'),
(32859, '127.0.0.1', '2023-10-15 11:45:59', 2, '246', 'gen'),
(32860, '127.0.0.1', '2023-10-15 11:46:07', 1, '23', 'sub'),
(32861, '127.0.0.1', '2023-10-15 11:59:24', 1, '251', 'gen'),
(32862, '127.0.0.1', '2023-10-16 12:00:00', 1, '251', 'gen');

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `chat_login_details`
--
ALTER TABLE `chat_login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado_id` (`estado_id`);

--
-- Indexes for table `comisarias`
--
ALTER TABLE `comisarias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comisaria_id` (`ciudad_id`);

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expo`
--
ALTER TABLE `expo`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `categoriaid` (`categoriaid`) USING BTREE,
  ADD KEY `comisariaid` (`comisariaid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fiesta`
--
ALTER TABLE `fiesta`
  ADD PRIMARY KEY (`idfiesta`),
  ADD KEY `categoriaid` (`categoriaid`);

--
-- Indexes for table `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`);

--
-- Indexes for table `imagene`
--
ALTER TABLE `imagene`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`);

--
-- Indexes for table `imagenf`
--
ALTER TABLE `imagenf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`);

--
-- Indexes for table `imagenr`
--
ALTER TABLE `imagenr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`);

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagent`
--
ALTER TABLE `imagent`
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indexes for table `ofertasub`
--
ALTER TABLE `ofertasub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idProducto` (`idProducto`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indexes for table `productot`
--
ALTER TABLE `productot`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indexes for table `rancho`
--
ALTER TABLE `rancho`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `categoriaid` (`categoriaid`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indexes for table `subasta`
--
ALTER TABLE `subasta`
  ADD PRIMARY KEY (`id_subasta`);

--
-- Indexes for table `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_login_details`
--
ALTER TABLE `chat_login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comisarias`
--
ALTER TABLE `comisarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2477;

--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `expo`
--
ALTER TABLE `expo`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fiesta`
--
ALTER TABLE `fiesta`
  MODIFY `idfiesta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600;

--
-- AUTO_INCREMENT for table `imagene`
--
ALTER TABLE `imagene`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagenf`
--
ALTER TABLE `imagenf`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `imagenr`
--
ALTER TABLE `imagenr`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `imagent`
--
ALTER TABLE `imagent`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ofertasub`
--
ALTER TABLE `ofertasub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `productot`
--
ALTER TABLE `productot`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `rancho`
--
ALTER TABLE `rancho`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subasta`
--
ALTER TABLE `subasta`
  MODIFY `id_subasta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32863;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `ciudades_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`);

--
-- Constraints for table `comisarias`
--
ALTER TABLE `comisarias`
  ADD CONSTRAINT `comisarias_ibfk_1` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudades` (`id`);

--
-- Constraints for table `expo`
--
ALTER TABLE `expo`
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`categoriaid`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`comisariaid`) REFERENCES `comisaria` (`idcomisaria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imagene`
--
ALTER TABLE `imagene`
  ADD CONSTRAINT `imagen_ibfk_10` FOREIGN KEY (`productoid`) REFERENCES `expo` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imagenr`
--
ALTER TABLE `imagenr`
  ADD CONSTRAINT `imagenr_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `rancho` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ofertasub`
--
ALTER TABLE `ofertasub`
  ADD CONSTRAINT `fk_idProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
