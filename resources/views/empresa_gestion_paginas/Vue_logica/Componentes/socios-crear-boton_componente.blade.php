Vue.component('socios-crear-boton' ,
{
props: {   
    accion_name: Number
}


,
data:function(){
    return {
      name:''
    }
  },

methods:{

 abrir_modal:function(){

   $('#modal-crear-socio').modal('show');   

 },


},
template:'<span >
   <div id="socio-boton-crear" style="position:relative;" class="admin-user-boton-Crear" v-on:click="abrir_modal">
        @{{ accion_name }} socio <i class="fas fa-user-plus"></i>





       
  </div>

         <div class="modal fade" id="modal-crear-socio" tabindex="+1" role="dialog" aria-labelledby="myModalLabel">
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













</span> 
   '

}


);