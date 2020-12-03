<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/categorias.php';
//Instanciamos la clase
$Obj_Categorias = new Categorias();
//Ejecutamos el mantenimiento de eliminar
if( $Obj_Categorias->Eliminar( $_GET['id'] ) ) {
  //Si se ejecuta, redireccionamos al formulario de listar con mensaje success
  echo "<script>location.replace('index.php?mod=cat&form=li&m=delete');</script>";
}
else {
  //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
  echo "<script>location.replace('index.php?mod=cat&form=li&m=error');</script>";
}
?>
