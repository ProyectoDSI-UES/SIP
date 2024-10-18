<?php
include('../../includes/conn.php');

$id_departamento = $_POST['id_departamento'];

$query = mysqli_query($conn, "SELECT * FROM plaza WHERE id_departamento = '$id_departamento' AND estado = 1") or die(mysqli_error($conn));
$options = "";
while ($row = mysqli_fetch_array($query)) {
  $options .= "<option value='{$row['id_plaza']}'>{$row['nombre']}</option>";
}
echo $options;