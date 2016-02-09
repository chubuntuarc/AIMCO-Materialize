$(document).ready(function(){
  $("#proximo_mtto").fadeOut();
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
                                                                                //Esta sección trabaja con la pantalla modal de alta y baja de inventario de Sistemas
$("#tipo_movimiento").change(function() {
  if ($("#tipo_movimiento option:selected").text() == "Baja") {
    $("#nombre_articulo").fadeOut();
    $("#categoria_articulo").fadeOut();
  }
  else {
    $("#nombre_articulo").fadeIn();
    $("#categoria_articulo").fadeIn();
  }
});

$("#seleccion_de_articulo").change(function() {
  if ($("#seleccion_de_articulo option:selected").text() == "Nuevo") {
    $("#nombre_articulo").fadeIn();
  }
  else {
    $("#nombre_articulo").fadeOut();
  }
});
                                                                                //Esta sección trabaja con la pantalla modal de asistencia a usuarios de Sistemas
$("#selecciona_conflicto").change(function() {
  if ($("#selecciona_conflicto option:selected").text() != "Nuevo") {
    $("#conflicto").fadeOut();
  }
  else {
    $("#conflicto").fadeIn();
  }
});

$("#tipo_servicio").change(function() {
  if ($("#tipo_servicio option:selected").text() != "Asistencia") {
    $("#conflicto").fadeOut();
    $("#selecciona_conflicto").fadeOut();
    $("#categoria_conflicto").fadeOut();
    $("#proximo_mtto").fadeIn();
  }
  else {
    $("#conflicto").fadeIn();
    $("#selecciona_conflicto").fadeIn();
    $("#categoria_conflicto").fadeIn();
    $("#proximo_mtto").fadeOut();
  }
});
