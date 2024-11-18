<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include '../includes/navbar.php'; ?>
        <?php include '../includes/menubar.php'; ?>
        <?php
        if (isset($_REQUEST['id_plaza'])) {
            $id_plaza = $_REQUEST['id_plaza'];
        } else {
            $id_plaza = $_POST['id_plaza'];
        }
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Editar plaza
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li>Plaza</li>
                    <li class="active">Editar plaza</li>
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

                                $query = mysqli_query($conn, "SELECT * FROM plaza WHERE id_plaza= '$id_plaza'") or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($query)) {
                                ?>

                                    <form class="form-horizontal" method="post" action="plaza_actualizar.php" enctype='multipart/form-data'>
                                        <input type="hidden" class="form-control" id="id_plaza" name="id_plaza" value="<?php echo $row['id_plaza']; ?>">

                                        <!-- Campo Nombre -->
                                        <div class="row">
                                            <div class="col-md-1 btn-print">
                                                <div class="form-group">

                                                </div>
                                            </div>
                                            <div class="col-md-2 btn-print">
                                                <div class="form-group">
                                                    <label for="nombre_plaza">Nombre</label>

                                                </div>
                                            </div>
                                            <div class="col-md-4 btn-print">
                                                <div class="form-group">

                                                    <input type="text" class="form-control" id="nombre_plaza" name="nombre_plaza" value="<?php echo $row['nombre']; ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Campo Departamento -->
                                        <div class="row">
                                            <div class="col-md-1 btn-print">
                                                <div class="form-group">

                                                </div>
                                            </div>
                                            <div class="col-md-2 btn-print">
                                                <div class="form-group">
                                                    <label for="departamento">Departamento</label>

                                                </div>
                                            </div>
                                            <div class="col-md-4 btn-print">
                                                <div class="form-group">
                                                    <select class="form-control select2" name="id_departamento" id="id_departamento" required>
                                                        <?php
                                                        $queryc = mysqli_query($conn, "SELECT * FROM departamento;") or die(mysqli_error($conn));
                                                        while ($rowc = mysqli_fetch_array($queryc)) {
                                                            // Comparar el id_departamento del departamento actual con el registrado
                                                            $selected = ($rowc['id_departamento'] == $row['id_departamento']) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?php echo $rowc['id_departamento']; ?>" <?php echo $selected; ?>>
                                                                <?php echo $rowc['nombre_departamento']; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>



                                        <!-- Botón de Guardar -->
                                        <div class="row">
                                            <div class="col-md-1 btn-print">
                                                <div class="form-group">

                                                </div>
                                            </div>
                                            <div class="col-md-2 btn-print">
                                                <div class="form-group">

                                                </div>
                                            </div>
                                            <div class="col-md-4 btn-print">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">ACTUALIZAR</button>

                                                    <a href="plaza.php" class="btn btn-success">
                                                        <i class="fa fa-arrow-left"></i> REGRESAR
                                                    </a>
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
    </div>
    <?php include '../includes/scripts.php'; ?>

</body>

</html>