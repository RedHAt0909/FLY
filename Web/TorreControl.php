<?php
    $title="Torre de Control";
    include("nav.php");
?>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      background: #f4f4f4;
      color: #333;
    }

    header {
      background: linear-gradient(90deg, #c70039, #ff4b5c);
      color: white;
      padding: 20px;
      text-align: center;
    }

    .container {
      max-width: 1200px;
      margin: auto;
      padding: 30px 20px;
    }

    h2 {
      margin-top: 0;
      color: #c70039;
    }

    .stats {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin-bottom: 40px;
    }

    .stat-box {
      flex: 1 1 250px;
      background: white;
      margin: 10px;
      padding: 20px;
      border-left: 6px solid #c70039;
      border-radius: 6px;
      box-shadow: 0 0 8px rgba(0,0,0,0.05);
    }

    .stat-box h3 {
      margin-top: 0;
      color: #444;
    }

    .stat-number {
      font-size: 2em;
      font-weight: bold;
      color: #28a745;
    }

    .flights-table {
      background: white;
      border-radius: 6px;
      padding: 20px;
      box-shadow: 0 0 8px rgba(0,0,0,0.05);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background: #c70039;
      color: white;
    }

    .status-on {
      color: #28a745;
      font-weight: bold;
    }

    .status-delayed {
      color: #dc3545;
      font-weight: bold;
    }

    @media (max-width: 768px) {
      .stats {
        flex-direction: column;
      }
    }
  </style>


  <div class="container">
    <h2>Estadísticas del Día</h2>
    <div class="stats">
      <div class="stat-box">
        <h3>Vuelos Nacionales</h3>
        <div class="stat-number">38</div>
        <p>Operaciones completadas hoy</p>
      </div>
      <div class="stat-box">
        <h3>Vuelos Internacionales</h3>
        <div class="stat-number">17</div>
        <p>Vuelos a destinos globales</p>
      </div>
      <div class="stat-box">
        <h3>Pasajeros Transportados</h3>
        <div class="stat-number">4,560</div>
        <p>Total del día</p>
      </div>
      <div class="stat-box">
        <h3>Tickets Vendidos</h3>
        <div class="stat-number">1,250</div>
        <p>Reservas en las últimas 24 horas</p>
      </div>
    </div>

    <h2>Vuelos Activos</h2>
    <div class="flights-table">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Vuelo</th>
            <th>Origen</th>
            <th>Destino</th>
            <th>Hora Salida</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>AV123</td>
            <td>Bogotá</td>
            <td>Medellín</td>
            <td>08:15</td>
            <td class="status-on">En vuelo</td>
          </tr>
          <tr>
            <td>2</td>
            <td>AV231</td>
            <td>Bogotá</td>
            <td>Miami</td>
            <td>09:30</td>
            <td class="status-on">En vuelo</td>
          </tr>
          <tr>
            <td>3</td>
            <td>AV319</td>
            <td>Cali</td>
            <td>Bogotá</td>
            <td>10:00</td>
            <td class="status-delayed">Retrasado</td>
          </tr>
          <tr>
            <td>4</td>
            <td>AV812</td>
            <td>Cartagena</td>
            <td>Panamá</td>
            <td>10:45</td>
            <td class="status-on">En vuelo</td>
          </tr>
          <tr>
            <td>5</td>
            <td>AV700</td>
            <td>Bogotá</td>
            <td>Lima</td>
            <td>11:20</td>
            <td class="status-on">En vuelo</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

<?php
    include("footer.php");
?>