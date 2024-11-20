<?php session_start();
if (empty($_SESSION['id'])):
endif;
include('../includes/conn.php');

$id_solicitud = $_POST['id_solicitud'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$comentarios = $_POST['comentarios'];

// Actualizar los datos del rol
mysqli_query($conn, "UPDATE solicitudes_vacaciones SET fecha_inicio = '$fecha_inicio', fecha_fin = '$fecha_fin', comentarios = '$comentarios' WHERE id_solicitud = '$id_solicitud'") or die(mysqli_error($conn));

// Redirigir a la página de vacaciones
echo "<script>document.location='vacaciones.php'</script>";
