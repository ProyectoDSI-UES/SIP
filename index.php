<?php
session_start();
if (isset($_SESSION['admin'])) {
  header('location:includes/home.php');
}

?>
<style type="text/css">
  /* Bordered form */
  form {
    border: 3px solid #f1f1f1;

    width: 60%;
    margin: auto;
  }

  /* Full-width inputs */
  input[type=text],
  input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }

  /* Set a style for all buttons */
  button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  /* Add a hover effect for buttons */
  button:hover {
    opacity: 0.8;
  }

  /* Extra style for the cancel button (red) */
  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }

  /* Center the avatar image inside this container */
  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
  }

  /* Avatar image */
  img.avatar {
    width: 40%;
    border-radius: 50%;
  }

  /* Add padding to containers */
  .container {
    padding: 16px;
  }

  /* The "Forgot password" text */
  span.psw {
    float: right;
    padding-top: 16px;
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
      display: block;
      float: none;
    }

    .cancelbtn {
      width: 100%;
    }

    button {
      width: 60%;
    }
  }
</style>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <br>
      <center>
        <b>Inicio de Sesión</b>
      </center>
      <br>
    </div>

    <div class="login-box-body">
      <form action="login.php" method="POST">
        <div class="imgcontainer">
          <img src="includes/images/sip_logo.jpg" alt="Imagen de inicio de sesión" class="avatar">
        </div>
        <div class="form-group has-feedback">
          <br>
          <label for="username" class="form-label">Nombre de Usuario:</label>
          <input type="text" class="form-control" name="username" required autofocus>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <br>
          <label for="password" class="form-label">Contraseña:</label>
          <input type="password" class="form-control" name="password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">

          <button type="submit" class="btn btn-primary" name="login">
            INICIAR SESIÓN</button>
        </div>
      </form>
    </div>
    <?php
    if (isset($_SESSION['error'])) {
      echo "
          <div class='callout callout-danger text-center mt20'>
            <p>" . $_SESSION['error'] . "</p> 
          </div>
        ";
      unset($_SESSION['error']);
    }
    ?>
  </div>

  <?php include 'includes/scripts.php' ?>
</body>

</html>