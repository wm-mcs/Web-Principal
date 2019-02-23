<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;




class Noticia extends Model
{

    protected $table ='noticias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];









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


    public function getUrlImgPortadaAttribute()
    {
        
        return url().'/imagenes/'.$this->img.'-portada.jpg';
    }

    public function getUrlImgPortadaChicaAttribute()
    {
        
        return url().'/imagenes/'.$this->img.'-portada-chica.jpg';
    }

    public function getUrlImgAdicionalAttribute()
    {
        
        return url().'/imagenes/'.$this->img.'-adicional.jpg';
    }

    public function getUrlImgAdicionalChicaAttribute()
    {
        
        return url().'/imagenes/'.$this->img.'-adicional-chica.jpg';
    }


    public function getRouteAttribute()
    {
        
        return route('get_pagina_noticia_individual', [$this->name_slug, $this->id]);
    }

    public function getRouteAdminAttribute()
    {
        
        return route('get_admin_noticias_editar', $this->id);
    }

    public function getNameSlugAttribute()
    {
        return $this->helper_convertir_cadena_para_url($this->name);
    }


    public function getContenidoRenderAttribute()
    {
        return $this->description;
    }

    

    
}