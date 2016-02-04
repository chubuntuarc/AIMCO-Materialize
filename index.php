<!--Sitio web desarrollado para AIMCO Corporation de México
    Desarrollado por Jesus Arciniega chubuntu.github.io
    chubuntu@live.com
    Desarrollado en PHP - HTML5 - Javascript - CSS
    Utilizando Materialize http://materializecss.com/
    Derechos Reservados 2016-->
<?php require 'php/sesion.php';?><!--Sesión del sistema-->
<!DOCTYPE html>
<html>
  <head>
    <!--Meta-Tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="autor" content="Jesus Arciniega">
    <meta name="description" content="Dashboard Corporativo de AIMCO Corporation de México" />
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <!--/Meta-Tags-->
    <title>AIMCO CORPORATION DE MÉXICO SA DE CV</title>
    <!--Stylesheets-->
    <link rel="stylesheet" href="css/materialize.min.css" media="screen" title="no title" charset="utf-8"><!--Stylesheet del framework MaterializeCSS-->
    <link rel="stylesheet" href="css/index.css" media="screen" title="no title" charset="utf-8"><!--Stylesheet exclusivo del index-->
    <!--/Stylesheets-->
  </head>
  <body>
    <!-- ********************************************************************** Barra superior - Header-->
    <header class="z-depth-1">
        <ul id="navegacion_index">
          <li><a class="activo" href="#" id="aimex">AIMCO</a></li>              <!--Link Nulo-->
          <li><a href="#modal2" class="modal-trigger">Contacto</a></li>         <!--Link que muestra el modal de datos de contacto-->
          <li><a href="#modal1" class="modal-trigger">Acceso</a></li>           <!--Link que muestra el modal para ingresar los datos de acceso-->
          <!-- **************************************************************** Pantalla modal de login -->
          <div id="modal1" class="modal">
             <div class="modal-content">
               <form class="col s12" method="post">
                  <div class="row" id="acceso_sistema"><h4>Acceso</h4></div>
                  <div class="row" id="formulario_user">
                    <div class="input-field col s12">
                      <input id="email" name="email" type="text">
                      <label for="email">Usuario</label>
                    </div>
                  </div>
                  <div class="row" id="formulario_pass">
                    <div class="input-field col s12">
                      <input id="password" name="password" type="password" class="validate">
                      <label for="password">Contraseña</label>
                    </div>
                    <button type="submit" id="login" name="login" class="waves-effect waves-light btn red darken-4">ok</button> <!--Botón submit para acceso al sistema-->
                </form>  <?php  if(isset($_POST['login'])){                                                                               //Sección de código PHP para consultar usuario
                            $_SESSION['user'] = $_POST['email'];                                                                          //y contraseña del sistema.
                            $_SESSION['pass'] = $_POST['password'];
                            $sql = mysql_query("SELECT * FROM Usuarios where User = '".$_SESSION['user']."'", $_SESSION['conn']);
                            while ($row = mysql_fetch_array($sql)) {
                              $valor =  $row['Pass'];
                              $_SESSION['Nombre_Usuario'] =  $row['Name'];
                              $_SESSION['Usuario_Actual'] =  $row['Sap'];
                              $_SESSION['Rango'] = $row['UserType'];
                              $_SESSION['Comedor'] = $row['ResetMenu'];
                            }
                          if ($valor == $_SESSION['pass']) header('Location: dashboard');
                        else echo "<script>alert('Usuario y/o contraseña incorrectos');</script>";  }?>                                     <!--Termina sección PHP de login-->
             </div>
           </div>
           </div>
          <!-- **************************************************************** /Pantalla modal de login -->
        </ul>
    </header>
    <nav id="tiulo_pagina">
      <div class="nav-wrapper red darken-4 z-depth-3">
        <img src="img/logo.png" id="logo">
          <a href="#" id="aimco">AIMCO Corporation de México</a>
      </div>
    </nav>
    <!-- ********************************************************************** /Barra superior - Header-->
    <div class="parallax-container">
   <div class="parallax"><img src="img/slides/Slide1.jpg"></div>                <!--Slide Parallax 1-->
 </div>
 <div class="section white" id="nosotros">                                      <!--Sección Parallax de Información sobre AIMCO-->
   <div class="row container">
     <h2 class="header">AIMCO</h2>
     <p class="grey-text text-darken-3 lighten-3">
       AIMCO fabrica y comercializa la selección más completa de herramientas
       eléctricas industriales utilizados para operaciones de montaje disponibles
       en la industria. Nuestro compromiso inquebrantable con el suministro de
       soluciones de montaje herramientas eléctricas eficaces, junto con nuestro
       servicio al cliente excepcional, ha ayudado a lograr galardonado posición
       de liderazgo en la industria de fabricación de herramientas eléctricas
       desde 1970.
     </p>
   </div>
 </div>                                                                         <!--/Sección Parallax de Información sobre AIMCO-->
 <div class="parallax-container" id="bigimg2">
   <div class="parallax"><img src="img/slides/Slide2.jpg"></div>                <!--Slide Parallax 2-->
 </div>
    <!-- ********************************************************************** Modal Contacto -->
    <div id="modal2" class="modal">
      <div class="modal-content">
        <h5>Contacto AIMCO</h5>
        <p>Tel: (614) 380 1010</p>
        <div id="visita">
          <h5>Visitanos</h5>                                                    <!--Se incluye un plugin de GoogleMaps para mostrar la ubicación de AIMCO-->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34
          99.199177616678!2d-106.13776538539408!3d28.713592987159366!2m3!1f0!2f0
          !3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ea421f917cbf23%3A0x4bcf5ec2
          5750cf94!2sAIMCO+Corporation+de+Mexico+SA+de+CV!5e0!3m2!1ses-419!2smx!
          4v1452982282169" width="700" height="250" frameborder="0"
          style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <!-- ********************************************************************** /Modal Contacto -->
    <!-- ********************************************************************** Footer-->
          <footer class="page-footer grey lighten-1 ">
             <div class="footer-copyright red darken-4">
               <div class="container">
               © 2016 AIMCO Corporation de México
               <a class="modal-trigger grey-text text-lighten-4 right " href="#modal2">Contacto</a>
               </div>
             </div>
         </footer>
     <!-- ********************************************************************* /Footer-->
    </body>
    <script src="js/jquery-2.2.0.js"></script>                                  <!--JQUERY 2.2.0-->
    <script type="text/javascript" src="js/materialize.min.js"></script>        <!--MaterializeCSS-->
    <script type="text/javascript">                                             //Script sencillo con las funciones necesarias en esta pantalla
    $(document).ready(function(){
      $('.parallax').parallax();
      $('.modal-trigger').leanModal();
    });
    </script>                                                                   <!--Termina Script JS-->
</html>
