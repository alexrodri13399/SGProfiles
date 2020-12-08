<?php
require_once '../model/empleado.php';
session_start();
if (!isset($_SESSION['DNI_empleado'])) {
    header('Location:../view/login.php');
}
echo '<div class="row">';
echo '<div class="one-columnsesion">';
echo '<div class="three-column">';
echo '<h2 style="color:white;font-size:20px;margin-top:23px;">Bienvenido '.$_SESSION['nombre_empleado'].'</h2>';
echo '</div>';
echo '<div style="text-align:center;" class="three-column">';
echo '<img style="width:100px;" src="../img/logo.png">';
echo '</div>';
echo '<div class="three-column">';
    echo'<h2 style="float: right;"><a style="text-decoration:none; color: white; font-size:15px;margin-top:23px;" href="../controller/logoutController.php">Cerrar Sesión</a></h2>';
echo '</div>';
echo '</div>';
echo '</div>';