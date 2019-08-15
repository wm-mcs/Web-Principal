@extends('layouts.creative.layout_creative')

@section('titulo') {{$Empresa->name}} @stop

@section('descripcion') {{$Empresa->descripcion_empresa}} @stop

@section('robot') index, follow @stop

@section('palabras_claves') {{$Empresa->palabras_claves_empresa}} @stop 

@section('og-propiedades') 

<meta property="og:url"                content="{{url()}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="{{$Empresa->name}} | Creamos Paginas Webs" />
<meta property="og:description"        content="{{$Empresa->descripcion_empresa}}" />
<meta property="og:image"              content="{{$Empresa->img_logo_cuadrado}}" />
<meta property="og:image:secure_url"   content="{{$Empresa->img_logo_cuadrado}}" /> 
<meta property="og:image:width"        content="50">
<meta property="og:image:height"       content="150">
<meta property="og:image:alt"          content="{{ $Empresa->name}}  Uruguay" /> 




@stop 





@section('nav') @include('paginas.home.home_nav') @stop

@section('slider')  @include('paginas.home.slider') @stop

@section('contenido')
      @include('paginas.home.home_about') 
      @include('paginas.home.home_tener_pagina_web')
    
      @include('paginas.home.home_pasos_para_concretar')  
      @include('paginas.home.home_precios')
      @include('paginas.home.home_garantia')
@stop      









