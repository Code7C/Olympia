<?php
header('Content-Type: application/json');

session_start();
include 'conexion.php'; 

if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'Debes iniciar sesión.']);
    exit;
}

if (!isset($_POST['like_id'])) {
    echo json_encode(['success' => false, 'message' => 'El ID del plan no fue recibido.']);
    exit;
}

$usuario_id = $_SESSION['id'];
$plan_id = $_POST['like_id'];


$query = "SELECT * FROM likes WHERE usuario_id = $usuario_id AND plan_id = $plan_id";
$result = mysqli_query($cnx, $query);

if (!$result) {
    echo json_encode(['success' => false, 'message' => 'Error al verificar el like: ' . mysqli_error($cnx)]);
    exit;
}

if (mysqli_num_rows($result) > 0) {

    $delete_query = "DELETE FROM likes WHERE usuario_id = $usuario_id AND plan_id = $plan_id";
    if (!mysqli_query($cnx, $delete_query)) {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar el like: ' . mysqli_error($cnx)]);
        exit;
    }

    $update_query = "UPDATE planes SET likes = likes - 1 WHERE like_id = $plan_id";
    if (!mysqli_query($cnx, $update_query)) {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el contador de likes: ' . mysqli_error($cnx)]);
        exit;
    }
} else {

    $insert_query = "INSERT INTO likes (usuario_id, plan_id) VALUES ($usuario_id, $plan_id)";
    if (!mysqli_query($cnx, $insert_query)) {
        echo json_encode(['success' => false, 'message' => 'Error al agregar el like: ' . mysqli_error($cnx)]);
        exit;
    }

    $update_query = "UPDATE planes SET likes = likes + 1 WHERE like_id = $plan_id";
    if (!mysqli_query($cnx, $update_query)) {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el contador de likes: ' . mysqli_error($cnx)]);
        exit;
    }
}


$like_count_query = "SELECT likes FROM planes WHERE like_id = $plan_id";
$like_count_result = mysqli_query($cnx, $like_count_query);

if (!$like_count_result) {
    echo json_encode(['success' => false, 'message' => 'Error al obtener el conteo de likes: ' . mysqli_error($cnx)]);
    exit;
}

$like_count_row = mysqli_fetch_assoc($like_count_result);
$like_count = $like_count_row['likes'];


echo json_encode(['success' => true, 'like_count' => $like_count]);
