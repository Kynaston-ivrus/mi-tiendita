<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/clientes.php';
//Instanciamos la clase de la capa de negocio
$Obj_Clientes = new Clientes();
//Asignación de atributos a la clase de la capa de negocio
$Obj_Clientes->Nombre = $_POST['txtNombreC'];
$Obj_Clientes->Direccion = $_POST['txtDireccion'];
$Obj_Clientes->Tipo = $_POST['cbxTipoC'];
$Obj_Clientes->Telefono = $_POST['txtTelefono'];
$Obj_Clientes->DUI = $_POST['txtDUI'];
$Obj_Clientes->NIT = $_POST['txtNIT'];
$Obj_Clientes->NRC = $_POST['txtNRC'];
//Ejecutamos el mantenimiento de agregar
if( $Obj_Clientes->Agregar() ) {
  //Si se ejecuta, redireccionamos al formulario de listar con mensaje succes
  echo "<script>location.replace('index.php?mod=clie&form=li&m=success');</script>";
}
else {
  //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
  echo "<script>location.replace('index.php?mod=clie&form=li&m=error');</script>";
}
?>
