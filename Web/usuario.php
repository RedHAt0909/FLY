<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['correo'])) {
  header("Location: login.php");
  exit();
}

if (isset($_POST['imagenWebcam'])) {
  $data = $_POST['imagenWebcam'];
  $data = str_replace('data:image/jpeg;base64,', '', $data);
  $data = base64_decode($data);

  $carpetaDestino = "imagenes/";
  if (!file_exists($carpetaDestino)) {
    mkdir($carpetaDestino, 0777, true);
  }

  $nombreArchivo = uniqid() . ".jpg";
  $rutaArchivo = $carpetaDestino . $nombreArchivo;
  file_put_contents($rutaArchivo, $data);

  $correo = $_SESSION['correo'];
  $query = "UPDATE usuario SET imagen='$nombreArchivo' WHERE Correo='$correo'";
  mysqli_query($con, $query);

  header("Location: usuario.php");
  exit;
}

$correo = $_SESSION['correo'];
$query = "SELECT Id_Usuario, Nombre, Correo, telefono, Direccion, Nacionalidad, Numero_Pasaporte, imagen 
          FROM usuario 
          WHERE Correo = '$correo'";
$resultado = mysqli_query($con, $query);
$usuario = mysqli_fetch_assoc($resultado);
// ✅ Si viene un vuelo por POST, lo guardamos en sesión
if (isset($_POST['id_vuelo'])) {
  $_SESSION['vuelo_seleccionado'] = $_POST['id_vuelo'];
}


// ✅ BLOQUE NUEVO: Verificar si hay vuelo en sesión
$datosVuelo = null;
if (isset($_SESSION['vuelo_seleccionado'])) {
  $id_vuelo = $_SESSION['vuelo_seleccionado'];
  $queryVuelo = "SELECT * FROM vuelo WHERE Codigo_Vuelo = $id_vuelo";
  $datosVuelo = mysqli_fetch_assoc(mysqli_query($con, $queryVuelo));
}
// ✅ FIN BLOQUE NUEVO

if (!empty($usuario['imagen'])) {
  $rutaImagenUsuario = "imagenes/" . $usuario['imagen'];
} else {
  $rutaImagenUsuario = "https://i.pravatar.cc/150?u=usuario_default";
}

$title = "Mi perfil";
include("nav.php");
?>

