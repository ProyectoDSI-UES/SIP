<?php
include '../includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_SESSION['id_user'];
    $id_tipo = $_POST['id_tipo'];
    $fecha = $_POST['fecha'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_final = $_POST['hora_final'];
    $justificacion = $_POST['justificacion'];

    // Validar fecha y hora
    $fechaHoy = date('Y-m-d');
    if ($fecha < $fechaHoy) {
        $_SESSION['error'] = 'La fecha del permiso no puede ser en el pasado.';
        header('location: solicitud_permiso.php');
        exit();
    }

    if ($hora_final <= $hora_inicio) {
        $_SESSION['error'] = 'La hora de finalización debe ser mayor que la hora de inicio.';
        header('location: solicitud_permiso.php');
        exit();
    }

    // Intentar insertar el permiso
    $sql = "INSERT INTO permiso (fecha, hora_inicio, hora_final, justificacion, id_usuario, id_tipo, estado)
            VALUES ('$fecha', '$hora_inicio', '$hora_final', '$justificacion', '$id_usuario', '$id_tipo', 'Pendiente')";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Permiso registrado exitosamente.';
        header('location: solicitud_permiso.php');
    } else {
        die('Error al ejecutar la consulta: ' . $conn->error);
    }
    exit();
}
?>
