<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include '../includes/navbar.php'; ?>
        <?php include '../includes/menubar.php'; ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>Permisos por Usuario</h1>
                    </br>
                    <a href="<?php echo "../permiso/administrar_permisos.php"; ?>" class="btn btn-info btn-sm">
                    <h5><i class="fa fa-calendar"></i>&nbsp&nbspAdministrar Permisos</h5>
                </a>
            </section>

            <section class="content">
                <?php
                if (isset($_SESSION['success'])) {
                    echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
                    unset($_SESSION['success']);
                }
                if (isset($_SESSION['error'])) {
                    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
                    unset($_SESSION['error']);
                }
                ?>

                <!-- Filtros para búsqueda -->
                <form method="GET" action="">
                    <div class="form-group">
                        <label>Tipo de Permiso</label>
                        <select name="id_tipo" class="form-control">
                            <option value="">Todos</option>
                            <?php
                            $sql = "SELECT * FROM tipo_permiso";
                            $query = $conn->query($sql);
                            while ($row = $query->fetch_assoc()) {
                                $selected = (isset($_GET['id_tipo']) && $_GET['id_tipo'] == $row['id_tipo']) ? "selected" : "";
                                echo "<option value='".$row['id_tipo']."' $selected>".$row['nombre_permiso']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="estado" class="form-control">
                            <option value="">Todos</option>
                            <option value="Pendiente" <?= (isset($_GET['estado']) && $_GET['estado'] == 'Pendiente') ? "selected" : ""; ?>>Pendiente</option>
                            <option value="Aprobado" <?= (isset($_GET['estado']) && $_GET['estado'] == 'Aprobado') ? "selected" : ""; ?>>Aprobado</option>
                            <option value="Rechazado" <?= (isset($_GET['estado']) && $_GET['estado'] == 'Rechazado') ? "selected" : ""; ?>>Rechazado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fecha</label>
                        <input type="date" name="fecha" class="form-control" value="<?= isset($_GET['fecha']) ? $_GET['fecha'] : ''; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>

                    <!-- Tabla para mostrar permisos -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Empleado</th>
                                <th>Tipo de Permiso</th>
                                <th>Fecha</th> <!-- Nueva columna para la fecha -->
                                <th>Hora Inicio</th>
                                <th>Hora Final</th>
                                <th>Justificación</th>
                                <th>Estado</th>
                                <th>Comentario Administrador</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Filtros dinámicos
                            $id_tipo = isset($_GET['id_tipo']) ? $_GET['id_tipo'] : '';
                            $estado = isset($_GET['estado']) ? $_GET['estado'] : '';
                            $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';

                            // Consulta con filtros
                            $sql = "SELECT 
                                        CONCAT(u.nombre, ' ', u.apellido) AS empleado,
                                        tp.nombre_permiso,
                                        p.fecha, -- Recuperar el campo fecha
                                        p.hora_inicio,
                                        p.hora_final,
                                        p.justificacion,
                                        p.estado,
                                        p.comentario_admin
                                    FROM permiso p
                                    JOIN usuario u ON p.id_usuario = u.id
                                    JOIN tipo_permiso tp ON p.id_tipo = tp.id_tipo
                                    WHERE (p.id_tipo = '$id_tipo' OR '$id_tipo' = '')
                                    AND (p.estado = '$estado' OR '$estado' = '')
                                    AND ('$fecha' = '' OR p.fecha = '$fecha')"; // Filtro por fecha

                            $query = $conn->query($sql);
                            while ($row = $query->fetch_assoc()) {
                                echo "
                                    <tr>
                                        <td>{$row['empleado']}</td>
                                        <td>{$row['nombre_permiso']}</td>
                                        <td>{$row['fecha']}</td> <!-- Mostrar la fecha -->
                                        <td>{$row['hora_inicio']}</td>
                                        <td>{$row['hora_final']}</td>
                                        <td>{$row['justificacion']}</td>
                                        <td>{$row['estado']}</td>
                                        <td>".($row['comentario_admin'] ? $row['comentario_admin'] : "N/A")."</td>
                                    </tr>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
            </section>
        </div>
    </div>
</body>

<?php include '../includes/scripts.php'; ?>
