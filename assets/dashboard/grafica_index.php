<!--Gráfica que muestra distintos datos sobre facturacion, ordenes, ofertas y back order de los vendedores-->
<div class="row" <?php if($_SESSION['Rango'] != 3){ echo "style='display: none;'";} ?>>
  <div class="col m9 s12" id="grafica_de_ventas">
      <div class="card-panel">
        <h5 id="Titulo_Grafica">Facturas de clientes</h5>
        <canvas id="canvas" name="canvas" height="150" width="400"></canvas>
      </div>
      <!--Inputs ocultos para la consulta de los valores de las graficas-->
      <!--El id usado en los input sirve para llevar la cadena al script JS y esconderlos usando styles/adicionales.css-->
      <input type="text" id="campos_facturacion" value="
        <?php
              $Consulta_Grafica_Facturas ="SELECT sum(T1.[TotalSumSy])AS Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '".$_SESSION["Anual"]."' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." AND T1.[TargetType] <> 14 GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
            $Resultado_Consulta_Grafica = odbc_exec($Conexion_SQL, $Consulta_Grafica_Facturas);
            while ($fac = odbc_fetch_array($Resultado_Consulta_Grafica)) {
              foreach ($fac as $meses) {
                echo $meses.",";
              }
            }
        ?>
      ">
      <input type="text" id="campos_ordenes" value="
        <?php
            $Consulta_Grafica_Ordenes ="SELECT sum(T1.[TotalSumSy])AS Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '".$_SESSION["Anual"]."' AND T0.[CANCELED] = 'N' AND   T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
            $Resultado_Consulta_Grafica_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Grafica_Ordenes);
            while ($ord = odbc_fetch_array($Resultado_Consulta_Grafica_Ordenes)) {
              foreach ($ord as $meses_ord) {  //Las variables en while y foreach de los input son solo para uso en ellos mismos.
                echo $meses_ord.",";
              }
            }
        ?>
      ">
      <input type="text" id="campos_ofertas" value="
        <?php
            $Consulta_Grafica_Ofertas ="SELECT sum(T1.[TotalSumSy])AS Total FROM OQUT T0  INNER JOIN QUT1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '".$_SESSION["Anual"]."' AND T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
            $Resultado_Consulta_Grafica_Ofertas = odbc_exec($Conexion_SQL, $Consulta_Grafica_Ofertas);
            while ($ofe = odbc_fetch_array($Resultado_Consulta_Grafica_Ofertas)) {
              foreach ($ofe as $meses_ofe) {
                echo $meses_ofe.",";
              }
            }
        ?>
      ">
      <input type="text" id="campos_back_order" value="
        <?php
            $Consulta_Grafica_Back_Order ="SELECT SUM( T1.[OpenQty] *  T1.[Price]  ) as Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2013' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." group by month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
            $Resultado_Consulta_Grafica_Back_Order = odbc_exec($Conexion_SQL, $Consulta_Grafica_Back_Order);
            while ($bac = odbc_fetch_array($Resultado_Consulta_Grafica_Back_Order)) {
              foreach ($bac as $meses_bac) {
                echo $meses_bac.",";
              }
            }
        ?>
      ">
      <!--/Inputs ocultos para la consulta de los valores de las graficas-->
  </div>
  <div class="col s12 m3">
        <ul class="collapsible" data-collapsible="accordion">
      <li>
        <div class="collapsible-header active" id="facturas_clientes"><i class="material-icons">attach_money</i>Facturas de Clientes</div>
        <div class="collapsible-body" style="background-color: white;"><p>Total: <?php echo $facturas; ?></p>
          <p style="margin-top: -40px;"><?php //Consulta de nuevas facturas al día
            $Consulta_Notificacion_Facturas ="SELECT count(T0.[DocNum]) as Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T0.[DocDate] = '".date("Y/m/d")."' AND  T1.[TargetType] <> 14 GROUP BY T0.[DocDate]";
            $Resultado_Notificacion_Factura = odbc_exec($Conexion_SQL, $Consulta_Notificacion_Facturas);
            $Notificaciones_Facturacion = odbc_result($Resultado_Notificacion_Factura, "Total");
            $Registros_Facturacion = $Notificaciones_Facturacion;
            if ($Registros_Facturacion > 1) {  echo $Registros_Facturacion . " Registros Nuevos"; }
            elseif ($Registros_Facturacion == 1) {  echo $Registros_Facturacion . " Registro Nuevo"; }
            else { echo "Sin nuevos registros"; }
            odbc_close($Conexion_SQL);  ?></p>
            <p style="margin-top: -40px;" ><a href="../dashboard/facturas.php" class="red-text">Más..</a></p>
        </div>
      </li>
      <li>
        <div class="collapsible-header" id="ordenes_venta"><i class="material-icons">star</i>Ordenes de Ventas</div>
        <div class="collapsible-body" style="background-color: white;"><p>Total: <?php echo $ordenes; ?></p>
          <p style="margin-top: -40px;"><?php //Consulta de nuevas ordenes al día
            $Consulta_Notificacion_Ordenes ="SELECT count(T0.[DocNum]) as Total FROM ORDR T0 INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T0.[DocDate] = '".date('Y/m/d')."' AND T0.[CANCELED] = 'N'";
            $Resultado_Notificacion_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Notificacion_Ordenes);
            $Notificaciones_Ordenes = odbc_result($Resultado_Notificacion_Ordenes, "Total");
            $Registros_Ordenes = $Notificaciones_Ordenes;
            if ($Registros_Ordenes > 1) {  echo $Registros_Ordenes . " Registros Nuevos"; }
            elseif ($Registros_Ordenes == 1) {  echo $Registros_Ordenes . " Registro Nuevo"; }
            else { echo "Sin nuevos registros"; }
           odbc_close($Conexion_SQL);  ?></p>
           <p style="margin-top: -40px;" ><a href="../dashboard/ordenes.php" class="red-text">Más..</a></p>
        </div>
      </li>
      <li>
        <div class="collapsible-header" id="ofertas_ventas"><i class="material-icons">star_half</i>Ofertas de Ventas</div>
        <div class="collapsible-body" style="background-color: white;"><p>Total: <?php echo $ofertas; ?></p>
          <p style="margin-top: -40px;"><?php //Consulta de nuevas ofertas al día
            $Consulta_Notificacion_Ofertas ="SELECT count(T0.[DocNum]) as Total FROM OQUT T0 INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] = '".date('Y/m/d')."' AND  T2.[U_CODIGO_USA] =".$_SESSION['Usuario_Actual']."";
            $Resultado_Notificacion_Ofertas = odbc_exec($Conexion_SQL, $Consulta_Notificacion_Ofertas);
            $Notificaciones_Ofertas = odbc_result($Resultado_Notificacion_Ofertas, "Total");
            $Registros_Ofertas = $Notificaciones_Ofertas;
            if ($Registros_Ofertas > 1) {  echo $Registros_Ofertas . " Registros Nuevos"; }
            elseif ($Registros_Facturacion == 1) {  echo $Registros_Facturacion . " Registro Nuevo"; }
            else { echo "Sin nuevos registros"; }
           odbc_close($Conexion_SQL); ?></p>
           <p style="margin-top: -40px;" ><a href="../dashboard/ofertas.php" class="red-text">Más..</a></p>
        </div>
      </li>
      <li>
        <div class="collapsible-header" id="back_order"><i class="material-icons">whatshot</i>Back Order</div>
        <div class="collapsible-body" style="background-color: white;"><p>Total: <?php echo $back; ?></p>
        <p style="margin-top: -40px;"><?php //Consulta de nuevas registros en back order al día
          $Consulta_Notificacion_Back ="SELECT count(T0.[DocNum]) as Total FROM ORDR T0  INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T0.[DocDate] = '".date('Y/m/d')."'";
          $Resultado_Notificacion_Back = odbc_exec($Conexion_SQL, $Consulta_Notificacion_Back);
          $Notificaciones_Back = odbc_result($Resultado_Notificacion_Back, "Total");
          $Registros_Back = $Notificaciones_Back;
          if ($Registros_Back > 1) {  echo $Registros_Back . " Registros Nuevos"; }
          elseif ($Registros_Facturacion == 1) {  echo $Registros_Facturacion . " Registro Nuevo"; }
          else { echo "Sin nuevos registros"; } ?></p>
          <p style="margin-top: -40px;" ><a href="../dashboard/back.php" class="red-text">Más..</a></p>
        </div>
      </li>
    </ul>
  </div>
</div>
