<?php
session_start();
include '../includes/session.php';
include '../includes/header.php';

// Obtener el mes de la solicitud
$selected_month = isset($_GET['month']) ? $_GET['month'] : date('Y-m', strtotime('-1 month'));
// Validar ID del usuario
$id_user = null;

// Si viene por GET, úsalo
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
} 
// Si no viene por GET, intenta obtenerlo de la sesión
else if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
}

// Si no se encuentra el ID, mostrar error y salir
if (!$id_user) {
    die("Error: No se proporcionó un ID de usuario válido.");
} // RH/Admin usa `id_user`, usuario usa su propio ID

// Consulta para obtener asistencias
$query = "SELECT * FROM asistencia WHERE id_usuario = '$id_user' AND DATE_FORMAT(fecha, '%Y-%m') = '$selected_month'";
$result = mysqli_query($conn, $query);
$asistencias = [];
while ($row = mysqli_fetch_assoc($result)) {
    $asistencias[] = $row['fecha']; // Guardar fechas de asistencia
}
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <?php include '../includes/navbar.php'; ?>
    <?php include '../includes/menubar.php'; ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Asistencia de Usuario</h1>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Asistencia del mes: <?php echo date('F Y', strtotime($selected_month . '-01')); ?></h3>
                            </div>
                            <div class="box-body">
                                <form method="GET" action="visualizar_asistencia.php">
                                    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                                    <div class="form-group">
                                        <label for="month">Seleccionar Mes:</label>
                                        <input type="month" id="month" name="month" value="<?php echo $selected_month; ?>" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Consultar</button>
                                </form>
                                <br>
                                <div id="calendar">
                                    <?php
                                    // Mostrar calendario
                                    $start_date = strtotime($selected_month . '-01');
                                    $end_date = strtotime('+1 month', $start_date);
                                    $current_date = $start_date;

                                    echo '<table class="table table-bordered">';
                                    echo '<thead><tr>';
                                    echo '<th>Lunes</th><th>Martes</th><th>Miércoles</th><th>Jueves</th><th>Viernes</th><th>Sábado</th><th>Domingo</th>';
                                    echo '</tr></thead>';
                                    echo '<tbody><tr>';

                                    // Rellenar días en blanco al inicio
                                    $first_day_of_week = date('N', $start_date);
                                    for ($i = 1; $i < $first_day_of_week; $i++) {
                                        echo '<td></td>';
                                    }

                                    // Generar los días del mes
                                    while ($current_date < $end_date) {
                                        $day = date('d', $current_date);
                                        $is_present = in_array(date('Y-m-d', $current_date), $asistencias);

                                        echo '<td' . ($is_present ? ' class="bg-success"' : '') . '>';
                                        echo $day;
                                        if ($is_present) {
                                            echo '<br><span class="badge bg-green">Presente</span>';
                                        }
                                        echo '</td>';

                                        // Ir al siguiente día
                                        $current_date = strtotime('+1 day', $current_date);

                                        // Si es domingo, cerrar fila y comenzar otra
                                        if (date('N', $current_date) == 1 && $current_date < $end_date) {
                                            echo '</tr><tr>';
                                        }
                                    }

                                    // Rellenar días en blanco al final
                                    $last_day_of_week = date('N', strtotime('-1 day', $current_date));
                                    for ($i = $last_day_of_week; $i < 7; $i++) {
                                        echo '<td></td>';
                                    }

                                    echo '</tr></tbody></table>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

<?php include '../includes/scripts.php'; ?>
</html>
