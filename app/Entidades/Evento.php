<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;
use App\Entidades\ImgHome;
use App\Entidades\ImgEvento;
use App\Entidades\Marca_de_evento;




class Evento extends Model
{

    protected $table ='eventos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];



    public function imagenesevento()
    {
      return $this->hasMany(ImgEvento::class,'evento_id','id')->where('estado','si');
    }

    public function marcasevento()
    {
      return $this->hasMany(Marca_de_evento::class,'evento_id','id');
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
        $imagenesProyectos = $this->imagenesevento;

        //veo si hay alguna que tenga el atributo
        $cantidad_imagenes = $imagenesProyectos->where('foto_principal','si')->count();
        

        if($cantidad_imagenes === 1)
        {
            $imagen_principal = $imagenesProyectos->where('foto_principal','si')->first();
            

            return $imagen_principal->url_img;
        }
        elseif($cantidad_imagenes === 0)
        {
            $imagen = $imagenesProyectos->first();
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