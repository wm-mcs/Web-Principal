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
       var url = '/get_socio?id=' + this.socio_id;

       var vue = this;

       axios.get(url).then(function(response){  
          
          if(response.data.Validacion == true)
          {
            vue.socio = response.data.Socio;
          }
          else
          {
            //notificacion de que algo esta mal
          }

           

            

           
           
           }).catch(function (error){

                     
            
           });
     }

         

},
template:'<span>


 <i class="fas fa-envelope"></i> kk


</span>'

});