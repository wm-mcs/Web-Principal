<?php

namespace App\Http\Controllers\Admin_Empresa;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use App\Repositorios\EmpresaConSociosoRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Guardianes\Guardian;
use App\Repositorios\SocioRepo;
use App\Managers\EmpresaGestion\CrearSocioModalManager;
use App\Repositorios\TipoDeServicioRepo;




class Admin_Empresa_Gestion_Socios_Controllers extends Controller
{

  protected $EmpresaConSociosoRepo;
  protected $Guardian;
  protected $SocioRepo;
  protected $TipoDeServicioRepo;

  public function __construct(EmpresaConSociosoRepo $EmpresaConSociosoRepo, 
                              Guardian              $Guardian,
                              SocioRepo             $SocioRepo, 
                              TipoDeServicioRepo    $TipoDeServicioRepo )
  {
    $this->EmpresaConSociosoRepo = $EmpresaConSociosoRepo;
    $this->Guardian              = $Guardian;
    $this->SocioRepo             = $SocioRepo;
    $this->TipoDeServicioRepo    = $TipoDeServicioRepo;
  }

  public function getPropiedades()
  {
    return ['name','user_id','rut','razon_social','email','celular','direccion','factura_con_iva','estado'];
  }

  //home admin User
  public function get_admin_empresas_gestion_socios(Request $Request)
  { 
    $Empresas = $this->EmpresaConSociosoRepo->getEntidadActivasPaginadas( $Request, 20);

    //mostrar marcas de la a a la z (orden)

    return view('admin.empresas_gestion_socios.empresa_gestion_socios_home', compact('Empresas'));
  }

  //get Crear admin User
  public function get_admin_empresas_gestion_socios_crear()
  {  
    return view('admin.empresas_gestion_socios.empresa_gestion_socios_home_crear');
  }

  //set Crear admin User
  public function set_admin_empresas_gestion_socios_crear(Request $Request)
  {     

      //propiedades para crear
      $Propiedades = $this->getPropiedades();

      //traigo la entidad
      $Entidad     = $this->EmpresaConSociosoRepo->getEntidad();

      //grabo todo las propiedades
      $this->EmpresaConSociosoRepo->setEntidadDato($Entidad,$Request,$Propiedades);     

      //para la imagen
      $this->EmpresaConSociosoRepo->setImagen( null ,$Request , 'img', 'Empresa/',  $Entidad->id.'-logo_empresa_socios'   ,'.jpg',250);

     return redirect()->route('get_admin_empresas_gestion_socios')->with('alert', 'Creado Correctamente');
    
  }

  //get edit admin marca
  public function get_admin_empresas_gestion_socios_editar($id)
  {
    $Entidad = $this->EmpresaConSociosoRepo->find($id);

    return view('admin.empresas_gestion_socios.empresa_gestion_socios_home_editar',compact('Entidad'));
  }

  //set edit admin marca
  public function set_admin_empresas_gestion_socios_editar($id,Request $Request)
  {
    $Entidad = $this->EmpresaConSociosoRepo->find($id);    

    //propiedades para crear
    $Propiedades = $this->getPropiedades();    

    //grabo todo las propiedades
    $this->EmpresaConSociosoRepo->setEntidadDato($Entidad,$Request,$Propiedades);

    //para la imagen
    $this->EmpresaConSociosoRepo->setImagen( null ,$Request , 'img', 'Empresa/',  $Entidad->id.'-logo_empresa_socios'   ,'.jpg',250);

    return redirect()->route('get_admin_empresas_gestion_socios')->with('alert', 'Editado Correctamente');  
  }



  //Panel de gestio de empresa
  public function get_empresa_panel_de_gestion($id)
  {
     $User            = Auth::user();  
      

     if($this->Guardian->son_iguales($User->empresa_gestion_id,$id) || $User->role == 'adminMcos522' )
     {
       $Empresa_gestion = $this->EmpresaConSociosoRepo->find($id); 
       
       /*dd($Socios);*/
       return view('empresa_gestion_paginas.home', compact('Empresa_gestion'));   
     }
     else
     {
       return redirect()->back()->with('alert-danger', 'hay algo raro aquí :( ');
     }   

      
  }


