$(document).ready(function(){
  $('.preview').tooltip({delay: 50});
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
$('body_facturas').each(function(){
  if ($('.fila_facturas').attr('folio') != '6721') {
    $(".fila_facturas").css("display", "none");
  }
});

//Campos para la gráfica de Facturación
var Campos_Facturacion = document.getElementById("campos_facturacion").value;  //Cadena capturada de los input ocultos en el DOM
var Valores_Facturacion = document.getElementById("campos_facturacion").innerHTML=Campos_Facturacion;
var Mes_Facturacion = Valores_Facturacion.split(",");  //Se divide la cadena en partes para poder pasarlos a Float

//Campos para la gráfica de Facturación 2015
var Campos_Facturacion_Anterior = document.getElementById("campos_facturacion_anterior").value;  //Cadena capturada de los input ocultos en el DOM
var Valores_Facturacion_Anterior = document.getElementById("campos_facturacion_anterior").innerHTML=Campos_Facturacion_Anterior;
var Mes_Facturacion_Anterior = Valores_Facturacion_Anterior.split(",");  //Se divide la cadena en partes para poder pasarlos a Float

//Campos para la gráfica de Facturación 2014
var Campos_Facturacion_Anterior2 = document.getElementById("campos_facturacion_anterior2").value;  //Cadena capturada de los input ocultos en el DOM
var Valores_Facturacion_Anterior2 = document.getElementById("campos_facturacion_anterior2").innerHTML=Campos_Facturacion_Anterior2;
var Mes_Facturacion_Anterior2 = Valores_Facturacion_Anterior2.split(",");  //Se divide la cadena en partes para poder pasarlos a Float

//Campos para la gráfica de Facturación 2013
var Campos_Facturacion_Anterior3 = document.getElementById("campos_facturacion_anterior3").value;  //Cadena capturada de los input ocultos en el DOM
var Valores_Facturacion_Anterior3 = document.getElementById("campos_facturacion_anterior3").innerHTML=Campos_Facturacion_Anterior3;
var Mes_Facturacion_Anterior3 = Valores_Facturacion_Anterior3.split(",");  //Se divide la cadena en partes para poder pasarlos a Float
var fecha = new Date ();
var mes = fecha.getMonth ();
var datos_facturas_actuales = [0,0,0,0,0,0,0,0,0,0,0,0];
switch (mes) {
  case 0:
      datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),0,0,0,0,0,0,0,0,0,0,0];
    break;
    case 1:
        datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),0,0,0,0,0,0,0,0,0,0];
      break;
      case 2:
          datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),0,0,0,0,0,0,0,0,0];
        break;
        case 3:
            datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),0,0,0,0,0,0,0,0];
          break;
          case 4:
              datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),0,0,0,0,0,0,0];
            break;
            case 5:
                datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),0,0,0,0,0,0];
              break;
              case 6:
                  datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),0,0,0,0,0];
                break;
                case 7:
                    datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),parseFloat(Mes_Facturacion[7]),0,0,0,0];
                  break;
                  case 8:
                      datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),parseFloat(Mes_Facturacion[7]),parseFloat(Mes_Facturacion[8]),0,0,0];
                    break;
                    case 9:
                        datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),parseFloat(Mes_Facturacion[7]),parseFloat(Mes_Facturacion[8]),parseFloat(Mes_Facturacion[9]),0,0];
                      break;
                      case 10:
                          datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),parseFloat(Mes_Facturacion[7]),parseFloat(Mes_Facturacion[8]),parseFloat(Mes_Facturacion[9]),parseFloat(Mes_Facturacion[10]),0];
                        break;
                        case 11:
                            datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),parseFloat(Mes_Facturacion[7]),parseFloat(Mes_Facturacion[8]),parseFloat(Mes_Facturacion[9]),parseFloat(Mes_Facturacion[10]),parseFloat(Mes_Facturacion[11])];
                          break;
  default:
}

var barChartData = {
  labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
  datasets : [
    {
      fillColor : "#26a69a", //Color principal de las barras
      strokeColor : "rgba(220,220,220,0.8)",
      highlightFill: "#00796B",
      highlightStroke: "rgba(220,220,220,1)",
      data : datos_facturas_actuales
        //Los valores dentro de "data", son los que se obtienen con el split() de la variable Valores_Facturacion
        //Deben convertirse a Float para respetar el punto decimal, no pueden ir campos tipo String dentro
    }
  ]
}

