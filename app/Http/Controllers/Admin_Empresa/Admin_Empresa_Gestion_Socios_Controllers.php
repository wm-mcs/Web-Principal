<?php

namespace App\Http\Controllers\Admin_Empresa;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use App\Repositorios\EmpresaConSociosoRepo;
use Illuminate\Http\Request;




class Admin_Empresa_Gestion_Socios_Controllers extends Controller
{

  protected $EmpresaConSociosoRepo;

  public function __construct(EmpresaConSociosoRepo $EmpresaConSociosoRepo)
  {
    $this->EmpresaConSociosoRepo = $EmpresaConSociosoRepo;
  }

  //home admin User
  public function get_admin_empresas_gestion_socios(Request $Request)
  { 
    $marcas = $this->EmpresaConSociosoRepo->getEntidadActivasPaginadas();

    //mostrar marcas de la a a la z (orden)

    return view('admin.marcas.marcas_home', compact('marcas'));
  }

  //get Crear admin User
  public function get_admin_empresas_gestion_socios_crear()
  {  
    return view('admin.marcas.marcas_crear');
  }

  //set Crear admin User
  public function set_admin_empresas_gestion_socios_crear(Request $Request)
  {     

      //propiedades para crear
      $Propiedades = ['name','description','estado','rank'];

      //traigo la entidad
      $marca = $this->EmpresaConSociosoRepo->getEntidad();

      //grabo todo las propiedades
      $this->EmpresaConSociosoRepo->setEntidadDato($marca,$Request,$Propiedades);     

      //para la imagen
      $this->EmpresaConSociosoRepo->setImagen($marca,$Request,'img','Marcas/', $marca->name,'.png'); 

     return redirect()->route('get_admin_marcas')->with('alert', 'Marca Creado Correctamente');
    
  }

  //get edit admin marca
  public function get_admin_marcas_editar($id)
  {
    $marca = $this->EmpresaConSociosoRepo->find($id);

    return view('admin.marcas.marcas_editar',compact('marca'));
  }

  //set edit admin marca
  public function set_admin_marcas_editar($id,Request $Request)
  {
    $marca = $this->EmpresaConSociosoRepo->find($id);    

    //propiedades para crear
    $Propiedades = ['name','description','estado','rank'];    

    //grabo todo las propiedades
    $this->EmpresaConSociosoRepo->setEntidadDato($marca,$Request,$Propiedades);

    $this->EmpresaConSociosoRepo->setImagen($marca,$Request,'img','Marcas/', $marca->name,'.png');

    return redirect()->route('get_admin_marcas')->with('alert', 'Marca Editado Correctamente');  
  }

  
}