<?php
session_start();
include('../includes/conn.php');

// Obtener los datos del formulario
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$comentarios = $_POST['comentarios'];

// Obtener el ID del empleado desde la sesión
$id_empleado = $_SESSION['admin'];

// Realizar la inserción en la base de datos
$sql = "INSERT INTO solicitudes_vacaciones(id_empleado, fecha_inicio, fecha_fin, comentarios, estado) 
        VALUES('$id_empleado', '$fecha_inicio', '$fecha_fin', '$comentarios', 'Pendiente')";

// Ejecutar la consulta
if (mysqli_query($conn, $sql)) {
    echo "<script>document.location='vacaciones.php'</script>";
} else {
    // Mostrar error si la inserción falla
    die("Error: " . mysqli_error($conn));
}
?>
