Vue.component('socios-crear-boton' ,
{
props: {
    // Basic type check (`null` and `undefined` values will pass any type validation)
    accion_name: Number,
    // Multiple possible types
    value: [String, Number],

}


,
data:function(){
    return {
      name:'',
      cedula:'',
      celular:'',


    }
  },

methods:{

 abrir_modal:function(){

   $('#modal-crear-socio').modal('open');   

 },


},
template:'<span id="socio-boton-crear" class="admin-user-boton-Crear" v-on:click="hola">
        @{{ accion_name }} socio <i class="fas fa-user-plus"></i>


         <div class="modal fade" id="modal-crear-socio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">@{{accion_name}} nuevo socio</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-user-plus"></i></span></button>
          
        </div>
        <div class="modal-body text-center">

                  <div class="form-group">
                      <label class="control-label" for="Nombre">Nombres</label>
                      <input type="text" class="form-control"  placeholder="Introduzca su nombre" required  />
                  </div> 
               

                 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>        
        </div>
      </div>
    </div>
  </div>
  </span>'

}


);