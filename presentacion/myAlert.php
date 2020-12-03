<style>
/* Estilos para las alertas */
.myAlertDanger, .myAlertSuccess, .myAlertInfo, .myAlertWarning {
    position: fixed;
    bottom: 20%;
    left: 10%;
    width: 80%;
}
.alert{
    display: none;
}

.alert-danger{
    background-color: #FF8A8C;
}

.alert-success{
    background-color: #B0E96F;
}

.alert-info{
    background-color: #ADDCF3;
}

.alert-warning{
    background-color: #E1EF7E;
}
</style>
<script type="text/javascript">
//Función de configuración
function myAlertDanger(){
    $(".myAlertDanger").show();
    setTimeout(function(){
    $(".myAlertDanger").hide(); 
    }, 3000);
}

function myAlertSuccess(){
    $(".myAlertSuccess").show();
    setTimeout(function(){
    $(".myAlertSuccess").hide(); 
    }, 3000);
}
    
function myAlertInfo(){
    $(".myAlertInfo").show();
    setTimeout(function(){
    $(".myAlertInfo").hide(); 
    }, 3000);
}
    
function myAlertWarning(){
    $(".myAlertWarning").show();
    setTimeout(function(){
    $(".myAlertWarning").hide(); 
    }, 3000);
}
</script>

<!-- -------------------- Div para alerta de error (danger) -------------------- -->
<div class="myAlertDanger alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>¡Error!</strong> El proceso no se pudo completar
</div>

<!-- -------------------- Div para alerta de correcto (success) -------------------- -->
<div class="myAlertSuccess alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>¡Éxito!</strong> El proceso se completó correctamante
</div>

<!-- -------------------- Div para alerta de información (info) -------------------- -->
<div class="myAlertInfo alert alert-info">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>¡Éxito!</strong> Actualización completada correctamente
</div>

<!-- -------------------- Div para alerta de eliminación (warning) -------------------- -->
<div class="myAlertWarning alert alert-warning">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>¡Éxito!</strong> Eliminación realizada correctamente
</div>

