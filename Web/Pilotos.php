<?php
$title="Pilotos";
include("nav.php");
?>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #2c3e50;
  }

  h1 {
    text-align: center;
    margin-bottom: 40px;
    color: #2c2c2cff;
    font-weight: bold;
    text-shadow: 2px 2px 6px rgba(255, 9, 9, 0.86);
  }

  .card {
    border: none;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
    transition: all 0.4s ease;
    opacity: 0;
    transform: translateY(30px) scale(0.9);
    animation: fadeUp 0.8s forwards;

    /* 🔹 Uniformar tamaño */
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .card-body {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .card:hover {
    transform: scale(1.07);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
  }

  .foto {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #2ecc71;
    cursor: pointer;
    transition: all 0.3s ease;
    margin: 0 auto;
  }

  .foto:hover {
    transform: scale(1.2) rotate(-3deg);
    box-shadow: 0 0 20px rgba(46, 204, 113, 0.8);
  }

  .stars {
    color: #f1c40f;
    font-size: 1.3em;
  }

  @keyframes fadeUp {
    to {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
  }

  /* 🔹 Forzar altura uniforme entre cards */
  .row > .col-md-4 {
    display: flex;
  }

  .card.text-center {
    width: 100%;
    min-height: 350px; /* Puedes ajustar este valor para más o menos alto */
  }

  /* Modal elegante */
  .modal-content {
    background: linear-gradient(135deg, #ffffff, #e6f7ff);
    border-radius: 20px;
    border: none;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
    animation: zoomEffect 0.5s;
  }

  .modal-img {
    max-width: 80%;
    max-height: 60vh;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.6);
    transition: transform 0.3s ease;
  }

  .modal-img:hover {
    transform: scale(1.05);
  }

  @keyframes zoomEffect {
    from {
      transform: scale(0.7);
      opacity: 0;
    }

    to {
      transform: scale(1);
      opacity: 1;
    }
  }
</style>

<?php
include("conexion.php");
$resultado_consulta = mysqli_query($con, "SELECT * FROM pilotos");

$pilotos = [];
if (mysqli_num_rows($resultado_consulta) > 0) {
  while ($row = mysqli_fetch_assoc($resultado_consulta)) {
    $pilotos[] = $row;
  }
}
?>

<div class="container py-5">
  <h1>👨‍✈️ Pilotos de la Empresa</h1>
  <div class="row">
    <?php foreach ($pilotos as $index => $p): ?>
      <div class="col-md-4 mb-4 d-flex">
        <div class="card text-center w-100" style="animation-delay: <?php echo $index * 0.15; ?>s;">
          <div class="card-body">
            <img src="<?php echo $p['foto']; ?>" alt="<?php echo $p['nombre']; ?>"
              class="foto mb-3" data-bs-toggle="modal" data-bs-target="#imgModal"
              onclick="mostrarImagen('<?php echo $p['foto']; ?>', '<?php echo $p['nombre']; ?>', '<?php echo $p['calificacion']; ?>', '<?php echo $p['comentario']; ?>')">
            <h5 class="card-title"><?php echo $p['nombre']; ?></h5>
            <p class="stars">
              <?php for ($i = 0; $i < $p['calificacion']; $i++): ?>⭐<?php endfor; ?>
              (<?php echo $p['calificacion']; ?>/5)
            </p>
            <p class="text-muted"><?php echo $p['comentario']; ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="imgModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">
      <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      <img id="modalImage" class="modal-img mb-3" src="" alt="">
      <h4 id="modalTitle" class="fw-bold"></h4>
      <p id="modalStars" class="stars mb-2"></p>
      <p id="modalComment" class="text-muted"></p>
    </div>
  </div>
</div>

<script>
  function mostrarImagen(src, nombre, calificacion, comentario) {
    document.getElementById('modalImage').src = src;
    document.getElementById('modalTitle').innerText = nombre;
    document.getElementById('modalStars').innerHTML = "⭐".repeat(calificacion) + ` (${calificacion}/5)`;
    document.getElementById('modalComment').innerText = comentario;
  }
</script>

<?php
include("footer.php");
?>
