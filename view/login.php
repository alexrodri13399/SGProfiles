<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type=email],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            width: 30%;
            margin-left: 550px;
        }
    </style>
</head>

<body>

    <br><br>

    <div>
        <h3>Iniciar Sesion</h3>
        <form action="../controller/loginController.php" method="POST">
            <label>Email</label>
            <input type="email" id="email" name="email">

            <label>Contraseña</label>
            <input type="password" id="passwd" name="passwd">

            <input type="submit" value="Logear">
        </form>
        <form action="registro.php">
            <input type="submit" value="Registrarse">
        </form>

        <?php
        require_once '../model/userDAO.php';
        if (isset($_GET['mens'])) {
            if ($_GET['mens']==1) {
                echo "Usuario creado correctamente.";
            } else if ($_GET['mens']==2) {
                echo "Usuario temporalmente bloqueado.";
            } else {
                echo "Email o contraseña incorrecto.";
            }
        }
        ?>
    </div>


</body>

</html>