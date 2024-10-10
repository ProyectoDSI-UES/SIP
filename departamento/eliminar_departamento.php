<?php session_start();


include('../includes/conn.php');

          if(isset($_REQUEST['id_departamento']))
            {
              $id_departamento=$_REQUEST['id_departamento'];
            }
            else
            {
            $id_departamento=$_POST['id_departamento'];
          }

  mysqli_query($conn,"delete from departamento where id_departamento='$id_departamento'")or die(mysqli_error());
    echo "<script type='text/javascript'>alert('Eliminado correctamente!');</script>";
  echo "<script>document.location='departamento.php'</script>";  
  
?>