<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    

    <title>{{$Empresa->name}}</title>
    <meta name="Description" content="{{$Empresa->descripcion_empresa}}">      
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="{{$Empresa->palabras_claves_empresa}}">

    {{-- css --}}   
    @include('layouts.user_layout.css_fonts')

 

  </head>

  <body id="page-top">

    <!-- Navigation -->
    @include('paginas.home.home_nav')
    @include('paginas.home.slider')
    
   
      @include('paginas.home.home_about') 
      @include('paginas.home.home_clientes')
    <span id="app">
      @include('paginas.home.home_pasos_para_concretar')  
      @include('paginas.home.home_precios')
      @include('paginas.home.home_garantia')
      
      @include('paginas.home.home_footer')
      

          {{-- <div class="col-sm-10"> 
    <h1>JSON</h1>
    <pre>
      @{{$data}}
    </pre>
  </div> --}}
    </span> 


       
 

    



    <!-- Scripts -->
    <script src="{{url()}}{{ elixir('js/all.js')}} " ></script>  
    @include('paginas.home.home_vue_script')
    

   

  </body>

</html>
