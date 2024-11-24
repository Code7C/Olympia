<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Ejercicios</title>
  <link rel="stylesheet" href="/CSS/misEjercicios.css">
</head>
<body>
  <h1>Mis Ejercicios</h1>
  <div id="ejercicios">
  <?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

include '../PHP/conexion.php';

$user_id = $_SESSION['id'];

$stmt = $cnx->prepare("SELECT id, nombre, descripcion, imagen_url FROM ejercicios_gimnasio WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ejercicio_id = htmlspecialchars($row['id']);
        echo "<div class='ejercicio'>";
        echo "<h3>" . htmlspecialchars($row['nombre']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['descripcion']) . "</p>";
        $imagen_url = !empty($row['imagen_url']) ? htmlspecialchars($row['imagen_url']) : 'default-image.png';
        echo "<img src='$imagen_url' alt='Imagen del ejercicio'>";
        echo "<form method='POST' action='/PHP/borrarEjercicio.php'>";
        echo "<input type='hidden' name='ejercicio_id' value='$ejercicio_id'>";
        echo "<button type='submit' class='delete-button'>Borrar</button>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "<p class='no-ejercicios'>No tienes ejercicios agregados.</p>";
}

$stmt->close();
$cnx->close();
?>
  </div>
</body>
</html>
