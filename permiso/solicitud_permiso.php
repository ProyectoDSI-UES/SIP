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
                <form method="POST" action="procesar_solicitud_permiso.php">
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
                        <label>Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Finalización</label>
                        <input type="date" name="fecha_final" class="form-control" required>
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
</body>

<?php include '../includes/scripts.php'; ?>
