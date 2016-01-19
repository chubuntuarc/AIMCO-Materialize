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
        <ul id="navegacion_index">
          <li><a class="activo" href="#" id="aimex">AIMCO</a></li>
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
    <div class="parallax-container">
   <div class="parallax"><img src="img/slides/Slide1.jpg"></div>
 </div>
 <div class="section white" id="nosotros">
   <div class="row container">
     <h2 class="header">AIMCO</h2>
     <p class="grey-text text-darken-3 lighten-3">
       AIMCO fabrica y comercializa la selección más completa de herramientas eléctricas industriales
        utilizados para operaciones de montaje disponibles en la industria. Nuestro compromiso inquebrantable
         con el suministro de soluciones de montaje herramientas eléctricas eficaces, junto con nuestro servicio
         al cliente excepcional, ha ayudado a lograr galardonado posición de liderazgo en la industria de fabricación
         de herramientas eléctricas desde 1970.
     </p>
   </div>
 </div>
 <div class="parallax-container">
   <div class="parallax"><img src="img/slides/Slide2.jpg"></div>
 </div>
    <!-- Modal Contacto -->
    <div id="modal2" class="modal">
      <div class="modal-content">
        <h5>Contacto AIMCO</h5>
        <p>Tel: (614) 380 1010</p>
        <div id="ocultar">
          <h5>Visitanos</h5>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3499.199177616678!2d-106.13776538539408!3d28.713592987159366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ea421f917cbf23%3A0x4bcf5ec25750cf94!2sAIMCO+Corporation+de+Mexico+SA+de+CV!5e0!3m2!1ses-419!2smx!4v1452982282169" width="700" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
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
