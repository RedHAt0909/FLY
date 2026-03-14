<?php
session_start();
include("conexion.php");

if (isset($_POST['id_vuelo'])) {
    $id_vuelo = $_POST['id_vuelo'];

    // Lo guardamos en sesión
    $_SESSION['vuelo_seleccionado'] = $id_vuelo;
}
$query = "SELECT * FROM vuelo WHERE Codigo_Vuelo BETWEEN 1 AND 12";
$resultado = mysqli_query($con, $query);

$vuelos = [];
while ($fila = mysqli_fetch_assoc($resultado)) {
    $vuelos[] = $fila;  // Guarda en 0, 1, 2, 3, ...
}


$title = "Compra";
include("nav.php");


?>
<style>
    .btn-custom-primary {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 20px;
        padding: 10px 25px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-custom-primary:hover {
        background-color: #0069d9;
    }

    .btn-custom-outline {
        background-color: transparent;
        color: #007bff;
        border: 2px solid #007bff;
        border-radius: 20px;
        padding: 10px 25px;
        font-weight: bold;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-custom-outline:hover {
        background-color: #007bff;
        color: white;
    }

    .modal-buttons {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    #fonditoxd {
        background-color: #FFFFFF;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2000 1500'%3E%3Cdefs%3E%3Crect stroke='%23FFFFFF' stroke-width='0.7' width='1' height='1' id='s'/%3E%3Cpattern id='a' width='3' height='3' patternUnits='userSpaceOnUse' patternTransform='rotate(227 1000 750) scale(28.45) translate(-964.85 -723.64)'%3E%3Cuse fill='%23fcfcfc' href='%23s' y='2'/%3E%3Cuse fill='%23fcfcfc' href='%23s' x='1' y='2'/%3E%3Cuse fill='%23fafafa' href='%23s' x='2' y='2'/%3E%3Cuse fill='%23fafafa' href='%23s'/%3E%3Cuse fill='%23f7f7f7' href='%23s' x='2'/%3E%3Cuse fill='%23f7f7f7' href='%23s' x='1' y='1'/%3E%3C/pattern%3E%3Cpattern id='b' width='7' height='11' patternUnits='userSpaceOnUse' patternTransform='rotate(227 1000 750) scale(28.45) translate(-964.85 -723.64)'%3E%3Cg fill='%23f5f5f5'%3E%3Cuse href='%23s'/%3E%3Cuse href='%23s' y='5' /%3E%3Cuse href='%23s' x='1' y='10'/%3E%3Cuse href='%23s' x='2' y='1'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='8'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='5' y='2'/%3E%3Cuse href='%23s' x='5' y='6'/%3E%3Cuse href='%23s' x='6' y='9'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='h' width='5' height='13' patternUnits='userSpaceOnUse' patternTransform='rotate(227 1000 750) scale(28.45) translate(-964.85 -723.64)'%3E%3Cg fill='%23f5f5f5'%3E%3Cuse href='%23s' y='5'/%3E%3Cuse href='%23s' y='8'/%3E%3Cuse href='%23s' x='1' y='1'/%3E%3Cuse href='%23s' x='1' y='9'/%3E%3Cuse href='%23s' x='1' y='12'/%3E%3Cuse href='%23s' x='2'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='2'/%3E%3Cuse href='%23s' x='3' y='6'/%3E%3Cuse href='%23s' x='3' y='11'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='4' y='10'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='c' width='17' height='13' patternUnits='userSpaceOnUse' patternTransform='rotate(227 1000 750) scale(28.45) translate(-964.85 -723.64)'%3E%3Cg fill='%23f2f2f2'%3E%3Cuse href='%23s' y='11'/%3E%3Cuse href='%23s' x='2' y='9'/%3E%3Cuse href='%23s' x='5' y='12'/%3E%3Cuse href='%23s' x='9' y='4'/%3E%3Cuse href='%23s' x='12' y='1'/%3E%3Cuse href='%23s' x='16' y='6'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='d' width='19' height='17' patternUnits='userSpaceOnUse' patternTransform='rotate(227 1000 750) scale(28.45) translate(-964.85 -723.64)'%3E%3Cg fill='%23FFFFFF'%3E%3Cuse href='%23s' y='9'/%3E%3Cuse href='%23s' x='16' y='5'/%3E%3Cuse href='%23s' x='14' y='2'/%3E%3Cuse href='%23s' x='11' y='11'/%3E%3Cuse href='%23s' x='6' y='14'/%3E%3C/g%3E%3Cg fill='%23efefef'%3E%3Cuse href='%23s' x='3' y='13'/%3E%3Cuse href='%23s' x='9' y='7'/%3E%3Cuse href='%23s' x='13' y='10'/%3E%3Cuse href='%23s' x='15' y='4'/%3E%3Cuse href='%23s' x='18' y='1'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='e' width='47' height='53' patternUnits='userSpaceOnUse' patternTransform='rotate(227 1000 750) scale(28.45) translate(-964.85 -723.64)'%3E%3Cg fill='%23FF0404'%3E%3Cuse href='%23s' x='2' y='5'/%3E%3Cuse href='%23s' x='16' y='38'/%3E%3Cuse href='%23s' x='46' y='42'/%3E%3Cuse href='%23s' x='29' y='20'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='f' width='59' height='71' patternUnits='userSpaceOnUse' patternTransform='rotate(227 1000 750) scale(28.45) translate(-964.85 -723.64)'%3E%3Cg fill='%23FF0404'%3E%3Cuse href='%23s' x='33' y='13'/%3E%3Cuse href='%23s' x='27' y='54'/%3E%3Cuse href='%23s' x='55' y='55'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='g' width='139' height='97' patternUnits='userSpaceOnUse' patternTransform='rotate(227 1000 750) scale(28.45) translate(-964.85 -723.64)'%3E%3Cg fill='%23FF0404'%3E%3Cuse href='%23s' x='11' y='8'/%3E%3Cuse href='%23s' x='51' y='13'/%3E%3Cuse href='%23s' x='17' y='73'/%3E%3Cuse href='%23s' x='99' y='57'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23b)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23h)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23c)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23d)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23e)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23f)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23g)' width='100%25' height='100%25'/%3E%3C/svg%3E");
        background-attachment: fixed;
        background-size: cover;
    }

    .carousel-inner img {
        height: 250px;
        object-fit: cover;
        cursor: pointer;
        border-radius: 15px;
    }

    .carousel-wrapper {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .carousel-wrapper:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(13, 110, 253, 0.4);
    }

    .carousel-title {
        font-weight: bolder;
        color: #ff0606ff;
        margin-top: 15px;
        text-align: center;
        /* Sombra de texto para dar profundidad */
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.64);
        /* Sombra de caja para darle un efecto "elevado" */
        box-shadow: 0 4px 15px rgba(255, 6, 6, 0.6);
        padding: 8px 15px;
        border-radius: 8px;
        background: #fff0f0;
        /* fondo suave para que se note la sombra */
        display: inline-block;
    }


    .modal-content {
        border-radius: 15px;
    }

    .modal-buttons button {
        border-radius: 30px;
        padding: 10px 25px;
        transition: all 0.3s ease;
    }

    .modal-buttons .btn-primary:hover {
        transform: scale(1.05);
    }

    .modal-buttons .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: #fff;
        transform: scale(1.05);
    }
