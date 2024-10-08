<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include '../includes/navbar.php'; ?>
    <?php include '../includes/menubar.php'; ?>
    <?php
    if (isset($_REQUEST['id_departamento'])) {
      $id_departamento = $_REQUEST['id_departamento'];
    } else {
      $id_departamento = $_POST['id_departamento'];
    }



    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Editar departamento
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li>departamento</li>
          <li class="active">Editar departamento</li>
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

                $query = mysqli_query($conn, "select * from departamento where id_departamento= '$id_departamento' ") or die(mysqli_error($conn));
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {

                ?>

                  <form class="form-horizontal" method="post" action="departamento_actualizar.php" enctype='multipart/form-data'>
                    <input type="hidden" class="form-control" id="id_departamento" name="id_departamento" value="<?php echo $row['id_departamento']; ?>">


                    <div class="row">
                      <div class="col-md-1 btn-print">
                        <div class="form-group">


                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-2 btn-print">
                        <div class="form-group">
                          <label for="date">Nombre departamento</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">

                          <input type="text" class="form-control" id="name" name="nombre_departamento" value="<?php echo $row['nombre_departamento']; ?>">
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
                          <label for="date">roles</label>

                        </div><!-- /.form group -->
                      </div>
                      <div class="col-md-4 btn-print">
                        <div class="form-group">
                          <textarea class="form-control" id="roles" name="roles"><?php echo $row['roles']; ?></textarea>

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