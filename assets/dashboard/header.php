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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="../css/diseno.css" media="screen" title="no title" charset="utf-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--/Stylesheets-->
</head>
  <body>
    <header class="z-depth-1">
        <ul <?php echo "id='header_global_".$_SESSION['Rango']."'"; ?>>
          <li><a <?php if ( basename($_SERVER['PHP_SELF']) == "index.php") {
            echo "class='activo' "; } ?>
             href="../dashboard">AIMCO</a></li>
          <li><a href="http://www.aimco-solutions.com/acradyne.asp" target="_blank" id="ocultar">AcraDyne</a></li>
          <li><a href="http://www.eagle-premier.com/" target="_blank" id="ocultar">Eagle</a></li>
          <li><a href="http://www.aimco-solutions.com/online_catalog.asp" target="_blank" id="ocultar">Catalogos</a></li>
          <li><a <?php if ( basename($_SERVER['PHP_SELF']) == "inventario.php") {
            echo "class='activo' "; } ?>
            href="../dashboard/inventario.php" id="ocultar">Inventarios</a></li>
          <li><a <?php if ( basename($_SERVER['PHP_SELF']) == "directorio.php") {
            echo "class='activo' "; } ?>
            href="../dashboard/directorio.php" id="ocultar">Directorio</a></li>
          <li><a <?php if ( basename($_SERVER['PHP_SELF']) == "actualiza_comedor.php") {
            echo "class='activo' "; } ?>
            href="../dashboard/actualiza_comedor.php" id="ocultar" <?php if($_SESSION['Nombre_Usuario'] != $_SESSION['Recepcionista']){ echo "style='display: none;'";} ?>>Menú Comedor</a></li>
              <li><a <?php if ( basename($_SERVER['PHP_SELF']) == "actualiza_comedor.php") {
                echo "class='activo' "; } ?>
                href="../dashboard/actualiza_comedor.php" id="ocultar" <?php if($_SESSION['Nombre_Usuario'] != $_SESSION['RH']){ echo "style='display: none;'";} ?>>Menú Comedor</a></li>
          <li><a <?php if ( basename($_SERVER['PHP_SELF']) == "comedor.php") {
            echo "class='activo' "; } ?>
            href="../dashboard/comedor.php" id="ocultar" <?php if($_SESSION['Rango'] < 4){ echo "style='display: none;'";} ?>>Comedor</a></li>
          <li><a <?php if ( basename($_SERVER['PHP_SELF']) == "soporte.php") {
            echo "class='activo' "; } ?>
            href="#" id="ocultar">Soporte</a></li>
          <li><a <?php if ( basename($_SERVER['PHP_SELF']) == "config.php") {
            echo "class='activo' "; } ?>
             href="../dashboard/config.php" id="ocultar" <?php if($_SESSION['Rango'] != 10){ echo "style='display: none;'";} ?>>Configuración</a></li>
          <li><a><?php echo $_SESSION['Nombre_Usuario']; ?></a></li>
          <li><i class="material-icons sesion" data-activates='dropdown1'>supervisor_account</i></li>
          <!-- Dropdown Structure -->
          <ul id='dropdown1' class='dropdown-content'>
            <li><a href="../">Cerrar Sesión</a></li>
          </ul>
        </ul>
    </header>
    <nav id="tiulo_pagina">
      <div  <?php echo $_SESSION['Color_Header'];?>>
        <img src="../img/logo.png" id="logo">
          <a href="../dashboard" id="aimco">AIMCO Corporation de México</a>
      </div>
    </nav>
  </body>
</html>
