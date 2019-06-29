
Vue.component('tipo-de-servicios-modal',
{


data:function(){
    return {
      servicios:[], 
      empresa_id: {{$Empresa_gestion->id}},
      crear_service_name:'',
      crear_service_tipo:''

      }
},
mounted: function mounted () {        

       this.getServicios();


},
methods:{

     getServicios:function(){


       var url = '/get_tipo_servicios' + this.empresa_id;

       var vue = this;

       axios.get(url).then(function(response){  
          
          if(response.data.Validacion == true)
          {
            vue.servicios = response.data.servicios;
          }
          else
          {
            $.notify(response.data.Validacion_mensaje, "warn");
          }    
           
           
           }).catch(function (error){

                     
            
           });
     

     },

     agregarServicioShoww:function(){

       this.servicios = this.getServicios();

       $('#modal-agregar-servicio').appendTo("body").modal('show');
     },
     agregarServicioCreat:function(){

       var url = '/set_nuevo_servicio';

       var vue = this;

       var data = {    name:this.crear_service_name,
                       tipo:this.crear_service_tipo ,
                 empresa_id:this.empresa_id
                   }; 

              axios.post(url,data).then(function (response){  
              
              

              if(response.data.Validacion == true)
              {
                 vue.servicios = response.data.servicios;
                 $.notify(response.data.Validacion_mensaje, "success");

                 vue.crear_service_name = '';
                 vue.crear_service_tipo = '';
              }
              else
              {
                $.notify(response.data.Validacion_mensaje, "error");
              }
             
             }).catch(function (error){

                       
              
             });      

     },
     deletServicio:function(servicio)
     {
        var url = '/delet_servicio';

        var vue = this;

        var data = {   id:servicio.id,
                       
                   }; 

              axios.post(url,data).then(function (response){  
              
              

              if(response.data.Validacion == true)
              {
                 vue.servicios = response.data.servicios;
                 $.notify(response.data.Validacion_mensaje, "warn");
                 
              }
              else
              {
                $.notify(response.data.Validacion_mensaje, "error");
              }
             
             }).catch(function (error){

                       
              
             });      
     }

         

},
template:'
<span>
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


             <div v-if="servicios.length > 0">
               <div v-for="servicio in servicios" class="empresa-gestion-listado-contenedor">
                 <div class="get_width_30">
                   <input type="text" class="form-control" v-model="servicio.name">
                 </div> 
                 <div>
                   <div class="get_width_30 flex-row-center flex-justifice-space-around">
                     <div v-on:click="deletServicio(servicio)" title="Eliminar este servicio" class="boton-simple-chico">
                        <i class="fas fa-trash-alt"></i>
                     </div>
                   </div>
                 </div>
               </div>

             </div>
             <div v-else>
               Aun no hay servicios creados. Crea uno ;) 
             </div>

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

</span>',

});