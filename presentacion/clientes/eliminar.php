<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/clientes.php';
//Instanciamos la clase
$Obj_Clientes = new Clientes();
//Ejecutamos el mantenimiento de eliminar
if( $Obj_Clientes->Eliminar( $_GET['id'] ) ) {
  //Si se ejecuta, redireccionamos al formulario de listar con mensaje success
  echo "<script>location.replace('index.php?mod=clie&form=li&m=delete');</script>";
}
else {
  //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
  echo "<script>location.replace('index.php?mod=clie&form=li&m=error');</script>";
}
?>
