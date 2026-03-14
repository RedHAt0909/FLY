<?php
  $title="Hoteles";
  include("nav.php");
?>
<style>
  /* ======== ESTILO HERO ======== */


.hero h1 {
  font-size: 2.5rem;
  letter-spacing: 1px;
  animation: fadeInDown 1s ease;
}

.hero h2 {
  font-size: 1.5rem;
  opacity: 0.9;
  animation: fadeInUp 1.2s ease;
}

@keyframes fadeInDown {
  from { transform: translateY(-40px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}

@keyframes fadeInUp {
  from { transform: translateY(40px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}

/* ======== TARJETAS DE HOTELES ======== */
.hotel-card .card {
  border: none;
  border-radius: 20px;
  overflow: hidden;
  transition: all 0.4s ease;
  box-shadow: 0 4px 15px rgba(0,0,0,0.15);
  background-color: #fff;
}

.hotel-card .card:hover {
  transform: translateY(-10px) scale(1.03);
  box-shadow: 0 8px 25px rgba(13,110,253,0.3);
}

/* Imagen con borde redondeado y zoom al pasar el mouse */
.hotel-card img {
  height: 220px;
  object-fit: cover;
  border-radius: 20px 20px 0 0;
  transition: transform 0.5s ease;
}

.hotel-card:hover img {
  transform: scale(1.07);
}

/* Título y texto dentro de la card */
.hotel-card h5 {
  font-weight: 700;
  margin-bottom: 10px;
}

.hotel-card p {
  color: #555;
  font-size: 0.95rem;
}

/* ======== BOTONES ======== */
.btn-danger {
  background: linear-gradient(135deg, #dc3545, #ff4b5c);
  border: none;
  border-radius: 25px;
  transition: all 0.3s ease;
  font-weight: 600;
  box-shadow: 0 3px 10px rgba(220,53,69,0.3);
}

.btn-danger:hover {
  background: linear-gradient(135deg, #ff4b5c, #dc3545);
  transform: scale(1.05);
  box-shadow: 0 5px 15px rgba(220,53,69,0.5);
}

/* ======== FILTROS ======== */
#filtroHoteles select {
  border-radius: 30px;
  border: 2px solid #dc3545;
  transition: all 0.3s ease;
}

#filtroHoteles select:hover {
  border-color: #0d6efd;
  box-shadow: 0 0 8px rgba(13,110,253,0.4);
}

/* ======== EFECTO RESPONSIVE ======== */
@media (max-width: 768px) {
  .hero h1 {
    font-size: 2.3rem;
  }

  .hotel-card img {
    height: 180px;
  }
}

</style>
<br><br>
  <!-- HERO -->
  <section class="hero text-white d-flex align-items-center justify-content-center text-center">
    <div>
      <h1 class="fw-bold text-danger text-center mb-4">Encuentra el Hotel Perfecto </h1>
      <h2 class="text-danger text-center mb-4">para tu vuelo seleccionado</h2>
    </div>
  </section>
  <br><br>

  <!-- FILTROS -->
  <section class="container my-5 mt-auto">
    <form class="row g-3" id="filtroHoteles">
      <div class="col-md-4 col-12">
        <label for="ciudad" class="form-label">Ciudad</label>
        <select id="ciudad" class="form-select">
          <option value="all">Todas</option>
          <option value="cartagena">Cartagena</option>
          <option value="medellin">Medellín</option>
          <option value="cancun">Cancún</option>
          <option value="bogota">Bogotá</option>
          <option value="miami">Miami</option>
          <option value="paris">París</option>
          <option value="tokio">Tokio</option>
        </select>
      </div>
      <div class="col-md-4 col-12">
        <label for="precio" class="form-label">Rango de precio</label>
        <select id="precio" class="form-select">
          <option value="all">Todos</option>
          <option value="low">Menos de $1.000.000</option>
          <option value="medium">$1.000.000 - $2.000.000</option>
          <option value="high">Más de $2.000.000</option>
        </select>
      </div>
      <div class="col-md-4 col-12">
        <label for="estrellas" class="form-label">Categoría</label>
        <select id="estrellas" class="form-select">
          <option value="all">Todas</option>
          <option value="3">3 estrellas</option>
          <option value="4">4 estrellas</option>
          <option value="5">5 estrellas</option>
        </select>
      </div>
    </form>
  </section>

  <!-- LISTA DE HOTELES -->
  <section id="hoteles" class="container py-4">
    <div class="row g-4">

      <!-- Hotel 1 -->
      <div class="col-sm-12 col-md-6 col-lg-4 hotel-card" data-ciudad="cartagena" data-precio="medium" data-estrellas="5">
        <div class="card h-100">
          <img src="../Img/hotelcaribe.jpeg" class="card-img-top" alt="Hotel Caribe">
          <div class="card-body d-flex flex-column">
            <h5 class="text-danger">Hotel Caribe (5★)</h5>
            <p>Cartagena - Frente al mar, incluye vuelos ida y regreso.</p>
            <p><strong>$1.200.000 COP</strong></p>
            <button class="btn btn-danger mt-auto" onclick="window.location.href='Compra.php'">Reservar ahora</button>
          </div>
        </div>
      </div>

      <!-- Hotel 2 -->
      <div class="col-sm-12 col-md-6 col-lg-4 hotel-card" data-ciudad="medellin" data-precio="low" data-estrellas="3">
        <div class="card h-100">
          <img src="../Img/hotelmontaña.jpeg" class="card-img-top" alt="Hotel Montaña">
          <div class="card-body d-flex flex-column">
            <h5 class="text-danger">Hotel Montaña (3★)</h5>
            <p>Medellín - Rodeado de naturaleza, incluye transporte.</p>
            <p><strong>$900.000 COP</strong></p>
            <button class="btn btn-danger mt-auto" onclick="window.location.href='Compra.php'">Reservar ahora</button>
          </div>
        </div>
      </div>

      <!-- Hotel 3 -->
      <div class="col-sm-12 col-md-6 col-lg-4 hotel-card" data-ciudad="cancun" data-precio="high" data-estrellas="5">
        <div class="card h-100">
          <img src="../Img/mejor-hotel-de-Cancun.jpg" class="card-img-top" alt="Hotel Internacional">
          <div class="card-body d-flex flex-column">
            <h5 class="text-danger">Hotel Internacional (5★)</h5>
            <p>Cancún - Todo incluido con vuelos y comidas.</p>
            <p><strong>$3.500.000 COP</strong></p>
            <button class="btn btn-danger mt-auto" onclick="window.location.href='Compra.php'">Reservar ahora</button>
          </div>
        </div>
      </div>

      <!-- Hotel 4 -->
      <div class="col-sm-12 col-md-6 col-lg-4 hotel-card" data-ciudad="bogota" data-precio="medium" data-estrellas="4">
        <div class="card h-100">
          <img src="../Img/hotelcapital.jpg" class="card-img-top" alt="Hotel Capital">
          <div class="card-body d-flex flex-column">
            <h5 class="text-danger">Hotel Capital (4★)</h5>
            <p>Bogotá - En el centro de la ciudad, incluye vuelos nacionales.</p>
            <p><strong>$1.800.000 COP</strong></p>
           <button class="btn btn-danger mt-auto" onclick="window.location.href='Compra.php'">Reservar ahora</button>
          </div>
        </div>
      </div>

      <!-- Hotel 5 -->
      <div class="col-sm-12 col-md-6 col-lg-4 hotel-card" data-ciudad="miami" data-precio="high" data-estrellas="5">
        <div class="card h-100">
          <img src="../Img/hotelmiami.jpeg" class="card-img-top" alt="Hotel Ocean View">
          <div class="card-body d-flex flex-column">
            <h5 class="text-danger">Hotel Ocean View (5★)</h5>
            <p>Miami - Frente a la playa con desayuno incluido.</p>
            <p><strong>$4.200.000 COP</strong></p>
          <button class="btn btn-danger mt-auto" onclick="window.location.href='Compra.php'">Reservar ahora</button>
          </div>
        </div>
      </div>

      <!-- Hotel 6 -->
      <div class="col-sm-12 col-md-6 col-lg-4 hotel-card" data-ciudad="cartagena" data-precio="low" data-estrellas="4">
        <div class="card h-100">
          <img src="../Img/hotelcartagena.jpg" class="card-img-top" alt="Hotel Colonial">
          <div class="card-body d-flex flex-column">
            <h5 class="text-danger">Hotel Colonial (4★)</h5>
            <p>Cartagena - Estilo colonial con vuelos incluidos.</p>
            <p><strong>$950.000 COP</strong></p>
        <button class="btn btn-danger mt-auto" onclick="window.location.href='Compra.php'">Reservar ahora</button>
          </div>
        </div>
      </div>

      <!-- Hotel 7 -->
      <div class="col-sm-12 col-md-6 col-lg-4 hotel-card" data-ciudad="paris" data-precio="high" data-estrellas="5">
        <div class="card h-100">
          <img src="../Img/hotelparis.jpeg" class="card-img-top" alt="Hotel Eiffel">
          <div class="card-body d-flex flex-column">
            <h5 class="text-danger">Hotel Eiffel (5★)</h5>
            <p>París - Con vista a la Torre Eiffel y vuelos incluidos.</p>
            <p><strong>$5.000.000 COP</strong></p>
           <button class="btn btn-danger mt-auto" onclick="window.location.href='Compra.php'">Reservar ahora</button>
          </div>
        </div>
      </div>

      <!-- Hotel 8 -->
      <div class="col-sm-12 col-md-6 col-lg-4 hotel-card" data-ciudad="tokio" data-precio="high" data-estrellas="5">
        <div class="card h-100">
          <img src="../Img/hoteljapon.jpg" class="card-img-top" alt="Hotel Sakura">
          <div class="card-body d-flex flex-column">
            <h5 class="text-danger">Hotel Sakura (5★)</h5>
            <p>Tokio - Paquete completo con vuelos internacionales.</p>
            <p><strong>$6.200.000 COP</strong></p>
         <button class="btn btn-danger mt-auto" onclick="window.location.href='Compra.php'">Reservar ahora</button>
          </div>
        </div>
      </div>

      <!-- Hotel 9 -->
      <div class="col-sm-12 col-md-6 col-lg-4 hotel-card" data-ciudad="paris" data-precio="medium" data-estrellas="4">
        <div class="card h-100">
          <img src="../Img/hotelparis2.jpg" class="card-img-top" alt="Hotel Louvre">
          <div class="card-body d-flex flex-column">
            <h5 class="text-danger">Hotel Louvre (4★)</h5>
            <p>París - Cerca del museo, con vuelos incluidos.</p>
            <p><strong>$2.300.000 COP</strong></p>
         <button class="btn btn-danger mt-auto" onclick="window.location.href='Compra.php'">Reservar ahora</button>
          </div>
        </div>
      </div>

      <!-- Hotel 10 -->
      <div class="col-sm-12 col-md-6 col-lg-4 hotel-card" data-ciudad="tokio" data-precio="medium" data-estrellas="4">
        <div class="card h-100">
          <img src="../Img/hoteljapon2.jpeg" class="card-img-top" alt="Hotel Zen">
          <div class="card-body d-flex flex-column">
            <h5 class="text-danger">Hotel Zen (4★)</h5>
            <p>Tokio - Con spa tradicional y vuelos incluidos.</p>
            <p><strong>$2.800.000 COP</strong></p>
          <button class="btn btn-danger mt-auto" onclick="window.location.href='Compra.php'">Reservar ahora</button>
          </div>
        </div>
      </div>

      <!-- Hotel 11 -->
      <div class="col-sm-12 col-md-6 col-lg-4 hotel-card" data-ciudad="miami" data-precio="medium" data-estrellas="4">
        <div class="card h-100">
          <img src="../Img/hotelmiami2.jpg" class="card-img-top" alt="Hotel Downtown">
          <div class="card-body d-flex flex-column">
            <h5 class="text-danger">Hotel Downtown (4★)</h5>
            <p>Miami - En el centro de la ciudad, incluye vuelos.</p>
            <p><strong>$1.950.000 COP</strong></p>
            <button class="btn btn-danger mt-auto" onclick="window.location.href='Compra.php'">Reservar ahora</button>
          </div>
        </div>
      </div>

      <!-- Hotel 12 -->
      <div class="col-sm-12 col-md-6 col-lg-4 hotel-card" data-ciudad="bogota" data-precio="low" data-estrellas="3">
        <div class="card h-100">
          <img src="../Img/hotelandino.jpg" class="card-img-top" alt="Hotel Andino">
          <div class="card-body d-flex flex-column">
            <h5 class="text-danger">Hotel Andino (3★)</h5>
            <p>Bogotá - Económico y práctico, con vuelos nacionales.</p>
            <p><strong>$750.000 COP</strong></p>
            <button class="btn btn-danger mt-auto" onclick="window.location.href='Compra.php'">Reservar ahora</button>
          </div>
        </div>
      </div>

    </div>
  </section>

  <?php
    include("footer.php");
  ?>

  <!-- Script filtros -->
  <script>
    const filtros = document.querySelectorAll('#filtroHoteles select');
    const hoteles = document.querySelectorAll('.hotel-card');

    filtros.forEach(f => f.addEventListener('change', () => {
      const ciudad = document.getElementById('ciudad').value;
      const precio = document.getElementById('precio').value;
      const estrellas = document.getElementById('estrellas').value;

      hoteles.forEach(hotel => {
        const okCiudad = (ciudad === "all" || hotel.dataset.ciudad === ciudad);
        const okPrecio = (precio === "all" || hotel.dataset.precio === precio);
        const okEstrellas = (estrellas === "all" || hotel.dataset.estrellas === estrellas);

        hotel.style.display = (okCiudad && okPrecio && okEstrellas) ? "block" : "none";
      });
    }));
  </script>
