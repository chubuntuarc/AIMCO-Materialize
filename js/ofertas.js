$(document).ready(function(){
  //Variable que controla la visibilidad del modal de vista previa
  var oculto = $("#valor_escondido").val();
  //Se evalua si se puede mostrar el modal
  if (oculto == 1) {
    $("#modal4").openModal();
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
//Se obtiene la fecha del sistema para usarlo como filtro en las facturas
Date.prototype.yyyymmdd = function() {
  var yyyy = this.getFullYear().toString();
  var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
  var dd  = this.getDate().toString();
  return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
};
var d = new Date();
//Se ejecuta el filtro de las facturas en base a la fecha actual del sistema
$(".fila_ofertas").each(function(){
     if($(this).attr("fecha") != d.yyyymmdd() + " 00:00:00.000"){
      $(this).fadeOut();
     }

  });

  //Se consigue el numero de folio de la linea seleccionada
  $(".vista_previa").click(function(){
    var id_folio = $(this).attr("folio");
    $("#titulo_detalle").text("Detalle Oferta " + id_folio);
    $.post("../php/detalle_oferta.php",{"texto":id_folio});
    window.location.reload(true);
  });

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

//Funciones de la muestra de graficos por año------------------------------------------------------------------------------------------------------------------
//Funcion del botón Facturas de Clientes
$('#year_anterior').on('click', function() {
    $('#boton').text("2015");
    var ofertas2015 = document.getElementById("ofertas2015").value;   //Cadena capturada de los input ocultos en el DOM
    var ofertas20015 = document.getElementById("ofertas2015").innerHTML=ofertas2015;
    $('#total_ofertas_clientes').text("Total: ".concat(ofertas20015));
      window.myBar.destroy();
      barChartData.datasets[0].data = [parseFloat(Mes_Ofertas_Anterior[0]),parseFloat(Mes_Ofertas_Anterior[1]),parseFloat(Mes_Ofertas_Anterior[2]),parseFloat(Mes_Ofertas_Anterior[3]),parseFloat(Mes_Ofertas_Anterior[4]),parseFloat(Mes_Ofertas_Anterior[5]),parseFloat(Mes_Ofertas_Anterior[6]),parseFloat(Mes_Ofertas_Anterior[7]),parseFloat(Mes_Ofertas_Anterior[8]),parseFloat(Mes_Ofertas_Anterior[9]),parseFloat(Mes_Ofertas_Anterior[10]),parseFloat(Mes_Ofertas_Anterior[11])];
      barChartData.datasets[0].fillColor = '#42A5F5';
    var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx).Bar(barChartData, {
          responsive : true,
     });
  });

  //Funcion del botón Facturas de Clientes
  $('#year').on('click', function() {
      $('#boton').text("2016");
      var ofertas2016 = document.getElementById("ofertas2016").value;   //Cadena capturada de los input ocultos en el DOM
      var ofertas20016 = document.getElementById("ofertas2016").innerHTML=ofertas2016;
      $('#total_ofertas_clientes').text("Total: ".concat(ofertas20016));
        window.myBar.destroy();
        barChartData.datasets[0].data = datos_ofertas_actuales;
        barChartData.datasets[0].fillColor = '#42A5F5';
      var ctx = document.getElementById("canvas").getContext("2d");
          window.myBar = new Chart(ctx).Bar(barChartData, {
            responsive : true,
       });
    });

    //Funcion del botón Facturas de Clientes
    $('#year_anterior_2').on('click', function() {
        $('#boton').text("2014");
        var ofertas2014 = document.getElementById("ofertas2014").value;   //Cadena capturada de los input ocultos en el DOM
        var ofertas20014 = document.getElementById("ofertas2014").innerHTML=ofertas2014;
        $('#total_ofertas_clientes').text("Total: ".concat(ofertas20014));
          window.myBar.destroy();
          barChartData.datasets[0].data = [parseFloat(Mes_Ofertas_Anterior2[0]),parseFloat(Mes_Ofertas_Anterior2[1]),parseFloat(Mes_Ofertas_Anterior2[2]),parseFloat(Mes_Ofertas_Anterior2[3]),parseFloat(Mes_Ofertas_Anterior2[4]),parseFloat(Mes_Ofertas_Anterior2[5]),parseFloat(Mes_Ofertas_Anterior2[6]),parseFloat(Mes_Ofertas_Anterior2[7]),parseFloat(Mes_Ofertas_Anterior2[8]),parseFloat(Mes_Ofertas_Anterior2[9]),parseFloat(Mes_Ofertas_Anterior2[10]),parseFloat(Mes_Ofertas_Anterior2[11])];
          barChartData.datasets[0].fillColor = '#42A5F5';
        var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx).Bar(barChartData, {
              responsive : true,
         });
      });

      //Funcion del botón Facturas de Clientes
      $('#year_anterior_3').on('click', function() {
          $('#boton').text("2013");
          var ofertas2013 = document.getElementById("ofertas2013").value;   //Cadena capturada de los input ocultos en el DOM
          var ofertas20013 = document.getElementById("ofertas2013").innerHTML=ofertas2013;
          $('#total_ofertas_clientes').text("Total: ".concat(ofertas20013));
            window.myBar.destroy();
            barChartData.datasets[0].data = [parseFloat(Mes_Ofertas_Anterior3[0]),parseFloat(Mes_Ofertas_Anterior3[1]),parseFloat(Mes_Ofertas_Anterior3[2]),parseFloat(Mes_Ofertas_Anterior3[3]),parseFloat(Mes_Ofertas_Anterior3[4]),parseFloat(Mes_Ofertas_Anterior3[5]),parseFloat(Mes_Ofertas_Anterior3[6]),parseFloat(Mes_Ofertas_Anterior3[7]),parseFloat(Mes_Ofertas_Anterior3[8]),parseFloat(Mes_Ofertas_Anterior3[9]),parseFloat(Mes_Ofertas_Anterior3[10]),parseFloat(Mes_Ofertas_Anterior3[11])];
            barChartData.datasets[0].fillColor = '#42A5F5';
          var ctx = document.getElementById("canvas").getContext("2d");
              window.myBar = new Chart(ctx).Bar(barChartData, {
                responsive : true,
           });
        });
