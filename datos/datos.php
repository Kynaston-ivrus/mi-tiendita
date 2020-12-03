<?php
class Datos {
  private $Server;
  private $User;
  private $Password;
  private $DataBase;
  private $Conexion;
  private $ResultadoQuery;

  public function __construct() {
    //Local
    $this->Server = "localhost"; //Puede ser también la direccion 'IP' de localhost
    $this->User = "root";
    $this->Password = "daniel77"; //Acá irá el password de su servidor MySQL
    $this->DataBase = "bd_tienda";
  }
  protected function Conectar() {
    @$this->Conexion = mysqli_connect($this->Server, $this->User, $this->Password, $this->DataBase) or die("<br><br>No se puede establecer conexión");
    return $this->Conexion;
  }
  protected function CerrarConexion() {
    return mysqli_close( $this->Conexion );
  }
  public function EjecutarQuery( $paCadena ) {
    $this->ResultadoQuery = mysqli_query( $this->Conectar(), $paCadena ) or
    die( "Error en consulta<br>Mysql dice: ".mysqli_error( $this->Conexion ) );
    $this->CerrarConexion();
    return $this->ResultadoQuery;
  }
private function _CerrarConexionMySQL() {
		return mysqli_close( $this->_ConexionMySQL );
	}

	private function _ObtenerResultadoSelectivo() {
		return mysqli_fetch_array( $this->_ResultadoMySQL );
	}

	private function _RecuperarFilas() {
		while( $fila = $this->_ObtenerResultadoSelectivo() ){
			$this->_GrupoRegistros[] = $fila;
		}
		$this->_LiberarResultadoSelectivo();
		return $this->_GrupoRegistros;
	}

	private function _LiberarResultadoSelectivo() {
		return mysqli_free_result( $this->_ResultadoMySQL );
	}
}
?>
