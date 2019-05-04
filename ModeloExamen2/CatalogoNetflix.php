<?php

/**
 * Nos han pedido reemplazar la herramienta para mantener
 * el catalogo de peliculas de Netflix porque el original
 * es muy malo. Pero como es un cambio muy grande en nuestra
 * primera entrega no hay que entregar todas las funcionalidades.
 * 
 * Las funcionalidades que nos piden son:
 *  - Agregar peliculas nuevas
 *  - Agregar series nuevas
 *  - Poder sacar peliculas
 *  - Poder sacar series
 *  - Listar por categoria
 *  - Una funcion que te dice si existe el id de pelicula/serie
 * 
 * Las categorias se van a ir creando a medida que se agregan
 * peliculas o series, entonces si se agrega una serie con la
 * categoria "ciencia misteriosa" esta categoría empieza a
 * existir en ese momento.
 * 
 * Tendremos que pasar todos los tests y tratemos de quedar
 * bien porque es nuestro primer cliente importante!
 */

class CatalogoNetflix 
{
  /**
   * Esta funcion solo nos dice si existe la pelicula o serie con
   * el id que nos pasan
   */

   private $catalogo = array();

  public function existeId($id) 
  {
    return array_key_exists($id,$this->catalogo);

  }

  public function agregarSerie($id, $nombre, $cantidadCapitulos, $categoria) 
  {
    $this->catalogo[$id] = ['id'=>$id,
                            'nombre'=>$nombre,
                            'cantidadCapitulos'=>$cantidadCapitulos,
                            'categoria'=>$categoria];

    return $this->existeId($id);
   
  }

  public function agrearPelicula($id, $nombre, $tiempo, $categoria) 
  {
    $this->catalogo[$id] = ['id'=>$id,
                            'nombre'=>$nombre,
                            'tiempo'=>$tiempo,
                            'categoria'=>$categoria];
    return $this->existeId($id);
  }

  public function sacarSerie($id) 
  {
    unset($this->catalogo[$id]);
    return !$this->existeId($id);
  }

  public function sacarPelicula($id) 
  {
    unset($this->catalogo[$id]);
    return !$this->existeId($id);
  }

  public function listarContenidoDeLaCategoria($categoria) 
  {
    $listaCategorias = array();

    foreach($this->catalogo as $serie_peliculas)
    {
      if($categoria == $serie_peliculas['categoria'])
      {
        $listaCategorias[] = $serie_peliculas;
      }
    }

    return $listaCategorias;

  }

}

$catalogo = new CatalogoNetflix();
$catalogo->agrearPelicula(1122, "Loco por Mary", 120, 'risa');
var_dump( $catalogo->existeId(1122));