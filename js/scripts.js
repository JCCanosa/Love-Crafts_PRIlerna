
// Condición formulario envio o recogida -> pago.php
let opcion = document.getElementById('opcion')
let formulario = document.getElementById('formulario-envio')

opcion.addEventListener('change', function(){
    if(opcion.value == 'Enviar'){
        formulario.style.display = 'block'
    } else {
        formulario.style.display = 'none'
    }
})
