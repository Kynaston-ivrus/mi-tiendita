<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/usuarios.php';
//Instanciamos la clase
$Obj_Usuarios = new Usuarios();
//Asignación de atributos de la clase de la capa de negocio
$Obj_Usuarios->NombreCompleto = $_POST['txtNombreC'];
$Obj_Usuarios->TipoCuenta = $_POST['cbxTipoC'];
//Ejecutamos el mantenimiento de actualizar
if( $Obj_Usuarios->Actualizar( $_POST['hidId'] ) ) {
  //Si se ejecuta, redireccionamos al formulario de listar con mensaje update
  echo "<script>location.replace('index.php?mod=usua&form=li&m=update');</script>";
}
else {
  //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
  echo "<script>location.replace('index.php?mod=usua&form=li&m=error');</script>";
}
?>
