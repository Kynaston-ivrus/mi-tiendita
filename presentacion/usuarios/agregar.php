<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/usuarios.php';
//Instanciamos la clase de la capa de negocio
$Obj_Usuarios = new Usuarios();
//Asignación de atributos a la clase de la capa de negocio
$Obj_Usuarios->NombreCompleto = $_POST['txtNombreC'];
$Obj_Usuarios->TipoCuenta = $_POST['cbxTipoC'];
$Obj_Usuarios->Usuario = $_POST['txtUsuario'];
$Obj_Usuarios->Password = $_POST['txtPassword'];
//Ejecutamos el mantenimiento de agregar
if( $Obj_Usuarios->Agregar() ) {
  //Si se ejecuta, redireccionamos al formulario de listar con mensaje succes
  echo "<script>location.replace('index.php?mod=usua&form=li&m=success');</script>";
}
else {
  //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
  echo "<script>location.replace('index.php?mod=usua&form=li&m=error');</script>";
}
?>
