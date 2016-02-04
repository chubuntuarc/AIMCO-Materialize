<?php
require("sesion.php");
error_reporting(0);


//Config  ---------------------------------------------------------------------------
$sql = "";
$sql = mysql_query("SELECT * FROM config", $_SESSION['conn']);
while ($row = mysql_fetch_array($sql))
{
	$_SESSION['Color_Header'] = $row['color_header']; //Color del header
}
//Config  ---------------------------------------------------------------------------
$sql = "";
$sql = mysql_query("SELECT * FROM Usuarios where User = '".$_SESSION['user']."'", $_SESSION['conn']);
while ($row = mysql_fetch_array($sql))
{
	$_SESSION['Comedor'] = $row['ResetMenu'];
}

?>
