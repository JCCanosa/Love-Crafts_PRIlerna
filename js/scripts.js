
// Condición formulario envio o recogida -> pago.php
// Muestra el formulario cuando escogemos que se envie el pedido
let opcion = document.getElementById('opcion')
let formulario = document.getElementById('formulario-envio')
let divRecogida = document.getElementById('recogida')

opcion.addEventListener('change', function(){
    if(opcion.value == 'Enviar'){
        formulario.style.display = 'block'
    } else if (opcion.value == 'Recoger') {
        divRecogida.style.display = 'block'
    } else {
        formulario.style.display = 'none'
        divRecogida.style.display = 'none'
    }
})


