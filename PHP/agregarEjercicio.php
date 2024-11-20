<?php
include 'conexion.php';
session_start();

if (!isset($_SESSION['id'])) {
    echo "Debes iniciar sesión para agregar ejercicios.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];  
    $imagen = $_FILES['imagen'];

    if (isset($imagen) && $imagen['error'] === 0) {
        $imagenNombre = basename($imagen['name']); 
        $imagenTmpName = $imagen['tmp_name'];
        $imagenDestino = "../src/" . $imagenNombre;

        if (move_uploaded_file($imagenTmpName, $imagenDestino)) {
            $stmt = $cnx->prepare("INSERT INTO ejercicios_gimnasio (nombre, descripcion, imagen_url, user_id, es_publico) VALUES (?, ?, ?, ?, ?)");
            $es_publico = false; 
            $stmt->bind_param("sssii", $nombre, $descripcion, $imagenDestino, $user_id, $es_publico);

            if ($stmt->execute()) {
                echo "Ejercicio agregado correctamente.";
            } else {
                echo "Error al agregar el ejercicio: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error al mover el archivo de imagen. Verifica los permisos de la carpeta de destino.";
        }
    } else {
        echo "Error al subir la imagen. Asegúrate de que has seleccionado un archivo y que no hubo errores durante la carga.";
    }
}

mysqli_close($cnx);
?>
