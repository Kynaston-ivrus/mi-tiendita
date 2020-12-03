<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/paginador.php';
require_once 'negocio/marcas.php';
//Instanciamos las clases de la capa de negocio
$Obj_Paginador = new Paginador();
$Obj_Marcas = new Marcas();

//Asignamos los valores necesatrios a los atributos de la clase del paginador -----------------------------------------
$Obj_Paginador->Cadena = $Obj_Marcas->ListarTodos( addslashes( @$_POST['txtBuscar'] ) );
$Obj_Paginador->CantTotalReg = $Obj_Marcas->CantTotalRegistros( addslashes( @$_POST['txtBuscar']
) );
$Obj_Paginador->FilasPorPagina = 5; //Define la cantidad de registros mostrados por página
$Obj_Paginador->NumPagina = @$_GET['np']; //Define la página solicitada al paginador
$Obj_Paginador->EnlaceListar = "mod=mrc&form=li"; //Define el enlace al modulo y formulario listar de ese módulo
//Aplicamos la configuración al paginador
$Obj_Paginador->ConfPaginador();
//Fin de configuraciones del paginador --------------------------------------------------------------------------------
?>
<!-- CSS -->
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">
<!-- JS -->
<script src="js/jquery-3.4.0.min.js"></script>
<script src="js/bootstrap-4.3.1.min.js"></script>
<div class="container">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="form-row">
        <div class="col-md-4">
          <a href="index.php?mod=mrc&form=li" class="a-titulo-form"><h2>Gestión de
            <b>Marcas</b></h2></a>
          </div>
          <div class="col-md-3">
            <div class="input-group">
              <!-- Acá usamos un formulario, que solo contiene el input text para la búsqueda, se hace así
              porque la
              búsqueda se efectúa al hacer POST enviado el tecxto del input text -->
              <form action="" method="post">
                <div class="input-group-append">
                  <input type="text" class="form-control" placeholder="Buscar..." name="txtBuscar"
                  id="txtBuscar" value="<?php echo @$_POST['txtBuscar']; ?>">
                  <button class="btn btn-info" type="submit" style="margin-left: -3px; height: 38px;">
                    <i class="material-icons">&#xe8b6;</i>
                  </button>
                </div>
              </form>
            </div>
          </div>
          <!-- En esta columna colocamos los botones de acción principales, a los cuales les hemos agregado
          íconos
          incluidos en el archivo "material-icons.css" referenciado arriba en este archivo -->
          <div class="col-md-5">
            <button type="button" class="btn btn-danger" data-toggle="modal"
            onClick="location.replace('index.php?mod=menu');">
            <i class="material-icons">&#xe879;</i><span>Cerrar</span></button>
              <button type="button" class="btn btn-success" onclick="location.replace('index.php?mod=mrc&form=nu');">
                <i class="material-icons">&#xe148;</i><span>Agregar Nueva</span></button>
              </div>
            </div>
          </div>
          <?php
          //----------------------------------- Mostramos los controles (botones) del paginador ----------------------------------
          echo $Obj_Paginador->MostrarControles();
          ?>
          <br>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Recperamos los registros de la tabla (vienen de la clase paginador) y los mostramos en la tabla HTML
              foreach ( $Obj_Paginador->RegistrosPaginados as $Fila ) {
                ?>
                <tr>
                  <td><?php echo $Fila['Nombre']; ?></td>
                  <td>
                    <a href="index.php?mod=mrc&form=ed&id=<?php echo $Fila['IdMarca'];?>" class="edit"><i class="material-icons" data-toggle="tooltip"
                      title="Editar">&#xE254;</i></a>
                      <a href="#" class="delete" onclick="Eliminar('<?php echo $Fila['IdMarca']; ?>');"><i class="material-icons" data-toggle="tooltip"
                        title="Eliminar">&#xE872;</i></a>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div> <!-- Cierre del Div table-wrapper -->
          </div> <!-- Cierre del Div container -->
          <script type="text/javascript">
            function Eliminar(paId){
              if(confirm('¿Confirma eliminar este registro?')){
                window.location.replace('index.php?mod=mrc&form=el&id=' + paId);
              }
            }
          </script>
          <?php
          //Llamamos a la capa de presentación, para las alertas que darán información al ejecutarse los mantenimientos
          require_once 'presentacion/myAlert.php';
          //-- -------------------- Opciones para las alertas -------------------- --
          //-- Si la url lleva una variable "m", significa mensaje, se mostrará según lo que sea solicitado
          if ( isset( $_GET['m'] ) ) {
            if ( $_GET['m'] == 'success' ) {
              echo "<script>myAlertSuccess();</script>";
            }
            else if ( $_GET['m'] == 'error' ) {
              echo "<script>myAlertDanger();</script>";
            }
            else if ( $_GET['m'] == 'update' ) {
              echo "<script>myAlertInfo();</script>";
            }
            else if ( $_GET['m'] == 'delete' ) {
              echo "<script>myAlertWarning();</script>";
            }
          }
          ?>
