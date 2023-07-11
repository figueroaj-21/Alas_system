 /** validacion_login.js */

/**
 * Al hacer click sobre el botón Enviar (btn_enviar), 
 * se activa un controlador de eventos (addEventListener)
 * y se ejecuta el código escrito en la función anónima ( function(){} )
 */

document.getElementById('btn_enviar').addEventListener('click', function() {
    
    // Asigna a variables los identificadores de cada campo del formulario
    let v_usuario  = document.getElementById('usuario');
    let v_password  = document.getElementById('password');
    let v_form    = document.getElementById('loginForm');
    
    /*** Evalúa los campos del formulario ***/

    if( v_usuario.value === '' ) {             // Si el campo Nombre está vacío

        // Emite un mensaje al usuario
        alert('Por favor, introduzca su Usuario');
        usuario.focus();
        return false;

    } else if( v_password.value === '' ) {      // Si el campo Correo está vacío

        alert('Por favor, introduzca su Contraseña');
        password.focus();
        return false;

    }

});











