<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['imagen'])) ? '../usuario/subir_us/' . $user['imagen'] : '../layout/imagen/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['nombre'] . ' ' . $user['apellido']; ?></p>
        <a><i class="fa fa-circle text-success"></i>En línea</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENÚ</li>
      <li class=""><a href="../includes/home.php"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>


      <?php

      // Obtener el ID del usuario actual
      $id_empleado = $user['id'];

      // Consulta para obtener el rol del usuario
      $sql = "SELECT roles.nombre_rol FROM usuario 
              JOIN roles ON usuario.id_rol = roles.id_rol 
              WHERE usuario.id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('i', $id_empleado); // 'i' indica que es un integer
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();

      // Almacena el nombre del rol
      $rol_usuario = $row['nombre_rol'];

      // Mostrar el menú según el rol del usuario
      if ($rol_usuario == "administrador") {

      ?>

        <li class="header">GESTIÓN</li>

        <li class="">
          <a href="../usuario/usuario.php">
            <i class="fa fa-handshake-o"></i>
            <span>Empleados</span>
          </a>
        </li>


        <li class="">
          <a href="../departamento/departamento.php">
            <i class="fa fa-group"></i>
            <span>Departamento</span>
          </a>
        </li>


        <li class="">
          <a href="../roles/roles.php">
            <i class="fa fa-user"></i>
            <span>Roles</span>
          </a>
        </li>


      <?php
      // En caso de que el usuario tenga rol de empleado
      } elseif ($rol_usuario == "empleado") {
      ?>

        <li class="header">GESTIÓN</li>
        <li class="">
          <a href="#">
            <i class="fa fa-home"></i>
            <span>Asistencias</span>
          </a>
        </li>
    </ul>
    </li>

  <?php

        # code...
      }
  ?>


  </ul>
  </section>
  <!-- /.sidebar -->
</aside>