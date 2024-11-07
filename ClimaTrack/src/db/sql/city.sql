-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Dez-2022 às 16:09
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud-weather-php`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `temp` int(11) NOT NULL,
  `weather` varchar(255) NOT NULL,
  `time` time DEFAULT current_timestamp(),
  `week_day` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `pressure` int(11) NOT NULL,
  `humidity` int(11) NOT NULL,
  `wind` int(11) NOT NULL,
  `temp_max` int(11) NOT NULL,
  `temp_min` int(11) NOT NULL,
  `feels_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `city`
--

INSERT INTO `city` (`id`, `name`, `country`, `temp`, `weather`, `time`, `week_day`, `date`, `icon`, `pressure`, `humidity`, `wind`, `temp_max`, `temp_min`, `feels_like`) VALUES
(96, 'Oslo', 'NO', -7, 'nublado', '10:17:09', 'Domingo', '11 de dezembro de 2022', '04d', 1014, 61, 2, -6, -8, -10),
(98, 'Tokyo', 'JP', 8, 'chuva leve', '10:18:07', 'Domingo', '11 de dezembro de 2022', '10n', 1015, 67, 7, 10, 7, 5),
(103, 'São Paulo', 'BR', 28, 'algumas nuvens', '10:24:16', 'Domingo', '11 de dezembro de 2022', '02d', 995, 58, 6, 28, 27, 29);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
