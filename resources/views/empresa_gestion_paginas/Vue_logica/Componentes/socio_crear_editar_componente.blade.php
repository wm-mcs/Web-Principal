Vue.component('socios-crear-editar' ,
{
  props:{

   accion_name:string,
},

  data:function(){
    return {
      socios:[],


    }
  },
  template:'

  <span class="admin-user-boton-Crear">
        {{accion_name}} Nuevo Socio <i class="fas fa-user-plus"></i>
  </span>

  '

}


);