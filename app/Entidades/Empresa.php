<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;




class Empresa extends Model
{

    protected $table ='empresa_datos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * para verificar si no es null o no es cadena vacia
     */
    public function helper_verificar_nulidad($variable)
    {
      if(($variable != null) || ($variable != ''))
      {
        return $variable;
      }
      else
      {
        return 'no';
      }
    }


    //imagenes
    public function getImgLogoCuadradoAttribute()
    {
        
        return url().'/imagenes/'.$this->logo_cuadrado;
    }

    public function getImgLogoHorizontalAttribute()
    {
        
        return url().'/imagenes/'.$this->logo_horizontal;
    }

    public function getImgLogoVerticalAttribute()
    {
        
        return url().'/imagenes/'.$this->logo_vertical;
    }

    //datos
    public function getTelefonoEmpresaAttribute()
    {        
        return $this->helper_verificar_nulidad($this->telefono);
    }

    

    
}