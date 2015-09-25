<?php

session_start();
require 'modelo.dao/UsuarioDao.php';



//include 'utilidades/Conexion.php';
//if (isset($_SESSION['user'])){
  //  $mensaje= 'hola';

    //header('location:listado.php?mensaje='.$mensaje);


//}else if(isset($_SESSION['user'])){
  //  session_star();
    //session_destroy();
    //header('location:../login.php?mensaje=' . $mensaje);

//}
?>
<html>
<head>
    <title>Login</title>
    <table border="0" align="center">
        <form action="controladores/controlador.login.php" method="post">
            <table border="0"  align="center" >
                <tr>
                    <td> <label style="font-size: 14pt">User</label></td>
                    <td width="80"><input style="border-radius: 15px" type="text" name="user"</td>
                </tr>
                <tr>
                    <td> <label style="font-size: 14pt">Password</label></td>
                    <td width="80"><input style="border-radius: 15px" type="password" name="pass"</td>
                </tr>
                <tr>
                    <td></td>
                    <td width="80" align="center"><input  type="submit" name="login" id="login" value="aceptar" </td>
                </tr>
            </table>
        </form>
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
        <div class="col-md-3 btn btn-success"><a href="registro.php" class="form-control">Registrarse</a></div>

    </table>
</head>

</html>