</style>
<div class="row"><!--Anuncios de compra Carrusel-->
    <div class="col-12">
        <div class="Compra">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="image-container" style="position: relative; width: 100%; height: 300px;">
                            <img src="../Img/inter-united.png" class="d-block w-100" alt="..."
                                style="width: 100%; height: 300px; border-radius: 8px;">
                            <div class="text-overlay">
                                <h2
                                    style="position: absolute; transform: translate(-50%, -50%); color: rgb(13, 12, 12); font-size: 24px; font-weight: bold; text-shadow: 4px 4px 4px rgba(251, 251, 251, 0.5); top: 15%; left: 50%;">
                                    Compra tus tickets con FLY_SAVER.
                                </h2>
                            </div>
                            <p style="position: absolute; transform: translate(-50%, -50%);  top: 85%; left: 17%;">
                                <!--BTN derecho-->
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWidthExample" aria-expanded="false"
                                    aria-controls="collapseWidthExample"
                                    style="border: 1px solid rgb(117, 117, 234); background: none; color: black; font-weight: 700;">
                                    Viaja con nosotros.
                                </button>
                            </p>
                            <div style="min-height: 120px;"><!--BTN derecho-->
                                <div class="collapse collapse-horizontal" id="collapseWidthExample"
                                    style="position: absolute; color: black; top: 25%; left: 27%;">
                                    <div class="card card-body"
                                        style="width: 300px; background-color: rgba(255, 252, 252, 0.8);">
                                        <ul type="radio">
                                            <li style="font-size: 20px; color: black;">
                                                Viaja con FLY_SAVER a tu destino preferido durante tus
                                                vacaciones.
                                            </li>
                                            <li style="font-size: 20px; color: black;">
                                                Viaja 3S: <strong>seguro, sonriente y satisfecho</strong>, con
                                                nosotros.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p style="position: absolute; transform: translate(-50%, -50%);  top: 85%; left: 84%;">
                                <!--BTN izquierdo-->
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWidthExample1" aria-expanded="false"
                                    aria-controls="collapseWidthExample"
                                    style="border: 1px solid rgb(117, 117, 234); background: none; color: black; font-weight: 700;">
                                    Ofertas
                                </button>
                            </p>
                            <div style="min-height: 120px;"><!--BTN izquierdo-->
                                <div class="collapse collapse-horizontal" id="collapseWidthExample1"
                                    style="position: absolute; color: black; top: 25%; left: 55%;">
                                    <div class="card card-body"
                                        style="width: 300px; background-color: rgba(255, 252, 252, 0.8);">
                                        <ul type="radio">
                                            <li style="font-size: 20px; color: black;">
                                                Viaja con FLY_SAVER <strong>Plan Familia</strong> y obten un
                                                <strong>descuento</strong> del 10%.
                                            </li>
                                            <li style="font-size: 20px; color: black; margin-top: 3px;">
                                                Viaja con gratis con tu mascotas <strong>ellos no
                                                    pagan!!</strong>.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="image-container" style="position: relative; width: 100%; height: 300px;">
                            <img src="../Img/vuelo-avianca.png" class="d-block w-100" alt="..."
                                style="width: 100%; height: 300px; border-radius: 8px;">
                            <div class="text-overlay">
                                <h2
                                    style="position: absolute; transform: translate(-50%, -50%); color: rgb(13, 12, 12); font-size: 24px; font-weight: bold; text-shadow: 4px 4px 4px rgba(251, 251, 251, 0.5); top: 15%; left: 50%;">
                                    Viaja Feliz y Acompañado
                                </h2>
                            </div>
                            <p style="position: absolute; transform: translate(-50%, -50%);  top: 85%; left: 17%;">
                                <!--BTN derecho-->
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWidthExample" aria-expanded="false"
                                    aria-controls="collapseWidthExample"
                                    style="border: 1px solid rgb(247, 213, 213); background: none; color: black; font-weight: 700; background-color: rgba(251, 251, 251, 0.5);">
                                    Viaja con nosotros.
                                </button>
                            </p>
                            <div style="min-height: 120px;"><!--BTN derecho-->
                                <div class="collapse collapse-horizontal" id="collapseWidthExample"
                                    style="position: absolute; color: black; top: 25%; left: 27%;">
                                    <div class="card card-body"
                                        style="width: 300px; background-color: rgba(255, 252, 252, 0.8);">
                                        <ul type="radio">
                                            <li style="font-size: 20px; color: black;">
                                                Viaja con FLY_SAVER a tu destino preferido durante tus
                                                vacaciones.
                                            </li>
                                            <li style="font-size: 20px; color: black;">
                                                Viaja 3S: <strong>seguro, sonriente y satisfecho</strong>, con
                                                nosotros.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p style="position: absolute; transform: translate(-50%, -50%);  top: 85%; left: 84%;">
                                <!--BTN izquierdo-->

                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWidthExample1" aria-expanded="false"
                                    aria-controls="collapseWidthExample"
                                    style="border: 1px solid rgb(247, 213, 213); background: none; color: black; font-weight: 700; background-color: rgba(251, 251, 251, 0.5);">
                                    Ofertas
                                </button>
                            </p>
                            <div style="min-height: 120px;"><!--BTN izquierdo-->
                                <div class="collapse collapse-horizontal" id="collapseWidthExample1"
                                    style="position: absolute; color: black; top: 25%; left: 55%;">
                                    <div class="card card-body"
                                        style="width: 300px; background-color: rgba(255, 252, 252, 0.8);">
                                        <ul type="radio">
                                            <li style="font-size: 20px; color: black;">
                                                Viaja con FLY_SAVER <strong>Plan Familia</strong> y obten un
                                                <strong>desceunto</strong> del 10%.
                                            </li>
                                            <li style="font-size: 20px; color: black; margin-top: 3px;">
                                                Viaja con gratis con tu mascotas <strong>ellos no
                                                    pagan!!</strong>.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="image-container" style="position: relative; width: 100%; height: 300px;">
                            <img src="../Img/tolu.png" class="d-block w-100" alt="..."
                                style="width: 100%; height: 300px; border-radius: 8px;">
                            <div class="text-overlay">
                                <h2
                                    style="position: absolute; transform: translate(-50%, -50%); color: rgb(13, 12, 12); font-size: 24px; font-weight: bold; text-shadow: 4px 4px 4px rgba(251, 251, 251, 0.5); top: 15%; left: 50%;">
                                    Cumple tus sueños. Viaja con nosotros...
                                </h2>
                            </div>
                            <p style="position: absolute; transform: translate(-50%, -50%);  top: 85%; left: 17%;">
                                <!--BTN derecho-->
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWidthExample" aria-expanded="false"
                                    aria-controls="collapseWidthExample"
                                    style="border: 1px solid rgb(247, 213, 213); background: none; color: black; font-weight: 700; background-color: rgba(251, 251, 251, 0.5);">
                                    Viaja con nosotros.
                                </button>
                            </p>
                            <div style="min-height: 120px;"><!--BTN derecho-->
                                <div class="collapse collapse-horizontal" id="collapseWidthExample"
                                    style="position: absolute; color: black; top: 25%; left: 27%;">
                                    <div class="card card-body"
                                        style="width: 300px; background-color: rgba(255, 252, 252, 0.8);">
                                        <ul type="radio">
                                            <li style="font-size: 20px; color: black;">
                                                Viaja con FLY_SAVER a tu destino preferido durante tus
                                                vacaciones.
                                            </li>
                                            <li style="font-size: 20px; color: black;">
                                                Viaja 3S: <strong>seguro, sonriente y satisfecho</strong>, con
                                                nosotros.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p style="position: absolute; transform: translate(-50%, -50%);  top: 85%; left: 84%;">
                                <!--BTN izquierdo-->

                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWidthExample1" aria-expanded="false"
                                    aria-controls="collapseWidthExample"
                                    style="border: 1px solid rgb(247, 213, 213); background: none; color: black; font-weight: 700; background-color: rgba(251, 251, 251, 0.5);">
                                    Ofertas
                                </button>
                            </p>
                            <div style="min-height: 120px;"><!--BTN izquierdo-->
                                <div class="collapse collapse-horizontal" id="collapseWidthExample1"
                                    style="position: absolute; color: black; top: 25%; left: 55%;">
                                    <div class="card card-body"
                                        style="width: 300px; background-color: rgba(255, 252, 252, 0.8);">
                                        <ul type="radio">
                                            <li style="font-size: 20px; color: black;">
                                                Viaja con FLY_SAVER <strong>Plan Familia</strong> y obten un
                                                <strong>desceunto</strong> del 10%.
                                            </li>
                                            <li style="font-size: 20px; color: black; margin-top: 3px;">
                                                Viaja con gratis con tu mascotas <strong>ellos no
                                                    pagan!!</strong>.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div><br>