  //me devulve los oscios activos
  public function get_socios_activos($empresa_id)
  {

       $User            = Auth::user();  

       if($this->Guardian->son_iguales($User->empresa_gestion_id,$empresa_id ) || $User->role == 'adminMcos522' )
       {      
      
       $Socios          = $this->SocioRepo->getSociosBusqueda($empresa_id,null,30);
      
       return ['socios' => $Socios];
       }
     
  }

  //es el panel del socio para editar
  public function get_socio_panel($id)
  {

       $User            = Auth::user();       
      
       $Socio           = $this->SocioRepo->find($id);
      
       //verifico que el socio sea de esa empresa y no de otra
       if($this->Guardian->son_iguales($User->empresa_gestion_id,$Socio->empresa_id ) || $User->role == 'adminMcos522' )
       {           

         $Empresa_gestion = $this->EmpresaConSociosoRepo->find($Socio->empresa_id); 
         return view('empresa_gestion_paginas.socio_panel', compact('Socio','Empresa_gestion'));   
       }
       else
       {
         return redirect()->back()->with('alert-danger', 'hay algo raro aquí :( ');
       }   
     
  }

  //devulve el socio
  public function get_socio($id)
  {
       $User            = Auth::user();       
      
       $Socio           = $this->SocioRepo->find($id);

       if($this->Guardian->son_iguales($User->empresa_gestion_id,$Socio->empresa_id ) || $User->role == 'adminMcos522' )
       { 
          return ['Validacion'           => true,
                  'Validacion_mensaje'   => 'Socio agregado correctamente',
                  'Socio'                => $Socio 
                 ];
       }
       else
       {
          return ['Validacion'           => false,
                  'Validacion_mensaje'   => 'No se puede acceder a el socio en este momento'
                 ];
       }
  }


  
  //Post para crear socio desde modal
  public function post_crear_socio_desde_modal(Request $Request)
  { 
        $User            = Auth::user();  

        $entidad = '';
        $manager = new CrearSocioModalManager($entidad,$Request->all());
        $Validacion = false;


    if ($manager->isValid())
    {
     if($this->Guardian->son_iguales($User->empresa_gestion_id,$Request->get('empresa_id')) || $User->role == 'adminMcos522' )
     { 
       $Socio                   = $this->SocioRepo
                                       ->getEntidad();


       $Socio->empresa_id       = $User->empresa_gestion_id;
       $Socio->factura_con_iva  = 'no';
       $Socio->estado           = 'si';

       $Propiedades = ['name','email','celular','cedula'];

       $this->SocioRepo->setEntidadDato($Socio,$Request,$Propiedades);  

       $Validacion = true;



       return ['Validacion'          => $Validacion,
               'Validacion_mensaje'  => 'Se creo correctamente '. $Socio->name,
               'Socio'               => $this->SocioRepo->find($Socio->id),
               'Socios'              => $this->SocioRepo->getEntidadActivas()];



     }
     else
     {
       return ['Validacion'          => $Validacion,
               'Validacion_mensaje'  => 'No se puede crear el socio en este momento'];
     }   
    }
    else
    {
      return  ['Validacion'          => $Validacion,
                     'Validacion_mensaje'  => 'No se puede crear el socio en este momento'];
    }

    
  }

  //para editar al socio desde el modal
  public function post_editar_socio_desde_modal(Request $Request)
  {
        $User    = Auth::user();  

        $entidad = '';
        $manager = new CrearSocioModalManager($entidad,$Request->all());
        $Validacion = false;

        $Socio   = $this->SocioRepo->find($Request->get('id'));


   
     if($this->Guardian->son_iguales($User->empresa_gestion_id, $Socio->empresa_id) || $User->role == 'adminMcos522' )
     { 

       $Propiedades = ['estado','name','email','celular','cedula','direccion','rut','razon_social','mutualista','nota'];

       $this->SocioRepo->setEntidadDato($Socio,$Request,$Propiedades);  

       $Validacion = true;



       return ['Validacion'          => $Validacion,
               'Validacion_mensaje'  => 'Se editó correctamente a '. $Socio->name,
               'Socio'               => $this->SocioRepo->find($Socio->id)];



     }
     else
     {
       return ['Validacion'          => $Validacion,
               'Validacion_mensaje'  => 'No se puede crear el socio en este momento'];
     }   
    
   
  }

