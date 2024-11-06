<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: /HTML/Login.php");
    exit;
}

include "../PHP/conexion.php";

// Verificamos si el ID del ejercicio está en la URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convertimos a entero para evitar inyección SQL

    // Consultamos el ejercicio específico en la base de datos
    $sql = "SELECT * FROM ejercicios_gimnasio WHERE id = ?";
    $stmt = $cnx->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificamos si el ejercicio existe
    if ($result->num_rows > 0) {
        $ejercicio = $result->fetch_assoc();
    } else {
        echo "Ejercicio no encontrado.";
        exit;
    }
} else {
    echo "ID de ejercicio no especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($ejercicio['nombre']); ?></title>
    <link rel="stylesheet" href="/CSS/Ejercicios.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($ejercicio['nombre']); ?></h1>
    </header>

    <main class="container">
        <div class="exercise-content">
            <div class="photo">
                <img src="<?php echo htmlspecialchars($ejercicio['imagen_url']); ?>" alt="<?php echo htmlspecialchars($ejercicio['nombre']); ?>">
            </div>
            <div class="text-container">
                <h2>Descripción</h2>
                <p><?php echo htmlspecialchars($ejercicio['descripcion']); ?></p>
                <div class="steps-container">
                    <h2>Pasos a seguir</h2>
                    <ol class="steps">
                        <li>Comienza de pie, con los pies al ancho de los hombros.</li>
                        <li>Flexiona las rodillas y baja los glúteos como si te estuvieras sentando en una silla.</li>
                        <li>Asegúrate de que tus rodillas no pasen la punta de los pies.</li>
                        <li>Sube lentamente a la posición inicial.</li>
                    </ol>
                </div>
                <a href="../Index.php" class="btn btn-custom">Volver al inicio</a>
            </div>
        </div>
    </main>
</body>
</html>
