//inicio-----------------------
function pruebaContinuar() {
    alert("¡Bienvenido, podras realizar comprar con FLY-SAVER!");
    confirmacion = document.getElementById("confirmacion").value;
    window.location.href = "../Web/Compra.html";

}
var Precio;
//Para mostar mediante el MOdal los datos del usuario en el FORMULARIO HORIZONTAL
document.getElementById('mostrarDatosBtn').addEventListener('click', function () {
    var usuario = document.getElementById('dato1').value;
    var Fecha_Salida = document.getElementById('dato2').value;
    var Fecha_Llegada = document.getElementById('dato3').value;
    var Pasajeros = Number(document.getElementById('dato4').value);
    var kids = Number(document.getElementById('dato5').value);
    Precio = (100 * kids) + (110 * Pasajeros);


    if (usuario && Fecha_Salida && Fecha_Llegada && Pasajeros > 0 && kids >= 0) {

        document.getElementById('MostrarUsuario').textContent = 'Su Nombre de Usuario es: ' + usuario;
        document.getElementById('MostrarPartida').textContent = 'La fecha de Salida elegida es: ' + Fecha_Salida;
        document.getElementById('MostrarLlegada').textContent = 'La fecha de Llegada es: ' + Fecha_Llegada;
        document.getElementById('MostrarPasajeros').textContent = 'La cantidad de Pasajeros es: ' + Pasajeros;
        document.getElementById('MostrarNinos').textContent = 'La cantidad de Niños es: ' + kids;
        document.getElementById('MostrarPrecio').textContent = 'El precio a pagar es $' + Precio;

    } else {
        alert("Todos los datos deben estar LLENOS!");
        return;
    }
    var Mostrando_Modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
    Mostrando_Modal.show();
});
//Registro-----------------------
document.getElementById('registro-form').addEventListener('submit', function (event) {
    const password = document.getElementById('contraseña').value;
    const confirmPassword = document.getElementById('confirmar-contraseña').value;

    if (password !== confirmPassword) {
        alert('Las contraseñas no coinciden.');
        event.preventDefault(); // Evita el envío del formulario
    }
});