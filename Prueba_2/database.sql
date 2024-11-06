CREATE DATABASE IF NOT EXISTS registro_evento_hernandez;
USE registro_evento_hernandez;


CREATE TABLE IF NOT EXISTS asistentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    rut VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefono VARCHAR(50) NOT NULL,
    imagen TEXT NOT NULL,
    codigo_qr TEXT NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--Datos de prueba
INSERT INTO asistentes (nombre, rut, email, telefono, imagen, codigo_qr, fecha_registro) VALUES
('Juan Pérez', '12.345.678-9', 'juan.perez@example.com', '123456789', 'imagenes/juan_perez.jpg', 'imagenes/qr_1.png', NOW()),
('María López', '98.765.432-1', 'maria.lopez@example.com', '987654321', 'imagenes/maria_lopez.jpg', 'imagenes/qr_2.png', NOW());
