<?php
session_start();
if (isset($_SESSION['admin'])) {
  header('location:includes/home.php');
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="includes/images/sip_logo.jpg"
          class="img-fluid" alt="Sistema de Información Personal">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="login.php" method="POST">
          <!-- Correo input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              name="username" required autofocus placeholder="Ingrese nombre de usuario" />
            <label class="form-label" for="form3Example3">Nombre de usuario</label>
          </div>

          <!-- Contraseña input -->
          <div data-mdb-input-init class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              name="password" required placeholder="Ingrese la contraseña" />
            <label class="form-label" for="form3Example4">Contraseña</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Recordar contraseña
              </label>
            </div>
          </div>

          <br>
          <?php
          if (isset($_SESSION['error'])) {
            echo "
          <div class='alert alert-danger text-center'>
            <p>" . $_SESSION['error'] . "</p> 
          </div>
        ";
            unset($_SESSION['error']);
          }
          ?>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" name="login">INICIAR SESIÓN</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Sistema de Información Personal © 2024.
    </div>
    <!-- Copyright -->
  </div>
</section>

<?php include 'includes/scripts.php' ?>

</html>
