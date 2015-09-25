<?php
session_start();
if (isset($_SESSION['user'])){

    $usuario=$_SESSION['user'];

}else{
    $mensaje = "no ha iniciado session";
    header('location:login.php?mensaje=' . $mensaje);
    session_destroy();
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="modificar.php?documento=$usuario">Modificar Usuario </a>
        </br>
        <a href="registroVehiculo.php?documento=$usuario">Registrar vehiculo </a>
        </br>
        <a href="cerrarSesion.php?">Cerrar cesion </a>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php
                   require 'modelo.dao/UsuarioDao.php';
                    require 'modelo.dto/UsuarioDto.php';
                    require 'utilidades/Conexion.php';

                    $uDao = new UsuarioDao();

                    $usuario = $uDao->obtenerUsuario($usuario);

                    ?>       
                    <h2>Modificar los datos del usuario</h2>
                    <form action="controladores/controlador.usuarios.php" method="POST">
                    <b>El documento no se puede modificar</b></br>

                    <label>Documento</label>
                    <input type="text" name="documento" required value="<?php echo $usuario['documento'];?>" class="form-control"><br>
                    <label>Nombre</label>
                    <input type="text" name="nombre" required value="<?php echo $usuario['nombre'];?>" class="form-control"><br>
                    <label>Apellido</label>
                    <input type="text" name="apellido" required value="<?php echo $usuario['apellido'];?>" class="form-control"><br>
                    <label>Telefono</label>
                    <input type="text" name="telefono" required value="<?php echo $usuario['telefono'];?>" class="form-control"><br>

                    <input type="submit" name="modificar" id="modificar" value="Modificar">
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
        <?php
        if (isset($_GET['mensaje'])) {
            ?>
        <div class="row"><br><br>
                <div class="col-md-6"></div>
                <div class="col-md-1 text-center"><h4><?php echo $mensaje = $_GET['mensaje']?></h4></div>
                <div class="col-md-5"></div>
            </div>
            <?php
        }
        ?>
    </body>