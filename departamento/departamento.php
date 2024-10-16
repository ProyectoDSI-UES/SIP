<?php include '../includes/session.php'; ?>
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
        Lista de departamentos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Departamentos</li>
        <li class="active">Lista de departamentos</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Hecho!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>         
        
                  <th>Nombre departamento</th>
                  <th>Descripción</th>           
                  <th>Herramientas</th>

                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *  FROM departamento";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $id_departamento=$row['id_departamento'];
                      ?>
                        <tr>
                          <td><?php echo $row['nombre_departamento']; ?></td>
                          <td><?php echo $row['descripcion']; ?></td>
                          <td>
                            <a class="btn btn-danger btn-print" href="<?php  echo "editar_departamento.php?id_departamento=$id_departamento";?>"  role="button">Editar</a>
                            <a class="small-box-footer btn-print" href="<?php echo "eliminar_departamento.php?id_departamento=$id_departamento"; ?>"><i class="glyphicon glyphicon-remove" onClick="return confirm('¿Está seguro de que quieres eliminar este departamento?');"></i></a>
                          </td>
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include '../includes/footer.php'; ?>
  <?php include 'modal/departamento_modal.php'; ?>
</div>
<?php include '../includes/scripts.php'; ?>

</body>
</html>
