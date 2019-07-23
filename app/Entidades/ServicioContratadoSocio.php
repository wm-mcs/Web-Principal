<?php

namespace App\Entidades;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;





class ServicioContratadoSocio extends Model
{

    protected $table ='servicios_contratados_socios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
    protected $appends  = ['fecha_vencimiento_formateada','fecha_contratado_formateada'];




    

    


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


    public function getFechaVencimientoFormateadaAttribute()
    {
        return Carbon::parse($this->fecha_vencimiento)->format('d-m-Y');
    }


    public function getFechaContratadoFormateadaAttribute()
    {
        return $this->created_at->format('d-m-Y'); 
    }



    
    
}