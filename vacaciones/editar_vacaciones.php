<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include '../includes/navbar.php'; ?>
        <?php include '../includes/menubar.php'; ?>
        <?php
        if (isset($_REQUEST['id_solicitud'])) {
            $id_solicitud = $_REQUEST['id_solicitud'];
        } else {
            $id_solicitud = $_POST['id_solicitud'];
        }
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Editar Solicitud de Vacaciones
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li>Vacaciones</li>
                    <li class="active">Editar Solicitud de Vacaciones</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Hecho!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
                    unset($_SESSION['success']);
                }
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">

                            </div>
                            <div class="box-body">
                                <?php
                                $query = mysqli_query($conn, "select * from solicitudes_vacaciones where id_solicitud= '$id_solicitud' ") or die(mysqli_error($conn));
                                $i = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>

                                    <form class="form-horizontal" method="post" action="vacaciones_actualizar.php" enctype='multipart/form-data' onsubmit="return validarFechas()">
                                        <input type="hidden" class="form-control" id="id_solicitud" name="id_solicitud" value="<?php echo $row['id_solicitud']; ?>">


                                        <div class="row">
                                            <div class="col-md-1 btn-print">
                                                <div class="form-group">
                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-2 btn-print">
                                                <div class="form-group">
                                                    <label for="fecha_inicio">Fecha Inicio</label>
                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-4 btn-print">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo $row['fecha_inicio']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 btn-print">

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-1 btn-print">
                                                <div class="form-group">
                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-2 btn-print">
                                                <div class="form-group">
                                                    <label for="fecha_fin">Fecha Fin</label>
                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-4 btn-print">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="<?php echo $row['fecha_fin']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 btn-print">

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-1 btn-print">
                                                <div class="form-group">
                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-2 btn-print">
                                                <div class="form-group">
                                                    <label for="comentarios">Comentarios</label>
                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-4 btn-print">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="comentarios" name="comentarios" required><?php echo $row['comentarios']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4 btn-print">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-1 btn-print">
                                                <div class="form-group">
                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-2 btn-print">
                                                <div class="form-group">
                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-4 btn-print">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
                                                    <a href="vacaciones.php" class="btn btn-success">
                                                        <i class="fa fa-arrow-left"></i> REGRESAR
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-4 btn-print">

                                            </div>
                                        </div>


                                        <br><br><br>
                                        <hr>

                                    </form>

                                    <!--end of modal-->

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include '../includes/footer.php'; ?>
        <?php include 'modal/aplicacion_modal.php'; ?>
    </div>
    <?php include '../includes/scripts.php'; ?>

</body>

<script>
    function validarFechas() {
        // Obtener las fechas de inicio y fin
        var fechaInicio = document.getElementById("fecha_inicio").value;
        var fechaFin = document.getElementById("fecha_fin").value;

        // Verificar que las fechas estén definidas
        if (!fechaInicio || !fechaFin) {
            alert("Por favor, seleccione ambas fechas.");
            return false;
        }

        // Convertir las fechas a objetos Date
        var inicio = new Date(fechaInicio);
        var fin = new Date(fechaFin);

        // Calcular la diferencia en milisegundos
        var diferencia = (fin - inicio) / (1000 * 3600 * 24);

        // Verificar si la diferencia excede los 15 días
        if (diferencia > 15) {
            alert("La duración de las vacaciones no puede exceder los 15 días.");
            return false; // Impide el envío del formulario
        }

        // Si la validación pasa, permite enviar el formulario
        return true;
    }
</script>

</html>
