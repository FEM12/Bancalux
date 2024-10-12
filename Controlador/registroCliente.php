<?php

require_once("../Modelo/conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$identificador = $_POST['identificador'];
$dui = $_POST['dui'];
$sucursal = $_POST['sucursal'];

if ((preg_match('/^[A-Z][a-z]{2,19}$/', $nombre)) && (preg_match('/^[A-Z][a-z]{2,19}$/', $apellido))) {

  if ((preg_match('/^\d{8}\-\d$/', $dui))) {

    $stmt = $db -> prepare("INSERT INTO cliente (nombre, apellido, usuario, correo, contrasena, identificador, DUI, sucursal) VALUES (:nombre, :apellido, :usuario, :correo, :contrasena, :identificador, :DUI, :sucursal)");

    $stmt -> bindValue(':nombre', $nombre);
    $stmt -> bindValue(':apellido', $apellido);
    $stmt -> bindValue(':usuario', $usuario);
    $stmt -> bindValue(':correo', $correo);
    $stmt -> bindValue(':contrasena', $contrasena);
    $stmt -> bindValue(':identificador', $identificador);
    $stmt -> bindValue(':DUI', $dui);
    $stmt -> bindValue(':sucursal', $sucursal);

    try {

      $stmt -> execute();
      header("location: ../Vista/registroCliente?success=success.php");

    } catch (PDOException $e) {
      echo "<div class='alert alert-danger' role='alert'>Error al registrar datos: </div> " . $e->getMessage();
    }
  } else {
    header("location: ../Vista/registroCliente.php?dui=error");
  }
} else {
  header("location: ../Vista/registroCliente.php?opcion=error");
}
