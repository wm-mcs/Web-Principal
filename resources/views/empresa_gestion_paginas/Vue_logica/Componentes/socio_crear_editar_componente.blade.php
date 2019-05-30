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

methods:{

 hola:function(){
   alert('hola');
 }

},
template:'

  <span class="admin-user-boton-Crear" v-on:click:hola>
        @{{ accion_name }} socio <i class="fas fa-user-plus"></i>
  </span>

  '

}


);