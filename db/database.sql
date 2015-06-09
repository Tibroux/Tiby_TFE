-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 09 Juin 2015 à 22:22
-- Version du serveur: 5.5.43
-- Version de PHP: 5.4.41-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tibyvoesters`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `to` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `event` text COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` int(11) NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1019 ;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `uid`, `from`, `to`, `event`, `location`, `user`, `type`) VALUES
(892, 'S02_00519677f8147a9e5ba9d3b3a254adae0df084295ff665c942731ccc13@infogra\r', '2014-09-24 08:40:00', '2014-09-24 10:40:00', 'TP7 (Bourgaux)\r', 'C214\r', 1, 'event'),
(893, 'S03_00e222d6e9d3c2781d80e70da53ec84ff24d56bf3890c6e62e0f40d86b@infogra\r', '2014-10-02 08:40:00', '2014-10-02 12:50:00', 'T. speciales 2 (Di Nunzio)\r', 'A79\r', 1, 'event'),
(894, 'S03_00ddcec36c38b7d9acac12f15879e74cdb17194644a25cc295af606aad@infogra\r', '2014-10-03 08:40:00', '2014-10-03 12:50:00', 'T. speciales 3 (Thronte)\r', 'A79\r', 1, 'event'),
(895, 'S03_01ddcec36c38b7d9acac12f15879e74cdb17194644a25cc295af606aad@infogra\r', '2014-10-03 13:50:00', '2014-10-03 18:00:00', 'T. speciales 3 (Thronte)\r', 'A79\r', 1, 'event'),
(896, 'S03_00aacd43024be3769983b7efcd3646c4f48a10c58aab0e57168d9ec127@infogra\r', '2014-10-01 16:00:00', '2014-10-01 18:00:00', 'T.infog.app. 1 (Thronte)\r', 'A79\r', 1, 'event'),
(897, 'S03_00ae9c76c5372512882761ece9ef1099a1c15dede4e472df0f50ed9b7f@infogra\r', '2014-10-01 13:50:00', '2014-10-01 15:50:00', 'T.num.av. 1/2 (Di Nunzio)\r', 'A79\r', 1, 'event'),
(898, 'S03_00cb1800bbf6aa26b6239c8dde1f04547425f8c0c079d2e08b725122af@infogra\r', '2014-10-01 10:50:00', '2014-10-01 12:50:00', 'T.num.av. 1/3 (Saint Cricq)\r', 'A79\r', 1, 'event'),
(899, 'S03_0043c89225ecefdcd752c9af6d58bc57e9a2473757e1cec5cee9299080@infogra\r', '2014-10-03 09:40:00', '2014-10-03 12:50:00', 'T.num.av. 1/4 (Grothe)\r', 'A79\r', 1, 'event'),
(900, 'S03_002bc029a77c31ebb20742ea2e0c18ceb6826bb0b89b2d4da14d2caa67@infogra\r', '2014-10-02 13:50:00', '2014-10-02 18:00:00', 'Seminaire (Bourgaux)\r', 'A79\r', 1, 'event'),
(901, 'S03_0061f95fa9aa6c79503d9ea43353007f02e3d2df6657ab6edc4eae76a8@infogra\r', '2014-10-01 08:40:00', '2014-10-01 10:40:00', 'T. speciales 3 (Thronte)\r', 'A79\r', 1, 'event'),
(902, 'S03_0048a1430e07a1646cb092b155fbb5b251d0837f15ad834c8642133920@infogra\r', '2014-09-30 08:40:00', '2014-09-30 11:50:00', 'T.infog.app. 1 (Thronte)\r', 'B240\r', 1, 'event'),
(903, 'S04_00a3ac58b84da4deba5f0470bf1c6e460fb0d7f37a897b549d8c6892ac@infogra\r', '2014-10-07 08:40:00', '2014-10-07 12:50:00', 'T.num.av. 1/1 (Florence)\r', 'A79\r', 1, 'event'),
(904, 'S04_00f1a517cbe126883285dae733e7b3d3ca82f9012f48e9c4d9e1b3a14d@infogra\r', '2014-10-08 08:40:00', '2014-10-08 12:50:00', 'T.num.av. 1/2 (Di Nunzio)\r', 'A79\r', 1, 'event'),
(905, 'S04_000334547371a068979715445c50b8bc3665b381e9b0a607675c63ce15@infogra\r', '2014-10-08 13:50:00', '2014-10-08 18:00:00', 'T.num.av. 1/3 (Saint Cricq)\r', 'A79\r', 1, 'event'),
(906, 'S04_00fe600fd47634321b421afaa2752562b508e25725030e057403ef34f6@infogra\r', '2014-10-06 14:50:00', '2014-10-06 18:00:00', 'T.num.av. 1/4 (Grothe)\r', 'A79\r', 1, 'event'),
(907, 'S04_00bc91c9ebe42d38a98e3f657a332f91f7e81d339e2e3ff3a767d2b0c8@infogra\r', '2014-10-10 14:50:00', '2014-10-10 18:00:00', 'T. speciales 2 (Di Nunzio)\r', 'A79\r', 1, 'event'),
(908, 'S04_00252d60eed1b90d12532befe68ad6e04c88b6ab557eef394347a526ed@infogra\r', '2014-10-10 08:40:00', '2014-10-10 12:50:00', 'T.infog.app. 1 (Thronte)\r', 'A79\r', 1, 'event'),
(909, 'S04_01252d60eed1b90d12532befe68ad6e04c88b6ab557eef394347a526ed@infogra\r', '2014-10-10 13:50:00', '2014-10-10 14:50:00', 'T.infog.app. 1 (Thronte)\r', 'A79\r', 1, 'event'),
(910, 'S04_008a3e80179960e84b9be4e9fc5b35eebac90e6ad71c16bb4f89dd8ba2@infogra\r', '2014-10-08 08:40:00', '2014-10-08 13:50:00', 'T. speciales 3 (Thronte)\r', 'A79\r', 1, 'event'),
(911, 'S04_00a6a49bd6ead1d203ea70f1413da4187d3df59b0c62efbbcc59af4660@infogra\r', '2014-10-07 13:50:00', '2014-10-07 18:00:00', 'Seminaire (Bourgaux)\r', 'A79\r', 1, 'event'),
(912, 'S04_001e23d9ebea95988bf0227c22c507a63ce407cc97ad7665413e8e0504@infogra\r', '2014-10-06 08:40:00', '2014-10-06 12:50:00', 'T. speciales 3 (Thronte)\r', 'A79\r', 1, 'event'),
(913, 'S04_011e23d9ebea95988bf0227c22c507a63ce407cc97ad7665413e8e0504@infogra\r', '2014-10-06 13:50:00', '2014-10-06 14:50:00', 'T. speciales 3 (Thronte)\r', 'A79\r', 1, 'event'),
(914, 'S05_00d8ea554beb98f31847316d47e88a2edf76a230eb363a3385c67c25d1@infogra\r', '2014-10-14 13:50:00', '2014-10-14 18:00:00', 'T.num.av. 1/1 (Florence)\r', 'A79\r', 1, 'event'),
(915, 'S05_00ae9c76c5372512882761ece9ef1099a1c15dede4e472df0f50ed9b7f@infogra\r', '2014-10-14 10:50:00', '2014-10-14 12:50:00', 'T.num.av. 1/2 (Di Nunzio)\r', 'A79\r', 1, 'event'),
(916, 'S05_00cb1800bbf6aa26b6239c8dde1f04547425f8c0c079d2e08b725122af@infogra\r', '2014-10-15 10:50:00', '2014-10-15 12:50:00', 'T.num.av. 1/3 (Saint Cricq)\r', 'A79\r', 1, 'event'),
(917, 'S05_00e222d6e9d3c2781d80e70da53ec84ff24d56bf3890c6e62e0f40d86b@infogra\r', '2014-10-13 13:50:00', '2014-10-13 18:00:00', 'T. speciales 2 (Di Nunzio)\r', 'A79\r', 1, 'event'),
(918, 'S05_00aacd43024be3769983b7efcd3646c4f48a10c58aab0e57168d9ec127@infogra\r', '2014-10-14 08:40:00', '2014-10-14 10:40:00', 'T.infog.app. 1 (Thronte)\r', 'A79\r', 1, 'event'),
(919, 'S05_00ddcec36c38b7d9acac12f15879e74cdb17194644a25cc295af606aad@infogra\r', '2014-10-13 08:40:00', '2014-10-13 12:50:00', 'T. speciales 3 (Thronte)\r', 'A79\r', 1, 'event'),
(920, 'S05_00d031c20680f92c40af3d8c2405aaea49f1c342ca9f6c47c3c4252cc4@infogra\r', '2014-10-15 13:50:00', '2014-10-15 18:00:00', 'T. speciales 3 (Thronte)\r', 'B240\r', 1, 'event'),
(921, 'S14_00869c2a3f516ae588424356ba7d71ed6f1b22341d17a6c498c0555096@infogra\r', '2015-01-10 08:40:00', '2015-01-10 11:50:00', 'T.num.av. 2 (Di Stefano O)\r', 'B240\r', 1, 'event'),
(922, 'S15_00c35daf3f76e622f5b5d9108faecd57fa55eef92e7af92578489d9474@infogra\r', '2015-01-16 12:50:00', '2015-01-16 15:50:00', 'T. speciales 1 (Bourgaux)\r', 'A150\r', 1, 'event'),
(923, 'S15_006a3c014fbc1820ee462f952180714a1144989df4cf059264f330be7e@infogra\r', '2015-01-15 12:50:00', '2015-01-15 17:00:00', 'TP5 (Thronte)\r', 'D03\r', 1, 'event'),
(924, 'S15_00869c2a3f516ae588424356ba7d71ed6f1b22341d17a6c498c0555096@infogra\r', '2015-01-16 16:00:00', '2015-01-16 19:00:00', 'T.num.av. 2 (Di Stefano O)\r', 'B240\r', 1, 'event'),
(925, 'S16_00c3f0d9fb82747dd19c5618e1b414715ec8733a2c5ed40f1a101ae5b8@infogra\r', '2015-01-21 09:40:00', '2015-01-21 11:50:00', 'TP1 (Plennevaux)\r', 'A148\r', 1, 'event'),
(926, 'S16_01c3f0d9fb82747dd19c5618e1b414715ec8733a2c5ed40f1a101ae5b8@infogra\r', '2015-01-21 12:50:00', '2015-01-21 14:50:00', 'TP1 (Plennevaux)\r', 'A148\r', 1, 'event'),
(927, 'S16_002cf253ea02b0ac14058a933bb66a738247aa90f43c014bf611bb1af3@infogra\r', '2015-01-23 09:40:00', '2015-01-23 12:50:00', 'TP2 (Thronte)\r', 'A146\r', 1, 'event'),
(928, 'S16_008be5778ba08a892404544f11558b17678287a87f893b2d83c1921efa@infogra\r', '2015-01-22 12:50:00', '2015-01-22 17:00:00', 'TP3 (Di Nunzio)\r', 'C214\r', 1, 'event'),
(929, 'S16_00d8db7d2d2f0f728779ccc9735ced042ee189eaa77994698acf782626@infogra\r', '2015-01-19 13:50:00', '2015-01-19 18:00:00', 'TP7 (Bourgaux)\r', 'C214\r', 1, 'event'),
(930, 'S16_00c35daf3f76e622f5b5d9108faecd57fa55eef92e7af92578489d9474@infogra\r', '2015-01-23 12:50:00', '2015-01-23 15:50:00', 'T. speciales 1 (Bourgaux)\r', 'D03\r', 1, 'event'),
(931, 'S16_0010ce57f1a511bf8e0f35a79dfd29cf6dc782aa16bbba9e32b62843cc@infogra\r', '2015-01-20 12:50:00', '2015-01-20 17:00:00', 'TP5 (Thronte)\r', 'A79\r', 1, 'event'),
(932, 'S16_00869c2a3f516ae588424356ba7d71ed6f1b22341d17a6c498c0555096@infogra\r', '2015-01-24 11:50:00', '2015-01-24 14:50:00', 'T.num.av. 2 (Di Stefano O)\r', 'B240\r', 1, 'event'),
(933, 'S16_00485e3ed16613771a233662f4751ee4c5d829c52e190277eae33806fe@infogra\r', '2015-01-20 08:40:00', '2015-01-20 12:50:00', 'Seminaire (Plennevaux)\r', 'B99\r', 1, 'event'),
(934, 'S17_0066b72200f19b649141830fc6e00048fc1aa784db9588c8a87e2062d9@infogra\r', '2015-01-27 10:50:00', '2015-01-27 12:50:00', 'T.infog.app. 2/2 (Plennevaux)\r', 'B240\r', 1, 'event'),
(935, 'S17_0166b72200f19b649141830fc6e00048fc1aa784db9588c8a87e2062d9@infogra\r', '2015-01-27 13:50:00', '2015-01-27 15:50:00', 'T.infog.app. 2/2 (Plennevaux)\r', 'B240\r', 1, 'event'),
(936, 'S17_001ae674af46e8b40906d022464fc864de04a0b4b5fb93d4a2e6951fa3@infogra\r', '2015-01-28 13:50:00', '2015-01-28 18:00:00', 'TP6 (Di Stefano O)\r', 'A79\r', 1, 'event'),
(937, 'S17_009536318900e0b4798285fd63624c34802c4ed347c2ddebeec5f25dbb@infogra\r', '2015-01-26 10:50:00', '2015-01-26 12:50:00', 'Seminaire (Plennevaux)\r', 'C214\r', 1, 'event'),
(938, 'S17_002b90c02205d066c840bd2960ea25005d74726cddffb7997fb07b069c@infogra\r', '2015-01-28 08:40:00', '2015-01-28 12:50:00', 'Seminaire (Bourgaux)\r', 'A79\r', 1, 'event'),
(939, 'S18_006d318b09b9ea4466e8bb7e49fc995e972c05f9f83a722d0eeb3ddb98@infogra\r', '2015-02-02 13:50:00', '2015-02-02 18:00:00', 'TP4 (Hambersin)\r', 'C214\r', 1, 'event'),
(940, 'S18_00bb4ae0556f3150491697fc268ab35bd7a05befb4b004f7f73a825565@infogra\r', '2015-02-03 09:40:00', '2015-02-03 11:50:00', 'T.infog.app. 2/2 (Plennevaux)\r', 'B240\r', 1, 'event'),
(941, 'S18_01bb4ae0556f3150491697fc268ab35bd7a05befb4b004f7f73a825565@infogra\r', '2015-02-03 12:50:00', '2015-02-03 14:50:00', 'T.infog.app. 2/2 (Plennevaux)\r', 'B240\r', 1, 'event'),
(942, 'S18_00869c2a3f516ae588424356ba7d71ed6f1b22341d17a6c498c0555096@infogra\r', '2015-02-04 12:50:00', '2015-02-04 15:50:00', 'T.num.av. 2 (Di Stefano O)\r', 'B237\r', 1, 'event'),
(943, 'S19_0085a55e46ca4b7149aff2fc843b1f83ee23567a133fa5510c05e94c3c@infogra\r', '2015-02-13 09:40:00', '2015-02-13 12:50:00', 'TP2 (Thronte)\r', 'C214\r', 1, 'event'),
(944, 'S19_003c6d9ec411a928194aff0ccb687956599e2b4ef6f8c3ad7e81ce5a83@infogra\r', '2015-02-12 13:50:00', '2015-02-12 18:00:00', 'TP1 (Plennevaux)\r', 'D01\r', 1, 'event'),
(945, 'S19_00d4258bd80adbb9c593944c54b18996948233110628500a034c735658@infogra\r', '2015-02-14 13:50:00', '2015-02-14 18:00:00', 'TP3 (Di Nunzio)\r', 'C214\r', 1, 'event'),
(946, 'S19_007f4b4090054091638dc953e3ff2961a4455c88dd4a911907e1ac3e2f@infogra\r', '2015-02-13 13:50:00', '2015-02-13 17:00:00', 'T. speciales 1 (Bourgaux)\r', 'A79\r', 1, 'event'),
(947, 'S19_00bb4ae0556f3150491697fc268ab35bd7a05befb4b004f7f73a825565@infogra\r', '2015-02-10 10:50:00', '2015-02-10 12:50:00', 'T.infog.app. 2/2 (Plennevaux)\r', 'B239\r', 1, 'event'),
(948, 'S19_01bb4ae0556f3150491697fc268ab35bd7a05befb4b004f7f73a825565@infogra\r', '2015-02-10 13:50:00', '2015-02-10 15:50:00', 'T.infog.app. 2/2 (Plennevaux)\r', 'B239\r', 1, 'event'),
(949, 'S20_00869c2a3f516ae588424356ba7d71ed6f1b22341d17a6c498c0555096@infogra\r', '2015-02-18 12:50:00', '2015-02-18 15:50:00', 'T.num.av. 2 (Di Stefano O)\r', 'B237\r', 1, 'event'),
(950, 'S21_008eb63f472085199a8640a68174951029e25c31fb12cabfc2996ad9df@infogra\r', '2015-02-27 16:00:00', '2015-02-27 18:00:00', 'TP6 (Di Stefano O)\r', 'B162\r', 1, 'event'),
(951, 'S21_0085a55e46ca4b7149aff2fc843b1f83ee23567a133fa5510c05e94c3c@infogra\r', '2015-02-26 09:40:00', '2015-02-26 12:50:00', 'TP2 (Thronte)\r', 'B162\r', 1, 'event'),
(952, 'S21_00b91ba2527797351cc2524e47d74710f679045e64c1efc50b834203e1@infogra\r', '2015-02-28 08:40:00', '2015-02-28 12:50:00', 'TP7 (Bourgaux)\r', 'B98\r', 1, 'event'),
(953, 'S21_003c6d9ec411a928194aff0ccb687956599e2b4ef6f8c3ad7e81ce5a83@infogra\r', '2015-02-24 12:50:00', '2015-02-24 15:50:00', 'TP1 (Plennevaux)\r', 'B162\r', 1, 'event'),
(954, 'S21_00d4258bd80adbb9c593944c54b18996948233110628500a034c735658@infogra\r', '2015-02-28 13:50:00', '2015-02-28 18:00:00', 'TP3 (Di Nunzio)\r', 'C214\r', 1, 'event'),
(955, 'S21_005244ce3f4d0a0ba3135a19be0f3135c845a9cbab0ef2920077ef4dee@infogra\r', '2015-02-26 12:50:00', '2015-02-26 17:00:00', 'TP5 (Thronte)\r', 'B162\r', 1, 'event'),
(956, 'S22_00869c2a3f516ae588424356ba7d71ed6f1b22341d17a6c498c0555096@infogra\r', '2015-03-04 12:50:00', '2015-03-04 15:50:00', 'T.num.av. 2 (Di Stefano O)\r', 'B237\r', 1, 'event'),
(957, 'S23_007f4b4090054091638dc953e3ff2961a4455c88dd4a911907e1ac3e2f@infogra\r', '2015-03-13 13:50:00', '2015-03-13 17:00:00', 'T. speciales 1 (Bourgaux)\r', 'A70\r', 1, 'event'),
(958, 'S23_0085a55e46ca4b7149aff2fc843b1f83ee23567a133fa5510c05e94c3c@infogra\r', '2015-03-09 09:40:00', '2015-03-09 12:50:00', 'TP2 (Thronte)\r', 'C214\r', 1, 'event'),
(959, 'S23_00889bb74099124647b2a17c7eb3bf8f3932a8e4f942bd8d8d1b72b475@infogra\r', '2015-03-14 08:40:00', '2015-03-14 12:50:00', 'TP7 (Bourgaux)\r', 'B98\r', 1, 'event'),
(960, 'S23_0030dcaf081e5ae466f756fd24fd906e8ea93c0cacc380b646ed6396d6@infogra\r', '2015-03-14 17:00:00', '2015-03-14 18:00:00', 'T. speciales 2 (Di Nunzio)\r', 'B240\r', 1, 'event'),
(961, 'S23_003c6d9ec411a928194aff0ccb687956599e2b4ef6f8c3ad7e81ce5a83@infogra\r', '2015-03-12 10:50:00', '2015-03-12 12:50:00', 'TP1 (Plennevaux)\r', 'D01\r', 1, 'event'),
(962, 'S23_00bb4ae0556f3150491697fc268ab35bd7a05befb4b004f7f73a825565@infogra\r', '2015-03-12 13:50:00', '2015-03-12 15:50:00', 'T.infog.app. 2/2 (Plennevaux)\r', 'B237\r', 1, 'event'),
(963, 'S23_00d4258bd80adbb9c593944c54b18996948233110628500a034c735658@infogra\r', '2015-03-14 13:50:00', '2015-03-14 17:00:00', 'TP3 (Di Nunzio)\r', 'C214\r', 1, 'event'),
(964, 'S23_00dbf911fa5e7360f09a966429738ad35b6a39a9af849d872cd329a7eb@infogra\r', '2015-03-09 12:50:00', '2015-03-09 17:00:00', 'TP5 (Thronte)\r', 'C214\r', 1, 'event'),
(965, 'S23_00869c2a3f516ae588424356ba7d71ed6f1b22341d17a6c498c0555096@infogra\r', '2015-03-11 11:50:00', '2015-03-11 14:50:00', 'T.num.av. 2 (Di Stefano O)\r', 'B239\r', 1, 'event'),
(966, 'S24_008913de8a93317628c05910bd43823e7389be418d1971798f6f733937@infogra\r', '2015-03-18 13:50:00', '2015-03-18 18:00:00', 'TP6 (Di Stefano O)\r', 'A79\r', 1, 'event'),
(967, 'S24_00e429e5d8778fd580080d6238d9daae89b5e7c29cb1ad1e733e0542d9@infogra\r', '2015-03-20 09:40:00', '2015-03-20 12:50:00', 'T.infog.app. 1 (Thronte)\r', 'B237\r', 1, 'event'),
(968, 'S24_001dedeaa08c0176fcd2806198efb9ca4dd980c597435d1b9c08a47e35@infogra\r', '2015-03-17 09:40:00', '2015-03-17 11:50:00', 'T.infog.app. 2/2 (Plennevaux)\r', 'B240\r', 1, 'event'),
(969, 'S24_011dedeaa08c0176fcd2806198efb9ca4dd980c597435d1b9c08a47e35@infogra\r', '2015-03-17 12:50:00', '2015-03-17 15:50:00', 'T.infog.app. 2/2 (Plennevaux)\r', 'B240\r', 1, 'event'),
(970, 'S24_00869c2a3f516ae588424356ba7d71ed6f1b22341d17a6c498c0555096@infogra\r', '2015-03-20 16:00:00', '2015-03-20 18:00:00', 'T.num.av. 2 (Di Stefano O)\r', 'B237\r', 1, 'event'),
(971, 'S24_00c549f825df7e75ef7c3eb86e6e945e3585bbeefca2b04335064c4e63@infogra\r', '2015-03-18 10:50:00', '2015-03-18 12:50:00', 'T. speciales 3 (Thronte)\r', 'A79\r', 1, 'event'),
(972, 'S24_003460e272640b941183d8d2e7198d03a2f9d95f85244438171d1b5b36@infogra\r', '2015-03-18 08:40:00', '2015-03-18 10:40:00', 'Seminaire (Plennevaux)\r', 'A79\r', 1, 'event'),
(973, 'S25_0094a8d9ea0a90b4673ae51b1ecdf94139fe32a54459b61c1d55d9b9a5@infogra\r', '2015-03-23 13:50:00', '2015-03-23 18:00:00', 'T.infog.app. 2/1 (Therasse)\r', 'B238\r', 1, 'event'),
(974, 'S26_00df1c97e783372a17a8715a374821757a525e32ae89a9800c1f2df52c@infogra\r', '2015-03-30 13:50:00', '2015-03-30 18:00:00', 'T.infog.app. 2/1 (Therasse)\r', 'C211\r', 1, 'event'),
(975, 'S26_008913de8a93317628c05910bd43823e7389be418d1971798f6f733937@infogra\r', '2015-04-01 13:50:00', '2015-04-01 18:00:00', 'TP6 (Di Stefano O)\r', 'A79\r', 1, 'event'),
(976, 'S26_0078325f1c4cf33ecad5342e9a0e1d0e79b562758a5bbf809940c6ff56@infogra\r', '2015-04-02 08:40:00', '2015-04-02 12:50:00', 'TP1 (Plennevaux)\r', 'D03\r', 1, 'event'),
(977, 'S26_006cd95fa47e58b9b7262230b7dba0be698d768dac9788db6536d540ce@infogra\r', '2015-03-31 13:50:00', '2015-03-31 18:00:00', 'TP7 (Bourgaux)\r', 'C214\r', 1, 'event'),
(978, 'S26_00fc38c6cbb687f425dd57624b2a334ea1230c52486f69e07cf8118669@infogra\r', '2015-04-04 08:40:00', '2015-04-04 12:50:00', 'TP3 (Di Nunzio)\r', 'C214\r', 1, 'event'),
(979, 'S26_00e6c03fdf135d8f7ea093bbac0352751a41dd69753ba64b4587924a7d@infogra\r', '2015-03-30 09:40:00', '2015-03-30 13:50:00', 'TP5 (Thronte)\r', 'A145\r', 1, 'event'),
(980, 'S27_001e0b01a28ac75b8f9a61b4eda694abd31cc5ea5d5e54c34ea185021d@infogra\r', '2015-04-22 08:40:00', '2015-04-22 12:50:00', 'T.infog.app. 2/1 (Therasse)\r', 'C212\r', 1, 'event'),
(981, 'S27_00dbf911fa5e7360f09a966429738ad35b6a39a9af849d872cd329a7eb@infogra\r', '2015-04-20 12:50:00', '2015-04-20 17:00:00', 'TP5 (Thronte)\r', 'A70\r', 1, 'event'),
(982, 'S28_00df1c97e783372a17a8715a374821757a525e32ae89a9800c1f2df52c@infogra\r', '2015-04-27 10:50:00', '2015-04-27 12:50:00', 'T.infog.app. 2/1 (Therasse)\r', 'C212\r', 1, 'event'),
(983, 'S28_00e08c316c01d2cf11172ed5fe5d04a118ca20ada2d3c1463a3a74d723@infogra\r', '2015-04-28 13:50:00', '2015-04-28 17:00:00', 'TP2 (Thronte)\r', 'C214\r', 1, 'event'),
(984, 'S28_0078325f1c4cf33ecad5342e9a0e1d0e79b562758a5bbf809940c6ff56@infogra\r', '2015-04-30 08:40:00', '2015-04-30 11:50:00', 'TP1 (Plennevaux)\r', 'D03\r', 1, 'event'),
(985, 'S28_00fc38c6cbb687f425dd57624b2a334ea1230c52486f69e07cf8118669@infogra\r', '2015-05-02 08:40:00', '2015-05-02 11:50:00', 'TP3 (Di Nunzio)\r', 'C214\r', 1, 'event'),
(986, 'S28_00869c2a3f516ae588424356ba7d71ed6f1b22341d17a6c498c0555096@infogra\r', '2015-04-29 08:40:00', '2015-04-29 12:50:00', 'T.num.av. 2 (Di Stefano O)\r', 'B237\r', 1, 'event'),
(987, 'S28_00e6c03fdf135d8f7ea093bbac0352751a41dd69753ba64b4587924a7d@infogra\r', '2015-04-27 08:40:00', '2015-04-27 10:40:00', 'TP5 (Thronte)\r', 'A145\r', 1, 'event'),
(988, 'S29_001b68d18151e65bd18fd736cb565d4a89352fff035a1a9c15af594edb@infogra\r', '2015-05-07 08:40:00', '2015-05-07 12:50:00', 'TP6 (Di Stefano O)\r', 'A79\r', 1, 'event'),
(989, 'S29_00f42fc88cac69c4a867520b48725496e1e52d3585b079847accdf8dd2@infogra\r', '2015-05-07 16:00:00', '2015-05-07 18:00:00', 'TP7 (Bourgaux)\r', 'A79\r', 1, 'event'),
(990, 'S29_00dbf911fa5e7360f09a966429738ad35b6a39a9af849d872cd329a7eb@infogra\r', '2015-05-07 13:50:00', '2015-05-07 15:50:00', 'TP5 (Thronte)\r', 'A79\r', 1, 'event'),
(991, 'S30_0014cea5b84d4442ca31a5d5bb42afc65e2d47ef88170ccb5cbb742c93@infogra\r', '2015-05-15 10:50:00', '2015-05-15 12:50:00', 'T. speciales 2 (Di Nunzio)\r', 'B98\r', 1, 'event'),
(992, 'S30_00df1c97e783372a17a8715a374821757a525e32ae89a9800c1f2df52c@infogra\r', '2015-05-13 10:50:00', '2015-05-13 12:50:00', 'T.infog.app. 2/1 (Therasse)\r', 'B99\r', 1, 'event'),
(993, 'S30_00d3fb64adef0d7c92172d40a25cb57c6338501255375c8b28c4c43e42@infogra\r', '2015-05-13 13:50:00', '2015-05-13 15:50:00', 'T.infog.app. 2/1 (Therasse)\r', 'B99\r', 1, 'event'),
(994, 'S30_00a6261f460e3bcf41313c1df4e2493bb6bf807f652e7b2ecc7e40dc0d@infogra\r', '2015-05-13 16:00:00', '2015-05-13 19:00:00', 'T.infog.app. 2/2 (Plennevaux)\r', 'B99\r', 1, 'event'),
(995, 'S30_00fc38c6cbb687f425dd57624b2a334ea1230c52486f69e07cf8118669@infogra\r', '2015-05-15 16:00:00', '2015-05-15 18:00:00', 'TP3 (Di Nunzio)\r', 'B98\r', 1, 'event'),
(996, 'S30_0086fff492ed9c7265fe60edb84b3db137e7bdef26ad93c69cfe528ae6@infogra\r', '2015-05-13 12:50:00', '2015-05-13 15:50:00', 'T.infog.app. 2/2 (Plennevaux)\r', 'B99\r', 1, 'event'),
(997, 'S31_0056cf6ed768a87294a402fea4510a1f7200468d2abc32966cb4ba8fc8@infogra\r', '2015-05-22 08:40:00', '2015-05-22 11:50:00', 'TP1 (Plennevaux)\r', 'A70\r', 1, 'event'),
(998, 'S31_00f42fc88cac69c4a867520b48725496e1e52d3585b079847accdf8dd2@infogra\r', '2015-05-21 12:50:00', '2015-05-21 18:00:00', 'TP7 (Bourgaux)\r', 'A79\r', 1, 'event'),
(999, 'S31_0035a6fbc0fc5c53656a756e57f75f7aab3009f5a6d3b4d64c62a15bcc@infogra\r', '2015-05-20 14:50:00', '2015-05-20 18:00:00', 'T.num.av. 2 (Di Stefano O)\r', 'B239\r', 1, 'event'),
(1000, 'S31_002166b083236a9264d1550081cdd2bb33181a9722183aa9b1019405ce@infogra\r', '2015-05-18 16:00:00', '2015-05-18 18:00:00', 'T.infog.app. 2/1 (Therasse)\r', 'B239\r', 1, 'event'),
(1001, 'S32_00be227f1badc63c4d1c49881abe3ada9f353f87ead88fb1aa3966f226@infogra\r', '2015-05-29 09:40:00', '2015-05-29 11:50:00', 'T. speciales 1 (Bourgaux)\r', 'C214\r', 1, 'event'),
(1002, 'S32_01be227f1badc63c4d1c49881abe3ada9f353f87ead88fb1aa3966f226@infogra\r', '2015-05-29 12:50:00', '2015-05-29 13:50:00', 'T. speciales 1 (Bourgaux)\r', 'C214\r', 1, 'event'),
(1003, 'S32_00ba16293068e560f59e09f3add2210d872f3f7695339815529e1c5c67@infogra\r', '2015-05-27 10:50:00', '2015-05-27 12:50:00', 'TP6 (Di Stefano O)\r', 'C214\r', 1, 'event'),
(1004, 'S32_0056cf6ed768a87294a402fea4510a1f7200468d2abc32966cb4ba8fc8@infogra\r', '2015-05-29 14:50:00', '2015-05-29 17:00:00', 'TP1 (Plennevaux)\r', 'A70\r', 1, 'event'),
(1005, 'S32_00f42fc88cac69c4a867520b48725496e1e52d3585b079847accdf8dd2@infogra\r', '2015-05-28 13:50:00', '2015-05-28 19:00:00', 'TP7 (Bourgaux)\r', 'A79\r', 1, 'event'),
(1006, 'S32_009b4d8ae3087ce3eb41e94090836646f0459ed3ea555930de82f10876@infogra\r', '2015-05-26 13:50:00', '2015-05-26 15:50:00', 'TP5 (Thronte)\r', 'C214\r', 1, 'event'),
(1007, 'S33_008cfcf4a7f07d86e1edbe810cfec15018805c50999f7a3f421a8a81df@infogra\r', '2015-06-05 12:50:00', '2015-06-05 13:50:00', 'T.num.av. 2 EX(rem) (Di Stefano O)\r', 'A150\r', 1, 'event'),
(1008, 'S34_00f7ad199bbd81ae728b345497238eb0df02170a770a4a7c693d83ab9f@infogra\r', '2015-06-11 08:40:00', '2015-06-11 09:40:00', 'T. speciales 1 EX(tfe) (Bourgaux)\r', 'A79\r', 1, 'event'),
(1009, 'S34_0089598435a076e2087c564946d607d984b1c2429a9506001e5034fb3f@infogra\r', '2015-06-12 08:40:00', '2015-06-12 09:40:00', 'T. speciales 1 EX(tfe) (Bourgaux)\r', 'A79\r', 1, 'event'),
(1010, 'S34_00903aeac64ed0345f31df99aa26bc61fdd3e6ec1f377bcbe7e7587349@infogra\r', '2015-06-11 13:50:00', '2015-06-11 14:50:00', 'T. speciales 2 EX(tfe) (Di Nunzio)\r', 'A79\r', 1, 'event'),
(1011, 'S34_0062cf65dbfb4e788025dbdd7f252c8e13f4b1ab0dc7d8693e00eff298@infogra\r', '2015-06-12 13:50:00', '2015-06-12 14:50:00', 'T. speciales 2 EX(tfe) (Di Nunzio)\r', 'A79\r', 1, 'event'),
(1012, 'S34_00dc0ae9fd6498d82a50f81a7c14f0f48057b1cd7da25d024fe68c01cb@infogra\r', '2015-06-11 10:50:00', '2015-06-11 11:50:00', 'T.infog.app. 2/1 EX(tfe) (Therasse)\r', 'A79\r', 1, 'event'),
(1013, 'S34_002cabe7664f5b1783dc4c1f34c7fc0968812ce9140350d1de39777238@infogra\r', '2015-06-12 10:50:00', '2015-06-12 11:50:00', 'T.infog.app. 2/1 EX(tfe) (Therasse)\r', 'A79\r', 1, 'event'),
(1014, 'S34_00369c43074abfd6cc5680edba4b85485b04633fe45228319bf0acea80@infogra\r', '2015-06-11 18:00:00', '2015-06-11 19:00:00', 'T.infog.app. 2/2 EX(rem) (Plennevaux)\r', 'A150\r', 1, 'event'),
(1015, 'S34_00fb72cfc9846bf05c55100f2c02489c9b573c8c3d17e087fb2e9a5f3b@infogra\r', '2015-06-11 09:40:00', '2015-06-11 10:40:00', 'T.num.av. 1/2 EX(tfe) (Di Nunzio)\r', 'A79\r', 1, 'event'),
(1016, 'S34_00bfaa958030a46332c63c58891e2178f2783921d765bf5090e3040651@infogra\r', '2015-06-12 09:40:00', '2015-06-12 10:40:00', 'T.num.av. 1/2 EX(tfe) (Di Nunzio)\r', 'A79\r', 1, 'event'),
(1017, 'S34_0027d94068f32fb4325af69a2f63ba8f5e1f282a3f31b368eddbb84107@infogra\r', '2015-06-11 16:00:00', '2015-06-11 17:00:00', 'T.num.av. 1/3 EX(tfe) (Saint Cricq)\r', 'A79\r', 1, 'event'),
(1018, 'S34_00bbc41e2088b37efd0c112f97e96c072671eac0e39311765780d76588@infogra\r', '2015-06-12 16:00:00', '2015-06-12 17:00:00', 'T.num.av. 1/3 EX(tfe) (Saint Cricq)\r', 'A79\r', 1, 'event');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checked` tinyint(1) NOT NULL,
  `datetask` datetime NOT NULL,
  `task` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=155 ;

--
-- Contenu de la table `tasks`
--

INSERT INTO `tasks` (`id`, `checked`, `datetask`, `task`, `user_id`, `type`) VALUES
(1, 0, '2015-06-05 23:59:59', 'boire du café', 1, 'task'),
(3, 0, '2015-06-08 23:59:59', 'café', 0, 'task'),
(5, 0, '2015-06-08 23:59:59', 'ici, blabla', 12, 'task'),
(10, 0, '2015-06-08 23:59:59', 'boire mon café', 16, 'task'),
(13, 0, '2015-06-08 23:59:59', 'kedis', 15, 'task'),
(14, 0, '2015-06-10 23:59:59', 'crossfit', 1, 'task'),
(15, 0, '2015-06-08 23:59:59', '"Peut-être que Batman n''est pas fait pour la victoire. Il est fait pour subir mille et un échecs, sans pour autant renoncer. Il est fait pour se relever de ses chutes." - Batman, L''an zéro (2ème partie). Page 198.', 1, 'task'),
(17, 0, '2015-06-08 23:59:59', 'Dodo', 10, 'task'),
(19, 0, '2015-06-08 23:59:59', 'ça à l''air de ± fonctionner...', 1, 'task'),
(21, 0, '2015-06-12 23:59:59', 'coucou kaki', 1, 'task'),
(22, 0, '2015-06-08 23:59:59', 'aroma', 19, 'task'),
(29, 0, '2015-06-08 23:59:59', 'hd', 1, 'task'),
(33, 1, '2015-06-11 23:59:59', 'test', 1, 'task'),
(34, 1, '2015-06-05 23:59:59', 'JULIEN3', 1, 'task'),
(140, 0, '2015-06-05 23:59:59', 'Quand ton ex commence sa phrase par : "Maintenant qu''on est pote, ..." Tu peux dire que tu as tout entendu.', 1, 'task'),
(142, 0, '2015-06-08 23:59:59', 'retest', 1, 'task'),
(143, 0, '2015-06-08 23:59:59', 'encore', 1, 'task'),
(144, 0, '2015-06-08 23:59:59', 'mmmmmm', 1, 'task'),
(145, 0, '2015-06-08 23:59:59', 'merde', 1, 'task'),
(146, 0, '2015-06-08 23:59:59', 'shit', 1, 'task'),
(147, 0, '2015-06-11 23:59:59', 'fait voir', 1, 'task'),
(148, 0, '2015-06-12 23:59:59', 'et ici ?', 1, 'task'),
(149, 0, '2015-06-12 23:59:59', 'Ceci est un test', 21, 'task'),
(150, 0, '2015-06-08 23:59:59', 'bum', 1, 'task'),
(151, 0, '2015-06-13 23:59:59', 'Ceci est un test pour les dates', 1, 'task'),
(152, 0, '2015-06-10 23:59:59', 'Bonjour', 1, ''),
(153, 0, '2015-06-08 23:59:59', 't', 1, ''),
(154, 0, '2015-06-13 23:59:59', 'et un doublon ?', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirm_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ical` varchar(255) CHARACTER SET utf8 NOT NULL,
  `googlecal` varchar(255) CHARACTER SET utf8 NOT NULL,
  `other` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `confirm_email`, `ical`, `googlecal`, `other`) VALUES
