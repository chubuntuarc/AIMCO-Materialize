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
  <div class="row" <?php if($_SESSION['Rango'] != 3){ echo "style='display: none;'";} ?>>
    <div class="col m9 s12">
        <div class="card-panel">
          <h5 id="Titulo_Grafica">Facturas de clientes</h5>
          <canvas id="canvas" name="canvas" height="150" width="400"></canvas>
        </div>
        <!--Inputs ocultos para la consulta de los valores de las graficas-->
        <!--El id usado en los input sirve para llevar la cadena al script JS y esconderlos usando styles/adicionales.css-->
        <input type="text" id="campos_facturacion" value="
          <?php
                $Consulta_Grafica_Facturas ="SELECT sum(T1.[TotalSumSy])AS Total FROM OINV T0  INNER JOIN INV1 T1 ON T0.DocEntry = T1.DocEntry INNER JOIN OSLP T2 ON T0.SlpCode = T2.SlpCode WHERE T0.[DocDate] >= '".$_SESSION["Anual"]."' AND  T2.[U_CODIGO_USA]  = ".$_SESSION['Usuario_Actual']." AND T1.[TargetType] <> 14 GROUP BY month(T0.[DocDate]) ORDER BY month(T0.[DocDate])";
              $Resultado_Consulta_Grafica = odbc_exec($Conexion_SQL, $Consulta_Grafica_Facturas);
              while ($fac = odbc_fetch_array($Resultado_Consulta_Grafica)) {
                foreach ($fac as $meses) {
                  echo $meses.",";
                }
              }
          ?>
        ">
        <input type="text" id="campos_ordenes" value="
          <?php
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
  <!--/Rankings-->
  <!-- Comedor -->
  <div class="row">
    <div class="col m4 s12" <?php if($_SESSION['Rango'] == 3){ echo "style='display: none;'";} ?>>
      <div class="card small">
            <div class="card-image">
              <img src="../img/avisos/excel.jpg" style="height:60%; width:100%;">
            </div>
            <div class="card-content">
              <h5>Curso Excel Avanzado</h5>
              <p>Viernes 29 de Enero de 2016.</p>
            </div>
          </div>
    </div>
    <div class="col m5 s12" <?php if($_SESSION['Rango'] == 3){ echo "style='display: none;'";} ?>>
      <div class="card small">
            <div class="card-image">
              <img src="../img/avisos/mantenimiento.png" style="height:60%; width:100%;">
            </div>
            <div class="card-content">
              <h5>Mantenimiento Equipo de Cómputo</h5>
              <p><?php
              switch ($_SESSION['Nombre_Usuario']) {
                case 'Jesus Govea':
                  echo "Sábado 30 de Enero de 2016";
                  break;
                  case 'Veronica Murillo':
                    echo "Sábado 30 de Enero de 2016";
                    break;
                    case 'Sebastian Gonzalez':
                      echo "Sábado 30 de Enero de 2016";
                      break;
                      case 'Leonardo Balderas':
                        echo "Sábado 30 de Enero de 2016";
                        break;
                        case 'Jorge Cuellar':
                          echo "Sábado 06 de Febrero de 2016";
                          break;
                          case 'Said Hernandez':
                            echo "Sábado 06 de Febrero de 2016";
                            break;
                            case 'Bibiana Poumian':
                              echo "Sábado 06 de Febrero de 2016";
                              break;
                              case 'Cesar Correa':
                                echo "Sábado 13 de Febrero de 2016";
                                break;
                                case 'Alejandro Montes':
                                  echo "Sábado 13 de Febrero de 2016";
                                  break;
                                  case 'Elizabeth Ortega':
                                    echo "Sábado 13 de Febrero de 2016";
                                    break;
                                    case 'Susana Ricarte':
                                      echo "Sábado 13 de Febrero de 2016";
                                      break;
                default:
                  # code...
                  break;
              }
               ?></p>
            </div>
          </div>
    </div>
    <div class="col m3 s12" <?php if($_SESSION['Rango'] < 4){ echo "style='display: none;'";} ?>>
      <div class="card small">
            <div class="card-image">
              <img src="../img/food.jpg"  height="300px" width="992px">
              <span class="card-title">Platillo del día</span>
            </div>
            <div class="card-content">
              <p><?php
              $dia = date('N');
                $sql = mysql_query("SELECT * FROM menu WHERE ID = $dia and Usuario = '".$_SESSION['Nombre_Usuario']."'", $_SESSION['conn']);
                while ($row = mysql_fetch_array($sql))
                {
                    echo $row['Platillo'];
                    echo "<br>" . $row['Complemento'];
                    echo "<br>" . $row['Postre'];
                }
               ?></p>
            </div>
          </div>
    </div>
  </div>
  <!-- /Comedor -->
  <!-- Entrada rápida de información -->
  <div class="row">
    <div class="col m4 s12">
      <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
      <i class="large material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="Registrar">mode_edit</i>
    </a>
    <ul>
      <li <?php if($_SESSION['Rango'] != 10){ echo "style='display: none;'";} ?>><a class="btn-floating tooltipped red" data-position="top" data-delay="50" data-tooltip="Servicio"><i class="material-icons">build</i></a></li>
      <li <?php if($_SESSION['Rango'] != 10){ echo "style='display: none;'";} ?>><a class="btn-floating tooltipped black" data-position="top" data-delay="50" data-tooltip="Inventario"><i class="material-icons">assignment</i></a></li>
      <li><a class="btn-floating tooltipped green" data-position="top" data-delay="50" data-tooltip="Contacto"><i class="material-icons">account_circle</i></a></li>
      <li><a class="btn-floating tooltipped blue" data-position="top" data-delay="50" data-tooltip="Recordatorio"><i class="material-icons">bookmark_border</i></a></li>
      <li><a class="btn-floating tooltipped yellow darken-3" data-position="top" data-delay="50" data-tooltip="Nota"><i class="material-icons">border_color</i></a></li>
      <li><a class="btn-floating tooltipped purple" data-position="top" data-delay="50" data-tooltip="Correo"><i class="material-icons">mail</i></a></li>
      <li><a class="btn-floating tooltipped cyan" data-position="top" data-delay="50" data-tooltip="Reporte"><i class="material-icons">mode_comment</i></a></li>
    </ul>
  </div>
    </div>
  </div>
  <!-- /Entrada rápida de información -->
  <!-- Modal Servicio Sistemas -->
  <!-- /Modal Servicio Sistemas -->
  <!-- Servicios Sistemas-->
  <div class="row" <?php if($_SESSION['Rango'] != 10){ echo "style='display: none;'";} ?>>
    <div class="col m4 s12">
      <div class="card-panel">
        <h5>Notas</h5>
        <table>
          <tbody>
            <tr>
              <td><p>
                <input type="checkbox" id="test5" />
                <label for="test5">Nota de ejemplo</label>
              </p></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col m8 s12">
      <div class="card-panel">
        <h5>Reportes de Usuarios</h5>
        <table>
          <thead>
            <tr>
              <th>Usuario</th>
              <th>Problema</th>
              <th>Notas</th>
              <th>Notas</th>
              <th>Completo</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Soporte IT</td>
              <td>Equipo Lento</td>
              <td>Esta lenta la maquina</td>
              <td><input type="text" name="name" placeholder="Descripción Solución"></td>
              <td><p><input type="checkbox" id="test5" /><label for="test5">Completo</label></p></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row" <?php if($_SESSION['Rango'] != 10){ echo "style='display: none;'";} ?>>
    <div class="col m4 s12">
      <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="../img/sistemas/tops_servicios.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Top Asistencia por Usuario<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Top Asistencia por Usuario<i class="material-icons right">close</i></span>
      <table>
        <thead>
          <th>#</th>
          <th>Nombre</th>
          <th>Servicios / Semana</th>
        </thead>
      </table>
    </div>
  </div>
    </div>
    <div class="col m4 s12">
      <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="../img/sistemas/blue.png">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Top Problemas Comunes<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Top Problemas Comunes<i class="material-icons right">close</i></span>
      <table>
        <thead>
          <th>#</th>
          <th>Conflicto</th>
          <th>Categoría</th>
          <th>Eventos / Mes</th>
        </thead>
      </table>
    </div>
  </div>
    </div>
    <div class="col m4 s12">
      <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="../img/sistemas/visitas.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Top Sitios Web<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Top Sitios Web<i class="material-icons right">close</i></span>
      <table>
        <thead>
          <th>#</th>
          <th>Sitio</th>
          <th>Visitas / Semana</th>
        </thead>
      </table>
    </div>
  </div>
    </div>
  </div>
  <div class="row" <?php if($_SESSION['Rango'] != 10){ echo "style='display: none;'";} ?>>
    <div class="col m6 s12">
      <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="../img/sistemas/stock.png">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Inventario Sistemas<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Inventario Sistemas<i class="material-icons right">close</i></span>
      <table>
        <thead>
          <th>ID</th>
          <th>Nombre</th>
          <th>Categoría</th>
          <th>Cantidad</th>
        </thead>
      </table>
    </div>
  </div>
    </div>
    <div class="col m6 s12">
      <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="../img/sistemas/code.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Desarrollo<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Desarrollo<i class="material-icons right">close</i></span>
      <table>
        <thead>
          <th>Repositorio</th>
          <th>Usuario</th>
          <th>Commit</th>
          <th>Fecha</th>
        </thead>
      </table>
    </div>
  </div>
    </div>
  </div>
  <!-- /Servicios Sistemas-->
  <!-- Nuevo -->
  <div class="row" <?php if($_SESSION['Rango'] == 10){ echo "style='display: none;'";} ?>>
    <div class="col m12 s12">
      <div class="card small">
            <div class="card-image">
              <img src="../img/ppt.jpg">
            </div>
            <div class="card-content">
              <h5>Curso Power Point</h5>
              <a href="../dashboard/power_point.php">Ver..</a>
            </div>
          </div>
    </div>
  </div>
  <!-- /Nuevo -->

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
