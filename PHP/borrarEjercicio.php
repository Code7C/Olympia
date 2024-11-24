<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

include '../PHP/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ejercicio_id'])) {
    $ejercicio_id = intval($_POST['ejercicio_id']);
    $user_id = $_SESSION['id'];

    $stmt = $cnx->prepare("DELETE FROM ejercicios_gimnasio WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $ejercicio_id, $user_id);

    if ($stmt->execute()) {
        header("Location: ../HTML/misEjercicios.php");
        exit;
    } else {
        echo "Error al borrar el ejercicio.";
    }

    $stmt->close();
}

$cnx->close();
?>
