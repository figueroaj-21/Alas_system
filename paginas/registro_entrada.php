<!doctype html>
<html lang="es">
<head>
  <title>Resgitro de Entrada</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../css/styles_login.css" rel="stylesheet">
</head>
<body>
  <div class="login-box">
    <h2>Registro de Entrada<h2>
    <form>
      <div class="user-box">
        <input type="date" name="fecha_entrada" id="fecha_entrada" required>
        <label for="fecha_entrada">Fecha de Entrada del Producto</label>
      </div>
      <div class="user-box">
        <input type="number" name="cantidad_entrada" id="cantidad_entrada" required>
        <label for="cantidad_salida">Cantidad de Entrada del Producto</label>
      </div>
      <div class="user-box">
        <input type="number" name="factura_ent" id="factura_ent" required>
        <label for="factura_ent">Numero de Factura</label>
      </div>
      <div class="user-box">
        <input type="text" name="id_proveedor" id="id_proveedor" required>
        <label for="id_proveedor">Nombre del Proveedor</label>
      </div>
      <div class="user-box">
        <input type="id_producto" name="id_producto" id="id_producto" required>
        <label for="id_producto">Codigo del Producto</label>
      </div>
      <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Submit
      </a>
    </form>
  </div>
</body>
</html>
