-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 08:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menu`
--

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `imagen` varchar(30) DEFAULT NULL,
  `precio` varchar(20) DEFAULT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagen`, `precio`, `categoria`) VALUES
(72, 'perro', 'wemwe', 'images/72perro.jpg', '1212', 'Perros'),
(75, 'empanadas', 'sincoin', 'images/75hamburguesa.webp', '32323', 'Hamburguesas'),
(78, 'fsfs', 'sfdfsd', 'images/78hamburguesa.webp', '3232', 'Hamburguesas'),
(90, 'Alcachofas', 'Deliciosas alcachofas', 'images/90alcachofas.webp', '10000', 'Entradas'),
(91, 'Camarones con coco', 'Deliciosos camarones con coco', 'images/91camarones-coco.jpg', '12000', 'Entradas'),
(92, 'Colombiana', 'Refrescante colombiana', 'images/92colombiana.jpg', '5000', 'Bebidas'),
(93, 'Coca cola', 'Refrescante coca cola', 'images/93gaseosa.jpg', '4500', 'Bebidas'),
(95, 'Pepsi', 'Refrescante pepsi', 'images/95pepsi.jpg', '2500', 'Bebidas'),
(97, 'Hamburgesa hawaiana', 'Deliciosa hamburguesa', 'images/97Hawaiana.png', '20000', 'Hamburguesas');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `email`, `admin`) VALUES
(8, 'manuel ', '12345', 'manuelito_fer@hotmail.com', 0),
(10, 'KOKO', '12345678', 'koko@gmail.com', 1),
(11, 'manueldofus', '12345', 'manuelcely75@gmail.com', 0),
(12, 'sebastian', '12345', 'sebastian@gmail.com', 0),
(13, 'manuelk', '12345', 'manuelk@gmail.com', 0),
(14, 'SAF', '12455', 'gonhese@gmail.com', 0),
(15, 'DSDSD', '123412345', 'gonhese@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
