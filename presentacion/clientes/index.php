<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'presentacion/clientes/frmListar.php';
  $FormValid = true;
  break;

  case 'nu':
  $Form = 'presentacion/clientes/frmNuevo.php';
  $FormValid = true;
  break;

  case 'ag':
  $Form = 'presentacion/clientes/agregar.php';
  $FormValid = true;
  break;

  case 'ed':
  $Form = 'presentacion/clientes/frmEditar.php';
  $FormValid = true;
  break;

  case 'ac':
  $Form = 'presentacion/clientes/actualizar.php';
  $FormValid = true;
  break;

  case 'de':
  $Form = 'presentacion/clientes/frmDetalles.php';
  $FormValid = true;
  break;

  case 'el':
  $Form = 'presentacion/clientes/eliminar.php';
  $FormValid = true;
  break;

  default:
  $FormValid = false;
  break;
}
//Llamadas a los archivos de formularios
if ( $FormValid  ){
  require_once $Form;
}
else {
  header('Location: error404.php');
}
?>
