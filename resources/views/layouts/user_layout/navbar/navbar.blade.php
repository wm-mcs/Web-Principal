 
  <!--navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top" id="mynavbar">
    


    <div class="container">
      <div class="navbar-header navbar-nav">
        <div class="text-center"><!-- para centrar el navbar toggle button -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <a class="navbar-brand" href="{{route('get_home')}}"><img class="navbar-logo" src="{{url()}}/imagenes/Empresa/navbar-logo-Global-Target2.png"></a>
        </div>
      </div> <!-- / container fluid-->


      <div class="container">
      <div class="collapse navbar-collapse" id="defaultNavbar1">
      <!-- Collect the nav links, forms, and other content for toggling -->
        <ul class="nav navbar-nav">
          <li><a href="{{route('get_home')}}">HOME</a></li>
          <li><a href="{{route('get_pagina_empresa')}}">NOSOTROS</a></li>
          <li><a href="{{route('get_pagina_servicios')}}">SERVICIOS</a></li>
          <li><a href="{{route('get_pagina_marcas')}}">CLIENTES</a></li>
          <li><a href="{{route('get_pagina_eventos')}}">GALERÍA</a></li>
          <li><a href="{{route('get_pagina_contacto')}}">CONTACTO</a></li>


          {{-- contenidos ocultos para mostrar con tooltips --}}
          <div style="display: none;">
             <div class="contenido-inicio-de-sesion-navbar">
              <h3>Inicio de sesión</h3>
              @include('formularios.auth.login_form')
             </div>
             
             {{-- contenido a mostrar de user desplegado --}}
              @if(!Auth::guest())
               <div class="contenido-auth-deplegado-navbar">              
                 <ul>
                    @if(Auth::user()->role != 'user')
                    <li><a href="{{route('get_datos_home_web')}}">Admin</a></li>
                    @endif
                    <li><a href="{{route('logout')}}">Salir</a></li>
                 </ul>
              </div> 
             @endif
             

          </div>

        </ul>


        <!-- aqui pongo el tema de inicio de sesion y datos del user -->
        @include('layouts.user_layout.navbar.auth')       


      </div>    <!-- /.navbar-collapse -->
    </div> <!-- / container fluid-->

    <!-- errores -->
    <div class="contendor-contenedor-errores-header">         
      @include('alerts.Alertas_Todos_Agrupados.alertas_agrupados') 
    </div> 

    <!-- /.container-fluid -->
  </nav>
  <!-- /nav -->













