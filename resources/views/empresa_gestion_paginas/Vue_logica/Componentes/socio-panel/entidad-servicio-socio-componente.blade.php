Vue.component('servicio-socio-lista' ,
{
props:['servicio'],  

data:function(){
    return {

    }
},
mounted: function mounted () {        

      


},
methods:{

    borrar_servicio:function(servicio){


       var validation = confirm("¿Quieres eliminar el servicio?");

       if(!validation)
       {
        return '';
       }

       var url = '/borrar_servicio_de_socio' + servicio.id;

       var vue = this;

       axios.get(url).then(function(response){  
          
          if(response.data.Validacion == true)
          {
            vue.$emit('actualizar_servicios_de_socios',response.data.servicios); 
          }
          else
          {
            $.notify(response.data.Validacion_mensaje, "warn");
          }    
           
           
           }).catch(function (error){

                     
            
           });


    },
    EditarServicio:_.debounce(function(servicio){

       var url = '/editar_servicio_a_socio';

       var vue = this;

       var data = {servicio_a_editar:this.servicio};

       axios.post(url,data).then(function(response){ 


          
          if(response.data.Validacion == true)
          {
            
            
            vue.$emit('actualizar_servicios_de_socios',response.data.servicios); 
             $.notify(response.data.Validacion_mensaje, "success");
          }
          else
          {
            $.notify(response.data.Validacion_mensaje, "warn");
          }    
           
           
           }).catch(function (error){

                     
            
           });

    },1000)
    ,
    abrir_modal_editar:function(){


      $('#modal-editar-servicio-socio').appendTo("body").modal('show');  

    }


},
computed:{

    esta_activo:function()
    {
        if(this.servicio.esta_vencido == true || this.servicio.esta_consumido == false)
        {
          return false ;
        }
        else
        {
          return true;
        }
    }
  
},
template:'<span>

  <div class="contiene-entidad-lista-servicio">

    <div class="flex-row-center get_width_100 flex-justifice-space-between">
        <div>
            @{{servicio.name}} 
        </div>
        <div>
            <div class="entidad-lista-servicio-contiene-fecha">
                <span class="entidad-lista-servicio-fecha" >Contratado el @{{servicio.fecha_contratado_formateada}}</span>                
                <span class="entidad-lista-servicio-fecha" >Se vence el @{{servicio.fecha_vencimiento_formateada}}</span> 


                <div class="lista-estado-activo" :class="{'color-text-success': esta_activo}"> <i class="fas fa-check"></i> Disponible</div>
            </div>
            
        </div>
    </div>
       
        <div  class="admin-user-boton-Crear" v-on:click="borrar_servicio(servicio)">
            <i class="fas fa-trash-alt"></i>
        </div>

         <div  class="admin-user-boton-Crear" v-on:click="abrir_modal_editar">
            <i class="fas fa-edit"></i>
        </div>


         <div class="modal fade" id="modal-editar-servicio-socio" tabindex="+1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"> Editar @{{servicio.name}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
          
        </div>
        <div class="modal-body text-center"> 

                  <div class="form-group">
                      <label class="formulario-label" for="Nombre">Nombres  </label>
                      <input type="text" class="form-control"  v-model="servicio.name" placeholder="Nombre" required  />
                  </div> 
                  <div class="form-group">
                      <label class="formulario-label" for="Nombre">Fecha de vencimiento  </label>
                      <input type="date" class="form-control"  v-model="servicio.fecha_vencimiento_formateada"  required  />
                  </div> 
                
                  

                 
               

                


               

                  <div v-on:click="EditarServicio(servicio)" class="boton-simple">Editar</div>
                  
                 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>        
        </div>
      </div>
    </div>
  </div>




















  </div>

</span>'

}




);