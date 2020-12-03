<?php
class Marcas extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de marcas
  public $Nombre;
  //Métodos
  public function ListarTodos( $paBuscar ) {
    $Cadena = "SELECT * FROM tbl_marcas WHERE
    (IdMarca LIKE '%".$paBuscar."%' OR Nombre LIKE '%".$paBuscar."%')
    AND Eliminado = 'N'";
    return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }
  public function CantTotalRegistros( $paBuscar ) {
    $Cadena = "SELECT COUNT(IdMarca) FROM tbl_marcas WHERE
    (IdMarca LIKE '%".$paBuscar."%' OR Nombre LIKE '%".$paBuscar."%')
    AND Eliminado = 'N'";
    return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
  } //Retorna el número de filas que tiene la consulta

  public function ListarTodoCombos() {
    $Cadena = "SELECT * FROM tbl_marcas WHERE
    Eliminado = 'N'";
    return $this->EjecutarQuery( $Cadena );
  }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT * FROM tbl_marcas WHERE IdMarca = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO tbl_marcas (
      Nombre,
      Eliminado )
      VALUES (
        '".addslashes($this->Nombre)."',
        'N' )";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Actualizar( $paId ) {
        $Cadena = "UPDATE tbl_marcas SET
        Nombre = '".addslashes($this->Nombre)."'
        WHERE IdMarca = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE tbl_marcas SET Eliminado = 'S' WHERE IdMarca =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
    }
    ?>
