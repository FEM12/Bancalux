<?php

session_start();

require_once("../Modelo/conexion.php");

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {

  $username = $_POST['usuario'];
  $password = $_POST['contrasena'];

  $query = "SELECT idCliente FROM cliente WHERE usuario = :username AND contrasena = :password";
  $stmt = $db -> prepare($query);
  $stmt -> bindParam(':username', $username);
  $stmt -> bindParam(':password', $password);
  $stmt -> execute();

  $result = $stmt -> fetch(PDO::FETCH_ASSOC);

  if ($result) {

    $_SESSION['idCliente'] = $result['idCliente'];
    header("Location: ../Vista/indexCliente.php");
    exit;
    
  } else {
    header("Location: ../Vista/loginCliente.php?opcion=error:''");
  }
}
