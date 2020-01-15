-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 13 jan. 2020 à 17:30
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hortfyi_web4shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'john', 'f18bd055eec95965ee175fa9badd35ae6dbeb98f'),
(5, 'lucie', 'cd3ab1ff5da6b72b35c440e97f4fde7a964d435a');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'boissons'),
(2, 'biscuits'),
(3, 'fruits secs');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `forname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `add3` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `registered` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `forname`, `surname`, `add1`, `add2`, `add3`, `postcode`, `phone`, `email`, `registered`) VALUES
(1, 'Sarah', 'Hamida', 'ligne add1', 'ligne add2', 'Meximieux', '01800', '0612345678', 's.hamida@gmail.com', 1),
(2, 'Jean-Benoît', 'Delaroche', 'ligne add1', 'ligne add2', 'Lyon', '69009', '0796321458', 'jb.delaroche@gmx.fr', 1),
(3, 'lg', 'luga', 'add1', 'add2', 'nozay', '91620', '0102', 'lg@gmail.com', 1),
(4, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr', 1);

-- --------------------------------------------------------

--
-- Structure de la table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `firstname`, `lastname`, `add1`, `add2`, `city`, `postcode`, `phone`, `email`) VALUES
(1, 'lg', 'luga', 'add1', 'add2', 'nozay', '91620', '0102', 'lg@gmail.com'),
(2, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(3, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(4, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(5, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(6, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(7, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(8, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(9, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(10, 'Sarah', 'Hamida', 'ligne add1', 'ligne add2', 'Meximieux', '01800', '0612345678', 's.hamida@gmail.com'),
(11, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(12, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(13, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(14, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(15, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(16, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(17, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(18, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr'),
(19, 'poly', 'popo', '5 allée des roses', '', 'Lyon', '69002', '0204050603', 'poly@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logins`
--

INSERT INTO `logins` (`id`, `customer_id`, `username`, `password`) VALUES
(1, 1, 'Hamidou', 'd6ee53abcd3b045befa8af69f445fafc33f1f88b'),
(2, 2, 'Delaroche', '56a5d2bd85e6c9956d122f59f79540ee0f75e5ad'),
(4, 4, 'poly', 'f8d6bb140dcd1ecd8135d2ed84f0320da7e44347');

-- --------------------------------------------------------

--
-- Structure de la table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(21, 9, 2, 1),
(22, 9, 8, 1),
(23, 9, 8, 1),
(24, 9, 8, 1),
(25, 9, 5, 1),
(26, 9, 13, 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `registered` int(11) NOT NULL,
  `delivery_add_id` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `session` varchar(100) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `registered`, `delivery_add_id`, `payment_type`, `date`, `status`, `session`, `total`) VALUES
