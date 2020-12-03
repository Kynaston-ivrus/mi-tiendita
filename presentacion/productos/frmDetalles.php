<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/productos.php';
require_once 'negocio/categorias.php';
require_once 'negocio/marcas.php';
//Instanciamos las clases de la capa de negocio
$Obj_Productos = new Productos();
//Cargamos el registro del producto solicitado
$DatosProductos = $Obj_Productos->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosProductos as $FilaProducto ) {
  $DatosProductos = $FilaProducto;
}
?>
<!-- CSS -->
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">
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
<form name="frmEditar" action="" method="post">
  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="form-row">
          <div class="col-md-8">
            <h2>Detalle de Producto</h2>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-info"
            onClick="window.open('reportes/detalleProducto.php?id=<?php echo $_GET['id'] ?>',
            'ReporteDetProducto', 'width=1000,height=700');">
            <i class="material-icons">&#xe8ad;</i><span>Imprimir</span></button>
            <button type="button" class="btn btn-success"
            onClick="location.replace('index.php?mod=prod&form=li');">
            <i class="material-icons">&#xe5c4;</i><span>Regresar</span></button>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label>Nombre del Producto: </label>
          <input type="text" class="form-control" id="txtNombre" name="txtNombre"
          value="<?php echo $FilaProducto['NombreProducto']; ?>" readonly>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Categoria: </label>
          <input type="text" class="form-control" id="txtCategoria"
          name="txtCategoria" value="<?php echo $FilaProducto['NombreCategoria']; ?>"
          readonly>
        </div>
        <div class="form-group col-md-6">
          <label>Marca: </label>
          <input type="text" class="form-control" id="txtMarca" name="txtmarca"
          value="<?php echo $FilaProducto['NombreMarca']; ?>" readonly>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label>Detalles: </label>
          <textarea class="form-control" id="txtDetalles" name="txtDetalles"
          rows="3" readonly><?php echo $FilaProducto['Detalles']; ?></textarea>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label>Existencias: </label>
          <input type="number" class="form-control" id="txtExistencias"
          name="txtExistencias" value="<?php echo $FilaProducto['Existencias']; ?>"
          readonly>
        </div>
        <div class="form-group col-md-4">
          <label>Precio de Venta: </label>
          <input type="number" class="form-control" id="txtPrecioV"
          name="txtPrecioV" value="<?php echo $FilaProducto['PrecioVenta']; ?>" readonly>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-8">
          <label>Imágen Actual del Producto: </label>
          <div class="DivImgProducto">
            <!-- Observe la etiqueta img a continuación -->
            <img src="<?php
            if($FilaProducto['Imagen'] != ''){
              echo $FilaProducto['Imagen'];
            }
            else {
              echo "imagenes/img_productos/sin_imagen.png";
            }
            ?>">
          </div> <!-- Div para cargar la foto del producto -->
        </div>
      </div>
    </div> <!-- Cierre del Div table-wrapper -->
  </div> <!-- Cierre del Div container -->
</form>
