<!-- Modal Detalle -->
<div id="modal4" class="modal">
<div class="modal-content">
  <h5 id="titulo_detalle">Detalle Factura No. <?php echo $_SESSION['valor_detalle']; ?></h5>
  <div class="row">
    <?php
    $Consulta_Info_Detalle ="SELECT T0.[DocStatus], T0.[CardName], T1.[Currency],T0.[DocDate] FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocNum]  = ".$_SESSION['valor_detalle']." AND  T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." GROUP BY T0.[DocStatus], T0.[CardName], T1.[Currency],T0.[DocDate]";
    $Resultado_Info_Detalle = odbc_exec($Conexion_SQL, $Consulta_Info_Detalle);
    while (odbc_fetch_array($Resultado_Info_Detalle)) {
      echo "<div class='col m12 s12'>";
      echo "<p'>Cliente: ".odbc_result($Resultado_Info_Detalle, 2)."</p>";
      echo "</div>";
      echo "</div>";
      echo "<div class='row'>";
      echo "<div class='col m4 s4'>";
      if (odbc_result($Resultado_Info_Detalle, 1) == 0) {
        $estado = "Abierto";
      }
      else {
        $estado = "Cerrado";
      }
      echo "<p id='respuesta' style='color:#2196F3;'>".$estado."</p>";
      echo "</div>";
      echo "<div class='col m4 s4'>";
      echo "<p>Moneda: ".odbc_result($Resultado_Info_Detalle, 3)."</p>";
      echo "</div>";
      echo "<div class='col m4 s4'>";
      echo "<p id='fecha_factura'>Fecha: ".odbc_result($Resultado_Info_Detalle, 4)."</p>";
      echo "</div>";
      echo "</div>";
      }
      ?>
  <div class="row">
    <div class="col m12 s12">
      <table>
        <thead>
          <th>Artículo</th>
          <th>Descripción</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Importe</th>
        </thead>
        <tbody>
          <?php
          $Consulta_Detalle_Factura ="SELECT T1.[ItemCode],T1.[Dscription],T1.[Quantity],T1.[Price],T1.[Quantity]*T1.[Price] FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocNum]  = ".$_SESSION['valor_detalle']." AND  T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." GROUP BY T1.[ItemCode],T1.[Dscription],T1.[Quantity],T1.[Price]";
          $Resultado_Detalle_Factura = odbc_exec($Conexion_SQL, $Consulta_Detalle_Factura);
          while (odbc_fetch_array($Resultado_Detalle_Factura)) {
            echo "<tr>";
            echo "<td>".odbc_result($Resultado_Detalle_Factura, 1)."</td>";
            echo "<td>".odbc_result($Resultado_Detalle_Factura, 2)."</td>";
            echo "<td>".number_format(odbc_result($Resultado_Detalle_Factura, 3),2)."</td>";
            echo "<td>$".number_format(odbc_result($Resultado_Detalle_Factura, 4),2)."</td>";
            echo "<td>$".number_format(odbc_result($Resultado_Detalle_Factura, 5),2)."</td>";

            echo "</tr>";
            }
            ?>
        </tbody>
      </table>
      <br><br>
      <table>
        <thead>
          <th>SubTotal</th>
          <th>IVA</th>
          <th>Total</th>
        </thead>
        <tbody>
          <?php
          $Consulta_Totales_Detalle ="SELECT sum(T1.[TotalSumSy] ),sum(T1.[TotalSumSy] ) * T1.[VatPrcnt]/100,sum(T1.[TotalSumSy] ) + sum(T1.[TotalSumSy] ) * T1.[VatPrcnt]/100 FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocNum]  = ".$_SESSION['valor_detalle']." AND  T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." GROUP BY T1.[VatPrcnt]";
          $Resultado_Totales_Detalle = odbc_exec($Conexion_SQL, $Consulta_Totales_Detalle);
          while (odbc_fetch_array($Resultado_Totales_Detalle)) {
            echo "<tr>";
            echo "<td>$".number_format(odbc_result($Resultado_Totales_Detalle, 1),2)."</td>";
            echo "<td>$".number_format(odbc_result($Resultado_Totales_Detalle, 2),2)."</td>";
            echo "<td>$".number_format(odbc_result($Resultado_Totales_Detalle, 3),2)."</td>";
            echo "</tr>";
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col m12 s12">
      <table>
        <thead>
          <th>Comentarios</th>
        </thead>
        <tbody>
          <?php
          $Consulta_Totales_Detalle ="SELECT T0.[Comments] FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocNum]  = ".$_SESSION['valor_detalle']." AND  T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." GROUP BY T0.[Comments]";
          $Resultado_Totales_Detalle = odbc_exec($Conexion_SQL, $Consulta_Totales_Detalle);
          while (odbc_fetch_array($Resultado_Totales_Detalle)) {
            echo "<tr>";
            echo "<td>".odbc_result($Resultado_Totales_Detalle, 1)."</td>";
            echo "</tr>";
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
