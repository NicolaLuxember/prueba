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
</br>
<div><table>
    <td><tr>
        Ingrese la categoria
    </tr></td>
    <td>
        <form  action="consultaVehiculosCategoria.php" method="POST" >
    
    <select name="categoria" value="Seleccione la categoria" class="form-control"  >

        <option value="campero">Campero</option>
        <option>Automovil</option>
        <option>Camioneta</option>
        <option>Deportivo</option>
    </select ><br>
    <input type="submit" name="consultar" id="consultar" value="consultar" class="btn btn-primary">
</form>        

    </td>
</table>


<table border="1">
    <thead>
    <tr>

        <th>Modelo</th>
        <th>Marca</th>
        <th>Color</th>
        <th>Estado</th>
        <th>Precio</th>



    </tr>
    </thead>
    <tbody>
    <?php



    require 'modelo.dao/VehiculoDao.php';
    require 'modelo.dto/VehiculoDto.php';
    require 'utilidades/Conexion.php';
    if(isset($_POST['consultar'])){
        $uDao = new VehiculoDao();
        $categoria = $_POST['categoria'];

        $allusers = $uDao->listarPorCategorias($categoria);
    foreach($allusers as $user)
        {?>
        <tr>
            <td><?php echo $user['modelo']; ?> </td>
            <td><?php echo $user['marca']; ?> </td>
            <td><?php echo $user['color']; ?> </td>
            <td><?php echo $user['estado']; ?> </td>
            <td><?php echo $user['precio']; ?> </td>
            <td><a href="listadoComp.php?documento=$user['usuario']">Datos del vendedor </a> </td>

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
