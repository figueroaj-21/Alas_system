<?php require "../php/seguridad.php";  
  require "../php/conexion.php";
  $nombre_usuario = $_SESSION['nombre_usuario'];
  $apellido_usuario = $_SESSION['apellido_usuario'];
  $login_usuario = $_SESSION['login_usuario'];
  //$tipo_rol = $_SESSION['tipo_rol'];
  
/**
 * connect_struct_consulta_basedatos.php
 *
 * 1. Establece conexión a un gestor de bases de datos
 * 2. Estructura una consulta SQL
 * 3. Ejecuta la consulta
 * 4. Obtiene el total de registros devueltos
 * 5. Muestra los registros devueltos por la consulta
 * 6. Libera la memoria utilizada
 * 7. Cierra la conexión al gestor de bases de datos
 */

// 1. Establece conexión a un gestor de bases de datos MySQL


// 2. Estructura una consulta SQL
//    Muestra las facturas y sus clientes, ordenadas por número de factura, en orden descendente
$sql_facturas = "SELECT p.codigo, c.clasificacion, p.descripcion, p.observaciones, p.costo, p.existencia, pr.nombre_proveedor FROM tbl_productos p JOIN tbl_clasificacion c ON p.id_clasificacion = c.id_clasificacion JOIN tbl_proveedores pr ON p.id_proveedor = pr.id_proveedor";

// 3. Ejecuta la consulta y almacena el resultado devuelto en la variable $rcs_facturas
$rcs_facturas = mysqli_query($conexion, $sql_facturas) or die("Error al consultar facturas: " . mysqli_error($conexion));

// 4. Obtiene la cantidad de registros devueltos
$num_reg = mysqli_num_rows($rcs_facturas);

/* 5. Muestra los registros devueltos por la consulta */

// 5.1 Evalúa el total de registros devueltos
//     Asigna a la variable $muestra_tabla el valor devuelto al evaluar la condición
//     Utiliza un Operador Ternario
$muestra_tabla = ($num_reg > 0) ? true : false;
?>
<!doctype html>
<html lang="es">
<head>
  <title>Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Botones -->
    <script src="https://kit.fontawesome.com/068315295f.js" crossorigin="anonymous"></script>
     <script src="./jQuery-3.3.1/jquery-3.3.1.min.js"></script>

    <!-- Enlaces a Bootstrap 4 -->
        <script src="./Bootstrap-4-4.1.1/js/bootstrap.min.js"></script>

    <!-- Enlace a Bootstrap web-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Enlaces a DataTables CSS y JS -->
    <link rel="stylesheet" href="./datatables.min.css" />
    <script src="./datatables.min.js"></script>

    <!-- Invoca y Traduce al metodo DataTable() -->
    <script>
      $(function () {
        $("#tbl_usuarios").DataTable({
          language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla =(",
            sInfo:
              "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty:
              "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
              sFirst: "Primero",
              sLast: "Último",
              sNext: "Siguiente",
              sPrevious: "Anterior",
            },
            oAria: {
              sSortAscending:
                ": Activar para ordenar la columna de manera ascendente",
              sSortDescending:
                ": Activar para ordenar la columna de manera descendente",
            },
            buttons: {
              copy: "Copiar",
              colvis: "Visibilidad",
            },
            decimal: ",",
            thousands: ".",
          },
          lengthMenu: [
            [10, 20, 30, 50, -1],
            [10, 20, 30, 50, "Todos"],
          ],
        });
      });
    </script>

    <style>
      div.container {
        margin-top: 80px;
        max-width: 1200px;
      }
    </style>
