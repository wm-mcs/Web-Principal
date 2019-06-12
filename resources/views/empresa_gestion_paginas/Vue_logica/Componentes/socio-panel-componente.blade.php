Vue.component('socio-panel-componente',
{

data:function(){
    return {
      socio:'hola',
      socio_id: 1,

    }
}, 
mounted: function mounted () {        

       this.getSocio();


},
methods:{

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
            
          }

           

            

           
           
           }).catch(function (error){

                     
            
           });
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

      };

      var vue = this;

      axios.post(url,data).then(function (response){  
            var data = response.data;  
            

            if(data.Validacion == true)
            {
              alert('hola');
              vue.socio = response.data.Socio;
              $.notify(data.Validacion_mensaje, "success");
            }
            else
            {
              
            }
           
           }).catch(function (error){

                     
            
           });

     }

         

},
template:'<span>


  <div class="panel-socio-header-contenedor">
    <div class="panel-socio-name"><i class="fas fa-user"></i> @{{socio.name}} 

    @include('empresa_gestion_paginas.Vue_logica.Componentes.socio-panel-componente-modal-editar-socio')    

    </div>
    <div class="panel-socio-contiene-acciones"> Acciones</div>


  </div>

  

</span>'

});