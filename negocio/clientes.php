<?php
class Clientes extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $Nombre;
  public $Direccion;
  public $Tipo;
  public $Telefono;
  public $DUI;
  public $NIT;
  public $NRC;
  //Métodos
  public function ListarTodos( $paBuscar ) {
    $Cadena = "SELECT * FROM tbl_clientes WHERE
    (Nombre LIKE '%".$paBuscar."%' OR Direccion LIKE '%".$paBuscar."%')
    AND Eliminado = 'N'";
    return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }
  public function CantTotalRegistros( $paBuscar ) {
    $Cadena = "SELECT COUNT(IdCliente) FROM tbl_clientes WHERE
    (Nombre LIKE '%".$paBuscar."%' OR Direccion LIKE '%".$paBuscar."%')
    AND Eliminado = 'N'";
    return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
  } //Retorna el número de filas que tiene la consulta

  public function ListarTodoReporte() {
    $Cadena = "SELECT * FROM tbl_clientes WHERE
    Eliminado = 'N'";
    return $this->EjecutarQuery( $Cadena );
  }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT * FROM tbl_clientes WHERE IdCliente = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO tbl_clientes (
      Nombre,
      Direccion,
      Tipo,
      Telefono,
      DUI,
      NIT,
      NRC,
      Eliminado )
      VALUES (
        '".addslashes($this->Nombre)."',
        '".addslashes($this->Direccion)."',
        '".addslashes($this->Tipo)."',
        '".addslashes($this->Telefono)."',
        '".addslashes($this->DUI)."',
        '".addslashes($this->NIT)."',
        '".addslashes($this->NRC)."',
        'N' )";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Actualizar( $paId ) {
        $Cadena = "UPDATE tbl_clientes SET
        Nombre = '".addslashes($this->Nombre)."',
        Direccion = '".addslashes($this->Direccion)."',
        Tipo = '".addslashes($this->Tipo)."',
        Telefono = '".addslashes($this->Telefono)."',
        DUI = '".addslashes($this->DUI)."',
        NIT = '".addslashes($this->NIT)."',
        NRC = '".addslashes($this->NRC)."'
        WHERE IdCliente = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE tbl_clientes SET Eliminado = 'S' WHERE IdCliente =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
    }
    ?>
