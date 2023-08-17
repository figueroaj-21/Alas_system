<?php require "../php/seguridad.php";  
  require "../php/conexion.php";
  $nombre_usuario = $_SESSION['nombre_usuario'];
  $apellido_usuario = $_SESSION['apellido_usuario'];
  $login_usuario = $_SESSION['login_usuario'];
  $nivel_usuario = $_SESSION['nivel_usuario'];
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ayuda Online</title>

  <link rel="shortcut icon" type="image/x-icon" href="../img/logoalas.ico" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>

  <?php require "../html/nav2.html"; ?>
<a name="inicio"></a>
<div class="container" style="margin-top: 110px;">
    <h2>Ayuda del Sistema</h2>    
    <ul id="indice">
        <li><a href="#ingreso">Ingreso al Sistema</a></li>
        <li><a href="#home">Consulta Productos/Home</a></li>
        <li><a href="#consulta_clasificacion">Consulta Clasificación</a></li>
        <li><a href="#consulta_proveedores">Consulta Proveedores</a></li>
        <li><a href="#reportes">Reportes</a>
            <ol>
                <li><a href="#productos_en_stock_minimo"><small>Productos en Stock Mínimo</small></a></li>
                <li><a href="#entradas_por_periodo"><small>Entradas por Periodo</small></a></li>
                <li><a href="#salidas_por_periodo"><small>Salidas por Periodo</small></a></li>
            </ol>
        </li>
        <li><a href="#mantenimiento">Mantenimiento</a>
            <ol>
                <li><a href="#gestionar_usuarios"><small>Gestionar Usuarios</small></a></li>
                <li><a href="#usuario_inhabilitado"><small>Usuarios Inhabilitados</small></a></li>
                <li><a href="#respaldar_basedatos"><small>Respaldar Base de Datos</small></a></li>
                <li><a href="#bitacora"><small>Bit&aacute;cora del Sistema</small></a></li>
            </ol>
        </li>
        <li><a href="#inhabilitados">Inhabilitados</a>
            <ol>
                <li><a href="#productos_inhabilitados"><small>Productos Inhabilitados</small></a></li>
                <li><a href="#proveedores_inhablitados"><small>Proveedores Inhabilitados</small></a></li>
            </ol>
        <li><a href="#cambio_contraseña">Cambio de Contraseña</a>
    </ul>
</div>

<a name="ingreso"></a>
<div class="container" style="padding-top: 120px;">
    <h2>Ingreso al Sistema</h2>
    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>
    <p class="small">En esta página los usuarios deberán colocar su nombre de usuario y la contraseña en los campos señalados, es importante destacar dos cosas:
		1. El usuarios debe estar previamente registrado por un usuario administrador.
		2. El usuarios debe estar habilitado, de los contrario, el sistema arrojará el mensaje “Su Usuario ha sido Inhabilitado” Y no podrá iniciar sesión.</p>
    <img src="../img_ayuda/index.png" class="img-rounded" style="float:right; padding:10px;" width="300px" height="auto" alt="inicio_sesion.png" />
