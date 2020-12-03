
<?php
session_start();

// ---------- Configuramos la zona horaria de El Salvador ----------
date_default_timezone_set("America/El_Salvador");
switch( @$_GET["mod"] ){
  case 'clie':
  $Modulo = 'presentacion/clientes/index.php';
  break;
  case 'prod':
  $Modulo = 'presentacion/productos/index.php';
  break;
  case 'cat':
  $Modulo = 'presentacion/categorias/index.php';
  break;
  case 'mrc':
  $Modulo = 'presentacion/marcas/index.php';
  break;
  case 'usua':
  $Modulo = 'presentacion/usuarios/index.php';
  break;
  case 'menu':
  $Modulo = 'presentacion/menu.php';
  break;
  default:	//Módulo por defecto
  $Modulo = 'presentacion/usuarios/frmLogin.php';
      break;
}
?>

<!--- Esta es la estructura HTML principal, en la cuál se cargarán todos los módulos
y formularios ----------->
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="Mi Tiendita" content="width=device-width, initial-scale=1.0">
  <title>Mi Tiendita</title>
  <meta name="author" content="UNIVO" />
  <link rel="shortcut icon" href="imagenes/logo.ico">
  <style>
  body {
    font-family: "Trebuchet MS", Arial, Helvetica;
  }
</style>
</head>
<body>
  <div id="DivMainIndex" style='position: relative; margin: 0 auto 0 auto;'>
    <?php
    // ---------- Llamadas a los archivos de módulos, según sean requeridos y evaluacios en el switch de arriba ----------
    require_once $Modulo;
    ?>
  </div>
</body>
</html>
