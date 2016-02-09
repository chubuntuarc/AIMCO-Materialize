<!-- Modal de Registro de Inventario Sistemas-->
<div id="modal_asistencia" class="modal">
  <div class="modal-content">
    <h5>Servicio Asistencia Sistemas</h5>
<form class="" action="../dashboard/" method="post">
  <div class="input-field col s12">
  <select name="tipo_servicio" id="tipo_servicio">
    <option value="Asistencia">Asistencia</option>
    <option value="Mantenimiento">Mantenimiento Preventivo</option>
  </select>
  <label>Tipo de Servicio</label>
  <div class="input-field col s6" id="proximo_mtto" >
    <input name="proximo_mtto" type="text" class="validate">
    <label for="proximo_mtto">Proximo Mantenimiento</label>
  </div>
  </div>
    <div class="input-field col s12" id="select_nombre">
    <select name="select_nombre">
      <?php
      $sql = "";
      $sql = mysql_query("SELECT Name FROM usuarios GROUP BY Name ORDER BY Name asc ", $_SESSION['conn']);
      while($rs=mysql_fetch_array($sql))
          {
            echo "<option value='".$rs[0]."'>".$rs[0]."</option>";
          }
        ?>
    </select>
    <label>Usuario Atendido</label>
  </div>
  <div class="input-field col s12" id="selecciona_conflicto">
  <select name="selecciona_conflicto" >
    <option value="Nuevo">Nuevo</option>
    <?php
    $sql = "";
    $sql = mysql_query("SELECT conflicto FROM asistencia_sistemas GROUP BY conflicto ORDER BY conflicto asc ", $_SESSION['conn']);
    while($rs=mysql_fetch_array($sql))
        {
          echo "<option value='".$rs[0]."'>".$rs[0]."</option>";
        }
      ?>
  </select>
  <label>Conflicto</label>
  <div class="input-field col s6" id="conflicto" >
    <input name="conflicto" type="text" class="validate">
    <label for="conflicto">Describir Nuevo Conflicto</label>
  </div>
</div>
  <div class="input-field col s12" id="categoria_conflicto">
  <select name="categoria_conflicto" >
    <option value="Consumible">Consumible</option>
    <option value="Hardware">Hardware</option>
    <option value="Software">Software</option>
  </select>
  <label>Categoría del Conflicto</label>
</div>
  <button class="btn waves-effect waves-light" type="submit" name="guardar" id="guardar">Guardar
      <i class="material-icons right">send</i>
    </button>
</form>
<?php
if (isset($_POST['guardar'])) {
  if($_POST['tipo_servicio'] == "Mantenimiento"){
    $Fecha = date('d-m-Y');
    $sql = "";
    $sql = mysql_query("INSERT INTO asistencia_sistemas (nombre_usuario, fecha, conflicto, tipo, proximo) VALUES ('".$_POST['select_nombre']."', '".$Fecha."' ,'Preventivo', 'Mantenimiento', '".$_POST['proximo_mtto']."')", $_SESSION['conn']);
  }
  else if($_POST['tipo_servicio'] == "Asistencia" && $_POST['selecciona_conflicto'] == "Nuevo"){
    $Fecha = date('d-m-Y');
    $sql = "";
    $sql = mysql_query("INSERT INTO asistencia_sistemas (nombre_usuario, fecha, conflicto, tipo) VALUES ('".$_POST['select_nombre']."', '".$Fecha."' ,'".$_POST['conflicto']."', 'Asistencia')", $_SESSION['conn']);
  }
  else if($_POST['tipo_servicio'] == "Asistencia" && $_POST['selecciona_conflicto'] != "Nuevo"){
    $Fecha = date('d-m-Y');
    $sql = "";
    $sql = mysql_query("INSERT INTO asistencia_sistemas (nombre_usuario, fecha, conflicto, tipo) VALUES ('".$_POST['select_nombre']."', '".$Fecha."' ,'".$_POST['selecciona_conflicto']."', 'Asistencia')", $_SESSION['conn']);
  }
}
 ?>
  </div>
</div>
