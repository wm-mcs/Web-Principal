<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- social media meta-tags for proper sharing
    (la imagen tiene que estar en la carpeta root, ratio 1.91:1 1200x630px) -->
    <meta property="og:title" content="Global Target">
    <meta property="og:description" content="Agencia de modelos, eventos y promociones.">
    <meta property="og:image" content="http://www.globaltarget.com.uy/thumbnail.jpg">
    <meta property="og:url" content="http://www.globaltarget.com.uy/">
    
    <!-- Favicons (tienen que estar en la carpeta root) -->
    <link rel="icon" type="image/png" href="http://www.globaltarget.com.uy/favicon-16x16.png" sizes="16x16">  
    <link rel="icon" type="image/png" href="http://www.globaltarget.com.uy/favicon-32x32.png" sizes="32x32">  
    <link rel="icon" type="image/png" href="http://www.globaltarget.com.uy/favicon-96x96.png" sizes="96x96">

    <!-- Apple Touch Icons (tienen que estar en la carpeta root) -->
    <link rel="apple-touch-icon" href="older-iPhone.png"> <!-- // 120px -->  
    <link rel="apple-touch-icon" sizes="180x180" href="iPhone-6-Plus.png">  
    <link rel="apple-touch-icon" sizes="152x152" href="iPad-Retina.png">  
    <link rel="apple-touch-icon" sizes="167x167" href="iPad-Pro.png">

    <title>{{$Empresa->name}} - Error 404</title>
    <meta name="Description" CONTENT="@yield('MetaContent')">

    <link rel="stylesheet" type="text/css" href="{{url()}}{{ elixir('css/app.css') }}">   
    <link rel="stylesheet" type="text/css" href=" {{ asset('Iconos/fonts/style.css')}}">
    <META name="robots" content="@yield('MetaRobot')">





  </head>
  <body>

      <div class="bg-error">
		<div class="row">
			<div class="col-sm-8 col-sm-push-2 col-lg-6 col-lg-push-3">
				<div class="center-content-flex">
					<h1>ERROR 404</H1>
					<h2>La página que estás buscando no existe</h2>
					<h3>Asegúrate de que la dirección URL sea correcta.</h3>
					<h4>- Atte.,<br>el quipo de Global Target.</h4>
					<div class="space-top"><img src="imagenes/Empresa/logo-gt.png"></div>
					<a href="{{route('get_pagina_home')}}">
  					<h5 class="ampliar text-center"><span class="glyphicon glyphicon-triangle-right"></span>volver a la Home</h5></a>
				</div>
			</div>
		</div>
      </div>


  <!-- Scripts -->
  <script src="{{ asset('js/all.js')}}"></script>    

  <!-- activate WOW.js (ya está cargada al principio del html code) --> 
  <script> new WOW().init(); </script>

  </body>
</html>