function validarTamano(inputid, mintam, maxtam) {
    var input = document.getElementById(inputid);
    var texto = input.value;
    if (texto.length < mintam) {
        input.setCustomValidity("El valor ingresado debe tener como mínimo " + mintam + " caracteres");
    } else if (texto.length > maxtam) {
        input.setCustomValidity("El valor ingresado debe tener como máximo " + maxtam + " caracteres");
    } else {
        input.setCustomValidity("");
    }
}

// Función para validar que el campo solo contenga caracteres numéricos
function validarNumeros(inputId) {
    var input = document.getElementById(inputId);
    var numIdentidad = input.value;

    if (!esNumero(numIdentidad)) {
        input.setCustomValidity("Este campo solo debe contener caracteres numéricos.");
    } else {
        input.setCustomValidity(""); // Restablece el mensaje de error personalizado
    }
}

// Función auxiliar para verificar si una cadena contiene solo números
function esNumero(cadena) {
    var regex = /^[0-9]+$/;
    return regex.test(cadena);
}
