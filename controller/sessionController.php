<?php
require_once '../model/user.php';
session_start();
if (!isset($_SESSION['name'])) {
    header('Location:../view/login.php');
}
if ($_SESSION['profile'] == 2 || $_SESSION['profile'] == 3) {
    echo "<ul>";
    echo "<li style='width:50%;'><a href='home.php'>" . $_SESSION['name'] . "</a></li>";
    echo "<li style='width:50%;'><a href='../controller/logoutController.php'>logout</a></li>";
    echo "</ul>";
} else {
    echo "<ul>";
    echo "<li><a href='#'>" . $_SESSION['name'] . "</a></li>";
    echo "<li><a href='#' onclick='openModal()'>+</a></li>";
    echo "<li><a href='../controller/logoutController.php'>logout</a></li>";
    echo "</ul>";
}
