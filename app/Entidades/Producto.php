<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;
use App\Entidades\ImgHome;
use App\Entidades\ProductoImg;





class Producto extends Model
{

    protected $table ='productos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];



    public function imagenes()
    {
      return $this->hasMany(ImgEvento::class,'evento_id','id')->where('estado','si');
    }

  

    
    /**
     * PAra busqueda por nombre
     */
    public function scopeName($query, $name)
    {
        //si el paramatre(campo busqueda) esta vacio ejecutamos el codigo
        /// trim() se utiliza para eliminar los espacios.
        ////Like se usa para busqueda incompletas
        /////%% es para los espacios adelante y atras
        if (trim($name) !="")
        {                        
           $query->where('name', "LIKE","%$name%"); 
        }
        
    }

    public function scopeActive($query)
    {
                               
           $query->where('estado', "si"); 
                
    }


    public function getUrlImgAttribute()
    {
        //imagenes asoiadas al proyecto
        $imagenes = $this->imagenes;

        //veo si hay alguna que tenga el atributo
        $cantidad_imagenes = $imagenes->where('foto_principal','si')->count();
        

        if($cantidad_imagenes === 1)
        {
            $imagen_principal = $imagenes->where('foto_principal','si')->first();
            

            return $imagen_principal->url_img;
        }
        elseif($cantidad_imagenes === 0)
        {
            $imagen = $imagenes->first();
            if($imagen == null)
            {
               return 'null';
            }
            
            $imagen->foto_principal = 'si';
            $imagen->save();

            return $imagen->url_img;
        }   
        else
        {
            return url().'/imagenes/'.$this->img;
        }    
        
        
    }


    public function getRouteAttribute()
    {
        
        return route('get_pagina_evento_individual', [str_replace(" ", "_", $this->name), $this->id]);
    }

    public function getDescriptionParrafoAttribute()
    {
         
         $text =  htmlentities($this->description);
         return   $text;  
    }

    public function getFechaDeRealizacionAttribute()
    {
         return \Carbon\Carbon::parse($this->fecha);  
    }

    public function getRouteAdminAttribute()
    {
        return route('get_admin_eventos_editar',$this->id);
    }
     
    
}