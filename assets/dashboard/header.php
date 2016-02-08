<?php require '../php/sesion.php'; if($_SESSION["Nombre_Usuario"] == "") header("Location: ../index.php"); ?> <!--Sesión del Sistema-->
<!DOCTYPE html>
<html>
<head>
  <!--Meta-Tags-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="autor" content="Jesus Arciniega">
  <meta name="description" content="Dashboard Corporativo de AIMCO Corporation de México" />
  <link rel="shortcut icon" href="../img/favicon.ico" />
  <!--/Meta-Tags-->
  <title>AIMCO CORPORATION DE MÉXICO SA DE CV</title>
  <!--Stylesheets-->
  <link rel="stylesheet" href="../css/materialize.min.css" media="screen" title="no title" charset="utf-8"><!--Stylesheet del framework MaterializeCSS-->
  <link rel="stylesheet" href="../css/diseno.css" media="screen" title="no title" charset="utf-8"><!--Stylesheet Diseño Sistema-->
  <link rel="stylesheet" href="../css/responsive.css" media="screen" title="no title" charset="utf-8"><!--Stylesheet Diseño Sistema-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!--Iconos de Material Design-->
  <!--/Stylesheets-->
</head>
  <body>
    <header id="menu_dashboard" class="z-depth-1">                              <!--Header del sistema-->
      <ul  <?php echo "id='header_global_".$_SESSION['Rango']."'"; ?>>          <!--Se asigna un id segun el rango del usuario para poder utilizarlo segun las necesidades Ej: header_global_3 se usa para editar el header de los vendedores-->
        <!--Los elementos PHP dentro de cada opción del menú que usan $_SERVER['PHP_SELF'] se usan para saber si estamos posicionados ne la página actual-->
        <!--El id en el elemento li sirve para ocultar o mostrar ciertos elementos de manera responsiva, se usan en ..css/responsive.css-->
        <li id="aimco_header"><a <?php if ( basename($_SERVER['PHP_SELF']) == "index.php") {echo "class='activo' "; } ?> href="../dashboard">AIMCO</a></li> <!--Elemento que redirige a la página principal-->
        <li><a <?php if ( basename($_SERVER['PHP_SELF']) == "ventas.php") {echo "class='activo' "; } ?> href="../dashboard/ventas.php" id="ocultar" <?php if($_SESSION['Nombre_Usuario'] != $_SESSION['DC']){ echo "style='display: none;'";} ?>>Ventas</a></li>  <!--Elemento que redirige a la ventana de administración de ventas exclusivo del Director-->
        <li id="inventarios_header"><a <?php if ( basename($_SERVER['PHP_SELF']) == "inventario.php") {echo "class='activo' "; } ?> href="../dashboard/inventario.php">Inventarios</a></li> <!--Elemento que redirige a la página de inventarios de Portland-->
        <li id="directorio_header"><a <?php if ( basename($_SERVER['PHP_SELF']) == "directorio.php") {echo "class='activo' "; } ?> href="../dashboard/directorio.php" >Directorio</a></li> <!--Elemento que redirige a la página de directorio corporativo-->
        <li id="menu_comedor"><a <?php if ( basename($_SERVER['PHP_SELF']) == "actualiza_comedor.php") {echo "class='activo' "; } ?> href="../dashboard/actualiza_comedor.php"  <?php if($_SESSION['Nombre_Usuario'] != $_SESSION['Recepcionista']){ echo "style='display: none;'";} ?>>Menú Comedor</a></li> <!--Elemento que redirige a la página de actualización de menú de la semana, Exclusivo de RH y Recepción-->
        <li id="menu_comedor"><a <?php if ( basename($_SERVER['PHP_SELF']) == "actualiza_comedor.php") {echo "class='activo' "; } ?> href="../dashboard/actualiza_comedor.php" <?php if($_SESSION['Nombre_Usuario'] != $_SESSION['RH']){ echo "style='display: none;'";} ?>>Menú Comedor</a></li> <!--Elemento que redirige a la página de actualización de menú de la semana, Exclusivo de RH y Recepción-->
        <li id="comedor"><a <?php if ( basename($_SERVER['PHP_SELF']) == "comedor.php") {echo "class='activo' "; } ?> href="../dashboard/comedor.php"<?php if($_SESSION['Rango'] < 4){ echo "style='display: none;'";} ?>>Comedor</a></li> <!--Elemento que redirige a la página de selección de comida-->
        <li id="soporte_header"><a <?php if ( basename($_SERVER['PHP_SELF']) == "soporte.php") {echo "class='activo' "; } ?> href="soporte.php" >Soporte</a></li> <!--Elemento que redirige a la página de Soporte-->
        <li><a href="https://www.concursolutions.com/" id="concur" <?php if($_SESSION['Rango'] != 3){ echo "style='display: none;'";} ?> target="_blank">CONCUR</a></li> <!--Elemento que redirige a la página de CONCUR-->
        <li><a <?php if ( basename($_SERVER['PHP_SELF']) == "config.php") {echo "class='activo' "; } ?> href="../dashboard/config.php" id="ocultar" <?php if($_SESSION['Rango'] != 10){ echo "style='display: none;'";} ?>>Configuración</a></li> <!--Elemento que redirige a la página de Configuración Exclusiva de Sistemas-->
        <li id="nombre_header" <?php if($_SESSION['Nombre_Usuario'] != $_SESSION['Recepcionista']){ echo "id='nombre_user'";}else echo "id='esconder'"; ?><?php if($_SESSION['Nombre_Usuario'] != $_SESSION['RH']){ echo "id='nombre_user'";}else echo "id='esconder'"; ?>><a><?php echo $_SESSION['Nombre_Usuario']; ?></a></li>
        <li><i class="material-icons sesion" data-activates='dropdown1'>supervisor_account</i></li>
          <ul id='dropdown1' class='dropdown-content'>                          <!-- Dropdown de cierre de sesión -->
            <li><a href="../">Cerrar Sesión</a></li>
          </ul>
      </ul>
    </header>
    <nav id="tiulo_pagina">
      <div class="black">
        <img src="../img/logo.png" id="logo">
          <a href="../dashboard" id="aimco">AIMCO Corporation de México</a>
      </div>
    </nav>
  </body>
</html>
