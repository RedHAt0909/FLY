<?php
$title = "Mapa de Vuelo";
include("nav.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulación de Aviones en el Mapa</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Roboto:wght@400&display=swap" rel="stylesheet">
    <style>
        /* --- Estilos del mapa --- */
        #map {
            height: 80vh; /* más pequeño para dejar espacio a los botones */
            width: 100%;
        }

        .title {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            color: #e70000ff;
            font-size: 3em;
            margin-top: 5px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .subtitle {
            font-family: 'Roboto', sans-serif;
            text-align: center;
            color: #eb0707ff;
            font-size: 1.2em;
            font-weight: 300;
        }

        .cont {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        /* --- Botones debajo del mapa --- */
        .bottom-buttons {
            text-align: center;
            margin: 30px 0 60px 0;
        }

        .bottom-buttons button {
            background-color: #e70000ff;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 30px;
            margin: 0 15px;
            font-family: 'Poppins', sans-serif;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
        }

        .bottom-buttons button:hover {
            background-color: #ff2b2b;
            transform: translateY(-2px);
            box-shadow: 0px 6px 14px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <br>
    <div class="cont">
        <div class="title">Mapa de Vuelo</div>
        <div class="subtitle">Seguimiento de vuelos en tiempo real</div><br>
    </div>

    <div id="map"></div>

    <!-- Botones debajo del mapa -->
    <div class="bottom-buttons">
        <button onclick="window.location.href='../Web/Pilotos.php'">
            <i class="bi bi-person-badge"></i> Ver Pilotos
        </button>
        <button onclick="window.location.href='../Web/Compra.php'">
            <i class="bi bi-cart-fill"></i> Comprar
        </button>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.0/gsap.min.js"></script>

    <script>
        // Crear mapa
        var map = L.map('map').setView([0, 0], 2);

        // Capa base
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Rutas de ejemplo
        var routes = [
            [[40.7128, -74.0060], [51.5074, -0.1278]],
            [[48.8566, 2.3522], [34.0522, -118.2437]],
            [[35.6762, 139.6503], [-33.8688, 151.2093]],
            [[37.7749, -122.4194], [55.7558, 37.6176]],
            [[40.7306, -73.9352], [39.9042, 116.4074]]
        ];

        // Ícono de avión
        var airplaneIcon = L.divIcon({
            className: 'airplane-icon',
            html: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-airplane-fill" viewBox="0 0 16 16"><path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849"/></svg>'
        });

        // Animación
        function animateAirplane(route, airplaneMarker) {
            var i = 0;
            function move() {
                gsap.to(airplaneMarker.getLatLng(), {
                    duration: 10,
                    lat: route[i + 1][0],
                    lng: route[i + 1][1],
                    onUpdate: function() {
                        airplaneMarker.setLatLng(airplaneMarker.getLatLng());
                    },
                    onComplete: function() {
                        i++;
                        if (i < route.length - 1) move();
                        else { i = 0; move(); }
                    }
                });
            }
            move();
        }

        // Crear y animar aviones
        routes.forEach(function(route) {
            var airplaneMarker = L.marker(route[0], { icon: airplaneIcon }).addTo(map);
            animateAirplane(route, airplaneMarker);
        });
    </script>
</body>

</html>
<?php
include("footer.php");
?>
