@extends('layouts.gestion_socios_layout.admin_layout')


@section('miga-de-pan') 
  <span>Panel general de {{$Empresa_gestion->name}}</span>
@stop

@section('content')
  
 <span id="app">
    
  
  {{-- Buscar Socio --}}
  <div class="empresa-gestion-barra-top-boton-y-forma-busqueda">

      <div class="empresa-gestion-contiene-input-busqueda">
        <input class="empresa-gestion-input-busqueda form-control" type="text" placeholder="Buscar socio" aria-label="Search">
      </div>
      

      <socios-crear> </socios-crear>
   
  </div>  

  {{-- visor de socios --}}
  <div>
    
  </div>







  <div class="col-sm-10"> 
    <h1>JSON</h1>
    <pre>
      @{{$data}}
    </pre>
  </div>
       
 </div>





</span>
@stop

@section('vue-logica')


<script type="text/javascript">



     @include('empresa_gestion_paginas.Vue_logica.Componentes.socio_crear_editar_componente')
     @include('empresa_gestion_paginas.Vue_logica.Componentes.socio_general_componente')
     @include('empresa_gestion_paginas.Vue_logica.instancia_vue')



</script>

@stop