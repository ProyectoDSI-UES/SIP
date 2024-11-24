<?php
include '../includes/session.php';

if (isset($_GET['id'])) {
    $id_vacaciones = $_GET['id'];

    $sql = "UPDATE permiso SET estado = 'Aprobado' WHERE id_vacaciones = '$id_vacaciones'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Permiso aprobado exitosamente.';
    } else {
        $_SESSION['error'] = 'Error al aprobar el permiso: ' . $conn->error;
    }
} else {
    $_SESSION['error'] = 'Selecciona un permiso para aprobar.';
}

header('location: administrar_permisos.php');
exit();