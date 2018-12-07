-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 07 déc. 2018 à 18:54
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `marka`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `nomCateg` varchar(50) NOT NULL,
  PRIMARY KEY (`nomCateg`),
  UNIQUE KEY `nom_2` (`nomCateg`),
  KEY `nom` (`nomCateg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`nomCateg`) VALUES
('Enfants'),
('Femmes'),
('Hommes');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idUser` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `dateAchat` date NOT NULL,
  PRIMARY KEY (`idUser`,`idProduit`),
  KEY `idProduit` (`idProduit`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(100) NOT NULL,
  `vendeur` varchar(50) NOT NULL,
  `nomCateg` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `prix` int(5) NOT NULL,
  `taille` int(5) NOT NULL,
  `photo` varchar(300) NOT NULL,
  PRIMARY KEY (`idProduit`),
  UNIQUE KEY `idProduit` (`idProduit`),
  KEY `categorie` (`nomCateg`),
  KEY `Produits_ibfk_2` (`vendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `vendeur`, `nomCateg`, `description`, `prix`, `taille`, `photo`) VALUES
(1, 'Jean', 'mabrkl@icloud.com', 'Hommes', 'Beau', 152, 32, 'Image');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `dateInscription` date NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `nomVille` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`),
  UNIQUE KEY `id` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `nom`, `prenom`, `email`, `password`, `dateInscription`, `adresse`, `nomVille`, `pays`, `admin`) VALUES
(4, 'coste', 'thibault', 'coste.thibault@hduish.com', '$2y$10$2gAkWYpTgqheTgcfdBFyM.YIJpLx3EGQ.qx8rSsn7au/qGKgBo3Pu', '2018-11-30', '45 sdfilj', 'Valence', 'France', 0),
(1, 'Bouzid', 'Hamza', 'hamzayou3a@gmail.com', '$2y$10$DfjsTLEtWPWK8VjH/d6s1.Hl2.Rkvn4Kxc.ZxRffgt4jwIe3i0.5e', '2018-11-30', '9 rue du test', 'test', 'Testage', 0),
(28, 'mabrkl@icloud.com', 'mabrkl@icloud.com', 'mabrkl@icloud.com', '839bb236c39e7d1c1bfc79c0df0a2457698ea9192b9f72161336b96540f80813', '2018-12-07', 'mabrkl@icloud.com', 'mabrkl@icloud.com', 'mabrkl@icloud.com', 1),
(2, 'mabrouk', 'leila', 'mabroukl@icloud.com', '$2y$10$BQHmeOqUdqOahVnMmtTXSObZYxt6NyAo6Fd7c0mXOdBLGXPyCr1vq', '2018-11-30', '71 chemin des plantiers', 'Cavaillon', 'France', 0),
(29, 'random@rand.non', 'random@rand.non', 'random@rand.non', 'ff4c4185ea00f22a4a2754b0b50e0eece27525d79efee936886343ee7dc6ee9e', '2018-12-07', 'random@rand.non', 'random@rand.non', 'random@rand.non', 0),
(3, 'senhaji', 'salma', 'salmoush34@gmail.com', '$2y$10$K5z9s/uVB.PKxvUzDHi.6eLpi1BZVVYrAjY52vVTe0pSyrSTCwMaO', '2018-11-30', '4 rue de la rose', 'Poitiers', 'France', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `Commande_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`),
  ADD CONSTRAINT `Commande_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `Produits_ibfk_1` FOREIGN KEY (`nomCateg`) REFERENCES `categories` (`nomCateg`),
  ADD CONSTRAINT `Produits_ibfk_2` FOREIGN KEY (`vendeur`) REFERENCES `utilisateur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;