</div>
<br>
<br>
<br>
<a name="home"></a>
<div class="container" style="padding-top: 120px;">
    <h2>Home/Consulta Productos</h2>
    <img src="../img_ayuda/Home.png" class="img-rounded" style="float:left; padding:10px;" width="450px" height="auto" alt="home.png" />
    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>
    <p class="small">En esta página Home/Consulta Productos el usuario tendrá acceso a la tabla donde están registrados todos los productos existentes, podrá observar en la misma el:ID, Codigo, Clasificacion, Descripcion, Observaciones, Costo, Existencia, Stock Minimo y Proveedor de la tabla productos de cada producto.</p>

    <p class="small">La tabla cuenta con un buscador donde el usuario puede buscar producto por su: colocar campos de la tabla producto, un botón para mostrar el número de filas que desea ver en la tabla, botones de "siguiente" o "anterior" para deslizarse por cada una de las páginas de la tabla y unas pequeñas flechas que pueden ordenar de forma alfabética ascendente o descendente según los campos de la tabla.</p>

    <p class="small">La tabla posee un botón para “Nuevo Producto” donde al hacer click se desplegará el formulario “Registro Productos” en dicho formulario el usuario deberá ingresar Codigo, Clasificacion, Descripcion, Costo, Existencia Inicial, Stock Minimo, Proveedor, Observaciones y Estado siendo el campo Observaciones el único que puede dejar en blanco si así lo desea, el resto de campos son obligatorios, es importante mencionar que para registrar un nuevo producto, debe haber registros de una clasificacion y proveedor para dicho producto, tambien si el producto ya se encuentra registrado el sistema arrojara el mensaje "Producto ya registrado". Al lado del botón nuevo producto se haya el botón “PDF” este botón generara un reporte en formato PDF de la tabla productos que luego el usuario puede reimprimir o guardar en la nube.	
    </p>

    <p class="small"> <b>Acciones de la tabla Consulta Productos</b>
    </p>

    <p class="small">	<b>Entrada de Productos:</b> en este botón registrará las entradas de los productos, es importante mencionar que este botón hará entrada para el producto de esa fila.
    </p>

    <p class="small">	<b>Salida de Productos:</b> en este botón se registrará la salida de los productos, es importante mencionar que este botón hará salida para el producto de esa fila.
    </p>

    <p class="small">	<b>Editar Producto:</b> al hacer click en este botón se despliega el formulario donde podrá editar colocar los campos del formulario, dichos cambios serán actualizados y mostrados en la tabla.
    </p>

    <p class="small">
		<b>Inhabilitar Productos:</b> en este botón podrá cambiar el estado del producto a inhabilitado, automáticamente el producto dejara de mostrarse en la tabla Consulta Productos/Home para pasar a la tabla Productos Inhabilitados.
    </p>

    <div class="container" style="margin-top: 110px;">

    <h2>Consulta Clasificación</h2>
    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>
    <a name="consulta_clasificacion"></a>
    <img src="../img_ayuda/ConsultaClasificacion.png" class="img-rounded" style="float:right; padding:10px;" width="550px" height="auto" alt="consulta_clasificacin.png" />
    <p class="small">En esta página Consulta Clasificación el usuario tendrá acceso a la tabla donde están registrados todas las clasificaciones existentes, podrá observar en la misma todas las clasificaciones existentes.</p>

    <p class="small">La tabla cuenta con un buscador donde el usuario puede buscar la clasificación por su: colocar campos de la tabla producto, un botón para mostrar el número de filas que desea ver en la tabla, botones de "siguiente" o "anterior" para deslizarse por cada una de las páginas de la tabla y unas flechas que pueden ordenar de forma alfabética ascendente o descendente según los campos de la tabla.</p>

    <p class="small">La tabla posee un botón para “Nueva Clasificación” donde al hacer click se desplegará el formulario “Registro Clasificacion” en dicho formulario el usuario deberá ingresar el nombre de la nueva clasificacion donde el campo es obligatorio , al lado del botón nueva clasificación se haya el botón “PDF” este botón generara un reporte en formato PDF de la tabla clasificación que luego el usuario puede reimprimir o guardar en la nube.</p>

    <div class="container" style="margin-top: 110px;">

	<h2>Consulta Proveedores</h2>
	<p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>
  	<a name="consulta_proveedores"></a>
    <img src="../img_ayuda/ConsultaProveedores.png" class="img-rounded" style="float:right; padding:10px;" width="550px" height="auto" alt="consulta_proveedores.png" />
    <p class="small">En esta página Consulta Proveedores el usuario tendrá acceso a la tabla donde están registrados todos los proveedores existentes, podrá observar en la misma el:RIF, Nombre del proveedor, Numero de contacto, persona de contacto y el Correo del proveedor.</p>

    <p class="small">La tabla cuenta con un buscador donde el usuario puede buscar al proveedor por su: RIF, Nombre del proveedor, Numero de contacto, persona de contacto y el Correo del proveedor de la tabla proveedor, un botón para mostrar el número de filas que desea ver en la tabla, botones de "siguiente" o "anterior" para deslizarse por cada una de las páginas de la tabla y unas flechas que pueden ordenar de forma alfabética ascendente o descendente según los campos de la tabla.</p>

    <p class="small">La tabla posee un botón para “Nuevo Proveedor” donde al hacer click se desplegará el formulario “Registro Proveedor” en dicho formulario el usuario deberá ingresar RIF del proveedor, Nombre del proveedor, Numero de contacto, Persona de contato, Correo proveedor y el Estado del proveedor siendo todos los campos obligatorios, al lado del botón nuevo proveedor se haya el botón “PDF” este botón generara un reporte en formato PDF de la tabla proveedores que luego el usuario puede reimprimir o guardar en la nube.</p>

    <p class="small"><b>Acciones de la tabla Proveedores</b></p>

   <p class="small"><b>Editar Proveedor:</b> al hacer click en este botón se despliega el formulario donde podrá editar colocar los campos del formulario, dichos cambios serán actualizados y mostrados en la tabla.</p>

   <p class="small"><b>Inhabilitar Proveedores:</b> en este botón podrá cambiar el estado del proveedor a inhabilitado, automáticamente el proveedor dejara de mostrarse en la tabla Consulta Proveedor para pasar a la tabla Proveedores Inhabilitados.</p>

    <div class="container" style="margin-top: 110px;">

    <h2>Reportes</h2>

    <a name="reporte"></a>

    <h4>Productos en Stock Mínimo</h4>
    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>
    <a name="productos_en_stock_minimo"></a>

    <p class="small"> En esta página Productos Bajo Stock Minimo el usuario tendrá acceso a la tabla donde están registrados todos los productos cuya existecia se encuentra por debajo de su stock minimo, podrá observar en la misma el: Codigo, Clasificacion, Descripcion, Costo, Existencia y Stock Minimo de cada producto.</p>
 
    <img src="../img_ayuda/productos_stock_minimo.png" class="img-rounded" style="float:right; padding:10px;" width="350px" height="auto" alt="productos_stock_minimo.png" />

    <p class="small"> La tabla cuenta con un buscador donde el usuario puede buscar productos por su: Codigo, Clasificacion, Descripcion, Costo, Existencia y Stock Minimo, un botón para mostrar el número de filas que desea ver en la tabla, botones de "siguiente" o "anterior" para deslizarse por cada una de las páginas de la tabla y unas flechas que pueden ordenar de forma alfabética ascendente o descendente según los campos de la tabla.</p>

    <p class="small"> El botón “PDF” generara un reporte en formato PDF de la tabla Productos Bajo Stock Minimo que luego el usuario puede reimprimir o guardar en la nube.</p>


    <h4>Reporte de Entradas por Periodo</h4>
    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>
    <a name="entradas_por_periodo"></a>

    <p class="small">En este apartado el usuario debera ingresar la fecha en la que quiere gnerar la consulta, desde XX/XX/XXXX hasta XX/XX/XXXX luego hacer click en el boton de "Generar Reporte" para generar el reporte deseado.</p>

    <p class="small">La tabla cuenta con un buscador donde el usuario puede buscar productos por su: Codigo, Fecha de Entrada, Cantidad de Entrada y Numero de Factura, un botón para mostrar el número de filas que desea ver en la tabla, botones de "siguiente" o "anterior" para deslizarse por cada una de las páginas de la tabla y unas flechas que pueden ordenar de forma alfabética ascendente o descendente según los campos de la tabla</p>

    <p class="small">El botón “PDF” generara un reporte en formato PDF de la tabla Entradas por Periodo que luego el usuario puede reimprimir o guardar en la nube.</p>


    <h4>Reporte de Salidas por Periodo</h4>
    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>
    <a name="salidas_por_periodo"></a>

    <p class="small">En este apartado el usuario debera ingresar la fecha en la que quiere gnerar la consulta, desde XX/XX/XXXX hasta XX/XX/XXXX luego hacer click en el boton de "Generar Reporte" para generar el reporte deseado.</p>

	<p class="small">La tabla cuenta con un buscador donde el usuario puede buscar productos por su: Codigo, Fecha de Salida, Cantidad de Salida y Numero de Factura, un botón para mostrar el número de filas que desea ver en la tabla, botones de "siguiente" o "anterior" para deslizarse por cada una de las páginas de la tabla y unas flechas que pueden ordenar de forma alfabética ascendente o descendente según los campos de la tabla</p>

    <p class="small">El botón “PDF” generara un reporte en formato PDF de la tabla Salidas por Periodo que luego el usuario puede reimprimir o guardar en la nube.</p>


    <div class="container" style="margin-top: 110px;">

    <h2>Mantenimiento</h2>

    <a name="mantenimiento"></a>

    <h4>Gestionar Usuario/Consulta Usuarios</h4>
    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>
    <a name="gestionar_usuarios"></a>

    <p class="small"> En esta página Consulta Usuarios/Gestionar Usuarios el usuario tendrá acceso a la tabla donde están registrados todos los usuarios existentes, podrá observar en la misma el: ID, Usuario, Cedula, Nombre, Apellido, Correo, Direccion y Nivel de cada usuario registrado.</p>

    <p class="small">La tabla cuenta con un buscador donde el usuario puede buscar a otro usuario por su: colocar campos de la tabla usuarios, un botón para mostrar el número de filas que desea ver en la tabla, botones de "siguiente" o "anterior" para deslizarse por cada una de las páginas de la tabla y unas flechas que pueden ordenar de forma alfabética ascendente o descendente según los campos de la tabla.</p>

    <p class="small">La tabla posee un botón para “Nuevo Usuario” donde al hacer click se desplegará el formulario “Registro Usuario” en dicho formulario el usuario deberá ingresar: Usuario, Clave, Cedula, Nombre, Apellido, Correo, Direccion, Nivel y Estado del usuario  siendo todos los campos obligatorios, al lado del botón nuevo usuario se haya el botón “PDF” este botón generara un reporte en formato PDF de la tabla usuarios que luego el usuario puede reimprimir o guardar en la nube.</p>

    <img src="../img_ayuda/GestionarUsuario.png" class="img-rounded" style="float:left; padding:10px;" width="450px" height="auto" alt="gestionar_usuarios.png" />
    <p class="small"><b>Acciones de la tabla Consulta Usuarios</b></p>

    <p class="small"><b>Editar Usuario:</b>  al hacer click en este botón se despliega el formulario donde podrá editar colocar los campos del formulario, dichos cambios serán actualizados y mostrados en la tabla.</p>

    <p class="small"><b>Inhabilitar Usuario:</b> en este botón podrá cambiar el estado del usuario a inhabilitado, automáticamente el usuario dejara de mostrarse en la tabla Consulta Usuarios para pasar a la tabla Usuarios Inhabilitados.</p>

    <h4>Usuarios Inhabilitado</h4>
    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>
    <a name="usuario_inhabilitado"></a>

    <p class="small">En esta página Usuarios Inhabilitados el usuario tendrá acceso a la tabla donde se encuentran todos los usuarios que han sido inhabilitados, podrá observar en la misma el: colocar los campos de la tabla usuarios de cada usuario inhabilitados.</p>

    <p class="small">La tabla cuenta con un buscador donde el usuario puede buscar a otro usuario por su: colocar campos de la tabla usuarios, un botón para mostrar el número de filas que desea ver en la tabla, botones de "siguiente" o "anterior" para deslizarse por cada una de las páginas de la tabla y unas flechas que pueden ordenar de forma alfabética ascendente o descendente según los campos de la tabla.</p>

    <p class="small">El botón “PDF” generara un reporte en formato PDF de la tabla Usuarios Inhabilitados que luego el usuario puede reimprimir o guardar en la nube.</p>

    <p class="small"><b>Acciones de la tabla Usuarios Inhabilitados</b></p>

    <p class="small">Habilitar Usuario: en este botón podrá cambiar el estado del usuario a habilitado, automáticamente el usuario dejara de mostrarse en la tabla Usuarios Inhabilitados para pasar a la tabla Consulta Usuarios.</p>


    <h4>Respaldo/Restauración de la Base de Datos</h4>
    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>
    <a name="respaldar_basedatos"></a>

    <img src="../img_ayuda/RespaldarBaseDeDatos.png" class="img-rounded" style="float:right; padding:10px;" width="450px" height="auto" alt="respaldo_de_la_base_de_datos.png" />
    <p class="small"> En esta página el usuario puede respaldar la base de datos haciendo click en el boton "Respaldar Base de Datos" de igual forma puede restaurar la misma desplegando el campo, ecoger la ultima opcion guardada y haciendo click en el boton "Restaurar" para cargar la base de datos, al mismo tiempo la pagina posee un boton "volver a Home" para regresar a la pagina de inicio.</p>
    <br>
    <br>
    <br>
    <br>
    <h4>Bit&aacute;cora del Sistema</h4>
    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>
    <a name="bitacora"></a>

    <img src="../img_ayuda/BitacoraDelSistema.png" class="img-rounded" style="float:left; padding:10px;" width="350px" height="auto" alt="item_nueva_entrada.png" />
    <p class="small">En esta pagina se encuentra la Bitacora del sistema, en esta tabla se documenta cada acción realizada por el usuario o administrador, identificándolo y dejando un registro detallado de cada acción realizada sin excepción.</p>

    <p class="small">La tabla cuenta con un buscador donde el usuario puede buscar a otro usuario por su: ID de la auditoria, Usuario, Fecha y Accion efectuada, un botón para mostrar el número de filas que desea ver en la tabla, botones de "siguiente" o "anterior" para deslizarse por cada una de las páginas de la tabla y unas flechas que pueden ordenar de forma alfabética ascendente o descendente según los campos de la tabla.</p>

    <p class="small">El botón “PDF” generara un reporte en formato PDF de la tabla Bitacora del Sistema que luego el usuario puede reimprimir o guardar en la nube.</p>
