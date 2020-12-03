<?php
class Usuarios extends Datos {
  //Atributos
  public $NombreCompleto;
  public $Usuario;
  public $Password;
  public $TipoCuenta;
  //Métodos
  public function ListarTodos( $paBuscar ) {
    $Cadena = "SELECT * FROM tbl_usuarios WHERE
    (NombreCompleto LIKE '%".$paBuscar."%' OR Usuario LIKE
      '%".$paBuscar."%')
      AND Eliminado = 'N'";
      return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
    }
    public function CantTotalRegistros( $paBuscar ) {
      $Cadena = "SELECT COUNT(IdUsuario) FROM tbl_usuarios WHERE
      (NombreCompleto LIKE '%".$paBuscar."%' OR Usuario LIKE
        '%".$paBuscar."%')
        AND Eliminado = 'N'";
        return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
        //Retorna el número de filas que tiene la consulta
      }
      public function BuscarPorId( $paId ) {
        $Cadena = "SELECT * FROM tbl_usuarios WHERE IdUsuario =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Agregar() {
        $Cadena = "INSERT INTO tbl_usuarios (
          NombreCompleto,
          Usuario,
          Password,
          TipoCuenta,
          Eliminado )
          VALUES (
            '".addslashes($this->NombreCompleto)."',
            '".addslashes($this->Usuario)."',
            '".addslashes(md5($this->Password))."',
            '".addslashes($this->TipoCuenta)."',
            'N' ) ";
            return $this->EjecutarQuery( $Cadena );
          }
          public function Actualizar( $paId ) {
            $Cadena = "UPDATE tbl_usuarios SET
            NombreCompleto = '".addslashes($this->NombreCompleto)."',
            TipoCuenta = '".addslashes($this->TipoCuenta)."'
            WHERE IdUsuario = '".$paId."' ";
            return $this->EjecutarQuery( $Cadena );
          }
          public function ReestablecerPassword( $paId ) {
            $Cadena = "UPDATE tbl_usuarios SET
            Password = '".addslashes(md5('admin'))."'
            WHERE IdUsuario = '".$paId."' ";
            return $this->EjecutarQuery( $Cadena );
          }
          public function Eliminar( $paId ) {
            $Cadena = "UPDATE tbl_usuarios SET Eliminado = 'S' WHERE
            IdUsuario = '".$paId."' ";
            return $this->EjecutarQuery( $Cadena );
          }
          public function ValidarLogin( $paUsua, $paPass ) {
            $Cadena = "SELECT * FROM tbl_usuarios WHERE Usuario =
            '".$paUsua."' AND Password = '".$paPass."' ";
            return $this->EjecutarQuery( $Cadena );
          }
          public function ObtenerPasswordActual( $paIdUsua ) {
            $Cadena = "SELECT * FROM tbl_usuarios WHERE IdUsuario =
            '".$paIdUsua."' ";
            return $this->EjecutarQuery( $Cadena );
          }
          public function CambiarPassword( $paId ) {
            $Cadena = "UPDATE tbl_usuarios SET
            Password = '".addslashes(md5($this->Password))."'
            WHERE IdUsuario = '".$paId."' ";
            return $this->EjecutarQuery( $Cadena );
          }
        }
        ?>
