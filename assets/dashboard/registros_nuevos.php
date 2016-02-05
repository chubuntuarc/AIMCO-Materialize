<div class="col s12 m3">
      <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div <?php if ( basename($_SERVER['PHP_SELF']) == "facturas.php") {echo "class='collapsible-header active'"; } else {echo "class='collapsible-header'";} ?> id="facturas_clientes"><i class="material-icons">attach_money</i>Facturas de Clientes</div>
      <div class="collapsible-body" style="background-color: white;" ><p id="total_facturas_clientes">Total: <?php echo $facturas; ?></p>
        <p style="margin-top: -40px;"><?php                               //Consulta de nuevas facturas al día
          $Consulta_Notificacion_Facturas ="SELECT count(T0.[DocNum]) as Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T0.[DocDate] = '".date("Y/m/d")."' AND  T1.[TargetType] <> 14 GROUP BY T0.[DocDate]";
          $Resultado_Notificacion_Factura = odbc_exec($Conexion_SQL, $Consulta_Notificacion_Facturas);
          $Notificaciones_Facturacion = odbc_result($Resultado_Notificacion_Factura, "Total");
          $Registros_Facturacion = $Notificaciones_Facturacion;
          if ($Registros_Facturacion > 1) {  echo $Registros_Facturacion . " Registros Nuevos"; }
          elseif ($Registros_Facturacion == 1) {  echo $Registros_Facturacion . " Registro Nuevo"; }
          else { echo "Sin nuevos registros"; }
          odbc_close($Conexion_SQL);  ?></p>
          <p style="margin-top: -40px;" ><a href="../dashboard/facturas.php" class="red-text" id="reinicio_variable_modal">Más..</a></p>
      </div>
    </li>
    <li>
      <div <?php if ( basename($_SERVER['PHP_SELF']) == "ordenes.php") {echo "class='collapsible-header active'"; } else {echo "class='collapsible-header'";} ?> id="ordenes_venta"><i class="material-icons">star</i>Ordenes de Ventas</div>
      <div class="collapsible-body" style="background-color: white;"><p id="total_ordenes_clientes">Total: <?php echo $ordenes; ?></p>
        <p style="margin-top: -40px;"><?php                               //Consulta de nuevas ordenes al día
          $Consulta_Notificacion_Ordenes ="SELECT count(T0.[DocNum]) as Total FROM ORDR T0 INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T0.[DocDate] = '".date('Y/m/d')."' AND T0.[CANCELED] = 'N'";
          $Resultado_Notificacion_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Notificacion_Ordenes);
          $Notificaciones_Ordenes = odbc_result($Resultado_Notificacion_Ordenes, "Total");
          $Registros_Ordenes = $Notificaciones_Ordenes;
          if ($Registros_Ordenes > 1) {  echo $Registros_Ordenes . " Registros Nuevos"; }
          elseif ($Registros_Ordenes == 1) {  echo $Registros_Ordenes . " Registro Nuevo"; }
          else { echo "Sin nuevos registros"; }
         odbc_close($Conexion_SQL);  ?></p>
         <p style="margin-top: -40px;" ><a href="../dashboard/ordenes.php" class="red-text" id="reinicio_variable_modal">Más..</a></p>
      </div>
    </li>
    <li>
      <div <?php if ( basename($_SERVER['PHP_SELF']) == "ofertas.php") {echo "class='collapsible-header active'"; } else {echo "class='collapsible-header'";} ?> id="ofertas_ventas"><i class="material-icons">star_half</i>Ofertas de Ventas</div>
      <div class="collapsible-body" style="background-color: white;"><p id="total_ofertas_clientes">Total: <?php echo $ofertas; ?></p>
        <p style="margin-top: -40px;"><?php                               //Consulta de nuevas ofertas al día
          $Consulta_Notificacion_Ofertas ="SELECT count(T0.[DocNum]) as Total FROM OQUT T0 INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] = '".date('Y/m/d')."' AND  T2.[U_CODIGO_USA] =".$_SESSION['Usuario_Actual']."";
          $Resultado_Notificacion_Ofertas = odbc_exec($Conexion_SQL, $Consulta_Notificacion_Ofertas);
          $Notificaciones_Ofertas = odbc_result($Resultado_Notificacion_Ofertas, "Total");
          $Registros_Ofertas = $Notificaciones_Ofertas;
          if ($Registros_Ofertas > 1) {  echo $Registros_Ofertas . " Registros Nuevos"; }
          elseif ($Registros_Facturacion == 1) {  echo $Registros_Facturacion . " Registro Nuevo"; }
          else { echo "Sin nuevos registros"; }
         odbc_close($Conexion_SQL); ?></p>
         <p style="margin-top: -40px;" ><a href="../dashboard/ofertas.php" class="red-text" id="reinicio_variable_modal">Más..</a></p>
      </div>
    </li>
    <li>
      <div <?php if ( basename($_SERVER['PHP_SELF']) == "back.php") {echo "class='collapsible-header active'"; } else {echo "class='collapsible-header'";} ?> id="back_order"><i class="material-icons">whatshot</i>Back Order</div>
      <div class="collapsible-body" style="background-color: white;"><p id="total_back_order">Total: <?php echo $back; ?></p>
      <p style="margin-top: -40px;"><?php                                 //Consulta de nuevas registros en back order al día
        $Consulta_Notificacion_Back ="SELECT count(T0.[DocNum]) as Total FROM ORDR T0  INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T0.[DocDate] = '".date('Y/m/d')."'";
        $Resultado_Notificacion_Back = odbc_exec($Conexion_SQL, $Consulta_Notificacion_Back);
        $Notificaciones_Back = odbc_result($Resultado_Notificacion_Back, "Total");
        $Registros_Back = $Notificaciones_Back;
        if ($Registros_Back > 1) {  echo $Registros_Back . " Registros Nuevos"; }
        elseif ($Registros_Facturacion == 1) {  echo $Registros_Facturacion . " Registro Nuevo"; }
        else { echo "Sin nuevos registros"; } ?></p>
        <p style="margin-top: -40px;" ><a href="../dashboard/back.php" class="red-text" id="reinicio_variable_modal">Más..</a></p>
      </div>
    </li>
  </ul>
</div>
