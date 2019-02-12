<div class="admin-entidad-contenedor-imagenes-y-form">
   @foreach($Entidad->imagenes as $img)
    <div class="admin-entidad-proyecto-img-adicionales-contenedor 
      @if($img->foto_principal == 'si') admin-entidad-proyecto-img-adicionales-contenedor__show 
      @endif">
      <img class="admin-entidad-proyecto-img-adicionales" src="{{$img->url_img}}">
      <a href="{{route('delete_admin_productos_img',$img->id)}}" class="icono-eleminar-imagen"><span class="icon-clear" ></span></a>
      @if($img->foto_principal != 'si')
        <a href="{{route('establecer_como_imagen_principal_producto',$img->id)}}" class="icono-establecer-imagen" title="Establecer como imagen principal">
         <span class="glyphicon glyphicon-star-empty" ></span>
        </a>
      @else
        <span class="icono-establecer-imagen">
          <span class="glyphicon glyphicon-star" ></span>
        </span>
         
       
      @endif

    </div>    
   @endforeach

   
</div>

