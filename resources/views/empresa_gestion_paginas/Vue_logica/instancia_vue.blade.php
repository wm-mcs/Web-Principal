
  

   

    var app = new Vue({
    el: '#app',    
    data:{

      socios:[]


      

    },
     created: function () {        

       this.getSociosActivos();


    },
    methods:{

     getSociosActivos:function()
     {
        var url = '/get_socios_activos';

       axios.get(url).then(function (response){  
           this.socios = response.data.socios;
           console.log(response.data.socios);
           
           }).catch(function (error){

                     
            
           });
     }

    }

   

   });









































