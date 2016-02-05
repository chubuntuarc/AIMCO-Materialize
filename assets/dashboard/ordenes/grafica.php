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
                }
              }
          ?>
        ">
        <input type="text" id="campos_ordenes_anterior" value="
          <?php
              //Consulta de Ordenes de Venta 2015
              $Consulta_Grafica_Ordenes ="SELECT sum(T1.[TotalSumSy])AS Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2015' AND T0.[CANCELED] = 'N' AND   T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Grafica_Ordenes);
              while ($ord = odbc_fetch_array($Resultado_Consulta_Grafica_Ordenes)) {
                foreach ($ord as $meses_ord) {  //Las variables en while y foreach de los input son solo para uso en ellos mismos.
                  echo $meses_ord.",";
                }
              }
          ?>
        ">
        <input type="text" id="campos_ordenes_anterior2" value="
          <?php
              //Consulta de Ordenes de Venta 2014
              $Consulta_Grafica_Ordenes ="SELECT sum(T1.[TotalSumSy])AS Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2014' AND T0.[CANCELED] = 'N' AND   T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Grafica_Ordenes);
              while ($ord = odbc_fetch_array($Resultado_Consulta_Grafica_Ordenes)) {
                foreach ($ord as $meses_ord) {  //Las variables en while y foreach de los input son solo para uso en ellos mismos.
                  echo $meses_ord.",";
                }
              }
          ?>
        ">
        <input type="text" id="campos_ordenes_anterior3" value="
          <?php
              //Consulta de Ordenes de Venta 2013
              $Consulta_Grafica_Ordenes ="SELECT sum(T1.[TotalSumSy])AS Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2013' AND T0.[CANCELED] = 'N' AND   T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Grafica_Ordenes);
              while ($ord = odbc_fetch_array($Resultado_Consulta_Grafica_Ordenes)) {
                foreach ($ord as $meses_ord) {  //Las variables en while y foreach de los input son solo para uso en ellos mismos.
                  echo $meses_ord.",";
                }
              }
          ?>
        ">
        <!--/Inputs ocultos para la consulta de los valores de las graficas-->
    </div>
  </div>
  <div class="col s12 m3">
        <ul class="collapsible" data-collapsible="accordion">
      <li>
        <div class="collapsible-header" id="facturas_clientes"><i class="material-icons">attach_money</i>Facturas de Clientes</div>
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
            <p style="margin-top: -40px;" ><a href="../dashboard/facturas.php" class="red-text" id="reinicio_variable_modal">Más Información</a></p>
        </div>
        <input type="text" id="ordenes2016" value="<?php echo $ordenes; ?>">
        <input type="text" id="ordenes2015" value="<?php echo $ordenes2; ?>">
        <input type="text" id="ordenes2014" value="<?php echo $ordenes3; ?>">
        <input type="text" id="ordenes2013" value="<?php echo $ordenes4; ?>">
      </li>
      <li>
        <div class="collapsible-header active" id="ordenes_venta"><i class="material-icons">star</i>Ordenes de Ventas</div>
        <div class="collapsible-body" style="background-color: white;"><p id="total_ordenes_clientes">Total: <?php echo $ordenes; ?></p>
          <p style="margin-top: -40px;"><?php //Consulta de nuevas ordenes al día
            $Consulta_Notificacion_Ordenes ="SELECT count(T0.[DocNum]) as Total FROM ORDR T0 INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T0.[DocDate] = '".date('Y/m/d')."' AND T0.[CANCELED] = 'N'";
            $Resultado_Notificacion_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Notificacion_Ordenes);
            $Notificaciones_Ordenes = odbc_result($Resultado_Notificacion_Ordenes, "Total");
            $Registros_Ordenes = $Notificaciones_Ordenes;
            if ($Registros_Ordenes > 1) {  echo $Registros_Ordenes . " Registros Nuevos"; }
            elseif ($Registros_Ordenes == 1) {  echo $Registros_Ordenes . " Registro Nuevo"; }
            else { echo "Sin nuevos registros"; }
           odbc_close($Conexion_SQL);  ?></p>
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
           <p style="margin-top: -40px;" ><a href="../dashboard/ofertas.php" class="red-text" id="reinicio_variable_modal">Más Información</a></p>
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
          <p style="margin-top: -40px;" ><a href="../dashboard/back.php" class="red-text" id="reinicio_variable_modal">Más Información</a></p>
        </div>
      </li>
    </ul>
  </div>
  <!-- Dropdown Trigger -->
    <a class='dropdown-button btn red darken-4' href='#' data-activates='dropdown2' id="boton"><?php echo date('Y'); ?></a>

    <!-- Dropdown Structure -->
    <ul id='dropdown2' class='dropdown-content'>
      <li><a href="#!" id="year">2016</a></li>
      <li><a href="#!" id="year_anterior">2015</a></li>
      <li><a href="#!" id="year_anterior_2">2014</a></li>
      <li><a href="#!" id="year_anterior_3">2013</a></li>
    </ul>
      <!-- Dropdown Trigger -->
</div>
<!--/Gráfica-->
