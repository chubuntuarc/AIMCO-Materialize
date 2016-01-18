<!--Sitio web desarrollado para AIMCO Corporation de México
    Desarrollado por Jesus Arciniega chubuntu.github.io
    Desarrollado en PHP - HTML5 - Javascript - CSS
    Utilizando Materialize http://materializecss.com/
    Derechos Reservados 2016-->
<?php require '../php/master.php';
require '../fpdf/fpdf.php';
require('../assets/dashboard/header.php');?>
<!DOCTYPE html>
<html>
  <body>
    <div class="row">
      <!--Si ya se selecciono el menu-->
      <div class="col m12 s12">
        <div class="card small">
              <div class="card-image">
                <img src="../img/food_big2.jpg">
              </div>
              <div class="card-content">
                <h5>Menú de la Semana</h5>
              </div>
            </div>
      </div>

      <!--Si no se selecciono el menu-->
      <div class="col m12 s12">
        <div class="card-panel">
          <form method="post" action="../php/nuevo_menu.php">
            <table>
              <thead>
                <tr>
                  <td>Lunes</td>
                  <td>Martes</td>
                  <td>Miércoles</td>
                  <td>Jueves</td>
                  <td>Viernes</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $sql = "";
        					$sql = mysql_query("SELECT * FROM Platillos where ID = 1", $_SESSION['conn']);
                  while ($row = mysql_fetch_array($sql))
        					{
        							echo "<td><input class='with-gap' name='lunes' type='text' id='lunes1' value='".$row['Platillo1']."'/><label for='lunes1'>Platillo 1</label>
                      <br><br><input class='with-gap' type='text' name='lunes2' id='lunes2' value='".$row['Platillo2']."'/><label for='lunes2'>Platillo 2</label>
                      <br><br><input class='with-gap' type='text' name='lunes3' id='lunes3' value='".$row['Complemento']."'/><label for='lunes3'>Complemento</label>
                      <br><br><input class='with-gap' type='text' name='lunes4' id='lunes4' value='".$row['Postre']."'/><label for='lunes4'>Postre</label></td>";
        					}

                   ?>
                   <?php
                   $sql = "";
         					$sql = mysql_query("SELECT * FROM Platillos where ID = 2", $_SESSION['conn']);
                   while ($row = mysql_fetch_array($sql))
         					{
         							echo "<td><input class='with-gap' name='martes' type='text' id='martes1' value='".$row['Platillo1']."'/><label for='martes1'>Platillo 1</label>
                       <br><br><input class='with-gap' type='text' name='martes2' id='martes2' value='".$row['Platillo2']."'/><label for='martes2'>Platillo 2</label>
                       <br><br><input class='with-gap' type='text' name='martes3' id='martes3' value='".$row['Complemento']."'/><label for='martes3'>Complemento</label>
                       <br><br><input class='with-gap' type='text' name='martes4' id='martes4' value='".$row['Postre']."'/><label for='martes4'>Postre</label></td>";
         					}

                    ?>
                    <?php
                    $sql = "";
          					$sql = mysql_query("SELECT * FROM Platillos where ID = 3", $_SESSION['conn']);
                    while ($row = mysql_fetch_array($sql))
          					{
          							echo "<td><input class='with-gap' name='miercoles' type='text' id='miercoles1' value='".$row['Platillo1']."'/><label for='miercoles1'>Platillo 1</label>
                        <br><br><input class='with-gap' type='text' name='miercoles2' id='miercoles2' value='".$row['Platillo2']."'/><label for='miercoles2'>Platillo 2</label>
                        <br><br><input class='with-gap' type='text' name='miercoles3' id='miercoles3' value='".$row['Complemento']."'/><label for='miercoles3'>Complemento</label>
                        <br><br><input class='with-gap' type='text' name='miercoles4' id='miercoles4' value='".$row['Postre']."'/><label for='miercoles4'>Postre</label></td>";
          					}

                     ?>
                     <?php
                     $sql = "";
           					$sql = mysql_query("SELECT * FROM Platillos where ID = 4", $_SESSION['conn']);
                     while ($row = mysql_fetch_array($sql))
           					{
           							echo "<td><input class='with-gap' name='jueves' type='text' id='jueves1' value='".$row['Platillo1']."'/><label for='jueves1'>Platillo 1</label>
                         <br><br><input class='with-gap' type='text' name='jueves2' id='jueves2' value='".$row['Platillo2']."'/><label for='jueves2'>Platillo 2</label>
                         <br><br><input class='with-gap' type='text' name='jueves3' id='jueves3' value='".$row['Complemento']."'/><label for='jueves3'>Complemento</label>
                         <br><br><input class='with-gap' type='text' name='jueves4' id='jueves4' value='".$row['Postre']."'/><label for='jueves4'>Postre</label></td>";
           					}

                      ?>
                      <?php
                      $sql = "";
            					$sql = mysql_query("SELECT * FROM Platillos where ID = 5", $_SESSION['conn']);
                      while ($row = mysql_fetch_array($sql))
            					{
            							echo "<td><input class='with-gap' name='viernes' type='text' id='viernes1' value='".$row['Platillo1']."'/><label for='viernes1'>Platillo 1</label>
                          <br><br><input class='with-gap' type='text' name='viernes2' id='viernes2' value='".$row['Platillo2']."'/><label for='viernes2'>Platillo 2</label>
                          <br><br><input class='with-gap' type='text' name='viernes3' id='viernes3' value='".$row['Complemento']."'/><label for='viernes3'>Complemento</label>
                          <br><br><input class='with-gap' type='text' name='viernes4' id='viernes4' value='".$row['Postre']."'/><label for='viernes4'>Postre 1</label></td>";
            					}
                       ?>
                </tr>
              </tbody>
            </table>
              <button class="btn waves-effect waves-light" type="submit" name="guardar" id="guardar">Nuevo
                <i class="material-icons right">check</i></button>
                <button class="btn waves-effect waves-light yellow darken-4" name="modificar" id="modificar">Modificar
                  <i class="material-icons right">create</i>
                </button>
                <a class="modal-trigger btn waves-effect waves-light red darken-4" href="#modal4">Ver Menu
                  <i class="material-icons right">visibility</i>
                </a>
            </form>

          </form>
        </div>
      </div>
    </div>
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
    <!-- Modal Menu Semanal -->
    <div id="modal4" class="modal ">
      <div class="modal-content">
        <h5>Menu Semanal</h5>
        <div class="col s12">
      <ul class="tabs grey lighten-5">
        <li class="tab col s3"><a href="#test1">Lunes</a></li>
        <li class="tab col s3"><a href="#test2">Martes</a></li>
        <li class="tab col s3"><a href="#test3">Miércoles</a></li>
        <li class="tab col s3"><a href="#test4">Jueves</a></li>
        <li class="tab col s3"><a href="#viernes">Viernes</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">
      <table>
        <thead>
          <tr>
            <td>Usuario</td>
            <td>Platillo</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "";
          $sql = mysql_query("SELECT * FROM menu WHERE ID = 1 ORDER BY Usuario ASC", $_SESSION['conn']);

          while ($row = mysql_fetch_array($sql))
          {

              echo "<tr>";
              echo "<td>".$row['Usuario']."</td>";
              echo "<td>".$row['Platillo']."</td>";
              echo "</tr>";
          }
           ?>
        </tbody>
      </table>
    </div>
    <div id="test2" class="col s12">
      <table>
        <thead>
          <tr>
            <td>Usuario</td>
            <td>Platillo</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "";
          $sql = mysql_query("SELECT * FROM menu WHERE ID = 2 ORDER BY Usuario ASC", $_SESSION['conn']);

          while ($row = mysql_fetch_array($sql))
          {

              echo "<tr>";
              echo "<td>".$row['Usuario']."</td>";
              echo "<td>".$row['Platillo']."</td>";
              echo "</tr>";
          }
           ?>
        </tbody>
      </table>
    </div>
    <div id="test3" class="col s12">
      <table>
        <thead>
          <tr>
            <td>Usuario</td>
            <td>Platillo</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "";
          $sql = mysql_query("SELECT * FROM menu WHERE ID = 3 ORDER BY Usuario ASC", $_SESSION['conn']);

          while ($row = mysql_fetch_array($sql))
          {

              echo "<tr>";
              echo "<td>".$row['Usuario']."</td>";
              echo "<td>".$row['Platillo']."</td>";
              echo "</tr>";
          }
           ?>
        </tbody>
      </table>
    </div>
    <div id="test4" class="col s12">
      <table>
        <thead>
          <tr>
            <td>Usuario</td>
            <td>Platillo</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "";
          $sql = mysql_query("SELECT * FROM menu WHERE ID = 4 ORDER BY Usuario ASC", $_SESSION['conn']);

          while ($row = mysql_fetch_array($sql))
          {

              echo "<tr>";
              echo "<td>".$row['Usuario']."</td>";
              echo "<td>".$row['Platillo']."</td>";
              echo "</tr>";
          }
           ?>
        </tbody>
      </table>
    </div>
    <div id="viernes" class="col s12">
      <table>
        <thead>
          <tr>
            <td>Usuario</td>
            <td>Platillo</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "";
          $sql = mysql_query("SELECT * FROM menu WHERE ID = 5 ORDER BY Usuario ASC", $_SESSION['conn']);

          while ($row = mysql_fetch_array($sql))
          {

              echo "<tr>";
              echo "<td>".$row['Usuario']."</td>";
              echo "<td>".$row['Platillo']."</td>";
              echo "</tr>";
          }
           ?>
        </tbody>
      </table>
    </div>
        <div class="modal-footer">
          <form  method="post" action="../php/crearpdf.php">
            <button class=" modal-action modal-close waves-effect waves-green btn-flat" type="submit" name="button" name="imprimir" id="imprimir">Imprimir</button>
          </form>
    </div>
      </div>
    </div>

    <!-- /Modal Menu Semanal -->
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
  </html>
