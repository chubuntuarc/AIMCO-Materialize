<!--Gráfica-->
<div class="row">
  <div class="col s12 m9" id="grafico">
    <div class="card-panel z-depth-3">
      <h5 id="Titulo_Grafica">Ofertas de Ventas</h5>
        <canvas id="canvas" height="150" width="400"></canvas>
        <!--Inputs ocultos para la consulta de los valores de las graficas-->
        <!--El id usado en los input sirve para llevar la cadena al script JS y esconderlos usando styles/adicionales.css-->
        <input type="text" id="campos_ofertas" value="
          <?php
              //Consulta de Ofertas de Venta
              $Consulta_Grafica_Ofertas ="SELECT sum(T1.[TotalSumSy])AS Total FROM OQUT T0  INNER JOIN QUT1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2016' AND T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Ofertas = odbc_exec($Conexion_SQL, $Consulta_Grafica_Ofertas);
              while ($ofe = odbc_fetch_array($Resultado_Consulta_Grafica_Ofertas)) {
                foreach ($ofe as $meses_ofe) {
                  echo $meses_ofe.",";
                } } ?> ">
        <input type="text" id="campos_ofertas_anterior" value="
          <?php
              //Consulta de Ofertas de Venta
              $Consulta_Grafica_Ofertas ="SELECT sum(T1.[TotalSumSy])AS Total FROM OQUT T0  INNER JOIN QUT1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2015' AND T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Ofertas = odbc_exec($Conexion_SQL, $Consulta_Grafica_Ofertas);
              while ($ofe = odbc_fetch_array($Resultado_Consulta_Grafica_Ofertas)) {
                foreach ($ofe as $meses_ofe) {
                  echo $meses_ofe.",";
                } } ?> ">
        <input type="text" id="campos_ofertas_anterior2" value="
          <?php
              //Consulta de Ofertas de Venta
              $Consulta_Grafica_Ofertas ="SELECT sum(T1.[TotalSumSy])AS Total FROM OQUT T0  INNER JOIN QUT1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2014' AND T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Ofertas = odbc_exec($Conexion_SQL, $Consulta_Grafica_Ofertas);
              while ($ofe = odbc_fetch_array($Resultado_Consulta_Grafica_Ofertas)) {
                foreach ($ofe as $meses_ofe) {
                  echo $meses_ofe.",";
                } } ?> ">
        <input type="text" id="campos_ofertas_anterior3" value="
          <?php
              //Consulta de Ofertas de Venta
              $Consulta_Grafica_Ofertas ="SELECT sum(T1.[TotalSumSy])AS Total FROM OQUT T0  INNER JOIN QUT1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2013' AND T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Ofertas = odbc_exec($Conexion_SQL, $Consulta_Grafica_Ofertas);
              while ($ofe = odbc_fetch_array($Resultado_Consulta_Grafica_Ofertas)) {
                foreach ($ofe as $meses_ofe) {
                  echo $meses_ofe.",";
                } } ?> ">
        <!--/Inputs ocultos para la consulta de los valores de las graficas-->
        <input type="text" id="ofertas2016" value="<?php echo $ofertas; ?>">
        <input type="text" id="ofertas2015" value="<?php echo $ofertas2; ?>">
        <input type="text" id="ofertas2014" value="<?php echo $ofertas3; ?>">
        <input type="text" id="ofertas2013" value="<?php echo $ofertas4; ?>">
    </div>
  </div>
  <?php include('../assets/dashboard/registros_nuevos.php');?>                  <!--consultas para obtener los nuevos registros  -->
  <?php include('../assets/boton_rojo.php');?>                                  <!--Botón para consultar graficas de años distintos  -->
</div>
