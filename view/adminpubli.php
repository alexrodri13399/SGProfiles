<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | Social Gallery</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/code.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <!--Menú de navegación-->
    <?php
    include "../controller/sessionController.php";
    ?>

    <!--Galería-->
    <div class="row">
        <?php
        require_once '../model/postsDAO.php';
        $postsdao = new PostsDao();
        $posts = $postsdao->adminpubli();
        ?>
    </div>

</body>

</html>