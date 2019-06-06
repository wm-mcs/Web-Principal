Vue.component('socios-lista' ,
{

data:function(){
    return {
      socios:'hola'

    }
},
mounted: function mounted () {        

       this.getSociosActivos();


},
methods:{

     getSociosActivos:function()
     {
       var url = '/get_socios_activos';

       axios.get(url).then(function(response){  
          
            console.log(this.socios);
            console.log(this.socios);

           this.socios = response.data.socios;

            console.log(this.socios);
            console.log(this.socios);

           
           
           }).catch(function (error){

                     
            
           });
     }

},
template:'<span>

  <div v-if="socios.length > 0">
    <div v-for="socio in socios" :key="socio">
      @{{socio.name}}      
    </div>
  </div>

</span>'

}




);
