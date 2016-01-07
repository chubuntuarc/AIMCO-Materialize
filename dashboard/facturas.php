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
          <li><a href="#" id="ocultar">Inventarios</a></li>
          <li><a href="../dashboard/directorio.php" id="ocultar">Directorio</a></li>
          <li><a href="#" id="ocultar" <?php if($_SESSION['Rango'] < 4){ echo "style='display: none;'";} ?>>Comedor</a></li>
          <li><a href="#" id="ocultar">Soporte</a></li>
          <li><a><?php echo $_SESSION['Nombre_Usuario']; ?></a></li>
          <li><i class="material-icons sesion" data-activates='dropdown2'>supervisor_account</i></li>
          <!-- Dropdown Structure -->
          <ul id='dropdown2' class='dropdown-content'>
            <li><a class="modal-trigger" href="#modal3">Información</a></li>
            <li class="divider"></li>
            <li><a href="../">Cerrar Sesión</a></li>
          </ul>
        </ul>
    </header>
    <nav id="tiulo_pagina">
      <div class="nav-wrapper grey darken-4 ">
        <img src="../img/logo.png" id="logo">
          <a href="../dashboard" id="aimco">AIMCO Corporation de México</a>
      </div>
    </nav>
    <!--/Barra superior - Header-->
    <!--Gráfica-->
    <div class="row">
      <div class="col s12 m9" id="ocultar">
        <div class="card-panel z-depth-3">
          <h5 id="Titulo_Grafica">Facturas de Clientes</h5>
            <canvas id="canvas" height="150" width="400"></canvas>
            <!--Inputs ocultos para la consulta de los valores de las graficas-->
            <!--El id usado en los input sirve para llevar la cadena al script JS y esconderlos usando styles/adicionales.css-->
            <input type="text" id="campos_facturacion" value="
              <?php
              //Consultas para información de la gráfica en index   --------------------------------------------------------------------------------------------
                  //Consulta de Facturas de Clientes 2016
                  $Consulta_Grafica_Facturas ="SELECT sum(T1.[TotalSumSy])AS Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2016' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." AND T1.[TargetType] <> 14 GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
                  $Resultado_Consulta_Grafica = odbc_exec($Conexion_SQL, $Consulta_Grafica_Facturas);
                  while ($fac = odbc_fetch_array($Resultado_Consulta_Grafica)) {
                    foreach ($fac as $meses) {
                      echo $meses.",";  //Se crea usando el foreach una cadena, la cual se divide en scripts/datosGrafica.js para llenar los campos de la gráfica
                    }
                  }
              ?>
            ">
            <input type="text" id="campos_facturacion_anterior" value="
              <?php
              //Consultas para información de la gráfica en index   --------------------------------------------------------------------------------------------
                  //Consulta de Facturas de Clientes 2015
                  $Consulta_Grafica_Facturas_Anterior ="SELECT sum(T1.[TotalSumSy])AS Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2015' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." AND T1.[TargetType] <> 14 GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
                  $Resultado_Consulta_Grafica_Anterior = odbc_exec($Conexion_SQL, $Consulta_Grafica_Facturas_Anterior);
                  while ($faca = odbc_fetch_array($Resultado_Consulta_Grafica_Anterior)) {
                    foreach ($faca as $mesesa) {
                      echo $mesesa.",";  //Se crea usando el foreach una cadena, la cual se divide en scripts/datosGrafica.js para llenar los campos de la gráfica
                    }
                  }
              ?>
            ">
            <input type="text" id="campos_facturacion_anterior2" value="
              <?php
              //Consultas para información de la gráfica en index   --------------------------------------------------------------------------------------------
                  //Consulta de Facturas de Clientes 2014
                  $Consulta_Grafica_Facturas_Anterior2 ="SELECT sum(T1.[TotalSumSy])AS Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2014' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." AND T1.[TargetType] <> 14 GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
                  $Resultado_Consulta_Grafica_Anterior2 = odbc_exec($Conexion_SQL, $Consulta_Grafica_Facturas_Anterior2);
                  while ($faca2 = odbc_fetch_array($Resultado_Consulta_Grafica_Anterior2)) {
                    foreach ($faca2 as $mesesa2) {
                      echo $mesesa2.",";  //Se crea usando el foreach una cadena, la cual se divide en scripts/datosGrafica.js para llenar los campos de la gráfica
                    }
                  }
              ?>
            ">
            <input type="text" id="campos_facturacion_anterior3" value="
              <?php
              //Consultas para información de la gráfica en index   --------------------------------------------------------------------------------------------
                  //Consulta de Facturas de Clientes 2013
                  $Consulta_Grafica_Facturas_Anterior3 ="SELECT sum(T1.[TotalSumSy])AS Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '2013' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." AND T1.[TargetType] <> 14 GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
                  $Resultado_Consulta_Grafica_Anterior3 = odbc_exec($Conexion_SQL, $Consulta_Grafica_Facturas_Anterior3);
                  while ($faca3 = odbc_fetch_array($Resultado_Consulta_Grafica_Anterior3)) {
                    foreach ($faca3 as $mesesa3) {
                      echo $mesesa3.",";  //Se crea usando el foreach una cadena, la cual se divide en scripts/datosGrafica.js para llenar los campos de la gráfica
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
            <div class="collapsible-body" style="background-color: white;" ><p id="total_facturas_clientes">Total: <?php echo $facturas; ?></p>
              <p style="margin-top: -40px;"><?php //Consulta de nuevas facturas al día
                $Consulta_Notificacion_Facturas ="SELECT count(T0.[DocNum]) as Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T0.[DocDate] = '".date("Y/m/d")."' AND  T1.[TargetType] <> 14 GROUP BY T0.[DocDate]";
                $Resultado_Notificacion_Factura = odbc_exec($Conexion_SQL, $Consulta_Notificacion_Facturas);
                $Notificaciones_Facturacion = odbc_result($Resultado_Notificacion_Factura, "Total");
                $Registros_Facturacion = $Notificaciones_Facturacion;
                if ($Registros_Facturacion > 1) {  echo $Registros_Facturacion . " Registros Nuevos"; }
                elseif ($Registros_Facturacion == 1) {  echo $Registros_Facturacion . " Registro Nuevo"; }
                else { echo "Sin nuevos registros"; }
                odbc_close($Conexion_SQL);  ?></p>
            </div>
            <input type="text" id="facturas2016" value="<?php echo $facturas; ?>">
            <input type="text" id="facturas2015" value="<?php echo $facturas2; ?>">
            <input type="text" id="facturas2014" value="<?php echo $facturas3; ?>">
            <input type="text" id="facturas2013" value="<?php echo $facturas4; ?>">
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
      <!-- Dropdown Trigger -->
        <a class='dropdown-button btn red darken-4' href='#' data-activates='dropdown1' id="boton"><?php echo date('Y'); ?></a>

        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content'>
          <li><a href="#!" id="year">2016</a></li>
          <li><a href="#!" id="year_anterior">2015</a></li>
          <li><a href="#!" id="year_anterior_2">2014</a></li>
          <li><a href="#!" id="year_anterior_3">2013</a></li>
        </ul>
          <!-- Dropdown Trigger -->
    </div>
    <!--/Gráfica-->
    <!--Facturas-->
    <div class="row">
      <div class="col m12 s12">
        <div class="card-panel">
          <h5>Listado de facturas</h5>
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
                <th>PDF</th>
                <th>XML</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
                  //Consulta de Facturas
                  $Consulta_Nuevas_Facturas ="SELECT T0.[DocNum],T0.[CardName],T0.[DocDate], sum(T1.[TotalSumSy]),sum(T1.[TotalSumSy]) * T1.[VatPrcnt] /100, sum(T1.[TotalSumSy]) * T1.[VatPrcnt] /100 + sum(T1.[TotalSumSy]) FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T2.[U_CODIGO_USA] = ".$_SESSION['Usuario_Actual']." AND  T1.[TargetType] <> 14 GROUP BY T0.[DocNum],T0.[DocDate],T1.[VatPrcnt],T0.[CardName] order by T0.[DocNum] desc";
                  $Resultado_Consulta_Facturas = odbc_exec($Conexion_SQL, $Consulta_Nuevas_Facturas);
                  while (odbc_fetch_array($Resultado_Consulta_Facturas)) {
                    echo "<tr id='num_doc'>";
                    echo "<td >".odbc_result($Resultado_Consulta_Facturas, 1)."</td>";
                    echo "<td>".odbc_result($Resultado_Consulta_Facturas, 2)."</td>";
                    echo "<td>".odbc_result($Resultado_Consulta_Facturas, 3)."</td>";
                    echo "<td>$".number_format(odbc_result($Resultado_Consulta_Facturas, 4),2)."</td>";
                    echo "<td>$".number_format(odbc_result($Resultado_Consulta_Facturas, 5),2)."</td>";
                    echo "<td>$".number_format(odbc_result($Resultado_Consulta_Facturas, 6),2)."</td>";
                    echo "<td><a href='facturas/".odbc_result($Resultado_Consulta_Facturas, 1).".pdf' target='blank'><img style='height:20px;' src='../img/pdf.png'></a></td>";
                    echo "<td><a href='facturas/".odbc_result($Resultado_Consulta_Facturas, 1).".xml' target='blank'><img style='height:20px;' id='Icono_XML' src='../img/xml.ico'></a></td>";
                    echo "<td><a href='#modal1' class='modal-trigger preview' data-tooltip='Vista Previa' data-position='left'><i class='material-icons ' >search</i></a></td>";
                    echo "</tr>";
                    }
               ?>
               <!-- Pantalla modal de vista previa -->
               <div id="modal1" class="modal">
                  <div class="modal-content">
                    <form class="col m9 s12">
                       <div class="row">
                         <h5>Vista Previa <script>
                         $('.preview').on('click', function() {
                           var bid, trid;
                           $('#directorio tr').click(function() {
                                trid = $(this).attr('id'); // table row ID
                                alert(trid);
                           });
                         </script></h5>
                       </div>
                       <div class="row">
                         <div class="input-field col s12">
                           <input id="email" type="email" class="validate">
                           <label for="email">Usuario</label>
                         </div>
                       </div>
                       <div class="row">
                         <div class="input-field col s12">
                           <input id="password" type="password" class="validate">
                           <label for="password">Contraseña</label>
                         </div>
                     </form>
                  </div>
                  <div class="modal-footer">
                    <a href="#" class="waves-effect waves-light btn red darken-4" id="cerrar_vista_previa">ok</a>
                  </div>
                </div>
               <!-- Pantalla modal de vista previa -->
            </tbody>
          </table>
        </div>

      </div>

    </div>
    <!--/Facturas-->
    <!-- Modal Contacto -->
    <div id="modal2" class="modal bottom-sheet">
      <div class="modal-content">
        <h5>Contacto AIMCO</h5>
        <p>Tel: (614) 380 1010</p>
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
  <script type="text/javascript" src="../js/facturacion.js"></script>
</html>
