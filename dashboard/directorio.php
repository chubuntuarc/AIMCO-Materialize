<!--Sitio web desarrollado para AIMCO Corporation de México
    Desarrollado por Jesus Arciniega chubuntu.github.io
    Desarrollado en PHP - HTML5 - Javascript - CSS
    Utilizando Materialize http://materializecss.com/
    Derechos Reservados 2016-->
<?php require '../php/master.php';
require('../assets/dashboard/header.php');?>
<!DOCTYPE html>
<html>
  <body>
    		<!-- Contenido -->
        <div class="row">
          <div class="card col m12 s12">
            <h2>Directorio corporativo</h2>
            <input type="text" name="busqueda" id="busqueda" value="" placeholder="Buscar">
            <?php
            echo "<table class='bordered highlight responsive-table' id='directorio'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th data-field='id'>Nombre</th>";
            echo "<th data-field='name'>Extensión</th>";
            echo "<th data-field='price'>Móvil</th>";
            echo "<th data-field='price'>Departamento</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            $sql = "";
            $sql = mysql_query("SELECT * FROM Directory", $_SESSION['conn']);

            while ($row = mysql_fetch_array($sql))
            {

                echo "<tr>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Ext']."</td>";
                echo "<td>".$row['Phone']."</td>";
                echo "<td>".$row['Department']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";

                ?>
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
  <script src="../js/jquery-2.2.0.js"></script>                                 <!--JQUERY 2.2.0-->
  <script type="text/javascript" src="../js/materialize.min.js"></script>       <!--MaterializeCSS-->
  <script type="text/javascript" src="../js/busqueda.js"></script>              <!--Buscador Dinámico-->
</html>
