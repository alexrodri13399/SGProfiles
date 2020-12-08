<?php
require_once 'user.php';

class UserDAO{
    private $pdo;

    public function __construct(){
        include '../model/conexion.php';
        $this->pdo=$pdo;
    }
    public function login($empleado){
        $query = "SELECT * FROM tbl_empleado WHERE DNI_empleado=? AND password_empleado=?";
        $sentencia=$this->pdo->prepare($query);
        $dni=$empleado->getDNI_empleado();
        $psswd=$empleado->getPassword_empleado();
        $sentencia->bindParam(1,$dni);
        $sentencia->bindParam(2,$psswd);
        $sentencia->execute();
        $result=$sentencia->fetch(PDO::FETCH_ASSOC);
        $nombre = $result['nombre_empleado'];
        $numRow=$sentencia->rowCount();
        if($numRow==1){
            //($result['nombre_empleado']);
            session_start();
            $_SESSION['DNI_empleado']=$dni;
            $_SESSION['nombre_empleado']=$nombre;
            return true;
        }else {
            return false;
        }
    }
}
?>