<!--Sitio web desarrollado para AIMCO Corporation de México
    Desarrollado por Jesus Arciniega chubuntu.github.io
    Desarrollado en PHP - HTML5 - Javascript - CSS
    Utilizando Materialize http://materializecss.com/
    Derechos Reservados 2016-->
<?php require '../php/master.php';
require('../assets/dashboard/header.php'); ?>
<!DOCTYPE html>
<html>
  <body>
  <!-- Presentación -->
  <div class="row">
    <div class="col m12 s12">
      <div class="card small">
            <div class="card-image">
              <img src="../img/ppt.jpg">
            </div>
            <div class="card-content">
              <h5>Bienvenido al Curso de Power Point</h5>
            </div>
          </div>
    </div>
  </div>
    <!-- /Presentación -->
  <!--Tutoriales-->
  <div class="row">
    <div class="col m12 s12">
      <ul class="collapsible" data-collapsible="accordion" style="background-color: white;">
    <li>
      <div class="collapsible-header"><i class="material-icons">add</i>Introducción</div>
      <div class="collapsible-body" >
        <video src="../videos/office/powerpoint/Curso de PowerPoint 2013 - PARTE 2 - Introducción.mp4" controls style="position:relative; margin-left:20%;"></video>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">add</i>Pestaña Inicio</div>
      <div class="collapsible-body" >
        <video src="../videos/office/powerpoint/parte2.mp4" controls style="position:relative; margin-left:20%;"></video>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">add</i>Portapapeles</div>
      <div class="collapsible-body" >
        <video src="../videos/office/powerpoint/parte3.mp4" controls style="position:relative; margin-left:20%;"></video>
      </div>
    </li>
  </ul>
    </div>
  </div>
  <!--Tutoriales-->
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
  <script src="js/material-charts.js"></script>
</html>
