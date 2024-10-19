<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include '../includes/navbar.php'; ?>
        <?php include '../includes/menubar.php'; ?>
        <?php
        if (isset($_REQUEST['id_rol'])) {
            $id_rol = $_REQUEST['id_rol'];
        } else {
            $id_rol = $_POST['id_rol'];
        }
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Editar rol
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li>Roles</li>
                    <li class="active">Editar rol</li>
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

                                $query = mysqli_query($conn, "SELECT * FROM roles WHERE id_rol= '$id_rol'") or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($query)) {
                                ?>

                                    <form class="form-horizontal" method="post" action="roles_actualizar.php" enctype='multipart/form-data'>
                                        <input type="hidden" class="form-control" id="id_rol" name="id_rol" value="<?php echo $row['id_rol']; ?>">



                                        <!-- Campo Nombre -->
                                        <div class="row">
                                            <div class="col-md-1 btn-print">
                                                <div class="form-group">

                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-2 btn-print">
                                                <div class="form-group">
                                                    <label for="nombre_rol">Nombre</label>

                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-4 btn-print">
                                                <div class="form-group">

                                                    <input type="text" class="form-control" id="nombre_rol" name="nombre_rol" value="<?php echo $row['nombre_rol']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 btn-print">

                                            </div>
                                        </div>



                                        <!-- Campo Descripción -->
                                        <div class="row">
                                            <div class="col-md-1 btn-print">
                                                <div class="form-group">

                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-2 btn-print">
                                                <div class="form-group">
                                                    <label for="descripcion">Descripción</label>

                                                </div><!-- /.form group -->
                                            </div>
                                            <div class="col-md-4 btn-print">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo $row['descripcion']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4 btn-print">

                                            </div>
                                        </div>



                                        <!-- Botón de Guardar -->
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

                                                    <button type="submit" class="btn btn-primary">GUARDAR</button>

                                                </div>
                                            </div>
                                            <div class="col-md-4 btn-print">

                                            </div>
                                        </div>
                                    </form>
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