<hr style="border: 1px solid;"><br>

<div class="row">
    <!-- Columna izquierda -->
    <div class="col-md-2"></div>

    <div class="col-md-4">
        <div class="p-4 rounded shadow-sm h-100 bg-light">
            <h4 class="fw-bold text-primary">¿Listo para preparar tu aventura?</h4>
            <p class="mt-2 text-dark">
                Comprar tu vuelo con <strong>FLY-SAVER</strong> es fácil, rápido y seguro. Solo necesitas:
            </p>
            <ul class="text-dark">
                <li>Seleccionar tu ciudad de origen y destino</li>
                <li>Elegir la fecha de salida (y regreso si aplica)</li>
                <li>Indicar cuántos viajan (¡incluye a los niños y mascotas!)</li>
            </ul>
            <p class="text-dark">
                Con FLY-SAVER viajas cómodo, <strong>sin complicaciones</strong> y con <strong>el mejor
                    precio</strong>.
            </p>
            <p class="fw-bold text-primary">
                ¡Viajar es fácil cuando te acompañamos!
            </p>
        </div>
    </div>


    <!-- Columna derecha -->
    <div class="col-md-4">
        <div class="mb-4 p-4 bg-light rounded shadow-sm">
            <h5 class="text-center fw-bold text-primary">Información sobre los acompañantes</h5>
            <br>

            <div class="d-flex justify-content-center flex-wrap gap-2 mb-3">
                <button class="btn"
                    style="background-color: rgba(51, 177, 244, 0.51); color: black; border-color: black;"
                    type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample1"
                    aria-expanded="false" aria-controls="multiCollapseExample1">Jóvenes</button>

                <a class="btn"
                    style="background-color: rgba(51, 177, 244, 0.51); color: black; border-color: black;"
                    data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false"
                    aria-controls="multiCollapseExample2">Niños</a>

                <button class="btn"
                    style="background-color: rgba(51, 177, 244, 0.51); color: black; border-color: black;"
                    type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3"
                    aria-expanded="false" aria-controls="multiCollapseExample3">Bebés</button>

                <button class="btn"
                    style="background-color: rgba(51, 177, 244, 0.51); color: black; border-color: black;"
                    type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false"
                    aria-controls="multiCollapseExample1 multiCollapseExample2 multiCollapseExample3">
                    Familia
                </button>
            </div>
            <div class="text-center mt-3">
                <img src="../Img/familiaFuncional.png" alt="Familia viajando" class="img-fluid"
                    style="border-radius: 8px; box-shadow: -5px 1px 5px;">
            </div>

            <hr style="border: 1px solid;">

            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body" style="margin-top: 10px;">
                            <div class="small text-dark">
                                <strong>FLY-SAVER</strong> garantiza a los adolescentes un viaje cómodo, seguro y
                                con entretenimiento.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <div class="card card-body" style="margin-top: 10px;">
                            <div class="small text-dark">
                                <strong>FLY-SAVER</strong> facilita viajes con niños: asientos juntos y descuentos
                                familiares.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample3">
                        <div class="card card-body" style="margin-top: 10px;">
                            <div class="small text-dark">
                                <strong>FLY-SAVER</strong> cuida a tu bebé con servicios especiales y embarque
                                prioritario.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-2"></div>



