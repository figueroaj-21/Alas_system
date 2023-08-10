<?php require "../php/seguridad.php"; 
  require "../php/conexion.php"; 
  $nombre_usuario = $_SESSION['nombre_usuario'];
  $apellido_usuario = $_SESSION['apellido_usuario'];
  $login_usuario = $_SESSION['login_usuario'];
  $nivel_usuario = $_SESSION['nivel_usuario'];
?>
<?php
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
$sql_facturas = "SELECT id_proveedor, rif_proveedor, nombre_proveedor, numero_contacto,
                        persona_contacto, correo_proveedor FROM tbl_proveedores WHERE estado_proveedor = 1";

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
  <title>Consulta Proveedores</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/logoalas.ico" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../css/styles_nav.css" rel="stylesheet">
   <script src="./jQuery-3.3.1/jquery-3.3.1.min.js"></script>
   <script src="https://kit.fontawesome.com/068315295f.js" crossorigin="anonymous"></script>

    <!-- Enlaces a Bootstrap 4 -->
    <link rel="stylesheet" href="./Bootstrap-4-4.1.1/css/bootstrap.min.css" />
    <script src="./Bootstrap-4-4.1.1/js/bootstrap.min.js"></script>

    <!-- Enlaces a DataTables CSS y JS -->
    <link rel="stylesheet" href="./datatables.min.css" />
    <script src="./datatables.min.js"></script>

    <!-- Invoca y Traduce al metodo DataTable() -->
    <script>
      $(function () {
        $("#tbl_proveedores").DataTable({
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

 <div class="container">
      <div class="col-md-12 col-md-offset-2">
        <h1>Proveedores</h1>
        <br>
        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Nuevo Proveedor
        <i class="fa fa-plus"></i></a>
        <a href="#" target="_blank" class="btn btn-danger">PDF
        <i class="fa-solid fa-file-lines"></i></a>
        <hr>


        <table
          id="tbl_proveedores"
          class="table table-striped table-hover dt-responsive nowrap display"
          style="width: 100%"
        >
          <thead>
            <tr>
              <th>Rif</th>
              <th>Nombre</th>
              <th>Numero de Contacto</th>
              <th>Persona de Contacto</th>
              <th>Correo</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>Rif</th>
              <th>Nombre</th>
              <th>Numero de Contacto</th>
              <th>Persona de Contacto</th>
              <th>Correo</th>
              <th>Acciones</th>
            </tr>
          </tfoot>

          <tbody>

          <?php
                    $i = 1;
                    while($row_factura = mysqli_fetch_array($rcs_facturas, MYSQLI_ASSOC)) {
                    ?>
                        <tr>
                            <td class="fila_datos texto_cen"><?php echo $row_factura['rif_proveedor']; ?></td>
                            <td class="fila_datos texto_cen"><?php echo $row_factura['nombre_proveedor']; ?></td>
                            <td class="fila_datos texto_der"><?php echo $row_factura['numero_contacto']; ?></td>
                            <td class="fila_datos texto_cen"><?php echo $row_factura['persona_contacto']; ?></td>
                            <td class="fila_datos texto_izq"><?php echo $row_factura['correo_proveedor']; ?></td>
                            <td class="fila_datos texto_izq"><a class="btn btn-outline-info" href="editar_user.php?id=<?php echo $fila['id']?> "><i class="fa-solid fa-user-pen"></i></a>
                            <a class="btn btn-outline-danger" href="#" title="Inhabilita el registro <?php echo $row_factura["nombre_proveedor"]; ?>" onclick="inhabilitarProveedor(<?php echo $row_factura['id_proveedor']; ?>)">
                            <i class="fa-solid fa-user-large-slash"></i></a>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro Proveedor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">

          <form class="needs-validation" novalidate action="../php/procesar-proveedor2.php" method="POST">
            <div class="row mb-3">
              <label for="rif_proveedor" class="col-3 col-form-label">Rif Proveedor</label>
              <div class="col-9">
                <input type="text" class="form-control" id="rif_proveedor" required name="rif_proveedor">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar un Rif.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="nombre_proveedor" class="col-3 col-form-label">Nombre Proveedor</label>
              <div class="col-9">
                <input type="text" class="form-control" id="nombre_proveedor" required name="nombre_proveedor">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar un Nombre de Proveedor.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="persona_contacto" class="col-3 col-form-label">Persona Contacto</label>
              <div class="col-9">
                <input type="text" class="form-control" id="persona_contacto" required name="persona_contacto">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar una Persona de Contacto.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="numero_contacto" class="col-3 col-form-label">Numero de Contacto</label>
              <div class="col-9">
                <input type="text" class="form-control" id="numero_contacto" required name="numero_contacto">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar un Numero de Contacto.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="correo_proveedor" class="col-3 col-form-label">Correo Proveedor</label>
              <div class="col-9">
                <input type="email" class="form-control" id="correo_proveedor" required name="correo_proveedor">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar un Correo.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="estado_proveedor" class="col-3 col-form-label">Estado</label>
              <div class="col-9">
                <select class="form-control" id="estado_proveedor" name="estado_proveedor">
				    <option value="1">Habilitado</option>
				    <option value="0">Inhabilitado</option>
				</select>
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

<script>
function inhabilitarProveedor(idProveedor) {
  // Realizar una solicitud AJAX a un archivo PHP para habilitar/inhabilitar el registro

  const url = "../php/inhabilitar_proveedor.php?id_proveedor=" + idProveedor;
  
  // Realizar la solicitud AJAX
  fetch(url, { method: "POST" })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Si la operación fue exitosa, puedes realizar alguna acción aquí, como recargar la tabla de productos
        if (data.estado == 1) {
          alert("Proveedor habilitado correctamente.");
        } else {
          alert("Proveedor inhabilitado correctamente.");
        }
        window.location.reload(); // Recarga la página para reflejar los cambios
      } else {
        // Si la operación falló, muestra un mensaje de error
        alert("Error al cambiar el estado del proveedor. Inténtalo de nuevo más tarde.");
      }
    })
    .catch(error => {
      console.error("Error al realizar la solicitud AJAX: ", error);
      alert("Ha ocurrido un error inesperado. Inténtalo de nuevo más tarde.");
    });
}
</script>

</body>
</html>

    