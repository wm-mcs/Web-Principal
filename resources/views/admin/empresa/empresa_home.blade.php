@extends('layouts.admin_layout.admin_layout')

@section('miga-de-pan') 
  <span>Mi Empresa</span>
@stop

@section('content')





 <div class="get_width_100 Helper-OrdenarHijos-columna"> 
          {{-- formulario --}}
          {!! Form::model($Empresa,['route' => 'set_datos_corporativos',
                                    'method'=> 'PATCH',
                                    'files' =>  true,
                                    'id'    => 'form-admin-empresa-datos'
                                  ])               !!}
           <div class="formulario-contenedor">
              {{-- datos corporativos --}}
              <div class="contenedor-grupo-datos">
                <div class="contenedor-grupo-datos-titulo"> Identidad</div>
                <div class="contenedor-formulario-label-fiel">                       
                  @include('admin.empresa.formularios_partes.datos_basicos')
                </div>
              </div>
              {{-- imagenes corporativos --}}
              <div class="contenedor-grupo-datos">
                <div class="contenedor-grupo-datos-titulo"> Imagen Corporativa</div>
                <div class="contenedor-formulario-label-fiel">                       
                  @include('admin.empresa.formularios_partes.datos_imagenes')
                </div>
              </div>
              {{-- datos de contacto --}}
              <div class="contenedor-grupo-datos">
                <div class="contenedor-grupo-datos-titulo"> Contacto</div>
                <div class="contenedor-formulario-label-fiel">                       
                  @include('admin.empresa.formularios_partes.datos_contactos')
                </div>
              </div>      
           </div>
           <div class="admin-boton-editar">
             Editar
           </div>
          {!! Form::close() !!}
   </div>
  
 </div>
  
@stop