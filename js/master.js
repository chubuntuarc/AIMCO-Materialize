$(document).ready(function(){
   $.post("../php/detalle_factura.php",{"reset":0});
    //Modal del login -----------------------------------------------------------------------------------------------------------------
  $('.modal-trigger').leanModal();
     $('select').material_select();
     $('.parallax').parallax();
    $('.sesion').dropdown({
     inDuration: 300,
     outDuration: 225,
     constrain_width: false, // Does not change width of dropdown to that of the activator
     hover: true, // Activate on hover
     gutter: 0, // Spacing from edge
     belowOrigin: false, // Displays dropdown below the button
     alignment: 'left' // Displays dropdown with edge aligned to the left of button
   });
    //Gráfica de barras --------------------------------------------------------------------------------------------------------------
    //Funciones generales de la gráfica principal.
    //El script principal se encuentra en scripts/tabla_ventas.js
    //Descargado de Charts.js
    //Documentación adicional en: http://www.chartjs.org/docs/#bar-chart
    //Variables generales de la gráfica


           //Campos para la gráfica de Facturación
           var Campos_Facturacion = document.getElementById("campos_facturacion").value;  //Cadena capturada de los input ocultos en el DOM
           var Valores_Facturacion = document.getElementById("campos_facturacion").innerHTML=Campos_Facturacion;
           var Mes_Facturacion = Valores_Facturacion.split(",");  //Se divide la cadena en partes para poder pasarlos a Float

           //Campos para la gráfica de Ordenes de Ventas
           var Campos_Ordenes = document.getElementById("campos_ordenes").value;   //Cadena capturada de los input ocultos en el DOM
           var Valores_Ordenes = document.getElementById("campos_ordenes").innerHTML=Campos_Ordenes;
           var Mes_Ordenes = Valores_Ordenes.split(",");   //Se divide la cadena en partes para poder pasarlos a Float

           //Campos para la gráfica de Ofertas de Ventas
           var Campos_Ofertas = document.getElementById("campos_ofertas").value;   //Cadena capturada de los input ocultos en el DOM
           var Valores_Ofertas = document.getElementById("campos_ofertas").innerHTML=Campos_Ofertas;
           var Mes_Ofertas = Valores_Ofertas.split(",");   //Se divide la cadena en partes para poder pasarlos a Float

           //Campos para la gráfica de Back Order
           var Campos_Back_Order = document.getElementById("campos_back_order").value;   //Cadena capturada de los input ocultos en el DOM
           var Valores_Back_Order = document.getElementById("campos_back_order").innerHTML=Campos_Back_Order;
           var Mes_Back_Order = Valores_Back_Order.split(",");   //Se divide la cadena en partes para poder pasarlos a Float

           var fecha = new Date ();
           var mes = fecha.getMonth ();
           var datos_facturas_actuales = [0,0,0,0,0,0,0,0,0,0,0,0];
           var datos_ordenes_actuales = [0,0,0,0,0,0,0,0,0,0,0,0];
           var datos_ofertas_actuales = [0,0,0,0,0,0,0,0,0,0,0,0];
           var datos_back_actuales = [0,0,0,0,0,0,0,0,0,0,0,0];
           switch (mes) {
             case 0:
                 datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),0,0,0,0,0,0,0,0,0,0,0];
                 datos_ordenes_actuales = [parseFloat(Mes_Ordenes[0]),0,0,0,0,0,0,0,0,0,0,0];
                 datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),0,0,0,0,0,0,0,0,0,0,0];
                 datos_back_actuales = [parseFloat(Mes_Back_Order[0]),0,0,0,0,0,0,0,0,0,0,0];
               break;
               case 1:
                   datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),0,0,0,0,0,0,0,0,0,0];
                   datos_ordenes_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),0,0,0,0,0,0,0,0,0,0];
                   datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),0,0,0,0,0,0,0,0,0,0];
                   datos_back_actuales = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),0,0,0,0,0,0,0,0,0,0];
                 break;
                 case 2:
                     datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),0,0,0,0,0,0,0,0,0];
                     datos_ordenes_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),0,0,0,0,0,0,0,0,0];
                     datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),0,0,0,0,0,0,0,0,0];
                     datos_back_actuales = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),0,0,0,0,0,0,0,0,0];
                   break;
                   case 3:
                       datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),0,0,0,0,0,0,0,0];
                       datos_ordenes_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),0,0,0,0,0,0,0,0];
                       datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),0,0,0,0,0,0,0,0];
                       datos_back_actuales = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),0,0,0,0,0,0,0,0];
                     break;
                     case 4:
                         datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),0,0,0,0,0,0,0];
                         datos_ordenes_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),0,0,0,0,0,0,0];
                         datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),0,0,0,0,0,0,0];
                         datos_back_actuales = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),0,0,0,0,0,0,0];
                       break;
                       case 5:
                           datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),0,0,0,0,0,0];
                           datos_ordenes_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),0,0,0,0,0,0];
                           datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),0,0,0,0,0,0];
                           datos_back_actuales = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),0,0,0,0,0,0];
                         break;
                         case 6:
                             datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),0,0,0,0,0];
                             datos_ordenes_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),parseFloat(Mes_Ordenes[6]),0,0,0,0,0];
                             datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),parseFloat(Mes_Ofertas[6]),0,0,0,0,0];
                             datos_back_actuales = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),parseFloat(Mes_Back_Order[6]),0,0,0,0,0];
                           break;
                           case 7:
                               datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),parseFloat(Mes_Facturacion[7]),0,0,0,0];
                               datos_ordenes_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),parseFloat(Mes_Ordenes[6]),parseFloat(Mes_Ordenes[7]),0,0,0,0];
                               datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),parseFloat(Mes_Ofertas[6]),parseFloat(Mes_Ofertas[7]),0,0,0,0];
                               datos_back_actuales = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),parseFloat(Mes_Back_Order[6]),parseFloat(Mes_Back_Order[7]),0,0,0,0];
                             break;
                             case 8:
                                 datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),parseFloat(Mes_Facturacion[7]),parseFloat(Mes_Facturacion[8]),0,0,0];
                                 datos_ordenes_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),parseFloat(Mes_Ordenes[6]),parseFloat(Mes_Ordenes[7]),parseFloat(Mes_Ordenes[8]),0,0,0];
                                 datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),parseFloat(Mes_Ofertas[6]),parseFloat(Mes_Ofertas[7]),parseFloat(Mes_Ofertas[8]),0,0,0];
                                 datos_back_actuales = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),parseFloat(Mes_Back_Order[6]),parseFloat(Mes_Back_Order[7]),parseFloat(Mes_Back_Order[8]),0,0,0];
                               break;
                               case 9:
                                   datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),parseFloat(Mes_Facturacion[7]),parseFloat(Mes_Facturacion[8]),parseFloat(Mes_Facturacion[9]),0,0];
                                   datos_ordenes_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),parseFloat(Mes_Ordenes[6]),parseFloat(Mes_Ordenes[7]),parseFloat(Mes_Ordenes[8]),parseFloat(Mes_Ordenes[9]),0,0];
                                   datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),parseFloat(Mes_Ofertas[6]),parseFloat(Mes_Ofertas[7]),parseFloat(Mes_Ofertas[8]),parseFloat(Mes_Ofertas[9]),0,0];
                                   datos_back_actuales = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),parseFloat(Mes_Back_Order[6]),parseFloat(Mes_Back_Order[7]),parseFloat(Mes_Back_Order[8]),parseFloat(Mes_Back_Order[9]),0,0];
                                 break;
                                 case 10:
                                     datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),parseFloat(Mes_Facturacion[7]),parseFloat(Mes_Facturacion[8]),parseFloat(Mes_Facturacion[9]),parseFloat(Mes_Facturacion[10]),0];
                                     datos_ordenes_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),parseFloat(Mes_Ordenes[6]),parseFloat(Mes_Ordenes[7]),parseFloat(Mes_Ordenes[8]),parseFloat(Mes_Ordenes[9]),parseFloat(Mes_Ordenes[10]),0];
                                     datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),parseFloat(Mes_Ofertas[6]),parseFloat(Mes_Ofertas[7]),parseFloat(Mes_Ofertas[8]),parseFloat(Mes_Ofertas[9]),parseFloat(Mes_Ofertas[10]),0];
                                     datos_back_actuales = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),parseFloat(Mes_Back_Order[6]),parseFloat(Mes_Back_Order[7]),parseFloat(Mes_Back_Order[8]),parseFloat(Mes_Back_Order[9]),parseFloat(Mes_Back_Order[10]),0];
                                   break;
                                   case 11:
                                       datos_facturas_actuales = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),parseFloat(Mes_Facturacion[7]),parseFloat(Mes_Facturacion[8]),parseFloat(Mes_Facturacion[9]),parseFloat(Mes_Facturacion[10]),parseFloat(Mes_Facturacion[11])];
                                       datos_ordenes_actuales = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),parseFloat(Mes_Ordenes[6]),parseFloat(Mes_Ordenes[7]),parseFloat(Mes_Ordenes[8]),parseFloat(Mes_Ordenes[9]),parseFloat(Mes_Ordenes[10]),parseFloat(Mes_Ordenes[11])];
                                       datos_ofertas_actuales = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),parseFloat(Mes_Ofertas[6]),parseFloat(Mes_Ofertas[7]),parseFloat(Mes_Ofertas[8]),parseFloat(Mes_Ofertas[9]),parseFloat(Mes_Ofertas[10]),parseFloat(Mes_Ofertas[11])];
                                       datos_back_actuales = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),parseFloat(Mes_Back_Order[6]),parseFloat(Mes_Back_Order[7]),parseFloat(Mes_Back_Order[8]),parseFloat(Mes_Back_Order[9]),parseFloat(Mes_Back_Order[10]),parseFloat(Mes_Back_Order[11])];
                                     break;
             default:
           }

           var inicial = {
             labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
             datasets : [
               {
                 fillColor : "#26a69a", //Color principal de las barras
                 strokeColor : "rgba(220,220,220,0.8)",
                 highlightFill: "#00796B",
                 highlightStroke: "rgba(220,220,220,1)",
                 data : datos_facturas_actuales
                 //parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),parseFloat(Mes_Facturacion[7]),parseFloat(Mes_Facturacion[8]),parseFloat(Mes_Facturacion[9]),parseFloat(Mes_Facturacion[10]),parseFloat(Mes_Facturacion[11])
                   //Los valores dentro de "data", son los que se obtienen con el split() de la variable Valores_Facturacion
                   //Deben convertirse a Float para respetar el punto decimal, no pueden ir campos tipo String dentro
               }
             ]
           }
           var ctx = document.getElementById("canvas").getContext("2d");
                      window.myBar = new Chart(ctx).Bar(inicial, {
                        responsive : true
                      });


           //Funcion del botón Facturas de Clientes
           $('#facturas_clientes').on('click', function() {
               $('#Titulo_Grafica').text("Facturas de Clientes");
                 window.myBar.destroy();
                 inicial.datasets[0].data = datos_facturas_actuales;
                 inicial.datasets[0].fillColor = '#26a69a';
                 var ctx = document.getElementById("canvas").getContext("2d");
                            window.myBar = new Chart(ctx).Bar(inicial, {
                              responsive : true
                            });
             });

             //Funcion del botón Ordenes de Venta
             $('#ordenes_venta').on('click', function(){
                 $('#Titulo_Grafica').text("Ordenes de Venta");
                 window.myBar.destroy();
                 inicial.datasets[0].data = datos_ordenes_actuales;
                 inicial.datasets[0].fillColor = '#EF5350';
                 var ctx = document.getElementById("canvas").getContext("2d");
                 window.myBar = new Chart(ctx).Bar(inicial, {
                   responsive : true
              });
               })

               //Funcion del botón Ofertas de Venta
               $('#ofertas_ventas').on('click', function(){
                   $('#Titulo_Grafica').text("Ofertas de Venta");
                   window.myBar.destroy();
                   inicial.datasets[0].data = datos_ofertas_actuales;
                   inicial.datasets[0].fillColor = '#42A5F5';
                   var ctx = document.getElementById("canvas").getContext("2d");
                   window.myBar = new Chart(ctx).Bar(inicial, {
                     responsive : true
                });
                 })

               //Funcion del botón Back Order
               $('#back_order').on('click', function(){
                   $('#Titulo_Grafica').text("Back Order");
                   window.myBar.destroy();
                   inicial.datasets[0].data = datos_back_actuales;
                   inicial.datasets[0].fillColor = '#ab47bc';
                   var ctx = document.getElementById("canvas").getContext("2d");
                   window.myBar = new Chart(ctx).Bar(inicial, {
                     responsive : true
                });
                 })
  });