(9, 4, 1, 0, 0, '0000-00-00 00:00:00', 0, 'cog3ojafofc9638q4srh5bjsip', 9.45);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `description`, `image`, `price`, `quantity`) VALUES
(2, 1, 'Jus d’Orange de Floride', 'Bouteille d’un litre.', 'bestorange-juice.jpg', '2.95', 5),
(3, 1, 'Dosette Café', 'Mélange goût italien', 'dosetteCafe.jpg', '3.75', 2),
(4, 2, 'Assortiment de biscuits secs', 'Boîte de 20 biscuits composée de galettes, cookies, crêpes dentelles et sablés', 'assortimentBiscuitsSec.jpg', '12.90', 0),
(5, 2, 'Biscuits de Noël', 'Biscuits à la cannelle, au chocolat, sablés', 'biscuitNoel.jpg', '10.50', 12),
(6, 2, 'Biscuits aux raisins ', 'Biscuits aux raisins secs', 'biscuitRaisin.jpg', '6.90', 3),
(7, 3, 'Pruneaux secs bio ', 'Sachet de 500g. Pruneaux issus d agricultures biologiques', 'pruneauxSecs.jpg', '7.90', 6),
(8, 3, 'Sachet d\'abricots secs ', 'Sachet d\'un kilogramme. Produit recommandé par de nombreux nutritionnistes.', 'abricotsSecs.jpg', '15.50', 12),
(9, 3, 'Plateau de fruits secs ', 'Plateau de 1kg composé d\'abricots secs, de noix de cajous, pruneaux secs, bananes sèches, copeaux de noix de coco...', 'plateauFruitsSecs.jpg', '32.00', 10),
(10, 3, 'Mélange de fruits secs', 'Composés de différents sachets de 250g : des marrons, des cacahouètes, des amandes grillés et des noisettes.', 'melangeMarrons.jpg', '25.00', 8),
(11, 3, 'Mélange de noisettes', 'Sachet de 500g composé de noisettes, noix et amandes grillées.', 'melangeNoisettes.jpg', '8.30', 3),
(12, 3, 'Sachet d\'amandes grillées', 'Sachet de 500g, grillées au four et issues d\'agriculture biologiques. .', 'amandes.jpg', '9.90', 17),
(13, 1, 'Jus de citron', 'Bouteille d\'un litre de jus de citron frais', 'jusCitron.jpg', '5.20', 13),
(14, 1, 'Jus de pommes', 'Pommes issues d\'agricultures biologiques.\r\nBouteille d\'un litre', 'jusPomme.jpg', '3.20', 9),
(15, 1, 'Jus de pamplemousse', 'Bouteille d\'un litre et demi', 'jusPamplemousse.jpg', '7.30', 12),
(16, 1, 'Jus d\'orange', 'Oranges provenant d\'agricultures locales et biologiques.\r\nBouteille d\'un litre', 'jusOrange.jpg', '4.60', 22),
(17, 1, 'Sachet de café en grain', 'Sachet d\'un kilogramme', 'cafeGrain.jpg', '15.00', 14),
(18, 1, 'Capsules de café', 'Paquet de 50 capsules ', 'cafeCapsule.jpg', '45.00', 13),
(19, 1, 'Dosettes de café', 'Paquet de 30 dosettes de café.', 'dosetteCafe.png', '28.10', 12),
(20, 1, 'Sachets de thé à la cadelle', '15 sachets à l\'authentique gout de thé à la cannelle', 'theCannelle.jpg', '10.50', 10),
(21, 1, 'Infusion à la verveine', 'Recommandé pour profiter de nuits calmes.\r\nVendus par paquet de 15 sachets.', 'infusionVerveine.jpg', '8.90', 5),
(22, 1, 'Thé vert', '20 sachets de thé vert ', 'theVert.jpg', '13.90', 15),
(23, 1, 'Infusion au citron', 'Paquet de 20 sachets d\'infusion au citron pour partager un moment unique. ', 'infusionCitron.jpg', '15.30', 16),
(24, 2, 'Macarons tout chocolat', 'Macarons uniques au chocolat. Vendus par 10 macarons.', 'macaronChocolat.jpg', '20.50', 20),
(25, 2, 'Boules de neige', 'Boules aromatisées à la noix de coco.\r\nPlateau de 200g ', 'bouleDeNeigeCoco.jpg', '10.80', 8),
(26, 2, 'Cookies au pépites de chocolat', 'Cookies croquants préparés avec de l\'avoine et des pépites de chocolat fondantes.\r\nPaquet de 15 cookies', 'cookiesChocolat', '12.30', 12),
(27, 2, 'Biscuits étoile à la cannelle', 'Biscuits secs pour noël à l\'authentique goût de la cannelle. ', 'biscuitsCannelle.jpg', '13.50', 14),
(28, 2, 'Biscuits en forme de tortue', 'Paquet de 20 petits biscuits en forme de tortue. Goût chocolat vanille', 'biscuitsTortue.jpg', '25.30', 20);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id_product` int(2) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `photo_user` varchar(50) NOT NULL,
  `stars` int(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id_product`, `name_user`, `photo_user`, `stars`, `title`, `description`) VALUES
(28, 'Gerard', 'homme.jpg', 5, 'Trop top', 'Trop beau et trop bon '),
(13, 'Michelle', 'femme.png', 3, 'super', 'cool'),
(4, 'Charlène', 'femme.png', 5, 'Excellent !', 'Ils sont trop bons, je recommande vraiment ces biscuits secs, je ne peux plus m\'en passer ! '),
(24, 'Helène', 'femme.png', 4, 'Vraiment excellent ', 'Je recommande vivement ces macarons, ils ont un gout authentiques et en plus ils ne sont pas très chers '),
(26, 'Marc', 'homme.jpg', 4, 'Très bon rapport qualité prix', 'Ils sont vraiment excellents. Je ne sais pas cuisiner alors je les achète et on dirait vraiment des cookies faits maison !'),
(26, 'Sylvie', 'femme.png', 3, 'Je recommande !', 'Vraiment bons et très craquants, j\'en rachèterai '),
(16, 'Mélanie', 'femme.png', 5, 'Tellement bon ! ', 'Ce jus est incroyablement bon c\'est un plaisir de déjeuner le matin avec un jus d\'orange si frais '),
(23, 'Lilian', 'homme.jpg', 3, 'Je suis fan', 'Moi qui suis fan d\'infusion, c\'est vraiment de la qualité ! peut être un peu cher mais vraiment le prix a payer pour bénéficier de si bonnes infusions'),
(15, 'Elise', 'femme.png', 5, 'Tellement bon !!', 'Je recommande vivement, j\'achète toujours ce bon jus et il fait l\'unanimité à la maison'),
(25, 'Jean', 'homme.jpg', 4, 'Bon goût de noix de coco', 'Vraiment bon, pour les fêtes de Noël, chaque années elles sont très appréciées'),
(11, 'Christophe', 'homme.jpg', 4, 'Trop bon et livraison rapide', 'Ces fruits secs sont vraiment à croquer, et ils sont très vite virés à la maison '),
(12, 'Christine', 'femme.png', 3, 'Trop bon ! ', 'Les amandes sont vraiment bonnes, le paquet ne fait pas longtemps à la maison ! je recommande '),
(7, 'Marie', 'femme.png', 4, 'Une qualité inégalable', 'Les pruneaux sont vraiment excellents je recommande'),
(21, 'Léa', 'femme.png', 4, 'Des très bonnes infusions', 'Un goût intensément bon et une livraison rapide');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `review/product` (`id_product`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `review/product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
