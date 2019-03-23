<div class="producto-lista-contenedor">

<div class="producto-lista-contiene-img">
  <a href="">
    <img src="{{$Productos->url_img}}" class="producto-lista-img">
  </a>
</div>

<div class="producto-lista-contiene-name">

  <div class="producto-lista-name color-text-gris"> {{$Productos->name}} </div>
  
  
</div>


<div class="producto-lista-contiene-precio">
  <div class="producto-lista-precio">  {{$Productos->moneda}}  {{$Productos->precio}}</div>
</div>
  


  
</div>