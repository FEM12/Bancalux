
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `identificador` varchar(10) NOT NULL,
  `DUI` char(10) NOT NULL,
  `sucursal` varchar(100) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO cliente (nombre, apellido, usuario, correo, contrasena, identificador, DUI, sucursal) VALUES
('Carlos', 'Lopez', 'carloL', 'carlos@gmail.com', 'pass1', 'ABC123', '12345678-9', 'Sucursal A'),
('Ana', 'Martinez', 'anaM', 'ana@gmail.com', 'pass2', 'DEF456', '87654321-0', 'Sucursal B'),
('Jose', 'Garcia', 'joseG', 'jose@gmail.com', 'pass3', 'GHI789', '34567890-1', 'Sucursal C'),
('Maria', 'Hernandez', 'mariaH', 'maria@gmail.com', 'pass4', 'JKL012', '09876543-2', 'Sucursal D'),
('David', 'Fernandez', 'davidF', 'david@gmail.com', 'pass5', 'MNO345', '23456789-3', 'Sucursal A'),
('Sofia', 'Perez', 'sofiaP', 'sofia@gmail.com', 'pass6', 'PQR678', '65432198-4', 'Sucursal B'),
('Luis', 'Ramirez', 'luisR', 'luis@gmail.com', 'pass7', 'STU901', '98765432-5', 'Sucursal C'),
('Laura', 'Gomez', 'lauraG', 'laura@gmail.com', 'pass8', 'VWX234', '45678901-6', 'Sucursal D'),
('Jorge', 'Alvarez', 'jorgeA', 'jorge@gmail.com', 'pass9', 'YZA567', '78901234-7', 'Sucursal A'),
('Andrea', 'Diaz', 'andreaD', 'andrea@gmail.com', 'pass10', 'BCD890', '01234567-8', 'Sucursal B');

DROP TABLE IF EXISTS `cuentabanc`;
CREATE TABLE IF NOT EXISTS `cuentabanc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numerocuenta` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `saldo` double NOT NULL,
  `idCliente` int NOT NULL,
  `fechaCrea` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO cuentabanc (numerocuenta, nombre, apellido, correo, saldo, idCliente, fechaCrea) VALUES
('10000001', 'Carlos', 'Lopez', 'carlos@gmail.com', 1000.00, 1, '2023-10-12'),
('10000002', 'Ana', 'Martinez', 'ana@gmail.com', 1500.50, 2, '2023-10-12'),
('10000003', 'Jose', 'Garcia', 'jose@gmail.com', 250.75, 3, '2023-10-12'),
('10000004', 'Maria', 'Hernandez', 'maria@gmail.com', 3000.20, 4, '2023-10-12'),
('10000005', 'David', 'Fernandez', 'david@gmail.com', 500.00, 5, '2023-10-12'),
('10000006', 'Sofia', 'Perez', 'sofia@gmail.com', 1750.00, 6, '2023-10-12'),
('10000007', 'Luis', 'Ramirez', 'luis@gmail.com', 2200.60, 7, '2023-10-12'),
('10000008', 'Laura', 'Gomez', 'laura@gmail.com', 900.15, 8, '2023-10-12'),
('10000009', 'Jorge', 'Alvarez', 'jorge@gmail.com', 1300.40, 9, '2023-10-12'),
('10000010', 'Andrea', 'Diaz', 'andrea@gmail.com', 600.35, 10, '2023-10-12');

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `idEmpleado` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `dui` char(10) NOT NULL,
  `sucursal` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`idEmpleado`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO empleado (nombre, apellido, usuario, correo, contrasena, dui, sucursal, rol, estado) VALUES
('Miguel', 'Sanchez', 'miguelS', 'miguel@gmail.com', 'pass1', '12345678-9', 'Sucursal A', 'Gerente', 'Activo'),
('Luis', 'Mendoza', 'luisM', 'luis@gmail.com', 'pass2', '87654321-0', 'Sucursal B', 'Cajero', 'Activo'),
('Karla', 'Lopez', 'karlaL', 'karla@gmail.com', 'pass3', '34567890-1', 'Sucursal C', 'Atencion al cliente', 'Inactivo'),
('Oscar', 'Garcia', 'oscarG', 'oscar@gmail.com', 'pass4', '09876543-2', 'Sucursal D', 'Cajero', 'Activo'),
('Mario', 'Hernandez', 'marioH', 'mario@gmail.com', 'pass5', '23456789-3', 'Sucursal A', 'Gerente', 'Inactivo'),
('Ana', 'Diaz', 'anaD', 'ana@gmail.com', 'pass6', '65432198-4', 'Sucursal B', 'Atencion al cliente', 'Activo'),
('Sara', 'Ramirez', 'saraR', 'sara@gmail.com', 'pass7', '98765432-5', 'Sucursal C', 'Personal de limpieza', 'Activo'),
('Daniel', 'Gomez', 'danielG', 'daniel@gmail.com', 'pass8', '45678901-6', 'Sucursal D', 'Gerente', 'Activo'),
('Carla', 'Ortiz', 'carlaO', 'carla@gmail.com', 'pass9', '78901234-7', 'Sucursal A', 'Cajero', 'Inactivo'),
('Jorge', 'Alvarez', 'jorgeA', 'jorge@gmail.com', 'pass10', '01234567-8', 'Sucursal B', 'Atencion al cliente', 'Activo');

