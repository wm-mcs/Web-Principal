 @if (count($errors) > 0)
            <div class="Errores-Contenedor">
              
              <div class="Error-Titulo">
                <span>Por favor corrige los siguientes errores:</span> 
                <ul class="Error-Ul">
                @foreach ($errors->all() as $error)
                  <li class="Error-Li">{{ $error }}</li>
                @endforeach
              </ul> 
                
              </div>
              <div class="Error-iconoCerrar">
                <span class="icon-highlight_remove">
                   
                </span>
              </div>
              </div> 
              
            
@endif