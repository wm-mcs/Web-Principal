Vue.component('socios-lista' ,
{

  data:function(){
    return {
      socios:[]

    }
  },
  created: function () {        

       this.getSociosActivos();


    },
methods:{

     getSociosActivos:function()
     {
       var url = '/get_socios_activos';

       axios.get(url).then(function (response){  
           this.socios = response.data.socios;
           console.log(response.data.socios);
           
           }).catch(function (error){

                     
            
           });
     }

    }





















  template:'<span>

  <div v-if="socios.length > 0">
    <div v-for="socio in socios" :key="socio">
      @{{socio.name}}      
    </div>
  </div>
  
</span>'

}




);
