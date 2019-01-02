<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;




class ImgEvento extends Model
{

    protected $table ='imgs_eventos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    
    public function getUrlImgAttribute()
    {
        
        return url().'/imagenes/'.$this->img;
    }
    
}