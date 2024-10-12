<?php

session_start();

require_once("../Modelo/conexion.php");

if (isset($_POST['usu']) && isset($_POST['contra'])) {

  $username = $_POST['usu'];
  $password = $_POST['contra'];

  $query = "SELECT idGerente FROM gerentesucursal WHERE usuario = :usu AND contraseña = :contra";
  $stmt = $db -> prepare($query);
  $stmt -> bindParam(':usu', $username);
  $stmt -> bindParam(':contra', $password);
  $stmt -> execute();

  $result = $stmt -> fetch(PDO::FETCH_ASSOC);

  if ($result) {

    $_SESSION['idGer'] = $result['idGerente'];
    header("Location: ../Vista/indexGerente.php");
    exit;

  } else {
    header("Location: ../Vista/loginGerente.php?opcion=error:error");
  }
}
