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

       var vue = this;

       console.log(vue);

       axios.get(url).then(function(response){  
          
            console.log(that);
            console.log(this.socios);

           vue.socios = response.data.socios;

            console.log(that);
            console.log(that);

           
           
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
