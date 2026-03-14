<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/boot.css">
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--LETRAS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Inline:opsz,wght@10..72,100..900&family=DM+Serif+Text:ital@0;1&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Inline:opsz,wght@10..72,100..900&family=DM+Serif+Text:ital@1&family=Montserrat+Underline:ital,wght@1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title><?php echo isset($title) ? $title : "Document"; ?></title>
    <link rel="icon" href="../Img/FlySaverLOG.jpg" type="image/jpg">
</head>

<body style="font-family: 'Arial', sans-serif; background-color: #f4f4f4;  height: 100vh;">
    <style>
        /* ======== MARQUESINA ======== */
        .marquesina-container {
            width: 150px;
            /* ancho del área visible */
            overflow: hidden;
            white-space: nowrap;
            margin-left: 10px;
            border-left: 2px solid rgba(255, 255, 255, 0.4);
            padding-left: 8px;
            margin-right: 8px;
        }

        .marquesina-text {
            display: inline-block;
            animation: moverTexto 8s linear infinite;
            color: black;
            font-weight: 700;
            letter-spacing: 2px;
            font-family: "Montserrat", sans-serif;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
        }

        @keyframes moverTexto {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
    <div class="row"><!--Nav-->
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-danger NAV"><!-- Navbar -->

                <a class="navbar-brand" href="../Web/index.php">
                    <img src="../Img/FlySaverLOG.jpg" alt="Logo" style="width: 115px; height: 50px; border-radius: 18px;"
                        title="Logo FLY-SAVER">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <!-- Enlace que abre el modal -->
                        <li class="nav-item">
                            <a class="nav-link dm-serif-text-regular" href="#" data-toggle="modal" data-target="#infoModal">
                                Información
                            </a>
                        </li>

                        <!-- Modal de Información -->
                        <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">

                                    <!-- Encabezado -->
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="infoModalLabel">✈️ Información de Vuelos FLY-SAVER</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <!-- Cuerpo -->
                                    <div class="modal-body" style="font-family: 'Montserrat', sans-serif;">
                                        <p style="font-size: 1.1rem;">
                                            En FLY-SAVER, trabajamos para ofrecerte la mejor experiencia en el aire. 🌍
                                            Contamos con rutas nacionales e internacionales con los mejores precios del mercado.
                                            ¡Tu comodidad y seguridad son nuestra prioridad!
                                        </p>

                                        <hr>

                                        <h6 class="text-danger font-weight-bold">🕓 Horarios destacados:</h6>
                                        <ul>
                                            <li>Bogotá → Medellín: 06:00 AM - 07:10 AM</li>
                                            <li>Medellín → Cartagena: 09:30 AM - 11:00 AM</li>
                                            <li>Bogotá → Miami: 01:00 PM - 05:45 PM</li>
                                        </ul>

                                        <h6 class="text-danger font-weight-bold">💺 Servicios a bordo:</h6>
                                        <ul>
                                            <li>Snacks y bebidas incluidas en todos los vuelos</li>
                                            <li>Entretenimiento en pantalla individual</li>
                                            <li>Wi-Fi gratuito en vuelos internacionales</li>
                                        </ul>

                                        <div class="alert alert-info mt-3">
                                            🌤️ <strong>Tip:</strong> Revisa el estado de tu vuelo en tiempo real desde tu cuenta de usuario.
                                        </div>
                                    </div>

                                    <!-- Pie -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <li class="nav-item">
                            <a class="nav-link dm-serif-text-regular" href="../Web/servicioenlinea.php">Servicio en Linea</a>
                        </li>
                    </ul>

                    <!-- Botón de idioma a la derecha -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <button id="Btn-Idioma" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><!--boton idioma-->
                                <img src="../Img/BanderaCol.png" alt="" class="Bandera">
                            </button>
                        </li>

                        <li class="nav-item d-flex align-items-center">
                            <div class="marquesina-container">
                                <span class="marquesina-text">✈️ FLY-SARVER ✈️</span>
                            </div>
                        </li>


                        <!-- Modal para la barra de búsqueda******** -->
                        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <img src="../Img/FlySaverLOG.jpg" alt=""
                                            style="width: 40px; height: 40px; border-radius: 3px;">
                                        <h5 class="modal-title" id="searchModalLabel"
                                            style="margin-top: 4px; padding-left: 4px;">Buscar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="d-flex">
                                            <input class="form-control me-2" type="search" placeholder="Buscar..."
                                                aria-label="Search">
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#searchModal"
                                                style="border: none; background: none; color: black;">
                                                Search
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <li>
                            <button type="button" class="btn btn-primary" style="border: none; background: none; color: black;" onclick="window.location.href='usuario.php'">
                                Usuario
                                <svg style="margin-left: 5px; justify-content: center;"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-square" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path
                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                </svg>
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>