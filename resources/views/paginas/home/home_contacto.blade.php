<section class="BackgroundGris" id="contact">
      <div class="flex-row-center flex-wrap get_width_100 flex-justifice-space-around">
        <div class="contiene_contacto_img">
          <img src="{{ url() }}/imagenes/team/mauri1.jpg" class="contacto_img"> 
          <div class="contacto_name">Mauricio</div>
          <div class="contacto_aclaracion color-text-gris"> Estoy encargado de atenderte en lo que necesites..</div>
          @if($Empresa->whatsapp_empresa != 'no')
                  <a class="footer-icono-social" href="{{$Empresa->link_whatsapp_send}}"> 
                    <i class="fab fa-whatsapp"></i>
                  </a>
          @endif
        </div>
       
         {{-- formulario de contacto --}}
         
         <div class="flex-row-column" style="max-width: 850px;">
            @include('paginas.home.home_contacto_formulario')
         </div>
          
         
       

      
      </div>

       
</section>