-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3307
-- Généré le : lun. 11 sep. 2023 à 20:22
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garage`
--

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `cars_id` int(20) NOT NULL,
  `cars_brand` varchar(20) NOT NULL,
  `cars_model` varchar(20) NOT NULL,
  `cars_release_year` int(4) NOT NULL,
  `cars_power` int(3) NOT NULL,
  `cars_engine_type` varchar(15) NOT NULL,
  `cars_km` int(6) NOT NULL,
  `cars_price` int(5) NOT NULL,
  `cars_main_img` varchar(30) NOT NULL,
  `cars_alt_text` varchar(35) NOT NULL,
  `cars_transmission_type` varchar(30) NOT NULL,
  `cars_doors_number` int(20) NOT NULL,
  `cars_seats_material` varchar(20) NOT NULL,
  `cars_color` varchar(20) NOT NULL,
  `cars_warranty` varchar(50) NOT NULL,
  `cars_equipment1` varchar(50) NOT NULL,
  `cars_equipment2` varchar(50) NOT NULL,
  `cars_equipment3` varchar(50) NOT NULL,
  `cars_equipment4` varchar(50) NOT NULL,
  `cars_equipment5` varchar(50) NOT NULL,
  `cars_equipment6` varchar(50) NOT NULL,
  `cars_equipment7` varchar(50) NOT NULL,
  `cars_equipment8` varchar(50) NOT NULL,
  `cars_gallery_img1` varchar(50) NOT NULL,
  `cars_gallery_img2` varchar(50) NOT NULL,
  `cars_gallery_img3` varchar(50) NOT NULL,
  `cars_alt_text_img1` varchar(35) NOT NULL,
  `cars_alt_text_img2` varchar(35) NOT NULL,
  `cars_alt_text_img3` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`cars_id`, `cars_brand`, `cars_model`, `cars_release_year`, `cars_power`, `cars_engine_type`, `cars_km`, `cars_price`, `cars_main_img`, `cars_alt_text`, `cars_transmission_type`, `cars_doors_number`, `cars_seats_material`, `cars_color`, `cars_warranty`, `cars_equipment1`, `cars_equipment2`, `cars_equipment3`, `cars_equipment4`, `cars_equipment5`, `cars_equipment6`, `cars_equipment7`, `cars_equipment8`, `cars_gallery_img1`, `cars_gallery_img2`, `cars_gallery_img3`, `cars_alt_text_img1`, `cars_alt_text_img2`, `cars_alt_text_img3`) VALUES
(1, 'Renault', 'Clio', 2020, 120, 'Essence', 177220, 8500, 'img/clio4.jpg', 'Renault Clio 2020', 'Automatique', 5, 'Cuir/Tissu', 'Bleu nuit', 'Étendue 12 mois', 'Radio', 'Écran tactile 7 pouces', '1 port USB + 1 prise audio', 'GPS', 'Climatisation automatique', 'Détecteur d\'obstacle', 'Rétroviseurs extérieurs réglables électriquement', 'Appui-tête AR réglable', 'img/peugeot308_2020_1.jpg', 'img/peugeot308_2020_2.jpg', 'img/daciaDuster2021.jpg', 'Peugeot 308 2020 img1', 'Peugeot 308 2020 img2', 'Peugeot 308 2020 img3'),
(2, 'Renault', 'Scenic', 2018, 100, 'Diesel', 267220, 5000, 'img/scenic4.jpg', 'Renault Scenic 2018', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'BMW', 'i5', 2010, 120, 'Diesel', 180000, 6550, 'img/v5.jpg', 'BMW i5 2010', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Dacia', 'Duster', 2020, 120, 'Diesel', 180000, 7423, 'img/daciaDuster2021.jpg', 'Dacia Duster 2020', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Peugeot', '308', 2020, 120, 'Diesel', 180000, 8530, 'img/v3.jpg', 'Peugeot 308 2020', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'Toyota', 'Camry', 2020, 120, 'Diesel', 190000, 6230, 'img/v3.jpg', 'Toyota Camry 2020', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Nissan', 'Sentra', 2020, 120, 'Diesel', 183700, 7641, 'img/v3.jpg', 'Nissan Sentra 2020', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Citroën ', 'C3', 2020, 120, 'Diesel', 235600, 8700, 'img/v3.jpg', 'Citroën C3 2020', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'Renault', 'Megane', 2020, 120, 'Diesel', 177221, 9020, 'img/v3.jpg', 'Renault Megane 2020', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'Opel', 'Ampera', 2020, 120, 'Électrique', 177225, 9020, 'img/v3.jpg', 'Opel Ampera 2020', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `msg_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `msg` text NOT NULL,
  `car_id` int(30) NOT NULL,
  `msg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`msg_id`, `name`, `email`, `phone`, `msg`, `car_id`, `msg_date`) VALUES
(56, 'Merlin Migan', 'merlin.migan@gmail.com', '0659348249', 'Je pense que votre site est super élégant :) !', 3, '2023-09-11'),
(78, 'Merlin Migan', 'merlin.migan@gmail.com', '0659348249', 'Je suis intéressé par votre véhicule. Un rdv est-il possible lundi ?', 1, '2023-09-11'),
(79, 'Merlin Migan', 'merlin.migan@gmail.com', '0659348249', 'zertzer', 0, '2023-09-11');

-- --------------------------------------------------------

--
-- Structure de la table `crud`
--

CREATE TABLE `crud` (
  `id` int(20) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `pwd_hash` varchar(65) NOT NULL,
  `user_type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `crud`
