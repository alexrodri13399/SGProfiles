<?php
require_once '../model/postsDAO.php';
$postsdao = new PostsDao();
$posts = $postsdao->eliminar($_GET['id']);