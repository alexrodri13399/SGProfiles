<?php
require_once 'posts.php';

class   PostsDAO
{
    private $pdo;

    public function __construct()
    {
        include '../model/conexion.php';
        $this->pdo = $pdo;
    }
    public function mostrar()
    {
        echo '<form style="margin-top:100px;margin-left:600px;" action="home.php" method="POST">';
        echo '<label>Orden:   </label>';
        echo '<select name="orden">';
        echo '<option value="">Sin Orden</option>';
        echo '<option value="ASC">Ascendiente</option>';
        echo '<option value="DESC">Descendiente</option>';
        echo '</select>';
        echo '<input style="width: 10%;" type="submit" value="Filtrar">';
        echo '</form>';
        $query = "SELECT * FROM posts";
        $sentencia = $this->pdo->prepare($query);
        $sentencia->execute();
        $results = $sentencia->fetchall(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            if ($result['user'] == $_SESSION['id']) {
                echo "<div class='three-column'>";
                echo "<img src='../" . $result['path'] . "' alt=''>";
                echo "Foto mía.<br>";
                echo $result['date'];
                echo "</div>";
            } else {
                echo "<div class='three-column'>";
                echo "<img src='../" . $result['path'] . "' alt=''>";
                echo "Foto de otra persona.<br>";
                echo $result['date'];
                echo "</div>";
            }
        }
    }

    public function mostrarfiltro($orden)
    {
        echo '<form style="margin-top:100px;margin-left:600px;" action="home.php" method="POST">';
        echo '<label>Orden:   </label>';
        echo '<select name="orden">';
        echo '<option value="">Sin Orden</option>';
        echo '<option value="ASC">Ascendiente</option>';
        echo '<option value="DESC">Descendiente</option>';
        echo '</select>';
        echo '<input style="width: 10%;" type="submit" value="Filtrar">';
        echo '</form>';
        if ($orden == "ASC") {
            $query = "SELECT * FROM posts ORDER BY date ASC";
        } else {
            $query = "SELECT * FROM posts ORDER BY date DESC";
        }
        $sentencia = $this->pdo->prepare($query);
        $sentencia->execute();
        $results = $sentencia->fetchall(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            if ($result['user'] == $_SESSION['id']) {
                echo "<div class='three-column'>";
                echo "<img src='../" . $result['path'] . "' alt=''>";
                echo "Foto mía.<br>";
                echo $result['date'];
                echo "</div>";
            } else {
                echo "<div class='three-column'>";
                echo "<img src='../" . $result['path'] . "' alt=''>";
                echo "Foto de otra persona.<br>";
                echo $result['date'];
                echo "</div>";
            }
        }
    }

    public function crearPost()
    {
        $title = $_POST['title'];
        $path = 'public/' . $_FILES['img']['name'];
        $user = $_SESSION['id'];
        $date = date("Y-m-d");

        if (move_uploaded_file($_FILES['img']['tmp_name'], '../' . $path)) {
            /* El id del user se ha de colocar de manera correcta y no de manera hardcodeada */
            $query = "INSERT INTO posts (title, path, date, user) VALUES(?,?,?,?);";
            $sentencia = $this->pdo->prepare($query);
            $sentencia->bindParam(1, $title);
            $sentencia->bindParam(2, $path);
            $sentencia->bindParam(3, $date);
            $sentencia->bindParam(4, $user);
            $sentencia->execute();
            header('Location: ../view/home.php');
        }
    }

    public function adminpubli()
    {

        $query = "SELECT posts.id, posts.title, posts.path, posts.date, posts.user, users.id as 'id_usu', users.name, users.email FROM `posts` INNER JOIN users ON posts.user=users.id";
        $sentencia = $this->pdo->prepare($query);
        $sentencia->execute();
        $results = $sentencia->fetchall(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            echo "<div class='three-column'>";
            echo "<img src='../" . $result['path'] . "' alt=''>";
            echo "<p><b>Nombre:</b> " . $result['name'] . " <b>| Email: </b>" . $result['email'] . "</p>";
            echo "<p><b>Título:</b> " . $result['title'] . " <b>| Fecha: </b>" . $result['date'] . "</p>";
            echo "<a href='../controller/eliminarposts.php?id=" . $result['id'] . "'>Eliminar</a>";
            echo "</div>";
        }
    }

