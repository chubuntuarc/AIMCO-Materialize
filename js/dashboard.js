$(document).ready(function(){
  //Javascipt que se usa en todas las ventanas
  //Elemento que trabaja para que funcione la animación de cerrar sesión en la parte superior
   $('.sesion').dropdown({
    inDuration: 300,
    outDuration: 225,
    constrain_width: false, // Does not change width of dropdown to that of the activator
    hover: true, // Activate on hover
    gutter: 0, // Spacing from edge
    belowOrigin: false, // Displays dropdown below the button
    alignment: 'left' // Displays dropdown with edge aligned to the left of button
  });
  //Elemento que hace funcionar los modales
  $('.modal-trigger').leanModal();
});