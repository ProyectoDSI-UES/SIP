<?php
session_start();
include('../includes/conn.php');
	$nombre_departamento = $_POST['nombre_departamento'];
	$roles = $_POST['roles'];


			mysqli_query($conn,"INSERT INTO departamento(nombre_departamento,roles)
				VALUES('$nombre_departamento','$roles')")or die(mysqli_error($conn));

			
			echo "<script>document.location='departamento.php'</script>";


?>
