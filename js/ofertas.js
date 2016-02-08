$(document).ready(function(){
  //Variable que controla la visibilidad del modal de vista previa
  var oculto = $("#valor_escondido").val();
  //Se modifica la manera en que se muestra la fecha en la busqueda
  var str = $(".fecha_buscador").text();
  $('.fecha_buscador').html(str);
  $('.fecha_buscador').html(str.substring(0,10));
  //Se evalua si se puede mostrar el modal
  if (oculto == 1) {
    $("#modal4").openModal();
    //Se modifica la manera en que se muestra la fecha en la vista previa
    var str = $("#fecha_factura").text();
    $('#fecha_factura').html(str);
    $('#fecha_factura').html(str.substring(0,17));
  }

  $('.vista_previa').tooltip({delay: 50});
  $('.sesion').dropdown({
   inDuration: 300,
   outDuration: 225,
   constrain_width: false, // Does not change width of dropdown to that of the activator
   hover: true, // Activate on hover
   gutter: 0, // Spacing from edge
   belowOrigin: false, // Displays dropdown below the button
   alignment: 'left' // Displays dropdown with edge aligned to the left of button
 }
);

$(".reinicio_variable_modal").click(function(){
   $.post("../php/detalle_factura.php",{"reset":0});                            //Se reinicia la variable que controla la visualización de la pantalla modal de vista previa de facturas
});

});

//Se consigue el numero de folio de la linea seleccionada
$(".vista_previa").click(function(){
  var id_folio = $(this).attr("folio");
  $("#titulo_detalle").text("Detalle Factura " + id_folio);
  $.post("../php/detalle_factura.php",{"texto":id_folio});
  window.location.reload(true);
});

//Campos para la gráfica de Ofertas de Ventas
var Campos_Ofertas = document.getElementById("campos_ofertas").value;   //Cadena capturada de los input ocultos en el DOM
var Valores_Ofertas = document.getElementById("campos_ofertas").innerHTML=Campos_Ofertas;
var Mes_Ofertas = Valores_Ofertas.split(",");   //Se divide la cadena en partes para poder pasarlos a Float

//Campos para la gráfica de Ofertas 2015
var Campos_Ofertas_Anterior = document.getElementById("campos_ofertas_anterior").value;  //Cadena capturada de los input ocultos en el DOM
var Valores_Ofertas_Anterior = document.getElementById("campos_ofertas_anterior").innerHTML=Campos_Ofertas_Anterior;
var Mes_Ofertas_Anterior = Valores_Ofertas_Anterior.split(",");  //Se divide la cadena en partes para poder pasarlos a Float

//Campos para la gráfica de Ofertas 2014
var Campos_Ofertas_Anterior2 = document.getElementById("campos_ofertas_anterior2").value;  //Cadena capturada de los input ocultos en el DOM
var Valores_Ofertas_Anterior2 = document.getElementById("campos_ofertas_anterior2").innerHTML=Campos_Ofertas_Anterior2;
var Mes_Ofertas_Anterior2 = Valores_Ofertas_Anterior2.split(",");  //Se divide la cadena en partes para poder pasarlos a Float

