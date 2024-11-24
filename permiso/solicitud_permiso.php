<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include '../includes/navbar.php'; ?>
        <?php include '../includes/menubar.php'; ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>Solicitud de Permiso</h1>
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
                <form method="POST" action="procesar_solicitud_permiso.php" onsubmit="return validarFormulario()">
                    <div class="form-group">
                        <label>Tipo de Permiso</label>
                        <select name="id_tipo" class="form-control" required>
                            <option value="">Seleccione</option>
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
                        <label>Fecha del Permiso</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Hora de Inicio</label>
                        <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Hora Final</label>
                        <input type="time" name="hora_final" id="hora_final" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Justificación</label>
                        <textarea name="justificacion" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
                </form>
            </section>
        </div>
    </div>

    <script>
        function validarFormulario() {
            const fecha = document.getElementById('fecha').value;
            const horaInicio = document.getElementById('hora_inicio').value;
            const horaFinal = document.getElementById('hora_final').value;

            // Validar que la fecha no sea en el pasado
            const fechaHoy = new Date().toISOString().split('T')[0];
            if (fecha < fechaHoy) {
                alert('La fecha del permiso no puede ser en el pasado.');
                return false;
            }

            // Validar que la hora final sea mayor que la hora inicial
            if (horaFinal <= horaInicio) {
                alert('La hora de finalización debe ser mayor que la hora de inicio.');
                return false;
            }

            return true; // Si todo está bien, permite enviar el formulario
        }
    </script>
</body>

<?php include '../includes/scripts.php'; ?>

