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
                    Procesar Solicitud de Vacaciones
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li>Solicitudes</li>
                    <li class="active">Procesar Solicitud de Vacaciones</li>
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
                                $query = mysqli_query(
                                    $conn,
                                    "SELECT CONCAT(usuario.nombre, ' ', usuario.apellido) AS empleado, 
                              solicitudes_vacaciones.fecha_inicio, 
                              solicitudes_vacaciones.fecha_fin, 
                              solicitudes_vacaciones.comentarios, 
                              solicitudes_vacaciones.estado,
                              solicitudes_vacaciones.id_solicitud
                              FROM solicitudes_vacaciones 
                            JOIN usuario ON solicitudes_vacaciones.id_empleado = usuario.id where id_solicitud= '$id_solicitud' "
                                ) or die(mysqli_error($conn));
                                $i = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>                                    

                                    <form class="form-horizontal" enctype='multipart/form-data'>
                                        <input type="hidden" class="form-control" id="id_solicitud" name="id_solicitud" value="<?php echo $row['id_solicitud']; ?>">


                                        <div class="row">
                                            <div class="col-md-1 btn-print">
                                                <div class="form-group">
                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-2 btn-print">
                                                <div class="form-group">
                                                    <label for="empleado">Empleado</label>
                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-4 btn-print">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="empleado" name="empleado" value="<?php echo $row['empleado']; ?>" disabled>
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
                                                    <label for="fecha_inicio">Fecha Inicio</label>
                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-4 btn-print">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo $row['fecha_inicio']; ?>" disabled>
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
                                                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="<?php echo $row['fecha_fin']; ?>" disabled>
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
                                                    <textarea class="form-control" id="comentarios" name="comentarios" disabled><?php echo $row['comentarios']; ?></textarea>
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
                                                    <label for="estado">Estado de la Solicitud</label>
                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-4 btn-print">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="empleado" name="empleado" value="<?php echo $row['estado']; ?>" disabled>
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
                                                    <a class="btn btn-success" href="aprobar.php?id=<?php echo $row['id_solicitud']; ?>"><i class="fa fa-check"></i> APROBAR</a>

                                                    <a class="btn btn-danger" href="rechazar.php?id=<?php echo $row['id_solicitud']; ?>"><i class="fa fa-times"></i> RECHAZAR</a>

                                                    <a href="gestion_vacacion.php" class="btn btn-info">
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

</html>