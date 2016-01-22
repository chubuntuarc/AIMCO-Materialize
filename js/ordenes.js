$(document).ready(function(){
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
$('.modal-trigger').leanModal();
  //Campos para la gráfica de Ordenes de Ventas
  var Campos_Ordenes = document.getElementById("campos_ordenes").value;   //Cadena capturada de los input ocultos en el DOM
  var Valores_Ordenes = document.getElementById("campos_ordenes").innerHTML=Campos_Ordenes;
  var Mes_Ordenes = Valores_Ordenes.split(",");   //Se divide la cadena en partes para poder pasarlos a Float

  var fecha = new Date ();
  var mes = fecha.getMonth ();
  var datos_facturas_actuales = [0,0,0,0,0,0,0,0,0,0,0,0];
  switch (mes) {
    case 0:
        datos_facturas_actuales = [parseFloat(Mes_Ordenes[0]),0,0,0,0,0,0,0,0,0,0,0];
      break;
      case 1:
          datos_facturas_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),0,0,0,0,0,0,0,0,0,0];
        break;
        case 2:
            datos_facturas_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),0,0,0,0,0,0,0,0,0];
          break;
          case 3:
              datos_facturas_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),0,0,0,0,0,0,0,0];
            break;
            case 4:
                datos_facturas_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),0,0,0,0,0,0,0];
              break;
              case 5:
                  datos_facturas_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),0,0,0,0,0,0];
                break;
                case 6:
                    datos_facturas_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),parseFloat(Mes_Ordenes[6]),0,0,0,0,0];
                  break;
                  case 7:
                      datos_facturas_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),parseFloat(Mes_Ordenes[6]),parseFloat(Mes_Ordenes[7]),0,0,0,0];
                    break;
                    case 8:
                        datos_facturas_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),parseFloat(Mes_Ordenes[6]),parseFloat(Mes_Ordenes[7]),parseFloat(Mes_Ordenes[8]),0,0,0];
                      break;
                      case 9:
                          datos_facturas_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),parseFloat(Mes_Ordenes[6]),parseFloat(Mes_Ordenes[7]),parseFloat(Mes_Ordenes[8]),parseFloat(Mes_Ordenes[9]),0,0];
                        break;
                        case 10:
                            datos_facturas_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),parseFloat(Mes_Ordenes[6]),parseFloat(Mes_Ordenes[7]),parseFloat(Mes_Ordenes[8]),parseFloat(Mes_Ordenes[9]),parseFloat(Mes_Ordenes[10]),0];
                          break;
                          case 11:
                              datos_facturas_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),parseFloat(Mes_Ordenes[6]),parseFloat(Mes_Ordenes[7]),parseFloat(Mes_Ordenes[8]),parseFloat(Mes_Ordenes[9]),parseFloat(Mes_Ordenes[10]),parseFloat(Mes_Ordenes[11])];
                            break;
    default:
  }

var barChartData = {
  labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
  datasets : [
    {
      fillColor : "#EF5350", //Color principal de las barras
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
});
