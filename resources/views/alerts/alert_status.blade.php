 @if(Session::has('status'))
            <div class="Alert_Success-Contenedor">
              
              <div class="Alert_Success-Titulo">
                <div style="padding: 12px;"> {{ Session::get('status') }}</div> 
              
              </div>
              <div class="Error-iconoCerrar">
                <span class="icon-highlight_remove">
                   
                </span>
              </div>
            </div>
@endif 