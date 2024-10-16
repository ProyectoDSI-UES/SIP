<?php session_start();

include('../includes/conn.php');

// Verificando si el ID viene por GET o POST
if (isset($_REQUEST['id_user'])) {
  $id_usuario = $_REQUEST['id_user'];
} else {
  $id_usuario = $_POST['id_user'];
}

$sql = "UPDATE usuario SET estado = 0 WHERE id = '$id_usuario'";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($query) {
  // Mensaje de éxito
  echo "<script type='text/javascript'>alert('Eliminado correctamente!');</script>";
} else {
  echo "<script type='text/javascript'>alert('Error al eliminar');</script>";
}

// Redirigiendo a la página de usuarios
echo "<script>document.location='usuario.php'</script>";
