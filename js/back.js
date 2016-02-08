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
  $("#titulo_detalle").text("Detalle Registro " + id_folio);
  $.post("../php/detalle_factura.php",{"texto":id_folio});
  window.location.reload(true);
});

//Campos para la gráfica de Back Order
var Campos_Back_Order = document.getElementById("campos_back_order").value;   //Cadena capturada de los input ocultos en el DOM
var Valores_Back_Order = document.getElementById("campos_back_order").innerHTML=Campos_Back_Order;
var Mes_Back_Order = Valores_Back_Order.split(",");   //Se divide la cadena en partes para poder pasarlos a Float

//Campos para la gráfica de Back Order 2015
var Campos_Back_Order_Anterior = document.getElementById("campos_back_order_anterior").value;   //Cadena capturada de los input ocultos en el DOM
var Valores_Back_Order_Anterior = document.getElementById("campos_back_order_anterior").innerHTML=Campos_Back_Order;
var Mes_Back_Order_Anterior = Valores_Back_Order_Anterior.split(",");   //Se divide la cadena en partes para poder pasarlos a Float

//Campos para la gráfica de Back Order 2014
var Campos_Back_Order_Anterior2 = document.getElementById("campos_back_order_anterior2").value;   //Cadena capturada de los input ocultos en el DOM
var Valores_Back_Order_Anterior2 = document.getElementById("campos_back_order_anterior2").innerHTML=Campos_Back_Order;
var Mes_Back_Order_Anterior2 = Valores_Back_Order_Anterior2.split(",");   //Se divide la cadena en partes para poder pasarlos a Float

//Campos para la gráfica de Back Order 2013
var Campos_Back_Order_Anterior3 = document.getElementById("campos_back_order_anterior3").value;   //Cadena capturada de los input ocultos en el DOM
var Valores_Back_Order_Anterior3 = document.getElementById("campos_back_order_anterior3").innerHTML=Campos_Back_Order;
var Mes_Back_Order_Anterior3 = Valores_Back_Order_Anterior3.split(",");   //Se divide la cadena en partes para poder pasarlos a Float
  var fecha = new Date ();
  var mes = fecha.getMonth ();
  var datos_back_order = [0,0,0,0,0,0,0,0,0,0,0,0];
  var validacion = 0;
  if(Mes_Back_Order[1] > 0) validacion = 1;
  if(Mes_Back_Order[2] > 0) validacion = 2;
  if(Mes_Back_Order[3] > 0) validacion = 3;
  if(Mes_Back_Order[4] > 0) validacion = 4;
  if(Mes_Back_Order[5] > 0) validacion = 5;
  if(Mes_Back_Order[6] > 0) validacion = 6;
  if(Mes_Back_Order[7] > 0) validacion = 7;
  if(Mes_Back_Order[8] > 0) validacion = 8;
  if(Mes_Back_Order[9] > 0) validacion = 9;
  if(Mes_Back_Order[10] > 0) validacion = 10;
  if(Mes_Back_Order[11] > 0) validacion = 11;
  if(Mes_Back_Order[12] > 0) validacion = 12;
  switch (validacion) {
    case 0:
        datos_back_order = [parseFloat(Mes_Back_Order[0]),0,0,0,0,0,0,0,0,0,0,0];
      break;
      case 1:
          datos_back_order = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),0,0,0,0,0,0,0,0,0,0];
        break;
        case 2:
            datos_back_order = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),0,0,0,0,0,0,0,0,0];
          break;
          case 3:
              datos_back_order = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),0,0,0,0,0,0,0,0];
            break;
            case 4:
                datos_back_order = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),0,0,0,0,0,0,0];
              break;
              case 5:
                  datos_back_order = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),0,0,0,0,0,0];
                break;
                case 6:
                    datos_back_order = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),parseFloat(Mes_Back_Order[6]),0,0,0,0,0];
                  break;
                  case 7:
                      datos_back_order = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),parseFloat(Mes_Back_Order[6]),parseFloat(Mes_Back_Order[7]),0,0,0,0];
                    break;
                    case 8:
                        datos_back_order = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),parseFloat(Mes_Back_Order[6]),parseFloat(Mes_Back_Order[7]),parseFloat(Mes_Back_Order[8]),0,0,0];
                      break;
                      case 9:
                          datos_back_order = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),parseFloat(Mes_Back_Order[6]),parseFloat(Mes_Back_Order[7]),parseFloat(Mes_Back_Order[8]),parseFloat(Mes_Back_Order[9]),0,0];
                        break;
                        case 10:
                            datos_back_order = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),parseFloat(Mes_Back_Order[6]),parseFloat(Mes_Back_Order[7]),parseFloat(Mes_Back_Order[8]),parseFloat(Mes_Back_Order[9]),parseFloat(Mes_Back_Order[10]),0];
                          break;
                          case 11:
                              datos_back_order = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),parseFloat(Mes_Back_Order[6]),parseFloat(Mes_Back_Order[7]),parseFloat(Mes_Back_Order[8]),parseFloat(Mes_Back_Order[9]),parseFloat(Mes_Back_Order[10]),parseFloat(Mes_Back_Order[11])];
                            break;
    default:
  }


