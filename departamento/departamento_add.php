<?php 
session_start();
include('../includes/conn.php');
$nombre_departamento = $_POST['nombre_departamento'];
$descripcion = $_POST['descripcion']; // Cambiar "roles" a "descripcion"

mysqli_query($conn, "INSERT INTO departamento(nombre_departamento, descripcion)
                VALUES('$nombre_departamento', '$descripcion')") or die(mysqli_error($conn));

echo "<script>document.location='departamento.php'</script>";
?>
