<?php
session_start();
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_usuario'])) {
    $id_usuario = (int) $_POST['id_usuario'];

    $sql = "DELETE FROM usuario WHERE Id_Usuario=" . $id_usuario . "";
    if ($con->query($sql)) {
        header('Location: ./logout.php');
    } else {
        echo "❌ Error en la preparación de la consulta.";
    }
} else {
    echo "⚠️ Solicitud no válida.";
}
