<!--Sitio web desarrollado para AIMCO Corporation de México
    Desarrollado por Jesus Arciniega chubuntu.github.io
    chubuntu@live.com
    Desarrollado en PHP - HTML5 - Javascript - CSS
    Utilizando Materialize http://materializecss.com/
    Derechos Reservados 2016-->
<?php require('../assets/dashboard/header.php');?>                              <!--Header del sistema-->
<!DOCTYPE html>
<html>
  <body>
    <!--Se secconaron todos los elementos del sistema para poder modificarlos y trabajarlos de forma ordenada-->
  <?php if($_SESSION['Rango'] == 3){ include('../php/consultas_vendedores.php');} ?><!--consultas para obtener datos de ventas -->
  <?php if($_SESSION['Rango'] == 3){ include('../assets/dashboard/numeros_top.php');} ?><!--Elementos con cantidades en parte superior-->
  <?php if($_SESSION['Rango'] == 3){ include('../assets/dashboard/grafica_index.php');} ?><!--Gráfica de Barras-->
  <?php if($_SESSION['Rango'] != 3){ include('../assets/dashboard/comedor.php');} ?><!--Información sobre la comida de la semana-->
  <?php if($_SESSION['Rango'] == 10){ include('../assets/dashboard/acceso_rapido.php');} ?><!--Accesos rapidos de información-->
  <?php if($_SESSION['Rango'] == 10){ include('../assets/dashboard/servicios_sistemas.php');} ?><!--Información Exclusiva sistemas-->
  <?php if($_SESSION['Rango'] != 10){ include('../assets/dashboard/novedades.php');} ?><!--Información Exclusiva sistemas-->
  <?php include("../assets/modales/contacto.php"); ?>                           <!--Modal de contacto-->
  <?php include("../assets/modales/informacion.php"); ?>                        <!--Modal de información-->
  <?php include("../assets/footer.php"); ?>                                     <!--Footer del sistema-->
  </body>
  <script src="../js/jquery-2.2.0.js"></script>                                 <!--JQUERY 2.2.0-->
  <script type="text/javascript" src="../js/materialize.min.js"></script>       <!--MaterializeCSS-->
  <script type="text/javascript" src="../js/Chart.min.js"></script>             <!--ChartJs-->
  <script type="text/javascript" src="../js/dashboard.js"></script>             <!--Javascript Exclusivo de esta vista-->
  <?php if($_SESSION['Rango'] == 3) echo "<script type='text/javascript' src='../js/graficas_dashboard.js'></script> ";?> <!--Script de las Graficas de ventas-->
  <script type="text/javascript">
    $(document).ready(function(){
      //Se reinicia la variable que controla la visualización de la pantalla modal de vista previa de facturas
       $.post("../php/detalle_factura.php",{"reset":0});
    });
  </script>
</html>
