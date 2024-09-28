<?php

    session_start();
    session_destroy();

    header("location: ../Vista/logCajero.php");
    exit();
    
?>