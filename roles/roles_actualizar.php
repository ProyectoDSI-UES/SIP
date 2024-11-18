<?php session_start();
if (empty($_SESSION['id'])):
endif;
include('../includes/conn.php');

$id_rol = $_POST['id_rol'];
$nombre_rol = $_POST['nombre_rol'];
$descripcion = $_POST['descripcion'];

// Actualizar los datos del rol
mysqli_query($conn, "UPDATE roles SET descripcion = '$descripcion' WHERE id_rol = '$id_rol'") or die(mysqli_error($conn));

// Eliminar las relaciones anteriores de módulos para el rol
mysqli_query($conn, "DELETE FROM rol_modulos WHERE id_rol = '$id_rol'") or die(mysqli_error($conn));

// Verificar si se han seleccionado módulos
if (isset($_POST['modulos'])) {
    // Obtener los módulos seleccionados
    $modulos = $_POST['modulos'];

    // Insertar las nuevas relaciones entre el rol y los módulos
    foreach ($modulos as $id_modulo) {
        mysqli_query($conn, "INSERT INTO rol_modulos (id_rol, id_modulo) VALUES ('$id_rol', '$id_modulo')") or die(mysqli_error($conn));
    }
}

// Redirigir a la página de roles
echo "<script>document.location='roles.php'</script>";
