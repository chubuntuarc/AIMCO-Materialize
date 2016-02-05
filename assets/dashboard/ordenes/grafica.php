<!--Gráfica-->
<div class="row">
  <div class="col s12 m9" id="grafico">
    <div class="card-panel z-depth-3">
      <h5 id="Titulo_Grafica">Ordenes de Ventas</h5>
        <canvas id="canvas" height="150" width="400"></canvas>
        <!--Inputs ocultos para la consulta de los valores de las graficas-->
        <!--El id usado en los input sirve para llevar la cadena al script JS y esconderlos usando styles/adicionales.css-->
        <input type="text" id="campos_ordenes" value="
          <?php
              //Consulta de Ordenes de Venta 2016
              $Consulta_Grafica_Ordenes ="SELECT sum(T1.[TotalSumSy])AS Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2016' AND T0.[CANCELED] = 'N' AND   T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Grafica_Ordenes);
              while ($ord = odbc_fetch_array($Resultado_Consulta_Grafica_Ordenes)) {
                foreach ($ord as $meses_ord) {  //Las variables en while y foreach de los input son solo para uso en ellos mismos.
                  echo $meses_ord.",";
                } } ?> ">
        <input type="text" id="campos_ordenes_anterior" value="
          <?php
              //Consulta de Ordenes de Venta 2015
              $Consulta_Grafica_Ordenes ="SELECT sum(T1.[TotalSumSy])AS Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2015' AND T0.[CANCELED] = 'N' AND   T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Grafica_Ordenes);
              while ($ord = odbc_fetch_array($Resultado_Consulta_Grafica_Ordenes)) {
                foreach ($ord as $meses_ord) {  //Las variables en while y foreach de los input son solo para uso en ellos mismos.
                  echo $meses_ord.",";
                } } ?> ">
        <input type="text" id="campos_ordenes_anterior2" value="
          <?php
              //Consulta de Ordenes de Venta 2014
              $Consulta_Grafica_Ordenes ="SELECT sum(T1.[TotalSumSy])AS Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2014' AND T0.[CANCELED] = 'N' AND   T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Grafica_Ordenes);
              while ($ord = odbc_fetch_array($Resultado_Consulta_Grafica_Ordenes)) {
                foreach ($ord as $meses_ord) {  //Las variables en while y foreach de los input son solo para uso en ellos mismos.
                  echo $meses_ord.",";
                } } ?> ">
        <input type="text" id="campos_ordenes_anterior3" value="
          <?php
              //Consulta de Ordenes de Venta 2013
              $Consulta_Grafica_Ordenes ="SELECT sum(T1.[TotalSumSy])AS Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2013' AND T0.[CANCELED] = 'N' AND   T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Grafica_Ordenes);
              while ($ord = odbc_fetch_array($Resultado_Consulta_Grafica_Ordenes)) {
                foreach ($ord as $meses_ord) {  //Las variables en while y foreach de los input son solo para uso en ellos mismos.
                  echo $meses_ord.",";
              } } ?> ">
        <!--/Inputs ocultos para la consulta de los valores de las graficas-->
    </div>
  </div>
  <input type="text" id="ordenes2016" value="<?php echo $ordenes; ?>">
  <input type="text" id="ordenes2015" value="<?php echo $ordenes2; ?>">
  <input type="text" id="ordenes2014" value="<?php echo $ordenes3; ?>">
  <input type="text" id="ordenes2013" value="<?php echo $ordenes4; ?>">
  <?php include('../assets/dashboard/registros_nuevos.php');?>                  <!--consultas para obtener los nuevos registros  -->
  <?php include('../assets/boton_rojo.php');?>                                  <!--Botón para consultar graficas de años distintos  -->
</div>