</div>
<br><br><br>


<br>
<hr style="border: 1px solid;">
<br>

<!--uno-->
<div>


    <div class="container text-center mt-5">
        <h3 class="fw-bold text-primary mb-4">Destinos</h3>
        <div class="row justify-content-center">

            <!-- Carrusel 1 -->
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="carousel-wrapper">
                    <div id="carouselDestino1" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Img/medellin1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino1" alt="Destino">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/medellin3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino1" alt="Destino">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestino1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDestino1" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <h5 class="carousel-title"><?php echo $vuelos[0]['Destino']; ?></h5>
            </div>

            <!-- Modal 1 del carrusel 1 -->
            <div class="modal fade" id="modalDestino1" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content p-3" id="fonditoxd">
                        <div id="carouselModal1" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../Img/medellin1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino1" alt="Destino">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/medellin3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino1" alt="Destino">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselModal1" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        <h4 class="fw-bold text-primary mt-3"><?php echo $vuelos[0]['Origen'] . ' → ' . $vuelos[0]['Destino']; ?></h4>
                        <p><?php echo $vuelos[0]['Descripcion']; ?></p>
                        <h5 style="text-align: center; font-weight: bolder; position: relative; padding-bottom: 6px; color: #222;">
                            <?php echo '$' . number_format($vuelos[0]['Precio_Adultos'], 0) . ' USD'; ?>
                        </h5>
                        <div class="modal-buttons mt-3">
                            <form action="../Web/usuario.php" method="POST">
                                <input type="hidden" name="id_vuelo" value="<?php echo $vuelos[0]['Codigo_Vuelo']; ?>">
                                <button type="submit" class="btn-custom-primary">Comprar</button>
                            </form>
                            <button class="btn-custom-outline" onclick="window.location.href='../Web/Hoteles.php'">Ver hoteles del vuelo</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Carrusel 2 -->
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="carousel-wrapper">
                    <div id="carouselDestino2" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Img/cartagena1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino2" alt="<?php echo $vuelos[1]['Destino']; ?>">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/cartagena2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino2" alt="<?php echo $vuelos[1]['Destino']; ?>">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/cartagena3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino2" alt="<?php echo $vuelos[1]['Destino']; ?>">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestino2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDestino2" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <h5 class="carousel-title"><?php echo $vuelos[1]['Destino']; ?></h5>
            </div>
            <!-- Modal 2 -->
            <div class="modal fade" id="modalDestino2" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content p-3" id="fonditoxd">
                        <div id="carouselModal2" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../Img/cartagena1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino2" alt="<?php echo $vuelos[1]['Destino']; ?>">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/cartagena2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino2" alt="<?php echo $vuelos[1]['Destino']; ?>">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/cartagena3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino2" alt="<?php echo $vuelos[1]['Destino']; ?>">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal2" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselModal2" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        <h4 class="fw-bold text-primary mt-3">
                            <?php echo $vuelos[1]['Origen'] . ' → ' . $vuelos[1]['Destino']; ?>
                        </h4>
                        <p><?php echo $vuelos[1]['Descripcion']; ?></p>
                        <h5 style="text-align: center; font-weight: bolder; position: relative; padding-bottom: 6px; color: #222;">
                            <?php echo '$' . number_format($vuelos[1]['Precio_Adultos'], 0) . ' USD'; ?>
                        </h5>
                       <div class="modal-buttons mt-3">
                            <form action="../Web/usuario.php" method="POST">
                                <input type="hidden" name="id_vuelo" value="<?php echo $vuelos[1]['Codigo_Vuelo']; ?>">
                                <button type="submit" class="btn-custom-primary">Comprar</button>
                            </form>
                            <button class="btn-custom-outline" onclick="window.location.href='../Web/Hoteles.php'">Ver hoteles del vuelo</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Carrusel 3 -->
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="carousel-wrapper">
                    <div id="carouselDestino3" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Img/santamarta1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino3" alt="Japón">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/santamarta2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino3" alt="Corea del Sur">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/santamarta3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino3" alt="Tailandia">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestino3" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDestino3" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <h5 class="carousel-title"><?php echo $vuelos[2]['Destino']; ?></h5>
            </div>
        </div>
    </div>


    <!--Modal 3-->
    <div class="modal fade" id="modalDestino3" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-3" id="fonditoxd">
                <div id="carouselModal3" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../Img/santamarta1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino3" alt="Japón">
                        </div>
                        <div class="carousel-item">
                            <img src="../Img/santamarta2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino3" alt="Corea del Sur">
                        </div>
                        <div class="carousel-item">
                            <img src="../Img/santamarta3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino3" alt="Tailandia">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal3" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselModal3" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
                <h4 class="fw-bold text-primary mt-3">
                    <?php echo $vuelos[2]['Origen'] . ' → ' . $vuelos[2]['Destino']; ?>
                </h4>
                <p><?php echo $vuelos[2]['Descripcion']; ?></p>
                <h5 style="text-align: center; font-weight: bolder; position: relative; padding-bottom: 6px; color: #222;">
                    <?php echo '$' . number_format($vuelos[2]['Precio_Adultos'], 0) . ' USD'; ?>
                </h5>
                <div class="modal-buttons mt-3">
                            <form action="../Web/usuario.php" method="POST">
                                <input type="hidden" name="id_vuelo" value="<?php echo $vuelos[2]['Codigo_Vuelo']; ?>">
                                <button type="submit" class="btn-custom-primary">Comprar</button>
                            </form>
                            <button class="btn-custom-outline" onclick="window.location.href='../Web/Hoteles.php'">Ver hoteles del vuelo</button>
                        </div>
            </div>
        </div>
    </div>

