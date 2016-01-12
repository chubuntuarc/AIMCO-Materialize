<!--Sitio web desarrollado para AIMCO Corporation de México
    Desarrollado por Jesus Arciniega chubuntu.github.io
    Desarrollado en PHP - HTML5 - Javascript - CSS
    Utilizando Materialize http://materializecss.com/
    Derechos Reservados 2016-->
<?php require '../php/master.php';
require('../assets/dashboard/header.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="row">
      <div class="col m3 s12">
        <div class="card">
          <div class="card-image">
            <img src="../img/avisos.jpg">
            <span class="card-title">Colores</span>
          </div>
          <div class="card-content">
            <div class="input-field col s12 m12">
              <select class="icons">
                <option value="" disabled selected>Selecciona color</option>
                <option value="" data-icon="../img/colors/black.png" class="right circle">Negro</option>
                <option value="" data-icon="../img/colors/red.png" class="right circle">Rojo</option>
                <option value="" data-icon="../img/colors/green.png" class="rigth circle">Verde</option>
              </select>
              <label>Color Encabezado</label>
            </div><br><br><br>
          </div>
        </div>
        </div>
      </div>
    </div>
  </body>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
  <script type="text/javascript" src="../js/master.js"></script>
</html>
