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
    <!--/Meta-Tags-->
    <title>AIMCO Corporation de México</title>
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
          <li><a href="http://aimex.sytes.net/" target="_blank" id="ocultar">AIMEX</a></li>
          <li><a href="http://www.aimco-solutions.com/acradyne.asp" target="_blank" id="ocultar">AcraDyne</a></li>
          <li><a href="http://www.eagle-premier.com/" target="_blank" id="ocultar">Eagle</a></li>
          <li><a href="http://www.aimco-solutions.com/online_catalog.asp" target="_blank" id="ocultar">Catalogos</a></li>
          <li><a href="#" id="ocultar">Documentos</a></li>
          <li><a href="#" id="ocultar">Soporte</a></li>
          <li><a>Antonio Diaz</a></li>
          <li><i class="material-icons">supervisor_account</i></li>
        </ul>
    </header>
    <nav id="tiulo_pagina">
      <div class="nav-wrapper red darken-4 z-depth-3">
        <img src="../img/logo.png" id="logo">
          <a href="#" id="aimco">AIMCO Corporation de México</a>
      </div>
    </nav>
    <!--/Barra superior - Header-->
    <!--Tarjetas-->
    <div class="row">
        <div class="col s12 m3">
        <div class="card z-depth-2 green accent-4 white-text">
          <div class="card-content">
            <h5>Facturas de Clientes</h5>
            <p><?php echo $facturas; ?></p>
          </div>
        </div>
      </div>
      <div class="col s12 m3">
        <div class="card z-depth-2 deep-purple darken-2 white-text">
          <div class="card-content">
            <h5>Ordenes de Ventas</h5>
            <p><?php echo $ordenes ?></p>
          </div>
        </div>
      </div>
      <div class="col s12 m3">
        <div class="card z-depth-2 blue darken-2 white-text">
          <div class="card-content">
            <h5>Ofertas de Venta</h5>
            <p><?php echo $ofertas ?></p>
          </div>
        </div>
      </div>
      <div class="col s12 m3">
        <div class="card z-depth-2  purple lighten-2 white-text">
          <div class="card-content">
            <h5>Back Order</h5>
            <p><?php echo $back ?></p>
          </div>
        </div>
      </div>
    </div>
  <!--/Tarjetas-->
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
  <script type="text/javascript" src="../js/master.js"></script>
</html>
