$(document).ready(function(){
    //Modal del login -----------------------------------------------------------------------------------------------------------------
    $('.modal-trigger').leanModal();

    //Funciones de la busqueda en dashboard --------------------------------------------------------------------------------------------
    $( "#busqueda" ).ready(function() {
        $buscar = document.getElementById('busqueda').value
    // Cuando el campo de busqueda no esta vacio
        if( $buscar != "")
        {
            // Muestra solo las coincidencias
            $("#directorio tbody>tr").hide();
            $("#directorio td:contains-ci('" + $buscar + "')").parent("tr").show();
        }
        else
        {
            // Cuando se limpia el input, se carga todo de nuevo
            $("#directorio tbody>tr").show();
        }
});
    // Escribe en el evento keyup
    $("#busqueda").keyup(function(){
        //Cuando el valor del input no esta vacio
        if( $(this).val() != "")
        {
            // Solo muestra las coincidencias y oculta lo demas
            $("#directorio tbody>tr").hide();
            $("#directorio td:contains-ci('" + $(this).val() + "')").parent("tr").show();
        }
        else
        {
            // Cuando el input esta en blanco o se borra carga todo de nuevo
            $("#directorio tbody>tr").show();
        }
    });
    // Expression JQuery para que no sea Key-Sensitive
    $.extend($.expr[":"],
    {
        "contains-ci": function(elem, i, match, array)
        {
            return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
        }
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
           var Valores_Ordenes = document.getElementById("campos_facturacion").innerHTML=Campos_Ordenes;
           var Mes_Ordenes = Valores_Ordenes.split(",");   //Se divide la cadena en partes para poder pasarlos a Float

           //Campos para la gráfica de Ofertas de Ventas
           var Campos_Ofertas = document.getElementById("campos_ofertas").value;   //Cadena capturada de los input ocultos en el DOM
           var Valores_Ofertas = document.getElementById("campos_ofertas").innerHTML=Campos_Ofertas;
           var Mes_Ofertas = Valores_Ofertas.split(",");   //Se divide la cadena en partes para poder pasarlos a Float

           //Campos para la gráfica de Back Order
           var Campos_Back_Order = document.getElementById("campos_back_order").value;   //Cadena capturada de los input ocultos en el DOM
           var Valores_Back_Order = document.getElementById("campos_back_order").innerHTML=Campos_Back_Order;
           var Mes_Back_Order = Valores_Back_Order.split(",");   //Se divide la cadena en partes para poder pasarlos a Float

           var barChartData = {
             labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
             datasets : [
               {
                 fillColor : "#4CAF50", //Color principal de las barras
                 strokeColor : "rgba(220,220,220,0.8)",
                 highlightFill: "#00796B",
                 highlightStroke: "rgba(220,220,220,1)",
                 data : [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),parseFloat(Mes_Facturacion[7]),parseFloat(Mes_Facturacion[8]),parseFloat(Mes_Facturacion[9]),parseFloat(Mes_Facturacion[10]),parseFloat(Mes_Facturacion[11])]
                   //Los valores dentro de "data", son los que se obtienen con el split() de la variable Valores_Facturacion
                   //Deben convertirse a Float para respetar el punto decimal, no pueden ir campos tipo String dentro
               }
             ]
           }

           var ctx = document.getElementById("canvas").getContext("2d");
           window.myBar = new Chart(ctx).Bar(barChartData, {
             responsive : true
           });

           //Funcion del botón Facturas de Clientes
           $('#facturas_clientes').on('click', function() {
               $('#Titulo_Grafica').text("Facturas de Clientes");
                 window.myBar.destroy();
                 barChartData.datasets[0].data = [parseFloat(Mes_Facturacion[0]),parseFloat(Mes_Facturacion[1]),parseFloat(Mes_Facturacion[2]),parseFloat(Mes_Facturacion[3]),parseFloat(Mes_Facturacion[4]),parseFloat(Mes_Facturacion[5]),parseFloat(Mes_Facturacion[6]),parseFloat(Mes_Facturacion[7]),parseFloat(Mes_Facturacion[8]),parseFloat(Mes_Facturacion[9]),parseFloat(Mes_Facturacion[10]),parseFloat(Mes_Facturacion[11])];
                 barChartData.datasets[0].fillColor = '#4CAF50';
               var ctx = document.getElementById("canvas").getContext("2d");
                   window.myBar = new Chart(ctx).Bar(barChartData, {
                     responsive : true,
                });
             });

             //Funcion del botón Ordenes de Venta
             $('#ordenes_venta').on('click', function(){
                 $('#Titulo_Grafica').text("Ordenes de Venta");
                 window.myBar.destroy();
                 barChartData.datasets[0].data = [parseFloat(Mes_Ordenes[0]),parseFloat(Mes_Ordenes[1]),parseFloat(Mes_Ordenes[2]),parseFloat(Mes_Ordenes[3]),parseFloat(Mes_Ordenes[4]),parseFloat(Mes_Ordenes[5]),parseFloat(Mes_Ordenes[6]),parseFloat(Mes_Ordenes[7]),parseFloat(Mes_Ordenes[8]),parseFloat(Mes_Ordenes[9]),parseFloat(Mes_Ordenes[10]),parseFloat(Mes_Ordenes[11])];
                 barChartData.datasets[0].fillColor = '#3F51B5';
                 var ctx = document.getElementById("canvas").getContext("2d");
                 window.myBar = new Chart(ctx).Bar(barChartData, {
                   responsive : true
              });
               })

               //Funcion del botón Ofertas de Venta
               $('#ofertas_ventas').on('click', function(){
                   $('#Titulo_Grafica').text("Ofertas de Venta");
                   window.myBar.destroy();
                   barChartData.datasets[0].data = [parseFloat(Mes_Ofertas[0]),parseFloat(Mes_Ofertas[1]),parseFloat(Mes_Ofertas[2]),parseFloat(Mes_Ofertas[3]),parseFloat(Mes_Ofertas[4]),parseFloat(Mes_Ofertas[5]),parseFloat(Mes_Ofertas[6]),parseFloat(Mes_Ofertas[7]),parseFloat(Mes_Ofertas[8]),parseFloat(Mes_Ofertas[9]),parseFloat(Mes_Ofertas[10]),parseFloat(Mes_Ofertas[11])];
                   barChartData.datasets[0].fillColor = '#00BCD4';
                   var ctx = document.getElementById("canvas").getContext("2d");
                   window.myBar = new Chart(ctx).Bar(barChartData, {
                     responsive : true
                });
                 })

               //Funcion del botón Back Order
               $('#back_order').on('click', function(){
                   $('#Titulo_Grafica').text("Back Order");
                   window.myBar.destroy();
                   barChartData.datasets[0].data = [parseFloat(Mes_Back_Order[0]),parseFloat(Mes_Back_Order[1]),parseFloat(Mes_Back_Order[2]),parseFloat(Mes_Back_Order[3]),parseFloat(Mes_Back_Order[4]),parseFloat(Mes_Back_Order[5]),parseFloat(Mes_Back_Order[6]),parseFloat(Mes_Back_Order[7]),parseFloat(Mes_Back_Order[8]),parseFloat(Mes_Back_Order[9]),parseFloat(Mes_Back_Order[10]),parseFloat(Mes_Back_Order[11])];
                   barChartData.datasets[0].fillColor = '#7E57C2';
                   var ctx = document.getElementById("canvas").getContext("2d");
                   window.myBar = new Chart(ctx).Bar(barChartData, {
                     responsive : true
                });
                 })
  });