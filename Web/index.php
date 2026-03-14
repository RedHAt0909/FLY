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
    <title>FLY-SAVER</title>
    <link rel="icon" href="../Img/FlySaverLOG.jpg" type="image/jpg">
</head>
<style>
    .btn-horario {
        background: linear-gradient(135deg, #74b9ff, #0984e3);
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 12px;
        padding: 12px 20px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-horario:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(9, 132, 227, 0.6);
        background: linear-gradient(135deg, #0984e3, #74b9ff);
    }

    .modal-content {
        background: linear-gradient(145deg, #f9f9f9, #e3f2fd);
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        animation: popUp 0.5s ease;
    }

    @keyframes popUp {
        from {
            transform: scale(0.8);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    .table th {
        background: #0d6efd !important;
        color: white;
        border: none;
    }

    .table td {
        background: rgba(255, 255, 255, 0.7);
    }

    .badge {
        padding: 8px 10px;
        border-radius: 10px;
    }

    /* Fondo oscuro semitransparente del modal */
    /* 🎛️ Estilo específico para el modal del Tablero de Vuelo */
    .tablero-content {
        background: linear-gradient(145deg, #ffffff, #f6f9fc);
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(255, 77, 77, 0.25);
        border-top: 6px solid #ff4b2b;
        transition: all 0.4s ease;
    }

    .tablero-content:hover {
        transform: translateY(-3px);
    }

    /* Encabezado */
    .tablero-content h2 {
        background: linear-gradient(90deg, #ff4b2b, #ff416c);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 800;
        letter-spacing: 1px;
    }

    /* Indicadores estilo tablero */
    .tablero {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .indicador {
        background: rgba(255, 255, 255, 0.7);
        border-radius: 15px;
        padding: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: all 0.3s ease;
    }

    .indicador:hover {
        transform: scale(1.03);
        background: #ffffff;
        box-shadow: 0 6px 16px rgba(255, 75, 43, 0.25);
    }

    .indicador h5 {
        color: #333;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .barra {
        width: 100%;
        height: 12px;
        background: #e9ecef;
        border-radius: 6px;
        overflow: hidden;
        margin-bottom: 8px;
    }

    .nivel {
        height: 100%;
        border-radius: 6px;
        transition: width 0.5s ease;
    }

    /* Estado de vuelo */
    .estado-vuelo {
        background: linear-gradient(135deg, #ff4b2b, #ff416c);
        border-radius: 15px;
        padding: 25px;
        color: #fff;
        box-shadow: 0 4px 18px rgba(255, 75, 43, 0.4);
    }

    .estado-vuelo .badge {
        background: #ffffff;
        color: #28a745;
        font-weight: bold;
        box-shadow: 0 3px 6px rgba(255, 255, 255, 0.3);
    }

    /* Animación de aparición */
    .tablero-content {
        animation: fadeUp 0.6s ease;
    }

    @keyframes fadeUp {
        from {
            transform: translateY(30px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Botón de cierre */
    .tablero-content .btn-close {
        filter: invert(0.5);
        transition: 0.3s;
    }

    .tablero-content .btn-close:hover {
        filter: invert(0);
        transform: rotate(90deg);
    }

    .btn-servicios {
        background: linear-gradient(135deg, #ff7675, #fab1a0);
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 12px;
        padding: 12px 20px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-servicios:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 118, 117, 0.6);
        background: linear-gradient(135deg, #fab1a0, #ff7675);
    }

    /* Modal */
    .servicios-content {
        background: linear-gradient(135deg, #ff7675, #d63031);
        color: #fff;
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
        animation: fadeUp 0.6s ease;
    }

    @keyframes fadeUp {
        from {
            transform: translateY(30px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Tarjetas de servicios */
    .servicio-card {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
    }

    .servicio-card:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-5px);
    }

    .servicio-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 10px;
        transition: transform 0.3s ease;
    }

    .servicio-card:hover .servicio-icon {
        transform: scale(1.1);
    }

    .precio {
        display: block;
        margin-top: 10px;
        font-weight: bold;
        color: #ffeaa7;
        font-size: 1.1em;
    }

    /* Fondo del modal */
    .modal-backdrop.show {
        background: rgba(0, 0, 0, 0.6);
    }
</style>

<body>
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
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#searchModal"
                                style="border: none; background: none; color: black; margin-right: 5px;">
                                Search<svg style="margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
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
                        <li class="nav-item"><!-- Button trigger modal Iniciar sesion -->
                            <!-- Button trigger modal Iniciar sesion -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal1" style="border: none; background: none; color: black;">
                                Iniciar Sesion<svg style="margin-left: 5px; justify-content: center;"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-square" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path
                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                </svg>
                            </button>
                            <!-- Modal inicio Sesion -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="display: flex;">
                                            <img src="../Img/FlySaverLOG.jpg" alt="" title="Logo Fly"
                                                style="width: 80px; height: 80px; border-radius: 5px">
                                            <h1 style="margin-left: 22%; margin-top: 5%;" class="modal-title fs-5"
                                                id="exampleModalLabel">Iniciar Sesión</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="login.php">
                                                <div class="form-group">
                                                    <label for="usuario">Usuario</label>
                                                    <input type="text" class="form-control" id="usuario" name="usuario"
                                                        placeholder="Ingresa tu usuario" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="contraseña">Contraseña</label>
                                                    <input type="password" class="form-control" id="contraseña" name="contrasena"
                                                        placeholder="Ingresa tu contraseña" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="confirmarContraseña">Confirmar Contraseña</label>
                                                    <input type="password" class="form-control" id="confirmarContraseña"
                                                        placeholder="Confirma tu contraseña" required>
                                                </div>
                                                <div id="terminos&condiciones">
                                                    <input type="checkbox" id="T&C" required>
                                                    <label for="T&C">Acepta T&C</label>
                                                </div>

                                                <input type="submit" value="INGRESAR" class="btn  btn-primary"
                                                    id="confirmacion"
                                                    style="margin-left: 40%;">
                                            </form>

                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <!-- Enlaces -->
                                            <div class="d-flex align-items-center" id="link">
                                                <a href="../Web/Registro.php" class="text-primary">Crear Cuenta</a> |
                                                <a href="recuperar_contrasena.php" class="text-primary" style="margin-left: 4px;">Recuperar
                                                    Contraseña</a>
                                            </div>

                                            <!-- Botones -->
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                    style="margin-right: 5px;">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="row"><!-- Modal Idioma del-->
        <div class="col-12">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"
                                style="font-weight: bolder; text-align: center; margin-left: 35%;">
                                Seleccione Idioma</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p style="display: flex; text-align: justify; font-weight: bold;">Selecciona el idioma en el
                                que
                                deseas navegar para que la página se adapte a tu preferencia, ofreciéndote una mejor
                                comprensión
                                y comodidad mientras exploras nuestros servicios. Elige el idioma de tu preferencia de
                                la lista
                                a continuación</p>
                            <select class="form-select" aria-label="Default select example"><!--Seleccion idoma-->
                                style="width: 80%; height: auto; margin-left: 8%;">
                                <option selected>Español</option>
                                <option value="1">Ingles </option>
                                <option value="2">Aleman </option>
                                <option value="3">Frances </option>
                            </select>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary-emphasis"
                                data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary-emphasis">Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row"><!--cContenido de presentacion INICIO-->
        <div class="col-12">
            <div class="Cont-Presentacion"><!--cContenido de presentacion INICIO-->
                <h1 style="margin-left: 41%;" id="titulito">FLY - SAVER</h1>
                <form class="form-horizontal"><!--formulario horizontal-->
                    <input type="text" id="dato1" name="dato1" placeholder="Usuario" class="Campos-Formu">
                    <label for="dato2">Partida</label>
                    <input type="datetime-local" id="dato2" name="dato2" class="Campos-Formu">
                    <label for="dato3">Llegada</label>
                    <input type="datetime-local" id="dato3" name="dato3" placeholder="Llegada" class="Campos-Formu">
                    <input type="number" id="dato4" name="dato4" placeholder="# Pasajeros" class="Campos-Formu">
                    <input type="number" id="dato5" name="dato5" placeholder="# Niños" class="Campos-Formu">

                    <!--Boton que muestra los datos guardados en el formulario horizontal por medio del MODAL-->
                    <button type="button" class="btn btn-primary" id="mostrarDatosBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border-radius: 8px; border-right: none; border: none; background-color: rgba(255, 0, 0, 1); color: white; text-align: center; height: 100%; width: 100%; font-weight: bolder;"> Simular Compra
                    </button>
                    <!--MODAL-->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="display: flex;">
                                    <img src="../Img/FlySaverLOG.jpg" alt="" style="width: 50px; height: 50px; border-radius: 8px;">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel" style="margin-left: 25%; margin-top: 15px;">Datos Ingresados..</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p style="text-align: justify; color: black;">Segun estos datos personales <strong>ingresados</strong> te recomendaremos diferentes destinos para que vueles <strong>SEGURO!</strong></p>
                                    <ul type="circle">
                                        <li id="MostrarUsuario">Usuario</li>
                                        <li id="MostrarPartida">Partida</li>
                                        <li id="MostrarLlegada">Llegada</li>
                                        <li id="MostrarPasajeros">Pasajeros</li>
                                        <li id="MostrarNinos">Niños</li>
                                        <li id="MostrarPrecio">Precio</li>
                                    </ul>

                                </div>
                                <div class="modal-footer" style="display: flex; text-align: center; justify-content: center; align-items: center;">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 100px;">Cerrar</button>
                                    <a href="../Web/Registro.php">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Continuar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="servicios"><!--Botones de services-->
                    <button type="button" onclick="window.location.href='../Web/MapaVuelo.php'">Mapa de Vuelo
                        <svg style="margin-left: 130px; color: rgb(113, 113, 113);" xmlns="http://www.w3.org/2000/svg"
                            width="26" height="26" fill="currentColor" class="bi bi-arrow-right-short"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                        </svg>
                    </button>
                    <!-- BOTÓN -->
                    <button type="button" class="btn-horario" data-bs-toggle="modal" data-bs-target="#horarioModal">
                        Horario de Vuelo
                        <svg style="margin-left: 110px; color: rgb(113, 113, 113);" xmlns="http://www.w3.org/2000/svg"
                            width="26" height="26" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                        </svg>
                    </button>

                    <!-- MODAL -->
                    <div class="modal fade" id="horarioModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content p-4">

                                <h2 class="text-center mb-4 fw-bold text-primary">🕒 Horarios de Vuelo</h2>

                                <div class="table-responsive">
                                    <table class="table align-middle text-center">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Vuelo</th>
                                                <th>Origen</th>
                                                <th>Destino</th>
                                                <th>Salida</th>
                                                <th>Llegada</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>FS101</td>
                                                <td>Medellín</td>
                                                <td>Bogotá</td>
                                                <td>08:30 AM</td>
                                                <td>09:45 AM</td>
                                                <td><span class="badge bg-success">A tiempo</span></td>
                                            </tr>
                                            <tr>
                                                <td>FS204</td>
                                                <td>Bogotá</td>
                                                <td>Cartagena</td>
                                                <td>10:15 AM</td>
                                                <td>11:55 AM</td>
                                                <td><span class="badge bg-warning text-dark">Embarcando</span></td>
                                            </tr>
                                            <tr>
                                                <td>FS305</td>
                                                <td>Medellín</td>
                                                <td>Miami</td>
                                                <td>01:00 PM</td>
                                                <td>05:30 PM</td>
                                                <td><span class="badge bg-danger">Retrasado</span></td>
                                            </tr>
                                            <tr>
                                                <td>FS412</td>
                                                <td>Cali</td>
                                                <td>Madrid</td>
                                                <td>07:45 PM</td>
                                                <td>12:10 PM</td>
                                                <td><span class="badge bg-success">A tiempo</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <p class="text-center mt-3 text-muted fst-italic">
                                    ✈️ Información actualizada en tiempo real por el sistema Fly-Saver.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- BOTÓN -->
                    <button type="button" class="btn-tablero" data-bs-toggle="modal" data-bs-target="#tableroModal">
                        Tablero de Vuelo
                        <svg style="margin-left: 120px; color: rgb(113, 113, 113);" xmlns="http://www.w3.org/2000/svg"
                            width="26" height="26" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                        </svg>
                    </button>

                    <!-- MODAL TABLERO -->
                    <div class="modal fade" id="tableroModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content tablero-content p-4">
                                <h2 class="text-center mb-4 fw-bold text-info">🧭 Tablero de Vuelo</h2>

                                <div class="tablero">
                                    <div class="indicador">
                                        <h5>Velocidad</h5>
                                        <div class="barra">
                                            <div class="nivel" style="width: 75%; background-color: #00b894;"></div>
                                        </div>
                                        <p>750 km/h</p>
                                    </div>

                                    <div class="indicador">
                                        <h5>Altitud</h5>
                                        <div class="barra">
                                            <div class="nivel" style="width: 60%; background-color: #0984e3;"></div>
                                        </div>
                                        <p>10,500 m</p>
                                    </div>

                                    <div class="indicador">
                                        <h5>Combustible</h5>
                                        <div class="barra">
                                            <div class="nivel" style="width: 40%; background-color: #fdcb6e;"></div>
                                        </div>
                                        <p>40% restante</p>
                                    </div>

                                    <div class="indicador">
                                        <h5>Temperatura Motor</h5>
                                        <div class="barra">
                                            <div class="nivel" style="width: 50%; background-color: #e17055;"></div>
                                        </div>
                                        <p>350°C</p>
                                    </div>

                                    <div class="indicador">
                                        <h5>Presión Atmosférica</h5>
                                        <div class="barra">
                                            <div class="nivel" style="width: 85%; background-color: #6c5ce7;"></div>
                                        </div>
                                        <p>1013 hPa</p>
                                    </div>
                                </div>

                                <div class="estado-vuelo text-center mt-4" style="background-color: none;">
                                    <h5 class="text-light mb-2">Estado General:</h5>
                                    <span class="badge bg-success p-3 fs-5 shadow" style="color: white;">✅ Vuelo Estable</span>
                                    <p class="text-muted mt-3 fst-italic" style="color: black;">Todos los sistemas operando dentro de los parámetros normales.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- BOTÓN -->
                    <button type="button" class="btn-servicios" data-bs-toggle="modal" data-bs-target="#serviciosModal">
                        Servicios Adicionales
                        <svg style="margin-left: 90px; color: rgb(113, 113, 113);" xmlns="http://www.w3.org/2000/svg"
                            width="26" height="26" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                        </svg>
                    </button>

                    <!-- MODAL SERVICIOS -->
                    <div class="modal fade" id="serviciosModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content servicios-content p-4">
                                <h2 class="text-center mb-4 fw-bold text-white">✈️ Servicios Adicionales</h2>

                                <div class="row text-center">
                                    <div class="col-md-4 mb-4">
                                        <div class="servicio-card">
                                            <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Comidas" class="servicio-icon">
                                            <h5>Menú Gourmet</h5>
                                            <p>Platos internacionales, snacks saludables y bebidas premium.</p>
                                            <span class="precio">Desde $25.000 COP</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="servicio-card">
                                            <img src="https://cdn-icons-png.flaticon.com/512/482/482636.png" alt="Ropa" class="servicio-icon">
                                            <h5>Kit de Viaje y Ropa</h5>
                                            <p>Incluye cambio de ropa ligera, antifaz, y artículos de aseo personal.</p>
                                            <span class="precio">Desde $18.000 COP</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="servicio-card">
                                            <img src="https://cdn-icons-png.flaticon.com/512/1046/1046784.png" alt="Entretenimiento" class="servicio-icon">
                                            <h5>Entretenimiento Premium</h5>
                                            <p>Acceso a películas, series y música sin conexión durante el vuelo.</p>
                                            <span class="precio">Desde $12.000 COP</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-3">
                                    <p class="text-white fst-italic">✨ Accede a tu cuenta para personalizar tus servicios adicionales.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row"><!--Publicidad CON CARD-->
    <div class="col-12">
        <div class="publicidad"><!--Publicidad-->
            <div id="carouselExampleFade" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card text-bg-dark">
                            <img src="../Img/carrusel1.png" class="card-img" alt="Viaje 1">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Explora sin límites</h5>
                                <p class="card-text">Viajar es vivir dos veces. Descubre nuevas culturas, sabores y emociones en cada destino.</p>
                                <p class="card-text"><small>Tu próximo destino te está esperando.</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card text-bg-dark">
                            <img src="../Img/carrusel2.png" class="card-img" alt="Viaje 2">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Haz del mundo tu hogar</h5>
                                <p class="card-text">Cada vuelo es una oportunidad para comenzar una nueva historia. ¿A dónde te llevará hoy?</p>
                                <p class="card-text"><small>Viaja con nosotros, vuela con confianza.</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card text-bg-dark">
                            <img src="../Img/carrusel3.png" class="card-img" alt="Viaje 3">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Viaja ligero, sueña en grande</h5>
                                <p class="card-text">No colecciones cosas, colecciona momentos. La aventura comienza con un tiquete en mano.</p>
                                <p class="card-text"><small>Haz que cada kilómetro valga la pena.</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card text-bg-dark">
                            <img src="../Img/carrusel4.png" class="card-img" alt="Viaje 4">
                            <div class="card-img-overlay">
                                <h5 class="card-title">El cielo no es el límite</h5>
                                <p class="card-text">Súbete a bordo y deja que el mundo te sorprenda. Tu próximo recuerdo inolvidable empieza aquí.</p>
                                <p class="card-text"><small>Conectamos destinos, creamos historias.</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card text-bg-dark">
                            <img src="../Img/carrusel5.png" class="card-img" alt="Viaje 5">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Donde tus sueños despegan</h5>
                                <p class="card-text">Cada destino tiene una historia que contar. ¿Cuál será la tuya?</p>
                                <p class="card-text"><small>Tu viaje comienza aquí.</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card text-bg-dark">
                            <img src="../Img/carrusel6.png" class="card-img" alt="Viaje 6">
                            <div class="card-img-overlay">
                                <h5 class="card-title">El viaje es la recompensa</h5>
                                <p class="card-text">Más allá de los mapas, hay experiencias que transforman. Atrévete a volar alto.</p>
                                <p class="card-text"><small>Vuela seguro. Vuela libre.</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card text-bg-dark">
                            <img src="../Img/carrusel7.png" class="card-img" alt="Viaje 7">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Descubre lo extraordinario</h5>
                                <p class="card-text">El mundo es demasiado grande para quedarse en un solo lugar. ¡Atrévete a recorrerlo!</p>
                                <p class="card-text"><small>Viajar es el mejor regalo que puedes darte.</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Controles del carrusel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </div>
</div>


    <div class="row" id="cards"><!--DESTINOS POPULARES-->
        <div id="destinos">
            <h1 id="destinos-populares">Destinos Populares</h1>
            <div class="Contenedor-Btn-Dest">
                <div style="margin-left: 850px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                    </svg>
                    <svg style="margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                        fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-12" style="margin-top: 15px;"><!--Destinos populares CARDS-->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col-md-3">
                    <div class="card h-100" id="c">
                        <img src="../Img/moscow3.png" class="card-img-top" alt="..." style="border-radius: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: left; font-weight: 500;"><strong
                                    style="font-weight: 100;"></strong> 3.800.000 COP $</h5>
                            <p class="card-text" style="color: black; font-weight: 400;">Moscu - San Petersburgo</p>
                        </div>
                        <div class="card-footer" style="margin-top: 8px;">
                            <button class="btn btn-primary btn-hover" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                                style="background-color: red; border: none;color: black; font-weight: 600;">Vamos a
                                Volar</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100" id="c">
                        <img src="../Img/moscow.png" class="card-img-top" alt="..." style="border-radius: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: left; font-weight: 500;"><strong
                                    style="font-weight: 100;"></strong> $1.800.000 COP $</h5>
                            <p class="card-text" style="color: black; font-weight: 400;">Buenos Aires - Argentina</p>
                        </div>
                        <div class="card-footer" style="margin-top: 8px;">
                            <button class="btn btn-primary btn-hover" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                                style="background-color: red; border: none;color: black; font-weight: 600;">Vamos a
                                Volar</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100" id="c">
                        <img src="../Img/moscow2.png" class="card-img-top" alt="..." style="border-radius: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: left; font-weight: 500;"><strong
                                    style="font-weight: 100;"></strong> 650.000 COP $</h5>
                            <p class="card-text" style="color: black; font-weight: 400;">Cuidad de mexico</p>
                        </div>
                        <div class="card-footer" style="margin-top: 8px;">
                            <button class="btn btn-primary btn-hover" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                                style="background-color: red; border: none;color: black; font-weight: 600;">Vamos a
                                Volar</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100" id="c">
                        <img src="../Img/moscow-samara.png" class="card-img-top" alt="..." style="border-radius: 10px;">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: left; font-weight: 500;"><strong
                                    style="font-weight: 100;"></strong> 190.000 COP $</h5>
                            <p class="card-text" style="color: black; font-weight: 400;">San andres</p>
                        </div>
                        <div class="card-footer" style="margin-top: 8px;">
                            <button class="btn btn-primary btn-hover" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                                style="background-color: red; border: none;color: black; font-weight: 600;">Vamos a
                                Volar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row" id="cards"><!--Servicios Interesantes-->
        <div id="destinos"><!--titulo-->
            <h1 id="destinos-populares">Servicios Interesantes</h1>
            <div class="Contenedor-Btn-Dest">
                <div style="margin-left: 850px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                    </svg>
                    <svg style="margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                        fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="contenedor-cards-services" style="margin-top: 15px; background: none;">
            <!--contenedor-cards-services-->
            <div class="col-12"><!--Destinos populares CARDS-->
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col-md-4" style="background: none;">
                        <div class="card h-100" id="c">
                            <img src="../Img/services1.png" class="card-img-top" alt="..."
                                style="border-radius: 10px; width: auto; height: auto;">
                        </div>
                    </div>
                    <div class="col-md-4" style="background: none;">
                        <div class="card h-100" id="c">
                            <img src="../Img/services2.png" class="card-img-top" alt="..."
                                style="border-radius: 10px; width: auto; height: auto;">
                        </div>
                    </div>
                    <div class="col-md-4" style="background: none;">
                        <div class="card h-100" id="c">
                            <img src="../Img/services3.png" class="card-img-top" alt="..."
                                style="border-radius: 10px; width: auto; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row cont-datos"> <!-- Contenedor de datos -->
        <div class="col-12">
            <div class="card text-bg-dark">
                <img src="../Img/prom.png" class="card-img">
                <div class="card-img-overlay">
                    <h2 class="card-title">Sé el primero en enterarte de</h2>
                    <h2>promociones y descuentos.</h2>
                    <p class="card-text">Suscríbete y recibe ofertas especiales</p>
                    <div class="datos-Personales">
                        <form style="display: flex;">
                            <input style="margin-top: 2px;" type="email" name="Datos-personales-Email" id="Datos-personales-Email"
                                placeholder="Por favor, digite su Email..." class="form-control">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: rgb(233, 9, 9); border-radius: 8px; width: 120px; height: 42px; margin-left: 5px;">Confirmar</button>
                        </form>
                    </div>
                    <p class="card-text">
                        <small>Al hacer clic en "Suscribirse", acepta el procesamiento
                            <a href="#" id="hover-A">datos personales.</a></small>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row"><!--Direcciones Rentables-->
        <div class="col-12">
            <div class="direcciones-rentables">
                <h3>Direcciones Rentables</h3>
                <button>Direcciones Del Dia</button>
            </div>
            <div class="Container-Direcciones">
                <div class="col-4" style="display: flex; flex-direction: column;">
                    <div class="item">
                        <img src="../Img/shutterstock_1385113475-984x1024.jpg" alt="">
                        <div>
                            <h4 style="font-size: 22px; font-weight: bold; margin: 10px 0 5px 10px; color: #333;">Miami</h4>
                            <p style="font-size: 18px; margin-left: 10px; color: rgb(82, 81, 81);"></p>
                            <p style="font-size: 17px; margin-left: 10px; color: blue;"> <strong style="text-decoration: underline;">707.039 </strong>COP$</p>

                        </div>
                    </div>
                    <div class="item">
                        <img src="../Img/mexico.jpg" alt="">
                        <div>
                            <h4 style="font-size: 22px; font-weight: bold; margin: 10px 0 5px 10px; color: #333;">Cuidad de Mexico</h4>
                            <p style="font-size: 18px; margin-left: 10px; color: rgb(82, 81, 81);"></p>
                            <p style="font-size: 17px; margin-left: 10px; color: blue;"> <strong style="text-decoration: underline;">1.286.872 </strong>COP$</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="../Img/newyork.jpg" alt="">
                        <div>
                            <h4 style="font-size: 22px; font-weight: bold; margin: 10px 0 5px 10px; color: #333;">New York</h4>
                            <p style="font-size: 18px; margin-left: 10px; color: rgb(82, 81, 81);"></p>
                            <p style="font-size: 17px; margin-left: 10px; color: blue;"> <strong style="text-decoration: underline;">855.467 </strong>COP$</p>
                        </div>
                    </div>
                </div>
                <div class="col-4" style="display: flex; flex-direction: column;">
                    <div class="item">
                        <img src="../Img/panama.jpg" alt="">
                        <div>
                            <h4 style="font-size: 22px; font-weight: bold; margin: 10px 0 5px 10px; color: #333;">Panamá</h4>
                            <p style="font-size: 18px; margin-left: 10px; color: rgb(82, 81, 81);"></p>
                            <p style="font-size: 17px; margin-left: 10px; color: blue;"><strong style="text-decoration: underline;">886.716 </strong>COP$</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="../Img/limaperu.jpg" alt="">
                        <div>
                            <h4 style="font-size: 22px; font-weight: bold; margin: 10px 0 5px 10px; color: #333;">Lima</h4>
                            <p style="font-size: 18px; margin-left: 10px; color: rgb(82, 81, 81);"></p>
                            <p style="font-size: 17px; margin-left: 10px; color: blue;"> <strong style="text-decoration: underline;">1.367.184 </strong>COP$</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="../Img/santiago-de-chile.jpg" alt="">
                        <div>
                            <h4 style="font-size: 22px; font-weight: bold; margin: 10px 0 5px 10px; color: #333;">Santiago de Chile</h4>
                            <p style="font-size: 18px; margin-left: 10px; color: rgb(82, 81, 81);"></p>
                            <p style="font-size: 17px; margin-left: 10px; color: blue;"> <strong style="text-decoration: underline;">943.790 </strong>COP$</p>
                        </div>
                    </div>
                </div>
                <div class="col-4" style="display: flex; flex-direction: column;">
                    <div class="item">
                        <img src="../Img/saopaulo.jpg" alt="">
                        <div>
                            <h4 style="font-size: 22px; font-weight: bold; margin: 10px 0 5px 10px; color: #333;">Sao Paulo</h4>
                            <p style="font-size: 18px; margin-left: 10px; color: rgb(82, 81, 81);"></p>
                            <p style="font-size: 17px; margin-left: 10px; color: blue;"> <strong style="text-decoration: underline;">1.414.059 </strong>COP$</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="../Img/cancun.jpg" alt="">
                        <div>
                            <h4 style="font-size: 22px; font-weight: bold; margin: 10px 0 5px 10px; color: #333;">Cancun</h4>
                            <p style="font-size: 18px; margin-left: 10px; color: rgb(82, 81, 81);"></p>
                            <p style="font-size: 17px; margin-left: 10px; color: blue;"> <strong style="text-decoration: underline;">1.179.684 </strong>COP$</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="../Img/quito-ecuador.jpg" alt="">
                        <div>
                            <h4 style="font-size: 22px; font-weight: bold; margin: 10px 0 5px 10px; color: #333;">Quito-Ecuador</h4>
                            <p style="font-size: 18px; margin-left: 10px; color: rgb(82, 81, 81);"></p>
                            <p style="font-size: 17px; margin-left: 10px; color: blue;">
                                <strong style="text-decoration: underline;">1.219.150 </strong>COP$
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Apartado-Preguntas"><!--preguntas-->
        <div class="Respuesta-Desple"><!--Respuestas Acordeon Desplegables-->
            <h4>Respuestas a preguntas frecuentes</h4>
            <li style="margin-top: 18px; ">Escríbenos en redes sociales o messenger. Responderemos y ayudaremos en todas
                partes.</li>
            <div class="accordion" id="accordionPanelsStayOpenExample" style="margin-top: 80px; ">
                <div class="accordion-item" style="border: none;">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            ¿Cómo se controla el equipaje de mano permitido?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            El control del equipaje de mano en los aeropuertos se realiza mediante normas de tamaño y peso establecidas por cada aerolínea, verificadas con medidores y básculas; además, todo el equipaje pasa por escáneres de rayos X para detectar objetos prohibidos, como líquidos en exceso o artículos peligrosos. Finalmente, en la puerta de embarque los agentes pueden revisar nuevamente las maletas y, si no cumplen con las reglas, se envían a la bodega con un costo adicional.
                        </div>
                    </div>
                </div>
                <div class="accordion-item" style="border: none;">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                            ¿Cuánto equipaje puedo llevar conmigo?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            En la mayoría de aerolíneas se permite llevar **una maleta de mano** de tamaño pequeño (aprox. 55 × 40 × 25 cm) que pese entre **7 y 10 kg**, junto con **un artículo personal** como un bolso o morral; el equipaje en bodega depende del tiquete, pudiendo ser de **1 o 2 maletas de hasta 23 kg** cada una, aunque algunas tarifas no incluyen este servicio, por lo que siempre es importante revisar las condiciones específicas de la aerolínea.

                        </div>
                    </div>
                </div>
                <div class="accordion-item" style="border: none;">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            ¿Cuáles son las franquicias de equipaje de mano para un billete?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            La franquicia de equipaje de mano para un billete generalmente incluye **una maleta pequeña** que cumpla con medidas aproximadas de **55 × 40 × 25 cm** y un peso de **7 a 10 kg**, además de **un artículo personal** como un bolso, mochila o maletín de computadora; sin embargo, estas condiciones pueden variar según la aerolínea y la tarifa comprada.

                        </div>
                    </div>
                </div>
                <div class="accordion-item" style="border: none;">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            ¿Qué más puedes llevar gratis además de tu equipaje de mano?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Además del equipaje de mano y el artículo personal, la mayoría de aerolíneas permiten llevar gratis algunos objetos adicionales como: **una chaqueta o abrigo, un paraguas, artículos comprados en duty free, un libro o material de lectura, y en algunos casos una cámara pequeña o equipo médico necesario**. También suelen aceptar sin costo extra **carriolas, sillas de ruedas o dispositivos de asistencia** cuando son para uso personal del pasajero.

                            ¿Quieres que te lo resuma en un solo párrafo cortico?

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Ir_Seccion"><!--Preguntas con boton-->
            <h4>Preguntas frecuentes</h4>
            <li style="margin-top: 18px; ">Escríbenos en redes sociales o messenger. Responderemos y ayudaremos en todas
                partes.</li>

            <!--boton de escribenos-->

            <a href="https://wa.link/u1t0r0" class="btn-rojo">¡Escríbenos!</a>

            <div class="Seccion-Estar-Cerca">
                <h4>Siempre estamos cerca</h4>
                <p style="margin-top: 15px;">Escríbenos en redes sociales o messenger. Responderemos y ayudaremos en
                    todas partes.</p>
                <p style="margin-top: 40px; text-align: center; box-shadow: 2px 2px 5px;" class="montserrat-underline">
                    VUELA SIEMPRE CON LOS MEJORES!</p>
            </div>
        </div>
    </div>

    <div class="row" id="NEW"><!--Noticias-->
        <div class="col-12">
            <div class="Noticias">
                <h3>Últimas noticias</h3>
                <button style="border: none; background: none; color: black; font-weight: 600; margin-left: 70%; border-radius: 8px;">Todas Las Noticias</button>
            </div>
            <div style="display: flex;">

                <div class="col-4" id="card-new">
                    <div style="display: flex;">
                        <button type="submit" style="color: white; border-radius: 8px; border: none; background-color: rgb(159, 13, 232); width: 90px; height: 25px; font-size: 13px; font-weight: 500; margin-top: 30px; padding: 5px 10px;">
                            NEW
                        </button>
                        <p style="margin-top: 30px; margin-left: 40%; color: rgb(159, 13, 232); font-style: oblique; font-weight: 500;">Noticias
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                            </svg>
                        </p>
                    </div>
                    <h5 style="margin-top: 20px; margin-left: 3px;">Llega la Temporada de Verano en familia, Vuela
                        seguro, rapido</h5>
                    <p style="margin-top: 20px;">A partir del verano de 2025, estarán vigentes 34 destinos del programa de vuelos <strong>FLY-SAVER</strong> </p>
                </div>
                <div class="col-4" id="card-new">
                    <div style="display: flex;">
                        <button type="submit" style="color: white; border-radius: 8px; border: none; background-color: rgb(88, 152, 255); width: 90px; height: 25px; font-size: 13px; font-weight: 500; margin-top: 30px; padding: 5px 10px;">
                            FLY
                        </button>
                        <p style="margin-top: 30px; margin-left: 40%; color: rgb(88, 152, 255); font-style: oblique; font-weight: 500;">Noticias
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                            </svg>
                        </p>
                    </div>
                    <h5 style="margin-top: 20px; margin-left: 3px;">Lanzaremos vuelos adicionales durante la vacaciones escolares.</h5>
                    <p style="margin-top: 20px;">La ampliacion de programas de vuelo afectara rutas populares.</p>
                </div>
                <div class="col-4" id="card-new">
                    <div style="display: flex;">
                        <button type="submit" style="color: white; border-radius: 8px; border: none; background-color: rgb(232, 25, 25); width: 90px; height: 25px; font-size: 13px; font-weight: 500; margin-top: 30px; padding: 5px 10px;">
                            EXTERIOR
                        </button>
                        <p style="margin-top: 30px; margin-left: 40%; color: red; font-style: oblique; font-weight: 500;">Noticias
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                            </svg>
                        </p>
                    </div>
                    <h5 style="margin-top: 20px; margin-left: 3px;">¡Vuela al extranjero por menos con <strong>FLY-SAVER</strong>!</h5>
                    <p style="margin-top: 20px;">¿Estás buscando una aventura internacional sin romper tu presupuesto? Te traemos los destinos más económicos para volar este año. ¡No dejes pasar estas ofertas irresistibles!</p>
                </div>

            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>