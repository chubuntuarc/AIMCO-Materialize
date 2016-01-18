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
              <img src="../img/it_big.jpg">
            </div>
            <div class="card-content">
              <h5>Bienvenido a la sección de Soporte Técnico</h5>
            </div>
          </div>
    </div>
  </div>
    <!-- /Presentación -->
      <!-- Tutos -->
      <div class="row">
        <div class="col m4 s12">
          <div class="card medium">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../img/remoto.jpg">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Escritorio Remoto Vencido<i class="material-icons right">more_vert</i></span>
                <p><a href="../documentos/Tutorial-Escritorio-Remoto.pdf" target="_blank">Ver</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Escritorio Remoto Vencido<i class="material-icons right">close</i></span>
                <p>No puedes acceder a tu escritorio remoto, a continuación te explicamos como solucionarlo..</p>
                <p><a href="../documentos/Tutorial-Escritorio-Remoto.pdf" target="_blank">Ver</a></p>
              </div>
            </div>
        </div>
        <div class="col m4 s12">
          <div class="card medium">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../img/sap.jpg">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Acceso a SAP<i class="material-icons right">more_vert</i></span>
                <p><a href="#">Ver</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Acceso a SAP<i class="material-icons right">close</i></span>
                <p>Problemas para acceder a SAP, te explicamos como entrar sin problemas.</p>
                <img src="../img/sap2.png" alt="" style="height:50%; width: 50%;"/>
                <p><a href="#">Ver</a></p>
              </div>
            </div>
        </div>
        <div class="col m4 s12">
          <div class="card medium">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../img/office.jpg">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Office 365 Online<i class="material-icons right">more_vert</i></span>
                <p><a href="#">Ver</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Office 365 Online<i class="material-icons right">close</i></span>
                <p>Necesitas acceder a tu cuenta de Office 365 desde cualquier lugar. Te mostramos como puedes acceder a tu cuenta desde cualquier
                navegador web.</p>
                <img src="../img/office2.jpg" alt="" />
                <p><a href="#">Ver</a></p>
              </div>
            </div>
        </div>
      </div>
      <div class="row">

        <div class="col m6 s12">
          <div class="card medium">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../img/food_big.jpg">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Como seleccionar tu menú<i class="material-icons right">more_vert</i></span>
                <p><a href="#">Ver</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Como seleccionar tu menú<i class="material-icons right">close</i></span>
                <p>Te explicamos como usar la nueva sección del comedor. Provecho!!.</p>
                <img src="../img/food_big2.jpg" alt="" style="height:50%; width: 50%;"/>
                <p><a href="#">Ver</a></p>
              </div>
            </div>
        </div>
        <div class="col m6 s12">
          <div class="card medium">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../img/ppt.jpg">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Curso de Power Point<i class="material-icons right">more_vert</i></span>
                <p><a href="../dashboard/power_point.php">Ver</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Curso de Power Point<i class="material-icons right">close</i></span>
                <p>Aprende a crear presentaciones elegantes utilizando Power Point.</p>
                <img src="../img/ppt.jpg" alt="" style="height:50%; width: 50%;"/>
                <p><a href="../dashboard/power_point.php">Ver</a></p>
              </div>
            </div>
        </div>
      </div>
        <!-- /tutos -->
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
