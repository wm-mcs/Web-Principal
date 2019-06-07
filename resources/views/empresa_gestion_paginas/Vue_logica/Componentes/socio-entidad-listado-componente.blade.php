Vue.component('socio-entidad-listado' ,
{

props:{
   socios: {
      type: Object
    }
}
,  

data:function(){
    return {
      

    }
},

methods:{

         

},
template:'<span>

  
    <div v-for="socio in socios" :key="socio.id">
      @{{socio.name}}      
    </div>
  

</span>'

}




);