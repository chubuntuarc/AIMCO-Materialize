<?php
session_start(0);
//Valor del detalle de factura
if(isset($_POST["texto"]))
{
  if($_POST["texto"])
  {
    $_SESSION['valor_detalle'] = $_POST["texto"];
    $_SESSION["control_previa"] = 1;
  }
}
else {
  $_SESSION["control_previa"] = 0;
}
//Valor del detalle de factura
if(isset($_POST["reset"]))
{
  if($_POST["reset"])
  {
    $_SESSION["control_previa"] = 0;
  }
}
 ?>
