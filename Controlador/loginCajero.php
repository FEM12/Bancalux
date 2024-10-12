<?php

session_start();

require_once("../Modelo/conexion.php");

if (isset($_POST['usu']) && isset($_POST['contra'])) {

  $username = $_POST['usu'];
  $password = $_POST['contra'];

  $query = "SELECT idEmpleado FROM empleado WHERE usuario = :username AND contrasena = :password AND rol = 'Cajero' AND estado = 'Activo'";
  $stmt = $db -> prepare($query);
  $stmt -> bindParam(':username', $username);
  $stmt -> bindParam(':password', $password);
  $stmt -> execute();

  $result = $stmt -> fetch(PDO::FETCH_ASSOC);

  if ($result) {

    $_SESSION['idEmpleado'] = $result['idEmpleado'];
    header("Location: ../Vista/indexCajero.php");
    exit;

  } else {
    header("Location: ../Vista/loginCajero.php?opcion=error:''");
  }
}
