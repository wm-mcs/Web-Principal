
//Oculta el elmento que se hace click
$('body').on('click','.ocultar_elemento_on_click',function(e){

  e.preventDefault();

  $(this).hide();

});