/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `fly-saver` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fly-saver`;

CREATE TABLE IF NOT EXISTS `detalle_tiquete` (
  `Codigo` int(20) NOT NULL AUTO_INCREMENT,
  `Identificacion` int(20) NOT NULL DEFAULT '0',
  `Nombre` varchar(50) NOT NULL DEFAULT '0',
  `Tiquete_Codigo` int(20) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `Codigo Tiquete` (`Tiquete_Codigo`),
  CONSTRAINT `Codigo Tiquete` FOREIGN KEY (`Tiquete_Codigo`) REFERENCES `tiquete` (`Codigo_Tiquete`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Tabla que contiene la informacion detallada del tiquete, me relaciona FK Tiquete_Codigo con la PK Codigo de la tabla Tiquete';

INSERT INTO `detalle_tiquete` (`Codigo`, `Identificacion`, `Nombre`, `Tiquete_Codigo`) VALUES
	(1, 1234, 'Vuelo Vernao', 1),
	(2, 1111, 'Vuelo Invierno', 3);

CREATE TABLE IF NOT EXISTS `pilotos` (
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(50) CHARACTER SET latin1 NOT NULL,
  `calificacion` int(11) NOT NULL DEFAULT '0',
  `comentario` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `pilotos` (`nombre`, `foto`, `calificacion`, `comentario`) VALUES
	('Luis Colon', '../Img/piloto4.png', 5, 'Siempre mantiene la calma en situaciones difíciles.'),
	('Javier Lopez', '../Img/piloto5.png', 4, 'Conoce muy bien las rutas nacionales.'),
	('Carlos Perez', '../Img/piloto1.png', 5, 'Tiene mucha experiencia y vuela muy bien.'),
	('Jorge Cesar', '../Img/piloto2.png', 4, 'Es muy responsable y siempre llega puntual.'),
	('Luis Martinez', '../Img/piloto3.png', 3, 'Está empezando pero aprende rápido.'),
	('Sofia Torres', '../Img/piloto6.png', 3, 'Es nueva pero demuestra mucho entusiasmo.'),
	('Diego Ramirez', '../Img/piloto7.png', 4, 'Muy buen trabajo en equipo con la tripulación.'),
	('Laura Fernandez', '../Img/piloto8.png', 5, 'Es excelente en vuelos largos e internacionales.'),
	('Andres Castillo', '../Img/piloto9.png', 2, 'Todavía necesita más práctica en maniobras complicadas.'),
	('Matias Cardona', '../Img/piloto10.png', 4, 'Muy buena comunicación con los pasajeros.'),
	('Mateo Garcia', '../Img/piloto11.png', 3, 'Es responsable pero le falta experiencia en vuelos nocturnos.'),
	('Sebastian Hernandez', '../Img/piloto12.png', 5, 'Muy segura y confiable en cada vuelo.');

CREATE TABLE IF NOT EXISTS `rol` (
  `Id_Rol` int(20) NOT NULL AUTO_INCREMENT,
  `Tipo_Rol` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_Rol`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Tabla que guarda los tipos de roles, Contiene la PK Id_Rol con la FK Codigo_Rol de tabla Usuarios ';

INSERT INTO `rol` (`Id_Rol`, `Tipo_Rol`) VALUES
	(1, 'Usuario'),
	(2, 'Empresario'),
	(3, 'Soporte'),
	(4, 'TorreControl'),
	(5, 'Pilotos');

