<!doctype html>
<html lang="es">
<head>
  <title>Resgistro de Productos</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../css/styles_login.css" rel="stylesheet">
</head>
<body>
  <div class="login-box">
    <h2>Registro de Productos</h2>
    <form>
      <div class="user-box">
        <input type="text" name="codigo" id="codigo" required>
        <label for="codigo">Codigo</label>
      </div>
      <div class="user-box">
        <input type="text" name="clasificacion" id="clasificacion" required>
        <label for="clasificacion">Clasificacion</label>
      </div>
      <div class="user-box">
        <input type="text" name="descripcion" id="descripcion" required>
        <label for="descripcion">Descripcion</label>
      </div>
      <div class="user-box">
        <input type="number" name="precio" id="precio" required>
        <label for="precio">Precio</label>
      </div>
      <div class="user-box">
        <input type="number" name="existencia" id="existencia" required>
        <label for="existencia">Existencia</label>
      </div>
      <div class="user-box">
        <input type="text" name="observaciones" id="observaciones" required>
        <label for="observaciones">Observaiones</label>
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
