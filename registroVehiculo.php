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

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>

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

                <form action="controladores/controlador.vehiculo.php" method="POST">
                    <h3>Registro Vehiculo</h3><br>
                    <label>Placa</label>
                    <input type="text" name="placa" required class="form-control"><br>
                    <label>Modelo</label>
                    <input type="text" name="modelo" required class="form-control"><br>
                    <label>Marca</label>
                    <input type="text" name="marca" required class="form-control"><br>
                    <label>color</label>
                    <input type="text" name="color" required class="form-control"><br>
                    <select name="estado" id="estado">Tipo Documento
                        <option value="nuevo">nuevo</option>
                        <option value="usado">usado</option>
                    </select>
                    <label>Precio</label>
                    <input type="text" name="precio" required class="form-control"><br>

                    <input type="hidden" name="idVendedor" value="<?php echo $usuario ?>"required class="form-control"><br>
                    <select name="categoria" id="categoria">Tipo Documento
                        <option value="campero">Campero</option>
                        <option value="automovil">Automovil</option>
                        <option value="camioneta">Camioneta</option>
                    </select>
                    <input type="submit" name="registro" id="registro" value="Registrarse">
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
         <div class="col-md-3 btn btn-success"><a href="listadoVehiculoVendedor.php" class="form-control">Consultar</a></div>
    </body>
</html>
