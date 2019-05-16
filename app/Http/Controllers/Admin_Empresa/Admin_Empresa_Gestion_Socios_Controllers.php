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




class Admin_Empresa_Gestion_Socios_Controllers extends Controller
{

  protected $EmpresaConSociosoRepo;
  protected $Guardian;

  public function __construct(EmpresaConSociosoRepo $EmpresaConSociosoRepo, 
                              Guardian              $Guardian)
  {
    $this->EmpresaConSociosoRepo = $EmpresaConSociosoRepo;
    $this->Guardian              = $Guardian;
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



  public function get_empresa_panel_de_gestion($id)
  {
      $User            = Auth::user();  
      $Empresa_gestion = $this->EmpresaConSociosoRepo->find($id);

     if($this->Guardian->son_iguales($User->empresa_gestion_id,$id) || $User->role == 'adminMcos522' )
     {
       return view('empresa_gestion_paginas.home', compact('Empresa_gestion'));   
     }
     else
     {
       return redirect()->back()->with('alert-danger', 'hay algo raro aquí :( ');
     } 






      
  }

  
}