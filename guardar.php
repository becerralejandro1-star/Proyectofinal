<?php

session_start();

// Mostrar errores para debuggear
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir archivo de conexión
include 'conexion.php';

// Validar que el formulario fue enviado por POST
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die("Error: Método no permitido");
}

// Validar que los campos existan
if (!isset($_POST['nombre']) || !isset($_POST['correo']) || !isset($_POST['mensaje'])) {
    die("Error: Faltan datos en el formulario");
}

// Obtener y limpiar datos
$nombre = trim($_POST['nombre']);
$correo = trim($_POST['correo']);
$mensaje = trim($_POST['mensaje']);

// Validar que no estén vacíos
if (empty($nombre) || empty($correo) || empty($mensaje)) {
    die("Error: Todos los campos son obligatorios");
}

// Validar longitud máxima
if (strlen($nombre) > 100) {
    die("Error: El nombre no debe exceder 100 caracteres");
}
if (strlen($correo) > 100) {
    die("Error: El correo no debe exceder 100 caracteres");
}

// Validar formato de correo
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    die("Error: El correo no es válido");
}

// Usar PREPARED STATEMENTS para evitar SQL Injection
$stmt = $conexion->prepare("INSERT INTO contactos (nombre, correo, mensaje) VALUES (?, ?, ?)");

if (!$stmt) {
    die("Error al preparar la consulta: " . $conexion->error);
}

// Vincular parámetros (s = string)
$stmt->bind_param("sss", $nombre, $correo, $mensaje);

// Ejecutar consulta
if ($stmt->execute()) {
    // Guardar datos en sesión para mostrar en confirmación
    $_SESSION['mensaje_enviado'] = true;
    $_SESSION['datos'] = array(
        'nombre' => $nombre,
        'correo' => $correo,
        'mensaje' => $mensaje,
        'fecha' => date('d/m/Y H:i:s')
    );
    
    // Debug: mostrar que se guardó
    echo "✅ Mensaje guardado correctamente en la base de datos<br>";
    echo "Redirigiendo a confirmación...";
    
    // Pequeño delay y redirigir
    header("Refresh: 2; url=confirmacion.php");
    exit();
} else {
    die("❌ Error al guardar el mensaje: " . $stmt->error);
}

$stmt->close();
$conexion->close();

?>