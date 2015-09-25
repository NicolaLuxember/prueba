<?php
/**
 * Created by PhpStorm.
 * User: johansebastian
 * Date: 04/09/2015
 * Time: 7:39 AM
 */
class FVehiculo
{
    private $conn=null;
    private $objDAO=null;


    public function __construct()
    {
        $this->conn = conexion::getConexion();
        $this->objDAO=new VehiculoDao();
    }
    //
    public function insertarVehiculo(VehiculoDto $vehiculoDto){
        return $this->objDAO->registrarVehiculo($vehiculoDto, $this->conn);
    }
    //localidad


}