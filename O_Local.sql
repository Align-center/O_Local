-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 25, 2020 at 07:41 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `O_Local`
--

-- --------------------------------------------------------

--
-- Table structure for table `galleryContent`
--

CREATE TABLE `galleryContent` (
  `id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `img_alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galleryContent`
--

INSERT INTO `galleryContent` (`id`, `img_path`, `img_alt`) VALUES
(1, '5e8dbd21c33d7.jpg', 'Plat de spaghetti'),
(2, '5e8dbdba927f6.jpg', 'Pâte faite maison'),
(3, '5e8dbdd7f14df.jpg', 'Pancakes aux myrtilles'),
(4, '5e8dbdebbffc3.jpg', 'Churros fait main'),
(5, '5e8dbe19dca7f.jpg', 'Pomme de terre rôties'),
(6, '5e8dbe3770458.jpg', 'Tartine à l\'ail et fines herbes'),
(7, '5e8dbe92ccf09.jpg', 'Pancakes aux fruits');

-- --------------------------------------------------------

--
-- Table structure for table `homeContent`
--

CREATE TABLE `homeContent` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeContent`
--

INSERT INTO `homeContent` (`id`, `title`, `content`, `img`, `img_alt`) VALUES
(1, 'Notre Concept', 'Vous êtes plutôt plats traditionnels, salades healthy, amoureux de pâtes et de tartines ou encore amateur de snacks rapides à emporter ? Ou juste amateur de cuisine saine, savoureuse et gourmande ? Venez découvrir notre restaurant en plein cœur de St Barnabé. A la croisée de l’avenue Montaigne et de l’avenue de St Julien, nous vous accueillons tous les jours de 8H à 18H Ô’Local.\r\n\r\nNous vous concocterons chaque matin, à base de produits frais, locaux et de saison, des recettes « du jour » authentiques et préparées avec amour: plat, salade, pâtes, tartines, soupe et sandwiches, sur place ou à emporter, pour faire le bonheur de tous. La cerise sur le gâteau : on pâtissera également des bons desserts, intégralement faits maison que vous pourrez déguster tout au long de la journée. ', 'concept.jpg', 'Concept de Ô Local'),
(2, 'Notre équipe', 'Julie est le Yin, l’eau, la force tranquille. Issue d’une famille d’origine Corse et Italienne, la cuisine est une passion partagée transmise de génération en génération. Entre tapenade, petit farci provençal, daube, agneau en croûte d’herbes, tarte aux pommes, les recettes s’enchaînent. Après son BAC et quelques détours de parcours, Julie s’inscrit au CFA Hôtelier où elle effectuera son CAP Cuisine et son BTS où elle découvre enfin le métier de ses rêves.<br>Marine est le Yang, le feu, le brin de folie. Issue elle aussi d’une famille d’origine Italienne, la cuisine est également une passion partagée. Après une année en Australie, elle décide de revenir dans le Sud de la France et d’entamer elle aussi une réorientation professionnelle. Une fois sa blouse de cuisine, son pantalon pied-de-poule et sa toque enfilés, c’est à travers la cuisine que sa créativité, sa folie et son énergie seront un parfait mélange.<br>Ô’Local est avant tout, comme vous l’aurez compris, une histoire d’amitié. Toutes deux en alternance en traditionnel et en collectivité, elles ont su au fil des années, peaufiner leur rêve commun : ouvrir leur propre restaurant. Elles vous y attendent pour vous raconter la suite de l’histoire', 'team.jpg', 'Equipe de Ô Local');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `date`) VALUES
(1, '2020-04-06'),
(2, '2020-04-07'),
(14, '2020-04-06'),
(15, '2020-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `menu_id`) VALUES
(11, 'coin coin au litchi', 12.00, 'Plat', 14),
(12, 'coquillette pesto', 5.00, 'Pâtes', 14),
(13, 'pesto rouge', 6.00, 'Tartine', 14),
(14, 'salade composée', 5.50, 'Salade', 14),
(15, 'pan bagna', 6.00, 'Sandwich', 14),
(16, 'cookie bdc', 3.00, 'Dessert', 14),
(17, 'brownie', 4.00, 'Dessert', 14),
(18, 'courgette farcies', 11.00, 'Plat', 15),
(19, 'spaghetti à la bolognaise', 5.00, 'Pâtes', 15),
(20, 'ail et fines herbes', 6.00, 'Tartine', 15),
(21, 'salade à deux balles', 5.50, 'Salade', 15),
(22, 'tomate pesto', 6.00, 'Sandwich', 15),
(23, 'tiramisu au café', 3.00, 'Dessert', 15),
(24, 'Gateau au yahourt', 2.50, 'Dessert', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `e-mail` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `e-mail`, `phone`, `login`, `password`, `newsletter`, `role`) VALUES
(1, 'Admin', 'Admin', 'test@admin.fr', '0606060606', 'admin', '$2y$10$QHfQ4h0.hxXY7/MjKdEhT.nJI7sWrDiF4EUHcv5Y4o02vPXvJtLf.', 0, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galleryContent`
--
ALTER TABLE `galleryContent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeContent`
--
ALTER TABLE `homeContent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galleryContent`
--
ALTER TABLE `galleryContent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `homeContent`
--
ALTER TABLE `homeContent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
