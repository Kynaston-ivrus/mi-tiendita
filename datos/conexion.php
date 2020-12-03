<?php
class Conexion
{
	private $_ServidorMySQL;
	private $_UsuarioMySQL;
	private $_PasswordMySQL;
	private $_BaseDatosMySQL;
	private $_ConexionMySQL;
	private $_ResultadoMySQL;
	private $_GrupoRegistros = array();

	public function __construct() {
		//Locales
	 	$this->_ServidorMySQL = 'localhost';
		$this->_UsuarioMySQL = 'root';
		$this->_PasswordMySQL = 'daniel77';
		$this->_BaseDatosMySQL = 'bd_tienda';
	}

	public function EjecutarABM( $P_CadenaMySQL ) {
		$Conn = $this->_establecerConexionMySQL();
		$this->_ResultadoMySQL = mysqli_query( $Conn, $P_CadenaMySQL ) or die("Error en consulta <br>MySQL dice: ".mysqli_error($Conn));
		$this->_CerrarConexionMySQL();
		return $this->_ResultadoMySQL;
	}

	public function EjecutarSelectiva( $P_CadenaMySQL ) {
		$this->_ResultadoMySQL = mysqli_query( $this->_establecerConexionMySQL(), $P_CadenaMySQL );
		$this->_CerrarConexionMySQL();
		return $this->_RecuperarFilas();
	}

	private function _EstablecerConexionMySQL() {
		@$this->_ConexionMySQL = mysqli_connect( $this->_ServidorMySQL, $this->_UsuarioMySQL, $this->_PasswordMySQL, $this->_BaseDatosMySQL )
		or die('<br><br>No se puede establecer conexión');

		return $this->_ConexionMySQL;
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
