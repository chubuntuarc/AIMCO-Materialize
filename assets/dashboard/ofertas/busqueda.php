<!--Ofertas-->
<div class="row">
  <div class="col m12 s12">
    <div class="card-panel">
      <h5>Listado de ofertas</h5>
      <form action="ofertas.php" method="post">
          <input type="text" name="busqueda" id="busqueda" value="" placeholder="Buscar">
      </form>
      <table id="directorio">
        <thead>
          <tr>
            <th>Documento</th>
            <th id="cliente_detalle_factura">Cliente</th>
            <th id="fecha_detalle_factura">Fecha</th>
            <th id="subtotal_detalle_factura">Subtotal</th>
            <th id="iva_detalle_factura">Iva</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $fecha_hoy = date("Y-m-d");
              $Consulta_Nuevas_Ordenes ="SELECT T0.[DocNum], T0.[CardName],T0.[DocDate], sum(T1.[TotalSumSy]), sum(T1.[TotalSumSy]) * T1.[VatPrcnt] /100, sum(T1.[TotalSumSy]) +   sum(T1.[TotalSumSy]) * T1.[VatPrcnt] /100 FROM OQUT T0  INNER JOIN QUT1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] =".$_SESSION['Usuario_Actual']." AND T0.[DocDate] = ".$fecha_hoy." GROUP BY T0.[DocNum], T0.[CardName], T1.[VatPrcnt], T0.[DocDate] order by T0.[DocDate] desc";
              $Resultado_Consulta_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Nuevas_Ordenes);
              while (odbc_fetch_array($Resultado_Consulta_Ordenes)) {
                echo "<tr class='fila_ofertas' folio='".odbc_result($Resultado_Consulta_Ordenes, 1)."' fecha='".odbc_result($Resultado_Consulta_Ordenes, 3)."'>";
                echo "<td class='text-left'>".odbc_result($Resultado_Consulta_Ordenes, 1)."</td>";
                echo "<td class='text-left' id='cliente_detallado'>".odbc_result($Resultado_Consulta_Ordenes, 2)."</td>";
                echo "<td class='text-left' id='fecha_factura_busqueda'>".odbc_result($Resultado_Consulta_Ordenes, 3)."</td>";
                echo "<td class='text-left' id='subtotal_detallado'>$".number_format(odbc_result($Resultado_Consulta_Ordenes, 4),2)."</td>";
                echo "<td class='text-left' id='iva_detallado'>$".number_format(odbc_result($Resultado_Consulta_Ordenes, 5),2)."</td>";
                echo "<td class='text-left'>$".number_format(odbc_result($Resultado_Consulta_Ordenes, 6),2)."</td>";
                echo "<td class='vista_previa' data-tooltip='Vista Previa' id='vista_detallada' folio='".odbc_result($Resultado_Consulta_Ordenes, 1)."'><a class='modal-trigger 'href='#modal5'><i class='material-icons'>visibility</i></a></td>";
                echo "</tr>";
                }
           ?>
           <?php
               if (isset($_POST['busqueda'])) {
               $Consulta_Nuevas_Ordenes ="SELECT T0.[DocNum], T0.[CardName],T0.[DocDate], sum(T1.[TotalSumSy]), sum(T1.[TotalSumSy]) * T1.[VatPrcnt] /100, sum(T1.[TotalSumSy]) +   sum(T1.[TotalSumSy]) * T1.[VatPrcnt] /100 FROM OQUT T0  INNER JOIN QUT1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] =".$_SESSION['Usuario_Actual']." AND T0.[DocNum] Like '%".$_POST['busqueda']."%' AND T0.[DocDate] Like '%2016%' GROUP BY T0.[DocNum], T0.[CardName], T1.[VatPrcnt], T0.[DocDate] order by T0.[DocDate] desc";
               $Resultado_Consulta_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Nuevas_Ordenes);
               while (odbc_fetch_array($Resultado_Consulta_Ordenes)) {
                 echo "<tr class='fila_ofertas' folio='".odbc_result($Resultado_Consulta_Ordenes, 1)."' fecha='".odbc_result($Resultado_Consulta_Ordenes, 3)."'>";
                 echo "<td class='text-left'>".odbc_result($Resultado_Consulta_Ordenes, 1)."</td>";
                 echo "<td class='text-left' id='cliente_detallado'>".odbc_result($Resultado_Consulta_Ordenes, 2)."</td>";
                 echo "<td class='text-left' id='fecha_factura_busqueda'>".odbc_result($Resultado_Consulta_Ordenes, 3)."</td>";
                 echo "<td class='text-left' id='subtotal_detallado'>$".number_format(odbc_result($Resultado_Consulta_Ordenes, 4),2)."</td>";
                 echo "<td class='text-left' id='iva_detallado'>$".number_format(odbc_result($Resultado_Consulta_Ordenes, 5),2)."</td>";
                 echo "<td class='text-left'>$".number_format(odbc_result($Resultado_Consulta_Ordenes, 6),2)."</td>";
                 echo "<td class='vista_previa' data-tooltip='Vista Previa' id='vista_detallada' folio='".odbc_result($Resultado_Consulta_Ordenes, 1)."'><a class='modal-trigger 'href='#modal5'><i class='material-icons'>visibility</i></a></td>";
                 echo "</tr>";
               }}
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--/Ofertas-->
