<?php

    require "../Modelo/Conexion.php";

    session_start();
    $idCliente =  $_SESSION['idCliente'];

    /*Seleccionar el nombre de cuenta desde la base de datos por medio del id*/
    $stmt= $db->prepare("SELECT nombre FROM cuentabanc WHERE idCliente = $idCliente");
    $stmt->execute();
    $prueba = $stmt->fetch(PDO::FETCH_ASSOC);
    $dato = $prueba["nombre"];

    /*Seleccionar el numero de cuenta desde la base de datos por medio del id*/
    $query = "SELECT numerocuenta FROM cuentabanc WHERE idCliente = $idCliente";
    $statement = $db->prepare($query);
    $statement->execute();
    $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);

    /*Seleccionar el retiro de cuenta desde la base de datos por medio del id*/
    $stmt3= $db->prepare("SELECT * FROM retiro WHERE idCliente = $idCliente");
    $stmt3->execute();
    $prueba3 = $stmt3->fetch(PDO::FETCH_ASSOC);
    $dato3 = $prueba3["retiro"];





    try {

        $stmt= $db->prepare("SELECT saldo FROM cuentabanc WHERE idCliente = $idCliente");
        //$stmt->bindParam(':idCliente', $idCliente);
        $stmt->execute();
        
        //echo "<div class='alert alert-success' role='alert'>TEXTO HOLA</div>";
        // header("location: ../Vista/login.php");

        $resultado = $stmt->fetch();

        if ($resultado) {

            $dato = $resultado["saldo"];
            echo "<td>Transferencias</td>";
            echo "<td class='principal'> $".$dato."</td>";

        }
        else { echo "No se encontró ninguna fila para el ID $idCliente"; }

    }
    catch(PDOException $e) {

        echo "<div class='alert alert-danger' role='alert'>Error al registrar datos: </div> " . $e->getMessage();
        
    }

?>