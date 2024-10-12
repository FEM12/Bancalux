<?php
require_once("../Modelo/conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$sueldo = $_POST['sueldo'];
$prestamo = $_POST['prestamo'];
$estado = $_POST['estado'];
$idCliente = $_POST['idCliente'];

$validacion_correcta = false;

if ($sueldo > 0 && $sueldo <= 365 && $prestamo <= 10000) {
  $validacion_correcta = true;
}else {
  $validacion_correcta = false;
}
if ($sueldo > 365 && $sueldo <= 600 && $prestamo <= 25000) {
  $validacion_correcta = true;
} else {
  $validacion_correcta = false;
}
if ($sueldo > 600 && $sueldo <= 900 && $prestamo <= 35000) {
  $validacion_correcta = true;
} else {
  $validacion_correcta = false;
}
if ($sueldo > 900 && $sueldo <= 2000 && $prestamo <= 5000) {
  $validacion_correcta = true;
} else {
  $validacion_correcta = false;
}

if ($validacion_correcta) { // Se realiza la inserción solo si se cumple alguna de las condiciones de validación

  $stmt = $db -> prepare("INSERT INTO prestamos (nombre, apellido, correo, sueldo, prestamo, idCliente, estado) VALUES (:nombre, :apellido, :correo, :sueldo, :prestamo, :idCliente, :estado )");

  $stmt -> bindValue(':nombre', $nombre);
  $stmt -> bindValue(':apellido', $apellido);
  $stmt -> bindValue(':correo', $correo);
  $stmt -> bindValue(':sueldo', $sueldo);
  $stmt -> bindValue(':prestamo', $prestamo);
  $stmt -> bindValue(':estado', $estado);
  $stmt -> bindValue(':idCliente', $idCliente);

  try {

    $stmt->execute();
    header("location:../Vista/indexCliente.php?prestamo=prestamo");
  } catch (PDOException $e) {

    echo "<div class='alert alert-danger' role='alert'>Error al crear la cuenta</div> " . $e->getMessage();
  }
} else{ header("location:../Vista/indexCliente.php?error=error"); }
