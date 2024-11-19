<?php
include('../includes/session.php');
include('../includes/conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file']['tmp_name'];

    // Validar que el archivo no esté vacío
    if (!file_exists($file) || filesize($file) === 0) {
        $_SESSION['error'] = "El archivo está vacío o no se pudo leer.";
        header('location: subir_asistencia.php');
        exit();
    }

    // Abrir el archivo CSV
    if (($handle = fopen($file, "r")) !== FALSE) {
        $row = 0;
        $errores = 0;

        // Leer el archivo línea por línea
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $row++;

            // Ignorar la primera fila si es el encabezado
            if ($row === 1) continue;

            // Validar los datos
            if (count($data) < 2) {
                $errores++;
                continue;
            }

            $id_user = mysqli_real_escape_string($conn, trim($data[0]));
            $date = mysqli_real_escape_string($conn, trim($data[1]));

            if (!is_numeric($id_user) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
                $errores++;
                continue;
            }

            // Insertar en la base de datos
            $query = "INSERT INTO asistencia (id_usuario, fecha) VALUES ('$id_user', '$date')
                      ON DUPLICATE KEY UPDATE fecha = VALUES(fecha)";
            if (!mysqli_query($conn, $query)) {
                $errores++;
            }
        }

        fclose($handle);

        if ($errores > 0) {
            $_SESSION['error'] = "El archivo se procesó con algunos errores ($errores registros fallidos).";
        } else {
            $_SESSION['success'] = "Archivo procesado y registros guardados correctamente.";
        }
    } else {
        $_SESSION['error'] = "Error al abrir el archivo.";
    }
} else {
    $_SESSION['error'] = "No se recibió ningún archivo.";
}

header('location: subir_asistencia.php');
exit();
