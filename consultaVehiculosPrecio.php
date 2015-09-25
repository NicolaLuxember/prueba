<?php
session_start();
if (isset($_SESSION['user'])){

    $usuario=$_SESSION['user'];

}else{
    $mensaje = "no ha iniciado session";
    header('location:login.php?mensaje=' . $mensaje);

}

?>



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
<div class="col-md-3 btn btn-success"><a href="consultaVehiculosCategoria.php" class="form-control">Busqueda por Categorias</a></div>
<div class="col-md-3 btn btn-success"><a href="consultaVehiculosPrecio.php" class="form-control">Busqueda por Precio</a></div>

<a href="cerrarSesion.php?">Cerrar cesion </a>
<form  action="consultaVehiculosPrecio.php" method="POST" >
    <label>ingrese el precio</label>
    <input type="number" name="precio"id="precio" class="form-control"  >
    </input ><br>
    <input type="submit" name="consultar" id="consultar" value="consultar" class="btn btn-primary">
</form><br><br>

<table border="1">
    <thead>
    <tr>

        <th>Modelo</th>
        <th>Marca</th>
        <th>Color</th>
        <th>Estado</th>
        <th>Precio</th>
        <th>TelefonoVendedor</th>



    </tr>
    </thead>
    <tbody>
    <?php



    require 'modelo.dao/VehiculoDao.php';
    require 'modelo.dao/UsuarioDao.php';
    require 'modelo.dto/VehiculoDto.php';
    require 'utilidades/Conexion.php';
    if(isset($_POST['consultar'])){
        $uDao = new VehiculoDao();
        $precio = $_POST['precio'];

        $allusers = $uDao->listaPorPrecio($precio);
        foreach($allusers as $user)
        {?>
            <tr>
                <td><?php echo $user['modelo']; ?> </td>
                <td><?php echo $user['marca']; ?> </td>
                <td><?php echo $user['color']; ?> </td>
                <td><?php echo $user['estado']; ?> </td>
                <td><?php echo $user['precio']; ?> </td>
                <td><?php $uDao = new UsuarioDao();
                    $user = $uDao->listarTodos($usuario); echo $user['telefono']; ?></td>



            </tr>
            <?php
        }}?>

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
