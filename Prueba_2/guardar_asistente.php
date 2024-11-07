<?php

require 'phpqrcode/qrlib.php'; 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_evento_hernandez";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $rut = $_POST['rut'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Subir la imagen
    $imagen = $_FILES['imagen'];
    $imagenRuta = 'imagenes/' . basename($imagen['name']);
    if (!move_uploaded_file($imagen['tmp_name'], $imagenRuta)) {
        die("Error al subir la imagen.");
    }

    
    $sql = "INSERT INTO asistentes (nombre, rut, email, telefono, imagen) VALUES ('$nombre', '$rut', '$email', '$telefono', '$imagenRuta')";
    
    if ($conn->query($sql) === TRUE) {
        $id = $conn->insert_id;
        
        
        $dir = 'imagenes/';
        if (!file_exists($dir) && !mkdir($dir, 0777, true)) {
            die("Error al crear la carpeta de imágenes.");
        }
        
        
        $filename = $dir . 'qr_' . $id . '.png';
        $contenido = 'http://localhost/programacion-web-evaluacion-2-Dylan-Hernandez/Prueba_2/ver_asistente.php?id=' . $id; 
        $tamanio = 10;
        $level = 'M';
        $frameSize = 3;
        
        
        if (QRcode::png($contenido, $filename, $level, $tamanio, $frameSize) === false) {
            die("Error al generar el código QR.");
        } else {
            echo "Código QR generado exitosamente en $filename.<br>";
        }

        
        $url_qr = 'http://localhost/programacion-web-evaluacion-2-Dylan-Hernandez/Prueba_2/imagenes/qr_' . $id . '.png';
        if ($conn->query("UPDATE asistentes SET codigo_qr='$url_qr' WHERE id='$id'") === TRUE) {
            echo "<div class='alert alert-success'>Registro exitoso. <a href='ver_asistente.php?id=$id'>Ver tarjeta virtual</a></div>";
        } else {
            die("Error al actualizar la URL del código QR en la base de datos.");
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
