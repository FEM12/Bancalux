<?php

session_start();
require_once("../Modelo/conexion.php");

if (isset($_POST['Depositar'])) {

  $numerocuenta = $_POST['numerocuenta'];
  $monto = $_POST['monto'];
  $transac = $_POST['deposito'];

  $stmt = $db -> prepare("SELECT numerocuenta FROM cuentabanc WHERE numerocuenta = :numerocuenta");
  $stmt -> bindValue(":numerocuenta", $numerocuenta);
  $stmt -> execute();
  $existe = $stmt -> fetchColumn();

  if ($existe > 0) {

    $fechaTransac = date("Y-m-d");

    $stmt2 = $db -> prepare("SELECT nombre, apellido, correo, idCliente FROM cuentabanc WHERE numerocuenta = :numerocuenta");
    $stmt2 -> bindValue(':numerocuenta', $numerocuenta);
    $stmt2 -> execute();
    $prueba = $stmt2 -> fetch(PDO::FETCH_ASSOC);
    $nombre = $prueba['nombre'];
    $apellido = $prueba['apellido'];
    $correo = $prueba['correo'];
    $id = $prueba['idCliente'];

    $stmt3 = $db -> prepare("INSERT INTO movimientos (nombre, apellido, correo, tipoTransac, monto, numerocuenta, idCliente, fechaTransac) VALUES (:nombre, :apellido, :correo, :tipoTransac, :monto, :numerocuenta, :idCliente, :fechaTransac)");

    $stmt3 -> bindValue(':nombre', $nombre);
    $stmt3 -> bindValue(':apellido', $apellido);
    $stmt3 -> bindValue(':correo', $correo);
    $stmt3 -> bindValue(':tipoTransac', $transac);
    $stmt3 -> bindValue(':monto', $monto);
    $stmt3 -> bindValue(':numerocuenta', $numerocuenta);
    $stmt3 -> bindValue(':idCliente', $id);
    $stmt3 -> bindValue(':fechaTransac', $fechaTransac);
    $stmt3 -> execute();
    $stmt3 -> fetch(PDO::FETCH_ASSOC);

    $stmt6 = $db -> prepare("SELECT saldo FROM cuentabanc WHERE numerocuenta = :numerocuenta");
    $stmt6 -> bindValue(':numerocuenta', $numerocuenta);
    $stmt6 -> execute();
    $result = $stmt6 -> fetch(PDO::FETCH_ASSOC);
    $cuenta = $result["saldo"];

    $total = $cuenta + $monto;

    $query = "UPDATE cuentabanc SET saldo = :total WHERE numerocuenta = :numerocuenta";

    $statement7 = $db -> prepare($query);
    $statement7 -> bindValue(':total', $total);
    $statement7 -> bindValue(':numerocuenta', $numerocuenta);
    $statement7 -> execute();


    try {

      $stmt -> execute();
      $stmt -> fetch(PDO::FETCH_ASSOC);

      header("Location: ../Vista/indexCajero.php?exito=exito");

    } catch (PDOException $e) {
      echo "<div class='alert alert-danger' role='alert'>Error al realizar el Deposito</div> " . $e -> getMessage();
    }
  } else {
    header("Location: ../Vista/realizarDeposito.php?noex=noex");
  }
}
