<?php 

namespace App\Repositorios;

use App\Entidades\Evento;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

/**
* Repositorio de consultas a la base de datos User
*/
class EventoRepo extends BaseRepo
{
  
  public function getEntidad()
  {
    return new Evento();
  }



 
  /**
   *  Devuelve el ultimo evento
   */
  public function getUltimoEvento()
  {
    return $this->getEntidad()->active()->orderBy('fecha', 'desc')->get()->first();
  }

  /**
    *  Devulve el Penultimo evento
    */  
  public function getPenultimoEvento()
  {
      return $this->getEntidad()->active()->orderBy('fecha', 'desc')->take(2)->get()->last();
  }

  public function getEventosArrayDeEventosID($array_eventos_id,$pagination)
  {
    return $this->getEntidad()
                ->whereIn('id', $array_eventos_id)  
                ->active() 
                ->orderBy('fecha', 'desc')
                ->paginate($pagination);
  }
  
}