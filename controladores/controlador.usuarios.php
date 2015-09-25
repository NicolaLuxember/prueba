<?php

require '../modelo.dao/UsuarioDao.php';
require '../modelo.dto/UsuarioDto.php';
require '../utilidades/Conexion.php';
require '../fachadas/FUsuario.php';

if (isset($_POST['registro'])) {
    $fDao = new FUsuario();

    $uDto = new UsuarioDto();
    $uDto->setDocumento($_POST['documento']);
    $uDto->setNombre($_POST['nombre']);
    $uDto->setApellido($_POST['apellido']);
    $uDto->setTelefono($_POST['telefono']);
    $uDto->setUsuario($_POST['usuario']);
    $uDto->setContraseña($_POST['contrasena']);
    $uDto->setTipo($_POST['tipo']);

    $mensaje = $fDao->insertarUsuario($uDto);

    header("Location: ../registro.php?mensaje=".$mensaje);

}
else if ($_GET['idUsuarios']!=NULL) {
    $fDao = new FUsuario();

    $mensaje = $fDao->borrarUsuario($_GET['idUsuarios']);

    header("Location: ../listado.php?mensaje=".$mensaje);

}
else if (isset($_POST['modificar'])) {
    $fDao = new FUsuario();

    $uDto = new UsuarioDto();
    $uDto->setDocumento($_POST['documento']);
    $uDto->setNombre($_POST['nombre']);
    $uDto->setApellido($_POST['apellido']);
    $uDto->setTelefono($_POST['telefono']);
    $uDto->setUsuario($_POST['usuario']);
    $uDto->setContraseña($_POST['contrasena']);
    $uDto->setTipo($_POST['tipo']);

    $mensaje = $fDao->cambiarUsuario($uDto);
    header("Location: ../listado.php?mensaje=".$mensaje);

}