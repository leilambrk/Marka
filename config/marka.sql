-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 07 déc. 2018 à 23:44
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `marka`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `nomCateg` varchar(50) NOT NULL
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

CREATE TABLE `commande` (
  `idUser` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `dateAchat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `nomProduit` varchar(100) NOT NULL,
  `vendeur` varchar(50) NOT NULL,
  `nomCateg` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `prix` int(5) NOT NULL,
  `taille` int(5) NOT NULL,
  `photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `vendeur`, `nomCateg`, `description`, `prix`, `taille`, `photo`) VALUES
(1, 'Jean', 'mabrkl@icloud.com', 'Hommes', 'Beau', 152, 32, 'https://cdn.laredoute.com/products/641by641/f/8/b/f8bb8fecca43d0fcc8d77a2794ebba4e.jpg'),
(2, 'Veste en velours', 'mabrkl@icloud.com', 'Femmes', ' Veste en velours côtelé avec col imitation peau de mouton - Rouge baie', 60, 36, 'https://images.asos-media.com/products/asos-design-veste-en-velours-cotele-avec-col-imitation-peau-de-mouton-rouge-baie/9519519-1-berry?$XXL$&wid=513&fit=constrain'),
(3, 'Pantalon imprimé', 'mabrkl@icloud.com', 'Femmes', 'Commencez l\'année en beauté et optez pour des vibes très rétro avec ce pantalon.', 35, 38, 'https://cdn-img.prettylittlething.com/8/4/3/2/84320499cfb3f01725726eed692ec7020fbe543d_cma2384_1.jpg?imwidth=1024'),
(4, 'Jupe rayée', 'mabrkl@icloud.com', 'Femmes', 'Jupe rayée en jean noir et blanche.', 30, 38, 'https://cdn-img.prettylittlething.com/d/0/f/e/d0fe029704949607410c9019a28e677354155568_clx5305_1.jpg?imwidth=1024'),
(5, 'parka', 'mabrkl@icloud.com', 'Enfants', 'Parka avec badges interchangeables', 30, 10, 'https://cdn.laredoute.com/products/641by641/4/6/e/46e62e6b2d97164bfbe2d2f100dad76e.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `dateInscription` date NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `nomVille` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`nomCateg`),
  ADD UNIQUE KEY `nom_2` (`nomCateg`),
  ADD KEY `nom` (`nomCateg`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idUser`,`idProduit`),
  ADD KEY `idProduit` (`idProduit`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD UNIQUE KEY `idProduit` (`idProduit`),
  ADD KEY `categorie` (`nomCateg`),
  ADD KEY `Produits_ibfk_2` (`vendeur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
