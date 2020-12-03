<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/productos.php';
require_once 'negocio/categorias.php';
require_once 'negocio/marcas.php';
//Instanciamos las clases de la capa de negocio
$Obj_Productos = new Productos();
$Obj_Categorias = new Categorias();
$Obj_Marcas = new Marcas();
//Cargamos el registro del producto solicitado
$DatosProductos = $Obj_Productos->BuscarPorId( $_GET['id'] );
//Recuperamos los registros de las categorías y las marcas, para los combos
$DatosCategorias = $Obj_Categorias->ListarTodoCombos();
$DatosMarcas = $Obj_Marcas->ListarTodoCombos();
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
            <h2>Editar Producto</h2>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-danger"
            onClick="location.replace('index.php?mod=prod&form=li');">
            <i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
            <button type="button" class="btn btn-success"
            onClick="ValidarEditar();">
            <i class="material-icons">&#xe161;</i><span>Guardar</span></button>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label>Nombre del Producto: </label>
          <input type="text" class="form-control" id="txtNombre" name="txtNombre"
          value="<?php echo $FilaProducto['NombreProducto']; ?>">
          <input type="hidden" class="form-control" id="hidId" name="hidId"
          value="<?php echo $FilaProducto['IdProducto']; ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Categoria: </label>
          <select id="cbxCategoria" name="cbxCategoria" class="form-control">
            <option value="<?php echo $FilaProducto['IdCategoria']; ?>"><?php
            echo $FilaProducto['NombreCategoria']; ?></option>
            <?php
            foreach ( $DatosCategorias as $FilaCategoria ) {
              ?>
              <option value="<?php echo $FilaCategoria['IdCategoria']; ?>"><?php
              echo $FilaCategoria['Nombre']; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>Marca: </label>
          <select id="cbxMarca" name="cbxMarca" class="form-control">
            <option value="<?php echo $FilaProducto['IdMarca']; ?>"><?php echo
            $FilaProducto['NombreMarca']; ?></option>
            <?php
            foreach ( $DatosMarcas as $FilaMarca ) {
              ?>
              <option value="<?php echo $FilaMarca['IdMarca']; ?>"><?php echo
              $FilaMarca['Nombre']; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label>Detalles: </label>
          <textarea class="form-control" id="txtDetalles" name="txtDetalles"
          rows="3"><?php echo $FilaProducto['Detalles']; ?></textarea>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label>Existencias: </label>
          <input type="number" class="form-control" id="txtExistencias"
          name="txtExistencias" value="<?php echo $FilaProducto['Existencias']; ?>">
        </div>
        <div class="form-group col-md-4">
          <label>Precio de Venta: </label>
          <input type="number" class="form-control" id="txtPrecioV"
          name="txtPrecioV" value="<?php echo $FilaProducto['PrecioVenta']; ?>">
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
            <input type="hidden" class="form-control" id="hidImagen"
            name="hidImagen" value="<?php echo $FilaProducto['Imagen']; ?>">
          </div> <!-- Div para cargar la foto del producto -->
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label>Nueva Imagen del Producto (PNG/JPG): </label>
          <input type="file" class="form-control-file" id="filImagenProd"
          name="filImagenProd">
        </div>
      </div>
    </div> <!-- Cierre del Div table-wrapper -->
  </div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos -------------------- -->
<script type="text/javascript">
function ValidarEditar(){
  let Existencias = new
  Number(document.getElementById('txtExistencias').value);
  let PrecioV = new Number(document.getElementById('txtPrecioV').value);
  if ( !document.getElementById('txtNombre').value ) {
    alert('Ingrese el nombre del producto');
  }
  else if ( !document.getElementById('cbxCategoria').value ) {
    alert('Seleccione la cetogoría del producto');
  }
  else if ( !document.getElementById('cbxMarca').value ) {
    alert('Seleccione la marca del producto');
  }
  else if ( !document.getElementById('txtDetalles').value ) {
    alert('Ingrese la descripción del producto');
  }
  else if ( Existencias <= 0 ) {
    alert('Ingrese un valor de existencias del producto');
  }
  else if ( PrecioV <= 0 ) {
    alert('Ingrese el precio de venta del producto');
  }
  else {
    document.forms.frmEditar.action = 'index.php?mod=prod&form=ac';
    document.forms.frmEditar.submit();
  }
}
</script>
