<?php
include('../includes/session.php');
include('../includes/conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file']['tmp_name'];
    $handle = fopen($file, "r");

    if ($handle !== FALSE) {
        fgetcsv($handle, 1000, ",");

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $id_user = mysqli_real_escape_string($conn, $data[0]);
            $date = mysqli_real_escape_string($conn, $data[1]);

            $query = "INSERT INTO asistencia (id_usuario, fecha) VALUES ('$id_user', '$date')";
            mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        fclose($handle);
        $_SESSION['success'] = "Archivo gaurdado correctamente";
    } else {
        $_SESSION['error'] = "Error al subir el archivo.";
    }
} else {
    $_SESSION['error'] = "El archivo no fue subido.";
}

header('location: procesar_asistencia.php');
exit();
?>