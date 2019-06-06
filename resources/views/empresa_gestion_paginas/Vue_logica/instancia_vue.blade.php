
  

   

    var app = new Vue({
    el: '#app',    
    data:{

      socios:[]


      

    },
    methods:{

    },

    mounted: function () {        

       var url = '/get_socios_activos';

       axios.get(url).then(function (response){  
           this.socios = response;
           console.log(response);
           
           }).catch(function (error){

                     
            
           });


    }

   });









































