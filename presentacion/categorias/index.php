<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'presentacion/categorias/frmListar.php';
  $FormValid = true;
  break;

  case 'nu':
  $Form = 'presentacion/categorias/frmNuevo.php';
  $FormValid = true;
  break;

  case 'ag':
  $Form = 'presentacion/categorias/agregar.php';
  $FormValid = true;
  break;

  case 'ed':
  $Form = 'presentacion/categorias/frmEditar.php';
  $FormValid = true;
  break;

  case 'ac':
  $Form = 'presentacion/categorias/actualizar.php';
  $FormValid = true;
  break;

  case 'el':
  $Form = 'presentacion/categorias/eliminar.php';
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
