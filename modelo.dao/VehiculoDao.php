<?php
/**
 * Created by PhpStorm.
 * User: johansebastian
 * Date: 05/09/2015
 * Time: 5:05 PM
 */

class VehiculoDao{


    public function registrarVehiculo(VehiculoDto $vehiculoDto, $cnn) {
        //$cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("INSERT INTO vehiculos VALUES(?,?,?,?,?,?,?,?)");
            $query->bindParam(1, $vehiculoDto->getPlaca());
            $query->bindParam(2, $vehiculoDto->getModelo());
            $query->bindParam(3, $vehiculoDto->getMarca());
            $query->bindParam(4, $vehiculoDto->getColor());
            $query->bindParam(5, $vehiculoDto->getEstado());
            $query->bindParam(6, $vehiculoDto->getPrecio());
            $query->bindParam(7, $vehiculoDto->getIdVendedor());
            $query->bindParam(8, $vehiculoDto->getIdCategoria());
            $query->execute();
            $mensaje="Registrado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }

    public function modificarVehiculo(VehiculoDto $vehiculoDto, $cnn) {
        //$cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("UPDATE  vehiculos SET modelo=?, marca=?, color=?, estado=?, precio=?, idVendedor=?, idCategoria where placa=?");


            $query->bindParam(2, $vehiculoDto->getPlaca());
            $query->bindParam(3, $vehiculoDto->getModelo());
            $query->bindParam(4, $vehiculoDto->getMarca());
            $query->bindParam(5, $vehiculoDto->getColor());
            $query->bindParam(6, $vehiculoDto->getEstado());
            $query->bindParam(7, $vehiculoDto->getPrecio());
            $query->bindParam(8, $vehiculoDto->getIdVendedor());
            $query->bindParam(1, $vehiculoDto->getIdCategoria());
            $query->execute();
            $mensaje = "Registro Actualizado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn=null;
        return $mensaje;
    }
    public function obtenerVehiculo($idVehiculo) {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare('SELECT * FROM vehiculos WHERE placa= ?');
            $query->bindParam(1, $idVehiculo);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }

    public function listarTodos() {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'Select * from vehiculos';
            $query = $cnn->prepare($listarUsuarios);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
    public function listarUnVehiculo($usuario)
    {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'Select * from vehiculos where usuario = ?';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $usuario);
            $query->execute();
            //fetchAll(); para listar todos
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
    public function listarPorCategorias($categoria)
    {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'Select * from vehiculos where categoria = ?';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $categoria);
            $query->execute();
            //fetchAll(); para listar todos
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
    public function listaPorPrecio($precio)
    {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'Select * from vehiculos where precio = ?';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $precio);
            $query->execute();
            //fetchAll(); para listar todos
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
}