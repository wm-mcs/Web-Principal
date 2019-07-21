Vue.component('servicio-socio-lista' ,
{
props:['servicio'],  

data:function(){
    return {

    }
},
mounted: function mounted () {        

      


},
methods:{

    borrar_servicio:function(servicio){




    }

},
template:'<span>

  <div class="contiene-entidad-lista-servicio">
    @{{servicio.name}}  | @{{servicio.fecha_vencimiento_formateada}} 
        <div  class="admin-user-boton-Crear" v-on:click="borrar_servicio(servicio)">
            <i class="fas fa-trash-alt"></i>
        </div>
  </div>

</span>'

}




);