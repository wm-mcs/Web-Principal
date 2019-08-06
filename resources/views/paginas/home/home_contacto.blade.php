<section class="BackgroundGris" id="contact">
      <div class="flex-row-center flex-wrap get_width_100 flex-justifice-space-around">
        <div class="contiene_contacto_img">
          <img data-src="{{ url() }}/imagenes/team/mauri1.jpg" class="contacto_img"> 
          <div class="contacto_name">Mauricio</div>
          <div class="contacto_aclaracion color-text-gris"> Estoy encargado de atenderte en lo que necesites..</div>
          @if($Empresa->whatsapp_empresa != 'no')


                <a class="contacto-whatsapp-contenedor" href="{{$Empresa->link_whatsapp_send}}">
                  <img data-src="{{ url() }}/imagenes/team/mauri1.jpg" class="contacto-whatsapp-img">
                  <div class="contacto-whatsapp-texto">
                    Escríbeme ahora mismo por Whatsapp 
                  </div>  

                  <span class="contacto-whatsapp-icono" > 
                    <i class="fab fa-whatsapp"></i>
                  </span>
                </a>
                 
          @endif
        </div>
       
         {{-- formulario de contacto --}}
         
         <div class="flex-row-column" style="max-width: 850px;">
            @include('paginas.home.home_contacto_formulario')
         </div>
          
         
       

      
      </div>

       
</section>