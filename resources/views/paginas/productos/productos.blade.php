@extends('layouts.user_layout.user_layout')



@section('og-tags')
{{-- <meta property="og:title" content="Global Target">
     <meta property="og:description" content="Agencia de modelos, eventos y promociones.">
     <meta property="og:image" content="https://www.globaltarget.com.uy/thumbnail.jpg">
     <meta property="og:url" content="https://www.globaltarget.com.uy/"> --}}
@stop


@section('title')
   Productos   | {{$Empresa->name}}
@stop


@section('MetaContent')

@stop

@section('MetaRobot')

@stop

@section('palabras-claves')

@stop



@section('content')


 <h1 class="text-uppercase text-color-black">
        <strong>Productos</strong>
      </h1>

  <div class="contenedor-listado-noticias">

    
    
      @include('paginas.productos.producto_individual_tipo_lista')   

    

  </div>

  


@stop