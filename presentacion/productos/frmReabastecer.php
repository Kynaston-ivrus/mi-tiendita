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
<form name="frmReabastecer" action="" method="post">
  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="form-row">
          <div class="col-md-8">
            <h2>Reabastecer Producto</h2>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-danger"
            onClick="location.replace('index.php?mod=prod&form=li');">
            <i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
            <button type="button" class="btn btn-success"
            onClick="ValidarReabastecer();">
            <i class="material-icons">&#xe161;</i><span>Guardar</span></button>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label>Nombre del Producto: </label>
          <input type="text" class="form-control" id="txtNombre" name="txtNombre"
          value="<?php echo $FilaProducto['NombreProducto']; ?>" readonly>
          <input type="hidden" class="form-control" id="hidId" name="hidId"
          value="<?php echo $FilaProducto['IdProducto']; ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Existencia Actual: </label>
          <input type="number" class="form-control" id="txtExistenciAct"
          name="txtExistenciAct" value="<?php echo $FilaProducto['Existencias']; ?>"
          readonly>
        </div>
        <div class="form-group col-md-6">
          <label>Cantidad a Agregar: </label>
          <input type="number" class="form-control" id="txtCantidadAgregar"
          name="txtCantidadAgregar" >
        </div>
      </div>
    </div> <!-- Cierre del Div table-wrapper -->
  </div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos -------------------- -->
<script type="text/javascript">
function ValidarReabastecer(){
  let CantidadAg = new
  Number(document.getElementById('txtCantidadAgregar').value);
  if ( CantidadAg <= 0 ) {
    alert('Ingrese la cantidad a reabastecer');
  }
  else {
    document.forms.frmReabastecer.action = 'index.php?mod=prod&form=re';
    document.forms.frmReabastecer.submit();
  }
}
</script>
