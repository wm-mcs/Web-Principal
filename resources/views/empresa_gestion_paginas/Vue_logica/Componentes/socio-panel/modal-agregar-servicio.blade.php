 <div id="boton-editar-socio" style="position:relative;" class="admin-user-boton-Crear" title="Agregar nuevo servicio" v-on:click="agregarServicioShoww">
       <i class="fas fa-plus"></i> Servicio 
       
 </div>

    <div class="modal fade" id="modal-agregar-servicio" tabindex="+1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"> Agregar servicio</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
          
        </div>
        <div class="modal-body text-center"> 

                  <div class="form-group">
                      <label class="formulario-label" for="Nombre">Nombres  </label>
                      <input type="text" class="form-control"  v-model="socio.name" placeholder="Nombre" required  />
                  </div> 
                 

                 <div class="form-group">
                      <label class="formulario-label" for="Nombre">Estado <span class="formulario-label-aclaracion"> ¿está activo?</span></label>
                     <select v-model="socio.estado" class="form-control">
                        
                        <option>si</option>
                        <option>no</option>
                        
                      </select>
                  </div> 



               

                  <div v-on:click="editSocioPost" class="boton-simple">Editar</div>
                  
                 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>        
        </div>
      </div>
    </div>
  </div>