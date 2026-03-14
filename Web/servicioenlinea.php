<?php
    $title="Servicio en Linea";
    include("nav.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Íconos Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="icon" href="../Img/FlySaverLOG.jpg" type="image/jpg">

  <style>
    .x{
      background-color: #B3AEAC;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='45' height='45' viewBox='0 0 90 90'%3E%3Ccircle fill='%23FF0808' cx='45' cy='45' r='5'/%3E%3Cg fill='%23800' fill-opacity='1'%3E%3Ccircle cx='0' cy='90' r='5'/%3E%3Ccircle cx='90' cy='90' r='5'/%3E%3Ccircle cx='90' cy='0' r='5'/%3E%3Ccircle cx='0' cy='0' r='5'/%3E%3C/g%3E%3C/svg%3E");
    }

     .alert-overlay {
    position: fixed;
    top: 0; left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(199, 0, 57, 0.9); /* rojo semi-transparente */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10500;
    font-family: 'Montserrat', sans-serif;
  }

  .alert-box {
    background: white;
    border-radius: 12px;
    padding: 40px 60px;
    max-width: 700px;
    text-align: center;
    box-shadow: 0 0 30px rgba(199, 0, 57, 0.8);
    animation: pulseAlert 2s ease-in-out infinite;
  }

  .alert-box h1 {
    color: #c70039;
    font-size: 2.8rem;
    margin-bottom: 12px;
  }

  .alert-box p {
    font-size: 1.4rem;
    color: #444;
  }

  @keyframes pulseAlert {
    0%, 100% {
      box-shadow: 0 0 30px rgba(199, 0, 57, 0.8);
    }
    50% {
      box-shadow: 0 0 50px rgba(255, 64, 64, 1);
    }
  }
    /* Fondo pantalla completa */
    #loader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #ff0000, #000);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      z-index: 9999;
      color: white;
      font-family: "Montserrat", sans-serif;
      overflow: hidden;
      animation: fadeOut 1s ease forwards;
      animation-delay: 3.5s; /* tiempo visible antes de desvanecer */
    }

    /* Contenido centrado */
    .loader-content {
      text-align: center;
      animation: aparecer 1s ease-in-out;
    }

    .loader-content h2 {
      margin-top: 15px;
      font-weight: 700;
      letter-spacing: 3px;
    }

    /* Avión animado */
    .avioncito {
      font-size: 60px;
      color: white;
      animation: vuelo 1.5s ease-in-out infinite alternate;
      filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.5));
    }

    /* Animación de vuelo */
    @keyframes vuelo {
      0% {
        transform: translateY(0) rotate(0deg);
        color: white;
      }
      100% {
        transform: translateY(-15px) rotate(10deg);
        color: #ff4040;
      }
    }

    /* Aparecer texto */
    @keyframes aparecer {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }

    /* Desvanecer pantalla */
    @keyframes fadeOut {
      to {
        opacity: 0;
        visibility: hidden;
      }
    }
  </style>
</head>

<body class="x">
  <!-- Pantalla de carga -->
  <div id="loader">
    <div class="loader-content">
      <i class="bi bi-airplane-fill avioncito"></i>
      <h2>FLY-SAVER</h2>
    </div>
  </div>
<br><br><br><br><br><br><br><br><br>
  <div class="alert-overlay" id="alerta-soporte">
  <div class="alert-box">
    <h1><i class="bi bi-exclamation-triangle-fill"></i> Atención</h1>
    <p><strong>Sistema de atención al cliente colapsado, por favor espere.</strong></p>
  </div>
</div>

  <script>
    window.addEventListener("load", function() {
      setTimeout(() => {
        document.getElementById("loader").style.display = "none";
      }, 90000000); // duración total antes de desaparecer
    });
  </script>
</body>
</html>
