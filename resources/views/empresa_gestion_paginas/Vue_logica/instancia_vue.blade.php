
  

   

    var app = new Vue({
    el: '#app',    
    data:{

      socios:[]


      

    },
    methods:{

     getSociosActivos:fucntion()
     {
       var url = '/get_socios_activos';

       axios.get(url).then(function (response){  
           this.socios = response.socios;
           console.log(response.data.socios);
           
           }).catch(function (error){

                     
            
           });
     }

    },

    created: function () {        

      
      this.getSociosActivos();

    }

   });









































