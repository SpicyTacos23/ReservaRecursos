-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 08:53 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtudcomerciosa`
--

-- --------------------------------------------------------

--
-- Table structure for table `prueba`
--

CREATE TABLE `prueba` (
  `fecha1` datetime NOT NULL,
  `fecha2` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `prueba`
--

INSERT INTO `prueba` (`fecha1`, `fecha2`) VALUES
('2018-11-25 10:00:00', '2018-11-25 13:00:00'),
('2018-11-25 10:00:00', '2018-11-27 16:00:00'),
('2018-11-25 20:00:00', '2018-11-26 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `recursos`
--

CREATE TABLE `recursos` (
  `id_recurso` int(11) NOT NULL,
  `recurso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(1200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `recursos`
--

INSERT INTO `recursos` (`id_recurso`, `recurso`, `descripcion`, `imagen`) VALUES
(1, 'Portátil HP Pavilion', 'Portátil HP Pavilion 14-ce0004ns 14\" Intel Core i5: \r\nEstilo que te hace sentir bien.Con un diseño moderno y sofisticado, el nuevo portátil HP Pavilion ofrece el equilibrio perfecto entre rendimiento y estilo.\r\nElegante. Fino. Sorprendente. Una mezcla de dos tonos, texturas y acabados dan a este portátil un aspecto distinguido y elegante. Todos los detalles se han diseñado para generar rendimiento y estilo.\r\nEspecificaciones técnicas: Intel Core i5 8250U // Windows 10 Home // RAM de 8 GB DDR4 //  Conectores:\r\n1 USB 3.1 Type C (gen 1)\r\nUSB 3.1 Gen 1\r\n1 HDMI\r\n1 RJ-45\r\n1 Combo de auriculares y micrófono\r\n1 Lector de tarjetas SD multiformato HP', 'portatil_hp_pavilion'),
(2, 'Portátil Asus vivobook', 'Portátil ASUS VivoBook 15,6\", AMD Quad-Core E2-6110 APU:\r\nEl ASUS X540 Series incorpora procesadores AMD para poner a tu servicio rendimiento informático fluido y con gran capacidad de respuesta. Con una tarjeta gráfica integrada AMD Radeon R2, una avanzada controladora de memoria integrada en placa, 4 GB de memoria RAM y Windows 10 Home, el X540 es una plataforma ideal para la informática diaria.\r\nEspecificaciones técnicas:\r\nAMD E2 6110 // Windows 10 Home // 4 GB DDR3L // Conectores:\r\n1 USB 2.0\r\n1 USB 3.0\r\n1 USB 3.1 Gen 1\r\n1 Conector RJ45 LAN\r\n1 VGA D-Sub\r\n1 Orificio Bloqueo Kensington\r\n1 Entrada/salida línea audio (combo)', 'Asus_vivobook'),
(3, 'Portátil satellite pro r50', 'Gracias a su combinación de rendimiento y fiabilidad, el Satellite Pro R50-C de 39,6 cm (15,6”) es el portátil ideal para cualquier entorno profesional. Saca partido a las elevadas velocidades de procesamiento de la arquitectura Intel® Core™ y disfruta de la máxima fiabilidad gracias a su resistente diseño, con el que podrás hacer frente a los rigores del día a día.\r\nDiseñado teniendo en cuenta tanto al usuario ocasional como al profesional, el Satellite Pro R50- C permite trabajar en silencio, dispone de una pantalla LCD mate de alta definición e incluye un teclado de tamaño completo que mejora el rendimiento.\r\n\r\nEl Satellite Pro R50-C es el portátil más competitivo de la gama profesional de Toshiba y te permitirá cubrir todas tus necesidades empresariales.\r\nEspecificaciones técnicas:\r\nIntel Celeron 3855U // Windows 10 pro // RAM 4 GB // Conectores:\r\n3 USB 3.0\r\n1 USB 2.0\r\n1 Conector RJ45 LAN\r\n1 VGA D-Sub\r\n1 Salida de audio\r\n1 Lector de tarjetas SD multiformato TOSHIBA', 'satellite_pro_r50'),
(4, 'Móvil huawei_p20', 'Smartphone libre Huawei P20 Lite 64 GB + 4 GB Rosa:\r\nHuawei P20 Lite, pantalla de 5,84\" Full HD+, Camara principal 16 Mpx+2 Mpx y secundaria de 16 Mpx con 2LED Flash, 4GB RAM y 64GB de memoria externa, procesador HiSilicon Kirin 659, sensor de huella dactilar, tecnologia NFC, sensor de reconocimiento facial, USB Tipo C, Bateria : 3000 mAh.\r\nEspecificaciones técnicas:\r\nOcta Core HiSilicon Kirin 659 // Android 8.0 // RAM 4GB // conectores y tecnología de conexión:\r\nUSB-C\r\nNFC\r\nWi-Fi', 'huawei_p20'),
(5, 'Móvil xiaomi miA2 Lite', 'El Xiaomi Mi A2 Lite ya ha llegado. Después del éxito conseguido por Xiaomi con el Mi A1, el fabricante chino acaba de presentar a uno de sus sucesores: el Xiaomi Mi A2 Lite.\r\nEspecificaciones técnicas:\r\nQualcomm® Snapdragon™ 625, Octa-Core de 2.0 GHz // Android ONE // RAM 4GB // conectores y tecnología de conexión:\r\nConector de alimentación\r\nMicrófono\r\nUSB con función de carga\r\nBluetooth', 'xiaomi_mi_A2_Lite'),
(6, 'Proyector Epson ', 'Proyector EPSON calibrado y adaptado para la proyección por varios métodos de conexión: \r\n  VGA X1\r\n  HDMI X2\r\n  MICRO HDMI X2\r\nalta fidelidad y 4k. doulbi surround y home cinema.', 'proyector_Epson_1'),
(7, 'Proyector Epson GTX u45', 'Proyector especializado para realidad virtual y efectos sonoros de hiperfrequencia. \r\nconexiones HDMI, VGA2, HTMU, RPF y RRDT para conectarlo a multi tools HDK 2.3.1 y superiores. ', 'proyector_Epson_2'),
(8, 'sala general Ala Oeste', 'Sala disciplinar orientada en el ala Oeste. Planta 18 pasillo 6 habitación 302. \r\nSala adaptada para el relax y ocio del personal tanto en horas laborales como tiempo personal.\r\n\r\nDisponible para reservar por todo el personal de la empresa para uso público y/o personal. (Fiestas, eventos, bodas, la barbacoa de tu cuñado el cansino)', 'sala_disciplinar_1'),
(9, 'sala general Ala Noreste', 'Sala general situada al Noreste del patio exterior St.Richigans. pabellón 3 parecelas de la 2 a la 4 puerta 14.\r\nSala de exposiciones con pizarra digital y minibar.\r\nUso exclusivo para reuniones sector \"Comercio Exterior\". \r\n\r\nSe pedirá comprobante de identificación a a entrada de la sala, abstenerse usuarios sin privilegios. Todo personal no autorizado será penalizado con severos castigos físicos u diversas humillaciones públicas.  ', 'sala_disciplinar_2'),
(10, 'sala general Ático', 'Sala de reuniones con vistas al mar para impresionar a las visitas. \r\nSituada en el Ático de la torre principal disfruta de las mejores vistas de los barrios marginales, ideal para que los empresarios que manejan billetes se sientan superiores. \r\n\r\nEquipos y satisfacciones:\r\n-Mesa grande madera de arce con incrustaciones de ébano africano. \r\n-Televisores de plasma de 102\".\r\n-Barra de bebidas con atención personal.\r\n-Spa, incluye sauna y piscina climatizada.\r\n-Sala de masajes (final feliz con suplemento).\r\n-Sala privada con display a barra americana y minibar. \r\n\r\nAtención: Severo código de etiqueta.\r\nTotalmente prohibido entrar en chanclas. Chándal sí que se admite que esto no es el Joan 23\r\n', 'sala_disciplinar_3'),
(11, 'Armario de Mantenimiento', 'Sala de las escobas del segundo piso.\r\n\r\nSi necesitas un lugar en la intimidad para llorar sin que nadie te moleste este es el lugar perfecto para desahogarse en un día especialmente estresante.\r\n\r\nUtilidades:\r\n-Un par de mochos mohosos. \r\n-Paquetes de pañuelos para las lágrimas y demás fluidos.\r\n-Las pertenencias de Pepe, el bedel cuyo cuerpo no reclamaron. \r\n', 'sala_multidisciplinar_4'),
(12, 'sala privada de actos privados', 'Sala mediana situada en el Bloque 3A. Buena iluminación y equipada con material de oficina. \r\nCristales polarizados inversos y paredes insonorizadas para reuniones de carácter confidencial y trata de temas delicados. \r\n\r\nActualizado 03/05/2016:\r\nTras últimos acontecimientos recalcamos que queda TOTALMENTE PROHIBIDO el uso de servicios de acompañamiento, meretrices, bailadoras exóticas, reliquias de circo, animales especialmente atractivos y demás personal que no esté estrictamente ligado al desarrollo de esta empresa.', 'sala_disciplinaria_5'),
(13, 'Sala informática ', 'Sala polivalente del departamento TI para la formación de packs de office. \r\n\r\nDisponible para pruebas prácticas grupales de gestión de sistemas.\r\n\r\nDispone de:\r\n25 pentium 3 de 2mb,\r\n13 sillas con ruedas,\r\n16 mesas color blanco,\r\n1 proyector monocroma.\r\n\r\nSe puede utilizar para mandar al becario a desmontar y montar piezas si te toca mucho los co***es y te lo quieres quitar de encima.', 'sala_informatica_1'),
(14, 'sala informática COOP', 'Sala de entrenamiento grupal OBLIGATORIA de Counter Strike GO. \r\nPara evitar otra humillacion ante los blyat de contabilidad en la final de CS:GO de la empresa el año pasado.', 'sala_informatica_2'),
(15, 'Taller de cocina', 'Sala situada en el sótano, debajo de la biblioteca del patio exterior Este.\r\n\r\nEquipada con hornos tamaño industrial y diversos fogones.\r\n\r\nSe puede reservar para clases especiales de hostelería y pastelería. \r\nCapacidad Max. 24 personas. ', 'taller_cocina'),
(16, 'Despacho de reuniones', 'Despacho ubicado en el pasillo de dirección.\r\n\r\nDisponible para reuniones con dirección y coordinadores.\r\n\r\nUso exclusivo para personal de esta empresa. \r\nDispone de botellas de licor del caro y trípodes para poner gráficos que nadie entiende pero que asienten para no parecer que no saben que cojones hacen ahí a las 7 y media de la mañana con lo bien que se está en la cama.', 'sala_entrevistas_1'),
(17, 'Sala de reuniones Marketing ', 'Sala adaptada para las reuniones con el personal de marketing.\r\n\r\nEsta sala está compartida con todos los departamentos por lo que se ha de reservar con antelación. No se admitirán sobornos para disponer antes de ella. ', 'sala_entrevista'),
(18, 'Salón de actos', 'Sala/teatro Disponible para reserva: \r\nFiestas, conciertos, bailes y quinceañeras. \r\nDispone de:\r\n-Equipo de música,\r\n-Bola dico,\r\n-mesas largas con peroles de ponche,\r\n-confeti.\r\n\r\nEscenario abierto para bandas que quiera tocar.\r\n\r\nPor un pequeño suplemento ponemos una balada cuando salgas a bailar con tu moza para que puedas arrimar pepino.', 'salon_de_actos'),
(19, 'Sala meeting', 'Sala para meeting, meeting es la app de citas más ilustre del siglo XXI.\r\n\r\nPuedes reservar la sala para organizar citas rápidas con demás usuarios de esta app de guarretes.\r\n\r\nReserva un jueves y recibirás gratis 2 botes de lubricante sabor cocido madrileño. ', 'sala_reuniones');

-- --------------------------------------------------------

--
-- Table structure for table `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `id_recurso` int(11) NOT NULL,
  `fecha_reserva` datetime NOT NULL,
  `fecha_devolucion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `username`, `id_recurso`, `fecha_reserva`, `fecha_devolucion`) VALUES
