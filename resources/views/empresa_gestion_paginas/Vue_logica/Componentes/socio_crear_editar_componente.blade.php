Vue.component('socios-crear-editar' ,
{
  props:{

   accion_name:{type: String},
},

  data:function(){
    return {
      socios:[],


    }
  },
  template:'

  <span class="admin-user-boton-Crear">
        @{{ accion_name }} socio <i class="fas fa-user-plus"></i>
  </span>

  '

}


);