  public function get_tipo_servicios($empresa_id)
  {
    $Validacion  = false;
    $User        = Auth::user();  
    

     if($this->Guardian->son_iguales($User->empresa_gestion_id, $empresa_id) || $User->role == 'adminMcos522' )
     { 

       $Validacion = true;

       return ['Validacion'          => $Validacion,
               'Validacion_mensaje'  => 'Se cargó correctamente',
               'servicios'           => $this->TipoDeServicioRepo->getServiciosActivosDeEmpresa($empresa_id)];

     }
     else
     {
       return ['Validacion'          => $Validacion,
               'Validacion_mensaje'  => 'Algo anda mal'];
     }   
  }


  //agrega un nuevo tipo de servicio ( Tipo Clase o Tipo Mensual )
  public function set_nuevo_servicio(Request $Request)
  {
   

     $Validacion  = false;
     $User        = Auth::user();  
     

     if($this->Guardian->son_iguales($User->empresa_gestion_id, $Request->get('empresa_id')) || $User->role == 'adminMcos522' )
     { 
       $Entidad     = $this->TipoDeServicioRepo->getEntidad(); 

       $Propiedades = ['name','tipo','empresa_id'];

       $Entidad->estado = 'si';
       $Entidad->moneda = '$';
       $Entidad->valor  = 0;

       $this->TipoDeServicioRepo->setEntidadDato($Entidad,$Request,$Propiedades); 

       $Validacion = true;

       return ['Validacion'          => $Validacion,
               'Validacion_mensaje'  => 'Se creo correctamente ',
               'servicios'           => $this->TipoDeServicioRepo->getServiciosActivosDeEmpresa($Request->get('empresa_id'))];

     }
     else
     {
       return ['Validacion'          => $Validacion,
               'Validacion_mensaje'  => 'No se puede crear el tipo de servicio en este momento'];
     }   
    
  }


  //borrar un servicio
  public function delet_servicio(Request $Request)
  {
     $Validacion  = false;
     $User        = Auth::user();       

     if($this->Guardian->son_iguales($User->empresa_gestion_id, $Request->get('empresa_id')) || $User->role == 'adminMcos522' )
     { 
       $Entidad     = $this->TipoDeServicioRepo->find($Request->get('id')); 

       $this->TipoDeServicioRepo->destruir_esta_entidad($Entidad);

       $Validacion = true;

       return ['Validacion'          => $Validacion,
               'Validacion_mensaje'  => 'Se borró correctamente ',
               'servicios'           => $this->TipoDeServicioRepo->getServiciosActivosDeEmpresa($Request->get('empresa_id'))];

     }
     else
     {
       return ['Validacion'          => $Validacion,
               'Validacion_mensaje'  => 'No se puede borrar el tipo de servicio en este momento'];
     }   
  }




  //editar un servicio
  public function editar_servicio(Request $Request)
  {
     $Validacion  = false;
     $User        = Auth::user();  
     
     if($this->Guardian->son_iguales($User->empresa_gestion_id,$Request->get('empresa_id')) || $User->role == 'adminMcos522' )
     { 

       $Validacion  = true;
       $Servicio    = $Request->get('servicio');

       return $Servicio;
       $Entidad     = $this->TipoDeServicioRepo->find($Servicio->id); 


       
       //las porpiedades que se van a editar
       $Propiedades = ['name','tipo','valor','moneda'];

       /*foreach($Propiedades as $Propiedad)
       {
        $Entidad->$Propiedad = $Servicio->$Propiedad;
       }

       $Entidad->save();*/

       

       return ['Validacion'          => $Validacion,
               'Validacion_mensaje'  => 'Se editó correctamente ',
               'servicios'           => $this->TipoDeServicioRepo->getServiciosActivosDeEmpresa($Request->get('empresa_id'))];

     }
     else
     {
       return ['Validacion'          => $Validacion,
               'Validacion_mensaje'  => 'No se puede editar el tipo de servicio en este momento'];
     } 
  }



  
}