DROP TABLE IF EXISTS `gerentesucursal`;
CREATE TABLE IF NOT EXISTS `gerentesucursal` (
  `idGerente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  PRIMARY KEY (`idGerente`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO gerentesucursal (nombre, apellido, correo, usuario, contraseña) VALUES
('Carlos', 'Mendez', 'carlos@gmail.com', 'carlosM', 'pass1'),
('Ana', 'Diaz', 'ana@gmail.com', 'anaD', 'pass2'),
('Jose', 'Perez', 'jose@gmail.com', 'joseP', 'pass3'),
('Maria', 'Fernandez', 'maria@gmail.com', 'mariaF', 'pass4'),
('David', 'Lopez', 'david@gmail.com', 'davidL', 'pass5'),
('Sofia', 'Ramirez', 'sofia@gmail.com', 'sofiaR', 'pass6'),
('Luis', 'Gomez', 'luis@gmail.com', 'luisG', 'pass7'),
('Laura', 'Ortiz', 'laura@gmail.com', 'lauraO', 'pass8'),
('Jorge', 'Garcia', 'jorge@gmail.com', 'jorgeG', 'pass9'),
('Andrea', 'Hernandez', 'andrea@gmail.com', 'andreaH', 'pass10');

DROP TABLE IF EXISTS `movimientos`;
CREATE TABLE IF NOT EXISTS `movimientos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `tipoTransac` varchar(15) NOT NULL,
  `monto` double NOT NULL,
  `numerocuenta` varchar(8) NOT NULL,
  `idCliente` int NOT NULL,
  `fechaTransac` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO movimientos (nombre, apellido, correo, tipoTransac, monto, numerocuenta, idCliente, fechaTransac) VALUES
('Carlos', 'Lopez', 'carlos@gmail.com', 'Depósito', 500.00, '10000001', 1, '2023-10-01'),
('Ana', 'Martinez', 'ana@gmail.com', 'Retiro', 150.50, '10000002', 2, '2023-10-02'),
('Jose', 'Garcia', 'jose@gmail.com', 'Depósito', 300.00, '10000003', 3, '2023-10-03'),
('Maria', 'Hernandez', 'maria@gmail.com', 'Retiro', 1000.00, '10000004', 4, '2023-10-04'),
('David', 'Fernandez', 'david@gmail.com', 'Transferencia', 200.00, '10000005', 5, '2023-10-05'),
('Sofia', 'Perez', 'sofia@gmail.com', 'Depósito', 750.25, '10000006', 6, '2023-10-06'),
('Luis', 'Ramirez', 'luis@gmail.com', 'Retiro', 400.50, '10000007', 7, '2023-10-07'),
('Laura', 'Gomez', 'laura@gmail.com', 'Transferencia', 850.75, '10000008', 8, '2023-10-08'),
('Jorge', 'Alvarez', 'jorge@gmail.com', 'Depósito', 650.00, '10000009', 9, '2023-10-09'),
('Andrea', 'Diaz', 'andrea@gmail.com', 'Retiro', 300.00, '10000010', 10, '2023-10-10');

DROP TABLE IF EXISTS `prestamos`;
CREATE TABLE IF NOT EXISTS `prestamos` (
  `idPrestamo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `sueldo` int NOT NULL,
  `prestamo` int NOT NULL,
  `idCliente` int NOT NULL,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`idPrestamo`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO prestamos (nombre, apellido, correo, sueldo, prestamo, idCliente, estado) VALUES
('Carlos', 'Lopez', 'carlos@gmail.com', 1200, 5000, 1, 'Aprobado'),
('Ana', 'Martinez', 'ana@gmail.com', 1500, 7000, 2, 'Aprobado'),
('Jose', 'Garcia', 'jose@gmail.com', 1000, 3000, 3, 'Procesando Solicitud'),
('Maria', 'Hernandez', 'maria@gmail.com', 1300, 4000, 4, 'Rechazado'),
('David', 'Fernandez', 'david@gmail.com', 1800, 8000, 5, 'Aprobado'),
('Sofia', 'Perez', 'sofia@gmail.com', 1600, 6500, 6, 'Aprobado'),
('Luis', 'Ramirez', 'luis@gmail.com', 1100, 2000, 7, 'Procesando Solicitud'),
('Laura', 'Gomez', 'laura@gmail.com', 1450, 5500, 8, 'Aprobado'),
('Jorge', 'Alvarez', 'jorge@gmail.com', 1700, 7500, 9, 'Rechazado'),
('Andrea', 'Diaz', 'andrea@gmail.com', 1250, 3500, 10, 'Aprobado');
