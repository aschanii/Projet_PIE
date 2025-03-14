-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 mars 2025 à 03:59
-- Version du serveur : 8.0.40
-- Version de PHP : 8.4.4

CREATE database students_isgi_1 ;
use students_isgi_1 ;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `students_isgi_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe1`
--

CREATE TABLE `classe1` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','professor') NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `classe1`
--

INSERT INTO `classe1` (`id`, `username`, `password`, `role`) VALUES
(1, 'DEROUMI', '$2y$12$D0RdRwdjS1u9t5yW3Dv7ROUkKbZzc//SnyKoQsAXJ9yvBXIc/0vpe', 'student'),
(2, 'SGHAIR', '$2y$12$aSXhgXQoaKU4zRVKb6ezg.IJy.HC78WRA2HRslCMJW3NEurFTRLBm', 'student'),
(3, 'BARHARHA', '$2y$12$b0wloMZTfvOCt0Zc2y11yOWlgC7F7Uwc80MmJcj7ldnPFB5KdS0nK', 'student'),
(4, 'RIH', '$2y$12$mh7MbU8GvDLu.pIXV2fs/edKo31ZsJgMNlLxZ5.NAZKX3.tpWCtre', 'student'),
(5, 'MOUDAKIR', '$2y$12$W8SgIPGAv9MV8Y/TP6gRUumm2s5qxffzuY1IrR5icGhHB02XKSeCC', 'student'),
(6, 'FATTAH', '$2y$12$3eNJZq8RD0sCxiGNFjsYhuWcAH8LVhZSDBgI3NsUsRWO0faqgbd7K', 'student'),
(7, 'ZAIDANE', '$2y$12$v4lXevHaWWz5ifSheRMK..MrHmr1o7oxVoZwl8mHaw2E68M/QrRiS', 'student'),
(8, 'BELHAOUI', '$2y$12$urwt4tHoN1AxaR2ZfCCP1.pYKGx56RtHjCfGja0.mudTUO4qPDzmm', 'student'),
(9, 'ALHANE', '$2y$12$XyjbUTsiuAQjh4NUmmIYfupdmu2R7hvRRqcGMh3g9jZn5/3ghjdx.', 'student'),
(10, 'AMALKA', '$2y$12$I.9hubKIs9fW5WrclrQw/OoeiZh6ezajo9/FjxCsCT3W7s0cuKZm.', 'student'),
(11, 'BAROUT', '$2y$12$yaIjfjkKX0xgodFQNi9druqXPLTkZJpsN7zNGrtENMgQXiSo19Qd2', 'student'),
(12, 'FETTAH', '$2y$12$Aq49ovDeWMX9TwMZuxhi/ekbEqTHIA1yJtIuOgd.iF6FArEsBlCma', 'student'),
(13, 'JAAFARI', '$2y$12$3FJFLrOtvI6L9SHTYN7N.e7OPC4q7nYsCromcRf7Ik40OFIp4VAMW', 'student'),
(14, 'ZTOTE', '$2y$12$iMfc0e1wrfScTqR3ONeXdOekY.YupF9Db5/xaCXhdsJLCV1UtGERy', 'student'),
(15, 'ZRIGUA', '$2y$12$EjmA0p69Fs0o1d8N.lEfae2pHobMTBQTCoooKqqM02Sii.Zfn3CVG', 'student'),
(16, 'MOUNIB', '$2y$12$pCK0QEoyQmIIuKmrxYXRw.FqpsZdh3Z9gm.uLZbfML3r5LpI5J.zK', 'student'),
(17, 'MAHFOUD', '$2y$12$usI6DYzYkIA2AkrXjlJdcefU7seGf9X4us4J6lRgHAqVos1RkHvEW', 'student'),
(18, 'CHANI', '$2y$12$p5zjHMSTOsoqZyeL2NAgaerdRNVpWxDXPB55gR7Anw4eydVA/NK7O', 'student'),
(19, 'OUBAHA', '$2y$12$vIT/.mARY7WWsqybiVPOVeta1LxjI3f7wqpGgEPNjHckap0AScljO', 'student'),
(20, 'SAADI', '$2y$12$GEqa9OONDOMPHlnwH8BV1.j9SR40ISW1NJsDYScu/Pp/73D1uvGj2', 'student'),
(21, 'AL MOUMEN', '$2y$12$GLBmHV4IAEPteBAF6S802e/m9B5846XiUx9QFY.9.aLAdZS0DnA.e', 'student'),
(22, 'MENDOUBI', '$2y$12$kuLF3EuE43U85TwPVJ31PODaHK5ZAEpbfNqqYkkHITORa/txO4xTa', 'student'),
(23, 'FAHIMI', '$2y$12$zeqpjZzZsinayvMbpnYaFOhGrJefH1ba7xqSEC/8ZXI4pYRBidxFq', 'student'),
(24, 'AHMED', '$2y$12$zBXwcqUT8ykkwg.eDPJEhuhgpyQgf67O730/nuzrkNoUQSUUdFE2i', 'student'),
(28, 'lagrighi', '$2y$12$xuAykAIfA/6uMbjgtV3OteTa2kzZBjGJHe5Uwpqq/8jjJ2oybXiH.', 'professor');

-- --------------------------------------------------------

--
-- Structure de la table `hand`
--

CREATE TABLE `hand` (
  `id` int NOT NULL,
  `question_id` int NOT NULL,
  `response` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `student_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `otherreponse`
--

CREATE TABLE `otherreponse` (
  `id` int NOT NULL,
  `student_username` varchar(255) NOT NULL,
  `reponse` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `question_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `question_text`) VALUES
(1, 'Écrivez les mots (tags) que vous souhaitez que les gens retiennent de vous.'),
(2, 'Quelles actions menez-vous aujourd’hui pour justifier ces mots ?'),
(3, 'Êtes-vous une personne de confiance ? Si oui ou non, pourquoi ?'),
(4, 'Quels sont les mots écrits par vos collègues à votre sujet ?'),
(5, 'Quels sont les points communs et les différences entre ces mots ?'),
(6, 'Que signifie pour vous « être exemplaire » ?'),
(7, 'Comment pouvez-vous devenir une personne exemplaire ?'),
(8, 'Quelles compétences devez-vous acquérir pour être exemplaire ?'),
(9, 'Quelles sont les 5 valeurs clés qui guident votre quotidien ?'),
(10, 'Y a-t-il des causes qui vous tiennent à cœur et que vous souhaitez défendre ?'),
(11, 'Si vous ne menez pas d’actions aujourd’hui, aimeriez-vous vous engager dans une cause le mois prochain ?'),
(12, 'Quelles actions concrètes entreprenez-vous aujourd’hui pour montrer votre engagement envers ces causes ?'),
(13, 'Comment pouvez-vous construire votre réputation autour des mots clés que vous souhaitez véhiculer ?'),
(14, 'Comment souhaitez-vous que vos actions quotidiennes reflètent les valeurs que vous souhaitez transmettre ?');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe1`
--
ALTER TABLE `classe1`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hand`
--
ALTER TABLE `hand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Index pour la table `otherreponse`
--
ALTER TABLE `otherreponse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classe1`
--
ALTER TABLE `classe1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `hand`
--
ALTER TABLE `hand`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=734;

--
-- AUTO_INCREMENT pour la table `otherreponse`
--
ALTER TABLE `otherreponse`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `hand`
--
ALTER TABLE `hand`
  ADD CONSTRAINT `hand_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
