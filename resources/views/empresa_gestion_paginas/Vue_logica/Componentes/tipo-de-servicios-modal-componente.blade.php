
Vue.component('tipo-de-servicios-modal' ,
{


data:function(){
    return {
      servicios:'hola', 
      crear_service_name:'',
      crear_service_tipo:'',

      }
},
methods:{

     agregarServicioShoww:function(){
       $('#modal-agregar-servicio').appendTo("body").modal('show');
     },
     agregarServicioCreat:fucntion(){

     

     }

         

},
template:'<span>

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
                      <input type="text" class="form-control"  v-model="crear_service_name" placeholder="Nombre" required  />
                  </div> 
                 

                 <div class="form-group">
                      <label class="formulario-label" for="Nombre">Tipo <span class="formulario-label-aclaracion">¿por clase o mensual?</span></label>
                     <select v-model="crear_service_tipo" class="form-control">
                        
                        <option>clase</option>
                        <option>mensual</option>
                        
                      </select>
                  </div>   



               

                  <div v-on:click="agregarServicioCreat" class="boton-simple">Crear nuevo</div>
                  
                 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>        
        </div>
      </div>
    </div>
  </div>

</span>'

}


);