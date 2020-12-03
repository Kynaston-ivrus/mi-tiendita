<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/productos.php';
//Instanciamos la clase de la capa de negocio
$Obj_Productos = new Productos();
//Asignación de atributos a la clase de la capa de negocio
$Obj_Productos->Nombre = $_POST['txtNombre'];
$Obj_Productos->IdMarca = $_POST['cbxMarca'];
$Obj_Productos->IdCategoria = $_POST['cbxCategoria'];
$Obj_Productos->Detalles = $_POST['txtDetalles'];
$Obj_Productos->Existencias = $_POST['txtExistencias'];
$Obj_Productos->PrecioVenta = $_POST['txtPrecioV'];
//Verificamos si se envío una imágen del producto
if ( isset( $_FILES['filImagenProd'] ) && $_FILES['filImagenProd']['tmp_name'] !=
'' ) {
  $NombreTemporalImg = $_FILES['filImagenProd']['tmp_name'];
  $TipoImg = $_FILES['filImagenProd']['type'];
  $NombreImg = "prod_".date("ymdhis");
  if( $TipoImg == 'image/png' ){
    $Extension = "png";
  }
  else if( $TipoImg == 'image/jpeg' ){
    $Extension = "jpg";
  }
  else {
    $Extension = '';
  }
  $NombreFinalImg = $NombreImg.'.'.$Extension;
  $UbicacionImg = 'imagenes/img_productos/'.$NombreFinalImg;
  copy( $NombreTemporalImg, $UbicacionImg );
  $Obj_Productos->Imagen = $UbicacionImg; //Acá se envía la ubicación final de la nueva imagen del producto
}
else { //Si el $_FILES['filImagenProd'] no lleva ningún archivo, significa que no se cambió la foto actual del producto
  $Obj_Productos->Imagen = $_POST['hidImagen'];
}
//Ejecutamos el mantenimiento de actualizar
if( $Obj_Productos->Actualizar( $_POST['hidId'] ) ) {
  //Si se ejecuta, redireccionamos al formulario de listar con mensaje update
  echo
  "<script>location.replace('index.php?mod=prod&form=li&m=update');</script>";
}
else {
  //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
  echo
  "<script>location.replace('index.php?mod=prod&form=li&m=error');</script>";
}
?>
