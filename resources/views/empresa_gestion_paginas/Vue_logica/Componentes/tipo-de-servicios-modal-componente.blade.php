
Vue.component('tipo-de-servicios-modal' ,
{

data:function(){
    return {
      servicios:[]

    }
},
mounted: function mounted () {        

       


},
methods:{

  editTipoDeServicio:function(servicio){


    
  }

     

},
template:'<span>

   <div id="boton-editar-socio" style="position:relative;" class="admin-user-boton-Crear" title="Agregar nuevo servicio" v-on:click="agregarServicioShoww">
       <i class="fas fa-plus"></i> Tipo de servicio 
       
 </div>

    <div class="modal fade" id="modal-agregar-servicio" tabindex="+1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"> Agregar servicio</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
          
        </div>
        <div class="modal-body text-center"> 

          <div v-for="servicio in servicios">
            <div class="form-group get_width_30">
                      <label class="formulario-label" >Nombre  </label>
                      <input type="text" class="form-control"  v-model="servicio.name" placeholder="Nombre" required  />
            </div> 

            <div class="form-group">
                      <label class="formulario-label" >Tipo <span class="formulario-label-aclaracion"> ¿mensual o por clase?</span></label>
                     <select v-model="servicio.tipo" class="form-control">
                        
                        <option>clase</option>
                        <option>mensual</option>
                        
                      </select>
            </div> 


            <div class="form-group">
                      <label class="formulario-label">Estado <span class="formulario-label-aclaracion"> ¿está activo?</span></label>
                     <select v-model="servicio.estado" class="form-control">
                        
                        <option>si</option>
                        <option>no</option>
                        
                      </select>
            </div> 


            <div class="admin-user-boton-Crear" v-on:click="editTipoDeServicio(servicio)">
              <i class="fas fa-edit"></i>
            </div>



          </div>

                 
                 

               <div>                 
                 Crear aqui la parte para crear un servicio nuevo si es que no hay nada
               </div>
                  
                 
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