CREATE TABLE IF NOT EXISTS `tiquete` (
  `Codigo_Tiquete` int(20) NOT NULL AUTO_INCREMENT,
  `Valor_Tiquete` int(20) DEFAULT NULL,
  `Id_Usuario` int(20) DEFAULT NULL,
  `Codigo_Vuelo` int(20) DEFAULT NULL,
  PRIMARY KEY (`Codigo_Tiquete`),
  KEY `Clave Usuarios` (`Id_Usuario`),
  KEY `Clave Vuelo` (`Codigo_Vuelo`),
  CONSTRAINT `Clave Usuarios` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Clave Vuelo` FOREIGN KEY (`Codigo_Vuelo`) REFERENCES `vuelo` (`Codigo_Vuelo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Tabla que contiene la informacion del tiquete. la PK Codigo_Tiquete se conecta con la FK Tiquete_Codigo de la tabla detalle_tiquete. ';

INSERT INTO `tiquete` (`Codigo_Tiquete`, `Valor_Tiquete`, `Id_Usuario`, `Codigo_Vuelo`) VALUES
	(1, 15000, 1, 3),
	(2, 2600, 2, 5),
	(3, 3000, 4, 1),
	(4, 2000, 11, 8);

CREATE TABLE IF NOT EXISTS `usuario` (
  `Id_Usuario` int(20) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL DEFAULT '0',
  `Correo` varchar(50) NOT NULL DEFAULT '0',
  `Telefono` varchar(50) NOT NULL DEFAULT '0',
  `Fecha_Nacimiento` varchar(50) NOT NULL DEFAULT '0',
  `Direccion` varchar(50) NOT NULL DEFAULT '0',
  `Numero_Pasaporte` int(20) NOT NULL DEFAULT '0',
  `Nacionalidad` varchar(50) NOT NULL DEFAULT '0',
  `Contrasena` varchar(255) NOT NULL DEFAULT '0',
  `Codigo_Rol` int(20) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `queja` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_Usuario`),
  KEY `Codigo_Rol` (`Codigo_Rol`),
  CONSTRAINT `Clave de Roles` FOREIGN KEY (`Codigo_Rol`) REFERENCES `rol` (`Id_Rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COMMENT='Tabla que contiene los datos de los usuarios que se ingresan y registran, la PK Id_Usuario se conecta con la FK Id_Usuario de la tabla Tiquete';

INSERT INTO `usuario` (`Id_Usuario`, `Nombre`, `Correo`, `Telefono`, `Fecha_Nacimiento`, `Direccion`, `Numero_Pasaporte`, `Nacionalidad`, `Contrasena`, `Codigo_Rol`, `imagen`, `queja`) VALUES
	(1, 'Juan Manuel', 'jguzmanpenagos@gmail.com', '3212506843', '24-09-2006', 'San Antonio de Prado', 100, 'Colombiana', '22222222', 1, '68f65125a816d.jpg', 'Perdi mis maletas'),
	(2, 'Julian Olarte', 'julian@gmail.com', '3137654539', '12-08-2008', 'Itagui', 200, 'colombiana', '123456', 2, '68f65ee4dcb9c.jpg', 'Perdi parte de mi equipaje'),
	(3, 'Juan Jose Ochoa', 'ochoa@gmail.com', '3443457693', '2008-03-21', 'Sabaneta', 300, 'colombiana', '333', 2, NULL, 'Problemas de sobre cupo en el avion de clase A'),
	(4, 'Brayan Curtidor', 'brayan@gmail.com', '36245671252', '2006-12-21', 'Itagui', 400, 'colombiana', '444', 3, '68f624ed950c1.jpg', 'Cancelaron mi vuelo '),
	(5, 'Simon Ramirez', 'simon@gmail.com', '3472353767', '2009-12-21', 'Sabaneta', 500, 'colombiana', '555', 4, NULL, 'La pagina sufrio una caida durante la compra de mi ticket'),
	(6, 'Simon ortiz', 'Simonortiz@gmail.com', '3472375423', '2009-12-21', 'San Antonio de Prado', 600, 'colombiana', '666', 4, NULL, 'Correo de verifiacion  de compra se demora mucho en llegar'),
	(7, 'Luchito', 'lucho@gmail.com', '284456923', '2009-12-13', 'Itagui', 700, 'colombiana', '777', 5, NULL, 'La pagina de atencion al cliente esta caida'),
	(8, 'Jorge', 'jorge@gmail.com', '345642343', '2025-10-11', 'Sabaneta', 800, 'colombia', '888', 5, NULL, 'Problemas con el pago online'),
	(9, 'Dilan', 'dilan@gmail.com', '6676673345', '2025-10-30', 'San Antonio de Prado', 900, 'argentina', '999', 1, NULL, 'Problemas al momento de actualizar mi foto de perfil'),
	(10, 'juanito', 'juanito@gmail.com', '3214563453', '2025-10-11', 'Itagui', 101, 'colombia', '101', 2, '68f620db4ad96.jpg', 'Se cayó el software'),
	(11, 'fercho', 'fercho@gmail.com', '3456535419', '2025-10-21', 'Sabaneta', 201, 'colombia', '201', 3, '68e6f4bc2c72d.jpg', 'Prooblemas con el pago por PSE'),
	(12, 'Maluma', 'maluma@gmail.com', '3456787215', '2025-11-05', 'San Antonio de Prado', 301, 'colombia', '301', 2, NULL, 'Felicitaciones es una increible pagina para viajar '),
	(16, 'Donato', 'donato@gmail.com', '3136995031', '2025-10-15', 'Itagui', 401, 'colombia', '401', 1, '68f620db4ad96.jpg', 'Se cayó el software'),
	(17, 'Cristian', 'cristian@gmail.com', '3116995031', '2024-09-19', 'San Antonio de Prado', 501, 'espana', '501', 1, '68f607a2d05e2.jpg', 'La comodidad que brindan permite viajar tranquilo y disfrutar cada momento '),
	(18, 'juan', 'jguzmanpenagos@gmail.com', '3017969268', '2025-10-09', 'calle 40 A surt #67-45', 777, 'colombia', '22222222', 1, '68f65125a816d.jpg', 'Perdi mis maletas'),
	(19, 'doris', 'doris@gmail.com', '+573116995031', '2025-10-08', 'calle 40 A surt #67-45', 11, 'colombia', '123', 2, '68f63a955dcd3.jpg', 'amo mis estudiantes'),
	(21, 'juan', 'jguzmanpenagos@gmail.com', '+573116995031', '2025-10-02', 'calle 40 A surt #67-45', 434, 'colombia', '1234', 2, '68f65125a816d.jpg', 'Perdi mis maletas');

CREATE TABLE IF NOT EXISTS `vuelo` (
  `Codigo_Vuelo` int(20) NOT NULL AUTO_INCREMENT,
  `Temporada_Vuelo` varchar(50) NOT NULL DEFAULT '0',
  `Origen` varchar(50) DEFAULT NULL,
  `Destino` varchar(50) DEFAULT NULL,
  `Hora_Llegada` varchar(50) DEFAULT NULL,
  `Hora_Salida` varchar(50) DEFAULT NULL,
  `Precio_Adultos` int(20) DEFAULT NULL,
  `Precio_Menores` int(20) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Codigo_Vuelo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Tabla que contiene la informacion de los vuelos, Conecta la PK Codigo_Vuelo con la FK Codigo_Vuelo de la tabla Tiquete';

INSERT INTO `vuelo` (`Codigo_Vuelo`, `Temporada_Vuelo`, `Origen`, `Destino`, `Hora_Llegada`, `Hora_Salida`, `Precio_Adultos`, `Precio_Menores`, `Descripcion`) VALUES
	(1, 'Primavera', 'Bogota', 'Medellin', '10:00', '08:30', 120, 90, 'Escápate de la rutina y conoce Medellín, la ciudad de la eterna primavera.'),
	(2, 'Verano', 'Bogota', 'Cartagena', '13:00', '11:20', 140, 100, 'Disfruta las playas, murallas y atardeceres mágicos de Cartagena.'),
	(3, 'Otoño', 'Medellín', 'Santa Marta', '15:30', '14:00', 130, 95, 'Relájate en las playas de Santa Marta, entre la sierra y el mar Caribe.'),
	(4, 'Invierno', 'Cartagena', 'Pereira', '18:00', '16:30', 110, 85, 'Descubre el encanto cafetero de Pereira, puerta al Eje Cafetero.'),
	(5, 'Primavera', 'Bogotá', 'Quibdó', '11:50', '10:20', 105, 80, 'Conecta con la cultura llanera en Arauca y vive la Colombia auténtica.'),
	(6, 'Verano', 'Bogotá', 'Arauca', '09:15', '07:45', 100, 75, 'Explora la biodiversidad y riqueza cultural del Chocó en Quibdó.'),
	(7, 'Otoño', 'Medellín', 'Ciudad de México', '17:45', '13:00', 410, 320, 'Conoce el corazón de México y su vibrante historia desde Medellín.'),
	(8, 'Invierno', 'Bogotá', 'Miami', '20:10', '16:30', 520, 400, 'Vuela a Miami y vive lo mejor de las compras, la playa y la diversión.'),
	(9, 'Primavera', 'Medellín', 'Madrid', '13:00', '00:30', 890, 700, 'Viaja desde Medellín hasta Madrid y descubre Europa desde su centro cultural.'),
	(10, 'Verano', 'Cali', 'Santiago de Chile', '22:40', '18:00', 560, 440, 'Desde Cali hasta Santiago: una conexión entre dos grandes capitales de Sudamérica.'),
	(11, 'Otoño', 'Bogotá', 'Lima', '19:10', '17:00', 430, 330, 'Explora la cultura milenaria de Lima, con su gastronomía y mar inolvidables.'),
	(12, 'Invienro', 'Medellín', 'Cancún', '14:30', '10:30', 480, 370, 'Cancún te espera con sus playas turquesa y aventuras inolvidables desde Medellín.');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
