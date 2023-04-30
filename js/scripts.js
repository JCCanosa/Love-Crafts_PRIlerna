
// Condición formulario envio o recogida -> pago.php
// Muestra el formulario cuando escogemos que se envie el pedido
let opcion = document.getElementById('opcion')
let formulario = document.getElementById('formulario-envio')

opcion.addEventListener('change', function(){
    if(opcion.value == 'Enviar'){
        formulario.style.display = 'block'
    } else {
        formulario.style.display = 'none'
    }
})
