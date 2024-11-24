<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: /HTML/Login.php");
    exit;
}
include "../PHP/conexion.php";
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM ejercicios_gimnasio WHERE id = ?";
    $stmt = $cnx->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $ejercicio = $result->fetch_assoc();
    } else {
        echo "Ejercicio no encontrado.";
        exit;
    }
    $sql_pasos = "SELECT numero_paso, descripcion FROM pasos_ejercicio WHERE ejercicio_id = ? ORDER BY numero_paso ASC";
    $stmt_pasos = $cnx->prepare($sql_pasos);
    $stmt_pasos->bind_param("i", $id);
    $stmt_pasos->execute();
    $result_pasos = $stmt_pasos->get_result();
    $pasos = [];
    while ($row = $result_pasos->fetch_assoc()) {
        $pasos[] = $row;
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
            <video src="<?php echo htmlspecialchars($ejercicio['gif_url']); ?>" alt="<?php echo htmlspecialchars($ejercicio['nombre']); ?>"controls></video>
            </div>
            <div class="text-container">
                <h2>Descripción</h2>
                <p><?php echo htmlspecialchars($ejercicio['descripcion']); ?></p>
                <div class="steps-container">
                    <h2>Pasos a seguir</h2>
                    <?php if (!empty($pasos)): ?>
                        <ol class="steps">
                            <?php foreach ($pasos as $paso): ?>
                                <li><?php echo htmlspecialchars($paso['descripcion']); ?></li>
                            <?php endforeach; ?>
                        </ol>
                    <?php else: ?>
                        <p>No hay pasos específicos disponibles para este ejercicio.</p>
                    <?php endif; ?>
                </div>
                <a href="../Index.php" class="btn btn-custom">Volver al inicio</a>
            </div>
        </div>
    </main>
</body>
</html>
