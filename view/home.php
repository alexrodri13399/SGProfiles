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
    <!--Menú de navegación-->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Crear Post</h2>
            </div>
            <div class="modal-body">
                <form action="home.php" method="POST" enctype="multipart/form-data">
                    <input type="text" id="title" name="title" placeholder="Título de la foto ...">

                    <input type="file" id="img" name="img" accept="image/*">

                    <input type="submit" value="Crear ">
                </form>
            </div>
        </div>
        <?php
        require_once '../model/postsDAO.php';
        if (isset($_POST['title'])) {
            $postsdao = new PostsDao();
            $posts = $postsdao->crearPost();
        }
        ?>

    </div>

    <!--Galería-->
    <div class="row">
        <?php
        require_once '../model/postsDAO.php';
        if ($_SESSION['profile'] == 1) {
            if (isset($_POST['orden'])) {
                if ($_POST['orden'] == "") {
                    $postsdao = new PostsDao();
                $posts = $postsdao->mostrar();
                } else {
                    $postsdao = new PostsDao();
                    $posts = $postsdao->mostrarfiltro($_POST['orden']);
                }
            } else {
                $postsdao = new PostsDao();
                $posts = $postsdao->mostrar();
            }
        } elseif ($_SESSION['profile'] == 2) {
            echo "<div class='one-column'>";
            echo "<a style='text-decoration: none;color: gray;' href='adminpubli.php'><h1>Administrar Publicaciones</h1></a>";
            echo "</div>";
        } else {
            echo "<div class='two-column'>";
            echo "<a style='text-decoration: none;color: gray;' href='adminpubli.php'><h1>Administrar Publicaciones</h1></a>";
            echo "</div>";
            echo "<div class='two-column'>";
            echo "<a style='text-decoration: none;color: gray;' href='adminusers.php'><h1>Administrar Usuarios</h1></a>";
            echo "</div>";
        }
        ?>
    </div>

</body>

</html>