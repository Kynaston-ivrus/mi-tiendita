<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/categorias.php';
//Instanciamos la clase
$Obj_Categorias = new Categorias();
//Asignación de atributos de la clase de la capa de negocio
$Obj_Categorias->Nombre = $_POST['txtNombreC'];
//Ejecutamos el mantenimiento de actualizar
if( $Obj_Categorias->Agregar() ) {
  //Si se ejecuta, redireccionamos al formulario de listar con mensaje update
  echo "<script>location.replace('index.php?mod=cat&form=li&m=update');</script>";
}
else {
  //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
  echo "<script>location.replace('index.php?mod=cat&form=li&m=error');</script>";
}
?>
