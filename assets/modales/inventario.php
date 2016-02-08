<!-- Modal de Registro de Inventario Sistemas-->
<div id="modal_inventario" class="modal">
  <div class="modal-content">
    <h5>Inventario Sistemas</h5>
<form class="" action="../dashboard/" method="post">
  <div class="input-field col s12">
  <select id="tipo_movimiento">
    <option value="0">Alta</option>
    <option value="1">Baja</option>
  </select>
  <label>Tipo Movimiento</label>
  </div>
    <div class="input-field col s12">
    <select>
      <option>Nuevo</option>
      <option>Acer</option>
      <option>HP</option>
      <option>Gateway</option>
    </select>
    <label>Nombre del Producto</label>
    <div class="input-field col s6">
      <input name="nombre_articulo" id="nombre_articulo" type="text" class="validate">
      <label for="nombre_articulo">Nombre artículo</label>
    </div>
  </div>
  <div class="input-field col s12">
  <select name="categoria_articulo">
    <option value="Consumible">Consumible</option>
    <option value="Hardware">Hardware</option>
    <option value="Software">Software</option>
  </select>
  <label>Categoría</label>
</div>
<div class="input-field col s12">
<select name="departamento_articulo">
  <option value="Almacén">Almacén</option>
  <option value="Direción">Direción</option>
  <option value="Finanzas">Finanzas</option>
  <option value="General">General</option>
  <option value="Marketing">Marketing</option>
  <option value="Procesos">Procesos</option>
  <option value="Recepción">Recepción</option>
  <option value="Recursos Humanos">Recursos Humanos</option>
  <option value="Servicio Técnico">Servicio Técnico</option>
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
    $sql = "";
    $sql = mysql_query("INSERT INTO inventario_sistemas (nombre, categoria, departamento, cantidad) values('".$_POST['nombre_articulo']."', '".$_POST['categoria_articulo']."', '".$_POST['departamento_articulo']."', ".$_POST['cantidad_articulos'].")", $_SESSION['conn']);
}
 ?>
  </div>
</div>
