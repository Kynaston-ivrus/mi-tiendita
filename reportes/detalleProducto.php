<?php
//Llamamos a la capa de datos
require_once '../datos/datos.php';
//Llamamos a la capa de negocio
require_once '../negocio/productos.php';
//Instanciamos las clases de la capa de negocio
$Obj_Productos = new Productos();
//Cargamos el registro solicitado
$DatosProductos = $Obj_Productos->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosProductos as $Fila ) {
  $DatosProductos = $Fila;
}
?>
<html lang="es">
<head>
  <title>Detalle de Producto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/iconfont/material-icons.css">
  <link rel="stylesheet" href="../css/bootstrap-4.3.1.min.css">
  <style>
  table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;font-size: 14px;
  }
  /* Estilos para los botones (imprimir y cerrar) */
  .table-botones .btn {
    margin-top: 5px;
    margin-bottom: 5px;
  }
  .table-botones .btn {
    color: #fff;
    font-size: 13px;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 0px;
  }
  .table-botones .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
  }
  .table-botones .btn span {
    float: left;
    margin-top: 2px;
  }
  /* Esto es para que al imprimir en papel, no se impriman los botones del
  formulario (imprimir y cerrar) */
  @media print {
    .table-botones {
      display:none;
    }
  }
</style>
<!-- Los soguientes CSS son para formatear el div donde se carga la imagen del
producto -->
<style type="text/css">
.DivImgProducto {
  width: 100%;
  height: 300px;
  background: transparent;
  overflow: hidden;
}
.DivImgProducto img{
  width: auto;
  height: auto;
  background-repeat: no-repeat;
  background-size: contain;
}
@supports(object-fit: cover){
  .DivImgProducto img{
    height: 100%;
    object-fit: cover;
    object-position: center center;
  }
}
</style>
</head>
<body>
  <div class="container">
    <div class="table-botones">
      <div class="form-row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
          <button type="button" class="btn btn-info" onClick="window.print();">
            <i class="material-icons">&#xe8ad;</i><span>Imprimir</span></button>
            <button type="button" class="btn btn-danger" data-toggle="modal"
            onClick="window.close();">
            <i class="material-icons">&#xe879;</i><span>Cerrar</span></button>
          </div>
        </div>
      </div>
      <h3>Detalle de Productos</h3>
      <table width="100%" class="table table-borderless ">
        <tbody>
          <tr>
            <td width="20%"><strong>Nombre del Producto:</strong></td>
            <td colspan="3"><?php echo $Fila['NombreProducto']; ?></td>
          </tr>
          <tr>
            <td><strong>Categoría:</strong></td>
            <td width="41%"><?php echo $Fila['NombreCategoria']; ?></td>
            <td width="15%"><strong>Marca:</strong></td>
            <td width="24%"><?php echo $Fila['NombreMarca']; ?></td>
          </tr>
          <tr>
            <td><strong>Detalles:</strong></td>
            <td colspan="3"><?php echo $Fila['Detalles']; ?></td>
          </tr>
          <tr>
            <td><strong>Existencias:</strong></td>
            <td><?php echo $Fila['Existencias']; ?></td>
            <td><strong>Precio de Venta:</strong></td>
            <td><?php echo $Fila['PrecioVenta']; ?></td>
          </tr>
          <tr>
            <td><strong>Imagen del Producto:</strong></td>
            <td colspan="3"><div class="DivImgProducto"><!-- Observe la etiqueta img
              a continuación -->
              <img src="<?php
              if($Fila['Imagen'] != ''){
                echo '../'.$Fila['Imagen'];
              }
              else {
                echo "../imagenes/img_productos/sin_imagen.png";
              }
              ?>"></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </body>
    </html>
