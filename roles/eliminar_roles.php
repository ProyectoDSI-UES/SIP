<?php session_start();

include('../includes/conn.php');

          if(isset($_REQUEST['id_rol']))
            {
              $id_rol=$_REQUEST['id_rol'];
            }
            else
            {
            $id_rol=$_POST['id_rol'];
          }

  mysqli_query($conn,"delete from roles where id_rol='$id_rol'")or die(mysqli_error($conn));
    echo "<script type='text/javascript'>alert('Eliminado correctamente!');</script>";
  echo "<script>document.location='roles.php'</script>";  
  
?>