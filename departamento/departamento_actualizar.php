<?php session_start();
if (empty($_SESSION['id'])):
endif;
include('../includes/conn.php');

$id_departamento = $_POST['id_departamento'];
$nombre_departamento = $_POST['nombre_departamento'];
$descripcion = $_POST['descripcion'];



mysqli_query($conn, "update departamento set descripcion='$descripcion',nombre_departamento='$nombre_departamento' where id_departamento='$id_departamento'") or die(mysqli_error($conn));

echo "<script>document.location='departamento.php'</script>";
