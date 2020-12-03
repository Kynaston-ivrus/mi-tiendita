<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'presentacion/usuarios/frmListar.php';
  $FormValid = true;
  break;
  case 'nu':
  $Form = 'presentacion/usuarios/frmNuevo.php';
  $FormValid = true;
  break;
  case 'ag':
  $Form = 'presentacion/usuarios/agregar.php';
  $FormValid = true;
  break;
  case 'ed':
  $Form = 'presentacion/usuarios/frmEditar.php';
  $FormValid = true;
  break;
  case 'ac':
  $Form = 'presentacion/usuarios/actualizar.php';
  $FormValid = true;
  break;
  case 'rp':
  $Form = 'presentacion/usuarios/reestablecerPassword.php';
  $FormValid = true;
  break;
  case 'el':
  $Form = 'presentacion/usuarios/eliminar.php';
  $FormValid = true;
  break;
  case 'mc':
  $Form = 'presentacion/usuarios/frmMiCuenta.php';
  $FormValid = true;
  break;
  case 'cp':
  $Form = 'presentacion/usuarios/cambiarPassword.php';
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
