<?php 

namespace App\Repositorios;

use App\Entidades\MovimientoEstadoDeCuentaSocio;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

/**
* Repositorio de consultas a la base de datos User
*/
class MovimientoEstadoDeCuentaSocioRepo extends BaseRepo
{
  
  public function getEntidad()
  {
    return new MovimientoEstadoDeCuentaSocio();
  }

  //guetters/////////////////////////////////////////////////////////////////////

  


  //setters//////////////////////////////////////////////////////////////////////

 

 


  
}