<style>
  .btn-detalles {
    background-color: white;
    color: black;
    border: 2px solid black;
    border-radius: 20px;
    padding: 5px 15px;
    font-size: 0.9rem;
    transition: all 0.3s ease-in-out;
    text-decoration: none;
    display: inline-block;
    margin-top: 20px;
    margin-right: 73%;
  }

  .btn-detalles:hover {
    background-color: #007bff;
    color: white;
    border-color: black;
    transform: scale(1.05);
    /* efecto suave */
    cursor: pointer;
  }

  .flight-card {
    background: #fdfdfd;
    border-radius: 12px;
  }

  .flight-card .card-body {
    padding: 1.5rem;
  }

  .perfil-page {
    --color-primario: #4A90E2;
    --color-secundario: #f5f7fa;
    --color-texto: #333;
    --color-danger: #e74c3c;
    --bg-card: #ffffff;
    --muted: #6b7280;
  }

  .perfil-page* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: 'Inter', 'Segoe UI', Tahoma, sans-serif;
    background: var(--color-secundario);
    color: var(--color-texto);
    line-height: 1.5;
  }

  .container {
    max-width: 1000px;
    margin: 24px auto;
    background: var(--bg-card);
    border-radius: 12px;
    padding: 26px;
    box-shadow: 0 8px 30px rgba(12, 20, 30, 0.06);
  }

  .topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 24px;
  }

  .brand {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .brand .logo {
    width: 44px;
    height: 44px;
    border-radius: 8px;
    background: linear-gradient(135deg, var(--color-primario), #2d7adf);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-weight: 700;
    font-size: 18px;
  }

  .nav {
    display: flex;
    gap: 10px;
  }

  .nav a {
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 8px;
    font-size: 0.92rem;
    color: var(--muted);
  }

  .nav a.active {
    background: rgba(74, 144, 226, 0.12);
    color: var(--color-primario);
  }

  .perfil-header {
    display: flex;
    gap: 20px;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 20px;
  }

  .avatar-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
  }

  .change-img-btn {
    background: var(--color-primario);
    color: #fff;
    font-weight: 600;
    border: none;
    border-radius: 10px;
    padding: 8px 14px;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  }

  .change-img-btn:hover {
    background: #2d7adf;
    transform: translateY(-2px);
  }

  .change-img-btn:active {
    transform: scale(0.97);
  }


  .perfil-info h2 {
    font-size: 1.4rem;
    margin-bottom: 6px;
  }

  .perfil-info p {
    color: var(--muted);
    margin: 4px 0;
    font-size: 0.95rem;
  }

  .actions {
    margin-top: 14px;
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
  }

  .btn {
    padding: 10px 16px;
    border-radius: 10px;
    text-decoration: none;
    color: #fff;
    background: var(--color-primario);
    font-weight: 600;
    font-size: 0.95rem;
    border: none;
  }

  .btn.secondary {
    background: #6b7280;
  }

  .btn.danger {
    background: var(--color-danger);
  }

  .section {
    margin-top: 28px;
  }

  .section h3 {
    font-size: 1.05rem;
    color: var(--color-primario);
    border-bottom: 2px solid rgba(74, 144, 226, 0.12);
    padding-bottom: 6px;
    margin-bottom: 12px;
    display: inline-block;
  }

  .interests-list {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 10px;
  }

  .interest {
    background: #f3f6fb;
    padding: 8px 12px;
    border-radius: 999px;
    color: #334155;
    font-size: 0.9rem;
    border: 1px solid rgba(46, 116, 217, 0.06);
  }

  .card {
    border-radius: 10px;
    padding: 14px;
    background: #fbfdff;
    border: 1px solid #eef3fb;
    margin-bottom: 12px;
  }

  .card strong {
    display: block;
    margin-bottom: 6px;
  }

  .small {
    color: var(--muted);
    font-size: 0.9rem;
  }

  @media (max-width: 600px) {
    .topbar {
      flex-direction: column;
      align-items: flex-start;
      gap: 8px;
    }

    .perfil-header {
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .avatar {
      width: 100px;
      height: 100px;
    }
  }
</style>

<div class="perfil-page">
  <div class="container">

    <div class="topbar">
      <div class="brand">
        <div>
          <h1>Mi Perfil</h1>
          <div class="small">Área personal — ID <?php echo $usuario['Id_Usuario']; ?></div>
        </div>
      </div>
      <div class="nav" style="display: flex; gap: 20px; background: #f0f0f0; padding: 10px; border-radius: 10px;">
        <a href="#" class="active" style="text-decoration: none; color: #007bff; padding: 8px 15px; border-radius: 5px; transition: all 0.3s;">Perfil</a>
        <a href="../Web/Compra.php" style="text-decoration: none; color: #333; padding: 8px 15px; border-radius: 5px; transition: all 0.3s;">Comprar</a>
        <a href="../Web/index.php" style="text-decoration: none; color: #333; padding: 8px 15px; border-radius: 5px; transition: all 0.3s;">Salir</a>
      </div>

      <script>
        // Efecto hover usando inline style
        const links = document.querySelectorAll('.nav a');
        links.forEach(link => {
          link.addEventListener('mouseover', () => {
            link.style.backgroundColor = '#007bff';
            link.style.color = 'white';
          });
          link.addEventListener('mouseout', () => {
            if (link.classList.contains('active')) {
              link.style.backgroundColor = '#e0e0e0';
              link.style.color = '#007bff';
            } else {
              link.style.backgroundColor = 'transparent';
              link.style.color = '#333';
            }
          });
        });
      </script>

    </div>

    <div class="perfil-header">
      <div class="avatar-container">
        <div class="avatar" style="text-align:center;">
          <img id="fotoPerfil" src="<?php echo $rutaImagenUsuario; ?>"
            alt="Foto de perfil" width="150" height="150"
            style="border-radius: 50%; object-fit: cover;">
        </div>

        <div style="text-align:center; margin-top:25%;">
          <button type="button" class="btn btn-primary" onclick="abrirCamara()" style="background-color: #3b3b3b71;">Cambiar imagen</button>
        </div>

        <!-- Cámara y canvas ocultos -->
        <video id="video" autoplay style="display:none; border-radius:10px; margin-top:10px;"></video>
        <canvas id="canvas" style="display:none;"></canvas>
        <form id="formFoto" method="POST">
          <input type="hidden" name="imagenWebcam" id="imagenWebcam">
        </form>


        <!-- Modal para tomar foto -->
        <div id="modalCamara"
          style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
            background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:9999;">

          <div style="background:white; padding:20px; border-radius:10px; text-align:center; max-width:400px;">
            <video id="video" autoplay style="width:100%; border-radius:10px; border:2px solid #ddd;"></video>
            <br><br>
            <button onclick="tomarFoto()" class="btn btn-success">Tomar foto</button>
            <button onclick="cerrarCamara()" class="btn btn-danger">Cancelar</button>
          </div>
        </div>

        <form method="POST" id="formFoto">
          <input type="hidden" name="imagenWebcam" id="imagenWebcam">
        </form>

        <canvas id="canvas" style="display:none;"></canvas>



      </div>


      <div class="perfil-info">
        <h2><?php echo $usuario['Nombre']; ?></h2>
        <p><strong>Correo:</strong> <?php echo $usuario['Correo']; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $usuario['telefono']; ?></p>
        <p><strong>Dirección:</strong> <?php echo $usuario['Direccion']; ?></p>
        <p><strong>Nacionalidad:</strong> <?php echo $usuario['Nacionalidad']; ?></p>
        <p><strong>Pasaporte:</strong> <?php echo $usuario['Numero_Pasaporte']; ?></p>


        <div class="actions">
          <a class="btn" href="#">Editar perfil</a>
          <a class="btn secondary" href="#">Mis Vuelos</a>
          <a class="btn danger" href="#" data-bs-toggle="modal" data-bs-target="#modalEliminarCuenta">Eliminar cuenta</a>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalEliminarCuenta" tabindex="-1">
      <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title fw-bold">Confirmar eliminación</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <div class="modal-body text-center">
            ¿Seguro que deseas eliminar tu cuenta? <br>
            Esta acción no se puede deshacer.
          </div>

          <div class="modal-footer d-flex justify-content-between">
            <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>

            <form action="eliminar_cuenta.php" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar tu cuenta?');">
              <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
              <button type="submit" class="btn btn-danger btn-sm">Eliminar cuenta</button>
            </form>

          </div>
        </div>
      </div>
    </div>


    <div class="section">
      <h3>Intereses</h3>
      <div class="interests-list">
        <div class="interest">Viajes</div>
        <div class="interest">Fotografía</div>
        <div class="interest">Tecnología</div>
        <div class="interest">Aventura</div>
      </div>
    </div>

    <div class="section">
      <h3 class="fw-bold mb-3">Historial de vuelos</h3>

      <?php if ($datosVuelo): ?>
        <div class="card shadow-sm border-0 mt-2 flight-card">
          <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-2">
              <h5 class="fw-bold text-primary m-0">✈️ Vuelo seleccionado</h5>
              <span class="badge bg-info text-dark">
                <?php echo $datosVuelo['Temporada_Vuelo']; ?>
              </span>
            </div>

            <hr class="mt-1 mb-3">

            <div class="row">
              <div class="col-md-6 mb-2">
                <p class="m-0 text-muted">Origen</p>
                <p class="fw-bold fs-5">🛫 <?php echo $datosVuelo['Origen']; ?></p>
              </div>

              <div class="col-md-6 mb-2">
                <p class="m-0 text-muted">Destino</p>
                <p class="fw-bold fs-5">🛬 <?php echo $datosVuelo['Destino']; ?></p>
              </div>

              <div class="col-md-6 mb-2">
                <p class="m-0 text-muted">Hora de salida</p>
                <p class="fw-bold">⏰ <?php echo $datosVuelo['Hora_Salida']; ?></p>
              </div>

              <div class="col-md-6 mb-2">
                <p class="m-0 text-muted">Hora de llegada</p>
                <p class="fw-bold">⏰ <?php echo $datosVuelo['Hora_Llegada']; ?></p>
              </div>

              <div class="col-md-6 mb-3">
                <p class="m-0 text-muted">Precio</p>
                <p class="fw-bold text-success fs-5">💲 $<?php echo $datosVuelo['Precio_Adultos']; ?></p>
              </div>

              <div class="col-md-6 mb-3">
                <div class="text-end">
                  <a href="#" class="btn-detalles" data-bs-toggle="modal" data-bs-target="#modalDescripcion">
                    Ver detalles
                  </a>

                </div>
              </div>
            </div>



          </div>
        </div>

        <div class="modal fade" id="modalDescripcion" tabindex="-1">
          <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title fw-bold">Descripción del vuelo</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <?php echo $datosVuelo['Descripcion']; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Aceptar</button>
              </div>
            </div>
          </div>
        </div>
      <?php else: ?>
        <p class="text-muted">No tienes vuelos registrados aún.</p>
      <?php endif; ?>


      <!-- Espacio para dejar una queja o reclamo -->
      <div style="margin-top: 20px; background-color: #f8f9fa; padding: 20px; border-radius: 8px; max-width: 600px; margin-left: 17%;">
        <h5 style="margin-bottom: 15px; color: #333;">¿Tienes una queja o reclamo?</h5>
        <form action="procesar_queja.php" method="POST">
          <div style="margin-bottom: 10px;">
            <label for="correo" style="display: block; margin-bottom: 5px; color: #333;">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required
              style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
          </div>
          <div style="margin-bottom: 10px;">
            <label for="queja" style="display: block; margin-bottom: 5px; color: #333;">Tu queja o reclamo:</label>
            <textarea id="queja" name="queja" rows="4" required
              style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
          </div>
          <button type="submit"
            style="background-color: #dc3545; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
            Enviar queja
          </button>
        </form>
      </div>

      <div class="d-flex justify-content-end align-items-center mt-3">
        <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
      </div>
    </div>



  </div>
  <script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const fotoPerfil = document.getElementById('fotoPerfil');
    const imagenWebcam = document.getElementById('imagenWebcam');
    const form = document.getElementById('formFoto');
    let tomandoFoto = false;

    function abrirCamara() {
      if (!tomandoFoto) {
        navigator.mediaDevices.getUserMedia({
            video: true
          })
          .then(stream => {
            video.srcObject = stream;
            video.style.display = "block";
            tomandoFoto = true;

            const botonCapturar = document.createElement('button');
            botonCapturar.textContent = '📸 Tomar foto';
            botonCapturar.classList.add('btn', 'btn-success');
            botonCapturar.style.marginTop = '10px';
            botonCapturar.onclick = () => {
              canvas.width = video.videoWidth;
              canvas.height = video.videoHeight;
              canvas.getContext('2d').drawImage(video, 0, 0);
              const dataUrl = canvas.toDataURL('image/jpeg');
              imagenWebcam.value = dataUrl;
              form.submit();
            };
            video.insertAdjacentElement('afterend', botonCapturar);
          })
          .catch(err => alert("No se pudo acceder a la cámara: " + err));
      }
    }
  </script>


</div>
<?php
include("footer.php");
?>