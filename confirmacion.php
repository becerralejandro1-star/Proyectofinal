<?php
session_start();

// Verificar que el mensaje se envió correctamente
if (!isset($_SESSION['mensaje_enviado']) || !$_SESSION['mensaje_enviado']) {
    header("Location: contacto.html");
    exit();
}

$datos = $_SESSION['datos'] ?? null;

// Limpiar sesión después de mostrar
unset($_SESSION['mensaje_enviado']);
unset($_SESSION['datos']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación - Mensaje Enviado</title>
    <link rel="stylesheet" href="proyecto.css">
    <style>
        .contenedor-confirmacion {
            max-width: 600px;
            margin: 80px auto;
            background: rgba(0,0,0,0.8);
            border: 3px solid #FFD700;
            border-radius: 15px;
            padding: 50px;
            text-align: center;
            box-shadow: 0 0 40px rgba(255,215,0,0.4);
        }
        
        .icono-exito {
            font-size: 100px;
            color: #FFD700;
            margin-bottom: 20px;
            animation: bounce 0.6s;
        }
        
        @keyframes bounce {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .contenedor-confirmacion h1 {
            color: #FFD700;
            font-size: 40px;
            margin-bottom: 15px;
        }
        
        .contenedor-confirmacion p {
            color: #ddd;
            font-size: 18px;
            line-height: 1.6;
        }
        
        .datos-confirmacion {
            background: rgba(255,215,0,0.15);
            border-left: 5px solid #FFD700;
            padding: 25px;
            margin: 30px 0;
            border-radius: 8px;
            text-align: left;
        }
        
        .datosconfirmacion p {
            margin: 12px 0;
            font-size: 16px;
            color: #ddd;
        }
        
        .dato-label {
            color: #FFD700;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        
        .dato-valor {
            color: #ccc;
            margin-left: 10px;
            word-break: break-word;
        }
        
        .botones {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 40px;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 15px 35px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .btn-principal {
            background: #FFD700;
            color: black;
        }
        
        .btn-principal:hover {
            background: white;
            transform: scale(1.08);
            box-shadow: 0 0 20px rgba(255,215,0,0.6);
        }
        
        .btn-secundario {
            background: rgba(255,215,0,0.2);
            color: #FFD700;
            border: 2px solid #FFD700;
        }
        
        .btn-secundario:hover {
            background: rgba(255,215,0,0.4);
            transform: scale(1.08);
        }
    </style>
</head>
<body>
    <!-- MENU -->
    <nav>
        <ul>
            <li><a href="Proyecto.html">Inicio</a></li>
            <li><a href="servicios.html">Servicios</a></li>
            <li><a href="portafolio.html">Portafolio</a></li>
            <li><a href="contacto.html">Contacto</a></li>
        </ul>
    </nav>

    <div class="contenedor-confirmacion">
        <div class="icono-exito">✓</div>
        <h1>¡Mensaje Enviado!</h1>
        <p>Gracias por contactarnos</p>
        <p>Tu mensaje ha sido recibido correctamente</p>

        <?php if ($datos): ?>
        <div class="datos-confirmacion">
            <p><span class="dato-label">📝 NOMBRE:</span><br><span class="dato-valor"><?php echo htmlspecialchars($datos['nombre']); ?></span></p>
            <p><span class="dato-label">📧 CORREO:</span><br><span class="dato-valor"><?php echo htmlspecialchars($datos['correo']); ?></span></p>
            <p><span class="dato-label">💬 MENSAJE:</span><br><span class="dato-valor"><?php echo nl2br(htmlspecialchars($datos['mensaje'])); ?></span></p>
            <p><span class="dato-label">⏰ FECHA/HORA:</span><br><span class="dato-valor"><?php echo $datos['fecha']; ?></span></p>
        </div>
        <?php endif; ?>

        <p style="color: #999; font-size: 14px;">
            Nos pondremos en contacto contigo en breve.
        </p>

        <div class="botones">
            <a href="contacto.html" class="btn btn-principal">📨 Enviar otro mensaje</a>
            <a href="Proyecto.html" class="btn btn-secundario">🏠 Volver al inicio</a>
        </div>
    </div>
</body>
</html>
