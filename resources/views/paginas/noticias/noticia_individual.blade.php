@extends('layouts.user_layout.user_layout')



@section('og-tags')
{{-- <meta property="og:title" content="Global Target">
     <meta property="og:description" content="Agencia de modelos, eventos y promociones.">
     <meta property="og:image" content="https://www.globaltarget.com.uy/thumbnail.jpg">
     <meta property="og:url" content="https://www.globaltarget.com.uy/"> --}}
@stop


@section('title')
      | {{$Empresa->name}}
@stop


@section('MetaContent')

@stop

@section('MetaRobot')

@stop

@section('palabras-claves')

@stop



@section('content')

<div  class="{{-- masthead --}} get_width_100 "  >
  
<div id="carouselExampleIndicators" class="carousel slide auto" data-ride="carousel" data-interval="5000">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="post-img-slider-size Slider_cabecer_img" src="{{$Noticia->url_img_portada}}"> 
     
    </div>
   
  </div>


      <div class="carousel-caption  Slider-Contendor d-md-block Helper-OrdenarHijos-Row">
        <div class="get_width_100 flex-row-center" style="min-height: 100vh;">
          <div class="get_width_100">
              <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase Slider_cabecera_caption_titulo text-color-black">
                  <strong>{{$Noticia->name}}</strong>
                </h1>
               </div>  
          </div>
        </div>
      </div>
      {{-- <img src="{{url()}}/imagenes/580b57fcd9996e24bc43c513.png" class="Slider_cabecera_caption_logo">   --}}
  

</div>
</div>

  <div class="contenedor-listado-noticias">  
    

    <p class="post-individual-p">
      Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe, a round earth in which all the directions eventually meet, in which there is no center because every point, or none, is center — an equal earth which all men occupy as equals. The airman's earth, if free men make it, will be truly round: a globe in practice, not in theory.      
    </p>
     <p class="post-individual-p">
      Science cuts two ways, of course; its products can be used for both good and evil. But there's no turning back from science. The early warnings about technological dangers also come from science.
    </p>
     <p class="post-individual-p">
      What was most significant about the lunar voyage was not that man set foot on the Moon but that they set eye on the earth.   
    </p>

    <h2 class="post-individual-section-titulo">The Final Frontier</h2>

     <p class="post-individual-p">
      There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.   
     </p>

  </div>


   <div class="contenedor-listado-noticias" id="contenido-noticia">  
    
       {{html_entity_decode($Noticia->contenido_render)}}

  </div>

  


@stop