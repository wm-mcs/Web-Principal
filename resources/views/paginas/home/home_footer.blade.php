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
                 <p class="color-text-gris espacio-letras small helper_cursor_pointer" data-toggle="modal" data-target="#modal-garantia">  
                    Política de devolución
                 </p>               
              </div>


              <div class="get_width_100 flex-row-column">

                 @if($Empresa->facebook_empresa != 'no')
                  <a class="footer-icono-social" href="{{$Empresa->facebook_empresa}}"> 
                    <i class="fa fa-facebook-square"></i>
                  </a>
                 @endif 

                 @if($Empresa->instagram_empresa != 'no')
                  <a class="footer-icono-social" href="{{$Empresa->instagram_empresa}}"> 
                    <i class="fa fa-instagram"></i>
                  </a>
                 @endif 

                 @if($Empresa->facebook_empresa != 'no')
                  <a class="footer-icono-social" href="{{$Empresa->facebook_empresa}}"> 
                    <i class="fa fa-facebook-square"></i>
                  </a>
                 @endif 

              </div>  
            </div> 


            <div class="text-center contenedor-columna-footer  Helper-OrdenarHijos-Row">
              <div class="get_width_100 flex-row-column">

               @if($Empresa->telefono_empresa != 'no')
                 <p class="color-text-gris espacio-letras small">  
                  <span class="helper-aumenta-texto"><i class="fa fa-mobile"></i></span> {{$Empresa->telefono_empresa}}
                 </p> 
               @endif

               @if($Empresa->celular_empresa != 'no')
                 <p class="color-text-gris espacio-letras small">  
                  <span class="helper-aumenta-texto"><i class="fa fa-mobile"></i></span> {{$Empresa->celular_empresa}}
                 </p> 
               @endif

               @if($Empresa->direccion_empresa != 'no')
                 <p class="color-text-gris espacio-letras small">  
                  <span class="helper-aumenta-texto"><i class="fa fa-mobile"></i></span> {{$Empresa->direccion_empresa}}
                 </p> 
               @endif

               @if($Empresa->horarios_empresa != 'no')
                 <p class="color-text-gris espacio-letras small">  
                  <span class="helper-aumenta-texto"><i class="fa fa-mobile"></i></span> {{$Empresa->horarios_empresa}}
                 </p> 
               @endif

              
               
              </div>
            </div> 
                
          
          </div>
        
         
</section>