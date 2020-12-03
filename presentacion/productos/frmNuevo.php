<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/categorias.php';
require_once 'negocio/marcas.php';
//Instanciamos las clases de la capa de negocio
$Obj_Categorias = new Categorias();
$Obj_Marcas = new Marcas();
//Recuperamos los registros de las categorías y las marcas
$DatosCategorias = $Obj_Categorias->ListarTodoCombos();
$DatosMarcas = $Obj_Marcas->ListarTodoCombos();
?>
<!-- CSS -->
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">
<!-- acá es importante la propiedad enctype="multipart/form-data" porque usaremos un control
input file -->
<form name="frmNuevo" action="" method="post" enctype="multipart/form-data">
  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="form-row">
          <div class="col-md-8">
            <h2>Nuevo Producto</h2>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-danger"
            onClick="location.replace('index.php?mod=prod&form=li');">
            <i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
            <button type="button" class="btn btn-success" onClick="ValidarNuevo();"><i
              class="material-icons">&#xe161;</i><span>Guardar</span></button>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Nombre del Producto: </label>
            <input type="text" class="form-control" id="txtNombre" name="txtNombre">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Categoria: </label>
            <select id="cbxCategoria" name="cbxCategoria" class="form-control">
              <option value="">Seleccione...</option>
              <?php
              foreach ( $DatosCategorias as $FilaCategoria ) {
                ?>
                <option value="<?php echo $FilaCategoria['IdCategoria']; ?>"><?php echo
                $FilaCategoria['Nombre']; ?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label>Marca: </label>
            <select id="cbxMarca" name="cbxMarca" class="form-control">
              <option value="">Seleccione...</option>
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
            rows="3"></textarea>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Existencias: </label>
            <input type="number" class="form-control" id="txtExistencias"
            name="txtExistencias">
          </div>
          <div class="form-group col-md-4">
            <label>Precio de Venta: </label>
            <input type="number" class="form-control" id="txtPrecioV" name="txtPrecioV">
          </div>
          <div class="form-group col-md-4">
            <label>Imagen del Producto (PNG/JPG): </label>
            <input type="file" class="form-control-file" id="filImagenProd"
            name="filImagenProd">
          </div>
        </div>
      </div> <!-- Cierre del Div table-wrapper -->
    </div> <!-- Cierre del Div container -->
  </form>
  <!-- -------------------- Validaciones de ingreso de datos -------------------- -->
  <script type="text/javascript">
  function ValidarNuevo(){
    let Existencias = new Number(document.getElementById('txtExistencias').value);
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
      document.forms.frmNuevo.action = 'index.php?mod=prod&form=ag';
      document.forms.frmNuevo.submit();
    }
  }
</script>
