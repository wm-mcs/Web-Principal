<div class="admin-columna-contenedor">

 {{-- imagen logo --}}
 <a href="{{route('get_home')}}"><img class="admin-header-logo" src="{{url()}}/imagenes/Empresa/isologo.png"></a>

 <ul>
   @if(Auth::user()->role === 'adminMcos522')
   <div id="admin-col-superadmin">
        <a href="{{route('get_datos_home_web')}}">
            <li class="admin-columna-li mi-float-right"><i class="fas fa-igloo"></i> Admin Panel</li>
        </a> 
        <a href="{{route('get_admin_users')}}">
          <li class="admin-columna-li mi-float-right"><span class="glyphicon glyphicon-triangle-right"></span> Usuarios</li>
        </a>
        
    </div>
   @endif

   <div id="admin-col-admin">
        <a href="{{route('get_datos_corporativos')}}">
            <li class="admin-columna-li mi-float-right"><span class="glyphicon glyphicon-triangle-right"></span> La Empresa</li>
        </a>        
        
    </div>

</ul>

    <div id="admin-col-backtoweb">
        <a href="{{route('get_home')}}">
            <p><small>Nombre</small></p>
        </a>
    </div>

    
</div>