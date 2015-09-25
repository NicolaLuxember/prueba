
<?php
    session_start();
    session_unset();//Libera todas las variables de sesion
    session_destroy();
    header( "Location: login.php");
?>