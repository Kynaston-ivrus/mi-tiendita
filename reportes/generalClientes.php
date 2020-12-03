<?php
//Llamamos a la capa de datos
require_once '../datos/datos.php';
//Llamamos a la capa de negocio
require_once '../negocio/clientes.php';
//Instanciamos las clases de la capa de negocio
$Obj_Clientes = new Clientes();
//Recuperamos los registros de la tabla
$DatosCliente = $Obj_Clientes->ListarTodoReporte();
?>
<html lang="es">
<head>
  <title>Reporte General de Clientes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/iconfont/material-icons.css">
  <link rel="stylesheet" href="../css/bootstrap-4.3.1.min.css">
  <style>
  table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;font-size: 14px;
  }
  /* Estilos para los botones (imprimir y cerrar) */
  .table-botones .btn {
    margin-top: 5px;
    margin-bottom: 5px;
  }
  .table-botones .btn {
    color: #fff;
    font-size: 13px;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 0px;
  }
  .table-botones .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
  }
  .table-botones .btn span {
    float: left;
    margin-top: 2px;
  }
  /* Esto es para que al imprimir en papel, no se impriman los botones del formulario (imprimir y cerrar) */
  @media print {
    .table-botones {
      display:none;
    }
  }
  </style>
</head>

<body>
  <div class="container">
    <div class="table-botones">
      <div class="form-row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
          <button type="button" class="btn btn-info" onClick="window.print();">
            <i class="material-icons">&#xe8ad;</i><span>Imprimir</span></button>
            <button type="button" class="btn btn-danger" data-toggle="modal"
            onClick="window.close();">
            <i class="material-icons">&#xe879;</i><span>Cerrar</span></button>
          </div>
        </div>
      </div>
      <h3>Reporte General de Clientes</h3>
      <table width="100%" class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo</th>
            <th scope="col">Dirección</th>
            <th scope="col">Teléfono</th>
            <th scope="col">DUI</th>
            <th scope="col">NIT</th>
            <th scope="col">NRC</th>
          </tr>
        </thead>
      <tbody>
      <?php
      foreach ( $DatosCliente as $Fila ){
        ?>
        <tr>
          <td><?php echo $Fila['Nombre']; ?></td>
          <td><?php echo $Fila['Tipo']; ?></td>
          <td><?php echo $Fila['Direccion']; ?></td>
          <td><?php echo $Fila['Telefono']; ?></td>
          <td><?php echo $Fila['DUI']; ?></td>
          <td><?php echo $Fila['NIT']; ?></td>
          <td><?php echo $Fila['NRC']; ?></td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
