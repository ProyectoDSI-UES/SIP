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
          Editar contraseña
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li>Empleado</li>
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
                ?>

                  <form class="form-horizontal" method="post" action="usuario_actualizar_password.php" enctype='multipart/form-data'>
                    <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $row['id']; ?>" required>


                    <div class="row">
                      <div class="col-md-1 btn-print">
                        <div class="form-group">


                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-2 btn-print">
                        <div class="form-group">
                          <label for="date">Contraseña</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">

                          <input type="password" class="form-control" id="password" name="password" required>
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
                          <label for="date">Repetir contraseña</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">

                          <input type="password" class="form-control" id="password2" name="password2" required>
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

                          <button type="submit" class="btn btn-primary">GUARDAR</button>

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