</div>

<!--dos-->
<div>
    <div class="container text-center mt-5">
        <div class="row justify-content-center">

            <!-- Carrusel 1 -->
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="carousel-wrapper">
                    <div id="carouselDestino1" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Img/pereira1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino4" alt="Cartagena">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/pereira2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino4" alt="Santorini">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/pereira3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino4" alt="Cancún">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestino4" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDestino4" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <h5 class="carousel-title"><?php echo $vuelos[3]['Destino']; ?></h5>
            </div>

            <!--modal 1-->
            <div class="modal fade" id="modalDestino4" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content p-3" id="fonditoxd">
                        <div id="carouselModal4" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../Img/pereira1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino4" alt="Cartagena">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/pereira2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino4" alt="Santorini">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/pereira3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino4" alt="Cancún">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal4" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselModal4" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        <h4 class="fw-bold text-primary mt-3">
                            <?php echo $vuelos[3]['Origen'] . ' → ' . $vuelos[3]['Destino']; ?>
                        </h4>
                        <p><?php echo $vuelos[3]['Descripcion']; ?></p>
                        <h5 style="text-align: center; font-weight: bolder; position: relative; padding-bottom: 6px; color: #222;">
                            <?php echo '$' . number_format($vuelos[3]['Precio_Adultos'], 0) . ' USD'; ?>
                        </h5>
                        <div class="modal-buttons mt-3">
                            <form action="../Web/usuario.php" method="POST">
                                <input type="hidden" name="id_vuelo" value="<?php echo $vuelos[3]['Codigo_Vuelo']; ?>">
                                <button type="submit" class="btn-custom-primary">Comprar</button>
                            </form>
                            <button class="btn-custom-outline" onclick="window.location.href='../Web/Hoteles.php'">Ver hoteles del vuelo</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Carrusel 5 -->
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="carousel-wrapper">
                    <div id="carouselDestino5" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Img/quibdo1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino5" alt="París">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/quibdo2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino5" alt="Roma">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/quibdo3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino5" alt="Londres">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestino5" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDestino5" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <h5 class="carousel-title"><?php echo $vuelos[4]['Destino']; ?></h5>
            </div>

            <!-- Modal 5 -->
            <div class="modal fade" id="modalDestino5" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content p-3" id="fonditoxd">
                        <div id="carouselModal5" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../Img/quibdo1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino5" alt="París">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/quibdo2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino5" alt="Roma">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/quibdo3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino5" alt="Londres">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal5" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselModal5" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>

                        <h4 class="fw-bold text-primary mt-3">
                            <?php echo $vuelos[4]['Origen'] . ' → ' . $vuelos[4]['Destino']; ?>
                        </h4>
                        <p><?php echo $vuelos[4]['Descripcion']; ?></p>
                        <h5 style="text-align: center; font-weight: bolder; position: relative; padding-bottom: 6px; color: #222;">
                            <?php echo '$' . number_format($vuelos[4]['Precio_Adultos'], 0) . ' USD'; ?>
                        </h5>
                        <div class="modal-buttons mt-3">
                            <form action="../Web/usuario.php" method="POST">
                                <input type="hidden" name="id_vuelo" value="<?php echo $vuelos[4]['Codigo_Vuelo']; ?>">
                                <button type="submit" class="btn-custom-primary">Comprar</button>
                            </form>
                            <button class="btn-custom-outline" onclick="window.location.href='../Web/Hoteles.php'">Ver hoteles del vuelo</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Carrusel 6 -->
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="carousel-wrapper">
                    <div id="carouselDestino6" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Img/arauca1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino6" alt="Japón">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/arauca2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino6" alt="Corea del Sur">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/arauca3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino6" alt="Tailandia">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestino6" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDestino6" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <h5 class="carousel-title"><?php echo $vuelos[5]['Destino']; ?></h5>
            </div>

            <!-- Modal 6 -->
            <div class="modal fade" id="modalDestino6" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content p-3" id="fonditoxd">
                        <div id="carouselModal6" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../Img/arauca1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino6" alt="Japón">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/arauca2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino6" alt="Corea del Sur">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/arauca3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino6" alt="Tailandia">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal6" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselModal6" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        <h4 class="fw-bold text-primary mt-3">
                            <?php echo $vuelos[5]['Origen'] . ' → ' . $vuelos[5]['Destino']; ?>
                        </h4>
                        <p><?php echo $vuelos[5]['Descripcion']; ?></p>
                        <h5 style="text-align: center; font-weight: bolder; position: relative; padding-bottom: 6px; color: #222;">
                            <?php echo '$' . number_format($vuelos[5]['Precio_Adultos'], 0) . ' USD'; ?>
                        </h5>
                        <div class="modal-buttons mt-3">
                            <form action="../Web/usuario.php" method="POST">
                                <input type="hidden" name="id_vuelo" value="<?php echo $vuelos[5]['Codigo_Vuelo']; ?>">
                                <button type="submit" class="btn-custom-primary">Comprar</button>
                            </form>
                            <button class="btn-custom-outline" onclick="window.location.href='../Web/Hoteles.php'">Ver hoteles del vuelo</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--tres-->
