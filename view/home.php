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
    <ul>
        <li><a href="#">@username</a></li>
        <li><a href="#" onclick="openModal()">+</a></li>
        <li><a href="#">logout</a></li>
    </ul>
    <!--Menú de navegación-->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Crear Post</h2>
            </div>
            <div class="modal-body">
                <form action="../controller/postController.php" method="POST" enctype="multipart/form-data">
                    <input type="text" id="title" name="title" placeholder="Título de la foto ...">

                    <input type="file" id="img" name="img">

                    <input type="submit" value="Crear ">
                </form>
            </div>
        </div>

    </div>
    <?php
    include "../controller/sessionController.php";
    ?>
    <!--Galería-->
    <div class="row">
        <div class="three-column">
            <img src="../public/WhatsApp Image 2020-11-04 at 16.03.59.jpeg" alt="">
        </div>
        <div class="three-column">
            <img src="../public/WhatsApp Image 2020-11-04 at 16.03.59.jpeg" alt="">
        </div>
        <div class="three-column">
            <img src="../public/WhatsApp Image 2020-11-04 at 16.03.59.jpeg" alt="">
        </div>
        <div class="three-column">
            <img src="../public/WhatsApp Image 2020-11-04 at 16.03.59.jpeg" alt="">
        </div>
        <div class="three-column">
            <img src="../public/WhatsApp Image 2020-11-04 at 16.03.59.jpeg" alt="">
        </div>
        <div class="three-column">
            <img src="../public/WhatsApp Image 2020-11-04 at 16.03.59.jpeg" alt="">
        </div>
        <div class="three-column">
            <img src="../public/WhatsApp Image 2020-11-04 at 16.03.59.jpeg" alt="">
        </div>
    </div>

</body>

</html>