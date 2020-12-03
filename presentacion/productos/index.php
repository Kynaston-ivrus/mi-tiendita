<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'presentacion/productos/frmListar.php';
  $FormValid = true;
  break;
  case 'nu':
  $Form = 'presentacion/productos/frmNuevo.php';
  $FormValid = true;
  break;
  case 'ag':
  $Form = 'presentacion/productos/agregar.php';
  $FormValid = true;
  break;
  case 'ed':
  $Form = 'presentacion/productos/frmEditar.php';
  $FormValid = true;
  break;
  case 'ac':
  $Form = 'presentacion/productos/actualizar.php';
  $FormValid = true;
  break;
  case 'de':
  $Form = 'presentacion/productos/frmDetalles.php';
  $FormValid = true;
  break;
  case 'el':
  $Form = 'presentacion/productos/eliminar.php';
  $FormValid = true;
  break;
  case 'fr':
  $Form = 'presentacion/productos/frmReabastecer.php';
  $FormValid = true;
  break;
  case 're':
  $Form = 'presentacion/productos/reabastecer.php';
  $FormValid = true;
  break;
  default:
  $FormValid = false;
  break;
}
//Llamadas a los archivos de formularios
if ( $FormValid ){
  require_once $Form;
}
else {
  header('Location: error404.php');
}
?>
