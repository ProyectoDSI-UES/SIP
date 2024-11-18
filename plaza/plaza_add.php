<?php
session_start();
include('../includes/conn.php');

$nombre_plaza = $_POST['nombre_plaza'];
$estado = $_POST['estado'];
$id_departamento = $_POST['id_departamento'];

mysqli_query($conn, "INSERT INTO plaza(nombre, estado, id_departamento)
				VALUES('$nombre_plaza','$estado','$id_departamento')") or die(mysqli_error($conn));

echo "<script>document.location='plaza.php'</script>";