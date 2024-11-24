<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include '../includes/navbar.php'; ?>
        <?php include '../includes/menubar.php'; ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>Administrar Permisos</h1>
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

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Empleado</th>
                            <th>Tipo de Permiso</th>
                            <th>Fecha</th>
                            <th>Hora Inicio</th>
                            <th>Hora Final</th>
                            <th>Justificación</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT 
                                    p.id_vacaciones,
                                    CONCAT(u.nombre, ' ', u.apellido) AS empleado,
                                    tp.nombre_permiso,
                                    p.fecha,
                                    p.hora_inicio,
                                    p.hora_final,
                                    p.justificacion,
                                    p.estado
                                FROM permiso p
                                JOIN usuario u ON p.id_usuario = u.id
                                JOIN tipo_permiso tp ON p.id_tipo = tp.id_tipo
                                WHERE p.estado = 'Pendiente'";

                        $query = $conn->query($sql);
                        while ($row = $query->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td>{$row['empleado']}</td>
                                    <td>{$row['nombre_permiso']}</td>
                                    <td>{$row['fecha']}</td>
                                    <td>{$row['hora_inicio']}</td>
                                    <td>{$row['hora_final']}</td>
                                    <td>{$row['justificacion']}</td>
                                    <td>{$row['estado']}</td>
                                    <td>
                                        <button class='btn btn-success btn-sm open-modal' data-id='{$row['id_vacaciones']}' data-action='aprobar'>Aprobar</button>
                                        <button class='btn btn-danger btn-sm open-modal' data-id='{$row['id_vacaciones']}' data-action='rechazar'>Rechazar</button>
                                    </td>
                                </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Modal -->
                <div id="actionModal" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="POST" action="actualizar_permiso.php">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitle">Actualizar Permiso</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id_vacaciones" id="idPermiso">
                                    <input type="hidden" name="accion" id="accion">
                                    <div class="form-group">
                                        <label for="comentario">Comentario</label>
                                        <textarea name="comentario" id="comentario" class="form-control" rows="4" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById('actionModal');
        const idPermisoInput = document.getElementById('idPermiso');
        const accionInput = document.getElementById('accion');
        const modalTitle = document.getElementById('modalTitle');

        document.querySelectorAll('.open-modal').forEach(button => {
            button.addEventListener('click', () => {
                const permisoId = button.getAttribute('data-id');
                const accion = button.getAttribute('data-action');

                idPermisoInput.value = permisoId;
                accionInput.value = accion;
                modalTitle.textContent = accion === 'aprobar' ? 'Aprobar Permiso' : 'Rechazar Permiso';
                $(modal).modal('show');
            });
        });
    });
    </script>

</body>

<?php include '../includes/scripts.php'; ?>
