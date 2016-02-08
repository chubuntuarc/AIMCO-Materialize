<!--Facturas del día y busqueda-->
<div class="row">
 <div class="col m12 s12" id="recuadro_busqueda">
   <div class="card-panel">
     <h5>Facturas del día</h5>
     <form action="facturas.php" method="post">
         <input type="text" name="busqueda" id="busqueda" value="" placeholder="Buscar">
     </form>
     <table class="bordered highlight" id="directorio">
       <thead>
         <tr>
           <th>Documento</th>
           <th id="cliente_detalle_factura">Cliente</th>
           <th id="fecha_detalle_factura">Fecha</th>
           <th id="subtotal_detalle_factura">Subtotal</th>
           <th id="iva_detalle_factura">Iva</th>
           <th>Total</th>
           <th>PDF</th>
           <th>XML</th>
           <th></th>
         </tr>
       </thead>
       <tbody id="carga_facturas" >
         <?php
         $fecha_hoy = date("Y-m-d");
         $Consulta_Nuevas_Facturas ="SELECT T0.[DocNum],T0.[CardName],T0.[DocDate], sum(T1.[TotalSumSy]),sum(T1.[TotalSumSy]) * T1.[VatPrcnt] /100, sum(T1.[TotalSumSy]) * T1.[VatPrcnt] /100 + sum(T1.[TotalSumSy]) FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND T0.[DocDate] = ".$fecha_hoy." AND  T1.[TargetType] <> 14 GROUP BY T0.[DocNum],T0.[DocDate],T1.[VatPrcnt],T0.[CardName] order by T0.[DocNum] desc";
         $Resultado_Consulta_Facturas = odbc_exec($Conexion_SQL, $Consulta_Nuevas_Facturas);
         while (odbc_fetch_array($Resultado_Consulta_Facturas)) {
           echo "<tr class='fila_facturas' folio='".odbc_result($Resultado_Consulta_Facturas, 1)."' fecha='".odbc_result($Resultado_Consulta_Facturas, 3)."'>";
           echo "<td>".odbc_result($Resultado_Consulta_Facturas, 1)."</td>";
           echo "<td id='cliente_detallado'>".odbc_result($Resultado_Consulta_Facturas, 2)."</td>";
           echo "<td class='fecha_buscador' id='fecha_factura_busqueda'>".odbc_result($Resultado_Consulta_Facturas, 3)."</td>";
           echo "<td id='subtotal_detallado'>$".number_format(odbc_result($Resultado_Consulta_Facturas, 4),2)."</td>";
           echo "<td id='iva_detallado'>$".number_format(odbc_result($Resultado_Consulta_Facturas, 5),2)."</td>";
           echo "<td>$".number_format(odbc_result($Resultado_Consulta_Facturas, 6),2)."</td>";
           echo "<td><a href='facturas/".odbc_result($Resultado_Consulta_Facturas, 1).".pdf' target='blank'><img style='height:20px;' src='../img/pdf.png'></a></td>";
           echo "<td><a href='facturas/".odbc_result($Resultado_Consulta_Facturas, 1).".xml' target='blank'><img style='height:20px;' id='Icono_XML' src='../img/xml.ico'></a></td>";
           echo "<td class='vista_previa' data-tooltip='Vista Previa' id='vista_detallada' folio='".odbc_result($Resultado_Consulta_Facturas, 1)."'><a class='modal-trigger 'href='#modal5'><i class='material-icons'>visibility</i></a></td>";
           echo "</tr>";
           }
           ?>
           <?php
           if (isset($_POST['busqueda'])) {
             $Consulta_Nuevas_Facturas ="SELECT T0.[DocNum],T0.[CardName],T0.[DocDate], sum(T1.[TotalSumSy]),sum(T1.[TotalSumSy]) * T1.[VatPrcnt] /100, sum(T1.[TotalSumSy]) * T1.[VatPrcnt] /100 + sum(T1.[TotalSumSy]) FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND T0.[DocNum] Like '%".$_POST['busqueda']."%' AND  T1.[TargetType] <> 14 GROUP BY T0.[DocNum],T0.[DocDate],T1.[VatPrcnt],T0.[CardName] order by T0.[DocNum] desc";
             $Resultado_Consulta_Facturas = odbc_exec($Conexion_SQL, $Consulta_Nuevas_Facturas);
             while (odbc_fetch_array($Resultado_Consulta_Facturas)) {
               echo "<tr class='fila_facturas' folio='".odbc_result($Resultado_Consulta_Facturas, 1)."' fecha='".odbc_result($Resultado_Consulta_Facturas, 3)."'>";
               echo "<td>".odbc_result($Resultado_Consulta_Facturas, 1)."</td>";
               echo "<td id='cliente_detallado'>".odbc_result($Resultado_Consulta_Facturas, 2)."</td>";
               echo "<td class='fecha_buscador' id='fecha_factura_busqueda'>".odbc_result($Resultado_Consulta_Facturas, 3)."</td>";
               echo "<td id='subtotal_detallado'>$".number_format(odbc_result($Resultado_Consulta_Facturas, 4),2)."</td>";
               echo "<td id='iva_detallado'>$".number_format(odbc_result($Resultado_Consulta_Facturas, 5),2)."</td>";
               echo "<td>$".number_format(odbc_result($Resultado_Consulta_Facturas, 6),2)."</td>";
               echo "<td><a href='facturas/".odbc_result($Resultado_Consulta_Facturas, 1).".pdf' target='blank'><img style='height:20px;' src='../img/pdf.png'></a></td>";
               echo "<td><a href='facturas/".odbc_result($Resultado_Consulta_Facturas, 1).".xml' target='blank'><img style='height:20px;' id='Icono_XML' src='../img/xml.ico'></a></td>";
               echo "<td class='vista_previa' data-tooltip='Vista Previa' id='vista_detallada' folio='".odbc_result($Resultado_Consulta_Facturas, 1)."'><a class='modal-trigger 'href='#modal5'><i class='material-icons'>visibility</i></a></td>";
               echo "</tr>";
               }
           }
             ?>
       </tbody>
     </table>
   </div>
 </div>

</div>
