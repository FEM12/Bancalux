<?php 

    require_once "../Modelo/Conexion.php";

    //fecha creacion cuenta
    $fechaCrea = date('Y-m-d');

    // formulario
    $numerocuenta = $_POST['numerocuenta']; 
    

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $saldo = $_POST['saldo'];
    $idCliente = $_POST['idCliente'];

    //evalua cantidad de cuentas que tiene
    $stmt2= $db->prepare("SELECT COUNT(*) as idCliente FROM cuentabanc WHERE idCliente = :idCliente");
    $stmt2->bindValue(':idCliente', $idCliente);

    // insertando los datos
    $stmt = $db->prepare("INSERT INTO cuentabanc (numerocuenta, nombre, apellido, correo, saldo, idCliente, fechaCrea) VALUES (:numerocuenta, :nombre, :apellido, :correo, :saldo, :idCliente, :fechaCrea)");

    $stmt->bindValue(':numerocuenta', $numerocuenta);
    $stmt->bindValue(':nombre', $nombre);
    $stmt->bindValue(':apellido', $apellido);
    $stmt->bindValue(':correo', $correo);
    $stmt->bindValue(':saldo', $saldo);
    $stmt->bindValue(':idCliente', $idCliente);
    $stmt->bindValue(':fechaCrea', $fechaCrea);
    try {

        $stmt2->execute();

        $fila = $stmt2->fetch(PDO::FETCH_ASSOC);
        
    
        $cantidad = $fila['idCliente'];
        //echo "El ID $idCliente se repite $cantidad veces en la tabla.";


        if($cantidad<3){

            if($saldo>0){

                $stmt->execute();
                header("location: ../Vista/index.php?sucses='correcto': ''");

            }else{
                header("location: ../Vista/index.php?nosal='error':''");
            }

            
            
        }
        else{

            $conn = null;
            header("location: ../Vista/index.php?opcion='error':''");
            
        }


    } catch(PDOException $e) {

        echo "<div class='alert alert-danger' role='alert'>Error al crear la cuenta</div> " . $e->getMessage();
        
    }
    
?>