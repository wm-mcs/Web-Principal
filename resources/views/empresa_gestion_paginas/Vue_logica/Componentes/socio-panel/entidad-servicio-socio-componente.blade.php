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


    }

},
template:'<span>

  <div class="contiene-entidad-lista-servicio">

    <div class="flex-row-center get_width_100 flex-justifice-space-between">
        <div>
            @{{servicio.name}} 
        </div>
        <div>
            <span class="entidad-lista-servicio-fecha">Contratado el @{{servicio.fecha_contratado_formateada}}</span>
            <span class="entidad-lista-servicio-fecha">Se vence el @{{servicio.fecha_vencimiento_formateada}}</span>
        </div>
    </div>
       
        <div  class="admin-user-boton-Crear" v-on:click="borrar_servicio(servicio)">
            <i class="fas fa-trash-alt"></i>
        </div>
  </div>

</span>'

}




);