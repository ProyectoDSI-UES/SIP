<?php session_start();
if (empty($_SESSION['id'])):
endif;
include('../includes/conn.php');

$id_departamento = $_POST['id_departamento'];
$nombre_departamento = $_POST['nombre_departamento'];
$roles = $_POST['roles'];



mysqli_query($conn, "update departamento set roles='$roles',nombre_departamento='$nombre_departamento' where id_departamento='$id_departamento'") or die(mysqli_error($conn));

echo "<script type='text/javascript'>alert(' actualizado correctamente!');</script>";
echo "<script>document.location='departamento.php'</script>";
