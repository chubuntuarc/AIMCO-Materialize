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
  <link rel="shortcut icon" href="../img/favicon.ico" />
  <!--/Meta-Tags-->
  <title>AIMCO CORPORATION DE MÉXICO SA DE CV</title>
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
          <li><a href="../dashboard">Dashboard</a></li>
          <li><a href="http://www.aimco-solutions.com/acradyne.asp" target="_blank" id="ocultar">AcraDyne</a></li>
          <li><a href="http://www.eagle-premier.com/" target="_blank" id="ocultar">Eagle</a></li>
          <li><a href="http://www.aimco-solutions.com/online_catalog.asp" target="_blank" id="ocultar">Catalogos</a></li>
          <li><a href="#" id="ocultar">Documentos</a></li>
          <li><a href="#" id="ocultar">Inventarios</a></li>
          <li><a class="activo" href="../dashboard/directorio.php" id="ocultar">Directorio</a></li>
          <li><a href="#" id="ocultar" <?php if($_SESSION['Rango'] < 4){ echo "style='display: none;'";} ?>>Comedor</a></li>
          <li><a href="#" id="ocultar">Soporte</a></li>
          <li><a><?php echo $_SESSION['Nombre_Usuario']; ?></a></li>
          <li><i class="material-icons sesion" data-activates='dropdown1'>supervisor_account</i></li>
          <!-- Dropdown Structure -->
          <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!">Información</a></li>
            <li class="divider"></li>
            <li><a href="../">Cerrar Sesión</a></li>
          </ul>
        </ul>
    </header>
    <nav id="tiulo_pagina">
      <div class="nav-wrapper red darken-4 ">
        <img src="../img/logo.png" id="logo">
          <a href="../dashboard" id="aimco">AIMCO Corporation de México</a>
      </div>
    </nav>
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
  <script type="text/javascript" src="../js/busqueda.js"></script>
  <script type="text/javascript" src="../js/master.js"></script>
</html>
