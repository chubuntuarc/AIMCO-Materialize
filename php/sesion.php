<?php
/*Este documento contiene la conexión a base de datos, y la información basica que requiere el sistema en todas las secciones del mismo*/
  //Se arranca la sesión
  session_start(0);
  error_reporting(0);
  //Zona horaria del sistema
  date_default_timezone_set('America/Chihuahua');
  //Conexión a SQL Server usando el driver ODBC de Windows.  ------------------------------------------------------------------------------
	$Conexion_SQL = odbc_connect('AIMCO','sa','Sql@dmin1', SQL_CUR_USE_ODBC);
	if ($Conexion_SQL == FALSE){
	echo ('Error en la conexion' . odbc_error());  }
  //Conexión a MySQL ------------------------------------------------------------------------------
  $_SESSION['conn'] = mysql_connect('aimex.sytes.net','aimco','@@imco');
  mysql_select_db("aimco",$_SESSION['conn']);
  //Año actual.... Esta por defecto el del equipo, pero se busca modificarlo después
  $_SESSION["Anual"] = 2016;
  //Fecha desde la que se haran las consultas.
  $_SESSION["Fecha_Inicial"] = $_SESSION["Anual"]."-01-01";
  //Fecha hasta la que se haran las consultas.
  $_SESSION["Fecha_Final"] = $_SESSION["Anual"]."-12-31";
  //Datos del usuario
  //Usuario
  $_SESSION['user'];
  //Contraseña
  $_SESSION['pass'];
  //ID SAP del usuario actual.
  $_SESSION['Usuario_Actual'];
  //Nivel del usuario
  $_SESSION['Rango'];
  //Nombre del usuario
  $_SESSION['Nombre_Usuario'];
  //Menu comedor
  $_SESSION['Comedor'];
  //Recepcionista
  $_SESSION['Recepcionista'] = 'Veronica Murillo';
  //RH
  $_SESSION['RH'] = 'Leonardo Balderas';
  //Dirección
  $_SESSION['DC'] = 'Eric Aguayo';
 ?>