var barChartData = {
  labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
  datasets : [
    {
      fillColor : "#ab47bc", //Color principal de las barras
      strokeColor : "rgba(220,220,220,0.8)",
      highlightFill: "#00796B",
      highlightStroke: "rgba(220,220,220,1)",
      data : datos_back_order
        //Los valores dentro de "data", son los que se obtienen con el split() de la variable Valores_Facturacion
        //Deben convertirse a Float para respetar el punto decimal, no pueden ir campos tipo String dentro
    }
  ]
}

var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(barChartData, { responsive : true ,
scaleLabel: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }});

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
    //Funcion del botón Facturas de Clientes 2015
    $('#year_anterior').on('click', function() {
        $('#boton').text("2015");
        var back2015 = document.getElementById("back2015").value;   //Cadena capturada de los input ocultos en el DOM
        var back20015 = document.getElementById("back2015").innerHTML=back2015;
        $('#total_back_order').text("Total: ".concat(back20015));
          window.myBar.destroy();
          barChartData.datasets[0].data = [parseFloat(Mes_Back_Order_Anterior[0]),parseFloat(Mes_Back_Order_Anterior[1]),parseFloat(Mes_Back_Order_Anterior[2]),parseFloat(Mes_Back_Order_Anterior[3]),parseFloat(Mes_Back_Order_Anterior[4]),parseFloat(Mes_Back_Order_Anterior[5]),parseFloat(Mes_Back_Order_Anterior[6]),parseFloat(Mes_Back_Order_Anterior[7]),parseFloat(Mes_Back_Order_Anterior[8]),parseFloat(Mes_Back_Order_Anterior[9]),parseFloat(Mes_Back_Order_Anterior[10]),parseFloat(Mes_Back_Order_Anterior[11])];
          barChartData.datasets[0].fillColor = '#ab47bc';
        var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(barChartData, { responsive : true,
        scaleLabel: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }}); });
      //Funcion del botón Facturas de Clientes 2016
      $('#year').on('click', function() {
          $('#boton').text("2016");
          var back2016 = document.getElementById("back2016").value;   //Cadena capturada de los input ocultos en el DOM
          var back20016 = document.getElementById("back2016").innerHTML=back2016;
          $('#total_back_order').text("Total: ".concat(back20016));
            window.myBar.destroy();
            barChartData.datasets[0].data = datos_back_order;
            barChartData.datasets[0].fillColor = '#ab47bc';
          var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(barChartData, { responsive : true,
          scaleLabel: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }}); });
        //Funcion del botón Facturas de Clientes 2014
        $('#year_anterior_2').on('click', function() {
            $('#boton').text("2014");
            var back2014 = document.getElementById("back2014").value;   //Cadena capturada de los input ocultos en el DOM
            var back20014 = document.getElementById("back2014").innerHTML=back2014;
            $('#total_back_order').text("Total: ".concat(back20014));
              window.myBar.destroy();
              barChartData.datasets[0].data = [parseFloat(Mes_Back_Order_Anterior2[0]),parseFloat(Mes_Back_Order_Anterior2[1]),parseFloat(Mes_Back_Order_Anterior2[2]),parseFloat(Mes_Back_Order_Anterior2[3]),parseFloat(Mes_Back_Order_Anterior2[4]),parseFloat(Mes_Back_Order_Anterior2[5]),parseFloat(Mes_Back_Order_Anterior2[6]),parseFloat(Mes_Back_Order_Anterior2[7]),parseFloat(Mes_Back_Order_Anterior2[8]),parseFloat(Mes_Back_Order_Anterior2[9]),parseFloat(Mes_Back_Order_Anterior2[10]),parseFloat(Mes_Back_Order_Anterior2[11])];
              barChartData.datasets[0].fillColor = '#ab47bc';
            var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(barChartData, { responsive : true,
            scaleLabel: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }}); });
          //Funcion del botón Facturas de Clientes 2013
          $('#year_anterior_3').on('click', function() {
              $('#boton').text("2013");
              var back2013 = document.getElementById("back2013").value;   //Cadena capturada de los input ocultos en el DOM
              var back20013 = document.getElementById("back2013").innerHTML=back2013;
              $('#total_back_order').text("Total: ".concat(back20013));
                window.myBar.destroy();
                barChartData.datasets[0].data = [parseFloat(Mes_Back_Order_Anterior3[0]),parseFloat(Mes_Back_Order_Anterior3[1]),parseFloat(Mes_Back_Order_Anterior3[2]),parseFloat(Mes_Back_Order_Anterior3[3]),parseFloat(Mes_Back_Order_Anterior3[4]),parseFloat(Mes_Back_Order_Anterior3[5]),parseFloat(Mes_Back_Order_Anterior3[6]),parseFloat(Mes_Back_Order_Anterior3[7]),parseFloat(Mes_Back_Order_Anterior3[8]),parseFloat(Mes_Back_Order_Anterior3[9]),parseFloat(Mes_Back_Order_Anterior3[10]),parseFloat(Mes_Back_Order_Anterior3[11])];
                barChartData.datasets[0].fillColor = '#ab47bc';
              var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(barChartData, { responsive : true,
              scaleLabel: function(label) { return '$' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }}); });
