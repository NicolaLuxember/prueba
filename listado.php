<?php

session_start();
if (isset($_SESSION['user'])){

    $usuario=$_SESSION['user'];
 
}else{
    
    $mensaje = "no ha iniciado session";
    header('location:login.php?mensaje=' . $mensaje);

}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado</title>
        <script>
            function confirmar() {
                if (confirm('Esta seguro que desea borrar')) {
                    return true;
                } else {
                    return false;
                }
            }

        </script>
    </head>
    <body>
    <a href="modificar.php?documento=$usuario">Modificar Usuario </a>
    </br>
    <a href="registroVehiculo.php?documento=$usuario">Registrar vehiculo </a>
    </br>
    
    <a href="cerrarSesion.php">Cerrar cesion </a>
    
     <table border="1">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Usuario</th>
                    <th>Password</th>
                    <th>Tipo</th>


                </tr>
            </thead>
            <tbody>
              <?php
                   require 'modelo.dao/UsuarioDao.php';
                    require 'modelo.dto/UsuarioDto.php';
                    require 'utilidades/Conexion.php';
                    $uDao = new UsuarioDao();
                    $user = $uDao->listarTodos($usuario);
                   {?>
                <tr><td><?php echo $user['documento']; ?> </td>
                    <td><?php echo $user['nombre']; ?> </td>
                    <td><?php echo $user['apellido']; ?> </td>
                    <td><?php echo $user['telefono']; ?> </td>
                    <td><?php echo $user['usuario']; ?> </td>
                    <td><?php echo $user['contrase�a']; ?> </td>
                    <td><?php echo $user['tipoUsuario']; ?> </td>


                      </tr>
                <?php

                   }?>

            </tbody>
        </table>
       
      
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

</html>
