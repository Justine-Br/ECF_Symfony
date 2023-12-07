-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 déc. 2023 à 16:24
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
-- Base de données : `progica`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom_contact` varchar(255) NOT NULL,
  `prenom_contact` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `disponibilite_contact` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom_contact`, `prenom_contact`, `telephone`, `email`, `disponibilite_contact`) VALUES
(1, 'Agence', 'Location', '0240589631', 'agence.location@gmail.com', 'Lundi : 9h - 17h\r\nMardi : 9h - 17h\r\nMercredi : 9h - 17h\r\nJeudi : 9h - 17h\r\nVendredi : 9h - 17h\r\nSamedi : 9h - 12h'),
(2, 'Veron', 'Lucas', '0242698574', 'lucas.veron@gmail.com', 'Du lundi au vendredi, de 9h à 17h30.');

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id` int(11) NOT NULL,
  `gite_id` int(11) NOT NULL,
  `lave_vaisselle` tinyint(1) NOT NULL,
  `lave_linge` tinyint(1) NOT NULL,
  `climatisation` tinyint(1) NOT NULL,
  `television` tinyint(1) NOT NULL,
  `terasse` tinyint(1) NOT NULL,
  `barbecue` tinyint(1) NOT NULL,
  `piscine_privee` tinyint(1) NOT NULL,
  `piscine_collective` tinyint(1) NOT NULL,
  `tennis` tinyint(1) NOT NULL,
  `ping_pong` tinyint(1) NOT NULL,
  `wifi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id`, `gite_id`, `lave_vaisselle`, `lave_linge`, `climatisation`, `television`, `terasse`, `barbecue`, `piscine_privee`, `piscine_collective`, `tennis`, `ping_pong`, `wifi`) VALUES
(1, 1, 1, 0, 0, 1, 1, 0, 0, 1, 0, 1, 1),
(2, 2, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1),
(3, 3, 1, 0, 0, 1, 0, 0, 0, 1, 0, 1, 1),
(4, 4, 1, 0, 1, 1, 1, 1, 0, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `gite`
--

CREATE TABLE `gite` (
  `id` int(11) NOT NULL,
  `proprietaire_id` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `nom_gite` varchar(255) NOT NULL,
  `superficie` int(11) NOT NULL,
  `nombre_chambre` int(11) NOT NULL,
  `nombre_couchage` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gite`
--

INSERT INTO `gite` (`id`, `proprietaire_id`, `contact_id`, `nom_gite`, `superficie`, `nombre_chambre`, `nombre_couchage`, `adresse`, `cp`, `ville`, `departement`, `region`) VALUES
(1, 1, NULL, 'Soleil Couchant', 55, 2, 3, '8 allée Alain Gerbault', 44200, 'Nantes', 'Loire-Atlantique', 'Pays de la Loire'),
(2, 2, 1, 'Face à la Maine', 15, 0, 1, '12 boulevard du Maréchal Foch', 49100, 'Angers', 'Maine-et-Loire', 'Pays de la Loire'),
(3, 3, 2, 'La belle vue', 85, 3, 4, '12 avenue des Champs-Élysées', 75008, 'Paris', 'Paris', 'Île-de-France'),
(4, 3, 2, 'Splendeur', 35, 1, 2, '4 Rue Monge', 29200, 'Brest', 'Finistère', 'Bretagne');

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `id` int(11) NOT NULL,
  `nom_proprietaire` varchar(255) NOT NULL,
  `prenom_proprietaire` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `disponibilite_proprietaire` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id`, `nom_proprietaire`, `prenom_proprietaire`, `telephone`, `email`, `disponibilite_proprietaire`) VALUES
(1, 'Hamon', 'Jean', '0650653665', 'jean.hamon@gmail.com', 'Du lundi au vendredi, de 9h à 18h.'),
(2, 'Bruguière', 'Justine', '0650896314', 'justine.bruguiere@gmail.com', 'Du mardi au samedi, de 8h30 à 20h.'),
(3, 'Majewski', 'Virginie', '0662963485', 'virginie.majewski@gmail.com', 'Du mercredi au dimanche, de 10h à 18h30.');

-- --------------------------------------------------------

--
-- Structure de la table `service_payant`
--

CREATE TABLE `service_payant` (
  `id` int(11) NOT NULL,
  `nom_service` varchar(255) NOT NULL,
  `disponibilite_service` tinyint(1) NOT NULL,
  `supplement` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service_payant`
--

INSERT INTO `service_payant` (`id`, `nom_service`, `disponibilite_service`, `supplement`) VALUES
(1, 'Ménage', 1, 12.00),
(2, 'Animaux', 1, 9.00);

-- --------------------------------------------------------

--
-- Structure de la table `service_payant_gite`
--

CREATE TABLE `service_payant_gite` (
  `service_payant_id` int(11) NOT NULL,
  `gite_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service_payant_gite`
--

INSERT INTO `service_payant_gite` (`service_payant_id`, `gite_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `gite_id` int(11) NOT NULL,
  `nom_periode` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`id`, `gite_id`, `nom_periode`, `date_debut`, `date_fin`, `prix`) VALUES
(1, 1, 'Période hivernale', '2023-11-01', '2024-03-31', 550.00),
(2, 2, 'Période hivernale', '2023-11-01', '2024-03-31', 800.00),
(3, 3, 'Période hivernale', '2023-11-01', '2024-03-31', 745.00),
(4, 4, 'Période hivernale', '2023-11-01', '2024-03-31', 950.00),
(5, 1, 'Période estivale', '2024-04-01', '2024-10-31', 1250.00),
(6, 2, 'Période estivale', '2024-04-01', '2024-10-31', 2630.00),
(7, 3, 'Période estivale', '2024-04-01', '2024-10-31', 3000.00),
(8, 4, 'Période estivale', '2024-04-01', '2024-10-31', 9655.00);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B8B4C6F3652CAE9B` (`gite_id`);

--
-- Index pour la table `gite`
--
ALTER TABLE `gite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B638C92C76C50E4A` (`proprietaire_id`),
  ADD KEY `IDX_B638C92CE7A1254A` (`contact_id`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service_payant`
--
ALTER TABLE `service_payant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service_payant_gite`
--
ALTER TABLE `service_payant_gite`
  ADD PRIMARY KEY (`service_payant_id`,`gite_id`),
  ADD KEY `IDX_415E4913B37DE6D6` (`service_payant_id`),
  ADD KEY `IDX_415E4913652CAE9B` (`gite_id`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E7189C9652CAE9B` (`gite_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `gite`
--
ALTER TABLE `gite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `service_payant`
--
ALTER TABLE `service_payant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD CONSTRAINT `FK_B8B4C6F3652CAE9B` FOREIGN KEY (`gite_id`) REFERENCES `gite` (`id`);

--
-- Contraintes pour la table `gite`
--
ALTER TABLE `gite`
  ADD CONSTRAINT `FK_B638C92C76C50E4A` FOREIGN KEY (`proprietaire_id`) REFERENCES `proprietaire` (`id`),
  ADD CONSTRAINT `FK_B638C92CE7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`);

--
-- Contraintes pour la table `service_payant_gite`
--
ALTER TABLE `service_payant_gite`
  ADD CONSTRAINT `FK_415E4913652CAE9B` FOREIGN KEY (`gite_id`) REFERENCES `gite` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_415E4913B37DE6D6` FOREIGN KEY (`service_payant_id`) REFERENCES `service_payant` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `FK_E7189C9652CAE9B` FOREIGN KEY (`gite_id`) REFERENCES `gite` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
