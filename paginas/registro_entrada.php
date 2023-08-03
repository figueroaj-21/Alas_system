<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Entradas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<form class="needs-validation" novalidate action="../php/procesar_entrada.php" method="GET">
  <?php
  // Incluye el archivo de conexión
  require_once '../php/conexion.php';

  // Obtiene el id_producto desde el método GET
  $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : 0;

  // Consulta para obtener el registro de la base de datos
  $sql = "SELECT p.id_producto, p.codigo, p.descripcion, p.existencia, p.id_proveedor, pr.nombre_proveedor 
          FROM tbl_productos p
          JOIN tbl_proveedores pr ON p.id_proveedor = pr.id_proveedor
          WHERE p.id_producto = $id_producto";

  // Ejecuta la consulta
  $result = mysqli_query($conexion, $sql);

  // Verifica si se encontró el registro
  if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      ?>

      <div class="mb-3">
        <label for="id_producto" class="form-label">ID</label>
        <input type="text" class="form-control" id="id_producto" name="id_producto" value="<?php echo $row['id_producto']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="codigo" class="form-label">Codigo</label>
        <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $row['codigo']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $row['descripcion']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="cantidad_entrada" class="form-label">Existencia</label>
        <input type="text" class="form-control" required id="cantidad_entrada" name="cantidad_entrada">
        <div class="valid-feedback">
          Ok.
        </div>
        <div class="invalid-feedback">
          Debe Ingresar su Existencia.
        </div>
      </div>
      <div class="mb-3">
        <label for="fecha_entrada" class="form-label">Fecha de Entrada</label>
        <input type="date" class="form-control" required id="fecha_entrada" name="fecha_entrada">
        <div class="valid-feedback">
          Ok.
        </div>
        <div class="invalid-feedback">
          Debe Ingresar una Fecha.
        </div>
      </div>
      <div class="mb-3">
        <label for="motivo_entrada" class="form-label">Motivo de Entrada</label>
        <input type="text" class="form-control" required id="motivo_entrada" name="motivo_entrada">
        <div class="valid-feedback">
          Ok.
        </div>
        <div class="invalid-feedback">
          Debe Ingresar un Motivo.
        </div>
      </div>
      <div class="mb-3">
        <label for="costo_producto" class="form-label">Costo</label>
        <input type="text" class="form-control" required id="costo_producto" name="costo_producto">
        <div class="valid-feedback">
          Ok.
        </div>
        <div class="invalid-feedback">
          Debe Ingresar un Costo.
        </div>
      </div>
      <div class="mb-3">
        <label for="nombre_proveedor" class="form-label">Proveedor</label>
        <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" value="<?php echo $row['nombre_proveedor']; ?>" readonly>
      </div>

      <?php
  } else {
      // Si no se encontró el registro, muestra un mensaje o realiza alguna otra acción
      echo 'No se encontró el producto.';
  }
  ?>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9


