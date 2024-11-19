<?php
session_start();
include 'includes/conn.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = 'Todos los campos son obligatorios.';
        header('location: index.php');
        exit();
    }

    $pass = md5($password);
    $salt = "a1Bz20ydqelm8m1wql";
    $pass = $salt . $pass;

    $sql = "SELECT * FROM usuario WHERE usuario = '$username'";
    $query = $conn->query($sql);

    if ($query->num_rows < 1) {
        $_SESSION['error'] = 'Usuario no encontrado.';
    } else {
        $row = $query->fetch_assoc();
        if ($pass === $row['password']) {
            if ($row['estado'] == 1) {
                $_SESSION['admin'] = $row['id'];
                header('location: includes/home.php');
                exit();
            } else {
                $_SESSION['error'] = 'Cuenta inactiva. Contacte a RRHH.';
            }
        } else {
            $_SESSION['error'] = 'Contraseña incorrecta.';
        }
    }
} else {
    $_SESSION['error'] = 'Por favor, complete el formulario.';
}

header('location: index.php');
exit();