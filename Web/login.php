<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    $verusuarios = mysqli_query($con, "SELECT * FROM usuario WHERE Nombre='$usuario' AND Contrasena='$contrasena'");
    $valida = mysqli_num_rows($verusuarios);
    $datos = mysqli_fetch_array($verusuarios);

    if ($valida == 1) {
        $id= $datos["Id_Usuario"];
        $rol = $datos["Codigo_Rol"];
        $email = $datos["Correo"];

        session_start();
        $_SESSION['id_usuario'] = $id;
        $_SESSION['correo'] = $email;
        $_SESSION['rol'] = $rol;

        switch ($rol) {
            case 1:
                echo "<script>window.location.href='usuario.php';</script>";
                break;
            case 2:
                echo "<script>window.location.href='Empresario.php';</script>";
                break;
            case 3:
                echo "<script>window.location.href='Soporte.php';</script>";
                break;
            case 4:
                echo "<script>window.location.href='TorreControl.php';</script>";
                break;
            case 5:
                echo "<script>window.location.href='Pilotos.php';</script>";
                break;
            default:
                echo "<script>alert('Rol no reconocido');</script>";
        }
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos');</script>";
    }
}
?>
