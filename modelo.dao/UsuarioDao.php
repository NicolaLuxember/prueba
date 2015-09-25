<?php
/**
 * Created by PhpStorm.
 * User: johansebastian
 * Date: 05/09/2015
 * Time: 5:05 PM
 */

class UsuarioDao
{

    public function validarUsuario($usuario,$clave, PDO $cnn){
        try {
            $query = $cnn->prepare("select count(*) as 'esta' from usuarios where usuario=? and contraseña=?");
            $query->bindParam(1,$usuario);
            $query->bindParam(2,$clave);
            $query->execute();

            return $query->fetch();
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }

    public function capturarDatos($usuario, PDO $cnn)
    {
        try {
            $query = $cnn->prepare("select * from usuarios where documento=?");
            $query->bindParam(1, $usuario);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn = null;
        return $mensaje;
    }

    public function registrarUsuario(UsuarioDto $usuarioDto, $cnn)
    {
        //$cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("INSERT INTO usuarios VALUES(?,?,?,?,?,?,?)");
            $query->bindParam(1, $usuarioDto->getDocumento());
            $query->bindParam(2, $usuarioDto->getNombre());
            $query->bindParam(3, $usuarioDto->getApellido());
            $query->bindParam(4, $usuarioDto->getTelefono());
            $query->bindParam(5, $usuarioDto->getUsuario());
            $query->bindParam(6, $usuarioDto->getContraseña());
            $query->bindParam(7, $usuarioDto->getTipo());
            $query->execute();
            $mensaje = "Registrado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn = null;
        return $mensaje;
    }

    public function modificarUsuario(UsuarioDto $usuarioDto, $cnn)
    {
        //$cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("UPDATE  usuarios SET nombre=?, apellido=?, telefono=?where documento=?");


            $query->bindParam(1, $usuarioDto->getNombre());
            $query->bindParam(2, $usuarioDto->getApellido());
            $query->bindParam(3, $usuarioDto->getTelefono());
            $query->bindParam(4, $usuarioDto->getDocumento());
            $query->execute();
            $mensaje = "Registro Actualizado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn = null;
        return $mensaje;
    }

    public function obtenerUsuario($usuario)
    {
        $cnn = Conexion::getConexion();
        try {
            $query = $cnn->prepare('SELECT * FROM usuarios WHERE usuario = ?');
            $query->bindParam(1, $usuario);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn = null;
    }

    public function eliminarUsuario(UsuarioDto $usuarioDto, $cnn)
    {
        //$cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("DELETE FROM usuarios WHERE documento = ?");
            $query->bindParam(1, $usuarioDto);
            $query->execute();
            $mensaje = "Registro Eliminado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        return $mensaje;
    }

    public function listarTodos($usuario)
    {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'Select * from usuarios where usuario = ?';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $usuario);
            $query->execute();
            //fetchAll(); para listar todos
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }



    public function validarTipo($usuario, $clave, PDO $cnn)
    {
        try {
            $query = $cnn->prepare("select tipoUsuario from usuarios where usuario=? and contraseña=?");
            $query->bindParam(1, $usuario);
            $query->bindParam(2, $clave);
            $query->execute();

            return $query->fetch();
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn = null;
        return $mensaje;
    }

}