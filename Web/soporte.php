<?php
include("conexion.php");
$title = "soporte";
include("nav.php");
?>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
    }
    html, body {
    margin: 0;
    padding: 0;
    width: 100%;
    overflow-x: hidden; /* evita scroll horizontal */
}
body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1100px;
      margin: 40px auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #c70039;
      margin-bottom: 40px;
    }

    .ticket {
      background-color: #fff;
      border-left: 6px solid #c70039;
      padding: 20px 30px;
      margin-bottom: 25px;
      border-radius: 6px;
      box-shadow: 0 0 8px rgba(0,0,0,0.05);
    }

    .ticket h3 {
      margin: 0 0 10px;
      color: #333;
    }

    .ticket .detalle {
      color: #555;
      margin-bottom: 10px;
    }

    .ticket .mensaje {
      background-color: #f1f1f1;
      padding: 15px;
      border-radius: 6px;
      white-space: pre-wrap;
      font-size: 0.95em;
    }

    .actions {
      margin-top: 20px;
    }

    .actions button {
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      margin-right: 10px;
      font-size: 0.95em;
      cursor: pointer;
      transition: background 0.3s;
    }

    .btn-responder {
      background-color: #28a745;
      color: white;
    }

    .btn-responder:hover {
      background-color: #218838;
    }

    .btn-ignorar {
      background-color: #dc3545;
      color: white;
    }

    .btn-ignorar:hover {
      background-color: #c82333;
    }

    @media (max-width: 768px) {
      .actions button {
        display: block;
        width: 100%;
        margin-bottom: 10px;
      }
    }

</style>
  <div class="container">
    <h1>Panel de Soporte - Quejas de Usuarios</h1>

    <?php
    // Consulta a la base de datos
    $consulta = "SELECT Nombre, Correo, Telefono, Nacionalidad, queja FROM usuario WHERE queja IS NOT NULL AND queja != ''";
    $resultado = mysqli_query($con, $consulta);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<div class='ticket'>
                <h3>" . htmlspecialchars($fila['Nombre']) . "</h3>
                <div class='detalle'><strong>Correo:</strong> " . htmlspecialchars($fila['Correo']) . "</div>
                <div class='detalle'><strong>Teléfono:</strong> " . htmlspecialchars($fila['Telefono']) . "</div>
                <div class='detalle'><strong>Nacionalidad:</strong> " . htmlspecialchars($fila['Nacionalidad']) . "</div>
                <div class='mensaje'>" . nl2br(htmlspecialchars($fila['queja'])) . "</div>
                <div class='actions'>
                  <button class='btn-responder'>Responder queja</button>
                  <button class='btn-ignorar'>Ignorar</button>
                </div>
              </div>";
    }

    mysqli_close($con);
    ?>

  </div>



<br><br>
<?php
include("footer.php");
?>
