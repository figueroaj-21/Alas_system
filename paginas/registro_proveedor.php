<!doctype html>
<html lang="es">
<head>
  <title>Resgitro de Proveedores</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../css/styles_login.css" rel="stylesheet">
</head>
<body>
  <div class="login-box">
    <h2>Registro de Proveedores</h2>
    <form>
      <div class="user-box">
        <input type="text" name="rif_proveedor" id="rif_proveedor" required>
        <label for="rif_proveedor">Rif del Proveedor</label>
      </div>
      <div class="user-box">
        <input type="text" name="nombre_proveedor" id="nombre_proveedor" required>
        <label for="nombre_proveedor">Nombre del Proveedor</label>
      </div>
      <div class="user-box">
        <input type="number" name="persona_contacto" id="persona_contacto" required>
        <label for="persona_contacto">Persona de Contacto</label>
      <div class="user-box">
        <input type="email" name="correo_proveedor" id="correo_proveedor" required>
        <label for="correo_proveedor">E-Mail del Proveedor</label>
      </div>
      <div class="user-box">
        <input type="date" name="dia_pedido" id="dia_pedido" required>
        <label for="dia_pedido">Dia del Pedido</label>
      </div>
      <div class="user-box">
        <input type="date" name="dia_despacho" id="dia_despacho" required>
        <label for="dia_despacho">Dia del Despacho</label>
      </div>
      <div class="user-box">
        <input type="number" name="credito" id="credito" required>
        <label for="credito">Credito</label>
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