(1, 'yoyo', 'yoyo', 'tibyoctet@gmail.com', 'tibyoctet@gmail.com', '', '', 'http://extranet.infographie-sup.be/ics/3TID2.ics'),
(2, 'julien', 'julien', 'julien@re.com', 'julien@re.com', '', '', ''),
(8, 'Tibroux', '434343', 'tiby.jv@gmail.com', 'tiby.jv@gmail.com', '', '', ''),
(9, 'Tibyscuit', 'prout', 'prout@pet.com', 'prout@pet.com', '', '', ''),
(10, 'Ally', 'boutondor', 'pauline.pauwels@gmail.com', 'pauline.pauwels@gmail.com', '', '', ''),
(11, 'Yannick', 'yaya', 'couillon@gmail.com', 'couillon@gmail.com', '', '', ''),
(12, 'blabla', 'blabla', 'blabla@gmail.com', 'blabla@gmail.com', '', '', ''),
(13, 'bob', 'bob', 'tibyoctet@gmail.com', 'tibyoctet@gmail.com', '', '', ''),
(14, 'kooka', 'lekooka@gmail.com', 'lekooka@gmail.com', 'lekooka@gmail.com', '', '', ''),
(15, 'kedis', 'kedis', 'kedis@gmail.com', 'kedis@gmail.com', '', '', ''),
(16, 'yeti', 'yeti', 'yeti@neige.com', 'yeti@neige.com', '', '', ''),
(17, 'maman', 'maman', 'dkjfhsdkj@dkjhgdfk.fd', 'dkjfhsdkj@dkjhgdfk.fd', '', '', ''),
(18, 'Ak-Zero', 'grigri112', 'Hermandgeraud@hotmail.com', 'Hermandgeraud@hotmail.com', '', '', ''),
(19, 'Voesters', 'licorne!9', 'kat2000@skynet.be', 'kat2000@skynet.be', '', '', ''),
(20, 'boby', 'azerty', 'test@live.com', 'test@live.com', '', '', ''),
(21, 'Alex', 'cvc268x', 'vable93@gmail.com', 'vable93@gmail.com', '', '', ''),
(22, 'jurydwm', 'jury111215', 'jurydwm@esiaj.be', 'jurydwm@esiaj.be', '', '', 'http://extranet.infographie-sup.be/ics/3TID2.ics'),
(24, 'Tiby', '24275363c', 'tibyoctet@gmail.com', 'tibyoctet@gmail.com', '', '', ''),
(25, 'Scoobitest', 'yoyo', 'scoobitest@gmail.com', 'scoobitest@gmail.com', '', '', ''),
(26, 'caca', 'caca', 'caca@mail.com', 'caca@mail.com', '', '', ''),
(28, 'testy', 'testeur', 'tiby.jv@gmail.com', 'tiby.jv@gmail.com', '', '', ''),
(29, 'sauc', 'isse', 'tiby.jv@gmail.com', 'tiby.jv@gmail.com', '', '', ''),
(30, 'James', 'Bond', 'tiby.jv@gmail.com', 'tiby.jv@gmail.com', '', '', ''),
(31, 'Testeur1', 'test', 'tiby.jv@gmail.com', 'tiby.jv@gmail.com', '', '', ''),
(32, 'Batou', 'test', 'tiby.jv@gmail.com', 'tiby.jv@gmail.com', '', '', ''),
(33, 'Marie', 'azer', 'mariemaurer9@hotmail.com', 'mariemaurer9@hotmail.com', '', '', ''),
(34, 'BamBam', 'azer', 'mariemaurer9@hotmail.com', 'mariemaurer9@hotmail.com', '', '', ''),
(35, 'tedt', 'tedt', 'mariemaurer9@hotmail.com', 'mariemaurer9@hotmail.com', '', '', ''),
(36, 'again', 'test', 'tiby.jv@gmail.com', 'tiby.jv@gmail.com', '', '', ''),
(37, 'andagain', 'pass', 'tiby.jv@gmail.com', 'tiby.jv@gmail.com', '', '', ''),
(38, 'Fowerld', 'test123.', 'fowerld-system@live.be', 'fowerld-system@live.be', '', '', ''),
(39, 'alexandre.b', '40kmm4abcvc268x', 'graph.ix@hotmail.fr', 'graph.ix@hotmail.fr', '', '', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user`) REFERENCES `tasks` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
