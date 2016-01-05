<!--Sitio web desarrollado para AIMCO Corporation de México
    Desarrollado por Jesus Arciniega chubuntu.github.io
    Desarrollado en PHP - HTML5 - Javascript - CSS
    Utilizando Materialize http://materializecss.com/
    Derechos Reservados 2016-->
<?php require '../php/master.php';?>
<!DOCTYPE html>
<html>
  <head>
    <!--Meta-Tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="autor" content="Jesus Arciniega">
    <meta name="description" content="Dashboard Corporativo de AIMCO Corporation de México" />
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <!--/Meta-Tags-->
    <title>AIMCO CORPORATION DE MÉXICO SA DE CV</title>
    <!--Stylesheets-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="../css/diseno.css" media="screen" title="no title" charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--/Stylesheets-->
  </head>
  <body>
    <!--Barra superior - Header-->
    <header class="z-depth-1">
        <ul>
          <li><a class="activo" href="../dashboard">AIMCO</a></li>
          <li><a href="http://www.aimco-solutions.com/acradyne.asp" target="_blank" id="ocultar">AcraDyne</a></li>
          <li><a href="http://www.eagle-premier.com/" target="_blank" id="ocultar">Eagle</a></li>
          <li><a href="http://www.aimco-solutions.com/online_catalog.asp" target="_blank" id="ocultar">Catalogos</a></li>
          <li><a href="#" id="ocultar">Documentos</a></li>
          <li><a href="#" id="ocultar">Inventarios</a></li>
          <li><a href="../dashboard/directorio.php" id="ocultar">Directorio</a></li>
          <li><a href="#" id="ocultar">Comedor</a></li>
          <li><a href="#" id="ocultar">Soporte</a></li>
          <li><a>Antonio Diaz</a></li>
          <li><i class="material-icons">supervisor_account</i></li>
        </ul>
    </header>
    <nav id="tiulo_pagina">
      <div class="nav-wrapper red darken-4 ">
        <img src="../img/logo.png" id="logo">
          <a href="../dashboard" id="aimco">AIMCO Corporation de México</a>
      </div>
    </nav>
    <!--/Barra superior - Header-->
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
            <div class="collapsible-body" style="background-color: white;"><p>Total: <?php echo $back; ?></p>
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
                    echo "<tr>";
                    echo "<td class='text-left'>".odbc_result($Resultado_Consulta_Ordenes, 1)."</td>";
                    echo "<td class='text-left' id='Row'>".odbc_result($Resultado_Consulta_Ordenes, 2)."</td>";
                    echo "<td class='text-left' id='Row'>".odbc_result($Resultado_Consulta_Ordenes, 3)."</td>";
                    echo "<td class='text-left'>$".number_format(odbc_result($Resultado_Consulta_Ordenes, 4),2)."</td>";
                    echo "<td class='text-left' id='Row'>$".number_format(odbc_result($Resultado_Consulta_Ordenes, 5),2)."</td>";
                    echo "<td class='text-left'>$".number_format(odbc_result($Resultado_Consulta_Ordenes, 6),2)."</td>";
                    echo "</tr>";
                    }
               ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/Back Orders-->
    <!--Footer-->
          <footer class="page-footer grey lighten-1 ">

                   <div class="footer-copyright red darken-4">
                     <div class="container">
                     © 2016 AIMCO Corporation de México
                     <a class="grey-text text-lighten-4 right " href="#!">Contacto</a>
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
