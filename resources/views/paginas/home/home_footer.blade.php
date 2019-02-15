 <section class="padding-xl" style="background-color:#30302f;">
       
          <div class="get_width_100 flex-row-center flex-justifice-space-around flex-wrap">
             <div class=" text-center contenedor-columna-footer Helper-OrdenarHijos-Row">
              <div class="get_width_100 flex-row-center flex-justifice-space-around">
                <img src="{{$Empresa->img_logo_cuadrado}}" class="logo-footer">
              </div>
              
            </div>

             {{-- parte de politicas --}}  
             <div class="text-center contenedor-columna-footer  Helper-OrdenarHijos-Row">
              <div class="get_width_100 flex-row-column">

                 <p class="color-text-gris espacio-letras small" data-toggle="modal" data-target="#modal-garantia">  
                    Política de devolución
                 </p>
               
              </div>
            </div> 


            <div class="text-center contenedor-columna-footer  Helper-OrdenarHijos-Row">
              <div class="get_width_100 flex-row-column">

               @if($Empresa->telefono_empresa != 'no')
                 <p class="color-text-gris espacio-letras small">  
                  <span class="helper-aumenta-texto"><i class="fa fa-mobile"></i></span> {{$Empresa->telefono_empresa}}
                 </p> 
               @endif
               
              </div>
            </div> 
                
          
          </div>
        
         
</section>