</div>

<div class="container" style="margin-top: 110px;">
	<a name="inhabilitados"></a>
    <h2>Inhabilitados</h2>
    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>

    <h4>Productos Inhabilitados</h4>
   	<a name="productos_inhabilitados"></a>

    <p class="small">En esta página Productos Inhabilitados el usuario tendrá acceso a la tabla donde se encuentran todos los productos que han sido inhabilitados, podrá observar en la misma el: ID, Codigo, Clasificacion, Descripcion, Observaciones, Costo, Existencia, Stock Minimo y Proveedor de la tabla productos inhabilitados.</p>

    <p class="small">La tabla cuenta con un buscador donde el usuario puede buscar un producto inhabilitado por su: ID, Codigo, Clasificacion, Descripcion, Observaciones, Costo, Existencia, Stock Minimo y Proveedor de la tabla poductos inhabilitados, un botón para mostrar el número de filas que desea ver en la tabla, botones de "siguiente" o "anterior" para deslizarse por cada una de las páginas de la tabla y unas flechas que pueden ordenar de forma alfabética ascendente o descendente según los campos de la tabla.</p>

    <p class="small">El botón “PDF” generara un reporte en formato PDF de la tabla Productos Inhabilitados que luego el usuario puede reimprimir o guardar en la nube.</p>

    <p class="small"><b>Acciones de la tabla Productos Inhabilitados</b></p>

    <p class="small">Habilitar Producto: en este botón podrá cambiar el estado del producto a habilitado, automáticamente el producto dejara de mostrarse en la tabla Productos Inhabilitados para pasar a la tabla Consulta Productos.</p>

    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>

    <h4>Proveedores Inhabilitados</h4>
   	<a name="proveedores_inhablitados"></a>

    <p class="small">En esta página Proveedores Inhabilitados el usuario tendrá acceso a la tabla donde se encuentran todos los proveedores que han sido inhabilitados, podrá observar en la misma el: RIF, Nombre, Numero de Contacto, Persona de Contacto y Correo de los proveedores de la tabla proveedores inhabilitados.</p>

    <p class="small">La tabla cuenta con un buscador donde el usuario puede buscar al proveedor inhabilitado por su: RIF, Nombre, Numero de Contacto, Persona de Contacto y Correo de los proveedores de la tabla proveedores inhabilitados, un botón para mostrar el número de filas que desea ver en la tabla, botones de "siguiente" o "anterior" para deslizarse por cada una de las páginas de la tabla y unas flechas que pueden ordenar de forma alfabética ascendente o descendente según los campos de la tabla.</p>

    <p class="small">El botón “PDF” generara un reporte en formato PDF de la tabla Proveedores Inhabilitados que luego el usuario puede reimprimir o guardar en la nube.</p>

    <p class="small"><b>Acciones de la tabla Proveedores Inhabilitados</b></p>

    <p class="small">Habilitar Proveedor: en este botón podrá cambiar el estado del proveedor a habilitado, automáticamente el proveedor dejara de mostrarse en la tabla Proveedor Inhabilitados para pasar a la tabla Consulta Proveedor.</p>

    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>

    <h4>Cambio de Contraseña</h4>
   	<a name="cambio_contraseña"></a>

    <p class="small">En esta página Cambio de contraseña el usuario con sesión activa debera ingresar su actual contraseña posteriormente introducir la nueva contraseña, confirmar la nueva contraseña en el siguiente campo, de lo contrario el cambio de contraseña no sera realizado.</p>

    <p><a href="#inicio">Ir al inicio de la p&aacute;gina</a></p>

</body>
</html>