<?php
session_start();
include('../includes/conn.php');
	$nombre_rol = $_POST['nombre_rol'];
	$estado = $_POST['estado'];
    $descripcion = $_POST['descripcion'];


			mysqli_query($conn,"INSERT INTO roles(nombre_rol,estado,descripcion)
				VALUES('$nombre_rol','$estado','$descripcion')")or die(mysqli_error($conn));

			
			echo "<script>document.location='roles.php'</script>";

?>
