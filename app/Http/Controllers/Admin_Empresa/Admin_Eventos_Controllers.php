<?php

namespace App\Http\Controllers\Admin_Empresa;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositorios\EventoRepo;
use App\Repositorios\ImgEventoRepo;
use App\Managers\Evento\crear_evento_admin_manager;
use App\Repositorios\MarcaRepo;
use App\Repositorios\Marca_de_eventoRepo;
use DB;





class Admin_Eventos_Controllers extends Controller
{

  protected $EventoRepo;
  protected $ImgEventoRepo;
  protected $MarcaRepo;
  protected $Marca_de_eventoRepo;

  public function __construct(EventoRepo            $EventoRepo, 
                              ImgEventoRepo         $ImgEventoRepo,
                              MarcaRepo             $MarcaRepo, 
                              Marca_de_eventoRepo   $Marca_de_eventoRepo)

  {
    $this->EventoRepo           =  $EventoRepo;
    $this->ImgEventoRepo        =  $ImgEventoRepo;
    $this->MarcaRepo            =  $MarcaRepo;
    $this->Marca_de_eventoRepo  =  $Marca_de_eventoRepo;
  }

  public function get_admin_eventos(Request $Request)
  {

    $Eventos = $this->EventoRepo->getEntidadesAllPaginadasYOrdenadas($Request,'fecha','desc',30);

    return view('admin.eventos.eventos_home', compact('Eventos'));
  }



  //get Crear 
  public function get_admin_eventos_crear()
  { 
    $Marcas = $this->MarcaRepo->getEntidadActivas();  
    return view('admin.eventos.eventos_crear',compact('Marcas'));
  }



  //set 
  public function set_admin_eventos_crear(Request $Request)
  {     
      
      $Evento    = $this->EventoRepo->getEntidad();

      $Evento->estado = 'si';      

      $Propiedades = ['name','description','fecha','ubicacion'];  
      
      $manager = new crear_evento_admin_manager(null, $Request->all());

      //imagenes
      $files = $Request->file('img');

     

      
        
        //valido la data
        if ($manager->isValid())
        {


           $Evento = $this->EventoRepo->setEntidadDato($Evento,$Request,$Propiedades);

           /*//utilzo la funciona creada en el controlador para subir la imagen
           $this->set_admin_eventos_img($Evento->id, $Request);  

           //creo las marcas asociadas a este evento
           foreach ($Request->input('marca_asociado_id') as $marca_asociada_id)
           { 
             $this->Marca_de_eventoRepo->crearNuevaMarcaDeEvento( $Evento->id, $marca_asociada_id);
           }*/

 //////////////////////          ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            

            
            //verifico si la pocion 0 es diferente de null, significa que el array no esta vacio
            if($files[0] != null )
            {        

              foreach($files as $file)
              { 
                $this->ImgEventoRepo->set_datos_de_img($file,$this->ImgEventoRepo->getEntidad(),'evento_id',$Evento->id,$Request,'EventosImagenes/' );
              }
              
            }
            
           //creo las marcas asociadas a este evento
           if($Request->input('marca_asociado_id') != '')
           {
             foreach ($Request->input('marca_asociado_id') as $marca_asociada_id)
             {
               $this->Marca_de_eventoRepo->crearNuevaMarcaDeEvento( $Evento->id, $marca_asociada_id);
             }
           } 

 //////////////////////          ////////////////////////////////////////////////////////////////////////////////////////////////////////////
           if($Request->get('tipo_de_boton') == 'guardar')
           {
             return redirect()->route('get_admin_eventos_editar',$Evento->id)->with('alert', 'Evento creado correctamente');  
           }
           else
           {
             return redirect()->route('get_admin_eventos')->with('alert', 'Evento creado correctamente');  
           }
                
        } 
      
      
      return redirect()->back()->withErrors($manager->getErrors())->withInput($manager->getData());
    
  }


  //get edit admin 
  public function get_admin_eventos_editar($id)
  {
    $Evento = $this->EventoRepo->find($id);
    $Marcas = $this->MarcaRepo->getEntidadActivas();


    return view('admin.eventos.eventos_editar',compact('Evento','Marcas'));
  }

