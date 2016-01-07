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
          <li><a href="#" id="ocultar">Inventarios</a></li>
          <li><a href="../dashboard/directorio.php" id="ocultar">Directorio</a></li>
          <li><a class="activo" href="../dashboard/comedor.php" id="ocultar" <?php if($_SESSION['Rango'] < 4){ echo "style='display: none;'";} ?>>Comedor</a></li>
          <li><a href="#" id="ocultar">Soporte</a></li>
          <li><a><?php echo $_SESSION['Nombre_Usuario']; ?></a></li>
          <li><i class="material-icons sesion" data-activates='dropdown1'>supervisor_account</i></li>
          <!-- Dropdown Structure -->
          <ul id='dropdown1' class='dropdown-content'>
            <li><a class="modal-trigger" href="#modal3">Información</a></li>
            <li class="divider"></li>
            <li><a href="../">Cerrar Sesión</a></li>
          </ul>
        </ul>
    </header>
    <nav id="tiulo_pagina">
      <div class="nav-wrapper grey darken-4 ">
        <img src="../img/logo.png" id="logo">
          <a href="#" id="aimco">AIMCO Corporation de México</a>
      </div>
    </nav>
    <!--/Barra superior - Header-->
    <div class="row">
      <!--Si ya se selecciono el menu-->
      <div class="col m12 s12">
        <div class="card small">
              <div class="card-image">
                <img src="../img/food_big.jpg">
              </div>
              <div class="card-content">
                <h5><?php if($_SESSION['Comedor'] == 1){ echo "Menú de la Semana";} else{echo "Selecciona tu menú de la semana";} ?></h5>
              </div>
            </div>
      </div>
      <div class="col m12 s12" <?php if($_SESSION['Comedor'] == 0){ echo "style='display: none;'";} ?>>
        <div class="card-panel">
          <?php
          echo "<table class='bordered highlight responsive-table' id='directorio'>";
          echo "<thead>";
          echo "<tr>";
          echo "<th>Día</th>";
          echo "<th>Platillo</th>";
          echo "<th>Complemento</th>";
          echo "<th>Postre</th>";
          echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
          $sql = "";
          $sql = mysql_query("SELECT * FROM menu WHERE Usuario = '".$_SESSION['Nombre_Usuario']."' ORDER BY ID ASC", $_SESSION['conn']);

          while ($row = mysql_fetch_array($sql))
          {

              echo "<tr>";
              echo "<td>".$row['DiaSemana']."</td>";
              echo "<td>".$row['Platillo']."</td>";
              echo "<td>".$row['Complemento']."</td>";
              echo "<td>".$row['Postre']."</td>";
              echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";

              ?>
        </div>
      </div>
      <!--Si no se selecciono el menu-->
      <div class="col m12 s12" <?php if($_SESSION['Comedor'] == 0){ echo "style='display: none;'";} ?>>
        <div class="card-panel">
          <form method="post">
            <table>
              <?php
              $sql = "";
    					$sql = mysql_query("SELECT * FROM Platillos", $_SESSION['conn']);
              while ($row = mysql_fetch_array($sql))
    					{
    						echo "<tr>";
    							echo "<td>".$row['DiaSemana']."</td>";
    							echo "<td><input class='with-gap' name='group3' type='radio' id='test5'/><label for='test5'>".$row['Platillo1']."</label></td>";
    							echo "<td><input class='with-gap' name='group4' type='radio' id='test6'/><label for='test6'>".$row['Platillo2']."</label></td>";
    						echo "</tr>";

                  echo "<tr>";
                    echo "<td  class='first'></td>";
                    echo "<td  class='first' align='right'>Complemento: </td>";
                    echo "<td  class='first' align='right'><font color='Green'>".$row['Complemento']." y ".$row['Postre']."</font></td>";
  			        echo "</tr>";

    						echo "<tr>";
                    echo "<td  class='first'></td>";
                    echo "<td  class='first'></td>";
      							echo "<td  class='first'></td>";
  			        echo "</tr>";

    					}

               ?>
            </table>
            <button class="btn waves-effect waves-light" type="submit" name="guardar" id="guardar">Guardar
              <i class="material-icons right">check</i>
            </button>
          </form>
          <?php
          $sql = "";
      		$sql = mysql_query("UPDATE Usuarios SET ResetMenu = '1' WHERE Name = '".$_SESSION['Nombre_Usuario']."'", $_SESSION['conn']);

      			foreach($_POST['group3'] as $p1)
      			{
      				$sql = "";
      				$sql = mysql_query("SELECT ID, DiaSemana, Complemento, Postre FROM Platillos WHERE Platillo1 = '$p1' OR Platillo2 = '$p1'", $_SESSION['conn']);
      				$No = mysql_result($sql, 0, "ID");
      				$DiaSemana = mysql_result($sql, 0, "DiaSemana");
      				$Complemento = mysql_result($sql, 0, "Complemento");
      				$Postre = mysql_result($sql, 0, "Postre");

      				$sql = "";
      				$sql = mysql_query("INSERT INTO MENU VALUES ('$No', '$DiaSemana', '$user_name', '$p1', '$Complemento', '$Postre')", $_SESSION['conn']);

      				$sql = "";
      				$sql = mysql_query("UPDATE Pedido SET Cantidad = Cantidad + 1 WHERE Platillo = '$p1'", $_SESSION['conn']);
      			}

      			foreach($_POST['group4'] as $p2)
      			{
      				$sql = "";
      				$sql = mysql_query("SELECT ID, DiaSemana, Complemento, Postre FROM Platillos WHERE Platillo1 = '$p2' OR Platillo2 = '$p2'", $_SESSION['conn']);
      				$No = mysql_result($sql, 0, "ID");
      				$DiaSemana = mysql_result($sql, 0, "DiaSemana");
      				$Complemento = mysql_result($sql, 0, "Complemento");
      				$Postre = mysql_result($sql, 0, "Postre");

      				$sql = "";
      				$sql = mysql_query("INSERT INTO MENU VALUES ('$No', '$DiaSemana', '$user_name', '$p2', '$Complemento', '$Postre')", $_SESSION['conn']);

      				$sql = "";
      				$sql = mysql_query("UPDATE Pedido SET Cantidad = Cantidad + 1 WHERE Platillo = '$p2'", $_SESSION['conn']);
      			}
           ?>
        </div>
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
  </html>
