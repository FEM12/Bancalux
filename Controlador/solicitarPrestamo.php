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

if ($sueldo > 0 && $sueldo < 365) {

  if ($prestamo <= 10000) {
    $validacion_correcta = true;
  } else {

    echo '<script> alert("Muy poquito sueldo"); window.location = "../Vista/PrestamosCli.php"; </script>';
  }
} elseif ($sueldo > 0 && $sueldo < 600) {

  if ($prestamo <= 25000) {
    $validacion_correcta = true;
  } else {

    echo '<script> alert("Muy poquito sueldo"); window.location = "../Vista/PrestamosCli.php"; </script>';
  }
} elseif ($sueldo > 0 && $sueldo < 900) {

  if ($prestamo <= 35000) {
    $validacion_correcta = true;
  } else {

    echo '<script> alert("Muy poquito sueldo"); window.location = "../Vista/PrestamosCli.php"; </script>';
  }
} elseif ($sueldo > 0 && $sueldo > 1000) {

  if ($prestamo <= 50000) {
    $validacion_correcta = true;
  } else {

    echo '<script> alert("Muy poquito sueldo"); window.location = "../Vista/PrestamosCli.php"; </script>';
  }
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
}
