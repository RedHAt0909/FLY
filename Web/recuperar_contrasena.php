<?php
include("conexion.php"); // Conexión a la base de datos

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']); 
    $nueva_contrasena = $_POST['contrasena']; // Guardar tal cual el usuario escribe

    // Validar que la contraseña tenga mínimo 6 caracteres
    if (strlen($nueva_contrasena) < 6) {
        $mensaje = "La contraseña debe tener al menos 6 caracteres.";
    } else {
        // Verificar si el correo existe
        $stmt = mysqli_prepare($con, "SELECT * FROM usuario WHERE Correo = ?");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $correo);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($resultado) > 0) {
                // Actualizar la contraseña (en claro)
                $update = mysqli_prepare($con, "UPDATE usuario SET Contrasena = ? WHERE Correo = ?");
                if ($update) {
                    mysqli_stmt_bind_param($update, "ss", $nueva_contrasena, $correo);
                    if (mysqli_stmt_execute($update)) {
                        $mensaje = "Contraseña actualizada correctamente. <a href='index.php'>Iniciar sesión</a>";
                    } else {
                        $mensaje = "Error al actualizar la contraseña: " . mysqli_stmt_error($update);
                    }
                    mysqli_stmt_close($update);
                } else {
                    $mensaje = "Error en la preparación de la actualización: " . mysqli_error($con);
                }
            } else {
                $mensaje = "El correo no está registrado.";
            }

            mysqli_stmt_close($stmt);
        } else {
            $mensaje = "Error en la preparación de la consulta: " . mysqli_error($con);
        }
    }
}
$title="Recuperar Contraseña";
include("nav.php");
?>
<br><br>
<style>
    .containerAll {
        background: #ffffff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        width: 350px;
        margin-left: 40%;
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #333333;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
        color: #555555;
    }

    input[type="email"], input[type="password"] {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 8px;
        font-size: 14px;
        transition: border 0.3s;
    }

    input[type="email"]:focus, input[type="password"]:focus {
        border-color: #007bff;
        outline: none;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
    }

    button:hover {
        background: #0056b3;
    }

    p {
        text-align: center;
        color: green;
        font-weight: bold;
        margin-bottom: 20px;
    }
</style>


<div class="containerAll">
    <h2>Recuperar contraseña</h2>

    <?php if ($mensaje != ""): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <form method="POST" action="recuperar_contrasena.php">
        <label>Correo:</label>
        <input type="email" name="correo" required>

        <label>Nueva Contraseña:</label>
        <input type="password" name="contrasena" required>

        <button type="submit">Actualizar Contraseña</button>
    </form>
</div>
<br><br><br><br>
<?php
include("footer.php");
?>