<div>
    <div class="container text-center mt-5">
        <div class="row justify-content-center">

            <!-- Carrusel 7 -->
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="carousel-wrapper">
                    <div id="carouselDestino7" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Img/mexico1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino7" alt="Cartagena">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/mexico2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino7" alt="Santorini">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/mexico3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino7" alt="Cancún">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestino7" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDestino7" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <h5 class="carousel-title"><?php echo $vuelos[6]['Destino']; ?></h5>

            </div>

            <!-- Modal 7 -->
            <div class="modal fade" id="modalDestino7" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content p-3" id="fonditoxd">
                        <div id="carouselModal7" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../Img/mexico1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino7" alt="Cartagena">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/mexico2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino7" alt="Santorini">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/mexico3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino7" alt="Cancún">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal7" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselModal7" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        <h4 class="fw-bold text-primary mt-3">
                            <?php echo $vuelos[6]['Origen'] . ' → ' . $vuelos[6]['Destino']; ?>
                        </h4>
                        <p><?php echo $vuelos[6]['Descripcion']; ?></p>
                        <h5 style="text-align: center; font-weight: bolder; position: relative; padding-bottom: 6px; color: #222;">
                            <?php echo '$' . number_format($vuelos[6]['Precio_Adultos'], 0) . ' USD'; ?>
                        </h5>
                        <div class="modal-buttons mt-3">
                            <form action="../Web/usuario.php" method="POST">
                                <input type="hidden" name="id_vuelo" value="<?php echo $vuelos[6]['Codigo_Vuelo']; ?>">
                                <button type="submit" class="btn-custom-primary">Comprar</button>
                            </form>
                            <button class="btn-custom-outline" onclick="window.location.href='../Web/Hoteles.php'">Ver hoteles del vuelo</button>
                        </div>

                    </div>
                </div>
            </div>



            <!-- Carrusel 8 -->
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="carousel-wrapper">
                    <div id="carouselDestino8" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Img/miami1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino8" alt="París">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/miami2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino8" alt="Roma">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/miami3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino8" alt="Londres">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestino8" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDestino8" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <h5 class="carousel-title"><?php echo $vuelos[7]['Destino']; ?></h5>

            </div>

            <!-- Modal 8 -->
            <div class="modal fade" id="modalDestino8" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content p-3" id="fonditoxd">
                        <div id="carouselModal8" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../Img/miami1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino8" alt="París">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/miami2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino8" alt="Roma">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/miami3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino8" alt="Londres">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal8" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselModal8" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        <h4 class="fw-bold text-primary mt-3">
                            <?php echo $vuelos[7]['Origen'] . ' → ' . $vuelos[7]['Destino']; ?>
                        </h4>
                        <p><?php echo $vuelos[7]['Descripcion']; ?></p>
                        <h5 style="text-align: center; font-weight: bolder; position: relative; padding-bottom: 6px; color: #222;">
                            <?php echo '$' . number_format($vuelos[7]['Precio_Adultos'], 0) . ' USD'; ?>
                        </h5>
                        <div class="modal-buttons mt-3">
                            <form action="../Web/usuario.php" method="POST">
                                <input type="hidden" name="id_vuelo" value="<?php echo $vuelos[7]['Codigo_Vuelo']; ?>">
                                <button type="submit" class="btn-custom-primary">Comprar</button>
                            </form>
                            <button class="btn-custom-outline" onclick="window.location.href='../Web/Hoteles.php'">Ver hoteles del vuelo</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Carrusel 9 -->
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="carousel-wrapper">
                    <div id="carouselDestino9" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Img/madrid1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino9" alt="Japón">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/madrid2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino9" alt="Corea del Sur">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/madrid3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino9" alt="Tailandia">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestino9" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDestino9" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <h5 class="carousel-title"><?php echo $vuelos[8]['Destino']; ?></h5>
            </div>

            <!-- Modal 9 -->
            <div class="modal fade" id="modalDestino9" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content p-3" id="fonditoxd">
                        <div id="carouselModal9" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../Img/madrid1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino9" alt="Japón">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/madrid2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino9" alt="Corea del Sur">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/madrid3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino9" alt="Tailandia">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal9" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselModal9" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        <h4 class="fw-bold text-primary mt-3">
                            <?php echo $vuelos[8]['Origen'] . ' → ' . $vuelos[8]['Destino']; ?>
                        </h4>
                        <p><?php echo $vuelos[8]['Descripcion']; ?></p>
                        <h5 style="text-align: center; font-weight: bolder; position: relative; padding-bottom: 6px; color: #222;">
                            <?php echo '$' . number_format($vuelos[8]['Precio_Adultos'], 0) . ' USD'; ?>
                        </h5>
                        <div class="modal-buttons mt-3">
                            <form action="../Web/usuario.php" method="POST">
                                <input type="hidden" name="id_vuelo" value="<?php echo $vuelos[8]['Codigo_Vuelo']; ?>">
                                <button type="submit" class="btn-custom-primary">Comprar</button>
                            </form>
                            <button class="btn-custom-outline" onclick="window.location.href='../Web/Hoteles.php'">Ver hoteles del vuelo</button>
                        </div>



                    </div>
                </div>
            </div>


        </div>
    </div>







