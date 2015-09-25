<?php

require '../modelo.dao/VehiculoDao.php';
require '../modelo.dto/VehiculoDto.php';
require '../utilidades/Conexion.php';
require '../fachadas/FVehiculo.php';

if (isset($_POST['registro'])) {
    $fDao = new FVehiculo();

    $uDto = new VehiculoDto();
    $uDto->setPlaca($_POST['placa']);
    $uDto->setModelo($_POST['modelo']);
    $uDto->setMarca($_POST['marca']);
    $uDto->setColor($_POST['color']);
    $uDto->setEstado($_POST['estado']);
    $uDto->setPrecio($_POST['precio']);
    $uDto->setIdVendedor($_POST['idVendedor']);
    $uDto->setIdCategoria($_POST['categoria']);

    $mensaje = $fDao->insertarVehiculo($uDto);

    header("Location: ../registroVehiculo.php?mensaje=".$mensaje);

}