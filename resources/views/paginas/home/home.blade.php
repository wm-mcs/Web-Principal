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
   
    <link rel="stylesheet" type="text/css" href="{{url()}}{{ elixir('css/creative_template_mixer.css') }}">     
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

 

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
      @include('paginas.home.home_contacto')
      @include('paginas.home.home_footer')
      @include('paginas.home.home_modal_contacto')
      @include('paginas.politicas.garantia_modal')

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
    </script> 

   

  </body>

</html>
