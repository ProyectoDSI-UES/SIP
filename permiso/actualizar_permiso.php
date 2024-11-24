<?php
include '../includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_vacaciones = $_POST['id_vacaciones'];
    $accion = $_POST['accion'];
    $comentario = $_POST['comentario'];
    $estado = $accion === 'aprobar' ? 'Aprobado' : 'Rechazado';

    $sql = "UPDATE permiso SET estado = '$estado', comentario_admin = '$comentario' WHERE id_vacaciones = '$id_vacaciones'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'El permiso ha sido actualizado correctamente.';
    } else {
        $_SESSION['error'] = 'Error al actualizar el permiso: ' . $conn->error;
    }

    header('location: administrar_permisos.php');
    exit();
}
?>
