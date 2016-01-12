<?php
error_reporting(0);
$negro = 'class=nav-wrapper grey darken-4"';
$rojo = 'class=nav-wrapper red darken-4"';
switch(isset($_POST['seleccionar_color_header'])){
case 'Negro':
    $sql = "";
    $sql = mysql_query("UPDATE config SET color_header = $negro", $_SESSION['conn']);
    header('Location: ../dashboard/config.php');
break;
case 'Rojo':
  $sql = "";
  $sql = mysql_query("UPDATE config SET color_header = $rojo", $_SESSION['conn']);
  header('Location: ../dashboard/config.php');
break;
case 'Alphabetical':
    // do Something for Alphabetical
break;
default:
    // Something went wrong or form has been tampered.
}
 ?>
