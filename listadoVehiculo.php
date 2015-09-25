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
    <a href="modificar.php?documento=68">Modificar Usuario </a>

     <table border="1">
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Color</th>
                    <th>Estado</th>
                    <th>Precio</th>
                    <th>Usuario</th>
                    <th>Categoria</th>

                </tr>
            </thead>
            <tbody>
              <?php
                   require 'modelo.dao/VehiculoDao.php';
                    require 'modelo.dto/VehiculoDto.php';
                    require 'utilidades/Conexion.php';
                    $uDao = new VehiculoDao();
                    $allusers = $uDao->listarTodos();
                   foreach($allusers as $user) {?>
                <tr><td><?php echo $user['placa']; ?> </td>
                    <td><?php echo $user['modelo']; ?> </td>
                    <td><?php echo $user['marca']; ?> </td>
                    <td><?php echo $user['color']; ?> </td>
                    <td><?php echo $user['estado']; ?> </td>
                    <td><?php echo $user['precio']; ?> </td>
                    <td><?php echo $user['usuario']; ?> </td>
                    <td><?php echo $user['categoria']; ?> </td>


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
       <div class="col-md-3 btn btn-success"><a href="registroVehiculo.php" class="form-control">Registrarse</a></div>
    </body>

</html>
