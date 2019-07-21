Vue.component('socio-panel-componente',
{


props:['servicios'],

data:function(){
    return {
      socio:'hola',
      socio_id: 1,
      servicios_del_socio:'',
      
      empresa_id: {{$Empresa_gestion->id}},

    }
}, 
mounted: function mounted () {        

       this.getSocio();
       this.getServiciosDelSocio('mounted');
      


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
     getSocio:function()
     {
       var url = '/get_socio' + this.socio_id;

       var vue = this;

       axios.get(url).then(function(response){  
          
          if(response.data.Validacion == true)
          {
            vue.socio = response.data.Socio;
          }
          else
          {
            $.notify(response.data.Validacion_mensaje, "warn");
          }    
           
           
           }).catch(function (error){

                     
            
           });
     },
     getServiciosDelSocio:function(servicios){

      if(servicios == 'mounted')
      {   

         var url  = '/get_servicios_de_socio';

          var data = {


               socio_id: this.socio_id,
             empresa_id: this.empresa_id
            

          };

      var vue = this;

      axios.post(url,data).then(function (response){  
            var data = response.data;  
            

            if(data.Validacion == true)
            {
              $.notify(data.Validacion_mensaje, "success");
              
              
              console.log(data.socio);
              vue.servicios_del_socio = data.servicios;

              
            }
            else
            {
              $.notify(response.data.Validacion_mensaje, "warn");
            }
           
           }).catch(function (error){

                     
            
           });


      }
      else
      {
        this.servicios_del_socio = servicios;
      }
        

     },
     editSocioShow:function()
     {
      $('#modal-editar-socio').appendTo("body").modal('show');
     }, 

     editSocioPost:function()
     {


      var url  = '/post_editar_socio_desde_modal';

      var data = {


           id: this.socio.id,
         name: this.socio.name,
         cedula:this.socio.cedula,
         email:this.socio.email,
         celular:this.socio.celular,
         direccion:this.socio.direccion,
         rut:this.socio.rut,
         razon_social:this.socio.razon_social,
         mutualista:this.socio.mutualista,
         nota:this.socio.nota ,
         estado:this.socio.estado,

      };

      var vue = this;

      axios.post(url,data).then(function (response){  
            var data = response.data;  
            

            if(data.Validacion == true)
            {
              $.notify(data.Validacion_mensaje, "success");
              
              vue.socio = response.data.Socio;
              
            }
            else
            {
              $.notify(response.data.Validacion_mensaje, "warn");
            }
           
           }).catch(function (error){

                     
            
           });

     },
    

         

},
template:'<span>


  <div class="panel-socio-header-contenedor">
    <div class="panel-socio-name"> @{{socio.name}} 

    @include('empresa_gestion_paginas.Vue_logica.Componentes.socio-panel.modal-editar-socio')    

    </div>
    <div class="panel-socio-contiene-acciones"> Acciones
      
     <agregar-al-socio-un-servicio :socio="socio"  
                                   :servicios="servicios"
                                   @actualizar_servicios_de_socios="getServiciosDelSocio" ></agregar-al-socio-un-servicio>  
      
     

    </div>


  </div>

  <div class="">
    
      <div v-for="servicio in servicios_del_socio">
        @{{servicio.name}}
      </div>

  </div>

  
    
     




  

  

</span>'

});