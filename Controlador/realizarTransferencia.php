<?php

require "../Modelo/Conexion.php";

session_start();
$idCliente =  $_SESSION['idCliente'];

/*Seleccionar el numero de cuenta desde la base de datos por medio del id*/
$query = "SELECT numerocuenta FROM cuentabanc WHERE idCliente = $idCliente";
$statement = $db->prepare($query);
$statement->execute();
$resultado = $statement->fetchAll(PDO::FETCH_ASSOC);

/*Seleccionar el nombre de cuenta desde la base de datos por medio del id*/
$stmt = $db->prepare("SELECT nombre FROM cuentabanc WHERE idCliente = $idCliente");
$stmt->execute();
$prueba = $stmt->fetch(PDO::FETCH_ASSOC);
$dato = $prueba["nombre"];

/*Seleccionar el apellido de cuenta desde la base de datos por medio del id*/
$stmt2 = $db->prepare("SELECT apellido FROM cuentabanc WHERE idCliente = $idCliente");
$stmt2->execute();
$prueba2 = $stmt2->fetch(PDO::FETCH_ASSOC);
$dato2 = $prueba2["apellido"];

/*Seleccionar el correo de cuenta desde la base de datos por medio del id*/
$stmt3 = $db->prepare("SELECT correo FROM cuentabanc WHERE idCliente = $idCliente");
$stmt3->execute();
$prueba3 = $stmt3->fetch(PDO::FETCH_ASSOC);
$dato3 = $prueba3["correo"];


if (isset($_POST['transfe'])) {

  //fecha transac
  $fechaTransac = date('Y-m-d');

  //form
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $monto = $_POST['monto'];
  $numerocuenta = $_POST['numerocuenta'];
  $cuentaEnv = $_POST['cuentaEnv'];
  $transac = $_POST['transf'];

  /*Seleccionar el saldo disponible de cuenta desde la base de datos por medio del id*/
  $stmt4 = $db->prepare("SELECT saldo FROM cuentabanc WHERE idCliente = :idCliente AND numerocuenta= :numerocuenta");
  $stmt4->bindValue(':idCliente', $idCliente);
  $stmt4->bindValue(':numerocuenta', $numerocuenta);
  $stmt4->execute();
  $prueba4 = $stmt4->fetch(PDO::FETCH_ASSOC);
  $dato4 = $prueba4["saldo"];

  //verificar si existe la cuenta a transferir
  $stmt5 = $db->prepare("SELECT numerocuenta FROM cuentabanc WHERE numerocuenta = :numerocuenta");
  $stmt5->bindValue(":numerocuenta", $cuentaEnv);
  $stmt5->execute();
  $existe = $stmt5->fetchColumn();

  if ($existe > 0) {

    if ($monto <= $dato4) {

      $stmt = $db->prepare("INSERT INTO movimientos (nombre, apellido, correo, tipoTransac, monto, numerocuenta, idCliente, fechaTransac) VALUES (:nombre, :apellido, :correo, :tipoTransac, :monto, :numerocuenta, :idCliente, :fechaTransac)");
      $stmt->bindValue(':numerocuenta', $numerocuenta);
      $stmt->bindValue(':nombre', $nombre);
      $stmt->bindValue(':apellido', $apellido);
      $stmt->bindValue(':correo', $correo);
      $stmt->bindValue(':tipoTransac', $transac);
      $stmt->bindValue(':monto', $monto);
      $stmt->bindValue(':idCliente', $idCliente);
      $stmt->bindValue(':fechaTransac', $fechaTransac);

      //
      $operaciones = ($dato4 - $monto);
      $act = $operaciones;
      //echo "las operaciones fueron realizadas: ". $act;

      $sql = "UPDATE cuentabanc SET saldo = :act WHERE idCliente = :idCliente AND numerocuenta= :numerocuenta";

      $statement2 = $db->prepare($sql);
      $statement2->bindValue(':act', $act);
      $statement2->bindValue(':idCliente', $idCliente);
      $statement2->bindValue(':numerocuenta', $numerocuenta);
      $statement2->execute();

      //tomar saldo de la que se transferira para actualizarle el saldo
      $stmt6 = $db->prepare("SELECT saldo FROM cuentabanc WHERE numerocuenta = :numerocuenta");
      $stmt6->bindValue(':numerocuenta', $cuentaEnv);
      $stmt6->execute();
      $result = $stmt6->fetch(PDO::FETCH_ASSOC);
      $cuenta = $result["saldo"];

      $total = $cuenta + $monto;

      //actualizar saldo a la otra cuenta
      $query = "UPDATE cuentabanc SET saldo = :total WHERE numerocuenta = :numerocuenta";

      $statement7 = $db->prepare($query);
      $statement7->bindValue(':total', $total);
      $statement7->bindValue(':numerocuenta', $cuentaEnv);
      $statement7->execute();

      try {

        $stmt->execute();
        $stmt->fetch(PDO::FETCH_ASSOC);

        header("Location: ../Vista/indexCliente.php?transfe=transfe");
      } catch (PDOException $e) {

        echo "<div class='alert alert-danger' role='alert'>Error al realizar el retiro</div> " . $e->getMessage();
      }
    } else {
      header("location: ../Vista/realizarTransferencia.php?nosal=error");
    }
  } else {
    header("location: ../Vista/realizarTransferencias.php?noex=noex");
  }
}