</head>
<body>

  <?php require "../html/nav2.html"; ?>
  <?php require "../html/modal_entrada.html"; ?>
  <?php require "../html/modal_salida.html"; ?>
  <?php require "../html/modal_editar_producto.html"; ?>


 <div class="container">
      <div class="col-md-12 col-md-offset-2">
        <h1>Productos</h1>
        <br>
        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Nuevo Producto
        <i class="fa fa-plus"></i></a>
        <a href="../reportes/reporte_productos.php" target="_blank" class="btn btn-danger">PDF
        <i class="fa-solid fa-file-lines"></i></a>
        <hr>

        <table
          id="tbl_usuarios"
          class="table table-striped table-hover dt-responsive nowrap display"
          style="width: 100%"
        >
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Clasificacion</th>
              <th>Descripcion</th>
              <th>Observaciones</th>
              <th>Costo</th>
              <th>Exitencia</th>
              <th>Proveedor</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>Codigo</th>
              <th>Clasificacion</th>
              <th>Descripcion</th>
              <th>Observaciones</th>
              <th>Costo</th>
              <th>Existencia</th>
              <th>Proveedor</th>
              <th>Acciones</th>
            </tr>
          </tfoot>

          <tbody>

          <?php
                    $i = 1;
                    while($row_factura = mysqli_fetch_array($rcs_facturas, MYSQLI_ASSOC)) {
                    ?>
                        <tr>
                            <td class=""><?php echo $row_factura['codigo']; ?></td>
                            <td class=""><?php echo $row_factura['clasificacion']; ?></td>
                            <td class=""><?php echo $row_factura['descripcion']; ?></td>
                            <td class=""><?php echo $row_factura['observaciones']; ?></td>
                            <td class=""><?php echo $row_factura['costo']; ?></td>
                            <td class=""><?php echo $row_factura['existencia']; ?></td>
                            <td class=""><?php echo $row_factura['nombre_proveedor']; ?></td>
                            <td class=""><a  class="btn btn-outline-success" href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-regular fa-square-plus"></i></a>
                            <a class="btn btn-outline-danger" href="" data-bs-toggle="modal" data-bs-target="#exampleModalsalida"><i class="fa-regular fa-square-minus"></i></a>
                            <a class="btn btn-outline-warning" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop_editarproducto"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a class="btn btn-outline-dark" href="eliminar_user.php?id=<?php echo $fila['id']?>"><i class="fa-solid fa-ban"></i></a> 
                        	</td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>

          </tbody>
        </table>
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro Producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">

          <form class="needs-validation" novalidate action="../php/procesar-producto2.php" method="POST">
            <div class="row mb-4">
              <label for="codigo" class="col-3 col-form-label">Codigo</label>
              <div class="col-9">
                <input type="text" class="form-control" required id="codigo" name="codigo">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar un Codigo.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="clasificacion" class="col-3 col-form-label">Clasificación</label>
              <div class="col-9">
				  <select class="form-control" required name="id_clasificacion" id="id_clasificacion">
				  <?php
				  // Incluye el archivo de conexión
				  require_once '../php/conexion.php';

				  // Consulta para obtener los registros de la base de datos
				  $sql = "SELECT id_clasificacion, clasificacion FROM tbl_clasificacion"; 

				  // Ejecuta la consulta
				  $result = mysqli_query($conexion, $sql);

				  // Verifica si hay registros y crea las opciones
				  if (mysqli_num_rows($result) > 0) {
				    while ($row = mysqli_fetch_assoc($result)) {
				      // Verifica si el valor de id_clasificacion coincide con el valor actual de la iteración
				      $selected = ($_POST['id_clasificacion'] == $row['id_clasificacion']) ? 'selected' : '';

				      // Agrega el atributo 'selected' si corresponde
				      echo '<option value="' . $row['id_clasificacion'] . '" ' . $selected . '>' . $row['clasificacion'] . '</option>';
				    }
				  } else {
				    echo '<option value="">No hay registros disponibles</option>';
				  }
				  ?>
				</select>
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                 Debe Ingresar su Clasificación.
              </div>
                </div>
            </div>
            <div class="row mb-3">
              <label for="descripcion" class="col-3 col-form-label">Descripción</label>
              <div class="col-9">
                <input type="text" class="form-control" required id="descripcion" name="descripcion">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar una Descripción.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="costo" class="col-3 col-form-label">Costo</label>
              <div class="col-9">
                <input type="text" class="form-control" required id="costo" name="costo">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar su Costo.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="existencia" class="col-3 col-form-label">Existencia Inicial</label>
              <div class="col-9">
                <input type="text" class="form-control" required id="existencia" name="existencia">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                 Debe Ingresar su Existencia.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="nombre_proveedor" class="col-3 col-form-label">Proveedor</label>
              <div class="col-9">
                <select class="form-control" required name="id_proveedor" id="id_proveedor">
                	<?php
			            // Incluye el archivo de conexión
			            require_once '../php/conexion.php';

			            // Consulta para obtener los registros de la base de datos
			            $sql = "SELECT id_proveedor, nombre_proveedor FROM tbl_proveedores"; 

			            // Ejecuta la consulta
			            $result = mysqli_query($conexion, $sql);

			            // Verifica si hay registros y crea las opciones
			            if (mysqli_num_rows($result) > 0) {
						    while ($row = mysqli_fetch_assoc($result)) {
						      // Verifica si el valor de id_clasificacion coincide con el valor actual de la iteración
						      $selected = ($_POST['id_proveedor'] == $row['id_proveedor']) ? 'selected' : '';

						      // Agrega el atributo 'selected' si corresponde
						      echo '<option value="' . $row['id_proveedor'] . '" ' . $selected . '>' . $row['nombre_proveedor'] . '</option>';
						    }
						 } else {
						    echo '<option value="">No hay registros disponibles</option>';
						 }
			            // Cierra la conexión
			            mysqli_close($conexion);
			            ?>
                </select>
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                 Debe Ingresar su Proveedor.
              </div>
                </div>
            </div>
            <div class="row mb-3">
              <label for="observaciones" class="col-3 col-form-label">Observaciones</label>
              <div class="col-9">
                <input type="text" class="form-control" id="observaciones" name="observaciones">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Confirmar</button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

</script>

  

</body>
</html>

    