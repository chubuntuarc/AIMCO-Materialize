<div class="row">                                                           <!--Gráfica-->
  <div class="col s12 m9" id="grafico">
    <div class="card-panel z-depth-3">
      <h5 id="Titulo_Grafica">Facturas de Clientes</h5>                     <!--Titulo de la Gráfica-->
        <canvas id="canvas" height="150" width="400"></canvas>              <!--Se dibuja la gráfica en este canvas-->
        <!--Inputs ocultos para la consulta de los valores de las graficas-->
        <!--El id usado en los input sirve para llevar la cadena al script JS y esconderlos usando styles/diseno.css-->
        <input type="text" id="campos_facturacion" value="
          <?php                                                             //Consultas para información de la gráfica
                                                                            //Consulta de Facturas de Clientes 2016
            $Consulta_Grafica_Facturas ="SELECT sum(T1.[TotalSumSy])AS Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2016' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." AND T1.[TargetType] <> 14 GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
            $Resultado_Consulta_Grafica = odbc_exec($Conexion_SQL, $Consulta_Grafica_Facturas);
            while ($fac = odbc_fetch_array($Resultado_Consulta_Grafica)) { foreach ($fac as $meses) {
                echo $meses.",";  //Se crea usando el foreach una cadena, la cual se divide en scripts/datosGrafica.js para llenar los campos de la gráfica
              } } ?> ">
        <input type="text" id="campos_facturacion_anterior" value="
          <?php                                                             //Consultas para información de la gráfica
                                                                            //Consulta de Facturas de Clientes 2015
              $Consulta_Grafica_Facturas_Anterior ="SELECT sum(T1.[TotalSumSy])AS Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2015' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." AND T1.[TargetType] <> 14 GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Anterior = odbc_exec($Conexion_SQL, $Consulta_Grafica_Facturas_Anterior);
              while ($faca = odbc_fetch_array($Resultado_Consulta_Grafica_Anterior)) { foreach ($faca as $mesesa) {
                  echo $mesesa.",";  //Se crea usando el foreach una cadena, la cual se divide en scripts/datosGrafica.js para llenar los campos de la gráfica
                } } ?> ">
        <input type="text" id="campos_facturacion_anterior2" value="
        <?php                                                             //Consultas para información de la gráfica
                                                                          //Consulta de Facturas de Clientes 2014
              $Consulta_Grafica_Facturas_Anterior2 ="SELECT sum(T1.[TotalSumSy])AS Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2014' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." AND T1.[TargetType] <> 14 GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Anterior2 = odbc_exec($Conexion_SQL, $Consulta_Grafica_Facturas_Anterior2);
              while ($faca2 = odbc_fetch_array($Resultado_Consulta_Grafica_Anterior2)) { foreach ($faca2 as $mesesa2) {
                  echo $mesesa2.",";  //Se crea usando el foreach una cadena, la cual se divide en scripts/datosGrafica.js para llenar los campos de la gráfica
                } } ?> ">
        <input type="text" id="campos_facturacion_anterior3" value="
        <?php                                                             //Consultas para información de la gráfica
                                                                          //Consulta de Facturas de Clientes 2013
              $Consulta_Grafica_Facturas_Anterior3 ="SELECT sum(T1.[TotalSumSy])AS Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2013' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." AND T1.[TargetType] <> 14 GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Anterior3 = odbc_exec($Conexion_SQL, $Consulta_Grafica_Facturas_Anterior3);
              while ($faca3 = odbc_fetch_array($Resultado_Consulta_Grafica_Anterior3)) { foreach ($faca3 as $mesesa3) {
                  echo $mesesa3.",";  //Se crea usando el foreach una cadena, la cual se divide en scripts/datosGrafica.js para llenar los campos de la gráfica
                } } ?> ">
        <!--/Inputs ocultos para la consulta de los valores de las graficas-->
        <input type="text" id="facturas2016" value="<?php echo $facturas; ?>">
        <input type="text" id="facturas2015" value="<?php echo $facturas2; ?>">
        <input type="text" id="facturas2014" value="<?php echo $facturas3; ?>">
        <input type="text" id="facturas2013" value="<?php echo $facturas4; ?>">
    </div>
  </div>
  <?php include('../assets/dashboard/registros_nuevos.php');?>              <!--consultas para obtener los nuevos registros  -->
  <?php include('../assets/boton_rojo.php');?>                              <!--Botón para consultar graficas de años distintos  -->
</div>                                                                      <!--/Gráfica-->
