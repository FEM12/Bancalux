<?php

require_once("../Modelo/conexion.php"); 

$id = $_POST['idEmpleado'];
$estado = $_POST['estado'];

$consulta = "UPDATE empleado SET estado = :estado WHERE idEmpleado = :idEmpleado";
$stmt = $db -> prepare($consulta);
$stmt -> bindParam(":estado", $estado);
$stmt -> bindParam(":idEmpleado", $id);
$stmt -> execute();

header("location: ../Vista/administrarEmpleados.php");
