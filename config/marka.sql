-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 13 déc. 2018 à 14:29
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
-- Structure de la table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `idCommande` int(11) NOT NULL,
  `nomProduit` varchar(150) COLLATE utf8_bin NOT NULL,
  `description` varchar(300) COLLATE utf8_bin NOT NULL,
  `prix` int(20) NOT NULL,
  `photo` varchar(1000) COLLATE utf8_bin NOT NULL,
  `taille` varchar(50) COLLATE utf8_bin NOT NULL,
  `idAchat` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idAchat`),
  KEY `id` (`idCommande`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `client` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idCommande`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `date`, `client`) VALUES
(3, '2018-12-11', 'mabrkl@icloud.com'),
(4, '2018-12-19', 'mabrkl@icloud.com'),
(5, '2018-12-09', 'mabrkl@icloud.com'),
(6, '2018-12-09', 'mabrkl@icloud.com'),
(7, '2018-12-09', 'mabrkl@icloud.com'),
(8, '2018-12-09', 'mabrkl@icloud.com'),
(9, '2018-12-09', 'mabrkl@icloud.com'),
(10, '2018-12-09', 'mabrkl@icloud.com'),
(11, '2018-12-09', 'mabrkl@icloud.com'),
(12, '2018-12-09', 'mabrkl@icloud.com'),
(13, '2018-12-09', 'mabrkl@icloud.com'),
(14, '2018-12-09', 'mabrkl@icloud.com'),
(15, '2018-12-09', 'mabrkl@icloud.com'),
(16, '2018-12-10', 'mabrkl@icloud.com'),
(17, '2018-12-12', 'mabrkl@icloud.com'),
(18, '2018-12-13', 'mabrkl@icloud.com');

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
  `taille` varchar(5) NOT NULL,
  `photo` varchar(300) NOT NULL,
  PRIMARY KEY (`idProduit`),
  UNIQUE KEY `idProduit` (`idProduit`),
  KEY `categorie` (`nomCateg`),
  KEY `Produits_ibfk_2` (`vendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `vendeur`, `nomCateg`, `description`, `prix`, `taille`, `photo`) VALUES
(2, 'Chemise bleu ciel', 'mabrkl@icloud.com', 'Hommes', 'Chemise de très bonne qualité', 69, 'M', 'http://image.noelshack.com/fichiers/2018/49/5/1544210183-chemise.jpg'),
(4, 'Veste en velours', 'mabrkl@icloud.com', 'Femmes', ' Veste en velours côtelé avec col imitation peau de mouton - Rouge baie', 60, '36', 'https://images.asos-media.com/products/asos-design-veste-en-velours-cotele-avec-col-imitation-peau-de-mouton-rouge-baie/9519519-1-berry?$XXL$&wid=513&fit=constrain'),
(5, 'Pantalon imprimé', 'mabrkl@icloud.com', 'Femmes', 'Commencez l\'année en beauté et optez pour des vibes très rétro avec ce pantalon.', 35, '38', 'https://cdn-img.prettylittlething.com/8/4/3/2/84320499cfb3f01725726eed692ec7020fbe543d_cma2384_1.jpg?imwidth=1024'),
(6, 'Jupe rayée', 'mabrkl@icloud.com', 'Femmes', 'Jupe rayée en jean noir et blanche.', 30, '38', 'https://cdn-img.prettylittlething.com/d/0/f/e/d0fe029704949607410c9019a28e677354155568_clx5305_1.jpg?imwidth=1024'),
(7, 'parka', 'mabrkl@icloud.com', 'Enfants', 'Parka avec badges interchangeables', 30, '10', 'https://cdn.laredoute.com/products/641by641/4/6/e/46e62e6b2d97164bfbe2d2f100dad76e.jpg');

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
  `nonce` varchar(32) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `id` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `nom`, `prenom`, `email`, `password`, `dateInscription`, `adresse`, `nomVille`, `pays`, `admin`, `nonce`) VALUES
(42, 'test', 'test', 'bob@yopmail.com', '6ae9bba8e20d3e2300af279787b60fab70ffee8ab31c3a4de194406b4d6331a8', '2018-12-13', 'bob@yopmail.com', 'bob@yopmail.com', 'bob@yopmail.com', 0, 'e19f376f083d930ba73df6ddfe9d9100'),
(4, 'coste', 'thibault', 'coste.thibault@hduish.com', '$2y$10$2gAkWYpTgqheTgcfdBFyM.YIJpLx3EGQ.qx8rSsn7au/qGKgBo3Pu', '2018-11-30', '45 sdfilj', 'Valence', 'France', 0, ''),
(41, 'Hamza', 'Bouzid', 'hamzatest@test.te', 'df6a45d9e6018fdbbde29a4dbcf4a00f3e38783a9d75f8ddda524ede8e0904b5', '2018-12-08', 'Test', 'Test', 'Test', 0, ''),
(1, 'Bouzid', 'Hamza', 'hamzayou3a@gmail.com', '$2y$10$DfjsTLEtWPWK8VjH/d6s1.Hl2.Rkvn4Kxc.ZxRffgt4jwIe3i0.5e', '2018-11-30', '9 rue du test', 'test', 'Testage', 0, ''),
(28, 'mabrkl@icloud.com', 'mabrkl@icloud.com', 'mabrkl@icloud.com', '839bb236c39e7d1c1bfc79c0df0a2457698ea9192b9f72161336b96540f80813', '2018-12-07', 'mabrkl@icloud.com', 'mabrkl@icloud.com', 'mabrkl@icloud.com', 1, ''),
(2, 'mabrouk', 'leila', 'mabroukl@icloud.com', '$2y$10$BQHmeOqUdqOahVnMmtTXSObZYxt6NyAo6Fd7c0mXOdBLGXPyCr1vq', '2018-11-30', '71 chemin des plantiers', 'Cavaillon', 'France', 0, ''),
(29, 'random@rand.non', 'random@rand.non', 'random@rand.non', 'ff4c4185ea00f22a4a2754b0b50e0eece27525d79efee936886343ee7dc6ee9e', '2018-12-07', 'random@rand.non', 'random@rand.non', 'random@rand.non', 0, ''),
(3, 'senhaji', 'salma', 'salmoush34@gmail.com', '$2y$10$K5z9s/uVB.PKxvUzDHi.6eLpi1BZVVYrAjY52vVTe0pSyrSTCwMaO', '2018-11-30', '4 rue de la rose', 'Poitiers', 'France', 0, '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `id` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`);

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
