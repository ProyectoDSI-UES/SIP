<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEMA DE INFORMACIÓN PERSONAL</title>
  <link rel="icon" type="image/x-icon" href="../includes/images/favicon.ico">
 <!-- Tell the browser to be responsive to screen width -->
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../includes/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../includes/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../includes/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../includes/dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../includes/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../includes/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../includes/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../includes/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../includes/dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <link rel="stylesheet" href="../compras/css/styles.css">

  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#key').on('keyup', function() {
        var key = $(this).val();
        var dataString = 'key=' + key;
        $.ajax({
          type: "POST",
          url: "ajax.php",
          data: dataString,
          success: function(data) {
            //Escribimos las sugerencias que nos manda la consulta
            $('#suggestions').fadeIn(1000).html(data);
            //Al hacer click en algua de las sugerencias
            $('.suggest-element').on('click', function() {
              //Obtenemos la id unica de la sugerencia pulsada
              var id = $(this).attr('id');

              var idlcliente = $(this).attr('id').substring(7, 10).match(/\d+/);
              //Editamos el valor del input con data de la sugerencia pulsada
              $('#key').val($('#' + id).attr('data'));
              //Hacemos desaparecer el resto de sugerencias
              $('#suggestions').fadeOut(1000);
              alert('Has seleccionado a ' + ' ' + $('#' + id).attr('data'));
              document.f1.cliente.value = idlcliente;

              document.f1.clientenombre.value = $('#' + id).attr('data');
              return false;
            });
          }
        });
      });
    });
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <style type="text/css">
    .mt20 {
      margin-top: 20px;
    }

    .bold {
      font-weight: bold;
    }

    /* chart style*/
    #legend ul {
      list-style: none;
    }

    #legend ul li {
      display: inline;
      padding-left: 30px;
      position: relative;
      margin-bottom: 4px;
      border-radius: 5px;
      padding: 2px 8px 2px 28px;
      font-size: 14px;
      cursor: default;
      -webkit-transition: background-color 200ms ease-in-out;
      -moz-transition: background-color 200ms ease-in-out;
      -o-transition: background-color 200ms ease-in-out;
      transition: background-color 200ms ease-in-out;
    }

    #legend li span {
      display: block;
      position: absolute;
      left: 0;
      top: 0;
      width: 20px;
      height: 100%;
      border-radius: 5px;
    }
  </style>
</head>