<?php
    $title="Empresario";
    include("nav.php");
?> 

  <style>
    body{
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    nav{
      background-color: #c8102e;
    }
    nav a{
      color: white !important;
      font-weight: bold;
    }
    .hero{
      background-color: #fff;
      padding: 40px 0;
      text-align: center;
    }
    .hero h1{
      color: #c8102e;
      font-size: 2rem;
    }
    .buscador{
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      max-width: 800px;
      margin: 0 auto;
    }
    .btn-rojo{
      background-color: #c8102e;
      color: white;
      border: none;
    }
    .btn-rojo:hover{
      background-color: #a30d24;
    }
    footer{
      background-color: #111;
      color: white;
      text-align: center;
      padding: 20px 0;
      margin-top: 50px;
    }
  </style>




 <!-- Hero principal -->
<section class="hero bg-light py-5" id="inicio">
  <div class="container text-center">
    <h1 class="display-4 fw-bold text-primary">Fly Saver Corporativo</h1>
    <p class="lead text-secondary">Gestiona los viajes de tu equipo con descuentos especiales y soporte dedicado.</p>
    <a href="#buscador" class="btn btn-primary btn-lg mt-3">Planear viaje empresarial</a>
  </div>
</section>

<!-- Buscador de vuelos corporativos -->
<section class="py-5" id="buscador">
  <div class="container">
    <h3 class="text-center text-primary mb-4" style="color: #c8102e;">Reserva para tu empresa</h3>
    <form class="card p-4 shadow-sm" id="formVuelos">
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Origen</label>
          <input type="text" class="form-control" placeholder="Ciudad de origen" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Destino</label>
          <input type="text" class="form-control" placeholder="Ciudad de destino" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Fecha de salida</label>
          <input type="date" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Fecha de regreso</label>
          <input type="date" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Tipo de viaje</label>
          <select class="form-select" id="tipoViaje">
            <option value="vacaciones">Vacaciones</option>
            <option value="negocios" selected>Negocios</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Aerolínea preferida</label>
          <select class="form-select">
            <option>Fly Saver</option>
            <option>Avianca</option>
            <option>LATAM</option>
            <option>Air France</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Número de empleados</label>
          <input type="number" class="form-control" id="numEmpleados" min="1" value="1" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Descuento estimado</label>
          <input type="text" class="form-control" id="descuento" readonly value="0%">
        </div>
        <div class="col-12 text-center mt-3">
          <button type="submit" class="btn btn-primary btn-lg" onclick="window.location.href='../Web/Compra.php'">Buscar vuelos</button>
        </div>
      </div>
    </form>

    <!-- Resumen dinámico -->
    <div class="card mt-4 p-3 shadow-sm" id="resumen" style="display:none;">
      <h5 class="fw-semibold text-primary">Resumen de tu reserva</h5>
      <p id="resumenTexto"></p>
    </div>
  </div>
</section>

<!-- Beneficios corporativos -->
<section class="py-5 bg-primary text-white" id="servicios">
  <div class="container text-center">
    <h3 class="mb-4 fw-bold">Beneficios para tu empresa</h3>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card bg-white text-dark p-4 h-100 shadow-sm">
          <h5 class="fw-semibold">Vuelos corporativos</h5>
          <p>Gestiona viajes de empleados con flexibilidad y comodidad.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card bg-white text-dark p-4 h-100 shadow-sm">
          <h5 class="fw-semibold">Descuentos por volumen</h5>
          <p>Recibe tarifas especiales al reservar varios vuelos al mismo tiempo.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card bg-white text-dark p-4 h-100 shadow-sm">
          <h5 class="fw-semibold">Soporte dedicado</h5>
          <p>Asistencia personalizada para que todo el viaje sea perfecto.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Script para descuentos dinámicos y resumen -->
<script>
  const numEmpleadosInput = document.getElementById('numEmpleados');
  const descuentoInput = document.getElementById('descuento');
  const formVuelos = document.getElementById('formVuelos');
  const resumen = document.getElementById('resumen');
  const resumenTexto = document.getElementById('resumenTexto');

  numEmpleadosInput.addEventListener('input', () => {
    const num = parseInt(numEmpleadosInput.value) || 1;
    let descuento = 0;
    if(num >= 5 && num < 10) descuento = 5;
    else if(num >= 10 && num < 20) descuento = 10;
    else if(num >= 20) descuento = 15;
    descuentoInput.value = descuento + '%';
  });

  formVuelos.addEventListener('submit', (e) => {
    e.preventDefault();
    const origen = formVuelos[0].value;
    const destino = formVuelos[1].value;
    const salida = formVuelos[2].value;
    const regreso = formVuelos[3].value || 'Solo ida';
    const tipo = formVuelos[4].value;
    const aerolinea = formVuelos[5].value;
    const num = numEmpleadosInput.value;
    const desc = descuentoInput.value;

    resumenTexto.innerHTML = `
      Origen: <strong>${origen}</strong><br>
      Destino: <strong>${destino}</strong><br>
      Fecha de salida: <strong>${salida}</strong><br>
      Fecha de regreso: <strong>${regreso}</strong><br>
      Tipo de viaje: <strong>${tipo}</strong><br>
      Aerolínea: <strong>${aerolinea}</strong><br>
      Número de empleados: <strong>${num}</strong><br>
      Descuento aplicado: <strong>${desc}</strong>
    `;
    resumen.style.display = 'block';
  });
</script>

<?php
    include("footer.php");
?>  