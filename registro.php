<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>

    </head>
    <body>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">

                <form action="controladores/controlador.usuarios.php" method="POST">
                    <h3>Registro</h3><br>
                    <label>Documento</label>
                    <input type="text" name="documento" required class="form-control"><br>
                    <label>Nombre</label>
                    <input type="text" name="nombre" required class="form-control"><br>
                    <label>Apellido</label>
                    <input type="text" name="apellido" required class="form-control"><br>
                    <label>Telefono</label>
                    <input type="text" name="telefono" required class="form-control"><br>
                    <label>Usuario</label>
                    <input type="text" name="usuario" required class="form-control"><br>
                    <label>Contrasena</label>
                    <input type="text" name="contrasena" required class="form-control"><br>
                    <select name="tipo" id="tipo">
                            <option value="comprador">Comprador</option>
                            <option value="vendedor">Vendedor</option>
                            <option value="ambos">Ambos</option>
                            
                    </select>
                    <input type="submit" name="registro" id="registro" value="Registrarse">
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
        <a href="login.php?">Vuelve para ingresar </a>
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
