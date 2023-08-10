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
$sql_facturas = "SELECT id_usuario, login_usuario, cedula_usuario,
                        nombre_usuario, apellido_usuario, correo_usuario, direccion_usuario, nivel_usuario FROM tbl_usuarios WHERE estado_usuario = 1";

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
  <title>Consulta Usuarios</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/logoalas.ico" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://kit.fontawesome.com/068315295f.js" crossorigin="anonymous"></script>

   <script src="./jQuery-3.3.1/jquery-3.3.1.min.js"></script>

    <!-- Enlaces a Bootstrap 4 -->
    <link rel="stylesheet" href="./Bootstrap-4-4.1.1/css/bootstrap.min.css" />
    <script src="./Bootstrap-4-4.1.1/js/bootstrap.min.js"></script>

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

 <div class="container">
      <div class="col-md-12 col-md-offset-2">
        <h1>Usuarios</h1>
        <br>
        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Nuevo Usuario
        <i class="fa fa-plus"></i></a>
        <hr>

        <table
          id="tbl_usuarios"
          class="table table-striped table-hover dt-responsive nowrap display"
          style="width: 100%"
        >
          <thead>
            <tr>
              <th>ID</th>
              <th>Usuario</th>
              <th>Cedula</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Correo</th>
              <th>Dirección</th>
              <th>Nivel</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>ID</th>
              <th>Usuario</th>
              <th>Cedula</th>
              <th>Nombre</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Dirección</th>
              <th>Nivel</th>
              <th>Acciones</th>
            </tr>
          </tfoot>

          <tbody>

          <?php
                    $i = 1;
                    while($row_factura = mysqli_fetch_array($rcs_facturas, MYSQLI_ASSOC)) {
                    ?>
                        <tr>
                            <td class="fila_datos texto_cen"><?php echo $row_factura['id_usuario']; ?></td>
                            <td class="fila_datos texto_cen"><?php echo $row_factura['login_usuario']; ?></td>
                            <td class="fila_datos texto_der"><?php echo $row_factura['cedula_usuario']; ?></td>
                            <td class="fila_datos texto_cen"><?php echo $row_factura['nombre_usuario']; ?></td>
                            <td class="fila_datos texto_izq"><?php echo $row_factura['apellido_usuario']; ?></td>
                            <td class="fila_datos texto_izq"><?php echo $row_factura['correo_usuario']; ?></td>
                            <td class="fila_datos texto_izq"><?php echo $row_factura['direccion_usuario']; ?></td>
                            <td class="fila_datos texto_izq"><?php echo $row_factura['nivel_usuario']; ?></td>
                            <td class="fila_datos texto_izq"><a class="btn btn-outline-info" href="form_editar_usuario.php?id_usuario=<?php echo $row_factura['id_usuario']; ?>"><i class="fa-solid fa-user-pen"></i></a>
                            <a class="btn btn-outline-danger" href="#" title="Habilitar/Inhabilita el registro <?php echo $row_factura["login_usuario"]; ?>" onclick="inhabilitarUsuario(<?php echo $row_factura['id_usuario']; ?>)"><i class="fa-solid fa-user-lock"></i></a>
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

<!-- Modal de Registro de Provedor -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">

          <form class="needs-validation" novalidate action="../php/procesar-usuario3.php" method="POST">
            <div class="row mb-4">
              <label for="usuario" class="col-3 col-form-label">Usuario</label>
              <div class="col-9">
                <input type="text" class="form-control" required id="login_usuario" name="login_usuario">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar un Nombre de Usuario.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="clave_usuario" class="col-3 col-form-label">Clave</label>
              <div class="col-9">
                <input type="password" class="form-control" required id="clave_usuario" name="clave_usuario">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                 Debe Ingresar su Clave.
              </div>
                </div>
            </div>
            <div class="row mb-3">
              <label for="cedula_usuario" class="col-3 col-form-label">Cedula</label>
              <div class="col-9">
                <input type="text" class="form-control" required id="cedula_usuario" name="cedula_usuario">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar su Numero de Cédula.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="nombre_usuario" class="col-3 col-form-label">Nombre</label>
              <div class="col-9">
                <input type="text" class="form-control" required id="nombre_usuario" name="nombre_usuario">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar su Nombre.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="apellido_usuario" class="col-3 col-form-label">Apellido</label>
              <div class="col-9">
                <input type="text" class="form-control" required id="apellido_usuario" name="apellido_usuario">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                 Debe Ingresar su Apellido.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="correo_usuario" class="col-3 col-form-label">Correo</label>
              <div class="col-9">
                <input type="email" class="form-control" required id="correo_usuario" name="correo_usuario">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar su Correo.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="direccion_usuario" class="col-3 col-form-label">Dirección</label>
              <div class="col-9">
                <input type="text" class="form-control" required id="direccion_usuario" name="direccion_usuario">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar su Dirección.
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="nivel_usuario" class="col-3 col-form-label">Nivel</label>
              <div class="col-9">
                <select class="form-control" id="nivel_usuario" name="nivel_usuario">
				    <option value="1">Usuario</option>
				    <option value="2">Administrador</option>
				</select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="estado_usuario" class="col-3 col-form-label">Estado</label>
              <div class="col-9">
                <select class="form-control" id="estado_usuario" name="estado_usuario">
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
      function inhabilitarUsuario(idUsuario) {
        // Realizar una solicitud AJAX a un archivo PHP para habilitar/inhabilitar el registro

        const url = "../php/inhabilitar_usuario.php?id_usuario=" + idUsuario;
        
        // Realizar la solicitud AJAX
        fetch(url, { method: "POST" })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              // Si la operación fue exitosa, puedes realizar alguna acción aquí, como recargar la tabla de productos
              if (data.estado == 1) {
                alert("Usuario habilitado correctamente.");
              } else {
                alert("Usuario inhabilitado correctamente.");
              }
              window.location.reload(); // Recarga la página para reflejar los cambios
            } else {
              // Si la operación falló, muestra un mensaje de error
              alert("Error al cambiar el estado del Usuario. Inténtalo de nuevo más tarde.");
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

    