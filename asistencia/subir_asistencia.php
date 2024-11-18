<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include '../includes/navbar.php'; ?>
    <?php include '../includes/menubar.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Subir Asistencia
        </h1>
        <ol class="breadcrumb">
          <li><a href="../usuario/usuario.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li>Asistencia</li>
          <li class="active"> Subir Asistencia</li>
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
                <form action="procesar_asistencia.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="csv_file">Archivo: </label>
                    <input type="file" name="csv_file" id="csv_file" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Subir</button>
                </form>
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