<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include '../includes/navbar.php'; ?>
    <?php include '../includes/menubar.php'; ?>
    <?php
    if (isset($_REQUEST['id_user'])) {
      $id_user = $_REQUEST['id_user'];
    } else {
      $id_user = $_POST['id_user'];
    }


    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Editar empleado
        </h1>
        <ol class="breadcrumb">
          <li><a href="../usuario/usuario.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li>Empleados</li>
          <li class="active"> Editar empleado</li>
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
                $query = mysqli_query($conn, "select * from usuario where id= '$id_user' ") or die(mysqli_error($conn));
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
                  $cid = $row['id'];
                  $id_departamento = $row['id_departamento'];

                ?>

                  <form class="form-horizontal" method="post" action="usuario_actualizar.php" enctype='multipart/form-data'>
                    <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $row['id']; ?>" required>



                    <div class="row">
                      <div class="col-md-1 btn-print">
                        <div class="form-group">

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-2 btn-print">
                        <div class="form-group">
                          <label for="date">Imagen Antigua</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <IMG src="subir_us/<?php echo $row['imagen']; ?>" style="height:50PX" />
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
                          <label for="date">Imagen Nueva</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <input type="file" class="form-control" id="imagen" name="imagen">
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
                          <label for="date">Nombres</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">

                          <input type="text" class="form-control" id="name" name="nombre" value="<?php echo $row['nombre']; ?>" required>
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
                          <label for="date">Apellidos</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">

                          <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $row['apellido']; ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">

                      </div>
                    </div>



                    <div class="row">
                      <div class="col-md-1 btn-print">
                        <div class="form-group">
                        </div>
                      </div>
                      <div class="col-md-2 btn-print">
                        <div class="form-group">
                          <label for="dui">DUI</label>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <input type="text" class="form-control" id="dui" name="dui" value="<?php echo $row['dui']; ?>" required>
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
                          <label for="date">Teléfono</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">

                          <input type="text" class="form-control" id="telefono" name="telefono" maxlength="8" value="<?php echo $row['telefono']; ?>">
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
                          <label for="date">Usuario</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">

                          <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $row['usuario']; ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">

                      </div>
                    </div>



                    <div class="row">
                      <div class="col-md-1 btn-print">
                        <div class="form-group">
                        </div>
                      </div>
                      <div class="col-md-2 btn-print">
                        <div class="form-group">
                          <label for="id_rol">Rol</label>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <select class="form-control select2" name="id_rol" required>
                            <?php
                            $queryRoles = mysqli_query($conn, "SELECT * FROM roles where estado = 1") or die(mysqli_error($conn));
                            while ($rowRol = mysqli_fetch_array($queryRoles)) {
                            ?>
                              <option value="<?php echo $rowRol['id_rol']; ?>" <?php if ($row['id_rol'] == $rowRol['id_rol']) {
                                                                                  echo "selected";
                                                                                } ?>><?php echo $rowRol['nombre_rol']; ?></option>
                            <?php } ?>
                          </select>
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
                          <label for="date">Correo</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">

                          <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $row['correo']; ?>" required>
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
                          <label for="date">Fecha nacimiento</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">

                          <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required>
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
                          <label for="date">Dirección</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">

                          <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $row['direccion']; ?>" required>
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
                          <label for="date">Nacionalidad</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">

                          <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?php echo $row['nacionalidad']; ?>" required>
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
                          <label for="date">Departamento</label>

                        </div><!-- /.form group -->
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



                    <div class="row">
                      <div class="col-md-1 btn-print">
                        <div class="form-group">
                        </div>
                      </div>
                      <div class="col-md-2 btn-print">
                        <div class="form-group">
                          <label for="id_plaza">Plaza</label>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <select class="form-control select2" name="id_plaza" id="id_plaza" required>
                            <?php
                            $queryc = mysqli_query($conn, "SELECT * FROM plaza where estado = 1;") or die(mysqli_error($conn));
                            while ($rowc = mysqli_fetch_array($queryc)) {
                              $selected = ($rowc['id_plaza'] == $row['id_plaza']) ? 'selected' : '';
                            ?>
                              <option value="<?php echo $rowc['id_plaza']; ?>" <?php echo $selected; ?>>
                                <?php echo $rowc['nombre']; ?>
                              </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 btn-print">
                      </div>
                    </div>

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

                          <a href="usuario.php" class="btn btn-success">
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
  <script src="./validaciones.js"></script>

</body>

</html>