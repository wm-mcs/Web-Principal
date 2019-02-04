@if(Session::has('alert'))
            <div class="Alert_Success-Contenedor">
              
              <div class="Alert_Success-Titulo">
                <div style="padding: 12px;">  <span class="icon-check"></span>  {{ Session::get('alert') }} 
              </div> 
              
              </div>
              <div class="Error-iconoCerrar">
                <span class="icon-highlight_remove">
                   
                </span>
              </div>
            </div>
@endif 