Vue.component('socios-crear-boton' ,
{
props:  ['accion_name','value'],

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
 updateValue: function (value) {
      var formattedValue = value
        // Remueve espacios en blanco de ambos lados
        .trim()
      // Si el valor no estaba normalizado aún,
      // lo sobrescribimos manualmente
      if (formattedValue !== value) {
        this.$refs.input.value = formattedValue
      }
      // Emite el valor numérico a través del evento 'input'
      this.$emit('input', formattedValue)
    }

},
template:'

  <span id="socio-boton-crear" class="admin-user-boton-Crear" v-on:click="hola">
        @{{ accion_name }} socio <i class="fas fa-user-plus"></i>
  </span> 

    <div class="modal fade" id="modal-crear-socio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">@{{accion_name}} nuevo socio</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
        </div>
        <div class="modal-body text-center">

                  <div class="form-group">
                      <label class="control-label" for="Nombre">Nombres</label>
                      <input v-bind:value="value" v-on:input="updateValue($event.target.value)" type="text" class="form-control"  placeholder="Introduzca su nombre" required  />
                  </div> 
               

                 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>        
        </div>
      </div>
    </div>
  </div>

  '

}


);