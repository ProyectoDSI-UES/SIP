<?php session_start();

include('../includes/conn.php');

// Verificando si el ID viene por GET o POST
if (isset($_REQUEST['id_rol'])) {
  $id_rol = $_REQUEST['id_rol'];
} else {
  $id_rol = $_POST['id_rol'];
}

$sql = "UPDATE roles SET estado = 0 WHERE id_rol='$id_rol'";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($query) {
  // Mensaje de éxito
  echo "<script type='text/javascript'>alert('Eliminado correctamente!');</script>";
} else {
  echo "<script type='text/javascript'>alert('Error al eliminar');</script>";
}

// Redirigiendo a la página de roles
echo "<script>document.location='roles.php'</script>";