  //set edit admin 
  public function set_admin_eventos_editar($id,Request $Request)
  {
    $Evento = $this->EventoRepo->find($id);

    $Propiedades = ['name','description','estado','fecha','ubicacion'];

    try{
      DB::beginTransaction(); 
      
    $this->EventoRepo->setEntidadDato($Evento,$Request,$Propiedades);     

      //imagenes
      $files = $Request->file('img');
      
      //verifico si la pocion 0 es diferente de null, significa que el array no esta vacio
      if($files[0] != null )
      {        

        foreach($files as $file)
        { 
          $this->ImgEventoRepo->set_datos_de_img($file,$this->ImgEventoRepo->getEntidad(),'evento_id',$Evento->id,$Request,'EventosImagenes/' );
        }
        
      }
      
     //creo las marcas asociadas a este evento
     if($Request->input('marca_asociado_id') != '')
     {
       foreach ($Request->input('marca_asociado_id') as $marca_asociada_id)
       {
         $this->Marca_de_eventoRepo->crearNuevaMarcaDeEvento( $Evento->id, $marca_asociada_id);
       }
     }

    DB::commit(); 
    }catch(\Exception $e){            
    DB::rollback();            
    } 
     
     
     if($Request->get('tipo_de_boton') == 'guardar')
     {
       return redirect()->route('get_admin_eventos_editar',$Evento->id)->with('alert', 'Evento editado correctamente');  
     }
     else
     {
       return redirect()->route('get_admin_eventos')->with('alert', 'Evento editado correctamente');  
     }
    
  }

  //subo img adicional
  public function set_admin_eventos_img($id_evento,Request $Request)
  {   
      //archivos imagenes
      $files = $Request->file('img');

      if(!empty($files))
      {
        foreach($files as $file)
        {           

          $this->ImgEventoRepo->set_datos_de_img($file,$this->ImgEventoRepo->getEntidad(),'evento_id',$id_evento,$Request,'EventosImagenes/' );
                    
        }
        
      }

      return redirect()->back()->with('alert', 'Imagen Subida Correctamente');
      
  }


  //elimino img adicional
  public function delete_admin_eventos_img($id_img)
  {
      $imagen = $this->ImgEventoRepo->find($id_img); 

      $evento = $this->EventoRepo->find($imagen->evento_id);

      //me fijo si hay mas imagenes
      if($evento->imagenesevento->count() > 1)
      {
        $this->ImgEventoRepo->destroy_entidad($id_img);

        return redirect()->back()->with('alert-rojo', 'Imagen Eliminada');
      }
      else
      {
        return redirect()->back()->with('alert-rojo', 'No puedes elminiar porque es la única');
      }  

      
  }

  //fijo como imagen principal 
  public function establecer_como_imagen_principal($id_img)
  {
      $this->ImgEventoRepo->cambio_a_imagen_principal($id_img);

      return redirect()->back()->with('alert', 'Imagen principal cambiada');
  }

  public function delete_admin_marca_eventos($id)
  {
      $this->Marca_de_eventoRepo->destroy_entidad($id);

      return redirect()->back()->with('alert-rojo', 'Marca eliminada');
  }


  public function EliminarUnEvento($evento_id)
  {

    
    $Evento = $this->EventoRepo->find($evento_id);

    //eliminar las imagenes
    $Imagenes = $Evento->imagenesevento;

    if($Imagenes->count() > 0)
    {
      foreach($Imagenes as $imgaen)
      {
        $this->ImgEventoRepo->destruir_esta_entidad($imgaen);
      }
    }
    

    //eliminar las marcas asociadas
    $Marcas   = $Evento->marcasevento;
    if($Marcas->count() > 0)  
    { 
      foreach($Marcas as $marca)
      {
        $this->Marca_de_eventoRepo->destruir_esta_entidad($marca);
      }
    }  

    $Evento   = $this->EventoRepo->find($evento_id);
    $Imagenes = $Evento->imagenesevento;
    $Marcas   = $Evento->marcasevento; 

   


    if(($Imagenes->count() == 0) && ($Marcas->count() == 0))
    {
      $this->EventoRepo->destruir_esta_entidad($Evento); 
      $validator = true;
    }
    else
    {
      $validator = false;
    }

    if($validator == true)
    {
       return redirect()->route('get_admin_eventos')->with('alert', 'Evento eliminado');
    }
    else
    {
      return redirect()->route('get_admin_eventos')->with('alert-rojo', 'No se eliminó correctamente probar de nuevo');
    }


    //eliminar el evento

    //dirigir a atras
  }

  
}