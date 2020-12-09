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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <!--Menú de navegación-->
    <?php
    include "../controller/sessionController.php";
    ?>

    <!--Galería-->
    <div class="row">
        <div class='one-column'>
            <form action="adminusers.php" method="POST">
                <label>Escoge un perfil:</label>
                <select name="perfil">
                    <option value="%">Todos</option>
                    <option value="1">Sin Privilegio</option>
                    <option value="2">Moderador</option>
                    <option value="3">Administrador</option>
                </select>
                <input style="width: 10%;" type="submit" value="Filtrar">
            </form>
            <div class="w3-container">
                <?php
                require_once '../model/postsDAO.php';
                if (isset($_POST['perfil'])) {
                    $postsdao = new PostsDao();
                    $posts = $postsdao->adminusersfiltro($_POST['perfil']);
                } else {
                    $postsdao = new PostsDao();
                    $posts = $postsdao->adminusers();
                }
                
                ?>
            </div>
        </div>
    </div>

</body>

</html>