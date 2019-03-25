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

 <div class="contenedor-listado-noticias">  
  <div class="col-lg-12 text-center">
     <h1 class="text-uppercase text-color-black" style="margin-top:78px;">
        <strong> {{$Entidad->name}}</strong>
     </h1>
     <hr class="my-4"> 
  </div>  
  


  <div class="producto-individual-contenedor-imgs" >
    @foreach($Entidad->imagenes_producto as $Img)
     <div class="producto-individual-img-contendor">
       <img data-flickity-lazyload="{{$Img->url_img}}" class="producto-individual-img">
     </div>    
    @endforeach
  </div>


  <div class="producto-individual-descripcion">
    {{$Entidad->description}}
  </div>


  



  </div>

  


@stop