<!--Sitio web desarrollado para AIMCO Corporation de México
    Desarrollado por Jesus Arciniega chubuntu.github.io
    Desarrollado en PHP - HTML5 - Javascript - CSS
    Utilizando Materialize http://materializecss.com/
    Derechos Reservados 2016-->
<?php require 'php/master.php';?>
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
    <link rel="stylesheet" href="css/diseno.css" media="screen" title="no title" charset="utf-8">
    <!--/Stylesheets-->
  </head>
  <body>
    <!--Barra superior - Header-->
    <header class="z-depth-1">
        <ul>
          <li><a class="activo" href="#">AIMCO</a></li>
          <li><a href="http://aimco-global.com/" target="_blank">Nosotros</a></li>
          <li><a href="http://www.aimco-solutions.com/acradyne.asp" target="_blank" id="ocultar">AcraDyne</a></li>
          <li><a href="http://www.eagle-premier.com/" target="_blank" id="ocultar">Eagle</a></li>
          <li><a href="http://www.aimco-solutions.com/online_catalog.asp" target="_blank" id="ocultar">Catalogos</a></li>
          <li><a href="#" id="ocultar">Servicios</a></li>
          <li><a href="#modal2" class="modal-trigger">Contacto</a></li>
          <li><a href="#modal1" class="modal-trigger">Acceso</a></li>
          <!-- Pantalla modal de login -->
          <div id="modal1" class="modal">
             <div class="modal-content">
               <form class="col s12" method="post">
                  <div class="row">
                    <h4>Acceso</h4>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="email" name="email" type="text">
                      <label for="email">Usuario</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="password" name="password" type="password" class="validate">
                      <label for="password">Contraseña</label>
                    </div>
                    <button type="submit" id="login" name="login" class="waves-effect waves-light btn red darken-4">ok</button>
                </form>
                <?php
                if(isset($_POST['login'])){
                  $_SESSION['user'] = $_POST['email'];
                  $_SESSION['pass'] = $_POST['password'];
                  error_reporting(0);
                  $sql = "";
                  $sql = mysql_query("SELECT * FROM Usuarios where User = '".$_SESSION['user']."'", $_SESSION['conn']);
                  while ($row = mysql_fetch_array($sql))
                  {
                    $valor =  $row['Pass'];
                    $_SESSION['Nombre_Usuario'] =  $row['Name'];
                    $_SESSION['Usuario_Actual'] =  $row['Sap'];
                    $_SESSION['Rango'] = $row['UserType'];
                    $_SESSION['Comedor'] = $row['ResetMenu'];
                  }
                if ($valor == $_SESSION['pass']) {
                  header('Location: dashboard');
                }
              else {
                {
                  echo "<script>alert('Usuario y/o contraseña incorrectos');</script>";
                }
              }}
                			 ?>
             </div>
           </div>
          <!-- Pantalla modal de login -->
        </ul>
    </header>

    <nav id="tiulo_pagina">
      <div class="nav-wrapper red darken-4 z-depth-3">
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
      <div class="col s12 m4" id="ocultar">
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
    <!--Slider-->
    <div class="slider2  z-depth-1" id="big2">
      <img src="img/big2.png" alt=""/>
    </div>
    <!--/Slider-->
    <div class="row">
      <div class="col s12 m4">
        <div class="card z-depth-2">
          <div class="card-image ">
            <img src="img/geniv.png" id="logo_tarjeta2">
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
      <div class="col s12 m4">
        <div class="card">
          <div class="card-image ">
            <img src="http://aimco-global.com/images/aimco-argo.jpg" id="logo_tarjeta3">
          </div>
          <div class="card-content">
            <p>
              AIMCO is awarded AGCO's 2014 Indirect Supplier of the Year award - October 2014</p>
          </div>
        </div>
      </div>
      <div class="col s12 m4">
        <div class="card" id="ocultar">
          <div class="card-image ">
            <iframe width="415" height="235" src="https://www.youtube.com/embed/BkRv7OkWfXo" frameborder="0" allowfullscreen></iframe>
            </video>
          </div>
        </div>
      </div>
    </div>
  <!--/Tarjetas-->
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
  <script type="text/javascript" src="js/master.js"></script>
</html>
