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

  @if($Entidad->stock > 0)
    <div class="producto-individual-aclaracion-stock">
        En stock: listo para entrega o envio inmediato <i class="far fa-grin"></i>
    </div>

  @else
    <div class="producto-individual-aclaracion-no-stock producto-individual-aclaracion-stock">
        Fuera de stock pero por llegar <i class="far fa-grin"></i>
    </div>
  @endif 

  <div class="producto-individual-precio">

    <div class="flex-row-center flex-justifice-space-around flex-wrap">
      
    
      <div class="flex-row-center" >
        <span class="">{{$Entidad->moneda}}</span> 
        <span class="">{{$Entidad->precio}}</span>         
      </div>
      <div class="flex-row-center">
        <div>¿Te interesa?</div>        
      </div>
      <div class="flex-row-center">
        <a href="https://api.whatsapp.com/send?phone={{$Empresa->numero_whatsapp_ya_arreglado}}&text=Hola!%20tengo%20interes%20en%20{{$Entidad->route}}"> Contactame ahora <i class="fab fa-whatsapp"></i> </a>        
      </div>

    </div>
    
  </div>


  



  </div>

  


@stop