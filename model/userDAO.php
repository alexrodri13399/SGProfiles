<?php
require_once 'user.php';

class UserDAO
{
    private $pdo;

    public function __construct()
    {
        include '../model/conexion.php';
        $this->pdo = $pdo;
    }
    public function login($user)
    {
        $query = "SELECT * FROM users WHERE email=? AND password=?";
        $sentencia = $this->pdo->prepare($query);
        $email = $user->getEmail();
        $passwd = $user->getPassword();
        $sentencia->bindParam(1, $email);
        $sentencia->bindParam(2, $passwd);
        $sentencia->execute();
        $result = $sentencia->fetch(PDO::FETCH_ASSOC);
        $id = $result['id'];
        $name = $result['name'];
        $status = $result['status'];
        $profile = $result['profile'];
        $numRow = $sentencia->rowCount();
        if ($numRow == 1) {
                //($result['nombre_empleado']);
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['profile'] = $profile;
                $_SESSION['status'] = $status;
                return true;
        } else {
            return false;
        }
    }

    public function registro()
    {
        try {
            $this->pdo->beginTransaction();
            $query = "SELECT * FROM `users` WHERE `email` = ?";
            $sentencia = $this->pdo->prepare($query);
            $email = $_POST['email'];
            $sentencia->bindParam(1, $email);
            $sentencia->execute();
            $numRow = $sentencia->rowCount();
            if ($numRow > 0) {
                $mens = "registro.php?mens=1";
            } else {
                $passwd = md5($_POST['passwd']);
                echo $passwd;
                $query = "INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `status`, `profile`) VALUES (NULL, ?, ?, ?, ?, '1', '1');";
                $sentencia = $this->pdo->prepare($query);
                $sentencia->bindParam(1, $_POST['name']);
                $sentencia->bindParam(2, $_POST['lastname']);
                $sentencia->bindParam(3, $_POST['email']);
                $sentencia->bindParam(4, $passwd);
                $sentencia->execute();
                $mens = "login.php?mens=1";
            }

            $this->pdo->commit();
            header('Location: ../view/' . $mens . '');
        } catch (Exception $ex) {
            $this->pdo->rollback();
            echo $ex->getMessage();
        }
    }
}
