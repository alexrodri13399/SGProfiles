<?php
require_once '../model/empleado.php';
require_once '../model/empleadoDAO.php';
if (isset($_POST['dni'])) {
$empleado = new Empleado($_POST['dni'], md5($_POST['psswd']));
$empleadoDAO = new EmpleadoDAO();
if($empleadoDAO->login($empleado)){
    header('Location: ../view/zona.admin.php');
}else {
    header('Location: ../view/login.php?mensaje=1');
}
}else {
    header('Location:../view/login.php');
}