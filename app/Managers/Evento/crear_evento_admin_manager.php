<?php  
namespace App\Managers\Evento;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Managers\ManagerBase;

/**
* 
*/
class crear_evento_admin_manager extends ManagerBase 
{


  public function getRules()
  {
    $rules = [
      'img'               => 'required',
      'name'              => 'required',
      'description'       => 'required',
      'fecha'             => 'required',
      'ubicacion'         => 'required',
      'marca_asociado_id' => 'required'      
             ];

    return $rules;
  }
 
  
  
  
}