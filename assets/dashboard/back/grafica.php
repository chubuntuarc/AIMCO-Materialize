<!--Gráfica-->
<div class="row">
  <div class="col s12 m9" id="ocultar">
    <div class="card-panel z-depth-3">
      <h5 id="Titulo_Grafica">Back Order</h5>
        <canvas id="canvas" height="150" width="400"></canvas>
        <!--Inputs ocultos para la consulta de los valores de las graficas-->
        <!--El id usado en los input sirve para llevar la cadena al script JS y esconderlos usando styles/adicionales.css-->
        <input type="text" id="campos_back_order" value="
          <?php
              //Consulta de Back Order
              $Consulta_Grafica_Back_Order ="SELECT SUM( T1.[OpenQty] *  T1.[Price]  ) as Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2016' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." group by month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Back_Order = odbc_exec($Conexion_SQL, $Consulta_Grafica_Back_Order);
              while ($bac = odbc_fetch_array($Resultado_Consulta_Grafica_Back_Order)) {
                foreach ($bac as $meses_bac) {
                  echo $meses_bac.",";
                } } ?> ">
        <input type="text" id="campos_back_order_anterior" value="
          <?php
              //Consulta de Back Order
              $Consulta_Grafica_Back_Order ="SELECT SUM( T1.[OpenQty] *  T1.[Price]  ) as Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2015' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." group by month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Back_Order = odbc_exec($Conexion_SQL, $Consulta_Grafica_Back_Order);
              while ($bac = odbc_fetch_array($Resultado_Consulta_Grafica_Back_Order)) {
                foreach ($bac as $meses_bac) {
                  echo $meses_bac.",";
                } } ?> ">
        <input type="text" id="campos_back_order_anterior2" value="
          <?php
              //Consulta de Back Order
              $Consulta_Grafica_Back_Order ="SELECT SUM( T1.[OpenQty] *  T1.[Price]  ) as Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2014' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." group by month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Back_Order = odbc_exec($Conexion_SQL, $Consulta_Grafica_Back_Order);
              while ($bac = odbc_fetch_array($Resultado_Consulta_Grafica_Back_Order)) {
                foreach ($bac as $meses_bac) {
                  echo $meses_bac.",";
                } } ?> ">
        <input type="text" id="campos_back_order_anterior3" value="
          <?php
              //Consulta de Back Order
              $Consulta_Grafica_Back_Order ="SELECT SUM( T1.[OpenQty] *  T1.[Price]  ) as Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2013' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." group by month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Back_Order = odbc_exec($Conexion_SQL, $Consulta_Grafica_Back_Order);
              while ($bac = odbc_fetch_array($Resultado_Consulta_Grafica_Back_Order)) {
                foreach ($bac as $meses_bac) {
                  echo $meses_bac.",";
                } } ?> ">
        <!--/Inputs ocultos para la consulta de los valores de las graficas-->
        <input type="text" id="back2016" value="<?php echo $back; ?>">
        <input type="text" id="back2015" value="<?php echo $back2; ?>">
        <input type="text" id="back2014" value="<?php echo $back3; ?>">
        <input type="text" id="back2013" value="<?php echo $back4; ?>">
    </div>
  </div>
  <?php include('../assets/dashboard/registros_nuevos.php');?>              <!--consultas para obtener los nuevos registros  -->
  <?php include('../assets/boton_rojo.php');?>                              <!--Botón para consultar graficas de años distintos  -->
</div>   
