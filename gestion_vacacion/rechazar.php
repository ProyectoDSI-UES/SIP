<?php session_start();

include('../includes/conn.php');

// Verificando si el ID viene por GET o POST
if (isset($_REQUEST['id'])) {
    $id_solicitud = $_REQUEST['id'];
} else {
    $id_solicitud = $_POST['id_solicitud'];
}

$sql = "UPDATE solicitudes_vacaciones SET estado = 'Rechazado' WHERE id_solicitud='$id_solicitud'";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

// Redirigiendo a la página de plaza
echo "<script>document.location='gestion_vacacion.php'</script>";