$(document).ready(function(){
    //Gráficas de barras que se muestran en el dashboard de ventas----------------
    //Funciones generales de la gráfica principal.
    //El script principal se encuentra en scripts/tabla_ventas.js
    //Descargado de Charts.js
    //Documentación adicional en: http://www.chartjs.org/docs/#bar-chart
    //Variables generales de la gráfica
   var Campos_Facturacion = document.getElementById("campos_facturacion").value;//Cadena capturada de los input ocultos en el DOM de los Campos para la gráfica de Facturación
   var Valores_Facturacion = document.getElementById("campos_facturacion").innerHTML=Campos_Facturacion;
   var Mes_Facturacion = Valores_Facturacion.split(",");                        //Se divide la cadena en partes para poder pasarlos a Float
   var Campos_Ordenes = document.getElementById("campos_ordenes").value;        //Cadena capturada de los input ocultos en el DOM de los Campos para la gráfica de Ordenes de Ventas
   var Valores_Ordenes = document.getElementById("campos_ordenes").innerHTML=Campos_Ordenes;
   var Mes_Ordenes = Valores_Ordenes.split(",");                                //Se divide la cadena en partes para poder pasarlos a Float
   var Campos_Ofertas = document.getElementById("campos_ofertas").value;        //Cadena capturada de los input ocultos en el DOM de los Campos para la gráfica de Ofertas de Ventas
   var Valores_Ofertas = document.getElementById("campos_ofertas").innerHTML=Campos_Ofertas;
   var Mes_Ofertas = Valores_Ofertas.split(",");                                //Se divide la cadena en partes para poder pasarlos a Float
   var Campos_Back_Order = document.getElementById("campos_back_order").value;  //Cadena capturada de los input ocultos en el DOM de los Campos para la gráfica de Back Order
   var Valores_Back_Order = document.getElementById("campos_back_order").innerHTML=Campos_Back_Order;
   var Mes_Back_Order = Valores_Back_Order.split(",");                          //Se divide la cadena en partes para poder pasarlos a Float
         var fecha = new Date ();                                               //Se obtiene la fecha del sistema
         var mes = fecha.getMonth ();                                           //Se obtiene el numero del mes del sistema Enero(0), Febrero(1), etc..
         var datos_facturas_actuales, datos_ordenes_actuales, datos_ofertas_actuales, datos_back_actuales = [0,0,0,0,0,0,0,0,0,0,0,0]; //Datos asignados a los valores para despues evaluar en base al mes del año
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
           default: }
         var inicial = {                                                        //Se crea la variable que cargara los elementos principales de la gráfica
           labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"], //Nombres de los meses del año
           datasets : [{ fillColor : "#26a69a",                                 //Color principal de las barras
                         strokeColor : "rgba(220,220,220,0.8)",                 //Color del contorno
                         highlightFill: "#00796B",                              //Color de las barras cuando el mouse esta sobre ellas
                         highlightStroke: "rgba(220,220,220,1)",                //Color del contorno cuando el mouse esta sobre las barras
                         data : datos_facturas_actuales }]}                     //Datos que se cargaran en la gráfica
                           //Los valores dentro de "data", son los que se obtienen con el split() de la variable Valores_Facturacion
                           //Deben convertirse a Float para respetar el punto decimal, no pueden ir campos tipo String dentro
         var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(inicial, {responsive : true}); //Se muestra la gráfica inicial en el dashboard
         $('#facturas_clientes').on('click', function() {                       //Funcion del botón Facturas de Clientes
           $('#Titulo_Grafica').text("Facturas de Clientes");                   //Se cambia el titulo de la gráfica
             window.myBar.destroy();                                            //Se destruye la gráfica anterior para crear una nueva
             inicial.datasets[0].data = datos_facturas_actuales;                //Se cargan a la nueva gráfica los datos de la facturación
             inicial.datasets[0].fillColor = '#26a69a';                         //Se pintan las barras del color indicado
             var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(inicial, {responsive : true}); }); //Se crea la nueva gráfica
         $('#ordenes_venta').on('click', function(){                            //Funcion del botón Ordenes de Venta
           $('#Titulo_Grafica').text("Ordenes de Venta");                       //Se cambia el titulo de la gráfica
           window.myBar.destroy();                                              //Se destruye la gráfica anterior para crear una nueva
           inicial.datasets[0].data = datos_ordenes_actuales;                   //Se cargan a la nueva gráfica los datos de las ordenes
           inicial.datasets[0].fillColor = '#EF5350';                           //Se pintan las barras del color indicado
           var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(inicial, {responsive : true}); }); //Se crea la nueva gráfica
         $('#ofertas_ventas').on('click', function(){                           //Funcion del botón Ofertas de Venta
             $('#Titulo_Grafica').text("Ofertas de Venta");                     //Se cambia el titulo de la gráfica
             window.myBar.destroy();                                            //Se destruye la gráfica anterior para crear una nueva
             inicial.datasets[0].data = datos_ofertas_actuales;                 //Se cargan a la nueva gráfica los datos de las ofertas
             inicial.datasets[0].fillColor = '#42A5F5';                         //Se pintan las barras del color indicado
             var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(inicial, {responsive : true}); }); //Se crea la nueva gráfica
         $('#back_order').on('click', function(){                               //Funcion del botón Back Order
             $('#Titulo_Grafica').text("Back Order");                           //Se cambia el titulo de la gráfica
             window.myBar.destroy();                                            //Se destruye la gráfica anterior para crear una nueva
             inicial.datasets[0].data = datos_back_actuales;                    //Se cargan a la nueva gráfica los datos de Back Order
             inicial.datasets[0].fillColor = '#ab47bc';                         //Se pintan las barras del color indicado
             var ctx = document.getElementById("canvas").getContext("2d"); window.myBar = new Chart(ctx).Bar(inicial, {responsive : true}); }); //Se crea la nueva gráfica
});