    public function adminusers()
    {
        $query = "SELECT users.*, profiles.name as 'nombre' FROM `users` INNER JOIN profiles on profiles.id=users.profile";
        $sentencia = $this->pdo->prepare($query);
        $sentencia->execute();
        $lista_users = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        echo "<table class='w3-table w3-striped w3-border'>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Email</th>";
        echo "<th>Perfil</th>";
        echo "<th>Estado</th>";
        echo "</tr>";
        foreach ($lista_users as $users) {
            echo "<tr>";
            echo "<td>" . $users['name'] . "</td>";
            echo "<td>" . $users['email'] . "</td>";
            echo "<td>" . $users['nombre'] . "</td>";
            if ($users['id'] == $_SESSION['id']) {
                echo "<td><img style='width:30px; height:30px;' src='../img/bloquear.png'></td>";
            } else {
                if ($users['status'] == 1) {
                    echo "<td><a href='../controller/cambioestado.php?id=" . $users['id'] . "&estado=0'><img style='width:30px; height:30px;' src='../img/bloquear.png'></td>";
                } elseif ($users['status'] == 0) {
                    echo "<td><a href='../controller/cambioestado.php?id=" . $users['id'] . "&estado=1'><img style='width:30px; height:30px;' src='../img/desbloquear.png'></td>";
                }
                echo "</tr>";
            }
        }
        echo "</table>";
    }

    public function adminusersfiltro($id)
    {
        $query = "SELECT users.*, profiles.name as 'nombre' FROM `users` INNER JOIN profiles on profiles.id=users.profile WHERE profiles.id LIKE ?";
        $sentencia = $this->pdo->prepare($query);
        $sentencia->bindParam(1, $id);
        $sentencia->execute();
        $lista_users = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        echo "<table class='w3-table w3-striped w3-border'>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Email</th>";
        echo "<th>Perfil</th>";
        echo "<th>Estado</th>";
        echo "</tr>";
        foreach ($lista_users as $users) {
            echo "<tr>";
            echo "<td>" . $users['name'] . "</td>";
            echo "<td>" . $users['email'] . "</td>";
            echo "<td>" . $users['nombre'] . "</td>";
            if ($users['id'] == $_SESSION['id']) {
                echo "<td><img style='width:30px; height:30px;' src='../img/bloquear.png'></td>";
            } else {
                if ($users['status'] == 1) {
                    echo "<td><a href='../controller/cambioestado.php?id=" . $users['id'] . "&estado=0'><img style='width:30px; height:30px;' src='../img/bloquear.png'></td>";
                } elseif ($users['status'] == 0) {
                    echo "<td><a href='../controller/cambioestado.php?id=" . $users['id'] . "&estado=1'><img style='width:30px; height:30px;' src='../img/desbloquear.png'></td>";
                }
                echo "</tr>";
            }
        }
        echo "</table>";
    }

    public function eliminar($id)
    {
        $query = "DELETE FROM `posts` WHERE `posts`.`id` = ?";
        $sentencia = $this->pdo->prepare($query);
        $sentencia->bindParam(1, $id);
        $sentencia->execute();
        header('Location: ../view/adminpubli.php');
    }

    public function cambioEstado($id, $estado)
    {
        $query = "UPDATE `users` SET `status` = ? WHERE `users`.`id` = ?";
        $sentencia = $this->pdo->prepare($query);
        $sentencia->bindParam(1, $estado);
        $sentencia->bindParam(2, $id);
        $sentencia->execute();
        header('Location: ../view/adminusers.php');
    }
}
