<?php session_start();
if (empty($_SESSION['id_rol'])):
endif;
include('../includes/conn.php');

$id_rol = $_POST['id_rol'];
$nombre_rol = $_POST['nombre_rol'];
$descripcion = $_POST['descripcion'];



mysqli_query($conn, "update roles set id_rol='$id_rol',descripcion='$descripcion' where id_rol='$id_rol'") or die(mysqli_error($conn));

echo "<script type='text/javascript'>alert(' actualizado correctamente!');</script>";
echo "<script>document.location='roles.php'</script>";
