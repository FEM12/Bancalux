<?php
    require_once "../Modelo/Conexion.php"; 
    
    // Obtener el ID del préstamo y el estado enviado desde el formulario
    $id = $_POST['idEmpleado'];
    $estado = $_POST['estado'];

    // Actualizar el estado del préstamo en la base de datos
    $consulta = "UPDATE empleado SET estado = :estado WHERE idEmpleado = :idEmpleado";
    $stmt = $db->prepare($consulta);
    $stmt->bindParam(":estado", $estado);
    $stmt->bindParam(":idEmpleado", $id);
    $stmt->execute();

    // Redireccionar de vuelta a la página de solicitudes de préstamos
   
    header("location: ../Vista/adminEmpleados.php");
?>