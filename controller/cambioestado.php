<?php
require_once '../model/postsDAO.php';
$id=$_GET['id'];
$estado=$_GET['estado'];
$postsdao = new PostsDao();
$posts = $postsdao->cambioEstado($id,$estado);