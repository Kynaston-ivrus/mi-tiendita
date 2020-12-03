<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/usuarios.php';
//Instanciamos la clase
$Obj_Usuarios = new Usuarios();
//Ejecutamos el mantenimiento de eliminar
if( $Obj_Usuarios->ReestablecerPassword( $_GET['id'] ) ) {
  //Si se ejecuta, redireccionamos al formulario de listar con mensaje success
  echo "<script>location.replace('index.php?mod=usua&form=li&m=update');</script>";
}
else {
  //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
  echo "<script>location.replace('index.php?mod=usua&form=li&m=error');</script>";
}
?>
