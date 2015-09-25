<?php
/**
 * Created by PhpStorm.
 * User: johansebastian
 * Date: 05/09/2015
 * Time: 5:14 PM
 */
require'../utilidades/Conexion.php';
require '../modelo.dao/UsuarioDao.php';

class FLogin {
    private $objDao;
    private $conn;

    /**
     * FUsuario constructor.
     * @param $usuarioDao
     * @param $conexion
     */
    public function __construct()
    {
        $this->objDao = new UsuarioDao() ;
        $this->conn = Conexion::getConexion();
    }


    public function validarLogin($user,$pass){
        $resultado=$this->objDao->validarUsuario($user,$pass,$this->conn);
        if ($resultado['esta']==0){
            return false;
        }else{
            return true;
            //return $this->usuarioDao->capturarDatos($user,$this->conexion);
        }
    }

    public function conseguirTipo($user,$pass){
        $resultado=$this->objDao->validarTipo($user,$pass,$this->conn);
        if ($resultado['esta']==0){
            return false;
        }else{
            return true;
            //return $this->usuarioDao->capturarDatos($user,$this->conexion);
        }
    }

}