var ctx = document.getElementById("canvas").getContext("2d");
window.myBar = new Chart(ctx).Bar(barChartData, {
  responsive : true
});

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

  //Funcion del botón Facturas de Clientes
  $('#year_anterior').on('click', function() {
      $('#boton').text("2015");
      var facturas2015 = document.getElementById("facturas2015").value;   //Cadena capturada de los input ocultos en el DOM
      var facturas20015 = document.getElementById("facturas2015").innerHTML=facturas2015;
      $('#total_facturas_clientes').text("Total: ".concat(facturas20015));
        window.myBar.destroy();
        barChartData.datasets[0].data = [parseFloat(Mes_Facturacion_Anterior[0]),parseFloat(Mes_Facturacion_Anterior[1]),parseFloat(Mes_Facturacion_Anterior[2]),parseFloat(Mes_Facturacion_Anterior[3]),parseFloat(Mes_Facturacion_Anterior[4]),parseFloat(Mes_Facturacion_Anterior[5]),parseFloat(Mes_Facturacion_Anterior[6]),parseFloat(Mes_Facturacion_Anterior[7]),parseFloat(Mes_Facturacion_Anterior[8]),parseFloat(Mes_Facturacion_Anterior[9]),parseFloat(Mes_Facturacion_Anterior[10]),parseFloat(Mes_Facturacion_Anterior[11])];
        barChartData.datasets[0].fillColor = '#26a69a';
      var ctx = document.getElementById("canvas").getContext("2d");
          window.myBar = new Chart(ctx).Bar(barChartData, {
            responsive : true,
       });
    });

    //Funcion del botón Facturas de Clientes
    $('#year').on('click', function() {
        $('#boton').text("2016");
        var facturas2016 = document.getElementById("facturas2016").value;   //Cadena capturada de los input ocultos en el DOM
        var facturas20016 = document.getElementById("facturas2016").innerHTML=facturas2016;
        $('#total_facturas_clientes').text("Total: ".concat(facturas20016));
          window.myBar.destroy();
          barChartData.datasets[0].data = [parseFloat(Mes_Facturacion[0]),0,0,0,0,0,0,0,0,0,0,0];
          barChartData.datasets[0].fillColor = '#26a69a';
        var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx).Bar(barChartData, {
              responsive : true,
         });
      });

      //Funcion del botón Facturas de Clientes
      $('#year_anterior_2').on('click', function() {
          $('#boton').text("2014");
          var facturas2014 = document.getElementById("facturas2014").value;   //Cadena capturada de los input ocultos en el DOM
          var facturas20014 = document.getElementById("facturas2014").innerHTML=facturas2014;
          $('#total_facturas_clientes').text("Total: ".concat(facturas20014));
            window.myBar.destroy();
            barChartData.datasets[0].data = [parseFloat(Mes_Facturacion_Anterior2[0]),parseFloat(Mes_Facturacion_Anterior2[1]),parseFloat(Mes_Facturacion_Anterior2[2]),parseFloat(Mes_Facturacion_Anterior2[3]),parseFloat(Mes_Facturacion_Anterior2[4]),parseFloat(Mes_Facturacion_Anterior2[5]),parseFloat(Mes_Facturacion_Anterior2[6]),parseFloat(Mes_Facturacion_Anterior2[7]),parseFloat(Mes_Facturacion_Anterior2[8]),parseFloat(Mes_Facturacion_Anterior2[9]),parseFloat(Mes_Facturacion_Anterior2[10]),parseFloat(Mes_Facturacion_Anterior2[11])];
            barChartData.datasets[0].fillColor = '#26a69a';
          var ctx = document.getElementById("canvas").getContext("2d");
              window.myBar = new Chart(ctx).Bar(barChartData, {
                responsive : true,
           });
        });

        //Funcion del botón Facturas de Clientes
        $('#year_anterior_3').on('click', function() {
            $('#boton').text("2013");
            var facturas2013 = document.getElementById("facturas2013").value;   //Cadena capturada de los input ocultos en el DOM
            var facturas20013 = document.getElementById("facturas2014").innerHTML=facturas2013;
            $('#total_facturas_clientes').text("Total: ".concat(facturas20013));
              window.myBar.destroy();
              barChartData.datasets[0].data = [parseFloat(Mes_Facturacion_Anterior3[0]),parseFloat(Mes_Facturacion_Anterior3[1]),parseFloat(Mes_Facturacion_Anterior3[2]),parseFloat(Mes_Facturacion_Anterior3[3]),parseFloat(Mes_Facturacion_Anterior3[4]),parseFloat(Mes_Facturacion_Anterior3[5]),parseFloat(Mes_Facturacion_Anterior3[6]),parseFloat(Mes_Facturacion_Anterior3[7]),parseFloat(Mes_Facturacion_Anterior3[8]),parseFloat(Mes_Facturacion_Anterior3[9]),parseFloat(Mes_Facturacion_Anterior3[10]),parseFloat(Mes_Facturacion_Anterior3[11])];
              barChartData.datasets[0].fillColor = '#26a69a';
            var ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx).Bar(barChartData, {
                  responsive : true,
             });
          });

});
