<?php
require_once('../../bbdd.php');
session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["type"] == 1) {
        if (isset($_POST['borrar'])) {
            $username = $_POST["username"];
            deleteUser($username);
        } else {
            echo "<form action='' method='post'>";
            echo "Seleciona el usuario a eliminar: ";
            echo "<select name='username'>";
            $nombres = selectUser();
            while ($fila = mysqli_fetch_array($nombres)) {
                extract($fila);
                echo "<option value='$username'>$username</option>";
            }
            echo "</select>";
            echo "<input type='submit' name='borrar' value='Borrar jugador'>";
            echo "</form>";
        }
    }
} else {
    echo "No se ha iniciado ninguna session.";
}
?>
