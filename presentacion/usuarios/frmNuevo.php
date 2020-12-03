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
            <h2>Nuevo Usuario</h2>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-danger"
            onClick="location.replace('index.php?mod=usua&form=li');">
            <i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
            <button type="button" class="btn btn-success" onClick="ValidarNuevo();">
            <i class="material-icons">&#xe161;</i><span>Guardar</span></button>
          </div>
        </div>
      </div>
      <!-- -------------------------- Fila 1 -------------------------- -->
      <div class="form-row">
        <div class="form-group col-md-8">
          <label>Nombre Completo: </label>
          <input type="text" class="form-control" id="txtNombreC" name="txtNombreC">
        </div>
        <div class="form-group col-md-4">
          <label>Tipo de Cuenta: </label>
          <select id="cbxTipoC" name="cbxTipoC" class="form-control">
            <option value="">Seleccione...</option>
            <option value="Vendedor">Vendedor</option>
            <option value="Usuario Limitado">Usuario Limitado</option>
            <option value="Administrador">Administrador</option>
          </select>
        </div>
      </div>
      <!-- -------------------------- Fila 2 -------------------------- -->
      <div class="form-row">
        <div class="form-group col-md-8">
          <label>Nombre Usuario: </label>
          <input type="text" class="form-control" id="txtUsuario" name="txtUsuario">
        </div>
        <div class="form-group col-md-4">
          <label>Password: </label>
          <input type="password" class="form-control" id="txtPassword" name="txtPassword">
        </div>
      </div>
    </div> <!-- Cierre del Div table-wrapper -->
  </div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos -------------------- -->
<script type="text/javascript">
function ValidarNuevo(){
  if ( !document.getElementById('txtNombreC').value ) {
    alert('Ingrese el nombre completo');
  }
  else if ( !document.getElementById('cbxTipoC').value ) {
    alert('Seleccione el tipo de cuenta');
  }
  else if ( !document.getElementById('txtUsuario').value ) {
    alert('Ingrese el usuario');
  }
  else if ( !document.getElementById('txtPassword').value ) {
    alert('Ingrese el password');
  }
  else {
    document.forms.frmNuevo.action = 'index.php?mod=usua&form=ag';
    document.forms.frmNuevo.submit();
  }
}
</script>
