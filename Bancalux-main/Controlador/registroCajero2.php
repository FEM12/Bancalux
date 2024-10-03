<?php   

    require_once "../Modelo/Conexion.php";

    // formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $dui = $_POST['dui'];
    $sucursal = $_POST['sucursal'];
    $rol = $_POST['rol'];
    $estado = $_POST['estado'];
   if((preg_match('/^[a-zA-Z]+$/', $nombre)) && (preg_match('/^[a-zA-Z]+$/', $apellido))){

        if((preg_match('/^[0-9]+$/', $dui))){

            // insertando los datos
            $stmt = $db->prepare("INSERT INTO empleado (nombre, apellido, usuario, correo, contrasena, dui, sucursal, rol, estado) VALUES (:nombre, :apellido, :usuario, :correo, :contrasena, :dui, :sucursal, :rol, :estado)");
            $stmt->bindValue(':nombre', $nombre);
            $stmt->bindValue(':apellido', $apellido);
            $stmt->bindValue(':usuario', $usuario);
            $stmt->bindValue(':correo', $correo);
            $stmt->bindValue(':contrasena', $contrasena);
            $stmt->bindValue(':dui', $dui);
            $stmt->bindValue(':sucursal', $sucursal);
            $stmt->bindValue(':rol', $rol);
            $stmt->bindValue(':estado', $estado);
            
            try {

                $stmt->execute();
               
                header("location: ../Vista/indexGerente.php?emple=emple");
                
            } catch(PDOException $e) {

                echo "<div class='alert alert-danger' role='alert'>Error al registrar datos: </div> " . $e->getMessage();
                
            }
        }
        else{ header("location: ../Vista/registroCajero.php?dui=error"); }

    }
    else{ header("location: ../Vista/registroCajero.php?opcion=error"); }

?>