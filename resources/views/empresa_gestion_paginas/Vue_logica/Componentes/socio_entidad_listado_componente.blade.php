Vue.component('socio-entidad-listado' ,
{

props:['socios']
,  

data:function(){
    return {
      

    }
},

methods:{

         

},
template:'<span>

  
    <div v-for="socio in socios" :key="socio">
      @{{socio.name}}      
    </div>
  

</span>'

}




);