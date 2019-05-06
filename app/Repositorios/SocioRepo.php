<?php 

namespace App\Repositorios;

use App\Entidades\Socio;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

/**
* Repositorio de consultas a la base de datos User
*/
class SocioRepo extends BaseRepo
{
  
  public function getEntidad()
  {
    return new Socio();
  }


  
}