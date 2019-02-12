@if($Entidad->estado != 'si')
 <div class="admin-marca-lista-contenedor admin-marca-lista-contenedor-desactivado">
@else
 <div class="admin-marca-lista-contenedor">
@endif
   
   <img class="admin-marca-img" src="{{$Entidad->url_img}}">
  
   <div class="admin-marca-contnedor-datos">
    
    <div>      
     <div class="admin-marca-titulo"> {{$Entidad->name}}      </div>
    </div>
     

     <div class="admin-user-lista-contenedor-acciones">
        <a href="{{$Entidad->route_admin}}">
          <span class="boton-acciones-editar">
            <span class="icon-create"> </span> 
          </span>
        </a>
     </div>
      
   
   </div>
   
  
</div>