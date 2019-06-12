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
     }

         

},
template:'<span>


  <div class="panel-socio-header-contenedor">
    <div class="panel-socio-name"><i class="fas fa-user"></i> @{{socio.name}}</div>
    <div class="panel-socio-contiene-acciones"> Acciones</div>


  </div>

  

</span>'

});