--

INSERT INTO `crud` (`id`, `first_name`, `last_name`, `email`, `password`, `pwd_hash`, `user_type`) VALUES
(35, 'Alexandre', 'Legrand', 'exampleexample@gmail.com', 'tata_TATA_123', '$2y$10$MKOKDKfNWEjY.YBuyv59Ke8XjTIWe9NDvdSEQ1hfVK3Vg5e2f0irS', 'admin'),
(36, 'James', 'Parker', 'james.parker@yahoo.fr', 'james_PARKER456', '$2y$10$UotuNYWPrKRpTCafS8d/HOl9HFo17ZQwDUeFwzTdJmJLQvIscBS0q', 'admin'),
(68, 'Julia', 'Roberts', 'juju.roro@yahoo.fr', 'pipo_94_7888', '$2y$10$qPbXP74Z5jf37QtZq4oN1.2J/JzIsEsTGRxpukA5Y.K2F5BSsjk8O', 'employee'),
(70, 'Hardy', 'Heron', 'qsdfqdf@game.fr', 'dsfgsfgsdftgzertae444', '$2y$10$uq0P4CCVqHy8lBklLYHskuGkbJEoXN4HHpe.SnICpdu.hROlG8osC', 'employee'),
(71, 'Hello', 'Kitty', 'hello.kitty@yahoo.fr', 'meow_meow_79', '$2y$10$pr6pBedVNSXeTxGHPqCAfuqvvBm0le4TUqDOW1Ki2oheeu6xWRto.', 'employee');

-- --------------------------------------------------------

--
-- Structure de la table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `morning` varchar(20) NOT NULL,
  `afternoon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `schedules`
--

INSERT INTO `schedules` (`id`, `day`, `morning`, `afternoon`) VALUES
(1, 'LUNDI', '08:45 - 12:00', '14:00 - 18:00'),
(2, 'MARDI', '08:45 - 12:00', '14:00 - 18:00'),
(3, 'MERCREDI', '08:45 - 12:00', '14:00 - 18:00'),
(4, 'JEUDI', '08:45 - 12:00', '14:00 - 18:00'),
(5, 'VENDREDI', '08:45 - 12:00', '14:00 - 18:00'),
(6, 'SAMEDI', '08:45 - 12:00', 'Fermé'),
(7, 'DIMANCHE', 'Fermé', 'Fermé');

-- --------------------------------------------------------

--
-- Structure de la table `sliders_filters`
--

CREATE TABLE `sliders_filters` (
  `id` int(11) NOT NULL,
  `filters_name` varchar(11) NOT NULL,
  `sliders_min_value1` int(6) NOT NULL,
  `sliders_max_value1` int(6) NOT NULL,
  `sliders_default_value1` int(6) NOT NULL,
  `sliders_id1` varchar(20) NOT NULL,
  `sliders_min_value2` int(6) NOT NULL,
  `sliders_max_value2` int(6) NOT NULL,
  `sliders_default_value2` int(6) NOT NULL,
  `sliders_id2` varchar(20) NOT NULL,
  `limit1` varchar(20) NOT NULL,
  `limit2` varchar(20) NOT NULL,
  `unit` varchar(2) NOT NULL,
  `button_value` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sliders_filters`
--

INSERT INTO `sliders_filters` (`id`, `filters_name`, `sliders_min_value1`, `sliders_max_value1`, `sliders_default_value1`, `sliders_id1`, `sliders_min_value2`, `sliders_max_value2`, `sliders_default_value2`, `sliders_id2`, `limit1`, `limit2`, `unit`, `button_value`) VALUES
(1, 'Kilométrage', 177220, 222220, 177220, 'km-slider-1', 222221, 267220, 267220, 'km-slider-2', 'min-km', 'max-km', 'km', 'km-button'),
(2, 'Prix', 4790, 6990, 4790, 'price-slider-1', 6991, 9190, 9190, 'price-slider-2', 'min-price', 'max-price', '€', 'price-button'),
(3, 'Années', 2001, 2010, 2001, 'year-slider-1', 2011, 2020, 2020, 'year-slider-2', 'min-year', 'max-year', '', 'year-button');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`cars_id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`msg_id`);

--
-- Index pour la table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sliders_filters`
--
ALTER TABLE `sliders_filters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `cars_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `sliders_filters`
--
ALTER TABLE `sliders_filters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
