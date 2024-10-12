<?php

require_once("../Modelo/conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$dui = $_POST['dui'];
$sucursal = $_POST['sucursal'];
$rol = $_POST['rol'];
$estado = $_POST['estado'];

if ((preg_match('/^[A-Z][a-z]{2,19}$/', $nombre)) && (preg_match('/^[A-Z][a-z]{2,19}$/', $apellido))) {

  if ((preg_match('/^\d{8}\-\d$/', $dui))) {

    $stmt = $db -> prepare("INSERT INTO empleado (nombre, apellido, usuario, correo, contrasena, dui, sucursal, rol, estado) VALUES (:nombre, :apellido, :usuario, :correo, :contrasena, :dui, :sucursal, :rol, :estado)");
    $stmt -> bindValue(':nombre', $nombre);
    $stmt -> bindValue(':apellido', $apellido);
    $stmt -> bindValue(':usuario', $usuario);
    $stmt -> bindValue(':correo', $correo);
    $stmt -> bindValue(':contrasena', $contrasena);
    $stmt -> bindValue(':dui', $dui);
    $stmt -> bindValue(':sucursal', $sucursal);
    $stmt -> bindValue(':rol', $rol);
    $stmt -> bindValue(':estado', $estado);

    try {

      $stmt->execute();
      header("location: ../Vista/indexGerente.php?success=success");

    } catch (PDOException $e) {
      echo "<div class='alert alert-danger' role='alert'>Error al registrar datos: </div> " . $e->getMessage();
    }
  } else {
    header("location: ../Vista/registroEmpleado.php?dui=error");
  }
} else {
  header("location: ../Vista/registroEmpleado.php?opcion=error");
}
