<?php

namespace App\Http\Controllers\Admin_Empresa;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositorios\ProductoRepo;
use App\Repositorios\ProductoImgRepo;
use App\Managers\Evento\crear_evento_admin_manager;
use DB;





class Admin_Producto_Controllers extends Controller
{

  protected $EntidadDelControladorRepo;
  protected $ImgEntidadRepo;


  public function __construct(ProductoRepo            $ProductoRepo, 
                              ProductoImgRepo         $ProductoImgRepo)

  {
    $this->EntidadDelControladorRepo           =  $ProductoRepo;
    $this->ImgEventoRepo                       =  $ProductoImgRepo;
    
  }

  public function get_admin_productos(Request $Request)
  {

    $Eventos = $this->EntidadDelControladorRepo->getEntidadesAllPaginadasYOrdenadas($Request,'fecha','desc',30);

    return view('admin.eventos.eventos_home', compact('Eventos'));
  }



  //get Crear 
  public function get_admin_productos_crear()
  { 
    $Marcas = $this->MarcaRepo->getEntidadActivas();  
    return view('admin.eventos.eventos_crear',compact('Marcas'));
  }



  //set 
  public function set_admin_productos(Request $Request)
  {     
      
      $Evento    = $this->EntidadDelControladorRepo->getEntidad();

      $Evento->estado = 'si';      

      $Propiedades = ['name','description','fecha','ubicacion'];  
      
      $manager = new crear_evento_admin_manager(null, $Request->all());

      //imagenes
      $files = $Request->file('img');

     

      
        
        //valido la data
        if ($manager->isValid())
        {


           $Evento = $this->EntidadDelControladorRepo->setEntidadDato($Evento,$Request,$Propiedades);

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
                $this->ImgEntidadRepo->set_datos_de_img($file,$this->ImgEntidadRepo->getEntidad(),'evento_id',$Evento->id,$Request,'ProductoImagenes/' );
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
  public function get_admin_productos_editar($id)
  {
    $Evento = $this->EntidadDelControladorRepo->find($id);
    $Marcas = $this->MarcaRepo->getEntidadActivas();


    return view('admin.eventos.eventos_editar',compact('Evento','Marcas'));
  }

  //set edit admin 
  public function set_admin_productos_editar($id,Request $Request)
  {
    $Evento = $this->EntidadDelControladorRepo->find($id);

    $Propiedades = ['name','description','estado','fecha','ubicacion'];

    try{
      DB::beginTransaction(); 
      
    $this->EntidadDelControladorRepo->setEntidadDato($Evento,$Request,$Propiedades);     

      //imagenes
      $files = $Request->file('img');
      
      //verifico si la pocion 0 es diferente de null, significa que el array no esta vacio
      if($files[0] != null )
      {        

        foreach($files as $file)
        { 
          $this->ImgEntidadRepo->set_datos_de_img($file,$this->ImgEntidadRepo->getEntidad(),'evento_id',$Evento->id,$Request,'ProductoImagenes/' );
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
  public function set_admin_productos_img($id_evento,Request $Request)
  {   
      //archivos imagenes
      $files = $Request->file('img');

      if(!empty($files))
      {
        foreach($files as $file)
        {           

          $this->ImgEntidadRepo->set_datos_de_img($file,$this->ImgEntidadRepo->getEntidad(),'evento_id',$id_evento,$Request,'EventosImagenes/' );
                    
        }
        
      }

      return redirect()->back()->with('alert', 'Imagen Subida Correctamente');
      
  }


  //elimino img adicional
  public function delete_admin_productos_img($id_img)
  {
      $imagen = $this->ImgEntidadRepo->find($id_img); 

      $evento = $this->EntidadDelControladorRepo->find($imagen->evento_id);

      //me fijo si hay mas imagenes
      if($evento->imagenesevento->count() > 1)
      {
        $this->ImgEntidadRepo->destroy_entidad($id_img);

        return redirect()->back()->with('alert-rojo', 'Imagen Eliminada');
      }
      else
      {
        return redirect()->back()->with('alert-rojo', 'No puedes elminiar porque es la única');
      }  

      
  }

  //fijo como imagen principal 
  public function establecer_como_imagen_principal_producto($id_img)
  {
      $this->ImgEntidadRepo->cambio_a_imagen_principal($id_img);

      return redirect()->back()->with('alert', 'Imagen principal cambiada');
  }




  

  
}