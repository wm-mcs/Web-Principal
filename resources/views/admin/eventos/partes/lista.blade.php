@if($Evento->estado != 'si')
 <div class="admin-marca-lista-contenedor admin-marca-lista-contenedor-desactivado">
@else
 <div class="admin-marca-lista-contenedor">
@endif
   
   <img class="admin-marca-img" src="{{$Evento->url_img}}">
  
   <div class="admin-marca-contnedor-datos">
    
    <div>
     <div class="admin-marca-fecha">{{$Evento->fecha_de_realizacion->format('d-m-Y')}}</div>     
     <div class="admin-marca-titulo"> {{$Evento->name}}      </div>
    </div>
     

     <div class="admin-user-lista-contenedor-acciones">
        <a href="{{route('get_admin_eventos_editar', $Evento->id)}}">
          <span class="boton-acciones-editar">
            <span class="icon-create"> </span> 
          </span>
        </a>
     </div>
      
   
   </div>
   
  
</div>