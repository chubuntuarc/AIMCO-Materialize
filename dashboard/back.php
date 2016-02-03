<!--Sitio web desarrollado para AIMCO Corporation de México
    Desarrollado por Jesus Arciniega chubuntu.github.io
    Desarrollado en PHP - HTML5 - Javascript - CSS
    Utilizando Materialize http://materializecss.com/
    Derechos Reservados 2016-->
<?php require '../php/master.php';
require('../assets/dashboard/header.php');?>
<!DOCTYPE html>
<html>
  <body>
    <input type="text" id="valor_escondido" value="<?php echo $_SESSION["control_previa"]; ?>" style="display:none;">
    <!--Numeros Top-->
    <div class="row" <?php if($_SESSION['Rango'] != 3){ echo "style='display: none;'";} ?>>
      <div class="col m3 s12">
        <div class="card-panel z-depth-3">
            <h5 style="margin-top:-10px; "><i class="material-icons left teal lighten-1 white-text" style="font-size:230%; border-radius:5px;">attach_money</i><?php echo $facturas; ?></h5>
            <p style="margin-bottom:-20px; margin-left:30%;">Total de Facturas</p>
        </div>
      </div>
      <div class="col m3 s12">
        <div class="card-panel z-depth-3">
            <h5 style="margin-top:-10px; "><i class="material-icons left red lighten-1 white-text" style="font-size:230%; border-radius:5px;">attach_money</i><?php echo $ordenes; ?></h5>
            <p style="margin-bottom:-20px; margin-left:30%;">Total de Ordenes</p>
        </div>
      </div>
      <div class="col m3 s12">
        <div class="card-panel z-depth-3">
            <h5 style="margin-top:-10px; "><i class="material-icons left blue lighten-1 white-text" style="font-size:230%; border-radius:5px;">attach_money</i><?php echo $ofertas; ?></h5>
            <p style="margin-bottom:-20px; margin-left:30%;">Total de Ofertas</p>
        </div>
      </div>
      <div class="col m3 s12">
        <div class="card-panel z-depth-3">
          <h5 style="margin-top:-10px; "><i class="material-icons left purple lighten-1 white-text" style="font-size:230%; border-radius:5px;">attach_money</i><?php echo $back; ?></h5>
            <p style="margin-bottom:-20px; margin-left:30%;">Total Back Order</p>
        </div>
      </div>
    </div>
    <!--/Numeros Top-->
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
                    }
                  }
              ?>
            ">
            <input type="text" id="campos_back_order_anterior" value="
              <?php
                  //Consulta de Back Order
                  $Consulta_Grafica_Back_Order ="SELECT SUM( T1.[OpenQty] *  T1.[Price]  ) as Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2015' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." group by month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
                  $Resultado_Consulta_Grafica_Back_Order = odbc_exec($Conexion_SQL, $Consulta_Grafica_Back_Order);
                  while ($bac = odbc_fetch_array($Resultado_Consulta_Grafica_Back_Order)) {
                    foreach ($bac as $meses_bac) {
                      echo $meses_bac.",";
                    }
                  }
              ?>
            ">
            <input type="text" id="campos_back_order_anterior2" value="
              <?php
                  //Consulta de Back Order
                  $Consulta_Grafica_Back_Order ="SELECT SUM( T1.[OpenQty] *  T1.[Price]  ) as Total FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2014' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." group by month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
                  $Resultado_Consulta_Grafica_Back_Order = odbc_exec($Conexion_SQL, $Consulta_Grafica_Back_Order);
                  while ($bac = odbc_fetch_array($Resultado_Consulta_Grafica_Back_Order)) {
                    foreach ($bac as $meses_bac) {
                      echo $meses_bac.",";
                    }
                  }
              ?>
            ">
            <input type="text" id="campos_back_order_anterior3" value="
              <?php
                  //Consulta de Back Order
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
                <p style="margin-top: -40px;" ><a href="../dashboard/facturas.php" class="red-text">Más Información</a></p>
            </div>
            <input type="text" id="back2016" value="<?php echo $back; ?>">
            <input type="text" id="back2015" value="<?php echo $back2; ?>">
            <input type="text" id="back2014" value="<?php echo $back3; ?>">
            <input type="text" id="back2013" value="<?php echo $back4; ?>">
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
               <p style="margin-top: -40px;" ><a href="../dashboard/ordenes.php" class="red-text">Más Información</a></p>
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
               <p style="margin-top: -40px;" ><a href="../dashboard/ofertas.php" class="red-text">Más Información</a></p>
            </div>
          </li>
          <li>
            <div class="collapsible-header active" id="back_order"><i class="material-icons">whatshot</i>Back Order</div>
            <div class="collapsible-body" style="background-color: white;"><p id="total_back_order">Total: <?php echo $back; ?></p>
            <p style="margin-top: -40px;"><?php //Consulta de nuevas registros en back order al día
              $Consulta_Notificacion_Back ="SELECT count(T0.[DocNum]) as Total FROM ORDR T0  INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T0.[DocDate] = '".date('Y/m/d')."'";
              $Resultado_Notificacion_Back = odbc_exec($Conexion_SQL, $Consulta_Notificacion_Back);
              $Notificaciones_Back = odbc_result($Resultado_Notificacion_Back, "Total");
              $Registros_Back = $Notificaciones_Back;
              if ($Registros_Back > 1) {  echo $Registros_Back . " Registros Nuevos"; }
              elseif ($Registros_Facturacion == 1) {  echo $Registros_Facturacion . " Registro Nuevo"; }
              else { echo "Sin nuevos registros"; } ?></p>
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
    <!--Back Orders-->
    <div class="row">
      <div class="col m12 s12">
        <div class="card-panel">
          <h5>Listado Back Order</h5>
          <input type="text" name="busqueda" id="busqueda" value="" placeholder="Buscar">
          <table id="directorio">
            <thead>
              <tr>
                <th>Documento</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Subtotal</th>
                <th>Iva</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  //Consulta de Back Order
                  $Consulta_Nuevas_Ordenes ="SELECT T0.[DocNum], T0.[CardName],T0.[DocDate], sum(T1.[TotalSumSy]), sum(T1.[TotalSumSy]) * T1.[VatPrcnt] /100, sum(T1.[TotalSumSy]) +  sum(T1.[TotalSumSy]) * T1.[VatPrcnt]/100 FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND T1.[OpenQty] <> 0 GROUP BY T0.[DocNum],T0.[CardName], T1.[VatPrcnt], T0.[DocDate] order by T0.[DocDate] desc";
                  $Resultado_Consulta_Ordenes = odbc_exec($Conexion_SQL, $Consulta_Nuevas_Ordenes);
                  while (odbc_fetch_array($Resultado_Consulta_Ordenes)) {
                    echo "<tr class='fila_back' folio='".odbc_result($Resultado_Consulta_Ordenes, 1)."' fecha='".odbc_result($Resultado_Consulta_Ordenes, 3)."'>";
                    echo "<td class='text-left'>".odbc_result($Resultado_Consulta_Ordenes, 1)."</td>";
                    echo "<td class='text-left' id='Row'>".odbc_result($Resultado_Consulta_Ordenes, 2)."</td>";
                    echo "<td class='text-left' id='Row'>".odbc_result($Resultado_Consulta_Ordenes, 3)."</td>";
                    echo "<td class='text-left'>$".number_format(odbc_result($Resultado_Consulta_Ordenes, 4),2)."</td>";
                    echo "<td class='text-left' id='Row'>$".number_format(odbc_result($Resultado_Consulta_Ordenes, 5),2)."</td>";
                    echo "<td class='text-left'>$".number_format(odbc_result($Resultado_Consulta_Ordenes, 6),2)."</td>";
                    echo "<td class='vista_previa' data-tooltip='Vista Previa' folio='".odbc_result($Resultado_Consulta_Ordenes, 1)."'><a class='modal-trigger 'href='#modal5'><i class='material-icons'>visibility</i></a></td>";
                    echo "</tr>";
                    }
               ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/Back Orders-->
    <!-- Modal Loading -->
    <div id="modal5" class="modal white">
      <img src="../img/loader.gif" style="margin-left: 30%;"/>
      <h4 style="margin-left: 20%;">Cargando Vista Previa..</h4>
    </div>
    <!-- /Modal Loading -->
    <!-- Modal Contacto -->
    <div id="modal2" class="modal bottom-sheet">
      <div class="modal-content">
        <h5>Contacto AIMCO</h5>
        <p>Tel: (614) 380 1010</p>
        <h5>Sistemas</h5>
        <p>Ext: 1045</p>
      </div>
    </div>
    <!-- /Modal Contacto -->
    <!-- Modal Información -->
    <div id="modal3" class="modal bottom-sheet">
      <div class="modal-content">
        <h5>Información</h5>
        <p>AIMCO 2016</p>
      </div>
    </div>
    <!-- /Modal Información -->
    <!-- Modal Detalle -->
    <div id="modal4" class="modal">
    <div class="modal-content">
      <h5 id="titulo_detalle">Detalle Factura No. <?php echo $_SESSION['valor_detalle']; ?></h5>
      <div class="row">
        <?php
        $Consulta_Info_Detalle ="SELECT T0.[DocStatus], T0.[CardName], T1.[Currency],T0.[DocDate] FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] =".$_SESSION['Usuario_Actual']." AND T1.[OpenQty] <> 0 AND T0.[DocNum] = ".$_SESSION['valor_detalle']." GROUP BY T0.[DocNum] , T0.[DocStatus], T0.[CardName], T1.[Currency],T0.[DocDate]";
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
              $Consulta_Detalle_Factura ="SELECT T1.[ItemCode],T1.[Dscription],T1.[Quantity],T1.[Price],T1.[Quantity]*T1.[Price] FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] =".$_SESSION['Usuario_Actual']." AND T1.[OpenQty] <> 0 AND T0.[DocNum] = ".$_SESSION['valor_detalle']."";
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
              $Consulta_Totales_Detalle ="SELECT sum(T1.[TotalSumSy] ),sum(T1.[TotalSumSy] ) * T1.[VatPrcnt]/100,sum(T1.[TotalSumSy] ) + sum(T1.[TotalSumSy] ) * T1.[VatPrcnt]/100 FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] =".$_SESSION['Usuario_Actual']." AND T1.[OpenQty] <> 0 AND T0.[DocNum] = ".$_SESSION['valor_detalle']." GROUP BY T1.[VatPrcnt]";
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
              $Consulta_Totales_Detalle ="SELECT T0.[Comments] FROM ORDR T0  INNER JOIN RDR1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] =".$_SESSION['Usuario_Actual']." AND T1.[OpenQty] <> 0 AND T0.[DocNum] = ".$_SESSION['valor_detalle']." GROUP BY T0.[Comments]";
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
    <!-- /Modal Detalle -->
    <!--Footer-->
          <footer class="page-footer grey lighten-1 ">

                   <div class="footer-copyright red darken-4">
                     <div class="container">
                     © 2016 AIMCO Corporation de México
                     <a class="modal-trigger grey-text text-lighten-4 right " href="#modal2">Contacto</a>
                     </div>
                   </div>
                 </footer>
           <!--/Footer-->
  </body>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
  <script type="text/javascript" src="../js/busqueda.js"></script>
  <script type="text/javascript" src="../js/back.js"></script>
</html>
