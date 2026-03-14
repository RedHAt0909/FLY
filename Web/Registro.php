<?php
include("nav.php");
include("conexion.php");
?>
<div class="container mt-5"><!--Registro-->
    <div class="row">
        <div class="col-12">
            <div class="form-container">
                <form action="Registrar.php" method="POST" id="registro-form">
                    <h1 class="form-title montserrat-letra">Formulario de Registro</h1>
                    <p class="form-description">¡Regístrate para disfrutar de los mejores vuelos internacionales!</p>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre Completo</label>
                            <input type="text" id="nombre" name="nombre" class="form-input"
                                placeholder="Nombre y Apellido" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" id="email" name="email" class="form-input"
                                placeholder="name@correo.com" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="telefono" class="form-label">Número de Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" class="form-input"
                                placeholder="+57 325 458 6332" required>
                        </div>
                        <div class="form-group">
                            <label for="nacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" id="nacimiento" name="nacimiento" class="form-input" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" id="direccion" name="direccion" class="form-input"
                                placeholder="Calle, ciudad, país" required>
                        </div>
                        <div class="form-group">
                            <label for="pasaporte" class="form-label">Número de Pasaporte</label>
                            <input type="text" id="pasaporte" name="pasaporte" class="form-input"
                                placeholder="Número de pasaporte" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="nacionalidad" class="form-label">Nacionalidad</label>
                            <select id="nacionalidad" name="nacionalidad" class="form-input" required>
                                <option value="colombia">Colombia</option>
                                <option value="espana">España</option>
                                <option value="mexico">México</option>
                                <option value="argentina">Argentina</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contraseña" class="form-label" style="margin-right: 320px;">Contraseña</label>
                            <input type="password" id="contraseña" name="contrasena" class="form-input"
                                placeholder="Contraseña" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="confirmar-contraseña" class="form-label">Confirmar Contraseña</label>
                            <input type="password" id="confirmar-contraseña" name="confirmar_contrasena"
                                class="form-input" placeholder="Confirmar Contraseña" required>
                        </div>
                        <div class="form-group"
                            style="display: flex; flex-direction: column; margin-bottom: 15px; font-family: 'Segoe UI', sans-serif;">
                            <label for="Codigo_Rol"
                                class="form-label"
                                style="font-weight: 600; color: #333; margin-bottom: 6px;">
                                Rol
                            </label>

                            <select name="rol" required
                                style="padding: 10px 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 15px; color: #333; background-color: #f9f9f9; transition: all 0.3s ease; cursor: pointer;">
                                <option value="">Seleccione un rol</option>
                                <?php
                                $consulta = mysqli_query($con, "SELECT Id_Rol, Tipo_Rol FROM rol");
                                while ($fila = mysqli_fetch_assoc($consulta)) {
                                    echo '<option value="' . $fila['Id_Rol'] . '">' . $fila['Tipo_Rol'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>


                    </div>
                    <div class="form-group checkbox-group" style="display: flex; align-items: center; gap: 8px; margin-top: 10px; font-family: 'Segoe UI', sans-serif; font-size: 15px;">
                        <input type="checkbox" id="terminos" name="terminos"
                            class="form-checkbox"
                            required
                            style="width: 18px; height: 18px; accent-color: #007bff; cursor: pointer;">

                        <label for="terminos"
                            class="form-checkbox-label"
                            style="margin: 0;">
                            Acepto los
                            <a href="#" style="color: #007bff; text-decoration: none;">términos y condiciones</a>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary form-btn" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" style="background-color: rgb(233, 65, 65); border: none;">
                        Registrarse
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="../Img/FlySaverLOG.jpg" alt="" style="width: 50px; height: 50px; border-radius: 8px; padding: 1%;">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="margin-left: 23%;">Registro Confirmado</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p style="text-align: justify;">El proceso de <strong>Registro</strong> ha finalizado...</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Editar Datos</button>

                                    <button type="button" class="btn btn-primary w-100" style="background-color: rgb(233, 65, 65); border: none;"
                                        onclick="window.location.href='../Web/Compra.php';">Confirmar Registro</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>