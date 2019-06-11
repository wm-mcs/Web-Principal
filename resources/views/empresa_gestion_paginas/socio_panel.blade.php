@extends('layouts.gestion_socios_layout.admin_layout')


@section('miga-de-pan') 
  <span>Panel de socio {{$Socio->name}}</span>
@stop

@section('content')
  
 <span id="app">
    
  
  <socio-panel-componente></socio-panel-componente>



</span>
@stop

@section('vue-logica')


<script type="text/javascript">



     @include('empresa_gestion_paginas.Vue_logica.Componentes.socio-panel-componente')
     @include('empresa_gestion_paginas.Vue_logica.Componentes.socios-lista-componente')
     @include('empresa_gestion_paginas.Vue_logica.Componentes.socio-entidad-listado-componente')

     @include('empresa_gestion_paginas.Vue_logica.instancia_vue')



</script>

@stop