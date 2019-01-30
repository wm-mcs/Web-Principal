<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- META-TAGS DE FAVICONS, DISPOSITIVOS Y THUMBNAILS -->
      <!-- social media meta-tags for proper sharing
      (la imagen tiene que estar en la carpeta root, ratio 1.91:1 1200x630px) -->
      <meta property="og:title" content="Global Target">
      <meta property="og:description" content="Agencia de modelos, eventos y promociones.">
      <meta property="og:image" content="https://www.globaltarget.com.uy/thumbnail.jpg">
      <meta property="og:url" content="https://www.globaltarget.com.uy/">
      
      <!-- Favicons (tienen que estar en la carpeta root) -->
      <link rel="icon" type="image/png" href="https://www.globaltarget.com.uy/favicon-16x16.png" sizes="16x16">  
      <link rel="icon" type="image/png" href="https://www.globaltarget.com.uy/favicon-32x32.png" sizes="32x32">  
      <link rel="icon" type="image/png" href="https://www.globaltarget.com.uy/favicon-96x96.png" sizes="96x96">

      <!-- Apple Touch Icons (tienen que estar en la carpeta root) -->
      <link rel="apple-touch-icon" href="older-iPhone.png"> <!-- // 120px -->  
      <link rel="apple-touch-icon" sizes="180x180" href="iPhone-6-Plus.png">  
      <link rel="apple-touch-icon" sizes="152x152" href="iPad-Retina.png">  
      <link rel="apple-touch-icon" sizes="167x167" href="iPad-Pro.png">

      <title>{{$Empresa->name}} - @yield('title')</title>
      <meta name="Description" CONTENT="@yield('MetaContent')">

      
      <META name="robots" content="@yield('MetaRobot')">



<script async src="https://www.googletagmanager.com/gtag/js?id=AW-794875575"></script>





















  </head>
  <body data-spy="scroll" data-target="navbar" data-offset="120"> <!-- le quité el punto al valor de data-target; .navbar decía antes -->

      <div class="global-wrapper">




           @include('layouts.user_layout.navbar.navbar')

           <div>
                @yield('content')  
           </div>




          <div>
             @include('layouts.user_layout.footer.footer')
          </div>

      </div>



  <!-- Scripts -->
  <script src="{{ asset('js/all.js')}}"></script> 

  </body>
</html>   