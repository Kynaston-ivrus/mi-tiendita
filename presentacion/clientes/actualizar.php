<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/clientes.php';
//Instanciamos la clase
$Obj_Clientes = new Clientes();
//Asignación de atributos de la clase de la capa de negocio
$Obj_Clientes->Nombre = $_POST['txtNombreC'];
$Obj_Clientes->Direccion = $_POST['txtDireccion'];
$Obj_Clientes->Tipo = $_POST['cbxTipoC'];
$Obj_Clientes->Telefono = $_POST['txtTelefono'];
$Obj_Clientes->DUI = $_POST['txtDUI'];
$Obj_Clientes->NIT = $_POST['txtNIT'];
$Obj_Clientes->NRC = $_POST['txtNRC'];
//Ejecutamos el mantenimiento de actualizar
if( $Obj_Clientes->Actualizar( $_POST['hidId'] ) ) {
  //Si se ejecuta, redireccionamos al formulario de listar con mensaje update
  echo "<script>location.replace('index.php?mod=clie&form=li&m=update');</script>";
}
else {
  //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
  echo "<script>location.replace('index.php?mod=clie&form=li&m=error');</script>";
}
?>
