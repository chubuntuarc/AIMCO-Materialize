<!--Rankings de ventas / Por el momento no se utiliza-->
<div class="row" style='display: none;'>
  <div class="col m6 s12">
    <div class="card-panel">
      <h5>Top 10 - Producto más vendido por cliente</h5>
      <table class="highlight">
        <thead>
        <tr>
            <th data-field="id">Cliente</th>
            <th data-field="name">Producto</th>
            <th data-field="price">Cantidad</th>
            <th data-field="price">Precio</th>
        </tr>
      </thead>
      <tbody>
        <?php
        /*Sección de Ranking de Ventas y Clientes   --------------------------------------------------------------------------------------------
          Consulta de Ventas*/
            $Consulta_Top_Ventas ="SELECT top 10 T1.[ItemCode] as Producto, T0.[CardName],  sum(T1.[Quantity]) as Cantidad,T1.[Price],  sum(T1.[Quantity])* T1.[Price] as Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '".$_SESSION["Anual"]."' AND  T2.[U_CODIGO_USA] = ".$_SESSION["Usuario_Actual"]." AND  T1.[TargetType] <> 14 GROUP BY T1.[ItemCode],T1.[Price],T0.[CardName] ORDER BY Cantidad desc";
            $Resultado_Consulta_Top_Ventas = odbc_exec($Conexion_SQL, $Consulta_Top_Ventas);
            while (odbc_fetch_array($Resultado_Consulta_Top_Ventas)) {
              echo "<tr>";
              echo "<td>".odbc_result($Resultado_Consulta_Top_Ventas, 2)."</td>";
              echo "<td>".odbc_result($Resultado_Consulta_Top_Ventas, 1)."</td>";
              echo "<td>".number_format(odbc_result($Resultado_Consulta_Top_Ventas, 3))."</td>";
              echo "<td>$".number_format(odbc_result($Resultado_Consulta_Top_Ventas, 4), 2)."</td>";
              echo "</tr>";
              }
         ?>
      </tbody>
      </table>
    </div>
  </div>
  <div class="col m6 s12">
    <div class="card-panel">
      <h5>Top 10 Clientes</h5>
      <table class="highlight">
        <thead>
        <tr>
            <th data-field="id">Cliente</th>
            <th data-field="name">Importe</th>
        </tr>
      </thead>
      <tbody>
        <?php
           /*Consulta de Clientes*/
           $Consulta_Top_Clientes ="SELECT TOP 10 T0.[CardName], SUM ( T1.[TotalSumSy] ) AS Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T1.[TargetType] <> 14 AND  T0.[DocDate] >='2015' AND T2.[U_CODIGO_USA] = 5113  GROUP BY T0.[CardName] ORDER BY Total DESC";
           $Resultado_Consulta_Top_Clientes = odbc_exec($Conexion_SQL, $Consulta_Top_Clientes);
           while (odbc_fetch_array($Resultado_Consulta_Top_Clientes)) {
             echo "<tr>";
             echo "<td class='text-left'>".odbc_result($Resultado_Consulta_Top_Clientes, 1)."</td>";
             echo "<td class='text-left'>$".number_format(odbc_result($Resultado_Consulta_Top_Clientes, 2))."</td>";
             echo "</tr>";
             }
        ?>
      </tbody>
      </table>
    </div>
  </div>
</div>
