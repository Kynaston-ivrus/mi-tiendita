<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'presentacion/marcas/frmListar.php';
  $FormValid = true;
  break;

  case 'nu':
  $Form = 'presentacion/marcas/frmNuevo.php';
  $FormValid = true;
  break;

  case 'ag':
  $Form = 'presentacion/marcas/agregar.php';
  $FormValid = true;
  break;

  case 'ed':
  $Form = 'presentacion/marcas/frmEditar.php';
  $FormValid = true;
  break;

  case 'ac':
  $Form = 'presentacion/marcas/actualizar.php';
  $FormValid = true;
  break;

  case 'el':
  $Form = 'presentacion/eliminar/eliminar.php';
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
