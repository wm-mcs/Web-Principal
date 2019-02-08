
 @if(Session::has('alert-pregunta-enviada'))
            <div class="Alert_Success-Contenedor ocultar_elemento_on_click">
              
              <div class="Alert_Success-Titulo">

                <div style="padding: 12px;">  <i class="fas fa-check"></i> {{ Session::get('alert-pregunta-enviada') }} </div> 
              
              </div>
              <div class="Error-iconoCerrar">
                <i class="fas fa-times"></i>
              </div>
            </div>
@endif 