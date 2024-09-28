<?php
    require "../Modelo/Conexion.php";

    session_start();

    if (isset($_POST['Retirar'])) {

        $numerocuenta= $_POST['numerocuenta'];
        $monto= $_POST['monto'];
        $transac= $_POST['retiro'];
        $dui= $_POST['DUI'];
        $idCliente;

        //verificar si existe la cuenta a retirar
        $stmt = $db->prepare("SELECT numerocuenta FROM cuentabanc WHERE numerocuenta = :numerocuenta");
        $stmt->bindValue(":numerocuenta" , $numerocuenta);
        $stmt->execute();
        $existe = $stmt->fetchColumn();

        if($existe > 0){

            $stmt8 = $db->prepare("SELECT idCliente FROM cuentabanc WHERE numerocuenta = :numerocuenta");
            $stmt8->bindValue(":numerocuenta", $numerocuenta);
            $stmt8->execute();
            $resultado = $stmt8->fetch(PDO::FETCH_ASSOC);
            $idCliente = $resultado["idCliente"];

            $stmt2 = $db->prepare("SELECT 1 FROM cliente WHERE idCliente = :idCliente AND DUI = :dui");
            $stmt2->bindValue(":idCliente", $idCliente);
            $stmt2->bindValue(":dui", $dui);
            $stmt2->execute();
            $existeDui = $stmt2->fetchColumn();

            /*
            $stmt4 = $db->prepare("SELECT saldo FROM cuentabanc WHERE idCliente = :idCliente AND numerocuenta= :numerocuenta");
            $stmt4->bindValue(':idCliente', $idCliente);
            $stmt4->bindValue(':numerocuenta', $numerocuenta);
            $stmt4->execute();
            $prueba4 = $stmt4->fetch(PDO::FETCH_ASSOC);
            $dato4 = $prueba4["saldo"];
            */

            if($existeDui > 0){
                
                $fechaTransac = date("Y-m-d");

                $stmt2= $db->prepare("SELECT nombre, apellido, correo, idCliente FROM cuentabanc WHERE numerocuenta = :numerocuenta");
                $stmt2->bindValue(':numerocuenta', $numerocuenta);
                $stmt2->execute();
                $prueba = $stmt2->fetch(PDO::FETCH_ASSOC);
                $nombre = $prueba['nombre'];
                $apellido = $prueba['apellido'];
                $correo = $prueba['correo'];
                $id = $prueba['idCliente'];
    
                $stmt3 = $db->prepare("INSERT INTO movimientos (nombre, apellido, correo, tipoTransac, monto, numerocuenta, idCliente, fechaTransac) VALUES (:nombre, :apellido, :correo, :tipoTransac, :monto, :numerocuenta, :idCliente, :fechaTransac)");
                
                $stmt3->bindValue(':nombre', $nombre);
                $stmt3->bindValue(':apellido', $apellido);
                $stmt3->bindValue(':correo', $correo);
                $stmt3->bindValue(':tipoTransac', $transac);
                $stmt3->bindValue(':monto', $monto);
                $stmt3->bindValue(':numerocuenta', $numerocuenta);
                $stmt3->bindValue(':idCliente', $idCliente);
                $stmt3->bindValue(':fechaTransac', $fechaTransac);
                $stmt3->execute();
                $stmt3->fetch(PDO::FETCH_ASSOC);
                
                //tomar saldo de la que se transferira para actualizarle el saldo
                $stmt6= $db->prepare("SELECT saldo FROM cuentabanc WHERE numerocuenta = :numerocuenta");
                $stmt6->bindValue(':numerocuenta', $numerocuenta);
                $stmt6->execute();
                $result = $stmt6->fetch(PDO::FETCH_ASSOC);
                $cuenta = $result["saldo"];

                $total = $cuenta - $monto;

                //actualizar saldo a la otra cuenta
                $query = "UPDATE cuentabanc SET saldo = :total WHERE numerocuenta = :numerocuenta";

                $statement7 = $db->prepare($query);
                $statement7->bindValue(':total', $total);
                $statement7->bindValue(':numerocuenta', $numerocuenta);
                $statement7->execute();

                
                try{

                    $stmt->execute();
                    $stmt->fetch(PDO::FETCH_ASSOC);
    
                    header("Location: ../Vista/indexCaj.php?retiro=retiro");

                }
                catch(PDOException $e){

                    echo "<div class='alert alert-danger' role='alert'>Error al realizar el Retiro</div> " . $e->getMessage();

                } 

            }
            else{ header("Location: ../Vista/retiro.php?noin=noin"); }
           

        }
        else{ header("Location: ../Vista/retiro.php?noex=noex"); }

    }   
        
        

?>