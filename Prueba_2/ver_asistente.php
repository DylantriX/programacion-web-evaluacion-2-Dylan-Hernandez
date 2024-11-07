<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_evento_hernandez";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el id del asistente de la URL
$id = $_GET['id'];

// Consultar los datos del asistente
$sql = "SELECT * FROM asistentes WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Asistente no encontrado.";
    exit;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta de Asistente</title>
    <!-- CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .ticket-card {
            width: 600px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: grid;
            grid-template-columns: 60% 40%; /* 60% para la información, 40% para el QR */
        }

        .ticket-info {
            padding: 20px;
            background-color: #ffe9c5;
        }

        .ticket-info h5 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .ticket-info p {
            margin: 5px 0;
        }

        .ticket-qr {
            background-color: #FF0000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .ticket-qr img {
            width: 120px;
            height: 120px;
            margin-bottom: 10px;
        }

        .ticket-qr small {
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="ticket-card">
        <div class="ticket-info">
            <h5>Asistente: <?php echo !empty($row['nombre']) ? $row['nombre'] : 'No disponible'; ?></h5>
            <p><strong>RUT:</strong> <?php echo !empty($row['rut']) ? $row['rut'] : 'No disponible'; ?></p>
            <p><strong>Email:</strong> <?php echo !empty($row['email']) ? $row['email'] : 'No disponible'; ?></p>
            <p><strong>Teléfono:</strong> <?php echo !empty($row['telefono']) ? $row['telefono'] : 'No disponible'; ?></p>
            <p><strong>Fecha de Registro:</strong> <?php echo !empty($row['fecha_registro']) ? $row['fecha_registro'] : 'No disponible'; ?></p>
        </div>

        <div class="ticket-qr">
            <h6>QR</h6>
            <img src="<?php echo !empty($row['codigo_qr']) ? 'http://localhost/programacion-web-evaluacion-2-Dylan-Hernandez/Prueba_2/' . $row['codigo_qr'] : 'http://localhost/programacion-web-evaluacion-2-Dylan-Hernandez/Prueba_2/qr_por_defecto.png'; ?>" alt="Código QR">
            <small>Escanea el QR para verificar</small>
        </div>
    </div>
</div>

</body>
</html>