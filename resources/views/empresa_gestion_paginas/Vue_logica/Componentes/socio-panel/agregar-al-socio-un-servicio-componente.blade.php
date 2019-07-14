Vue.component('agregar-al-socio-un-servicio' ,
{

data:function(){
    return {
      
      empresa_id: {{$Empresa_gestion->id}},
      servicio_data:{
                        name:'',
                        tipo:'',
                        moneda:'',
                        valor:'',
                        fecha_vencimiento:'',
                        cantidad_de_servicios:'',

                    },
      tipo_servicio:'',              

    }
},

props:['socio','servicios']
,


mounted: function mounted () {        

      


},
methods:{

 

 abrir_modal:function(){

   $('#modal-agregar-servicio-socio').appendTo("body").modal('show');  

 },
 crear_servicio_a_socio:function(){

 },
 cambioTipoDeServicio:function(){

  var servicio = this.servicios.filter(function (el) {
                    return el.name == this.tipo_servicio
                  });

                  console.log(servicio);

  this.servicio_data.name   = servicio.name;
  this.servicio_data.tipo   = servicio.tipo;
  this.servicio_data.moneda = servicio.moneda;
  this.servicio_data.valor  = servicio.valor;

  if(servicio.tipo != 'mensual')
  {
    this.cantidad_de_servicios = 1;
  } 
 }

     

},
template:'<span>
 <div id="boton-editar-socio" style="position:relative;" class="admin-user-boton-Crear" v-on:click="abrir_modal">
        <i class="fas fa-plus"></i> Servicio
       
 </div>

    <div class="modal fade" id="modal-agregar-servicio-socio" tabindex="+1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"> Agregar un servicio a @{{socio.name}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
          
        </div>
        <div class="modal-body text-center"> 

                

              

                 <div class="form-group">
                      <label class="formulario-label" for="Nombre">Tipo de servicio <span class="formulario-label-aclaracion"> ¿por clase o mensual?</span></label>
                     <select v-on:change="cambioTipoDeServicio()" class="form-control" v-model="tipo_servicio">
                        <option></option>
                        <option v-for="servicio in servicios">@{{servicio.name}}</option>
                       
                        
                      </select>
                  </div> 

                  <div v-if="servicio_data.name =!''" class="form-group">
                      <label class="formulario-label" for="Nombre">Nombre</label>
                      <input type="text" class="form-control"  v-model="servicio_data.name" placeholder="Nombre" required  />
                  </div> 

                   <div v-if="servicio_data.tipo =!''" class="form-group">
                      <label class="formulario-label" for="Nombre">Tipo</label>
                      <input type="text" class="form-control"  v-model="servicio_data.tipo" required  />
                   </div> 

                    <div v-if="servicio_data.moneda =!''" class="form-group">
                      <label class="formulario-label" for="Nombre">Moneda</label>
                      <select v-model="servicio_data.moneda" class="form-control">
                        <option>$</option>
                        <option>U$S</option>
                        
                       
                        
                      </select>
                    </div> 

                     <div v-if="servicio_data.cantidad_de_servicios =!''" class="form-group">
                      <label class="formulario-label" for="Nombre">Cantidad de clases</label>
                      <input type="text" class="form-control"  v-model="servicio_data.cantidad_de_servicios" required  />
                     </div>

                     <div v-if="servicio_data.valor =!''" class="form-group">
                      <label class="formulario-label" for="Nombre">Valor <span v-if="servicio.tipo != 'mensual'"> de todas las clases</span> </label>
                      <input type="text" class="form-control"  v-model="servicio_data.valor" required  />
                     </div> 



                     



               

                  <div v-on:click="crear_servicio_a_socio" class="boton-simple">Editar</div>
                  
                 
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