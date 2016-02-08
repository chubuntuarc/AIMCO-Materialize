<!--Sitio web desarrollado para AIMCO Corporation de México
    Desarrollado por Jesus Arciniega chubuntu.github.io
    Desarrollado en PHP - HTML5 - Javascript - CSS
    Utilizando Materialize http://materializecss.com/
    Derechos Reservados 2016-->
<?php require '../php/master.php';
require('../assets/dashboard/header.php');?>
<!DOCTYPE HTML>
<html>
	<body>
    <div class="row">
        <div class="col m9 s12">
          <div class="card-panel">
            <h5>Consulta tiempos de entrega para SAP</h5>
            <table width="100%" border="0" cellpadding="5">
              <thead>
                <tr class="td_lightgreen">
                    <td >Articulo</td>
                    <td>Descripción</td>
                    <td>Cantidad</td>
                    <td>Tiempo Entrega</td>
                </tr>
              </thead>
                <tbody>



            <?php

            if ($_POST['Visitor'] > 0)
            {
                $sql = "";
                $sql = mysql_query("UPDATE Usuarios SET Visitor = Visitor + 1  WHERE Name = '$user_name'", $_SESSION['conn']);
            }


            if (  ($_POST['ItemCode'] <> NULL) and ($_POST['Qty'] >= 1)  )
            {
                $sql = "";
                $sql = mysql_query("SELECT * FROM Stocks WHERE ItemNumber = '".$_POST['ItemCode']."'", $_SESSION['conn']);

                $ItemNumber = mysql_result($sql, 0, "ItemNumber");
                $Description1 = mysql_result($sql, 0, "Description1");
                $Division = mysql_result($sql, 0, "Division");
                $Class = mysql_result($sql, 0, "Class");
                $QtyAvail = mysql_result($sql, 0, "QtyAvail");
                $Stk = mysql_result($sql, 0, "Stk Y/N");

                if ($ItemNumber <> NULL)
                {
                    $Qty = $_POST["Qty"];
                    $Dif = $Qty - $QtyAvail;

                    echo "<tr>";

                    //PRODUCTO DE STOCK DAIRY-----------------------------------------------------------
                    if ($Stk == 'Y')
                    {
                        if ($Qty < $QtyAvail)
                        {
                            echo "<td class='td_green'>$ItemNumber</td>";
                            echo "<td class='td_green'>$Description1</td>";
                            echo "<td class='td_green'> $Qty </td>";
                            echo "<td class='td_green'> 2 Semanas </td>";
                                                                            }
                        else
                        {
                            $Qty = 0;
                            $Qty = $QtyAvail;

                            echo "<td class='td_green'>$ItemNumber</td>";
                            echo "<td class='td_green'>$Description1</td>";
                            echo "<td class='td_green'> $Qty </td>";
                            echo "<td class='td_green'> 2 Semanas </td>";
                        }
                    echo "</tr>";
                    echo "<tr>";

                        //OBTENER DIRENCIA DEL MONTHLY---------------------------------------------------
                        $sql = "";
                        $sql = mysql_query("SELECT * FROM Stocksm WHERE ItemNumber = '$ItemNumber' AND Stk Y/N = '$Stk' AND Division = '$Division' AND Class = '$Class'", $_SESSION['conn']);
                        if ($Dif > 0)
                        {

                        if ($Stk == 'Y')
                        {

                            $sql = "";
                            $sql = mysql_query("SELECT * FROM Leadtimes WHERE Division = '$Division' AND Class = '$Class'", $_SESSION['conn']);

                            echo "<td class='td_green'>$ItemNumber</td>";
                            echo "<td class='td_green'>$Description1</td>";
                            echo "<td class='td_green'> $Dif </td>";
                            echo "<td class='td_green'>".mysql_result($sql, 0, "Stock")."</td>";
                        }
                        else
                        {
                            $sql = "";
                            $sql = mysql_query("SELECT * FROM Leadtimes WHERE Division = '$Division' AND Class = '$Class'", $_SESSION['conn']);

                            echo "<td class='td_green'>$ItemNumber</td>";
                            echo "<td class='td_green'>$Description1</td>";
                            echo "<td class='td_green'> $Dif </td>";
                            echo "<td class='td_green'>".mysql_result($sql, 0, "NonStock")."</td>";

                        }//END OBTENER DIRENCIA DEL MONTHLY---------------------------------------------------

                    echo "</tr>";

                        }//END DIFERENCIA MAYOR QUE CERO----------------------------------------------------


                    }//END PRODUCTO DE STOCK DAIRY-----------------------------------------------------------


                    else
                    {
                        if ($Qty < $QtyAvail)
                        {
                            echo "<td class='td_green'>$ItemNumber</td>";
                            echo "<td class='td_green'>$Description1</td>";
                            echo "<td class='td_green'> $Qty </td>";
                            echo "<td class='td_green'> 2 Semanas </td>";
                        }
                        else
                        {
                            $Qty = 0;
                            $Qty = $QtyAvail;

                            echo "<td class='td_green'>$ItemNumber</td>";
                            echo "<td class='td_green'>$Description1</td>";
                            echo "<td class='td_green'> $Qty </td>";
                            echo "<td class='td_green'> 2 Semanas </td>";
                        }
                    echo "</tr>";
                    echo "<tr>";

                        $sql = "";
                        $sql = mysql_query("SELECT * FROM Stocksm WHERE ItemNumber = '$ItemNumber' AND Stk Y/N = '$Stk' AND Division = '$Division' AND Class = '$Class'", $_SESSION['conn']);
                        if ($ItemNumber <> NULL)
                        {
                            if ($Stk == 'Y')
                            {
                                $sql = "";
                                $sql = mysql_query("SELECT * FROM Leadtimes WHERE Division = '$Division' AND Class = '$Class'", $_SESSION['conn']);

                                echo "<td class='td_green'>$ItemNumber</td>";
                                echo "<td class='td_green'>$Description1</td>";
                                echo "<td class='td_green'> $Dif </td>";
                                echo "<td class='td_green'>".mysql_result($sql, 0, "Stock")."</td>";
                            }
                            else
                            {
                                $sql = "";
                                $sql = mysql_query("SELECT * FROM Leadtimes WHERE Division = '$Division' AND Class = '$Class'", $_SESSION['conn']);

                                echo "<td class='td_green'>$ItemNumber</td>";
                                echo "<td class='td_green'>$Description1</td>";
                                echo "<td class='td_green'> $Dif </td>";
                                echo "<td class='td_green'>".mysql_result($sql, 0, "NonStock")."</td>";
                            }
                        }
                        else
                        {
                            echo "No esta disponible, verificar con CSA";
                        }

                    }//END PRODUCTO DE NO STOCK DAIRY ------------------------------------------------------

                }
                else
                {
                    //NO ESTA DAIRY BUSCAR EN EL MONTHLY---------------------------------------------------
                    $sql = "";
                    $sql = mysql_query("SELECT * FROM Stocksm WHERE ItemNumber = '".$_POST['ItemCode']."'", $_SESSION['conn']);

                    $ItemNumber = mysql_result($sql, 0, "ItemNumber");
                    $Division = mysql_result($sql, 0, "Division");
                    $Class = mysql_result($sql, 0, "Class");
                    $QtyAvail = mysql_result($sql, 0, "QtyAvail");
                    $Stk = mysql_result($sql, 0, "Stk Y/N");

                    if ($ItemNumber <> NULL)
                    {
                        $sql = "";
                        $sql = mysql_query("SELECT * FROM Stocksm WHERE ItemNumber = '$ItemNumber' AND Stk Y/N = '$Stk' AND Division = '$Division' AND Class = '$Class'", $_SESSION['conn']);

                        if ($Stk == 'Y')
                        {
                            $sql = "";
                            $sql = mysql_query("SELECT * FROM Leadtimes WHERE Division = '$Division' AND Class = '$Class'", $_SESSION['conn']);

                            echo "<td class='td_green'>$ItemNumber</td>";
                            echo "<td class='td_green'>$Description1</td>";
                            echo "<td class='td_green'>".$_POST["Qty"]."</td>";
                            echo "<td class='td_green'>".mysql_result($sql, 0, "Stock")."</td>";
                        }
                        else
                        {
                            $sql = "";
                            $sql = mysql_query("SELECT * FROM Leadtimes WHERE Division = '$Division' AND Class = '$Class'", $_SESSION['conn']);

                            echo "<td class='td_green'>$ItemNumber$Stk</td>";
                            echo "<td class='td_green'>$Description1</td>";
                            echo "<td class='td_green'>".$_POST["Qty"]."</td>";
                            echo "<td class='td_green'>".mysql_result($sql, 0, "NonStock")."</td>";
                        }
                    }
                    else
                    {
                        echo "<td class='td_green'>No se encontraron tiempos de entrega, favor de contactar a servicio al cliente para solicitarlo.</td>";
                    }



                }//END EXISTE PRODUCTO-----------------------------------------------------------------------

            }
            else
            {
                //echo "<td class='td_green'>Error en cantidad</td>";
            }

              echo "</tbody>";
                 echo "</table>";

            ?>
          </div>
        </div>
        <div class="col m3 s12">
          <div class="card-panel">
            <h5>Buscar</h5>
            <form name="SubSapBuscar" method="post" action="inventario.php">
                <select class="icons">
                  <option value="" data-icon="../img/mex.png" class="circle" disabled>México</option>
                  <option value="" data-icon="../img/usa.png" class="circle" selected>USA</option>
                </select>
                <label>Images in select</label>
            <p>Cantidad <input type="text" name="Qty" value="1" size="5"></p>
            <p>Producto <input type="text" name="ItemCode" /></p>
            <button class="btn waves-effect waves-light" type="submit" name="action">Consultar
              <i class="material-icons right">send</i>
            </button>
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
        <!--Footer-->
              <footer class="page-footer grey lighten-1">

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
  <script type="text/javascript">
		$(document).ready(function() {
				$('select').material_select();
			});
	</script>
</html>
