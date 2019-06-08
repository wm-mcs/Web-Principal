Vue.component('socio-entidad-listado' ,
{

props:{
   socios: {
      type: Array
    }
}
,  



methods:{

         

},
template:'<span>

  <div v-if="socios.length > 0" class="listado-socios-contenedor-lista">
    <div v-for="socio in socios" :key="socio.id" class="listado-socios-contenedor-individual">
     
      <div class="listado-socios-sub-contenedor-name-estado">
        <div class="listado-socios-name">@{{socio.name}}</div>
        <div>@{{socio.estado}}</div>


      </div>
      <div>
        
      </div>
      <div>
        
      </div>
          
    </div>
  </div> 

</span>'

}




);