(51, 'ssole', 1, '2018-11-26 10:00:00', '2018-11-26 12:00:00'),
(52, 'ssole', 1, '2018-11-29 17:00:00', '2018-11-30 10:00:00'),
(53, 'ssole', 1, '2018-11-29 08:00:00', '2018-11-29 12:00:00'),
(54, 'ssole', 1, '2018-11-29 14:00:00', '2018-11-29 16:00:00'),
(55, 'ssole', 11, '2018-12-13 12:00:00', '2018-12-29 14:00:00'),
(56, 'ssole', 11, '2018-11-28 22:00:00', '2018-11-27 22:00:00'),
(57, 'usuario1', 4, '2018-11-29 16:00:00', '2018-11-30 22:00:00'),
(58, 'usuario1', 4, '2018-11-30 22:00:00', '2018-12-01 22:00:00'),
(59, 'usuario2', 4, '2018-11-29 08:00:00', '2018-11-29 10:00:00'),
(60, 'ssole', 1, '2019-02-01 22:00:00', '2019-02-02 22:00:00'),
(61, 'ssole', 3, '2018-11-27 08:00:00', '2018-11-28 08:00:00'),
(62, 'ssole', 12, '2018-11-27 18:00:00', '2018-11-30 08:00:00'),
(63, 'usuario1', 12, '2018-12-01 08:00:00', '2018-12-31 10:00:00'),
(64, 'ssole', 1, '2019-02-15 10:00:00', '2019-02-16 12:00:00'),
(65, 'usuario1', 4, '2018-11-29 10:00:00', '2018-11-29 14:00:00'),
(66, 'usuario1', 17, '2018-12-14 10:00:00', '2018-12-14 16:00:00'),
(67, 'usuario1', 8, '2018-11-28 12:00:00', '2018-11-28 14:00:00'),
(68, 'usuario14', 12, '2019-01-23 22:00:00', '2019-01-24 10:00:00'),
(69, 'usuario14', 14, '2018-11-28 14:00:00', '2018-12-04 10:00:00'),
(70, 'usuario23', 19, '2018-11-30 10:00:00', '2018-12-03 12:00:00'),
(71, 'usuario23', 19, '2019-01-10 10:00:00', '2019-02-14 12:00:00'),
(72, 'usuario23', 15, '2018-11-30 14:00:00', '2018-12-01 12:00:00'),
(73, 'usuario23', 5, '2018-11-28 14:00:00', '2019-02-28 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `habilitado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `nivel`, `habilitado`) VALUES
(1, 'ssole', 'e120ea280aa50693d5568d0071456460', 'Administrador', 1),
(4, 'usuario1', '46f94c8de14fb36680850768ff1b7f2a', 'Invitado', 1),
(10, 'User2', '', 'Invitado', 1),
(11, 'User23', '', 'Basico', 0),
(12, 'usuario23', '46f94c8de14fb36680850768ff1b7f2a', 'Invitado', 1),
(13, 'usuario14', '46f94c8de14fb36680850768ff1b7f2a', 'Invitado', 1),
(14, 'usuario45', '4d6341896a313c02d55a86eaaa8126b4', 'Invitado', 1),
(15, 'usuario98', 'e961b2ac40aac4cc36a8bf65bca9177e', 'Invitado', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recurso`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
