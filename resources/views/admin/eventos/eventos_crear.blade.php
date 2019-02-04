@extends('layouts.admin_layout.admin_layout')

@section('content')

<div class="admin-contnedor-navegacion-miga">
  {{-- home --}}
  <a href="{{route('get_admin_home')}}"><span class="icon-home"></span></a>

  {{-- separador --}}
  <span class="spam-separador">|</span> 

  {{-- lugar atras --}}
  <a href="{{route('get_admin_eventos')}}"><span>Proyectos</span></a>

  {{-- separador --}}
  <span class="spam-separador">|</span> 

  {{-- lugar donde esta --}}
  <span>Crear Evento</span>
</div>

<div class="contenedor-admin-entidad">

 {{-- titulo --}}
 <div class="admin-entidad-titulo">Crear Evento 
 </div>

 {{-- formulario --}}
  {!! Form::open(['route' => 'set_admin_eventos_crear',
                            'method'=> 'post',
                            'files' =>  true,
                            'id'    => 'form-admin-empresa-datos'
                          ])               !!}
   <div class="formulario-contenedor">
      {{-- datos corporativos --}}
      <div class="contenedor-grupo-datos">
        <div class="contenedor-grupo-datos-titulo"> Datos</div>
        <div class="contenedor-formulario-label-fiel">                       
          @include('admin.eventos.formularios_partes.datos_basicos')
          {{-- fecha del evento --}}
         <div class="formulario-label-fiel">
          {!! Form::label('fecha', 'Fecha', array('class' => 'formulario-label ')) !!}
          {!! Form::date('fecha',\Carbon\Carbon::now()) !!}          
        </div>
        </div>
      </div>

      {{-- datos imagenes --}}
      <div class="contenedor-grupo-datos">
        <div class="contenedor-grupo-datos-titulo"> Marcas asociadas</div>
        <div class="contenedor-formulario-label-fiel">                       
          @include('admin.eventos.formularios_partes.datos_marcas')
        </div>
      </div>
      {{-- datos imagenes --}}
      <div class="contenedor-grupo-datos">
        <div class="contenedor-grupo-datos-titulo">Imagenes</div>
        <div class="contenedor-formulario-label-fiel">                       
          @include('admin.eventos.formularios_partes.datos_imagenes')
        </div>
      </div>      
   </div>

    {!! Form::hidden('tipo_de_boton','hola') !!}
   
  <div class="Helper-OrdenarHijos-columna get_width_100" >
      <dir class="Helper-OrdenarHijos-Row">
         <div class="boton-formato editar-evento-guardar">
           Crear
         </div> 

         <div style="padding: 20px;"></div>

         <div class="boton-formato editar-evento-guardar-y-salir">
           Crear y salir
         </div> 
     </dir>
   </div>

   


  {!! Form::close() !!}


  
</div>
  
@stop