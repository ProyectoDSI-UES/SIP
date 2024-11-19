<?php include '../includes/session.php'; ?> 
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include '../includes/navbar.php'; ?>
    <?php include '../includes/menubar.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>Subir Asistencia</h1>
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
                    <label for="csv_file">Archivo CSV:</label>
                    <div id="drop-zone" class="drag-drop-area">
                      <p>Arrastra aquí tu archivo o haz clic para seleccionarlo</p>
                      <input type="file" name="csv_file" id="csv_file" class="form-control-file" required>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Subir</button>
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
  <style>
    .drag-drop-area {
      border: 2px dashed #007bff;
      border-radius: 5px;
      padding: 20px;
      text-align: center;
      cursor: pointer;
      background-color: #f9f9f9;
    }
    .drag-drop-area p {
      margin: 0;
      font-size: 16px;
      color: #007bff;
    }
    .btn-lg {
      padding: 15px 20px;
      font-size: 18px;
    }
  </style>
  <script>
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('csv_file');

    dropZone.addEventListener('click', () => {
      fileInput.click();
    });

    dropZone.addEventListener('dragover', (e) => {
      e.preventDefault();
      dropZone.style.backgroundColor = '#e9f7ff';
    });

    dropZone.addEventListener('dragleave', () => {
      dropZone.style.backgroundColor = '#f9f9f9';
    });

    dropZone.addEventListener('drop', (e) => {
      e.preventDefault();
      dropZone.style.backgroundColor = '#f9f9f9';
      const files = e.dataTransfer.files;
      if (files.length) {
        fileInput.files = files;
      }
    });
  </script>
</body>

</html>
