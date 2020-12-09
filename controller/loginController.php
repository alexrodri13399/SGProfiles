<?php
require_once '../model/user.php';
require_once '../model/userDAO.php';
if (isset($_POST['email'])) {
$user = new User($_POST['email'], md5($_POST['passwd']));
$userDAO = new UserDAO();
if($userDAO->login($user)){
    session_start();
    if ($_SESSION['status']==0) {
        session_destroy();
        header('Location: ../view/login.php?mens=2');
    } else {
        header('Location: ../view/home.php');
    }
}else {
    header('Location: ../view/login.php?mens=3');
}
}else {
    header('Location:../view/login.php');
}