//Campos para la gráfica de Ofertas 2013
var Campos_Ofertas_Anterior3 = document.getElementById("campos_ofertas_anterior3").value;  //Cadena capturada de los input ocultos en el DOM
var Valores_Ofertas_Anterior3 = document.getElementById("campos_ofertas_anterior3").innerHTML=Campos_Ofertas_Anterior3;
var Mes_Ofertas_Anterior3 = Valores_Ofertas_Anterior3.split(",");  //Se divide la cadena en partes para poder pasarlos a Float
  var fecha = new Date ();
  var mes = fecha.getMonth ();
  var datos_ofertas_actuales = [0,0,0,0,0,0,0,0,0,0,0,0];
  var validacion = 0;
  if(Mes_Ofertas[1] > 0) validacion = 1;
  if(Mes_Ofertas[2] > 0) validacion = 2;
  if(Mes_Ofertas[3] > 0) validacion = 3;
  if(Mes_Ofertas[4] > 0) validacion = 4;
  if(Mes_Ofertas[5] > 0) validacion = 5;
  if(Mes_Ofertas[6] > 0) validacion = 6;
  if(Mes_Ofertas[7] > 0) validacion = 7;
  if(Mes_Ofertas[8] > 0) validacion = 8;
  if(Mes_Ofertas[9] > 0) validacion = 9;
  if(Mes_Ofertas[10] > 0) validacion = 10;
  if(Mes_Ofertas[11] > 0) validacion = 11;
  if(Mes_Ofertas[12] > 0) validacion = 12;
  switch (validacion) {
    case 0:
        datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),0,0,0,0,0,0,0,0,0,0,0];
      break;
      case 1:
          datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),0,0,0,0,0,0,0,0,0,0];
        break;
        case 2:
            datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),0,0,0,0,0,0,0,0,0];
          break;
          case 3:
              datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),0,0,0,0,0,0,0,0];
            break;
            case 4:
                datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),0,0,0,0,0,0,0];
              break;
              case 5:
                  datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),0,0,0,0,0,0];
                break;
                case 6:
                    datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),parseFloat(Mes_Ofertas[6]),0,0,0,0,0];
                  break;
                  case 7:
                      datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),parseFloat(Mes_Ofertas[6]),parseFloat(Mes_Ofertas[7]),0,0,0,0];
                    break;
                    case 8:
                        datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),parseFloat(Mes_Ofertas[6]),parseFloat(Mes_Ofertas[7]),parseFloat(Mes_Ofertas[8]),0,0,0];
                      break;
                      case 9:
                          datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),parseFloat(Mes_Ofertas[6]),parseFloat(Mes_Ofertas[7]),parseFloat(Mes_Ofertas[8]),parseFloat(Mes_Ofertas[9]),0,0];
                        break;
                        case 10:
                            datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),parseFloat(Mes_Ofertas[6]),parseFloat(Mes_Ofertas[7]),parseFloat(Mes_Ofertas[8]),parseFloat(Mes_Ofertas[9]),parseFloat(Mes_Ofertas[10]),0];
                          break;
                          case 11:
                              datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),parseFloat(Mes_Ofertas[6]),parseFloat(Mes_Ofertas[7]),parseFloat(Mes_Ofertas[8]),parseFloat(Mes_Ofertas[9]),parseFloat(Mes_Ofertas[10]),parseFloat(Mes_Ofertas[11])];
                            break;
    default:
  }

var barChartData = {
  labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
  datasets : [
    {
      fillColor : "#42A5F5", //Color principal de las barras
      strokeColor : "rgba(220,220,220,0.8)",
      highlightFill: "#00796B",
      highlightStroke: "rgba(220,220,220,1)",
      data : datos_ofertas_actuales
        //Los valores dentro de "data", son los que se obtienen con el split() de la variable Valores_Facturacion
        //Deben convertirse a Float para respetar el punto decimal, no pueden ir campos tipo String dentro
    }
  ]
}

var ctx = document.getElementById("canvas").getContext("2d");
window.myBar = new Chart(ctx).Bar(barChartData, { responsive : true ,
scaleLabel: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  },
tooltipTemplate: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");}});

$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );

