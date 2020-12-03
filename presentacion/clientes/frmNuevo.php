<!-- CSS -->
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">
<form name="frmNuevo" action="" method="post">
  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="form-row">
          <div class="col-md-8">
            <h2>Nuevo Cliente</h2>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-danger"
            onClick="location.replace('index.php?mod=clie&form=li');">
            <i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
            <button type="button" class="btn btn-success" onClick="ValidarNuevo();"><i
              class="material-icons">&#xe161;</i><span>Guardar</span></button>
            </div>
          </div>
        </div>
        <!--Fila 1 -->
        <div class="form-row">
          <div class="form-group col-md-8">
            <label>Nombre Completo: </label>
            <input type="text" class="form-control" id="txtNombreC" name="txtNombreC">
          </div>
          <div class="form-group col-md-4">
            <label>Tipo: </label>
            <select id="cbxTipoC" name="cbxTipoC" class="form-control">
              <option value="">Seleccione...</option>
              <option value="CF">CF</option>
              <option value="CO">CO</option>
            </select>
          </div>
        </div>
        <!-- Fila 2 -->
        <div class="form-row">
          <div class="form-group col-md-8">
            <label>Dirección: </label>
            <input type="text" class="form-control" id="txtDireccion" name="txtDireccion">
          </div>
          <div class="form-group col-md-4">
            <label>Teléfono: </label>
            <input type="tel" class="form-control" id="txtTelefono" name="txtTelefono">
          </div>
        </div>
        <!-- Fila 3 -->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>DUI: </label>
            <input type="text" class="form-control" id="txtDUI" name="txtDUI">
          </div>
          <div class="form-group col-md-4">
            <label>NIT: </label>
            <input type="tel" class="form-control" id="txtNIT" name="txtNIT">
          </div>
          <div class="form-group col-md-4">
            <label>NRC: </label>
            <input type="tel" class="form-control" id="txtNRC" name="txtNRC">
          </div>
        </div>
      </div> <!-- Cierre del Div table-wrapper -->
    </div> <!-- Cierre del Div container -->
  </form>
  <!--  Validaciones de ingreso de datos --->
  <script type="text/javascript">
  function ValidarNuevo(){
    if ( !document.getElementById('txtNombreC').value ) {
      alert('Ingrese el nombre del cliente');
    }
    else if ( !document.getElementById('cbxTipoC').value ) {
      alert('Seleccione el tipo de cliente');
    }
    else if ( !document.getElementById('txtDireccion').value ) {
      alert('Ingrese la dirección del cliente');
    }
    else if ( document.getElementById('cbxTipoC').value == 'CO' &&
    !document.getElementById('txtNRC').value) {
      alert('Ingrese el NRC para este cliente de tipo contribuyente');
    }
    else if ( document.getElementById('cbxTipoC').value == 'CF' &&
    document.getElementById('txtNRC').value ) {
      alert('El NRC corresponde solo a clientes de tipo contribuyente');
    }
    else {
      document.forms.frmNuevo.action = 'index.php?mod=clie&form=ag';
      document.forms.frmNuevo.submit();
    }
  }
</script>
