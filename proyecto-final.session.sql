-- Base de datos
CREATE DATABASE IF NOT EXISTS proyecto_final;

-- Tabla contactos (para guardar mensajes)
CREATE TABLE contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_correo (correo),
    INDEX idx_fecha (fecha)
);

-- Tabla usuarios (opcional para futuro)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    );