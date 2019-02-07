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
    

    
}