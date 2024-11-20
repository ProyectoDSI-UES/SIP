<?php session_start();

include('../includes/conn.php');

// Verificando si el ID viene por GET o POST
if (isset($_REQUEST['id_solicitud'])) {
  $id_solicitud = $_REQUEST['id_solicitud'];
} else {
  $id_solicitud = $_POST['id_solicitud'];
}

$sql = "DELETE FROM solicitudes_vacaciones WHERE id_solicitud = '$id_solicitud'";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

// Redirigiendo a la página de vacaciones
echo "<script>document.location='vacaciones.php'</script>";
