<?php session_start();


include('../includes/conn.php');

          if(isset($_REQUEST['id_user']))
            {
              $id_user=$_REQUEST['id_user'];
            }
            else
            {
            $id_user=$_POST['id_user'];
          }



  mysqli_query($conn,"delete from clientes where id_cliente='$id_user'")or die(mysqli_error());
    echo "<script type='text/javascript'>alert('Eliminado correctamente!');</script>";
  echo "<script>document.location='cliente.php'</script>";  
  
?>