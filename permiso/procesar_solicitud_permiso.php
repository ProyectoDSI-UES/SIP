<?php
include '../includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_SESSION['id_user']; // Supongamos que el ID de usuario está en la sesión
    $id_tipo = $_POST['id_tipo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];
    $justificacion = $_POST['justificacion'];

    $sql = "INSERT INTO permiso (fecha_inicio, fecha_final, justificacion, id_usuario, id_tipo)
            VALUES ('$fecha_inicio', '$fecha_final', '$justificacion', '$id_usuario', '$id_tipo')";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Permiso registrado exitosamente.';
    } else {
        $_SESSION['error'] = 'Error al registrar el permiso: ' . $conn->error;
    }
}

header('location: solicitud_permiso.php');
exit();
