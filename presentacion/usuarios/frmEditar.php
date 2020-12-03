<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/usuarios.php';
//Instanciamos las clases de la capa de negocio
$Obj_Usuarios = new Usuarios();
//Cargamos el registro solicitado
$DatosUsuario = $Obj_Usuarios->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosUsuario as $Fila ) {
  $DatosUsuario = $Fila;
}
?>
<!-- CSS -->
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">
<form name="frmEditar" action="" method="post">
  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="form-row">
          <div class="col-md-8">
            <h2>Editar Usuario</h2>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-danger"
            onClick="location.replace('index.php?mod=usua&form=li');">
            <i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
            <button type="button" class="btn btn-success" onClick="ValidarEditar();">
            <i class="material-icons">&#xe161;</i><span>Guardar</span></button>
          </div>
        </div>
      </div>
      <!-- -------------------------- Fila 1 -------------------------- -->
      <div class="form-row">
        <div class="form-group col-md-8">
          <label>Nombre Completo: </label>
          <input type="text" class="form-control" id="txtNombreC"
          name="txtNombreC" value="<?php echo $Fila['NombreCompleto']; ?>">
          <input type="hidden" class="form-control" id="hidId" name="hidId"
          value="<?php echo $Fila['IdUsuario']; ?>">
        </div>
        <div class="form-group col-md-4">
          <label>Tipo: </label>
          <select id="cbxTipoC" name="cbxTipoC" class="form-control">
            <option value="<?php echo $Fila['TipoCuenta']; ?>"><?php echo
            $Fila['TipoCuenta']; ?></option>
            <option value="Vendedor">Vendedor</option>
            <option value="Usuario Limitado">Usuario Limitado</option>
            <option value="Administrador">Administrador</option>
          </select>
        </div>
      </div>
      <!-- -------------------------- Fila 2 -------------------------- -->
      <div class="form-row">
        <div class="form-group col-md-8">
          <label>Nombre de Usuario: </label>
          <input type="text" class="form-control" id="txtUsuario"
          name="txtUsuario" value="<?php echo $Fila['Usuario']; ?>" readonly>
        </div>
      </div> <!-- Cierre del Div table-wrapper -->
    </div> <!-- Cierre del Div container -->
  </form>
  <!-- -------------------- Validaciones de ingreso de datos -------------------- -->
  <script type="text/javascript">
  function ValidarEditar(){
    if ( !document.getElementById('txtNombreC').value ) {
      alert('Ingrese el nombre completo');
    }
    else if ( !document.getElementById('cbxTipoC').value ) {
      alert('Seleccione el tipo de cuenta');
    }
    else {
      document.forms.frmEditar.action = 'index.php?mod=usua&form=ac';
      document.forms.frmEditar.submit();
    }
  }
</script>
