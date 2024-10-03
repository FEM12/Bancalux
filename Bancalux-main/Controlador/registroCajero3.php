<?php   

    require_once "../Modelo/Conexion.php";

    // formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $dui = $_POST['dui'];
   if((preg_match('/^[a-zA-Z]+$/', $nombre)) && (preg_match('/^[a-zA-Z]+$/', $apellido))){

        if((preg_match('/^[0-9]+$/', $dui))){

            // insertando los datos
            $stmt = $db->prepare("INSERT INTO cajero (nombre, apellido, usuario, contrasena, dui) VALUES (:nombre, :apellido, :usuario, :contrasena, :dui)");
            $stmt->bindValue(':nombre', $nombre);
            $stmt->bindValue(':apellido', $apellido);
            $stmt->bindValue(':usuario', $usuario);
            $stmt->bindValue(':contrasena', $contrasena);
            $stmt->bindValue(':dui', $dui);
            
            try {

                $stmt->execute();
               
                header("location: ../Vista/indexGerente.php");
                
            } catch(PDOException $e) {

                echo "<div class='alert alert-danger' role='alert'>Error al registrar datos: </div> " . $e->getMessage();
                
            }
        }
        else{ header("location: ../Vista/registro.php?dui=error"); }

    }
    else{ header("location: ../Vista/registro.php?opcion=error"); }

?>