<?php
include("conexion.php");


$nombre=$_POST["nombre"];
$email=$_POST["email"];
$telefono=$_POST["telefono"];
$nacimiento=$_POST["nacimiento"];
$direccion=$_POST["direccion"];
$pasaporte=$_POST["pasaporte"];
$nacionalidad=$_POST["nacionalidad"];
$contrasena=$_POST["contrasena"];
$rol=$_POST["rol"];

$datos="insert into usuario(Nombre, Correo, telefono, Fecha_Nacimiento, Direccion, Numero_Pasaporte, Nacionalidad, contrasena, Codigo_Rol) values ('$nombre', '$email', '$telefono', '$nacimiento', '$direccion', '$pasaporte', '$nacionalidad', '$contrasena', $rol)";

$guardar=mysqli_query($con, $datos);

if($guardar){
    session_start();
     $_SESSION['correo'] = $email;
     
    echo "<script>
        alert('Registro exitoso');
        window.location.href='../Web/Usuario.php';
    </script>";
}else {
    echo "Error: " . mysqli_error($con);
}

?>