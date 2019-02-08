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

    public function getCelularEmpresaAttribute()
    {        
        return $this->helper_verificar_nulidad($this->celular);
    }

    public function getDireccionEmpresaAttribute()
    {        
        return $this->helper_verificar_nulidad($this->direccion);
    }

    public function getHorariosEmpresaAttribute()
    {       
    
        return $this->helper_verificar_nulidad($this->horarios_dias);
    }

    public function getEmailEmpresaAttribute()
    {        
        return $this->helper_verificar_nulidad($this->email);
    }

    public function getSloganEmpresaAttribute()
    {        
    
        return $this->helper_verificar_nulidad($this->slogan);
    }

    public function getMisionEmpresaAttribute()
    {        
        return $this->helper_verificar_nulidad($this->mision);
    }

    public function getVisionEmpresaAttribute()
    {        
        return $this->helper_verificar_nulidad($this->vision);
    }

    public function getPalabrasClavesEmpresaAttribute()
    {        
        return $this->helper_verificar_nulidad($this->palabras_claves);
    }

    public function getDescripcionEmpresaAttribute()
    {        
        return $this->helper_verificar_nulidad($this->descripcion_breve);
    }

    

    
}