</div>


<!--cuatro-->
<div>



    <div class="container text-center mt-5">
        <div class="row justify-content-center">

            <!-- Carrusel 11 -->
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="carousel-wrapper">
                    <div id="carouselDestino11" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Img/chile1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino11" alt="Cartagena">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/chile2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino11" alt="Santorini">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/chile3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino11" alt="Cancún">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestino11" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDestino11" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <h5 class="carousel-title"><?php echo $vuelos[9]['Destino']; ?></h5>
            </div>

            <!-- modal 11 -->
            <div class="modal fade" id="modalDestino11" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content p-3" id="fonditoxd">
                        <div id="carouselModal11" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../Img/chile1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino11" alt="Cartagena">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/chile2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino11" alt="Santorini">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/chile3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino11" alt="Cancún">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal11" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselModal11" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        <h4 class="fw-bold text-primary mt-3">
                            <?php echo $vuelos[9]['Origen'] . ' → ' . $vuelos[9]['Destino']; ?>
                        </h4>
                        <p><?php echo $vuelos[9]['Descripcion']; ?></p>
                        <h5 style="text-align: center; font-weight: bolder; position: relative; padding-bottom: 6px; color: #222;">
                            <?php echo '$' . number_format($vuelos[9]['Precio_Adultos'], 0) . ' USD'; ?>
                        </h5>
                        <div class="modal-buttons mt-3">
                            <form action="../Web/usuario.php" method="POST">
                                <input type="hidden" name="id_vuelo" value="<?php echo $vuelos[9]['Codigo_Vuelo']; ?>">
                                <button type="submit" class="btn-custom-primary">Comprar</button>
                            </form>
                            <button class="btn-custom-outline" onclick="window.location.href='../Web/Hoteles.php'">Ver hoteles del vuelo</button>
                        </div>



                    </div>
                </div>
            </div>


            <!-- Carrusel 22 -->
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="carousel-wrapper">
                    <div id="carouselDestino22" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Img/lima1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino22" alt="París">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/lima2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino22" alt="Roma">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/lima3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino22" alt="Londres">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestino22" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDestino22" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <h5 class="carousel-title"><?php echo $vuelos[10]['Destino']; ?></h5>
            </div>

            <!-- modal 22 -->
            <div class="modal fade" id="modalDestino22" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content p-3" id="fonditoxd">
                        <div id="carouselModal22" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../Img/lima1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino22" alt="París">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/lima2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino22" alt="Roma">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/lima3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino22" alt="Londres">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal22" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselModal22" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>

                        <h4 class="fw-bold text-primary mt-3">
                            <?php echo $vuelos[10]['Origen'] . ' → ' . $vuelos[10]['Destino']; ?>
                        </h4>
                        <p><?php echo $vuelos[10]['Descripcion']; ?></p>
                        <h5 style="text-align: center; font-weight: bolder; position: relative; padding-bottom: 6px; color: #222;">
                            <?php echo '$' . number_format($vuelos[10]['Precio_Adultos'], 0) . ' USD'; ?>
                        </h5>
                        <div class="modal-buttons mt-3">
                            <form action="../Web/usuario.php" method="POST">
                                <input type="hidden" name="id_vuelo" value="<?php echo $vuelos[10]['Codigo_Vuelo']; ?>">
                                <button type="submit" class="btn-custom-primary">Comprar</button>
                            </form>
                            <button class="btn-custom-outline" onclick="window.location.href='../Web/Hoteles.php'">Ver hoteles del vuelo</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Carrusel 33 -->
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="carousel-wrapper">
                    <div id="carouselDestino33" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Img/cancun1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino33" alt="Japón">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/cancun2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino33" alt="Corea del Sur">
                            </div>
                            <div class="carousel-item">
                                <img src="../Img/cancun3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino33" alt="Tailandia">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestino33" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDestino33" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <h5 class="carousel-title"><?php echo $vuelos[11]['Destino']; ?></h5>

            </div>

            <!-- modal 33 -->
            <div class="modal fade" id="modalDestino33" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content p-3" id="fonditoxd">
                        <div id="carouselModal33" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../Img/cancun1.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino33" alt="Japón">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/cancun2.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino33" alt="Corea del Sur">
                                </div>
                                <div class="carousel-item">
                                    <img src="../Img/cancun3.png" class="d-block w-100 open-modal" data-bs-target="#modalDestino33" alt="Tailandia">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal33" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselModal33" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        <h4 class="fw-bold text-primary mt-3">
                            <?php echo $vuelos[11]['Origen'] . ' → ' . $vuelos[11]['Destino']; ?>
                        </h4>
                        <p><?php echo $vuelos[11]['Descripcion']; ?></p>
                        <h5 style="text-align: center; font-weight: bolder; position: relative; padding-bottom: 6px; color: #222;">
                            <?php echo '$' . number_format($vuelos[11]['Precio_Adultos'], 0) . ' USD'; ?>
                        </h5>
                        <div class="modal-buttons mt-3">
                            <form action="../Web/usuario.php" method="POST">
                                <input type="hidden" name="id_vuelo" value="<?php echo $vuelos[11]['Codigo_Vuelo']; ?>">
                                <button type="submit" class="btn-custom-primary">Comprar</button>
                            </form>
                            <button class="btn-custom-outline" onclick="window.location.href='../Web/Hoteles.php'">Ver hoteles del vuelo</button>
                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>


</div>

<br><br><br>
<?php
include("footer.php");
?>

<script>
    // Solo abrir modal al hacer clic en la imagen (no en los botones del carrusel)
    document.querySelectorAll('.open-modal').forEach(img => {
        img.addEventListener('click', (e) => {
            const target = img.getAttribute('data-bs-target');
            const modal = new bootstrap.Modal(document.querySelector(target));
            modal.show();
        });
    });
</script>