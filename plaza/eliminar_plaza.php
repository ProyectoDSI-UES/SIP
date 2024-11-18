<?php session_start();

include('../includes/conn.php');

// Verificando si el ID viene por GET o POST
if (isset($_REQUEST['id_plaza'])) {
  $id_plaza = $_REQUEST['id_plaza'];
} else {
  $id_plaza = $_POST['id_plaza'];
}

$sql = "UPDATE plaza SET estado = 0 WHERE id_plaza='$id_plaza'";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

// Redirigiendo a la página de roles
echo "<script>document.location='plaza.php'</script>";
