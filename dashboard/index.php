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
          <li><a class="activo" href="#">AIMCO</a></li>
          <li><a href="http://www.aimco-solutions.com/acradyne.asp" target="_blank" id="ocultar">AcraDyne</a></li>
          <li><a href="http://www.eagle-premier.com/" target="_blank" id="ocultar">Eagle</a></li>
          <li><a href="http://www.aimco-solutions.com/online_catalog.asp" target="_blank" id="ocultar">Catalogos</a></li>
          <li><a href="#" id="ocultar">Documentos</a></li>
          <li><a href="#" id="ocultar">Inventarios</a></li>
          <li><a href="../dashboard/directorio.php" id="ocultar">Directorio</a></li>
          <li><a href="#" id="ocultar">Comedor</a></li>
          <li><a href="#" id="ocultar">Soporte</a></li>
          <li><a><?php echo $_SESSION['Nombre_Usuario']; ?></a></li>
          <li><i class="material-icons sesion" data-activates='dropdown1'>supervisor_account</i></li>
          <!-- Dropdown Structure -->
          <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!">Información</a></li>
            <li class="divider"></li>
            <li><a href="../">Cerrar Sesión</a></li>
          </ul>
        </ul>
    </header>
    <nav id="tiulo_pagina">
      <div class="nav-wrapper red darken-4 ">
        <img src="../img/logo.png" id="logo">
          <a href="#" id="aimco">AIMCO Corporation de México</a>
      </div>
    </nav>
    <!--/Barra superior - Header-->
  <!--Gráfica-->
  <div class="row" <?php if($_SESSION['Rango'] != 3 ){ echo "style='display: none;'";} ?>>
    <div class="col s12 m9" id="ocultar">
      <div class="card-panel z-depth-3">
        <h5 id="Titulo_Grafica">Facturas de Clientes</h5>
          <canvas id="canvas" height="150" width="400"></canvas>
          <!--Inputs ocultos para la consulta de los valores de las graficas-->
          <!--El id usado en los input sirve para llevar la cadena al script JS y esconderlos usando styles/adicionales.css-->
          <input type="text" id="campos_facturacion" value="
            <?php
            //Consultas para información de la gráfica en index   --------------------------------------------------------------------------------------------
                //Consulta de Facturas de Clientes
                $Consulta_Grafica_Facturas ="SELECT sum(T1.[TotalSumSy])AS Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '".$_SESSION["Anual"]."' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." AND T1.[TargetType] <> 14 GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
                $Resultado_Consulta_Grafica = odbc_exec($Conexion_SQL, $Consulta_Grafica_Facturas);
                while ($fac = odbc_fetch_array($Resultado_Consulta_Grafica)) {
                  foreach ($fac as $meses) {
                    echo $meses.",";  //Se crea usando el foreach una cadena, la cual se divide en scripts/datosGrafica.js para llenar los campos de la gráfica
                  }
                }
            ?>
          ">
          <input type="text" id="campos_ordenes" value="
            <?php
                //Consulta de Ordenes de Venta
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
                //Consulta de Ofertas de Venta
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
            <p style="margin-top: -40px;" ><a href="../dashboard/back.php" class="red-text">Más Información</a></p>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!--/Gráfica-->
  <!--Rankings-->
  <div class="row" <?php if($_SESSION['Rango'] != 3 ){ echo "style='display: none;'";} ?>>
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
  <!--/Rankings-->
  <!-- Modal Contacto -->
  <div id="modal2" class="modal bottom-sheet">
    <div class="modal-content">
      <h5>Contacto AIMCO</h5>
      <p>Tel: (614) 380 1010</p>
    </div>
  </div>
  <!-- /Modal Contacto -->
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
  <script type="text/javascript" src="../js/master.js"></script>
</html>
