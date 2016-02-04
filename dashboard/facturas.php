<!--Sitio web desarrollado para AIMCO Corporation de México
    Desarrollado por Jesus Arciniega chubuntu.github.io
    chubuntu@live.com
    Desarrollado en PHP - HTML5 - Javascript - CSS
    Utilizando Materialize http://materializecss.com/
    Derechos Reservados 2016-->
<?php require('../assets/dashboard/header.php');?>                              <!--Header del sistema-->
<?php include('../php/consultas_vendedores.php');?>                             <!--Consultas para obtener datos de ventas -->
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/facturas.css" media="screen" title="no title" charset="utf-8"><!--Stylesheet Exclusivo de Facturas.php-->
</head>
  <body>
    <input type="text" id="valor_escondido" value="<?php echo $_SESSION["control_previa"]; ?>"> <!--Input que controla la visibilidad del modal que se carga al principio-->
    <?php include('../assets/dashboard/numeros_top.php');?>                     <!--Elementos con cantidades en parte superior-->
    <?php include("../assets/dashboard/facturas/grafica.php"); ?>               <!--Gráfica de facturas-->
    <?php include("../assets/dashboard/facturas/vista_previa.php"); ?>          <!--Modal de Vista Previa de facturas-->
    <?php include("../assets/loading.php"); ?>                                  <!--Modal de carga de vista previa-->
    <?php include("../assets/modales/contacto.php"); ?>                         <!--Modal de contacto-->
    <?php include("../assets/footer.php"); ?>                                   <!--Footer del sistema-->
  </body>
  <script src="../js/jquery-2.2.0.js"></script>                                 <!--JQUERY 2.2.0-->
  <script type="text/javascript" src="../js/materialize.min.js"></script>       <!--MaterializeCSS-->
  <script type="text/javascript" src="../js/Chart.min.js"></script>             <!--ChartJs-->
  <script type="text/javascript" src="../js/facturacion.js"></script>           <!--Script exclusivo de la información de facturación-->
</html>
