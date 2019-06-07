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
      

      <socios-crear-boton accion_name="Crear"  > </socios-crear-boton>
   
  </div>  

  {{-- visor de socios --}}
  <socios-lista></socios-lista>







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



     @include('empresa_gestion_paginas.Vue_logica.Componentes.socios-crear-boton_componente')
     @include('empresa_gestion_paginas.Vue_logica.Componentes.socios-lista-componente')
     @include('empresa_gestion_paginas.Vue_logica.Componentes.socio-entidad-listado-componente')
     @include('empresa_gestion_paginas.Vue_logica.instancia_vue')



</script>

@stop