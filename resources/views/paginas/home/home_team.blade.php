 <section class="" id="team">
   <div class="get_width_100 flex-row-column text-center">

            <div class="col-lg-12 text-center">
            <h2 class="section-heading">Team</h2>
            <hr class="my-4">
            <p class="text-muted mb-4"> La dupla que desarrolla la combinación de la dedicación con la agilidad. </p>
           </div>




           
           <div class="contenedor-tema-nuevo-imgs">
             <div class="contiene-rectangulos-targeteables">
               <div id="tema_mauri" class="elementos-targeteables"> Mauri </div>
               <div id="tema_erni" class="elementos-targeteables"> Erni </div>               
             </div>
             <img id="tema_duo_img"   class="get_width_100" src="{{url()}}/imagenes/team/duo.jpg">
             <img id="tema_mauri_img" class="img-tema-nuevo-general " src="{{url()}}/imagenes/team/mauri.jpg">
             <img id="tema_erni_img"  class="img-tema-nuevo-general " src="{{url()}}/imagenes/team/erni.jpg">
           </div>

          
            {{-- <div class="Seccion_team_contenedor_padre flex-row-center flex-justifice-space-around flex-wrap">
               

                   
                 <div class="flex-row-center flex-justifice-space-around  Seccion_team_ajuste_ancho">
                    <div class="flex-row-column get_width_100 Seccion_team_contenedor">
                        <img src="{{url() }}/imagenes/team/ernesto1.jpg" class="Seccion_team_img">
                        <div class="Seccion_team_nombre font-secondary">Ernesto</div>  
                        <div class="Seccion_team_habilidad font-secondary">Diseñador</div>
                        <div class="flex-row-column Seccion_team_contiene_atributos get_width_100">
                            <div class="Seccion_team_atributos"></div>                      
                        </div>

                        <div class="get_width_100 flex-row-center flex-justifice-space-around">
                            <div class="flex-row-center">
                                <a href=""> <span class="Seccion_team_icono_social">E</span> </a>
                                <a href=""> <span class="Seccion_team_icono_social">Q</span> </a>
                                 <a v-if="mensajes_enviados.includes('ernesto') != true" href=""  v-on:click.prevent="abrir_modal_para_contacto('Mensaje a Ernesto.','ernesto')" title="Contactar directamente a Mauricio" > <span class="Seccion_team_icono_social " >k</span> </a>
                                <div v-else class="mensaje-luego-de-envio">
                                  'Mensaje enviado correctamente.'
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>                 
                    
                    
                   
                 <div class="flex-row-center flex-justifice-space-around  Seccion_team_ajuste_ancho">
                     <div class="flex-row-column get_width_100 Seccion_team_contenedor">
                        <img src="{{url() }}/imagenes/team/mauri1.jpg" class="Seccion_team_img">
                        <div class="Seccion_team_nombre font-secondary">Mauricio</div>  
                        <div class="Seccion_team_habilidad font-secondary">Programador</div>
                        <div class="flex-row-column Seccion_team_contiene_atributos get_width_100">
                            <div class="Seccion_team_atributos"></div>                      
                        </div>

                        <div class="get_width_100 flex-row-center flex-justifice-space-around">
                            <div class="flex-row-center">
                                <a href=""> <span class="Seccion_team_icono_social">E</span> </a>
                                <a href=""> <span class="Seccion_team_icono_social">Q</span> </a>
                                <a v-if="mensajes_enviados.includes('mauricio') != true" href=""  v-on:click.prevent="abrir_modal_para_contacto('Mensaje a Mauricio.','mauricio')" title="Contactar directamente a Mauricio" > <span class="Seccion_team_icono_social " >k</span> </a>
                                <div v-else class="mensaje-luego-de-envio">
                                  'Mensaje enviado correctamente.'
                                </div>
                            </div>
                        </div>
                     </div>
                 </div>
             
            
          </div> --}}


      </div> 
    </section>