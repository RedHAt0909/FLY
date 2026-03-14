<?php
include('conexion.php'); // Asegúrate que la ruta esté bien

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']);
    $queja = trim($_POST['queja']);

    // Validación básica
    if (!empty($correo) && !empty($queja)) {
        // Preparar la consulta SQL para actualizar la queja del usuario con ese correo
        $sql = "UPDATE usuario SET queja = ? WHERE Correo = ?";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $queja, $correo);
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Gracias por tu mensaje. Tu queja ha sido registrada.'); window.history.back();</script>";
            } else {
                echo "❌ Error al guardar la queja.";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "❌ Error en la preparación de la consulta.";
        }
    } else {
        echo "⚠️ Por favor, completa todos los campos.";
    }

    mysqli_close($con);
}
?>
