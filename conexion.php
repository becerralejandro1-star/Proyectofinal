<?php

// Credenciales de la base de datos
$servidor = "localhost";
$usuario = "Admin";
$password = "1234";
$basedatos = "proyecto_final";

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $password, $basedatos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Configurar charset
$conexion->set_charset("utf8mb4");

?>
