 <section class="BackgroundGris padding-secion-custom" id="precios">
     
          <div class="get_width_100 flex-row-column text-center">
            <h2 class="section-heading ">Precios y planes</h2>
            <br>
            <br>
            {{-- <hr class="light my-4">
            <p class="color-text-gris mb-4"> Elegí el plan que mas te guste 
            </p> --}}


            {{--  contenedor-precios --}}
            <div class="get_width_100 flex-row-center flex-justifice-space-around flex-wrap">
                <div class="flex-row-center flex-justifice-space-around Seccion_precio_plan_ajuste_ancho">
                  <div class="flex-row-column Seccion_precio_contenedor_plan">
                    <div class="Seccion_precio_icono font-secondary get_width_100">Básico</div>                    
                    <div class="Seccion_precio_precio font-secondary get_width_100">
                      <div class="flex-row-column get_width_100">
                        <div class="flex-row-center">
                          <span class="Seccion_precio_moneda">USD</span>
                          <span class="Seccion_precio_importe">300</span>  
                        </div>                         
                      </div>
                      <div class="flex-row-column Seccion-_precio_separacion get_width_100">
                      <div class="Seccion_precio_importe_oferta_cartel">
                        50% OFF
                      </div>
                      <div class="Seccion_precio_importe_precio_tachado">
                        Antes: usd 450
                      </div>
                    </div>
                                           
                    </div>
                  
                   

                    <div class="flex-row-column Seccion-contenedor-items">
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> 1 Pagina scroll</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Multi dispositivos. 
                        <span class="text-color-primary">Se ve linda en todos lados: Pc, Tablet y Celu</span> 
                      </div>                      
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Optimizada para buscadores. Te encontraran en Google <i class="fa fa-laugh-wink"></i>  </div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Servidor y alojamiento web de alto rendimiento. A Google le importa la velocidad de tu web ;).
                      </div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Integración redes sociales básico. Facebook, Google Whatzap.</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i>  Automatizado formulario para que tus cleintes se comuniquen contigo por email.</div>
                      
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Hasta 5 Emails corporativos (mi_email@midominio.com)</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-grin-hearts"></i>  Garantía de devolución total. 
                        <span class="text-color-primary">                          
                          Si no estas conformes te devolvemos todo lo que abonastes. Asi de simple ;)
                        </span>  
                      </div>
                    </div> 
                    <div v-if="mensajes_enviados.includes('básico') != true" class="boton-simple" v-on:click.prevent="abrir_modal_para_contacto('Consultar sobre plan básico','contacto')">Contactar
                    </div>
                    <div v-else class="mensaje-luego-de-envio">
                                  'Mensaje enviado correctamente.'
                    </div>
                  </div>                  
                </div>
                <div class="flex-row-center flex-justifice-space-around Seccion_precio_plan_ajuste_ancho">
                  <div class="flex-row-column Seccion_precio_contenedor_plan ">
                    <div class="Seccion_precio_icono font-secondary">Estándar</div>                    
                    <div class="Seccion_precio_precio font-secondary">
                       <span class="Seccion_precio_moneda">USD</span>
                       <span class="Seccion_precio_importe">400</span>                       
                    </div>
                    <div class="flex-row-column Seccion-contenedor-items">
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> 1 Pagina scroll + varias paginas de otras secciones específicas</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Multi dispositivos. Se ve linda en todos lados: Pc, Tablet y Celu</div>                      
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Optimizada para buscadores. Te encontraran en Google <i class="fa fa-laugh-wink"></i>  </div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Servidor y alojamiento web de alto rendimiento</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> https integrado - 
                        <span class="color-text-success">Tendras el <strong>candadito verde</strong>  cuando entres al navegador.  Y Google te dará mas relevancia</span>
                      
                      </div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Integración redes sociales básico. Facebook, Google Whatzap.</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i>  Automatizado formlario para que tus cleintes se comuniquen contigo por email.</div>
                      
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Hasta hasta 10 Emails corporativos (mi_email@midominio.com)</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-grin-hearts"></i>  Garantía de devolución total. Si no estas conformes te devolvemos todo lo que abonastes. Asi de simple ;) </div>                      
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> 
                        <span class=""></span>
                      Estadísticas del sitio web. Podras analaizar muchas cosas de los usuarios que entran a tu web.</div>
                      
                    </div> 
                    <div v-if="mensajes_enviados.includes('estándar') != true" class="boton-simple" v-on:click.prevent="abrir_modal_para_contacto('Consultar sobre plan estándar','contacto')">Contactar</div>
                    <div v-else class="mensaje-luego-de-envio">
                                  'Mensaje enviado correctamente.'
                                </div>
                  </div>                  
                </div>
                {{-- <div class="flex-row-center flex-justifice-space-around Seccion_precio_plan_ajuste_ancho">
                  <div class="flex-row-column Seccion_precio_contenedor_plan">
                    <div class="Seccion_precio_icono font-secondary">Full</div>                    
                    <div class="Seccion_precio_precio font-secondary">
                       <span class="Seccion_precio_moneda"></span>
                       <span class="Seccion_precio_importe">Consultar</span>                       
                    </div>
                    <div class="flex-row-column Seccion-contenedor-items">
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Cantidad de paginas multiple</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Diseño Custom</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Diseño Web RESPONSIVE</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Servidor de alto rendimeinto</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Integración redes sociales avanzado</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Formulario de contacto</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> 30 Emails corporativos</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Estadísticas del sitio web</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Soporte técnico de L a V de 11 a 19hs</div>
                      <div class="Seccion_precio_lista_item"><i class="fa fa-check"></i> Panel administrador</div>
                    </div> 
                    <div  v-if="mensajes_enviados.includes('full') != true" class="boton-simple" v-on:click.prevent="abrir_modal_para_contacto('Consultar sobre plan full','contacto')">Contactar</div>
                    <div v-else class="mensaje-luego-de-envio">
                                  'Mensaje enviado correctamente.'
                    </div>
                  </div>                  
                </div> --}}
             </div>
             <div class="Seccion_precio_aclaracion">
              Para los tres planes están incluidos en el precio los costos de hosting y mantenimiento del primer año. A partir del segundo año se genera un costo anual de usd 100 para los planes Básico y Estándar; y de usd 200 para el plan Full . Por conceptos de mantenimientos del servidor y alojamiento web.
             </div>
            
          </div>
      
    </section>