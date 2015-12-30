<!--Sitio web desarrollado para AIMCO Corporation de México
    Desarrollado por Jesus Arciniega chubuntu.github.io
    Desarrollado en PHP - HTML5 - Javascript - CSS
    Utilizando Materialize http://materializecss.com/
    Derechos Reservados 2016-->
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
    <link rel="stylesheet" href="css/diseno.css" media="screen" title="no title" charset="utf-8">
    <!--/Stylesheets-->
  </head>
  <body>
    <!--Barra superior - Header-->
    <header class="z-depth-1">
        <ul>
          <li><a class="activo" href="#">AIMCO</a></li>
          <li><a href="http://aimex.sytes.net/" target="_blank">AIMEX</a></li>
          <li><a href="http://aimco-global.com/" target="_blank">Nosotros</a></li>
          <li><a href="http://www.aimco-solutions.com/acradyne.asp" target="_blank">AcraDyne</a></li>
          <li><a href="http://www.eagle-premier.com/" target="_blank">Eagle</a></li>
          <li><a href="http://www.aimco-solutions.com/online_catalog.asp" target="_blank">Catalogos</a></li>
          <li><a href="#">Servicios</a></li>
          <li><a href="#">Soporte</a></li>
          <li><a href="#">Contacto</a></li>
          <li><a href="#">Acceso</a></li>

        </ul>
    </header>

    <nav id="tiulo_pagina">
      <div class="nav-wrapper red darken-4">
        <img src="img/logo.png" id="logo">
          <a href="#" id="aimco">AIMCO Corporation de México</a>
      </div>
    </nav>
    <!--/Barra superior - Header-->
    <!--Slider-->
    <div class="slider">
      <img src="img/big.png" alt="" />
    </div>
    <!--/Slider-->
    <!--Tarjetas-->
    <div class="row">
      <div class="col s12 m4">
        <div class="card-panel  red darken-4 z-depth-3">
          <span class="white-text">AIMCO manufactures and markets the most comprehensive selection
             of industrial power tools used for assembly operations available in the industry.
              Our unwavering commitment to providing effective power tools assembly solutions,
              coupled with our outstanding customer service, has helped us achieve award-winning
              leadership status in the power tools manufacturing industry since 1970.
          </span>
        </div>
      </div>
      <div class="col s12 m8">
        <div class="card z-depth-1">
          <div class="card-image ">
            <img src="img/awea-logo.png" id="logo_tarjeta1">
          </div>
          <div class="card-content">
            <p>AIMCO is excited to announce our participation in this year's AWEA Windpower Conference in New Orleans, LA.
               Visit us in Booth 2349 to see the latest in cutting edge technology.
                AIMCO will be showcasing our wide range of high capacity, closed-loop, transducerized tools
                 and related equipment offering the most complete solutions for the critical bolting industries.
                  Find out what makes AcraDyne's HT Series unique and a far superior alternative to traditional
                  electric current control and hydraulic torque wrenches.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m4">
        <div class="card z-depth-2">
          <span class="card-title right red-text darken-4-text"> GEN IV Controller</span>
          <div class="card-image ">
            <img src="http://aimco-global.com/images/Aimco_Controller.png" id="logo_tarjeta1">
          </div>
          <div class="card-content">
            <p>
              In celebration of AcraDyne's 15th Anniversary, we have launched the new Gen IV Controller,
              developed to be the core of the modular AcraDyne DC system. The Gen IV is compatible with more than
              300 models of tools from .05 Nm to 8,100 Nm and will command any tool in the AcraDyne line with one cable..</p>
          </div>
        </div>
      </div>
      <div class="col s12 m8">
        <div class="card">
          <div class="card-content">
            <p>
              AIMCO has been providing Global Assembly Solutions for threaded fastening applications since 1970.
              Our global market focus centers on Automotive, Electronics, Aerospace, Energy Services and General Assembly Industries.
              If Productivity, Ergonomics, Reliability, and Quality are driving forces in your business, then let us be your value-added partner.
              We will offer solutions related to tightening strategies, tool selection/installation, joint failure analysis and audit trails,
              and combine them with operator training to maximize your production efficiencies</p>
          </div>
        </div>
      </div>
    </div>
  <!--/Tarjetas-->
  <!--Footer-->
        <footer class="page-footer grey lighten-1 ">
               <div class="container">
                 <div class="row">
                   <div class="col l6 s12">
                     <h5 class="gray-text">AIMCO de México</h5>
                     <p class="grey-text">Achieving Assembly Excellence</p>
                   </div>
                   <div class="col l4 offset-l2 s12">
                     <h5 class="gray-text">Teléfono</h5>
                     <ul>
                       <li><a class="gray-text">(614)-380-1010 </a></li>
                     </ul>
                   </div>
                 </div>
                 </div>
                 <div class="footer-copyright red darken-4">
                   <div class="container">
                   © 2016 AIMCO
                   <a class="grey-text text-lighten-4 right " href="#!">Contacto</a>
                   </div>
                 </div>
               </footer>
         <!--/Footer-->
  </body>
  <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <script type="text/javascript" src="js/master.js"></script>
</html>
