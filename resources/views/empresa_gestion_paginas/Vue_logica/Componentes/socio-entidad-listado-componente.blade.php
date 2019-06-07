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
      listado_de_socios:this.socios

    }
},

methods:{

         

},
template:'<span>

  
    <div v-for="socio in listado_de_socios" :key="socio.id">
      @{{socio.name}}      
    </div>
  

</span>'

}




);