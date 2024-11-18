<?php session_start();
if (empty($_SESSION['id'])):
endif;
include('../includes/conn.php');

$id_plaza = $_POST['id_plaza'];
$nombre_plaza = $_POST['nombre_plaza'];
$id_departamento = $_POST['id_departamento'];

mysqli_query($conn, "update plaza set nombre = '$nombre_plaza', id_departamento='$id_departamento' where id_plaza='$id_plaza'") or die(mysqli_error($conn));

echo "<script>document.location='plaza.php'</script>";