<?php

namespace App\Http\Controllers\Admin_Empresa;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use App\Repositorios\NoticiasRepo;
use Illuminate\Http\Request;
use App\Managers\noticia_manager;



class Admin_Noticias_Controllers extends Controller
{

  protected $NoticiasRepo;

  public function __construct(NoticiasRepo $NoticiasRepo)
  {
    $this->NoticiasRepo = $NoticiasRepo;
  }

  //home admin User
  public function get_admin_noticias(Request $Request)
  { 
    $noticias = $this->NoticiasRepo->getEntidadesAllPaginadas($Request,3);

    return view('admin.noticias.noticias_home', compact('noticias'));
  }

  //get Crear admin User
  public function get_admin_noticias_crear()
  {  
    return view('admin.noticias.noticias_crear');
  }

  //set Crear admin User
  public function set_admin_noticias_crear(Request $Request)
  {     

    $noticia = $this->NoticiasRepo->getEntidad();

    $Propiedades = ['name','description','estado','header_text','url_video'];

    $manager = new noticia_manager(     null, $Request->all()  );


    if ($manager->isValid())
    {

      $this->NoticiasRepo->setEntidadDato($noticia,$Request,$Propiedades );

      $this->NoticiasRepo->setImagen( $noticia ,$Request , 'img', 'Img_Principal_Noticias/', $noticia->name ,'.png');
      
      return redirect()->route('get_admin_noticias')->with('alert', 'Noticia Creado Correctamente');
    }

   
    return redirect()->back()->withErrors($manager->getErrors())->withInput($manager->getData());
    
    
  }

  //get edit admin noticia
  public function get_admin_noticias_editar($id)
  {
    $noticia = $this->NoticiasRepo->find($id);

    return view('admin.noticias.noticias_editar',compact('noticia'));
  }

  //set edit admin marca
  public function set_admin_noticias_editar($id,Request $Request)
  {
    $noticia = $this->NoticiasRepo->find($id);

    $Propiedades = ['name','description','estado','header_text','url_video'];

    $this->NoticiasRepo->setEntidadDato($noticia,$Request,$Propiedades );

    $this->NoticiasRepo->setImagen( $noticia ,$Request , 'img', 'Img_Principal_Noticias/', $noticia->name ,'.png');

    return redirect()->route('get_admin_noticias')->with('alert', 'Noticia Editado Correctamente');  
  }

  
}