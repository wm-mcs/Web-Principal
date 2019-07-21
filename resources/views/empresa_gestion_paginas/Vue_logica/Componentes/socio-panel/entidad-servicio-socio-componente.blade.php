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

    

},
template:'<span>

  <div class="contiene-entidad-lista-servicio">
    @{{servicio.name}}  | @{{servicio.fecha_vencimiento}} 
  </div>

</span>'

}




);