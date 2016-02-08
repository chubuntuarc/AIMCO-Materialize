<!-- Modal de Registro de Inventario Sistemas-->
<div id="modal_inventario" class="modal">
  <div class="modal-content">
    <h5>Inventario Sistemas</h5>
<form class="" action="../dashboard/" method="post">
  <div class="input-field col s12">
  <select name="tipo_movimiento" id="tipo_movimiento">
    <option value="Alta">Alta</option>
    <option value="Baja">Baja</option>
  </select>
  <label>Tipo Movimiento</label>
  </div>
    <div class="input-field col s12" id="seleccion_de_articulo">
    <select name="select_nombre">
      <option value="Nuevo">Nuevo</option>
      <?php
      $sql = "";
      $sql = mysql_query("SELECT nombre FROM inventario_sistemas GROUP BY nombre ORDER BY nombre asc ", $_SESSION['conn']);
      while($rs=mysql_fetch_array($sql))
          {
            echo "<option value='".$rs[0]."'>".$rs[0]."</option>";
          }
        ?>
    </select>
    <label>Nombre del Producto</label>
    <div class="input-field col s6" id="nombre_articulo" >
      <input name="nombre_articulo" type="text" class="validate">
      <label for="nombre_articulo">Nombre artículo</label>
    </div>
  </div>
  <div class="input-field col s12" id="categoria_articulo">
  <select name="categoria_articulo" >
    <option value="Consumible">Consumible</option>
    <option value="Hardware">Hardware</option>
    <option value="Software">Software</option>
  </select>
  <label>Categoría</label>
</div>
<div class="input-field col s12" id="departamento_articulo">
<select name="departamento_articulo" >
  <option value="Almacen">Almacén</option>
  <option value="Direcion">Direción</option>
  <option value="Finanzas">Finanzas</option>
  <option value="General">General</option>
  <option value="Marketing">Marketing</option>
  <option value="Procesos">Procesos</option>
  <option value="Recepcion">Recepción</option>
  <option value="Recursos Humanos">Recursos Humanos</option>
  <option value="Servicio Tecnico">Servicio Técnico</option>
  <option value="Sistemas">Sistemas</option>
</select>
<label>Departamento</label>
</div>
<div class="input-field col s6">
  <input name="cantidad_articulos" id="cantidad_articulos" type="text" class="validate">
  <label for="cantidad_articulos">Cantidad de artículos</label>
</div>
  <button class="btn waves-effect waves-light" type="submit" name="guardar" id="guardar">Guardar
      <i class="material-icons right">send</i>
    </button>
</form>
<?php
if (isset($_POST['guardar'])) {
  if($_POST['tipo_movimiento'] == "Baja" && $_POST['select_nombre'] == "Nuevo"){
    $sql = "";
    $sql = mysql_query("DELETE FROM inventario_sistemas WHERE nombre = '".$_POST['nombre_articulo']."' and departamento = '".$_POST['departamento_articulo']."'", $_SESSION['conn']);
  }
  else if ($_POST['tipo_movimiento'] == "Baja" && $_POST['select_nombre'] != "Nuevo") {
    $sql = "";
    $sql = mysql_query("UPDATE inventario_sistemas SET cantidad = cantidad - 1  WHERE nombre = '".$_POST['select_nombre']."' and departamento = '".$_POST['departamento_articulo']."'", $_SESSION['conn']);
  }
  else if ($_POST['tipo_movimiento'] == "Alta" && $_POST['select_nombre'] == "Nuevo") {
    $sql = "";
    $sql = mysql_query("INSERT INTO inventario_sistemas (nombre, categoria, departamento, cantidad) values('".$_POST['nombre_articulo']."', '".$_POST['categoria_articulo']."', '".$_POST['departamento_articulo']."', ".$_POST['cantidad_articulos'].")", $_SESSION['conn']);
  }
  else {
    $sql = "";
    $sql = mysql_query("UPDATE inventario_sistemas SET cantidad = cantidad + 1  WHERE nombre = '".$_POST['select_nombre']."' and departamento = '".$_POST['departamento_articulo']."'", $_SESSION['conn']);
  }
}
 ?>
  </div>
</div>
