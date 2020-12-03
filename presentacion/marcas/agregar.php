<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/marcas.php';
//Instanciamos la clase
$Obj_Marcas = new Marcas();
//Asignación de atributos de la clase de la capa de negocio
$Obj_Marcas->Nombre = $_POST['txtNombre'];
//Ejecutamos el mantenimiento de actualizar
if( $Obj_Marcas->Agregar() ) {
  //Si se ejecuta, redireccionamos al formulario de listar con mensaje update
  echo "<script>location.replace('index.php?mod=mrc&form=li&m=update');</script>";
}
else {
  //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
  echo "<script>location.replace('index.php?mod=mrc&form=li&m=error');</script>";
}
?>
