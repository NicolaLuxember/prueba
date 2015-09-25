<?php
/**
 * Created by PhpStorm.
 * User: johansebastian
 * Date: 04/09/2015
 * Time: 7:39 AM
 */
class FUsuario
{
    private $conn=null;
    private $objDAO=null;


    public function __construct()
    {
        $this->conn = conexion::getConexion();
        $this->objDAO=new UsuarioDao();
    }
    //
    public function insertarUsuario(UsuarioDto $usuarioDto){
        return $this->objDAO->registrarUsuario($usuarioDto, $this->conn);
    }
    public function cambiarUsuario(UsuarioDto $usuarioDto){
        return $this->objDAO->modificarUsuario($usuarioDto, $this->conn);
    }
    public function borrarUsuario($usuario){
        return $this->objDAO->eliminarUsuario($usuario, $this->conn);
    }
    //localidad


}