<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include '../includes/navbar.php'; ?>
        <?php include '../includes/menubar.php'; ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>Permisos por Usuario</h1>
            </section>

            <section class="content">
                <form method="GET" action="">
                    <div class="form-group">
                        <label>Tipo de Permiso</label>
                        <select name="id_tipo" class="form-control">
                            <option value="">Todos</option>
                            <?php
                            $sql = "SELECT * FROM tipo_permiso";
                            $query = $conn->query($sql);
                            while ($row = $query->fetch_assoc()) {
                                echo "<option value='".$row['id_tipo']."'>".$row['nombre_permiso']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fecha</label>
                        <input type="date" name="fecha" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Empleado</th>
                            <th>Tipo de Permiso</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Finalización</th>
                            <th>Justificación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id_tipo = isset($_GET['id_tipo']) ? $_GET['id_tipo'] : '';
                        $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';

                        $sql = "SELECT 
                                    CONCAT(u.nombre, ' ', u.apellido) AS empleado,
                                    tp.nombre_permiso,
                                    p.fecha_inicio,
                                    p.fecha_final,
                                    p.justificacion
                                FROM permiso p
                                JOIN usuario u ON p.id_usuario = u.id
                                JOIN tipo_permiso tp ON p.id_tipo = tp.id_tipo
                                WHERE (p.id_tipo = '$id_tipo' OR '$id_tipo' = '')
                                  AND (p.fecha_inicio = '$fecha' OR '$fecha' = '')";

                        $query = $conn->query($sql);
                        while ($row = $query->fetch_assoc()) {
                            echo "<tr>
                                    <td>".$row['empleado']."</td>
                                    <td>".$row['nombre_permiso']."</td>
                                    <td>".$row['fecha_inicio']."</td>
                                    <td>".$row['fecha_final']."</td>
                                    <td>".$row['justificacion']."</td>
                                  </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>

<?php include '../includes/scripts.php'; ?>
