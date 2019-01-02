<?php

namespace App\Http\Controllers\Admin_Empresa;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use App\Repositorios\EmpresaRepo;
use Illuminate\Http\Request;



class Admin_Datos_Corporativos_Controller extends Controller
{

  protected $Empresa;

  public function __construct(EmpresaRepo $EmpresaRepo)
  {
    $this->Empresa = $EmpresaRepo;
  }

  public function get_datos_corporativos()
  {

    $Empresa = $this->Empresa->getEmpresaDatos();

    return view('admin.empresa.empresa_home', compact('Empresa'));
  }

  public function set_datos_corporativos(Request $Request)
  {
    $this->Empresa->setDatos($Request);

    return redirect()->back()->with('alert', 'has actualizado la información de manera correcta');
  }
}