//Funciones de la muestra de graficos por año------------------------------------------------------------------------------------------------------------------
//Funcion del botón Facturas de Clientes
$('#year_anterior').on('click', function() {
    $('#boton').text("2015");
    var ofertas2015 = document.getElementById("ofertas2015").value;   //Cadena capturada de los input ocultos en el DOM
    $('#total_ofertas_clientes').text("Total: ".concat(ofertas2015));
    //Cambio de valores en base al año en boton rojo
    var facturas2015 = document.getElementById("facturas2015").value;   //Cadena capturada de los input ocultos en el DOM
    $('#numero_top_facturas').html("<h5 style='margin-top:-10px;'><i class='material-icons left teal lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(facturas2015).concat("</h5>"));          //Se cambia el valor de numero top facturas
    $('#numero_top_facturas_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Facturas 2015</p>");          //Se cambia el valor del texto en base al año
    var ordenes2015 = document.getElementById("ordenes2015").value;   //Cadena capturada de los input ocultos en el DOM
    $('#numero_top_ordenes').html("<h5 style='margin-top:-10px;'><i class='material-icons left red lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(ordenes2015).concat("</h5>"));          //Se cambia el valor de numero top facturas
    $('#numero_top_ordenes_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Ordenes 2015</p>");          //Se cambia el valor del texto en base al año
    var ofertas2015 = document.getElementById("ofertas2015").value;   //Cadena capturada de los input ocultos en el DOM
    $('#numero_top_ofertas').html("<h5 style='margin-top:-10px;'><i class='material-icons left blue lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(ofertas2015).concat("</h5>"));          //Se cambia el valor de numero top facturas
    $('#numero_top_ofertas_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Ofertas 2015</p>");          //Se cambia el valor del texto en base al año
    var back2015 = document.getElementById("back2015").value;   //Cadena capturada de los input ocultos en el DOM
    $('#numero_top_back').html("<h5 style='margin-top:-10px;'><i class='material-icons left purple lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(back2015).concat("</h5>"));          //Se cambia el valor de numero top facturas
    $('#numero_top_back_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Back Order 2015</p>");          //Se cambia el valor del texto en base al año
    //*************************************************************************
      window.myBar.destroy();
      barChartData.datasets[0].data = [parseFloat(Mes_Ofertas_Anterior[0]),parseFloat(Mes_Ofertas_Anterior[1]),parseFloat(Mes_Ofertas_Anterior[2]),parseFloat(Mes_Ofertas_Anterior[3]),parseFloat(Mes_Ofertas_Anterior[4]),parseFloat(Mes_Ofertas_Anterior[5]),parseFloat(Mes_Ofertas_Anterior[6]),parseFloat(Mes_Ofertas_Anterior[7]),parseFloat(Mes_Ofertas_Anterior[8]),parseFloat(Mes_Ofertas_Anterior[9]),parseFloat(Mes_Ofertas_Anterior[10]),parseFloat(Mes_Ofertas_Anterior[11])];
      barChartData.datasets[0].fillColor = '#42A5F5';
    var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(barChartData, { responsive : true,
    scaleLabel: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  },
  tooltipTemplate: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");}}); });
  //Funcion del botón Facturas de Clientes
  $('#year').on('click', function() {
      $('#boton').text("2016");
      var ofertas2016 = document.getElementById("ofertas2016").value;   //Cadena capturada de los input ocultos en el DOM
      $('#total_ofertas_clientes').text("Total: ".concat(ofertas2016));
      //Cambio de valores en base al año en boton rojo
      var facturas2016 = document.getElementById("facturas2016").value;   //Cadena capturada de los input ocultos en el DOM
      $('#numero_top_facturas').html("<h5 style='margin-top:-10px;'><i class='material-icons left teal lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(facturas2016).concat("</h5>"));          //Se cambia el valor de numero top facturas
      $('#numero_top_facturas_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Facturas</p>");          //Se cambia el valor del texto en base al año
      var ordenes2016 = document.getElementById("ordenes2016").value;   //Cadena capturada de los input ocultos en el DOM
      $('#numero_top_ordenes').html("<h5 style='margin-top:-10px;'><i class='material-icons left red lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(ordenes2016).concat("</h5>"));          //Se cambia el valor de numero top facturas
      $('#numero_top_ordenes_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Ordenes</p>");          //Se cambia el valor del texto en base al año
      var ofertas2016 = document.getElementById("ofertas2016").value;   //Cadena capturada de los input ocultos en el DOM
      $('#numero_top_ofertas').html("<h5 style='margin-top:-10px;'><i class='material-icons left blue lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(ofertas2016).concat("</h5>"));          //Se cambia el valor de numero top facturas
      $('#numero_top_ofertas_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Ofertas</p>");          //Se cambia el valor del texto en base al año
      var back2016 = document.getElementById("back2016").value;   //Cadena capturada de los input ocultos en el DOM
      $('#numero_top_back').html("<h5 style='margin-top:-10px;'><i class='material-icons left purple lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(back2016).concat("</h5>"));          //Se cambia el valor de numero top facturas
      $('#numero_top_back_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Back Order</p>");          //Se cambia el valor del texto en base al año
      //*************************************************************************
        window.myBar.destroy();
        barChartData.datasets[0].data = datos_ofertas_actuales;
        barChartData.datasets[0].fillColor = '#42A5F5';
    var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(barChartData, { responsive : true,
    scaleLabel: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  },
  tooltipTemplate: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");}}); });
    //Funcion del botón Facturas de Clientes
    $('#year_anterior_2').on('click', function() {
        $('#boton').text("2014");
        var ofertas2014 = document.getElementById("ofertas2014").value;   //Cadena capturada de los input ocultos en el DOM
        $('#total_ofertas_clientes').text("Total: ".concat(ofertas2014));
        //Cambio de valores en base al año en boton rojo
        var facturas2014 = document.getElementById("facturas2014").value;   //Cadena capturada de los input ocultos en el DOM
        $('#numero_top_facturas').html("<h5 style='margin-top:-10px;'><i class='material-icons left teal lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(facturas2014).concat("</h5>"));          //Se cambia el valor de numero top facturas
        $('#numero_top_facturas_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Facturas 2014</p>");          //Se cambia el valor del texto en base al año
        var ordenes2014 = document.getElementById("ordenes2014").value;   //Cadena capturada de los input ocultos en el DOM
        $('#numero_top_ordenes').html("<h5 style='margin-top:-10px;'><i class='material-icons left red lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(ordenes2014).concat("</h5>"));          //Se cambia el valor de numero top facturas
        $('#numero_top_ordenes_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Ordenes 2014</p>");          //Se cambia el valor del texto en base al año
        var ofertas2014 = document.getElementById("ofertas2014").value;   //Cadena capturada de los input ocultos en el DOM
        $('#numero_top_ofertas').html("<h5 style='margin-top:-10px;'><i class='material-icons left blue lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(ofertas2014).concat("</h5>"));          //Se cambia el valor de numero top facturas
        $('#numero_top_ofertas_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Ofertas 2014</p>");          //Se cambia el valor del texto en base al año
        var back2014 = document.getElementById("back2014").value;   //Cadena capturada de los input ocultos en el DOM
        $('#numero_top_back').html("<h5 style='margin-top:-10px;'><i class='material-icons left purple lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(back2014).concat("</h5>"));          //Se cambia el valor de numero top facturas
        $('#numero_top_back_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Back Order 2014</p>");          //Se cambia el valor del texto en base al año
        //*************************************************************************
          window.myBar.destroy();
          barChartData.datasets[0].data = [parseFloat(Mes_Ofertas_Anterior2[0]),parseFloat(Mes_Ofertas_Anterior2[1]),parseFloat(Mes_Ofertas_Anterior2[2]),parseFloat(Mes_Ofertas_Anterior2[3]),parseFloat(Mes_Ofertas_Anterior2[4]),parseFloat(Mes_Ofertas_Anterior2[5]),parseFloat(Mes_Ofertas_Anterior2[6]),parseFloat(Mes_Ofertas_Anterior2[7]),parseFloat(Mes_Ofertas_Anterior2[8]),parseFloat(Mes_Ofertas_Anterior2[9]),parseFloat(Mes_Ofertas_Anterior2[10]),parseFloat(Mes_Ofertas_Anterior2[11])];
          barChartData.datasets[0].fillColor = '#42A5F5';
        var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(barChartData, { responsive : true,
        scaleLabel: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  },
      tooltipTemplate: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");}}); });
      //Funcion del botón Facturas de Clientes
      $('#year_anterior_3').on('click', function() {
          $('#boton').text("2013");
          var ofertas2013 = document.getElementById("ofertas2013").value;   //Cadena capturada de los input ocultos en el DOM
          $('#total_ofertas_clientes').text("Total: ".concat(ofertas2013));
          //Cambio de valores en base al año en boton rojo
          var facturas2013 = document.getElementById("facturas2013").value;   //Cadena capturada de los input ocultos en el DOM
          $('#numero_top_facturas').html("<h5 style='margin-top:-10px;'><i class='material-icons left teal lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(facturas2013).concat("</h5>"));          //Se cambia el valor de numero top facturas
          $('#numero_top_facturas_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Facturas 2013</p>");          //Se cambia el valor del texto en base al año
          var ordenes2013 = document.getElementById("ordenes2013").value;   //Cadena capturada de los input ocultos en el DOM
          $('#numero_top_ordenes').html("<h5 style='margin-top:-10px;'><i class='material-icons left red lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(ordenes2013).concat("</h5>"));          //Se cambia el valor de numero top facturas
          $('#numero_top_ordenes_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Ordenes 2013</p>");          //Se cambia el valor del texto en base al año
          var ofertas2013 = document.getElementById("ofertas2013").value;   //Cadena capturada de los input ocultos en el DOM
          $('#numero_top_ofertas').html("<h5 style='margin-top:-10px;'><i class='material-icons left blue lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(ofertas2013).concat("</h5>"));          //Se cambia el valor de numero top facturas
          $('#numero_top_ofertas_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Ofertas 2013</p>");          //Se cambia el valor del texto en base al año
          var back2013 = document.getElementById("back2013").value;   //Cadena capturada de los input ocultos en el DOM
          $('#numero_top_back').html("<h5 style='margin-top:-10px;'><i class='material-icons left purple lighten-1 white-text' style='font-size:230%; border-radius:5px;'>attach_money</i>".concat(back2013).concat("</h5>"));          //Se cambia el valor de numero top facturas
          $('#numero_top_back_total').html("<p style='margin-bottom:-20px; margin-left:30%;'>Total de Back Order 2013</p>");          //Se cambia el valor del texto en base al año
          //*************************************************************************
            window.myBar.destroy();
            barChartData.datasets[0].data = [parseFloat(Mes_Ofertas_Anterior3[0]),parseFloat(Mes_Ofertas_Anterior3[1]),parseFloat(Mes_Ofertas_Anterior3[2]),parseFloat(Mes_Ofertas_Anterior3[3]),parseFloat(Mes_Ofertas_Anterior3[4]),parseFloat(Mes_Ofertas_Anterior3[5]),parseFloat(Mes_Ofertas_Anterior3[6]),parseFloat(Mes_Ofertas_Anterior3[7]),parseFloat(Mes_Ofertas_Anterior3[8]),parseFloat(Mes_Ofertas_Anterior3[9]),parseFloat(Mes_Ofertas_Anterior3[10]),parseFloat(Mes_Ofertas_Anterior3[11])];
            barChartData.datasets[0].fillColor = '#42A5F5';
          var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(barChartData, { responsive : true,
          scaleLabel: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  } ,
        tooltipTemplate: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");}}); });
