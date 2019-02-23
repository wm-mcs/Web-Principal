  var contenedor_noticia = $( "#contenido-noticia" ),
  str = contenedor_noticia.text(),
  html = $.parseHTML( str ),
  nodeNames = [];
 
  // Append the parsed HTML
  contenedor_noticia.append( html );