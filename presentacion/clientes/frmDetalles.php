<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/clientes.php';
//Instanciamos las clases de la capa de negocio
$Obj_Clientes = new Clientes();
//Cargamos el registro solicitado
$DatosCliente = $Obj_Clientes->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosCliente as $Fila ) {
  $DatosCliente = $Fila;
}
?>
<!-- CSS -->
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">
<div class="container">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="form-row">
        <div class="col-md-8">
          <h2>Detalles de Cliente</h2>
        </div>
        <div class="col-md-4">
          <button type="button" class="btn btn-info" onclick="window.open('reportes/detalleCliente.php?id=<?php echo $_GET['id'] ?>', 'ReporteDetCliente', 'width=1000,height=600');">
            <i class="material-icons">&#xe8ad;</i><span>Imprimir</span></button>
            <button type="button" class="btn btn-success"
            onClick="location.replace('index.php?mod=clie&form=li');">
            <i class="material-icons">&#xe5c4;</i><span>Regresar</span></button>
          </div>
        </div>
      </div>
      <!-- Fila 1-->
      <div class="form-row">
        <div class="form-group col-md-8">
          <label>Nombre Completo: </label>
          <input type="text" class="form-control" id="txtNombreC" name="txtNombreC" readonly
          value="<?php echo $Fila['Nombre']; ?>">
        </div>
        <div class="form-group col-md-4">
          <label>Tipo: </label>
          <input type="text" class="form-control" id="txtTipo" name="txtTipo" readonly
          value="<?php echo $Fila['Tipo']; ?>">
        </div>
      </div>
      <!--  Fila 2 -->
      <div class="form-row">
        <div class="form-group col-md-8">
          <label>Dirección: </label>
          <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" readonly
          value="<?php echo $Fila['Direccion']; ?>">
        </div>
        <div class="form-group col-md-4">
          <label>Teléfono: </label>
          <input type="tel" class="form-control" id="txtTelefono" name="txtTelefono" readonly
          value="<?php echo $Fila['Telefono']; ?>">
        </div>
      </div>
      <!-- Fila 3 -->
      <div class="form-row">
        <div class="form-group col-md-4">
          <label>DUI: </label>
          <input type="text" class="form-control" id="txtDUI" name="txtDUI" readonly value="<?php
          echo $Fila['DUI']; ?>">
        </div>
        <div class="form-group col-md-4">
          <label>NIT: </label>
          <input type="tel" class="form-control" id="txtNIT" name="txtNIT" readonly value="<?php
          echo $Fila['NIT']; ?>">
        </div>
        <div class="form-group col-md-4">
          <label>NRC: </label>
          <input type="tel" class="form-control" id="txtNRC" name="txtNRC" readonly value="<?php
          echo $Fila['NRC']; ?>">
        </div>
      </div>
    </div> <!-- Cierre del Div table-wrapper -->
  </div> <!-- Cierre del Div container -->
