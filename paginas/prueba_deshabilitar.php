<script>
function inhabilitarProducto(idProducto) {
  // Realizar una solicitud AJAX a un archivo PHP para deshabilitar el registro
  // Reemplaza "ruta_del_archivo_php" por la ruta real al archivo que realizará la deshabilitación
  // Por ejemplo, "../php/inhabilitar_producto.php"
  const url = "../php/inabilitar_producto.php" + idProducto;
  
  // Realizar la solicitud AJAX
  fetch(url, { method: "POST" })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Si la deshabilitación fue exitosa, puedes realizar alguna acción aquí, como recargar la tabla de productos
        alert("Producto inhabilitado correctamente.");
        window.location.reload(); // Recarga la página para reflejar los cambios
      } else {
        // Si la deshabilitación falló, muestra un mensaje de error
        alert("Error al inhabilitar el producto. Inténtalo de nuevo más tarde.");
      }
    })
    .catch(error => {
      console.error("Error al realizar la solicitud AJAX: ", error);
      alert("Ha ocurrido un error inesperado. Inténtalo de nuevo más tarde.");
    });
}
</script>



