<?php
class Paginador extends Datos {
    public $Cadena;
    public $CadenaCount;
    public $FilasPorPagina;
    public $NumPagina;
    public $EnlaceListar;
    public $RegistrosPaginados;
    public $ControlesPaginador;

    public function ConfPaginador() {
        $pg_Fila = $this->CantTotalReg; //CANT TOTAL DE FILAS DE LA CONSULTA
        $pg_Filas = $pg_Fila[0];
        $pg_FilasPagina = $this->FilasPorPagina; // ESTA LÍNEA ES PARA DEFINIR CUANTOS REGISTROS QUEREMOS POR PÁGINA
        $pg_Ultimo = ceil($pg_Filas/$pg_FilasPagina);
        if($pg_Ultimo < 1){
            $pg_Ultimo = 1;
        }
        $pg_NumPagina = 1;
        if($this->NumPagina != ''){
            $pg_NumPagina = preg_replace('#[^0-9]#', '', $this->NumPagina);
        }
        if ($pg_NumPagina < 1) {
            $pg_NumPagina = 1;
        }
        else if ($pg_NumPagina > $pg_Ultimo) {
            $pg_NumPagina = $pg_Ultimo;
        }
        $pg_Limite = "LIMIT " .($pg_NumPagina - 1) * $pg_FilasPagina.", ".$pg_FilasPagina;

        //ESTA LÍNEA ES PARA EJECUTAR LA CONSULTA CON LA SEPARACIÓN DE LA CLÁUSULA 'LIMIT' DE SQL
        $this->RegistrosPaginados = $this->EjecutarQuery( $this->Cadena." $pg_Limite" );

        $this->ControlesPaginador = '';
        if($pg_Ultimo != 1){
            if ($pg_NumPagina > 1) {
                $pg_Anterior = $pg_NumPagina - 1;
                $this->ControlesPaginador .= "<input type='button' onclick='javascript:CambiarPagina(".$pg_Anterior.");' id='btnControlPaginador' value='Anterior'>&nbsp;";
                for($i = $pg_NumPagina-4; $i < $pg_NumPagina; $i++){
                    if($i > 0){
                        $this->ControlesPaginador .= "&nbsp;<input type='button' onclick='javascript:CambiarPagina(".$i.");' id='btnControlPaginador' value='".$i."'>&nbsp;";
                    }
                }
            }
            $this->ControlesPaginador .= "<span id='pgActual'>&nbsp;".$pg_NumPagina."&nbsp;</span>";
            for($i = $pg_NumPagina+1; $i <= $pg_Ultimo; $i++){
                $this->ControlesPaginador .= "&nbsp;<input type='button'  onclick='javascript:CambiarPagina(".$i.");' id='btnControlPaginador' value='".$i."'>&nbsp;";
                if($i >= $pg_NumPagina+4){
                    break;
                }
            }
            if ($pg_NumPagina != $pg_Ultimo) {
                $pg_Siguiente = $pg_NumPagina + 1;
                $this->ControlesPaginador .= "&nbsp;<input type='button' onclick='javascript:CambiarPagina(".$pg_Siguiente.");' id='btnControlPaginador' value='Siguiente'>";
            }
        }
        ?>
        <link rel="stylesheet" type="text/css" href="css/paginador.css" media="all"> <!-- ESTA LÍNEA CARGA LOS CSS DEL PAGINADOR -->
        <!-- ESTE ES EL FIN DEL CÓDIGO PARA EL PAGINADOR -->

        <script type="text/javascript">
        //Función AJAX para cambiar de página
        function CambiarPagina( paNumPag ) {
            location.replace('<?php echo 'index.php?'.$this->EnlaceListar.'&np='; ?>' + paNumPag);
        }
        </script>
    <?php
     }

    public function MostrarControles(){
    ?>
        <div id="pagination_controls"><?php echo $this->ControlesPaginador; ?></div>
    <?php
    }
}
?>
