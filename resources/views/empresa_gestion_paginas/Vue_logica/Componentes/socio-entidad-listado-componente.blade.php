Vue.component('socio-entidad-listado' ,
{

props:{
   socios: {
      type: Array
    }
}
,  

data:function(){
    return {
      listado_de_socios:this.socios

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