<!-- Modal de Registro de Inventario Sistemas-->
<div id="modal_inventario" class="modal">
  <div class="modal-content">
    <h5>Inventario Sistemas</h5>
    <div class="input-field col s12">
    <select>
      <option value="0">Nuevo</option>
      <option value="1">Acer</option>
      <option value="2">HP</option>
      <option value="3">Gateway</option>
    </select>
    <label>Nombre del Producto</label>
    <div class="input-field col s6">
      <input id="last_name" type="text" class="validate">
      <label for="last_name">Escribir nombre artículo..</label>
    </div>
  </div>
  <div class="input-field col s12">
  <select>
    <option value="0">Consumible</option>
    <option value="1">Hardware</option>
    <option value="2">Software</option>
  </select>
  <label>Categoría</label>
</div>
<div class="input-field col s12">
<select>
  <option value="0">Almacén</option>
  <option value="1">Direción</option>
  <option value="2">Finanzas</option>
  <option value="2">General</option>
  <option value="2">Marketing</option>
  <option value="2">Procesos</option>
  <option value="2">Recepción</option>
  <option value="2">Recursos Humanos</option>
  <option value="2">Servicio Técnico</option>
  <option value="2">Sistemas</option>
</select>
<label>Departamento</label>
</div>
<div class="input-field col s6">
  <input id="last_name" type="text" class="validate">
  <label for="last_name">Cantidad de artículos</label>
</div>
<div class="input-field col s12">
<select>
  <option value="0">Alta</option>
  <option value="1">Baja</option>
</select>
<label>Tipo Movimiento</label>
</div>
<form class="" action="index.html" method="post">
  <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
      <i class="material-icons right">send</i>
    </button>
</form>
  </div>
</div>
