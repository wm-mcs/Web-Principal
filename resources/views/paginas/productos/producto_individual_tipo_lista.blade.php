<a href="{{$Entidad->route}}">
<div class="producto-lista-contenedor">

<div class="producto-lista-contiene-img">
  
    <img src="{{$Entidad->url_img}}" class="producto-lista-img">
  
</div>

<div class="producto-lista-contiene-name">

  <div class="producto-lista-name color-text-gris"> {{$Entidad->name}} </div>
  
  
</div>


<div class="producto-lista-contiene-precio">
  <div class="producto-lista-precio">  {{$Entidad->moneda}}  {{$Entidad->precio}}</div>
  @if($Entidad->stock > 0)
    <div class="text-center color-text-success helper-reduce-texto">
        Entrega inmediata <i class="far fa-check"></i>
    </div>

  @else
    <div class="text-center color-text-gris helper-reduce-texto "> 
        Disponible en 24hs  <i class="far fa-clock"></i>
    </div>
  @endif

</div>
  


  
</div>
</a>