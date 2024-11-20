<?php include '../includes/session.php'; ?>
<?php
include '../includes/timezone.php';
$today = date('Y-m-d');
$year = date('Y');
if (isset($_GET['year'])) {
  $year = $_GET['year'];
}
date_default_timezone_set("America/El_Salvador");

?>
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include '../includes/navbar.php'; ?>
    <?php include '../includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">Dashboard</li>
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
        <!-- Small boxes (Stat box) -->
        <?php

        // Obteniendo el ID del usuario
        $id_empleado = $user['id'];

        // Consulta para la obtención del rol de usuario
        $sql = "SELECT roles.nombre_rol FROM usuario JOIN roles ON usuario.id_rol = roles.id_rol WHERE usuario.id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id_empleado);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $rol_usuario = $row['nombre_rol'];

        if ($rol_usuario == "Empleado") {

        ?>

          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>0</h3>
                  <p>Asistencia</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-stalker"></i>
                </div>
                <a href="#" class="small-box-footer">Más información<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <?php
        }
        ?>



        <?php
        if ($rol_usuario == "Administrador") {

        ?>

          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php
                  $sql = "SELECT * FROM usuario";
                  $query = $conn->query($sql);

                  echo "<h3>" . $query->num_rows . "</h3>";
                  ?>
                  <p>Empleados</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-stalker"></i>
                </div>
                <a href="../usuario/usuario.php" class="small-box-footer">Más información<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php
                  $sql = "SELECT * FROM departamento ";
                  $query = $conn->query($sql);

                  echo "<h3>" . $query->num_rows . "</h3>"
                  ?>

                  <p>Departamentos</p>
                </div>
                <div class="icon">
                  <i class="ion ion-home"></i>
                </div>
                <a href="../departamento/departamento.php" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php
                  $sql = "SELECT * FROM roles ";
                  $query = $conn->query($sql);

                  echo "<h3>" . $query->num_rows . "</h3>"
                  ?>

                  <p>Roles</p>
                </div>
                <div class="icon">
                  <i class="ion ion-filing"></i>
                </div>
                <a href="../roles/roles.php" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

          </div>

        <?php
        }
        ?>



      </section>
      <!-- right col -->
    </div>
    <?php include '../includes/footer.php'; ?>

  </div>
  <!-- ./wrapper -->

  <?php include '../includes/scripts.php'; ?>

</body>

</html>