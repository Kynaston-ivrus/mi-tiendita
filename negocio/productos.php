<?php
class Productos extends Datos {
  //Atributos
  public $Nombre;
  public $IdMarca;
  public $IdCategoria;
  public $Detalles;
  public $Existencias;
  public $PrecioVenta;
  public $Imagen;
  //Métodos
  public function ListarTodos( $paBuscar ) {
    $Cadena = "SELECT
    tbl_productos.IdProducto,
    tbl_productos.Nombre AS NombreProducto,
    tbl_productos.IdMarca,
    tbl_marcas.Nombre AS NombreMarca,
    tbl_productos.IdCategoria,
    tbl_categorias.Nombre AS NombreCategoria,
    tbl_productos.Detalles,
    tbl_productos.Existencias,
    tbl_productos.PrecioVenta,
    tbl_productos.Imagen
    FROM
    tbl_productos
    INNER JOIN tbl_marcas ON tbl_productos.IdMarca = tbl_marcas.IdMarca
    INNER JOIN tbl_categorias ON tbl_productos.IdCategoria =
    tbl_categorias.IdCategoria
    WHERE
    (tbl_productos.Nombre LIKE '%".$paBuscar."%')
    AND tbl_productos.Eliminado = 'N' ";
    return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }
  public function CantTotalRegistros( $paBuscar ) {
    $Cadena = "SELECT COUNT(IdProducto)
    FROM
    tbl_productos
    INNER JOIN tbl_marcas ON tbl_productos.IdMarca = tbl_marcas.IdMarca
    INNER JOIN tbl_categorias ON tbl_productos.IdCategoria =
    tbl_categorias.IdCategoria
    WHERE
    (tbl_productos.Nombre LIKE '%".$paBuscar."%')
    AND tbl_productos.Eliminado = 'N' ";
    return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
    //Retorna el número de filas que tiene la consulta
  }
  public function ListarTodoReporte() {
    $Cadena = "SELECT
    tbl_productos.IdProducto,
    tbl_productos.Nombre AS NombreProducto,
    tbl_productos.IdMarca,
    tbl_marcas.Nombre AS NombreMarca,
    tbl_productos.IdCategoria,
    tbl_categorias.Nombre AS NombreCategoria,
    tbl_productos.Detalles,
    tbl_productos.Existencias,
    tbl_productos.PrecioVenta,
    tbl_productos.Imagen
    FROM
    tbl_productos
    INNER JOIN tbl_marcas ON tbl_productos.IdMarca = tbl_marcas.IdMarca
    INNER JOIN tbl_categorias ON tbl_productos.IdCategoria =
    tbl_categorias.IdCategoria
    WHERE
    tbl_productos.Eliminado = 'N' ";
    return $this->EjecutarQuery( $Cadena );
  }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT
    tbl_productos.IdProducto,
    tbl_productos.Nombre AS NombreProducto,
    tbl_productos.IdMarca,
    tbl_marcas.Nombre AS NombreMarca,
    tbl_productos.IdCategoria,
    tbl_categorias.Nombre AS NombreCategoria,
    tbl_productos.Detalles,
    tbl_productos.Existencias,
    tbl_productos.PrecioVenta,
    tbl_productos.Imagen
    FROM
    tbl_productos
    INNER JOIN tbl_marcas ON tbl_productos.IdMarca = tbl_marcas.IdMarca
    INNER JOIN tbl_categorias ON tbl_productos.IdCategoria =
    tbl_categorias.IdCategoria
    WHERE
    tbl_productos.IdProducto = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
  }
  public function Agregar() {
    $Cadena = "INSERT INTO tbl_productos (
      Nombre,
      IdMarca,
      IdCategoria,
      Detalles,
      Existencias,
      PrecioVenta,
      Imagen,
      Eliminado )
      VALUES (
        '".addslashes($this->Nombre)."',
        '".addslashes($this->IdMarca)."',
        '".addslashes($this->IdCategoria)."',
        '".addslashes($this->Detalles)."',
        '".addslashes($this->Existencias)."',
        '".addslashes($this->PrecioVenta)."',
        '".addslashes($this->Imagen)."',
        'N' ) ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Actualizar( $paId ) {
        $Cadena = "UPDATE tbl_productos SET
        Nombre = '".addslashes($this->Nombre)."',
        IdMarca = '".addslashes($this->IdMarca)."',
        IdCategoria = '".addslashes($this->IdCategoria)."',
        Detalles = '".addslashes($this->Detalles)."',
        Existencias = '".addslashes($this->Existencias)."',
        PrecioVenta = '".addslashes($this->PrecioVenta)."',
        Imagen = '".addslashes($this->Imagen)."'
        WHERE IdProducto = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Reabastecer( $paId ) {
        $Cadena = "UPDATE tbl_productos SET
        Existencias = '".addslashes($this->Existencias)."'
        WHERE IdProducto = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE tbl_productos SET Eliminado = 'S' WHERE
        IdProducto = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function ListarTodoCombos() {
        $Cadena = "SELECT * FROM tbl_productos
        WHERE
        Eliminado = 'N'
        ORDER BY Nombre ASC";
        return $this->EjecutarQuery( $Cadena );
      }
    }
    ?>
