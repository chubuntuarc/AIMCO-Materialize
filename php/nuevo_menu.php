<?php
require('../php/master.php');
if (isset($_POST['guardar'])) {
  $sql = "";
  $sql = mysql_query("DELETE from platillos", $_SESSION['conn']);
  $sql = "";
  $sql = mysql_query("DELETE from menu", $_SESSION['conn']);
  $sql = "";
  $sql = mysql_query("UPDATE Usuarios SET ResetMenu = '0'", $_SESSION['conn']);
  $sql = "";
  $sql = mysql_query("INSERT INTO platillos VALUES ('1', 'Lunes', '".$_POST['lunes']."', '".$_POST['lunes2']."', '".$_POST['lunes3']."', '".$_POST['lunes4']."')", $_SESSION['conn']);
  $sql = "";
  $sql = mysql_query("INSERT INTO platillos VALUES ('2', 'Martes', '".$_POST['martes']."', '".$_POST['martes2']."', '".$_POST['martes3']."', '".$_POST['martes4']."')", $_SESSION['conn']);
  $sql = "";
  $sql = mysql_query("INSERT INTO platillos VALUES ('3', 'Miercoles', '".$_POST['miercoles']."', '".$_POST['miercoles2']."', '".$_POST['miercoles3']."', '".$_POST['miercoles4']."')", $_SESSION['conn']);
  $sql = "";
  $sql = mysql_query("INSERT INTO platillos VALUES ('4', 'Jueves', '".$_POST['jueves']."', '".$_POST['jueves2']."', '".$_POST['jueves3']."', '".$_POST['jueves4']."')", $_SESSION['conn']);
  $sql = "";
  $sql = mysql_query("INSERT INTO platillos VALUES ('5', 'Viernes', '".$_POST['viernes']."', '".$_POST['viernes2']."', '".$_POST['viernes3']."', '".$_POST['viernes4']."')", $_SESSION['conn']);
  header("location: ../dashboard/comedor.php");
}
if (isset($_POST['modificar'])) {
  $sql = "";
  $sql = mysql_query("UPDATE platillos SET Platillo1='".$_POST['lunes']."', Platillo2='".$_POST['lunes2']."', Complemento='".$_POST['lunes3']."', Postre='".$_POST['lunes4']."' WHERE ID = 1", $_SESSION['conn']);
  $sql = "";
  $sql = mysql_query("UPDATE platillos SET Platillo1='".$_POST['martes']."', Platillo2='".$_POST['martes2']."', Complemento='".$_POST['martes3']."', Postre='".$_POST['martes4']."' WHERE ID = 2", $_SESSION['conn']);
  $sql = "";
  $sql = mysql_query("UPDATE platillos SET Platillo1='".$_POST['miercoles']."', Platillo2='".$_POST['miercoles2']."', Complemento='".$_POST['miercoles3']."', Postre='".$_POST['miercoles4']."' WHERE ID = 3", $_SESSION['conn']);
  $sql = "";
  $sql = mysql_query("UPDATE platillos SET Platillo1='".$_POST['jueves']."', Platillo2='".$_POST['jueves2']."', Complemento='".$_POST['jueves3']."', Postre='".$_POST['jueves4']."' WHERE ID = 4", $_SESSION['conn']);
  $sql = "";
  $sql = mysql_query("UPDATE platillos SET Platillo1='".$_POST['viernes']."', Platillo2='".$_POST['viernes2']."', Complemento='".$_POST['viernes3']."', Postre='".$_POST['viernes4']."' WHERE ID = 5", $_SESSION['conn']);
  header("location: ../dashboard/comedor.php");
}
 ?>
