<?php
include 'conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];  
    $imagen = $_FILES['imagen'];
    if (isset($imagen) && $imagen['error'] === 0) {
        $imagenNombre = basename($imagen['name']); 
        $imagenTmpName = $imagen['tmp_name'];
        $imagenDestino = "src/" . $imagenNombre;
        if (move_uploaded_file($imagenTmpName, $imagenDestino)) {
            $sql = "INSERT INTO ejercicios (nombre, descripcion, imagen) VALUES ('$nombre', '$descripcion', '$imagenDestino')";
            if (mysqli_query($cnx, $sql)) {
                echo "Ejercicio agregado correctamente.";
            } else {
                echo "Error al agregar el ejercicio: " . mysqli_error($cnx);
            }
        } else {
            echo "Error al mover el archivo de imagen. Verifica los permisos de la carpeta de destino.";
        }
    } else {
        echo "Error al subir la imagen. Asegúrate de que has seleccionado un archivo y que no hubo errores durante la carga.";
    }
}
mysqli_close($cnx);
?>
