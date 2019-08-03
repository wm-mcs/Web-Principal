Vue.component('estado-de-cuenta-socio' ,
{

data:function(){
    return {
      
            

    }
},

props:['estado_de_cuenta','socio']
,


mounted: function mounted () {        
      
   

},
methods:{
    eliminar_estado_de_cuenta:function()
    {

       var validation = confirm("¿Quieres eliminar esté estado de cuenta?");

       if(!validation)
       {
        return '';
       }

       var url = '/eliminar_estado_de_cuenta';

       var vue = this;

       var data = {estado_de_cuenta:this.estado_de_cuenta};

       axios.post(url,data).then(function(response){ 


          
          if(response.data.Validacion == true)
          {    
             vue.$emit('actualizar_socio',response.data.Socio); 
             $.notify(response.data.Validacion_mensaje, "success");
          }
          else
          {
            $.notify(response.data.Validacion_mensaje, "warn");
          }    
           
           
           }).catch(function (error){

                     
            
           });
    }
     

},
template:'
           <div class="contiene-entidad-lista-servicio">
             @{{estado_de_cuenta.detalle}} 
             <span class="simula_link" v-on:click="eliminar_estado_de_cuenta">

               <i class="fas fa-trash-alt"></i>

             </span>
           </div>
  

'
}




);