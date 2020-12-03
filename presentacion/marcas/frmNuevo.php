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
            <h2>Nueva Marca</h2>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-danger"
            onClick="location.replace('index.php?mod=mrc&form=li');">
            <i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
            <button type="button" class="btn btn-success" onClick="ValidarNuevo();"><i
              class="material-icons">&#xe161;</i><span>Guardar</span></button>
            </div>
          </div>
        </div>
        <!--Fila 1 -->
        <div class="form-row">
          <div class="form-group col-md-8">
            <label>Nombre: </label>
            <input type="text" class="form-control" id="txtNombre" name="txtNombre">
          </div>
        </div>
      </div> <!-- Cierre del Div table-wrapper -->
    </div> <!-- Cierre del Div container -->
  </form>
  <!--  Validaciones de ingreso de datos --->
  <script type="text/javascript">
  function ValidarNuevo(){
    if ( !document.getElementById('txtNombre').value ) {
      alert('Ingrese el nombre de la nueva categoría');
    }
    else {
      document.forms.frmNuevo.action = 'index.php?mod=mrc&form=ag';
      document.forms.frmNuevo.submit();
    }
  }
</script>
