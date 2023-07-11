/**
 * funciones_jquery.js
 */


    
$(function () {
    
    $('#loginForm').submit(function () { 
       // e.preventDefault();

        // Define e inicializa variables
        let v_usuario = $('#usuario');
        let v_password = $('#password');

        // Evalúa el contenido de los campos del formulario
        if ( v_usuario.val() === '' ) {

            alert('Por favor, introduzca su Usuario');
            v_usuario.focus();
            return (false);

        } else if ( v_password.val() === '' ) {

            alert('Por favor, introduzca su Contraseña');
            v_password.focus();
            return (false);

        }
        
    });
    
});