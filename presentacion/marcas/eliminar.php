<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/marcas.php';
//Instanciamos la clase
$Obj_Marcas = new Marcas();
//Ejecutamos el mantenimiento de eliminar
if( $Obj_Marcas->Eliminar( $_GET['id'] ) ) {
  //Si se ejecuta, redireccionamos al formulario de listar con mensaje success
  echo "<script>location.replace('index.php?mod=mrc&form=li&m=delete');</script>";
}
else {
  //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
  echo "<script>location.replace('index.php?mod=mrc&form=li&m=error');</script>";
}
?>
